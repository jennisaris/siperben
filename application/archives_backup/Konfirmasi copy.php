<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends MX_Controller {
	
	var $table;
	var $prefix = 'priv';
	public function __construct() {
		parent::__construct();
		
		$controller = "nologin/konfirmasi";
		$this->table  = $this->prefix."_t_user";

    $this->_setTitle('Konfirmasi Perubahan Password');
		$this->_setController($controller);
		$this->_init('default');
		
		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', 'id', true, true);
		$this->_addField($this->table, 'email', 'Email', true, false);
		$this->_addField($this->table, 'password', 'Masukkan Password Baru', true, false);
		$this->_addField($this->table, 'password1', 'Masukkan Konfirmasi Password Baru', false, false, true);
		
		$this->_setHTMLTemplate('','','reset_password/form');
		
		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}
	
	public function index() {
	    $key = $_GET['key'];
  	  $last = (int)substr($key,-1);
  	  if ( $last > 0 ) {
    	  $last1 = ($last + 1);
    	  
    	  $email = base64_decode(substr($key, 0, strlen($key) - ($last +1)));
        $id = $this->getrow('', $this->table, 'id', array('email'=>$email))->id;
        redirect("nologin/konfirmasi/edit/{$id}");
  	  } else {
  	    echo $this->template->display('reset_password/notallowed', ['title'=>'Perhatian','form'=>'<b><red>Maaf, Anda tidak memiliki akses !</red></b> '], true);
  	  }
	}
	
	public function save(){
	  $post = (Object)$_POST;
	  //print_r($post);
	  $datas = ['status'=>true];
	  if (empty($post->priv_t_user_email)) {
	    $datas = [
	       'status' => false,
	       'obj' => $this->table.'_email',
	       'msg' => 'Lengkapi isian pada kolom Email'
	     ];
	     
	     echo json_encode($datas);exit;
	  } 
	  
	  if (empty($post->priv_t_user_password)) {
	    $datas = [
	       'status' => false,
	       'obj' => $this->table.'_password',
	       'msg' => 'Lengkapi isian pada kolom Password Baru'
	     ];
	     
	     echo json_encode($datas);exit;
	  } else {
	    if ( trim($post->priv_t_user_password) != trim ($post->priv_t_user_password1) ) {
	      $datas = [
	       'status' => false,
	       'obj' => $this->table.'_password',
	       'msg' => 'Password Baru tidak sama dengan Konfirmasi Password Baru'
	     ];
	     
	     echo json_encode($datas);exit;
	    }
	  }
	  
	  $options = array('cost' => 12);
  	$password_hash = password_hash(trim($post->priv_t_user_password), PASSWORD_BCRYPT, $options);
  	
  	$data = ['password'=>$password_hash];
  	$where = ['id'=>$post->priv_t_user_id];
  	
  	try {
  	  $this->db->where($where);
  	  $this->db->update($this->table, $data);
  	  $status = true;
  	  $pesan = 'Perubahan Password Berhasil';
  	} catch(Exception $e) {
  	  $status = false;
  	  $pesan = $e->getMessage();
  	}
	  
	  $datas = [
	       'status' => $status,
	       'obj' => $this->table.'_email',
	       'msg' => $pesan
	     ];
	     
	   echo json_encode($datas);exit;
	}
	
	function manipulate_insert_button($buttons) {
	  $buttons['kembali'] = "<button class='btn btn-default' 
	  onclick='history.go(-1);' 
	  type='button' id='btn_back'><i class='fas fa-backward'></i> Kembali ke halaman login</button>";
	  
	  return $buttons;
	}
	
	function updateBox_priv_t_user_email($name, $value) {
	  $input = "<input type='text' name='{$name}' 
	  id='{$name}' class='form-control {$name}' value='{$value}' readonly />";
	  
	  return $input;
	}
	function updateBox_priv_t_user_password($name, $value) {
	  $input = "<input placeholder='Masukkan Konfirmasi Password' autocomplete='new-password' type='password' name='{$name}' 
	  id='{$name}' class='form-control {$name}' value='' />";
	  
	  return $input;
	}
	function updateBox_priv_t_user_password1($name, $value) {
	  $input = "<input placeholder='Masukkan Konfirmasi Password Baru' autocomplete='new-password' type='password' name='{$name}' 
	  id='{$name}' class='form-control {$name}' value=''/>";
	  
	  return $input;
	}
	
	function priv_t_user_output() {
	  $js = "<script type='text/javascript'>
	          
	          
	          function save(url, table_id, default_txt_confirm='Simpan Konfirmasi. Anda yakin?', _ismodal=false, _modals='form-modal', _islochref=false, _isneedrefresh=true, _isneededit=false, _isOldFashion=false, _msg='Berhasil.') {
                    //alert('save');
                    if ( default_txt_confirm == '' ) default_txt_confirm='Simpan Data Pegawai. Anda yakin?';
                    var form_name = table_id+'_form-edit';
                    var formData = new FormData(jQuery('#'+form_name)[0]);
      
                    save_confirm(url+'/save', formData, default_txt_confirm, table_id, _ismodal, function(output) {
                        //alert(output);
                        var o = jQuery.parseJSON(output);
                        //alert(o.status);
                        //alert(o.id);
                        $('div').removeClass('has-error');
                        if ( o.status == true ) {
							              bootbox_alert('', '', o.msg, true);
                            location.href = '".base_url()."index.php';
                        } else {
                            if ( o.msg != undefined) bootbox_alert('', '', o.msg, false, false);
                            $('.'+o.obj).focus();
                            $('div .div_'+o.obj).addClass('has-error');
                            $('div .'+o.obj).addClass('has-error');
                            if ( _ismodal ) $('#'+_modals).css('overflow', 'scroll');
                            return false;
                        }
                    });
                    $('body').css('padding-right', 0);
                }
	  </script>";
	  
	  return $js;
	}
	
}
