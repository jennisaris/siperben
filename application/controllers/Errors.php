<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Errors extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index() {		
	}
	
	public function page_missing() {
		$this->template->display('page_missing/index', $data, TRUE);
	}
}
