<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_verifikasi_usulan_pelatihan extends MX_Controller {
  var $prefix = 'app';
  var $ar_statusid = array();
  var $ar_statusperubahan = array();
  

	public function __construct() {
		parent::__construct();
		$controller = "perbend/t_verifikasi_usulan_pelatihan";
		$table  = $this->prefix."_t_usulan_pelatihan";

   		$this->_setTitle('Verifikasi Usulan Pelatihan');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'iunorid', 'Satuan Kerja', true);
		$this->_addField($table, 'cnousul', 'No. Usul', true);
		$this->_addField($table, 'dtglusul', 'Tgl. Usul', true);
		$this->_addField($table, 'lampiran', 'Lampiran Surat Usulan (dlm format PDF)', false, false, true);
		$this->_addField($table, 'tfile', 'Lampiran', true, true);
		$this->_addField($table, 'vtype', 'Tipe Dokumen', false, true);
		$this->_addField($table, 'nsize', 'nsize', false, true);
		$this->_addField($table, 'ijnspelatihan', 'Jenis Pelatihan', true);
		$this->_addField($table, 'ipelatihanid', 'Nama Pelatihan', true);
		$this->_addField($table, 'istatus', 'Status Usulan', false, true);
		$this->_addField($table, 'keterangan', 'Keterangan', false, true, true);
		$this->_addField($table, 'daftarnama', '', false, false, true, 0, 'left', '','', true);
		$this->_addField($table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($table, 'cupdatedby', 'Diubah oleh', false, true);

		$table2='app_m_pelatihan';
		$this->_addTable($table2);
		$this->_addField($table2, 'id', 'id', true, true);
		$this->_addField($table2, 'vdesc', 'Nama Pelatihan', false, true);

		$this->_addRelation($table, $table2, array('ipelatihanid'=>'id'));

		//$this->_add2SearchField($table, 'cnip');
		//$this->_add2SearchField($table, 'vname');
		//$this->_add2SearchField($table, 'ldeleted');
		
		$this->_changeType($table, 'istatus', 'combobox', 
		$this->session->sysparam->status_usulan_pelatihan);
		
		$this->_changeType($table, 'dtglusul', 'date', 'd-m-Y');
		$this->_changeType($table, 'ijnspelatihan', 'combobox', $this->session->sysparam->jenis_pelatihan);
		
		$this->_add2SearchField($table, 'cnousul');
		$this->_add2SearchField($table, 'dtglusul');
		$this->_add2SearchField($table, 'ijnspelatihan');
		
		$this->_setAlign($table, 'dtglusul', 'center');
		$this->_setAlign($table, 'istatus', 'center');
		
		$this->_addQuery($table, 'app_t_usulan_pelatihan.istatus = 1', 'and', '', 'true');
    
		$this->_add2ListField($table, 'iunorid, cnousul, dtglusul, tfile, ijnspelatihan');
		$this->_add2ListField($table2, 'vdesc');
		$this->_add2ListField($table, 'istatus, keterangan');//, tupdated, cupdatedby');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}

	function viewBox_app_t_usulan_pelatihan_iunorid($name, $value) {
		$name_txt = $this->getrow('', 'kepeg_m_unor', 'nama', array('kode_satker'=>$value))->nama;
		$html = "<p class='form-control-static {$name}'>".$name_txt."</p>";
		return $html;
	}

	function listBox_app_t_usulan_pelatihan_iunorid($value) {
		$name_txt = $this->getrow('', 'kepeg_m_unor', 'nama', array('kode_satker'=>$value))->nama;
		return $name_txt;
	}
	
	function listBox_app_t_usulan_pelatihan_tupdated($value, $datas) {
	  if ( $value != null ) {
	    return date('d-m-Y H:i:s', strtotime($value));
	  } else return date('d-m-Y H:i:s', strtotime($datas->app_t_usulan_pelatihan_tcreated));
	}
	
	function listBox_app_t_usulan_pelatihan_cupdatedby($value, $datas) {
	  if ( $value != null ) {
	    $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($value)))->realname;
	   } else {
	     $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($datas->app_t_usulan_pelatihan_ccreatedby)))->realname;
	   }
	  
	  return $nama;
	}

	public function after_insert_processor($id, $post) {
		$new_post = array();
		$new_post['tcreated']   = date('Y-m-d H:i:s');
		$new_post['ccreatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_t_usulan', $new_post);
	}

	public function after_update_processor($id, $post, $oldpost) {
		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_t_usulan', $new_post);
	}
	
	function listBox_ACTION($buttons, $datas) {
	  unset($buttons['hapus']);
	  if ( $datas->app_t_usulan_pelatihan_istatus > 0 ) unset($buttons['ubah']);
	  
	  return $buttons;
	}
	
	public function insertBox_app_t_usulan_pelatihan_lampiran($name) {
		$input = "<input type='file' name='{$name}' id='{$name}' class='form-control {$name}' accept='application/pdf'/>";
		$input .= $this->session->sysparam->info_max_upload[0];
		return $input;
	}
	
	function listBox_app_t_usulan_pelatihan_tfile($value, $datas) {
	  $input = "";
	  
	  $vtype = trim($datas->app_t_usulan_pelatihan_vtype);
	  $tfile = $value;
	  
	  if ( !empty($value) ){
			$input .= "<span data-toggle='modal' data-target='#myPreview_{$datas->app_t_usulan_pelatihan_id}' style='cursor:pointer;' class='label label-primary'>
						<b>Surat Usulan</b>
					  </span>";
  	  $input .= "<div class='modal fade' id='myPreview_{$datas->app_t_usulan_pelatihan_id}' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
  				   <div class='modal-dialog' role='document' style='width:65%;'>
  					 <div class='modal-content'>
  					   <div class='modal-header'>
  						 <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  						 <h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Surat Usulan {$datas->app_t_usulan_pelatihan_cnousul}</h4>
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
	}

	public function updateBox_app_t_usulan_pelatihan_lampiran($name, $value, $datas) {
		$tfile = $datas->app_t_usulan_pelatihan_tfile;
		$vtype = trim($datas->app_t_usulan_pelatihan_vtype);

		$input = "<input type='file' name='{$name}' id='{$name}' class='form-control {$name}' accept='application/pdf'/>";
		$input .= $this->session->sysparam->info_max_upload[0];
		if ( !empty($tfile) ){
			$input .= "<br/><span data-toggle='modal' data-target='#myPreview' style='cursor:pointer;' class='label label-primary'>
						<b>Surat Usulan</b>
					  </span>";
		}

		$input .= "<div class='modal fade' id='myPreview' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
				   <div class='modal-dialog' role='document' style='width:65%;'>
					 <div class='modal-content'>
					   <div class='modal-header'>
						 <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						 <h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Surat Usulan {$datas->app_t_usulan_pelatihan_cnousul} </h4>
					   </div>
					   <div class='modal-body' id='modal-body'>
						 <div class='form-group'>
							 <div id='html_telusuri'>";

		if (trim($vtype) != 'application/pdf' ) {
			$height='100';$width='';
		} else { $height='100%';$width='700';}

		$input .= "<embed src='data:{$vtype};base64,{$tfile}' type='{$vtype}' width='{$height}' height='{$width}' alt='{$vtype}'>";


		$input .= "			 </div>
						 </div>
					   </div>
					</div>
				</div>
			</div>";

		
		return $input;
	}

	public function viewBox_app_t_usulan_pelatihan_lampiran($name, $value, $datas) {
		$tfile = $datas->app_t_usulan_pelatihan_tfile;
		$vtype = trim($datas->app_t_usulan_pelatihan_vtype);
		$input = "";
		if ( !empty($tfile) ){
			$input .= "<br/><span data-toggle='modal' data-target='#myPreview' style='cursor:pointer;' class='label label-primary'>
						<b>Surat Usulan</b>
					  </span>";
		}

		$input .= "<div class='modal fade' id='myPreview' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
				   <div class='modal-dialog' role='document' style='width:65%;'>
					 <div class='modal-content'>
					   <div class='modal-header'>
						 <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
						 <h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Preview </h4>
					   </div>
					   <div class='modal-body' id='modal-body'>
						 <div class='form-group'>
							 <div id='html_telusuri'>";

		if (trim($vtype) != 'application/pdf' ) {
			$height='100';$width='';
		} else { $height='100%';$width='700';}

		$input .= "<embed src='data:{$vtype};base64,{$tfile}' type='{$vtype}' width='{$height}' height='{$width}' alt='{$vtype}'>";


		$input .= "			 </div>
						 </div>
					   </div>
					</div>
				</div>
			</div>";

		
		return $input;
	}
	
	public function before_insert_processor($post) {
		$files = $this->uploadfiles($_FILES['app_t_usulan_pelatihan_lampiran']);
		if ( !empty($files->file) ) {
			$post->app_t_usulan_pelatihan_tfile = $files->file;
			$post->app_t_usulan_pelatihan_vtype = $files->type;
			$post->app_t_usulan_pelatihan_nsize = $files->size;
		}
		return $post;
	}
	
	public function before_update_processor($id, $post) {
		$files = $this->uploadfiles($_FILES['app_t_usulan_pelatihan_lampiran']);
		if ( !empty($files->file) ) {
			$post->app_t_usulan_pelatihan_tfile = $files->file;
			$post->app_t_usulan_pelatihan_vtype = $files->type;
			$post->app_t_usulan_pelatihan_nsize = $files->size;
		}
	
		return $post;
	}
	
	function insertCheck_app_t_usulan_pelatihan_tfile($value, $post) {
		$data['status'] = true;
		if ( !empty($value) ) {
				if ( trim($post->app_t_usulan_pelatihan_vtype) != 'application/pdf' ) {
					$data['status']  = false;
					$data['msg'] = 'Lampiran wajib dalam format PDF';
					$data['obj'] = 'app_t_usulan_pelatihan_lampiran';
				} else if ( $files->size > (int)$this->session->sysparam->max_size_upload[0] ) {
					$data['status']  = false;
					$data['msg'] = str_replace('__upload__', 'Lampiran Surat Usulan (dlm format PDF)', $this->session->msg_max_size_upload_tercapai[0]);
					$data['obj'] = 'app_t_usulan_pelatihan_lampiran';
				}
		}

		return $data;
	}
	
	function updateCheck_app_t_usulan_pelatihan_tfile($value, $post, $id) {
	  return $this->insertCheck_app_t_usulan_pelatihan_tfile($value, $post);
	}
	
	public function manipulate_update_button($buttons, $datas) {
	  $btn_simpankirim = "<button type='submit' id='btn_send' class='btn btn-primary' style='{$style}' 
								onclick='tinyMCE.triggerSave(true,true);$(\"#t_verifikasi_usulan_pelatihan_form-edit #app_t_usulan_pelatihan_istatus\").val(1);'>
										<i class='glyphicon glyphicon-send'></i>&nbsp;Simpan & Kirim
									</button>";

		$buttons['simpan'] .= $btn_simpankirim;
		//array_push($buttons, $btn_simpankirim);

		return $buttons;
	}
	
	function gettotaldaftarpegawai($iusulanid) {
		return $this->getrow('', 'app_t_usulan_pelatihan_pegawai', 'count(*) as total', array('iusulanid'=>$iusulanid))->total;
	}
	
	function after_delete_processor($id) {
		$where = array('iusulanid'=>$id);
		$this->dbpeng->where($where);
		$this->dbpeng->delete('t_usulan_pegawai');
	}

	function viewBox_app_t_usulan_pelatihan_daftarnama($name, $value, $datas) {
		$html = "<div>
				<ul class='nav nav-tabs' role='tablist' id='all_tabs'>
				  <li role='presentation' class='active'>
					  <a href='#tab1' data-toggle='tab' aria-controls='tab1' role='tab'>Daftar Pegawai</a>
				  </li>
				</ul>
			  
				<div class='tab-content'>
				  <div role='tabpanel' class='tab-pane fade in active' id='tab1'></div>
				</div>
			  </div>";
			  
	  	$html .= "<script type='text/javascript'>
				  $(document).ready(function() {
					  //tab 1
					  url = '".base_url()."perbend/t_usulan_pelatihan_daftar/index';
					  $('#tab1').html(getHTML(url, '', 0, false));
					  $('#t_usulan_pelatihan_daftar #q_app_t_usulan_pegawai_iusulanid').val($('.app_t_usulan_pelatihan_id').val());
					  $('#t_usulan_pelatihan_daftar #q_app_t_usulan_pegawai_ispelatihan').val(1);
				  });
				  
				</script>";				
			  
	  return $html;	
	}

	function viewBox_app_t_usulan_pelatihan_ipelatihanid($name, $value) {
		$name_txt = $this->getrow('', 'app_m_pelatihan', 'vdesc', array('id'=>$value))->vdesc;
		$html = "<p class='form-control-static {$name}'>".$name_txt."</p>";
		return $html;
	}

	function insertBox_app_t_usulan_pelatihan_ipelatihanid($name) {
		return $this->updateBox_app_t_usulan_pelatihan_ipelatihanid($name, '', '');
	}

	function updateBox_app_t_usulan_pelatihan_ipelatihanid($name, $value, $datas) {
		$nama_txt = $this->getrow('', 'app_m_pelatihan', 'vdesc',array('id'=>$value))->vdesc;
		$input = "<div class='row'>
					<div class='col-xs-12 col-md-10'>
						<input value='{$value}' type='hidden' class='form-control {$name}' id='{$name}' name='{$name}' placeholder='Nama Pelatihan'>
						<input value='{$nama_txt}' readonly type='text' class='form-control {$name}_txt' id='{$name}_txt' name='{$name}_txt' placeholder='Nama Pelatihan'>
					</div>
					<div class='col-xs-6 col-md-2' style='padding-left:-5px;'>
						<button type='button' class='btn btn-primary btn-xs' 
						onclick=\"_browse('".base_url()."perbend/lookup_m_pelatihan/index');\" 
						data-toggle='modal' data-target='#myModal_browse' 
						data-backdrop='static' data-keyboard='false'>[ ... ]</button>
					</div>
				</div>";

		$input .= "<div class='modal fade' id='myModal_browse' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
				<div class='modal-dialog' role='document' style='width:80%;'>
				<div class='modal-content'>
					<div class='modal-header'>
					<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					<h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Browse Pelatihan </h4>
					</div>
					<div class='modal-body' id='modal-body' style='overflow-x: auto;'>
					<div class='form-group'>
						<div id='html_telusuri'></div>
					</div>
					</div>
				</div>
				</div>
			</div>";
					

		return $input;
	}
}