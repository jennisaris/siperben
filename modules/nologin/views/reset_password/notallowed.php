<?php $controller = strtolower($controller);?>
<div class="container-fluid" style='' id='<?=$controller;?>'>
<div class="panel panel-default" id='<?=$controller;?>-panel-default-form'>
<div class="panel-heading" id="<?=$controller;?>-panel-heading-form"> <!-- onclick="$('#panel-body-form').toggle();" -->
	<div class="row" id="<?=$controller;?>-panel-heading-form-title">
		<div class="col-xs-12 col-md-12 text-left">
			<b><?=$title;?></b>
		</div>
	</div>
</div>

<div class="panel-body" id="<?=$controller;?>-panel-body-form">
<!-- formcc -->
 <form id='<?=$controller;?>_form-edit'>
	<div>
        <?=$form;?>
    </div>
	<div class="modal-footer">
       <?php
       		$buttons_form = "";
       		foreach($button_form as $k=>$v) {
				$buttons_form .= $v.'&nbsp;';
			}

			echo $buttons_form;
       	?>
    </div>
 </form>
 <!-- end formcc -->
</div>
</div>
<?php echo $js;?>
