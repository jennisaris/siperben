<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Approval_pengguna extends MX_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url','html'));
        $this->load->library(array('session','email'));
    }

    public function index() {
        $this->ensure_login();
        $rows = $this->db->order_by('created_at','DESC')->get('app_t_registrasi_kpa')->result();
        $active_operator = array();
        foreach ($rows as $r) {
            $satker = !empty($r->satker_kode) ? $r->satker_kode : $this->extract_satker_code($r->satuan_kerja);
            if ($satker && $this->active_operator_exists($satker)) {
                $active_operator[$satker] = true;
            }
        }
        $data = array(
            'rows' => $rows,
            'active_operator' => $active_operator,
            'msg' => $this->session->flashdata('approval_msg'),
        );
        $this->template->display('approval_pengguna/index', $data);
    }

    public function approve($id) {
        $this->ensure_login();
        $r = $this->db->where('id',(int)$id)->get('app_t_registrasi_kpa')->row();
        if (!$r || $r->status !== 'baru') { $this->flash_back('Data registrasi tidak ditemukan atau sudah diproses.'); return; }
        $res = $this->approve_row($r);
        $this->flash_back($res);
    }

    public function approve_all() {
        $this->ensure_login();
        $rows = $this->db->where('status','baru')->order_by('created_at','ASC')->get('app_t_registrasi_kpa')->result();
        $ok=0; $skip=0; $msgs=array();
        foreach ($rows as $r) {
            $res = $this->approve_row($r, true);
            if (strpos($res,'Berhasil') !== false) $ok++; else { $skip++; $msgs[] = '#'.$r->id.': '.$res; }
        }
        $this->flash_back('Approve semua selesai. Berhasil: '.$ok.', dilewati/gagal: '.$skip.'. '.implode(' | ', array_slice($msgs,0,5)));
    }

    public function reject($id) {
        $this->ensure_login();
        $this->db->where('id',(int)$id)->where('status','baru')->update('app_t_registrasi_kpa', array(
            'status'=>'ditolak', 'rejected_at'=>date('Y-m-d H:i:s'), 'rejected_by'=>$this->session->userdata('username'), 'updated_at'=>date('Y-m-d H:i:s')
        ));
        $this->flash_back('Registrasi ditolak.');
    }

    private function approve_row($r, $silent=false) {
        $satker = $r->satker_kode ?: $this->extract_satker_code($r->satuan_kerja);
        if (!$satker) return 'Kode satker tidak valid.';
        if ($this->active_operator_exists($satker)) return 'Tidak bisa approve: masih ada user aktif untuk satker '.$satker.'. Nonaktifkan user lama terlebih dahulu.';
        $password = $this->generate_password();
        $hash = password_hash($password, PASSWORD_BCRYPT, array('cost'=>12));
        $now = date('Y-m-d H:i:s');
        $user = array(
            'username'=>$satker,
            'password'=>$hash,
            'realname'=>$r->nama_lengkap,
            'email'=>$r->email,
            'ldeleted'=>0,
            'tcreated'=>$now,
            'ccreatedby'=>$this->session->userdata('username') ?: 'approval',
            'isuperuser'=>0,
            // Registrasi operator menghasilkan user biasa pada menu Pengguna.
            // Hak akses memakai group Pengguna Umum, bukan superadmin/admin.
            'igroupid'=>'4',
            'credirect_page'=>'dashboard/index',
            'ctahun'=>date('Y'),
            'kode_lama'=>$satker
        );
        $old_user = $this->db->where('username', $satker)->where('ldeleted <>', 0)->order_by('id', 'DESC')->get('priv_t_user')->row();
        if ($old_user) {
            $user['tupdated'] = $now;
            $user['cupdatedby'] = $this->session->userdata('username') ?: 'approval';
            unset($user['tcreated'], $user['ccreatedby']);
            $this->db->where('id', $old_user->id)->update('priv_t_user', $user);
            if ($this->db->error()['code']) return 'Gagal mengaktifkan user lama: '.$this->db->error()['message'];
            $user_id = $old_user->id;
        } else {
            $this->db->insert('priv_t_user', $user);
            if ($this->db->error()['code']) return 'Gagal membuat user: '.$this->db->error()['message'];
            $user_id = $this->db->insert_id();
        }
        $email_error = $this->send_password_email($r, $satker, $password);
        $this->db->where('id',$r->id)->update('app_t_registrasi_kpa', array(
            'satker_kode'=>$satker,
            'status'=>'disetujui',
            'password_plain'=>$password,
            'approved_user_id'=>$user_id,
            'approved_at'=>$now,
            'approved_by'=>$this->session->userdata('username'),
            'email_sent_at'=>$email_error ? null : $now,
            'email_error'=>$email_error,
            'updated_at'=>$now
        ));
        return 'Berhasil approve satker '.$satker.($email_error ? ' tetapi email gagal: '.$email_error : ' dan email password terkirim.');
    }

    private function active_operator_exists($satker) {
        if (!$satker) return false;
        return $this->db->from('priv_t_user')->where('username',$satker)->where('ldeleted',0)->count_all_results() > 0;
    }

    private function extract_satker_code($label) {
        if (preg_match('/^([0-9A-Za-z]+)\s*-/', (string)$label, $m)) return $m[1];
        return null;
    }

    private function generate_password() {
        $chars='ABCDEFGHJKLMNPQRSTUVWXYZabcdefghijkmnopqrstuvwxyz23456789';
        $p=''; for($i=0;$i<10;$i++) $p.=$chars[random_int(0, strlen($chars)-1)];
        return $p;
    }

    private function send_password_email($r, $satker, $password) {
        $mail = $this->get_mail_config_from_sysparam();
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => ($mail['smtpsecure'] === 'ssl' && strpos($mail['smtphost'], 'ssl://') !== 0) ? 'ssl://'.$mail['smtphost'] : $mail['smtphost'],
            'smtp_user' => $mail['smtpuser'],
            'smtp_pass' => $mail['smtppasswd'],
            'smtp_port' => (int)$mail['smtpport'],
            'smtp_crypto' => $mail['smtpsecure'] === 'ssl' ? '' : $mail['smtpsecure'],
            'mailtype' => 'html',
            'charset' => 'UTF-8',
            'newline' => "\r\n",
            'crlf' => "\r\n",
            'wordwrap' => TRUE,
        );
        $this->email->initialize($config);
        $this->email->clear(true);
        $this->email->from($mail['smtpuser'], 'Siperben');
        $this->email->to($r->email);
        $this->email->subject('Akun Operator Siperben Disetujui');
        $msg = '<p>Yth. '.html_escape($r->nama_lengkap).',</p>';
        $msg .= '<p>Registrasi operator Siperben untuk satker <strong>'.html_escape($r->satuan_kerja).'</strong> telah disetujui.</p>';
        $msg .= '<p>Username/Kode Satker: <strong>'.html_escape($satker).'</strong><br>Password: <strong>'.html_escape($password).'</strong></p>';
        $msg .= '<p>Silakan login dan segera ubah password setelah masuk.</p>';
        $this->email->message($msg);
        if (!$this->email->send(false)) return strip_tags($this->email->print_debugger(array('headers')));
        return null;
    }

    private function get_mail_config_from_sysparam() {
        $keys = array('smtphost','smtpuser','smtppasswd','smtpport','smtpsecure','smtpauth');
        $rows = $this->db->where_in('ckode', $keys)->where('ldeleted', 0)->get('sysparam')->result();
        $config = array(
            'smtphost' => '',
            'smtpuser' => '',
            'smtppasswd' => '',
            'smtpport' => '465',
            'smtpsecure' => 'ssl',
            'smtpauth' => 'TRUE',
        );
        foreach ($rows as $row) {
            $config[trim($row->ckode)] = $this->clean_sysparam_value($row->visi);
        }
        return $config;
    }

    private function clean_sysparam_value($value) {
        $value = trim((string)$value);
        if (strlen($value) >= 2 && $value[0] === '"' && substr($value, -1) === '"') {
            $decoded = json_decode($value);
            if (is_string($decoded)) return $decoded;
            return trim($value, '"');
        }
        return $value;
    }

    private function ensure_login() {
        if (!$this->session->userdata('logged_in')) redirect('privileges/user_authentication');
    }
    private function flash_back($msg) { $this->session->set_flashdata('approval_msg',$msg); redirect('privileges/approval_pengguna'); }
}
