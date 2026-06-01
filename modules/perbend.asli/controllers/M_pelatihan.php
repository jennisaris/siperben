<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelatihan extends MX_Controller {
  var $prefix = 'app';
	public function __construct() {
		parent::__construct();
		$controller = "perbend/m_pelatihan";
		$table  = $this->prefix."_m_pelatihan";

   	$this->_setTitle('Pelatihan');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'vdesc', 'Nama Pelatihan', true);
		$this->_addField($table, 'periode', 'Tgl. Pelatihan', true, false, true);
		$this->_addField($table, 'dtglmulai', 'tglmulai', true, true);		
		$this->_addField($table, 'dtglselesai', 'dtglselesai', true, true);
		$this->_addField($table, 'vtempat', 'Tempat Pelatihan', true);
		$this->_addField($table, 'vpenyelenggara', 'Penyelenggara Pelatihan', true);
		$this->_addField($table, 'ldeleted', 'Status Record', true);
		$this->_addField($table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($table, 'cupdatedby', 'Diubah oleh', false, true);

		$this->_add2SearchField($table, 'vdesc');
		$this->_add2SearchField($table, 'dtgl');
		$this->_add2SearchField($table, 'ldeleted');
    
    	$this->_changeType($table, 'ldeleted', 'combobox', array(0=>'Aktif', 1=>'Non Aktif'));
    
		$this->_add2ListField($table, 'vdesc, periode, vtempat, vpenyelenggara, ldeleted, tupdated, cupdatedby');
		
		$this->_setAlign($table, 'ldeleted', 'center');
		$this->_setAlign($table, 'periode', 'center');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}
	
	function before_insert_processor($post) {
	  $periode = explode(' - ', $this->input->post('app_m_pelatihan_periode'));
	  $post->app_m_pelatihan_dtglmulai = date('Y-m-d', strtotime($periode[0]));
	  $post->app_m_pelatihan_dtglselesai = date('Y-m-d', strtotime($periode[1]));
	  
	  return $post;
	}
	
	function before_update_processor($id, $post, $oldpost) {
	  return $this->before_insert_processor($post);
	}
	
	function insertCheck_app_m_pelatihan_vdesc($value, $post) {
	  $data['status'] = true;
	  if ($value != '') {
	    if ($post->app_m_pelatihan_periode == '') {
	      $data['msg'] = 'Lengkapi periode pelatihan';
	      $data['status'] = false;
	      $data['obj'] = 'app_m_pelatihan_periode';
	    }
	  }
	  
	  return $data;
	}
	
	function updateCheck_app_m_pelatihan_vdesc($value, $post, $id) {
	   return $this->insertCheck_app_m_pelatihan_vdesc($value, $post);
	   
	}

	function insertBox_app_m_pelatihan_periode($name) {
		$html  = "<input style='width:200px;' autocomplete='off' placeholder='Rentang Tanggal' type='text' name='{$name}' id='{$name}' class='form-control {$name}'/>";
				
		$html .= "<script type='text/javascript'>
						$('input[name=\"{$name}\"]').daterangepicker({
							locale: {
								format: 'DD-MM-YYYY'
							}
						}).val('');

						//change the selected date range of that picker
						//$('#{$name}').data('daterangepicker').setStartDate(null);
						//$('#{$name}').data('daterangepicker').setEndDate(null);

						//val('{$periode}');
				  </script>";
				  
		return $html;
	}

	function updateBox_app_m_pelatihan_periode($name, $value, $datas) {
		$tglmulai = date('d-m-Y', strtotime($datas->app_m_pelatihan_dtglmulai));
		$tglselesai = date('d-m-Y', strtotime($datas->app_m_pelatihan_dtglselesai));

		$html  = "<input style='width:200px;' autocomplete='off' placeholder='Rentang Tanggal' type='text' name='{$name}' id='{$name}' class='form-control {$name}'/>";
				
		$html .= "<script type='text/javascript'>
						$('input[name=\"{$name}\"]').daterangepicker({
							locale: {
								format: 'DD-MM-YYYY'
							}
						});

						//change the selected date range of that picker
						$('#{$name}').data('daterangepicker').setStartDate('{$tglmulai}');
						$('#{$name}').data('daterangepicker').setEndDate('{$tglselesai}');

						//val('{$periode}');
				  </script>";
				  
		return $html;
	}

	function listBox_app_m_pelatihan_periode($value, $datas) {
		$periode = date('d-m-Y', strtotime($datas->app_m_pelatihan_dtglmulai)).' - '.date('d-m-Y', strtotime($datas->app_m_pelatihan_dtglselesai));
		return $periode;
	}
	
	function listBox_app_m_pelatihan_tupdated($value, $datas) {
	  if ( $value != null ) {
	    return date('d-m-Y H:i:s', strtotime($value));
	  } else return date('d-m-Y H:i:s', strtotime($datas->app_m_pelatihan_tcreated));
	}
	
	function listBox_app_m_pelatihan_cupdatedby($value, $datas) {
	  if ( $value != null ) {
	    $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($value)))->realname;
	   } else {
	     $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($datas->app_m_pelatihan_ccreatedby)))->realname;
	   }
	  
	  return $nama;
	}

	public function after_insert_processor($id, $post) {
		$new_post = array();
		$new_post['tcreated']   = date('Y-m-d H:i:s');
		$new_post['ccreatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_m_pelatihan', $new_post);
	}

	public function after_update_processor($id, $post, $oldpost) {
		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_m_pelatihan', $new_post);
	}
	
	function listBox_ACTION($buttons, $datas) {
	  unset($buttons['hapus']);
	  
	  return $buttons;
	}
	
}