<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('access_menu')){
  function access_menu($menu_controller, $group_id) {
		  $menu_controller = trim($menu_controller);
    	$CI =&get_instance();
      $prefix   = $CI->config->item('dbprefix');
        
  		if ( $group_id == '' ) $group_id = 0;
  		else $group_id = trim($group_id);
  		
  		$sql = "SELECT b.imenuid, max(b.iallowview) as iallowview, 
  				  max(b.iallowadd) as iallowadd, max(b.iallowedit) as iallowedit, 
  				  max(b.iallowdelete) as iallowdelete 
  				  FROM {$prefix}t_menu a, {$prefix}t_menu_group_privileges b
  				  WHERE a.id = b.imenuid and a.cmenucontroller = '{$menu_controller}'
  				  and b.igroupid in ({$group_id}) group by b.imenuid";
  		//echo $sql;
  		//exit;
  		$query = $CI->db->query($sql);
  		if ( $query ) {
  			$row = $query->row();
  
  			//session
  			$CI->session->set_userdata('allowview', $row->iallowview);
  			$CI->session->set_userdata('allowadd', $row->iallowadd);
  			$CI->session->set_userdata('allowedit', $row->iallowedit);
  			$CI->session->set_userdata('allowdelete', $row->iallowdelete);
  			
  			//$CI->session->set_userdata('tes_saja', 'ok => 1 => '.$row->iallowadd);
  
  			//echo '1 : ';
  			//print_r($CI->session->userdata);
  			//exit;
  			//echo 'set...';
  			//
  		} else {
  			return false;
  		}
	 }
}

if ( ! function_exists('write_log')) {
    function write_log($msg='') {
        $CI =&get_instance();	
        $username = $CI->session->userdata['username'];
		$prefix   = $CI->config->item('dbprefix');
		$exclude_ext = $CI->config->item('exclude_ext');
		$modules_name = $CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.$CI->uri->segment(3);//$CI->router->class.'/'.$CI->router->method;
		$ext_ = explode(".", $modules_name);
		$ext = end($ext_);
		
		//echo 'tes : '.$modules_name;exit;
		
		//$query = $CI->db->last_query();
	    if ( !empty($username) && !in_array($ext, $exclude_ext)) {
	        $timestamp = date('Y-m-d H:i:s');
	        $msg = str_replace("'", "`", $msg);
	        //if ($msg !='' ) echo $msg;
	        $where = [
	          'timelog' => $timestamp,
	          'username' => $username,
	          'modulename' => $modules_name
	        ];
	        $CI->db->select('count(*) as total');
	        $CI->db->where($where);
	        $query = $CI->db->get("{$prefix}t_log");
	        if ( $query->row()->total == 0 ) {
  	        $sql = "INSERT INTO {$prefix}t_log (timelog, username, modulename, querylog)
  	        values ('{$timestamp}', '{$username}', '{$modules_name}', '{$msg}')";
  	        $CI->db->query($sql);
	        }
	    }
    }   
}

