<?php
ini_set('memory_limit', '6048M');
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'T_usulan_daftar.php';
class Cetak_sk_satker2 extends MX_Controller {
  var $prefix = 'app';
  var $ar_statusid = array();
  var $ar_statusperubahan = array(); 

  var $ar_unor = array();
	public function __construct() {
		parent::__construct();
		$controller = "perbend/cetak_sk_satker2";
		$table  = $this->prefix."_t_usulan";

   		$this->_setTitle('Cetak SK Satker (Lainnya)');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'ijns', 'ijns', false, true);
		$this->_addField($table, 'iunorid', 'Satuan Kerja', true);
		$this->_addField($table, 'cnousul', 'No. Usul', true);
		$this->_addField($table, 'dtglusul', 'Tgl. Usul', true);
		$this->_addField($table, 'istatusid', 'Status Perubahan', true, true);
		$this->_addField($table, 'ijnsprubhnid', 'Jenis Perubahan', true, true);
		$this->_addField($table, 'lampiran', 'Lampiran', false, false, true);
		//$this->_addField($table, 'tfile', 'Lampiran', true, true);
		//$this->_addField($table, 'vtype', 'Tipe Dokumen', false, true);
		//$this->_addField($table, 'nsize', 'nsize', false, true);
		$this->_addField($table, 'istatus', 'Status Usulan', false, true);
		$this->_addField($table, 'keterangan', 'Keterangan', false, true, true);
		$this->_addField($table, 'daftarnama', '', false, false, true, 0, 'left', '','', true);
		$this->_addField($table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($table, 'cupdatedby', 'Diubah oleh', false, true);
		$this->_addField($table, 'ctahun', 'ctahun', false, true);

		//$this->_add2SearchField($table, 'cnip');
		//$this->_add2SearchField($table, 'vname');
		//$this->_add2SearchField($table, 'ldeleted');
		
		$rows = $this->getall('', $this->prefix.'_m_status', '*', array('ldeleted'=>0));
		foreach($rows as $r) {
		$this->ar_statusid[$r->id] = $r->vdesc;
		}
		
		$this->_changeType($table, 'istatusid', 'combobox', 
		$this->ar_statusid);
		
		$rows = $this->getall('', $this->prefix.'_m_perubahan', '*', array('ldeleted'=>0));
		foreach($rows as $r) {
		$this->ar_statusperubahan[$r->id] = $r->vdesc;
		}
		
		$this->_changeType($table, 'ijnsprubhnid', 'combobox', 
		$this->ar_statusperubahan);
		
		$this->_changeType($table, 'istatus', 'combobox', 
		$this->session->sysparam->status_usulan);
		
		$this->_changeType($table, 'dtglusul', 'date', 'd-m-Y');
		
		$this->_add2SearchField($table, 'cnousul');
		$this->_add2SearchField($table, 'dtglusul');
		//$this->_add2SearchField($table, 'istatusid');
		//$this->_add2SearchField($table, 'ijnsprubhnid');
		
		$this->_setAlign($table, 'dtglusul', 'center');
		$this->_setAlign($table, 'istatus', 'center');
		$this->_setAlign($table, 'lampiran', 'center');
		//$this->_setAlign($table, 'ijnsprubhnid', 'center');
		$this->_setAlign($table, 'tfile', 'center');
    
		$this->_add2ListField($table, 'iunorid, cnousul, dtglusul, lampiran');//, istatusid, ijnsprubhnid');//, tupdated, cupdatedby');

		/*if ( $this->session->groupid != $this->session->sysparam->group_superuser[0] ) {
			$this->_addQuery($table, $table.'.iunorid = '.trim($this->session->username), 'and', '', true);
		} else {
			$ar_unor = array();
			foreach($this->getall('', 'app_m_unor', 'kode, nama') as $r) {
				$ar_unor[$r->kode] = $r->nama; 
			}
			
			$this->_changeType($table, 'iunorid', 'combobox', $ar_unor);
			$this->_add2SearchField($table, 'iunorid');
		}*/

		//if ( !in_array($this->session->groupid, explode(",", $this->session->sysparam->all_group[0])) ) {
		if ( !$this->session->isadmin ) {			
			$this->_addQuery($table, $table.'.iunorid = '.trim($this->session->username), 'and', '', true);
		} else {
		  	$groupids = explode(',', $this->session->groupid);
			//if ( in_array($this->session->sysparam->group_superuser[0], $groupids) ) {
			$all_groups = explode(",", $this->session->sysparam->all_group[0]);
			//print_r($groupids);
			//exit;
				//if ( in_array($this->session->sysparam->group_superuser[0], $groupids) ) {
				$ada = 0;
				foreach($groupids as $g) {
					if (in_array($g, $all_groups)) $ada++;
				}
	
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
			
			$this->_changeType($table, 'iunorid', 'combobox', $ar_unor);
			$this->_add2SearchField($table, 'iunorid');

			$ar_unor_ = "'".implode("','", $ar_unor_)."'";
			$this->_addQuery($table, $table.".iunorid in ({$ar_unor_})", "and", "", true);
		}

		$this->_addQuery($table, 'app_t_usulan.ijns = 2', 'and', '', true);
		$this->_addQuery($table, "app_t_usulan.ctahun = '{$this->session->settahun}'", 'and', '', true);
		//$this->_addQuery($table, "app_t_usulan.istatus = 7", 'and', '', true);
		
		$this->_addOrderBy($table, ['dtglusul'=>'asc']);

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}
	
