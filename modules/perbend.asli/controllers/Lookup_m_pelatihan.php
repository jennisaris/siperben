<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lookup_m_pelatihan extends MX_Controller {
	var $prefix = 'app';
	public function __construct() {
		parent::__construct();
		$controller = "perbend/lookup_m_pelatihan";
		$table  = $this->prefix."_m_pelatihan";

		$this->_setTitle('Pelatihan');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'vdesc', 'Nama Pelatihan', true, true);
		$this->_addField($table, 'dtglmulai', 'Tgl. Mulai', true);
		$this->_addField($table, 'dtglselesai', 'Tgl. Selesai', true);
		$this->_addField($table, 'vtempat', 'Lokasi', true,true);		
		$this->_addField($table, 'vpenyelenggara', 'Penyelenggara', true,true);
		$this->_addField($table, 'ldeleted', 'Status Record', true,true);	

		$this->_add2ListField($table,'vdesc, dtglmulai, dtglselesai, vtempat, vpenyelenggara');

		//_add2SearchField($table, $fields, $isfree=false, $ishide=false, $isIncQ=true) 
		$this->_add2SearchField($table, 'vdesc');
		$this->_add2SearchField($table, 'dtglmulai');
		$this->_add2SearchField($table, 'dtglselesai');

		$this->_addOrderBy($table, array('dtglmulai'=>'asc'));

		$this->_changeType($table, 'dtglmulai', 'date', 'd-m-Y');
		$this->_changeType($table, 'dtglselesai', 'date', 'd-m-Y');

		$this->_setAlign($table, 'dtglMulai', 'center');
		$this->_setAlign($table, 'dtglselesai', 'center');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}

	function listBox_action($buttons, $datas) {
		unset($buttons);
		$buttons['checkbox'] = "<input onchange='pilih_pelatihan(this);' type='radio' 
								name='radio_pelatihan[]' id='radio_pelatihan' 
								class='radio_pelatihan'/>";
		return $buttons;
	}

	function listBox_app_m_pelatihan_vdesc($value, $datas) {
		$input = "<input type='hidden' name='vdesc[]' id='vdesc_{$datas->app_m_pelatihan_id}' class='vdesc' value='{$datas->app_m_pelatihan_id}'/>
					<input type='hidden' name='id[]' id='id_{$datas->app_m_pelatihan_id}' class='id' value='{$value}'/>";

		return $input.$value;
	}
	
  
	function app_m_pelatihan_output() {
		$js = "<script type='text/javascript'>
		
        			$('#lookup_m_pelatihan-panel-body-search').css('display', 'none');

					function pilih_pelatihan(dis) {
						var idx = $('.radio_pelatihan').index(dis);
						$('.app_t_usulan_pelatihan_ipelatihanid').val($('.vdesc').eq(idx).val());
						$('.app_t_usulan_pelatihan_ipelatihanid_txt').val($('.id').eq(idx).val());

						$('#myModal_browse').modal('hide');
					}
			</script>";
			
		return $js;
	}

	function manipulate_list_button($buttons) {
		$buttons['tutup'] = "<button type='button' class='btn btn-default' onclick='$(\"#myModal_browse\").modal(\"hide\");'>
								<i class='fas fa-window-close' aria-hidden='true'> </i>
							Tutup</button>";

		return $buttons;
	}
}

