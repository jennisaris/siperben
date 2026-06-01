<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
class T_usulan_pelatihan extends MX_Controller {
  var $prefix = 'app';
  
  var $ar_calon_bendahara;
  var $ar_jenis_bendahara;
  var $ar_kppn;
  var $ar_bulan = [
  	   '01'=>'Januari',
  	   '02'=>'Februari',
  	   '03'=>'Maret',
  	   '04'=>'April',
  	   '05'=>'Mei',
  	   '06'=>'Juni',
  	   '07'=>'Juli',
  	   '08'=>'Agustus',
  	   '09'=>'September',
  	   '10'=>'Oktober',
  	   '11'=>'November',
  	   '12'=>'Desember'
	];
	
	var $ar_nm_bulan = [
		'Januari' => '01',
		'Februari' => '02',
		'Maret' => '03',
  	    'April' => '04',
  	   'Mei' => '05',
  	   'Juni'=>'06',
  	   'Juli'=>'07',
  	   'Agustus'=>'08',
  	   'September'=>'09',
  	   'Oktober'=>'10',
  	   'November'=>'11',
  	   'Desember'=>'12'
	];
	var $ar_golongan;
  var $ar_unor;
	public function __construct() {
		parent::__construct();
		$controller = "perbend/t_usulan_pelatihan";
		$table  = $this->prefix."_t_pelatihan_peserta";

   	$this->_setTitle('Usulan Pelatihan');
		$this->_setController($controller);
		$this->_init('default');
		
		//print_r($this->uri->segment(4));

		if ($this->uri->segment(3) == 'edit' 
		  && $this->uri->segment(4) == 0 ) {
		    $true = true;$true2=false;
		} else {
		  $true = false;$true2=true;
		}
		
		$this->_addTable($table);
		$table2 ="kepeg_m_pegawai";
		$this->_addTable($table2);
		
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'tahun', 'Tahun', $true2, $true);
		$this->_addField($table, 'bulan', 'Bulan', $true2, $true);
		$this->_addField($table, 'nama_kegiatan', 'Nama Kegiatan', $true2, $true);
		$this->_addField($table, 'lokasi', 'Lokasi', $true2, $true);
		$this->_addField($table, 'tanggal', 'Tgl. Mulai', $true2, $true);
		$this->_addField($table, 'tanggal2', 'Tgl. Selesai', $true2, $true);
		$this->_addField($table, 'nip', 'NIP', false, $true);
		$this->_addField($table2, 'vname', 'Nama Pegawai', false, $true);
		$this->_addField($table, 'golid', 'Golongan', false, $true);
		$this->_addField($table, 'jabatan', 'Jabatan', false, $true);
		$this->_addField($table, 'unorid', 'Satuan Kerja', false, $true);
		$this->_addField($table, 'calon_bendahara', 'Calon Bendahara', false, $true);
		$this->_addField($table, 'jenis_bendahara', 'Jenis Bendahara', false, $true);
		$this->_addField($table, 'no_sertifikat', 'No. Sertifikat', $true2, $true);
		$this->_addField($table, 'angkatan', 'Angkatan', false, $true);
		$this->_addField($table, 'kelas', 'Kelas', false, $true);
		$this->_addField($table, 'kppn_id', 'KPPN', false, $true);
		$this->_addField($table, 'mode', 'demo', false, true, true);
		$this->_addField($table, 'file', 'Daftar usulan pelatihan', false, $true2, true);
		
		
		$this->_addField($table2, 'id', '', false, true);
		$this->_addField($table2, 'cnip', 'cnip', false, true);
		$this->_addField($table2, 'vname', 'Nama Pegawai', false, true);
		$this->_addField($table2, 'ckduker', 'ckduker', false, true);
		//$this->_addField($table2, 'vname', 'Nama Pegawai', false, true);
		
		$this->_addRelation($table, $table2, array('nip'=>'cnip'));
		
		$table3='kepeg_m_unor';
		$this->_addField($table3, 'id', '', false, true);
		$this->_addField($table3, 'kode', 'kode', false, true);
		$this->_addField($table3, 'kode_atasan', 'kode_atasan', false, true);
		$this->_addField($table3, 'nama', 'Unit Kerja', false, true);
		//$this->_addField($table2, 'vname', 'Nama Pegawai', false, true);
		
		$this->_addRelation($table2, $table3, array('ckduker'=>'kode'));
		
