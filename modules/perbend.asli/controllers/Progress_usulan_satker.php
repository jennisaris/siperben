<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require_once "modules/kepegawaian/controllers/M_kepegawaian_unor.php";
require_once "M_unor.php";
class Progress_usulan_satker extends MX_Controller {
  var $prefix = 'app';
  var $table;
  
  var $limit=10;
	public function __construct() {
		parent::__construct();
		$controller = "perbend/progress_usulan_satker";
		$this->table  = $this->prefix."_t_usulan";

    	$this->_setTitle('Progres Usulan Satker');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);
		
		//$this->_setHTMLTemplate('', 'laporan/list');

		//clear session header_controller
		$this->session->unset_userdata('header_controller'); 
	}
	
	function manipulate_list_button($buttons) {
		$btn_cetak = "<button type='button' class='btn btn-succcess btn_cetak' id='btn_cetak' name='btn_cetak'>
		<i class='fas fa-xlsx'></i> Cetak</button>";
		$buttons['cetak'] = $btn_cetak;
		
		return $buttons;
	}
	
	function lists($xx='', $q=0, $page_ke='',$reports=false) {
		//echo $page_ke.' => '.$q.' => ';
		//exit;
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
		
		
		$ar_statususulan = $this->session->sysparam->status_usulan;
		
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
  		
  		$page = $this->session->{$this->table.'_page'};
  
  		$offset = ($page - 1) * $this->limit;
  		/*foreach ($_POST as $k=>$v) {			
  			$krit = str_replace("q_", "", $k);
  			$this->kriteria[$krit] = $this->input->post($k);
  		}
  		$this->kriteria = (object)$this->kriteria;*/
		$this->kriteria['q'] = $q;
		$this->kriteria = (object) $this->kriteria;
  		
  		if ($reports) $style='border=1';
  		else $style='';
		
		if ( $reports ) {
			$nama_bulan = ($q !=0 ? $this->session->sysparam->nama_bulan[$q] : "Semua");
			$html .= "<table>
				<tr>
					<td colspan='7'>
					Periode {$nama_bulan} {$this->session->settahun}
					</td>
				</tr>
				</table>";
		}
  		
  		$html .= "<table {$style} class='table bordered'>";
  		$html .= "<tr>";
  		$html .= "<th>No.</th>";
  		$html .= "<th>Satuan Kerja</th>";
  		$html .= "<th>No. Usul</th>";
  		$html .= "<th>Tgl. Usul</th>";
  		$html .= "<th>Status Perubahan</th>";
  		$html .= "<th>Jenis Perubahan</th>";
  		$html .= "<th>Status</th>";
  		$html .= "</tr>";
  		
  	
  		//$kodeunitutamas = $this->session->kodeunitutamas;
		if ( !empty(trim($q))) { $q = (int)$q;$qq = " and month(dtglusul) = '{$q}'";} else {$qq="";}
  		$sql = "Select id, ijns, iunorid, cnousul, dtglusul, istatusid, ijnsprubhnid, istatus 
		  		from app_t_usulan where ijns = 1 and istatus != 7 {$qq} 
				and ctahun = '{$this->session->settahun}'";
		//echo $sql;exit;
  		
  		if (!$this->session->superuser) {
  		  $orgs = [];
  		  foreach($this->session->orgs as $k=>$v) {
  		    $orgs[] = $k;
  		  }
  		  
  		  $orgs = "'".implode("','", $orgs)."'";
  		  $sql .=" and iunorid in ({$orgs})";
  		}
  		
  			//echo $sql;exit;
    		$query = $this->db->query($sql);
    
		if ( !$reports ) {
    		$this->session->jum_rec  = $query->num_rows();
    		$this->session->jum_page = ceil($this->session->jum_rec/$this->limit);
    
    		$sql .= " limit {$this->limit} offset {$offset}";
    		//echo $sql;
    		//exit;
		}
    		
    		$query = $this->db->query($sql);
  		if ($query) {
  		  $rows = $query->result();
  		  if (sizeOf($rows) > 0) {
  		//foreach($kodeunitutamas as $kode) {
  		
  		$no=1;
  	foreach($rows as $kode) {
  	  
  	    if ( $offset == 0 ) $norut = $no;
				else $norut = ($no+$offset);
  	
  		  $html .= "<tr>";
  		  $html .= "<td>".$norut."</td>";
  		  $html .= "<td>".$this->getrow('', 'app_m_unor', 'nama', array('kode'=>$kode->iunorid))->nama."( ".$kode->iunorid.")</td>";
  		  $html .= "<td><a href='".base_url()."perbend/t_usulan_satker'>".$kode->cnousul."</a></td>";
  		  $html .= "<td>".date('d-m-y', strtotime($kode->dtglusul))."</td>";
  		  $html .= "<td>".$ar_statusid[$kode->istatusid]."</td>";
  		  $html .= "<td>".$ar_statusperubahan[$kode->ijnsprubhnid]."</td>";
  		  $html .= "<td>".$ar_statususulan[$kode->istatus]."</td>";
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
						onclick='download(\"".base_url()."perbend/progress_usulan_satker/lists/0/{$q}/0/1\");'
						><i class='fas fa-file-excel'></i> Export Ke Excel</button>
					</div>";
					
			$html .= "<script type='text/javascript'>
						function download(url) {
							window.open(url, '_download_');
						  }
					  </script>";
					
			//$pagination = $this->_ajaxPagination(base_url()."perbend/progress_usulan_satker/lists/{$page_ke}/{$q}", $this->kriteria, 'progress_usulan_satker');
			//print_r($this->kriteria);
			//exit;
			$pagination = $this->_ajaxPagination(base_url()."perbend/progress_usulan_satker/lists/{$offset}/{$q}", $this->kriteria, 'progress_usulan_satker', $offset);
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