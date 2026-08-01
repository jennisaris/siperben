<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_password extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$controller = "privileges/user";
		$table  = "priv_t_user";

    	$this->_setTitle('Ubah Kata Sandi / Pos-el');
		$this->_setController($controller);
		$this->_init('default');


		//$table, $field, $alias='', $required=false, $hide=false, $free=false, $width=0, $align='left', $func='', $msg='Lengkapi Isian Anda', $iscontroller=false) {
		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'pesan', '', false, false, true);
		$this->_addField($table, 'username', 'Kode Satker', true, true);
		$this->_addField($table, 'oldpassword', 'Kata Sandi Lama', false, false, true);
		$this->_addField($table, 'password', 'Kata Sandi Baru', false);
		$this->_addField($table, 'password1', 'Konfirmasi Kata Sandi Baru', false, false, true);
		$this->_addField($table, 'email', 'Pos-el', true);
		
		$this->_setPlaceholder($table, 'oldpassword', 'Biarkan kosong jika tidak ingin merubah password');
		$this->_changeType($table, 'oldpassword', 'password');
		$this->_changeType($table, 'password', 'password');
		$this->_changeType($table, 'password1', 'password');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}

	function index() {
		redirect('privileges/change_password/edit/'.trim($this->session->userid));
	}
	
	
	
	function updateBox_priv_t_user_pesan($name, $value, $datas) {
	  if (empty($datas->priv_t_user_email)) {
	  $html = "<div class='alert alert-danger' role='alert'>
  <span class='glyphicon glyphicon-exclamation-sign' aria-hidden='true'></span>
  <span class='sr-only'>Error:</span>
  Lengkapi alamat surel anda.
</div>";
  } else {
    $html='';
  }

  return $html;
	}

	/*function updateBox_priv_t_user_id($name) {
		$input = "<input value='{$this->session->userid}' type='hidden' name='{$name}' id='{$name}' class='form-control {$name}'/>";
		return $input;
	}*/
	
	function updateBox_priv_t_user_password($name, $value, $datas) {
		$input = "<input placeholder='Password baru' type='password' name='{$name}' id='{$name}' class='form-control {$name}'/>";
		return $input;
	}
	
	function updateCheck_priv_t_user_email($value, $post) {
		 $data['status'] = true;
		 
		 //$post = array_merge((array)$post, $_POST);
		 //print_r($post);
		 //print_r($_POST);
		 $posts = (object)$_POST;
		 //print_r($post);
		 //echo 'aa';
		 //exit;
		 
		 if (!empty(trim($post->priv_t_user_email))) {
		   if (!filter_var(trim($post->priv_t_user_email), FILTER_VALIDATE_EMAIL)) {
		     $data['status'] = false;
    		 $data['msg'] = 'Pos-el tidak valid';
    		 $data['obj'] = 'priv_t_user_email';
    		 return $data;
		   }
		   
  		 if (!empty(trim($posts->priv_t_user_oldpassword))) {
  				
    		 $this->db->select('password');
    		 $this->db->where('username', trim($post->priv_t_user_username));
    		 $query = $this->db->get('priv_t_user');
    		 
    		 if ( $query ) {
    	 	    $r = $query->row();
    	 	    $hash = $r->password;
    	 	    if ( !password_verify(trim($posts->priv_t_user_oldpassword), $hash) )  {
    	     		$data['status'] = false;
    			    $data['msg'] = 'Password lama salah';
    			    $data['obj'] = 'priv_t_user_oldpassword';
    			    return $data;
    		    } else {
    	     		if ( trim($post->priv_t_user_password) != trim($posts->priv_t_user_password1) ) {
    	     			$data['status'] = false;
    				    $data['msg'] = 'Password baru tidak sama dengan konfirmasi password baru';
    				    $data['obj'] = 'priv_t_user_password1';
    				    return $data;
    	     		}
    	     	}
    		 }
  		 }
		 }
		 
		 return $data;
	}
	
	public function after_update_processor($id, $post, $oldpost) {
		$new_post = array();
    $posts = (object)$_POST;
		if (!empty(trim($posts->priv_t_user_oldpassword))) {
  		$options = array('cost' => 12);
  		$password_hash = password_hash($post->priv_t_user_password, PASSWORD_BCRYPT, $options);
  		$new_post['password']   = $password_hash;
    }
    
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];
		
		//print_r($new_post);
		//exit;

		$this->db->where('id', $id);
		$this->db->update('priv_t_user', $new_post);
	}
	
	function before_update_processor($id, $new_post, $oldpost) {
	  $posts = (object)$_POST;
	  //$new_post = (object)$post;
		 //print_r($posts);
		 //print_r($_POST);
	   //print_r($new_post);
	   //exit;
	  if (empty(trim($posts->priv_t_user_oldpassword))) {
	    unset($new_post->priv_t_user_password);
	  }
	  
	  //print_r($new_post);exit;
		return $new_post; 
	}

	function manipulate_update_button($buttons) {
		unset($buttons['kembali']);
		
		return $buttons;
	}
}
