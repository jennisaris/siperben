<?php
$_CI =& get_instance();
$sysparam = array();
$rs_sysparam = $_CI->db->query("SELECT ckode, visi from sysparam 
where ldeleted=0")->result();
foreach ($rs_sysparam as $rs) {
  $sysparam[trim($rs->ckode)] = (array) (json_decode("[" . str_replace('""', '', trim($rs->visi)) . "]"));
}
$sysparam = (object) $sysparam;
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistem Informasi Perbendaharaan</title>
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap">
</head>
<style type="text/css">
  body,
  html {
    min-height: 100% !important;
    margin: 0;
    font-family: 'Plus Jakarta Sans', -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
    background:
      radial-gradient(circle at top left, rgba(56, 189, 248, 0.15) 0, transparent 40%),
      radial-gradient(circle at bottom right, rgba(99, 102, 241, 0.15) 0, transparent 40%),
      linear-gradient(135deg, #0f172a 0%, #1e293b 50%, #0f172a 100%);
    background-attachment: fixed;
  }

  .login-wrapper {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 30px 15px;
  }

  .login-card-container {
    width: 100%;
    max-width: 1040px;
    background: #ffffff;
    border-radius: 24px;
    overflow: hidden;
    box-shadow: 0 25px 60px -15px rgba(0, 0, 0, 0.5);
    display: flex;
    flex-wrap: wrap;
    min-height: 580px;
  }

  /* Sisi Kiri - Hero Keuangan Negara */
  .login-hero-side {
    flex: 1 1 55%;
    position: relative;
    background: url('<?= base_url(); ?>assets/images/keuangan_negara.png?v=<?= time(); ?>') center center / cover no-repeat;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    padding: 35px 30px 30px 30px;
    color: #ffffff;
    min-height: 380px;
    overflow: hidden;
  }

  .login-hero-side::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(15, 23, 42, 0.35) 0%, rgba(30, 58, 138, 0.25) 50%, rgba(15, 23, 42, 0.45) 100%);
    z-index: 1;
  }

  .login-hero-content {
    position: relative;
    z-index: 2;
    background: rgba(15, 23, 42, 0.35);
    padding: 18px 22px;
    border-radius: 16px;
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.2);
  }

  .hero-badge {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    background: rgba(2, 132, 199, 0.8);
    border: 1px solid rgba(255, 255, 255, 0.4);
    padding: 6px 14px;
    border-radius: 50px;
    font-size: 13px;
    font-weight: 600;
    letter-spacing: 0.5px;
    color: #ffffff;
    margin-bottom: 16px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
  }

  .hero-title {
    font-size: 26px;
    font-weight: 700;
    line-height: 1.2;
    margin-bottom: 4px;
    color: #ffffff;
    text-shadow: 0 2px 8px rgba(0, 0, 0, 0.6);
    white-space: nowrap;
  }

  .hero-subtitle {
    font-size: 13px;
    line-height: 1.6;
    color: #f1f5f9;
    max-width: 100%;
    text-shadow: 0 1px 4px rgba(0, 0, 0, 0.6);
    white-space: nowrap;
  }

  .hero-footer-info {
    position: relative;
    z-index: 2;
    padding: 16px 20px;
    background: rgba(15, 23, 42, 0.4);
    backdrop-filter: blur(8px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 14px;
    display: flex;
    align-items: center;
    gap: 15px;
  }

  .hero-footer-info i {
    font-size: 24px;
    color: #fbbf24;
  }

  .hero-footer-text {
    font-size: 12px;
    color: #f8fafc;
    line-height: 1.4;
    text-shadow: 0 1px 3px rgba(0, 0, 0, 0.5);
  }

  /* Sisi Kanan - Form Login */
  .login-form-side {
    flex: 1 1 45%;
    background: #ffffff;
    padding: 40px 40px 30px 40px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    position: relative;
  }

  .form-header {
    text-align: center;
    margin-bottom: 25px;
  }

  .form-header img {
    height: 85px;
    max-width: 100%;
    width: auto;
    object-fit: contain;
    margin-bottom: 12px;
  }

  .form-header h3 {
    font-size: 17px;
    font-weight: 700;
    color: #1e293b;
    margin: 0;
    line-height: 1.4;
  }

  .form-header p {
    font-size: 13px;
    color: #64748b;
    margin-top: 4px;
  }

  .input-group {
    margin-bottom: 16px;
    box-shadow: none;
  }

  .input-group-addon {
    background-color: #f8fafc;
    border-color: #cbd5e1;
    color: #64748b;
    border-radius: 10px 0 0 10px;
    padding: 10px 14px;
  }

  .form-control {
    border-color: #cbd5e1;
    height: 42px !important;
    font-size: 13px !important;
    border-radius: 0 10px 10px 0 !important;
    box-shadow: none !important;
    transition: all 0.2s ease;
  }

  .form-control:focus {
    border-color: #0284c7;
    box-shadow: 0 0 0 3px rgba(2, 132, 199, 0.15) !important;
  }

  #togglePassword {
    border-radius: 0 10px 10px 0 !important;
    background-color: #f8fafc;
    border-color: #cbd5e1;
    color: #64748b;
  }

  .input-group input#password {
    border-radius: 0 !important;
  }

  .btn-action-container {
    margin-top: 10px;
  }

  .btn-signin {
    background: linear-gradient(135deg, #0284c7 0%, #0369a1 100%);
    border: none;
    color: #fff;
    font-weight: 600;
    font-size: 14px;
    padding: 11px;
    border-radius: 10px;
    transition: all 0.25s ease;
    box-shadow: 0 4px 12px rgba(2, 132, 199, 0.3);
  }

  .btn-signin:hover,
  .btn-signin:focus {
    background: linear-gradient(135deg, #0369a1 0%, #075985 100%);
    color: #fff;
    transform: translateY(-1px);
    box-shadow: 0 6px 16px rgba(2, 132, 199, 0.4);
  }

  .btn-register {
    background: #f1f5f9;
    border: 1px solid #cbd5e1;
    color: #334155;
    font-weight: 600;
    font-size: 13px;
    padding: 11px;
    border-radius: 10px;
    transition: all 0.2s ease;
    text-align: center;
    display: block;
    text-decoration: none !important;
  }

  .btn-register:hover {
    background: #e2e8f0;
    color: #0f172a;
  }

  .forgot-password-link {
    display: block;
    text-align: center;
    margin-top: 15px;
    font-size: 13px;
    color: #64748b;
  }

  .forgot-password-link a {
    color: #0284c7;
    font-weight: 600;
    text-decoration: none;
  }

  .forgot-password-link a:hover {
    text-decoration: underline;
  }

  /* Floating Toast Alert Balloon */
  .toast-container-overlay {
    position: absolute;
    top: 16px;
    left: 20px;
    right: 20px;
    z-index: 999;
    pointer-events: none;
  }

  /* Alerts */
  .login-alert {
    pointer-events: auto;
    display: flex;
    gap: 12px;
    align-items: flex-start;
    text-align: left;
    margin-bottom: 0;
    padding: 12px 32px 12px 14px;
    border-radius: 12px;
    border: 1px solid transparent;
    font-size: 13px;
    box-shadow: 0 14px 30px -6px rgba(15, 23, 42, 0.22);
    backdrop-filter: blur(8px);
    animation: toastSlideDown 0.35s cubic-bezier(0.16, 1, 0.3, 1);
    position: relative;
  }

  .login-alert .alert-close-btn {
    position: absolute;
    top: 8px;
    right: 12px;
    background: transparent;
    border: none;
    font-size: 20px;
    line-height: 1;
    color: inherit;
    opacity: 0.5;
    cursor: pointer;
    padding: 2px 4px;
    transition: opacity 0.2s;
  }

  .login-alert .alert-close-btn:hover {
    opacity: 1;
  }

  .login-alert-icon {
    width: 32px;
    height: 32px;
    min-width: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    font-size: 14px;
  }

  .login-alert-content strong {
    display: block;
    font-size: 13.5px;
    line-height: 1.35;
    margin-bottom: 3px;
  }

  .login-alert-content p {
    margin: 0;
    font-size: 12.5px;
    line-height: 1.45;
  }

  .login-alert-content ul {
    margin: 6px 0 0 16px;
    padding: 0;
    font-size: 12px;
    line-height: 1.45;
  }

  .login-alert-success,
  .alert-success {
    background-color: #f0fdf4;
    border-color: #bbf7d0;
    color: #166534;
  }

  .login-alert-success .login-alert-icon {
    background: #22c55e;
  }

  .login-alert-danger,
  .panel-body .alert-danger,
  .alert-danger {
    background-color: #fef2f2;
    border-color: #fecaca;
    color: #991b1b;
  }

  .login-alert-danger .login-alert-icon {
    background: #ef4444;
  }

  .login-alert-warning,
  .panel-body .alert-warning,
  .alert-warning {
    background-color: #fffbeb;
    border-color: #fde68a;
    color: #92400e;
  }

  .login-alert-warning .login-alert-icon {
    background: #f59e0b;
  }

  .login-alert-info,
  .panel-body .alert-info,
  .alert-info {
    background-color: #f0f9ff;
    border-color: #bae6fd;
    color: #075985;
  }

  .login-alert-info .login-alert-icon {
    background: #0284c7;
  }

  /* General Alert fallback for any bootstrap/raw alert */
  .alert {
    border-radius: 10px;
    padding: 12px 14px;
    margin-bottom: 0;
    font-size: 13px;
    text-align: left;
    box-shadow: 0 14px 30px -6px rgba(15, 23, 42, 0.22);
  }

  @keyframes toastSlideDown {
    from {
      opacity: 0;
      transform: translateY(-14px) scale(0.96);
    }

    to {
      opacity: 1;
      transform: translateY(0) scale(1);
    }
  }

  .toast-fade-out {
    opacity: 0;
    transform: translateY(-10px);
    transition: all 0.25s ease-out;
  }

  @keyframes loginAlertIn {
    from {
      opacity: 0;
      transform: translateY(-6px);
    }

    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Responsive Adjustments */
  @media (max-width: 850px) {
    .login-hero-side {
      display: none;
    }

    .login-form-side {
      flex: 1 1 100%;
      padding: 30px 20px;
    }

    .login-card-container {
      max-width: 460px;
    }
  }
</style>

<div class="login-wrapper">
  <div class="login-card-container">

    <!-- Sisi Kiri: Visual Banner Keuangan Negara -->
    <div class="login-hero-side">
      <div class="login-hero-content">
        <div class="hero-badge">
          <i class="fa fa-bookmark"></i> SIPERBEN Kemendikdasmen
        </div>
        <div class="hero-title">
          Sistem Informasi Perbendaharaan
        </div>
        <div class="hero-subtitle">
          Pengelolaan Data Pejabat Perbendaharaan yang Modern dan Terintegrasi.
        </div>
      </div>

      <div class="hero-footer-info">
        <i class="fa fa-line-chart"></i>
        <div class="hero-footer-text">
          <b>Transparan & Akuntabel</b><br />
          Mendukung tata kelola keuangan negara secara berkelanjutan.
        </div>
      </div>
    </div>

    <!-- Sisi Kanan: Form Login -->
    <div class="login-form-side">
      <div class="toast-container-overlay">
        <?php
        $registrasi_success = $_CI->session->flashdata('registrasi_success');
        if (!empty($registrasi_success) || $_CI->input->get('registrasi') === 'success') {
          echo '<div class="login-alert login-alert-success" role="alert">
                    <button type="button" class="alert-close-btn" aria-label="Close">&times;</button>
                    <div class="login-alert-icon"><i class="fa fa-check"></i></div>
                    <div class="login-alert-content">
                      <strong>Registrasi berhasil dikirim</strong>
                      <p>' . html_escape($registrasi_success ?: 'Silakan tunggu approval admin. Password akan dikirim ke email setelah disetujui.') . '</p>
                    </div>
                  </div>';
        }
        if (isset($error_message) && !empty($error_message)) {
          if (strpos($error_message, 'login-alert') !== false || strpos($error_message, 'alert') !== false) {
            // Inject close button if missing
            if (strpos($error_message, 'alert-close-btn') === false) {
              $error_message = preg_replace('/(<div class="[^"]*alert[^"]*"[^>]*>)/i', '$1<button type="button" class="alert-close-btn" aria-label="Close">&times;</button>', $error_message);
            }
            echo $error_message;
          } else {
            echo '<div class="login-alert login-alert-danger" role="alert">
                    <button type="button" class="alert-close-btn" aria-label="Close">&times;</button>
                    <div class="login-alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                    <div class="login-alert-content">
                      <strong>Gagal Login</strong>
                      <p>' . $error_message . '</p>
                    </div>
                  </div>';
          }
        } else {
          $val_err = validation_errors();
          if (!empty($val_err)) {
            if (strpos($val_err, 'login-alert') !== false || strpos($val_err, 'alert') !== false) {
              if (strpos($val_err, 'alert-close-btn') === false) {
                $val_err = preg_replace('/(<div class="[^"]*alert[^"]*"[^>]*>)/i', '$1<button type="button" class="alert-close-btn" aria-label="Close">&times;</button>', $val_err);
              }
              echo $val_err;
            } else {
              echo '<div class="login-alert login-alert-danger" role="alert">
                      <button type="button" class="alert-close-btn" aria-label="Close">&times;</button>
                      <div class="login-alert-icon"><i class="fa fa-exclamation-triangle"></i></div>
                      <div class="login-alert-content">
                        <strong>Perhatian</strong>
                        ' . $val_err . '
                      </div>
                    </div>';
            }
          }
        }
        ?>
      </div>

      <div class="form-header">
        <img src='<?= base_url(); ?>assets/images/logo_dikbud.png' alt="Logo" />
        <h3>Kementerian Pendidikan Dasar dan Menengah</h3>
        <p>Silakan masuk ke akun Anda</p>
      </div>

      <form method='post' action='<?php echo base_url(); ?>privileges/user_authentication/dologin'>
        <input type='hidden' name='doLogin' id='doLogin' value='doLogin' />

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class='fa fa-user fa-fw'></i></span>
            <input type="text" class="form-control" placeholder="Masukkan Username / Email" id="username"
              name="username" required>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class='fa fa-key fa-fw'></i></span>
            <input type="password" class="form-control" placeholder="Masukkan Kata Sandi" id="password" name="password"
              required>
            <span class="input-group-addon" id="togglePassword" style="cursor: pointer;">
              <i class="fa fa-eye fa-fw" id="eyeIcon"></i>
            </span>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group" style="margin-bottom: 8px;">
            <?php echo $cap; ?>
          </div>
        </div>

        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon"><i class='fa fa-spinner fa-fw'></i></span>
            <input type="captcha" class="form-control" placeholder="Masukkan Kode Captcha" id="captcha" name="captcha"
              title='Kode Captcha' required />
          </div>
        </div>

        <div class="btn-action-container">
          <div class="row" style="margin-left: -5px; margin-right: -5px;">
            <div class="col-xs-6" style="padding-left: 5px; padding-right: 5px;">
              <button class="btn btn-block btn-signin" type="submit" id="signin">
                <i class="fa fa-sign-in" aria-hidden="true"></i> Masuk
              </button>
            </div>
            <div class="col-xs-6" style="padding-left: 5px; padding-right: 5px;">
              <a href="<?php echo base_url(); ?>registrasi" class="btn btn-register btn-block">
                Pendaftaran
              </a>
            </div>
          </div>
        </div>

        <div class="forgot-password-link">
          Jika Lupa Kata Sandi Silakan Klik Tautan
          <a href='<?= base_url(); ?>nologin/reset_password' target='_blank' rel='noopener noreferrer'>
            Lupa Kata Sandi
          </a>
        </div>
      </form>
    </div>

  </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", function () {
    var togglePassword = document.getElementById("togglePassword");
    var password = document.getElementById("password");
    var eyeIcon = document.getElementById("eyeIcon");

    if (togglePassword && password && eyeIcon) {
      togglePassword.addEventListener("click", function () {
        var type = password.getAttribute("type") === "password" ? "text" : "password";
        password.setAttribute("type", type);
        if (type === "password") {
          eyeIcon.classList.remove("fa-eye-slash");
          eyeIcon.classList.add("fa-eye");
        } else {
          eyeIcon.classList.remove("fa-eye");
          eyeIcon.classList.add("fa-eye-slash");
        }
      });
    }

    // Dismissable Toast Alerts Handler
    document.addEventListener("click", function (e) {
      if (e.target && e.target.classList.contains("alert-close-btn")) {
        var alertBox = e.target.closest(".login-alert, .alert");
        if (alertBox) {
          alertBox.classList.add("toast-fade-out");
          setTimeout(function () {
            if (alertBox.parentNode) {
              alertBox.parentNode.removeChild(alertBox);
            }
          }, 250);
        }
      }
    });
  });
</script>