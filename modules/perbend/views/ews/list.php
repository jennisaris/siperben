<?php $controller2='ews';?>
<div class="container-fluid">
	<div class="row">
		<div class="panel-body" id="panel-body-list">
			
			<!-- Nav Tabs Sertifikasi (Bendahara, PPK, PPSPM) -->
			<ul class="nav nav-tabs" id="sertifikasi-tabs" style="margin-bottom: 20px; border-bottom: 2px solid #ddd;">
				<li class="active" id="tab-bendahara">
					<a href="javascript:void(0)" onclick="switchSertifikasiTab('bendahara')" style="font-size: 14px; font-weight: bold; padding: 10px 20px;">
						<i class="fa fa-user"></i> Bendahara
					</a>
				</li>
				<li id="tab-ppk">
					<a href="javascript:void(0)" onclick="switchSertifikasiTab('ppk')" style="font-size: 14px; font-weight: bold; padding: 10px 20px;">
						<i class="fa fa-id-badge"></i> PPK
					</a>
				</li>
				<li id="tab-ppspm">
					<a href="javascript:void(0)" onclick="switchSertifikasiTab('ppspm')" style="font-size: 14px; font-weight: bold; padding: 10px 20px;">
						<i class="fa fa-certificate"></i> PPSPM
					</a>
				</li>
			</ul>

			<!-- Pagination Top -->
			<div id='<?=$controller2;?>_paging-table-data'></div>

			<div class="clearfix"></div>

			<!-- Table Data -->
			<div id='<?=$controller2;?>_table-data' style='overflow-x: auto; margin-top: 10px;'></div>

			<div class="clearfix"></div>
			
			<!-- Download / Custom Action Buttons -->
			<div class="pull-right" style="margin-top: 15px;">
				<?php 
					$buttons = "";
					if (!empty($button_add) && is_array($button_add)) {
						foreach($button_add as $b) {
							$buttons .= $b.'&nbsp;';
						}
					}
					echo $buttons;
				?>
			</div>
			
		</div>
	</div>
</div>

<script type='text/javascript'>
var activeSertifikasiTab = 'bendahara';

function switchSertifikasiTab(tabName) {
	activeSertifikasiTab = tabName;
	$('#sertifikasi-tabs li').removeClass('active');
	$('#tab-' + tabName).addClass('active');

	reload_sertifikasi_grid(1);
}

function reload_sertifikasi_grid(page) {
	if (typeof page === 'undefined') page = 1;
	
	var postData = {
		tab: activeSertifikasiTab
	};

	// Ambil kata kunci jika form pencarian ada
	if ($('#q_key').length > 0 && $('#q_key').val() !== '') {
		postData.q_key = $('#q_key').val();
	}

	$.ajax({
		url: "<?=base_url();?>perbend/ews/lists/" + page,
		type: 'POST',
		data: postData,
		dataType: 'json',
		beforeSend: function() {
			$('#<?=$controller2;?>_table-data').html('<div style="text-align:center; padding:30px;"><i class="fa fa-spinner fa-spin fa-2x"></i><br>Memuat data sertifikasi...</div>');
		},
		success: function(response) {
			if (response.html && response.html.html) {
				$('#<?=$controller2;?>_table-data').html(response.html.html);
			}
			if (response.pagination) {
				$('#<?=$controller2;?>_paging-table-data').html(response.pagination);
			}
		},
		error: function() {
			$('#<?=$controller2;?>_table-data').html('<div class="alert alert-danger">Gagal memuat data sertifikasi. Silakan coba lagi.</div>');
		}
	});
}

$(document).ready(function() {
	reload_sertifikasi_grid(1);
});
</script>