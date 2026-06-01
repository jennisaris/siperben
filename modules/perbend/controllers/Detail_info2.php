<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once("M_unor.php");
class Detail_info2 extends MX_Controller {
  var $prefix = 'app';
  var $ar_statusid = array();
  var $ar_statusperubahan = array();
  var $ar_jab2 = array();

  var $ar_unor = array();
	public function __construct() {
		parent::__construct();
		$controller = "perbend/detail_info2";
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
		$this->_addField($table3, 'lampiran', 'Lampiran Surat Usulan (dlm format PDF)', false, false, true);
		$this->_addField($table3, 'tfile2', 'Lampiran', true, true);
		$this->_addField($table3, 'vtype', 'Tipe Dokumen', false, true);
		$this->_addField($table3, 'nsize', 'nsize', false, true);
	
		
		$this->_addRelation($table2, $table3, array('inoskid'=>'id'));
	
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
		$this->ar_jab2[$r->id] = $r->vname." (".$r->ckode.")";
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
		
		$this->_add2SearchField($table2, 'isnonaktif');
		//$this->_add2SearchField($table2, 'cnosertifikat', false, true, false);
		$this->_add2SearchField($table2, 'ckduker', false, true, false);
		//$this->_add2SearchField($table2, 'ijabid2', false, true);
		//$this->_add2SearchField($table, 'cnousul');
		//$this->_add2SearchField($table, 'dtglusul');
		//$this->_add2SearchField($table, 'istatusid');
		//$this->_add2SearchField($table, 'ijnsprubhnid');
		//if ( $this->session->groupid == $this->session->sysparam->group_superuser[0] ) $this->_add2SearchField($table, 'iunorid', false, false, false);
		
		//$this->_add2SearchField($table2, 'isnonaktif');
    
		//$this->_add2ListField($table, 'iunorid');
		$this->_add2ListField($table2, 'cnip, vname');
		$this->_add2ListField($table3, 'cnosk, dtglsk');//, tfile2');
		$this->_add2ListField($table2, 'ijabid2, isnonaktif');//, tupdated, cupdatedby');
		
		if ( $this->input->post('q_app_t_usulan_pegawai_ckduker') != '' ) {
		    $m_unor = new M_unor;
		    $orgs = [trim($this->input->post('q_app_t_usulan_pegawai_ckduker'))];
		    $m_unor->getRekursifUnit(trim($this->input->post('q_app_t_usulan_pegawai_ckduker')), $orgs);
		    $kd_satker = "'".implode("','", $orgs)."'";
		    $this->_addQuery($table, $table.'.iunorid in ('.$kd_satker.')', 'and', '', true);
		}
		
		//if ( $this->input->post('q_app_t_usulan_pegawai_cnosertifikat') == 1) 
		//  $this->_addQuery($table, "app_t_usulan_pegawai.cnosertifikat != ''", 'and', '', true);
		//else $this->_addQuery($table, "app_t_usulan_pegawai.cnosertifikat = ''", 'and', '', true);
    
    
		$this->_addQuery($table, 'app_t_usulan.ijns = 1', 'and', '', true);
		//$this->_addQuery($table, "app_t_usulan_pegawai.isnonaktif = 0", 'and', '', true);
		$this->_addQuery($table2, "app_t_usulan_pegawai.inoskid != 0", 'and', '', true);
		
		$this->_setHTMLTemplate('', 'detail_info/list');
    
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

	function ION($buttons, $datas) {
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

  function manipulate_list_button($buttons) {
    unset($buttons['add']);
    $buttons['close'] = "<button type='button' class='btn btn-default' 
								onclick='$(\"#myModal_browse\").modal(\"hide\");'>
					       		<i class='fas fa-times' aria-hidden='true'> </i>
								   Tutup</button>";
    return $buttons;
  }
  
 	function listBox_app_t_usulan_sk_tfile2($value, $datas) {
	  $input = "";
	  
	  $vtype = trim($datas->app_t_usulan_sk_vtype);
	  $tfile = trim($value);
	  
	  if ( !empty($value) ){
			$input .= "<span data-toggle='modal' data-target='#myPreview_{$datas->app_t_usulan_sk_id}' style='cursor:pointer;' class='btn btn-warning'>
						<i class='fas fa-eye'></i> <b>Lihat Surat Keputusan</b>
					  </span>";
  	  $input .= "<div class='modal fade' id='myPreview_{$datas->app_t_usulan_sk_id}' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
  				   <div class='modal-dialog' role='document' style='width:65%;'>
  					 <div class='modal-content'>
  					   <div class='modal-header'>
  						 <button type='button' class='close' aria-label='Close' 
  						 onclick=\"$('#myPreview_{$datas->app_t_usulan_sk_id}').modal('hide').appendTo('.div_app_t_usulan_sk_tfile2');$('#{$this->router->class}_form-modal').css('overflow', 'scroll');\">
  						 <span aria-hidden='true'>&times;</span></button>
  						 <h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> No. SK {$datas->app_t_usulan_sk_cnosk}</h4>
  					   </div>
  					   <div class='modal-body' id='modal-body'>
  						 <div class='form-group'>
  							 <div id='html_telusuri'>";
  
  		if ( $vtype != 'application/pdf' ) {
  			$height='100';$width='';
  		} else { $height='100%';$width='700';}
  
  		$input .= "<iframe src='data:{$vtype};base64,{$tfile}' type='{$vtype}' width='{$height}' height='{$width}' alt='{$vtype}'>PDF tidak bisa ditinjau</iframe>";
  
  
  		$input .= "			 </div>
  						 </div>
  					   </div>
  					</div>
  				</div>
  			</div>";
	  }
	  
		return $input;
	}
}
