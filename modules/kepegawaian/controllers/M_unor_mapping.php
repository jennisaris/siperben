<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_unor_mapping extends MX_Controller {
  var $prefix = 'kepeg';
  var $table;
	public function __construct() {
		parent::__construct();
		$controller = "kepegawaian/m_unor_mapping";
		$this->table  = $this->prefix."_m_unor";

    $this->_setTitle('_TITLE_');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);

		//clear session header_controller
		$this->session->unset_userdata('header_controller'); 
	}
	
  function app_m_unor_output() {
        $js = "<script type='text/javascript'>
                    $(document).ready(function() {
            
                    });
                </script>
            ";

        return $js;
  }
}