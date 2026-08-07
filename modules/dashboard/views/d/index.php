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
        border-radius: 14px;
        overflow: hidden;
        min-height: 92px;
        border: 1px solid rgba(255,255,255,.45);
        box-shadow: 0 8px 20px rgba(15, 23, 42, .08);
        transition: transform .18s ease, box-shadow .18s ease;
        margin-bottom: 15px;
    }
    .dashboard-modern .small-box:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 28px rgba(15, 23, 42, .14);
    }
    .dashboard-modern .small-box .inner {
        position: relative;
        z-index: 1;
        padding: 12px 14px;
        text-align: left;
    }
    .dashboard-modern .small-box .inner p {
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .35px;
        opacity: .95;
        margin-bottom: 4px;
        font-weight: 600;
    }
    .dashboard-modern .small-box .inner h3 {
        margin: 0;
        font-size: 22px;
        font-weight: 800;
        letter-spacing: -.4px;
    }
    .dashboard-modern .small-box .icon {
        top: 10px;
        right: 12px;
        font-size: 42px;
        opacity: .20;
        transition: transform .18s ease;
    }
    .dashboard-modern .small-box:hover .icon { transform: scale(1.08) rotate(-4deg); }
    .dashboard-modern .small-box-footer {
        padding: 4px 10px;
        font-size: 11px;
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
    .dashboard-modern .bg-teal { background: linear-gradient(135deg, #14b8a6, #0d9488) !important; }

    .dashboard-modern .box {
        border: 0;
        border-radius: 16px;
        overflow: hidden;
        background: rgba(255,255,255,.94);
        box-shadow: 0 10px 28px rgba(15, 23, 42, .08);
        margin-bottom: 20px;
    }
    .dashboard-modern .box-header.with-border {
        border-bottom: 1px solid #e0f2fe;
        padding: 12px 16px;
        background: linear-gradient(135deg, #ffffff 0%, #eff6ff 100%);
    }
    .dashboard-modern .box-title {
        font-weight: 700;
        font-size: 14px;
        color: #0f172a;
    }
    .dashboard-modern .box-title:before {
        content: '';
        display: inline-block;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        margin-right: 8px;
        background: #38bdf8;
        box-shadow: 0 0 0 4px rgba(56,189,248,.16);
        vertical-align: middle;
    }
    .dashboard-modern .box-body { padding: 15px; }
    .dashboard-modern .form-control {
        border-radius: 10px;
        border-color: #bae6fd;
        box-shadow: none;
    }
    .dashboard-modern .form-control:focus {
        border-color: #38bdf8;
        box-shadow: 0 0 0 3px rgba(56,189,248,.18);
    }
    .dashboard-modern table {
        border-radius: 10px;
        overflow: hidden;
    }
    .dashboard-modern .modal-content {
        border: 0;
        border-radius: 16px !important;
        box-shadow: 0 22px 50px rgba(15,23,42,.18);
    }
    .dashboard-modern .modal-header {
        background: linear-gradient(135deg, #0284c7, #38bdf8) !important;
    }

    @media (max-width: 767px) {
        .dashboard-hero { padding: 16px 14px; border-radius: 14px; }
        .dashboard-hero h2 { font-size: 18px; }
        .dashboard-modern .small-box .inner h3 { font-size: 18px; }
    }

    /* === PROGRESS USULAN BENDAHARA === */
    #progress-usulan-scroll-container {
        width: 100%;
        max-width: 100%;
        overflow-x: auto;
        overflow-y: visible;
        -webkit-overflow-scrolling: touch;
        display: block;
        position: relative;
    }
    #progress_usulan_satker_table-data {
        width: 100%;
    }
    #progress-usulan-scroll-container table {
        width: 100%;
        font-size: 11px;
        margin-bottom: 0;
        border-collapse: collapse;
    }
    #progress_usulan_satker_paging-table-data nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 10px;
        font-size: 11px;
        flex-wrap: wrap;
        gap: 8px;
    }
    #progress_usulan_satker_paging-table-data ul.pagination {
        margin: 0;
    }
    #progress_usulan_satker_paging-table-data .ajax_pagination {
        font-size: 11px;
        color: #64748b;
        font-weight: 500;
    }
</style>


<!-- Load Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>
    .card-flex-row {
        display: flex;
        flex-wrap: nowrap;
        gap: 8px;
        overflow-x: auto;
        margin-bottom: 12px;
        padding-bottom: 4px;
    }
    .card-flex-row::-webkit-scrollbar {
        height: 4px;
    }
    .card-flex-row::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 4px;
    }
    .card-flex-item {
        flex: 1 1 0;
        min-width: 120px;
    }
</style>

