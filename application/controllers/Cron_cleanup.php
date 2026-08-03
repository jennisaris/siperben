<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cron_cleanup extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Hanya izinkan eksekusi via CLI atau oleh Superadmin di web session
        if (!is_cli()) {
            $this->load->library('session');
            $is_admin = (!empty($this->session->isadmin) || !empty($this->session->superuser) || (isset($this->session->groupid) && $this->session->groupid == 1));
            if (!$is_admin) {
                show_error('Akses ditolak. Perintah ini hanya dapat dijalankan via CLI atau Superadmin.', 403);
            }
        }
    }

    /**
     * Hapus usulan status Draft (istatus = 0) yang tidak diproses / diubah > 3 hari
     * 
     * Jalankan via CLI:
     * php index.php cron_cleanup clean_expired_drafts
     */
    public function clean_expired_drafts() {
        $days = 3;
        echo "[" . date('Y-m-d H:i:s') . "] Memulai proses pembersihan usulan Draft terabaikan (> {$days} hari)...\n";

        // Ambil data usulan Draft yang tidak diupdate > 3 hari
        $sql = "SELECT id, cnousul, iunorid, tcreated, tupdated 
                FROM app_t_usulan 
                WHERE istatus = 0 
                  AND COALESCE(tupdated, tcreated) < (NOW() - INTERVAL ? DAY)";
        
        $expired_usulan = $this->db->query($sql, array($days))->result();

        if (empty($expired_usulan)) {
            echo "[" . date('Y-m-d H:i:s') . "] Tidak ada usulan Draft kadaluarsa yang perlu dibersihkan.\n";
            return;
        }

        $total = count($expired_usulan);
        $usulan_ids = array();

        foreach ($expired_usulan as $u) {
            $usulan_ids[] = $u->id;
            $last_active = !empty($u->tupdated) ? $u->tupdated : $u->tcreated;
            echo "  [DELETING] Usulan ID: {$u->id} | NoUsul: {$u->cnousul} | Satker: {$u->iunorid} | Terakhir Aktif: {$last_active}\n";
        }

        // 1. Hapus data pegawai terkait di app_t_usulan_pegawai
        $this->db->where_in('iusulanid', $usulan_ids);
        $this->db->delete('app_t_usulan_pegawai');
        $deleted_pegawai = $this->db->affected_rows();

        // 2. Hapus data utama di app_t_usulan
        $this->db->where_in('id', $usulan_ids);
        $this->db->delete('app_t_usulan');
        $deleted_usulan = $this->db->affected_rows();

        echo "[" . date('Y-m-d H:i:s') . "] SUKSES: Berhasil menghapus {$deleted_usulan} usulan Draft dan {$deleted_pegawai} data pegawai terkait.\n";
    }
}
