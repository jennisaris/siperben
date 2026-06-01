<ul class="sidebar-menu">
        <li id='header' class="header">HEADER</li>
			<li>      					
				<?php if ( isset($this->session->userdata['logged_in']) ) {
						//echo $CI->mylibraryext->rekursifAdminLTE(0, $this->session->userdata['groupid'], 1);
						echo $this->session->userdata[$this->config->item('session').'_ar_menu'];
				}?>
			</ul>
