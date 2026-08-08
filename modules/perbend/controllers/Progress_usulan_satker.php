<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require_once "modules/kepegawaian/controllers/M_kepegawaian_unor.php";
require_once "M_unor.php";
class Progress_usulan_satker extends MX_Controller {
  var $prefix = 'app';
  var $table;
  var $kriteria;
  var $limit=5;
	public function __construct() {
		parent::__construct();
		$controller = "perbend/progress_usulan_satker";
		$this->table  = $this->prefix."_t_usulan";

    	$this->_setTitle('Progres Usulan Satker');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);
		
		$this->_setHTMLTemplate('', 'laporan/list');

		//clear session header_controller
		$this->session->unset_userdata('header_controller'); 
	}
	
	function manipulate_list_button($buttons) {
		// Halaman monitoring only — semua tombol aksi disembunyikan
		return array();
	}
	
	function lists($xx='', $q=0, $page_ke='',$reports=false, $status='all') {
		if (isset($_REQUEST['pub_bulan']) && $_REQUEST['pub_bulan'] !== '') {
			$q = $_REQUEST['pub_bulan'];
		}
		if (isset($_REQUEST['pub_status']) && $_REQUEST['pub_status'] !== '') {
			$status = $_REQUEST['pub_status'];
		}

	    $ar_statusid = array();
	    $rows = $this->getall('', $this->prefix.'_m_status', '*', array('ldeleted'=>0));
		if (!empty($rows) && (is_array($rows) || is_object($rows))) {
			foreach($rows as $r) {
			  $ar_statusid[$r->id] = $r->vdesc;
			}
		}
		
		$ar_statusperubahan = array();
		$rows = $this->getall('', $this->prefix.'_m_perubahan', '*', array('ldeleted'=>0));
		if (!empty($rows) && (is_array($rows) || is_object($rows))) {
			foreach($rows as $r) {
			  $ar_statusperubahan[$r->id] = $r->vdesc;
			}
		}
		
		$ar_statususulan = (!empty($this->session->sysparam) && isset($this->session->sysparam->status_usulan)) ? $this->session->sysparam->status_usulan : array();
		
  		$html = '';
  		
  		// Detect active page accurately from last URI segment or parameters
  		$uri_segments = $this->uri->segment_array();
  		$last_segment = end($uri_segments);
  		
  		$page = 1;
  		if (is_numeric($last_segment) && (int)$last_segment > 0) {
  			$page = (int)$last_segment;
  		} else if (is_numeric($xx) && (int)$xx > 0) {
  			$page = (int)$xx;
  		} else if (is_numeric($page_ke) && (int)$page_ke > 0) {
  			$page = (int)$page_ke;
  		}
  		
  		$session_page_key = $this->table.'_page';
  		$this->session->set_userdata($session_page_key, $page);
  		
  		$offset = ($page - 1) * $this->limit;
  		if ($offset < 0) $offset = 0;

		$this->kriteria['q'] = $q;
		$this->kriteria['status'] = $status;
		$this->kriteria = (object) $this->kriteria;
  		
  		if ($reports) $style='border=1';
  		else $style='';
		
		if ( $reports ) {
			$nama_bulan = (!empty($q) && $q !== '0' ? (isset($this->session->sysparam->nama_bulan[$q]) ? $this->session->sysparam->nama_bulan[$q] : $q) : "Semua Bulan");
			$st_title = ($status !== 'all' && isset($ar_statususulan[$status])) ? $ar_statususulan[$status] : "Semua Status";
			$html .= "<table>
				<tr>
					<td colspan='9'>
					Periode {$nama_bulan} " . (!empty($this->session->settahun) ? $this->session->settahun : date('Y')) . " | Status: {$st_title}
					</td>
				</tr>
				</table>";
		}
  		
		/* Tidak ada style blok tambahan — seragam dengan Unit Utama yang mengandalkan inline style */
		$html .= "";

  		/* Output tabel — overflow-x:auto ada di #progress-usulan-scroll-container */
  		$html .= "<table {$style} class='table table-bordered table-striped table-condensed' style='font-size:11px; margin-bottom:0; width:100%; table-layout:fixed;'>";
  		$html .= "<colgroup>
  			<col style='width:3%;'>
  			<col style='width:18%;'>
  			<col style='width:20%;'>
  			<col style='width:14%;'>
  			<col style='width:8%;'>
  			<col style='width:9%;'>
  			<col style='width:10%;'>
  			<col style='width:10%;'>
  			<col style='width:8%;'>
  		</colgroup>";
  		$html .= "<thead>";
  		$html .= "<tr style='background: #f8fafc;'>";
  		$html .= "<th style='text-align:center; vertical-align:middle;'>No.</th>";
		$html .= "<th style='vertical-align:middle; overflow:hidden; text-overflow:ellipsis; white-space:normal;'>Eselon I</th>";
  		$html .= "<th style='vertical-align:middle; overflow:hidden; text-overflow:ellipsis; white-space:normal;'>Satuan Kerja</th>";
  		$html .= "<th style='text-align:center; vertical-align:middle; overflow:hidden; white-space:normal;'>No. Usul</th>";
  		$html .= "<th style='text-align:center; vertical-align:middle; overflow:hidden; white-space:normal;'>Tgl. Usul</th>";
  		$html .= "<th style='vertical-align:middle; overflow:hidden; white-space:normal;'>Status Perubahan</th>";
  		$html .= "<th style='vertical-align:middle; overflow:hidden; white-space:normal;'>Jenis Perubahan</th>";
  		$html .= "<th style='text-align:center; vertical-align:middle; overflow:hidden; white-space:normal;'>Status</th>";
  		$html .= "<th style='text-align:center; vertical-align:middle; overflow:hidden; white-space:normal;'>Tgl. Input</th>";
  		$html .= "</tr>";
  		$html .= "</thead><tbody>";

  		
  	
		if ( !empty(trim($q)) && $q !== '0') { $q = (int)$q; $qq = " and month(dtglusul) = '{$q}'"; } else { $qq = ""; }
		
		$qstatus = "";
		if ($status !== 'all' && $status !== '' && $status !== NULL) {
			$st_val = (int)$status;
			$qstatus = " and istatus = '{$st_val}'";
		}

		// Filter 144 Satker Aktif dari DAFTAR SATKER.xlsx
		$active_codes = get_active_excel_satker_codes();
		$qactive = "";
		if (!empty($active_codes)) {
			$str_active_codes = implode(',', array_map(array($this->db, 'escape'), $active_codes));
			$qactive = " and iunorid in ({$str_active_codes})";
		}

		$settahun = !empty($this->session->settahun) ? $this->session->settahun : date('Y');

  		// Tampilkan usulan HANYA dari 144 Satker Aktif Excel
		$sql = "Select id, ijns, iunorid, cnousul, dtglusul, istatusid, tcreated, ijnsprubhnid, istatus 
		  		from app_t_usulan where ijns = 1 {$qq} {$qstatus} {$qactive}
				and ctahun = '{$settahun}'";
  		
  		if (empty($this->session->superuser) && !empty($this->session->orgs) && (is_array($this->session->orgs) || is_object($this->session->orgs))) {
  		  $orgs = array();
  		  foreach($this->session->orgs as $k=>$v) {
  		    $orgs[] = $k;
  		  }
  		  if (!empty($orgs)) {
  		    $str_orgs = "'".implode("','", $orgs)."'";
  		    $sql .= " and iunorid in ({$str_orgs})";
  		  }
  		}
  		
  		$sql .= " ORDER BY dtglusul DESC, id DESC";
  		
    	$query = $this->db->query($sql);
    
		if ( !$reports ) {
    		$this->session->jum_rec  = $query ? $query->num_rows() : 0;
    		$this->session->jum_page = ceil($this->session->jum_rec/$this->limit);
    
    		$sql .= " limit {$this->limit} offset {$offset}";
		}
    		
    		$query = $this->db->query($sql);
    		if ($query) {
    		$rows = $query->result();
    		if (sizeOf($rows) > 0) {

    		// OPTIMIZED: preload app_m_unor sekali, hindari N+1 query
    		$unor_rows = $this->getall('', 'app_m_unor', 'kode, kode_atasan, nama', array('deleted' => 0));
    		$unor_map = []; // kode => ['nama' => ..., 'kode_atasan' => ...]
    		$unor_nama_map = []; // kode => nama
    		if (!empty($unor_rows)) {
    		  foreach ($unor_rows as $u) {
    		    $unor_map[$u->kode] = ['nama' => $u->nama, 'kode_atasan' => $u->kode_atasan];
    		    $unor_nama_map[$u->kode] = $u->nama;
    		  }
    		}

    		$no=1;
    		foreach($rows as $kode) {
  	  
    		if ( $offset == 0 ) $norut = $no;
    		else $norut = ($no+$offset);
  	
    		$html .= "<tr>";
    		$html .= "<td class='text-center'>".$norut."</td>";
    		$unor_atasan_kode = isset($unor_map[$kode->iunorid]) ? $unor_map[$kode->iunorid]['kode_atasan'] : '';
    		$unor_atasan_nama = isset($unor_nama_map[$unor_atasan_kode]) ? $unor_nama_map[$unor_atasan_kode] : '-';
    		$html .= "<td><strong>".strtoupper($unor_atasan_nama)."</strong></td>";
    		$html .= "<td>".(isset($unor_nama_map[$kode->iunorid]) ? $unor_nama_map[$kode->iunorid] : $kode->iunorid)." (<b>".$kode->iunorid."</b>)</td>";
  		  $html .= "<td class='text-center'><a href='".base_url()."perbend/t_usulan_satker' style='font-weight: 700; text-decoration: underline;'>".$kode->cnousul."</a></td>";
  		  $html .= "<td class='text-center'>".(!empty($kode->dtglusul) && $kode->dtglusul != '0000-00-00' ? date('d-m-Y', strtotime($kode->dtglusul)) : '-')."</td>";
  		  $st_id = isset($ar_statusid[$kode->istatusid]) ? $ar_statusid[$kode->istatusid] : '-';
  		  $st_perubahan = isset($ar_statusperubahan[$kode->ijnsprubhnid]) ? $ar_statusperubahan[$kode->ijnsprubhnid] : '-';
  		  $raw_status = (is_array($ar_statususulan) && isset($ar_statususulan[$kode->istatus])) ? $ar_statususulan[$kode->istatus] : (isset($kode->istatus) ? 'Status '.$kode->istatus : '-');
  		  
  		  // Format status badge — seragam dengan tblModalCert di Unit Utama
  		  if ($kode->istatus == 7 || strtolower($raw_status) == 'selesai' || $kode->istatus == 4) {
  		      $badge_class = 'label-success';
  		  } else if ($kode->istatus == 5 || strpos(strtolower($raw_status), 'tolak') !== false) {
  		      $badge_class = 'label-danger';
  		  } else if ($kode->istatus == 0 || strtolower($raw_status) == 'draft') {
  		      $badge_class = 'label-default';
  		  } else {
  		      $badge_class = 'label-warning';
  		  }
  		  $st_usulan = "<span class='label {$badge_class}' style='font-size: 10px;'>".$raw_status."</span>";

  		  $html .= "<td>".$st_id."</td>";
  		  $html .= "<td>".$st_perubahan."</td>";
  		  $html .= "<td class='text-center'>".$st_usulan."</td>";
  		  $html .= "<td class='text-center'>".(!empty($kode->tcreated) ? date('d-m-Y', strtotime($kode->tcreated)) : '-')."</td>";
  		  $html .= "</tr>";

  		  $no++;
  		  
  		}
	} else {
	  $html .="<tr><td colspan='9' class='text-center text-muted' style='padding: 20px;'><b>Data usulan tidak ditemukan</b></td></tr>";
	}
}
  		
  		$html .= "</tbody></table>";
		
		if ( !$reports ) {
			$html .= "<div align='right' style='margin-top: 8px;'>
						<button type='button' name='btn_export_excel_progress' 
						id='btn_export_excel_progress' class='btn btn-success btn-xs btn_export_excel_progress' style='border-radius: 6px; font-size: 11px;'
						onclick='download(\"".base_url()."perbend/progress_usulan_satker/lists/1/{$q}/0/1/{$status}\");'
						><i class='fa fa-file-excel-o'></i> Export Ke Excel</button>
					</div>";
					
			$html .= "<script type='text/javascript'>
						function download(url) {
							window.open(url, '_download_');
						  }
					  </script>";
					
			$base_paging_url = base_url()."perbend/progress_usulan_satker/lists/1/{$q}/0/0/{$status}";
			$pagination = $this->_ajaxPagination($base_paging_url, $this->kriteria, 'progress_usulan_satker', $offset);
			$hasil['html'] = array('html'=>$html);
			$hasil['pagination'] = $pagination;
	  
			if (ob_get_length()) {
				@ob_clean();
			}
			header('Content-Type: application/json; charset=utf-8');
			echo json_encode($hasil);
			exit;
		} else {
			$filename = "progress_reports_" . date('Ymd') . ".xls";

			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Content-Type: application/vnd.ms-excel");
			echo $html;
			exit;
		}
	}

	public function progres_proses() {
		$data = array();
		$data['title']    = 'Notifikasi Progres Usulan Satker (Sedang Diproses)';
		$data['settahun'] = !empty($this->session->settahun) ? $this->session->settahun : date('Y');

		$this->_setTitle('Notifikasi Progres Usulan Satker (Sedang Diproses)');
		$this->template->display('laporan/list_progres_proses', $data, TRUE);
	}

	function progres_proses_lists($page=1, $q=0, $reports=false) {
		if (isset($_REQUEST['pub_proses_bulan']) && $_REQUEST['pub_proses_bulan'] !== '') {
			$q = $_REQUEST['pub_proses_bulan'];
		}
		$page = (int)$page;
		if ($page < 1) $page = 1;

		$offset = ($page - 1) * $this->limit;
		if ($offset < 0) $offset = 0;

		$ar_statusid = array();
		$rows = $this->getall('', $this->prefix.'_m_status', '*', array('ldeleted'=>0));
		if (!empty($rows)) {
			foreach($rows as $r) {
				$ar_statusid[$r->id] = $r->vdesc;
			}
		}

		$ar_statusperubahan = array();
		$rows = $this->getall('', $this->prefix.'_m_perubahan', '*', array('ldeleted'=>0));
		if (!empty($rows)) {
			foreach($rows as $r) {
				$ar_statusperubahan[$r->id] = $r->vdesc;
			}
		}

		$ar_statususulan = (!empty($this->session->sysparam) && isset($this->session->sysparam->status_usulan)) ? $this->session->sysparam->status_usulan : array();

		$settahun = !empty($this->session->settahun) ? $this->session->settahun : date('Y');

		$qsatker = "";
		$is_admin = (!empty($this->session->superuser) || !empty($this->session->isadmin) || (isset($this->session->groupid) && in_array((int)$this->session->groupid, array(1, 7, 8, 10, 11, 12, 13, 14, 15, 16))));
		if (!$is_admin) {
			if (!empty($this->session->orgs) && (is_array($this->session->orgs) || is_object($this->session->orgs))) {
				$orgs = array();
				foreach($this->session->orgs as $k=>$v) {
					$orgs[] = $this->db->escape($k);
				}
				if (!empty($orgs)) {
					$str_orgs = implode(',', $orgs);
					$qsatker = " AND iunorid IN ({$str_orgs})";
				}
			} else if (!empty($this->session->username)) {
				$user_satker = $this->db->escape(trim($this->session->username));
				$qsatker = " AND (iunorid = {$user_satker} OR ccreatedby = {$user_satker})";
			}
		} else {
			$active_codes = get_active_excel_satker_codes();
			if (!empty($active_codes)) {
				$str_active_codes = implode(',', array_map(array($this->db, 'escape'), $active_codes));
				$qsatker = " AND iunorid IN ({$str_active_codes})";
			}
		}

		$qq = "";
		if (isset($_REQUEST['id']) && !empty($_REQUEST['id'])) {
			$raw_id = $_REQUEST['id'];
			if (strpos($raw_id, '/') !== false) {
				$raw_id = explode('/', $raw_id)[0];
			}
			$usulan_id = (int)$raw_id;
			if ($usulan_id > 0) {
				$qq = " AND id = {$usulan_id}";
			}
		} 
		
		if (empty($qq)) {
			// Filter Tahun dari Dropdown atau Fallback ke $settahun
			if (isset($_REQUEST['pub_proses_tahun']) && $_REQUEST['pub_proses_tahun'] !== '' && $_REQUEST['pub_proses_tahun'] !== '0') {
				$f_tahun = $this->db->escape_like_str(trim($_REQUEST['pub_proses_tahun']));
				$qq .= " AND ctahun = '{$f_tahun}'";
			} else if (isset($_REQUEST['tahun']) && $_REQUEST['tahun'] !== '' && $_REQUEST['tahun'] !== '0') {
				$f_tahun = $this->db->escape_like_str(trim($_REQUEST['tahun']));
				$qq .= " AND ctahun = '{$f_tahun}'";
			} else if (!isset($_REQUEST['pub_proses_tahun']) && !isset($_REQUEST['id']) && !isset($_REQUEST['q']) && !isset($_REQUEST['search_usul'])) {
				$qq .= " AND ctahun = '{$settahun}'";
			}

			// Filter Bulan Usulan
			if (isset($_REQUEST['pub_proses_bulan']) && !empty($_REQUEST['pub_proses_bulan']) && $_REQUEST['pub_proses_bulan'] !== '0') {
				$f_bulan = (int)$_REQUEST['pub_proses_bulan'];
				$qq .= " AND month(dtglusul) = '{$f_bulan}'";
			}

			// Filter Pencarian No. Usul / String
			if (isset($_REQUEST['search_usul']) && !empty($_REQUEST['search_usul'])) {
				$raw_q = trim($_REQUEST['search_usul']);
				$q_clean = $this->db->escape_like_str($raw_q);
				$qq .= " AND cnousul LIKE '%{$q_clean}%'";
			} else if (isset($_REQUEST['q']) && !empty(trim($_REQUEST['q'])) && $_REQUEST['q'] !== '0') {
				$q_str = trim($_REQUEST['q']);
				if (preg_match('/^(\d+)\/\d+$/', $q_str, $m)) {
					$q_str = $m[1];
				}
				if (is_numeric($q_str) && (int)$q_str >= 1 && (int)$q_str <= 12) {
					$q_val = (int)$q_str;
					$qq .= " AND month(dtglusul) = '{$q_val}'";
				} else {
					if (substr($q_str, -2) === '/0' || substr($q_str, -2) === '/1') {
						$q_str = substr($q_str, 0, -2);
					}
					$q_clean = $this->db->escape_like_str($q_str);
					$qq .= " AND cnousul LIKE '%{$q_clean}%'";
				}
			}
		}

		// KETAT: Hanya usulan perubahan SK yang SEDANG DIPROSES (istatus != 0 DRAFT dan istatus != 7 SELESAI)
		$sql = "SELECT id, ijns, iunorid, cnousul, dtglusul, istatusid, tcreated, ijnsprubhnid, istatus 
				FROM app_t_usulan 
				WHERE ijns = 1 AND istatus != 0 AND istatus != 7 {$qq} {$qsatker}
				ORDER BY dtglusul DESC, id DESC";

		$query = $this->db->query($sql);
		$this->session->jum_rec = $query ? $query->num_rows() : 0;

		$sql_paged = $sql . " LIMIT {$this->limit} OFFSET {$offset}";
		$query_paged = $this->db->query($sql_paged);

		$html = "<table class='table table-bordered table-striped table-condensed' style='font-size:11px; margin-bottom:0; width:100%; table-layout:fixed;'>";
		$html .= "<colgroup>
			<col style='width:3%;'>
			<col style='width:22%;'>
			<col style='width:22%;'>
			<col style='width:14%;'>
			<col style='width:7%;'>
			<col style='width:8%;'>
			<col style='width:8%;'>
			<col style='width:9%;'>
			<col style='width:7%;'>
		</colgroup>";
		$html .= "<thead>
			<tr style='background: #fff7ed;'>
				<th style='text-align:center; vertical-align:middle;'>No.</th>
				<th style='vertical-align:middle; overflow:hidden; text-overflow:ellipsis;'>Eselon I</th>
				<th style='vertical-align:middle; overflow:hidden; text-overflow:ellipsis;'>Satuan Kerja</th>
				<th style='text-align:center; vertical-align:middle; overflow:hidden;'>No. Usul</th>
				<th style='text-align:center; vertical-align:middle; overflow:hidden;'>Tgl. Usul</th>
				<th style='vertical-align:middle; overflow:hidden;'>Status Perubahan</th>
				<th style='vertical-align:middle; overflow:hidden;'>Jenis Perubahan</th>
				<th style='text-align:center; vertical-align:middle; overflow:hidden;'>Status Proses</th>
				<th style='text-align:center; vertical-align:middle; overflow:hidden;'>Tgl. Input</th>
			</tr>
		</thead><tbody>";

		if ($query_paged && $query_paged->num_rows() > 0) {
			$rows = $query_paged->result();

			$unor_rows = $this->getall('', 'app_m_unor', 'kode, kode_atasan, nama', array('deleted' => 0));
			$unor_nama_map = [];
			if (!empty($unor_rows)) {
				foreach ($unor_rows as $u) {
					$unor_nama_map[trim($u->kode)] = $u->nama;
				}
			}

			$no = 1;
			foreach ($rows as $kode) {
				$norut = ($offset == 0) ? $no : ($no + $offset);

				$satker_code = trim($kode->iunorid);
				$fallback_nama = isset($unor_nama_map[$satker_code]) ? $unor_nama_map[$satker_code] : 'Satker ' . $satker_code;
				$satker_nama = get_excel_satker_name($satker_code, $fallback_nama);
				
				$eselon_nama = function_exists('get_nama_panjang_eselon') ? get_nama_panjang_eselon($satker_code) : '-';
				if (empty($eselon_nama) || $eselon_nama === '-' || $eselon_nama === $satker_code) {
					$eselon_nama = 'KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN';
				}

				$st_id = isset($ar_statusid[$kode->istatusid]) ? $ar_statusid[$kode->istatusid] : '-';
				$st_perubahan = isset($ar_statusperubahan[$kode->ijnsprubhnid]) ? $ar_statusperubahan[$kode->ijnsprubhnid] : '-';
				$raw_status = (is_array($ar_statususulan) && isset($ar_statususulan[$kode->istatus])) ? $ar_statususulan[$kode->istatus] : 'Status '.$kode->istatus;

				if ($kode->istatus == 6) {
					$badge_class = 'label-warning';
				} else if ($kode->istatus == 4) {
					$badge_class = 'label-info';
				} else if ($kode->istatus == 5) {
					$badge_class = 'label-danger';
				} else {
					$badge_class = 'label-primary';
				}
				$st_usulan = "<span class='label {$badge_class}' style='font-size: 10px;'><i class='fa fa-clock-o'></i> ".$raw_status."</span>";

				$html .= "<tr>";
				$html .= "<td class='text-center'>".$norut."</td>";
				$html .= "<td><strong>".strtoupper($eselon_nama)."</strong></td>";
				$html .= "<td>".$satker_nama." (<b>".$satker_code."</b>)</td>";
				$target_mod = (!empty($this->session->superuser) || !empty($this->session->isadmin)) ? 't_usulan_verifikator' : 't_usulan_satker';
				$html .= "<td class='text-center'><a href='".base_url()."perbend/".$target_mod."?q=".urlencode($kode->cnousul)."' style='font-weight: 700; text-decoration: underline; color: #0284c7;'>".$kode->cnousul."</a></td>";
				$html .= "<td class='text-center'>".(!empty($kode->dtglusul) && $kode->dtglusul != '0000-00-00' ? date('d-m-Y', strtotime($kode->dtglusul)) : '-')."</td>";
				$html .= "<td>".$st_id."</td>";
				$html .= "<td>".$st_perubahan."</td>";
				$html .= "<td class='text-center'>".$st_usulan."</td>";
				$html .= "<td class='text-center'>".(!empty($kode->tcreated) ? date('d-m-Y', strtotime($kode->tcreated)) : '-')."</td>";
				$html .= "</tr>";

				$no++;
			}
		} else {
			$html .= "<tr><td colspan='9' class='text-center text-muted' style='padding: 20px;'><b>Tidak ada usulan perubahan SK yang sedang diproses saat ini</b></td></tr>";
		}

		$html .= "</tbody></table>";

		$base_paging_url = base_url()."perbend/progress_usulan_satker/progres_proses_lists/1";
		$pagination = $this->_ajaxPagination($base_paging_url, (object)array(), 'progres_proses', $offset);
		$hasil['html'] = array('html' => $html);
		$hasil['pagination'] = $pagination;

		if (ob_get_length()) {
			@ob_clean();
		}
		header('Content-Type: application/json; charset=utf-8');
		echo json_encode($hasil);
		exit;
	}
	
  function app_t_usulan_output() {
        $js = "<script type='text/javascript'>
                    $(document).ready(function() {
            
                    });
                    
                    function download(url) {
        	            window.open(url, '_download_');
        	          }
                </script>
            ";

        return $js;
  }
}