if (!function_exists('get_app_notifications')) {
    function get_app_notifications() {
        $CI =& get_instance();
        if (empty($CI->session->userdata('logged_in'))) {
            return array();
        }

        $is_admin = (!empty($CI->session->isadmin) || !empty($CI->session->superuser) || (isset($CI->session->groupid) && $CI->session->groupid == 1));
        $username = (string)$CI->session->userdata('username');
        $tahun_berjalan = !empty($CI->session->settahun) ? $CI->session->settahun : date('Y');

        $notifs = array();

        if ($is_admin) {
            // === SUPERADMIN NOTIFICATIONS ===

            // 1. Progress Usulan Bendahara yang belum selesai selama tahun berjalan
            //    Mengikuti logika Progress_usulan_satker: ijns=1, ctahun berjalan, istatus != 7 (belum selesai)
            $sql_usulan = "SELECT COUNT(*) AS total_usulan
                           FROM app_t_usulan u
                           WHERE u.ijns = 1
                             AND u.ctahun = ?
                             AND u.istatus != 7";
            $q_usulan = $CI->db->query($sql_usulan, array($tahun_berjalan))->row();
            $total_incomp = !empty($q_usulan) ? (int)$q_usulan->total_usulan : 0;
            if ($total_incomp > 0) {
                $notifs[] = array(
                    'icon'  => 'fas fa-file-invoice text-warning',
                    'title' => 'Usulan Perubahan SK',
                    'msg'   => "Ada $total_incomp usulan SK satker yang sedang diajukan / belum selesai.",
                    // Mengarah ke halaman tersendiri Notifikasi Progres Usulan Satker (Sedang Diproses)
                    'url'   => base_url('perbend/progress_usulan_satker/progres_proses'),
                    'badge' => 'label-warning'
                );
            }

            // 2. Satker dengan status Proses Tanda Tangan SK (istatus = 6, total 4 satker)
            $sql_sk = "SELECT COUNT(DISTINCT u.iunorid) AS total_sk_unuploaded
                       FROM app_t_usulan u
                       WHERE u.ctahun = ? AND u.istatus = 6";
            $q_sk = $CI->db->query($sql_sk, array($tahun_berjalan))->row();
            $tot_sk_unuploaded = !empty($q_sk) ? (int)$q_sk->total_sk_unuploaded : 0;
            if ($tot_sk_unuploaded > 0) {
                $notifs[] = array(
                    'icon'  => 'fas fa-cloud-upload-alt text-danger',
                    'title' => 'SK Menteri Belum Unggah',
                    'msg'   => "Ada $tot_sk_unuploaded satker yang SK Menterinya belum diunggah.",
                    // Mengarah ke halaman Terbit SK (daftar satker terfilter status 6: Proses Tanda Tangan SK)
                    'url'   => base_url('perbend/t_terbit_sk') . '?link=notif_unggah_sk',
                    'badge' => 'label-danger'
                );
            }


        } else {
            // === OPERATOR SATKER NOTIFICATIONS ===
            // 1. Usulan yang belum selesai (masih draft / belum simpan kirim)
            $sql_draft = "SELECT id, cnousul FROM app_t_usulan 
                          WHERE (iunorid = ? OR ccreatedby = ?) AND istatus = 0 
                          ORDER BY id DESC LIMIT 10";
            $q_draft = $CI->db->query($sql_draft, array($username, $username))->result();
            if (!empty($q_draft)) {
                $tot_draft = count($q_draft);
                $notifs[] = array(
                    'icon'  => 'fas fa-edit text-warning',
                    'title' => 'Usulan Belum Dikirim',
                    'msg'   => "Ada $tot_draft usulan yang belum selesai (masih draft / belum simpan kirim).",
                    'url'   => base_url('perbend/t_usulan_satker'),
                    'badge' => 'label-warning'
                );
            }

            // 2. Belum input data pejabat perbendaharaan di tahun berjalan (2026)
            $sql_pejabat = "SELECT COUNT(*) AS total FROM app_t_usulan 
                            WHERE (iunorid = ? OR ccreatedby = ?) AND ctahun = ?";
            $q_pej = $CI->db->query($sql_pejabat, array($username, $username, $tahun_berjalan))->row();
            $tot_pej = !empty($q_pej) ? (int)$q_pej->total : 0;

            if ($tot_pej == 0) {
                $notifs[] = array(
                    'icon'  => 'fas fa-exclamation-triangle text-danger',
                    'title' => "Pejabat Tahun $tahun_berjalan",
                    'msg'   => "Anda belum menginput data pejabat perbendaharaan untuk tahun $tahun_berjalan.",
                    'url'   => base_url('perbend/t_usulan_satker'),
                    'badge' => 'label-danger'
                );
            }

            // 3. SK Menteri baru di-upload
            $sql_sk_new = "SELECT id, cnosk FROM app_t_usulan_sk 
                           WHERE (iunorid = ? OR ccreatedby = ?) AND ctahun = ? 
                           AND tfile IS NOT NULL AND tfile != '' 
                           ORDER BY id DESC LIMIT 5";
            $q_sk_new = $CI->db->query($sql_sk_new, array($username, $username, $tahun_berjalan))->result();
            if (!empty($q_sk_new)) {
                $tot_sk_new = count($q_sk_new);
                $notifs[] = array(
                    'icon'  => 'fas fa-file-pdf text-success',
                    'title' => 'SK Menteri Baru',
                    'msg'   => "Ada $tot_sk_new SK Menteri yang sudah diunggah untuk satker Anda.",
                    'url'   => base_url('perbend/detail_sk_kemdikbud'),
                    'badge' => 'label-success'
                );
            }
        }

        return $notifs;
    }
}

