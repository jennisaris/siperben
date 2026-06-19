<?php $CI =&get_instance();
$controller = 'index';
//print_r($bgcolor);exit;
?>
<style>
    .blink {
        animation: blinker 1.5s linear infinite;
        color: #0f172a;
        font-family: sans-serif;
    }
    @keyframes blinker {
        50% { opacity: 0; }
    }

    .content-wrapper,
    .right-side {
        background:
            radial-gradient(circle at top left, rgba(59, 130, 246, .16) 0, rgba(59, 130, 246, 0) 34%),
            radial-gradient(circle at bottom right, rgba(14, 165, 233, .18) 0, rgba(14, 165, 233, 0) 38%),
            linear-gradient(135deg, #f0f9ff 0%, #f8fbff 48%, #ffffff 100%) !important;
    }

    .dashboard-modern {
        padding: 4px 4px 18px;
    }

    .dashboard-hero {
        position: relative;
        overflow: hidden;
        border-radius: 22px;
        padding: 24px 26px;
        margin-bottom: 20px;
        color: #ffffff;
        background: linear-gradient(135deg, #0284c7 0%, #38bdf8 48%, #7dd3fc 100%);
        box-shadow: 0 18px 42px rgba(2, 132, 199, .25);
    }
    .dashboard-hero:before,
    .dashboard-hero:after {
        content: '';
        position: absolute;
        border-radius: 999px;
        background: rgba(255,255,255,.22);
        pointer-events: none;
    }
    .dashboard-hero:before {
        width: 210px;
        height: 210px;
        right: -70px;
        top: -80px;
    }
    .dashboard-hero:after {
        width: 120px;
        height: 120px;
        right: 120px;
        bottom: -55px;
    }
    .dashboard-hero-content { position: relative; z-index: 1; }
    .dashboard-eyebrow {
        display: inline-block;
        padding: 6px 11px;
        border-radius: 999px;
        background: rgba(255,255,255,.18);
        border: 1px solid rgba(255,255,255,.25);
        font-size: 12px;
        letter-spacing: .4px;
        text-transform: uppercase;
        margin-bottom: 10px;
    }
    .dashboard-hero h2 {
        margin: 0 0 6px;
        font-weight: 700;
        letter-spacing: -.4px;
    }
    .dashboard-hero p {
        margin: 0;
        max-width: 760px;
        color: rgba(255,255,255,.92);
        font-size: 14px;
        line-height: 1.6;
    }

    .dashboard-modern .small-box {
        border-radius: 20px;
        overflow: hidden;
        min-height: 142px;
        border: 1px solid rgba(255,255,255,.45);
        box-shadow: 0 16px 35px rgba(15, 23, 42, .12);
        transition: transform .18s ease, box-shadow .18s ease;
    }
    .dashboard-modern .small-box:hover {
        transform: translateY(-4px);
        box-shadow: 0 22px 45px rgba(15, 23, 42, .18);
    }
    .dashboard-modern .small-box .inner {
        position: relative;
        z-index: 1;
        padding: 22px 20px;
        text-align: left;
    }
    .dashboard-modern .small-box .inner p {
        font-size: 13px;
        text-transform: uppercase;
        letter-spacing: .45px;
        opacity: .95;
        margin-bottom: 12px;
    }
    .dashboard-modern .small-box .inner h3 {
        margin: 0;
        font-size: 34px;
        font-weight: 800;
        letter-spacing: -.6px;
    }
    .dashboard-modern .small-box .icon {
        top: 18px;
        right: 18px;
        opacity: .18;
        transition: transform .18s ease;
    }
    .dashboard-modern .small-box:hover .icon { transform: scale(1.08) rotate(-4deg); }
    .dashboard-modern .small-box-footer {
        padding: 10px 14px;
        background: rgba(255,255,255,.18) !important;
        text-align: left;
        font-weight: 600;
        backdrop-filter: blur(8px);
    }
    .dashboard-modern .bg-green { background: linear-gradient(135deg, #10b981, #059669) !important; }
    .dashboard-modern .bg-blue { background: linear-gradient(135deg, #0ea5e9, #2563eb) !important; }
    .dashboard-modern .bg-yellow { background: linear-gradient(135deg, #f59e0b, #d97706) !important; }
    .dashboard-modern .bg-orange { background: linear-gradient(135deg, #fb923c, #ea580c) !important; }
    .dashboard-modern .bg-red { background: linear-gradient(135deg, #f43f5e, #be123c) !important; }
    .dashboard-modern .bg-navy { background: linear-gradient(135deg, #1e3a8a, #0f172a) !important; }
    .dashboard-modern .bg-purple { background: linear-gradient(135deg, #8b5cf6, #6d28d9) !important; }

    .dashboard-modern .box {
        border: 0;
        border-radius: 20px;
        overflow: hidden;
        background: rgba(255,255,255,.92);
        box-shadow: 0 16px 36px rgba(15, 23, 42, .10);
    }
    .dashboard-modern .box-header.with-border {
        border-bottom: 1px solid #e0f2fe;
        padding: 16px 18px;
        background: linear-gradient(135deg, #ffffff 0%, #eff6ff 100%);
    }
    .dashboard-modern .box-title {
        font-weight: 700;
        color: #0f172a;
    }
    .dashboard-modern .box-title:before {
        content: '';
        display: inline-block;
        width: 9px;
        height: 9px;
        border-radius: 50%;
        margin-right: 9px;
        background: #38bdf8;
        box-shadow: 0 0 0 5px rgba(56,189,248,.16);
        vertical-align: middle;
    }
    .dashboard-modern .box-body { padding: 18px; }
    .dashboard-modern .form-control {
        border-radius: 12px;
        border-color: #bae6fd;
        box-shadow: none;
    }
    .dashboard-modern .form-control:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 3px rgba(56,189,248,.18);
    }
    .dashboard-modern table {
        border-radius: 12px;
        overflow: hidden;
    }
    .dashboard-modern .modal-content {
        border: 0;
        border-radius: 18px !important;
        box-shadow: 0 22px 50px rgba(15,23,42,.18);
    }
    .dashboard-modern .modal-header {
        background: linear-gradient(135deg, #0284c7, #38bdf8) !important;
    }

    @media (max-width: 767px) {
        .dashboard-hero { padding: 20px 18px; border-radius: 18px; }
        .dashboard-hero h2 { font-size: 22px; }
        .dashboard-modern .small-box .inner h3 { font-size: 30px; }
    }
</style>
<div class="dashboard-modern">
  <div class="dashboard-hero">
    <div class="dashboard-hero-content">
      <span class="dashboard-eyebrow">SIPERBEN Dashboard</span>
      <h2>Ringkasan Perbendaharaan</h2>
      <p>Pantau jumlah bendahara, progres usulan, dan status sertifikasi dalam tampilan yang lebih bersih dan mudah dibaca.</p>
    </div>
  </div>

<div class='row dashboard-stat-row' style='text-align:center;'>
  <?php $i=0;foreach($data as $k=>$v) {
    if ($i==0 || $i==1 || $i==2) $class = "col-lg-4 col-xs-12";
    else $class = "col-lg-3";
  ?>
   <div class="<?=$class;?>">
          <!-- small box -->
          <div class="small-box <?=$bgcolor[$k-1];?>">
            <div class="inner">
              <p>Jumlah <?=$v['kode']?><br/></p>
              <h3><?=$v['total'];?></h3>
         
            </div>
            <div class="icon">
              <i class="ion ion-bag"></i>
            </div>
            <?php if ($cs[$k-1] != '' ) { ?> 
            <a href="<?=base_url();?>perbend/<?=$cs[$k-1];?>" class="small-box-footer">
            More info <i class="fa fa-arrow-circle-right"></i>
            </a>
            <?php } else {?>
            &nbsp;
            <?php } ?>
          </div>
    </div>
  <?php $i++;} ?>
    <!-- ./col -->
</div>

<!-- <div class="row">
  <div class="col-md-12">
    <div class='box'>
       <div class='box-header with-border'>
            <h3 class='box-title blink'>Pengumuman</h3>
            <div class='box-tools pull-right'>
                <button type='button' class='btn btn-box-tool' data-widget='collapse'>    
                 <i class='fa fa-minus'></i>
                </button>        
            </div>
      </div>
      <div class='box-body' style>
      	
      		<div id='<?=$controller;?>_paging-table-data'></div>
      		
      		<div id='<?=$controller;?>_table-data' style='overflow-x: auto;'></div>
      </div>
   </div>
  </div>
</div> -->

<?php $controller4='progress_usulan_satker';?>
<div class="row">
  <div class="col-md-12">
    <div class='box'>
       <div class='box-header with-border'>
            <h3 class='box-title'>Progress Usulan Bendahara</h3>
            <div class='box-tools pull-right'>
                <button type='button' class='btn btn-box-tool' data-widget='collapse'>    
                 <i class='fa fa-minus'></i>
                </button>        
            </div>
      </div>
      <div class='box-body' style>
          <div>
             <?php /*<select name='pub_tahun' id='pub_tahun' class='form-control' style='width:128px;'>
                  <option value=''>-- Pilih Tahun -- </option>
                  <?php
                    $sql = "SELECT ctahun from app_t_usulan 
                        where ctahun IS NOT NULL and ctahun != '' group by ctahun";
                    $rows = $this->db->query($sql)->result();
                    foreach($rows as $r) {
                      if ( $r->ctahun == $this->session->settahun ) $selected = ' selected ';
                      else $selected = ' ';
                  ?>
                      <option <?=$selected;?> value='<?=$r->ctahun;?>'><?=$r->ctahun;?></option>
                  <?php
                    }
                  ?>
              </select>
              */?>
              <select onChange="reload_grid('<?=base_url();?>perbend/<?=$controller4;?>/lists/0/'+$(this).val(), '<?=$controller4;?>');" name='pub_bulan' id='pub_bulan' class='form-control' style='width:228px;'>
                  <option value=''>-- Pilih Bulan -- </option>
                  <?php
                    foreach($this->session->sysparam->nama_bulan as $k=>$v) {
                  ?>
                      <option value='<?=$k;?>'><?=$v;?></option>
                  <?php
                    }
                  ?>
              </select>
          </div>
          <hr/>
          <!-- pagination -->
            <div id='<?=$controller4;?>_paging-table-data'></div>
      		<!-- pagination -->
      		<div id='<?=$controller4;?>_table-data' style='overflow-x: auto;'></div>
      </div>
   </div>
  </div>
</div>

<?php $controller3='laporan1';?>
<div class="row">
  <div class="col-md-12">
    <div class='box'>
       <div class='box-header with-border'>
            <h3 class='box-title'>Bendahara Bersertifikat</h3>
            <div class='box-tools pull-right'>
                <button type='button' class='btn btn-box-tool' data-widget='collapse'>    
                 <i class='fa fa-minus'></i>
                </button>        
            </div>
      </div>
      <div class='box-body' style>
          <!-- pagination -->
            <div id='<?=$controller3;?>_paging-table-data'></div>
      		<!-- pagination -->
      		<div id='<?=$controller3;?>_table-data' style='overflow-x: auto;'></div>

          <div id='<?=$controller3;?>_graph-data'>
            <center><?=$charts;?></center>
          </div>
      </div>
   </div>
  </div>
</div>

<?php /*$controller2='ews';?>
<div class="row">
  <div class="col-md-12">
    <div class='box'>
       <div class='box-header with-border'>
            <h3 class='box-title'>Reminder Perpanjangan Sertifikat</h3>
            <div class='box-tools pull-right'>
                <button type='button' class='btn btn-box-tool' data-widget='collapse'>    
                 <i class='fa fa-minus'></i>
                </button>        
            </div>
       </div>
       <div class='box-body' style>
      		<!-- pagination -->
      		<div id='<?=$controller2;?>_paging-table-data'></div>
      		<!-- pagination -->
      		<div id='<?=$controller2;?>_table-data' style='overflow-x: auto;'></div>
       </div>
   </div>
  </div>
</div>
<?php */ ?>

</div>
<div class='modal fade' id='myModal_browse' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
							<div class='modal-dialog' role='document' style='width:85%;'>
							<div class='modal-content'>
								<div class='modal-header'>
								<h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Detail Info </h4>
								</div>
								<div class='modal-body' id='modal-body' style='overflow-x: auto;'>
								<div class='form-group'>
									<div id='html_telusuri'></div>
								</div>
								</div>
							</div>
							</div>
</div>
<!-- Modal Pop-up -->
<div class='modal fade' id='messageModal' role='dialog' aria-labelledby='messageModalLabel' data-backdrop='static' data-keyboard='false'>
    <div class='modal-dialog modal-dialog-centered' role='document' style='max-width: 500px;'>
        <div class='modal-content' style='border-radius: 12px; overflow: hidden;'>
            <div class='modal-header' style='background: #007bff; color: white; text-align: center;'>
                <h5 class='modal-title w-100' id='messageModalLabel'>
                    <i class='fa fa-info-circle'></i> Pengumuman Penting
                </h5>
            </div>
            <div class='modal-body' style='text-align: center; font-size: 16px; padding: 20px;'>
                <p style='margin-bottom: 15px; font-weight: 500;'>
                    Dengan hormat, Kami informasikan bahwa format usulan dan panduan aplikasi 
                    <strong>SIPERBEN</strong> dapat diunduh melalui tautan berikut: 😊
                </p>
                <a href='https://bit.ly/formatusulansiperben' target='_blank' rel='noopener noreferrer' class='btn btn-primary' style='border-radius: 8px; padding: 8px 16px; font-size: 16px;'>
                    <i class='fa fa-download'></i> Unduh Panduan
                </a>
            </div>
            <div class='modal-footer' style='border-top: none; justify-content: center;'>
                <button type='button' class='btn btn-secondary' data-dismiss='modal' style='border-radius: 8px; padding: 8px 16px;'>
                    <i class='fa fa-check'></i> Mengerti
                </button>
            </div>
        </div>
    </div>
</div>


<script type='text/javascript'>
$(document).ready(function() {
  
  $('body').addClass('skin-blue sidebar-mini active sidebar-collapse');
  
	reload_grid("<?=base_url();?>dashboard/index/lists", '<?=$controller;?>');
	//reload_grid("<?=base_url();?>dashboard/ews/lists", '<?=$controller2;?>');
	
	reload_grid("<?=base_url();?>perbend/<?=$controller4;?>/lists", '<?=$controller4;?>');
	
  reload_grid("<?=base_url();?>perbend/<?=$controller3;?>/lists", '<?=$controller3;?>');
      // Tampilkan pop-up "Apa kabar" saat halaman dimuat
  $("#messageModal").modal("show");
});
</script>