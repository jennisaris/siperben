<?php
ini_set('memory_limit', '2048M');
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak_sk_satker extends MX_Controller {
  var $prefix = 'app';
  var $ar_statusid = array();
  var $ar_statusperubahan = array();

  var $ar_unor = array();
	public function __construct() {
		parent::__construct();
		$controller = "perbend/cetak_sk_satker";
		$table  = $this->prefix."_t_usulan_sk";

   		$this->_setTitle('Cetak SK Satker');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'ijns', 'ijns', false, true);
		$this->_addField($table, 'iunorid', 'Satuan Kerja', true);
		$this->_addField($table, 'cnosk', 'No. SK', true);
		$this->_addField($table, 'dtglsk', 'Tgl. SK', true);
		$this->_addField($table, 'dtmt', 'TMT. SK', true);
		$this->_addField($table, 'cnosk2', 'No. SK Pengganti', true);
		$this->_addField($table, 'dtgltetap', 'Tgl. Penetapan', true);
		$this->_addField($table, 'ittdid', 'Penandatangan', true);
		$this->_addField($table, 'lampiran', 'Lampiran', false, false, true);
		$this->_addField($table, 'tfile2', 'Lampiran', true, true);
		$this->_addField($table, 'vtype', 'Tipe Dokumen', false, true);
		$this->_addField($table, 'nsize', 'nsize', false, true);
		$this->_addField($table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($table, 'cupdatedby', 'Diubah oleh', false, true);
		$this->_addField($table, 'ctahun', 'Tahun', false, true);

		$this->_add2SearchField($table, 'cnosk');
		$this->_add2SearchField($table, 'dtglsk');
		$this->_add2SearchField($table, 'dtmt');

		$this->_changeType($table, 'dtglsk', 'date', 'd-m-Y');
		$this->_changeType($table, 'dtmt', 'date', 'd-m-Y');
        $this->_changeType($table, 'dtgltetap', 'date', 'd-m-Y');
		
		$this->_setAlign($table, 'dtglsk', 'center');
		$this->_setAlign($table, 'dtmt', 'center');
		$this->_setAlign($table, 'dtgltetap', 'center');
		$this->_setAlign($table, 'ctahun', 'center');
    
		$this->_add2ListField($table, 'iunorid, cnosk, dtglsk, dtmt, cnosk2, dtgltetap, lampiran, ittdid, ctahun');

		$this->_addQuery($table, $table.'.ijns = 1', 'and', '', true);
		$this->_addQuery($table, $table.".ctahun = '{$this->session->settahun}'", 'and', '', true);
		$this->_addQuery($table, $table.".tfile2 IS NOT NULL", 'and', '', true);

		//print_r(explode(",", $this->session->sysparam->all_group[0]));
		//exit;
    //if ( $this->session->groupid != $this->session->sysparam->group_superuser[0] ) {
		//if ( !in_array($this->session->groupid, explode(",", $this->session->sysparam->all_group[0])) ) {
		if ( !$this->session->isadmin ) {			
			$this->_addQuery($table, $table.'.iunorid = '.trim($this->session->username), 'and', '', true);
		} else {
		  $groupids = explode(',', $this->session->groupid);
		  $all_groups = explode(",", $this->session->sysparam->all_group[0]);
		  //print_r($groupids);
		  //exit;
			//if ( in_array($this->session->sysparam->group_superuser[0], $groupids) ) {
			$ada = 0;
			foreach($groupids as $g) {
				if (in_array($g, $all_groups)) $ada++;
			}

			if ( $ada > 0 ) {
			//if ( in_array($this->session->sysparam->group_superuser[0], $groupids) ) {
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

        $ar_ttd = array();
		foreach($this->getall('', 'app_m_ttd', 'id, concat(cnip,\',\', vname) as concat_nip_nama', array('ldeleted'=>0)) as $r) {
			$ar_ttd[$r->id] = $r->concat_nip_nama;
		}

		$this->_changeType($table, 'ittdid', 'combobox', $ar_ttd);
		
		$this->_addOrderBy($table, ['tcreated'=>'asc']);

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	} 

	
	function listBox_app_t_usulan_sk_tupdated($value, $datas) {
	  if ( $value != null ) {
	    return date('d-m-Y H:i:s', strtotime($value));
	  } else return date('d-m-Y H:i:s', strtotime($datas->app_t_usulan_tcreated));
	}
	
	function listBox_app_t_usulan_sk_cupdatedby($value, $datas) {
	  if ( $value != null ) {
	    $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($value)))->realname;
	   } else {
	     $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($datas->app_t_usulan_ccreatedby)))->realname;
	   }
	  
	  return $nama;
	}

	function listBox_app_t_usulan_sk_iunorid($value) {
		$name_txt = $this->getrow('', 'app_m_unor', 'nama', array('kode'=>$value))->nama;
		return $name_txt." (".$value.")";
	}

	function listBox_ACTION($buttons, $datas) {
		unset($buttons);
	  
	    return $buttons;
	}
	
	/*function listBox_app_t_usulan_sk_tfile2($value, $datas) {
	  $input = "";
	  
	  $vtype = trim($datas->app_t_usulan_sk_vtype);
	  $tfile = $value;
	  
	  if ( !empty($value) ){
			$input .= "<span data-toggle='modal' data-target='#myPreview_{$datas->app_t_usulan_sk_id}' style='cursor:pointer;' class='btn btn-warning'>
						<i class='fas fa-eye'></i> <b>Lihat Surat Keputusan</b>
					  </span>";
  	  $input .= "<div class='modal fade' id='myPreview_{$datas->app_t_usulan_sk_id}' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
  				   <div class='modal-dialog' role='document' style='width:65%;'>
  					 <div class='modal-content'>
  					   <div class='modal-header'>
  						 <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  						 <h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Surat Usulan {$datas->app_t_usulan_sk_cnosk}</h4>
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
	}*/
	
	function listBox_app_t_usulan_sk_lampiran($value, $datas) {
	  $input = "";
	  $tfile = trim($datas->app_t_usulan_sk_tfile2);
	  
	  if ( !empty($tfile) ){
			$input .= "<span data-toggle='modal' data-target='#myPreview_SK' style='cursor:pointer;' class='btn btn-warning' 
			onclick='getSk({$datas->app_t_usulan_sk_id});'>
						<i class='fas fa-eye'></i> <b>Lihat Surat Keputusan</b>
					  </span>";
	  }
	  
		return $input;
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
	
	function getSk($id=0) {
	  $vtype = 'application/pdf';
	  $height='100%';$width='700';
	  $sks = $this->getrow('', 'app_t_usulan_sk', 'cnosk, tfile2', array('id'=>$id));
	  $tfile =$sks->tfile2;
	  $cnosk =$sks->cnosk;
	  $datas = [
	    'html'=>"<iframe src='data:{$vtype};base64,{$tfile}' type='{$vtype}' width='{$height}' height='{$width}' alt='{$vtype}'>PDF tidak bisa ditinjau</iframe>",
	    'nosk'=>$cnosk
	    ];
	  
	  
	  echo json_encode($datas);
	}
	
	function app_t_usulan_sk_output() {
	  $js = "<script type='text/javascript'>
	            $(document).ready(function() {
	              
	            });
	  
	          function getSk(id) {
	          var url = '".base_url()."perbend/cetak_sk_satker/getSk/'+id;
	           var o = jQuery.parseJSON(getHTML2(url));
	           $('#myPreview_SK #html_telusuri').html(o.html);
	           $('#myPreview_SK #no_sk').html(o.nosk);
	          }
	  </script>";
	  
	  return $js;
	}

}
