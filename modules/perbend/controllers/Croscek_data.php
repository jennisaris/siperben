<?php
//ini_set("display_errors", 1);
//error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');
class Croscek_data extends MX_Controller {
  	var $prefix = 'app';
  	var $table;

	var $ar_jabatan;
	
	var $url_opener = '';
	public function __construct() {
		parent::__construct();
		$controller = "perbend/croscek_data";
		$this->table  = $this->prefix."_t_usulan_pegawai";

		$url_opener = explode('/', $_SERVER['HTTP_REFERER']);
		$this->url_opener = end($url_opener);

		if ($this->url_opener != 't_usulan_approval') $this->_setModal(true);

   		$this->_setTitle('Daftar Pegawai');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table, 'iusulanid');
		$this->_addField($this->table, 'id', 'idx', true, true);
		$this->_addField($this->table, 'iusulanid', 'iusulan', false, true);
		$this->_addField($this->table, 'ispelatihan', 'ispelatihan', false, true);
		$this->_addField($this->table, 'ifrom', 'ifrom', false, true);
		$this->_addField($this->table, 'ijabid2', 'Jabatan', true);
		$this->_addField($this->table, 'cnip', 'NIP', true);
		$this->_addField($this->table, 'vname', 'Nama Lengkap', true);
		$this->_addField($this->table, 'cgolid', 'Pangkat, Golongan', false);
		$this->_addField($this->table, 'ckduker', 'Satuan Kerja', false, true);
		//$this->_addField($this->table, 'vgolnm', 'Pangkat/Gol.', false);
		//$this->_addField($this->table, 'vpktnm', 'Pangkat/Gol.', false, true);
		$this->_addField($this->table, 'cjabid', 'Kode Jab.', false, true);
		$this->_addField($this->table, 'vjabnm', 'Nama Jabatan', false, true);
		$this->_addField($this->table, 'cnosertifikat','No. Sertifikat', false);

		//cek dl,apakah ada penggantian ?
		$this->_addField($this->table, 'cnipold','Pejabat yang diganti', false);
		$this->_addField($this->table, 'ijnsprubhnid','ijnsprubhnid', false, true, true);
		
		
		//$this->_addField($this->table, 'istatus', 'Status Verifikasi I', false, true);
		//$this->_addField($this->table, 'valasan', 'Alasan Penolakan I', false, true);
		
		//if ($this->url_opener !='t_usulan_verifikator' && $this->url_opener !='t_usulan_satker2') {
		//	$this->_addField($this->table, 'istatus2', 'Status Verifikasi II', false, true);
		//	$this->_addField($this->table, 'valasan2', 'Alasan Penolakan II', false, true);
		//}

		$this->_addField($this->table, 'status', 'Status Verifikasi', false, false, true);

