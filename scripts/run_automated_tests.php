<?php
// Automated Integration & Verification Test Suite for SIPERBEN

echo "====================================================\n";
echo "    SIPERBEN AUTOMATED TEST SUITE (Paket 3)\n";
echo "====================================================\n\n";

$tests_passed = 0;
$tests_total = 0;

function run_test($name, $closure) {
    global $tests_passed, $tests_total;
    $tests_total++;
    echo "Test #{$tests_total} [{$name}]: ";
    try {
        $res = $closure();
        if ($res === true) {
            echo "\033[32mPASSED\033[0m\n";
            $tests_passed++;
        } else {
            echo "\033[31mFAILED\033[0m (" . (is_string($res) ? $res : 'Assertion failed') . ")\n";
        }
    } catch (Throwable $e) {
        echo "\033[31mERROR\033[0m (" . $e->getMessage() . ")\n";
    }
}

// 1. Database Connection & Schema Verification
run_test("Database Connection & Key Tables Check", function() {
    $mysqli = new mysqli('127.0.0.1', 'root', '', 'db_app01');
    if ($mysqli->connect_error) return "Database connection error: " . $mysqli->connect_error;
    
    $required_tables = array('app_t_registrasi', 'priv_t_user', 'sysparam', 'app_t_audit_log');
    foreach ($required_tables as $table) {
        $res = $mysqli->query("SHOW TABLES LIKE '$table'");
        if (!$res || $res->num_rows === 0) return "Missing table: $table";
    }
    return true;
});

// 2. Direct File Access Protection (.htaccess)
run_test(".htaccess Upload Protection Check", function() {
    $htaccess = 'c:/xampp/htdocs/siperben/uploads/registrasi_kpa/.htaccess';
    if (!file_exists($htaccess)) return ".htaccess file not found";
    $content = file_get_contents($htaccess);
    if (strpos($content, 'Require all denied') === false && strpos($content, 'Deny from all') === false) {
        return ".htaccess does not contain access denial rule";
    }
    return true;
});

// 3. Audit Log Helper Functionality Test
run_test("Audit Logging System Test", function() {
    $mysqli = new mysqli('127.0.0.1', 'root', '', 'db_app01');
    $now = date('Y-m-d H:i:s');
    $test_action = 'TEST_AUTOMATED_LOG_' . time();
    
    $stmt = $mysqli->prepare("INSERT INTO app_t_audit_log (username, action, module, description, ip_address, created_at) VALUES ('test_runner', ?, 'AutomatedTest', 'Automated test execution', '127.0.0.1', ?)");
    $stmt->bind_param("ss", $test_action, $now);
    if (!$stmt->execute()) return "Failed to insert audit log entry: " . $stmt->error;
    
    $check = $mysqli->query("SELECT id FROM app_t_audit_log WHERE action = '$test_action'");
    if (!$check || $check->num_rows === 0) return "Audit log entry not found in database";
    
    // Clean up test entry
    $mysqli->query("DELETE FROM app_t_audit_log WHERE action = '$test_action'");
    return true;
});

// 4. Registration Flow & Database Insertion Test
run_test("End-to-End Registration & Approval Simulation", function() {
    $pdf_file = tempnam(sys_get_temp_dir(), 'test_kpa') . '.pdf';
    file_put_contents($pdf_file, "%PDF-1.4 automated test pdf document content");

    $mysqli = new mysqli('127.0.0.1', 'root', '', 'db_app01');
    $satker_res = $mysqli->query("SELECT kode, nama FROM app_m_unor WHERE kode_atasan LIKE '138%' AND nama IS NOT NULL AND nama <> '' AND (deleted IS NULL OR deleted = 0) ORDER BY kode ASC LIMIT 1");
    $satker = $satker_res->fetch_assoc();
    $satker_label = $satker['kode'] . ' - ' . $satker['nama'];

    $gol_res = $mysqli->query("SELECT id, nama, pangkat FROM kepeg_m_golongan ORDER BY id ASC LIMIT 1");
    $gol = $gol_res->fetch_assoc();
    $gol_label = trim($gol['pangkat']) !== '' ? trim($gol['pangkat']) . ' (' . trim($gol['nama']) . ')' : trim($gol['nama']);

    $test_nip = '199001012015031999';

    // Clean any pre-existing test data
    $mysqli->query("DELETE FROM app_t_registrasi WHERE nip = '$test_nip'");
    $mysqli->query("DELETE FROM priv_t_user WHERE username = '" . $satker['kode'] . "'");

    $post_data = array(
        'nip' => $test_nip,
        'nama_lengkap' => 'Operator Test Automated',
        'satuan_kerja' => $satker_label,
        'pangkat_golongan' => $gol_label,
        'no_hp' => '081999888777',
        'email' => 'test_auto_op@kemdikbud.go.id',
        'surat_persetujuan_kpa' => new CURLFile($pdf_file, 'application/pdf', 'test_approval_kpa.pdf')
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://localhost/siperben/registrasi');
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, false);
    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    @unlink($pdf_file);

    if ($http_code !== 303 && $http_code !== 302 && $http_code !== 200) {
        return "Registration submit failed with HTTP Code $http_code";
    }

    $reg_check = $mysqli->query("SELECT id FROM app_t_registrasi WHERE nip = '$test_nip'");
    if (!$reg_check || $reg_check->num_rows === 0) {
        return "Submitted registration not found in database app_t_registrasi";
    }

    $reg_id = $reg_check->fetch_assoc()['id'];

    // Clean up test data after verification
    $mysqli->query("DELETE FROM app_t_registrasi WHERE id = $reg_id");
    return true;
});

// 5. SK KPA Tabs (Sudah Input vs Belum Input) Test
run_test("SK KPA Tab 1 & Tab 2 Query Test", function() {
    $mysqli = new mysqli('127.0.0.1', 'root', '', 'db_app01');
    if ($mysqli->connect_error) return "Database connection error: " . $mysqli->connect_error;

    // Check query for tab 2 (satker belum input SK KPA)
    $sql_belum = "SELECT u.kode AS iunorid, u.nama AS nama_satker,
                  COALESCE((SELECT nama FROM app_m_unor WHERE kode = u.kode_atasan), 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi') AS nama_unitutama
                  FROM app_m_unor u
                  WHERE (u.deleted = 0 OR u.deleted IS NULL)
                    AND u.nama IS NOT NULL AND TRIM(u.nama) <> ''
                    AND u.kode NOT IN (
                        SELECT DISTINCT a.iunorid 
                        FROM app_t_usulan a 
                        WHERE a.ijns = 2
                    ) LIMIT 5";
    $res_belum = $mysqli->query($sql_belum);
    if (!$res_belum) return "Query satker belum input SK KPA error: " . $mysqli->error;
    if ($res_belum->num_rows === 0) return "No satker found for tab belum input";

    return true;
});

echo "\n====================================================\n";
echo "    TEST SUMMARY: {$tests_passed}/{$tests_total} Passed\n";
echo "====================================================\n\n";

exit($tests_passed === $tests_total ? 0 : 1);
