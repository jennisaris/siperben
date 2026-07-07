<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<section class="content-header">
  <h1>Approval Pengguna <small>Registrasi Operator Satker</small></h1>
</section>

<section class="content">
  <?php if (!empty($msg)): ?>
    <div class="alert alert-info alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php echo html_escape($msg); ?>
    </div>
  <?php endif; ?>

  <div class="box box-primary">
    <div class="box-header with-border">
      <h3 class="box-title">Daftar Registrasi Operator</h3>
      <div class="box-tools pull-right">
        <a class="btn btn-success btn-sm" href="<?php echo site_url('privileges/approval_pengguna/approve_all'); ?>" onclick="return confirm('Setujui semua registrasi yang masih baru dan tidak konflik?')">
          <i class="fa fa-check-square-o"></i> Approve Semua
        </a>
      </div>
    </div>
    <div class="box-body table-responsive no-padding">
      <table class="table table-bordered table-striped table-hover">
        <thead>
          <tr>
            <th style="width:60px">ID</th>
            <th>Tanggal</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Satker</th>
            <th>Email</th>
            <th>Status</th>
            <th>Catatan</th>
            <th style="width:160px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($rows)): ?>
            <tr><td colspan="9" class="text-center text-muted">Belum ada data registrasi.</td></tr>
          <?php endif; ?>
          <?php foreach ($rows as $r): ?>
            <?php
              $satker_kode = !empty($r->satker_kode) ? $r->satker_kode : (preg_match('/^([0-9A-Za-z]+)\s*-/', (string)$r->satuan_kerja, $m) ? $m[1] : '');
              $conflict = !empty($active_operator[$satker_kode]);
              $status_class = $r->status === 'disetujui' ? 'label-success' : ($r->status === 'ditolak' ? 'label-danger' : 'label-warning');
            ?>
            <tr>
              <td><?php echo (int)$r->id; ?></td>
              <td><?php echo html_escape($r->created_at); ?></td>
              <td><?php echo html_escape($r->nip); ?></td>
              <td><?php echo html_escape($r->nama_lengkap); ?></td>
              <td><?php echo html_escape($r->satuan_kerja); ?></td>
              <td><?php echo html_escape($r->email); ?></td>
              <td><span class="label <?php echo $status_class; ?>"><?php echo html_escape($r->status); ?></span></td>
              <td>
                <?php if ($conflict && $r->status === 'baru'): ?>
                  <span class="label label-danger">Operator aktif masih ada</span>
                <?php endif; ?>
                <?php if (!empty($r->email_error)): ?>
                  <div class="text-danger" style="margin-top:4px;"><?php echo html_escape($r->email_error); ?></div>
                <?php endif; ?>
              </td>
              <td>
                <a class="btn btn-xs btn-default" target="_blank" href="<?php echo base_url($r->surat_persetujuan_kpa_file); ?>"><i class="fa fa-file-pdf-o"></i> PDF</a>
                <?php if ($r->status === 'baru'): ?>
                  <a class="btn btn-xs btn-success" href="<?php echo site_url('privileges/approval_pengguna/approve/'.$r->id); ?>" onclick="return confirm('Setujui pengguna ini?')"><i class="fa fa-check"></i> Approve</a>
                  <a class="btn btn-xs btn-danger" href="<?php echo site_url('privileges/approval_pengguna/reject/'.$r->id); ?>" onclick="return confirm('Tolak registrasi ini?')"><i class="fa fa-times"></i></a>
                <?php endif; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>
