<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends MX_Controller {
	var $status = array(0=>'Aktif', 1=>'Non Aktif');
    var $table;
	public function __construct() {
		parent::__construct();
		$controller = "privileges/menu";
		$table  = "priv_t_menu";
		$this->table = $table;
		
        //$this->_setModal(true);
		$this->_setTitle('Menu');
		$this->_setController($controller);
		$this->_init();

		$this->_addTable($table);

		//_addField($table, $field, $alias='', $required=false, $hide=false, $free=false, $width=0, $align='left', $func='', $msg='') {

		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'iparentid', 'Header Menu', true);
		$this->_addField($table, 'cmenucode', 'Kode Menu', true, false, false, 0, 'left', '', 'Kode Menu Wajib Diisi!');
		$this->_addField($table, 'cmenuname', 'Nama Menu', true, false, false, 0, 'left', '', 'Nama Menu Wajib Diisi!');
		$this->_addField($table, 'cmenucontroller', 'Controller', true, false, false, 0, 'left', '', 'Controller Menu Wajib Diisi!');

		$this->_addField($table, 'cmenuurut', 'Urutan', true, false, false, 0, 'left', '', 'Urutan Menu Wajib Diisi!');
		$this->_addField($table, 'cmenuicon', 'Icon', false, false, false, 0, 'center');
		$this->_addField($table, 'cismodule', 'Module ?', false, false, false, 0, 'center');
		$this->_addField($table, 'ldeleted', 'Status Record', true, false, false, 0, 'justify', '', 'Status Record Wajib Diisi!');

		$this->_add2ListField($table, 'iparentid, cmenucode, cmenuname, cmenucontroller, cmenuurut, cmenuicon, cismodule, ldeleted');

		$this->_add2SearchField($table, 'kriteria', true);
		//klo _add2SearchField 2nd parameter set to true, jangan lupa add dibawah :
		$this->_addQuery($table, array('cmenucode', 'cmenuname', 'cmenucontroller'));

		$this->_add2SearchField($table, 'cismodule');
		$this->_add2SearchField($table, 'ldeleted');

		$this->_addOrderBy($table, array('cmenuurut'=>'asc'));
		
		$this->_changeType($table, 'cismodule', 'combobox', array('Tidak', 'Ya'));
		$this->_changeType($table, 'ldeleted', 'combobox', array('Aktif', 'Non Aktif'));

		$this->_setAlign($table, 'ldeleted', 'center');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}

    /*function manipulate_url_save($save) {
		unset($save);
        //save(url, table_id, default_txt_confirm='', _ismodal=false, _modals='form-modal', _islochref=false, _isclose=false) {
		$save['method'] = "save('".base_url()."privileges/menu', 'menu', '', false, 'menu_form-modal', false, true)";
		
		return $save;
	}*/

	/*function before_render_create() {
		$data['msg'] = array("Anda tidak berhak untuk mengakses halaman ini. Terima Kasih", "Hak Akses Halaman");

		return $data;
	}*/
