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
	
	function lists($page_ke=0, $q='',$reports=false) {
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
  		
  		if ($reports) $style='border=1';
  		else $style='';
  		
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
    
    		$this->session->jum_rec  = $query->num_rows();
    		$this->session->jum_page = ceil($this->session->jum_rec/$this->limit);
    
    		$sql .= " limit {$this->limit} offset {$offset}";
    		//echo $sql;
    		//exit;
    		
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
      	$pagination = $this->_ajaxPagination(base_url()."perbend/progress_usulan_satker/lists/{$page_ke}/{$q}", $this->kriteria, 'progress_usulan_satker');
  		$hasil['html'] = array('html'=>$html);
  		$hasil['pagination'] = $pagination;
  
  		echo json_encode($hasil);
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