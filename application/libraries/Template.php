<?php
class Template {
	protected $_ci;
	private $prefix;
	
	public function __construct() {
		$this->_ci =&get_instance();
		$this->prefix = $this->_ci->config->item('dbprefix');
	}
	
	function display($template, $data=null) {					
		if (!$this->_ci->input->is_ajax_request()) {	
			$theme = $this->_ci->config->item('theme');
			
			//$this->_ci->Menu_model->getAccessMenu($this->_ci->uri->uri_string, $this->_ci->session->userdata['groupid']);
			// Jangan panggil access_menu untuk guest/login page. Pada sesi kosong,
			// groupid belum ada sehingga query privilege dapat menghasilkan output kosong.
			if (!empty($this->_ci->session->userdata['logged_in'])) {
				if (isset($this->_ci->session->header_controller))
				  access_menu(trim($this->_ci->session->header_controller), $this->_ci->session->userdata['groupid']);	
				else access_menu($this->_ci->uri->segment(1).'/'.$this->_ci->uri->segment(2), $this->_ci->session->userdata['groupid']);
			}
				
			$data['_theme']=base_url().'application/views/themes/'.$theme.'/';
					
			//$uri_segment = $this->_ci->uri->uri_string;
			$uri_segment = $this->_ci->uri->segment(1).'/'.$this->_ci->uri->segment(2).'/'.$this->_ci->uri->segment(3);
			
			//echo 'allowview : '.$this->_ci->session->header_controller." : ".$this->_ci->session->allowview;exit;
			if ( !$this->_ci->session->isnewwindow ) {
				if ( $uri_segment != 'user/User/ChgPwd' ) {
					if ( !$this->_ci->session->allowview && $this->_ci->session->logged_in == 1 ) {							
						$data['_content']   = $this->_ci->load->view('page_missing/index', $data, TRUE);			
					} else {
						$data['_content']   = $this->_ci->load->view($template, $data, TRUE);
					}
				} else $data['_content']   = $this->_ci->load->view($template, $data, TRUE);
				
				$data['_js']    = $this->_ci->load->view('output/js', $data, TRUE);
				$data['_header']    = $this->_ci->load->view('themes/'.$theme.'/template/header', $data, TRUE);
				$data['_top_menu']  = $this->_ci->load->view('themes/'.$theme.'/template/menu', $data, TRUE);
				$data['_sidebar']  = $this->_ci->load->view('themes/'.$theme.'/template/sidebar', $data, TRUE);
				$data['_breadcrumbs'] = $this->_ci->load->view('themes/'.$theme.'/template/breadcrumbs', $data, TRUE);
				$data['_footer']  = $this->_ci->load->view('themes/'.$theme.'/template/footer', $data, TRUE);
			} else {

				$data['_js'] = $this->_ci->load->view('output/js', $data, TRUE);
				$data['_header']    = $this->_ci->load->view('themes/'.$theme.'/template/header', $data, TRUE);
				$data['_content']   = $this->_ci->load->view($template, $data, TRUE);

			}
			
			$this->_ci->load->view('themes/'.$theme.'/template.php', $data);
		} else {
			
			$data['_content']   = $this->_ci->load->view($template, $data, TRUE);
			$this->_ci->load->view('themes/template.php', $data);
		} 
	}
	
  public function _createBreadcrumbs() {
      if (isset($this->_ci->session->header_controller))
  		  $mod = trim($this->_ci->session->header_controller);
  		else $mod = $this->_ci->uri->segment(1).'/'.$this->_ci->uri->segment(2);//$this->_ci->router->uri->uri_string;
  		
  		$i = 0;
  		//$x = sizeOf($cont) - 1;
  		$tmpPath  = array();
  		$menuPath = array();
  		$path = array();
  
  		$menu = explode("|", $this->_getMenuParentId($mod));
  		$menuPath = $this->_getPathMenu($menu[0], $path);
  
  		$crumb = "<li><a href='#'><i class='glyphicon glyphicon-home' style='margin-top:-1px;'></i> Home</a></li>";
  		if ( is_array($menuPath) && sizeOf($menuPath) > 0 ) {
  			foreach($menuPath as $v) {
  			  $v = str_replace("<br>", "", $v);
  				if ($i == $this->_getMenuId($mod)) {
  					$crumb .= "<li class='active'>".$v."</li>";
  				}else {
  					$crumb .= "<li><a href='#'>".$v."</a></li>";
  				}
  				$i;
  			}
  
       		$menu[1] = str_replace("<br>", "", $menu[1]);
  			$crumb .= "<li><a href='#'>".$menu[1]."</a></li>";
  		} else {
  		  $menu[1] = str_replace("<br>", "", $menu[1]);
  		  $crumb .= "<li><a href='#'>".$menu[1]."</a></li>";
  		}
  
  		if ( $this->_ci->uri->segment(3) != '' && strtolower($this->_ci->uri->segment(3)) != 'index') $crumb .= "<li><a href='#'>".($this->_ci->uri->segment(3) == 'edit' && $this->_ci->uri->segment(4) == 0 ? 'add' : $this->_ci->uri->segment(3))."</a></li>";
  		if ( $this->_ci->uri->segment(4) != '' && $this->_ci->uri->segment(4) != 0 ) $crumb .= "<li><a href='#'>".ucwords($this->_ci->uri->segment(4))."</a></li>";
  
  		return $crumb;
	}
	
	public function _getMenuParentId($controller) {
		$sql = "SELECT iparentid, cmenuname from {$this->prefix}t_menu where cmenucontroller = '{$controller}'";
		$query = $this->_ci->db->query($sql);
		if ( $query ) {
			$rx = $query->row_array();
			return $rx['iparentid']."|".$rx['cmenuname'];
		}
	}
	
	public function _getMenuId($controller) {
		$sql = "SELECT id from {$this->prefix}t_menu where cmenucontroller = '{$controller}'";
		$query = $this->_ci->db->query($sql);
		if ( $query ) {
			$rx = $query->row_array();
			return $rx['id'];
		} else return null;
	}
	
	public function _getPathMenu($parentId, &$path) {
	  $parentId = ($parentId == '' ? 0 : $parentId);
		$sql = "select iparentid, cmenuname from {$this->prefix}t_menu where id = '{$parentId}'";
		$query = $this->_ci->db->query($sql);
		if ( $query ) {
			$rs = $query->result_array();
			foreach ($rs as $r) {
				//$path[] = $r['cmenuname'];
				array_unshift($path, $r['cmenuname']);
				
				if ( $r['iparentid'] == 0) break;
				$this->_getPathMenu($r['iparentid'], $path);
			}
			return $path;
		} else return null;		
	}		
	
}
