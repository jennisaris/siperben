-- Migration: Delete Usulan Data with Draft Status (istatus = 0)
-- Date: 2026-08-07

START TRANSACTION;

-- 1. Hapus data detail pegawai terkait usulan draft
DELETE FROM app_t_usulan_pegawai 
WHERE iusulanid IN (
    SELECT id FROM app_t_usulan WHERE istatus = 0
);

-- 2. Hapus data induk usulan berstatus draft
DELETE FROM app_t_usulan 
WHERE istatus = 0;

COMMIT;