<div class="dashboard-modern">

  <!-- ROW 1: KPI Ringkasan Usulan SK Tahun Berjalan (1 Baris Compact) -->
  <?php if (!empty($summary_info['kpi'])) { $kpi = $summary_info['kpi']; ?>
  <div class="card-flex-row">
    <div class="card-flex-item">
      <div class="small-box bg-blue">
        <div class="inner">
          <p>Total Usulan</p>
          <h3><?= number_format($kpi['total_usulan']); ?></h3>
        </div>
        <div class="icon"><i class="fa fa-file-text-o"></i></div>
        <a href="<?= base_url('perbend/progress_usulan_satker'); ?>" class="small-box-footer">Usulan <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="card-flex-item">
      <div class="small-box bg-yellow">
        <div class="inner">
          <p>Dalam Proses</p>
          <h3><?= number_format($kpi['total_proses']); ?></h3>
        </div>
        <div class="icon"><i class="fa fa-hourglass-half"></i></div>
        <a href="<?= base_url('perbend/progress_usulan_satker/progres_proses'); ?>" class="small-box-footer">Progres <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="card-flex-item">
      <div class="small-box bg-red">
        <div class="inner">
          <p>SK Belum Unggah</p>
          <h3><?= number_format($kpi['sk_pending']); ?></h3>
        </div>
        <div class="icon"><i class="fa fa-exclamation-triangle"></i></div>
        <a href="<?= base_url('perbend/t_terbit_sk?link=notif_unggah_sk'); ?>" class="small-box-footer">Upload SK <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="card-flex-item">
      <div class="small-box bg-green">
        <div class="inner">
          <p>Usulan Selesai</p>
          <h3><?= number_format($kpi['total_selesai']); ?></h3>
        </div>
        <div class="icon"><i class="fa fa-check-circle-o"></i></div>
        <a href="<?= base_url('perbend/progress_usulan_satker'); ?>" class="small-box-footer">Selesai <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <?php } ?>

  <!-- ROW 2: Kartu Pejabat Perbendaharaan Dipadatkan dalam 1 Baris Flexbox -->
  <div class="card-flex-row">
    <?php $i=0; foreach($data as $k=>$v) { ?>
      <div class="card-flex-item">
        <div class="small-box <?=$bgcolor[$k-1];?>">
          <div class="inner">
            <p><?=$v['kode'];?></p>
            <h3><?=$v['total'];?></h3>
          </div>
          <div class="icon"><i class="fa fa-users"></i></div>
          <?php if ($cs[$k-1] != '' ) { ?> 
            <a href="<?=base_url();?>perbend/<?=$cs[$k-1];?>" class="small-box-footer">Rincian <i class="fa fa-arrow-circle-right"></i></a>
          <?php } else { ?>
            <span class="small-box-footer">&nbsp;</span>
          <?php } ?>
        </div>
      </div>
    <?php $i++; } ?>
  </div>

  <!-- ROW 3: GRAFIK VISUALISASI (2 Columns Side-by-Side) -->
  <div class="row">
    <!-- Chart 1: Donut Chart Status Usulan SK -->
    <div class="col-md-5 col-sm-12">
      <div class="box" style="margin-bottom: 20px;">
        <div class="box-header with-border">
          <h3 class="box-title">Status Usulan SK Tahun <?= !empty($summary_info['kpi']['tahun']) ? $summary_info['kpi']['tahun'] : date('Y'); ?></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body text-center">
          <div style="height: 230px; position: relative;">
            <canvas id="chartStatusUsulan"></canvas>
          </div>
        </div>
      </div>
    </div>

    <!-- Chart 2: Bar Chart Pejabat Perbendaharaan per Unit Utama -->
    <div class="col-md-7 col-sm-12">
      <div class="box" style="margin-bottom: 20px;">
        <div class="box-header with-border">
          <h3 class="box-title">Distribusi Pejabat Perbendaharaan per Unit Utama</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div style="height: 230px; position: relative;">
            <canvas id="chartUnitUtama"></canvas>
          </div>
        </div>
      </div>
  </div>

  <!-- ROW 3.5: TABEL MATRIKS REKAPITULASI REKENING PER UNIT UTAMA & GRAFIK DISTRIBUSI -->
  <?php if (!empty($unit_rekening_breakdown)) { ?>
  <div class="row">
    <!-- Tabel Matriks Rekening per Unit Utama -->
    <div class="col-md-6 col-sm-12">
      <div class="box box-info" style="margin-bottom: 20px; border-top-color: #0284c7;">
        <div class="box-header with-border" style="background: #f0f9ff;">
          <h3 class="box-title" style="color: #0369a1; font-weight: 700;"><i class="fa fa-university"></i> Matriks Rekening per Unit Utama</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body" style="padding: 10px;">
          <div style="overflow-x: auto;">
            <table class="table table-bordered table-striped table-condensed" style="font-size: 11px; margin-bottom: 0;">
              <thead>
                <tr style="background: #e0f2fe; color: #0369a1;">
                  <th style="width: 30px; text-align: center;">No.</th>
                  <th>Unit Utama</th>
                  <th style="width: 60px; text-align: center; background: #0284c7; color: #ffffff;">Jumlah</th>
                  <th style="width: 50px; text-align: center; background: #ef4444; color: #ffffff;">RKK</th>
                  <th style="width: 50px; text-align: center; background: #10b981; color: #ffffff;">BPG</th>
                  <th style="width: 50px; text-align: center; background: #8b5cf6; color: #ffffff;">BPn</th>
                  <th style="width: 50px; text-align: center; background: #0ea5e9; color: #ffffff;">RPL</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $r_no = 1;
                foreach ($unit_rekening_breakdown as $r_row) {
                  $u_code = htmlspecialchars($r_row['kode_unit'], ENT_QUOTES);
                  $u_name = htmlspecialchars($r_row['nama_unit'], ENT_QUOTES);
                ?>
                <tr>
                  <td class="text-center" style="font-weight: 600; color: #64748b;"><?= $r_no++; ?></td>
                  <td><strong><?= $u_name; ?></strong></td>
                  <td class="text-center" style="background: #f0f9ff;">
                    <a href="javascript:void(0);" onclick="show_rekening_detail('<?= $u_code; ?>', 'all', 'Semua Rekening Aktif', '<?= $u_name; ?>');" style="color: #0284c7; font-weight: 700; text-decoration: underline; display: block;">
                      <?= number_format($r_row['total']); ?>
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="javascript:void(0);" onclick="show_rekening_detail('<?= $u_code; ?>', 'rkk', 'Rekening Kas Kecil (RKK)', '<?= $u_name; ?>');" style="color: #dc2626; font-weight: 700; text-decoration: underline; display: block;">
                      <?= number_format($r_row['rkk']); ?>
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="javascript:void(0);" onclick="show_rekening_detail('<?= $u_code; ?>', 'bpg', 'Rekening Bendahara Pengeluaran (BPG)', '<?= $u_name; ?>');" style="color: #059669; font-weight: 700; text-decoration: underline; display: block;">
                      <?= number_format($r_row['bpg']); ?>
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="javascript:void(0);" onclick="show_rekening_detail('<?= $u_code; ?>', 'bpn', 'Rekening Bendahara Penerimaan (BPn)', '<?= $u_name; ?>');" style="color: #7c3aed; font-weight: 700; text-decoration: underline; display: block;">
                      <?= number_format($r_row['bpn']); ?>
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="javascript:void(0);" onclick="show_rekening_detail('<?= $u_code; ?>', 'rpl', 'Rekening Penampungan Lainnya (RPL)', '<?= $u_name; ?>');" style="color: #0284c7; font-weight: 700; text-decoration: underline; display: block;">
                      <?= number_format($r_row['rpl']); ?>
                    </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

    <!-- Chart Jenis Rekening (Bar Chart Aktif) -->
    <div class="col-md-6 col-sm-12">
      <div class="box box-info" style="margin-bottom: 20px; border-top-color: #0284c7;">
        <div class="box-header with-border" style="background: #f0f9ff;">
          <h3 class="box-title" style="color: #0369a1; font-weight: 700;"><i class="fa fa-bar-chart"></i> Distribusi Jenis Rekening Satker (Aktif)</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div style="height: 254px; position: relative;">
            <canvas id="chartJenisRekening"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>

  <!-- ROW 4: TABEL REKAP STATUS SERTIFIKASI (Full Width col-md-12) -->
  <?php if (!empty($unit_cert_breakdown)) { ?>
  <div class="row">
    <div class="col-md-12">
      <div class="box" style="margin-bottom: 20px;">
        <div class="box-header with-border">
          <h3 class="box-title">Status Sertifikasi Pejabat Perbendaharaan <?= ($this->session->superuser) ? 'per Unit Utama (Kode 138)' : 'per Satuan Kerja'; ?></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
          <div style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px;">
            <span style="font-size: 11px; font-weight: 600; color: #475569;">Status Sertifikasi (Bendahara, PPK, PPSPM) — <small class="text-muted">Klik angka untuk melihat rincian Satker & Pejabat</small></span>
            <div style="position: relative; width: 220px;">
              <input type="text" id="searchUnitUtama" class="form-control input-sm" placeholder="<?= ($this->session->superuser) ? 'Cari Unit Utama...' : 'Cari Satuan Kerja...'; ?>" style="border-radius: 8px; font-size: 11px; height: 28px; padding-left: 26px;">
              <i class="fa fa-search" style="position: absolute; left: 8px; top: 7px; color: #94a3b8; font-size: 11px;"></i>
            </div>
          </div>

          <div style="overflow-x: auto;">
            <table id="tblUnitUtama" class="table table-bordered table-striped table-condensed" style="font-size: 11px; margin-bottom: 0;">
              <thead>
                <tr style="background: #f8fafc;">
                  <th rowspan="2" style="vertical-align: middle; text-align: center; width: 40px;">No.</th>
                  <th rowspan="2" style="vertical-align: middle; text-align: center;"><?= ($this->session->superuser) ? 'Unit Utama' : 'Satuan Kerja'; ?></th>
                  <th colspan="2" style="text-align: center; background: #e0f2fe; color: #0369a1;">Bendahara</th>
                  <th colspan="2" style="text-align: center; background: #fef3c7; color: #92400e;">PPK</th>
                  <th colspan="2" style="text-align: center; background: #f3e8ff; color: #6b21a8;">PPSPM</th>
                </tr>
                <tr style="font-size: 10px;">
                  <th style="text-align: center; background: #dbeafe; color: #0369a1;">Aktif</th>
                  <th style="text-align: center; background: #eff6ff; color: #dc2626;">Belum</th>
                  <th style="text-align: center; background: #fef3c7; color: #b45309;">Aktif</th>
                  <th style="text-align: center; background: #fffbeb; color: #dc2626;">Belum</th>
                  <th style="text-align: center; background: #f3e8ff; color: #7c3aed;">Aktif</th>
                  <th style="text-align: center; background: #faf5ff; color: #dc2626;">Belum</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                $no = 1;
                foreach ($unit_cert_breakdown as $row) { 
                  $uName = htmlspecialchars($row['unit'], ENT_QUOTES);
                  $uFullName = htmlspecialchars(get_nama_panjang_eselon($row['unit']), ENT_QUOTES);
                ?>
                <tr>
                  <td class="text-center" style="vertical-align: middle; color: #64748b; font-weight: 600;"><?= $no++; ?></td>
                  <td><strong><?= $uFullName; ?></strong></td>
                  <td class="text-center">
                    <a href="javascript:void(0);" onclick="show_cert_detail('<?= $uName; ?>', 'bnd', 'cert', 'Bendahara Aktif Bersertifikat', '<?= $uFullName; ?>');" style="color: #0284c7; font-weight: 700; text-decoration: underline; display: block; padding: 2px;">
                      <?= number_format($row['bnd_cert']); ?>
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="javascript:void(0);" onclick="show_cert_detail('<?= $uName; ?>', 'bnd', 'uncert', 'Bendahara Belum Bersertifikat', '<?= $uFullName; ?>');" style="color: #dc2626; font-weight: 700; text-decoration: underline; display: block; padding: 2px;">
                      <?= number_format($row['bnd_uncert']); ?>
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="javascript:void(0);" onclick="show_cert_detail('<?= $uName; ?>', 'ppk', 'cert', 'PPK Aktif Bersertifikat', '<?= $uFullName; ?>');" style="color: #d97706; font-weight: 700; text-decoration: underline; display: block; padding: 2px;">
                      <?= number_format($row['ppk_cert']); ?>
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="javascript:void(0);" onclick="show_cert_detail('<?= $uName; ?>', 'ppk', 'uncert', 'PPK Belum Bersertifikat', '<?= $uFullName; ?>');" style="color: #dc2626; font-weight: 700; text-decoration: underline; display: block; padding: 2px;">
                      <?= number_format($row['ppk_uncert']); ?>
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="javascript:void(0);" onclick="show_cert_detail('<?= $uName; ?>', 'ppspm', 'cert', 'PPSPM Aktif Bersertifikat', '<?= $uFullName; ?>');" style="color: #7c3aed; font-weight: 700; text-decoration: underline; display: block; padding: 2px;">
                      <?= number_format($row['ppspm_cert']); ?>
                    </a>
                  </td>
                  <td class="text-center">
                    <a href="javascript:void(0);" onclick="show_cert_detail('<?= $uName; ?>', 'ppspm', 'uncert', 'PPSPM Belum Bersertifikat', '<?= $uFullName; ?>');" style="color: #dc2626; font-weight: 700; text-decoration: underline; display: block; padding: 2px;">
                      <?= number_format($row['ppspm_uncert']); ?>
                    </a>
                  </td>
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>

          <!-- Controls Pagination untuk Tabel Unit Utama (Default 7 Data per Halaman) -->
          <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px; font-size: 11px; flex-wrap: wrap; gap: 8px;">
            <div id="unitUtamaPageInfo" style="color: #64748b; font-weight: 500;"></div>
            <ul id="unitUtamaPagination" class="pagination pagination-sm" style="margin: 0;"></ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Detail Satker Sertifikasi -->
  <div class="modal fade" id="modalCertDetail" tabindex="-1" role="dialog" aria-labelledby="modalCertDetailLabel">
    <div class="modal-dialog modal-lg" role="document" style="width: 85%; max-width: 1000px;">
      <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);">
        <div class="modal-header" style="background: linear-gradient(135deg, #1e293b, #334155); color: #fff; border-top-left-radius: 12px; border-top-right-radius: 12px; padding: 14px 20px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff; opacity: 0.8;"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modalCertDetailLabel" style="font-weight: 600; font-size: 14px;"><i class="fa fa-list-alt" style="margin-right: 8px;"></i> Rincian Satker & Pejabat</h4>
        </div>
        <div class="modal-body" style="padding: 20px;">
          <div style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px;">
            <h5 id="modalCertSubtitle" style="margin: 0; font-weight: 600; color: #1e293b; font-size: 13px;"></h5>
            <div style="position: relative; width: 240px;">
              <input type="text" id="searchModalCert" class="form-control input-sm" placeholder="Cari Kode / Nama Satker..." style="border-radius: 8px; font-size: 11px; height: 28px; padding-left: 26px;">
              <i class="fa fa-search" style="position: absolute; left: 8px; top: 7px; color: #94a3b8; font-size: 11px;"></i>
            </div>
          </div>
          <div style="max-height: 420px; overflow-y: auto; border: 1px solid #e2e8f0; border-radius: 8px;">
            <table id="tblModalCert" class="table table-bordered table-striped table-hover" style="font-size: 11px; margin-bottom: 0;">
              <thead style="position: sticky; top: 0; background: #f1f5f9; z-index: 10;">
                <tr>
                  <th style="width: 40px; text-align: center;">No</th>
                  <th style="width: 90px; text-align: center;">Kode Satker</th>
                  <th>Nama Satuan Kerja</th>
                  <th style="width: 140px;">NIP</th>
                  <th style="width: 160px;">Nama Pegawai</th>
                  <th id="thCertHeader" style="width: 180px;">No. Sertifikat</th>
                  <th style="width: 100px; text-align: center;">Tgl Sertifikat</th>
                  <th style="width: 100px; text-align: center;">Tgl Kadaluarsa</th>
                </tr>
              </thead>
              <tbody>
                <!-- Dynamic JS content -->
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer" style="background: #f8fafc; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px; padding: 10px 20px;">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="border-radius: 6px; font-weight: 500;">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Detail Satker Rekening -->
  <div class="modal fade" id="modalRekeningDetail" tabindex="-1" role="dialog" aria-labelledby="modalRekeningDetailLabel">
    <div class="modal-dialog modal-lg" role="document" style="width: 85%; max-width: 1050px;">
      <div class="modal-content" style="border-radius: 12px; border: none; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1), 0 10px 10px -5px rgba(0,0,0,0.04);">
        <div class="modal-header" style="background: linear-gradient(135deg, #0369a1, #0284c7); color: #fff; border-top-left-radius: 12px; border-top-right-radius: 12px; padding: 14px 20px;">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff; opacity: 0.8;"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="modalRekeningDetailLabel" style="font-weight: 600; font-size: 14px;"><i class="fa fa-university" style="margin-right: 8px;"></i> Pemetaan & Rincian Rekening Satker</h4>
        </div>
        <div class="modal-body" style="padding: 20px;">
          <div style="margin-bottom: 12px; display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 8px;">
            <h5 id="modalRekeningSubtitle" style="margin: 0; font-weight: 600; color: #1e293b; font-size: 13px;"></h5>
            <div style="position: relative; width: 260px;">
              <input type="text" id="searchModalRekening" class="form-control input-sm" placeholder="Cari Kode / Nama Satker / No.Rek..." style="border-radius: 8px; font-size: 11px; height: 28px; padding-left: 26px;">
              <i class="fa fa-search" style="position: absolute; left: 8px; top: 7px; color: #94a3b8; font-size: 11px;"></i>
            </div>
          </div>
          <div style="max-height: 420px; overflow-y: auto; border: 1px solid #e2e8f0; border-radius: 8px;">
            <table id="tblModalRekening" class="table table-bordered table-striped table-hover" style="font-size: 11px; margin-bottom: 0;">
              <thead style="position: sticky; top: 0; background: #f1f5f9; z-index: 10;">
                <tr>
                  <th style="width: 35px; text-align: center;">No</th>
                  <th style="width: 85px; text-align: center;">Kode Satker</th>
                  <th>Nama Satuan Kerja</th>
                  <th style="width: 140px; text-align: center;">Kelengkapan Satker</th>
                  <th style="width: 150px;">No. Rekening</th>
                  <th style="width: 180px;">Nama Rekening</th>
                  <th style="width: 110px;">Bank</th>
                  <th style="width: 80px; text-align: center;">Jenis</th>
                </tr>
              </thead>
              <tbody>
                <!-- Dynamic JS content -->
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-footer" style="background: #f8fafc; border-bottom-left-radius: 12px; border-bottom-right-radius: 12px; padding: 10px 20px;">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal" style="border-radius: 6px; font-weight: 500;">Tutup</button>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
  function show_rekening_detail(unitCode, jenisType, titleLabel, unitFullName) {
      $('#modalRekeningSubtitle').html('Unit Utama: <b>' + unitFullName + '</b> | Filter: <b>' + titleLabel + '</b>');
      $('#tblModalRekening tbody').html('<tr><td colspan="8" class="text-center" style="padding: 30px;"><i class="fa fa-spinner fa-spin fa-2x text-primary"></i><br/><span style="margin-top: 8px; display: inline-block; font-size: 12px;">Memuat data rekening satker...</span></td></tr>');
      $('#searchModalRekening').val('');
      $('#modalRekeningDetail').modal('show');

      $.ajax({
          url: '<?= base_url("dashboard/index/get_unit_rekening_detail"); ?>',
          type: 'POST',
          data: { unit_code: unitCode, jenis_type: jenisType },
          dataType: 'json',
          success: function(res) {
              var html = '';
              if (res && res.data && res.data.length > 0) {
                  $.each(res.data, function(idx, item) {
                      var bpgBadge = (item.cnt_bpg > 0) ? '<span class="label label-success" style="font-size:9px;">BPG ✓</span>' : '<span class="label label-danger" style="font-size:9px;">BPG ✗</span>';
                      var bpnBadge = (item.cnt_bpn > 0) ? '<span class="label label-purple" style="font-size:9px; background:#8b5cf6; color:#fff;">BPn ✓</span>' : '<span class="label label-default" style="font-size:9px;">BPn -</span>';
                      var rplBadge = (item.cnt_rpl > 0) ? '<span class="label label-info" style="font-size:9px;">' + item.cnt_rpl + ' RPL</span>' : '';
                      var mapBadges = bpgBadge + ' ' + bpnBadge + ' ' + rplBadge;

                      html += '<tr>' +
                          '<td class="text-center">' + (idx + 1) + '</td>' +
                          '<td class="text-center"><b>' + item.kode_satker + '</b></td>' +
                          '<td>' + item.nama_satker + '</td>' +
                          '<td class="text-center">' + mapBadges + '</td>' +
                          '<td><b style="color:#0284c7;">' + item.no_rekening + '</b></td>' +
                          '<td>' + (item.nama_rekening || '-') + '</td>' +
                          '<td>' + (item.nama_bank || '-') + '</td>' +
                          '<td class="text-center"><span class="label label-info" style="font-size:10px;">' + item.jenis_nama + '</span></td>' +
                      '</tr>';
                  });
              } else {
                  html = '<tr><td colspan="8" class="text-center" style="padding: 20px; color: #64748b;"><b>Tidak ada rekening aktif untuk kategori ini</b></td></tr>';
              }
              $('#tblModalRekening tbody').html(html);
          },
          error: function() {
              $('#tblModalRekening tbody').html('<tr><td colspan="8" class="text-center text-danger" style="padding: 20px;">Gagal memuat detail rekening. Silakan coba lagi.</td></tr>');
          }
      });
  }

  $('#searchModalRekening').on('keyup', function() {
      var val = $(this).val().toLowerCase();
      $('#tblModalRekening tbody tr').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(val) > -1);
      });
  });

  function show_cert_detail(unit, jab, status, label, unitFullName) {
      var headerTitle = 'No. Sertifikat';
      if (jab === 'bnd') {
          headerTitle = 'No. BNT';
      } else if (jab === 'ppk') {
          headerTitle = 'No. PNT';
      } else if (jab === 'ppspm') {
          headerTitle = 'No. SNT';
      }
      $('#thCertHeader').text(headerTitle);

      var displayUnit = unitFullName || unit;
      $('#modalCertSubtitle').html('Unit Utama: <b>' + displayUnit + '</b> | Status: <b>' + label + '</b>');
      $('#tblModalCert tbody').html('<tr><td colspan="8" class="text-center" style="padding: 30px;"><i class="fa fa-spinner fa-spin fa-2x text-primary"></i><br/><span style="margin-top: 8px; display: inline-block; font-size: 12px;">Memuat data detail satker...</span></td></tr>');
      $('#searchModalCert').val('');
      $('#modalCertDetail').modal('show');

      $.ajax({
          url: '<?= base_url("dashboard/index/get_unit_cert_detail"); ?>',
          type: 'POST',
          data: { unit: unit, jab: jab, status: status },
          dataType: 'json',
          success: function(data) {
              var html = '';
              if (data && data.length > 0) {
                  $.each(data, function(idx, item) {
                      var certStatus = item.cert_status || ((item.no_sertifikat === 'Belum Bersertifikat') ? 'missing' : 'active');
                      var statusBadge = '';
                      if (certStatus === 'missing') {
                          statusBadge = '<span class="label label-danger" style="font-size: 10px; font-weight:700;">Belum Bersertifikat</span>';
                      } else if (certStatus === 'warning' || certStatus === 'expired') {
                          statusBadge = '<span class="label label-warning" style="font-size: 10px; font-weight:700; color:#1f2937; background:#facc15;"><i class="fa fa-exclamation-triangle"></i> ' + item.no_sertifikat + '</span>';
                      } else {
                          statusBadge = '<span class="label label-success" style="font-size: 10px; font-weight:700;"><i class="fa fa-check-circle"></i> ' + item.no_sertifikat + '</span>';
                      }

                      var tglSert = item.tgl_sertifikat || '-';
                      var tglKad  = item.tgl_kadaluarsa || '-';

                      html += '<tr>' +
                          '<td class="text-center">' + (idx + 1) + '</td>' +
                          '<td class="text-center"><b>' + item.kode_satker + '</b></td>' +
                          '<td>' + item.nama_satker + '</td>' +
                          '<td>' + item.nip + '</td>' +
                          '<td><b>' + item.nama_pegawai + '</b></td>' +
                          '<td>' + statusBadge + '</td>' +
                          '<td class="text-center">' + tglSert + '</td>' +
                          '<td class="text-center">' + tglKad + '</td>' +
                      '</tr>';
                  });
              } else {
                  html = '<tr><td colspan="8" class="text-center" style="padding: 20px; color: #64748b;"><b>Tidak ada satker aktif untuk kategori ini</b></td></tr>';
              }
              $('#tblModalCert tbody').html(html);
          },
          error: function() {
              $('#tblModalCert tbody').html('<tr><td colspan="8" class="text-center text-danger" style="padding: 20px;">Gagal memuat data detail satker. Silakan coba lagi.</td></tr>');
          }
      });
  }

  $(document).ready(function() {
      var pageSize = 7;
      var currentPage = 1;
      var $allRows = $('#tblUnitUtama tbody tr');

      function renderUnitTable() {
          var searchTerm = $('#searchUnitUtama').val().toLowerCase().trim();
          var matchedRows = [];

          $allRows.each(function() {
              var text = $(this).find('td:eq(1)').text().toLowerCase();
              if (text.indexOf(searchTerm) !== -1) {
                  matchedRows.push($(this));
              } else {
                  $(this).hide();
              }
          });

          var totalFiltered = matchedRows.length;
          var totalPages = Math.ceil(totalFiltered / pageSize) || 1;
          if (currentPage > totalPages) currentPage = totalPages;
          if (currentPage < 1) currentPage = 1;

          var startIdx = (currentPage - 1) * pageSize;
          var endIdx = startIdx + pageSize;

          $.each(matchedRows, function(index, $row) {
              if (index >= startIdx && index < endIdx) {
                  $row.show();
              } else {
                  $row.hide();
              }
          });

          var startCount = totalFiltered === 0 ? 0 : startIdx + 1;
          var endCount = Math.min(endIdx, totalFiltered);
          $('#unitUtamaPageInfo').html('Menampilkan <b>' + startCount + ' - ' + endCount + '</b> dari <b>' + totalFiltered + '</b> unit');

          var $p = $('#unitUtamaPagination').empty();
          if (totalPages > 1) {
              var prevClass = (currentPage === 1) ? 'disabled' : '';
              $p.append('<li class="' + prevClass + '"><a href="#" class="unit-page-link" data-page="' + (currentPage - 1) + '">&laquo; Prev</a></li>');

              for (var i = 1; i <= totalPages; i++) {
                  var activeClass = (i === currentPage) ? 'active' : '';
                  $p.append('<li class="' + activeClass + '"><a href="#" class="unit-page-link" data-page="' + i + '">' + i + '</a></li>');
              }

              var nextClass = (currentPage === totalPages) ? 'disabled' : '';
              $p.append('<li class="' + nextClass + '"><a href="#" class="unit-page-link" data-page="' + (currentPage + 1) + '">Next &raquo;</a></li>');
          }
      }

      $(document).on('click', '.unit-page-link', function(e) {
          e.preventDefault();
          var target = parseInt($(this).attr('data-page'));
          if (!isNaN(target) && !$(this).parent().hasClass('disabled') && !$(this).parent().hasClass('active')) {
              currentPage = target;
              renderUnitTable();
          }
      });

      // Realtime search di modal detail
      $('#searchModalCert').on('keyup input', function() {
          var term = $(this).val().toLowerCase().trim();
          $('#tblModalCert tbody tr').each(function() {
              var txt = $(this).text().toLowerCase();
              if (txt.indexOf(term) !== -1) {
                  $(this).show();
              } else {
                  $(this).hide();
              }
          });
      });

      // Realtime search tabel Unit Utama dengan pagination default 7
      $('#searchUnitUtama').on('keyup input', function() {
          currentPage = 1;
          renderUnitTable();
      });

      renderUnitTable();
  });
  </script>
  <?php } ?>

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
      <div class='box-body'>
          <div style="display: flex; gap: 10px; align-items: center; flex-wrap: wrap; margin-bottom: 12px;">
              <div>
                <select onChange="apply_pub_filter();" name='pub_bulan' id='pub_bulan' class='form-control' style='width:200px;'>
                    <option value='0'>-- Semua Bulan --</option>
                    <?php
                      if (!empty($this->session->sysparam->nama_bulan)) {
                        foreach($this->session->sysparam->nama_bulan as $k=>$v) {
                    ?>
                        <option value='<?=$k;?>'><?=$v;?></option>
                    <?php
                        }
                      }
                    ?>
                </select>
              </div>
              <div>
                <select onChange="apply_pub_filter();" name='pub_status' id='pub_status' class='form-control' style='width:220px;'>
                    <option value='all'>-- Semua Status --</option>
                    <option value='0'>Draft</option>
                    <option value='1'>Menunggu Verifikasi</option>
                    <option value='2'>Verifikasi I</option>
                    <option value='3'>Verifikasi II</option>
                    <option value='4'>Disetujui</option>
                    <option value='5'>Ditolak</option>
                    <option value='6'>Proses TTD SK</option>
                    <option value='7'>Selesai</option>
                </select>
              </div>
          </div>
          <script type="text/javascript">
            function apply_pub_filter() {
                var bulan = $('#pub_bulan').val() || '0';
                var status = $('#pub_status').val() || 'all';
                var url = '<?=base_url();?>perbend/<?=$controller4;?>/lists/1/' + bulan + '/0/0/' + status;
                reload_grid(url, '<?=$controller4;?>');
            }
          </script>
          <hr style="margin-top: 8px; margin-bottom: 12px;"/>
          <div id='<?=$controller4;?>_table-data' style="width:100%; max-width:100%; overflow-x:auto; display:block;"></div>
          <!-- pagination -->
          <div id='<?=$controller4;?>_paging-table-data'></div>
      </div>
   </div>
  </div>