		$this->_addField($this->table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($this->table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($this->table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($this->table, 'cupdatedby', 'Diubah oleh', false, true);
		$this->_addField($this->table, 'inoskid', 'inoskid', false, true);
		$this->_addField($this->table, 'cnosk', 'cnosk', false, true);

		$table2 = 'app_t_usulan';
		$this->_addTable($table2);
		$this->_addField($table2,'id','idxx',false,true);
		$this->_addField($table2,'cnousul','No. Usul',false, true);
		$this->_addField($table2,'dtglusul','Tgl. Usul',false,true);
		$this->_addField($table2,'istatus','istatus',false,true);
		$this->_addField($table2,'iunorid','Unit Organisasi',false,true);
		$this->_addField($table2,'itipe','itipe',false,true);
		$this->_addField($table2,'ijnsprubhnid','ijnsprubhnid',false,true);
        $this->_addField($table2,'ctahun', 'Tahun', false, true);
		
		$this->_addRelation($this->table, $table2, array('iusulanid'=>'id'));
		//$this->_add2SearchField($this->table, 'cnip');
		//$this->_add2SearchField($this->table, 'vname');
		//$this->_add2SearchField($this->table, 'ldeleted');

		$table3 = 'kepeg_m_pegawai';
		$this->_addTable($table3);
		$this->_addField($table3, 'id', 'idyy', false, true);
		$this->_addField($table3, 'cnip','NIP', false, true);
		$this->_addField($table3, 'vname', 'Nama Lengkap', false, true);

		$this->_addRelation($this->table, $table3, array('cnip'=>'cnip'));


        $table4 = 'app_m_unor';
		$this->_addTable($table4);
		$this->_addField($table4, 'kode', 'kode', false, true);
		$this->_addField($table4, 'nama', 'Nama Satuan Kerja', false, true);

        $this->_addRelation($table2, $table4, array('iunorid'=>'kode'));   

		//if ($this->url_opener == 't_usulan_satker') {
			$where = array('ldeleted'=>0);/*, 'ijns'=>1 
		} elseif($this->url_opener == 't_usulan_satker2') {
			$where = array('ldeleted'=>0, 'ijns'=>2);
		} else $where = array('ldeleted'=>0); */
		
		$rows = $this->getall('', $this->prefix.'_m_jabatan', '*', $where);
		foreach($rows as $r) {
		  $ar_jabatan[$r->id] = $r->ckode;
		}
		
		 /*if ( $this->getrow('', 'app_m_perubahan', 'cjabid2', array('id'=>trim($this->uri->segment(5))))->cjabid2 != '' ) {
		   foreach(explode(',',  
		   $this->getrow('', 'app_m_perubahan', 'cjabid2', array('id'=>trim($this->uri->segment(5))))->cjabid2) as $p ) {
		     $this->ar_jabatan[$p] = $ar_jabatan[$p];
		   }
		 } else */
         $this->ar_jabatan = $ar_jabatan;
			
		

		$this->_changeType($this->table, 'ijabid2', 'combobox', 
		$this->ar_jabatan);
		
		$this->_changeType($this->table, 'istatus', 'combobox', 
		$this->session->sysparam->status_daftar_pegawai);


		$this->_setAlign($this->table, 'ijabid2', 'left');
		$this->_setAlign($this->table, 'istatus', 'center');
		$this->_setAlign($this->table, 'istatus2', 'center');
		$this->_setAlign($this->table, 'status', 'center');
		
		
		//$this->_add2SearchField($this->table, 'iusulanid', false, true, true);
		//$this->_add2SearchField($this->table, 'ispelatihan', false, true, true);
		//$this->_add2SearchField($table2, 'cnousul');
		//$this->_add2SearchField($table2, 'dtglusul');
		$this->_add2SearchField($this->table, 'cnip');
		$this->_add2SearchField($table3, 'vname');
        $this->_add2SearchField($table4, 'nama');
        $this->_add2SearchField($this->table, 'ijabid2');
		
        $this->_add2ListField($this->table, "cnip, vname, cgolid");//, ckduker
        $this->_add2ListField($table4, "nama");
        $this->_add2ListField($this->table, "cnosertifikat, ijabid2");//, cnipold, tupdated, cupdatedby');

        $this->_addQuery($table2, "app_t_usulan.ctahun = '{$this->session->settahun}'", 'and', '', true);
        $this->_addQuery($table2, "app_t_usulan.itipe = 1", 'and', '', true);

        $this->_addOrderBy($this->table, ['ckduker'=>'asc']);

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}

    function listBox_app_t_usulan_pegawai_cgolid($value, $datas) {
		$name_txt = $this->getrow('', 'kepeg_m_golongan', 'concat(pangkat,\', \', nama) as nama_pangkat', array('id'=>$value))->nama_pangkat;
		return $name_txt;
	}

    function listBox_app_t_usulan_pegawai_ijabid2($value, $datas) {
		$name_txt = $this->getrow('', 'app_m_jabatan', 'vname', array('id'=>trim($value)))->vname;
		return $name_txt;
	}
}