		//$this->_add2ListField($table, 'tahun,bulan, nama_kegiatan, lokasi, tanggal, tanggal2');
		$this->_add2ListField($table, 'tahun, bulan, nama_kegiatan, tanggal, tanggal2, nip');
		$this->_add2ListField($table2, 'vname');
		$this->_add2ListField($table3, 'nama');
		//$this->_add2ListField($table, 'golid, jabatan, unorid, calon_bendahara, jenis_bendahara, no_sertifikat, angkatan, kelas, kppn_id');
		$this->_add2ListField($table, 'jabatan, no_sertifikat, angkatan');
		
		$this->_add2SearchField($table, 'tahun');
		$this->_add2SearchField($table, 'bulan');
		$this->_add2SearchField($table, 'nip');
		$this->_add2SearchField($table2, 'vname');
		/*print_r($this->session->sysparam->calon);
		$calon_id = array_search('Calon Bendahara', $this->session->sysparam->calon);
		echo $calon_id;
    $jabatan2_id = array_search(trim($d['J']), $this->session->sysparam->jabatan_calon);
  	echo $jabatan2_id;*/
  	
  	$this->ar_calon_bendahara = $this->session->sysparam->calon;
	  $this->ar_jenis_bendahara = $this->session->sysparam->jabatan_calon;
	  
	  $this->_changeType($table, 'calon_bendahara', 'combobox', $this->ar_calon_bendahara);
	  $this->_changeType($table, 'jenis_bendahara', 'combobox', $this->ar_jenis_bendahara);
	  $this->_changeType($table, 'bulan', 'combobox', $this->ar_bulan);
	  
	  foreach($this->getall('', 'app_m_kppn', 'id, nama') as $r) {
	    $this->ar_kppn[$r->id] = $r->nama;
	  }
	  $this->_changeType($table, 'kppn_id', 'combobox', $this->ar_kppn);
	  
	  foreach($this->getall('', 'kepeg_m_golongan',"id, concat(pangkat, ', ', nama) as pangkat") as $r) {
	    $this->ar_golongan[$r->id] = $r->pangkat;
	  }
	  $this->_changeType($table, 'golid', 'combobox', $this->ar_golongan);
	  
	  foreach($this->getall('', 'app_m_unor', 'kode, nama', array('kode_atasan !=' => '00')) as $r) {
	    $this->ar_unor[$r->kode] = $r->nama;
	  }
	  $this->_changeType($table, 'unorid', 'combobox', $this->ar_unor);
	  
	  $this->_changeType($table, 'tanggal', 'date', 'd-m-Y');
	  
