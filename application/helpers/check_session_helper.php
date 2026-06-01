<?php
$CI =&get_instance();
//load library session manually, it's seems not autoload

$CI->load->library('session');

//echo 'before';
//print_r($CI->session);

//$CI->load->helper('write_log');
//$CI->load->helper('access_menu');
//$CI->load->helper('own');

//assign session
$user = $CI->session->userdata['logged_in'];
$controller = $CI->router->class;
$exclude_controller = $CI->config->item('exclude_controller');
$dashboard_index    = $CI->config->item('dashboard_index');
$redirect_dashboard = $CI->config->item('redirect_dashboard');
$exclude_ext 		= $CI->config->item('exclude_ext');

//echo 'a : '.$CI->session->userdata['groupid'];
//echo 'tes : '.$controller;
//exit;
write_log();
//set to last url

//echo $user.' => '.strtolower($controller);exit;

if ( empty($user) && strtolower($controller) != "user_authentication" ) {
	//echo 'bla.....';
	//print_r($CI->session);
	//exit;
	if ( !$CI->input->is_ajax_request() ) {
		//echo 'satu..';

		 if ( $CI->uri->segment(1).'/'.$CI->uri->segment(2) == '/' ) {
		 	 //echo 'satu..1';
		 	 //exit;
             redirect($redirect_dashboard, 'refresh');
         } else {
         	//echo $CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.$CI->uri->segment(3)."<br/>";
			//echo $CI->uri->segment(1).'/'.$CI->uri->segment(2)."<br/>";
			//echo $CI->uri->segment(1);
			//print_r($exclude_controller);
			//exit;
         	if ( !in_array($CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.$CI->uri->segment(3), $exclude_controller) 
				&& !in_array($CI->uri->segment(1).'/'.$CI->uri->segment(2), $exclude_controller) 
				&& !in_array($CI->uri->segment(1), $exclude_controller)) {
         		//echo 'satu..2';
                $last_url = current_url();
				$ext = end(explode(".", $last_url));
				if ( !in_array($ext, $exclude_ext) ) $CI->session->set_userdata('last_url', $last_url);
				
				//echo 'diset..';
				//print_r($CI->session);
				//exit;
                redirect("privileges/user_authentication", 'refresh');
            } else return true;
		 }
	} else {
		//echo 'dua..';exit;
		if ( $CI->uri->segment(1).'/'.$CI->uri->segment(2) != $redirect_dashboard ) {
			//echo 'dua..1';exit;
			if ( !in_array($CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.$CI->uri->segment(3), $exclude_controller) 
				&& !in_array($CI->uri->segment(1).'/'.$CI->uri->segment(2), $exclude_controller) 
				&& !in_array($CI->uri->segment(1), $exclude_controller)) {
					$last_url = base_url().$CI->uri->segment(1).'/'.$CI->uri->segment(2);
					$CI->session->set_userdata('last_url', $last_url);
					redirect("privileges/user_authentication", 'refresh');
			} else return true;
        } else return true;
	}
	//echo 'tiga..';exit;
	$CI->session->set_userdata('last_url', $last_url);
	redirect("privileges/user_authentication", 'refresh');
} else {
	//echo 'empat';
	if ( $CI->input->is_ajax_request() ) {
		//echo 'empat..1';exit;
		if ( empty($CI->session->userdata['header_controller']) ) $controller = $CI->uri->segment(1).'/'.$CI->uri->segment(2);
		else $controller =  $CI->session->userdata['header_controller'];

		access_menu(strtolower($controller), $CI->session->userdata['groupid']);

	} else {
		//echo 'empat..2';
		//echo $CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.$CI->uri->segment(3);exit;
		if ( !in_array($CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.$CI->uri->segment(3), $exclude_controller) 
				&& !in_array($CI->uri->segment(1).'/'.$CI->uri->segment(2), $exclude_controller) 
				&& !in_array($CI->uri->segment(1), $exclude_controller)) {
			$controller = $CI->uri->segment(1).'/'.$CI->uri->segment(2);
			if (trim($controller) == "/") { redirect($dashboard_index);
			} else {
			   access_menu(strtolower($controller), $CI->session->userdata['groupid']);
            }
		} else return true;
	}

	return true;
}
?>
