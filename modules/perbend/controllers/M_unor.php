<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "Mapping_unor.php";

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
class M_unor extends MX_Controller {
  var $prefix = 'app';
  var $table;
	public function __construct() {
		parent::__construct();
		$controller = "perbend/m_unor";
		$this->table  = $this->prefix."_m_unor";

    $this->_setTitle('Satuan Kerja');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);
		$this->_addField($this->table, 'kode', 'Kode Satker', true);
		$this->_addField($this->table, 'kode_atasan', 'Satker Induk', true);
		$this->_addField($this->table, 'nama', 'Nama Satker', true);
		$this->_addField($this->table, 'file', 'Upload Satker', false, true, true);
		$this->_addField($this->table, 'daftar', 'Mapping Satker >> DIKBUDHR', true, true, true);
		$this->_addField($this->table, 'isboleh', 'Tanpa No Sertifikat ?', false);
		$this->_addField($this->table, 'deleted', 'Status Record', true);
		//$this->_addField($this->table, 'daftarrekening', '', false, false, true, 0, 'left', '','', true);
		
		
		$this->_add2SearchField($this->table, 'kode');
		$this->_add2SearchField($this->table, 'nama');
		$this->_add2SearchField($this->table, 'deleted');
		
		$this->_add2ListField($this->table, 'kode, kode_atasan, nama, daftar, isboleh, deleted');
		
		$this->_changeType($this->table, 'deleted', 'combobox', array(0=>'Aktif', 1=>'Non Aktif'));
		$this->_changeType($this->table, 'isboleh', 'combobox', array(0=>'Tidak', 1=>'Ya'));
		$this->_changeType($this->table, 'file', 'file');


		$this->_setAlign($this->table, 'isboleh', 'center');
		$this->_setAlign($this->table, 'deleted', 'center');

		/* if ( !$this->session->isadmin ) {
			if ( sizeOf($this->session->orgs2) > 0 ) {
				$orgs = "'".implode("','", $this->session->orgs2)."'";
				$this->_addQuery($this->table, "kode in (".$orgs.")", 'and', '', true);
			}
		} */

