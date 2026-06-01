<?php
$CI =&get_instance();
$controller = strtolower($controller);
?>
<div class="<?=$controller;?>" style='' id='<?=$controller;?>'>
	<?php if ($search['totunhide'] != 0 ) {?>
	<?php if ( $search != '' ) {?>
	<?php if ($view_search == '' ) {?>
		<div class="panel panel-default" id='<?=$controller;?>-panel-default-search'>
    	<?php require_once "search.php";?>
    	<?php } else {?>
		<div class="panel panel-default" id='<?=$controller;?>-panel-default-search'>
		<?php $CI->load->view($view_search);}?>
    </div>
    <?php } ?>
    <?php } else {?>
	
	<form id='<?=$controller;?>_form_search' onsubmit="$('#<?=$controller;?>_btn_search').click();return false;" class='form-horizontal'>
		<?php 
			foreach($search as $s) {
				if ( $s['hide'] == TRUE && $s['label'] != '' ) {
					echo $s['crit'];
				}
			}
		?>
	</form>
	<?php }?>
	
    <?php if ( $list != '' ) {?>
    	<?php if ($view_list == '' ) {?>
			<div class="panel panel-default" id='<?=$controller;?>-panel-default-list'>
    		<?php require_once "list.php";?>
    	<?php } else {?>
		<div class="panel panel-default" id='<?=$controller;?>-panel-default-list'>
		<?php $CI->load->view($view_list);}?>
    </div>
    <?php } ?>

	<?php /*<div id='<?=$controller;?>-panel-default-form'></div>*/?>
	<?php if ( $form != '' ) {?>
    	<?php if ($view_form == '' ) {?>
			<div id='<?=$controller;?>-panel-default-form' style='display:none;'>
    		<?php require_once "form.php";?>
    	<?php } else {?>
		<div id='<?=$controller;?>-panel-default-form' style='display:none;'>
		<?php $CI->load->view($view_form);}?>
    </div>
    <?php } ?>

  <!--<div id='panel-default-view'></div>-->

	<?php echo $js;?>
