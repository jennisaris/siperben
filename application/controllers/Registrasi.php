<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
    private $upload_dir = './uploads/registrasi_kpa/';

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url','audit_log'));
        $this->load->library(array('upload','session'));
    }

    public function index() {
        $data = array(
            'errors' => array(),
            'old' => array(),
            'success' => false,
            'registration_id' => null,
            'satker_options' => $this->get_satker_options(),
            'golongan_options' => $this->get_golongan_options(),
        );

        if ($this->input->method(TRUE) === 'POST') {
            $result = $this->handle_submit();
            if (!empty($result['success'])) {
                log_activity('SUBMIT_REGISTRASI', 'Registrasi', 'Registrasi operator baru dikirim ID #' . $result['registration_id']);
                $this->session->set_flashdata('registrasi_success', 'Registrasi berhasil dikirim. Silakan tunggu approval admin. Password akan dikirim ke email setelah disetujui.');
                redirect(base_url().'privileges/user_authentication?registrasi=success');
                return;
            }
            $data = array_merge($data, $result);
        }

        $this->load->view('registrasi/form', $data);
    }

    private function get_satker_options() {
        return $this->db
            ->select("kode, kode_atasan, nama, CONCAT(kode, ' - ', nama) AS label", FALSE)
            ->from('app_m_unor')
            ->where('kode_atasan LIKE', '138%')
            ->where('nama IS NOT NULL', null, false)
            ->where('nama <>', '')
            ->where('(deleted IS NULL OR deleted = 0)', null, false)
            ->group_by(array('kode', 'kode_atasan', 'nama'))
            ->order_by('kode', 'ASC')
            ->get()
            ->result_array();
    }

    private function get_golongan_options() {
        return $this->db
            ->select('id, nama, nama2, pangkat')
            ->from('kepeg_m_golongan')
            ->order_by('id', 'ASC')
            ->get()
            ->result_array();
    }

    private function handle_submit() {
        $old = array(
            'nip' => trim((string)$this->input->post('nip', TRUE)),
            'nama_lengkap' => trim((string)$this->input->post('nama_lengkap', TRUE)),
            'satuan_kerja' => trim((string)$this->input->post('satuan_kerja', TRUE)),
            'pangkat_golongan' => trim((string)$this->input->post('pangkat_golongan', TRUE)),
            'no_hp' => trim((string)$this->input->post('no_hp', TRUE)),
            'email' => trim((string)$this->input->post('email', TRUE)),
        );

        $errors = array();
        if (!preg_match('/^[0-9]{18}$/', $old['nip'])) {
            $errors[] = 'NIP wajib 18 digit angka.';
        }
        if ($old['nama_lengkap'] === '') $errors[] = 'Nama Lengkap wajib diisi.';
        if (!$this->satker_exists($old['satuan_kerja'])) $errors[] = 'Satuan Kerja wajib dipilih dari daftar.';
        $satker_kode = $this->extract_satker_code($old['satuan_kerja']);
        if ($satker_kode && $this->active_operator_exists($satker_kode)) {
            $errors[] = 'Satker ini sudah memiliki operator aktif. User lama harus dinonaktifkan terlebih dahulu sebelum registrasi operator baru.';
        }
        if ($satker_kode && $this->pending_registration_exists($satker_kode, $old['nip'])) {
            $errors[] = 'Masih ada registrasi operator untuk satker ini yang menunggu approval.';
        }
        if (!$this->golongan_exists($old['pangkat_golongan'])) $errors[] = 'Pangkat/Golongan wajib dipilih dari daftar.';
        if (!preg_match('/^[0-9+ .()-]{8,30}$/', $old['no_hp'])) {
            $errors[] = 'No.Hp tidak valid.';
        }
        if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'E-mail tidak valid.';
        }
        if (empty($_FILES['surat_persetujuan_kpa']['name'])) {
            $errors[] = 'Upload Surat Persetujuan KPA wajib diisi dalam format PDF.';
        }

        if (!empty($errors)) {
            return array('errors' => $errors, 'old' => $old, 'success' => false, 'registration_id' => null);
        }

        if (!is_dir($this->upload_dir)) {
            mkdir($this->upload_dir, 0755, true);
        }

        $safe_nip = preg_replace('/[^0-9]/', '', $old['nip']);
        $config = array(
            'upload_path' => $this->upload_dir,
            'allowed_types' => 'pdf',
            'max_size' => 5120,
            'encrypt_name' => TRUE,
            'file_ext_tolower' => TRUE,
        );
        $this->upload->initialize($config, TRUE);

        if (!$this->upload->do_upload('surat_persetujuan_kpa')) {
            $errors[] = strip_tags($this->upload->display_errors('', ''));
            return array('errors' => $errors, 'old' => $old, 'success' => false, 'registration_id' => null);
        }

        $file = $this->upload->data();
        $stored_name = $safe_nip . '_' . date('YmdHis') . '_' . $file['file_name'];
        $stored_path = $this->upload_dir . $stored_name;
        rename($file['full_path'], $stored_path);

        $insert = array(
            'nip' => $old['nip'],
            'nama_lengkap' => $old['nama_lengkap'],
            'satuan_kerja' => $old['satuan_kerja'],
            'satker_kode' => $satker_kode,
            'pangkat_golongan' => $old['pangkat_golongan'],
            'no_hp' => $old['no_hp'],
            'email' => $old['email'],
            'surat_persetujuan_kpa_file' => 'uploads/registrasi_kpa/' . $stored_name,
            'surat_persetujuan_kpa_original' => $file['orig_name'],
            'surat_persetujuan_kpa_mime' => $file['file_type'],
            'surat_persetujuan_kpa_size' => (int)$file['file_size'] * 1024,
            'status' => 'baru',
            'ip_address' => $this->input->ip_address(),
            'user_agent' => substr((string)$this->input->user_agent(), 0, 255),
        );
        $this->db->insert('app_t_registrasi', $insert);
        $id = $this->db->insert_id();

        return array('errors' => array(), 'old' => array(), 'success' => true, 'registration_id' => $id);
    }

    public function lengkapi_data() {
        if (empty($this->session->userdata('logged_in'))) {
            redirect('privileges/user_authentication');
            return;
        }

        $userid = $this->session->userdata('userid');
        $username = $this->session->userdata('username');

        // Cari data registrasi yang sudah ada jika ada
        $reg = $this->db
            ->from('app_t_registrasi')
            ->group_start()
                ->where('approved_user_id', $userid)
                ->or_where('satker_kode', $username)
                ->or_where('nip', $username)
            ->group_end()
            ->order_by('id', 'DESC')
            ->get()
            ->row();

        // Data default dari session / user
        $user = $this->db->where('id', $userid)->get('priv_t_user')->row();

        // Satker label default
        $satker_label = '';
        $satker_info = $this->db->where('kode', $username)->get('app_m_unor')->row();
        if ($satker_info) {
            $satker_label = $satker_info->kode . ' - ' . $satker_info->nama;
        }

        $old = array(
            'nip' => $reg ? $reg->nip : '',
            'nama_lengkap' => $reg ? $reg->nama_lengkap : ($user ? $user->realname : ''),
            'satuan_kerja' => $reg ? $reg->satuan_kerja : $satker_label,
            'pangkat_golongan' => $reg ? $reg->pangkat_golongan : '',
            'no_hp' => $reg ? $reg->no_hp : '',
            'email' => $reg ? $reg->email : ($user ? $user->email : ''),
        );

        $data = array(
            'errors' => array(),
            'old' => $old,
            'success' => false,
            'satker_options' => $this->get_satker_options(),
            'golongan_options' => $this->get_golongan_options(),
            'warning_msg' => $this->session->flashdata('registrasi_warning'),
            'reg_existing' => $reg,
        );

        if ($this->input->method(TRUE) === 'POST') {
            $result = $this->handle_submit_lengkapi($reg);
            if (!empty($result['success'])) {
                log_activity('LENGKAPI_REGISTRASI', 'Registrasi', 'Operator melengkapi biodata registrasi Satker #' . $username);
                $this->session->set_userdata('registration_completed', true);
                $this->session->set_flashdata('success_msg', 'Data registrasi operator berhasil dilengkapi. Terima kasih!');
                redirect(base_url() . 'dashboard/index');
                return;
            }
            $data = array_merge($data, $result);
        }

        $this->load->view('registrasi/form_lengkapi', $data);
    }

    private function handle_submit_lengkapi($reg_existing = null) {
        $userid = $this->session->userdata('userid');
        $username = $this->session->userdata('username');

        $old = array(
            'nip' => trim((string)$this->input->post('nip', TRUE)),
            'nama_lengkap' => trim((string)$this->input->post('nama_lengkap', TRUE)),
            'satuan_kerja' => trim((string)$this->input->post('satuan_kerja', TRUE)),
            'pangkat_golongan' => trim((string)$this->input->post('pangkat_golongan', TRUE)),
            'no_hp' => trim((string)$this->input->post('no_hp', TRUE)),
            'email' => trim((string)$this->input->post('email', TRUE)),
        );

        $errors = array();
        if (!preg_match('/^[0-9]{18}$/', $old['nip'])) {
            $errors[] = 'NIP wajib 18 digit angka.';
        }
        if ($old['nama_lengkap'] === '') $errors[] = 'Nama Lengkap wajib diisi.';
        if (!$this->satker_exists($old['satuan_kerja'])) $errors[] = 'Satuan Kerja wajib dipilih dari daftar.';
        $satker_kode = $this->extract_satker_code($old['satuan_kerja']);
        if (!$this->golongan_exists($old['pangkat_golongan'])) $errors[] = 'Pangkat/Golongan wajib dipilih dari daftar.';
        if (!preg_match('/^[0-9+ .()-]{8,30}$/', $old['no_hp'])) {
            $errors[] = 'No.Hp tidak valid.';
        }
        if (!filter_var($old['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'E-mail tidak valid.';
        }

        if (!empty($errors)) {
            return array('errors' => $errors, 'old' => $old, 'success' => false);
        }

        $stored_file_path = $reg_existing ? $reg_existing->surat_persetujuan_kpa_file : null;
        $stored_orig_name = $reg_existing ? $reg_existing->surat_persetujuan_kpa_original : null;
        $stored_mime = $reg_existing ? $reg_existing->surat_persetujuan_kpa_mime : null;
        $stored_size = $reg_existing ? $reg_existing->surat_persetujuan_kpa_size : null;

        // Upload Surat Persetujuan KPA jika ada file diunggah (OPSIONAL)
        if (!empty($_FILES['surat_persetujuan_kpa']['name'])) {
            if (!is_dir($this->upload_dir)) {
                mkdir($this->upload_dir, 0755, true);
            }
            $safe_nip = preg_replace('/[^0-9]/', '', $old['nip']);
            $config = array(
                'upload_path' => $this->upload_dir,
                'allowed_types' => 'pdf',
                'max_size' => 5120,
                'encrypt_name' => TRUE,
                'file_ext_tolower' => TRUE,
            );
            $this->upload->initialize($config, TRUE);

            if (!$this->upload->do_upload('surat_persetujuan_kpa')) {
                $errors[] = strip_tags($this->upload->display_errors('', ''));
                return array('errors' => $errors, 'old' => $old, 'success' => false);
            }

            $file = $this->upload->data();
            $stored_name = $safe_nip . '_' . date('YmdHis') . '_' . $file['file_name'];
            $stored_path = $this->upload_dir . $stored_name;
            rename($file['full_path'], $stored_path);

            $stored_file_path = 'uploads/registrasi_kpa/' . $stored_name;
            $stored_orig_name = $file['orig_name'];
            $stored_mime = $file['file_type'];
            $stored_size = (int)$file['file_size'] * 1024;
        }

        $now = date('Y-m-d H:i:s');
        $save_data = array(
            'nip' => $old['nip'],
            'nama_lengkap' => $old['nama_lengkap'],
            'satuan_kerja' => $old['satuan_kerja'],
            'satker_kode' => $satker_kode ?: $username,
            'pangkat_golongan' => $old['pangkat_golongan'],
            'no_hp' => $old['no_hp'],
            'email' => $old['email'],
            'surat_persetujuan_kpa_file' => $stored_file_path,
            'surat_persetujuan_kpa_original' => $stored_orig_name,
            'surat_persetujuan_kpa_mime' => $stored_mime,
            'surat_persetujuan_kpa_size' => $stored_size,
            'status' => 'disetujui',
            'approved_user_id' => $userid,
            'approved_at' => $now,
            'updated_at' => $now,
            'ip_address' => $this->input->ip_address(),
            'user_agent' => substr((string)$this->input->user_agent(), 0, 255),
        );

        if ($reg_existing && !empty($reg_existing->id)) {
            $this->db->where('id', $reg_existing->id)->update('app_t_registrasi', $save_data);
        } else {
            $save_data['created_at'] = $now;
            $this->db->insert('app_t_registrasi', $save_data);
        }

        // Update profil user di priv_t_user
        $this->db->where('id', $userid)->update('priv_t_user', array(
            'realname' => $old['nama_lengkap'],
            'email' => $old['email'],
            'tupdated' => $now
        ));

        return array('errors' => array(), 'old' => array(), 'success' => true);
    }

    private function satker_exists($nama) {

        if ($nama === '') return false;
        return $this->db
            ->from('app_m_unor')
            ->where("CONCAT(kode, ' - ', nama) =", $nama)
            ->where('kode_atasan LIKE', '138%')
            ->where('(deleted IS NULL OR deleted = 0)', null, false)
            ->limit(1)
            ->count_all_results() > 0;
    }

    private function extract_satker_code($label) {
        if (preg_match('/^([0-9A-Za-z]+)\s*-/', (string)$label, $m)) return $m[1];
        return null;
    }

    private function active_operator_exists($satker_kode) {
        if (!$satker_kode) return false;
        return $this->db->from('priv_t_user')->where('username', $satker_kode)->where('ldeleted', 0)->count_all_results() > 0;
    }

    private function pending_registration_exists($satker_kode, $nip) {
        if (!$satker_kode) return false;
        return $this->db
            ->from('app_t_registrasi')
            ->where('satker_kode', $satker_kode)
            ->where('nip <>', $nip)
            ->where('status', 'baru')
            ->count_all_results() > 0;
    }

    private function golongan_exists($label) {
        if ($label === '') return false;
        $rows = $this->get_golongan_options();
        foreach ($rows as $row) {
            if ($label === $this->format_golongan($row)) return true;
        }
        return false;
    }

    private function format_golongan($row) {
        $nama = trim((string)$row['nama']);
        $pangkat = trim((string)$row['pangkat']);
        return $pangkat !== '' ? $pangkat . ' (' . $nama . ')' : $nama;
    }
}