		//clear session header_controller
		$this->session->unset_userdata('header_controller'); 
	}

	function insertCheck_app_m_unor_kode($value, $post) {
		$value = trim($value);
		$data['status'] = true;

		$sql = "SELECT count(*) as total, kode, nama FROM app_m_unor where kode='{$value}'";
		$row = $this->db->query($sql)->row();
		if ( $row->total > 0 ) {
			$data['status'] = false;
			$data['msg'] = "Kode {$row->kode} sudah terdaftar untuk nama satker {$row->nama}. Periksa kembali isian anda.";
			$data['obj'] = "app_m_unor_kode";
		}

		return $data;
	}

	function updateCheck_app_m_unor_kode($value, $post, $id) {
		$value = trim($value);
		$data['status'] = true;

		$sql = "SELECT count(*) as total, kode, nama FROM app_m_unor where kode='{$value}' and id != {$id}";
		$row = $this->db->query($sql)->row();
		if ( $row->total > 0 ) {
			$data['status'] = false;
			$data['msg'] = "Kode {$row->kode} sudah terdaftar untuk nama satker {$row->nama}. Periksa kembali isian anda.";
			$data['obj'] = "app_m_unor_kode";
		}

		return $data;
	}

	function insertCheck_app_m_unor_nama($value, $post) {
		$value = trim($value);
		$data['status'] = true;

		$sql = "SELECT count(*) as total, kode, nama FROM app_m_unor where nama='{$value}'";
		$row = $this->db->query($sql)->row();
		if ( $row->total > 0 ) {
			$data['status'] = false;
			$data['msg'] = "Nama satker {$row->nama} sudah terdaftar dgn kode {$row->kode}. Periksa kembali isian anda.";
			$data['obj'] = "app_m_unor_nama";
		}

		return $data;
	}

	function updateCheck_app_m_unor_nama($value, $post, $id) {
		$value = trim($value);
		$data['status'] = true;

		$sql = "SELECT count(*) as total, kode, nama FROM app_m_unor where nama='{$value}' and id != {$id}";
		$row = $this->db->query($sql)->row();
		if ( $row->total > 0 ) {
			$data['status'] = false;
			$data['msg'] = "Nama satker {$row->nama} sudah terdaftar dgn kode {$row->kode}. Periksa kembali isian anda.";
			$data['obj'] = "app_m_unor_nama";
		}

		return $data;
	}

	function insertBox_app_m_unor_kode_atasan($name) {
		return $this->updateBox_app_m_unor_kode_atasan($name, '', '');
	}

	function updateBox_app_m_unor_kode_atasan($name, $value, $datas) {
		$nama = $this->getrow('', 'app_m_unor', 'nama', ['kode'=>trim($value)])->nama;
		$input = "<input type='hidden' name='{$name}' id='{$name}' class='form-control {$name}' value='{$value}'/>";
		$input .= "<input placeholder='Satuan Kerja' type='text' name='{$name}_txt' id='{$name}_txt' class='form-control {$name}_txt' value='{$nama}''/>"; 

		return $input;
	}

	function ubah_status($ids, $yesno) {
		$data = [
					'isboleh'=>$yesno,
					'updated'=>date('Y-m-d H:i:s'),
					'updatedby'=>trim($this->session->username)
		];
		$where = ['id'=>$ids];

		try {
			$this->db->where($where);
			$this->db->update($this->table, $data);

			$datas = ['status'=>true, 'msg'=>'Berhasil'];
		} catch(Exception $e) {
			$datas = ['status'=>false, 'msg'=>$e->getMessage()];
		}

		echo json_encode($datas);
	}

	function listbox_app_m_unor_isboleh($value, $datas) {
		$isboleh = array(0=>'Tidak', 1=>'Ya');
		//if ( $this->session->isadmin ) {
			$input = "<select name='app_m_unor_isboleh[]' class='form-control' onchange='chg_isboleh({$datas->app_m_unor_id}, $(this).val());'>";
			foreach($isboleh as $k=>$v) {
				if ( (int)$k == (int)$value) $selected = " selected ";
				else $selected = " ";
				$input .= "<option {$selected} value='{$k}'>{$v}</option>";
			}
			$input .= "</select>";

			$input .= "<script type='text/javascript'>
			
							function chg_isboleh(ids, yesno) {
								var jwb = confirm('Ubah Status. Anda Yakin ?');
								if ( jwb ) {
									$.post('".base_url()."perbend/m_unor/ubah_status/'+ids+'/'+yesno, {}, function(data) {
										var o = jQuery.parseJSON(data);
										if ( o.status == true ) {
											bootbox_alert('', '', o.msg, true);
											setTimeout(reload_grid('".base_url()."perbend/m_unor/lists', 'app_m_unor'), 2000);
										} else {
											alert('Ubah Status Gagal');
											return false;
										}
									});
								}
							}
						
						</script>
					";
		//} else $input = $isboleh[(int)$value];

		return $input;
	}
	
	function listBox_app_m_unor_daftar($value, $datas) {
			$unitorgs = '';
			$return = "";
			//
			$ar_units = $this->getall($this->db, 'kepeg_m_unor', 'kode, nama', array('kode_satker'=>$datas->app_m_unor_kode));
			if ( $ar_units ) {
				foreach($ar_units as $a) {
					$nm_unit = $a->nama;
					$unitorgs .= "<div>
									<span class='label label-info'>".ucwords(strtolower($nm_unit))."</span>
								</div>";
					
				}
				//$unitorgs = substr($unitorgs, 0, strlen($unitorgs)-1);
				$return .= $unitorgs;
			} else $return .= '-';
			
			//if ( $this->session->isadmin ) {
				$return .= "<div style='margin-top:5px;'>
						<button type='button' class='btn btn-primary btn-xs' data-toggle='modal' data-target='#mapping_unor_form-modal'  
						onclick=\"edit('".base_url()."perbend/mapping_unor/edit/{$datas->app_m_unor_id}', 'm_unor');\">
							<i class='fas fa-user-plus' title='Tambah Mapping'></i> Mapping
						</button>
					</div>";
			//}
			return $return;
	}
	
  function app_m_unor_output() {
        $js = "<script type='text/javascript'>
                    $(document).ready(function() {
						

						$('#app_m_unor_kode_atasan_txt').typeahead({
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
								$('#app_m_unor_kode_atasan').val(item.kode);
								return  item.value;
							},
						});
                    });
                </script>
            ";

        return $js;
  }
  
  /*function save() {
	
	  //print_r($_POST);
	  //print_r($_FILES);exit;
	  $files = $this->uploadfiles($_FILES['app_m_unor_file']);
	  $spreadsheet = IOFactory::load($files->tmp);
		$sheet = $spreadsheet->getActiveSheet();
	  $rowIterator = $sheet->getRowIterator();
	  $array_data = array();
			$data = array();
			$array_nip = array();
			foreach($rowIterator as $row){
				$rowIndex = $row->getRowIndex();	
				
				//ambil NIP
					if ($rowIndex > 1) {
						$array_data[$rowIndex] = array('A'=>'','B'=>'', 'C'=>'', 'D'=>'', 'E'=>'');
								
						$cell = $sheet->getCell('A' . $rowIndex);
						$array_data[$rowIndex]['A'] = $cell->getValue();

						$cell = $sheet->getCell('B' . $rowIndex);
						$array_data[$rowIndex]['B'] = $cell->getValue();
						
						$cell = $sheet->getCell('C' . $rowIndex);
						$array_data[$rowIndex]['C'] = $cell->getValue();
						
						$cell = $sheet->getCell('D' . $rowIndex);
						$array_data[$rowIndex]['D'] = $cell->getValue(); 
						
						$cell = $sheet->getCell('E' . $rowIndex);
						$array_data[$rowIndex]['E'] = $cell->getValue();
					}
			}

			//kita looping data dan ambil nilai unique saja.
			foreach($array_data as $d) {
			  if ( trim($d['B']) == '' ) break;
				else $data[] = $d;
			}
			
			//print_r($data);
	    //print_r($files);
	    //exit;
	    $tcreated = date('Y-m-d H:i:s');
	    $ccreatedby = 'upload';
	    
			$query = array();
			foreach($data as $d) {
			    $nourut = trim($d['A']);
  			  $kode1 = trim($d['B']);
  			  $nama1 = trim($d['C']);
  			  $kode2 = trim($d['D']);
  			  $nama2 = trim($d['E']);

			     
			  try {
			   
			   $table = 'app_m_unor';
			   $data_unor = [
  			      'kode' => $kode1,
  			      'nama' => $nama1,
  			      'created' => $tcreated,
  			      'createdby' => $ccreatedby
			   ];
			   //cek dulu
			   $where = [
			       'kode' => $kode1,
			       'kode_atasan' => '00'
			   ];
			   $last_id = $this->getrow($this->db, $table, 'id', $where)->id;
			   if ($last_id == '' ) {
			     $this->db->insert($table, $data_unor);
			     $last_id = $this->db->insert_id();
			   } else {
			     $where = ['id' => $last_id];
			     $this->db->where($where);
			     $this->db->update($table, $data_unor);
			   }
			  
			   $table = 'app_m_unor';
			   $data_unor = [
  			      'kode_atasan' => $kode1,
  			      'kode' => $kode2,
  			      'nama' => $nama2,
  			      'created' => $tcreated,
  			      'createdby' => $ccreatedby
			   ];
			   //cek dulu
			   $where = [
			       'kode_atasan' => $kode1,
			       'kode' => $kode2,
			   ];
			   $last_id = $this->getrow($this->db, $table, 'id', $where)->id;
			   if ($last_id == '' ) {
			     $this->db->insert($table, $data_unor);
			     $last_id = $this->db->insert_id();
			   } else {
			     $where = ['id' => $last_id];
			     $this->db->where($where);
			     $this->db->update($table, $data_unor);
			   }
			   
			   //update kode satker by nama
			   $table = 'kepeg_m_unor';
			   $data_unor = [
  			      'kode_satker' => $kode2,
			   ];
			   //cek dulu
			   $where = [
			       'nama' => $nama,
			   ];
			   $this->db->where($where);
			   $this->db->update($table, $data_unor);
			   
			   $datas['id'] = 0;
			   $datas['status'] = true;
			   $datas['msg'] = 'Upload berhasil';
			  }catch(Exception $e) {
			    //echo 'error no. sk'.$nosk;
			    die($e);
			    $datas['status'] = false;
			    $datas['msg'] = $e->errorInfo;
			  }
			}
			
			//print_r($query);
			//exit;
			echo json_encode($datas);
	}*/
	
	function listBox_action($buttons, $datas) {
	  unset($buttons['hapus']);
	  
	  return $buttons;
	}
	
	/* function manipulate_list_button($buttons) {

		
	  return $buttons;
	} */
	
	// OPTIMIZED: load semua app_m_unor SEKALI ke memory, traversal in-memory
	// Menggantikan N recursive SQL queries dengan 1 query + traversal array
	private static $_unor_tree_cache = null;
	private static $_unor_tree_cache_with_deleted = null;

	private function _loadUnorTree($include_deleted = false) {
		$cache_key = $include_deleted ? '_unor_tree_cache_with_deleted' : '_unor_tree_cache';
		if (self::$$cache_key === null) {
			$where = $include_deleted ? '' : ' WHERE deleted=0';
			$all = $this->db->query("SELECT kode, kode_atasan, nama FROM app_m_unor{$where}")->result_array();
			$tree = [];
			foreach ($all as $row) {
				$parent = trim($row['kode_atasan']);
				$tree[$parent][] = ['kode' => trim($row['kode']), 'nama' => trim($row['nama'])];
			}
			self::$$cache_key = $tree;
		}
		return self::$$cache_key;
	}

	function getRekursifUnit($corgid='', &$data=null) {
		// OPTIMIZED: 1 query saja, traversal in-memory (tidak rekursif ke DB)
		$tree = $this->_loadUnorTree(false);
		$this->_traverseTree($corgid, $tree, $data);
		return $data;
	}

	private function _traverseTree($kode, &$tree, &$data) {
		if (!isset($tree[$kode])) return;
		foreach ($tree[$kode] as $child) {
			$data[$child['kode']] = $child['nama'];
			$this->_traverseTree($child['kode'], $tree, $data);
		}
	}

	function getRekursifUnit2($corgid='', &$data=null) {
		// OPTIMIZED: 1 query saja, traversal in-memory (include deleted)
		$tree = $this->_loadUnorTree(true);
		$this->_traverseTree($corgid, $tree, $data);
		return $data;
	}
    
    function getunor() {
    		//print_r($_POST);exit;
    		$data = array();
    		$row_array = array();
    
    		$kriteria = $this->input->post('query');
    
    		$sql = "SELECT * 
    		    from app_m_unor a where deleted=0 and (a.nama like '%".$kriteria."%'
    				OR a.kode like '%".$kriteria."%') 
    				ORDER BY a.nama ASC";// and b.\"EXPIRED_DATE\" IS NULL
    		
    
    		//echo $sql;
    		$query = $this->db->query($sql);
    		if ( $query ) {
    		  //print_r($query->result_array());
    				foreach($query->result_array() as $line) {
    
    					$row_array['name']  = trim($line['kode'])." - ".ucwords(trim(strtolower($line['nama'])));
    					$row_array['value'] = ucwords(trim(strtolower($line['nama'])));
    					$row_array['kode']   = trim($line['kode']);
    					
    					array_push($data, $row_array);
    			}
    		}
    		echo json_encode($data);
	}

	function getunorbykode_satker() {
		$kriteria = $this->input->post('query');

		$sql = "SELECT nama from app_m_unor a where a.kode_satker = '".$kriteria."'";
		return $this->db->query($sql)->row()->nama;
	}

	/* public function insertBox_app_m_unor_daftarrekening($name) {
		return "<p class='form-control-static {$name}'></p>";
	}

	public function updateBox_app_m_unor_daftarrekening($name, $value, $datas) {
		$html = "<div>
				<ul class='nav nav-tabs' role='tablist' id='all_tabs'>
				  <li role='presentation' class='active'>
					  <a href='#tab1' data-toggle='tab' aria-controls='tab1' role='tab'>Daftar Rekening</a>
				  </li>
				</ul>
			  
				<div class='tab-content'>
				  <div role='tabpanel' class='tab-pane fade in active' id='tab1'></div>
				</div>
			  </div>";
			  
	  	$html .= "<script type='text/javascript'>
				  $(document).ready(function() {
					  //tab 1
					  url = '".base_url()."perbend/m_unor_rekening/index';
					  $('#tab1').html(getHTML(url, '', 0, false));
					  $('#m_unor_rekening #q_app_m_unor_rekening_kode_satker').val($('.app_m_unor_kode').val());
				  });
				  
				</script>";				
			  
	  return $html;	
	}

	public function viewBox_app_m_unor_daftarrekening($name, $value, $datas) {
		$html = "<div>
				<ul class='nav nav-tabs' role='tablist' id='all_tabs'>
				  <li role='presentation' class='active'>
					  <a href='#tab1' data-toggle='tab' aria-controls='tab1' role='tab'>Daftar Rekening</a>
				  </li>
				</ul>
			  
				<div class='tab-content'>
				  <div role='tabpanel' class='tab-pane fade in active' id='tab1'></div>
				</div>
			  </div>";
			  
	  	$html .= "<script type='text/javascript'>
				  $(document).ready(function() {
					  //tab 1
					  url = '".base_url()."perbend/m_unor_rekening/index';
					  $('#tab1').html(getHTML(url, '', 0, false));
					  $('#m_unor_rekening #q_app_m_unor_rekening_kode_satker').val($('.app_m_unor_kode').val());
				  });
				  
				</script>";				
			  
	  return $html;	
	} */

	public function viewBox_app_m_unor_kode($name, $value, $datas) {
		$input = "<input type='hidden' name='{$name}' id='{$name}' class='{$name}' value='{$value}'/>";
		return $input;
	}

	/* function manipulate_update_button($buttons, $datas) {
		if ( !$this->session->isadmin ) unset($buttons['simpan']);

		return $buttons;
	} */
}