	  $this->_setAlign($table, 'tahun', 'center');
	  $this->_setAlign($table, 'bulan', 'center');
	  $this->_setAlign($table, 'tanggal', 'center');
		
		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}
	
	function listBox_kepeg_m_unor_nama($value, $datas) {
	  return strtoupper($value).' - '.strtoupper($this->getrow('', 'kepeg_m_unor', 'nama', ['kode'=>$datas->kepeg_m_unor_kode_atasan])->nama);
	}
	
	
	function save() {
	  //print_r($_POST);
	  //print_r($_FILES);
	  //exit();
	  $error = 0;
	  if ($this->input->post('app_t_pelatihan_peserta_mode') == 1 ) {
	    $id = $this->input->post('app_t_pelatihan_peserta_id');
      $nama_kegiatan = $this->input->post('app_t_pelatihan_peserta_nama_kegiatan');
      $lokasi = $this->input->post('app_t_pelatihan_peserta_lokasi');
      $tanggal = $this->input->post('app_t_pelatihan_peserta_tanggal');
      
      $data = ['status'=>true];
      if (empty($nama_kegiatan)) {
        $data = [
          'status' => false,  
          'msg' => 'Lengkapi kolom Nama Kegiatan',
          'obj' => 'app_t_pelatihan_peserta_nama_kegiatan'
        ];
        $error++;
      }
      if (empty($lokasi)) {
        $data = [
          'status' => false,  
          'msg' => 'Lengkapi kolom Lokasi',
          'obj' => 'app_t_pelatihan_peserta_lokasi'
        ];
        
        $error++;
      }
      if (empty($tanggal)) {
        $data = [
          'status' => false,  
          'msg' => 'Lengkapi kolom Tanggal Kegiatan',
          'obj' => 'app_t_pelatihan_peserta_tanggal'
        ];
        
        $error++;
      }
      
      if ($error == 0) {
          try {
              $where = ['id'=>$id];
              $datas = [
                'nama_kegiatan' => $nama_kegiatan,  
                'lokasi' => $lokasi,  
                'tanggal' => date('Y-m-d', strtotime($tanggal)),
                'updatedby' => trim($this->session->username),
                'updated' => date('Y-m-d H:i:s')
              ];
              $this->db->where($where);
              $this->db->update($this->prefix.'_t_pelatihan_peserta', $datas);
              //echo $this->db->last_query();
              //exit;
              $data['status'] = true;
              $data['msg'] = 'Simpan berhasil';
          } catch (Exception $e) {
            $data['status'] = false;
            $data['msg'] = $e->getMessage();
          }
      }
      echo json_encode($data);
	  } else {
	      //print_r($_FILES);
    	  //print_r($this->session->sysparam);
    	  $calon = $this->ar_calon_bendahara;
    	  $jabatan_calon = $this->ar_jenis_bendahara;
    	  //print_r($jabatan_calon);
    	  //ini_set('upload_max_filesize', '1000M');
        //ini_set('post_max_size', '1000M');
    	   $nm_bln = array(
      	   'Januari'=>'01',
      	   'Februari'=>'02',
      	   'Maret'=>'03',
      	   'April'=>'04',
      	   'Mei'=>'05',
      	   'Juni'=>'06',
      	   'Juli'=>'07',
      	   'Agustus'=>'08',
      	   'September'=>'09',
      	   'Oktober'=>'10',
      	   'November'=>'11',
      	   'Desember'=>'12'
    	   );
    	   
    	   $kode_sertifikat = [
    	     'BP' => 'cnobnt',
    	     'BPn' => 'cnobnt',
    	     'BPP' => 'cnobnt',
    	     'PPSPM' => 'cnosnt',
    	     'PPK' => 'cnopnt',
    	     'KPA' => ''
    	    ];
    	
    	  $files2 = $this->uploadfiles($_FILES['app_t_pelatihan_peserta_file']);
    	 // print_r($files2->name);exit;
    	  $nama_file = explode('_', $files2->name);
    	  $tahun = $nama_file[sizeOf($nama_file)-2];
    	  $bulan = explode('.',$nama_file[sizeOf($nama_file)-1]);
    	  $bulan = $bulan[0];
    	  
    	  $spreadsheet = IOFactory::load($files2->tmp);
    		$sheet = $spreadsheet->getActiveSheet();
    	  $rowIterator = $sheet->getRowIterator();
    	  $array_data = array();
    			$data = array();
    			$array_nip = array();
    			
        			foreach($rowIterator as $row){
        				$rowIndex = $row->getRowIndex();	
        				
        				//ambil NIP
        					if ($rowIndex > 1) {
        					  
            						$array_data[$rowIndex] = array(
              						'A'=>'','B'=>'', 'C'=>'', 'D'=>'', 'E'=>'', 
              						'F'=>'', 'G'=>'', 'H'=>'', 'I'=>''
            						);
            								
            						$cell = $sheet->getCell('A' . $rowIndex);
            						if ( trim($cell->getValue()) == '' ) break;
            						$array_data[$rowIndex]['A'] = $cell->getValue();
            						
            						$cell = $sheet->getCell('B' . $rowIndex);
            						if ( trim($cell->getValue()) == '' ) break;
            						$array_data[$rowIndex]['B'] = $cell->getValue();
            
            						$cell = $sheet->getCell('C' . $rowIndex);
            						if (!empty($cell->getValue())) {
            						  $array_data[$rowIndex]['C'] = $cell->getValue(); 
            						} else {
            						  $datas['status'] = FALSE;
                          $datas['msg'] = "Kolom NIP di baris {$rowIndex} pada file {$files2->name} tidak boleh kosong. Cek kembali!!";
                          echo json_encode($datas);
                          exit;
            						}
            						
            						$cell = $sheet->getCell('D' . $rowIndex);
            						$array_data[$rowIndex]['D'] = $cell->getValue();
            						
            						$cell = $sheet->getCell('E' . $rowIndex);
            						$array_data[$rowIndex]['E'] = $cell->getValue();
            						
            						$cell = $sheet->getCell('F' . $rowIndex);
            						$array_data[$rowIndex]['F'] = $cell->getValue();
            						
            						$cell = $sheet->getCell('G' . $rowIndex);
            						$array_data[$rowIndex]['G'] = $cell->getValue();
            						
            						$cell = $sheet->getCell('H' . $rowIndex);
            						$array_data[$rowIndex]['H'] = $cell->getValue();
            						
            						$cell = $sheet->getCell('I' . $rowIndex);
            						$array_data[$rowIndex]['I'] = $cell->getValue();
									
									$cell = $sheet->getCell('J' . $rowIndex);
            						$array_data[$rowIndex]['J'] = $cell->getValue();
            						
        			    }
        	  }
    
    			//kita looping data dan ambil nilai unique saja.
    			foreach($array_data as $d) {
    			  $data[] = $d;
    			}
    			
    			//echo $tahun.' '.$bulan;
    		  //print_r($data);
    	    //print_r($files);
    	    //exit;
    	    
    	    $tcreated = date('Y-m-d H:i:s');
    	    $ccreatedby = 'upload';
    	    
    	    $nipError = "";
    			$query = array();
    			foreach($data as $d) {
    			  
    			    if (empty(trim($d['C']))) break;
    			    
    			    $tahun = trim($d['A']); 
    			    $bulan = $nm_bln[trim($d['B'])]; 
      			  $nip = trim($d['C']);
      			  $nama = trim($d['D']);
      			  $nama_keg = trim($d['E']);
      			  /*$tanggal = explode('s.d.', trim($d['F']));
      			  $tgl1 = $tahun.'-'.$bulan.'-'.(int)$tanggal[0];
      			  $tgl2 = $tahun.'-'.$bulan.'-'.(int)$tanggal[1];*/
				  $tanggal1 = explode(' ', trim($d['F']));
				  $tgl1 = $tanggal1[2].' '.$ar_nm_bulan[trim($tanggal1[1])].' '.$tanggal1[0];
				  $tanggal2 = explode(' ', trim($d['G']));
				  $tgl2 = $tanggal2[2].' '.$ar_nm_bulan[trim($tanggal2[1])].' '.$tanggal2[0];
      			  $jenis_bendahara = trim($d['H']);
      			  //$golongan_id = $this->getrow('', 'kepeg_m_golongan', 'id', array('nama'=>trim($d['H'])))->id;
      			  //$jabatan = trim($d['G']);
      			  //$calon_id = array_search(trim($d['I']), $calon);
      			  //echo 'calon_id : '.$calon_id;
      			  //$jabatan2_id = array_search(trim($d['G']), $jabatan_calon);
      			  //echo  'jabatan2_id : '.$jabatan2_id;
      			  //$kode_satker = trim($d['K']);
      			  //$kppn_id = $this->getrow('', 'app_m_kppn', 'id', array('nama'=>trim($d['O'])))->id;
      			  $no_sertifikat = trim($d['I']);
      			  $angkatan = trim($d['J']);
      			  //$kelas = trim($d['R']);
    			  
    			   	 //tes
    			     
    			  try {
    		
    			   if ($nip !='' ) {
      			     $tbl_pelatihan_peserta ='app_t_pelatihan_peserta';
      			     $data_pegawai = [
      			       'tahun' => trim($tahun),
      			       'bulan' => trim($bulan),
        			     'nip' => trim($nip),
        			     //'golid' => $golongan_id,
        			     //'unorid' => $kode_satker,
        			     'jabatan' => $jenis_bendahara,
        			     //'calon_bendahara' => $calon_id,
        			     //'jenis_bendahara'=> $jabatan2_id,
        			     //'kppn_id' => $kppn_id,
        			     'tanggal'=>$tgl1,
        			     'tanggal2'=>$tgl2,
        			     'no_sertifikat'=>$no_sertifikat,
        			     'angkatan'=>$angkatan,
        			     //'kelas'=>$kelas,
        			     'nama_kegiatan'=>$nama_keg,
        			     'created' => $tcreated,
        			     'createdby' => $ccreatedby,
      			     ];
      			    
      			    $where = [
      			       'tahun' => trim($tahun),
        			      'bulan' => trim($bulan),
        			      'nip' => trim($nip),
        			      'tanggal' => $tgl1,
        			      'tanggal2' => $tgl2,
        			      'nama_kegiatan' => $nama_keg,
      			   ];
      			   
      			   /*
      			   $last_id_pegawai = '';
      			   $this->db->select('id');
      			   $this->db->where($where);
      			   $query = $this->db->get($tbl_pelatihan_peserta);
      			   //echo $this->db->last_query();
      			   if ($query) $last_id_pegawai = $query->row()->id;
      			   */
      			   $last_id_pegawai = $this->getrow($this->db, $tbl_pelatihan_peserta, 'id', $where)->id;
      			   //echo 'last_id_pegawai : '.$last_id_pegawai;
      			   if ($last_id_pegawai == '' ) {
      			     $this->db->insert($tbl_pelatihan_peserta, $data_pegawai);
      			     //echo 'Insert : '.$this->db->last_query();
      			     //exit;
      			   } else {
      			     $where = ['id' => $last_id_pegawai];
      			     $this->db->where($where);
      			     $this->db->update($tbl_pelatihan_peserta, $data_pegawai);
      			     //echo 'Update : '.$this->db->last_query();
      			     //exit;
      			   }
      			   
      			   if (!empty(trim($no_sertifikat))) {
      			     
      			     if (!empty($kode_sertifikat[$tipe])) {
        			      
        			       $tbl_pegawai = 'kepeg_m_pegawai';
                   $data_mst_pegawai[$kode_sertifikat[$jenis_bendahara]] = $no_sertifikat;
            			   $where = [
            			     'cnip' => $nip
            			   ];
            			   $this->db->where($where);
            			   $this->db->update($tbl_pegawai, $data_mst_pegawai);
        			   }
      			   }
      			   
      			   $msg = 'Upload berhasil';
      			   $status = true;
    			   } else {
    			     
    			     $msg = 'Data tidak terproses. NIP Kosong';
    			     $nipError .= $nama."\n";
    			     $status = false;
    			     
    			     $datas['id'] = 0;
    			     $datas['status'] = $status;
    			     $datas['msg'] = $msg;
    			     echo json_encode($datas);
    			     exit;
    			   }
    			   
    			  }catch(Exception $e) {
    			    //echo 'error no. sk'.$nosk;
    			    //die($e);
    			    $status = false;
    			    $msg = $e->errorInfo;
    			    $datas['id'] = 0;
    			    $datas['status'] = $status;
    			    $datas['msg'] = $msg;
    			    echo json_encode($datas);
    			    exit;
    			  }
    			}
    			
    			$datas['id'] = 0;
    			$datas['status'] = $status;
    			$datas['msg'] = $msg;
    			//print_r($query);
    			//exit;
    			foreach ($files->tmp as $k=>$t) {
      	     unlink(realpath($uploads)."/".$files->name[$k]);
      	  }
      	  echo json_encode($datas);
    	}
			
	}
	
	/*function index() {
	  redirect('perbend/t_usulan_pelatihan/edit/0');
	}*/
	
	function app_t_pelatihan_peserta_output(){
	  $js ="<script type='text/javascript'>
	            $(document).ready(function() {
	            });
	            
	             function save_pelatihan(url, table_id, default_txt_confirm='Simpan Daftar Pelatihan. Anda yakin?', _ismodal=false, _modals='form-modal', _islochref=false, _isneedrefresh=true, _isneededit=false, _isOldFashion=false, _msg='Berhasil.') {
                    //alert('save');
                    if ( default_txt_confirm == '' ) default_txt_confirm='Simpan Daftar Pelatihan. Anda yakin?';
                    var form_name = table_id+'_view-edit';
                    var formData = new FormData(jQuery('#'+form_name)[0]);
                    save_confirm(url+'/save', formData, default_txt_confirm, table_id, _ismodal, function(output) {
                        //alert(output);
                        var o = jQuery.parseJSON(output);
                        //alert(o.status);
                        //alert(o.id);
                        $('div').removeClass('has-error');
                        if ( o.status == true ) {
							              bootbox_alert('', '', _msg, true);
                            reload_grid('".base_url()."perbend/t_usulan_pelatihan/lists', 't_usulan_pelatihan');
                        } else {
                            if ( o.msg != undefined) bootbox_alert('', '', o.msg, false, false);
                            $('.'+o.obj).focus();
                            $('div .div_'+o.obj).addClass('has-error');
                            $('div .'+o.obj).addClass('has-error');
                            if ( _ismodal ) $('#'+_modals).css('overflow', 'scroll');
                            return false;
                        }
                    });
                    $('body').css('padding-right', 0);
                }
	      </script>";
	  return $js;
	}
	
	function insertBox_app_t_pelatihan_peserta_file($name) {
	  $input = "<input  type='file' 
	            placeholder='Pilih excel'
	            name='{$name}' id='{$name}' 
	            class='form-control {$name}'/>";
	            
	 return $input;
	}
	
	/*function viewBox_app_t_pelatihan_peserta_tahun($name, $value) {
	  $input = "<input type='hidden' name='{$name}' 
	  id='{$name}' class='form-control {$name}' 
	  value='{$value}'/>";
	  $input .= "<p class='form-control-static {$name}'>{$value}</p>";

	  return $input;
	}*/
	
	function viewBox_app_t_pelatihan_peserta_nip($name, $value) {
	  //$value_txt = $this->getrow('', 'kepeg_m_pegawai', 'vname', array('cnip' => trim($value)))->vname;
	  $input = "<input type='hidden' name='{$name}' id='{$name}' class='form-control {$name}' value='{$value}'/>";
	 // $input .= "<p class='form-control-static {$name}'>{$value_txt}/{$value}</p>";
	  $input .= "<p class='form-control-static {$name}'>{$value}</p>";

	  return $input;
	}
	
	function viewBox_kepeg_m_pegawai_vname($name, $value) {
	  //$value_txt = $this->getrow('', 'kepeg_m_pegawai', 'vname', array('cnip' => trim($value)))->vname;
	  $input = "<input type='hidden' name='{$name}' id='{$name}' class='form-control {$name}' value='{$value}'/>";
	 // $input .= "<p class='form-control-static {$name}'>{$value_txt}/{$value}</p>";
	  $input .= "<p class='form-control-static {$name}'>{$value}</p>";

	  return $input;
	}
	
	function viewBox_app_t_pelatihan_peserta_tahun($name, $value) {
      $input = "<input type='text' name='{$name}' 
      id='{$name}' class='form-control {$name}' 
      value='{$value}' />";
      
      return $input;
  }
    
	function viewBox_app_t_pelatihan_peserta_bulan($name, $value) {
      $input = "<select name='{$name}' id='{$name}' class='form-control {$name}'>";
      foreach ($this->ar_bulan as $k=>$v) {
        $input .= "<option value='{$k}'>{$v}</option>";
      }
      $input .= "</select>";
      return $input;
  }
  
	function viewBox_app_t_pelatihan_peserta_nama_kegiatan($name, $value) {
      $input = "<textarea placeholder='Nama Kegiatan' name='{$name}' id='{$name}' class='form-control {$name}'>{$value}</textarea>";
      return $input;
  }
  
	function viewBox_app_t_pelatihan_peserta_lokasi($name, $value) {
      $input = "<input type='text' placeholder='Lokasi Kegiatan' name='{$name}' id='{$name}' class='form-control {$name}' value='{$value}'/>";
      return $input;
  }
  
	function viewBox_app_t_pelatihan_peserta_mode($name, $value) {
      $input = "<input type='text' name='{$name}' id='{$name}' class='form-control {$name}' value='1'/>";
      return $input;
  }
  
	function viewBox_app_t_pelatihan_peserta_tanggal($name, $value) {
	    $value = ($value != null ? date('d-m-Y', strtotime($value)) : '-');
      $input = "<input type='text' placeholder='Tanggal Kegiatan' name='{$name}' id='{$name}' class='form-control datepicker {$name}' value='{$value}'/>";
      $input .= "<script type='text/javascript'>
                $('#{$name}').mask('00-00-0000');
      
                </script>";
      return $input;
  }
	
	/*function before_render_update($id) {
	  if ($id !=0 ) {
	    $data['msg'] = [
                      "Anda tidak berhak untuk mengakses halaman ini. Terima Kasih", 
                      "Hak Akses Halaman",
                      ];
	  }
	  
	  return $data;
	}*/
	
	function viewBox_app_t_pelatihan_peserta_id($name, $value, $datas) {
      $input = "<input type='text' name='{$name}' 
      id='{$name}' class='form-control {$name}' 
      value='{$datas->app_t_pelatihan_peserta_id}' />";
      
      return $input;
    }
	
	function listBox_ACTION($buttons, $datas) {
	  unset($buttons['ubah']);
	  unset($buttons['hapus']);
	  
	  return $buttons;
	}
	
	function before_insert_processor($post) {
	  $post->app_t_pelatihan_peserta_mode = 0;
	  return $post;
	}
  
  function manipulate_view_button($buttons, $datas) {
    unset($buttons['Simpan']);
      $btn_simpan = "<button type='button' class='btn btn-primary btn_save' 
        onclick='$(\"#app_t_pelatihan_peserta_mode\").val(1);save_pelatihan(\"".base_url()."perbend/t_usulan_pelatihan\", \"t_usulan_pelatihan\", \"Simpan Usulan Pelatihan. Anda yakin ?\", false, \"\", false, true, false, false, \"Simpan berhasil\");'>
											       		<i class='fa fa-save' aria-hidden='true'> </i>
													   Simpan {$this->title}</button>";
			
			array_unshift($buttons, $btn_simpan);										   
      return $buttons;
    }
}