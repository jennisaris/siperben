<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Operator_registration_check {

    public function check_registration_status() {
        $CI =& get_instance();

        // 1. Skip jika pengguna belum login
        if (empty($CI->session->userdata('logged_in'))) {
            return;
        }

        // 2. Skip jika pengguna adalah Admin atau Superuser
        $isadmin = $CI->session->userdata('isadmin');
        $superuser = $CI->session->userdata('superuser');
        if (!empty($isadmin) || !empty($superuser)) {
            return;
        }

        // 3. Ambil controller dan method saat ini
        $class = strtolower((string)$CI->router->fetch_class());
        $method = strtolower((string)$CI->router->fetch_method());
        $current_route = $class . '/' . $method;

        // Route / controller yang diperbolehkan diakses walaupun registrasi belum lengkap
        $allowed_routes = array(
            'registrasi/lengkapi_data',
            'registrasi/save_lengkapi',
            'user_authentication/dologout',
            'user_authentication/logout',
            'user_authentication/index',
            'user_authentication/formlogin',
        );

        $allowed_controllers = array(
            'user_authentication',
            'change_password'
        );

        if (in_array($current_route, $allowed_routes, true) || in_array($class, $allowed_controllers, true)) {
            return;
        }

        // 4. Cek apakah status registrasi sudah terverifikasi di session
        if ($CI->session->userdata('registration_completed') === true) {
            return;
        }

        // 5. Cek database tabel app_t_registrasi
        $userid = $CI->session->userdata('userid');
        $username = $CI->session->userdata('username');

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

        // Jika data terdaftar dengan status disetujui dan 6 kolom biodata utama lengkap
        if ($reg && !empty($reg->nip) && !empty($reg->nama_lengkap) && !empty($reg->satuan_kerja) && !empty($reg->pangkat_golongan) && !empty($reg->no_hp) && !empty($reg->email)) {
            $CI->session->set_userdata('registration_completed', true);
            return;
        }

        // 6. Jika belum lengkap, arahkan ke registrasi/lengkapi_data
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
}
