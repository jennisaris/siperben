-- =============================================================================
-- MIGRATION SCRIPT FOR HERMES / PRODUCTION DEPLOYMENT: APPROVAL REGISTRASI
-- App: SIPERBEN (Kementerian Pendidikan Dasar dan Menengah)
-- Tanggal: 2026-08-04
-- =============================================================================

-- 1. TABEL UTAMA REGISTRASI OPERATOR MANDIRI (app_t_registrasi)
CREATE TABLE IF NOT EXISTS `app_t_registrasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `satker_kode` varchar(50) DEFAULT NULL,
  `satuan_kerja` varchar(255) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `pangkat_golongan` varchar(100) DEFAULT NULL,
  `no_hp` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `surat_persetujuan_kpa` varchar(255) DEFAULT NULL,
  `surat_persetujuan_kpa_file` varchar(255) DEFAULT NULL,
  `surat_persetujuan_kpa_original` varchar(255) DEFAULT NULL,
  `status` enum('baru','disetujui','ditolak') NOT NULL DEFAULT 'baru',
  `catatan` text DEFAULT NULL,
  `password_plain` varchar(100) DEFAULT NULL,
  `approved_user_id` int(11) DEFAULT NULL,
  `approved_by` varchar(100) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `rejected_by` varchar(100) DEFAULT NULL,
  `rejected_at` datetime DEFAULT NULL,
  `email_sent_at` datetime DEFAULT NULL,
  `email_error` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_satker_kode` (`satker_kode`),
  KEY `idx_status` (`status`),
  KEY `idx_nip` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. TABEL CATATAN AUDIT TRAIL AKTIVITAS (app_t_audit_log)
CREATE TABLE IF NOT EXISTS `app_t_audit_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `action` varchar(100) NOT NULL,
  `controller` varchar(100) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_username` (`username`),
  KEY `idx_action` (`action`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. PENDAFTARAN MENU APPROVAL REGISTRASI (priv_t_menu)
INSERT INTO `priv_t_menu` (`id`, `iparentid`, `cmenucode`, `cmenuname`, `cmenucontroller`, `cmenuparent`, `cmenuurut`, `ldeleted`, `tcreated`, `ccreatedby`, `tupdated`, `cupdatedby`, `cmenuicon`, `cmenuparentcode`, `cismodule`)
SELECT 127, 1, 'Hak Akses/Approval_Pengguna', 'Approval Registrasi', 'privileges/approval_pengguna', NULL, '01_Hak_Akses_04_Approval', 0, NOW(), 'superadmin', CURRENT_TIMESTAMP(), 'superadmin', '<i class=\'fa fa-user-plus\'></i>', NULL, 0
WHERE NOT EXISTS (SELECT 1 FROM `priv_t_menu` WHERE `cmenucontroller` = 'privileges/approval_pengguna');

-- 4. HAK AKSES GROUP ADMIN / SUPERADMIN (priv_t_menu_group_privileges)
INSERT INTO `priv_t_menu_group_privileges` (`igroupid`, `imenuid`, `allowview`, `allowadd`, `allowedit`, `allowdelete`, `tcreated`, `ccreatedby`)
SELECT g.id, 127, 1, 1, 1, 1, NOW(), 'superadmin'
FROM `priv_t_group` g
WHERE (g.isadmin = 1 OR g.id IN (1, 2, 4))
  AND NOT EXISTS (
    SELECT 1 FROM `priv_t_menu_group_privileges` mg WHERE mg.igroupid = g.id AND mg.imenuid = 127
  );
