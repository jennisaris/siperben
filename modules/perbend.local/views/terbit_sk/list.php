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
	var link = '<?=$_GET['link'];?>';
	if (link !='' ) $('#q_app_t_usulan_istatus').val([4]).trigger('change');
	$('#panel-body-form').toggle();
	reload_grid("<?=base_url();?>perbend/t_terbit_sk/lists", '<?=$controller;?>');
});
</script>