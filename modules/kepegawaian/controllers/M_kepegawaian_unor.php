<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kepegawaian_unor extends MX_Controller {
  var $prefix = 'kepeg';
  var $table;
	public function __construct() {
		parent::__construct();
		$controller = "kepegawaian/m_kepegawaian_unor";
		$this->table  = $this->prefix."_m_unor";

   	    $this->_setTitle('Master Unit Kerja');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);
		$this->_addField($this->table, 'kode', 'Kode', false, false);
		$this->_addField($this->table, 'id_atasan', 'Atasan', false);
		//$this->_addField($this->table, 'kode_atasan', 'Kode Atasan', false, true);
		$this->_addField($this->table, 'nama', 'Nama Unit Organisasi', false, false);
    	$this->_addField($this->table, 'kode_satker', 'Kode Satker (Perbend)', false, false);
		$this->_addField($this->table, 'cnippimpinan', 'Pimpinan', false, false);
		$this->_addField($this->table, 'ijabpimpinan', 'Jabatan Pimpinan', false, false);
		$this->_addField($this->table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($this->table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($this->table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($this->table, 'cupdatedby', 'Diubah oleh', false, true);
		$this->_addField($this->table, 'isinkron', 'Sudah Sinkron dgn DIKBUDHR(BIRO SDM) ?', false, true);

    $this->_add2SearchField($this->table, 'nama');
    $this->_add2SearchField($this->table, 'kode_satker', false, false, false);
	$this->_add2SearchField($this->table, 'id_atasan');
        
    $this->_changeType($this->table, 'kode_satker', 'combobox', 
        array(0=>'Kosong', 1=>'Terisi'));

	$this->_changeType($this->table, 'isinkron', 'combobox', 
        $this->session->sysparam->yesno);

	$this->_changeType($this->table, 'ijabpimpinan', 'combobox', $this->session->sysparam->jabatan_pimpinan);
        
    //print_r($_POST);
        
    if ( $this->input->post('q_'.$this->table.'_kode_satker') != '' ) {
      $kode_satker = $this->input->post('q_'.$this->table.'_kode_satker');
      if ($kode_satker == 0)
       $this->_addQuery($this->table, 'kode_satker IS NULL', 'and', '', true);
      else
       $this->_addQuery($this->table, 'kode_satker IS NOT NULL', 'and', '', true);
    }
        

	$this->_add2ListField($this->table, 'kode, id_atasan, nama, kode_satker, cnippimpinan, ijabpimpinan, isinkron, tupdated, cupdatedby');


    $this->_setAlign($this->table, 'kode_satker', 'center');
    $this->_setAlign($this->table, 'tupdated', 'center');
    $this->_setAlign($this->table, 'cupdatedby', 'center');
	$this->_setAlign($this->table, 'isinkron', 'center');
    
    $this->_setHTMLTemplate('', 'unor/list');
    
    //print_r($this->session->kodeunitutamas);

		//clear session header_controller
		$this->session->unset_userdata('header_controller'); 
	}
	
	function listBox_kepeg_m_unor_id_atasan($value, $datas) {
	  $nama_txt = $this->getrow('', 'kepeg_m_unor', 'nama', array('id'=>trim($value)))->nama;
	  $nama_txt .= " (".$value.")";
	  
	  return $nama_txt;
	}
	
	function listBox_kepeg_m_unor_tupdated($value, $datas) {
	  if ( $value != null ) {
	    return date('d-m-Y H:i:s', strtotime($value));
	  } else return date('d-m-Y H:i:s', strtotime($datas->kepeg_m_unor_tcreated));
	}

    function save_sinkronisasi() {
        //ini_set('display_errors', 1);
        //error_reporting(E_ALL);
        //print_r($_POST);
        //exit;
		$params = array();
		$kode_atasan = $this->getrow('', 'kepeg_m_unor', 'kode_atasan', ['id_atasan'=>trim($this->input->post('q_kepeg_m_unor_id_atasan'))])->kode_atasan;
		if ($kode_atasan != '' ) {
			$params = array('id' => $kode_atasan);
			$proses = 'api/master/list_unitkerja';
		//} else $proses = 'api/unitkerja/'.trim($this->input->post('proses'));
		} else $proses = 'api/unitkerja/list_eselon_1';
		//echo 'proses : '.$proses;exit;
        $this->load->library('rest');
        $config = array(
            'server' => trim($this->config->item('dikbudhr_url')),
            'http_user' => trim($this->config->item('dikbudhr_user')),
            'http_pass' => trim($this->config->item('dikbudhr_pass')),
            'http_auth' => "basic", // or 'digest'
            'api_key'	=> "demoapikey",
            'api_name'	=> "x-api-key"
        );
        $this->rest->initialize($config);
        //print_r($config);
        $result = $this->rest->get($proses, $params);
        //echo 'a :'.$proses;
        //print_r($result);
        //exit;

		$msg = $result->error;
        $success = $result->success;
        if ($success) {
            foreach($result->data as $data) {
                if ( $this->getrow('', $this->table, 'count(*) as total', array('kode'=>$data->ID))->total == 0 ) {
                    
					//insert
                    $new_data = [
                        'kode'=>$data->ID,
						'kode2'=>$data->ID,
						'kode_atasan'=>$data->DIATASAN_ID,
						'id_atasan'=>$this->getrow('', 'kepeg_m_unor', 'id', ['kode'=>$data->DIATASAN_ID])->id,
                        'nama'=>$data->NAMA_UNOR,
                        'tcreated'=>date('Y-m-d H:i:s'),
                        'ccreatedby'=>'web-service'
                    ];

                    try {
						$this->db->insert($this->table, $new_data);
						$msg = 'Sinkronisasi berhasil disimpan';
					}catch(Exception $e) {
						$success = false;
						$msg = $e->getMessage();
					}
                } else {
                    //update
                    $new_data = [
						'id_atasan'=>$this->getrow('', 'kepeg_m_unor', 'id', ['kode'=>$data->DIATASAN_ID])->id,
						'kode_atasan'=>$data->DIATASAN_ID,
                        'nama'=>$data->NAMA_UNOR,
                        'tupdated'=>date('Y-m-d H:i:s'),
                        'cupdatedby'=>'web-service'
                    ];

                    $where = ['kode'=>$data->ID];

                    try {
						$this->db->where($where);
						$this->db->update($this->table, $new_data);
						$msg = 'Sinkronisasi berhasil disimpan';
					}catch(Exception $e) {
						$success = false;
						$msg = $e->getMessage();
					}
                }
            }
        }

        echo json_encode(['status'=>$success, 'msg'=>$msg]);
  }

	public function after_insert_processor($id, $post) {
		$new_post = array();
		$new_post['tcreated']   = date('Y-m-d H:i:s');
		$new_post['ccreatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_m_unor', $new_post);
	}

	public function after_update_processor($id, $post, $oldpost) {
		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_m_unor', $new_post);
		
		
		/*if ($post->kepeg_m_unor_kode_satker != '' ) {
  		//update getRekursifUnit
  		$orgs = array();
  		$this->getRekursifUnit2(trim($post->kepeg_m_unor_kode), $orgs);
  		
  		$orgs = "'".implode("','", $orgs)."'";
  		$sql = "Update kepeg_m_unor set kode_satker = '{$post->kepeg_m_unor_kode_satker}' where kode in ({$orgs})";
  	  //echo $sql;exit;
  		$this->db->query($sql);
		}*/
	}

	function manipulate_list_button($buttons) {
		$btn_eselon1 = "<button type='button' class='btn btn-primary btn_save' 
                            onclick='$(\"#m_kepegawaian_unor_list #proses\").val(\"list_eselon_1\");save_sinkronisasi(\"".base_url()."kepegawaian/m_kepegawaian_unor\", \"m_kepegawaian_unor\", \"Sinkronisasi Master Eselon I. Anda yakin ?\", false, \"\", false, true, false, false, \"Sinkronisasi berhasil\");'>
						<i class='fas fa-users'></i> Sinkronisasi ESelon I dari SIMPEG-DIKBUHR
					</button>";
					
		$buttons['ws'] = $btn_eselon1;

		return $buttons;
	}

    /* function listBox_ACTION($buttons, $datas) {
        unset($buttons['ubah']);

        return $buttons;
    } */

    function kepeg_m_unor_output() {
        $js = "<script type='text/javascript'>
					var filter = $('#kepeg_m_unor_kode_satker').val();
                    $(document).ready(function() {

						
						
						$('#q_kepeg_m_unor_id_atasan_txt').keyup(function() {
							if ($(this).val().length == 0) $('#q_kepeg_m_unor_id_atasan').val('');
						});

						$('#q_kepeg_m_unor_id_atasan_txt').typeahead({
							source: function (query, result) {
								$.ajax({
									url: '".base_url()."kepegawaian/m_kepegawaian_unor/getunor',
									data: 'query='+query,
									dataType: 'json',
									type: 'POST',
									beforeSend: function() {
										// alert('sending data');
										// do some loading options
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
								$('#q_kepeg_m_unor_id_atasan').val(item.id);
								return  item.value;
							},
						});

						$('#kepeg_m_unor_id_atasan_txt').keyup(function() {
							if ($(this).val().length == 0) $('#kepeg_m_unor_id_atasan').val('');
						});

						$('#kepeg_m_unor_id_atasan_txt').typeahead({
							source: function (query, result) {
								$.ajax({
									url: '".base_url()."kepegawaian/m_kepegawaian_unor/getunor',
									data: 'query='+query,
									dataType: 'json',
									type: 'POST',
									beforeSend: function() {
										// alert('sending data');
										// do some loading options
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
								$('#kepeg_m_unor_id_atasan').val(item.id);
								return  item.value;
							},
						});

						$('#kepeg_m_unor_kode_satker_txt').typeahead({
							source: function (query, result) {
								$.ajax({
									url: '".base_url()."perbend/m_unor/getunor',
									data: 'query='+query,
									dataType: 'json',
									type: 'POST',
									beforeSend: function() {
										// alert('sending data');
										// do some loading options
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
								$('#kepeg_m_unor_kode_satker').val(item.kode);
								return  item.name;
							},
						});
            
                    });

                    function save_sinkronisasi(url, table_id, default_txt_confirm='', _ismodal=false, _modals='form-modal', _islochref=false, _isneedrefresh=true, _isneededit=false, _isOldFashion=false, _msg='Simpan berhasil.', table_id2) {
                        //var form = $('#'+table_id+'_form-edit').serialize();
                        if ( default_txt_confirm == '' ) default_txt_confirm='Simpan. Anda yakin?';
                        if ( _modals == '' ) _modals='form-modal';
                        if ( table_id2 == '' || typeof(table_id2) == 'undefined' ) table_id2 = table_id;
                
                        var form_name = table_id+'_list';
                        var formData = new FormData(jQuery('#'+form_name)[0]);
						
						var kode_atasan = $('#q_kepeg_m_unor_id_atasan').val();
						
						formData.append('q_kepeg_m_unor_id_atasan', kode_atasan);
                        save_confirm(url+'/save_sinkronisasi', formData, default_txt_confirm, table_id, _ismodal, function(output) {
                            var o = jQuery.parseJSON(output);
                            $('div').removeClass('has-error');
                            if ( o.status == true ) {
                                
                                if ( _msg != '' ) bootbox_alert('', '', _msg, true);
                                if ( _islochref == false ) {
                                    if ( _isneedrefresh ) reload_grid(url+'/lists', table_id, '', table_id+'-panel-default-form');
                                    if ( _isneededit ) { 
                                        edit(url+'/edit/'+o.id, table_id, _ismodal, _modals);
                                        setTimeout(function(){ $('body').css('padding-right', 0); }, 1000);
                                    } else {
                                        if ( _ismodal ) {
                                            $('#'+table_id2+'_form-modal').hide();
                                            $(table_id2+'_form-modal .modal').removeClass('in');
                                            $(table_id2+'_form-modal .modal').attr('aria-hidden','true');
                                            $(table_id2+'_form-modal .modal').css('display', 'none');
                                            $('.modal-backdrop').remove();
                                            $('body').removeClass('modal-open');
                                            setTimeout(function(){ $('body').css('padding-right', 0); }, 1000);                            
                                        } else {
                                            $('#'+table_id+'-panel-default-form').hide();
                                        }
                                    }
                                } else {
                                    location.href = url+'/edit/'+o.id;
                                }
                            } else {
                                if (_modals == '') _modals='form-modal';
                                if ( o.msg != undefined) {
                            bootbox_alert('', '', o.msg, true, false);//bootbox.alert(o.msg);
                        }
                                $('.'+o.obj).focus();
                                $('div .div_'+o.obj).addClass('has-error');
                                if ( _ismodal ) $('#'+_modals).css('overflow', 'scroll')
                                return false;
                            }
                        }, _isOldFashion);
                    }

					$('#{$this->table}_cnippimpinan_txt').typeahead({
						source: function (query, result) {
							$.ajax({
								url: '".base_url()."kepegawaian/m_pegawai/getemployee',
								data: 'query='+query+'&filter='+filter,
								dataType: 'json',
								type: 'POST',
								beforeSend: function() {
									// alert('sending data');
									// do some loading options
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
							$('#{$this->table}_cnippimpinan').val(item.nip);

							$(\"#divLoading\").removeClass('show');
							$('button').removeAttr('disabled');
				    		$('.btn_save').html(\"<i class='fa fa-save' aria-hidden='true'> </i> Simpan\");

							return  item.value+' ['+item.nip+']';
						},
					});
        
                </script>
            ";

        return $js;
    }
    
    function getRekursifUnit($corgid='', &$data=null) {
  		$sql = 'SELECT id, kode_satker, kode from kepeg_m_unor where id_atasan =\''.$corgid.'\' and date_expired IS NULL';
  		$query = $this->db->query($sql);
  		if ( $query ) {
  			$rows = $query->result_array();
  			foreach ($rows as $r) {
  			  if (trim($r['kode_satker'])!='') $data[] = trim($r['kode_satker']);
  				$this->getRekursifUnit(trim($r['id']), $data);
  			}
  		}
  
  		return $data;
    }
    
    function getRekursifUnit2($corgid='', &$data=null) {
  		$sql = 'SELECT id from kepeg_m_unor where id_atasan =\''.$corgid.'\' and date_expired IS NULL';
  		$query = $this->db->query($sql);
  		if ( $query ) {
  			$rows = $query->result_array();
  			foreach ($rows as $r) {
  			  $data[] = trim($r['id']);
  				$this->getRekursifUnit2(trim($r['id']), $data);
  			}
  		}
  
  		return $data;
    }
    
    function getRekursifUnit3($corgid='', &$data=null) {
  		$sql = 'SELECT kode_satker, kode, id from kepeg_m_unor where id_atasan =\''.$corgid.'\' and date_expired IS NULL';
  		$query = $this->db->query($sql);
  		if ( $query ) {
  			$rows = $query->result_array();
  			foreach ($rows as $r) {
  			  $data[] = trim($r['id']);
  				$this->getRekursifUnit3(trim($r['id']), $data);
  			}
  		}
  
  		return $data;
    }
    
    function listBox_kepeg_m_unor_kode_satker($value, $datas) {
		$kode_satker = $value. ' - '.$this->getrow('', 'app_m_unor', 'nama', ['kode'=>trim($value)])->nama;
      	return $kode_satker;
    }

	function insertBox_kepeg_m_unor_kode_satker($name) {
		return $this->updateBox_kepeg_m_unor_kode_satker($name, '', '');
	}
    
    function updateBox_kepeg_m_unor_kode_satker($name, $value, $datas) {
		$kode_satker = $value. ' - '.$this->getrow('', 'app_m_unor', 'nama', ['kode'=>trim($value)])->nama;
   		$input = "<input type='hidden' name='{$name}' id='{$name}' class='form-control {$name}' value='{$value}'/>";
	  	$input .= "<input placeholder='Kode Satker' type='text' name='{$name}_txt' id='{$name}_txt' class='form-control {$name}_txt' value='{$kode_satker}'/>"; 
      
      	return $input;
    }
	
	function searchBox_kepeg_m_unor_id_atasan($name) {
		$input = "<input type='hidden' name='{$name}' id='{$name}' class='form-control {$name}' value=''/>";
		$input .= "<input placeholder='Satuan Kerja' type='text' name='{$name}_txt' id='{$name}_txt' class='form-control {$name}_txt' value=''/>"; 

		return $input;
	}

	function updateBox_kepeg_m_unor_kode($name, $value, $datas) {
		$input = "<input type='text' readonly name='{$name}' id='{$name}' class='form-control {$name}' value='{$value}'/>";

		return $input;
	}

	function updateBox_kepeg_m_unor_nama($name, $value, $datas) {
		$input = "<input type='text' readonly name='{$name}' id='{$name}' class='form-control {$name}' value='{$value}'/>";

		return $input;
	}

	function updateBox_kepeg_m_unor_id_atasan($name, $value, $datas) {
		$nama_atasan = $this->getrow('', 'kepeg_m_unor', 'nama', ['kode'=>$value])->nama;
		$input = "<input type='hidden' name='{$name}' id='{$name}' class='form-control {$name}' value='{$value}'/>";
		$input .= "<input placeholder='Satuan Kerja' type='text' name='{$name}_txt' id='{$name}_txt' class='form-control {$name}_txt' value='{$nama_atasan}'/>"; 

		return $input;
	}

	function insertBox_kepeg_m_unor_id_atasan($name) {
		return $this->updateBox_kepeg_m_unor_id_atasan($name, '', '');
	}
    
    function getunor() {
    		//print_r($_POST);exit;
    		$data = array();
    		$row_array = array();
    
    		$kriteria = $this->input->post('query');
    		
    		$add_filter = "";
    

        //if ( in_array($this->session->groupid, explode(",", $this->session->sysparam->all_group[0])) && !$this->session->superuser ) {
        if ( $this->session->isadmin && !$this->session->superuser ) {
          foreach($this->session->orgs2 as $k=>$v) {
            $ar_unor_[$k] = $v; 
          }
          $ar_unor_ = "'".implode("','", $ar_unor_)."'";

          $add_filter = " and a.id in ({$ar_unor_})";
        }

        $sql = "SELECT a.id, a.kode, a.nama 
          from kepeg_m_unor a
          where (a.nama like '%".$kriteria."%'
          OR a.kode like '%".$kriteria."%') and date_expired IS NULL {$add_filter} 
          ORDER BY a.nama ASC";// and b.\"EXPIRED_DATE\" IS NULL

        //echo $sql;
        //exit;
    		
    
    		//echo $sql;exit;
    		$query = $this->db->query($sql);
    		if ( $query ) {
    		  //print_r($query->result_array());
    				foreach($query->result_array() as $line) {
    
    					$row_array['name']  = ucwords(trim(strtolower($line['nama'])));
    					$row_array['value'] = ucwords(trim(strtolower($line['nama'])));
    					$row_array['kode']   = trim($line['kode']);
						$row_array['id']   = trim($line['id']);
    					
    					array_push($data, $row_array);
    			}
    		}
    		echo json_encode($data);
	  }

	function updateBox_kepeg_m_unor_cnippimpinan($name, $value, $datas) {
		//print_r($datas);
		//echo 'value : '.$value;

		$input = "<input type='hidden' 
			  name='{$name}' id='{$name}' 
			  class='form-control {$name}' 
			  value='{$value}'/>";

		if ( $value != NULL) $nama_txt = $this->getrow('', 'kepeg_m_pegawai', 'vname', array('cnip'=>trim($value)))->vname." [".$value."]";
		else $nama_txt = '';

		$input .= "<input type='text' 
				placeholder='Masukkan NIP/Nama Pegawai'
				name='{$name}_txt' id='{$name}_txt' 
				class='form-control {$name}_txt' 
				value='{$nama_txt}'/>";
				
		return $input;
  	}

	function insertBox_kepeg_m_unor_cnippimpinan($name) {
		$input = "<input type='hidden' 
			  name='{$name}' id='{$name}' 
			  class='form-control {$name}' 
			  value=''/>";

	  $input .= "<input type='text' 
			  placeholder='Masukkan NIP/Nama Pegawai'
			  name='{$name}_txt' id='{$name}_txt' 
			  class='form-control {$name}_txt' 
			  value=''/>";
			  
	   return $input;
  	}

	function listBox_kepeg_m_unor_cnippimpinan($value, $datas) {
		if ( $value != NULL) $nama_txt = $this->getrow('', 'kepeg_m_pegawai', 'vname', array('cnip'=>trim($value)))->vname." [".$value."]";
		return $nama_txt;
	}

	function before_insert_processor($post) {
		$post->kepeg_m_unor_isinkron = 0;

		return $post;
	}

	function manipulate_search_button($buttons) {
		$buttons['reset']  = "<button type='button' class='btn btn-primary btn-sm btn-flat' 
			                 onclick='$(\"#".strtolower($this->router->class)."_form_search\").trigger(\"reset\");
							 $(\"#".strtolower($this->router->class)."_form_search #q_kepeg_m_unor_id_atasan\").val(\"\");
			                 $(\"#".strtolower($this->router->class)."_form_search select\").val(\"\");$(\"#".strtolower($this->router->class)."_form_search select\").select2().select2(\"val\", null);
			                 reload_grid(\"".base_url().$this->router->fetch_module()."/".$this->router->class."/lists\", \"".strtolower($this->router->class)."\");$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();'>
				        		<i class='glyphicon glyphicon-refresh'></i>&nbsp;&nbsp;Bersihkan Pencarian
				        	</button>";

		return $buttons;
	}
}