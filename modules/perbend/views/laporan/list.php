<?php $controller = strtolower($controller);?>
<div class="panel-heading">
	<div class="row">
		<div class="col-xs-12 col-md-12 text-left">
			<b><?=$title;?></b>
		</div>
	</div>
</div>
<div class="panel-body" id="panel-body-list">
		<div id='<?=$controller;?>_table-data' style="width:100%; max-width:100%; overflow-x:auto; display:block;"></div>
		<div class="clearfix"></div>
		<div id='<?=$controller;?>_paging-table-data' style='margin-top:10px;'></div>


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
<script type='text/javascript'>
$(document).ready(function() {
	$('#panel-body-form').toggle();
	reload_grid("<?=base_url();?>perbend/<?=$controller;?>/lists", '<?=$controller;?>');
});
</script>