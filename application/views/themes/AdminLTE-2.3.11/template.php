<!--header -->	
<?php echo $_header;?>

<!--js-->
<?php echo $_js;?>

<?php
$CI =&get_instance(); 
if ( $CI->session->logged_in == 1) {
?>	

<!--Area Top Menu-->
<?php echo $_top_menu;?>

<!--Area Side Bar-->
<?php //echo $_sidebar;?>

<?php
}
?>

<!--Area content-->
<?php if ( $CI->session->logged_in == 1) {?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <!--<h1>
        Page Header
        <small>Optional description</small>
      </h1>-->
      <!--Breadcrumbs-->
      <?=$_breadcrumbs;?>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Your Page Content Here -->
      <?php echo $_content;?>	

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php } else {
  echo $_content;
}?>

<?php if ( $CI->session->logged_in == 1) {?>
<!-- Footer -->
<?php echo $_footer;?>

<?php }?>
<div style="clear: both;"></div>
<div id="divLoading"></div>


