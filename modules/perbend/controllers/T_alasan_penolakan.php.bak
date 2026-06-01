<?php
//ini_set("display_errors", 1);
//error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

/* Namespace alias. */
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class T_alasan_penolakan extends MX_Controller {
  	var $prefix = 'app';
  	var $table;

	var $ar_jabatan;
	
	var $url_opener = '';
	
	var $istatus;
	var $valasan;
	public function __construct() {
		parent::__construct();
		$controller = "perbend/t_alasan_penolakan";
		$this->table  = $this->prefix."_t_usulan_pegawai";

		$url_opener = explode('/', $_SERVER['HTTP_REFERER']);
		$this->url_opener = end($url_opener);
		
		if ($this->url_opener == 't_usulan_verifikator' || $this->url_opener == 't_verifikasi_usulan_pelatihan') {
		  $this->istatus = 'istatus';
		  $this->valasan = 'valasan';
		} else {
		  $this->istatus = 'istatus2';
		  $this->valasan = 'valasan2';
		} 

		$this->_setModal(true);
   		$this->_setTitle('Alasan Penolakan');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);
		$this->_addField($this->table, 'iusulanid', 'iusulan', false, true);
		
    $this->_addField($this->table, $this->valasan, 'Alasan Penolakan', true);
		$this->_addField($this->table, $this->istatus, $this->istatus, false, true);
		$this->_addField($this->table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($this->table, 'cupdatedby', 'Diubah oleh', false, true);

		$this->_changeType($this->table, $this->valasan, 'textarea');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
		$header_controller = array('header_controller' => 'perbend/t_usulan_daftar');
		$this->session->set_userdata($header_controller);
	}

	function before_update_processor($id, $post, $oldpost) {
	 	if ($this->url_opener == 't_usulan_verifikator') 
		  $post->app_t_usulan_pegawai_istatus = 2;
		else $post->app_t_usulan_pegawai_istatus2 = 2;

		//print_r($post);
		//exit;

		return $post;
	}

	public function after_update_processor($id, $post, $oldpost) {

		//update status sendiri
		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_t_usulan_pegawai', $new_post);

		$current_status_old = 0;		
		//update status header
		if ($this->url_opener == 't_verifikasi_usulan_pelatihan') {
			$r_usulan = $this->getrow('', 'app_t_usulan_pelatihan', 'istatus', array('id'=>$post->app_t_usulan_pegawai_iusulanid));
			$current_status = $r_usulan->istatus;
			//echo 'test...';
			$total = $this->getTotalStatus0($post->app_t_usulan_pegawai_iusulanid, 1, 0);

			//echo $current_status.' '.$total;exit;

			$new_post = array();
			if ($total == 0) {	
				$totalall = $this->getTotalStatus0($post->app_t_usulan_pegawai_iusulanid, 1, 'all');
				$total2 = $this->getTotalStatus0($post->app_t_usulan_pegawai_iusulanid, 1, 2);

				//echo $totalall .' => '.$totalall;exit;
				if ( $total2 == $totalall) $current_status += 4;
				else $current_status += 6;
			}
			$new_post['istatus'] = $current_status;
			$new_post['tupdated']   = date('Y-m-d H:i:s');
			$new_post['cupdatedby'] = $this->session->userdata['username'];

			$this->db->where('id', $post->app_t_usulan_pegawai_iusulanid);
			$this->db->update($this->prefix.'_t_usulan_pelatihan', $new_post);
			
		} else {
			$r_usulan = $this->getrow('', 'app_t_usulan', 'istatus, ijns, cnousul, iunorid', array('id'=>$post->app_t_usulan_pegawai_iusulanid));
			$current_status = $r_usulan->istatus;
			$ijns = $r_usulan->ijns;
			$cnousul = $r_usulan->cnousul;
			$iunorid = $r_usulan->iunorid;
			
			$post1 = [
			  'cnousul'=>$cnousul,
			  'usulanid'=>$post->app_t_usulan_pegawai_iusulanid
			 ];

			//echo 'test...';
			$total = $this->getTotalStatus0($post->app_t_usulan_pegawai_iusulanid, 0, 0);
			$totalall = $this->getTotalStatus0($post->app_t_usulan_pegawai_iusulanid, 0, 'all');
			$total1 = $this->getTotalStatus0($post->app_t_usulan_pegawai_iusulanid, 0, 1);
			$total2 = $this->getTotalStatus0($post->app_t_usulan_pegawai_iusulanid, 0, 2);
			//echo $current_status.' '.$total;exit;

			//echo 'total : '.$total;
			//echo 'jns : '.$ijns;
			//echo 'total : '.($total1 + $total2).' = '.$totalall;
			//echo 'total 2 : '.$total2;
			
			$new_post = array();
			if ($total == 0) {	
				if ($ijns == 1) { 
					
					if ( ($total1 + $total2) == $totalall ) {
						if ( $total2 > 0 ) {
							//echo 'disini..';
							//exit;
							$current_status_old = $current_status;
							$current_status = 5;
							$tos = [
								0=>(object)['unorid'=>$iunorid, 'email'=>$this->getrow('', 'priv_t_user', 'email', ['username'=>trim($iunorid)])->email]
							];
							//print_r($tos);
							//exit;
							$tautan = "<a href='".base_url().$this->session->sysparam->group_verifikator[100]->url."?q=".$cnousul."'>disini</a>";
									
							$tahap = $this->session->sysparam->status_usulan[0];
							$pesan = str_replace("__tautan__", $tautan, $this->session->sysparam->group_verifikator[100]->msg);
							$pesan = str_replace("__tahap__", $tahap, $pesan);
							$this->send_email(100, $tos, $pesan, $post1);
						} else {
							$current_status++;
							if ($this->url_opener == 't_usulan_verifikator') {
								$nextapproval = 1;
							} else if ($this->url_opener == 't_usulan_verifikator2') {
								$nextapproval = 2;
							}
							
							$tautan = "<a href='".base_url().$this->session->sysparam->group_verifikator[$nextapproval]->url."'>disini</a>";
							$pesan = str_replace("__tautan__", $tautan, $this->session->sysparam->group_verifikator[$nextapproval]->msg);
							//echo 'a';
							$this->send_email($nextapproval, '', $pesan, $post1, TRUE);
							
							//update status app_notification
							$where = ['usulanid'=>$post->app_t_usulan_pegawai_iusulanid, 'groupid'=>$this->session->sysparam->group_verifikator[($nextapproval-1)]->id];
							$datas = ['isread'=>1, 'updated'=>date('Y-m-d H:i:s'), 'updatedby'=>trim($this->session->username)];
							$this->db->where($where);
							$this->db->update('app_notification', $datas);
						
							//$sql = $this->db->set($datas)->get_compiled_update('app_notification');
							//echo $sql;exit;
							//echo 'b';
							//exit;
							//
							//send_email ke requestor
							$tos = [
								0=>(object)['unorid'=>$iunorid, 'email'=>$this->getrow('', 'priv_t_user', 'email', ['username'=>trim($iunorid)])->email]
							];
								//print_r($tos);
								//exit;
							$tautan = "<a href='".base_url().$this->session->sysparam->group_verifikator[99]->url."?q=".$cnousul."'>disini</a>";
									
							$tahap = $this->session->sysparam->status_usulan[$current_status];
							$pesan = str_replace("__tautan__", $tautan, $this->session->sysparam->group_verifikator[99]->msg);
							$pesan = str_replace("__tahap__", $tahap, $pesan);
							$this->send_email(99, $tos, $pesan, $post1);
						}
					} 
				} else {
					//echo $totalall .' => '.$totalall;exit;
					if ( $total2 == $totalall) $current_status += 4;
					else $current_status += 3;
				}
			}
			

			
			$new_post['istatus'] = $current_status;
			$new_post['istatusold'] = $current_status_old;
			$new_post['tupdated']   = date('Y-m-d H:i:s');
			$new_post['cupdatedby'] = $this->session->userdata['username'];

			$this->db->where('id', $post->app_t_usulan_pegawai_iusulanid);
			$this->db->update($this->prefix.'_t_usulan', $new_post);
			//$sql = $this->db->set($new_post)->get_compiled_update($this->prefix.'_t_usulan');
			//echo $sql;exit;
			//echo $this->db->last_query();exit;
		}
	}

	/*public function after_update_processor($id, $post, $oldpost) {

		//update status sendiri
		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_t_usulan_pegawai', $new_post);

		//update status header
		if ($this->url_opener == 't_verifikasi_usulan_pelatihan') {
			$r_usulan = $this->getrow('', 'app_t_usulan_pelatihan', 'istatus', array('id'=>$post->app_t_usulan_pegawai_iusulanid));
			$current_status = $r_usulan->istatus;
			//echo 'test...';
			$total = $this->getTotalStatus0($post->app_t_usulan_pegawai_iusulanid, 1, 0);

			//echo $current_status.' '.$total;exit;

			$new_post = array();
			if ($total == 0) {	
				$totalall = $this->getTotalStatus0($post->app_t_usulan_pegawai_iusulanid, 1, 'all');
				$total2 = $this->getTotalStatus0($post->app_t_usulan_pegawai_iusulanid, 1, 2);

				//echo $totalall .' => '.$totalall;exit;
				if ( $total2 == $totalall) $current_status += 4;
				else $current_status += 6;
			}
			$new_post['istatus'] = $current_status;
			$new_post['tupdated']   = date('Y-m-d H:i:s');
			$new_post['cupdatedby'] = $this->session->userdata['username'];

			$this->db->where('id', $post->app_t_usulan_pegawai_iusulanid);
			$this->db->update($this->prefix.'_t_usulan_pelatihan', $new_post);
			
		} else {
			$r_usulan = $this->getrow('', 'app_t_usulan', 'istatus, ijns, cnousul, iunorid', array('id'=>$post->app_t_usulan_pegawai_iusulanid));
			$current_status = $r_usulan->istatus;
			$ijns = $r_usulan->ijns;
			$cnousul = $r_usulan->cnousul;
			$iunorid = $r_usulan->iunorid;
			
			$post1 = [
			  'cnousul'=>$cnousul,
			  'usulanid'=>$post->app_t_usulan_pegawai_iusulanid
			 ];

			//echo 'test...';
			$total = $this->getTotalStatus0($post->app_t_usulan_pegawai_iusulanid, 0, 0);
			$totalall = $this->getTotalStatus0($post->app_t_usulan_pegawai_iusulanid, 0, 'all');
			$total1 = $this->getTotalStatus0($post->app_t_usulan_pegawai_iusulanid, 0, 1);
			$total2 = $this->getTotalStatus0($post->app_t_usulan_pegawai_iusulanid, 0, 2);
			//echo $current_status.' '.$total;exit;

			$new_post = array();
			if ($total == 0) {	
				if ($ijns == 1) { 
					$current_status++;
					if ( ($total1 + $total2) == $totalall ) {
					  if ($this->url_opener == 't_usulan_verifikator') {
					    $nextapproval = 1;
					  } else if ($this->url_opener == 't_usulan_verifikator2') {
					    $nextapproval = 2;
					  }
					  
					  	$tautan = "<a href='".base_url().$this->session->sysparam->group_verifikator[$nextapproval]->url."'>disini</a>";
						$pesan = str_replace("__tautan__", $tautan, $this->session->sysparam->group_verifikator[$nextapproval]->msg);
						//echo 'a';
						$this->send_email($nextapproval, '', $pesan, $post1, TRUE);
						
					//update status app_notification
					$where = ['usulanid'=>$post->app_t_usulan_pegawai_iusulanid, 'groupid'=>$this->session->sysparam->group_verifikator[($nextapproval-1)]->id];
					$datas = ['isread'=>1, 'updated'=>date('Y-m-d H:i:s'), 'updatedby'=>trim($this->session->username)];
					$this->db->where($where);
					$this->db->update('app_notification', $datas);
        		
        		//$sql = $this->db->set($datas)->get_compiled_update('app_notification');
            	//echo $sql;exit;
			        //echo 'b';
			        //exit;
			        //
			        //send_email ke requestor
          		$tos = [
          		  0=>(object)['unorid'=>$iunorid, 'email'=>$this->getrow('', 'priv_t_user', 'email', ['username'=>trim($iunorid)])->email]
          		];
          		//print_r($tos);
          		//exit;
              $tautan = "<a href='".base_url().$this->session->sysparam->group_verifikator[99]->url."?q=".$cnousul."'>disini</a>";
                     
              $tahap = $this->session->sysparam->status_usulan[$current_status];
              $pesan = str_replace("__tautan__", $tautan, $this->session->sysparam->group_verifikator[99]->msg);
              $pesan = str_replace("__tahap__", $tahap, $pesan);
          		$this->send_email(99, $tos, $pesan, $post1);
					} else if ($total2 == $totalall) {
					    $tos = [
          		  0=>(object)['unorid'=>$iunorid, 'email'=>$this->getrow('', 'priv_t_user', 'email', ['username'=>trim($iunorid)])->email]
          		];
          		//print_r($tos);
          		//exit;
              $tautan = "<a href='".base_url().$this->session->sysparam->group_verifikator[100]->url."?q=".$cnousul."'>disini</a>";
                     
              $tahap = $this->session->sysparam->status_usulan[$current_status--];
              $pesan = str_replace("__tautan__", $tautan, $this->session->sysparam->group_verifikator[100]->msg);
              $pesan = str_replace("__tahap__", $tahap, $pesan);
          		$this->send_email(100, $tos, $pesan, $post1);
					}
				} else {
					//echo $totalall .' => '.$totalall;exit;
					if ( $total2 == $totalall) $current_status += 4;
					else $current_status += 3;
				}
			}
			
			$new_post['istatus'] = $current_status;
			$new_post['tupdated']   = date('Y-m-d H:i:s');
			$new_post['cupdatedby'] = $this->session->userdata['username'];

			$this->db->where('id', $post->app_t_usulan_pegawai_iusulanid);
			$this->db->update($this->prefix.'_t_usulan', $new_post);
			//echo $this->db->last_query();exit;
		}
	}*/
	
	function getTotalStatus0($usulanid, $ispelatihan=0, $status=0) {
	  	if ( $status === 'all') {
	  		return $this->getrow('', 'app_t_usulan_pegawai', 'count(*) as total', array('iusulanid'=>$usulanid, 'ispelatihan'=>$ispelatihan))->total;
		} else { 
			return $this->getrow('', 'app_t_usulan_pegawai', 'count(*) as total', array('iusulanid'=>$usulanid, 'ispelatihan'=>$ispelatihan, $this->istatus=>$status))->total;
		}
	}

	function manipulate_url_save($save) {
		unset($save);
		$save['method'] = "save_alasan('".base_url()."perbend/t_alasan_penolakan', 't_alasan_penolakan', 'Simpan Penolakan. Anda yakin?', '', 'form-modal')";
		return $save;
	}

	function app_t_usulan_pegawai_output() {
		$js = "<script type='text/javascript'>

      var iusulanid = $('#{$this->table}_iusulanid').val();
      //alert('{$this->table}_iusulanid');
      //alert(iusulanid);
			var url_opener = location.href.split('/');
			var url_opener_ = (url_opener[url_opener.length-1]).replace('#', '');

			var controller = 't_usulan_daftar'
			if ( url_opener_ == 't_verifikasi_usulan_pelatihan' )  controller = 't_usulan_pelatihan_daftar';

		    $(document).ready(function() {
		  	});

			function save_alasan(url, table_id, default_txt_confirm='Simpan. Anda yakin?', _ismodal=false, _modals='form-modal', _islochref=false, _isneedrefresh=true, _isOldFashion=false, _msg='Simpan Alasan Penolakan berhasil.') {
			//	alert(iusulanid);
				if ( default_txt_confirm == '' ) default_txt_confirm='Simpan. Anda yakin?';
				var form_name = table_id+'_form-edit';
				var formData = new FormData(jQuery('#'+form_name)[0]);
				save_confirm(url+'/save', formData, default_txt_confirm, table_id, _ismodal, function(output) {
					var o = jQuery.parseJSON(output);
					$('div').removeClass('has-error');
					if ( o.status ) {
						//bootbox.alert(_msg);
						bootbox_alert('', '', _msg, true);
						reload_grid('".base_url()."perbend/'+controller+'/lists', controller);
						
						var total = getHTML3('".base_url()."perbend/'+controller+'/getTotalStatus0/'+iusulanid);
						if ( total == 0 ) {
							reload_grid('".base_url()."perbend/'+url_opener_+'/lists', url_opener_);
							$('#'+url_opener_+'-panel-default-form').hide();
						}

						$('#t_alasan_penolakan_form-modal').hide();
						
						$('t_alasan_penolakan_form-edit-modal .modal').removeClass('in');
						$('t_alasan_penolakan_form-modal .modal').attr('aria-hidden','true');
						$('t_alasan_penolakan_form-modal .modal').css('display', 'none');
						$('.modal-backdrop').remove();
						$('body').removeClass('modal-open');
						$('body').css('padding-right', 0);

						setTimeout(function(){ $('body').css('padding-right', 0); }, 1000);
						
					} else {
						if ( o.msg != undefined) bootbox_alert('', '', o.msg, true);
						$('.'+o.obj).focus();
						$('div .'+o.obj).addClass('has-error');
						if ( _ismodal ) $('#'+_modals).css('overflow', 'scroll')
						return false;
					}
				});
			}
			
			</script>";

		return $js;
	}
	
		function send_email($next=0, $tos='', $pesan='', $post,$isnotif=FALSE) {
		  
		  $post = (object)$post;
  		if ($tos=='') {
  		  $groupid = $this->session->sysparam->group_verifikator[$next]->id;
  		  //echo $groupid;
    		$sql = "SELECT email, username from priv_t_user where igroupid like '%{$groupid}%'";
    		//echo $sql;
    		$tos = $this->db->query($sql)->result();
  		}
  		
  		if ($isnotif==TRUE) {
          $pesan = $this->session->sysparam->group_verifikator[$next]->desc;
          $tautan = "<a href='".base_url().$this->session->sysparam->group_verifikator[$next]->url."'>{$pesan}</a>";
          $notifs=[
                //'username'=>$t2->username,
                'url'=>base_url().$this->session->sysparam->group_verifikator[$next]->url,
                'usulanid'=>$post->usulanid,
                'groupid'=>$groupid,
                'msg' => $pesan,
                'created'=> date('Y-m-d H:i:s'),
                'createdby'=>trim($this->session->username)
          ];
          $this->db->insert('app_notification', $notifs);
          /*$sql = $this->db->set($notifs)->get_compiled_insert('app_notification');
          echo $sql;exit;*/
      }
  		//PHPMailer
  	  $mail = new PHPMailer(true);
  	  //print_r($mail);
  	  //exit;
  	  
  	  /*echo $this->session->sysparam->smtphost[0];
  	  echo $this->session->sysparam->smtpauth[0];
  	  echo $this->session->sysparam->smtpsecure[0];
  	  echo $this->session->sysparam->smtpuser[0];
  	  echo $this->session->sysparam->smtppasswd[0];
  	  echo $this->session->sysparam->smtpport[0];
  	  exit;*/
  	  
  	  /* Open the try/catch block. */
      try {
         /* SMTP parameters. */
         $mail->isSMTP();
         $mail->Host = $this->session->sysparam->smtphost[0];
         $mail->SMTPAuth = $this->session->sysparam->smtpauth[0];
         $mail->SMTPSecure = $this->session->sysparam->smtpsecure[0];
         $mail->Username = $this->session->sysparam->smtpuser[0];
         $mail->Password = $this->session->sysparam->smtppasswd[0];
         $mail->Port = $this->session->sysparam->smtpport[0];
     
         /* Set the mail sender. */
         $mail->setFrom($this->session->sysparam->smtpuser[0], 'POSTMASTER');
      
         /* Add a recipient. */
         foreach($tos as $t1=>$t2) {
           $mail->addAddress($t2->email, $t2->email);
         }
      
         /* Set the subject. */
         $mail->Subject = $this->session->sysparam->group_verifikator[$next]->subject;
      
         /* Set the mail message body. */
         $mail->isHTML(TRUE);
         
         if ($pesan == '' ) {
           $tautan = "<a href='".base_url().$this->session->sysparam->group_verifikator[$next]->url."?q=".$post->cnousul."'>disini</a>";
           
           $pesan = str_replace("__tautan__", $tautan, $this->session->sysparam->group_verifikator[$next]->msg);
         }
         
         $mail->Body = $pesan;
         //if ($next==0) {
        //   print_r($mail);
        //   exit;
         //}
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
  	       'msg' => $pesan
  	     ];
  	     
  	  //return $datas;
  	  //print_r($datas);exit;
    }
}