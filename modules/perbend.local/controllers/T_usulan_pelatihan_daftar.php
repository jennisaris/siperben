<?php
//ini_set("display_errors", 1);
//error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "T_alasan_penolakan.php";
class T_usulan_pelatihan_daftar extends MX_Controller {
  	var $prefix = 'app';
  	var $table;

	var $ar_jabatan;
	
	var $url_opener = '';
	public function __construct() {
		parent::__construct();
		$controller = "perbend/t_usulan_pelatihan_daftar";
		$this->table  = $this->prefix."_t_usulan_pegawai";

		$url_opener = explode('/', $_SERVER['HTTP_REFERER']);
		$this->url_opener = end($url_opener);

		if ($this->url_opener != 't_usulan_approval') $this->_setModal(true);
		
   		$this->_setTitle('Daftar Pegawai');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table, 'iusulanid');
		$this->_addField($this->table, 'id', '', true, true);
		$this->_addField($this->table, 'iusulanid', 'iusulan', false, true);
		$this->_addField($this->table, 'ispelatihan', 'ispelatihan', false, true);
		$this->_addField($this->table, 'ifrom', 'ifrom', false, true);
		$this->_addField($this->table, 'cnip', 'NIP', true);
		$this->_addField($this->table, 'vname', 'Nama Lengkap', true);
		$this->_addField($this->table, 'cgolid', 'Pangkat, Golongan', false);
		$this->_addField($this->table, 'ckduker', 'Satuan Kerja', false, true);
		//$this->_addField($this->table, 'vgolnm', 'Pangkat/Gol.', false);
		//$this->_addField($this->table, 'vpktnm', 'Pangkat/Gol.', false, true);
		$this->_addField($this->table, 'ijabid2', 'Jabatan', true);
		//$this->_addField($this->table, 'cjabid', 'Kode Jab.', false);
		//$this->_addField($this->table, 'vjabnm', 'Nama Jabatan', false);
		//$this->_addField($this->table, 'cnosertifikat','No. Sertifikat', false);
		
		
		$this->_addField($this->table, 'istatus', 'Status Verifikasi', false, true);
		$this->_addField($this->table, 'valasan', 'Alasan Penolakan', false, true);

