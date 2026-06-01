<?php
$CI =&get_instance();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?=$CI->config->item('nama_app_title');?></title>
    
    <!-- GLOBAL -->

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url();?>assets/jquery/css/jquery-ui-1.9.2.custom.min.css">
    
    <!-- jstree CSS -->
    <link href="<?=base_url();?>assets/jstree/themes/default/style.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url();?>assets/font-awesome/css/all.min.css" rel="stylesheet" type="text/css">
    
    <!-- Select2 -->
    <link href="<?=base_url();?>assets/css/select2.min.css" rel="stylesheet">
    
    <!-- bootstrap validator -->
    <link href="<?=base_url();?>assets/bootstrap/css/bootstrapValidator.min.css" rel="stylesheet">

     <!-- TinyMCE -->
    <script src="<?=base_url();?>assets/tinymce/tinymce.min.js"></script>    

    <!-- jQuery -->
    <script src="<?=base_url();?>assets/jquery/js/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/jquery/js/jquery-ui-1.9.2.custom.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/bootstrap/js/bootstrap3-typeahead.min.js"></script>
    <script src="<?=base_url();?>assets/bootstrap/js/bloodhound.min.js"></script>
    <script src="<?=base_url();?>assets/bootstrap/js/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="<?=base_url();?>assets/summernote/summernote.js"></script>
    <script src="<?=base_url();?>assets/ckeditor/ckeditor.js"></script>
    
    <!-- Select2 JavaScript -->
    <script src="<?=base_url();?>assets/js/select2.full.min.js"></script>
	
	<!-- SweetAlert2 -->
	<script src="<?=base_url();?>assets/js/sweetalert2.min.js"></script>
	<link href="<?=base_url();?>assets/bootstrap/css/sweetalert2.min.css" rel="stylesheet">
    
    <script src="<?=base_url();?>assets/js/autoNumeric-1.8.2.js"></script>
    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url();?>assets/jstree/jstree.min.js"></script>
    
    <link rel="stylesheet" href="<?=base_url();?>assets/css/googlefonts.css">
	
	<!-- Jquery Mask -->
	<script src="<?=base_url();?>assets/js/jquery.mask.min.js"></script>

    <!-- Bootbox -->
    <script src="<?=base_url();?>assets/bootstrap/js/bootbox.min.js"></script>

	<link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">

    <script src="<?=base_url();?>assets/js/moment.min.js"></script>
    <script src="<?=base_url();?>assets/js/locales.min.js"></script>

    <script src="<?=base_url();?>assets/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    <link href="<?=base_url();?>assets/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

    <script src="<?=base_url();?>assets/jquery/js/daterangepicker.js"></script>
    <link href="<?=base_url();?>assets/jquery/css/daterangepicker.css" rel="stylesheet">

    <script src="<?=base_url();?>assets/js/pdfobject.min.js"></script>
    
    <!-- Favicon -->
	<link rel="shortcut icon" href="<?=base_url();?>assets/images/logo.png" type="image/x-icon">
	<link rel="icon" href="<?=base_url();?>assets/images/logo.png" type="image/x-icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- END GLOBAL -->

    <!-- AdminLTE App -->
    <link rel="stylesheet" href="<?php echo $_theme;?>template/assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="<?php echo $_theme;?>template/assets/dist/css/skins/skin-blue.min.css">
    <script src="<?php echo $_theme;?>template/assets/dist/js/app.js"></script>
    <!-- <script src="<?php echo $_theme;?>template/assets/gstatic/loader.js"></script> -->
</head>

