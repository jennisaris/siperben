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
							<b>Formulir <?=$title;?></b>
						</div>
					</div>
				</div>
		</div>
		<div class="modal-body">
			<!-- formcc -->
			<form id='<?=$controller;?>_form-edit' onsubmit="<?=$form['method_form']['method'];?>;return false;">
				<?php
					$tot_required = 0;
					foreach($form as $k=>$v) {
						$name = str_replace(".", "_", $k);
						if ( $v['required'] ) $tot_required++;
						if ( $v['hide'] == TRUE ) {
							echo $v['crit'];
						} else {
							//if ( trim($v['label']) != '' && $v['iscontroller'] == false ) {
							if ( $v['iscontroller'] == false ) {

				?>
									<div class='form-group div_<?=$name;?>'>
										<?php if ( trim($v['label']) != '' ) { ;?><label><?=$v['label'];?></label><?php } ?>
										<?=$v['crit'];?>
									</div>
				<?php
							}
						}
					}
				?>	
				<?php if ($tot_required != 0 ) {?>
					<div class='form-group'>
						<label>
							<span style="color:red;"> Field(s) with * is mandatory</span>
						</label>
					</div>
				<?php } ?>
				<div class="modal-footer">
					<?php
						$buttons_form = "";
						foreach($form['button_form'] as $k=>$v) {
							$buttons_form .= $v.'&nbsp;';
						}

						echo $buttons_form;
					?>
				</div>
			</form>
			<!-- end formcc -->
			<?php
				foreach($form as $k=>$v) {
					if ( $v['iscontroller'] == true ) { //trim($v['label']) != '' && 
			?>
						<div class='form-group'>
							<label><?=$v['label'];?></label>
							<?=$v['crit'];?>
						</div>
			<?php
					}
				}
			?>
			</div>
		</div>
	</div>
  </div>
</div>
<?php echo $js;?>