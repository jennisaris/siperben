<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">	
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sistem Informasi Penyelesaian Dokumen</title>

<script src="<?php echo $_theme;?>template/assets/js/jquery-1.12.3.min.js"></script>
<script src="<?php echo $_theme;?>template/assets/js/autoNumeric-1.5.4.js"></script>
<script src="<?php echo $_theme;?>template/assets/bootstrap/js/bootstrap.min.js"></script>
<script src="<?php echo $_theme;?>template/assets/bootstrap/js/bootstrap3-typeahead.min.js"></script>
<script src="<?php echo $_theme;?>template/assets/bootstrap/js/bloodhound.min.js"></script>
<!-- JSTree -->
<link rel="stylesheet" href="<?php echo $_theme;?>template/assets/jstree/themes/default/style.min.css" />
<script src="<?php echo $_theme;?>template/assets/jstree/jstree.min.js"></script>
<script src="<?php echo $_theme;?>template/assets/js/func.js"></script>

<!-- Bootstrap -->
<link rel="stylesheet" href="<?php echo $_theme;?>template/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="stylesheet" href="<?php echo $_theme;?>template/assets/css/style.css">

<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo $_theme;?>template/assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" media="screen">

<link rel="stylesheet" href="<?php echo $_theme;?>template/assets/css/sidebar.css">

<!-- TinyMCE -->
<script src="<?php echo $_theme;?>template/assets/tinymce/tinymce.min.js"></script>

<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo $_theme;?>template/assets/images/logo_tutwuri.png" type="image/x-icon">
<link rel="icon" href="<?php echo $_theme;?>template/assets/images/logo_tutwuri.png" type="image/x-icon">

<script type='text/javascript'>
	//alert('berangkat');
	document.onkeydown = function(e) {stopDefaultBackspaceBehaviour(e);}
	document.onkeypress = function(e) {stopDefaultBackspaceBehaviour(e);} 
</script>

</head>
<body>
<!--header -->	
<?php echo $_header;?>

<!--Area Top Menu-->
<?php echo $_top_menu;?>

<!--Area sidebar-->
<?php
$CI =&get_instance();
if ( $CI->session->logged_in == 1) echo $_sidebar;
?>


<!--Area content-->
<?php echo $_content;?>

<!-- Footer -->
<?php echo $_footer;?>

<div style="clear: both;"></div>
<div id="divLoading"></div>

</body>
</html>