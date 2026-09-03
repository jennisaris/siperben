-- =====================================================================
-- Migration: Restore Active Usulan Pegawai nonaktif Status
-- File: db/migrations/20260826_02_restore_active_usulan_pegawai_nonaktif.sql
-- Date: 2026-08-26
-- Purpose: Memulihkan isnonaktif = 0 untuk record pejabat perbendaharaan approved terkini (status 6 & 7)
--          yang sebelumnya salah ditandai nonaktif oleh bug T_terbit_sk.php
-- =====================================================================

UPDATE app_t_usulan_pegawai p
JOIN (
    SELECT MAX(p_sub.id) as max_id
    FROM app_t_usulan_pegawai p_sub
    JOIN app_t_usulan u_sub ON p_sub.iusulanid = u_sub.id
    WHERE u_sub.istatus IN (6, 7) AND p_sub.istatus2 != 2
    GROUP BY p_sub.ckduker, p_sub.ijabid2
) latest ON p.id = latest.max_id
SET p.isnonaktif = 0
WHERE p.isnonaktif = 1;
