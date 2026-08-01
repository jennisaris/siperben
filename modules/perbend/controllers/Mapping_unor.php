<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapping_unor extends MX_Controller {
  var $prefix = 'app';
  var $table;
	public function __construct() {
		parent::__construct();
		$controller = "perbend/mapping_unor";
		$this->table  = $this->prefix."_m_unor";

    $this->_setTitle('Mapping Satker');
    $this->_setModal(true);
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table, 'kode');
		$this->_addField($this->table, 'id', '', true, true);
		$this->_addField($this->table, 'kode', 'Kode', false, true);
		$this->_addField($this->table, 'nama', 'Nama Satker', true);
		$this->_addField($this->table, 'daftar', 'Satuan Kerja DIKBUDHR', true, false, true);

    $this->_add2ListField($this->table, 'kode, nama');
    
		//clear session header_controller
		$this->session->unset_userdata('header_controller');
		$header_controller = array('header_controller' => 'perbend/m_unor');
		$this->session->set_userdata($header_controller);
	
	}
	
	function updateBox_app_m_unor_nama($name, $value) {
	  $input = "<input readonly type='text' name='{$name}' 
	  id='{$name}' class='form-control {$name}' value='{$value}' />";
	  
	  return $input;
	}
	
	public function updateBox_app_m_unor_daftar($name, $value, $datas) {
		$html = "<div>
				<ul class='nav nav-tabs' role='tablist' id='all_tabs'>
				  <li role='presentation' class='active'>
					  <a href='#tab1' data-toggle='tab' aria-controls='tab1' role='tab'>Daftar Satker DIKBUDHR</a>
				  </li>
				</ul>
			  
				<div class='tab-content'>
				  <div role='tabpanel' class='tab-pane fade in active' id='tab1'></div>
				</div>
			  </div>";
			  
	  	$html .= "<script type='text/javascript'>
				  $(document).ready(function() {
					//tab 1

					var childc = 'mapping_unor2';

					var url = '".base_url()."perbend/'+childc+'/index';
					
					//alert($('.app_m_unor_kode').val());

					$('#tab1').html(getHTML(url, '', 0, false));
					$('#'+childc+' #q_kepeg_m_unor_kode_satker').val($('.app_m_unor_kode').val());
				  });
				  
				</script>";				
			  
	  return $html;	
	}
	
  function app_m_unor_output() {
        $js = "<script type='text/javascript'>
                    $(document).ready(function() {
            
                    });
                </script>
            ";

        return $js;
  }

	function listBox_ACTION($buttons) {
	  unset($buttons['ubah']);
	  unset($buttons['lihat']);
	  
	  return $buttons;
	}
	
	function manipulate_update_button($buttons, $datas) {
	  unset($buttons['simpan']);
	  
	  return $buttons;
	}
	
	function save_daftar_satker() {
		$data = array();
		//require_once "modules/kepegawaian/controllers/M_kepegawaian_unor.php";
		//$cunor = new M_kepegawaian_unor;
		/*
		Array ( [layanan_id] => 3 [daftar_nama] => 198010172010121002,198210032015041001,198006172009121002 )
		*/
		$kode_satker  = $this->input->post('kode_satker');
		$daftar_satker = explode(',', $this->input->post('daftar_unor'));
		$tcreated 	 = date('Y-m-d H:i:s');
		$ccreatedby  = trim($this->session->username);
		
		//echo 'Kode Satker : '.$kode_satker;
		//print_r($daftar_satker);
		
		//exit;

		//hapus dulu
		$sql = array();
		foreach($daftar_satker as $k=>$d) {
			//insert
			$sql[] = "update kepeg_m_unor set kode_satker = '{$kode_satker}', 
			tupdated = '{$tcreated}', 
			cupdatedby = '{$ccreatedby}'
			where id = '{$d}'";
			
			/*if ($d != '' ) {
      		//update getRekursifUnit
      		$orgs = array();
      		$cunor->getRekursifUnit2(trim($d), $orgs);
      		
      		$orgs = "'".implode("','", $orgs)."'";
      		$sql2 = "Update kepeg_m_unor set kode_satker = '{$kode_satker}' where kode in ({$orgs})";
      		$this->db->query($sql2);
    	}*/
		}

		//print_r($sql);
		//exit;

		if ( sizeOf($sql) > 0 ) {
			$error = 0;
			foreach($sql as $q) {
				try {
					$this->db->query($q);
					if ( $this->db->affected_rows() != 1 ) $error++;
				}catch(Exception $e) {
					$error++;
				}
			}
		} 

		if ( $error > 0 ) $data['status'] = FALSE;

		echo json_encode($data);
	}
}