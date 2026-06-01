<div class="navbar-default sidebar" role="navigation">
  <div class="sidebar-nav navbar-collapse">
			<ul class="nav" id="side-menu">
			<li>      					
				<?php if ( isset($this->session->userdata['logged_in']) ) {
						//echo $CI->Menu_model->rekursifSBAdmin2(0, $this->session->userdata['groupid'], 1);
						echo $this->session->userdata['ar_menu'];
				}?>
			</ul>
			</div>
		</div>
	</nav>