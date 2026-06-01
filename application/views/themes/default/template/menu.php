	<div class="container-fluid">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	        <span class="sr-only">Toggle navigation</span>
  		  <span class="icon-bar"></span>
    		  <span class="icon-bar"></span>
    		  <span class="icon-bar"></span>
       </button>
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
  		<li>      					
			<?php if ( isset($this->session->userdata['logged_in']) ) {
					//echo $CI->Menu_model->rekursifMenu(0, $this->session->userdata['groupid'], 1);
					echo $this->session->userdata['ar_menu'];
			}?>
		</ul>
		
		<?php if ( isset($this->session->userdata['logged_in']) ) { ?>
		<ul class="nav navbar-nav navbar-right">					
			<li class='dropdown'>
			 <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo substr($this->session->userdata['realname'], 0, 50);?>
			 <i class='glyphicon glyphicon-user' style='margin-top:-1px;'></i></a>
			 <ul class="dropdown-menu">
			 <li><i class="fa fa-key" aria-hidden="true"></i> <a href="<?php echo base_url();?>privileges/user/chgPwd">Ganti Password</a></li>
			 <li><a href="<?php echo base_url();?>privileges/User_authentication/doLogout">Keluar</a></li>				  
             </ul>
			</li>
		</ul>
		<?php } ?>
		</div>
	</div> 		
 </nav>
