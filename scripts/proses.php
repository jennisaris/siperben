<?php
	ini_set('memory_limit', '1024M');
	ini_set('max_execution_time', 0);
	ini_set("date.timezone", "Asia/Jakarta");

    require_once "class.db.php";

    $db = new class_db;

    //
    hapus_pegawai_tanpa_header();

    function hapus_pegawai_tanpa_header() {
        global $db;

        $sql = "SELECT iusulanid from app_t_usulan_pegawai group by iusulanid";
        $rows = $db->_fetchAll($sql);
        foreach($rows as $r) {
            $iusulanid = $r['iusulanid'];
            $sql2 = "SELECT count(*) as total from app_t_usulan where id = '{$iusulanid}'";
            $r2 = $db->_fetchRow($sql2);
            if ( $r2['total'] == 0 ) {
                echo 'ditemukan.... '.$iusulanid.'\\n';
                $db->_execSQL("DELETE FROM app_t_usulan_pegawai where iusulanid = '{$iusulanid}'");
            }
        }
	}
 ?>

