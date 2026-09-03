<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;

//require 'vendor/autoload.php';


use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
		$post = (Object)$_POST;
		$jenis = isset($post->app_t_usulan_pegawai_jenis) ? $post->app_t_usulan_pegawai_jenis : 1;

		$username = trim($this->session->username ?: 'upload');
		$uploads = 'excel/sk/'.$username;
		if (!is_dir($uploads)) {
			mkdir($uploads, 0777, true);
		}

		// 1. Simpan berkas lampiran PDF SK (jika ada yang diunggah)
		$uploaded_sk_files = [];
		if (!empty($_FILES['app_t_usulan_pegawai_file']['name'])) {
			$files = $this->uploadfiles($_FILES['app_t_usulan_pegawai_file'], false);
			if (!empty($files->tmp)) {
				$tmp_array = is_array($files->tmp) ? $files->tmp : [$files->tmp];
				$name_array = is_array($files->name) ? $files->name : [$files->name];
				foreach ($tmp_array as $k => $t) {
					if (!empty($t) && !empty($name_array[$k]) && is_uploaded_file($t)) {
						$target_path = $uploads . "/" . $name_array[$k];
						if (move_uploaded_file($t, $target_path)) {
							$uploaded_sk_files[] = $target_path;
						}
					}
				}
			}
		}

		// 2. Validasi & Muat Berkas Excel (Dokumen)
		if (empty($_FILES['app_t_usulan_pegawai_file2']['tmp_name']) || !is_uploaded_file($_FILES['app_t_usulan_pegawai_file2']['tmp_name'])) {
			$datas = [
				'id' => 0,
				'status' => FALSE,
				'msg' => "File dokumen Excel wajib diunggah. Silakan pilih file Excel terlebih dahulu."
			];
			echo json_encode($datas);
			exit;
		}

		$files2 = $this->uploadfiles($_FILES['app_t_usulan_pegawai_file2'], false);
		if (empty($files2->tmp) || !file_exists($files2->tmp)) {
			$datas = [
				'id' => 0,
				'status' => FALSE,
				'msg' => "Gagal membaca berkas Excel yang diunggah."
			];
			echo json_encode($datas);
			exit;
		}

		try {
			$spreadsheet = IOFactory::load($files2->tmp);
		} catch (\Throwable $e) {
			$datas = [
				'id' => 0,
				'status' => FALSE,
				'msg' => "Format file Excel tidak dapat dibaca: " . $e->getMessage()
			];
			echo json_encode($datas);
			exit;
		}

		$sheet = $spreadsheet->getActiveSheet();
		$rowIterator = $sheet->getRowIterator();
		$array_data = array();

		foreach($rowIterator as $row){
			$rowIndex = $row->getRowIndex();	
			if ($rowIndex > 1) {
				$cellA = $sheet->getCell('A' . $rowIndex);
				$valA = trim((string)$cellA->getValue());
				if ($valA === '') break;

				$rowCols = ['A'=>'', 'B'=>'', 'C'=>'', 'D'=>'', 'E'=>'', 'F'=>'', 'G'=>'', 'H'=>'', 'I'=>''];
				$rowCols['A'] = $valA;
				$rowCols['B'] = trim((string)$sheet->getCell('B' . $rowIndex)->getValue());
				$rowCols['C'] = trim((string)$sheet->getCell('C' . $rowIndex)->getValue());
				$rowCols['D'] = trim((string)$sheet->getCell('D' . $rowIndex)->getValue());

				// Pembacaan kolom E (Tanggal SK) yang aman terhadap format Excel Date maupun Text
				$cellE = $sheet->getCell('E' . $rowIndex);
				$valE = '';
				if (Date::isDateTime($cellE)) {
					try {
						$dt = Date::excelToDateTimeObject($cellE->getValue());
						$valE = $dt ? $dt->format('Y-m-d') : (string)$cellE->getValue();
					} catch (\Throwable $ex) {
						$valE = (string)$cellE->getValue();
					}
				} else {
					$valE = (string)$cellE->getValue();
				}
				$rowCols['E'] = trim($valE);

				$cellF = $sheet->getCell('F' . $rowIndex);
				$valF = trim((string)$cellF->getValue());
				if ($valF === '') {
					$datas = [
						'id' => 0,
						'status' => FALSE,
						'msg' => "Kolom NIP di baris {$rowIndex} pada file {$files2->name} tidak boleh kosong. Cek kembali!!"
					];
					echo json_encode($datas);
					exit;
				}
				$rowCols['F'] = $valF;
				$rowCols['G'] = trim((string)$sheet->getCell('G' . $rowIndex)->getValue());
				$rowCols['H'] = trim((string)$sheet->getCell('H' . $rowIndex)->getValue());
				$rowCols['I'] = trim((string)$sheet->getCell('I' . $rowIndex)->getValue());

				$array_data[$rowIndex] = $rowCols;
			}
		}

		$data = array();
		foreach($array_data as $d) {
			if (trim($d['A']) === '') break;
			$data[] = $d;
		}

		if (empty($data)) {
			$datas = [
				'id' => 0,
				'status' => FALSE,
				'msg' => "Tidak ada data pada file Excel yang dapat diproses."
			];
			echo json_encode($datas);
			exit;
		}

		$kode_sertifikat = [
			'BP' => 'cnobnt',
			'BPn' => 'cnobnt',
			'BPP' => 'cnobnt',
			'PPSPM' => 'cnosnt',
			'PPK' => 'cnopnt',
			'KPA' => ''
		];
		$nm_bln = [
			'januari' => '01', 'jan' => '01',
			'februari' => '02', 'feb' => '02',
			'maret' => '03', 'mar' => '03',
			'april' => '04', 'apr' => '04',
			'mei' => '05', 'may' => '05',
			'juni' => '06', 'jun' => '06',
			'juli' => '07', 'jul' => '07',
			'agustus' => '08', 'ags' => '08', 'agt' => '08', 'aug' => '08',
			'september' => '09', 'sep' => '09',
			'oktober' => '10', 'okt' => '10', 'oct' => '10',
			'november' => '11', 'nov' => '11',
			'desember' => '12', 'des' => '12', 'dec' => '12'
		];

		$no_usul = 'TANPA_NO_USUL';
		$tcreated = date('Y-m-d H:i:s');
		$ccreatedby = 'upload';
		$ijns = $jenis;
		$status = true;
		$msg = 'Upload berhasil';

		foreach($data as $d) {
			$nourut = trim($d['A']);
			$tahun = trim($d['B']);
			$kdsatker = trim($d['C']);
			$nosk = trim($d['D']);

			// Helper parser tanggal fleksibel
			$raw_date = trim(str_replace(["'", "`"], '', $d['E']));
			$tglsk = date('Y-m-d');
			$thnsk = !empty($tahun) ? $tahun : date('Y');

			if (preg_match('/^(\d{4})[-\/](\d{1,2})[-\/](\d{1,2})$/', $raw_date, $m_dt)) {
				$tglsk = sprintf('%04d-%02d-%02d', $m_dt[1], $m_dt[2], $m_dt[3]);
				$thnsk = $m_dt[1];
			} elseif (preg_match('/^(\d{1,2})[-\/](\d{1,2})[-\/](\d{4})$/', $raw_date, $m_dt)) {
				$tglsk = sprintf('%04d-%02d-%02d', $m_dt[3], $m_dt[2], $m_dt[1]);
				$thnsk = $m_dt[3];
			} else {
				$parts = preg_split('/[\s\-_]+/', $raw_date);
				if (count($parts) >= 3) {
					$d_num = sprintf('%02d', (int)$parts[0]);
					$m_str = strtolower($parts[1]);
					$m_num = isset($nm_bln[$m_str]) ? $nm_bln[$m_str] : (is_numeric($parts[1]) ? sprintf('%02d', (int)$parts[1]) : '01');
					$y_num = (int)$parts[2];
					if ($y_num > 1900 && $y_num < 2100) {
						$tglsk = sprintf('%04d-%02d-%02d', $y_num, $m_num, $d_num);
						$thnsk = (string)$y_num;
					}
				} elseif (!empty($raw_date)) {
					$ts = strtotime($raw_date);
					if ($ts !== false && $ts > 0) {
						$tglsk = date('Y-m-d', $ts);
						$thnsk = date('Y', $ts);
					}
				}
			}

			if (empty($thnsk)) {
				$thnsk = date('Y', strtotime($tglsk));
			}

			$nip = trim(str_replace(["'", "`"], '', $d['F']));
			$nama = trim($d['G']);
			$nosert = trim($d['H']);
			$tipe = trim($d['I']);

			// Lookup jabatan cerdas
			$tipe_clean = strtoupper($tipe);
			if ($tipe_clean === 'BPN') $tipe_clean = 'BPn';
			$ijab_row = $this->getrow($this->db, 'app_m_jabatan', 'id', array('ckode' => $tipe_clean));
			if (!$ijab_row) {
				$ijab_row = $this->db->query("SELECT id FROM app_m_jabatan WHERE UPPER(ckode) = " . $this->db->escape($tipe_clean))->row();
			}
			$ijabid2 = $ijab_row ? $ijab_row->id : 0;

			try {
				// Cari file PDF SK terkait:
				$file_sk = '';
				if (file_exists($uploads . '/' . $nourut . '.pdf')) {
					$file_sk = $uploads . '/' . $nourut . '.pdf';
				} elseif (file_exists($uploads . '/' . $kdsatker . '.pdf')) {
					$file_sk = $uploads . '/' . $kdsatker . '.pdf';
				} elseif (count($uploaded_sk_files) === 1 && file_exists($uploaded_sk_files[0])) {
					$file_sk = $uploaded_sk_files[0];
				}

				$escaped = "";
				if (!empty($file_sk) && file_exists($file_sk)) {
					$content_sk = file_get_contents($file_sk);
					if ($content_sk !== false) {
						$escaped = base64_encode($content_sk);
					}
				}

				$last_id_sk = 0;
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
						'ittdid'=> 1,
					];
					if (!empty($escaped)) {
						$data_sk['tfile2'] = $escaped;
						$data_sk['vtype']  = 'application/pdf';
					}
					$where = [
						'ijns' => $ijns,
						'iunorid' => $kdsatker,
						'cnosk' => $nosk,
					];
					$sk_row = $this->getrow($this->db, $tbl_usulan_sk, 'id', $where);
					$last_id_sk = $sk_row ? $sk_row->id : '';
					if ($last_id_sk == '' ) {
						$this->db->insert($tbl_usulan_sk, $data_sk);
						$last_id_sk = $this->db->insert_id();
					} else {
						$where = ['id' => $last_id_sk];
						$this->db->where($where);
						$this->db->update($tbl_usulan_sk, $data_sk);
					}
				}

				$tbl_usulan = 'app_t_usulan';
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

				if ( $jenis == 2 && !empty($escaped) ) {
					$data_usulan['tfile'] = $escaped;
					$data_usulan['vtype'] = 'application/pdf';
				}

				$where = [
					'ijns' => $ijns,
					'cnousul' => ($jenis == 2 ? $nosk : $no_usul),
					'dtglusul' => $tglsk,
					'ctahun' => $thnsk,
					'iunorid' => $kdsatker,
					'itipe' => 1
				];
				$usulan_row = $this->getrow($this->db, $tbl_usulan, 'id', $where);
				$last_id_usulan = $usulan_row ? $usulan_row->id : '';
				if ($last_id_usulan == '' ) {
					$this->db->insert($tbl_usulan, $data_usulan);
					$last_id_usulan = $this->db->insert_id();
				} else {
					$where = ['id' => $last_id_usulan];
					$this->db->where($where);
					$this->db->update($tbl_usulan, $data_usulan);
				}

				if ($nip != '' ) {
					$pegawais = $this->getrow($this->db, 'kepeg_m_pegawai', '*', array('cnip'=>$nip));
					$tbl_usulan_pegawai = 'app_t_usulan_pegawai';
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
						'ijabid2' => $ijabid2,
						'tcreated' => $tcreated,
						'ccreatedby' => $ccreatedby,
						'cgolid' => $pegawais ? $pegawais->cgolid : '',
						'cjabid' => $pegawais ? $pegawais->cjabid : '',
						'isnonaktif'=> 0
					];

					$where = [
						'iusulanid' => $last_id_usulan,
						'cnip' => $nip,
						'ispelatihan' => 0
					];
					$pegawai_row = $this->getrow($this->db, $tbl_usulan_pegawai, 'id', $where);
					$last_id_pegawai = $pegawai_row ? $pegawai_row->id : '';
					if ($last_id_pegawai == '' ) {
						$this->db->insert($tbl_usulan_pegawai, $data_pegawai);
						$last_id_pegawai = $this->db->insert_id();
					} else {
						$where = ['id' => $last_id_pegawai];
						$this->db->where($where);
						$this->db->update($tbl_usulan_pegawai, $data_pegawai);
					}

					// Update ke master pegawai
					$tbl_pegawai = 'kepeg_m_pegawai';
					$data_mst_pegawai = [
						'ckduker2' => $kdsatker,
						'cjabid2' => $ijabid2
					];
					if (!empty($kode_sertifikat[$tipe])) {
						$data_mst_pegawai[$kode_sertifikat[$tipe]] = $nosert;
					}
					$this->db->where(['cnip' => $nip]);
					$this->db->update($tbl_pegawai, $data_mst_pegawai);

					// Nonaktifkan usulan lama untuk jabatan dan satker yang sama
					if (!empty($last_id_sk)) {
						$where2 = [
							'ijabid2' => $ijabid2,
							'ckduker' => $kdsatker,
							'inoskid!=' => $last_id_sk
						];
						$datas2 = [
							'isnonaktif' => 1,
							'tupdated' => $tcreated,
							'cupdatedby' => $username
						];
						$this->db->where($where2);
						$this->db->update($tbl_usulan_pegawai, $datas2);
					}

					$msg = 'Upload berhasil';
					$status = true;
				} else {
					$datas = [
						'id' => 0,
						'status' => false,
						'msg' => "Data tidak terproses: NIP Kosong pada baris {$nourut} ({$nama})"
					];
					echo json_encode($datas);
					exit;
				}
			} catch (\Throwable $e) {
				$datas = [
					'id' => 0,
					'status' => false,
					'msg' => "Error pada baris {$nourut} (SK: {$nosk}): " . $e->getMessage()
				];
				echo json_encode($datas);
				exit;
			}
		}

		// Cleanup file PDF temporer
		if (!empty($uploaded_sk_files)) {
			foreach ($uploaded_sk_files as $fpath) {
				if (file_exists($fpath)) {
					@unlink($fpath);
				}
			}
		}

		$datas = [
			'id' => 0,
			'status' => $status,
			'msg' => $msg
		];
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