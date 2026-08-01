<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MX_Controller {
	var $json;
	var $status = array(0=>'Aktif', 1=>'Non Aktif');
	var $isadmin = array(0=>'Tidak', 1=>'Ya');
  	var $prefix = 'priv';
	public function __construct() {
		parent::__construct();
		$controller = "privileges/user";
		$table  = $this->prefix."_t_user";

   		$this->_setTitle('User');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);

		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'username', 'Username/Kode Satker', true);
		$this->_addField($table, 'realname', 'Nama Lengkap', true);
		$this->_addField($table, 'email', 'Pos-el', true);
		$this->_addField($table, 'password', 'Password', false);
		$this->_addField($table, 'passwordr', 'Ulangi Password', false, false, true, 0);
		$this->_addField($table, 'igroupid', 'Group', false);
		$this->_addField($table, 'isuperuser', 'Superuser ?', true);
		$this->_addField($table, 'kode_lama', 'Satker', false);
		$this->_addField($table, 'credirect_page', 'Halaman Default', false);
		$this->_addField($table, 'ldeleted', 'Status Record', true);

		$this->_add2ListField($table,'username, realname, email, igroupid, isuperuser, kode_lama, credirect_page, ldeleted');

		$this->_add2SearchField($table, 'kriteria', true);
		//klo _add2SearchField 2nd parameter set to true, jangan lupa add dibawah :
		$this->_addQuery($table, array('username', 'realname'));
		$this->_add2SearchField($table, 'igroupid');
		$this->_add2SearchField($table, 'ldeleted');

		$this->_addOrderBy($table, array('id'=>'asc'));

    	$ar_menu = array(''=>' Default ');
		foreach( $this->getall('', 'priv_t_menu', 'cmenucode, cmenucontroller', array('ldeleted'=>0, 'cmenucontroller != '=>'#')) as $k=>$v ) {
			$ar_menu[$v->cmenucontroller] = $v->cmenucode; 
		}

    $this->_changeType($table, 'credirect_page', 'combobox2', $ar_menu);
		$this->_changeType($table, 'ldeleted', 'combobox', $this->session->sysparam->ldeleted);
		$this->_changeType($table, 'isuperuser', 'combobox', $this->session->sysparam->yesno);
		

		$this->_setAlign($table, 'ldeleted', 'center');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}

	public function updateBox_priv_t_user_username($name, $value, $datas) {
		$input = "<input readonly type='text' name='{$name}' id='{$name}' class='form-control {$name}' placeholder='Masukkan Username' value='{$value}'/>";
		return $input;
	}

	public function listBox_priv_t_user_igroupid($val, $data) {
		$groups = '';
		$vals = explode(",", $val);
		$this->db->select('vdesc');
		$this->db->where_in('id', $vals);
		$query = $this->db->get($this->prefix.'_t_group');
		if ( $query ) {
			$rows = $query->result();
			foreach($rows as $r) {
				$groups .= $r->vdesc.',';
			}
			$groups = substr($groups, 0, strlen($groups)-1);
			return $groups;
		} else return '-';
	}

	public function insertBox_priv_t_user_igroupid($name, $paramku) {
		$this->db->select('id, vdesc');
		$this->db->from($this->prefix.'_t_group');
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		if ( $query ) {
			$rows = $query->result();
		} else $rows = null;

		$input  = "<select name='{$name}[]' id='{$name}' class='form-control {$name}' multiple='multiple'>";
		foreach($rows as $r) {
			$input .= "<option value='{$r->id}'>{$r->vdesc}</option>";
		}
		$input .= "</select>";
		
		$input .= "<script type='text/javascript'>";
		$input .= "$('#{$name}').select2();";
		$input .= "</script>";

		return $input;
	}

	public function updateBox_priv_t_user_igroupid($name, $value, $datas) {
		$this->db->select('id, vdesc');
		$this->db->from($this->prefix.'_t_group');
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
			$input .= "<option {$selected} value='{$r->id}'>{$r->vdesc}</option>";
		}
		$input .= "</select>";
		
		$input .= "<script type='text/javascript'>";
		$input .= "$('#{$name}').select2();";
		$input .= "</script>";

		return $input;
	}

	public function viewBox_priv_t_user_igroupid($name, $value, $datas) {
		$this->db->select('id, vdesc');
		$this->db->from($this->prefix.'_t_group');
		$this->db->where(array('id'=>$value));
		$this->db->order_by('id', 'asc');
		$query = $this->db->get();
		if ( $query ) {
			$row = $query->row();
		} else $row = null;

		$html = "<p class='form-control-static {$name}'>".$row->vdesc."</p>";
		return $html;
	}

	/****/
	public function listBox_priv_t_user_kode_lama($val, $data) {
		$vals = explode(",", $val);
		$kode_lama = "";
		foreach($vals as $v) {
			$kode_lama .= $v.',';
		}
		$kode_lama = substr($kode_lama, 0, strlen($kode_lama)-1);
		return $kode_lama;
	}

	public function insertBox_priv_t_user_kode_lama($name, $paramku) {
		$this->db->select('kode, nama');
		$this->db->from('app_m_unor');
		$this->db->order_by('kode', 'asc');
		$query = $this->db->get();
		if ( $query ) {
			$rows = $query->result();
		} else $rows = null;

		$input  = "<select name='{$name}[]' id='{$name}' class='form-control {$name}' multiple='multiple'>";
		foreach($rows as $r) {
			$input .= "<option value='{$r->kode}'>[{$r->kode}] - {$r->nama}</option>";
		}
		$input .= "</select>";
		
		$input .= "<script type='text/javascript'>";
		$input .= "$('#{$name}').select2();";
		$input .= "</script>";

		return $input;
	}

	public function updateBox_priv_t_user_kode_lama($name, $value, $datas) {
		$this->db->select('kode, nama');
		$this->db->from('app_m_unor');
		$this->db->order_by('kode', 'asc');
		$query = $this->db->get();
		if ( $query ) {
			$rows = $query->result();
		} else $rows = null;
		
		$value = explode(",", $value);

		$input  = "<select name='{$name}[]' id='{$name}' class='form-control {$name}' multiple='multiple'>";
		foreach($rows as $r) {
			if ( in_array($r->kode, $value))  $selected = " selected";
			else $selected = "";
			$input .= "<option {$selected} value='{$r->kode}'>[{$r->kode}] - {$r->nama}</option>";
		}
		$input .= "</select>";
		
		$input .= "<script type='text/javascript'>";
		$input .= "$('#{$name}').select2();";
		$input .= "</script>";

		return $input;
	}
	/****/

	public function insertBox_priv_t_user_password($name) {
		$input = "<input type='password' name='{$name}' id='{$name}' class='form-control {$name}' placeholder='Leave blank if you dont want to change the password'/>";
		return $input;
	}

	public function updateBox_priv_t_user_password($name, $value, $datas) {
		$input = "<input type='password' name='{$name}' id='{$name}' class='form-control {$name}' placeholder='Leave blank if you dont want to change the password'/>";
		return $input;
	}

	public function viewBox_priv_t_user_password($name, $value, $datas) {
		$html = "<p class='form-control-static {$name}'></p>";
		return $html;
	}

	public function insertBox_priv_t_user_passwordr($name) {
		$input = "<input onchange='fillPassword(this);' type='password' name='{$name}' id='{$name}' class='form-control {$name}'/>";
		return $input;
	}

	public function updateBox_priv_t_user_passwordr($name) {
		$input = "<input onchange='fillPassword(this);' type='password' name='{$name}' id='{$name}' class='form-control {$name}'/>";
		return $input;
	}

	public function viewBox_priv_t_user_passwordr($name, $value, $datas) {
		$html = "<p class='form-control-static {$name}'></p>";
		return $html;
	}

	public function searchBox_priv_t_user_igroupid($name) {
		$html = "<select class='flat input-sm q_{$name}' name='q_{$name}' id='q_{$name}' style='width:auto;border:1px solid #DEDEDE;'>
		    			<option value=''>ALL</option>";
		    			
		$this->db->select('id, vdesc');
		$this->db->where(array('ldeleted'=>0));
		$query = $this->db->get($this->prefix.'_t_group');
		if ( $query ) {
			foreach ($query->result() as $r) {
				$html .= "<option value='{$r->id}'>{$r->vdesc}</option>";
			}	
		}
		$html .= "</select>";
		return $html;
	}

	public function listBox_priv_t_user_ldeleted($val) {
		return $this->status[$val];
	}

	public function insertBox_priv_t_user_ldeleted($name) {
		$input  = "<select name='{$name}' id='{$name}' class='form-control {$name}'>";
		foreach($this->status as $k=>$r) {
			$input .= "<option value='{$k}'>{$r}</option>";
		}
		$input .= "</select>";

		return $input;
	}

	public function updateBox_priv_t_user_ldeleted($name, $value, $datas) {
		$input  = "<select name='{$name}' id='{$name}' class='form-control {$name}'>";
		foreach($this->status as $k=>$r) {
			if ( $k == $value ) $selected = " selected";
			else $selected = "";
			$input .= "<option {$selected} value='{$k}'>{$r}</option>";
		}
		$input .= "</select>";

		return $input;
	}

	public function viewBox_priv_t_user_ldeleted($name, $value, $datas) {
		$html = "<p class='form-control-static {$name}'>".$this->status[$value]."</p>";
		return $html;
	}

	public function insertBox_priv_t_user_isuperuser($name) {
		$input  = "<select name='{$name}' id='{$name}' class='form-control {$name}'>";
		foreach($this->isadmin as $k=>$r) {
			$input .= "<option value='{$k}'>{$r}</option>";
		}
		$input .= "</select>";

		return $input;
	}

	public function updateBox_priv_t_user_isuperuser($name, $value, $datas) {
		$input  = "<select name='{$name}' id='{$name}' class='form-control {$name}'>";
		foreach($this->isadmin as $k=>$r) {
			if ( $k == $value ) $selected = " selected";
			else $selected = "";
			$input .= "<option {$selected} value='{$k}'>{$r}</option>";
		}
		$input .= "</select>";

		return $input;
	}

	public function viewBox_priv_t_user_isuperuser($name, $value, $datas) {
		$html = "<p class='form-control-static {$name}'>".$this->isadmin[$value]."</p>";
		return $html;
	}

	public function insertCheck_priv_t_user_username($val, $post) {
	  //print_r($_POST);
	  //print_r($post);
	  //exit;
		$table = $this->prefix."_t_user";
		$data = array();
		$this->db->select('count(*) as c');
		$this->db->where('username', trim($val));
		$query = $this->db->get($table);

		//echo $this->db->last_query();

		//print_r($post);

		if ( $query ) {
			$row = $query->row();
			if ( $row->c > 0 && (int)$post->priv_t_user_id == 0 ) {
				$data['status'] = FALSE;
				$data['msg'] = 'Record sudah terdaftar. Periksa kembali isian anda';
			} else if ( trim($post->priv_t_user_password) != trim($this->input->post('priv_t_user_passwordr')) ) {
				$data['status'] = FALSE;
				$data['msg'] = 'Password tidak sama. Periksa kembali isian anda';
				$data['obj'] = 'priv_t_user_passwordr';
			} else {
				$data['status'] = TRUE;
			}
		}

		return $data;
	}

	public function updateCheck_priv_t_user_username($val, $post) {
	  
	  //print_r($post);
		$data['status'] = TRUE;
		if ( trim($post->priv_t_user_password) != trim($this->input->post('priv_t_user_passwordr')) ) {
			$data['status'] = FALSE;
			$data['msg'] = 'Password tidak sama. Periksa kembali isian anda';
			$data['obj'] = 'priv_t_user_passwordr';
		}

		return $data;
	}
	
	function insertCheck_priv_t_user_email($val, $post) {
	  $datas['status'] = true;
	  if (!filter_var($val, FILTER_VALIDATE_EMAIL) ) {
	      $datas = [
	       'status' => false,
	       'obj' => $this->table.'_email',
	       'msg' => 'Pos-el tidak valid !'
	     ];
	  }
	  
	  return $datas;
	}
	
	function updateCheck_priv_t_user_email($val, $post) {
	  return $this->insertCheck_priv_t_user_email($val, $post);
	}
	/*public function before_update_check($post) {
		$table = "t_user";
		if ( trim($post['priv_'.$table.'_password']) != trim($post['priv_'.$table.'_passwordr']) ) {
			$data['status'] = FALSE;
			$data['msg'] = 'Password tidak sama. Periksa kembali isian anda';
		} else {
			$data['status'] = TRUE;
		}

		return $data;
	}*/

	public function before_insert_processor($post) {
		$igroupid = '';
		foreach ($post->priv_t_user_igroupid as $v) {
			$igroupid .= $v.',';
		}
		$igroupid = substr($igroupid, 0, strlen($igroupid)-1);
		$post->priv_t_user_igroupid = $igroupid;

		$kode_lama = '';
		foreach ($post->priv_t_user_kode_lama as $v) {
			$kode_lama .= $v.',';
		}
		$kode_lama = substr($kode_lama, 0, strlen($kode_lama)-1);

		$post->priv_t_user_kode_lama = $kode_lama;
		return $post;
	}

	public function before_update_processor($id, $post, $oldpost) {
		
		$igroupid = '';
		foreach ($post->priv_t_user_igroupid as $v) {
			$igroupid .= $v.',';
		}
		$igroupid = substr($igroupid, 0, strlen($igroupid)-1);
		$post->priv_t_user_igroupid = $igroupid;

		$kode_lama = '';
		foreach ($post->priv_t_user_kode_lama as $v) {
			$kode_lama .= $v.',';
		}
		$kode_lama = substr($kode_lama, 0, strlen($kode_lama)-1);

		$post->priv_t_user_kode_lama = $kode_lama;
		
		if (empty(trim($post->priv_t_user_password))) {
		  unset($post->priv_t_user_password);
		}
		
		//echo 'a';
		//exit;
		
		return $post;
	}

	public function after_insert_processor($id, $post) {
		$new_post = array();

    if (!empty(trim($post->priv_t_user_password))) {
  		$options = array('cost' => 12);
  		$password_hash = password_hash($post->priv_t_user_password, PASSWORD_BCRYPT, $options);
  		$new_post['password']   = $password_hash;
    }
    
		$new_post['tcreated']   = date('Y-m-d H:i:s');
		$new_post['ccreatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_t_user', $new_post);
	}

	public function after_update_processor($id, $post, $oldpost) {
		$new_post = array();

		if (!empty(trim($post->priv_t_user_password))) {
  		$options = array('cost' => 12);
  		$password_hash = password_hash($post->priv_t_user_password, PASSWORD_BCRYPT, $options);
  		$new_post['password']   = $password_hash;
    }
    
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];
		
		//print_r($new_post);
		//exit;

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_t_user', $new_post);
	}

	function getuser() {
		//print_r($_POST);exit;
		$data = array();
		$row_array = array();

		$kriteria = $this->input->post('query');

		$sql = "SELECT * 
		    from priv_t_user a where (a.realname like ?
				OR a.username like ?) 
				ORDER BY a.realname ASC";// and b.\"EXPIRED_DATE\" IS NULL
		

		//echo $sql;
		$query = $this->db->query($sql, array('%'.$kriteria.'%', '%'.$kriteria.'%'));
		if ( $query ) {
		  //print_r($query->result_array());
				foreach($query->result_array() as $line) {

					$row_array['name']  = trim($line['username'])." - ".ucwords(trim(strtolower($line['realname'])));
					$row_array['value'] = ucwords(trim(strtolower($line['realname'])));
					$row_array['username']   = trim($line['username']);
					
					array_push($data, $row_array);
			}
		}
		echo json_encode($data);
	}
}
