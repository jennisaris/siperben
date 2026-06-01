<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "M_kepegawaian_unor.php";
class M_tarik_pegawai extends MX_Controller {
  var $prefix = 'kepeg';
  
  var $ar_m_jabatan = array();
  var $ar_m_golongan = array();
  
  var $m_unor;
	public function __construct() {
        //print_r($this->session);
        //exit;
		parent::__construct();
		$controller = "kepegawaian/m_tarik_pegawai";
		$table  = $this->prefix."_m_pegawai";
		
		$this->m_unor = new M_kepegawaian_unor;

        //$this->_setModal(true);
   	    $this->_setTitle('Tarik Data Pegawai');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'cnip', 'NIP', true);
		$this->_addField($table, 'vname', 'Nama Lengkap', true);
		$this->_addField($table, 'cgolid', 'Pangkat/Golongan', false);
		$this->_addField($table, 'ijabid', 'Jabatan', false);
		//$this->_addField($table, 'vjabnm', 'Nama Jabatan', true);
		$this->_addField($table, 'ikduker', 'Unit Kerja Baru', true);
		$this->_addField($table, 'istatus', 'Kedudukan Hukum', false, true);
		$this->_addField($table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($table, 'cupdatedby', 'Diubah oleh', false, true);

        $this->session->unset_userdata('header_controller');
		$header_controller = array('header_controller' => 'kepegawaian/m_pegawai');
		$this->session->set_userdata($header_controller);
	}

    function insertBox_kepeg_m_pegawai_ikduker($name) {
        return $this->updateBox_kepeg_m_pegawai_ikduker($name, '');
    }

    function updateBox_kepeg_m_pegawai_ikduker($name, $value) {
        $id_unit = $this->session->kodeunit;
        $nm_unit = $this->session->realname;
        $input = "<input type='hidden' name='{$name}' class='{$name}' id='{$name}' value='{$id_unit}'/>";
        $input .= "<input readonly type='text' name='{$name}_txt' class='form-control {$name}_txt' id='{$name}_txt' value='{$nm_unit}'/>";

        return $input;
    }

    function insertBox_kepeg_m_pegawai_cnip($name) {
        return $this->updateBox_kepeg_m_pegawai_cnip($name, '');
    }

    function updateBox_kepeg_m_pegawai_cnip($name, $value) {
        $input = "<input type='text' name='{$name}' class='form-control {$name}' id='{$name}' value='' maxlength='18'/>";

        return $input;
    }

    function insertBox_kepeg_m_pegawai_vname($name) {
        return $this->updateBox_kepeg_m_pegawai_vname($name, '');
    }

    function updateBox_kepeg_m_pegawai_vname($name, $value) {
        $input = "<input type='text' name='{$name}' class='form-control {$name}' id='{$name}' readonly/>";

        return $input;
    }

    function insertBox_kepeg_m_pegawai_ijabid($name) {
        return $this->updateBox_kepeg_m_pegawai_ijabid($name, '');
    }

    function updateBox_kepeg_m_pegawai_ijabid($name, $value) {
        $input = "<input type='hidden' name='{$name}' class='{$name}' id='{$name}' value=''/>";
        $input .= "<input readonly type='text' name='{$name}_txt' class='form-control {$name}_txt' id='{$name}_txt' value='{$nm_unit}'/>";

        return $input;
    }

    function insertBox_kepeg_m_pegawai_cgolid($name) {
        return $this->updateBox_kepeg_m_pegawai_cgolid($name, '');
    }

    function updateBox_kepeg_m_pegawai_cgolid($name, $value) {
        $input = "<input type='hidden' name='{$name}' class='{$name}' id='{$name}' value=''/>";
        $input .= "<input readonly type='text' name='{$name}_txt' class='form-control {$name}_txt' id='{$name}_txt' value='{$nm_unit}'/>";

        return $input;
    }

    function manipulate_insert_button($buttons) {
        $buttons['simpan'] = "<button type='button' class='btn btn-primary btn_save' onclick='tinyMCE.triggerSave(true,true);' style='display:none;'>
							       		<i class='fa fa-save' aria-hidden='true'> </i>
									   Simpan {$this->title}</button>";

        return $buttons;
    }

