<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Set_tahun extends MX_Controller {
  var $prefix = 'priv';
	public function __construct() {
		parent::__construct();
		$controller = "perbend/Set_tahun";
		$table  = $this->prefix."_t_user";

		$this->_setModal(true);
		$this->_setTitle('Tahun');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'ctahun', 'Tahun', true, false);

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}
	
	public function manipulate_url_save($save) {
		unset($save);
		//function save(url, table_id, default_txt_confirm='', _ismodal=false, _modals='form-modal', _islochref=false, 
		//_isneedrefresh=true, _isneededit=false, _isOldFashion=false, _msg='Simpan berhasil.', table_id2) {
		$save['method'] = "save('".base_url()."perbend/set_tahun', 'set_tahun', 'Simpan tahun aktif. Anda yakin?', false, '', false, false, true)";
		return $save;
	}

	function save() {
		$post = (object)$_POST;
		//print_r($post);
		$datas['status'] = true;
    	$this->db->where(array('username'=>trim($this->session->username)));
		$data = ['ctahun'=>$post->ganti_periode];
		$this->db->update($this->prefix.'_t_user', $data);
		//print_r($this->db->last_query());

		$this->session->set_userdata(array('settahun'=>$post->ganti_periode));
		$datas['status'] = true;
		echo json_encode($datas);
	}

	function updateBox_priv_t_user_ctahun($name, $value) {
		$input = "<input placeholder='Tahun aktif' style='width:80px;' type='text' name='{$name}' id='{$name}' class='form-control {$name}' value='{$value}'/>";

		return $input;
	}

	function priv_t_user_output() {
		$js = "<script type='text/javascript'>
					$(document).ready(function() {
						var url_opener = location.href.split('/');
						var url_opener_ = (url_opener[url_opener.length-1]).replace('#', '');
						if ( url_opener_ == '{$this->router->class}' ) location.href = location.href + '/edit/{$this->session->userid}';
					});
				</script>";

		return $js;

	}
}