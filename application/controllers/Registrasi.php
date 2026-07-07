<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
    private $upload_dir = './uploads/registrasi_kpa/';

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->helper(array('url'));
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
        $this->db->insert('app_t_registrasi_kpa', $insert);
        $id = $this->db->insert_id();

        return array('errors' => array(), 'old' => array(), 'success' => true, 'registration_id' => $id);
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
            ->from('app_t_registrasi_kpa')
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
