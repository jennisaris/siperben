<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lengkapi Data Operator - Siperben</title>
  <style>
    :root{--blue:#1d4ed8;--blue2:#0f766e;--ink:#0f172a;--muted:#64748b;--line:#dbe3ef;--soft:#f8fafc;--ok:#047857;--err:#b91c1c}*{box-sizing:border-box}body{margin:0;font-family:Inter,Arial,Helvetica,sans-serif;color:var(--ink);min-height:100vh;background:radial-gradient(circle at top left,#dbeafe 0,#eef6ff 28%,#f8fafc 62%,#f1f5f9 100%)}.hero{max-width:1040px;margin:34px auto;padding:0 18px}.shell{display:grid;grid-template-columns:340px 1fr;background:rgba(255,255,255,.95);border:1px solid rgba(219,227,239,.9);border-radius:24px;box-shadow:0 24px 70px rgba(15,23,42,.13);overflow:hidden}.side{position:relative;padding:34px;color:#fff;background:linear-gradient(145deg,#1d4ed8,#0f766e)}.side:after{content:"";position:absolute;inset:auto -80px -110px auto;width:220px;height:220px;border-radius:50%;background:rgba(255,255,255,.16)}.badge{display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.17);border:1px solid rgba(255,255,255,.28);padding:8px 12px;border-radius:999px;font-size:13px}.side h1{font-size:28px;line-height:1.15;margin:28px 0 12px}.side p{margin:0;color:#dbeafe;line-height:1.6}.steps{margin-top:30px;display:grid;gap:14px}.step{display:flex;gap:12px;align-items:flex-start}.num{flex:0 0 28px;height:28px;border-radius:50%;background:#fff;color:#1d4ed8;display:grid;place-items:center;font-weight:800;font-size:13px}.step span{font-size:14px;color:#eff6ff;line-height:1.45}.formwrap{padding:34px}.head{display:flex;justify-content:space-between;gap:18px;align-items:flex-start;margin-bottom:22px}.head h2{margin:0;font-size:24px}.head p{margin:7px 0 0;color:var(--muted);font-size:14px}.pill{white-space:nowrap;background:#e0f2fe;color:#0369a1;border:1px solid #7dd3fc;border-radius:999px;padding:8px 12px;font-weight:700;font-size:12px}.grid{display:grid;grid-template-columns:1fr 1fr;gap:16px}.field{margin-bottom:16px}.field.full{grid-column:1/-1}label{display:flex;align-items:center;gap:6px;font-weight:750;margin-bottom:7px;font-size:14px}.req{color:#ef4444}.opt{color:var(--muted);font-weight:normal;font-size:12px}input,select{width:100%;padding:12px 13px;border:1px solid var(--line);border-radius:12px;background:#fff;font-size:14px;transition:.15s}input:focus,select:focus{outline:none;border-color:#2563eb;box-shadow:0 0 0 4px rgba(37,99,235,.12)}select{appearance:auto}.help{font-size:12px;color:var(--muted);margin-top:6px}.upload{border:1.5px dashed #adc3de;border-radius:16px;padding:16px;background:#f8fbff}.upload input{border:0;padding:0;border-radius:0}.actions{display:flex;gap:10px;align-items:center;flex-wrap:wrap;margin-top:6px}.btn{border:0;border-radius:10px;background:linear-gradient(135deg,#2563eb,#0f766e);color:#fff;font-size:13px;font-weight:700;padding:12px 20px;cursor:pointer;white-space:nowrap;box-shadow:0 8px 20px rgba(37,99,235,.2);transition:.15s}.btn:hover{filter:brightness(.95)}.btn-danger{border:1px solid #fecaca;border-radius:10px;background:#fef2f2;color:#991b1b;font-size:13px;font-weight:700;padding:12px 18px;text-decoration:none;display:inline-flex;align-items:center;justify-content:center;white-space:nowrap;transition:.15s}.btn-danger:hover{background:#fee2e2}.alert{border-radius:14px;padding:14px 16px;margin-bottom:18px}.alert-warning{background:#fffbeb;color:#92400e;border:1px solid #fde68a}.alert-error{background:#fef2f2;color:#991b1b;border:1px solid #fecaca}.alert ul{margin:6px 0 0;padding-left:20px}.footer{margin-top:18px;padding-top:16px;border-top:1px solid #edf2f7;font-size:12px;color:var(--muted)}@media(max-width:860px){.shell{grid-template-columns:1fr}.side{padding:26px}.formwrap{padding:24px}.head{display:block}.pill{display:inline-block;margin-top:12px}.grid{grid-template-columns:1fr}}@media(max-width:520px){.hero{margin:14px auto;padding:0}.shell{border-radius:0;border-left:0;border-right:0}.actions{display:block}.btn,.btn-danger{width:100%;margin-bottom:8px;text-align:center}}
  </style>
</head>
<body>
<div class="hero">
  <div class="shell">
    <aside class="side">
      <div class="badge">🔒 Pengisian Biodata Operator</div>
      <h1>Lengkapi data Anda untuk membuka akses Siperben.</h1>
      <p>Mohon isi identitas resmi Anda. Setelah data tersimpan lengkap, Anda dapat langsung mengakses seluruh fitur di aplikasi Siperben.</p>
      <div class="steps">
        <div class="step"><div class="num">1</div><span>Isi NIP 18 digit dan Nama Lengkap sesuai data kepegawaian.</span></div>
        <div class="step"><div class="num">2</div><span>Verifikasi Satuan Kerja dan pilih Pangkat/Golongan.</span></div>
        <div class="step"><div class="num">3</div><span>Simpan untuk membuka akses seluruh menu.</span></div>
      </div>
    </aside>

    <main class="formwrap">
      <div class="head">
        <div>
          <h2>Lengkapi Data Operator</h2>
          <p>Pastikan informasi berikut valid dan lengkap sebelum melanjutkan.</p>
        </div>
        <div class="pill">Operator Satker</div>
      </div>

      <?php if (!empty($warning_msg)): ?>
        <div class="alert alert-warning">
          <strong>Pemberitahuan Akses:</strong> <?php echo html_escape($warning_msg); ?>
        </div>
      <?php else: ?>
        <div class="alert alert-warning">
          <strong>Perhatian:</strong> Mohon melengkapi data registrasi operator Anda di bawah ini agar dapat mengakses fitur dan menu lain di aplikasi Siperben.
        </div>
      <?php endif; ?>

      <?php if (!empty($errors)): ?>
        <div class="alert alert-error">
          <strong>Mohon perbaiki data berikut:</strong>
          <ul>
            <?php foreach ($errors as $e): ?>
              <li><?php echo html_escape($e); ?></li>
            <?php endforeach; ?>
          </ul>
        </div>
      <?php endif; ?>

      <form method="post" action="<?php echo base_url(); ?>registrasi/lengkapi_data" enctype="multipart/form-data" autocomplete="off">
        <div class="grid">
          <div class="field">
            <label for="nip">NIP <span class="req">*</span></label>
            <input id="nip" name="nip" type="text" inputmode="numeric" maxlength="18" pattern="[0-9]{18}" required value="<?php echo html_escape(isset($old['nip']) ? $old['nip'] : ''); ?>" placeholder="18 digit NIP">
            <div class="help">Contoh: 199504142019031009</div>
          </div>

          <div class="field">
            <label for="nama_lengkap">Nama Lengkap <span class="req">*</span></label>
            <input id="nama_lengkap" name="nama_lengkap" type="text" maxlength="200" required value="<?php echo html_escape(isset($old['nama_lengkap']) ? $old['nama_lengkap'] : ''); ?>" placeholder="Nama lengkap sesuai dokumen">
          </div>

          <div class="field full">
            <label for="satuan_kerja">Satuan Kerja <span class="req">*</span></label>
            <input id="satuan_kerja" name="satuan_kerja" list="satker_list" maxlength="200" required value="<?php echo html_escape(isset($old['satuan_kerja']) ? $old['satuan_kerja'] : ''); ?>" placeholder="Ketik untuk mencari satuan kerja">
            <datalist id="satker_list">
              <?php foreach ($satker_options as $satker): ?>
                <option value="<?php echo html_escape($satker['label']); ?>"></option>
              <?php endforeach; ?>
            </datalist>
            <div class="help">Data satuan kerja diambil dari database resmi app_m_unor.</div>
          </div>

          <div class="field">
            <label for="pangkat_golongan">Pangkat/Golongan <span class="req">*</span></label>
            <select id="pangkat_golongan" name="pangkat_golongan" required>
              <option value="">Pilih pangkat/golongan</option>
              <?php foreach ($golongan_options as $gol): ?>
                <?php $label = trim($gol['pangkat']) !== '' ? trim($gol['pangkat']).' ('.trim($gol['nama']).')' : trim($gol['nama']); ?>
                <option value="<?php echo html_escape($label); ?>" <?php echo (isset($old['pangkat_golongan']) && $old['pangkat_golongan'] === $label) ? 'selected' : ''; ?>><?php echo html_escape($label); ?></option>
              <?php endforeach; ?>
            </select>
          </div>

          <div class="field">
            <label for="no_hp">No.Hp / WhatsApp <span class="req">*</span></label>
            <input id="no_hp" name="no_hp" type="tel" maxlength="30" required value="<?php echo html_escape(isset($old['no_hp']) ? $old['no_hp'] : ''); ?>" placeholder="08xxxxxxxxxx">
          </div>

          <div class="field full">
            <label for="email">E-mail <span class="req">*</span></label>
            <input id="email" name="email" type="email" maxlength="150" required value="<?php echo html_escape(isset($old['email']) ? $old['email'] : ''); ?>" placeholder="nama@email.go.id">
          </div>

          <div class="field full upload">
            <label for="surat_persetujuan_kpa">Upload Surat Persetujuan KPA <span class="opt">(Opsional untuk operator terdaftar)</span></label>
            <input id="surat_persetujuan_kpa" name="surat_persetujuan_kpa" type="file" accept="application/pdf,.pdf">
            <div class="help">
              Format PDF saja, maksimal 5 MB. 
              <?php if (!empty($reg_existing) && !empty($reg_existing->surat_persetujuan_kpa_original)): ?>
                <br><em>File terunggah sebelumnya: <?php echo html_escape($reg_existing->surat_persetujuan_kpa_original); ?></em>
              <?php endif; ?>
            </div>
          </div>
        </div>

        <div class="actions">
          <button class="btn" type="submit">Simpan &amp; Lanjutkan Akses</button>
          <a href="<?php echo base_url(); ?>privileges/user_authentication/doLogout" class="btn-danger">Keluar (Logout)</a>
        </div>
      </form>

      <div class="footer">Siperben &copy; <?php echo date('Y'); ?> - Sistem Informasi Perbendaharaan.</div>
    </main>
  </div>
</div>
</body>
</html>
