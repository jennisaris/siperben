<?php
$CI =&get_instance();
?>
<body class="hold-transition skin-blue sidebar-mini">
	
	<div class="row">
		<div class="col-md-1" style="padding:10px; margin-left:20px;">
			<center>
			<a href="#" target="_blank">
				<img src="<?=base_url().$CI->config->item('logo_app');?>" width="90px">
			</a>
			</center>
		</div>
		<div class="col-md-10" style="margin-left:0px;">
			<h3 class='site-title' style='color: #000'>
				<b><?=$CI->config->item('nama_app');?></b>
			</h3>
			<h4>
				<?=$CI->config->item('nama_pt');?>
			</h4>
		</div>
	</div>
	
    <div class="wrapper">
<!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?=$CI->config->item('nama_app_sm');?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?=$CI->config->item('nama_app_lg');?></span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!--<img src="<?=base_url();?>assets/images/images.png" class="user-image" alt="User Image">-->
				<?php if ( $CI->session->vphoto != NULL ) {?>
					<img src="<?=base_url().$CI->session->vphoto;?>" class="user-image" alt="User Image">
				<?php } else { ?>
                <img src="<?=base_url();?>assets/images/images.png" class="user-image" alt="User Image">
				<?php } ?>
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"><?php echo substr($this->session->userdata['realname'], 0, 50);?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
				<?php if ( $CI->session->vphoto != NULL ) {?>
					<img src="<?=base_url().$CI->session->vphoto;?>" class="img-circle" alt="User Image">
				<?php } else { ?>
                <img src="<?=base_url();?>assets/images/images.png" class="img-circle" alt="User Image">
				<?php } ?>
                <p>
                  <small><?php echo substr($this->session->userdata['realname'], 0, 50);?> - <?=trim($this->session->userdata['jabname']);?></small>
                  <!-- <small>Last Visited <?=$this->session->userdata['tlastvisited'];?></small>-->
                </p>
              </li>
              <!-- Menu Body -->
<!--              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
<!--              </li>-->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<?=base_url();?>privileges/change_password/edit/<?=$this->session->userid?>" class="btn btn-default btn-flat">Ubah Password</a>
                </div>
                <div class="pull-right">
                  <a href="<?=base_url();?>privileges/user_authentication/dologout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
			<?php if ( $CI->session->vphoto != NULL ) {?>
				<img src="<?=base_url().$CI->session->vphoto;?>" class="img-circle" alt="User Image">
			<?php } else { ?>
			<img src="<?=base_url();?>assets/images/images.png" class="img-circle" alt="User Image">
			<?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo substr($this->session->userdata['realname'], 0, 20);?></p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- search form (Optional) -->
      <!--<form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <?=require_once "sidebar.php";?>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
