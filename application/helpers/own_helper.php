<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('access_menu')){
  function access_menu($menu_controller, $group_id) {
		  $menu_controller = trim($menu_controller);
    	$CI =&get_instance();
      $prefix   = $CI->config->item('dbprefix');
        
  		if ( $group_id == '' ) $group_id = 0;
  		else $group_id = trim($group_id);
  		
  		$sql = "SELECT b.imenuid, max(b.iallowview) as iallowview, 
  				  max(b.iallowadd) as iallowadd, max(b.iallowedit) as iallowedit, 
  				  max(b.iallowdelete) as iallowdelete 
  				  FROM {$prefix}t_menu a, {$prefix}t_menu_group_privileges b
  				  WHERE a.id = b.imenuid and a.cmenucontroller = '{$menu_controller}'
  				  and b.igroupid in ({$group_id}) group by b.imenuid";
  		//echo $sql;
  		//exit;
  		$query = $CI->db->query($sql);
  		if ( $query ) {
  			$row = $query->row();
  
  			//session
  			$CI->session->set_userdata('allowview', $row->iallowview);
  			$CI->session->set_userdata('allowadd', $row->iallowadd);
  			$CI->session->set_userdata('allowedit', $row->iallowedit);
  			$CI->session->set_userdata('allowdelete', $row->iallowdelete);
  			
  			//$CI->session->set_userdata('tes_saja', 'ok => 1 => '.$row->iallowadd);
  
  			//echo '1 : ';
  			//print_r($CI->session->userdata);
  			//exit;
  			//echo 'set...';
  			//
  		} else {
  			return false;
  		}
	 }
}

if ( ! function_exists('write_log')) {
    function write_log($msg='') {
        $CI =&get_instance();	
        $username = $CI->session->userdata['username'];
		$prefix   = $CI->config->item('dbprefix');
		$exclude_ext = $CI->config->item('exclude_ext');
		$modules_name = $CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.$CI->uri->segment(3);//$CI->router->class.'/'.$CI->router->method;
		$ext_ = explode(".", $modules_name);
		$ext = end($ext_);
		
		//echo 'tes : '.$modules_name;exit;
		
		//$query = $CI->db->last_query();
	    if ( !empty($username) && !in_array($ext, $exclude_ext)) {
	        $timestamp = date('Y-m-d H:i:s');
	        $msg = str_replace("'", "`", $msg);
	        //if ($msg !='' ) echo $msg;
	        $where = [
	          'timelog' => $timestamp,
	          'username' => $username,
	          'modulename' => $modules_name
	        ];
	        $CI->db->select('count(*) as total');
	        $CI->db->where($where);
	        $query = $CI->db->get("{$prefix}t_log");
	        if ( $query->row()->total == 0 ) {
  	        $sql = "INSERT INTO {$prefix}t_log (timelog, username, modulename, querylog)
  	        values ('{$timestamp}', '{$username}', '{$modules_name}', '{$msg}')";
  	        $CI->db->query($sql);
	        }
	    }
    }   
}
?>
