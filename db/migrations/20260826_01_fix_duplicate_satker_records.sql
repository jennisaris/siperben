-- =====================================================================
-- Migration: Fix Duplicate Satker Records in app_m_unor
-- File: db/migrations/20260826_01_fix_duplicate_satker_records.sql
-- Date: 2026-08-26
-- Purpose: Menandai deleted = 1 pada record satker duplikat/redundat di app_m_unor
-- =====================================================================

UPDATE app_m_unor 
SET deleted = 1 
WHERE id IN (466, 467, 468, 469, 470, 471);