/*
	function before_render_update($id) {
		$data['msg'] = array("Anda tidak berhak untuk mengakses halaman ini. ID#{$id} Terima Kasih", "Hak Akses Halaman");

		return $data;
	}

	function before_render_view($id) {
		return $this->before_render_update($id);
	}
	
	function before_render_delete($id) {
		$data = array();
		$data['status'] = false;
		$data['msg'] = "Anda tidak berhak untuk menghapus. ID#{$id} Terima Kasih";

		return $data;
	}*/

	/*public function searchBox_priv_t_menu_ldeleted($name) {
		$html = "<select class='flat input-sm q_{$name}' name='q_{$name}' id='q_{$name}' style='width:auto;border:1px solid #DEDEDE;'>
		    			<option value=''>ALL</option>
		    			<option value='0'>Aktif</option>
		    			<option value='1'>Non Aktif</option>
		    		</select>";
		return $html;
	}*/

	public function listBox_priv_t_menu_ldeleted($val) {
		return $this->status[$val];
	}

	public function listBox_priv_t_menu_iparentid($val) {
		$this->db->select('cmenuname');
		$this->db->where('id', $val);
		$query = $this->db->get('priv_t_menu');
		if ( $query ) {
			$row = $query->row();
			return ($row->cmenuname == '' ? '/' : $row->cmenuname);
		} else return '-';
	}

	public function viewBox_priv_t_menu_iparentid($id, $value, $datas) {
		$this->db->select('cmenucode');
		$this->db->from('priv_t_menu');
		$this->db->where(array('id'=>$value));
		$query = $this->db->get();
		if ( $query ) {
			$row = $query->row();
		} else $row = null;

		$html = "<p class='form-control-static {$id}'>".($value == 0 ? '/' : $row->cmenucode)."</p>";
		return $html;
	}

	public function viewBox_priv_t_menu_ldeleted($id, $value, $datas) {
		$html = "<p class='form-control-static {$id}'>".$this->status[$value]."</p>";
		return $html;
	}

	public function insertBox_priv_t_menu_iparentid($name) {
		$this->db->select('id, cmenucode, cmenuurut');
		$this->db->from('priv_t_menu');
		$this->db->order_by('cmenuurut', 'asc');
		$query = $this->db->get();
		if ( $query ) {
			$rows = $query->result();
		} else $rows = null;

		$input  = "<select name='{$name}' id='{$name}' class='form-control {$name}' onchange='fill_parentid(this);'>";
		$input .= "<option data-id='' data-urut='' value='0'>Root</option>";
		foreach($rows as $r) {
			$input .= "<option data-id='{$r->cmenucode}' data-urut='{$r->cmenuurut}' value='{$r->id}'>{$r->cmenucode}</option>";
		}
		$input .= "</select>";
		$input .= "<script type='text/javascript'>
                     $('#{$name}').select2();
					 function fill_parentid(a) {
					 	var header_menu = $(a).find(':selected').attr('data-id');
					 	var menu_urut = $(a).find(':selected').attr('data-urut');
					 	$('#{$this->table}_cmenucode').val(header_menu+'/');
					 	$('#{$this->table}_cmenuurut').val(menu_urut+'_');
					 	$('#{$this->table}_cmenucode').focus();	
					 }
				   </script>";

		return $input;
	}

	public function updateBox_priv_t_menu_iparentid($name, $value, $datas) {
		
		$this->db->select('id, cmenucode, cmenuurut');
		$this->db->from('priv_t_menu');
		$this->db->order_by('cmenuurut', 'asc');
		$query = $this->db->get();
		if ( $query ) {
			$rows = $query->result();
		} else $rows = null;

		$input  = "<select name='{$name}' id='{$name}' class='form-control {$name}' onchange='fill_parentid(this);'>";
		$input .= "<option data-id='' data-urut='' value='0'>Root</option>";
		foreach($rows as $r) {
			if ( $r->id == $value ) $selected = ' selected';
			else $selected = '';
			$input .= "<option {$selected} data-id='{$r->cmenucode}' data-urut='{$r->cmenuurut}' value='{$r->id}'>{$r->cmenucode}</option>";
		}
		$input .= "</select>";
		
		$input .= "<script type='text/javascript'>
                     $('#{$name}').select2();
					 function fill_parentid(a) {
					 	var header_menu = $(a).find(':selected').attr('data-id');
						var menu_urut = $(a).find(':selected').attr('data-urut');
					 	$('#{$this->table}_cmenucode').val(header_menu+'/');
					 	$('#{$this->table}_cmenuurut').val(menu_urut+'_');
					 	$('#{$this->table}_cmenucode').focus();
					 }
				   </script>";

		return $input;
	}

	public function insertBox_priv_t_menu_ldeleted($name) {
		$input  = "<select name='{$name}' id='{$name}' class='form-control {$name}'>";
		foreach($this->status as $k=>$r) {
			$input .= "<option value='{$k}'>{$r}</option>";
		}
		$input .= "</select>";

		return $input;
	}

	public function updateBox_priv_t_menu_ldeleted($name, $value, $datas) {
		$input  = "<select name='{$name}' id='{$name}' class='form-control {$name}'>";
		foreach($this->status as $k=>$r) {
			if ( $k == $value ) $selected = ' selected';
			else $selected = '';
			$input .= "<option {$selected} value='{$k}'>{$r}</option>";
		}
		$input .= "</select>";

		return $input;
	}

	public function after_insert_processor($id, $post) {
		$new_post = array();
		$new_post['tcreated']   = date('Y-m-d H:i:s');
		$new_post['ccreatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update('priv_t_menu', $new_post);
	}


	public function after_update_processor($id, $post, $oldpost) {
		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update('priv_t_menu', $new_post);
	}
	
	function insertCheck_priv_t_menu_cmenucode($val, $post) {
		$data = array();
		
		$this->db->select('count(*) as total');
		$this->db->where('cmenucode', trim($val));
		$query = $this->db->get('priv_t_menu');
		//echo $this->db->last_query();
		if ( $query ) {
			if ( $query->row()->total > 0 ) {
				$data['status']  = false;
				$data['msg'] = 'Kode Menu sudah ada';
			} else $data['status'] = true;
		} else $data['status'] = false;
		
		return $data;
	}
	
	function updateCheck_priv_t_menu_cmenucode($val, $post, $id) {
		$data = array();
		
		$this->db->select('count(*) as total');
		$this->db->where('cmenucode', trim($val));
		$this->db->where('id !='.$id);
		$query = $this->db->get('priv_t_menu');
		//echo $this->db->last_query();
		if ( $query ) {
			if ( $query->row()->total > 0 ) {
				$data['status']  = false;
				$data['msg'] = 'Kode Menu sudah ada';
			} else $data['status'] = true;
		} else $data['status'] = false;
		
		return $data;
	}
	
	function getRowsByParameter($params) {
		$this->db->select('*');
		$this->db->where($params);
		$query = $this->db->get('priv_t_menu');
		if ( $query ) {
			return $query->result();
		} else return null;
	}
	
	function getRowByParameter($params) {
		$this->db->select('*');
		$this->db->where($params);
		$query = $this->db->get('priv_t_menu');
		if ( $query ) {
			return $query->row();
		} else return null;
	}
}
