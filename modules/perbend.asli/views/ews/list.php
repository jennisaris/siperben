<?php $controller2='ews';?>
<div class="container-fluid">
	<div class="row">
	<div class="panel-body" id="panel-body-list">
			<!-- pagination -->
			<div id='<?=$controller2;?>_paging-table-data'></div>
			<!-- pagination -->

			<div class="clearfix"></div>

			<div id='<?=$controller2;?>_table-data' style='overflow-x: auto;'></div>

			<div class="clearfix"></div>
			
			<div class="pull-right">
		<?php 
			$buttons = "";
			foreach($button_add as $b) {
				$buttons .= $b.'&nbsp;';
			} 
			
			echo $buttons;
			?>
	</div>
			
	</div>
	</div>
</div>
<script type='text/javascript'>
$(document).ready(function() {
	reload_grid("<?=base_url();?>perbend/ews/lists", '<?=$controller2;?>');
});
</script>