	function listBox_app_t_usulan_tupdated($value, $datas) {
	  if ( $value != null ) {
	    return date('d-m-Y H:i:s', strtotime($value));
	  } else return date('d-m-Y H:i:s', strtotime($datas->app_t_usulan_tcreated));
	}
	
	function listBox_app_t_usulan_cupdatedby($value, $datas) {
	  if ( $value != null ) {
	    $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($value)))->realname;
	   } else {
	     $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($datas->app_t_usulan_ccreatedby)))->realname;
	   }
	  
	  return $nama;
	}

	
	function listBox_app_t_usulan_iunorid($value) {
		$name_txt = $this->getrow('', 'app_m_unor', 'nama', array('kode'=>$value))->nama;
		return $name_txt." (".$value.")";
	}
	
	function listBox_ACTION($buttons, $datas) {
		unset($buttons);
		return $buttons;
	}
	
	/*function listBox_app_t_usulan_tfile($value, $datas) {
	  $input = "";
	  
	  $vtype = trim($datas->app_t_usulan_vtype);
	  $tfile = $value;
	  
	  if ( !empty($value) ){
			$input .= "<span data-toggle='modal' data-target='#myPreview_{$datas->app_t_usulan_id}' style='cursor:pointer;' class='label label-warning'>
						<i class='fas fa-view'></i><b>View Surat Keputusan</b>
					  </span>";
  	  $input .= "<div class='modal fade' id='myPreview_{$datas->app_t_usulan_id}' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
  				   <div class='modal-dialog' role='document' style='width:65%;'>
  					 <div class='modal-content'>
  					   <div class='modal-header'>
  						 <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  						 <h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Surat Usulan {$datas->app_t_usulan_cnousul}</h4>
  					   </div>
  					   <div class='modal-body' id='modal-body'>
  						 <div class='form-group'>
  							 <div id='html_telusuri'>";
  
  		if ( $vtype != 'application/pdf' ) {
  			$height='100';$width='';
  		} else { $height='100%';$width='700';}
  
  		$input .= "<embed src='data:{$vtype};base64,{$tfile}' type='{$vtype}' width='{$height}' height='{$width}' alt='{$vtype}'>";
  
  
  		$input .= "			 </div>
  						 </div>
  					   </div>
  					</div>
  				</div>
  			</div>";
	  }
	  
		return $input;
	}*/
	
	function listBox_app_t_usulan_lampiran($value, $datas) {
	  $input = "";

	  $sql = "select tfile, vtype from app_t_usulan where id = '{$datas->app_t_usulan_id}'";
	  $r = $this->db->query($sql)->row();

	  //$vtype = trim($datas->app_t_usulan_vtype);
	  //$tfile = trim($datas->app_t_usulan_tfile);
	  $vtype = trim($r->vtype);
	  $tfile = trim($r->tfile);
	  
	  if ( !empty($tfile) ){
			$input = "<span data-toggle='modal' data-target='#myPreview_SK' style='cursor:pointer;' 
						class='label label-warning' 
						onclick='getSk({$datas->app_t_usulan_id});'>
						<i class='fas fa-view'></i><b>View Surat Keputusan</b>
					  </span>";
	  }
	  
		return $input;
	}
	
	function getSk($id=0) {
	  $vtype = 'application/pdf';
	  $height='100%';$width='700';
	  $sks = $this->getrow('', 'app_t_usulan', 'cnousul, tfile', array('id'=>$id));
	  $tfile =$sks->tfile;
	  $cnosk =$sks->cnousul;
	  $datas = [
	    'html'=>"<iframe src='data:{$vtype};base64,{$tfile}' type='{$vtype}' width='{$height}' height='{$width}' alt='{$vtype}'>PDF tidak bisa ditinjau</iframe>",
	    'nosk'=>$cnosk
	    ];
	  
	  
	  echo json_encode($datas);
	}
	
	function app_t_usulan_output() {
	  $js = "<script type='text/javascript'>
	            $(document).ready(function() {
	              
	            });
	  
	          function getSk(id) {
	          var url = '".base_url()."perbend/cetak_sk_satker2/getSk/'+id;
			  //alert(url);
	           var o = jQuery.parseJSON(getHTML2(url));
	           $('#myPreview_SK #html_telusuri').html(o.html);
	           $('#myPreview_SK #no_sk').html(o.nosk);
	          }
	  </script>";
	  
	  return $js;
	}
	
		function manipulate_list_button($buttons) {
	    	  $input = "<div class='modal fade' id='myPreview_SK' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
  				   <div class='modal-dialog' role='document' style='width:65%;'>
  					 <div class='modal-content'>
  					   <div class='modal-header'>
  						 <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  						 <h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Surat Keputusan #<span id='no_sk'></span></h4>
  					   </div>
  					   <div class='modal-body' id='modal-body'>
  						 <div class='form-group'>
  							 <div id='html_telusuri'></div>
  						 </div>
  					   </div>
  					</div>
  				</div>
  			</div>";
  			
  			$buttons['list'] = $input;
  			
  			return $buttons;
	}

}