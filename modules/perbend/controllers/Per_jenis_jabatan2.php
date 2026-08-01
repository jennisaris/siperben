<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require_once "modules/kepegawaian/controllers/M_kepegawaian_unor.php";
require_once "M_unor.php";
class Per_jenis_jabatan2 extends MX_Controller {
  var $prefix = 'app';
  var $table;
	public function __construct() {
		parent::__construct();
		$controller = "perbend/per_jenis_jabatan2";
		$this->table  = $this->prefix."_t_usulan";

    //$this->_setModal(true);
    $this->_setTitle('Laporan Pejabat Perbendaharaan Per Jenis Jabatan');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);
		
		$this->_setHTMLTemplate('', 'laporan/list');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
		//$header_controller = array('header_controller' => 'perbend/rekap_pejabat');
		//$this->session->set_userdata($header_controller);
	}
	
	function lists($page=0, $reports=false) {
	  
	  if ($reports) $style='border=1';
  	else $style='';
  		
	  $detail = "<table {$style} class='table table-bordered'>";
	  $detail .= "<tr>";
	  $detail .= "<th>No.</th>";
    $detail .= "<th>Jenis Jabatan</th>";
    $detail .= "<th>Jumlah</th>";
    $detail .= "</tr>";
	  $sql = "Select x.id, x.ckode, x.vname, (select count(distinct cnip) as total 
              From app_t_usulan_pegawai a, 
              app_t_usulan b
              Where a.iusulanid = b.id 
              And a.ijabid2 = x.id 
              and 
			  case 
				 when x.id not in (4,5,6,7) then a.inoskid != 0 and a.inoskid IS NOT NULL and isnonaktif =0
				 else isnonaktif=0
			  end) 
               as total
              From app_m_jabatan x ";
      $cols = $this->db->query($sql)->result();
      
      $no2=1;
      $tot_all_ada = 0;
      $tot_all_tada = 0;
      foreach($cols as $c) { 
        $detail .= "<tr>";
        $detail .= "<td>".$no2."</td>";
        $detail .= "<td>".$c->vname." (".$c->ckode.")</td>";
        $detail .= "<td style='cursor:pointer;text-align:center;'>".$c->total."</td>";
        $detail .= "</tr>";
        
        $tot_all += $c->total;
        $no2++;
      }
      
        $detail .= "<tr>";
        $detail .= "<td colspan='2' style='text-align:center'>Jumlah</td>"; 
        $detail .= "<td style='text-align:center;'>".$tot_all."</td>"; 
        $detail .= "</tr>";

	  
	  $detail .="</table>";
	  
	  $pagination = '';//$this->_ajaxPagination(base_url()."perbend/per_jenis_jabatan2/lists", $this->kriteria, 't_terbit_sk');
  		if ($reports) {
  		  $filename = "bendahara_" . date('Ymd') . ".xls";

        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");
        echo $detail;
        exit;
  		}
  		$hasil['html'] = array('html'=>$detail);
  		$hasil['pagination'] = $pagination;
  
  		echo json_encode($hasil);
	}
	
	function get_total_pegawai_bersertifikat($kodeuker, $ijabid, $nosert="!=''") {
		$unor_id = "'".implode("','", $kodeuker)."'";
				
	  $sql = "Select count(*) as total 
              From app_t_usulan_pegawai a, 
              app_t_usulan b 
              Where a.iusulanid = b.id 
              And a.ijabid2 = '{$ijabid}' and isnonaktif = 0 
              And 
              a.inoskid != 0 and a.inoskid IS NOT NULL 
              and b.iunorid in ({$unor_id})
              and a.cnosertifikat {$nosert}";
              
    $total = $this->db->query($sql)->row()->total;
    return $total; 
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
  
  private function get_total_perbendaharaan($ijabid2='', $kd_satker='') {
    //print_r($kd_satker);exit;
	  $data = [
  	     'total_2' => [0=>0,1=>0], 
  	     'total_3' => [0=>0,1=>0], 
  	     'total_6' => [0=>0,1=>0]
	   ];
	  
	  if ($ijabid2 != '') {
	    $ijabid2_ = "'".implode("','", $ijabid2)."'";
	    $q_ijabid2 = " ijabid2 in (".$ijabid2_.")";
	  } else $q_ijabid2 = "  ijabid2 in (2,3,6) ";
	  
	  if ($kd_satker !='') {
	    $kd_satker_ = "'".implode("','", $kd_satker)."'";
	    $q_kd_satker = " and ckduker in (".$kd_satker_.")";
	  } else $q_kd_satker = "";
	  
	  $sql = "Select ijabid2, 0 as status, count(distinct cnip) as total 
              From app_t_usulan_pegawai 
              where {$q_ijabid2} ";
    if ($q_kd_satker !='') $sql.= $q_kd_satker;
    $sql .= " and inoskid IS NOT NULL and inoskid!=0 ";
    $sql .= " and isnonaktif = 0 ";
    $sql .= " and cnosertifikat = '' ";
    $sql .= " Group by ijabid2";
    $sql .= " UNION ";
    $sql .= "Select ijabid2, 1 as status, count(distinct cnip) as total
              From app_t_usulan_pegawai 
              where {$q_ijabid2} ";
    if ($q_kd_satker !='') $sql.= $q_kd_satker;
    $sql .= " and inoskid IS NOT NULL and inoskid!=0 ";
    $sql .= " and isnonaktif = 0 ";
    $sql .= " and cnosertifikat != '' ";
    $sql .= " Group by ijabid2";
              
    $rows = $this->db->query($sql)->result();
    foreach($rows as $r) {
      $data['total_'.$r->ijabid2][$r->status] = $r->total;//.' => '.$kd_satker_;
    }
    
    //print_r($data);exit;
    
    return $data;
  }
  
  function manipulate_list_button($buttons) {
    unset($buttons);
    $input = "<div class='modal fade' id='myModal_browse' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
							<div class='modal-dialog' role='document' style='width:85%;'>
							<div class='modal-content'>
								<div class='modal-header'>
								<h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Detail Info </h4>
								</div>
								<div class='modal-body' id='modal-body' style='overflow-x: auto;'>
								<div class='form-group'>
									<div id='html_telusuri'></div>
								</div>
								</div>
							</div>
							</div>
						</div>";
						
		$buttons['modal'] = $input;
		
		$buttons['download'] = "<button class='btn btn-primary' type='button' name='btn_download' id='btn_download' onclick='download(\"".base_url()."perbend/per_jenis_jabatan2/lists/0/1\");'><i class='fas fa-download'></i> Download</button>";
		
		return $buttons;
  }
}