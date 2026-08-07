-- =============================================================================
-- Migration: 20260807_01_alter_kepeg_m_pegawai_add_cert_dates.sql
-- Purpose  : Adding certification & expiration date fields to kepeg_m_pegawai
-- Target DB: db_app01
-- =============================================================================

-- 1. Tanggal Sertifikat & Kadaluarsa Bendahara (BNT)
ALTER TABLE `kepeg_m_pegawai` ADD COLUMN IF NOT EXISTS `dtgltbnt` DATE NULL COMMENT 'Tanggal Sertifikat Bendahara';
ALTER TABLE `kepeg_m_pegawai` ADD COLUMN IF NOT EXISTS `dtglkbnt` DATE NULL COMMENT 'Tanggal Kadaluarsa Bendahara';

-- 2. Tanggal Sertifikat & Kadaluarsa PPK (PNT)
ALTER TABLE `kepeg_m_pegawai` ADD COLUMN IF NOT EXISTS `dtgltpnt` DATE NULL COMMENT 'Tanggal Sertifikat PPK';
ALTER TABLE `kepeg_m_pegawai` ADD COLUMN IF NOT EXISTS `dtglkpnt` DATE NULL COMMENT 'Tanggal Kadaluarsa PPK';

-- 3. Tanggal Sertifikat & Kadaluarsa PPSPM (SNT)
ALTER TABLE `kepeg_m_pegawai` ADD COLUMN IF NOT EXISTS `dtgltsnt` DATE NULL COMMENT 'Tanggal Sertifikat PPSPM';
ALTER TABLE `kepeg_m_pegawai` ADD COLUMN IF NOT EXISTS `dtglksnt` DATE NULL COMMENT 'Tanggal Kadaluarsa PPSPM';

-- 4. Tanggal Sertifikat & Kadaluarsa Utama
ALTER TABLE `kepeg_m_pegawai` ADD COLUMN IF NOT EXISTS `dtglsertifikat` DATE NULL COMMENT 'Tanggal Sertifikat Utama';
ALTER TABLE `kepeg_m_pegawai` ADD COLUMN IF NOT EXISTS `dtglkadaluarsa` DATE NULL COMMENT 'Tanggal Kadaluarsa Utama';
