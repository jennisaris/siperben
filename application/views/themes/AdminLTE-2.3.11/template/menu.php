<?php
$CI =&get_instance();
$sysparam = (object)$CI->session->sysparam;

//notifications-menu
//print_r($this->session->groupid);
$groupsid = ($CI->session->groupid == '' ? "''" : $CI->session->groupid);

$sql = "Select * from app_notification 
		  where groupid in ({$groupsid}) 
		  and isread = 0 and usulanid IS NOT NULL";
//echo $sql;exit;
$notifs = $CI->db->query($sql)->result();
$total_notifs =sizeOf($notifs);
//print_r($notifs);
//exit;
//kita groups
$groups = [];
foreach($notifs as $k=>$n) {
  //print_r($n);
  //echo $n->groupid;
  //print_r($groups);
  //eho "<br/>";
  if (array_key_exists($n->groupid, $groups)) {
    $groups[$n->groupid]['total'] +=1;
	//$groups[$n->groupid]['url'] = $n->url;
  } else {
     $groups[$n->groupid]['total'] = 1; 
     $groups[$n->groupid]['msg'] = $n->msg;
     $groups[$n->groupid]['url'] = $n->url;
  }
  // print_r($groups);
  // echo "<br/>";
}
//print_r($groups);
//exit;
?>
<body class="hold-transition skin-blue sidebar-mini">
	
	<div class="row">
		<div class="col-md-1" style="padding:10px; margin-left:20px;">
			<center>
			<a href="#" target="_blank">
				<img src="<?=base_url().$sysparam->logo_app[0];?>" width="90px">
			</a>
			</center>
		</div>
		<div class="col-md-10" style="margin-left:0px;">
			<h3 class='site-title' style='color: #000'>
				<b><?=$sysparam->nama_app[0];?></b>
			</h3>
			<h4>
				<?=$sysparam->nama_pt[0];?>
			</h4>
		</div>
	</div>
	
    <div class="wrapper">
<!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="#" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><?=$sysparam->nama_app_sm[0];?></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><?=$sysparam->nama_app_lg[0];?></span>
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
          
          <!--
          dropdown.less -->
          <li class="dropdown notifications-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-bell"></i>
              <?php if ( $total_notifs > 0 ) {?>
              <span class="label label-warning"><?=$total_notifs;?></span>
              <?php } ?>
            </a>
            <ul class="dropdown-menu">
              <?php if ( $total_notifs > 0 ) {?>
              <li class="header">You have <?=$total_notifs;?> notifications</li>
              <li>
              <?php } ?>
                <!-- inner menu: contains the actual data -->

                <ul class="menu">
                  <!--<li>
                    <a href="#">
                      <i class="fa fa-users text-aqua"></i> 5 new members joined today
                    </a>
                  </li>-->
                  <?php
                    foreach($groups as $g) {
                  ?>
                  <li>
                    <a href="<?=$g['url'];?>">
                      <i class="fas fa-check-square"></i> <span class='color:black'> <?=$g['total'].' '.$g['msg'];?></span>
                    </a>
                  </li>
                  <?php 
                    }
                  ?>
                  <!--<li>
                    <a href="#">
                      <i class="fa fa-users text-red"></i> 5 new members joined
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      <i class="fa fa-user text-red"></i> You changed your username
                    </a>
                  </li>-->
                </ul>
              </li>
              <?php if ( $total_notifs > 0 ) {?>
              <!--<li class="footer"><a href="#">View all</a></li>--><?php } ?>
            </ul>

          </li>
          <!-- -->
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
            <a href="#" data-toggle="control-sidebar"><i class="fas fa-cog"></i></a>
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
          <p title='<?=$this->session->userdata['realname'];?>'><?php echo (strlen($this->session->userdata['realname']) <= 16 ? $this->session->userdata['realname'] : substr($this->session->userdata['realname'], 0, 16).' ...');?></p>
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
      <form id='ganti_periode-form-edit' class="sidebar-form">
        <div class="input-group" style='width:100%!important'>
          <select name='ganti_periode' id='ganti_periode' class='form-control ganti_periode'>
            <option value=''>-- Ganti Periode --</option>
            <?php
              $sql = "select ctahun from app_t_usulan where ctahun IS NOT NULL group by ctahun";
              $result = $CI->db->query($sql)->result();
              $year = date('Y');
              $ar_tahun[$year] = $year;
              foreach($result as $r) {
                $ar_tahun[$r->ctahun] = $r->ctahun;
              }

              if ( !in_array($year, $ar_tahun)) array_push($ar_tahun);
              
              ksort($ar_tahun);
              foreach ($ar_tahun as $k) {
                if ( $k == $CI->session->settahun ) $selected = ' selected ';
                else $selected = ' ';
            ?>
            <option <?=$selected;?> value='<?=$k;?>'><?=$k;?></option>
            <?php } ?>
          </select>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <?=require_once "sidebar.php";?>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>
  <script type='text/javascript'>
    $(document).ready(function() {
      $('#ganti_periode').on('change', function() {
        if ($(this).val() != '') {
          var url = '<?=base_url();?>perbend/set_tahun';
          table_id = 'ganti_periode';
          var form_name = table_id+'-form-edit';
    		  var formData = new FormData($('#'+form_name)[0]);
    		  save_confirm(url+"/save", formData, 'Ganti periode. Anda yakin ?', table_id, false, function(output) {
    			  var o = jQuery.parseJSON(output);
    			  if ( o.status == true ) {
    			    location.reload(true);
    			  }
          });
        }
      });
    });
    
  </script>
