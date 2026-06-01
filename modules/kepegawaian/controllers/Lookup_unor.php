<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lookup_unor extends MX_Controller {
	public function __construct() {
		parent::__construct();
		$controller = "kepegawaian/lookup_unor";
		$table2 = "kepeg_m_unor";
		$this->table = $table2;

		$this->_setController($controller);
		$this->_init($this->db);

		$this->_addTable($table2);
		$this->_addField($table2, 'id', '', false, true);
		$this->_addField($table2, 'id_atasan', 'id_atasan', false, true);
		$this->_addField($table2, 'nama', 'Nama Unit Kerja', false, true);
		$this->_addField($table2, 'date_expired', 'EXPIRED_DATE', false, true);	
		$this->_addField($table2, 'opener', 'opener', false, true, true);	

		$this->_add2ListField($table2,'nama');
 
		$this->_add2SearchField($table2, 'nama');
		$this->_add2SearchField($table2, 'opener',true,true,false);
		
		$this->_addQuery($table2, 'kepeg_m_unor.date_expired IS NULL', 'and', '=', true);
		
		//clear session header_controller
		$this->session->unset_userdata('header_controller');
		$header_controller = array('header_controller' => 'kepegawaian/m_pegawai');
		$this->session->set_userdata($header_controller);
	}

	function listBox_action($buttons, $datas) {
		unset($buttons);
		$buttons['checkbox'] = "<input {$checked} onclick='pilih_unor(this);' type='radio' 
								name='chkbox_unor[]' id='chkbox_unor' 
								class='chkbox_unor'/>";
		return $buttons;
	}
		
	function manipulate_list_button($buttons) {
		unset($buttons);
							
		$buttons['close'] = "<button type='button' class='btn btn-primary' 
								onclick='$(\"#myModal_browse\").modal(\"hide\");
								$(\"#lookup_unor_form-modal\").css(\"overflow\", \"scroll\");'>
					       		<i class='fas fa-times' aria-hidden='true'> </i>
								   Tutup</button>";
		
		return $buttons;
	}

	function listBox_kepeg_m_unor_nama($value, $datas) {
		$unor_not_in = [1628,12886];
		if (!in_array($datas->kepeg_m_unor_id_atasan, $unor_not_in))
			$nama_upper = $this->getrow('', 'kepeg_m_unor', 'nama', ['id'=>$datas->kepeg_m_unor_id_atasan])->nama;
		else $nama_upper = $datas->kepeg_m_unor_nama;

		if ( $nama_upper != $datas->kepeg_m_unor_nama ) $display_name = $datas->kepeg_m_unor_nama." - ".$nama_upper;
		else $display_name = $datas->kepeg_m_unor_nama;
		
		$input  = "<input type='hidden' name='hid_unor_id[]' class='hid_unor_id' id='hid_unor_id' value='{$datas->kepeg_m_unor_id}'/>";
		$input  .= "<input type='hidden' name='hid_unor_nama[]' class='hid_unor_nama' id='hid_unor_nama' value='{$display_name}'/>";
		return $input.$value;//.' '.$datas->vw_unor_unor_id_unor;
	}
  
  	function kepeg_m_unor_output() {
  		$js = "<script type='text/javascript'>

  				function pilih_unor(dis) {
  					var idx = $('.chkbox_unor').index(dis);
					var f_opener = $('#m_pegawai #q_kepeg_m_unor_opener').val();
					
					$('#m_pegawai #'+f_opener).val($('.hid_unor_id').eq(idx).val());
					$('#m_pegawai #'+f_opener+'_txt').val($('.hid_unor_nama').eq(idx).val());
					
					$(\"#myModal_browse\").modal(\"hide\");
					$(\"#lookup_unor_form-modal\").css(\"overflow\", \"scroll\");
					
  				}
  		   </script>";
		   
	return $js;
  }
}