    function kepeg_m_pegawai_output() {
        $js = "<script type='text/javascript'>
                $(document).ready(function() {

                    $('#m_tarik_pegawai_form-edit .btn_save').click(function() {
                        $('#m_tarik_pegawai_form-edit').submit();
                    });

                    $('#kepeg_m_pegawai_cnip').keyup(function(e) {
                        if ( e.which == 13 ) {
                            if ( $(this).val().length < 18 ) {
                                bootbox_alert('', '', 'NIP kurang dari 18 digit.', false, false);//bootbox.alert(o.msg);
                            } else {
                                $.post('".base_url()."kepegawaian/m_tarik_pegawai/get_pegawai_by_nip/'+$(this).val()+'/true', {}, function(data) {
                                    var o = jQuery.parseJSON(data);
                                    
                                    if ( o.total > 0 ) {

                                        $('#kepeg_m_pegawai_vname').val(o.data.nama);
                                        $('#kepeg_m_pegawai_cgolid').val(o.data.golid);
                                        $('#kepeg_m_pegawai_cgolid_txt').val(o.data.golnama);
                                        $('#kepeg_m_pegawai_ijabid').val(o.data.jabid);
                                        $('#kepeg_m_pegawai_ijabid_txt').val(o.data.jabnama);

                                        $('.btn_save').show();

                                        //reload_grid(\"".base_url().$this->router->fetch_module()."/m_pegawai/lists\", \"m_pegawai\");
              							//$(\"#m_pegawai-panel-default-form\").hide();

                                    } else {
                                        bootbox_alert('', '', 'Data tidak ditemukan!. Cek kembali NIP anda.', false, false);//bootbox.alert(o.msg);

                                        $('#kepeg_m_pegawai_vname').val('');
                                        $('#kepeg_m_pegawai_cgolid').val('');
                                        $('#kepeg_m_pegawai_cgolid_txt').val('');
                                        $('#kepeg_m_pegawai_ijabid').val('');
                                        $('#kepeg_m_pegawai_ijabid_txt').val('');
                                        
                                        $('.btn_save').hide();
                                        return false;
                                    }

                                });
                            }
                        }
                    });
                    
                });

                </script>";
        return $js;
    }

    function get_pegawai_by_nip($nip, $is_ajax=false) {
		$sql = "SELECT count(*) as total, cnip, vname, cgolid, 
				(select concat(nama, ', ', pangkat) from kepeg_m_golongan where id = cgolid) as nama_pangkat, 
				ijabid, (select nama from kepeg_m_jabatan where id = ijabid) as nama_jabatan, id 
				FROM kepeg_m_pegawai where cnip = '{$nip}'";
		$row = $this->db->query($sql)->row();

        $datas = ['total'=>$row->total, 'data'=>['nip'=>$row->cnip, 'nama'=>$row->vname, 'jabid'=>$row->ijabid, 'jabnama'=>$row->nama_jabatan,
		                'golid'=>$row->cgolid, 'golnama'=>$row->nama_pangkat]];

		if ( $is_ajax )
		    echo json_encode($datas);
        else return $datas;
	}

    function save() {
        $post = (object)$_POST;

        $datas = ['status'=>TRUE];
        if ( strlen(trim($post->kepeg_m_pegawai_cnip)) < 18 ) {
            $datas['status'] = false;
            $datas['msg'] = 'Lengkapi kolom NIP';
            $datas['obj'] = 'kepeg_m_pegawai_cnip';
        } else {
            $get_pegawai_by_nip = $this->get_pegawai_by_nip(trim($post->kepeg_m_pegawai_cnip));
            
            if ( $get_pegawai_by_nip['total'] == 0 ) {
                $success = false;
                $msg = 'Data tidak ditemukan.';

            } else {

                $data = ['ikduker'=>$post->kepeg_m_pegawai_ikduker,
                        'tupdated'=>date('Y-m-d H:i:s'),
                        'cupdatedby'=>trim($this->session->username)];
                $where = ['cnip'=>trim($post->kepeg_m_pegawai_cnip)];

                try {
                    $this->db->set($data);
                    $this->db->where($where);
                    $this->db->update($this->prefix."_m_pegawai");

                    $success = TRUE;
                    $msg = 'Data berhasil di update';
                } catch (Exception $e) {
                    $success = FALSE;
                    $msg = 'Data gagal di update';
                }
            }

            $datas['status'] = $success;
            $datas['msg'] = $msg;
        }

        echo json_encode($datas);
    }
}