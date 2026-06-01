<!--header -->	
<?php echo $_header;?>

<?php
$CI =&get_instance(); 
if ( $CI->session->logged_in == 1) {
?>	

<!--Area Top Menu-->
<?php echo $_top_menu;?>

<!--Area Side Bar-->
<?php echo $_sidebar;?>

<!--Breadcrumbs-->
<?php echo $_breadcrumbs;?>

<?php
}
?>

<!--Area content-->
<?php if ( $CI->session->logged_in == 1) {?>
<div id="page-wrapper">
  <div class="container-fluid">
  	<div class='row'>  		
		<!--<div style='margin-top: 0px;'>
			<ol class="breadcrumb">			
				<?php
					echo $CI->mylibrary->_createBreadcrumbs();
				?>					
			</ol>
		</div>-->	
		<div style='margin-top: 20px;'>
		  <?php echo $_content;?>
		</div>
	</div>
  </div>
</div>
<?php } else {?>
<div style='margin-left: -60px;'>
	<?php echo $_content;?>
</div>
<?php }?>

<?php if ( $CI->session->logged_in == 1) {?>
<!-- Footer -->
<?php echo $_footer;?>

<?php }?>
<div style="clear: both;"></div>
<div id="divLoading"></div>

