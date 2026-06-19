<?php
$CI =&get_instance();
//load library session manually, it's seems not autoload

$CI->load->library('session');

//assign session
$user = isset($CI->session->userdata['logged_in']) ? $CI->session->userdata['logged_in'] : null;
$controller = $CI->router->class;
$exclude_controller = $CI->config->item('exclude_controller');
$dashboard_index    = $CI->config->item('dashboard_index');
$redirect_dashboard = $CI->config->item('redirect_dashboard');
$exclude_ext 		= $CI->config->item('exclude_ext');

write_log();

if ( empty($user) && strtolower($controller) != "user_authentication" ) {
	if ( !$CI->input->is_ajax_request() ) {
		 if ( $CI->uri->segment(1).'/'.$CI->uri->segment(2) == '/' ) {
	             redirect($redirect_dashboard, 'refresh');
	     } else {
        	if ( !in_array($CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.$CI->uri->segment(3), $exclude_controller) 
				&& !in_array($CI->uri->segment(1).'/'.$CI->uri->segment(2), $exclude_controller) 
				&& !in_array($CI->uri->segment(1), $exclude_controller)) {
                $last_url = current_url();
				$ext = end(explode(".", $last_url));
				if ( !in_array($ext, $exclude_ext) ) $CI->session->set_userdata('last_url', $last_url);
                redirect("privileges/user_authentication", 'refresh');
            } else return true;
		 }
	} else {
		if ( $CI->uri->segment(1).'/'.$CI->uri->segment(2) != $redirect_dashboard ) {
			if ( !in_array($CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.$CI->uri->segment(3), $exclude_controller) 
				&& !in_array($CI->uri->segment(1).'/'.$CI->uri->segment(2), $exclude_controller) 
				&& !in_array($CI->uri->segment(1), $exclude_controller)) {
					$last_url = base_url().$CI->uri->segment(1).'/'.$CI->uri->segment(2);
					$CI->session->set_userdata('last_url', $last_url);
					redirect("privileges/user_authentication", 'redirect');
			} else return true;
        } else return true;
	}
	$CI->session->set_userdata('last_url', $last_url);
	redirect("privileges/user_authentication", 'refresh');
} else {
	if ( $CI->input->is_ajax_request() ) {
		if ( empty($CI->session->userdata['header_controller']) ) $controller = $CI->uri->segment(1).'/'.$CI->uri->segment(2);
		else $controller =  $CI->session->userdata['header_controller'];

		access_menu(strtolower($controller), $CI->session->userdata['groupid']);

	} else {
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
