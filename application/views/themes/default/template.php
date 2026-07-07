<?php
$CI =&get_instance();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">	
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?=$CI->config->item('nama_app_title');?></title>

<script src="<?=base_url();?>assets/jquery/js/jquery-1.12.3.min.js"></script>
<script src="<?=base_url();?>assets/js/autoNumeric-1.8.2.js"></script>

<script src="<?=base_url();?>assets/jquery/js/jquery.hotkeys.js"></script>

<script src="<?=base_url();?>assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?=base_url();?>assets/bootstrap/js/bootstrap3-typeahead.min.js"></script>
<script src="<?=base_url();?>assets/bootstrap/js/bloodhound.min.js"></script>
<script src="<?=base_url();?>assets/bootstrap/js/bootstrap3-wysihtml5.all.min.js"></script>
<script src="<?=base_url();?>assets/summernote/summernote.js"></script>
<script src="<?=base_url();?>assets/ckeditor/ckeditor.js"></script>

<script src="<?=base_url();?>assets/jquery/js/jquery-ui-1.9.2.custom.min.js"></script>

<!-- JTree Table -->
<script src="<?=base_url();?>assets/jquery/js/jquery.treetable.js"></script>

<!-- Bootstrap -->
<link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="<?=base_url();?>assets/css/style.css">

<link rel="stylesheet" href="<?=base_url();?>assets/jquery/css/jquery-ui-1.9.2.custom.min.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="<?=base_url();?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">

<link rel="stylesheet" href="<?=base_url();?>assets/css/sidebar.css">

<link href="<?=base_url();?>assets/jquery/css/jquery.treetable.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="<?=base_url();?>assets/bootstrap/css/bootstrap3-wysihtml5.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="<?=base_url();?>assets/summernote/summernote.css" rel="stylesheet" media="screen">

<!-- validator -->
<link href="<?=base_url();?>assets/bootstrap/css/bootstrapValidator.min.css" rel="stylesheet">

<!-- Select2 -->
<link href="<?=base_url();?>assets/css/select2.min.css" rel="stylesheet">

<!-- TinyMCE --> 
<script src="<?=base_url();?>assets/tinymce/tinymce.min.js"></script>

<!-- validator -->
<script src="<?=base_url();?>assets/bootstrap/js/bootstrapValidator.min.js"></script>

<!-- Select2 JavaScript -->
<script src="<?=base_url();?>assets/js/select2.full.min.js"></script>
<script src="<?=base_url();?>assets/js/select2.min.js"></script>

<script src="<?=base_url();?>assets/js/func.js"></script>

<script src="<?=base_url();?>assets/js/moment.min.js"></script>
<script src="<?=base_url();?>assets/js/locales.min.js"></script>

<script src="<?=base_url();?>assets/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
<link href="<?=base_url();?>assets/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

<script src="<?=base_url();?>assets/jquery/js/daterangepicker.js"></script>
<link href="<?=base_url();?>assets/jquery/css/daterangepicker.css" rel="stylesheet">

<!-- Jquery Mask -->
<script src="<?=base_url();?>assets/js/jquery.mask.min.js"></script>

<!-- Bootbox -->
<script src="<?=base_url();?>assets/bootstrap/js/bootbox.min.js"></script>

<!-- jstree CSS -->
<link href="<?=base_url();?>assets/jstree/themes/default/style.min.css" rel="stylesheet">

<!-- Metis Menu Plugin JavaScript -->
<script src="<?=base_url();?>assets/jstree/jstree.min.js"></script>

<link rel="stylesheet" href="<?=base_url();?>assets/css/googlefonts.css">    

<!-- Favicon -->
<link rel="shortcut icon" href="<?=base_url();?>assets/images/logo_tutwuri.png" type="image/x-icon">
<link rel="icon" href="<?=base_url();?>assets/images/logo_tutwuri.png" type="image/x-icon">

<script type='text/javascript'>
	//alert('berangkat');
	//document.onkeydown = function(e) {stopDefaultBackspaceBehaviour(e);}
	//document.onkeypress = function(e) {stopDefaultBackspaceBehaviour(e);} 
</script>


<style>
/* OPTIMIZED: hapus overlay/spinner loading global di semua menu */
#divLoading, #divLoading.show { display: none !important; visibility: hidden !important; opacity: 0 !important; pointer-events: none !important; }
</style>
</head>
<body>
<?php
$CI =&get_instance(); 
if ( $CI->session->logged_in == 1) {
?>
<!--header -->	
<?php echo $_header;?>

<!--Area Top Menu-->
<?php echo $_top_menu;
}
?>

<!--Breadcrumbs-->
<?php if ( $CI->session->logged_in == 1) {?>
<?php echo $_breadcrumbs;?>
<?php }?>

<!--Area content-->
<?php /*if ( $CI->session->logged_in == 1) {?>
<div style='margin-top:190px;'><!-- -30px -->
	<?php echo $_content;?>
</div>	
<?php } else {?>
<?php echo $_content;?>
<?php }*/?>

<!--Area content-->
<?php if ( $CI->session->logged_in == 1) {?>
<div style='margin-top:-30px;'><!-- -30px -->
	<?php echo $_content;?>
</div>	
<?php require_once "template/modal.php";?>
<script type='text/javascript'>
	showDivConfirm('<?php echo base_url()?>dashboard/listsOfConfirmation');
</script>
	
<?php } else {?>
<?php echo $_content;?>
<?php }?>

<?php if ( $CI->session->logged_in == 1) {?>
<!-- Footer -->
<?php echo $_footer;?>
<?php }?>

<div style="clear: both;"></div>
<div id="divLoading">Please Wait....</div>

<?php //require_once "modules/user/views/form_login_ajax.php";?>

</body>
</html>
