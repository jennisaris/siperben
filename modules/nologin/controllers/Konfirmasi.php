<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends MX_Controller {
	
    private $table;
    private $prefix = 'priv';

    public function __construct() {
        parent::__construct();
        $this->table  = "{$this->prefix}_t_user";

        $this->_setTitle('Konfirmasi Perubahan Password');
        $this->_setController("nologin/konfirmasi");
        $this->_init('default');

        $this->_addTable($this->table);
        $this->_addField($this->table, 'id', 'ID', true, true);
        $this->_addField($this->table, 'email', 'Email', true, false);
        $this->_addField($this->table, 'password', 'Masukkan Password Baru', true, false);
        $this->_addField($this->table, 'password1', 'Masukkan Konfirmasi Password Baru', false, false, true);

        $this->_setHTMLTemplate('', '', 'reset_password/form');

        // Hapus session yang tidak diperlukan
        $this->session->unset_userdata('header_controller');
    }

    public function index() {
		
        $key = $this->input->get('key', true);
        if (!$key) {
            return $this->_showError();
        }

        $last = (int)substr($key, -1);
        if ($last <= 0) {
            return $this->_showError();
        }

        $email = base64_decode(substr($key, 0, strlen($key) - ($last + 1)));
        $user = $this->getrow('', $this->table, 'id', ['email' => $email]);

        if ($user) {
			$this->session->set_userdata('reset_password', true);
			
            redirect("nologin/konfirmasi/edit/{$user->id}");
        } else {
            return $this->_showError();
        }
    }

    private function _showError() {
        echo $this->template->display('reset_password/notallowed', [
            'title' => 'Perhatian',
            'form'  => '<b><red>Maaf, Anda tidak memiliki akses!</red></b>'
        ], true);
        exit;
    }

    public function save() {
        $post = (object) $this->input->post();
        $response = ['status' => true];

        // Validasi input
        $required_fields = [
            'priv_t_user_email' => 'Email',
            'priv_t_user_password' => 'Password Baru'
        ];

        foreach ($required_fields as $field => $label) {
            if (empty($post->$field)) {
                $this->_sendResponse(false, $field, "Lengkapi isian pada kolom $label");
            }
        }

        if (trim($post->priv_t_user_password) !== trim($post->priv_t_user_password1)) {
            $this->_sendResponse(false, 'priv_t_user_password', 'Password Baru tidak sama dengan Konfirmasi Password Baru');
        }

        // Hash password dengan bcrypt
        $password_hash = password_hash(trim($post->priv_t_user_password), PASSWORD_BCRYPT, ['cost' => 12]);

        // Simpan password ke database
        $update = $this->db->update($this->table, ['password' => $password_hash], ['id' => $post->priv_t_user_id]);

        if ($update) {
            $this->_sendResponse(true, 'priv_t_user_email', 'Perubahan Password Berhasil');
        } else {
            $this->_sendResponse(false, 'priv_t_user_email', 'Gagal memperbarui password');
        }
    }

    private function _sendResponse($status, $obj, $msg) {
        echo json_encode([
            'status' => $status,
            'obj' => $obj,
            'msg' => $msg
        ]);
        exit;
    }

    function manipulate_insert_button($buttons) {
        $buttons['kembali'] = "<button class='btn btn-default' onclick='history.go(-1);' type='button' id='btn_back'>
                                <i class='fas fa-backward'></i> Kembali ke halaman login</button>";
        return $buttons;
    }

    function updateBox_priv_t_user_email($name, $value) {
        return "<input type='text' name='{$name}' id='{$name}' class='form-control {$name}' value='{$value}' readonly />";
    }

    function updateBox_priv_t_user_password($name, $value) {
        return "<input placeholder='Masukkan Password Baru' autocomplete='new-password' type='password' 
                name='{$name}' id='{$name}' class='form-control {$name}' />";
    }

    function updateBox_priv_t_user_password1($name, $value) {
        return "<input placeholder='Masukkan Konfirmasi Password Baru' autocomplete='new-password' type='password' 
                name='{$name}' id='{$name}' class='form-control {$name}' />";
    }

    function priv_t_user_output() {
        $base_url = base_url();
        return "<script type='text/javascript'>
            function save(url, table_id, confirm_text = 'Simpan Konfirmasi. Anda yakin?') {
                var formData = new FormData($('#' + table_id + '_form-edit')[0]);
    
                save_confirm(url + '/save', formData, confirm_text, table_id, false, function(output) {
                    var res = JSON.parse(output);
                    $('#' + table_id + '_form-edit div').removeClass('has-error');
    
                    if (res.status) {
                        bootbox_alert('', '', res.msg, true);
                        location.href = '{$base_url}';
                    } else {
                        bootbox_alert('', '', res.msg, false, false);
                        if (res.obj) {
                            $('.' + res.obj).focus().closest('div').addClass('has-error');
                        }
                    }
                });
    
                $('body').css('padding-right', 0);
            }
        </script>";
    }
    
}
