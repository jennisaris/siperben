<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_perubahan extends MX_Controller {
  var $prefix = 'app';
	public function __construct() {
		parent::__construct();
		$controller = "perbend/m_perubahan";
		$table  = $this->prefix."_m_perubahan";

   	$this->_setTitle('Perubahan');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'vdesc', 'Nama Perubahan', true);
		$this->_addField($table, 'cjabid2', 'Jabatan', false);
		$this->_addField($table, 'ldeleted', 'Status Record', true);
		$this->_addField($table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($table, 'cupdatedby', 'Diubah oleh', false, true);

    $this->_add2SearchField($table, 'vdesc');
    $this->_add2SearchField($table, 'ldeleted');
    
    $this->_changeType($table, 'ldeleted', 'combobox', 
    array(0=>'Aktif', 1=>'Non Aktif'));
    
		$this->_add2ListField($table, 'vdesc, cjabid2, ldeleted, tupdated, cupdatedby');
		
		$this->_setAlign($table, 'ldeleted', 'center');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}
	
	function listBox_app_m_perubahan_tupdated($value, $datas) {
	  if ( $value != null ) {
	    return date('d-m-Y H:i:s', strtotime($value));
	  } else return date('d-m-Y H:i:s', strtotime($datas->app_m_perubahan_tcreated));
	}
	
	function listBox_app_m_perubahan_cupdatedby($value, $datas) {
	  if ( $value != null ) {
	    $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($value)))->realname;
	   } else {
	     $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($datas->app_m_perubahan_ccreatedby)))->realname;
	   }
	  
	  return $nama;
	}

	public function after_insert_processor($id, $post) {
		$new_post = array();
		$new_post['tcreated']   = date('Y-m-d H:i:s');
		$new_post['ccreatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_m_perubahan', $new_post);
	}

	public function after_update_processor($id, $post, $oldpost) {
		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_m_perubahan', $new_post);
	}
	
	function listBox_ACTION($buttons, $datas) {
	  unset($buttons['hapus']);
	  
	  return $buttons;
	}
	
	public function listBox_app_m_perubahan_cjabid2($val, $data) {
		$groups = '';
		$vals = explode(",", $val);
		$this->db->select('ckode');
		$this->db->where_in('id', $vals);
		$query = $this->db->get($this->prefix.'_m_jabatan');
		if ( $query ) {
			$rows = $query->result();
			foreach($rows as $r) {
				$groups .= $r->ckode.',';
			}
			$groups = substr($groups, 0, strlen($groups)-1);
			return $groups;
		} else return '-';
	}

	public function insertBox_app_m_perubahan_cjabid2($name, $paramku) {
		$this->db->select('id, ckode');
		$this->db->from($this->prefix.'_m_jabatan');
		$this->db->where(array('ijns'=>1));
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		if ( $query ) {
			$rows = $query->result();
		} else $rows = null;

		$input  = "<select name='{$name}[]' id='{$name}' class='form-control {$name}' multiple='multiple'>";
		foreach($rows as $r) {
			$input .= "<option value='{$r->id}'>{$r->ckode}</option>";
		}
		$input .= "</select>";
		
		$input .= "<script type='text/javascript'>";
		$input .= "$('#{$name}').select2();";
		$input .= "</script>";

		return $input;
	}

	public function updateBox_app_m_perubahan_cjabid2($name, $value, $datas) {
		$this->db->select('id, ckode');
		$this->db->from($this->prefix.'_m_jabatan');
		$this->db->where(array('ijns'=>1));
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		if ( $query ) {
			$rows = $query->result();
		} else $rows = null;
		
		$value = explode(",", $value);

		$input  = "<select name='{$name}[]' id='{$name}' class='form-control {$name}' multiple='multiple'>";
		foreach($rows as $r) {
			if ( in_array($r->id, $value))  $selected = " selected";
			else $selected = "";
			$input .= "<option {$selected} value='{$r->id}'>{$r->ckode}</option>";
		}
		$input .= "</select>";
		
		$input .= "<script type='text/javascript'>";
		$input .= "$('#{$name}').select2();";
		$input .= "</script>";

		return $input;
	}

	public function viewBox_app_m_perubahan_cjabid2($name, $value, $datas) {
		$this->db->select('id, ckode');
		$this->db->from($this->prefix.'_m_jabatan');
		$this->db->where(array('id'=>$value));
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		if ( $query ) {
			$row = $query->row();
		} else $row = null;

		$html = "<p class='form-control-static {$name}'>".$row->ckode."</p>";
		return $html;
	}
	
	public function before_insert_processor($post) {
		$cjabid2 = '';
		foreach ($post->app_m_perubahan_cjabid2 as $v) {
			$cjabid2 .= $v.',';
		}
		$cjabid2 = substr($cjabid2, 0, strlen($cjabid2)-1);
		$post->app_m_perubahan_cjabid2 = $cjabid2;
		return $post;
	}

	public function before_update_processor($id, $post, $oldpost) {
		
		$cjabid2 = '';
		foreach ($post->app_m_perubahan_cjabid2 as $v) {
			$cjabid2 .= $v.',';
		}
		$cjabid2 = substr($cjabid2, 0, strlen($cjabid2)-1);
		$post->app_m_perubahan_cjabid2 = $cjabid2;
		return $post;
	}
}