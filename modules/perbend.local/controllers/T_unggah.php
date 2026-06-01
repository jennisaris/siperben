<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class T_unggah extends MX_Controller {
  var $prefix = 'app';
	public function __construct() {
		parent::__construct();
		$controller = "perbend/t_unggah";
		$table  = $this->prefix."_t_usulan_pegawai";

   		$this->_setTitle('Unggah');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'file', 'SK', true, false, true);
		$this->_addField($table, 'file2', 'Dokumen', true, false, true);
		$this->_addField($table, 'jenis', 'Jenis', true, false, true);
		
		$jenis = [
		  1=>'Perbendaharaan',
		  2=>'Perbendaharaan Lainnya'
		];
		
		$this->_changeType($table, 'jenis', 'combobox', $jenis);
		
		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}
	
	function save() {
		//ini_set('display_errors', 1);
		//error_reporting(E_ALL);
	  	//ini_set('upload_max_filesize', '1000M');
		//ini_set('post_max_size', '1000M');
		$post = (Object)$_POST;
		$jenis = $post->app_t_usulan_pegawai_jenis;
	  //print_r($_FILES);
	  //exit;
	  $uploads = 'excel/sk/'.trim($this->session->username);
	  if (!file_exists(realpath($uploads))) {
	    mkdir($uploads);
	  }
	  
	  $files = $this->uploadfiles($_FILES['app_t_usulan_pegawai_file'], false);
	  //print_r($files);
	  //exit;
	  //$no = 1;
	  foreach ($files->tmp as $k=>$t) {
	    if (!move_uploaded_file($t, $uploads."/".$files->name[$k])) {
	    //if (!move_uploaded_file($t, $uploads."/".$no.'.pdf')) {
	      die("ERROR....");
	    }
	    //$no++;
	  }
	  
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
	
	  //print_r($_POST);
	  //print_r($_FILES);
	  $files2 = $this->uploadfiles($_FILES['app_t_usulan_pegawai_file2']);
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
    					  
        						$array_data[$rowIndex] = array('A'=>'','B'=>'', 'C'=>'', 'D'=>'', 'E'=>'', 
        						'F'=>'', 'G'=>'', 'H'=>'', 'I'=>'');
        								
        						$cell = $sheet->getCell('A' . $rowIndex);
        						if ($cell->getValue() =='' ) break;
        						$array_data[$rowIndex]['A'] = $cell->getValue();
        
        						$cell = $sheet->getCell('B' . $rowIndex);
        						$array_data[$rowIndex]['B'] = $cell->getValue();
        						
        						$cell = $sheet->getCell('C' . $rowIndex);
        						$array_data[$rowIndex]['C'] = $cell->getValue();
        						
        						$cell = $sheet->getCell('D' . $rowIndex);
        						$array_data[$rowIndex]['D'] = $cell->getValue(); 
        						
        						$cell = $sheet->getCell('E' . $rowIndex);
        						if (Date::isDateTime($cell) ){
        						  //print_r(Date::excelToDateTimeObject($cell->getValue()));exit;
        						  if (!Date::excelToDateTimeObject($cell->getValue())) {
        							   $array_data[$rowIndex]['E'] = date($format = "Y-m-d", 
        							   Date::excelToDateTimeObject($cell->getValue())); 
              				} else {
                      		$datas['status'] = FALSE;
                      		$datas['msg'] = "Kolom Tgl. SK di baris {$rowIndex} pada file {$files2->name} tidak sesuai format. Cek kembali!!";
                      		echo json_encode($datas);
                      		exit;
                      }
        						} else {
        						    //echo 'else '.$cell->getValue();
        						    //print_r(Date::excelToDateTimeObject($cell->getValue()));exit;
          						  $array_data[$rowIndex]['E'] = $cell->getValue();
          					}

        						
        						$cell = $sheet->getCell('F' . $rowIndex);
        						if (!empty($cell->getValue())) {
        						  $array_data[$rowIndex]['F'] = $cell->getValue(); 
        						} else {
        						  $datas['status'] = FALSE;
                      $datas['msg'] = "Kolom NIP di baris {$rowIndex} pada file {$files2->name} tidak boleh kosong. Cek kembali!!";
                      echo json_encode($datas);
                      exit;
        						}
        						$cell = $sheet->getCell('G' . $rowIndex);
        						$array_data[$rowIndex]['G'] = $cell->getValue(); 
        					
        						$cell = $sheet->getCell('H' . $rowIndex);
        						$array_data[$rowIndex]['H'] = $cell->getValue();
        						
        						$cell = $sheet->getCell('I' . $rowIndex);
        						$array_data[$rowIndex]['I'] = $cell->getValue();
    			    }
    	  }

			//kita looping data dan ambil nilai unique saja.
			foreach($array_data as $d) {
			  if ( trim($d['A']) == '' ) break;
				else $data[] = $d;
			}
			
		//print_r($data);
	    //print_r($files);
	    //exit;
	    $kode_sertifikat = [
	     'BP' => 'cnobnt',
	     'BPn' => 'cnobnt',
	     'BPP' => 'cnobnt',
	     'PPSPM' => 'cnosnt',
	     'PPK' => 'cnopnt',
	     'KPA' => ''
	    ];
	    $no_usul = 'TANPA_NO_USUL';
	    $itipe = 1;
	    $tcreated = date('Y-m-d H:i:s');
	    $ccreatedby = 'upload';
	    $ijns = $jenis;
	    /*ijns = 1
      cnousul = 
      dtglusul = 
      istatusid = 1
      ijnsprubhnid = 1
      istatus = 1
      iunorid =
      tcreated = date('Y-m-d H:i:s')
      ccreatedby = 'system'
      ctahun = 2020
      itipe = 1
      */
	    $nipError = "";
			$query = array();
			foreach($data as $d) {
			    $nourut = trim($d['A']);
  			  $tahun = trim($d['B']);
  			  $kdsatker = trim($d['C']);
  			  $nosk = trim($d['D']);
  			  $tglsk = explode(' ', str_replace("'","", trim($d['E'])));
  			  $thnsk = $tglsk[2];
  			  $tglsk = $tglsk[2].'-'.$nm_bln[$tglsk[1]].'-'.$tglsk[0];
  			  $nip = trim($d['F']);
  			  $nip = str_replace("'", "", $nip);
  			  $nip = str_replace("`", "", $nip);
  			  $nama = trim($d['G']);
  			  $nosert = trim($d['H']);
  			  $tipe = trim($d['I']);
  			  $ijabid2 = $this->getrow($this->db,'app_m_jabatan', 'id', array('ckode'=>$tipe))->id;
			  
			   	 //tes
			     
			  try {
			   //echo 'no. sk'.$nosk;
			   
			    //$uploads = 'excel/sk/'.$tahun;
  			  //$file_sk_old = realpath($uploads.'/'.$kdsatker.'.pdf');
  			  //$file_sk_old = realpath($uploads).'/'.$kdsatker.'.pdf';
  			  $file_sk = realpath($uploads.'/'.$nourut.'.pdf');
  			  //$file_sk = realpath($uploads).'/'.$nourut.'.pdf';
  			  //echo $file_sk_old." => ".$file_sk;exit;
  			  //rename($file_sk_old, $file_sk);
			  
			  //echo 'file sk :'.$file_sk;
			  //exit;
			 // $file_sk = str_replace("\\", "/", $file_sk);
			  //echo $file_sk;
  			  if (file_exists($file_sk)) {
				//echo 'file ada';
  			    $file_sk = file_get_contents($file_sk);
  			    $escaped = base64_encode($file_sk);
				//echo $escaped;
  			  } else {
				  //echo 'file tidak ada';
				  $escaped = "";
			  }
			  
			if ( $jenis == 1 ) {
  			   $tbl_usulan_sk = 'app_t_usulan_sk';
  			   $data_sk = [
    			      'ijns' => $ijns,
    			      'iunorid' => $kdsatker,
    			      'cnosk' => $nosk,
    			      'dtglsk' => $tglsk,
    			      'dtmt' => $tglsk,
    			      'dtgltetap' => $tglsk,
    			      'tcreated' => $tcreated,
    			      'ccreatedby' => $ccreatedby,
    			      'ctahun' => $thnsk,
    			      //'tfile2'=> $escaped,
    			      //'vtype' => 'application/pdf',
    			      'ittdid'=> 1,
  			   ];
  			   if (!empty($escaped)) {
  			     $data_sk['tfile2'] = $escaped;
  			     $data_sk['vtype']  = 'application/pdf';
  			   }
  			   //cek dulu
  			   $where = [
  			       'ijns' => $ijns,
    			     'iunorid' => $kdsatker,
    			     'cnosk' => $nosk,
  			   ];
  			   $last_id_sk = $this->getrow($this->db, $tbl_usulan_sk, 'id', $where)->id;
  			   if ($last_id_sk == '' ) {
  			     $this->db->insert($tbl_usulan_sk, $data_sk);
  			     $last_id_sk = $this->db->insert_id();
  			   } else {
  			     $where = ['id' => $last_id_sk];
  			     $this->db->where($where);
  			     $this->db->update($tbl_usulan_sk, $data_sk);
  			   }
			}
			  //echo 'save usulan sk '.$this->db->last_query();
			  //exit;
			   $tbl_usulan= 'app_t_usulan';
			   $data_usulan = [
			     'ijns' => $ijns, 
			     'cnousul' => ($jenis == 2 ? $nosk : $no_usul),  
			     'dtglusul' => $tglsk, 
			     'istatusid' => 1, 
			     'ijnsprubhnid' => 1, 
			     'istatus' => 7,
			     'iunorid' => $kdsatker, 
			     'tcreated' => $tcreated, 
			     'ccreatedby' => $ccreatedby, 
			     'ctahun' => $thnsk, 
			     'itipe' => 1 
			    ];
			    
			    if ( $jenis == 2 ) {
			      if (!empty($escaped)) {
  			      $data_usulan['tfile'] = $escaped;
  			      $data_usulan['vtype']  = 'application/pdf';
  			    }
			    }
			    
			    $where = [
			       'ijns' => $ijns,
  			      'iunorid' => $kdsatker,
  			      'cnousul' => ($jenis == 2 ? $nosk : $no_usul),
  			      'dtglusul' => $tglsk,
  			      'ctahun' => $thnsk,
  			      'iunorid' => $kdsatker,
  			      'itipe' => 1
			   ];
			   $last_id_usulan = $this->getrow($this->db, $tbl_usulan, 'id', $where)->id;
			   /*if ($kdsatker == '361160') {
				echo 'last_id_usulan : '.$last_id_usulan;
				print_r($where);
			   }*/
			   if ($last_id_usulan == '' ) {
			    $this->db->insert($tbl_usulan, $data_usulan);
			    $last_id_usulan = $this->db->insert_id();
			   } else {
			     $where = ['id' => $last_id_usulan];
			     $this->db->where($where);
			     $this->db->update($tbl_usulan, $data_usulan);
			   }
			   
			   if ($nip !='' ) {
  			     $pegawais = $this->getrow($this->db, 'kepeg_m_pegawai', '*', array('cnip'=>$nip));
  			     $tbl_usulan_pegawai ='app_t_usulan_pegawai';
  			     $data_pegawai = [
    			      'iusulanid' => $last_id_usulan,
    			      'cnip' => $nip,
    			      'vname' => $nama,
    			      'ckduker' => $kdsatker,
    			      'cnosertifikat' => $nosert,
    			      'istatus' => 1,
    			      'istatus2'=> 1,
    			      'cnosk' => $nosk,
    			      'inoskid' => $last_id_sk,
    			      'itipe'=> 1,
    			      'ijabid2' =>$ijabid2,
    			      'tcreated' => $tcreated,
    			      'ccreatedby' => $ccreatedby,
    			      'cgolid' =>$pegawais->cgolid,
    			      'cjabid' =>$pegawais->cjabid
  			     ];
  			    
  			    $where = [
  			       'iusulanid' => $last_id_usulan,
    			      'cnip' => $nip,
    			      'ispelatihan' => 0
  			   ];
  			   $last_id_pegawai = $this->getrow($this->db, $tbl_usulan_pegawai, 'id', $where)->id;
  			   if ($last_id_pegawai == '' ) {
  			     $this->db->insert($tbl_usulan_pegawai, $data_pegawai);
  			   } else {
  			     $where = ['id' => $last_id_pegawai];
  			     $this->db->where($where);
  			     $this->db->update($tbl_usulan_pegawai, $data_pegawai);
  			   }
  			   
  			   //update no sertifikat ke tabel pegawai
    			 $tbl_pegawai = 'kepeg_m_pegawai';
    			 $data_mst_pegawai = [
    			   'ckduker2' => $kdsatker,
    			   'cjabid2' => $ijabid2
    			 ];
    			 $where = [
    			     'cnip' => $nip
    			 ];
  			   if (!empty($kode_sertifikat[$tipe])) {
  			     $data_mst_pegawai[$kode_sertifikat[$tipe]] = $nosert;
  			   }
  			   
  			   $this->db->where($where);
    		   $this->db->update($tbl_pegawai, $data_mst_pegawai);
			   
			   //update usulan yg diluar sk skr
			   //if ( $jenis == 1 ) {
				   $where2 = [
				   'ijabid2' => $ijabid2,
				   'ckduker'=>$kdsatker,
				   'inoskid!='=>$last_id_sk
				   ];
				   
				   $datas2 = [
					'isnonaktif'=>1,
					'tupdated'=>$tcreated,
					'cupdatedby'=>$tcreated
				   ];
				   
				   $this->db->where($where2);
				   $this->db->update($tbl_usulan_pegawai, $datas2);
			   //}
			   //
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
	
	function index() {
	  redirect('perbend/t_unggah/edit/0');
	}
	
	function app_t_usulan_pegawai_output(){
	  $js ="<script type='text/javascript'>
	            $(document).ready(function() {
	           
	              
	            });
	      </script>";
	  return $js;
	}
	
	function insertBox_app_t_usulan_pegawai_file($name) {
	  $input = "<input  type='file' 
	            placeholder='Pilih pilih excel'
	            name='{$name}[]' id='{$name}' 
	            class='form-control {$name}' multiple/>";
	            
	 return $input;
	}
	
	function insertBox_app_t_usulan_pegawai_file2($name) {
	  $input = "<input  type='file' 
	            placeholder='Pilih pilih excel'
	            name='{$name}' id='{$name}' 
	            class='form-control {$name}'/>";
	            
	 return $input;
	}
	
	function manipulate_insert_button($buttons) {
	  unset($buttons['kembali']);
	  return $buttons;
	}
	
	function before_render_update($id) {
	  if ($id !=0 ) {
	    $data['msg'] = [
                      "Anda tidak berhak untuk mengakses halaman ini. Terima Kasih", 
                      "Hak Akses Halaman",
                      ];
	  }
	  
	  return $data;
	}
}