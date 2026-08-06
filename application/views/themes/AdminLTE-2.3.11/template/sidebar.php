<ul class="sidebar-menu">
        <li id='header' class="header">HEADER</li>
			<li>      					
				<?php if ( isset($this->session->userdata['logged_in']) ) {
						//echo $CI->mylibraryext->rekursifAdminLTE(0, $this->session->userdata['groupid'], 1);
						$menu_html = $this->session->userdata[$this->config->item('session').'_ar_menu'];
						if (function_exists('inject_perbend_menu_badges')) $menu_html = inject_perbend_menu_badges($menu_html);
						echo $menu_html;
				}?>
			</ul>
