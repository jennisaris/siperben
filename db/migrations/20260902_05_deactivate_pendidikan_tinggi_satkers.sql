-- =====================================================================
-- Migration: Deactivate Pendidikan Tinggi Satkers (Kemendikdasmen 138 Only)
-- File: db/migrations/20260902_05_deactivate_pendidikan_tinggi_satkers.sql
-- Date: 2026-09-02
-- Purpose: Menonaktifkan satker Pendidikan Tinggi (PTN, Politeknik, LLDIKTI)
--          sehingga hanya Kementerian Pendidikan Dasar dan Menengah (Kode 138) yang aktif
-- =====================================================================

-- 1. Nonaktifkan satker/unit non-138 di app_m_unor
UPDATE app_m_unor SET deleted = 1 WHERE kode != '138' AND (kode_atasan IS NULL OR (kode_atasan != '138' AND kode_atasan NOT LIKE '138%'));

-- 2. Set date_expired pada kepeg_m_unor untuk unit Pendidikan Tinggi (id_atasan 1628, 14988, 15006)
UPDATE kepeg_m_unor SET date_expired = '2024-12-31' WHERE (id_atasan IN (1628, 14988, 15006) OR id IN (1628, 14988, 15006));

-- 3. Nonaktifkan akun satker Pendidikan Tinggi di priv_t_user agar tidak dapat login
UPDATE priv_t_user SET ldeleted = 1 
WHERE username IN (SELECT kode FROM app_m_unor WHERE deleted = 1) 
  AND username NOT IN (SELECT kode FROM app_m_unor WHERE deleted = 0)
  AND username NOT LIKE '138%'
  AND username NOT IN ('superadmin', 'admin')
  AND igroupid NOT IN (1, 3, 6, 7, 14);
