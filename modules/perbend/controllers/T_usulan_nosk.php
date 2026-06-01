<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_usulan_nosk extends MX_Controller {
  var $prefix = 'app';

  var $parent_unorid;
	public function __construct() {
		parent::__construct();
		$controller = "perbend/t_usulan_nosk";
		$table  = $this->prefix."_t_usulan_sk";

   	    
        $this->_setModal(true);
        $this->_setTitle('Proses SK');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'cnosk', 'No. SK', false);
        $this->_addField($table, 'dtglsk', 'Tgl. SK', false);

		//hidden
		$this->_addField($table, 'cnosurat', 'No. Surat Pengantar', false);
		$this->_addField($table, 'dtglsurat', 'Tgl. Surat Pengantar', false);

		//
		$this->_addField($table, 'dtmt', 'T.M.T', true);
		$this->_addField($table, 'cnosk2', 'No. SK Pengganti (Bila Ada)', false);
		$this->_addField($table, 'dtgltetap', 'Tgl. Ditetapkan', true);
		$this->_addField($table, 'ittdid', 'Penandatangan', true);
		$this->_addField($table, 'iusetetap', 'iusetetap', false, true);
		$this->_addField($table, 'iunorid', 'iunorid', false, true);
		$this->_addField($table, 'issinde', 'issinde', false, true);



        $this->_changeType($table, 'dtglsk', 'date', 'd-m-Y');
		$this->_changeType($table, 'dtmt', 'date', 'd-m-Y');
		$this->_changeType($table, 'dtgltetap', 'date', 'd-m-Y');
		$this->_changeType($table, 'dtglsurat', 'date', 'd-m-Y');

		$ar_ttd = array();
		foreach($this->getall('', 'app_m_ttd', 'id, concat(cnip,\',\', vname) as concat_nip_nama', array('ldeleted'=>0)) as $r) {
			$ar_ttd[$r->id] = $r->concat_nip_nama;
		}

		$this->_changeType($table, 'ittdid', 'combobox', $ar_ttd);

		$this->_add2ListField($table, 'cnosk, dtglsk, dtmt, dtgltetap, ittdid');

		$this->parent_unorid = $this->uri->segment(5);
		$this->_setParams(['iunorid'=>$this->parent_unorid]);

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}

	function insertBox_app_t_usulan_sk_iunorid($name, $params) {
		$params = (object)$params;
		$input = "<input type='hidden' name='{$name}' id='{$name}' class='{$name}' value='{$params->iunorid}'/>";
		return $input;
	}

	function updateBox_app_t_usulan_sk_iunorid($name, $value, $datas, $params) {
		$input = "<input type='hidden' name='{$name}' id='{$name}' class='{$name}' value='{$value}'/>";
		return $input;
	}

	function updateBox_app_t_usulan_sk_dtgltetap($name, $value, $datas) {
		$value = $value != null ? date('d-m-Y', strtotime($value)) : '';
		$input = "<input placeholder='Tgl. Ditetapkan' type='text' name='{$name}' id='{$name}' class='form-control datepicker {$name}' value='{$value}'/>";
		

		$input .= "<script type='text/javascript'>
			$( '#{$name}').datepicker({
				dateFormat: 'dd-mm-yy',
				changeMonth: true,
				changeYear: true,
				maxDate: '+0D',
				onSelect : function(dateText, inst) {
					
				}
			});

			function chg_iusetetap(dis) {
				var ischecked = $(dis).is(':checked');
				if ( ischecked ) $('#app_t_usulan_sk_iusetetap').val(1);
				else  $('#app_t_usulan_sk_iusetetap').val(0);
			}
		</script>";
		$iusetetap = $datas->app_t_usulan_sk_iusetetap;
		if ( $iusetetap == 1 ) $chk_iusetetap = ' checked ';
		else $chk_iusetetap = ' ';

		$input .= "<div style='margin-top:-35px;margin-left:110px;'><input {$chk_iusetetap} type='checkbox' name='{$name}_chk' id='{$name}_chk' onchange='chg_iusetetap(this);'/>
					<div style='margin-top:-28px!important;margin-left:17px;'><b>Gunakan Sbg TMT Ditetapkan</b></div>
					</div>";

		return $input;
	}

	function insertBox_app_t_usulan_sk_dtgltetap($name) {
		return $this->updateBox_app_t_usulan_sk_dtgltetap($name, '', '');
	}
	
	function insertBox_app_t_usulan_sk_cnosk($name) {
		return $this->updateBox_app_t_usulan_sk_cnosk($name, '', '');
	}
	
	function updateBox_app_t_usulan_sk_cnosk($name, $value, $datas) { 
		$value = ($value == '' ? '' : $value);
		$input = "<input placeholder='Masukkan No. SK' value='".$value."' type='text' name='{$name}' 
			id='{$name}' class='form-control {$name}' style='width:300px'/>";

		$input .= "<script type='text/javascript'>

			function chg_issinde(dis) {
				var ischecked = $(dis).is(':checked');
				if ( ischecked ) { 
					$('#app_t_usulan_sk_issinde').val(1);
					$('#app_t_usulan_sk_cnosk').attr('readonly', true);

					$('.div_app_t_usulan_sk_cnosurat').hide();
					$('.div_app_t_usulan_sk_dtglsurat').hide();
				} else  { 
					$('#app_t_usulan_sk_issinde').val(0);
					$('#app_t_usulan_sk_cnosk').attr('readonly', false);

					$('.div_app_t_usulan_sk_cnosurat').show();
					$('.div_app_t_usulan_sk_dtglsurat').show();
				}
			}
		</script>";
		$issinde = $datas->app_t_usulan_sk_issinde;
		if ( $issinde == 1 ) $chk_issinde = ' checked ';
		else $chk_issinde = ' ';

		$input .= "<div style='margin-top:-35px;margin-left:310px;'><input {$chk_issinde} type='checkbox' name='{$name}_chk' id='{$name}_chk' onchange='chg_issinde(this);'/>
					<div style='margin-top:-28px!important;margin-left:17px;'><b>Gunakan SINDE</b></div>
					</div>";

		return $input;
	}
	
	
	function insertBox_app_t_usulan_sk_dtglsk($name) {
		$today = date('d-m-Y');
		$input = "<input value='".$today."' type='text' name='{$name}' 
			id='{$name}' class='form-control datepicker {$name}'/>";
			
		$input .= "<script type='text/javascript'>
					$( '#{$name}').datepicker({
						dateFormat: 'dd-mm-yy',
						changeMonth: true,
						changeYear: true,
						maxDate: '+0D',
						onSelect : function(dateText, inst) {
							
						}
					});
				</script>";

		return $input;
	}
	
	function updateBox_app_t_usulan_sk_dtglsk($name, $value, $datas) {
		$today = ($value == '' ? date('d-m-Y') : date('d-m-Y', strtotime($value)));
		$input = "<input value='".$today."' type='text' name='{$name}' 
			id='{$name}' class='form-control datepicker {$name}'/>";
			
		$input .= "<script type='text/javascript'>
					$( '#{$name}').datepicker({
						dateFormat: 'dd-mm-yy',
						changeMonth: true,
						changeYear: true,
						maxDate: '+0D',
						onSelect : function(dateText, inst) {
							
						}
					});
				</script>";

		return $input;
	}

	function insertBox_app_t_usulan_sk_dtglsurat($name) {
		$today = date('d-m-Y');
		$input = "<input value='".$today."' type='text' name='{$name}' 
			id='{$name}' class='form-control datepicker {$name}'/>";
			
		$input .= "<script type='text/javascript'>
					$( '#{$name}').datepicker({
						dateFormat: 'dd-mm-yy',
						changeMonth: true,
						changeYear: true,
						maxDate: '+0D',
						onSelect : function(dateText, inst) {
							
						}
					});
				</script>";

		return $input;
	}
	
	function updateBox_app_t_usulan_sk_dtglsurat($name, $value, $datas) {
		$today = ($value == '' ? date('d-m-Y') : date('d-m-Y', strtotime($value)));
		$input = "<input value='".$today."' type='text' name='{$name}' 
			id='{$name}' class='form-control datepicker {$name}'/>";
			
		$input .= "<script type='text/javascript'>
					$( '#{$name}').datepicker({
						dateFormat: 'dd-mm-yy',
						changeMonth: true,
						changeYear: true,
						maxDate: '+0D',
						onSelect : function(dateText, inst) {
							
						}
					});
				</script>";

		return $input;
	}

	function insertBox_app_t_usulan_sk_dtmt($name) {
		$today = date('d-m-Y');
		$input = "<input value='".$today."' type='text' name='{$name}' 
			id='{$name}' class='form-control datepicker {$name}'/>";
			
		$input .= "<script type='text/javascript'>
					$( '#{$name}').datepicker({
						dateFormat: 'dd-mm-yy',
						changeMonth: true,
						changeYear: true,
						maxDate: '+0D',
						onSelect : function(dateText, inst) {
							
						}
					});
				</script>";

		return $input;
	}
	
	function updateBox_app_t_usulan_sk_dtmt($name, $value, $datas) {
		$today = ($value == '' ? date('d-m-Y') : date('d-m-Y', strtotime($value)));
		$input = "<input value='".$today."' type='text' name='{$name}' 
			id='{$name}' class='form-control datepicker {$name}'/>";
			
		$input .= "<script type='text/javascript'>
					$( '#{$name}').datepicker({
						dateFormat: 'dd-mm-yy',
						changeMonth: true,
						changeYear: true,
						maxDate: '+0D',
						onSelect : function(dateText, inst) {
							
						}
					});
				</script>";

		return $input;
	}
	
	function listBox_app_t_usulan_sk_tupdated($value, $datas) {
	  if ( $value != null ) {
	    return date('d-m-Y H:i:s', strtotime($value));
	  } else return date('d-m-Y H:i:s', strtotime($datas->app_t_usulan_nosk_tcreated));
	}
	
	function listBox_app_t_usulan_sk_cupdatedby($value, $datas) {
	  if ( $value != null ) {
	    $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($value)))->realname;
	   } else {
	     $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($datas->app_t_usulan_nosk_ccreatedby)))->realname;
	   }
	  
	  return $nama;
	}

	public function after_insert_processor($id, $post) {
		$new_post = array();
		$new_post['tcreated']   = date('Y-m-d H:i:s');
		$new_post['ccreatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_t_usulan_nosk', $new_post);
	}

	public function after_update_processor($id, $post, $oldpost) {
		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_t_usulan_nosk', $new_post);
	}

    function manipulate_url_save($save) {
		unset($save);
		$save['method'] = "save_nosk('".base_url()."perbend/t_usulan_nosk', 't_usulan_nosk', 'Simpan No. SK. Anda yakin?', '', 'form-modal')";
		return $save;
	}

    function app_t_usulan_sk_output() {
		$js = "<script type='text/javascript'>

					function save_nosk() {
                        var table_id = 't_usulan_nosk';
						
						//alert('#t_terbit_sk_form-edit .check_pegawai_cnosk_{$this->parent_unorid}');
						//console.log($('#t_terbit_sk_form-edit .check_pegawai_cnosk_{$this->parent_unorid}'));

						//return false;
						$('#t_terbit_sk_form-edit .check_pegawai_cnosk_{$this->parent_unorid}').each(function() {
                            var idx	 = $(this).attr('id');
                            var idx_ = (idx.split('_')).pop();

							//alert($('#t_terbit_sk_form-edit #usulan_{$this->parent_unorid}_'+idx_).val());
							//return false;
                            if ( $('#t_terbit_sk_form-edit #usulan_{$this->parent_unorid}_'+idx_).val() != 0 ) {

								//alert($('#app_t_usulan_sk_cnosk').val());
								//alert($('#app_t_usulan_sk_dtglsk').val());
								//alert(idx_);
                                $('#t_terbit_sk_form-edit #check_pegawai_cnosk_{$this->parent_unorid}_'+idx_).val($('#app_t_usulan_sk_cnosk').val());
                                $('#t_terbit_sk_form-edit #check_pegawai_dtglsk_{$this->parent_unorid}_'+idx_).val($('#app_t_usulan_sk_dtglsk').val());
								$('#t_terbit_sk_form-edit #check_pegawai_dtmtsk_{$this->parent_unorid}_'+idx_).val($('#app_t_usulan_sk_dtmt').val());
								$('#t_terbit_sk_form-edit #check_pegawai_cnosk2_{$this->parent_unorid}_'+idx_).val($('#app_t_usulan_sk_cnosk2').val());
								$('#t_terbit_sk_form-edit #check_pegawai_dtgltetap_{$this->parent_unorid}_'+idx_).val($('#app_t_usulan_sk_dtgltetap').val());
								$('#t_terbit_sk_form-edit #check_pegawai_iusetetap_{$this->parent_unorid}_'+idx_).val($('#app_t_usulan_sk_iusetetap').val());
								$('#t_terbit_sk_form-edit #check_pegawai_issinde_{$this->parent_unorid}_'+idx_).val($('#app_t_usulan_sk_issinde').val());
								$('#t_terbit_sk_form-edit #check_pegawai_ittdid_{$this->parent_unorid}_'+idx_).val($('#app_t_usulan_sk_ittdid').val());
								//$('#t_terbit_sk_form-edit #check_pegawai_isklik_{$this->parent_unorid}_'+idx_).val(1);

								$('#t_terbit_sk_form-edit #check_pegawai_cnosurat_{$this->parent_unorid}_'+idx_).val($('#app_t_usulan_sk_cnosurat').val());
                                $('#t_terbit_sk_form-edit #check_pegawai_dtglsurat_{$this->parent_unorid}_'+idx_).val($('#app_t_usulan_sk_dtglsurat').val());
                            }
                        });

						//return false;

                        save(\"".base_url()."perbend/t_terbit_sk\", \"t_terbit_sk\", 
                            \"Proses SK. Anda Yakin ?\", true, \"\", false, true, false, false, \"Proses SK Berhasil\", \"t_usulan_nosk\");
						
					}

			   </script>";

		return $js;
	}

	
	function insertBox_app_t_usulan_sk_cnosk2($name, $params) {
	  $params = (object)$params;
	  $no_sk_lama = '';
	  $sql = "SELECT cnosk from app_t_usulan_sk 
        	  where iunorid = '{$params->iunorid}' 
        	  order by id desc limit 1";
    $no_sk_lama = $this->db->query($sql)->row()->cnosk;
	  $input = "<input placeholder='No SK Pengganti (jika ada)' type='text' name='{$name}' id='{$name}' class='form-control {$name}' value='{$no_sk_lama}' />";
	  
	  return $input;
	}
	
	function uodateBox_app_t_usulan_sk_cnosk2($name, $value, $datas, $params) {
	  $params = (object)$params;
	  $no_sk_lama = '';
	  $sql = "SELECT cnosk from app_t_usulan_sk 
        	  where iunorid = '{$params->iunorid}' 
        	  and id != '{$datas->app_t_usulan_sk_id}' 
        	  order by id desc limit 1";
    $no_sk_lama = $this->db->query($sql)->row()->cnosk;
    if ($value =='') $value = $no_sk_lama;
	  $input = "<input placeholder='No. SK Pengganti (jika ada)' type='text' name='{$name}' id='{$name}' class='form-control {$name}' value='{$value}' />";
	  
	  return $input;
	}
}

