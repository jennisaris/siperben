<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrasi Operator Siperben</title>
  <style>
    :root{--blue:#1d4ed8;--blue2:#0f766e;--ink:#0f172a;--muted:#64748b;--line:#dbe3ef;--soft:#f8fafc;--ok:#047857;--err:#b91c1c}*{box-sizing:border-box}body{margin:0;font-family:Inter,Arial,Helvetica,sans-serif;color:var(--ink);min-height:100vh;background:radial-gradient(circle at top left,#dbeafe 0,#eef6ff 28%,#f8fafc 62%,#f1f5f9 100%)}.hero{max-width:1040px;margin:34px auto;padding:0 18px}.shell{display:grid;grid-template-columns:340px 1fr;background:rgba(255,255,255,.92);border:1px solid rgba(219,227,239,.9);border-radius:24px;box-shadow:0 24px 70px rgba(15,23,42,.13);overflow:hidden}.side{position:relative;padding:34px;color:#fff;background:linear-gradient(145deg,#1d4ed8,#0f766e)}.side:after{content:"";position:absolute;inset:auto -80px -110px auto;width:220px;height:220px;border-radius:50%;background:rgba(255,255,255,.16)}.badge{display:inline-flex;align-items:center;gap:8px;background:rgba(255,255,255,.17);border:1px solid rgba(255,255,255,.28);padding:8px 12px;border-radius:999px;font-size:13px}.side h1{font-size:30px;line-height:1.12;margin:28px 0 12px}.side p{margin:0;color:#dbeafe;line-height:1.6}.steps{margin-top:30px;display:grid;gap:14px}.step{display:flex;gap:12px;align-items:flex-start}.num{flex:0 0 28px;height:28px;border-radius:50%;background:#fff;color:#1d4ed8;display:grid;place-items:center;font-weight:800;font-size:13px}.step span{font-size:14px;color:#eff6ff;line-height:1.45}.formwrap{padding:34px}.head{display:flex;justify-content:space-between;gap:18px;align-items:flex-start;margin-bottom:22px}.head h2{margin:0;font-size:24px}.head p{margin:7px 0 0;color:var(--muted);font-size:14px}.pill{white-space:nowrap;background:#ecfeff;color:#0f766e;border:1px solid #99f6e4;border-radius:999px;padding:8px 12px;font-weight:700;font-size:12px}.grid{display:grid;grid-template-columns:1fr 1fr;gap:16px}.field{margin-bottom:16px}.field.full{grid-column:1/-1}label{display:flex;align-items:center;gap:6px;font-weight:750;margin-bottom:7px;font-size:14px}.req{color:#ef4444}input,select{width:100%;padding:12px 13px;border:1px solid var(--line);border-radius:12px;background:#fff;font-size:14px;transition:.15s}input:focus,select:focus{outline:none;border-color:#2563eb;box-shadow:0 0 0 4px rgba(37,99,235,.12)}select{appearance:auto}.help{font-size:12px;color:var(--muted);margin-top:6px}.upload{border:1.5px dashed #adc3de;border-radius:16px;padding:16px;background:#f8fbff}.upload input{border:0;padding:0;border-radius:0}.actions{display:flex;gap:12px;align-items:center;margin-top:6px}.btn{border:0;border-radius:12px;background:linear-gradient(135deg,#2563eb,#0f766e);color:#fff;font-weight:800;padding:13px 20px;cursor:pointer;box-shadow:0 12px 26px rgba(37,99,235,.24)}.btn:hover{filter:brightness(.97)}.note{font-size:12px;color:var(--muted)}.alert{border-radius:14px;padding:14px 16px;margin-bottom:18px}.alert-success{background:#ecfdf5;color:#065f46;border:1px solid #a7f3d0}.alert-error{background:#fef2f2;color:#991b1b;border:1px solid #fecaca}.alert ul{margin:6px 0 0;padding-left:20px}.footer{margin-top:18px;padding-top:16px;border-top:1px solid #edf2f7;font-size:12px;color:var(--muted)}@media(max-width:860px){.shell{grid-template-columns:1fr}.side{padding:26px}.formwrap{padding:24px}.head{display:block}.pill{display:inline-block;margin-top:12px}.grid{grid-template-columns:1fr}}@media(max-width:520px){.hero{margin:14px auto;padding:0}.shell{border-radius:0;border-left:0;border-right:0}.actions{display:block}.btn{width:100%;margin-bottom:10px}}
  </style>
</head>
<body>
<div class="hero">
  <div class="shell">
    <aside class="side">
      <div class="badge">✨ Pendaftaran Operator</div>
      <h1>Daftar akses Siperben dengan cepat dan rapi.</h1>
      <p>Lengkapi data diri, pilih satuan kerja dan pangkat/golongan dari database, lalu unggah Surat Persetujuan KPA.</p>
      <div class="steps">
        <div class="step"><div class="num">1</div><span>Isi identitas operator sesuai data kepegawaian.</span></div>
        <div class="step"><div class="num">2</div><span>Pilih satuan kerja dan pangkat/golongan dari daftar resmi.</span></div>
        <div class="step"><div class="num">3</div><span>Upload Surat Persetujuan KPA dalam format PDF.</span></div>
      </div>
    </aside>

    <main class="formwrap">
      <div class="head">
        <div>
          <h2>Form Registrasi</h2>
          <p>Pastikan data yang dikirim sudah benar sebelum menekan tombol kirim.</p>
        </div>
        <div class="pill">PDF maks. 5 MB</div>
      </div>

      <?php if (!empty($success)): ?>
        <div class="alert alert-success">Registrasi berhasil dikirim. Nomor registrasi Anda: <strong><?php echo html_escape($registration_id); ?></strong>.</div>
      <?php endif; ?>
      <?php if (!empty($errors)): ?>
        <div class="alert alert-error"><strong>Mohon perbaiki data berikut:</strong><ul><?php foreach ($errors as $e): ?><li><?php echo html_escape($e); ?></li><?php endforeach; ?></ul></div>
      <?php endif; ?>

      <form method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="grid">
          <div class="field">
            <label for="nip">NIP <span class="req">*</span></label>
            <input id="nip" name="nip" type="text" inputmode="numeric" maxlength="18" pattern="[0-9]{18}" required value="<?php echo html_escape(isset($old['nip']) ? $old['nip'] : ''); ?>" placeholder="18 digit NIP">
            <div class="help">Contoh: 199504142019031009</div>
          </div>
          <div class="field">
            <label for="nama_lengkap">Nama Lengkap <span class="req">*</span></label>
            <input id="nama_lengkap" name="nama_lengkap" type="text" maxlength="200" required value="<?php echo html_escape(isset($old['nama_lengkap']) ? $old['nama_lengkap'] : ''); ?>" placeholder="Nama sesuai dokumen">
          </div>
          <div class="field full">
            <label for="satuan_kerja">Satuan Kerja <span class="req">*</span></label>
            <input id="satuan_kerja" name="satuan_kerja" list="satker_list" maxlength="200" required value="<?php echo html_escape(isset($old['satuan_kerja']) ? $old['satuan_kerja'] : ''); ?>" placeholder="Ketik untuk mencari satuan kerja">
            <datalist id="satker_list">
              <?php foreach ($satker_options as $satker): ?>
                <option value="<?php echo html_escape($satker['label']); ?>"></option>
              <?php endforeach; ?>
            </datalist>
            <div class="help">Data satuan kerja diambil dari app_m_unor dan ditampilkan dengan kode satker.</div>
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
            <label for="no_hp">No.Hp <span class="req">*</span></label>
            <input id="no_hp" name="no_hp" type="tel" maxlength="30" required value="<?php echo html_escape(isset($old['no_hp']) ? $old['no_hp'] : ''); ?>" placeholder="08xxxxxxxxxx">
          </div>
          <div class="field full">
            <label for="email">E-mail <span class="req">*</span></label>
            <input id="email" name="email" type="email" maxlength="150" required value="<?php echo html_escape(isset($old['email']) ? $old['email'] : ''); ?>" placeholder="nama@email.go.id">
          </div>
          <div class="field full upload">
            <label for="surat_persetujuan_kpa">Upload Surat Persetujuan KPA <span class="req">*</span></label>
            <input id="surat_persetujuan_kpa" name="surat_persetujuan_kpa" type="file" accept="application/pdf,.pdf" required>
            <div class="help">Format PDF saja, maksimal 5 MB.</div>
          </div>
        </div>
        <div class="actions">
          <button class="btn" type="submit">Kirim Registrasi</button>
          <span class="note">Data akan masuk ke antrian verifikasi operator.</span>
        </div>
      </form>
      <div class="footer">Siperben menjaga data registrasi untuk keperluan verifikasi akses.</div>
    </main>
  </div>
</div>
</body>
</html>
