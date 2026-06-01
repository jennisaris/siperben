<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends MX_Controller {
	var $status = array(0=>'Aktif', 1=>'Non Aktif');

	public function __construct() {
		parent::__construct();
		$controller = "privileges/group";
		$table  = "priv_t_group";

    $this->_setTitle('Group');
		$this->_setController($controller);
		$this->_init();

		$this->_addTable($table);

		//public function _addField($table, $field, $alias='', $required=false, $hide=false, $free=false, $width=0, $align='left', $func='', $msg='Lengkapi Isian Anda') {
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'vname', 'Nama Group', true);
		$this->_addField($table, 'vdesc', 'Deskripsi', true);
		$this->_addField($table, 'isadmin', 'Group Admin ?', true);
		$this->_addField($table, 'ldeleted', 'Status Record', true, false, false, 0, 'center');
		$this->_addField($table, 'menu', 'Menu', false, false, true, 0);

		$this->_add2ListField($table,'vname, vdesc, isadmin, ldeleted');

		$this->_add2SearchField($table, 'vname');
		$this->_add2SearchField($table, 'ldeleted');

		$this->_addOrderBy($table, array('id'=>'asc'));


		$this->_setAlign($table, 'ldeleted', 'center');
		$this->_setAlign($table, 'isadmin', 'center');

		$this->_changeType($table, 'isadmin', 'combobox', $this->session->sysparam->yesno);

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}

	public function updateBox_priv_t_group_vname($name, $value, $datas) {
		$input = "<input readonly type='text' name='{$name}' id='{$name}' class='form-control {$name}' placeholder='Nama Group' value='{$value}'/>";
		return $input;
	}

	public function searchBox_priv_t_group_ldeleted($name) {
		$html = "<select class='flat input-sm q_{$name}' name='q_{$name}' id='q_{$name}' style='width:auto;border:1px solid #DEDEDE;'>
		    			<option value=''>ALL</option>
		    			<option value='0'>Aktif</option>
		    			<option value='1'>Non Aktif</option>
		    		</select>";
		return $html;
	}

	public function listBox_priv_t_group_ldeleted($val) {
		return $this->status[$val];
	}
	
	public function listBox_priv_t_group_vname($val, $datas) {
		return $val.' ( '.$datas->priv_t_group_id.' )';
	}

	public function insertBox_priv_t_group_ldeleted($name) {
		$input  = "<select name='{$name}' id='{$name}' class='form-control {$name}'>";
		foreach($this->status as $k=>$r) {
			$input .= "<option value='{$k}'>{$r}</option>";
		}
		$input .= "</select>";

		return $input;
	}

	public function updateBox_priv_t_group_ldeleted($name, $value, $datas) {
		$input  = "<select name='{$name}' id='{$name}' class='form-control {$name}'>";
		foreach($this->status as $k=>$r) {
			if ( $k == $value ) $selected = ' selected';
			else $selected = '';
			$input .= "<option {$selected} value='{$k}'>{$r}</option>";
		}
		$input .= "</select>";

		return $input;
	}

	public function viewBox_priv_t_group_ldeleted($name, $value, $datas) {
		return "<p>".$this->status[$value]."</p>";
	}

	public function insertBox_priv_t_group_menu($name) {
		$html = "<div class='form-group' id='{$name}'></div>";

		return $html;
	}

	public function updateBox_priv_t_group_menu($name, $value, $datas) {
		$html = "<div class='form-group' id='{$name}'>".$this->menu($datas->priv_t_group_id)."</div>";

		return $html;
	}

	public function viewBox_priv_t_group_menu($name, $value, $datas) {
		$html = "<div class='form-group' id='{$name}'>".$this->menu($datas->priv_t_group_id)."</div>";

		return $html;
	}

	public function menu($group_id, $view='') {
		$tbl_menu = 'priv_t_menu';
		$this->db->select("*");
		$this->db->where('ldeleted', '0');
		$this->db->order_by('cmenuurut', 'asc');
		$query = $this->db->get($tbl_menu);

		if ( $query ) {
			$rows =  $query->result();
		} else $rows = null;

		$html = "<div id='grid_popup'>";
		$html .= "<table class='table table-bordered table-condensed table-striped'>";
		$html .= "<tr>";
		$html .= "<th colspan='4' style='vertical-align:middle;text-align:center;'><strong>Action</strong></th>";
		$html .= "<th rowspan='2' style='vertical-align:middle;text-align:center;'><strong>Menu Path</strong></th>";
		$html .= "<th rowspan='2' style='vertical-align:middle;text-align:center;'><strong>Menu Name</strong></th>";
		$html .= "</tr>";

		$html .= "<tr><th><strong>View</strong></th>";
		$html .= "<th><strong>Add</strong></th>";
		$html .= "<th><strong>Edit</strong></th>";
		$html .= "<th><strong>Delete</strong></th></tr>";

		$i=0;
		foreach($rows as $r) {
		    if ( $r->cismodule == 1 ) $class='#d9dce2;';
            else $class='#FFFFFF;';
            
			$html .= "<tr id='trh_".$i."' style='background-color:{$class};'>";

			$this->db->select('iallowview, iallowadd, iallowedit, iallowdelete');
			$this->db->where('imenuid', $r->id);
			$this->db->where('igroupid', $group_id);
			$query = $this->db->get($tbl_menu.'_group_privileges');

			if ( $query ) {
				$akses = $query->row();
			} else $akses = null;

			$allow_view   = $akses->iallowview   == 1 ? 'checked' : '';
			$allow_add    = $akses->iallowadd    == 1 ? 'checked' : '';
			$allow_edit   = $akses->iallowedit   == 1 ? 'checked' : '';
			$allow_delete = $akses->iallowdelete == 1 ? 'checked' : '';


			if ( $view != '' ) {
				$readonly = ' readonly';
			} else {
				$readonly = '';
				//if ( $r->cmenucontroller != '#' ) $readonly = '';
				//else $readonly = ' readonly';
			}

			//action
			$rb1 = "<input {$readonly} {$allow_view} type='checkbox' class='view_".$r->id."' name='view_".$r->id."' id='view_".$r->id."' value = '".$akses->iallowview."'/>";
			$rb2 = "<input {$readonly} {$allow_add} type='checkbox' class='add_".$r->id."' name='add_".$r->id."' id='add_".$r->id."' value = '".$akses->iallowadd."'/>";
			$rb3 = "<input {$readonly} {$allow_edit} type='checkbox' class='edit_".$r->id."' name='edit_".$r->id."' id='edit_".$r->id."' value = '".$akses->iallowedit."'/>";
			$rb4 = "<input {$readonly} {$allow_delete} type='checkbox' class='delete_".$r->id."' name='delete_".$r->id."' id='delete_".$r->id."' value = '".$akses->iallowdelete."'/>";
			$rb5 = "<input {$readonly} type='hidden' name='menu_".$r->id."' id='menu_".$r->id."' value = '".$r->id."'/>";

			$html .= "<td width='2%' style='text-align:center;padding-top:1px;'>".$rb1.$rb5."</td>";
			if ( trim($r->cmenucontroller) != '#' ) {
				$html .= "<td width='2%' style='text-align:center;padding-top:1px;'>".$rb2."</td>";
				$html .= "<td width='2%' style='text-align:center;padding-top:1px;'>".$rb3."</td>";
				$html .= "<td width='2%' style='text-align:center;padding-top:1px;'>".$rb4."</td>";
			} else {
				$html .= "<td width='2%' style='text-align:center;padding-top:1px;'>&nbsp;</td>";
				$html .= "<td width='2%' style='text-align:center;padding-top:1px;'>&nbsp;</td>";
				$html .= "<td width='2%' style='text-align:center;padding-top:1px;'>&nbsp;</td>";
			}

			$html .= "<td onclick='check_all({$r->id});' width='45%' style='text-align:left;cursor:pointer;'>".$r->cmenucode."</td>";
			$html .= "<td onclick='check_all({$r->id});' width='53%' style='text-align:left;cursor:pointer;'>".$r->cmenuname."</td>";

			$i++;
		}
		$html .= "</table>";
		$html .= "</div>";

		return $html;
	}

	public function after_insert_processor($last_id, $post) {
		//echo 'insert';
		$post = (object)$_POST;
		$tbl_menu = 't_menu';

		$view = array();
		$add  = array();
		$edit = array();
		$delete = array();
		$menu   = array();

		foreach($post as $key=>$v) {

			if (preg_match('/^view_(.*)$/', $key, $match)) {
				$no = $match[1];
				$view[$no] =  intval($v);
			}

			if (preg_match('/^add_(.*)$/', $key, $match)) {
				$no = $match[1];
				$add[$no] =  intval($v);
			}

			if (preg_match('/^edit_(.*)$/', $key, $match)) {
				$no = $match[1];
				$edit[$no] =  intval($v);
			}

			if (preg_match('/^delete_(.*)$/', $key, $match)) {
				$no = $match[1];
				$delete[$no] =  intval($v);
			}

			if (preg_match('/^menu_(.*)$/', $key, $match)) {
				$no = $match[1];
				$menu[$no] =  intval($v);
			}
		}

		$query2  = array();
		$query1  = array();

		foreach ($menu as $y=>$v) {

			$add1    = isset($add[$y]) ? 1 : 0;
			$view1   = isset($view[$y]) ? 1 : 0;
			$edit1   = isset($edit[$y]) ? 1 : 0;
			$delete1 = isset($delete[$y]) ? 1 : 0;

			$query1[] = "DELETE FROM priv_{$tbl_menu}_group_privileges where igroupid = {$last_id} and imenuid = {$v}";
			$query2[] = "INSERT INTO priv_{$tbl_menu}_group_privileges (igroupid, imenuid, iallowview, iallowadd, iallowedit, iallowdelete,
						tcreated, ccreatedby, tupdated, cupdatedby) values ({$last_id}, {$v}, '".intval($view1)."',
						'".intval($add1)."', '".intval($edit1)."', '".intval($delete1)."', CURRENT_TIMESTAMP, '".$username."', CURRENT_TIMESTAMP, '".$username."')";
		}

		//print_r($query1);
		//print_r($query2);
		//exit;

		foreach($query1 as $q) {
			try {
				$this->db->query($q);
			}catch(Exception $e) {
				die('Gagal 1');
			}
		}

		foreach($query2 as $q) {
			try {
				$this->db->query($q);
			}catch(Exception $e) {
				die('Gagal 2');
			}
		}


		$new_post = array();
		$new_post['tcreated']   = date('Y-m-d H:i:s');
		$new_post['ccreatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $last_id);
		$this->db->update('priv_t_group', $new_post);
	}

	public function after_update_processor($last_id, $post) {
		//echo 'update';
		//print_r($post);
		$post = (object)$_POST;
		//exit;
		$tbl_menu = 't_menu';

		$view = array();
		$add  = array();
		$edit = array();
		$delete = array();
		$menu   = array();

		foreach($post as $key=>$v) {

			if (preg_match('/^view_(.*)$/', $key, $match)) {
				$no = $match[1];
				$view[$no] =  intval($v);
			}

			if (preg_match('/^add_(.*)$/', $key, $match)) {
				$no = $match[1];
				$add[$no] =  intval($v);
			}

			if (preg_match('/^edit_(.*)$/', $key, $match)) {
				$no = $match[1];
				$edit[$no] =  intval($v);
			}

			if (preg_match('/^delete_(.*)$/', $key, $match)) {
				$no = $match[1];
				$delete[$no] =  intval($v);
			}

			if (preg_match('/^menu_(.*)$/', $key, $match)) {
				$no = $match[1];
				$menu[$no] =  intval($v);
			}
		}

		$query2  = array();
		$query1  = array();

		foreach ($menu as $y=>$v) {

			$add1    = isset($add[$y]) ? 1 : 0;
			$view1   = isset($view[$y]) ? 1 : 0;
			$edit1   = isset($edit[$y]) ? 1 : 0;
			$delete1 = isset($delete[$y]) ? 1 : 0;

			$query1[] = "DELETE FROM priv_{$tbl_menu}_group_privileges where igroupid = {$last_id} and imenuid = {$v}";
			$query2[] = "INSERT INTO priv_{$tbl_menu}_group_privileges (igroupid, imenuid, iallowview, iallowadd, iallowedit, iallowdelete,
						tcreated, ccreatedby, tupdated, cupdatedby) values ({$last_id}, {$v}, '".intval($view1)."',
						'".intval($add1)."', '".intval($edit1)."', '".intval($delete1)."', CURRENT_TIMESTAMP, '".$username."', CURRENT_TIMESTAMP, '".$username."')";
		}

		//print_r($query1);
		//rint_r($query2);
		//exit;

		foreach($query1 as $q) {
			try {
				$this->db->query($q);
			}catch(Exception $e) {
				die('Gagal 1');
			}
		}

		foreach($query2 as $q) {
			try {
				$this->db->query($q);
			}catch(Exception $e) {
				die('Gagal 2');
			}
		}

		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $last_id);
		$this->db->update('priv_t_group', $new_post);
	}

    public function after_delete_processor($id) {
        $this->db->where('igroupid', $id);
        $this->db->delete('priv_t_menu_group_privileges');
    }

	function priv_t_group_output() {
		$js = "<script type='text/javascript'>
					var ischeck = 1;
					function check_all(a) {
						if ( ischeck % 2 ) {  
							$('.view_'+a).attr('checked', true);
							$('.add_'+a).attr('checked', true);
							$('.edit_'+a).attr('checked', true);
							$('.delete_'+a).attr('checked', true);
						} else {
							$('.view_'+a).attr('checked', false);
							$('.add_'+a).attr('checked', false);
							$('.edit_'+a).attr('checked', false);
							$('.delete_'+a).attr('checked', false);
						}
						ischeck++;
					}
			   </script>";
		
		return $js;
	}
	
}
