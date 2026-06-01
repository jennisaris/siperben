<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jabatan extends MX_Controller {
  var $prefix = 'kepeg';
  var $table;
	public function __construct() {
		parent::__construct();
		$controller = "kepegawaian/m_jabatan";
		$this->table  = $this->prefix."_m_jabatan";

   	$this->_setTitle('Master Jabatan');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);
		$this->_addField($this->table, 'kode', 'Kode', false);
		$this->_addField($this->table, 'nama', 'Nama Jabatan', true);
    $this->_addField($this->table, 'jenis', 'Jenis', true);
    $this->_addField($this->table, 'kelas', 'Kelas', false);
    $this->_addField($this->table, 'pensiun', 'Usia Pensiun', false);
    $this->_addField($this->table, 'kategori_jabatan', 'Kategori Jabatan', false);
    $this->_addField($this->table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($this->table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($this->table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($this->table, 'cupdatedby', 'Diubah oleh', false, true);
    $this->_addField($this->table, 'isinkron', 'isinkron', false, true);

    $this->_add2SearchField($this->table, 'nama');
    $this->_add2SearchField($this->table, 'jenis');
    $this->_add2SearchField($this->table, 'kelas');
    
    $ar_jenis = array();
    foreach($this->getall('', 'kepeg_m_jenis_jabatan', 'id, nama') as $r ) {
      $ar_jenis[$r->id] = $r->nama;
    }
  
    $this->_changeType($this->table, 'jenis', 'combobox', $ar_jenis);

    $ar_jnsjbt = [];
    foreach($this->getall('', 'kepeg_m_jabatan', 'kategori_jabatan','', 'kategori_jabatan') as $r ) {
      $ar_katjabatan[$r->kategori_jabatan] = $r->kategori_jabatan;
    }

    $this->_changeType($this->table, 'kategori_jabatan', 'combobox', $ar_katjabatan);

		$this->_add2ListField($this->table, 'nama, jenis, kelas, pensiun, kategori_jabatan, tupdated, cupdatedby');


    $this->_setAlign($this->table, 'tupdated', 'center');
    $this->_setAlign($this->table, 'cupdatedby', 'center');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}

  function insertCheck_app_m_jabatan_kode($value, $post) {
		$value = trim($value);
		$data['status'] = true;

		$sql = "SELECT count(*) as total, kode, nama FROM app_m_jabatan where kode='{$value}'";
		$row = $this->db->query($sql)->row();
		if ( $row->total > 0 ) {
			$data['status'] = false;
			$data['msg'] = "Kode {$row->kode} sudah terdaftar untuk nama jabatan {$row->nama}. Periksa kembali isian anda.";
			$data['obj'] = "app_m_jabatan_kode";
		}

		return $data;
	}

	function updateCheck_app_m_jabatan_kode($value, $post, $id) {
		$value = trim($value);
		$data['status'] = true;

		$sql = "SELECT count(*) as total, kode, nama FROM app_m_jabatan where kode='{$value}' and id != {$id}";
		$row = $this->db->query($sql)->row();
		if ( $row->total > 0 ) {
			$data['status'] = false;
			$data['msg'] = "Kode {$row->kode} sudah terdaftar untuk nama jabatan {$row->nama}. Periksa kembali isian anda.";
			$data['obj'] = "app_m_jabatan_kode";
		}

		return $data;
	}

	function insertCheck_app_m_jabatan_nama($value, $post) {
		$value = trim($value);
		$data['status'] = true;

		$sql = "SELECT count(*) as total, kode, nama FROM app_m_jabatan where nama='{$value}'";
		$row = $this->db->query($sql)->row();
		if ( $row->total > 0 ) {
			$data['status'] = false;
			$data['msg'] = "Nama jabatan {$row->nama} sudah terdaftar dgn kode {$row->kode}. Periksa kembali isian anda.";
			$data['obj'] = "app_m_jabatan_nama";
		}

		return $data;
	}

	function updateCheck_app_m_jabatan_nama($value, $post, $id) {
		$value = trim($value);
		$data['status'] = true;

		$sql = "SELECT count(*) as total, kode, nama FROM app_m_jabatan where nama='{$value}' and id != {$id}";
		$row = $this->db->query($sql)->row();
		if ( $row->total > 0 ) {
			$data['status'] = false;
			$data['msg'] = "Nama jabatan {$row->nama} sudah terdaftar dgn kode {$row->kode}. Periksa kembali isian anda.";
			$data['obj'] = "app_m_jabatan_nama";
		}

		return $data;
	}

  function before_insert_processor($post) {
		$post->kepeg_m_jabatan_isinkron = 0;

    return $post;
	}
	
	function listBox_kepeg_m_jabatan_tupdated($value, $datas) {
	  if ( $value != null ) {
	    return date('d-m-Y H:i:s', strtotime($value));
	  } else return date('d-m-Y H:i:s', strtotime($datas->kepeg_m_jabatan_tcreated));
	}

    function save_sinkron() {
        //ini_set('display_errors', 1);
        //error_reporting(E_ALL);
        $this->load->library('rest');
        $config = array(
            'server' => trim($this->config->item('dikbudhr_url')),
            'http_user' => trim($this->config->item('dikbudhr_user')),
            'http_pass' => trim($this->config->item('dikbudhr_pass')),
            'http_auth' => "basic", // or 'digest'
            'api_key'	=> "demoapikey",
            'api_name'	=> "x-api-key"
        );
        $this->rest->initialize($config);
        $result = $this->rest->get('api/master/list_jabatan');
        //echo 'a';
        //print_r($result);
        //exit;
		$msg = $result->error;
		$success = $result->success;
        if ($success) {
            foreach($result->data as $data) {
                if ( $this->getrow('', $this->table, 'count(*) as total', array('kode'=>$data->KODE_JABATAN))->total == 0 ) {
                    //insert
                    $new_data = [
                        'id'=>$data->ID,
                        'kode'=>$data->KODE_JABATAN,
                        'nama'=>$data->NAMA_JABATAN,
                        'jenis'=>$data->JENIS_JABATAN,
                        'kelas'=>$data->KELAS,
                        'pensiun'=>$data->PENSIUN,
                        'kategori_jabatan'=>$data->KATEGORI_JABATAN,
                        'tcreated'=>date('Y-m-d H:i:s'),
                        'ccreatedby'=>'web-service'
                    ];

                    try {
						$this->db->insert($this->table, $new_data);
						$msg = 'Sinkronisasi berhasil disimpan';
					}catch(Exception $e) {
						$success = false;
						$msg = $e->getMessage();
					}
                } else {
                    //update
                    $new_data = [
                        'kode'=>$data->KODE_JABATAN,
                        'nama'=>$data->NAMA_JABATAN,
                        'jenis'=>$data->JENIS_JABATAN,
                        'kelas'=>$data->KELAS,
                        'pensiun'=>$data->PENSIUN,
                        'kategori_jabatan'=>$data->KATEGORI_JABATAN,
                        'tupdated'=>date('Y-m-d H:i:s'),
                        'cupdatedby'=>'web-service'
                    ];

                    $where = ['id'=>$data->ID];

                    try {
						$this->db->where($where);
						$this->db->update($this->table, $new_data);
						$msg = 'Sinkronisasi berhasil disimpan';
					}catch(Exception $e) {
						$success = false;
						$msg = $e->getMessage();
					}
                }
            }
        }
      echo json_encode(['status'=>$success, 'msg'=>$msg]);
  }

	public function after_insert_processor($id, $post) {
		$new_post = array();
		$new_post['tcreated']   = date('Y-m-d H:i:s');
		$new_post['ccreatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_m_jabatan', $new_post);
	}

	public function after_update_processor($id, $post, $oldpost) {
		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_m_jabatan', $new_post);
	}

	function manipulate_list_button($buttons) {
		$buttons['sinkron'] = "<button type='button' class='btn btn-primary btn_save' 
                            onclick='save_sinkron(\"".base_url()."kepegawaian/m_jabatan\", \"m_jabatan\", \"Sinkronisasi Master Jabatan. Anda yakin ?\", false, \"\", false, true, false, false, \"Sinkronisasi berhasil\");'>
						<i class='fas fa-users'></i> Sinkronisasi dari SIMPEG-DIKBUHR
					</button>";

		return $buttons;
	}

    /* function listBox_ACTION($buttons, $datas) {
        unset($buttons['hapus']);

        return $buttons;
    } */

    function kepeg_m_jabatan_output() {
        $js = "<script type='text/javascript'>
                    $(document).ready(function() {

                    });

					function save_sinkron(url, table_id, default_txt_confirm='Sinkronisasi Master Jabatan dari SIMPEG-DIKBUDHR. Anda yakin?', _ismodal=false, _modals='form-modal', _islochref=false, _isneedrefresh=true, _isneededit=false, _isOldFashion=false, _msg='Berhasil.', table_id2='') {
						
						if ( default_txt_confirm == '' ) default_txt_confirm='Sinkronisasi Data Jabatan dari SIMPEG-DIKBUDHR. Anda yakin?';
						//var form_name = table_id+'_form-edit';
						var form_name = table_id+'_list';
						var formData = new FormData(jQuery('#'+form_name)[0]);
						save_confirm(url+'/save_sinkron', formData, default_txt_confirm, table_id, _ismodal, function(output) {
							//alert(output);
							var o = jQuery.parseJSON(output);
							//alert(o.status);
							//alert(o.id);
							$('div').removeClass('has-error');
							if ( o.status == true ) {
								bootbox_alert('', '', _msg, true);
								reload_grid('".base_url()."kepegawaian/m_jabatan/lists', 'm_jabatan');
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
        
                </script>
            ";

        return $js;
    }
}