<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ttd extends MX_Controller {
  var $prefix = 'app';
	public function __construct() {
		parent::__construct();
		$controller = "perbend/m_ttd";
		$table  = $this->prefix."_m_ttd";

   	$this->_setTitle('Penandatangan');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'cnip', 'NIP', true);
		$this->_addField($table, 'vname', 'Nama Lengkap', true);
		$this->_addField($table, 'isan', 'Atas Nama ?', true);
		$this->_addField($table, 'isplt', 'Plt. ?', true);
		$this->_addField($table, 'ldeleted', 'Status Record', true);
		$this->_addField($table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($table, 'cupdatedby', 'Diubah oleh', false, true);

    //$this->_add2SearchField($table, 'cnip');
    //$this->_add2SearchField($table, 'vname');
    //$this->_add2SearchField($table, 'ldeleted');
    
    //print_r($this->session->sysparam->ldeleted);
    //exit;
    
    $this->_changeType($table, 'ldeleted', 'combobox', 
    $this->session->sysparam->ldeleted);
    $this->_changeType($table, 'isan', 'combobox', 
    $this->session->sysparam->yesno);
    $this->_changeType($table, 'isplt', 'combobox', 
    $this->session->sysparam->yesno);
    
		$this->_add2ListField($table, 'cnip, vname, isan, isplt, ldeleted, tupdated, cupdatedby');
		
		$this->_setAlign($table, 'ldeleted', 'center');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}
	
	function listBox_app_m_ttd_tupdated($value, $datas) {
	  if ( $value != null ) {
	    return date('d-m-Y H:i:s', strtotime($value));
	  } else return date('d-m-Y H:i:s', strtotime($datas->app_m_ttd_tcreated));
	}
	
	function listBox_app_m_ttd_cupdatedby($value, $datas) {
	  if ( $value != null ) {
	    $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($value)))->realname;
	   } else {
	     $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($datas->app_m_ttd_ccreatedby)))->realname;
	   }
	  
	  return $nama;
	}

	public function after_insert_processor($id, $post) {
		$new_post = array();
		$new_post['tcreated']   = date('Y-m-d H:i:s');
		$new_post['ccreatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_m_ttd', $new_post);
	}

	public function after_update_processor($id, $post, $oldpost) {
		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_m_ttd', $new_post);
	}
	
	/*function listBox_ACTION($buttons, $datas) {
	  unset($buttons['hapus']);
	  
	  return $buttons;
	}*/
	
	function app_m_ttd_output(){
	  $js ="<script type='text/javascript'>
	            $(document).ready(function() {
	              $('#app_m_ttd_cnip').typeahead({
      						source: function (query, result) {
      							$.ajax({
      								url: '".base_url()."kepegawaian/m_pegawai/getemployee',
      								data: 'query='+query,
      								dataType: 'json',
      								type: 'POST',
      								beforeSend: function() {
      									// alert('sending data');
      									// do some loading options
      									if ( isloading==true ) $('#divLoading').addClass('show');
      									if ( !debug ) {
      										$('button').attr('disabled', true);
          										$('.btn_save').html(\"<i class='fas fa-cog fa-spin'> </i> Mohon Tunggu...\");
          									}
          								},
          					  success: function (data) {
          										result($.map(data, function (item) {
          										return item;
          									}));
          								}
          							});
          						},
          						items: 20,
          						updater: function (item) {
          						  $('#app_m_ttd_vname').val(item.value);
          							return  item.nip;
          						},
          					});
	            });
	            
	            
	      </script>";
	  return $js;
	}
	
	function updateBox_app_m_ttd_vname($name, $value, $datas) {
	  $input = "<input readonly type='text' 
	            placeholder='Masukkan nama lengkap'
	            name='{$name}' id='{$name}' 
	            class='form-control {$name}' 
	            value='{$value}'/>";
	            
	 return $input;
	}
	
	function insertBox_app_m_ttd_vname($name) {
	  return $this->updateBox_app_m_ttd_vname($name, '', '');
	}
	
	function updateBox_app_m_ttd_cnip($name, $value, $datas) {
	  $input = "<input readonly type='text' 
	            placeholder='Masukkan nama lengkap'
	            name='{$name}' id='{$name}' 
	            class='form-control {$name}' 
	            value='{$value}'/>";
	            
	 return $input;
	}
}
