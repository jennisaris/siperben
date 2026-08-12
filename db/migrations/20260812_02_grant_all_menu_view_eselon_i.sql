-- Grant all active menu view access to Eselon I.
--
-- Existing add/edit/delete permissions are preserved. New privilege rows are
-- created as view-only, so this exposes menus without granting write actions.

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
  AND (g.vname = 'Eselon I' OR g.vdesc = 'Eselon I')
  AND m.ldeleted = 0
ON DUPLICATE KEY UPDATE
  iallowview = 1,
  tupdated = CURRENT_TIMESTAMP,
  cupdatedby = 'migration';