if (!function_exists('get_active_excel_satker_codes')) {
    function get_active_excel_satker_codes() {
        static $cached_codes = null;
        if ($cached_codes !== null) return $cached_codes;

        $filepath = (defined('FCPATH') ? FCPATH : 'C:/xampp/htdocs/siperben/') . 'db' . DIRECTORY_SEPARATOR . 'DAFTAR SATKER.xlsx';
        $satker_codes = array();

        if (file_exists($filepath)) {
            $zip = new ZipArchive;
            if ($zip->open($filepath) === TRUE) {
                $sharedStrings = array();
                if (($xml = $zip->getFromName('xl/sharedStrings.xml')) !== false) {
                    $sx = @simplexml_load_string($xml);
                    if ($sx && isset($sx->si)) {
                        foreach ($sx->si as $val) {
                            if (isset($val->t)) $sharedStrings[] = (string)$val->t;
                            elseif (isset($val->r)) {
                                $t = '';
                                foreach ($val->r as $r) $t .= (string)$r->t;
                                $sharedStrings[] = $t;
                            }
                        }
                    }
                }

                if (($xmlSheet = $zip->getFromName('xl/worksheets/sheet1.xml')) !== false) {
                    $sxSheet = @simplexml_load_string($xmlSheet);
                    if ($sxSheet && isset($sxSheet->sheetData->row)) {
                        $isFirst = true;
                        foreach ($sxSheet->sheetData->row as $r) {
                            if ($isFirst) { $isFirst = false; continue; }
                            $cells = array();
                            foreach ($r->c as $c) {
                                $v = (string)$c->v;
                                $t = (string)$c['t'];
                                $val = ($t === 's' && isset($sharedStrings[(int)$v])) ? $sharedStrings[(int)$v] : $v;
                                $cells[] = trim($val);
                            }
                            if (isset($cells[3])) {
                                $kode = str_replace("'", "", $cells[3]);
                                if (!empty($kode)) $satker_codes[] = $kode;
                            }
                        }
                    }
                }
                $zip->close();
            }
        }

        $cached_codes = !empty($satker_codes) ? $satker_codes : array();
        return $cached_codes;
    }
}

if (!function_exists('get_excel_eselon_satker_map')) {
    function get_excel_eselon_satker_map() {
        static $map = null;
        if ($map !== null) return $map;

        $filepath = (defined('FCPATH') ? FCPATH : 'C:/xampp/htdocs/siperben/') . 'db' . DIRECTORY_SEPARATOR . 'DAFTAR SATKER.xlsx';
        $map = array();

        if (file_exists($filepath)) {
            $zip = new ZipArchive;
            if ($zip->open($filepath) === TRUE) {
                $sharedStrings = array();
                if (($xml = $zip->getFromName('xl/sharedStrings.xml')) !== false) {
                    $sx = @simplexml_load_string($xml);
                    if ($sx && isset($sx->si)) {
                        foreach ($sx->si as $val) {
                            if (isset($val->t)) $sharedStrings[] = (string)$val->t;
                            elseif (isset($val->r)) {
                                $t = '';
                                foreach ($val->r as $r) $t .= (string)$r->t;
                                $sharedStrings[] = $t;
                            }
                        }
                    }
                }

                if (($xmlSheet = $zip->getFromName('xl/worksheets/sheet1.xml')) !== false) {
                    $sxSheet = @simplexml_load_string($xmlSheet);
                    if ($sxSheet && isset($sxSheet->sheetData->row)) {
                        $isFirst = true;
                        foreach ($sxSheet->sheetData->row as $r) {
                            if ($isFirst) { $isFirst = false; continue; }
                            $cells = array();
                            foreach ($r->c as $c) {
                                $v = (string)$c->v;
                                $t = (string)$c['t'];
                                $val = ($t === 's' && isset($sharedStrings[(int)$v])) ? $sharedStrings[(int)$v] : $v;
                                $cells[] = trim($val);
                            }
                            if (isset($cells[3])) {
                                $kode_satker = str_replace("'", "", $cells[3]);
                                $kode_eselon = isset($cells[1]) ? trim($cells[1]) : '';
                                $nama_eselon = isset($cells[2]) ? trim($cells[2]) : '';

                                if (!empty($kode_satker) && !empty($kode_eselon)) {
                                    $map[$kode_eselon][] = $kode_satker;

                                    $abbrv = '';
                                    if (strpos($nama_eselon, 'SEKRETARIAT JENDERAL') !== false) $abbrv = 'SETJEN';
                                    elseif (strpos($nama_eselon, 'INSPEKTORAT JENDERAL') !== false) $abbrv = 'ITJEN';
                                    elseif (strpos($nama_eselon, 'BAHASA') !== false) $abbrv = 'BAHASA';
                                    elseif (strpos($nama_eselon, 'VOKASI') !== false) $abbrv = 'VOKASI';
                                    elseif (strpos($nama_eselon, 'STANDAR') !== false) $abbrv = 'BSKAP';
                                    elseif (strpos($nama_eselon, 'ANAK USIA DINI') !== false) $abbrv = 'PAUD, DIKDASMEN';
                                    elseif (strpos($nama_eselon, 'TENAGA KEPENDIDIKAN') !== false) $abbrv = 'GTK';

                                    if (!empty($abbrv)) {
                                        $map[$abbrv][] = $kode_satker;
                                    }
                                }
                            }
                        }
                    }
                }
                $zip->close();
            }
        }

        return $map;
    }
}

