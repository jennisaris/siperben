<?php 
$controller = strtolower($controller);
?>
<style>
/* Untuk header panel */
.panel-heading {
    background-color: #337ab7;
    color: white;
    padding: 15px 30px; /* ← ini kuncinya: 20px kiri-kanan */
    font-size: 18px;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}

/* Untuk container form */
.container {
    max-width: 600px;
    margin: 30px auto;
    padding: 20px;
    background-color: #fff;
}

/* Label & input spacing */
.form-group label {
    font-weight: bold;
}

.form-control {
    border-radius: 4px;
    padding: 10px;
    font-size: 14px;
}

/* Tombol spacing */
.modal-footer {
    display: flex;
    justify-content: flex-start;
    gap: 10px;
    padding-top: 20px;
}
</style>

<div class="container">
    <div class="panel panel-default shadow-sm border-0" id="<?= $controller; ?>-panel-default-form">
        <div class="panel-heading" id="<?= $controller; ?>-panel-heading-form">
            <div class="row" id="<?= $controller; ?>-panel-heading-form-title">
                <div class="col-12 text-left">
                    <b><?= $title; ?></b>
                </div>
            </div>
        </div>

        <div class="panel-body bg-light" id="<?= $controller; ?>-panel-body-form">
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
                    <div class="form-text text-muted mb-3">
                        <span class="text-danger">*</span> Field wajib diisi
                    </div>
                <?php } ?>

                <div class="modal-footer">
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

