
<!DOCTYPE html>
<html lang="en">
<head>
<?php
$CI =& get_instance();
$sysparam = $CI->session->sysparam;
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $sysparam->nama_app_title[0] ?? 'SIPERBEN KEMDIKDASMEN' ?></title>

    <!-- ================== GLOBAL CSS ================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    
    <!-- jQuery UI -->
    <link rel="stylesheet" href="<?= base_url('assets/jquery/css/jquery-ui-1.9.2.custom.min.css'); ?>">

    <!-- jsTree -->
    <link rel="stylesheet" href="<?= base_url('assets/jstree/themes/default/style.min.css'); ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/all.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/font-awesome/css/fontawesome.min.css'); ?>">

    <!-- Select2 -->
    <link rel="stylesheet" href="<?= base_url('assets/css/select2.min.css'); ?>">

    <!-- Validator -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrapValidator.min.css'); ?>">

    <!-- Summernote (ganti wysihtml5 + ckeditor dengan ini) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.css">

    <!-- Datetime Picker -->
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap/css/bootstrap-datetimepicker.min.css'); ?>">
    
    <!-- Daterangepicker -->
    <link rel="stylesheet" href="<?= base_url('assets/jquery/css/daterangepicker.css'); ?>">

    <!-- Google Fonts (lokal) -->
    <link rel="stylesheet" href="<?= base_url('assets/css/googlefonts.css'); ?>">

    <!-- Style Custom -->
    <link rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">

    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/logo.png'); ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('assets/images/logo.png'); ?>" type="image/x-icon">

    <!-- AdminLTE -->
    <link rel="stylesheet" href="<?= $_theme; ?>template/assets/dist/css/AdminLTE.css">
    <link rel="stylesheet" href="<?= $_theme; ?>template/assets/dist/css/skins/_all-skins.min.css">

    <!-- ================== GLOBAL JS ================== -->

    <!-- jQuery & jQuery UI -->
    <script src="<?= base_url('assets/jquery/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/jquery/js/jquery-ui-1.9.2.custom.min.js'); ?>"></script>

    <!-- Bootstrap -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>

    <!-- Plugin Tambahan -->
    <script src="<?= base_url('assets/bootstrap/js/bootstrap3-typeahead.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bloodhound.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap3-wysihtml5.all.min.js'); ?>"></script>
   <!-- Summernote -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote-lite.min.js"></script>
    <script src="<?= base_url('assets/ckeditor/ckeditor.js'); ?>"></script>
    <script src="<?= base_url('assets/js/select2.full.min.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.0/dist/sweetalert2.all.min.js"></script>
    <script src="<?= base_url('assets/js/autoNumeric-1.8.2.js'); ?>"></script>
    <script src="<?= base_url('assets/jstree/jstree.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.mask.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootbox.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/moment.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/locales.min.js'); ?>"></script>
    <script src="<?= base_url('assets/bootstrap/js/bootstrap-datetimepicker.min.js'); ?>"></script>
    <script src="<?= base_url('assets/jquery/js/daterangepicker.js'); ?>"></script>
    <script src="<?= base_url('assets/js/pdfobject.min.js'); ?>"></script>

    <!-- TinyMCE -->
    <script src="https://cdn.jsdelivr.net/npm/tinymce@6.6.0/tinymce.min.js"></script>

    <!-- AdminLTE -->
    <script src="<?= $_theme; ?>template/assets/dist/js/app.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
