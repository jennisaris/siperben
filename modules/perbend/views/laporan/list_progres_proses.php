<?php $controller = 'progress_usulan_satker'; ?>
<div class="panel panel-default" style="border-radius: 12px; border: none; box-shadow: 0 10px 25px rgba(15,23,42,0.08); overflow: hidden;">
    <div class="panel-heading" style="background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%); border-bottom: 2px solid #f59e0b; padding: 16px 20px;">
        <div class="row" style="display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 10px;">
            <div class="col-md-8 col-xs-12">
                <h4 style="margin: 0; font-weight: 700; color: #92400e; font-size: 16px;">
                    <i class="fa fa-clock-o text-warning" style="margin-right: 8px;"></i>
                    Notifikasi Progres Usulan Satker (Sedang Diproses)
                </h4>
                <small style="color: #b45309; font-weight: 500; display: block; margin-top: 4px;">
                    Daftar usulan perubahan SK pejabat perbendaharaan yang saat ini sedang aktif dalam tahap pemrosesan / verifikasi.
                </small>
            </div>
            <div class="col-md-4 col-xs-12 text-right">
                <a href="<?= base_url('dashboard/index'); ?>" class="btn btn-default btn-sm" style="border-radius: 8px; font-weight: 600;">
                    <i class="fa fa-arrow-left"></i> Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
    <div class="panel-body" id="panel-body-list" style="padding: 20px;">
        <div style="display: flex; gap: 16px; align-items: center; flex-wrap: wrap; margin-bottom: 16px; background: #f8fafc; padding: 14px 18px; border-radius: 10px; border: 1px solid #e2e8f0;">
            <div>
                <label style="font-size: 11px; color: #475569; margin-bottom: 4px; display: block; font-weight: 600;">Filter Tahun Usulan:</label>
                <select onChange="apply_progres_proses_filter();" name='pub_proses_tahun' id='pub_proses_tahun' class='form-control input-sm' style='width:180px; border-radius: 8px; font-weight: 600;'>
                    <option value='0'>-- Semua Tahun --</option>
                    <?php
                        if (!empty($available_years)) {
                            foreach($available_years as $yr) {
                                $y_val = $yr['ctahun'];
                                echo "<option value='{$y_val}'>Tahun {$y_val}</option>";
                            }
                        } else {
                            echo "<option value='2026'>Tahun 2026</option>";
                            echo "<option value='2025'>Tahun 2025</option>";
                        }
                    ?>
                </select>
            </div>

            <div>
                <label style="font-size: 11px; color: #475569; margin-bottom: 4px; display: block; font-weight: 600;">Filter Bulan Usulan:</label>
                <select onChange="apply_progres_proses_filter();" name='pub_proses_bulan' id='pub_proses_bulan' class='form-control input-sm' style='width:200px; border-radius: 8px;'>
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

            <div style="margin-left: auto;">
                <button type="button" onclick="apply_progres_proses_filter();" class="btn btn-warning btn-sm" style="border-radius: 8px; font-weight: 600; margin-top: 16px;">
                    <i class="fa fa-filter"></i> Terapkan Filter
                </button>
            </div>
        </div>

        <script type="text/javascript">
            function apply_progres_proses_filter() {
                var tahun = $('#pub_proses_tahun').val() || '0';
                var bulan = $('#pub_proses_bulan').val() || '0';
                var reqUrl = "<?=base_url();?>perbend/progress_usulan_satker/progres_proses_lists/1?pub_proses_tahun=" + encodeURIComponent(tahun) + "&pub_proses_bulan=" + encodeURIComponent(bulan);
                
                $.ajax({
                    type: 'POST',
                    url: reqUrl,
                    async: true,
                    cache: false,
                    success: function(responseText) {
                        try {
                            var o = (typeof responseText === 'object') ? responseText : JSON.parse(responseText);
                            var html = (o.html && o.html.html !== undefined) ? o.html.html : (o.html || '');
                            var pagination = o.pagination || '';
                            $('#progres_proses_table-data').html(html);
                            $('#progres_proses_paging-table-data').html(pagination);
                        } catch(e) {
                            console.error(e);
                        }
                    }
                });
            }
        </script>

        <div id='progres_proses_table-data' style="width:100%; max-width:100%; overflow-x:auto; display:block;"></div>
        <div class="clearfix"></div>
        <div id='progres_proses_paging-table-data' style='margin-top:12px;'></div>
    </div>
</div>

<script type='text/javascript'>
$(document).ready(function() {
    var searchParams = new URLSearchParams(window.location.search);
    var idParam = searchParams.get('id');
    var qParam = searchParams.get('q');
    var reqUrl = "<?=base_url();?>perbend/progress_usulan_satker/progres_proses_lists/1";
    
    if (idParam) {
        reqUrl += "?id=" + encodeURIComponent(idParam);
    } else if (qParam) {
        reqUrl += "?q=" + encodeURIComponent(qParam);
    } else {
        // Default: load semua data tanpa filter tahun (tampilkan semua)
        reqUrl += "?pub_proses_tahun=0";
    }
    
    $.ajax({
        type: 'POST',
        url: reqUrl,
        async: true,
        cache: false,
        success: function(responseText) {
            try {
                var o = (typeof responseText === 'object') ? responseText : JSON.parse(responseText);
                var html = (o.html && o.html.html !== undefined) ? o.html.html : (o.html || '');
                var pagination = o.pagination || '';
                $('#progres_proses_table-data').html(html);
                $('#progres_proses_paging-table-data').html(pagination);
            } catch(e) {
                apply_progres_proses_filter();
            }
        },
        error: function() {
            apply_progres_proses_filter();
        }
    });
});
</script>
