<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class T_sprint extends MX_Controller {
  var $prefix = 'app';
	public function __construct() {
		parent::__construct();
		$controller = "perbend/t_sprint";
		$table  = $this->prefix."_t_rekening_sprint";

   		$this->_setTitle('Rekening Sprint');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'kode_satker', 'Kode Satker', false, true);
        $this->_addField($table, 'nama_satker', 'Nama Satker', false, true);
        $this->_addField($table, 'no_rekening', 'No. Rekening', false, true);
        $this->_addField($table, 'nama_rekening', 'Nama Pemilik Rekening', false, true);
        $this->_addField($table, 'createdat', 'Waktu Update', false, true);
        $this->_addField($table, 'createdby', 'Update Oleh', false, true);
        $this->_addField($table, 'file', 'Dokumen', true, false, true);

        $this->_add2ListField($table, 'kode_satker, nama_satker, no_rekening, nama_rekening, createdat');

        $this->_add2SearchField($table, 'kode_satker');
        $this->_add2SearchField($table, 'nama_satker');

        $this->_changeType($table, 'file', 'file');
		
		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}

    function save() {
        $post = (Object)$_POST;
        //print_r($_FILES);
        //exit;
        //$uploads = 'excel/sprint/'.trim($this->session->username);
        //if (!file_exists(realpath($uploads))) {
        //    mkdir($uploads);
        //}
        
        $files = $this->uploadfiles($_FILES['app_t_rekening_sprint_file'], false);
        $spreadsheet = IOFactory::load($files->tmp);
        $sheet = $spreadsheet->getActiveSheet();
        $rowIterator = $sheet->getRowIterator();
        $array_data = array();
        $data = array();

        foreach($rowIterator as $row){
            $rowIndex = $row->getRowIndex();	
            
            //ambil NIP
            if ($rowIndex > 4) {
            
                $array_data[$rowIndex] = array('A'=>'','B'=>'', 'C'=>'', 'D'=>'', 'E'=>'');
                        
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
                $array_data[$rowIndex]['E'] = $cell->getValue();
                    
            }
        }

        foreach($array_data as $d) {
            if ( trim($d['A']) == '' ) break;
            else $data[] = $d;
        }

        $query = array();
        $today = date('Y-m-d H:i:s');
        $username = $this->session->username;
        foreach($data as $d) {
            $kdsatker = trim($d['B']);
            $nmsatker = trim($d['C']);
            $norek = trim($d['D']);
            $nmrek = trim($d['E']);

            //check dulu
            if ( $this->getrow('', 'app_t_rekening_sprint', 'count(*) as total', ['kode_satker'=>$kdsatker, 'no_rekening'=>$norek])->total > 0 ) {
                //update
                $query[] = "UPDATE app_t_rekening_sprint set nama_satker = '{$nmsatker}', 
                            nama_rekening='{$nmrek}', createdat='{$today}', createdby='{$username}'
                            where kode_satker='{$kdsatker}' and nama_satker='{$nmsatker}'";
            } else {
                //INSERT
                $query[] = "INSERT INTO app_t_rekening_sprint (kode_satker, nama_satker,
                            no_rekening, nama_rekening, createdat, createdby) VALUES 
                            ('{$kdsatker}', '{$nmsatker}', '{$norek}', '{$nmrek}', 
                            '{$today}', '{$username}')";
            }
        }

        //print_r($query);
        //exit;

        $this->db->trans_start();
        foreach($query as $q) {
            $this->db->query($q);
        }
        $this->db->trans_complete();

        $data['id'] = 0;
        if ($this->db->trans_status() === FALSE) {
            $data['status'] = false;
            $data['msg'] = 'Import gagal disimpan';
            $this->db->trans_rollback();
        } else {
            $data['status'] = true;
            $data['msg'] = 'Import berhasil disimpan';
            $this->db->trans_commit();
        }

        echo json_encode($data);
    }

    function listBox_ACTION($buttons) {
        unset($buttons);

        return $buttons;
    }

}