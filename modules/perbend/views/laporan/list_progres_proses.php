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
                    Daftar usulan perubahan SK pejabat perbendaharaan yang sedang aktif dalam tahap pemrosesan / verifikasi
                    &mdash; Tahun <strong><?= !empty($settahun) ? $settahun : date('Y'); ?></strong>
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
        <div id='progres_proses_table-data' style="width:100%; max-width:100%; overflow-x:auto; display:block;"></div>
        <div class="clearfix"></div>
        <div id='progres_proses_paging-table-data' style='margin-top:12px;'></div>
    </div>
</div>

<script type='text/javascript'>
$(document).ready(function() {
    var searchParams = new URLSearchParams(window.location.search);
    var idParam = searchParams.get('id');
    var qParam  = searchParams.get('q');
    var settahun = '<?= !empty($settahun) ? $settahun : date('Y'); ?>';

    var reqUrl = '<?= base_url(); ?>perbend/progress_usulan_satker/progres_proses_lists/1';

    if (idParam) {
        reqUrl += '?id=' + encodeURIComponent(idParam);
    } else if (qParam) {
        reqUrl += '?q=' + encodeURIComponent(qParam);
    } else {
        reqUrl += '?pub_proses_tahun=' + encodeURIComponent(settahun);
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
                $('#progres_proses_table-data').html(html);
                $('#progres_proses_paging-table-data').html(o.pagination || '');
            } catch(e) {
                console.error('Error loading data:', e);
            }
        },
        error: function(xhr, status, err) {
            console.error('AJAX error:', status, err);
        }
    });
});
</script>
