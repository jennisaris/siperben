<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<link rel="stylesheet" href="<?php echo base_url('application/views/themes/AdminLTE-2.3.11/template/assets/plugins/datatables/dataTables.bootstrap.css'); ?>">

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
    <div class="box-body table-responsive" style="padding:15px;">
      <table id="table-approval" class="table table-bordered table-striped table-hover" style="width:100%;">
        <thead>
          <tr>
            <th style="width:50px" class="text-center">No.</th>
            <th>Tanggal</th>
            <th>NIP</th>
            <th>Nama</th>
            <th>Satker</th>
            <th>Email</th>
            <th>No. HP</th>
            <th>Status</th>
            <th>Catatan</th>
            <th style="width:160px">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($rows)): ?>
            <tr><td colspan="10" class="text-center text-muted">Belum ada data registrasi.</td></tr>
          <?php else: ?>
            <?php $no = 1; foreach ($rows as $r): ?>
              <?php
                $satker_kode = !empty($r->satker_kode) ? $r->satker_kode : (preg_match('/^([0-9A-Za-z]+)\s*-/', (string)$r->satuan_kerja, $m) ? $m[1] : '');
                $conflict = !empty($active_operator[$satker_kode]);
                $status_class = $r->status === 'disetujui' ? 'label-success' : ($r->status === 'ditolak' ? 'label-danger' : 'label-warning');
              ?>
              <tr>
                <td class="text-center"><?php echo $no++; ?></td>
                <td><?php echo html_escape($r->created_at); ?></td>
                <td><?php echo html_escape($r->nip); ?></td>
                <td><?php echo html_escape($r->nama_lengkap); ?></td>
                <td><?php echo html_escape($r->satuan_kerja); ?></td>
                <td><?php echo html_escape($r->email); ?></td>
                <td><?php echo html_escape($r->no_hp); ?></td>
                <td><span class="label <?php echo $status_class; ?>"><?php echo html_escape($r->status); ?></span></td>
                <td>
                  <?php if ($conflict && $r->status === 'baru'): ?>
                    <span class="label label-danger">Operator aktif masih ada</span>
                  <?php endif; ?>
                  <?php if (!empty($r->password_plain)): ?>
                    <div class="text-info" style="margin-top:4px;"><strong>Password:</strong> <code><?php echo html_escape($r->password_plain); ?></code></div>
                  <?php endif; ?>
                  <?php if (!empty($r->email_error)): ?>
                    <div class="text-danger" style="margin-top:4px;"><small>Email Status: <?php echo html_escape($r->email_error); ?></small></div>
                  <?php endif; ?>
                </td>
                <td>
                  <a class="btn btn-xs btn-default" target="_blank" href="<?php echo site_url('privileges/approval_pengguna/download_pdf/'.$r->id); ?>"><i class="fa fa-file-pdf-o"></i> PDF</a>
                  <?php if ($r->status === 'baru'): ?>
                    <a class="btn btn-xs btn-success" title="Setujui (Approve)" href="<?php echo site_url('privileges/approval_pengguna/approve/'.$r->id); ?>" onclick="return confirm('Setujui pengguna ini?')"><i class="fa fa-check"></i></a>
                    <a class="btn btn-xs btn-danger" title="Tolak Registrasi" href="<?php echo site_url('privileges/approval_pengguna/reject/'.$r->id); ?>" onclick="return confirm('Tolak registrasi ini?')"><i class="fa fa-times"></i></a>
                  <?php endif; ?>
                  <?php if ($r->status === 'disetujui' && !empty($r->password_plain)): ?>
                    <a class="btn btn-xs btn-primary" href="<?php echo site_url('privileges/approval_pengguna/resend_email/'.$r->id); ?>" onclick="return confirm('Kirim email akun & password ke <?php echo html_escape($r->email); ?>?')"><i class="fa fa-envelope"></i> Kirim Email</a>
                  <?php endif; ?>
                </td>
              </tr>
            <?php endforeach; ?>
          <?php endif; ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script src="<?php echo base_url('application/views/themes/AdminLTE-2.3.11/template/assets/plugins/datatables/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('application/views/themes/AdminLTE-2.3.11/template/assets/plugins/datatables/dataTables.bootstrap.min.js'); ?>"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#table-approval').DataTable({
      "pageLength": 5,
      "lengthMenu": [[5, 10, 15, 50, 100, -1], [5, 10, 15, 50, 100, "All"]],
      "language": {
        "lengthMenu": "Tampilkan _MENU_ data per halaman",
        "zeroRecords": "Tidak ada data registrasi ditemukan",
        "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
        "infoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
        "infoFiltered": "(disaring dari _MAX_ total data)",
        "search": "Cari:",
        "paginate": {
          "first": "Pertama",
          "last": "Terakhir",
          "next": "Berikutnya",
          "previous": "Sebelumnya"
        }
      },
      "columnDefs": [
        { "orderable": false, "targets": [0, 8, 9] }
      ]
    });
  });
</script>
