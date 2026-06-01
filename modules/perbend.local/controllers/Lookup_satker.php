<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lookup_satker extends MX_Controller {
	var $prefix = 'kepeg';
	var $table;

	var $kodesatker;
	var $ar_unitkerja = array();
	public function __construct() {
		parent::__construct();
		$controller = "perbend/lookup_satker";
		$this->table = $this->prefix.'_m_unor';

    $this->_setTitle('Lookup Satker');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', false, true);
		$this->_addField($this->table, 'kode', '', false, true);
		$this->_addField($this->table, 'kode_atasan', 'Satker Induk', false, true);
		$this->_addField($this->table, 'nama', 'Nama Satker', false, true);
		$this->_addField($this->table, 'date_expired', 'EXPIRED DATE', false, true);
		$this->_addField($this->table, 'kode_satker', 'kode_satker', false, false);

		$this->_add2ListField($this->table,'nama');
 
		$this->_add2SearchField($this->table, 'nama');
		$this->_add2SearchField($this->table, 'kode_satker', true, true, false);

		$this->_addOrderBy($this->table, array('kode'=>'asc'));

		if ( !empty(trim($this->input->post('q_kepeg_m_unor_kode_satker'))) ) {
			$sql = "SELECT kode from kepeg_m_unor where kode_satker = ".$this->input->post('q_kepeg_m_unor_kode_satker');
			$result = $this->db->query($sql)->result();
			foreach ($result as $r) {
				$this->ar_unitkerja[$r->kode] = $r->kode;
			}
		}
		$this->_addQuery($this->table, 'kepeg_m_unor.date_expired IS NULL', 'and', '=', true);
		
		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}

	function get_unit_by_kodesatker($b) {

		$unors = array();
		$sql = "SELECT kode from kepeg_m_unor where kode_satker = ".$b;
		foreach ( $this->db->query($sql)->result() as $r ) {
			$unors[] = $r->kode;
		}

		echo json_encode($unors);
	}

	function listBox_action($buttons, $datas) {
		if ( in_array($datas->kepeg_m_unor_kode, $this->ar_unitkerja) ) $checked = ' checked ';
		else $checked = ' ';
		
		unset($buttons);
		$buttons['checkbox'] = "<input {$checked} onchange='pilih_satker(this);' type='checkbox' 
								name='chkbox_satker[]' id='chkbox_satker' 
								class='chkbox_satker'/>";
		return $buttons;
	}
		
	function manipulate_list_button($buttons) {
		unset($buttons);
		
		$buttons['simpan'] = "<button type='button' class='btn btn-primary btn_save' onclick='save_pilih_satker();'>
					       		<i class='fas fa-save' aria-hidden='true'> </i>
					       		Simpan Mapping Satker</button>";

								 //appendTo('.div_t_layanan_sestama_lampiran')  
							
		$buttons['close'] = "<button type='button' class='btn btn-default' 
								onclick='$(\"#myModal_browse\").modal(\"hide\");
								$(\"#mapping_unor_form-modal\").css(\"overflow\", \"scroll\");'>
					       		<i class='fas fa-times' aria-hidden='true'> </i>
								   Tutup</button>";
								   
		$input  = "<input type='hidden' name='ar_unors' id='ar_unors' class='ar_unors' value=''/>";
		$buttons['close'] .= $input;
		
		return $buttons;
	}

	function listBox_kepeg_m_unor_nama($value, $datas) {
		$input  = "<input type='hidden' name='hid_unor_id[]' class='hid_unor_id' id='hid_unor_id' value='{$datas->kepeg_m_unor_kode}'/>";
		return $input.$value;//.' '.$datas->vw_unor_satker_id_unor;
	}
  
  	function kepeg_m_unor_output() {
  		$js = "<script type='text/javascript'>
				var list_unor = [];

				var url_opener = location.href.split('/');
				//var url_opener_ = (url_opener[url_opener.length-1]).replace('#', '');
				var url_opener_ = url_opener[url_opener.length-4];

				var kode_satker = $('#q_kepeg_m_unor_kode_satker').val();
				//alert('kode_satker : '+kode_satker);
				var ar_unors = jQuery.parseJSON(getHTML('".base_url()."perbend/lookup_satker/get_unit_by_kodesatker/'+kode_satker));
				$.each(ar_unors, function(a,b) {
					list_unor.push(b);
				});
				
				$('#ar_unors').val(list_unor);

  				function pilih_satker(dis) {
  					var idx = $('.chkbox_satker').index(dis);
  					if ( $('.chkbox_satker').eq(idx).is(':checked') == true ) {
						list_unor.push($('.hid_unor_id').eq(idx).val()); 

  					} else {

						var i = list_unor.indexOf($('.hid_unor_id').eq(idx).val());
						if(i != -1) {
							list_unor.splice(i, 1);
						}
  					}
  					  
					$('.ar_unors').val(list_unor);  
  				}

				function save_pilih_satker() {
					var btn_save_html = $('.btn_save').html();
					var kode_satker  = $('#lookup_satker_form_search #q_kepeg_m_unor_kode_satker').val();
					//alert(kode_satker);
					var daftar_unor = $('.ar_unors').val();
					//alert(daftar_unor);

					bootbox.confirm({
						message: 'Simpan Mapping Data Satker. Anda Yakin ?',
						buttons: {
							confirm: {
								label: '<i class=\"fa fa-check\" aria-hidden=\"true\">&nbsp;</i>Yes',
								className: 'btn-success'
							},
							cancel: {
								label: '<i class=\"fa fa-close\" aria-hidden=\"true\">&nbsp;</i>No',
								className: 'btn-danger'
							}
						},
						callback: function(jwb) {
							if ( jwb ) {
								$.ajax({
									url: '".base_url()."perbend/mapping_unor/save_daftar_satker',
									data: {kode_satker:kode_satker, daftar_unor:daftar_unor, opener:url_opener_},
									type: 'post',
									beforeSend: function() {
										// alert('sending data');
										// do some loading options
										if ( isloading==true ) $(\"#divLoading\").addClass('show');
										if ( !debug ) {
											$('button').attr('disabled', true);
											$('.btn_save').html(\"<i class='fas fa-cog fa-spin'> </i> Mohon Tunggu...\");
										}
									},
									success: function(data) {
										if ( data == '' ) {
											bootbox_alert('', '', 'Sesi anda sudah habis. Silahkan login kembali. ', false, true);
											if ( !debug ) location.reload(true);
										} else {
											var o = jQuery.parseJSON(data);
											if ( o.status == false ) bootbox_alert('', '', 'Daftar Satker Gagal disimpan. Silahkan dicek kembali satker yang dipilih.', false, false);
											else bootbox_alert('', '', 'Daftar Satker Berhasil di Mapping.', true);
										
											//reload_grid('".base_url()."perbend/mapping_unor/lists/{$this->session->app_m_unor_page}', 'mapping_unor');
											reload_grid('".base_url()."perbend/mapping_unor2/lists', 'mapping_unor2');

											if ( isloading==true ) $(\"#divLoading\").removeClass('show');
											if ( !debug ) {
												$('button').removeAttr('disabled');
												$('.btn_save').html(btn_save_html);
											}

											reload_grid('".base_url()."perbend/m_unor/lists/{$this->session->app_m_unor_page}', 'm_unor');
											$('#myModal_browse').modal('hide');
											$('#mapping_unor_form-modal').modal('hide');
                      //$('#mapping_unor_form-modal').css('overflow', 'scroll');
										}
									},
					
									complete: function() {
										// alert('ajax call complete');
										// success alerts
										if ( !debug ){
											$('button').removeAttr('disabled');
											$('.btn_save').html(btn_save_html);
										}
									},
									error: function(xhr, status, error) {
										bootbox.alert(xhr.responseText); // error occur
										if ( !debug ) {
											$('button').removeAttr('disabled');
											$('.btn_save').html(btn_save_html);
										}
									}
								});
							} else $('#Lookup_satker-form_modal').css('overflow', 'scroll');
						}
					});
				}
  		   </script>";
		   
	    return $js;
  }
}

