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
							<b>Lihat <?=$title;?></b>
						</div>
					</div>
				</div>
		</div>
		<div class="modal-body">
		   <form id='<?=$controller;?>_view-edit' onsubmit="<?=$form['method_form']['method'];?>;return false;">
		<?php
				foreach($form as $k=>$v) {
				  $name = str_replace(".", "_", $k);
					if ( $v['hide'] == TRUE ) {
						echo $v['crit'];
					} else {
						if ( trim($v['label']) != '' ) {
			?>
							<div class='form-group div_<?=$name;?>'>
								<label for="<?=$k;?>"><?=$v['label'];?></label>
								<?=$v['crit'];?>
							</div>
			<?php
						}
					}
				}
			?>
			<div class='form-group'>
				<label for="mandatory">
					<span style="color:red;"> Field(s) with * is mandatory</span>
				</label>
			</div>
			<div class='row'> &nbsp;</div>
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
			<div>
			<?php
					foreach($form as $k=>$v) {
						if ( $v['iscontroller'] == true ) { //trim($v['label']) != '' && 
				?>
							<div class='form-group div_<?=$name;?>'>
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