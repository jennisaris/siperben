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

	    $ar_status = [];
	    $rows = $this->getall('', $this->prefix.'_m_status', '*', array('ldeleted'=>0));
		foreach($rows as $r) {
		  $ar_statusid[$r->id] = $r->vdesc;
		}
		
		$ar_statusperubahan = [];
		$rows = $this->getall('', $this->prefix.'_m_perubahan', '*', array('ldeleted'=>0));
		foreach($rows as $r) {
		  $ar_statusperubahan[$r->id] = $r->vdesc;
		}
		
		
		$ar_statususulan = (!empty($this->session->sysparam) && isset($this->session->sysparam->status_usulan)) ? $this->session->sysparam->status_usulan : array();
		
  		$html = '';
  		
  		if ( $page_ke == 0 ) {
  			 $this->session->{$this->table.'_page'} = 1;
  		} else {
  			if ( $this->session->{$this->table.'_page'} == '' ) {
  				$this->session->{$this->table.'_page'} = 1;
  			} else {
  			  if ( $page_ke != 0 ) $this->session->{$this->table.'_page'} = $page_ke;
  			}
  		}
  		
  		$page = (int)$this->session->{$this->table.'_page'};
  
  		$offset = ($page - 1) * $this->limit;
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
					Periode {$nama_bulan} {$this->session->settahun} | Status: {$st_title}
					</td>
				</tr>
				</table>";
		}
  		
  		$html .= "<table {$style} class='table table-bordered table-hover'>";
  		$html .= "<tr>";
  		$html .= "<th>No.</th>";
		$html .= "<th>Eselon I</th>";
  		$html .= "<th>Satuan Kerja</th>";
  		$html .= "<th>No. Usul</th>";
  		$html .= "<th>Tgl. Usul</th>";
  		$html .= "<th>Status Perubahan</th>";
  		$html .= "<th>Jenis Perubahan</th>";
  		$html .= "<th>Status</th>";
  		$html .= "<th>Tgl.Input</th>";
  		$html .= "</tr>";
  		
  	
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
  		
  		if (!$this->session->superuser) {
  		  $orgs = [];
  		  foreach($this->session->orgs as $k=>$v) {
  		    $orgs[] = $k;
  		  }
  		  
  		  $orgs = "'".implode("','", $orgs)."'";
  		  $sql .=" and iunorid in ({$orgs})";
  		}
  		
  		$sql .= " ORDER BY dtglusul DESC, id DESC";
  		
    		$query = $this->db->query($sql);
    
		if ( !$reports ) {
    		$this->session->jum_rec  = $query->num_rows();
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
    		foreach ($unor_rows as $u) {
    		$unor_map[$u->kode] = ['nama' => $u->nama, 'kode_atasan' => $u->kode_atasan];
    		$unor_nama_map[$u->kode] = $u->nama;
    		}

    		$no=1;
    		foreach($rows as $kode) {
  	  
    		if ( $offset == 0 ) $norut = $no;
    		else $norut = ($no+$offset);
  	
    		$html .= "<tr>";
    		$html .= "<td>".$norut."</td>";
    		$unor_atasan_kode = isset($unor_map[$kode->iunorid]) ? $unor_map[$kode->iunorid]['kode_atasan'] : '';
    		$unor_atasan_nama = isset($unor_nama_map[$unor_atasan_kode]) ? $unor_nama_map[$unor_atasan_kode] : '-';
    		$html .= "<td>".strtoupper($unor_atasan_nama)."</td>";
    		$html .= "<td>".(isset($unor_nama_map[$kode->iunorid]) ? $unor_nama_map[$kode->iunorid] : $kode->iunorid)."( ".$kode->iunorid.")</td>";
  		  $html .= "<td><a href='".base_url()."perbend/t_usulan_satker'>".$kode->cnousul."</a></td>";
  		  $html .= "<td>".date('d-m-y', strtotime($kode->dtglusul))."</td>";
  		  $st_id = isset($ar_statusid[$kode->istatusid]) ? $ar_statusid[$kode->istatusid] : '-';
  		  $st_perubahan = isset($ar_statusperubahan[$kode->ijnsprubhnid]) ? $ar_statusperubahan[$kode->ijnsprubhnid] : '-';
  		  $st_usulan = (is_array($ar_statususulan) && isset($ar_statususulan[$kode->istatus])) ? $ar_statususulan[$kode->istatus] : (isset($kode->istatus) ? 'Status '.$kode->istatus : '-');

  		  $html .= "<td>".$st_id."</td>";
  		  $html .= "<td>".$st_perubahan."</td>";
  		  $html .= "<td>".$st_usulan."</td>";
  		  $html .= "<td>".date('d-m-y', strtotime($kode->tcreated))."</td>";
  		  $html .= "</tr>";

  		  $no++;
  		  
  		}
	} else {
	  $html .="<tr><td colspan='10'><b>Data tidak ditemukan</b></td></tr>";
	}
}
  		
  		$html .= "</table>";
		
		if ( !$reports ) {
			$html .= "<div align='right'>
						<button type='button' name='btn_export_excel_progress' 
						id='btn_export_excel_progress' class='btn btn-success btn_export_excel_progress' 
						onclick='download(\"".base_url()."perbend/progress_usulan_satker/lists/0/{$q}/0/1/{$status}\");'
						><i class='fas fa-file-excel'></i> Export Ke Excel</button>
					</div>";
					
			$html .= "<script type='text/javascript'>
						function download(url) {
							window.open(url, '_download_');
						  }
					  </script>";
					
			$pagination = $this->_ajaxPagination(base_url()."perbend/progress_usulan_satker/lists/{$offset}/{$q}/0/0/{$status}", $this->kriteria, 'progress_usulan_satker', $offset);
			$hasil['html'] = array('html'=>$html);
			$hasil['pagination'] = $pagination;
	  
			echo json_encode($hasil);
		} else {
			$filename = "progress_reports_" . date('Ymd') . ".xls";

			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Content-Type: application/vnd.ms-excel");
			echo $html;
			exit;
		}
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