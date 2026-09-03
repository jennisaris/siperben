-- Migration: Fix missing kode_satker in kepeg_m_unor for LLDIKTI IV, VI, XV, XVI
UPDATE kepeg_m_unor SET kode_satker = '723012' WHERE id = 13019;
UPDATE kepeg_m_unor SET kode_satker = '723014' WHERE id = 13021;
UPDATE kepeg_m_unor SET kode_satker = '723023' WHERE id = 14781;
UPDATE kepeg_m_unor SET kode_satker = '723024' WHERE id = 14780;
UPDATE kepeg_m_unor SET kode_satker = '723012' WHERE id = 12495;
UPDATE kepeg_m_unor SET kode_satker = '723014' WHERE id = 12556;
UPDATE kepeg_m_unor SET kode_satker = '723023' WHERE id = 14778;
UPDATE kepeg_m_unor SET kode_satker = '723024' WHERE id = 14779;
