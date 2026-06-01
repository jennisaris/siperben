<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sysparam extends MX_Controller {
	var $status = array(0=>'Aktif', 1=>'Non Aktif');

	public function __construct() {
		parent::__construct();
		$controller = "privileges/sysparam";
		$table  = "sysparam";

    	$this->_setTitle('Sysparam');
		$this->_setController($controller);
		$this->_init();

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'ckode', 'Kode', true);
		$this->_addField($table, 'vdesc', 'Deskripsi', true);
		$this->_addField($table, 'visi', 'Isi Parameter', true);
		$this->_addField($table, 'ldeleted', 'Status Record', true, false, false, 0, 'center');

		$this->_add2ListField($table,'ckode, vdesc, visi, ldeleted');

		$this->_add2SearchField($table, 'ckode');
		$this->_add2SearchField($table, 'vdesc');
		$this->_add2SearchField($table, 'ldeleted');

		$this->_addOrderBy($table, array('id'=>'asc'));

		$this->_setAlign($table, 'ldeleted', 'center');

		$this->_changeType($table, 'vdesc', 'textarea');
		$this->_changeType($table, 'visi', 'textarea');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}

	public function updateBox_sysparam_vname($name, $value, $datas) {
		$input = "<input readonly type='text' name='{$name}' id='{$name}' class='form-control {$name}' placeholder='Nama Group' value='{$value}'/>";
		return $input;
	}

	public function searchBox_sysparam_ldeleted($name) {
		$html = "<select class='flat input-sm q_{$name}' name='q_{$name}' id='q_{$name}' style='width:auto;border:1px solid #DEDEDE;'>
		    			<option value=''>ALL</option>
		    			<option value='0'>Aktif</option>
		    			<option value='1'>Non Aktif</option>
		    		</select>";
		return $html;
	}

	public function listBox_sysparam_ldeleted($val) {
		return $this->status[$val];
	}

	public function insertBox_sysparam_ldeleted($name) {
		$input  = "<select name='{$name}' id='{$name}' class='form-control {$name}'>";
		foreach($this->status as $k=>$r) {
			$input .= "<option value='{$k}'>{$r}</option>";
		}
		$input .= "</select>";

		return $input;
	}

	public function updateBox_sysparam_ldeleted($name, $value, $datas) {
		$input  = "<select name='{$name}' id='{$name}' class='form-control {$name}'>";
		foreach($this->status as $k=>$r) {
			if ( $k == $value ) $selected = ' selected';
			else $selected = '';
			$input .= "<option {$selected} value='{$k}'>{$r}</option>";
		}
		$input .= "</select>";

		return $input;
	}

	public function viewBox_sysparam_ldeleted($name, $value, $datas) {
		return "<p>".$this->status[$value]."</p>";
	}

	

	public function after_insert_processor($last_id, $post) {
		
		$new_post = array();
		$new_post['tcreated']   = date('Y-m-d H:i:s');
		$new_post['ccreatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $last_id);
		$this->db->update('sysparam', $new_post);
	}

	public function after_update_processor($last_id, $post) {
		
		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $last_id);
		$this->db->update('sysparam', $new_post);
	}
	
}
