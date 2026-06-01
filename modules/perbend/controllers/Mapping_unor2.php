<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mapping_unor2 extends MX_Controller {
  var $prefix = 'kepeg';
  var $table;
	public function __construct() {
		parent::__construct();
		$controller = "perbend/mapping_unor2";
		$this->table  = $this->prefix."_m_unor";

    $this->_setTitle('Mapping Satker');
    $this->_setModal(true);
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table, 'kode');
		$this->_addField($this->table, 'id', '', true, true);
		$this->_addField($this->table, 'kode', 'Kode', false, true);
		$this->_addField($this->table, 'nama', 'Nama Satker', true);
		$this->_addField($this->table, 'kode_satker', 'Kode Satker', false, true);
		$this->_addField($this->table, 'daftar', 'Satuan Kerja DIKBUDHR', true, false, true);

    $this->_add2ListField($this->table, 'kode, nama');
    
    $this->_add2SearchField($this->table, 'kode_satker', true, true, true);
		//clear session header_controller
		$this->session->unset_userdata('header_controller');
		$header_controller = array('header_controller' => 'perbend/m_unor');
		$this->session->set_userdata($header_controller);
	
	}
	
	public function updateBox_kepeg_m_unor_daftar($name, $value, $datas) {
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
					
					  //alert($('.kepeg_m_unor_kode').val());

  					$('#tab1').html(getHTML(url, '', 0, false));
  					$('#'+childc+' #q_kepeg_m_unor_kode_satker').val($('.kepeg_m_unor_id').val());
				  });
				  
				</script>";				
			  
	  return $html;	
	}
	
  function kepeg_m_unor_output() {
        $js = "<script type='text/javascript'>
                    $(document).ready(function() {
            
                    });
                </script>
            ";

        return $js;
  }
  
  function manipulate_list_button($buttons) {

		$input = "<div class='modal fade' id='myModal_browse' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
							<div class='modal-dialog' role='document' style='width:75%;'>
							<div class='modal-content'>
								<div class='modal-header'>
								<h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Browse Data Satker </h4>
								</div>
								<div class='modal-body' id='modal-body' style='overflow-x: auto;'>
								<div class='form-group'>
									<div id='html_telusuri'></div>
								</div>
								</div>
							</div>
							</div>
						</div>";
		$buttons['add'] = "<button type='button' id='btn_new' class='btn btn-primary' 
							data-toggle='modal' data-target='#myModal_browse' data-backdrop='static' data-keyboard='false'
								onclick='_browse(\"".base_url()."perbend/lookup_satker/index\");
								$(\"#lookup_satker_form_search #q_kepeg_m_unor_kode_satker\").val($(\"#mapping_unor_form-edit #app_m_unor_kode\").val());
								$(\"#lookup_satker_form_search #q_kepeg_m_unor_nama\").val($(\"#mapping_unor_form-edit #app_m_unor_nama\").val());'>
								<i class='glyphicon glyphicon-plus'></i>&nbsp;Tambah {$this->title}
							</button>".$input;

		return $buttons;
	}
	
	function listBox_ACTION($buttons) {
	  unset($buttons['ubah']);
	  unset($buttons['lihat']);
	  
	  return $buttons;
	}
	
	function delete($id) {
	  //echo 'test : '.$id;
	  //exit;
	  $data =[];
	  try {
	      $tupdated = date('Y-m-d H:i:s');
	      $cupdatedby = trim($this->session->username);
	      
    	  $sql = "UPDATE kepeg_m_unor set kode_satker = NULL, 
            	  tupdated = '{$tupdated}',
            	  cupdatedby ='{$cupdatedby}'
            	  where id = '{$id}'";
    	  $this->db->query($sql);
    	  
    	  $data = ['msg' => 'Mapping satker berhasil di hapus', 'status'=>TRUE];
    } catch (Exception $e){
         //die($e);
    	   $data = ['msg' => $e->getMessage(), 'status'=>FALSE];
    }
    
    echo json_encode($data);
	}
}