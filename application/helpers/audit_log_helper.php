<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('log_activity')) {
    function log_activity($action, $module, $description = null) {
        $CI =& get_instance();
        if (!isset($CI->db)) {
            $CI->load->database();
        }
        $username = $CI->session->userdata('username');
        if (empty($username)) {
            $username = $CI->input->post('username', TRUE);
        }
        $data = array(
            'username' => !empty($username) ? substr((string)$username, 0, 100) : 'system/guest',
            'action' => substr((string)$action, 0, 100),
            'module' => substr((string)$module, 0, 100),
            'description' => $description,
            'ip_address' => substr((string)$CI->input->ip_address(), 0, 45),
            'created_at' => date('Y-m-d H:i:s')
        );
        return $CI->db->insert('app_t_audit_log', $data);
    }
}