		$this->_addField($this->table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($this->table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($this->table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($this->table, 'cupdatedby', 'Diubah oleh', false, true);

		$table2 = 'app_t_usulan';
		$this->_addTable($table2);
		$this->_addField($table2,'id','id',true,true);
		$this->_addField($table2,'cnousul','No. Usul',false, true);
		$this->_addField($table2,'dtglusul','Tgl. Usul',false,true);
		$this->_addField($table2,'istatus','istatus',false,true);
		
		$this->_addRelation($this->table, $table2, array('iusulanid'=>'id'));
		

		$table3 = 'kepeg_m_pegawai';
		$this->_addTable($table3);
		$this->_addField($table3, 'id', 'id', true, true);
		$this->_addField($table3, 'cnip','NIP', false, true);
		$this->_addField($table3, 'vname', 'Nama Lengkap', false, true);

		$this->_addRelation($this->table, $table3, array('cnip'=>'cnip'));


		if ($this->url_opener == 't_usulan_satker') {
			$where = array('ldeleted'=>0, 'ijns'=>1);
		} elseif($this->url_opener == 't_usulan_satker2') {
			$where = array('ldeleted'=>0, 'ijns'=>2);
		} else $where = array('ldeleted'=>0);
		
		$rows = $this->getall('', $this->prefix.'_m_jabatan', '*', $where);
		foreach($rows as $r) {
		  $this->ar_jabatan[$r->id] = $r->ckode;
		}

		$this->_changeType($this->table, 'ijabid2', 'combobox', 
		$this->ar_jabatan);
		
		$this->_changeType($this->table, 'istatus', 'combobox', 
		$this->session->sysparam->status_daftar_pegawai);


		$this->_setAlign($this->table, 'ijabid2', 'center');
		$this->_setAlign($this->table, 'istatus', 'center');
		$this->_setAlign($this->table, 'istatus2', 'center');
		
		
		$this->_add2SearchField($this->table, 'iusulanid',false, true, true);
		$this->_add2SearchField($this->table, 'ispelatihan', false, true, true);
		$this->_add2SearchField($this->table, 'cnip');
		$this->_add2SearchField($table3, 'vname');

  
		$this->_add2ListField($this->table, 'cnip, vname, cgolid, ijabid2, istatus');//cnosertifikat, 

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
		$header_controller = array('header_controller' => 'perbend/t_usulan_pelatihan');
		$this->session->set_userdata($header_controller);
	}
	
	function listBox_app_t_usulan_pegawai_tupdated($value, $datas) {
	  if ( $value != null ) {
	    return date('d-m-Y H:i:s', strtotime($value));
	  } else return date('d-m-Y H:i:s', strtotime($datas->app_t_usulan_pegawai_tcreated));
	}
	
	function listBox_app_t_usulan_pegawai_cupdatedby($value, $datas) {
	  if ( $value != null ) {
		  $nama = $value;
	    //$nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($value)))->realname;
	   } else {
		   $nama = $datas->app_t_usulan_pegawai_ccreatedby;
	     //$nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($datas->app_t_usulan_pegawai_ccreatedby)))->realname;
	   }
	  
	  //return $nama;
	  return $nama;
	}

	public function after_insert_processor($id, $post) {
		$new_post = array();
		$new_post['tcreated']   = date('Y-m-d H:i:s');
		$new_post['ccreatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_t_usulan_pegawai', $new_post);
	}

	public function after_update_processor($id, $post, $oldpost) {
		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_t_usulan_pegawai', $new_post);
	}
	
	function listBox_ACTION($buttons, $datas) {
	  //unset($buttons['hapus']);
	  if ( $datas->app_t_usulan_istatus > 0 ) unset($buttons['ubah']);

	  if ( $this->url_opener == 't_usulan_pelatihan_verifikator' || $this->url_opener == 't_verifikasi_usulan_pelatihan') {
		  unset($buttons['ubah']);
		  unset($buttons['hapus']);
			$input = "<button type='button' class='button btn-default' 
					onclick='ubahStatus({$datas->app_t_usulan_pegawai_id}, {$datas->app_t_usulan_pegawai_iusulanid}, {$datas->app_t_usulan_istatus}, 1);'>
					<i class='fas fa-check'></i> Setujui</button>
				  <button type='button' class='button btn-default' 
					onclick='ubahStatus({$datas->app_t_usulan_pegawai_id}, {$datas->app_t_usulan_pegawai_iusulanid}, {$datas->app_t_usulan_istatus}, 2);' 
					data-toggle='modal' data-target='#t_alasan_penolakan_form-modal'>
					<i class='fas fa-times'></i> Tolak</button>";

		$buttons['utilitas'] = '<div>'.$input.'</div>'; 
	  } else {
		  if ( $datas->app_t_usulan_pegawai_istatus == 2) {
			  unset($buttons['ubah']);
			  unset($buttons['hapus']);
		  }
	  }
	  
	  return $buttons;
	}
	
	function app_t_usulan_pegawai_output(){
	  $js ="<script type='text/javascript'>
	        
	        var url_opener = location.href.split('/');
			var url_opener_ = (url_opener[url_opener.length-1]).replace('#', '');

	      
	       $(document).ready(function() {
					var filter = $('#app_t_usulan_pelatihan_iunorid').val();
					$('#{$this->table}_cnip').typeahead({
						source: function (query, result) {
							$.ajax({
								url: '".base_url()."kepegawaian/m_pegawai/getemployee',
								data: 'query='+query+'&filter='+filter,
								dataType: 'json',
								type: 'POST',
								beforeSend: function() {
									// alert('sending data');
									// do some loading options
									if ( isloading==true ) $('#divLoading').addClass('show');
									if ( !debug ) {
										$('button').attr('disabled', true);
										$('.btn_save').html(\"<i class='fas fa-cog fa-spin'> </i> Mohon Tunggu...\");
									}
								},
								success: function (data) {
									result($.map(data, function (item) {
										return item;
									}));
								}
							});
						},
						items: 20,
						updater: function (item) {
							$('#app_t_usulan_pegawai_vname').val(item.value);
							$('#app_t_usulan_pegawai_vname').attr('readonly', true);

							$('#app_t_usulan_pegawai_cgolid').val(item.golid);
							$('#app_t_usulan_pegawai_cgolid_txt').val(item.pktnm);
							$('#app_t_usulan_pegawai_cgolid_txt').attr('readonly', true);

							$('#app_t_usulan_pegawai_ckduker').val(item.kduker);

							$('#app_t_usulan_pegawai_ifrom').val(item.ifrom);
							$('#app_t_usulan_pegawai_cnosertifikat').val(item.cnosnt);
							if ( item.cnosnt != '' ) $('#app_t_usulan_pegawai_cgolid_txt').attr('readonly', true);

							$(\"#divLoading\").removeClass('show');
							$('button').removeAttr('disabled');
				    		$('.btn_save').html(\"<i class='fa fa-save' aria-hidden='true'> </i> Simpan\");

							return  item.nip;
						},
					});
				});

				function ubahStatus(id, usulanid, status, event) {
				  //alert(status);
					var jwb = confirm('Verifikasi Daftar Pegawai. Anda yakin ?');
					if ( jwb ) {
						if ( event != 2 ) {
							$.post('".base_url()."perbend/t_usulan_pelatihan_daftar/ubahstatus/'+id+'/'+usulanid+'/'+status+'/'+event, {}, function(data) {
								var o = jQuery.parseJSON(data);
								if ( o.status == true ) {
									bootbox_alert('', '', 'Verifikasi daftar pegawai berhasil', true);
									reload_grid('".base_url()."perbend/t_usulan_pelatihan_daftar/lists', 't_usulan_pelatihan_daftar');
									if ( o.total == 0 ) {
									  reload_grid('".base_url()."perbend/'+url_opener_+'/lists', url_opener_);
									  $('#'+url_opener_+'-panel-default-form').hide();
									}
								} else {
									bootbox_alert('', '', 'Ubah Gagal!', true);
								}
							});
						} else {
							edit('".base_url()."perbend/t_alasan_penolakan/edit/'+id, 't_usulan_pelatihan_daftar');	
						}
					}
				}
	      </script>";

	  return $js;
	}
	
	function updateBox_app_t_usulan_pegawai_vname($name, $value, $datas) {
		if ( $datas->app_t_usulan_pegawai_ifrom == 1 ) $readonly = 'readonly';
		else $readonly = '';
	  $input = "<input {$readonly} type='text' 
	            placeholder='Masukkan nama lengkap'
	            name='{$name}' id='{$name}' 
	            class='form-control {$name}' 
	            value='{$value}'/>";
	            
	 return $input;
	}

	function listBox_app_t_usulan_pegawai_cgolid($value, $datas) {
		$name_txt = $this->getrow('', 'kepeg_m_golongan', 'concat(pangkat,\', \', nama) as nama_pangkat', array('id'=>$value))->nama_pangkat;
		return $name_txt;
	}

	function insertBox_app_t_usulan_pegawai_ispelatihan($name) {
		$input = "<input type='hidden' name='{$name}' id='{$name}' class='{$name}' value='1'/>";

		return $input;
	}
	
	function insertBox_app_t_usulan_pegawai_cgolid($name) {
	  return $this->updateBox_app_t_usulan_pegawai_cgolid($name, '', '');
	}

	function updateBox_app_t_usulan_pegawai_cgolid($name, $value, $datas) {
		if ( $datas->app_t_usulan_pegawai_ifrom == 1 ) $readonly = 'readonly';
		else $readonly = '';
	  	$input = "<input type='hidden' 
	            placeholder='Masukkan Golongan'
	            name='{$name}' id='{$name}' 
	            class='form-control {$name}' 
	            value='{$value}'/>";

		$name_txt = $this->getrow('', 'kepeg_m_golongan', 'concat(pangkat,\', \', nama) as nama_pangkat', array('id'=>$value))->nama_pangkat;
		$input .= "<input {$readonly} type='text' 
			placeholder='Masukkan Golongan'
			name='{$name}_txt' id='{$name}_txt' 
			class='form-control {$name}_txt' 
			value='{$name_txt}'/>";
	            
	 return $input;
	}
	
	function insertBox_app_t_usulan_pegawai_vname($name) {
	  return $this->updateBox_app_t_usulan_pegawai_vname($name, '', '');
	}
	
	function insertCheck_app_t_usulan_pegawai_ijabid2($value, $post) {
		//print_r($post);exit;
		$data['status']  = true;

		$sql = "SELECT * FROM app_t_usulan_pegawai 
				WHERE ijabid2 = {$value} and iusulanid={$post->app_t_usulan_pegawai_iusulanid} 
				and istatus != 2 and ispelatihan=1";
		$row = $this->db->query($sql)->row();
		if ( $row ) {
			$data['status']  = false;
			$data['msg'] = "Jabatan ".$this->getrow('', 'app_m_jabatan', 'ckode', array('id'=>$value))->ckode." sudah digunakan. Cek kembali isian anda.";
		}

		return $data;
	}

	function updateCheck_app_t_usulan_pegawai_ijabid2($value, $post, $id) {
		
		$data['status']  = true;

		$sql = "SELECT * FROM app_t_usulan_pegawai WHERE ijabid2 = {$value} and iusulanid={$post->app_t_usulan_pegawai_iusulanid} 
				and id != {$id} and istatus != 2 and ispelatihan=1";
		$row = $this->db->query($sql)->row();
		if ( $row ) {
			$data['status']  = false;
			$data['msg'] = "Jabatan ".$this->getrow('', 'app_m_jabatan', 'ckode', array('id'=>$value))->ckode." sudah digunakan. Cek kembali isian anda.";
		}

		return $data;
	}

	function listBox_app_t_usulan_pegawai_istatus($value, $datas) {
		$status_daftar_pegawai = $this->session->sysparam->status_daftar_pegawai;
		
		$valasan = $datas->app_t_usulan_pegawai_valasan;
    /*if ($this->url_opener =='t_usulan_verifikator2') {
      $value = $datas->app_t_usulan_pegawai_istatus2;
      $valasan = $datas->app_t_usulan_pegawai_valasan2;
    }*/
		
		$alasan = ($value == 2 ? $valasan : '');
		
		$input = "<div>
						<span style='cursor:pointer;' title = '{$alasan}' class='".($value == 0 ? 'label label-primary' : ($value == 1 ? 'label label-success' : 'label label-danger'))."'>".$status_daftar_pegawai[$value]."</span>
					   </div>";

		return $input;
	}
	
	function listBox_app_t_usulan_pegawai_istatus2($value, $datas) {
		$status_daftar_pegawai = $this->session->sysparam->status_daftar_pegawai;
		
		//$valasan = $datas->app_t_usulan_pegawai_valasan;
    //if ($this->url_opener =='t_usulan_verifikator2') {
      //$value = $datas->app_t_usulan_pegawai_istatus2;
      $valasan = $datas->app_t_usulan_pegawai_valasan2;
    //}
		
		$alasan = ($value == 2 ? $valasan : '');
		
		$input = "<div>
						<span style='cursor:pointer;' title = '{$alasan}' class='".($value == 0 ? 'label label-primary' : ($value == 1 ? 'label label-success' : 'label label-danger'))."'>".$status_daftar_pegawai[$value]."</span>
					   </div>";

		return $input;
	}
	
	function ubahstatus($id, $usulanid, $status, $event){
		$istatus = 'istatus';
		$valasan = 'valasan';

		$new_data = array();
		$new_data[$istatus] = $event;
		$new_data[$valasan] = '';
		$new_data['tupdated'] = date('Y-m-d H:i:s');
		$new_data['cupdatedby'] = trim($this->session->username);

		$data = array();
		try {
				$this->db->where(array('id'=>$id));
				$this->db->update($this->table, $new_data);
				
				//echo $this->db->last_query();exit;
				$data['status'] = true;
		}catch(Exception $e) {
				$data['status'] = false;
		}

			//get jenis
			$ijns = $this->getrow('', 'app_t_usulan', 'ijns', array('id'=>$usulanid))->ijns;
			$total = $this->getrow('', 'app_t_usulan_pegawai', 'count(*) as total', array('iusulanid'=>$usulanid, $istatus=>0, 'ispelatihan'=>1))->total;

		
		if ( $total == 0 ) {
				
				$status += 4;
				
				$new_data = array();
				$new_data['istatus'] = $status;
				$new_data['tupdated'] = date('Y-m-d H:i:s');
				$new_data['cupdatedby'] = trim($this->session->username);

				$this->db->where(array('id'=>$usulanid));
				$this->db->update('app_t_usulan', $new_data);
				//echo $this->db->last_query();exit;
				
				$data['total'] = $total;
		}

		echo json_encode($data);
	}
	
	function getTotalStatus0($usulanid) {
		$istatus = 'istatus';

	  	echo $this->getrow('', 'app_t_usulan_pegawai', 'count(*) as total', array('iusulanid'=>$usulanid, $istatus=>0, 'ispelatihan'=>1))->total;
	}
}