<?php
$CI =&get_instance();
if ( $list != '' ) {
	$controller = strtolower($controller);
?>
<div class="panel-heading"  onclick="$('#<?=$controller;?>-panel-body-list').toggle();">
	<div class="row">
		<div class="col-xs-12 col-md-12 text-left">
			<b>Daftar <?=$title;?></b>&nbsp;<span id='<?=$controller?>_extra_info'></span>
		</div>
	</div>
</div>
<div class="panel-body" id="<?=$controller;?>-panel-body-list">

    <!-- pagination -->
	<div id='<?=$controller;?>_paging-table-data'></div>
	<!-- pagination -->
	
	<div class="clearfix"></div>

	<div style='overflow-x: auto;'>
		<form id='<?=$controller;?>_list-edit'>
			
			<table class='table table-responsive table-bordered table-hover table-condensed' width='100%'>
				<thead>
				  <tr class='active'>
					<th>Action</th>
				  	<?php foreach($list as $key=>$value) {?>
				  	    <?php
				  	        if ( $key != 'No.' && $value['free'] != 1 ) {?>				  	        
    				  		    <th onclick="ordering('<?=base_url().$CI->router->fetch_module();?>/<?=$controller;?>/lists', '<?=$controller;?>', '<?=$key;?>');"><?=$value['alias'];?></th>
        			    <?php
        			        } else {
        			    ?>
    				  		    <th><?=$value['alias'];?></th>
				  	<?php } }?>
				  </tr>
			   </thead>
			   <tbody id='<?=$controller;?>_table-data'>
				
			  </tbody>
			</table>
		</form>
	</div>
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
<script type='text/javascript'>
$(document).ready(function() {
	$('#<?=$controller;?>-panel-body-form').toggle();
	reload_grid("<?=base_url().$CI->router->fetch_module().'/'.$controller;?>/lists", '<?=$controller;?>');
});
</script>
<?php } ?>
