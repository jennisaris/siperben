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

    <title><?php echo $CI->config->item('nama_pt');?></title>

    <!-- Bootstrap Core CSS -->
    <link href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">

    <link rel="stylesheet" href="<?=base_url();?>assets/jquery/css/jquery-ui-1.9.2.custom.min.css">
    
    <!-- jstree CSS -->
    <link href="<?=base_url();?>assets/jstree/themes/default/style.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="<?php echo $_theme;?>template/assets/metisMenu/css/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $_theme;?>template/assets/sb-admin-2/css/sb-admin-2.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo $_theme;?>template/assets/morrisjs/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?=base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    
    <!-- Select2 -->
    <link href="<?=base_url();?>assets/css/select2.min.css" rel="stylesheet">
    
    <!-- bootstrap validator -->
    <link href="<?=base_url();?>assets/bootstrap/css/bootstrapValidator.min.css" rel="stylesheet">

     <!-- TinyMCE -->
    <script src="<?=base_url();?>assets/tinymce/tinymce.min.js"></script>    

    <!-- jQuery -->
    <script src="<?=base_url();?>assets/jquery/js/jquery.min.js"></script>
    <script src="<?=base_url();?>assets/jquery/js/jquery-ui-1.9.2.custom.min.js"></script>

    <script src="<?php echo $_theme;?>template/assets/sb-admin-2/js/sb-admin-2.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?=base_url();?>assets/bootstrap/js/bootstrap3-typeahead.min.js"></script>
    <script src="<?=base_url();?>assets/bootstrap/js/bloodhound.min.js"></script>
    <script src="<?=base_url();?>assets/bootstrap/js/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="<?=base_url();?>assets/summernote/summernote.js"></script>
    <script src="<?=base_url();?>assets/ckeditor/ckeditor.js"></script>
    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo $_theme;?>template/assets/metisMenu/js/metisMenu.min.js"></script>

    <script src="<?php echo $_theme;?>template/assets/raphael/js/raphael.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo $_theme;?>template/assets/morrisjs/js/morris.min.js"></script>
    
    <!-- Select2 JavaScript -->
    <script src="<?=base_url();?>assets/js/select2.full.min.js"></script>

    <!-- <script src="<?php echo $_theme;?>template/assets/gstatic/loader.js"></script> -->
    
    <script src="<?=base_url();?>assets/js/autoNumeric-1.8.2.js"></script>
    
    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?=base_url();?>assets/jstree/jstree.min.js"></script>
    
    <script src="<?=base_url();?>assets/js/func.js"></script>
    
    <!-- Favicon -->
	<link rel="shortcut icon" href="<?=base_url();?>assets/images/logo.png" type="image/x-icon">
	<link rel="icon" href="<?=base_url();?>assets/images/logo.png" type="image/x-icon">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	
    <div id="wrapper">