/*
<?php

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "http://118.98.228.245/services_pkln/getNomorSuratKeluarPKLN",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"iduser\"\r\n\r\n9312\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"pengirim_int\"\r\n\r\n7640\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"pengirim_int_idjstruktural\"\r\n\r\n110\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"pengirim_int_idunit\"\r\n\r\n1\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"pengirim_int_text\"\r\n\r\nIr. Suharti, M.A., Ph.D - Sekretaris Jenderal\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"ttd_int\"\r\n\r\n26218\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"ttd_int_idjstruktural\"\r\n\r\n109\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"ttd_int_idunit\"\r\n\r\n18\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"ttd_int_text\"\r\n\r\nFaisal Syahrul, SE - Kepala Biro Keuangan\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"idsuratjenis\"\r\n\r\n2\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"perihal\"\r\n\r\nTest Surat Keluar Perbend #1\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"isi\"\r\n\r\nIsi Test Surat Keluar Perbend #1\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"keterangan\"\r\n\r\nKeterangan Test Surat Keluar Perbend #1\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"idpengkonsep\"\r\n\r\n9312\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"is_private\"\r\n\r\n1\r\n-----011000010111000001101001\r\nContent-Disposition: form-data; name=\"penerima\"\r\n\r\n{}\r\n-----011000010111000001101001--\r\n",
  CURLOPT_COOKIE => "PHPSESSID=rk9pgmsq8uljfc8k0ij6mumgq4",
  CURLOPT_HTTPHEADER => [
    "bearer: 7987efb68a685e53fec3d8b3c81890f3",
    "content-type: multipart/form-data; boundary=---011000010111000001101001"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
*/