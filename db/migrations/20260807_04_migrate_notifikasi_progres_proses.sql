-- =============================================================================
-- MIGRATION SCRIPT FOR HERMES / PRODUCTION DEPLOYMENT: NOTIFIKASI PROGRES PROSES
-- App: SIPERBEN (Kementerian Pendidikan Dasar dan Menengah)
-- Tanggal: 2026-08-07
-- Target DB: db_app01
-- =============================================================================

-- 1. TABEL SKEMA NOTIFIKASI SYSTEM (app_notification)
CREATE TABLE IF NOT EXISTS `app_notification` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usulanid` bigint(20) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `msg` text DEFAULT NULL,
  `isread` smallint(6) DEFAULT 0,
  `groupid` int(11) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `createdby` char(20) DEFAULT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updatedby` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_usulanid` (`usulanid`),
  KEY `idx_isread` (`isread`),
  KEY `idx_groupid` (`groupid`),
  KEY `idx_created` (`created`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 2. DEDICATED LOG TABEL LOG RIWAYAT PERUBAHAN PROGRES PROSES (app_t_usulan_progres_log)
CREATE TABLE IF NOT EXISTS `app_t_usulan_progres_log` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `usulanid` bigint(20) NOT NULL,
  `cnousul` varchar(100) DEFAULT NULL,
  `iunorid` varchar(50) DEFAULT NULL,
  `istatus_old` smallint(6) DEFAULT NULL,
  `istatus_new` smallint(6) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_usulanid` (`usulanid`),
  KEY `idx_cnousul` (`cnousul`),
  KEY `idx_iunorid` (`iunorid`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- 3. PENDAFTARAN MENU NOTIFIKASI PROGRES USULAN PROSES (priv_t_menu)
INSERT INTO `priv_t_menu` (`iparentid`, `cmenucode`, `cmenuname`, `cmenucontroller`, `cmenuparent`, `cmenuurut`, `ldeleted`, `tcreated`, `ccreatedby`, `tupdated`, `cupdatedby`, `cmenuicon`, `cmenuparentcode`, `cismodule`)
SELECT 1, 'Perbendaharaan/Progres_Proses', 'Progres Usulan (Sedang Diproses)', 'perbend/progress_usulan_satker/progres_proses', NULL, '02_Perbendaharaan_05_Progres_Proses', 0, NOW(), 'superadmin', CURRENT_TIMESTAMP(), 'superadmin', '<i class=\'fa fa-clock-o\'></i>', NULL, 0
WHERE NOT EXISTS (SELECT 1 FROM `priv_t_menu` WHERE `cmenucontroller` = 'perbend/progress_usulan_satker/progres_proses');

-- 4. HAK AKSES GROUP UNTUK MENU NOTIFIKASI PROGRES PROSES (priv_t_menu_group_privileges)
INSERT INTO `priv_t_menu_group_privileges` (`igroupid`, `imenuid`, `iallowview`, `iallowadd`, `iallowedit`, `iallowdelete`, `tcreated`, `ccreatedby`)
SELECT g.id, m.id, 1, 1, 1, 1, NOW(), 'superadmin'
FROM `priv_t_group` g
CROSS JOIN `priv_t_menu` m
WHERE (g.isadmin = 1 OR g.id IN (1, 2, 4))
  AND m.cmenucontroller = 'perbend/progress_usulan_satker/progres_proses'
  AND NOT EXISTS (
    SELECT 1 FROM `priv_t_menu_group_privileges` mg WHERE mg.igroupid = g.id AND mg.imenuid = m.id
  );

-- 5. POPULASI AWAL NOTIFIKASI UNTUK USULAN SEMENTARA BERJALAN (istatus NOT IN (0, 7))
INSERT INTO `app_notification` (`usulanid`, `url`, `msg`, `isread`, `groupid`, `created`, `createdby`)
SELECT 
    u.id AS usulanid,
    CONCAT('perbend/progress_usulan_satker/progres_proses?id=', u.id) AS url,
    CONCAT('Usulan SK No. ', u.cnousul, ' (Satker: ', u.iunorid, ') sedang diproses.') AS msg,
    0 AS isread,
    1 AS groupid,
    NOW() AS created,
    'system' AS createdby
FROM `app_t_usulan` u
WHERE u.ijns = 1 
  AND u.istatus NOT IN (0, 7)
  AND NOT EXISTS (
      SELECT 1 FROM `app_notification` n WHERE n.usulanid = u.id AND n.msg LIKE '%sedang diproses%'
  );
