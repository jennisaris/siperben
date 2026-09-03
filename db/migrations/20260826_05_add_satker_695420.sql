-- =====================================================================
-- Migration: Add New Satker 695420 under Ditjen Paudasmen (13804)
-- File: db/migrations/20260826_05_add_satker_695420.sql
-- Date: 2026-08-26
-- Purpose: Menambahkan Satker Baru 695420 (Balai Layanan Tata Kelola Sumber Daya Satuan Pendidikan)
--          di bawah Unit Utama Direktorat Jenderal Pendidikan Dasar dan Menengah (13804)
-- =====================================================================

INSERT IGNORE INTO app_m_unor (kode, kode_atasan, nama, deleted, created, createdby) 
VALUES ('695420', '13804', 'BALAI LAYANAN TATA KELOLA SUMBER DAYA SATUAN PENDIDIKAN', 0, NOW(), 'admin');

INSERT IGNORE INTO kepeg_m_unor (kode, nama, kode_satker, tcreated, ccreatedby) 
VALUES ('695420', 'BALAI LAYANAN TATA KELOLA SUMBER DAYA SATUAN PENDIDIKAN', '695420', NOW(), 'admin');

INSERT IGNORE INTO priv_t_user (username, password, realname, ldeleted, tcreated, ccreatedby, igroupid, ctahun, kode_lama) 
VALUES ('695420', '$2y$12$ol1XhVfD5k.jvlNipOfW9eROiigmauMyLkbRcOLJ.me86S0wUF6JG', 'BALAI LAYANAN TATA KELOLA SUMBER DAYA SATUAN PENDIDIKAN', 0, NOW(), 'admin', 4, '2025', '695420');
