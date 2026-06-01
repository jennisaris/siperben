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
	  $mail = new PHPMailer(true);
	  //print_r($mail);
	  //exit;
	  
	  /* Open the try/catch block. */
    try {
       /* SMTP parameters. */
       $mail->isSMTP();
       $mail->Host = $sysparam->smtphost[0];
       $mail->SMTPAuth = $sysparam->smtpauth[0];
       $mail->SMTPSecure = $sysparam->smtpsecure[0];
       $mail->Username = $sysparam->smtpuser[0];
       $mail->Password = $sysparam->smtppasswd[0];
       $mail->Port = $sysparam->smtpport[0];
   
       /* Set the mail sender. */
       $mail->setFrom($sysparam->smtpuser[0], 'SIPERBEN');
    
       /* Add a recipient. */
       $mail->addAddress($post->priv_t_user_email, $post->priv_t_user_email);
    
       /* Set the subject. */
       $mail->Subject = 'Permintaan Reset Password Aplikasi SIPERBEN';
    
       /* Set the mail message body. */
       $rand = rand(0,99999);
       $size = strlen($rand);
       $keys = base64_encode($post->priv_t_user_email);
       $keys .= $rand.''.$size;
       $mail->isHTML(TRUE);
       $tautan = "<a href='".base_url()."nologin/konfirmasi?key=".$keys."'>disini</a>";
       $body = "Halo Operator SIPERBEN<br/><br/>Ini adalah sistem email otomatis yang terkirim atas permintaan anda untuk proses Ubah / Lupa Password <br/>Berikut kami sampaikan tautan untuk me-reset password Anda. Silahkan klik {$tautan} untuk melakukan perubahan password. <br/> Jika kamu tidak merasa melakukan permintaan ini, harap abaikan email ini.  <br/> <br/>Terima Kasih";
       $mail->Body = $body;
    
       /* Finally send the mail. */
       $mail->send();
       $status = true;
       // 'Email Terkirim';
    }
    catch (Exception $e)
    {
       /* PHPMailer exception. */
       $status = false;
       $pesan = $e->errorMessage();
    }
    catch (\Exception $e)
    {
       /* PHP exception (note the backslash to select the global namespace Exception class). */
       $status = false;
       $pesan = $e->getMessage();
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