</div>
<script type="text/javascript">
(function() {
    // Fix overflow tabel Progress Usulan — dipanggil setiap selesai AJAX inject
    function fixProgressTable() {
        var td = document.getElementById('progress_usulan_satker_table-data');
        if (!td) return;
        var tbl = td.querySelector('table.table-bordered');
        if (!tbl) return;
        // Pastikan table tidak lebih lebar dari container
        tbl.style.width = '100%';
        tbl.style.tableLayout = 'fixed';
        tbl.style.maxWidth = '100%';
        // Pastikan _table-data div adalah scroll container yang aktif
        td.style.overflowX = 'auto';
        td.style.maxWidth = '100%';
        td.style.display = 'block';
    }

    // Jalankan setelah setiap AJAX selesai ke progress_usulan_satker
    $(document).ajaxComplete(function(event, xhr, settings) {
        if (settings.url && settings.url.indexOf('progress_usulan_satker') !== -1) {
            setTimeout(fixProgressTable, 50);
        }
    });

    // Jalankan juga saat pertama kali halaman dimuat
    $(document).ready(function() {
        setTimeout(fixProgressTable, 500);
    });
})();
</script>


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
	reload_grid("<?=base_url();?>perbend/<?=$controller4;?>/lists", '<?=$controller4;?>');
  reload_grid("<?=base_url();?>perbend/<?=$controller3;?>/lists", '<?=$controller3;?>');

  // Tampilkan pop-up pengumuman
  $("#messageModal").modal("show");

  // Render Chart 1: Status Usulan SK (Doughnut Chart)
  <?php if (!empty($summary_info['chart_status'])) { 
    $st_labels = json_encode($summary_info['chart_status']['labels']);
    $st_values = json_encode($summary_info['chart_status']['values']);
    $st_colors = json_encode($summary_info['chart_status']['colors']);
  ?>
  if ($('#chartStatusUsulan').length && typeof Chart !== 'undefined') {
    var ctx1 = document.getElementById('chartStatusUsulan').getContext('2d');
    new Chart(ctx1, {
      type: 'doughnut',
      data: {
        labels: <?= $st_labels; ?>,
        datasets: [{
          data: <?= $st_values; ?>,
          backgroundColor: <?= $st_colors; ?>,
          borderWidth: 2,
          borderColor: '#ffffff'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          position: 'right',
          labels: { boxWidth: 12, fontSize: 11 }
        }
      }
    });
  }
  <?php } ?>

  // Render Chart 2: Pejabat Perbendaharaan (Bar Chart)
  <?php 
    $bar_labels = array();
    $bar_values = array();
    if (!empty($data)) {
      foreach ($data as $k => $v) {
        if (is_array($v) && isset($v['kode']) && isset($v['total'])) {
          $bar_labels[] = $v['kode'];
          $bar_values[] = (int)$v['total'];
        }
      }
    }
    $js_bar_labels = json_encode($bar_labels);
    $js_bar_values = json_encode($bar_values);
  ?>
  if ($('#chartUnitUtama').length && typeof Chart !== 'undefined') {
    var ctx2 = document.getElementById('chartUnitUtama').getContext('2d');
    new Chart(ctx2, {
      type: 'bar',
      data: {
        labels: <?= $js_bar_labels; ?>,
        datasets: [{
          label: 'Jumlah Pejabat',
          data: <?= $js_bar_values; ?>,
          backgroundColor: ['#10b981', '#0ea5e9', '#f59e0b', '#f43f5e', '#ea580c', '#1e3a8a', '#8b5cf6'],
          borderRadius: 6
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: { display: false },
        scales: {
          yAxes: [{
            ticks: { beginAtZero: true, precision: 0 }
          }]
        }
      }
    });
  }

  // Render Chart 3: Status Keaktifan Rekening Satker (Doughnut Chart)
  <?php if (!empty($rekening_info['kpi'])) { 
    $rek_kpi_vals = json_encode(array($rekening_info['kpi']['aktif'], $rekening_info['kpi']['nonaktif']));
  ?>
  if ($('#chartStatusRekening').length && typeof Chart !== 'undefined') {
    var ctx3 = document.getElementById('chartStatusRekening').getContext('2d');
    new Chart(ctx3, {
      type: 'doughnut',
      data: {
        labels: ['Aktif (0)', 'Non-Aktif (1)'],
        datasets: [{
          data: <?= $rek_kpi_vals; ?>,
          backgroundColor: ['#10b981', '#ef4444'],
          borderWidth: 2,
          borderColor: '#ffffff'
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          position: 'right',
          labels: { boxWidth: 12, fontSize: 11 }
        }
      }
    });
  }
  <?php } ?>

  // Render Chart 4: Distribusi per Jenis Rekening Satker Aktif (Bar Chart)
  <?php if (!empty($rekening_info['chart_jenis'])) { 
    $j_labels = json_encode($rekening_info['chart_jenis']['labels']);
    $j_aktif  = json_encode($rekening_info['chart_jenis']['aktif']);
  ?>
  if ($('#chartJenisRekening').length && typeof Chart !== 'undefined') {
    var ctx4 = document.getElementById('chartJenisRekening').getContext('2d');
    new Chart(ctx4, {
      type: 'bar',
      data: {
        labels: <?= $j_labels; ?>,
        datasets: [
          {
            label: 'Jumlah Rekening Aktif',
            data: <?= $j_aktif; ?>,
            backgroundColor: ['#10b981', '#0ea5e9', '#f59e0b', '#8b5cf6', '#ef4444'],
            borderRadius: 6
          }
        ]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: { display: false },
        scales: {
          yAxes: [{
            ticks: { beginAtZero: true, precision: 0 }
          }]
        }
      }
    });
  }
  <?php } ?>
});
</script>