-- =====================================================================
-- Migration: Add Performance Indexes for SIPERBEN (db_app01)
-- File: db/migrations/20260814_01_add_performance_indexes.sql
-- Date: 2026-08-14
-- Purpose: Mengoptimalkan performa pencarian master pegawai, rekening sprint, cluster rekening, dan registrasi
-- =====================================================================

-- ---------------------------------------------------------------------
-- 1. Index untuk filter unit kerja (ikduker) pada tabel master pegawai
-- Dampak: Menghilangkan Full Table Scan (123k+ baris) saat query filter perbendaharaan & dashboard
-- ---------------------------------------------------------------------
SET @exist := (
    SELECT COUNT(*) 
    FROM information_schema.statistics 
    WHERE table_schema = DATABASE() 
      AND table_name = 'kepeg_m_pegawai' 
      AND index_name = 'idx_ikduker'
);
SET @sqlstmt := IF(@exist > 0, 'SELECT "Index idx_ikduker already exists"', 'ALTER TABLE `kepeg_m_pegawai` ADD INDEX `idx_ikduker` (`ikduker`)');
PREPARE stmt FROM @sqlstmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- ---------------------------------------------------------------------
-- 2. Index untuk kode_satker pada tabel rekening sprint
-- Dampak: Mengoptimalkan filter dan JOIN pencarian rekening satker
-- ---------------------------------------------------------------------
SET @exist := (
    SELECT COUNT(*) 
    FROM information_schema.statistics 
    WHERE table_schema = DATABASE() 
      AND table_name = 'app_t_rekening_sprint' 
      AND index_name = 'idx_kode_satker'
);
SET @sqlstmt := IF(@exist > 0, 'SELECT "Index idx_kode_satker already exists"', 'ALTER TABLE `app_t_rekening_sprint` ADD INDEX `idx_kode_satker` (`kode_satker`)');
PREPARE stmt FROM @sqlstmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- ---------------------------------------------------------------------
-- 3. Index untuk tipe_id pada tabel cluster rekening
-- Dampak: Mengoptimalkan filter mapping tipe/cluster rekening
-- ---------------------------------------------------------------------
SET @exist := (
    SELECT COUNT(*) 
    FROM information_schema.statistics 
    WHERE table_schema = DATABASE() 
      AND table_name = 'app_m_cluster_rekening' 
      AND index_name = 'idx_tipe_id'
);
SET @sqlstmt := IF(@exist > 0, 'SELECT "Index idx_tipe_id already exists"', 'ALTER TABLE `app_m_cluster_rekening` ADD INDEX `idx_tipe_id` (`tipe_id`)');
PREPARE stmt FROM @sqlstmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

-- ---------------------------------------------------------------------
-- 4. Index untuk approved_user_id pada tabel registrasi
-- Dampak: Mengoptimalkan tracking user approval registrasi
-- ---------------------------------------------------------------------
SET @exist := (
    SELECT COUNT(*) 
    FROM information_schema.statistics 
    WHERE table_schema = DATABASE() 
      AND table_name = 'app_t_registrasi' 
      AND index_name = 'idx_approved_user_id'
);
SET @sqlstmt := IF(@exist > 0, 'SELECT "Index idx_approved_user_id already exists"', 'ALTER TABLE `app_t_registrasi` ADD INDEX `idx_approved_user_id` (`approved_user_id`)');
PREPARE stmt FROM @sqlstmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
