<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_golongan extends MX_Controller {
  var $prefix = 'kepeg';
  var $table;
	public function __construct() {
		parent::__construct();
		$controller = "kepegawaian/m_golongan";
		$this->table  = $this->prefix."_m_golongan";

   	$this->_setTitle('Master Golongan');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);
		$this->_addField($this->table, 'nama', 'Nama Golongan', false);
        $this->_addField($this->table, 'pangkat', 'Pangkat', false);
        $this->_addField($this->table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($this->table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($this->table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($this->table, 'cupdatedby', 'Diubah oleh', false, true);

		$this->_add2ListField($this->table, 'nama, pangkat, tupdated, cupdatedby');

        $this->_add2SearchField($this->table, 'kriteria', true);
		//klo _add2SearchField 2nd parameter set to true, jangan lupa add dibawah :
		$this->_addQuery($this->table, array('nama', 'pangkat'));


        $this->_setAlign($this->table, 'tupdated', 'center');
        $this->_setAlign($this->table, 'cupdatedby', 'center');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}
	
	function listBox_kepeg_m_golongan_tupdated($value, $datas) {
	  if ( $value != null ) {
	    return date('d-m-Y H:i:s', strtotime($value));
	  } else return date('d-m-Y H:i:s', strtotime($datas->kepeg_m_golongan_tcreated));
	}

    function save() {
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
        $result = $this->rest->get('api/master/list_golongan');
        //print_r($result);exit;
		
		$msg = $result->error;
        $success = $result->success;
        if ($success) {
            foreach($result->data as $data) {
                if ( $this->getrow('', $this->table, 'count(*) as total', array('id'=>$data->ID))->total == 0 ) {
                    //insert
                    $new_data = [
                        'id'=>$data->ID,
                        'nama'=>$data->NAMA,
                        'nama2'=>$data->NAMA2,
                        'pangkat'=>$data->NAMA_PANGKAT,
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
                        'nama'=>$data->NAMA,
                        'nama2'=>$data->NAMA2,
                        'pangkat'=>$data->NAMA_PANGKAT,
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
		$this->db->update($this->prefix.'_m_golongan', $new_post);
	}

	public function after_update_processor($id, $post, $oldpost) {
		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_m_golongan', $new_post);
	}

	function manipulate_list_button($buttons) {
		$buttons['add'] = "<button type='button' class='btn btn-primary btn_save' 
                            onclick='save(\"".base_url()."kepegawaian/m_golongan\", \"m_golongan\", \"Sinkronisasi Master Golongan. Anda yakin ?\", false, \"\", false, true, false, false, \"Sinkronisasi berhasil\");'>
						<i class='fas fa-users'></i> Sinkronisasi dari SIMPEG-DIKBUHR
					</button>";

		return $buttons;
	}

    function listBox_ACTION($buttons, $datas) {
        unset($buttons['ubah']);

        return $buttons;
    }

    function kepeg_m_golongan_output() {
        $js = "<script type='text/javascript'>
                    $(document).ready(function() {

                    });
        
                </script>
            ";

        return $js;
    }
}