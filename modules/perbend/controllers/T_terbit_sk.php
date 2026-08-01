<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require_once "T_usulan_nosk.php";
//require_once "T_terbit_sk_upload.php";

//phpword
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Writer\Word2007;

// if you are using composer, just use this
//use NcJoes\OfficeConverter\OfficeConverter;
class T_terbit_sk extends MX_Controller {
	var $prefix = 'app';
	var $ar_statusid = array();
	var $ar_statusperubahan = array();
	var $ar_jabatan = array();
  
	var $table;

	var $kriteria;
	var $limit = 10;
	
	var $status_usulan = [];
	public function __construct() {
		parent::__construct();
		$controller = "perbend/t_terbit_sk";
		$this->table  = $this->prefix."_t_usulan";
		
		//echo 'os : '.$_SERVER['HTTP_USER_AGENT'];

   		$this->_setTitle('Usulan Penerbitan SK');
		$this->_setController($controller);

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);
		//$this->_addField($this->table, 'ijns', 'Jenis Usulan', false, true);
		$this->_addField($this->table, 'iunorid', 'Satuan Kerja', true);
		$this->_addField($this->table, 'cnousul', 'No. Usul', true);
		$this->_addField($this->table, 'dtglusul', 'Tgl. Usul', true);
		$this->_addField($this->table, 'istatusid', 'Status Perubahan', true);
		$this->_addField($this->table, 'ijnsprubhnid', 'Jenis Perubahan', true);
		$this->_addField($this->table, 'istatus', 'Status', false);

		//$this->_add2SearchField($this->table, 'cnip');
		//$this->_add2SearchField($this->table, 'vname');
		//$this->_add2SearchField($this->table, 'ldeleted');
		
		$rows = $this->getall('', $this->prefix.'_m_status', '*', array('ldeleted'=>0));
		foreach($rows as $r) {
		$this->ar_statusid[$r->id] = $r->vdesc;
		}
		
		$this->_changeType($this->table, 'istatusid', 'combobox', 
		$this->ar_statusid);
		
		$rows = $this->getall('', $this->prefix.'_m_perubahan', '*', array('ldeleted'=>0));
		foreach($rows as $r) {
		$this->ar_statusperubahan[$r->id] = $r->vdesc;
		}
		
		$this->_changeType($this->table, 'ijnsprubhnid', 'combobox', 
		$this->ar_statusperubahan);
		
		$this->_changeType($this->table, 'dtglusul', 'date', 'd-m-Y');

		$ar_unor = array();
		foreach($this->getall('', 'app_m_unor', 'kode, nama') as $r) {
			$ar_unor[$r->kode] = $r->nama;
		}

		$this->_changeType($this->table, 'iunorid', 'combobox2', $ar_unor);

		$this->status_usulan = $this->session->sysparam->status_usulan;
		foreach( $this->status_usulan as $k=>$v) {
			if (!in_array($k, array(4,6,7))) {
				unset($this->status_usulan[$k]);
			}
		}
		//$this->_changeType($this->table, 'istatus', 'combobox2', $this->status_usulan);

		$this->_changeType($this->table, 'ijns', 'combobox', 
    	$this->session->sysparam->jenis_usulan);

		foreach ( $this->getall('', 'app_m_jabatan', 'id, vname') as $r ) {
			$this->ar_jabatan[$r->id] = $r->vname;
		}
		
		//$this->_add2SearchField($this->table, 'ijns');
		$this->_add2SearchField($this->table, 'iunorid');
		$this->_add2SearchField($this->table, 'cnousul');
		$this->_add2SearchField($this->table, 'dtglusul');
		$this->_add2SearchField($this->table, 'istatusid');
		$this->_add2SearchField($this->table, 'ijnsprubhnid');
		$this->_add2SearchField($this->table, 'istatus');
		
		$this->_setAlign($this->table, 'check', 'center', 'top');
		$this->_setAlign($this->table, 'dtglusul', 'center');
		//$this->_setAlign($this->table, 'istatus', 'center');
		$this->_setAlign($this->table, 'istatusid', 'center');
		$this->_setAlign($this->table, 'ijnsprubhnid', 'center');
		
		//$this->_addQuery($this->table, 'app_t_usulan.istatus = 4', 'and', '', 'true');
    
		$this->_add2ListField($this->table, 'cnousul, dtglusul, istatusid, ijnsprubhnid, tfile, tupdated, cupdatedby');

