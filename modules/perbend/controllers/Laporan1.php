<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require_once "modules/kepegawaian/controllers/M_kepegawaian_unor.php";
require_once "M_unor.php";
class Laporan1 extends MX_Controller {
  var $prefix = 'app';
  var $table;
	public function __construct() {
		parent::__construct();
		$controller = "perbend/laporan1";
		$this->table  = $this->prefix."_t_usulan";

    $this->_setTitle('Laporan Bendahara Bersertifikat');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);
		
		$this->_setHTMLTemplate('', 'laporan/list');

		//clear session header_controller
		$this->session->unset_userdata('header_controller'); 
	}
	
	function lists($page_ke=0, $reports=false) {
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
  
  		foreach ($_POST as $k=>$v) {			
  			$krit = str_replace("q_", "", $k);
  			$this->kriteria[$krit] = $this->input->post($k);
  		}
  		$this->kriteria = (object)$this->kriteria;
  		
  		if ($reports) $style='border=1';
  		else $style='';
  		
  		$html .= "<table {$style} class='table bordered'>";
  		$html .= "<tr>";
  		$html .= "<th>No.</th>";
  		$html .= "<th>Unit Utama</th>";
  		
  		$sql = "SELECT ckode FROM app_m_jabatan 
              WHERE id IN (2,3,6)";
      $cols = $this->db->query($sql)->result();
      foreach($cols as $c) {
        $html .= "<th>".$c->ckode."</th>"; 
      }
      $html .= "<th>Jumlah</th>";
  		$html .= "</tr>";
  		
  		
  		
  		$kodeunitutamas = $this->session->kodeunitutamas;
  		//print_r($kodeunitutamas);
  		//exit;
  		$no = 1;
  		$m_unor = new M_unor;
  		
  		$tot_all_2 = 0;
  		$tot_all_3 = 0;
  		$tot_all_6 = 0;
  		$tot_all_all = 0;
  		foreach($kodeunitutamas as $kode) {
  		  $total_all = 0;
				//$orgs = array();
				//$orgs =[trim($kode->kode_satker)];
				$orgs =[trim($kode->kode_satker)];
				$kode_lama = explode(',',$this->getrow('', 'priv_t_user', 'kode_lama', ['username'=>trim($kode->kode_satker)])->kode_lama);
				foreach($kode_lama as $k) {
					array_push($orgs, trim($k));
				}
				$m_unor->getRekursifUnit(trim($kode->kode_satker), $orgs);
				
				$orgsx =[];
        foreach($orgs as $k=>$v) {
        	$orgsx[] = $v;
			$kode_lama = explode(',',$this->getrow('', 'priv_t_user', 'kode_lama', ['username'=>trim($k)])->kode_lama);
			foreach($kode_lama as $kl) {
				if ( !in_array($kl, $orgsx) && !empty($kl) ) $orgsx[] = $kl;
			}
        }
        $orgs = $orgsx;
        
        //print_r($orgs);
        //exit;
				//if (!in_array(trim($kode->kode_satker), $orgs)) array_push($orgs, trim($kode->kode_satker));
				$totals = $this->get_total_perbendaharaan('', $orgs);
				//print_r($totals);exit;
				
  		  $total_all += $totals['total_2'] + $totals['total_3'] + $totals['total_6'];
  		  
  		  $html .= "<tr>";
  		  $html .= "<td>".$no."</td>";
  		  $html .= "<td><span onclick='$(\"#detail_{$kode->kode}\").toggle();'><u>".strtoupper($kode->nama)."</u></span><br/>
  		  >> <span onclick='_browse(\"".base_url()."perbend/detail_laporan1/index/0\");
              $(\"#detail_laporan1 #q_app_t_usulan_iunorid\").val(\"{$kode->kode_satker}\");
                reload_grid(\"".base_url()."perbend/detail_laporan1/lists\", \"detail_laporan1\");' 
              data-toggle='modal' data-target='#myModal_browse' data-backdrop='static' data-keyboard='false'>Detail Satuan Kerja</span>
  		  </td>";
  		  $html .= "<td>".$totals['total_2']."</td>";
  		  $html .= "<td>".$totals['total_3']."</td>";
  		  $html .= "<td>".$totals['total_6']."</td>";
  		  $html .= "<td>".$total_all."</td>";
  		  $html .= "</tr>";
  		  
  		  //if (!$reports) {
    		  $html .= "<tr id='detail_{$kode->kode}' style='display:none;'>";
    		  $html .= "<td>&nbsp;</td>";
    		  $html .= "<td colspan='5'>";
    		  $html .= "<div>".$this->_detail($kode->kode, $orgs, $reports)."</div>";
    		  $html .= "</td>";
    		  $html .= "</tr>";
  		  //}
  		  $no++;
  		  
  		  $tot_all_2 += $totals['total_2'];
  		  $tot_all_3 += $totals['total_3'];
  		  $tot_all_6 += $totals['total_6'];
  		  $tot_all_all += $tot_all_2 + $tot_all_3 + $tot_all_6;
  		  
  		}
  		
  		  /*$html .= "<tr>";
        $html .= "<td colspan='2'>Jumlah</td>"; 
        $html .= "<td>".$tot_all_2."</td>"; 
        $html .= "<td>".$tot_all_3."</td>"; 
        $html .= "<td>".$tot_all_6."</td>"; 
        $html .= "<td>".$tot_all_all."</td>"; 
        $html .= "</tr>";
        */
  		
  		
  		$html .= "</table>";
  		$pagination = '';//$this->_ajaxPagination(base_url()."perbend/laporan1/lists", $this->kriteria, 't_terbit_sk');
  		if ($reports) {
  		  $filename = "bendahara_" . date('Ymd') . ".xls";

        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");
        echo $html;
        exit;
  		}
  		$hasil['html'] = array('html'=>$html);
  		$hasil['pagination'] = $pagination;
  
  		echo json_encode($hasil);
	}
	
	function _detail($kode, $orgs, $reports=false) {
	  $unor_id = "'".implode("','", $orgs)."'";
	  $detail = "<table class='table bordered'>";
	  $detail .= "<tr>";
	  $detail .= "<th>No.</th>";
    $detail .= "<th>Jenis Jabatan</th>";
    $detail .= "<th>Sudah Memiliki BNT</th>";
    $detail .= "<th>Belum Memiliki BNT</th>";
    $detail .= "</tr>";
	  $sql = "Select x.id, x.ckode, x.vname, (select count(cnip) as total 
              From app_t_usulan_pegawai a, 
              app_t_usulan b
              Where a.iusulanid = b.id 
              And a.ijabid2 = x.id and isnonaktif = 0 
              And a.cnosertifikat != ''
              and a.inoskid != 0 and a.inoskid IS NOT NULL 
              and b.iunorid in ({$unor_id})) as tot_ada, 
              (select count(cnip) as total 
              From app_t_usulan_pegawai a, 
              app_t_usulan b
              Where a.iusulanid = b.id 
              And a.ijabid2 = x.id and isnonaktif = 0 
              And a.cnosertifikat = ''
              and a.inoskid != 0 and a.inoskid IS NOT NULL 
              and b.iunorid in ({$unor_id})) as tot_tdk_ada
              From app_m_jabatan x 
              Where x.id in (2,3,6)";
      $cols = $this->db->query($sql)->result();
      
      $no2=1;
      $tot_all_ada = 0;
      $tot_all_tada = 0;
      foreach($cols as $c) { 
        $detail .= "<tr>";
        $detail .= "<td>".$no2."</td>";
        $detail .= "<td>".$c->vname." (".$c->ckode.")</td>";
        $detail .= "<td style='cursor:pointer;text-align:center;' data-toggle='modal' data-target='#myModal_browse' onclick='_browse(\"".base_url()."perbend/detail_info/index/0\");
        $(\"#detail_info #q_app_t_usulan_pegawai_cnosertifikat\").val(1);
        $(\"#detail_info #q_app_t_usulan_pegawai_ckduker\").val(\"{$kode}\");
        $(\"#detail_info #q_app_t_usulan_pegawai_ijabid2\").val(\"{$c->id}\");
        '>".$c->tot_ada."</td>"; 
        $detail .= "<td style='cursor:pointer;text-align:center;' data-toggle='modal' data-target='#myModal_browse' onclick='_browse(\"".base_url()."perbend/detail_info/index/0\");
        $(\"#detail_info #q_app_t_usulan_pegawai_cnosertifikat\").val(0);
        $(\"#detail_info #q_app_t_usulan_pegawai_ckduker\").val(\"{$kode}\");
        $(\"#detail_info #q_app_t_usulan_pegawai_ijabid2\").val(\"{$c->id}\");
        '>".$c->tot_tdk_ada."</td>"; 
        $detail .= "</tr>";
        
        $tot_all_ada += $c->tot_ada;
        $tot_all_tada += $c->tot_tdk_ada;
        $no2++;
      }
      
        $detail .= "<tr>";
        $detail .= "<td colspan='2' style='text-align:right'>Jumlah</td>"; 
        $detail .= "<td style='text-align:center;'>".$tot_all_ada."</td>"; 
        $detail .= "<td style='text-align:center;'>".$tot_all_tada."</td>"; 
        $detail .= "</tr>";
	  /*if (!$reports) {
  	  $btn_download = "<button class='btn btn-primary' type='button' name='btn_download_detail[]' id='btn_download_detail_{$unor_id}' onclick='download(\"".base_url()."perbend/laporan1/_detail/{$kode}/{$orgs}/1\");'><i class='fas fa-download'></i> Download</button>";
  	  $detail .= "<tr>";
  	  $detail .= "<td colspan='4' style='text-align:right;'>";
  	  $detail .= $btn_download;
  	  $detail .= "</td>";
  	  $detail .= "</tr>";
	  }*/
	  
	  $detail .="</table>";
	  
	  return $detail;
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
	     'total_2' => 0, 
	     'total_3' => 0,
	     'total_6' => 0 
	   ];
	  
	  if ($ijabid2 != '') {
	    $ijabid2_ = "'".implode("','", $ijabid2)."'";
	    $q_ijabid2 = " ijabid2 in (".$ijabid2_.")";
	  } else $q_ijabid2 = "  ijabid2 in (2,3,6) ";
	  
	  if ($kd_satker !='') {
	    $kd_satker_ = "'".implode("','", $kd_satker)."'";
	    $q_kd_satker = " and ckduker in (".$kd_satker_.")";
	  } else $q_kd_satker = "";
	  
	  $sql = "Select ijabid2, count(cnip) as total 
              From app_t_usulan_pegawai 
              where {$q_ijabid2} ";
    if ($q_kd_satker !='') $sql.= $q_kd_satker;
	$sql .= " and case 
		when ijabid2 not in (4,5,6,7) then inoskid IS NOT NULL and inoskid !=0 and isnonaktif = 0
		else isnonaktif = 0
		end and (select count(*) from app_m_unor where kode = ckduker and deleted=0) > 0 ";

    //$sql .= " and inoskid IS NOT NULL and inoskid != 0 ";
	//$sql .= " and isnonaktif = 0 ";
    $sql .= " Group by ijabid2";
    //echo $sql;exit;
              
    $rows = $this->db->query($sql)->result();
    foreach($rows as $r) {
      $data['total_'.$r->ijabid2] = $r->total;//.' => '.$kd_satker_;
    }
    
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
		
		$buttons['download'] = "<button class='btn btn-primary' type='button' name='btn_download' id='btn_download' onclick='download(\"".base_url()."perbend/laporan1/lists/0/1\");'><i class='fas fa-download'></i> Download</button>";
		
		return $buttons;
  }
}