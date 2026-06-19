<?php 
$controller = strtolower($controller);
?>
<style>
html, body {
    min-height: 100%;
    background:
        radial-gradient(circle at top left, rgba(56, 189, 248, .38) 0, rgba(56, 189, 248, 0) 34%),
        radial-gradient(circle at bottom right, rgba(147, 197, 253, .42) 0, rgba(147, 197, 253, 0) 38%),
        linear-gradient(135deg, #e0f2fe 0%, #f8fbff 50%, #ffffff 100%) !important;
    background-attachment: fixed;
}

.reset-password-page {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 36px 16px;
}

.reset-password-card {
    width: 100%;
    max-width: 620px;
    border: 0;
    border-radius: 24px;
    overflow: hidden;
    background: rgba(255, 255, 255, .94);
    box-shadow: 0 24px 58px rgba(15, 23, 42, .16);
    backdrop-filter: blur(10px);
}

.reset-password-hero {
    position: relative;
    overflow: hidden;
    padding: 28px 30px 25px;
    color: #ffffff;
    background: linear-gradient(135deg, #0284c7 0%, #38bdf8 52%, #7dd3fc 100%);
}
.reset-password-hero:before,
.reset-password-hero:after {
    content: '';
    position: absolute;
    border-radius: 999px;
    background: rgba(255,255,255,.22);
    pointer-events: none;
}
.reset-password-hero:before {
    width: 190px;
    height: 190px;
    right: -62px;
    top: -70px;
}
.reset-password-hero:after {
    width: 96px;
    height: 96px;
    right: 110px;
    bottom: -42px;
}
.reset-password-hero-content {
    position: relative;
    z-index: 1;
    display: flex;
    gap: 16px;
    align-items: center;
}
.reset-password-icon {
    width: 58px;
    height: 58px;
    min-width: 58px;
    border-radius: 18px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,.18);
    border: 1px solid rgba(255,255,255,.28);
    box-shadow: inset 0 1px 0 rgba(255,255,255,.18);
    font-size: 26px;
}
.reset-password-hero h3 {
    margin: 0 0 5px;
    font-weight: 800;
    letter-spacing: -.3px;
}
.reset-password-hero p {
    margin: 0;
    color: rgba(255,255,255,.92);
    line-height: 1.55;
    font-size: 13px;
}

.reset-password-body {
    padding: 28px 30px 26px;
}
.reset-password-hint {
    display: flex;
    gap: 11px;
    align-items: flex-start;
    padding: 13px 14px;
    margin-bottom: 20px;
    border-radius: 16px;
    background: linear-gradient(135deg, #dbeafe 0%, #bae6fd 100%);
    border: 1px solid #93c5fd;
    color: #0f172a;
}
.reset-password-hint i {
    color: #0284c7;
    margin-top: 2px;
}
.reset-password-hint strong {
    display: block;
    color: #075985;
    margin-bottom: 2px;
}
.reset-password-hint span {
    font-size: 12px;
    line-height: 1.45;
    color: #334155;
}

.reset-password-card .form-group { margin-bottom: 18px; }
.reset-password-card label {
    font-weight: 700;
    color: #0f172a;
    margin-bottom: 8px;
}
.reset-password-card .form-control {
    min-height: 44px;
    border-radius: 14px;
    border: 1px solid #bae6fd;
    box-shadow: none;
    padding: 10px 13px;
    color: #0f172a;
    background: #f8fbff;
    transition: border-color .18s ease, box-shadow .18s ease, background .18s ease;
}
.reset-password-card .form-control:focus {
    border-color: #38bdf8;
    background: #ffffff;
    box-shadow: 0 0 0 4px rgba(56, 189, 248, .18);
}
.reset-password-card .has-error .form-control,
.reset-password-card .form-group.has-error .form-control {
    border-color: #fb7185;
    box-shadow: 0 0 0 4px rgba(251, 113, 133, .14);
}
.reset-password-card .text-danger { color: #e11d48; }
.reset-password-required {
    margin: 6px 0 18px;
    font-size: 12px;
    color: #64748b;
}

.reset-password-actions {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    justify-content: flex-start;
    padding: 0;
    margin-top: 8px;
    border-top: 0;
}
.reset-password-actions .btn,
.reset-password-card .btn {
    border-radius: 999px !important;
    padding: 10px 18px;
    font-weight: 700;
    border: 0;
    transition: transform .18s ease, box-shadow .18s ease, background .18s ease;
}
.reset-password-actions .btn:hover,
.reset-password-card .btn:hover {
    transform: translateY(-2px);
}
.reset-password-actions .btn-primary,
.reset-password-actions .btn-info,
.reset-password-actions .btn-success,
.reset-password-card .btn-primary,
.reset-password-card .btn-info,
.reset-password-card .btn-success {
    background: linear-gradient(135deg, #0284c7, #38bdf8) !important;
    color: #ffffff !important;
    box-shadow: 0 12px 24px rgba(2, 132, 199, .22);
}
.reset-password-actions .btn-default,
.reset-password-actions .btn-secondary,
.reset-password-card .btn-default,
.reset-password-card .btn-secondary {
    background: #e0f2fe !important;
    color: #075985 !important;
    border: 1px solid #bae6fd !important;
}

@media (max-width: 640px) {
    .reset-password-page { padding: 20px 12px; align-items: flex-start; }
    .reset-password-hero { padding: 23px 20px; }
    .reset-password-hero-content { align-items: flex-start; }
    .reset-password-icon { width: 50px; height: 50px; min-width: 50px; }
    .reset-password-body { padding: 22px 20px; }
}
</style>

<div class="reset-password-page">
    <div class="reset-password-card" id="<?= $controller; ?>-panel-default-form">
        <div class="reset-password-hero" id="<?= $controller; ?>-panel-heading-form">
            <div class="reset-password-hero-content" id="<?= $controller; ?>-panel-heading-form-title">
                <div class="reset-password-icon"><i class="fa fa-lock"></i></div>
                <div>
                    <h3><?= $title; ?></h3>
                    <p>Masukkan email yang terdaftar. Sistem akan mengirim tautan aman untuk membuat kata sandi baru.</p>
                </div>
            </div>
        </div>

        <div class="reset-password-body" id="<?= $controller; ?>-panel-body-form">
            <div class="reset-password-hint">
                <i class="fa fa-info-circle"></i>
                <div>
                    <strong>Periksa inbox atau spam email Anda</strong>
                    <span>Pastikan email yang dimasukkan sama dengan email akun SIPERBEN yang terdaftar.</span>
                </div>
            </div>
            <!-- formcc -->
            <form id="<?= $controller; ?>_form-edit" onsubmit="<?= $form['method_form']['method']; ?>;return false;">
                <?php
                $tot_required = 0;
                foreach ($form as $k => $v) {
                    $name = str_replace(".", "_", $k);
                    if ($v['required']) $tot_required++;
                    if ($v['hide'] == TRUE) {
                        echo $v['crit'];
                    } else {
                        if ($v['iscontroller'] == false) {
                ?>
                            <div class="form-group div_<?= $name; ?>">
                                <?php if (trim($v['label']) != '') { ?>
                                    <label class="form-label"><?= $v['label']; ?><?= $v['required'] ? ' <span class="text-danger">*</span>' : ''; ?></label>
                                <?php } ?>
                                <?= $v['crit']; ?>
                            </div>
                <?php
                        }
                    }
                }
                ?>
                <?php if ($tot_required != 0) { ?>
                    <div class="reset-password-required">
                        <span class="text-danger">*</span> Field wajib diisi
                    </div>
                <?php } ?>

                <div class="reset-password-actions">
                    <?php
                    $buttons_form = "";
                    foreach ($form['button_form'] as $k => $v) {
                        $buttons_form .= $v . '&nbsp;';
                    }
                    echo $buttons_form;
                    ?>
                </div>
            </form>
            <!-- end formcc -->

            <?php
            foreach ($form as $k => $v) {
                if ($v['iscontroller'] == true) {
            ?>
                    <div class="form-group mt-3">
                        <label class="form-label"><?= $v['label']; ?></label>
                        <?= $v['crit']; ?>
                    </div>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>

<?= $js; ?>

