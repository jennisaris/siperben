<?php $controller = strtolower($controller);?>
<div class="container-fluid" style='' id='<?=$controller;?>'>
	<div class="panel panel-default" id='panel-default-form'>
		<div class="panel-heading" id="panel-heading-form"> <!-- onclick="$('#panel-body-form').toggle();" -->
			<div class="row" id="panel-heading-form-title">
				<div class="col-xs-12 col-md-12 text-left">
					<b>Lihat <?=$title;?></b>
				</div>
			</div>
		</div>

		<div class="panel-body" id="panel-body-view">
		   <form id='<?=$controller;?>_view-edit' onsubmit="<?=$form['method_form']['method'];?>;return false;">
				<?php
					//print_r($view);
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
			       		foreach($form['button_view'] as $k=>$v) {
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
