<?php $controller = strtolower($controller);?>
<div class="panel-heading">
	<div class="row">
		<div class="col-xs-12 col-md-12 text-left">
			<b>List Data</b>
		</div>
	</div>
</div>
<div class="panel-body" id="panel-body-list">
		<!-- pagination -->
		<div id='<?=$controller;?>_paging-table-data'></div>
		<!-- pagination -->

		<div class="clearfix"></div>

		<div id='<?=$controller;?>_table-data' style='overflow-x: auto;'></div>

		<div class="clearfix"></div>
        
        
		
</div>
</div>
<script type='text/javascript'>
$(document).ready(function() {
	var link = '<?=$_GET['link'] ?? '';?>';

	if (link == 'notif_pending') {
		// Notif 1: tampilkan usulan yang sedang diajukan / belum selesai
		// Status belum selesai: 0=Draft, 1=Diajukan, 2=Verifikasi I, 3=Verifikasi II, 4=Disetujui, 6=Revisi
		if ($('#q_app_t_usulan_istatus').length) {
			$('#q_app_t_usulan_istatus').val([0, 1, 2, 3, 4, 6]).trigger('change');
		}
	} else if (link == 'notif_unggah_sk') {
		// Notif 2: tampilkan satker dengan status Proses Tanda Tangan SK (istatus = 6)
		if ($('#q_app_t_usulan_istatus').length) {
			$('#q_app_t_usulan_istatus').val([6]).trigger('change');
		}
	} else if (link != '') {
		// backward-compat: link lama (non-empty) → filter status=4
		if ($('#q_app_t_usulan_istatus').length) {
			$('#q_app_t_usulan_istatus').val([4]).trigger('change');
		}
	}

	$('#panel-body-form').toggle();
	reload_grid("<?=base_url();?>perbend/t_terbit_sk/lists", '<?=$controller;?>');
});
</script>