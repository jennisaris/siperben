<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Namespace alias. */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Reset_password extends MX_Controller {
	
	var $table;
	var $prefix = 'priv';
	public function __construct() {
		parent::__construct();
		
		$controller = "nologin/reset_password";
		$this->table  = $this->prefix."_t_user";

    $this->_setTitle('Reset Password');
		$this->_setController($controller);
		$this->_init('default');
		
		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', 'id', true, true);
		$this->_addField($this->table, 'email', 'Masukkan Email Anda', true, false);
		
		$this->_setHTMLTemplate('','','reset_password/form');
		
		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}

	public function before_render_update($id) {
		if ((int) $id != 0) {
			redirect('nologin/reset_password/edit/0');
		}
	}
	
	public function index() {
		
		redirect('nologin/reset_password/edit');
		//redirect('privileges/user_authentication');
	}
	
	public function save(){
	  $post = (Object)$_POST;
    //exit;
	  
	  $datas = ['status'=>true];
	  if (empty($post->priv_t_user_email)) {
	    $datas = [
	       'status' => false,
	       'obj' => $this->table.'_email',
	       'msg' => 'Lengkapi isian pada kolom Email'
	     ];
	     
	     echo json_encode($datas);exit;
	  } else {
	    if (!filter_var($post->priv_t_user_email, FILTER_VALIDATE_EMAIL) ) {
	      $datas = [
	       'status' => false,
	       'obj' => $this->table.'_email',
	       'msg' => 'Email tidak valid !'
	     ];
	     
	     echo json_encode($datas);exit;
	    } else {
	      $username = $this->getrow('', $this->table, 'username', array('email'=>trim($post->priv_t_user_email)))->username;
	      if (empty($username)) {
	        $datas = [
    	       'status' => false,
    	       'obj' => $this->table.'_email',
    	       'msg' => 'User tidak ditemukan!!'
    	     ];
    	     echo json_encode($datas);exit;
	      }
	    }
	  }
	  
	  $pesan = "Tautan telah dikirim ke {$post->priv_t_user_email}, silahkan cek folder inbox/spam/junk dan klik tautan tersebut untuk me-reset password anda. Terima kasih.";
	  
	  $sysparam = array();
    $rs_sysparam = $this->getall('', 'sysparam', 'ckode, visi', array('ldeleted'=>0));
    foreach($rs_sysparam as $rs) {
    	$sysparam[trim($rs->ckode)] = (array)(json_decode("[".str_replace('""', '', trim($rs->visi))."]"));
    }
    $sysparam = (object)$sysparam;
	  
	  //print_r($sysparam);
	  //exit;
		  $rand = rand(0,99999);
		  $size = strlen($rand);
		  $keys = base64_encode($post->priv_t_user_email);
		  $keys .= $rand.''.$size;
		  $tautan = "<a href='".base_url()."nologin/konfirmasi?key=".$keys."'>disini</a>";
		  $body = "Halo Operator SIPERBEN<br/><br/>Ini adalah sistem email otomatis yang terkirim atas permintaan anda untuk proses Ubah / Lupa Password <br/>Berikut kami sampaikan tautan untuk me-reset password Anda. Silahkan klik {$tautan} untuk melakukan perubahan password. <br/> Jika kamu tidak merasa melakukan permintaan ini, harap abaikan email ini.  <br/> <br/>Terima Kasih";
		  
		  $smtp_auth = filter_var($sysparam->smtpauth[0], FILTER_VALIDATE_BOOLEAN);
		  $email_config = array(
		    'protocol' => 'smtp',
		    'smtp_host' => $sysparam->smtphost[0],
		    'smtp_user' => $sysparam->smtpuser[0],
		    'smtp_pass' => $sysparam->smtppasswd[0],
		    'smtp_port' => (int)$sysparam->smtpport[0],
		    'smtp_crypto' => $sysparam->smtpsecure[0],
		    'smtp_timeout' => 20,
		    'smtp_auth' => $smtp_auth,
		    'mailtype' => 'html',
		    'charset' => 'utf-8',
		    'newline' => "\r\n",
		    'crlf' => "\r\n"
		  );
		  
		  $this->load->library('email');
		  $this->email->initialize($email_config);
		  $this->email->from($sysparam->smtpuser[0], 'SIPERBEN');
		  $this->email->to($post->priv_t_user_email);
		  $this->email->subject('Permintaan Reset Password Aplikasi SIPERBEN');
		  $this->email->message($body);
		  
		  if ($this->email->send()) {
		    $status = true;
		  } else {
		    $status = false;
		    $pesan = trim(strip_tags($this->email->print_debugger(array('headers'))));
		    if (empty($pesan)) $pesan = 'Email reset password belum bisa dikirim. Silakan hubungi administrator.';
		  }

	  $datas = [
	       'status' => $status,
	       'obj' => $this->table.'_email',
	       'msg' => $pesan
	     ];
	     
	   echo json_encode($datas);exit;
	  
	  ///print_r($post);
	  //exit;
	}
	
	function manipulate_insert_button($buttons) {
		$buttons['kembali'] = "<button class='btn btn-default' 
      onclick=\"window.location.href='https://siperben.kemendikdasmen.go.id';\" 
      type='button' id='btn_back'>
      <i class='fas fa-backward'></i> Kembali ke halaman Log In
  	  </button>";
  
	  return $buttons;
	}
	
	function priv_t_user_output() {
	  $js = "<script type='text/javascript'>
	          //alert('a');
	          
	          function save(url, table_id, default_txt_confirm='Kirim Konfirmasi Perubahan Password. Anda yakin?', _ismodal=false, _modals='form-modal', _islochref=false, _isneedrefresh=true, _isneededit=false, _isOldFashion=false, _msg='Berhasil.') {
                  //alert('save..');
                    if ( default_txt_confirm == '' ) default_txt_confirm='. Anda yakin?';
                    var form_name = table_id+'_form-edit';
                    var formData = new FormData(jQuery('#'+form_name)[0]);
      
                    save_confirm(url+'/save', formData, default_txt_confirm, table_id, _ismodal, function(output) {
                        //alert(output);
                        var o = jQuery.parseJSON(output);
                        //alert(o.status);
                        //alert(o.id);
                        $('div').removeClass('has-error');
                        if ( o.status == true ) {
							              bootbox_alert('', '', o.msg, false, true);
                            //location.href = '".base_url()."index.php';
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
