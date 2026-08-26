<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator_registration_check {

    public function check_registration_status() {
        $CI =& get_instance();

        // 1. Skip jika pengguna belum login
        if (empty($CI->session->userdata('logged_in'))) {
            return;
        }

        // 2. Skip jika pengguna adalah Admin, Superuser, atau User Eselon I (tidak ada kewajiban input data satker)
        $isadmin = $CI->session->userdata('isadmin');
        $superuser = $CI->session->userdata('superuser');
        $username = trim((string)$CI->session->userdata('username'));
        $groupid = (string)$CI->session->userdata('groupid');

        if (!empty($isadmin) || !empty($superuser)) {
            return;
        }

        $groupids = array_filter(array_map('intval', explode(',', $groupid)));
        if (!empty($groupids)) {
            $eselon_i_group = $CI->db
                ->from('priv_t_group')
                ->where_in('id', $groupids)
                ->where('ldeleted', 0)
                ->group_start()
                    ->where('vname', 'Eselon I')
                    ->or_where('vdesc', 'Eselon I')
                ->group_end()
                ->get()
                ->row();

            if ($eselon_i_group) {
                return;
            }
        }

        // Fast-Path: Jika kedua tahap registrasi & usulan pejabat sudah tuntas di session, langsung return (0 ms overhead)
        if ($CI->session->userdata('registration_completed') === true && $CI->session->userdata('pejabat_lainnya_completed') === true) {
            return;
        }

        // Pengecekan Eselon I: jika username memiliki daftar satker anak di Excel Eselon I Map
        if (function_exists('get_excel_satkers_by_eselon') && !empty(get_excel_satkers_by_eselon($username))) {
            return;
        }

        // 3. Ambil controller dan method saat ini
        $class = strtolower((string)$CI->router->fetch_class());
        $method = strtolower((string)$CI->router->fetch_method());
        $current_route = $class . '/' . $method;

        // Route / controller dasar yang selalu diperbolehkan (auth, logout, registrasi, password, set_tahun, m_pegawai)
        $allowed_controllers = array(
            'user_authentication',
            'change_password',
            'registrasi',
            'set_tahun',
            'm_pegawai'
        );

        $allowed_routes = array(
            'registrasi/lengkapi_data',
            'registrasi/save_lengkapi',
            'user_authentication/dologout',
            'user_authentication/logout',
            'user_authentication/index',
            'user_authentication/formlogin',
            'm_pegawai/getemployee',
        );

        // --- TAHAP A: CEK KELENGKAPAN BIODATA REGISTRASI ---
        if ($CI->session->userdata('registration_completed') !== true) {
            $userid = $CI->session->userdata('userid');

            $reg = $CI->db
                ->from('app_t_registrasi')
                ->group_start()
                    ->where('approved_user_id', $userid)
                    ->or_where('satker_kode', $username)
                    ->or_where('nip', $username)
                ->group_end()
                ->where('status', 'disetujui')
                ->order_by('id', 'DESC')
                ->get()
                ->row();

            // Pangkat/Golongan wajib hanya untuk NIP (18 digit), opsional untuk NIK (16 digit)
            $is_nik_reg = ($reg && strlen(trim($reg->nip)) === 16);
            $pangkat_missing = !$is_nik_reg && empty($reg->pangkat_golongan);
            // Jika biodata registrasi belum lengkap
            if (!$reg || empty($reg->nip) || empty($reg->nama_lengkap) || empty($reg->satuan_kerja) || $pangkat_missing || empty($reg->no_hp) || empty($reg->email)) {
                if (in_array($current_route, $allowed_routes, true) || in_array($class, $allowed_controllers, true)) {
                    return;
                }

                if ($CI->input->is_ajax_request()) {
                    header('Content-Type: application/json');
                    echo json_encode(array(
                        'html' => array('html' => '<tr><td colspan="12"><div class="alert alert-warning" style="margin:10px;"><i class="fa fa-warning"></i> Mohon lengkapi data registrasi operator Anda terlebih dahulu pada halaman registrasi.</div></td></tr>'),
                        'pagination' => ''
                    ));
                    exit;
                }

                $CI->session->set_flashdata('registrasi_warning', 'Mohon lengkapi data registrasi operator Anda terlebih dahulu sebelum mengakses menu lain.');
                redirect(base_url() . 'registrasi/lengkapi_data');
                exit;
            }

            $CI->session->set_userdata('registration_completed', true);
        }

        // --- TAHAP B: CEK USULAN PEJABAT PERBENDAHARAAN LAINNYA (PPK/PPSPM/BPP/PPABP) TAHUN 2026 ---
        if ($CI->session->userdata('pejabat_lainnya_completed') === true) {
            return;
        }

        $tahun = !empty($CI->session->userdata('settahun')) ? $CI->session->userdata('settahun') : date('Y');

        // Cek database apakah Satker ini sudah memiliki data Usulan Pejabat Perbendaharaan Lainnya (ijns = 2) untuk tahun ini yang di-approve oleh admin
        $approved_usulan = $CI->db
            ->from('app_t_usulan')
            ->where('ijns', 2)
            ->where('ctahun', $tahun)
            ->group_start()
                ->where('iunorid', $username)
                ->or_where('ccreatedby', $username)
            ->group_end()
            ->where_in('istatus', array(4, 6, 7)) // Status di-approve oleh admin (Disetujui, TTD SK, Selesai)
            ->get()
            ->row();

        if ($approved_usulan) {
            $CI->session->set_userdata('pejabat_lainnya_completed', true);
            return;
        }

        // Controller / Route yang diperbolehkan saat diisi Usulan Pejabat Perbendaharaan Lainnya
        $allowed_pejabat_controllers = array(
            'm_pegawai',
            't_usulan_satker2',
            't_usulan_daftar2',
            'user_authentication',
            'change_password',
            'registrasi',
            'set_tahun'
        );

        $allowed_pejabat_routes = array(
            'm_pegawai/getemployee'
        );

        if (in_array($class, $allowed_pejabat_controllers, true) || in_array($current_route, $allowed_routes, true) || in_array($current_route, $allowed_pejabat_routes, true)) {
            return;
        }

        // Jika mencoba membuka menu lain (Dashboard, dll.), kunci & redirect kembali ke t_usulan_satker2
        if ($CI->input->is_ajax_request()) {
            header('Content-Type: application/json');
            echo json_encode(array(
                'html' => array('html' => '<tr><td colspan="12"><div class="alert alert-warning" style="margin:10px;"><i class="fa fa-warning"></i> Akses dibatasi. Selesaikan usulan pejabat perbendaharaan lainnya terlebih dahulu.</div></td></tr>'),
                'pagination' => '',
                'status' => false,
                'msg' => 'Akses dibatasi. Selesaikan usulan pejabat perbendaharaan lainnya terlebih dahulu.'
            ));
            exit;
        }

        $CI->session->set_flashdata('pejabat_warning', 'Akses dibatasi. Selesaikan usulan pejabat perbendaharaan lainnya terlebih dahulu.');
        redirect(base_url() . 'perbend/t_usulan_satker2');
        exit;
    }
}
