-- =====================================================================
-- Migration: Deduplicate Active Positions to Max 1 Active Person Per Position
-- File: db/migrations/20260826_03_deduplicate_active_positions.sql
-- Date: 2026-08-26
-- Purpose: Menonaktifkan record lama (isnonaktif = 1) untuk kombinasi (ckduker, ijabid2)
--          yang memiliki lebih dari 1 pejabat aktif, sehingga hanya menyisakan record
--          terbaru (ID tertinggi) sebagai pejabat aktif (isnonaktif = 0).
-- =====================================================================

UPDATE app_t_usulan_pegawai p
JOIN (
    SELECT ckduker, ijabid2, MAX(id) as max_id
    FROM app_t_usulan_pegawai
    WHERE isnonaktif = 0
    GROUP BY ckduker, ijabid2
    HAVING COUNT(*) > 1
) dup ON p.ckduker = dup.ckduker AND p.ijabid2 = dup.ijabid2 AND p.id < dup.max_id
SET p.isnonaktif = 1
WHERE p.isnonaktif = 0;