if (!function_exists('get_excel_satkers_by_eselon')) {
    function get_excel_satkers_by_eselon($eselon_key) {
        $map = get_excel_eselon_satker_map();
        $key = trim($eselon_key);
        if (isset($map[$key])) {
            return array_values(array_unique($map[$key]));
        }
        return array();
    }
}

if (!function_exists('get_excel_satker_name_map')) {
    function get_excel_satker_name_map() {
        static $name_map = null;
        if ($name_map !== null) return $name_map;

        $filepath = (defined('FCPATH') ? FCPATH : 'C:/xampp/htdocs/siperben/') . 'db' . DIRECTORY_SEPARATOR . 'DAFTAR SATKER.xlsx';
        $name_map = array();

        if (file_exists($filepath)) {
            $zip = new ZipArchive;
            if ($zip->open($filepath) === TRUE) {
                $sharedStrings = array();
                if (($xml = $zip->getFromName('xl/sharedStrings.xml')) !== false) {
                    $sx = @simplexml_load_string($xml);
                    if ($sx && isset($sx->si)) {
                        foreach ($sx->si as $val) {
                            if (isset($val->t)) $sharedStrings[] = (string)$val->t;
                            elseif (isset($val->r)) {
                                $t = '';
                                foreach ($val->r as $r) $t .= (string)$r->t;
                                $sharedStrings[] = $t;
                            }
                        }
                    }
                }

                if (($xmlSheet = $zip->getFromName('xl/worksheets/sheet1.xml')) !== false) {
                    $sxSheet = @simplexml_load_string($xmlSheet);
                    if ($sxSheet && isset($sxSheet->sheetData->row)) {
                        $isFirst = true;
                        foreach ($sxSheet->sheetData->row as $r) {
                            if ($isFirst) { $isFirst = false; continue; }
                            $cells = array();
                            foreach ($r->c as $c) {
                                $v = (string)$c->v;
                                $t = (string)$c['t'];
                                $val = ($t === 's' && isset($sharedStrings[(int)$v])) ? $sharedStrings[(int)$v] : $v;
                                $cells[] = trim($val);
                            }
                            if (isset($cells[3]) && isset($cells[5])) {
                                $kode = str_replace("'", "", $cells[3]);
                                $nama = str_replace("'", "", $cells[5]);
                                if (!empty($kode) && !empty($nama)) {
                                    $name_map[$kode] = $nama;
                                }
                            }
                        }
                    }
                }
                $zip->close();
            }
        }

        return $name_map;
    }
}

if (!function_exists('get_excel_satker_name')) {
    function get_excel_satker_name($kode_satker, $fallback_name = '') {
        $map = get_excel_satker_name_map();
        $code = trim($kode_satker);
        if (!empty($code) && isset($map[$code])) {
            return $map[$code];
        }
        return !empty($fallback_name) ? $fallback_name : $code;
    }
}


