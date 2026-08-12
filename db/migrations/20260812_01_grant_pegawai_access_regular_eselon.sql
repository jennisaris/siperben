-- Grant access to Master Data -> Kepegawaian -> Pegawai
-- for Reguler User and Eselon I.
--
-- This keeps write permissions unchanged on existing rows and only ensures
-- view access is enabled for the parent menu path and the Pegawai menu.

INSERT INTO priv_t_menu_group_privileges (
  igroupid,
  imenuid,
  iallowview,
  iallowadd,
  iallowedit,
  iallowdelete,
  tcreated,
  ccreatedby,
  tupdated,
  cupdatedby
)
SELECT
  g.id,
  m.id,
  1,
  0,
  0,
  0,
  CURRENT_TIMESTAMP,
  'migration',
  CURRENT_TIMESTAMP,
  'migration'
FROM priv_t_group g
CROSS JOIN priv_t_menu m
WHERE g.ldeleted = 0
  AND (
    g.vname IN ('Reguler User', 'Eselon I')
    OR g.vdesc IN ('Reguler User', 'Eselon I')
  )
  AND m.ldeleted = 0
  AND m.cmenucode IN (
    'Master',
    'Master/Kepegawaian',
    'Master/Kepegawaian/Pegawai'
  )
ON DUPLICATE KEY UPDATE
  iallowview = 1,
  tupdated = CURRENT_TIMESTAMP,
  cupdatedby = 'migration';
