<?php $controller = strtolower($controller);?>
<!-- Modal -->
<div class="modal fade" id="<?=$controller;?>_form-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style='overflow-y:auto!important;'>
  <div class="modal-dialog" role="document" style='width:85%;'>
		<div class="modal-content">
		<div class="panel panel-default" id='<?=$controller;?>-panel-default-form'>	
		<div class="modal-header">
				<div class="panel-heading" id="<?=$controller;?>-panel-heading-form"> <!-- onclick="$('#panel-body-form').toggle();" -->
					<div class="row" id="<?=$controller;?>-panel-heading-form-title">
						<div class="col-xs-12 col-md-12 text-left">
							<b>Form <?=$title;?></b>
						</div>
					</div>
				</div>
		</div>
		<div class="modal-body">
			<!-- formcc -->
			<form id='<?=$controller;?>_form-edit' onsubmit="<?=$form['method_form']['method'];?>;return false;">
                <div>
                    <?php print_r($form);?>
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
	</div>
  </div>
</div>
<?php echo $js;?>