		$this->_setHTMLTemplate('','terbit_sk/list', 'terbit_sk/form_modal');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}
	
	function searchBox_app_t_usulan_istatus($name) {
		$input="<select name='{$name}' id='{$name}' class='form-control {$name}' 
		multiple='multiple'>";
		foreach($this->status_usulan as $k=>$v) {
			$input .= "<option value='{$k}'>{$v}</option>";
		}
		$input .="</select>";
		
		$input .= "<script type='text/javascript'>";
		$input .= "$('#{$name}').select2();";
		$input .= "</script>";
		
		return $input;
	}
	
	function gettotaldaftarpegawai($iusulanid) {
		return $this->getrow('', 'app_t_usulan_pegawai', 'count(*) as total', array('iusulanid'=>$iusulanid, 'ispelatihan'=>0))->total;
	}

	function create_sp_from_template($datas=null, $template='surat_pengantar_sk.docx') {
		//print_r($datas);
		/*
		no_surat'=>$no_sk,
			'tanggal_surat'=>date('d-m-Y', strtotime($tgl_sk)),								
			'nama_kementerian'=>$this->session->sysparam->nama_kementerian[0],
			'tahun_anggaran'=>$this->session->settahun,
			'unit_kerja'=>ucwords(strtolower($nama_unor)),
			'unit_kerja_upper'=>strtoupper($nama_unor),
			'isplt'=>$ttd->isplt,
			'nama_pejabat_ttd'=>$nama_pejabat_ttd,
			'nip_pejabat_ttd'=>$nip_pejabat_ttd
		*/

		//ini_set('display_errors', 1);
		//error_reporting(E_ALL);
		$upload_path = $this->session->sysparam->upload_path[0];
		$no_surat = str_replace("/", "_", trim($datas['datanya']['no_surat']));
		$filename = str_replace("\\", "/", realpath('template/docx')).'/'.$template;
		$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($filename);

		//echo 'filename : '.$filename;
		$datanya = [
			'no_surat' => $datas['datanya']['no_surat'],
			'tanggal_surat' => $datas['datanya']['tanggal_surat'],
			'unit_kerja_upper' => $datas['datanya']['unit_kerja_upper'],
			'nama_kementerian'=>$datas['datanya']['nama_kementerian'],
			'tahun_anggaran'=>$datas['datanya']['tahun_anggaran'],
			'unit_kerja' => $datas['datanya']['unit_kerja'],
			'nama_pejabat_ttd'=>$datas['datanya']['nama_pejabat_ttd'],
			'nip_pejabat_ttd'=>$datas['datanya']['nip_pejabat_ttd']
		];

		$templateProcessor->setValues($datanya);
		
		//echo 'nosk : '.$no_sk;
		$nama_file = $no_surat.'.docx';
		$path = realpath($upload_path).'/'.$nama_file;
		
		//echo $path;
		//exit;
		$templateProcessor->saveAs($path);

		//echo 'test';
		//exit;
		
		$file    = file_get_contents($path);
		$escaped = base64_encode($file);//pg_escape_bytea($data);
		
		//convert ke PDF
		$nama_file2pdf = $no_surat.'.pdf';
		$path2pdf = realpath($upload_path).'/'.$nama_file2pdf;
		
		$convert_path = $this->session->sysparam->convert_home[0]; 
		//echo $convert_path;
		//exit;
		/*
        ** UNTUK WINDOWS **/
        $tempLibreOfficeProfile = str_replace('\\', '/', realpath($upload_path));
		$libreoffice_home = $this->session->sysparam->libreoffice_home[0];
		$cmd = "\"".$convert_path."\" \"".$libreoffice_home."\"  \"".$tempLibreOfficeProfile."\" \"".$tempLibreOfficeProfile."/".$nama_file."\"";
		//echo $cmd;exit;
        exec($cmd, $result);
        /* END UNTUK WINDOWS **/

        /*
        /** UNTUK LINUX
        $tempLibreOfficeProfile = realpath($upload_path);
		//echo $tempLibreOfficeProfile;
		//echo $nama_file;
		//exit;
        //$cmd = "sh \"".$convert_path."\" \"".$tempLibreOfficeProfile."\" \"".$nama_file."\"";
		$cmd = "sh ".$convert_path." ".$tempLibreOfficeProfile." ".$nama_file;
        //echo $cmd;
        //exit;
        exec($cmd);
		//exit;
        /** END UNTUK LINUX **/
	  
		$file2pdf    = file_get_contents($path2pdf);
		$escaped2pdf = base64_encode($file2pdf);//pg_escape_bytea($data);


		//unlink($path);
		//unlink($path2pdf);
		
		return array('file1'=>$escaped, 'file2'=>$escaped2pdf);
		//exec('doc2pdf '.$path, $output, $retval);
	}

	function create_sk_from_template($datas=null, $template='sk.docx') {

		//ini_set('display_errors', 1);
		//error_reporting(E_ALL);
		$upload_path = $this->session->sysparam->upload_path[0];
		$no_sk = str_replace("/", "_", trim($datas['datanya']['no_sk']));
		$filename = str_replace("\\", "/", realpath('template/docx')).'/'.$template;
		$templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor($filename);


		$datanya = [
			'nosk' => $datas['datanya']['no_sk'],
			'tmt' => $datas['datanya']['tmt'],
			'unit_kerja_upper' => $datas['datanya']['unit_kerja_upper'],
			'unit_kerja' => $datas['datanya']['unit_kerja'],
			'tgl_bulan_tahun' => $datas['datanya']['tgl_bulan_tahun'],
			'tgl_bulan_tahun2' => $datas['datanya']['tgl_bulan_tahun2'],
			'nama_pejabat_ttd'=>$datas['datanya']['nama_pejabat_ttd'],
			'nip_pejabat_ttd'=>$datas['datanya']['nip_pejabat_ttd']
		];

		$isplt = $datas['datanya']['isplt'];
		$no_sk = str_replace("/", "_", trim($datas['datanya']['no_sk']));
		$no_sk2 = trim($datas['datanya']['no_sk2']);
		$unit_kerja = trim($datas['datanya']['unit_kerja']);

		$keempat = "Dengan berlakunya keputusan ini, Keputusan Menteri Pendidikan Dasar dan Menengah Nomor {$no_sk2} tentang Pejabat Perbendaharaan pada {$unit_kerja}, dicabut dan dinyatakan tidak berlaku.";

		$templateProcessor->setValues($datanya);

		//print_r($datas);exit;
		$templateProcessor->cloneBlock('block_informasi_pejabat', 0, true, false, $datas['block']);
		if ( $no_sk2 != '' ) {
			$templateProcessor->replaceBlock('block_keempat_nomor', 'KEEMPAT						:	');
			$templateProcessor->replaceBlock('block_keempat', $keempat);
			$templateProcessor->replaceBlock('block_kelima','KELIMA');
		} else {
			$templateProcessor->deleteBlock('block_keempat_nomor');
			$templateProcessor->deleteBlock('block_keempat');
			$templateProcessor->replaceBlock('block_kelima','KEEMPAT');
		}

		if ( $isplt ) $templateProcessor->replaceBlock('block_plt', 'Plt. SEKRETARIS JENDERAL');
		else $templateProcessor->replaceBlock('block_plt','SEKRETARIS JENDERAL');
		
		//echo 'nosk : '.$no_sk;
		$nama_file = $no_sk.'.docx';
		$path = realpath($upload_path).'/'.$nama_file;
		
		//echo $path;
		$templateProcessor->saveAs($path);

		//echo 'test';exit;
		
		$file    = file_get_contents($path);
		$escaped = base64_encode($file);//pg_escape_bytea($data);
		
		//convert ke PDF
		$nama_file2pdf = $no_sk.'.pdf';
		$path2pdf = realpath($upload_path).'/'.$nama_file2pdf;
		
		$convert_path = $this->session->sysparam->convert_home[0]; 
		/*
        ** UNTUK WINDOWS **/
        $tempLibreOfficeProfile = str_replace('\\', '/', realpath($upload_path));
		$libreoffice_home = $this->session->sysparam->libreoffice_home[0];
		//$cmd = "start /B ".$convert_path." \"".$libreoffice_home."\"  \"".$tempLibreOfficeProfile."\" \"".$tempLibreOfficeProfile."/".$nama_file."\"";
		$cmd = "\"".$convert_path."\" \"".$libreoffice_home."\"  \"".$tempLibreOfficeProfile."\" \"".$tempLibreOfficeProfile."/".$nama_file."\"";
		//echo $cmd;exit;
        exec($cmd, $result);
        /** END UNTUK WINDOWS **/

        /*
        /** UNTUK LINUX
        $tempLibreOfficeProfile = realpath($upload_path);
		//echo $tempLibreOfficeProfile;
		//echo '<br/>';
		//echo $nama_file;
		//exit;
        //$cmd = "sh \"".$convert_path."\" \"".$tempLibreOfficeProfile."\" \"".$nama_file."\"";
		$cmd = "sh ".$convert_path." ".$tempLibreOfficeProfile." ".$nama_file;
        //echo $cmd;
        //exit;
        exec($cmd);
        /** END UNTUK LINUX **/
	  
		$file2pdf    = file_get_contents($path2pdf);
		$escaped2pdf = base64_encode($file2pdf);//pg_escape_bytea($data);


		//unlink($path);
		//unlink($path2pdf);
		
		return array('file1'=>$escaped, 'file2'=>$escaped2pdf);
		//exec('doc2pdf '.$path, $output, $retval);
	}

	

    function save() {
		//exit;
		/*
			[check_pegawai_isklik] => Array ( [0] => 1 [1] => 0 [2] => 1 ) 
		 [check_pegawai_status] => Array ( [0] => 1 [1] => 0 [2] => 1 ) 
		 [check_pegawai_cnosk] => Array ( [0] => 1234 [1] => 1234 [2] => 1234 ) 
		 [pegawai_id] => Array ( [0] => 1 [1] => 2 [2] => 10 ) ) 
		 check_pegawai_dtglsk
		 check_pegawai_dtmtsk
		 check_pegawai_cnosk
		 check_pegawai_cnosk2
		 check_pegawai_dtgltetap
		 check_pegawai_iusetetap
		 check_pegawai_issinde
		 check_pegawai_ittdid
		 pegawai_nip
		 pegawai_nama
		 pegawai_pangkat
		 pegawai_jabatan
		 pegawai_nipold
		 pegawai_unorid
		 pegawai_unorid_txt
		 pegawai_idnosk
		*/

		//$this->db->trans_start();

		$no_surat = '';
		$tgl_surat = date('Y-m-d');

		$pegawai_isklik = array();
		$pegawai_status = array();
		$pegawai_id = array();
		$pegawai_nosk = array();
		$pegawai_nosk2 = array();
		$pegawai_tglsk = array();
		$pegawai_tmtsk = array();
		$pegawai_tgltetap = array();
		$pegawai_ittdid = array();

		$pegawai_nip = array();
		$pegawai_nipold = array();
		$pegawai_nama = array();
		$pegawai_pangkat = array();
		$pegawai_jabatan = array();
		$pegawai_jabatan2 = array();

		$pegawai_unorid = array();
		$pegawai_unorid_txt = array();

		$pegawai_nosurat = array();
		$pegawai_tglsurat = array();
		
		$pegawai_idnosk = array();
		
		
		$usulan = $this->input->post('usulan');
		if ($usulan != null) $usulan = array_unique($usulan);
		
		$index = 0;
		foreach($this->input->post('check_pegawai_isklik') as $k=>$v){

			if ( $v == 1 ) {
				
				$no_sk = $this->input->post('check_pegawai_cnosk')[$k];
				$tgl_sk = $this->input->post('check_pegawai_dtglsk')[$k];
				$tmt_sk = $this->input->post('check_pegawai_dtmtsk')[$k];
				$no_sk2 = $this->input->post('check_pegawai_cnosk2')[$k];
				$tgl_tetap = $this->input->post('check_pegawai_dtgltetap')[$k];
				$iusetetap = (int)$this->input->post('check_pegawai_iusetetap')[$k];
				$issinde = $this->input->post('check_pegawai_issinde')[$k];
				$ttdid = $this->input->post('check_pegawai_ittdid')[$k];

				$no_surat = $this->input->post('check_pegawai_cnosurat')[$k];
				$tgl_surat = $this->input->post('check_pegawai_dtglsurat')[$k];

				$index = $k;
			}
		}
		
		//$nama_unor = $this->input->post('nama_unor')[$index];
		$nama_unor = $this->input->post('pegawai_unorid_txt')[$index];
		//$id_unor = $this->input->post('id_unor')[$index];	
		$id_unor = $this->input->post('pegawai_unorid')[$index];	
		//$sk_id = $this->input->post('id_nosk')[$index];
		$sk_id = $this->input->post('pegawai_idnosk')[$index];
		
		
		//exit;

		//echo 'INDEX : '.$index;
		//echo 'SK : '.$no_sk.' => '.$tgl_sk.' => '.$tmt_sk.' => SK_ID : '.$sk_id.' => '.$iusetetap;
		//echo 'LAINNYA : '.$nama_unor.' => '.$id_unor;
		//exit;

		//echo 'id_unor :$id_unor;

		if ( empty($tgl_sk) ) {
			$data = [
				'status' => false,
				'msg' => 'Lengkapi isian kolom Tgl. SK',
				'obj' => 'app_t_usulan_sk_dtglsk'
			];
			print_r(json_encode($data));
			exit;
		}

		if ( $issinde == 0 ) {

			if ( empty($no_sk) ) {
				$data = [
					'status' => false,
					'msg' => 'Lengkapi isian kolom No. SK',
					'obj' => 'app_t_usulan_sk_cnosk'
				];
				print_r(json_encode($data));
				exit;
			}

			if ( empty($no_surat)) {
				$data = [
					'status' => false,
					'msg' => 'Lengkapi isian kolom No. Surat Pengantar',
					'obj' => 'app_t_usulan_sk_cnosurat'
				];
				print_r(json_encode($data));
				exit;
			} else if ( empty($tgl_surat)) {
				$data = [
					'status' => false,
					'msg' => 'Lengkapi isian kolom Tgl. Surat Pengantar',
					'obj' => 'app_t_usulan_sk_dtglsurat'
				];
				print_r(json_encode($data));
				exit;
			}
		}

		if ( empty($tmt_sk) ) {
			$data = [
				'status' => false,
				'msg' => 'Lengkapi isian kolom TMT. SK',
				'obj' => 'app_t_usulan_sk_dtmt'
			];
			print_r(json_encode($data));
			exit;
		}

		if ( empty($tgl_tetap) ) {
			$data = [
				'status' => false,
				'msg' => 'Lengkapi isian kolom Tgl. Ditetapkan',
				'obj' => 'app_t_usulan_sk_dtgltetap'
			];
			print_r(json_encode($data));
			exit;
		}

		if ( empty($ttdid) ) {
			$data = [
				'status' => false,
				'msg' => 'Lengkapi isian kolom Penandatangan',
				'obj' => 'app_t_usulan_sk_ittdid'
			];
			print_r(json_encode($data));
			exit;
		}
		
		//echo '1 : SK ID : '.$sk_id;
		//exit;
		
		
		if ( $sk_id == 0 ) { 
			///generate no sk baru
			if ( $issinde == 1 ) {
				$params = array(
					'iduser' => '9312',
					'pengirim_int' => '7640',
					'pengirim_int_idjstruktural' => '110',
					'pengirim_int_idunit' => '1',
					'pengirim_int_text' => 'Ir. Suharti, M.A., Ph.D - Sekretaris Jenderal',
					'ttd_int' => '26218',
					'ttd_int_idjstruktural' => '109',
					'ttd_int_idunit' => '1',
					'ttd_int_text' => 'Nadiem Anwar Makarim, MBA - Menteri Pendidikan, Kebudayaan, Riset, dan Teknologi',
					'idsuratjenis' => '2',
					'perihal' => 'Test Surat Keluar Perbend #1',
					'isi' => 'Isi Test Surat Keluar Perbend #1',
					'keterangan' => 'Keterangan Test Surat Keluar Perbend #1',
					'idpengkonsep' => '9312',
					'is_private' => 1,
					'idsurattopik' => '7554',
					'penerima' => "{}",
				);
				$sindes = $this->generate_no_sk_sinde($params);
				$no_sk = $sindes->nosurat;

				//pengantar
				$params = array(
					'iduser' => '9312',
					'pengirim_int' => '554',
					'pengirim_int_idjstruktural' => '6',
					'pengirim_int_idunit' => '18',
					'pengirim_int_text' => 'Faisal Syahrul, SE - Kepala Biro Keuangan',
					'ttd_int' => '554',
					'ttd_int_idjstruktural' => '6',
					'ttd_int_idunit' => '18',
					'ttd_int_text' => 'Faisal Syahrul, SE - Kepala Biro Keuangan',
					'idsuratjenis' => '10',
					'perihal' => 'Permohonan Tanda Tangan Kepmendikbud Tentang Pejabat Perbendaharaan',
					'isi' => 'Permohonan Tanda Tangan Kepmendikbud Tentang Pejabat Perbendaharaan',
					'keterangan' => 'Permohonan Tanda Tangan Kepmendikbud Tentang Pejabat Perbendaharaan',
					'idpengkonsep' => '9312',
					'is_private' => 1,
					'idsurattopik' => '7554',
					'penerima' => "{}",
				);
				//echo 'Generate No Buat SP';
				$sindes = $this->generate_no_sk_sinde($params);
				//print_r($sindes);
				$no_surat = $sindes->nosurat;
				$tgl_surat = date('Y-m-d');
			}

			
			//print_r($tfiles2);
			//exit;
			
			$datas = [
				'ijns'=>1,
				'iunorid'=>$id_unor,
				'cnosurat'=>trim($no_surat),
				'dtglsurat'=>trim($tgl_surat),
				'cnosk'=>trim($no_sk),
				'cnosk2'=>trim($no_sk2),						
				'dtglsk'=>date('Y-m-d', strtotime($tgl_sk)),
				'dtglsurat'=>date('Y-m-d'),
				'dtmt'=>date('Y-m-d', strtotime($tmt_sk)),
				'dtgltetap'=>date('Y-m-d', strtotime($tgl_tetap)),
				'iusetetap'=>$iusetetap,
				'ittdid'=>$ttdid,
				'ctahun'=>$this->session->settahun,
				'tcreated'=>date('Y-m-d H:i:s'),
				'ccreatedby'=>trim($this->session->username)
			];

			$this->db->set($datas);
			$this->db->insert('app_t_usulan_sk');
			//echo $this->db->get_compiled_insert('app_t_usulan_sk');
			//echo 'Last_Query : '.$this->db->last_query();
			//exit;
			$sk_id = $this->db->insert_id();
		} else {
			//klo udah ada
			$datas = [
				'ijns'=>1,
				'iunorid'=>$id_unor,
				'cnosurat'=>trim($no_surat),
				'dtglsurat'=>trim($tgl_surat),
				'cnosk'=>trim($no_sk),
				'cnosk2'=>trim($no_sk2),
				'dtglsk'=>date('Y-m-d', strtotime($tgl_sk)),
				'dtmt'=>date('Y-m-d', strtotime($tmt_sk)),
				'dtgltetap'=>date('Y-m-d', strtotime($tgl_tetap)),
				'iusetetap'=>$iusetetap,
				'ittdid'=>$ttdid,
				'ctahun'=>$this->session->settahun,
				'tupdated'=>date('Y-m-d H:i:s'),
				'cupdatedby'=>trim($this->session->username)
			];
			$this->db->where(array('id'=>$sk_id));
			$this->db->set($datas);			
			$this->db->update('app_t_usulan_sk');
			//echo $this->db->get_compiled_update('app_t_usulan_sk');
			//exit;
		}
		
		//echo '2 : sk_id : '.$sk_id;
		//exit;

		foreach($_POST as $key=>$value) {
			
			if ( $key == 'check_pegawai_isklik') {
                foreach($value as $k=>$v) {
                    $pegawai_isklik[$k] = $v;
                }
            }
			
			
            if ( $key == 'check_pegawai_status') {
                foreach($value as $k=>$v) {
                    $pegawai_status[$k] = $v;
                }
            }

            if ( $key == 'pegawai_id') {
                foreach($value as $k=>$v) {
                    $pegawai_id[$k] = $v;
                }
            }

			if ( $key == 'check_pegawai_cnosk') {
                foreach($value as $k=>$v) {
                    $pegawai_nosk[$k] = $v;
                }
            }

			if ( $key == 'check_pegawai_dtglsk') {
                foreach($value as $k=>$v) {
                    $pegawai_tglsk[$k] = $v;
                }
            }

			if ( $key == 'check_pegawai_dtmtsk') {
                foreach($value as $k=>$v) {
                    $pegawai_tmtsk[$k] = $v;
                }
            }

			if ( $key == 'pegawai_nip') {
                foreach($value as $k=>$v) {
                    $pegawai_nip[$k] = $v;
                }
            }

			if ( $key == 'pegawai_nama') {
                foreach($value as $k=>$v) {
                    $pegawai_nama[$k] = $v;
                }
            }

			if ( $key == 'pegawai_pangkat') {
                foreach($value as $k=>$v) {
                    $pegawai_pangkat[$k] = $v;
                }
            }

			if ( $key == 'pegawai_jabatan') {
                foreach($value as $k=>$v) {
                    $pegawai_jabatan[$k] = $v;
                }
            }

			if ( $key == 'pegawai_jabatan2') {
                foreach($value as $k=>$v) {
                    $pegawai_jabatan2[$k] = $v;
                }
            }

			if ( $key == 'pegawai_nipold') {
                foreach($value as $k=>$v) {
                    $pegawai_nipold[$k] = $v;
                }
            }

			if ( $key == 'pegawai_unorid') {
                foreach($value as $k=>$v) {
                    $pegawai_unorid[$k] = $v;
                }
            }

			if ( $key == 'pegawai_unorid_txt') {
                foreach($value as $k=>$v) {
                    $pegawai_unorid_txt[$k] = $v;
                }
            }
			
			if ( $key == 'pegawai_idnosk') {
                foreach($value as $k=>$v) {
                    $pegawai_idnosk[$k] = $v;
                }
            }

			if ( $key == 'check_pegawai_cnosurat') {
                foreach($value as $k=>$v) {
                    $pegawai_nosurat[$k] = $v;
                }
            }

			if ( $key == 'check_pegawai_dtglsurat') {
                foreach($value as $k=>$v) {
                    $pegawai_tglsurat[$k] = $v;
                }
            }
        }

		$today = date('Y-m-d H:i:s');
		$username = trim($this->session->username);

		$query = array();
		$norut = 1;
		$datas = array();
		$datas2 = array();

		$pegawai_unorid = $pegawai_unorid[$index];
		
		/** TAMBAHAN **/
		//get unor lama
		$pegawai_unorid_lama = explode(',',$this->getrow('', 'priv_t_user', 'kode_lama', ['username'=>$pegawai_unorid])->kode_lama);
		if ( sizeOf($pegawai_unorid_lama) > 0 ) {
			//$pegawai_unor_id__ = " ('".$pegawai_unorid."','".$pegawai_unorid_lama."')";
			$pegawai_unor_id___ = "'".implode("','", $pegawai_unorid_lama)."'";
			$pegawai_unor_id__ = "( ".$pegawai_unor_id___." )";
		} else $pegawai_unor_id__ = " ('".$pegawai_unorid."')";
		/** TAMBAHAN **/
		
		//utk test coba
		/*foreach($pegawai_nipold as $nold) {
			$qold = "UPDATE {$this->table}_pegawai SET isnonaktif = '1', 
							tupdated='{$today}', cupdatedby = '{$username}' 
							WHERE a.ckduker = '{$pegawai_unorid}' 
							and cnip = '{$nold}'";
			$this->db->query($qold);
		}*/

		$nipold = "'".implode("','", $pegawai_nipold)."'";
		/* $SQLP = "SELECT a.*, 
				b.vname as nama_pegawai,
				b.cgelardepan,
				b.cgelarbelakang,
				concat(c.pangkat, ', ', c.nama) as pangkat_nama,
				d.nama as jabatan_nama,
				e.vname as jabatan2_nama FROM app_t_usulan_pegawai a, 
				kepeg_m_pegawai b, 
				kepeg_m_golongan c, 
				kepeg_m_jabatan d, 
				app_m_jabatan e WHERE 
				a.cnip = b.cnip 
				and a.cgolid = c.id 
				and a.cjabid = d.kode
				and a.ijabid2 = e.id 
				and a.ckduker = '{$pegawai_unorid}' 
				and a.cnip not in ({$nipold}) and a.isnonaktif = 0 
				order by a.ijabid2 asc"; */
			
		 $SQLP = "SELECT a.*,
				b.vname as nama_pegawai,
				b.cgelardepan,
				b.cgelarbelakang,
				(select concat(pangkat, ', ', nama) 
				from kepeg_m_golongan where id = b.cgolid) as pangkat_nama,
				(select nama from kepeg_m_jabatan where id = b.ijabid) as jabatan_nama,
				(select vname from app_m_jabatan where id = a.ijabid2) as jabatan2_nama 
				FROM app_t_usulan_pegawai a, 
				kepeg_m_pegawai b WHERE 
				a.cnip = b.cnip 
				and a.ckduker in {$pegawai_unor_id__} 
				and a.cnip not in ({$nipold}) and a.isnonaktif = 0 
				and a.ijabid2 in (1,2,3)  
				group by a.cnip  
				order by (select iurut from app_m_jabatan where id = a.ijabid2) asc";//and a.itipe = 0
				
		/*$SQLP = "SELECT a.*,
				b.vname as nama_pegawai,
				b.cgelardepan,
				b.cgelarbelakang,
				(select concat(pangkat, ', ', nama) 
				from kepeg_m_golongan where id = b.cgolid) as pangkat_nama,
				(select nama from kepeg_m_jabatan where kode = b.cjabid) as jabatan_nama,
				(select vname from app_m_jabatan where id = a.ijabid2) as jabatan2_nama 
				FROM app_t_usulan_pegawai a, 
				kepeg_m_pegawai b WHERE 
				a.cnip = b.cnip 
				and a.ckduker = '{$pegawai_unorid}' 
				and a.isnonaktif = 0 
				and a.ijabid2 in (1,2,3)  
				group by a.cnip  
				order by a.ijabid2 asc";//and a.itipe = 0 and a.cnip not in ({$nipold}) */
				
				
		/*$SQLP = "SELECT a.*,
				b.vname as nama_pegawai,
				b.cgelardepan,
				b.cgelarbelakang,
				(select concat(pangkat, ', ', nama) 
				from kepeg_m_golongan where id = b.cgolid) as pangkat_nama,
				(select nama from kepeg_m_jabatan where kode = b.cjabid) as jabatan_nama,
				(select vname from app_m_jabatan where id = a.ijabid2) as jabatan2_nama 
				FROM app_t_usulan_pegawai a left join kepeg_m_pegawai b  
				ON a.cnip = b.cnip 
				WHERE a.ckduker = '{$pegawai_unorid}' 
				and a.isnonaktif = 0 
				and a.ijabid2 in (1,2,3) 
				AND a.cnosk IS NOT NULL
				group by a.cnip  
				order by a.ijabid2 asc";//and a.itipe = 0 and a.cnip not in ({$nipold})*/
		
		//echo $SQLP;
		//exit;

		//print_r($pegawai_status);exit;
		
		$datas_nip = array();
		$datas_jbt = array();
		$pegawai_id_baru = [];
		$pegawai_sk_baru = [];
		foreach( $pegawai_isklik as $k=>$v ) {
		//foreach ($pegawai_status as $k=>$v) {
			if ($v != 0) {
				
				/*$query[] = "UPDATE {$this->table}_pegawai SET inoskid = '".$sk_id."', 
							tupdated='{$today}', cupdatedby = '{$username}' 
							WHERE id = ".$pegawai_id[$k];*/
				//02/12/23
				$query[] = "UPDATE {$this->table}_pegawai SET 
							inoskid = '".$sk_id."', ckduker = '{$pegawai_unorid}', 
							tupdated='{$today}', cupdatedby = '{$username}' 
							WHERE id = ".$pegawai_id[$k];
				//$pegawai_id_baru[] = $pegawai_id[$k];
				array_push($pegawai_id_baru, $pegawai_id[$k]);
				array_push($pegawai_sk_baru, $pegawai_id[$k]);
			}
		}

		$nourut = 1;
		$rowsP = $this->db->query($SQLP)->result();
		foreach($rowsP as $r) {
			//buat data array
			$gelardpn = $r->cgelardepan != NULL ? $r->cgelardepan.' ' : '';
			$gelarblk = $r->cgelarbelakang != NULL ? ', '.$r->cgelarbelakang : '';
			$nama_dgn_gelar = $gelardpn.''.ucwords(strtolower($r->nama_pegawai)).''.$gelarblk;
			
			$datas = ['norut' => $nourut, 'jenis_jabatan' => $r->jabatan2_nama, 
				'nama_dgn_gelar_pejabat' => $nama_dgn_gelar, 
				'nip_pejabat' => $r->cnip, 
				'pangkat_golongan_pejabat' => $r->pangkat_nama, 
				'jabatan_pejabat' => (
				trim($r->jabatan2_nama) != trim($this->session->sysparam->beda_jabatan[0]) ? 
				trim($r->jabatan2_nama) : trim($r->jabatan_nama)
				)
			];

			//$norut++;
			$nourut++;

			if (!in_array($r->id, $pegawai_id_baru)) {
				//simpan ke history
				//cek dl udah ada atau belum
				//$sql = "SELECT count(*) as total from app_t_history_usulan_pegawai 
				//	where inoskid = '{$sk_id}' and iusulanpegawaiid= '".$r->id."'";
				//echo 'test : '.$sql;
				//exit;
				if ( $this->db->query("SELECT count(*) as total from app_t_history_usulan_pegawai 
					where inoskid = '{$sk_id}' and iusulanpegawaiid= '".$r->id."'")->row()->total == 0) {
						
					$this->db->query("INSERT INTO app_t_history_usulan_pegawai (inoskid, iusulanpegawaiid,
						tcreated, ccreatedby) VALUES ('".$r->inoskid."', '".$r->id."', '{$today}', '{$username}')");
						
					$this->db->query("UPDATE {$this->table}_pegawai SET inoskid = '{$sk_id}', tupdated='{$today}', cupdatedby='{$username}' 
									where id = '".$r->id."'");
				}
			}

			array_push($pegawai_sk_baru, $r->id);

			$datas2['block'][] = $datas;
		}

		//exit;

		$data = array();
		foreach ($query as $q) {
			try {
				$this->db->query($q);
				$success = true;
			}catch(Exception $e) {
				$success = false;
				die($e);
			}
		}

		$ar_pegawai_sk_baru = implode(",", $pegawai_sk_baru);
		//$sql = "UPDATE {$this->table}_pegawai SET isnonaktif = 1 where id not in ({$ar_pegawai_sk_baru}) and ckduker='{$pegawai_unorid}' and ijabid2 in (1,2,3)";
		$sql = "UPDATE {$this->table}_pegawai SET isnonaktif = 1 where cnip in ({$nipold}) and ckduker='{$pegawai_unorid}' and ijabid2 in (1,2,3)";
		$this->db->query($sql);

		foreach($usulan as $k=>$v) {
			//cek
			$total1 = $this->db->query("SELECT count(*) as total FROM {$this->table}_pegawai where iusulanid = {$v} and istatus2 != 2 and ispelatihan=0")->row()->total;
			$total2 = $this->db->query("SELECT count(*) as total FROM {$this->table}_pegawai where iusulanid = {$v} and inoskid IS NOT NULL and istatus2 != 2 and ispelatihan=0")->row()->total;

			if ( $total1 == $total2 ) {
				//update status usulan
				$this->db->query("UPDATE {$this->table} set istatus = 6, tupdated='{$today}', cupdatedby='{$username}' where id = {$v}");
			}
		}

		//get isplt, nama, nip
		$ttd = $this->getrow('', 'app_m_ttd', 'isplt, cnip, vname', array('id'=>$ttdid));
		$nama_pejabat_ttd = strtoupper(trim($ttd->vname));
		$nip_pejabat_ttd  = "NIP ".strtoupper(trim($ttd->cnip));

		

		$datas2['datanya'] = [
								'no_sk'=>$no_sk,
								'no_sk2'=>$no_sk2,								
								'tgl'=>date('d-m-Y', strtotime($tgl_sk)),
								'tmt'=>$this->nama_bulan_indonesia($tmt_sk),
								'tgl_bulan_tahun' => $this->nama_bulan_indonesia($tgl_tetap),
								'tgl_bulan_tahun2' => ($iusetetap == 1 ? $this->nama_bulan_indonesia($tgl_tetap) : 'ditetapkan'),
								'unit_kerja'=>ucwords(strtolower($nama_unor)),
								'unit_kerja_upper'=>strtoupper($nama_unor),
								'isplt'=>$ttd->isplt,
								'nama_pejabat_ttd'=>$nama_pejabat_ttd,
								'nip_pejabat_ttd'=>$nip_pejabat_ttd
							];

		//function create_sk_from_template($post=null, $datas=null, $template='sk.docx') {
		$tfiles = $this->create_sk_from_template($datas2, trim($this->session->sysparam->template_sk[0])); 

		//print_r($tfiles);
		
		//echo 'no_surat : '.trim($no_surat);

		$datas3['datanya'] = [
			'no_surat'=>trim($no_surat),
			'tanggal_surat'=>$this->nama_bulan_indonesia($tgl_surat),								
			'nama_kementerian'=>$this->session->sysparam->nama_kementerian[0],
			'tahun_anggaran'=>$this->session->settahun,
			'unit_kerja'=>ucwords(strtolower($nama_unor)),
			'unit_kerja_upper'=>strtoupper($nama_unor),
			'nama_pejabat_ttd'=>$this->session->sysparam->seting_surat_pengantar['nama'],
			'nip_pejabat_ttd'=>$this->session->sysparam->seting_surat_pengantar['nip']
		];
		$tfiles2 = $this->create_sp_from_template($datas3); 
		
		//print_r($tfiles2);
		//exit;
		
		$datas = [
			'tfile'=>$tfiles['file1'],
			'tfile3'=>$tfiles['file2'],
			'tfile4'=>$tfiles2['file1'],
			'tfile5'=>$tfiles2['file2'],
			'tupdated'=>date('Y-m-d H:i:s'),
			'cupdatedby'=>trim($this->session->username)
		];
		$this->db->where(array('id'=>$sk_id));
		$this->db->update('app_t_usulan_sk', $datas);
		
		/*$this->db->trans_complete();
	
		$success = true;
		if ( $this->db->trans_status() === FALSE ) {
			$this->db->trans_rollback();
			$success = false;
		}*/
		//echo $this->db->last_query();
		//exit;

		$data['status'] = $success;
		echo json_encode($data);
		//exit;
	}

	function nama_bulan_indonesia($date, $pemisah=' ') {

		$tgl = date('d', strtotime($date));
		$bln = date('m', strtotime($date));
		$thn = date('Y', strtotime($date));

		$ar_bulan_indonesia = [
			'01' => 'Januari',
			'02' => 'Februari',
			'03' => 'Maret',
			'04' => 'April',
			'05' => 'Mei',
			'06' => 'Juni',
			'07' => 'Juli',
			'08' => 'Agustus',
			'09' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember'
		];

		return $tgl.$pemisah.$ar_bulan_indonesia[$bln].$pemisah.$thn;
	}

	function lists($page_ke=0) {
		$html = '';

		//exit;
		
		if ( $page_ke == 0 ) {
			 $this->session->{$this->table.'_page'} = 1;
		} else {
			if ( $this->session->{$this->table.'_page'} == '' ) {
				$this->session->{$this->table.'_page'} = 1;
			} else {
			  if ( $page_ke != 0 ) $this->session->{$this->table.'_page'} = $page_ke;
			}
		}
		
		$page = $this->session->{$this->table.'_page'};

		$offset = ($page - 1) * $this->limit;

		foreach ($_POST as $k=>$v) {			
			$krit = str_replace("q_", "", $k);
			$this->kriteria[$krit] = $this->input->post($k);
		}
		$this->kriteria = (object)$this->kriteria;
		//print_r($this->kriteria);
		//exit;

		//echo $offset;
		//exit;

		$html  = "<form id='t_terbit_sk_form-edit'>";
		$html .= "<table class='table table-responsive table-condensed table-bordered' width='100%'>
					<thead>
						<tr class='active'>
							<th width='5%'>No.</th>
							<th width='75%'>Satuan Kerja</th>
						</tr>
					</thead>";


		$sql = "SELECT app_t_usulan.ijns as app_t_usulan_ijns, app_t_usulan.id as app_t_usulan_id, app_t_usulan.iunorid as app_t_usulan_iunorid, 
				app_t_usulan.istatus as  app_t_usulan_istatus, app_t_usulan.ctahun as app_t_usulan_ctahun,app_t_usulan.itipe as app_t_usulan_itipe
				
				from app_t_usulan where 
				case 
				  when app_t_usulan.itipe = 0 then app_t_usulan.istatus in (4,6,7) and app_t_usulan.ctahun = '{$this->session->settahun}' 
				  else app_t_usulan.id != 0 
				end 
				and app_t_usulan.ijns = 1 
				and app_t_usulan.iunorid != '' 
				and app_t_usulan.iunorid IS NOT NULL ";
		/* $sql = "SELECT app_t_usulan.id as app_t_usulan_id,app_t_usulan.ijns as app_t_usulan_ijns,app_t_usulan.iunorid as app_t_usulan_iunorid,
				app_t_usulan.cnousul as app_t_usulan_cnousul,app_t_usulan.dtglusul as app_t_usulan_dtglusul,
				app_t_usulan.istatusid as app_t_usulan_istatusid,app_t_usulan.ijnsprubhnid as app_t_usulan_ijnsprubhnid,'' as app_t_usulan_lampiran,
				app_t_usulan.tfile as app_t_usulan_tfile,app_t_usulan.vtype as app_t_usulan_vtype,app_t_usulan.nsize as app_t_usulan_nsize,
				app_t_usulan.istatus as app_t_usulan_istatus,'' as app_t_usulan_keterangan,'' as app_t_usulan_daftarnama,
				app_t_usulan.tcreated as app_t_usulan_tcreated,app_t_usulan.ccreatedby as app_t_usulan_ccreatedby,
				app_t_usulan.tupdated as app_t_usulan_tupdated,app_t_usulan.cupdatedby as app_t_usulan_cupdatedby 
				from app_t_usulan where app_t_usulan.id != 0 "; */

		//Array ( [app_t_usulan_cnousul] => [app_t_usulan_dtglusul] => [app_t_usulan_istatusid] => [app_t_usulan_ijnsprubhnid] => 1 [order_by] => ) 

		//$this->session->{$this->table.'_page'} = 1;
		/* if ( !empty($this->kriteria->{$this->table.'_ijns'}) ) {
			$sql .= " and app_t_usulan.ijns = '".$this->kriteria->{$this->table.'_ijns'}."'";
		} else  */
		if ( !empty($this->kriteria->{$this->table.'_cnousul'}) ) {
			$sql .= " and app_t_usulan.cnousul ilike '%".$this->kriteria->{$this->table.'_cnousul'}."%'";
		} else if ( !empty($this->kriteria->{$this->table.'_dtglusul'}) ) {
			$sql .= " and app_t_usulan.dtglusul = '".$this->kriteria->{$this->table.'_dtglusul'}."'";
		} else if ( !empty($this->kriteria->{$this->table.'_istatusid'}) ) {
			$sql .= " and app_t_usulan.istatusid = ".$this->kriteria->{$this->table.'_istatusid'}."";
		} else if ( !empty($this->kriteria->{$this->table.'_ijnsprubhnid'}) ) {
			$sql .= " and app_t_usulan.ijnsprubhnid = ".$this->kriteria->{$this->table.'_ijnsprubhnid'}."";
		} else if ( !empty($this->kriteria->{$this->table.'_iunorid'}) ) {
			$sql .= " and app_t_usulan.iunorid = '".$this->kriteria->{$this->table.'_iunorid'}."'";
		} else if ( !empty($this->kriteria->{$this->table.'_istatus'}) ) {
			$sql .= " and app_t_usulan.istatus = ".$this->kriteria->{$this->table.'_istatus'}."";
		}		

		$sql .= " and app_t_usulan.itipe = 0 ";
		
		$sql .= " group by app_t_usulan.iunorid";
		//$sql .= ",app_t_usulan.id";
				

		$query = $this->db->query($sql);

		$this->session->jum_rec  = $query->num_rows();
		$this->session->jum_page = ceil($this->session->jum_rec/$this->limit);

		$sql .= " limit {$this->limit} offset {$offset}";
		//echo $sql;
		//exit;
		
		$query = $this->db->query($sql);


		$rows_ = $this->getall('', $this->prefix.'_m_status', '*', array('ldeleted'=>0));
		$ar_statusid = array();
		foreach($rows_ as $r) {
			$ar_statusid[$r->id] = $r->vdesc;
		}
		
		$rows_ = $this->getall('', $this->prefix.'_m_perubahan', '*', array('ldeleted'=>0));
		$ar_statusperubahan = array();
		foreach($rows_ as $r) {
			$ar_statusperubahan[$r->id] = $r->vdesc;
		}

		$html .= "<tbody>";

		$fg_color = "#000000";
		if ( $query ) {
			$rows = $query->result();

			if ( sizeOf($rows) > 0 ) {
				$i=1;
				foreach ($rows as $r) {

					//if ( $i%2 ) $class = '';
					//else 
					$class = 'warning';

					$nama_unor = $this->getrow('', 'app_m_unor', 'nama', array('kode'=>$r->app_t_usulan_iunorid))->nama;

					$html .= "<tr class='{$class}'>";
					$html .= "<td rowspan='2' style='text-align:center;'><b>".$i."</b></td>";
					$html .= "<td><b>".$nama_unor."</b></td>";
					$html .= "<input type='hidden' name='nama_unor[]' id='nama_unor_{$r->app_t_usulan_iunorid}' class='nama_unor' value='{$nama_unor}'/>";
					$html .= "<input type='hidden' name='id_unor[]' id='id_unor_{$r->app_t_usulan_iunorid}' class='id_unor' value='{$r->app_t_usulan_iunorid}'/>";

					//detail
					$html .= $this->detail($r->app_t_usulan_iunorid, $r->app_t_usulan_ijns);

					$html .= "</tr>";

					$i++;
				}
			} else {
				$html .= "<tr><td colspan='12'>Data tidak ditemukan</td></tr>";
			}
		}

		$html .= "</tbody>
				</table>";

		$html .= "</form>";

		$pagination = $this->_ajaxPagination(base_url()."perbend/t_terbit_sk/lists", $this->kriteria, 't_terbit_sk');
		$hasil['html'] = array('html'=>$html);
		$hasil['pagination'] = $pagination;

		echo json_encode($hasil);
	}

	private function detail($app_t_usulan_iunorid, $app_t_usulan_ijns=1) {
		//$sql = "SELECT * from app_t_usulan_pegawai a where a.iusulanid = {$iusulanid}";
		$sql = "select b.id as id, b.cnip, b.vname, b.cgolid, (select concat(pangkat, ', ', nama) from kepeg_m_golongan where id=b.cgolid) as pangkat, 
				b.ijabid2,  a.cnousul, a.ijns, a.id as usulan_id, b.inoskid, (select cnosk from app_t_usulan_sk where id = b.inoskid) as cnosk,
				(select cnosk2 from app_t_usulan_sk where id = b.inoskid) as cnosk2,
				(select dtglsk from app_t_usulan_sk where id = b.inoskid) as dtglsk,
				(select dtgltetap from app_t_usulan_sk where id = b.inoskid) as dtgltetap,
				(select iusetetap from app_t_usulan_sk where id = b.inoskid) as iusetetap,
				(select issinde from app_t_usulan_sk where id = b.inoskid) as issinde,
				(select ittdid from app_t_usulan_sk where id = b.inoskid) as ittdid, 
				(select dtmt from app_t_usulan_sk where id = b.inoskid) as dtmtsk, 
				(select cnosurat from app_t_usulan_sk where id = b.inoskid) as cnosurat,
				(select dtglsurat from app_t_usulan_sk where id = b.inoskid) as dtglsurat, 
				b.cjabid, 
				(select cgelardepan from kepeg_m_pegawai where cnip = b.cnip) as gelardepan,
				(select cgelarbelakang from kepeg_m_pegawai where cnip = b.cnip) as gelarbelakang, 
				a.itipe as app_t_usulan_itipe, 
				b.cnipold as cnipold 
				from app_t_usulan_pegawai b left join app_t_usulan a 
				on b.iusulanid = a.id
				where a.iunorid = '{$app_t_usulan_iunorid}' and 
				b.istatus2 != 2 
				and b.ispelatihan = 0 
				and a.ctahun = '{$this->session->settahun}' 
				and a.ijns = 1 
				and a.itipe = 0 
				and a.istatus != 7 
				order by id desc";
		$rs_detail = $this->db->query($sql)->result();

		$detail = "<tr>";
		$detail .= "<td colspan='9'>";

		$detail .= "<table class='table table-responsive table-bordered' width='100%'>";
		$detail .= "<tr class='active'>";
		$detail .= "<td colspan='6'><b>:: Daftar Pegawai</b></td>";
		$detail .= "</tr>";

		$detail .= "<tr class='info'>";

		$checkbox_label = "<input type='checkbox' name='check_all[]' id='check_all_{$app_t_usulan_iunorid}' class='check_all' onclick='klik_all(this);'/>";
		$checkbox_label .= "<input type='hidden' name='txt_check_all[]' id='txt_check_all_{$app_t_usulan_iunorid}' class='txt_check_all' value='{$app_t_usulan_iunorid}'/>";
		$detail .= "<th>{$checkbox_label}</th>";
		$detail .= "<th>Nama Pegawai</th>";
		$detail .= "<th>Pangkat/Golongan</th>";
		$detail .= "<th>No. Usul</th>";
		$detail .= "<th>Jenis Usulan</th>";
		$detail .= "<th>Jabatan</th>";
		$detail .= "</tr>";
		
		$id_sk = '';
		foreach($rs_detail as $r) {

			$nama_jabatan = $this->getrow('', 'kepeg_m_jabatan', 'nama', array('id'=>$r->cjabid))->nama;
			$nama_pegawai  = ( $r->gelardepan != '' ? $r->gelardepan.' ' : '' );
			$nama_pegawai .=  $r->vname;
			$nama_pegawai .= ( $r->gelarbelakang != '' ? ', '.$r->gelarbelakang : '' );


			$nama_unor_txt = $this->getrow('', 'app_m_unor', 'nama', array('kode'=>$app_t_usulan_iunorid))->nama;
			
			$detail .= "<tr>";
			
			$disabled_chkbox = ($r->app_t_usulan_itipe == 1 ? ' disabled ' : '');

			$checkbox_r = "<input type='hidden' name='usulan[]' id='usulan_{$app_t_usulan_iunorid}_{$r->id}' class='usulan_{$app_t_usulan_iunorid}' value='{$r->usulan_id}'/>";
			
			/* $checkbox_r .= "<input ".($r->cnosk != '' ? 'checked' : '')." type='checkbox' name='check_pegawai[]' id='check_pegawai_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_{$app_t_usulan_iunorid}' onclick='klik(this);' {$disabled_chkbox}/>";
			$checkbox_r .= "<input type='hidden' name='check_pegawai_isklik[]' id='check_pegawai_isklik_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_isklik_{$app_t_usulan_iunorid}' value='".($r->cnosk != '' ? '1' : '0')."'/>"; */
			
			$checkbox_r .= "<input ".($r->cnosk != '' ? 'disabled' : '')." type='checkbox' name='check_pegawai[]' id='check_pegawai_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_{$app_t_usulan_iunorid}' onclick='klik(this);' {$disabled_chkbox}/>";
			$checkbox_r .= "<input type='hidden' name='check_pegawai_isklik[]' id='check_pegawai_isklik_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_isklik_{$app_t_usulan_iunorid}' value=''/>";
			
			$checkbox_r .= "<input type='hidden' name='check_pegawai_status[]' id='check_pegawai_status_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_status_{$app_t_usulan_iunorid}' value='".($r->cnosk != '' ? '1' : '0')."'/>";
			$checkbox_r .= "<input type='hidden' name='check_pegawai_cnosk[]' id='check_pegawai_cnosk_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_cnosk_{$app_t_usulan_iunorid}' value='{$r->cnosk}'/>";
			$checkbox_r .= "<input type='hidden' name='check_pegawai_cnosk2[]' id='check_pegawai_cnosk2_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_cnosk2_{$app_t_usulan_iunorid}' value='{$r->cnosk2}'/>";
			$checkbox_r .= "<input type='hidden' name='check_pegawai_dtglsk[]' id='check_pegawai_dtglsk_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_dtglsk_{$app_t_usulan_iunorid}' value='{$r->dtglsk}'/>";
			$checkbox_r .= "<input type='hidden' name='check_pegawai_dtmtsk[]' id='check_pegawai_dtmtsk_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_dtmtsk_{$app_t_usulan_iunorid}' value='{$r->dtmtsk}'/>";
			$checkbox_r .= "<input type='hidden' name='check_pegawai_dtgltetap[]' id='check_pegawai_dtgltetap_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_dtgltetap_{$app_t_usulan_iunorid}' value='{$r->dtgltetap}'/>";
			$checkbox_r .= "<input type='hidden' name='check_pegawai_iusetetap[]' id='check_pegawai_iusetetap_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_iusetetap_{$app_t_usulan_iunorid}' value='{$r->iusetetap}'/>";
			$checkbox_r .= "<input type='hidden' name='check_pegawai_issinde[]' id='check_pegawai_issinde_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_issinde_{$app_t_usulan_iunorid}' value='{$r->issinde}'/>";
			$checkbox_r .= "<input type='hidden' name='check_pegawai_ittdid[]' id='check_pegawai_ittdid_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_ittdid_{$app_t_usulan_iunorid}' value='{$r->ittdid}'/>";
			$checkbox_r .= "<input type='hidden' name='pegawai_id[]' id='pegawai_id_{$app_t_usulan_iunorid}_{$r->id}' class='pegawai_id_{$app_t_usulan_iunorid}' value='{$r->id}'/>";
			$checkbox_r .= "<input type='hidden' name='pegawai_nip[]' id='pegawai_nip_{$app_t_usulan_iunorid}_{$r->id}' class='pegawai_nip_{$app_t_usulan_iunorid}' value='{$r->cnip}'/>";
			$checkbox_r .= "<input type='hidden' name='pegawai_nama[]' id='pegawai_nama_{$app_t_usulan_iunorid}_{$r->id}' class='pegawai_nama_{$app_t_usulan_iunorid}' value='{$nama_pegawai}'/>";
			$checkbox_r .= "<input type='hidden' name='pegawai_pangkat[]' id='pegawai_pangkat_{$app_t_usulan_iunorid}_{$r->id}' class='pegawai_pangkat_{$app_t_usulan_iunorid}' value='{$r->pangkat}'/>";
			$checkbox_r .= "<input type='hidden' name='pegawai_jabatan[]' id='pegawai_jabatan_{$app_t_usulan_iunorid}_{$r->id}' class='pegawai_jabatan_{$app_t_usulan_iunorid}' value='{$nama_jabatan}'/>";
			$checkbox_r .= "<input type='hidden' name='pegawai_cjabid[]' id='pegawai_cjabid_{$app_t_usulan_iunorid}_{$r->id}' class='pegawai_cjabid_{$app_t_usulan_iunorid}' value='{$r->cjabid}'/>";
			$checkbox_r .= "<input type='hidden' name='pegawai_jabatan2[]' id='pegawai_jabatan2_{$app_t_usulan_iunorid}_{$r->id}' class='pegawai_jabatan2_{$app_t_usulan_iunorid}' value='".$this->ar_jabatan[$r->ijabid2]."'/>";
			$checkbox_r .= "<input type='hidden' name='pegawai_nipold[]' id='pegawai_nipold_{$app_t_usulan_iunorid}_{$r->id}' class='pegawai_nipold_{$app_t_usulan_iunorid}' value='{$r->cnipold}'/>";
			$checkbox_r .= "<input type='hidden' name='pegawai_unorid[]' id='pegawai_unorid_{$app_t_usulan_iunorid}_{$r->id}' class='pegawai_unorid_{$app_t_usulan_iunorid}' value='{$app_t_usulan_iunorid}'/>";
			$checkbox_r .= "<input type='hidden' name='pegawai_unorid_txt[]' id='pegawai_unorid_txt_{$app_t_usulan_iunorid}_{$r->id}' class='pegawai_unorid_txt_{$app_t_usulan_iunorid}' value='{$nama_unor_txt}'/>";
			/* $checkbox_r .= "<input type='text' name='pegawai_idnosk[]' id='pegawai_idnosk_{$app_t_usulan_iunorid}_{$r->id}' class='pegawai_idnosk_{$app_t_usulan_iunorid}' 
			value=''/>"; */
			$checkbox_r .= "<input readonly type='hidden' name='pegawai_idnosk[]' id='pegawai_idnosk_{$app_t_usulan_iunorid}_{$r->id}' class='pegawai_idnosk_{$app_t_usulan_iunorid}' 
			value='".$r->inoskid."'/>";
			$checkbox_r .= "<input type='hidden' name='check_pegawai_cnosurat[]' id='check_pegawai_cnosurat_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_cnosurat_{$app_t_usulan_iunorid}' value='{$r->cnosurat}'/>";
			$checkbox_r .= "<input type='hidden' name='check_pegawai_dtglsurat[]' id='check_pegawai_dtglsurat_{$app_t_usulan_iunorid}_{$r->id}' class='check_pegawai_dtglsurat_{$app_t_usulan_iunorid}' value='{$r->dtglsurat}'/>";

			$detail .= "<td style='text-align:center;'>{$checkbox_r}<br/>{$r->cnosk}</td>";
			$detail .= "<td>".$nama_pegawai."<br/>NIP. ".$r->cnip."</td>";
			$detail .= "<td>".$r->pangkat."</td>";
			$detail .= "<td>".$r->cnousul."<br/>
						<b>No. SK : </b> ".(!empty($r->cnosk) ? $r->cnosk : '-')."<br/>
						<b>TMT. SK : </b> ".($r->dtmtsk != NULL ? date('d-m-Y', strtotime($r->dtmtsk)) : '-')."</td>";
			$detail .= "<td>".$this->session->sysparam->jenis_usulan[$r->ijns]."</td>";
			$detail .= "<td>".$this->ar_jabatan[$r->ijabid2]."</td>";
			$detail .= "</tr>";

			if ( $id_sk == '' ) {
				$no_sk = $r->cnosk;
				$id_sk = $r->inoskid;
				$tgl_sk = $r->dtglsk;
				$tmt_sk = $r->dtmtsk;
				$no_surat = $r->cnosurat;
			}
			
		}	

		$detail .= "<input type='hidden' name='id_nosk[]' id='id_nosk_{$app_t_usulan_iunorid}' class='id_nosk' value='{$id_sk}'/>";
		$detail .= "</table>";
/*
		$detail .= "<table>";
		$detail .= "<tr>";
		$detail .= "<td><b>No. SK</b></td>";
		$detail .= "<td>&nbsp;";
		$detail .= "<input type='hidden' name='id_nosk[]' id='id_nosk_{$app_t_usulan_iunorid}' class='id_nosk' value='{$id_sk}'/>";
		$detail .= "<b>: {$no_sk}</b>
					      </td>
					      </tr>";
		$detail .= "<tr>";
		$detail .= "<td><b>Tgl. SK</b></td>";
   		$detail .= "<td>&nbsp;";
		$detail .= "<b>: ".($tgl_sk != null ? date('d-m-Y', strtotime($tgl_sk)) : '')."</b>
					      </td>
					       </tr>";
		$detail .= "<tr>";
		$detail .= "<td><b>TMT. SK</b></td>";
    	$detail .= "<td>&nbsp;";
		$detail .= "<b>: ".($tmt_sk != null ? date('d-m-Y', strtotime($tmt_sk)) : '')."</b>
					      </td>
					       </tr>";
		$detail .= "</table>";
*/

			if ( sizeOf($rs_detail) > 0 ) { 
				$buttons = "<button {$disabled_chkbox} data-toggle='modal' data-target='#t_usulan_nosk_form-modal' 
					onclick='_prompt(\"{$app_t_usulan_iunorid}\", \"\");return false;' type='button' 
					class='btn btn-default btn-xs btn_save_{$app_t_usulan_iunorid}' id='btn_save_{$app_t_usulan_iunorid}'>
						<i class='fas fa-file-contract'></i> Proses SK
					</button>";				
			}
					
			$usulansk = $this->getrow('', 'app_t_usulan_sk', 'tfile3, tfile5', array('id'=>$id_sk));
			$tfile3 = $usulansk->tfile3;
			$tfile5 = $usulansk->tfile5;
			$preview = "";
			if ($tfile3 != null) {
			  	$vtype = 'application/pdf';
    			$height='100%';$width='700';
  		  		$preview .= "<div class='modal fade' id='myPreview_{$app_t_usulan_iunorid}' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
    				   <div class='modal-dialog' role='document' style='width:65%;'>
    					 <div class='modal-content'>
    					   <div class='modal-header'>
    						 <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
    						 <h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> SK No. {$no_sk}</h4>
    					   </div>
    					   <div class='modal-body' id='modal-body'>
    						 <div class='form-group'>
    							 <div id='html_telusuri'>";
    
    			$preview .= "<embed src='data:{$vtype};base64,{$tfile3}' type='{$vtype}' width='{$height}' height='{$width}' alt='{$vtype}'>";
    
  
    			$preview .= "			 </div>
    						 </div>
    						 
    						 		<center>
    						 		<i class='fas fas-download'></i> 
    						 	<button onclick='unduhfile({$id_sk});' type='button' class='btn btn-warning'>
  								Download</button>
  								<button type='button' class='btn btn-warning' 
  									onclick=\"$('#myPreview_{$app_t_usulan_iunorid}').modal('hide')\">
  								Tutup</button>
  							</center>
    						 
    					   </div>
    					</div>
    				</div>
    			</div>";
    			
    			$buttons .= "&nbsp;<button type='button' 
						data-toggle='modal' 
						data-target='#myPreview_{$app_t_usulan_iunorid}'
						class='btn btn-default btn-xs btn_cetak_{$app_t_usulan_iunorid}' id='btn_cetak_{$app_t_usulan_iunorid}'>
							<i class='fas fa-print'></i> Download SK
						</button>";

				$buttons .= $preview;
			}	

			if ($tfile5 != null ) {
				$vtype = 'application/pdf';
    			$height='100%';$width='700';
  		  		$preview .= "<div class='modal fade' id='myPreview_sp_{$app_t_usulan_iunorid}' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
    				   <div class='modal-dialog' role='document' style='width:65%;'>
    					 <div class='modal-content'>
    					   <div class='modal-header'>
    						 <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
    						 <h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Surat Pengantar No. {$no_surat}</h4>
    					   </div>
    					   <div class='modal-body' id='modal-body'>
    						 <div class='form-group'>
    							 <div id='html_telusuri'>";
    
    			$preview .= "<embed src='data:{$vtype};base64,{$tfile5}' type='{$vtype}' width='{$height}' height='{$width}' alt='{$vtype}'>";
    
  
    			$preview .= "</div>
    						 </div>
    						 
    						 		<center>
    						 		<i class='fas fas-download'></i> 
    						 	<button onclick='unduhfile({$id_sk}, 1);' type='button' class='btn btn-warning'>
  								Download</button>
  								<button type='button' class='btn btn-warning' 
  									onclick=\"$('#myPreview_sp_{$app_t_usulan_iunorid}').modal('hide')\">
  								Tutup</button>
  							</center>
    						 
    					   </div>
    					</div>
    				</div>
    			</div>";

				$buttons .= "&nbsp;<button type='button' 
						data-toggle='modal' 
						data-target='#myPreview_sp_{$app_t_usulan_iunorid}'
						class='btn btn-default btn-xs btn_cetak_sp_{$app_t_usulan_iunorid}' id='btn_cetak_sp_{$app_t_usulan_iunorid}'>
							<i class='fas fa-file-download'></i> Download Surat Pengantar
						</button>";

				$buttons .= $preview;
			}
  			
  	
		if ( sizeOf($rs_detail) > 0 ) {
			$buttons .= "&nbsp;<button onclick='edit(\"".base_url()."perbend/t_terbit_sk_upload/edit/{$id_sk}\", \"t_terbit_sk\");' type='button' 
					data-toggle='modal' data-target='#t_terbit_sk_upload_form-modal'
					class='btn btn-default btn-xs btn_upload_{$app_t_usulan_iunorid}' id='btn_upload_{$app_t_usulan_iunorid}'>
						<i class='fas fa-upload'></i> Upload SK (Sudah ditandatangani) dalam format PDF
					</button>";
		}
		$detail .= $buttons;

		$detail .= "</td>";
		$detail .= "</tr>";

		return $detail;
	}

	function app_t_usulan_output() {
		$js = "<script type='text/javascript'>

					function unduhfile(id, sp=0) {
						window.open('".base_url()."perbend/t_terbit_sk/unduhfile/'+id+'/'+sp, '_unduh_');
					}
		
					function klik_all(a) {
						var id = $(a).attr('id');
						var id_ = (id.split('_')).pop();

						if ( $(a).is(':checked') ) {
							$('.check_pegawai_'+id_).prop('checked', true);
							$('.check_pegawai_status_'+id_).val(1);
							$('.check_pegawai_isklik_'+id_).val(1);
							//$('.usulan_'+id_).val(id_);
						} else { 
							$('.check_pegawai_'+id_).prop('checked', false);
							$('.check_pegawai_isklik_'+id_).val(0);
							//$('.usulan_'+id_).val(0);
						}
					}

					function klik(a) {
						var cls = $(a).attr('class');
						var id_ = (cls.split('_')).pop();
						var i = $('.'+cls).index(a);

						if ( $(a).is(':checked') ) {
							$('.check_pegawai_status_'+id_).eq(i).val(1);
							$('.check_pegawai_isklik_'+id_).eq(i).val(1);
							$('#id_nosk_'+id_).eq(i).val('');
							//$('.usulan_'+id_).eq(i).val(id_);
						} else { 
							$('.check_pegawai_status_'+id_).eq(i).val(0);
							$('.check_pegawai_isklik_'+id_).eq(i).val(0);
							//$('.usulan_'+id_).eq(i).val(0);
							$('.check_pegawai_cnosk_'+id_).eq(i).val('');
						}
					}

					function _disabled(id_) {
						_disabled_all();
						_disabled_all(id_);
					}

					function _check_uncheck(id_, yesno=0) {
						if ( yesno == 0 ) {
							$('.check_pegawai_'+id_).prop('checked', true);
							$('.check_pegawai_status_'+id_).val(1);
							//$('.usulan_'+id_).val(id_);
							$('#check_all_'+id_).prop('checked', true);
						} else { 
							$('.check_pegawai_'+id_).prop('checked', false);
							$('.check_pegawai_status_'+id_).val(0);
							//$('.usulan_'+id_).val(0);
							$('#check_all_'+id_).prop('checked', false);
						}
					}

					function _check_uncheck_all(yesno=0) {
						if ( yesno != 0 ) {
							$('input[name=\"check_pegawai[]\"]').prop('checked', true);
							$('input[name=\"check_pegawai_status[]\"]').val(1);
							$('input[name=\"check_all[]\"]').prop('checked', true);
							//$('input[name=\"usulan[]\"]').val(id_);
							$('input[name=\"txt_check_all[]\"]').prop('checked', true);
						} else { 
							$('input[name=\"check_pegawai[]\"]').prop('checked', false);
							$('input[name=\"check_pegawai_status[]\"]').val(0);
							$('input[name=\"check_all[]\"]').prop('checked', false);
							//$('input[name=\"usulan[]\"]').val(0);
							$('input[name=\"txt_check_all[]\"]').prop('checked', false);
						}
					}

					function _disabled_all(id_='') {
						if ( id_ == '' ) {
							$('input[name=\"check_pegawai[]\"]').prop('disabled', true);
							$('input[name=\"check_all[]\"]').prop('disabled', true);
							$('input[name=\"usulan[]\"]').prop('disabled', true);
							//$('input[name=\"check_pegawai_status[]\"]').prop('disabled', true);
							$('input[name=\"pegawai_id[]\"]').prop('disabled', true);
							$('input[name=\"check_pegawai_cnosk[]\"]').prop('disabled', true);
							$('input[name=\"txt_check_all[]\"]').prop('disabled', true);
							$('#check_all_'+id_).prop('disabled', true);
						} else {
							//$('.check_pegawai_'+id_).prop('disabled', false);
							$('.usulan_'+id_).prop('disabled', false);
							//$('.check_pegawai_status_'+id_).prop('disabled', false);
							$('.pegawai_id_'+id_).prop('disabled', false);
							$('.check_pegawai_cnosk_'+id_).prop('disabled', false);
							$('.txt_check_all_'+id_).prop('disabled', false);
							$('#check_all_'+id_).prop('disabled', false);
						}
					}

					function _enabled_all(id_='') {
						if ( id_ == '' ) {
							$('input[name=\"check_pegawai[]\"]').prop('disabled', false);
							$('input[name=\"check_all[]\"]').prop('disabled', false);
							$('input[name=\"usulan[]\"]').prop('disabled', false);
							//$('input[name=\"check_pegawai_status[]\"]').prop('disabled', false);
							$('input[name=\"pegawai_id[]\"]').prop('disabled', false);
							$('input[name=\"check_pegawai_cnosk[]\"]').prop('disabled', false);
							$('input[name=\"txt_check_all[]\"]').prop('disabled', false);
							$('#check_all_'+id_).prop('disabled', false);
						} else {
							$('.check_pegawai_'+id_).prop('disabled', true);
							$('.usulan_'+id_).prop('disabled', true);
							//$('.check_pegawai_status_'+id_).prop('disabled', true);
							$('.pegawai_id_'+id_).prop('disabled', true);
							$('.check_pegawai_cnosk_'+id_).prop('disabled', true);
							$('.txt_check_all_'+id_).prop('disabled', true);
							$('#check_all_'+id_).prop('disabled', true);
						}
					}

					function _prompt(id_) {
						_disabled(id_, 0);

						/* var idnosk = $('#id_nosk_'+id_).val();
						if (idnosk == '') idnosk = 0; */
						
						var idnosk = 0;
						
						edit('".base_url()."perbend/t_usulan_nosk/edit/'+idnosk+'/'+id_, 't_terbit_sk');


						/*var nilai = prompt('Masukkan No. SK', $('.check_pegawai_cnosk_'+id_).val());
						if ( nilai == null ) {
							//do nothing
							_enabled_all();
							_disabled(id_, 1);
							_check_uncheck_all();
						} else if ( nilai == ''  ) {
							bootbox_alert('', '', 'No. SK wajib diisi', true, false);
							return false;
						} else {
							//$('.check_pegawai_cnosk_'+id_).val(nilai);
							//check_pegawai_status_3
							
							$('.check_pegawai_cnosk_'+id_).each(function() {
								var idx	 = $(this).attr('id');	
								var idx_ = (idx.split('_')).pop();
								if ( $('#usulan_'+id_+'_'+idx_).val() != 0 ) $('#check_pegawai_cnosk_'+id_+'_'+idx_).val(nilai);
							});
							save(\"".base_url()."perbend/t_terbit_sk\", \"t_terbit_sk\", 
								\"Proses SK. Anda Yakin ?\", false, \"\", false, true, false, false, \"Proses SK Berhasil\");
							_enabled_all();
						}*/
					}
			   </script>";

		return $js;
	}

	function unduhfile($a, $is_sp=0) {
		$files = $this->getrow($this->dbpeng, 'app_t_usulan_sk', 'cnosk, cnosurat, tfile, tfile4', array('id'=>$a));

		if ( $is_sp == 0) {
			$nosk = str_replace("/", "_", $files->cnosk);
			$bfile = $files->tfile;
			$nama = $nosk.'.docx';
		} else {
			$nosk = str_replace("/", "_", $files->cnosurat);
			$bfile = $files->tfile4;
			$nama = $nosk.'.docx';
		}

		$decoded = base64_decode($bfile);
		header("Content-Disposition: attachment;filename={$nama}");
		header("Content-Type: application/force-download");
		echo $decoded;
	}

	function generate_no_sk_sinde($params=array()) {
		$datas = array();

		$this->load->library('rest');
		$config = array(
			'server' => trim($this->config->item('client_url')),
			'api_key'	=> $this->config->item('x_api_key'),//"834fa24e-eb5e-11eb-9a03-0242ac130003",
            'api_name'	=> "X-API-KEY"
		);

		$this->rest->initialize($config);

		$result = $this->rest->post('services_pkln/getToken', 
		/* array(
				'client-id'=>'4ebd0208-8328-5d69-8c44-ec50939c0967', 
				'client-secret'=>'b895ecbc-c152-4815-991a-d50ea6b20b82'), false
		); */
		array(
			'client-id'=>$this->config->item('client_id'),//'52b5a3e2-a6bf-4f0c-b238-744a4e8769d8', 
			'client-secret'=>$this->config->item('client_secret')), false//'c94e80a5-d088-4ccc-9f3a-82640a75d8bf'), false
		);
		$result = json_decode($result);
		//print_r($result);
		//exit;
		$token = $result->data->access_token;

		//echo 'token : '.$token;
		//exit;

		
		$config = array(
			'server' => trim($this->config->item('client_url')),
			'api_key'	=> $token,
            'api_name'	=> "bearer"
		);
		$this->rest->initialize($config);
		//$this->rest->http_header('User-agent', $_SERVER['HTTP_USER_AGENT']);
		//$this->rest->http_header('bearer',$token);
		$result2 = $this->rest->post('services_pkln/getNomorSuratKeluarPKLN', 
		$params	
		);

		$result2 = json_decode($result2);
		$datas = [
			'nosurat' => $result2->data->nosurat,
			'urlsuratdetail' => $result2->data->urlsuratdetail,
			'idsurat' => $result2->data->idsurat,
		];

		return (object)$datas;
	}
}
