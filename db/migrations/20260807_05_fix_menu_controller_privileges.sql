-- Fix menu controller path for Progres Usulan (Sedang Diproses)
UPDATE priv_t_menu 
SET cmenucontroller = 'perbend/progress_usulan_satker' 
WHERE id = 128 OR cmenucontroller = 'perbend/progress_usulan_satker/progres_proses';