if (!function_exists('get_perbend_menu_badge_counts')) {
    function get_perbend_menu_badge_counts() {
        $CI =& get_instance();
        $tahun = !empty($CI->session->settahun) ? $CI->session->settahun : date('Y');
        $q_satker = '';

        if (!$CI->session->superuser && !empty($CI->session->orgs)) {
            $user_orgs = array_keys($CI->session->orgs);
            $q_satker = " AND iunorid IN (" . implode(',', array_map(array($CI->db, 'escape'), $user_orgs)) . ")";
        } else {
            $active_codes = get_active_excel_satker_codes();
            if (!empty($active_codes)) {
                $q_satker = " AND iunorid IN (" . implode(',', array_map(array($CI->db, 'escape'), $active_codes)) . ")";
            }
        }

        $counts = array('Verifikator I' => 0, 'Verifikator II' => 0, 'Approval' => 0, 'Penerbitan SK' => 0);
        $status_to_menu = array(1 => 'Verifikator I', 2 => 'Verifikator II', 3 => 'Approval', 4 => 'Penerbitan SK', 6 => 'Penerbitan SK');
        $sql = "SELECT istatus, COUNT(*) AS total FROM app_t_usulan WHERE ctahun = ? AND ijns = 1 AND istatus IN (1,2,3,4,6) {$q_satker} GROUP BY istatus";
        $rows = $CI->db->query($sql, array($tahun))->result();
        foreach ($rows as $row) {
            $status = (int)$row->istatus;
            if (isset($status_to_menu[$status])) {
                $counts[$status_to_menu[$status]] += (int)$row->total;
            }
        }
        return $counts;
    }
}

if (!function_exists('inject_perbend_menu_badges')) {
    function inject_perbend_menu_badges($menu_html) {
        $counts = get_perbend_menu_badge_counts();
        foreach ($counts as $label => $count) {
            $safe_label = htmlspecialchars($label, ENT_QUOTES, 'UTF-8');
            $badge = $count > 0 ? " <small class='label pull-right bg-yellow' style='font-size:10px; margin-left:6px;'>" . number_format($count) . "</small>" : '';
            $menu_html = str_replace("<span>{$safe_label}</span>", "<span>{$safe_label}</span>{$badge}", $menu_html);
        }
        return $menu_html;
    }
}

if (!function_exists('get_nama_panjang_eselon')) {
    function get_nama_panjang_eselon($abbrv, $fallback = '') {
        static $map = array(
            '13801'           => 'SEKRETARIAT JENDERAL',
            'SETJEN'          => 'SEKRETARIAT JENDERAL',
            '13802'           => 'INSPEKTORAT JENDERAL',
            'ITJEN'           => 'INSPEKTORAT JENDERAL',
            '13803'           => 'DIREKTORAT JENDERAL GURU, TENAGA KEPENDIDIKAN, DAN PENDIDIKAN GURU',
            'GTK'             => 'DIREKTORAT JENDERAL GURU, TENAGA KEPENDIDIKAN, DAN PENDIDIKAN GURU',
            '13804'           => 'DIREKTORAT JENDERAL PENDIDIKAN ANAK USIA DINI, PENDIDIKAN DASAR, DAN PENDIDIKAN MENENGAH',
            'PAUD, DIKDASMEN' => 'DIREKTORAT JENDERAL PENDIDIKAN ANAK USIA DINI, PENDIDIKAN DASAR, DAN PENDIDIKAN MENENGAH',
            'PAUD'            => 'DIREKTORAT JENDERAL PENDIDIKAN ANAK USIA DINI, PENDIDIKAN DASAR, DAN PENDIDIKAN MENENGAH',
            '13805'           => 'DIREKTORAT JENDERAL PENDIDIKAN VOKASI, PENDIDIKAN KHUSUS, DAN PENDIDIKAN LAYANAN KHUSUS',
            'VOKASI'          => 'DIREKTORAT JENDERAL PENDIDIKAN VOKASI, PENDIDIKAN KHUSUS, DAN PENDIDIKAN LAYANAN KHUSUS',
            '13811'           => 'BADAN STANDAR KURIKULUM DAN ASESMEN PENDIDIKAN',
            'BSKAP'           => 'BADAN STANDAR KURIKULUM DAN ASESMEN PENDIDIKAN',
            '13812'           => 'BADAN PENGEMBANGAN DAN PEMBINAAN BAHASA',
            'BAHASA'          => 'BADAN PENGEMBANGAN DAN PEMBINAAN BAHASA'
        );
        $key = strtoupper(trim($abbrv));
        if (isset($map[$key])) {
            return $map[$key];
        }
        return !empty($fallback) ? $fallback : $abbrv;
    }
}

?>


