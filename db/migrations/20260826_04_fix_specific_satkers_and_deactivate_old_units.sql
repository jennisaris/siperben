-- =====================================================================
-- Migration: Fix Specific Satkers & Deactivate Obsolete Units (Ortal & SDM)
-- File: db/migrations/20260826_04_fix_specific_satkers_and_deactivate_old_units.sql
-- Date: 2026-08-26
-- Purpose:
-- 1. Mengaktifkan BP untuk Direktorat SMA (693232) -> 1 orang
-- 2. Mengaktifkan BP untuk Pusat Penguatan Karakter (693193) -> 1 orang
-- 3. Menonaktifkan unit lama yang sudah dilebur/tidak ada (Biro Ortal 690396 & Biro SDM 690307)
-- 4. Memindahkan seluruh data historis 690396 & 690307 ke 693189 agar 100% tersembunyi dari semua laporan
-- 5. Set date_expired = '2020-01-01' pada sub-unit expired di kepeg_m_unor untuk 693189 (Biro Ortal & Biro SDM)
-- 6. Memastikan KPA untuk Biro Organisasi dan SDM (693189) -> 1 orang (Dr. Abdullah Faqih, M.A., M.Ed)
-- =====================================================================

-- 1. Direktorat SMA (693232) BP
UPDATE app_t_usulan_pegawai SET isnonaktif = 1 WHERE ckduker = '693232' AND ijabid2 = 2;
UPDATE app_t_usulan_pegawai SET isnonaktif = 0 WHERE id = 19258;

-- 2. Pusat Penguatan Karakter (693193) BP
UPDATE app_t_usulan_pegawai SET isnonaktif = 1 WHERE ckduker = '693193' AND ijabid2 = 2;
UPDATE app_t_usulan_pegawai SET isnonaktif = 0 WHERE id = 19875;

-- 3. Migrasi Data Historis & Penonaktifan Total Unit Lama (690396 & 690307)
UPDATE kepeg_m_pegawai SET ckduker2 = '693189' WHERE ckduker2 IN ('690396', '690307');
UPDATE kepeg_m_pegawai SET ckduker = '693189' WHERE ckduker IN ('690396', '690307');
UPDATE app_m_unor_rekening SET kode_satker = '693189' WHERE kode_satker IN ('690396', '690307');
UPDATE app_t_rekening_sprint SET kode_satker = '693189', nama_satker = 'BIRO ORGANISASI DAN SUMBER DAYA MANUSIA' WHERE kode_satker IN ('690396', '690307');
UPDATE IGNORE app_t_usulan SET iunorid = '693189' WHERE iunorid IN ('690396', '690307');
UPDATE app_t_usulan_pegawai SET ckduker = '693189' WHERE ckduker IN ('690396', '690307');
UPDATE IGNORE app_t_usulan_sk SET iunorid = '693189' WHERE iunorid IN ('690396', '690307');

UPDATE app_m_unor SET deleted = 1 WHERE kode IN ('690396', '690307') OR id IN (7, 8);
UPDATE priv_t_user SET ldeleted = 1 WHERE username IN ('690396', '690307');
UPDATE priv_t_user SET kode_lama = '693189' WHERE username = '693189';

-- 4. Exspire Obsolete Sub-Units in kepeg_m_unor for 693189
UPDATE kepeg_m_unor 
SET date_expired = '2020-01-01' 
WHERE kode_satker = '693189' 
  AND nama IN ('Biro Sumber Daya Manusia', 'Biro Organisasi dan Tata Laksana');

-- 5. Biro Organisasi dan SDM (693189) KPA -> Dr. Abdullah Faqih, M.A., M.Ed
UPDATE app_t_usulan_pegawai SET isnonaktif = 1 WHERE ckduker = '693189' AND ijabid2 IN (1, 6);
UPDATE app_t_usulan_pegawai SET isnonaktif = 0 WHERE id = 21549;
