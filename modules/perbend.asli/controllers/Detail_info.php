<?php

defined('BASEPATH') OR exit('No direct script access allowed');

//require_once("modules/kepegawaian/controllers/M_kepegawaian_unor.php");
require_once("M_unor.php");
class Detail_info extends MX_Controller {
  var $prefix = 'app';
  var $ar_statusid = array();
  var $ar_statusperubahan = array();
  var $ar_jab2 = array();

  var $ar_unor = array();
	public function __construct() {
		parent::__construct();
		$controller = "perbend/detail_info";
		$table2  = $this->prefix."_t_usulan_pegawai";
		

    $this->_setModal(true);
   	$this->_setTitle('Detail Info');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table2);
		$this->_addField($table2, 'id', '', true, true);
		$this->_addField($table2, 'iusulanid', 'iusulanid', false, true);
		$this->_addField($table2, 'ispelatihan', 'ispelatihan', false, true);
		$this->_addField($table2, 'cnip', 'NIP', false);
		$this->_addField($table2, 'vname', 'Nama Pegawai', false);
		$this->_addField($table2, 'cnosertifikat', 'No. Sertifikat', false);
		$this->_addField($table2, 'cgolid', 'Pangkat/Golongan', false);
		$this->_addField($table2, 'ijabid2', 'Jabatan', false);
		$this->_addField($table2, 'istatus', 'istatus', false);
		$this->_addField($table2, 'istatus2', 'istatus2', false);
		$this->_addField($table2, 'cnosk', 'No. SK', false);
		$this->_addField($table2, 'inoskid', 'inoskid', false);
		$this->_addField($table2, 'ckduker', 'Satuan Kerja', false);
		$this->_addField($table2, 'isnonaktif', 'Status Aktif', false);
		$this->_addField($table2, 'txt', 'txt', false, false, true);
		
