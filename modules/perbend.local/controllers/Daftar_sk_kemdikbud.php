<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once("M_unor.php"); 
class Daftar_sk_kemdikbud extends MX_Controller {
  var $prefix = 'app';
  var $ar_statusid = array();
  var $ar_statusperubahan = array();
  var $ar_jab2 = array();

  var $ar_unor = array();
	public function __construct() {
		parent::__construct();
		$controller = "perbend/daftar_sk_kemdikbud";
		
   	$this->_setTitle('SK Kemdikbud');
		$this->_setController($controller);
		$this->_init('default'); 
		
		//header
		$table = $this->prefix.'_m_unor';
		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'kode', 'Kode Satker', false, true);
		$this->_addField($table, 'kode_atasan', 'Kode Atasan', false, true);
		$this->_addField($table, 'nama', 'Nama Satuan Kerja', true);
		$this->_addField($table, 'lampiran', 'Lampiran', false, true, true);
		
		$this->_add2SearchField($table, 'kode');
		$this->_add2SearchField($table, 'nama');
    
		$this->_add2ListField($table, 'kode, nama, lampiran');
	
		if ( !$this->session->isadmin ) {			
			$this->_addQuery($table, $table.".kode = '".trim($this->session->username)."'", 'and', '', true);
		} else {
		  $groupids = explode(',', $this->session->groupid);
			$ada = 0;
			if (sizeOf($groupids) > 0 ) {
				foreach($groupids as $g) {
					if ( in_array($g, explode(",", $this->session->sysparam->group_superuser[0])) ) $ada++;
					if ( in_array($g, explode(",", $this->session->sysparam->all_group[0])) ) $ada++;
				}
			} else {
			  if ( in_array($this->session->groupid, explode(",", $this->session->sysparam->all_group[0])) ) $ada++;
			}
			
			//echo $ada;
			if ( $ada > 0 ) {
				$ar_unor = array();
				foreach($this->getall('', 'app_m_unor', 'kode, nama') as $r) {
					$ar_unor[$r->kode] = $r->nama; 
				}
			} else {
				$ar_unor = $this->session->orgs;
			}

			foreach($ar_unor as $k=>$v) {
				$ar_unor_[] = $k; 
			}

			//print_r($ar_unor);
			//exit;

			$ar_unor_ = "'".implode("','", $ar_unor_)."'";
			$this->_addQuery($table, $table.".kode in ({$ar_unor_})", "and", "", true);
		}
		
		$this->_addQuery($table, $table.".kode_atasan != '0231'", 'and', '', true);
		
		$this->_addOrderBy($table, array('id'=>'asc'));
		
		$this->_setAlign($table, 'kode', 'center');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}
	
	function listBox_app_m_unor_lampiran($value, $datas) {
	  $sql = "SELECT c.id, c.tfile2, c.vtype, c.cnosk 
	  from app_t_usulan_sk c 
	  where c.iunorid = '{$datas->app_m_unor_kode}' and 
	  c.tfile2 is not null 
	  order by id desc limit 1";
	  //echo $sql;exit;
	  $r = $this->db->query($sql)->row();
	  
	  $input = "";
	  
	  $vtype = trim($r->vtype);
	  $tfile = trim($r->tfile2);
	  
	  if ( !empty($tfile) ){
			$input .= "<span data-toggle='modal' data-target='#myPreview_{$r->id}' style='cursor:pointer;' class='btn btn-warning'>
						<i class='fas fa-eye'></i> <b>Lihat Surat Keputusan</b>
					  </span>";
  	  $input .= "<div class='modal fade' id='myPreview_{$r->id}' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
  				   <div class='modal-dialog' role='document' style='width:65%;'>
  					 <div class='modal-content'>
  					   <div class='modal-header'>
  						 <button type='button' class='close' aria-label='Close' 
  						 onclick=\"$('#myPreview_{$r->id}').modal('hide').appendTo('.div_app_t_usulan_sk_tfile2');$('#{$this->router->class}_form-modal').css('overflow', 'scroll');\">
  						 <span aria-hidden='true'>&times;</span></button>
  						 <h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> No. SK {$r->cnosk}</h4>
  					   </div>
  					   <div class='modal-body' id='modal-body'>
  						 <div class='form-group'>
  							 <div id='html_telusuri'>";
  
  		if ( $vtype != 'application/pdf' ) {
  			$height='100';$width='';
  		} else { $height='100%';$width='700';}
  
  		$input .= "<iframe src='data:{$vtype};base64,{$tfile}' type='{$vtype}' width='{$height}' height='{$width}' alt='{$vtype}'>PDF tidak bisa ditinjau</iframe>";
  
  
  		$input .= "			 </div>
  						 </div>
  					   </div>
  					</div>
  				</div>
  			</div>";
	  }
	  
		return $input;
	}

	function listBox_ACTION($buttons, $datas) {
		unset($buttons['ubah']);
		unset($buttons['hapus']);
		
		$buttons['lihat'] = "<span style='text-align: center;cursor:pointer;' onclick='_browse(\"".base_url()."perbend/detail_info2/index/0\");
              $(\"#detail_info2 #q_app_t_usulan_pegawai_ckduker\").val(\"{$datas->app_m_unor_kode}\");
                reload_grid(\"".base_url()."perbend/detail_info2/lists\", \"detail_info2\");' 
              data-toggle='modal' data-target='#myModal_browse' data-backdrop='static' data-keyboard='false'>
							<i class='fas fa-search' title='Lihat'></i>
						</span>";

	  return $buttons;
	}

	function app_m_unor_output() {
		$js = "<script type='text/javascript'>
				var btn_save_html = '';
				$(document).ready(function() {

				});
				</script>";

		return $js;
	}
	
	function manipulate_list_button($buttons) {
    unset($buttons);
    $input = "<div class='modal fade' id='myModal_browse' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
							<div class='modal-dialog' role='document' style='width:75%;'>
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
		
		return $buttons;
  }
}
