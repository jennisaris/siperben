<?php
$CI = &get_instance();
$CI->load->model("menu/Menu_model");
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
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
							echo $CI->Menu_model->rekursifMenuSide(0, $this->session->userdata['groupid'], 1);
					}?>
	    		</ul>
	    		
	    		<?php if ( isset($this->session->userdata['logged_in']) ) { ?>
	    		<ul class="nav navbar-nav navbar-right">					
					<li class='dropdown'>
					 <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo substr($this->session->userdata['realname'], 0, 50);?>
					 <i class='glyphicon glyphicon-user' style='margin-top:-1px;'></i></a>
					 <ul class="dropdown-menu">
					 <li><a href="<?php echo base_url();?>user/User_authentication/doLogout">Keluar</a></li>				  
	                 </ul>
					</li>
	    		</ul>
	    		<?php } ?>
	  			</div> 		
		    </div>
		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