		//header
		$table = $this->prefix.'_t_usulan';
		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'ijns', 'ijns', false, true);
		$this->_addField($table, 'iunorid', 'Satuan Kerja', true);
		$this->_addField($table, 'cnousul', 'No. Usul', true);
		$this->_addField($table, 'dtglusul', 'Tgl. Usul', true);
		$this->_addField($table, 'istatusid', 'Status Perubahan', true);
		$this->_addField($table, 'ijnsprubhnid', 'Jenis Perubahan', true);
		$this->_addField($table, 'lampiran', 'Lampiran Surat Usulan (dlm format PDF)', false, false, true);
		$this->_addField($table, 'tfile', 'Lampiran', true, true);
		$this->_addField($table, 'vtype', 'Tipe Dokumen', false, true);
		$this->_addField($table, 'nsize', 'nsize', false, true);
		$this->_addField($table, 'istatus', 'Status Usulan', false, true);
		$this->_addField($table, 'keterangan', 'Keterangan', false, true, true);
		$this->_addField($table, 'daftarnama', '', false, false, true, 0, 'left', '','', true);
		$this->_addField($table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($table, 'cupdatedby', 'Diubah oleh', false, true);
		$this->_addField($table, 'ctahun', 'Tahun', false, true);
		
		$this->_addRelation($table2, $table, array('iusulanid'=>'id'));

    $table3 = $this->prefix.'_t_usulan_sk';
		$this->_addTable($table3);
		$this->_addField($table3, 'id', '', true, true);
		$this->_addField($table3, 'cnosk', 'No. SK', false, true);
		$this->_addField($table3, 'dtglsk', 'Tgl. SK', false, true);
		
		$this->_addRelation($table2, $table3, array('inoskid'=>'id'));
	
    $table4 = 'kepeg_m_pegawai';
		$this->_addTable($table4);
		$this->_addField($table4, 'id', '', true, true);
		$this->_addField($table4, 'cnip', 'NIP', false, true);
		$this->_addField($table4, 'vname', 'Nama Pegawai', false, true);
		
		$this->_addRelation($table2, $table4, array('cnip'=>'cnip'));
	
		//$this->_add2SearchField($table, 'cnip');
		//$this->_add2SearchField($table, 'vname');
		//$this->_add2SearchField($table, 'ldeleted');
		
		$rows = $this->getall('', $this->prefix.'_m_unor', '*', array('deleted'=>0));
		foreach($rows as $r) {
		$this->ar_unor[$r->kode] = strtoupper($r->nama);
		}
		
		$this->_changeType($table, 'iunorid', 'combobox', 
		$this->ar_unor);
		
		$rows = $this->getall('', $this->prefix.'_m_jabatan', '*', array('ldeleted'=>0));
		foreach($rows as $r) {
		$this->ar_jab2[$r->id] = $r->vname;
		}
		
		$this->_changeType($table2, 'ijabid2', 'combobox', 
		$this->ar_jab2);
		
		$this->_changeType($table3, 'dtglsk', 'date', 'd-m-Y');
		$this->_changeType($table, 'istatus', 'combobox', 
		$this->session->sysparam->status_usulan);
		
		$this->_changeType($table2, 'isnonaktif', 'combobox', 
		$this->session->sysparam->ldeleted);
		
		$this->_setAlign($table2, 'isnonaktif', 'center');
		
		//echo 'param '.$this->uri->segment(6);
		
		$this->_add2SearchField($table2, 'cnosertifikat', false, true, false);
		$this->_add2SearchField($table2, 'ckduker', false, true, false);
		$this->_add2SearchField($table2, 'ijabid2', true, true);
		//$this->_add2SearchField($table, 'txt', true);
		//$this->_add2SearchField($table, 'cnousul');
		//$this->_add2SearchField($table, 'dtglusul');
		//$this->_add2SearchField($table, 'istatusid');
		//$this->_add2SearchField($table, 'ijnsprubhnid');
		//if ( $this->session->groupid == $this->session->sysparam->group_superuser[0] ) $this->_add2SearchField($table, 'iunorid', false, false, false);
		
		//$this->_add2SearchField($table2, 'isnonaktif');
    
		$this->_add2ListField($table, 'iunorid');
		$this->_add2ListField($table2, 'cnip');
		$this->_add2ListField($table4, 'vname');
		$this->_add2ListField($table3, 'cnosk, dtglsk');
		$this->_add2ListField($table2, 'ijabid2');//, isnonaktif');//, tupdated, cupdatedby');
		
		if ( $this->input->post('q_app_t_usulan_pegawai_ckduker') != '' ) {
		   //$m_unor = new M_kepegawaian_unor;
		    $m_unor = new M_unor;
		    $kode_satker = $this->getrow('','kepeg_m_unor', 'kode_satker', array('kode'=>$this->input->post('q_app_t_usulan_pegawai_ckduker')))->kode_satker;
		    
		    $orgs = [];
		    $m_unor->getRekursifUnit(trim($kode_satker), $orgs);
		    //print_r($orgs);
		    $orgsx = [trim($kode_satker)=>trim($kode_satker)];
		    foreach($orgs as $k=>$v) {
		      $orgsx[] = $k;
		    }
		    //print_r($orgs);exit;
		    $kd_satker = "'".implode("','", $orgsx)."'";
		    $this->_addQuery($table, $table.'.iunorid in ('.$kd_satker.')', 'and', '', true);
		}
		
		if ( $this->input->post('q_app_t_usulan_pegawai_cnosertifikat') == 1) 
		  $this->_addQuery($table, "app_t_usulan_pegawai.cnosertifikat != ''", 'and', '', true);
		else $this->_addQuery($table, "app_t_usulan_pegawai.cnosertifikat = ''", 'and', '', true);
    
    
		$this->_addQuery($table, 'app_t_usulan.ijns = 1', 'and', '', true);
		$this->_addQuery($table, "app_t_usulan_pegawai.isnonaktif = 0", 'and', '', true);
		$this->_addQuery($table2, "app_t_usulan_pegawai.inoskid != 0 and app_t_usulan_pegawai.inoskid IS NOT NULL", 'and', '', true);
		
		/*$this->_setParams($table2, 
		array('kode_satker'=>$this->uri->segment(5),
		'isnosert'=>$this->uri->segment(6)));
    */
    
    $this->session->unset_userdata('header_controller');
		$header_controller = array('header_controller' => 'perbend/laporan1');
		$this->session->set_userdata($header_controller);
	}

	/*function searchBox_app_t_usulan_iunorid($name) {
		$input = "<input type='hidden' name='{$name}' id='{$name}' class='form-control {$name}' value=''/>";
		$input .= "<input placeholder='Satuan Kerja' type='text' name='{$name}_txt' id='{$name}_txt' class='form-control {$name}_txt' value=''/>"; 

		return $input;
	}*/

	function listBox_app_t_usulan_iunorid($value) {
		$name_txt = $this->getrow('', 'app_m_unor', 'nama', array('kode'=>$value))->nama. " (".$value.")";
		if ($name_txt == '' ) $name_txt = $value;
		return $name_txt;
	}

	function listBox_ACTION($buttons, $datas) {
		unset($buttons);

	  return $buttons;
	}

	function app_t_usulan_pegawai_output() {
		$js = "<script type='text/javascript'>
				var btn_save_html = '';
				$(document).ready(function() {

					
					$('#q_app_t_usulan_iunorid_txt').keyup(function() {
						$('#q_app_t_usulan_iunorid').val('');
					});

					$('#q_app_t_usulan_iunorid_txt').typeahead({
						source: function (query, result) {
							$.ajax({
								url: '".base_url()."perbend/m_unor/getunor',
								data: 'query='+query,
								dataType: 'json',
								type: 'POST',
								beforeSend: function() {
									// alert('sending data');
									// do some loading options
									btn_save_html = $('.btn_save').html();
									if ( isloading==true ) $('#divLoading').addClass('show');
									if ( !debug ) {
										$('button').attr('disabled', true);
										$('.btn_save').html(\"<i class='fas fa-cog fa-spin'> </i> Mohon Tunggu...\");
									}
								},
								success: function (data) {
									result($.map(data, function (item) {
										return item;
									}));
								}
							});
						},
						items: 20,
						updater: function (item) {
							$('#q_app_t_usulan_iunorid').val(item.kode);
							
							reload_grid('".base_url()."perbend/".strtolower($this->router->class)."/lists', '".strtolower($this->router->class)."');
              $('#".strtolower($this->router->class)."-panel-default-form').hide();
										

							$(\"#divLoading\").removeClass('show');
							$('button').removeAttr('disabled');
				    		$('.btn_save').html(btn_save_html);

							return  item.value;
						},
					});
				});
				</script>";

		return $js;
	}
	
	/*function manipulate_search_button($buttons) {
		//unset($buttons);
		//button pencarian
		$buttons['search'] = "<button type='button' id='t_verifikasi2_btn_search' class='btn btn-primary btn-sm btn-flat' onclick='reload_grid(\"".base_url()."perbend/".strtolower($this->router->class)."/lists\", \"".strtolower($this->router->class)."\");$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();'>
											<i class='glyphicon glyphicon-search'></i>&nbsp;&nbsp;Cari
									</button>";

		$buttons['reset']  = "<button type='button' class='btn btn-primary btn-sm btn-flat' 
									onclick='$(\"#".strtolower($this->router->class)."_form_search\").trigger(\"reset\");
									$(\"#".strtolower($this->router->class)."_form_search input[type=hidden]\").val(\"\");
									$(\"#".strtolower($this->router->class)."_form_search select\").val(\"\");
									$(\"#".strtolower($this->router->class)."_form_search select\").select2().select2(\"val\", null);
									$(\"#".strtolower($this->router->class)."_form_search #q_app_t_usulan_iunorid\").val(\"\");
									reload_grid(\"".base_url()."perbend/".strtolower($this->router->class)."/lists\", \"".strtolower($this->router->class)."\");$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();'>
										<i class='glyphicon glyphicon-refresh'></i>&nbsp;&nbsp;Bersihkan Pencarian
									</button>";
				        	
		return $buttons;
		
	}*/

  function manipulate_list_button($buttons) {
    unset($buttons['add']);
    $buttons['close'] = "<button type='button' class='btn btn-default' 
								onclick='$(\"#myModal_browse\").modal(\"hide\");'>
					       		<i class='fas fa-times' aria-hidden='true'> </i>
								   Tutup</button>";
    return $buttons;
  }
}
