-- =====================================================================
-- Migration: Grant Master Pegawai Access to Satker Role (Group 4 & 12)
-- File: db/migrations/20260820_01_grant_satker_m_pegawai_access.sql
-- Date: 2026-08-20
-- Purpose: Membuka akses menu Master Data -> Kepegawaian -> Pegawai untuk role Satker
-- =====================================================================

-- Group 4 (Reguler User)
UPDATE priv_t_menu_group_privileges SET iallowview = 1 WHERE igroupid = 4 AND imenuid = 74;
UPDATE priv_t_menu_group_privileges SET iallowview = 1 WHERE igroupid = 4 AND imenuid = 90;
UPDATE priv_t_menu_group_privileges SET iallowview = 1, iallowadd = 1, iallowedit = 1 WHERE igroupid = 4 AND imenuid = 75;

-- Group 12 (Operator)
UPDATE priv_t_menu_group_privileges SET iallowview = 1 WHERE igroupid = 12 AND imenuid = 74;
UPDATE priv_t_menu_group_privileges SET iallowview = 1 WHERE igroupid = 12 AND imenuid = 90;
UPDATE priv_t_menu_group_privileges SET iallowview = 1, iallowadd = 1, iallowedit = 1 WHERE igroupid = 12 AND imenuid = 75;
