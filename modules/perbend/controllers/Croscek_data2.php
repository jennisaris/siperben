<?php
//ini_set("display_errors", 1);
//error_reporting(E_ALL);
defined('BASEPATH') OR exit('No direct script access allowed');

class Croscek_data2 extends MX_Controller {
  	var $prefix = 'app';
  	var $table;

	var $ar_jabatan;
	
	var $url_opener = '';

	var $cpegawai;
	public function __construct() {
		parent::__construct();
		$controller = "perbend/croscek_data2";
		$this->table  = $this->prefix."_t_usulan_pegawai";

		$url_opener = explode('/', $_SERVER['HTTP_REFERER']);
		$this->url_opener = end($url_opener);

		$this->_setModal(false);
   		$this->_setTitle('Daftar Pegawai');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table, 'iusulanid');
		$this->_addField($this->table, 'id', 'idx', true, true);
		$this->_addField($this->table, 'iusulanid', 'iusulan', false, true);
		$this->_addField($this->table, 'ispelatihan', 'ispelatihan', false, true);
		$this->_addField($this->table, 'ifrom', 'ifrom', false, true);
		$this->_addField($this->table, 'ijabid2', 'Jabatan', true);
		$this->_addField($this->table, 'cnip', 'NIP', false);
		$this->_addField($this->table, 'vname', 'Nama Lengkap', false);
		$this->_addField($this->table, 'cgolid', 'Pangkat, Golongan', false, true);
		$this->_addField($this->table, 'golongan', 'Pangkat, Golongan', false, false, true);
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

		//$this->_addField($this->table, 'status', 'Status Verifikasi', false, false, true);

		$this->_addField($this->table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($this->table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($this->table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($this->table, 'cupdatedby', 'Diubah oleh', false, true);
		$this->_addField($this->table, 'inoskid', 'inoskid', false, true);
		$this->_addField($this->table, 'cnosk', 'No. SK', false, true);
		$this->_addField($this->table, 'isnonaktif', 'Aktif ?', false);

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
		$this->_addField($table4, 'kode', 'Kode Satker', false, true);
		$this->_addField($table4, 'nama', 'Nama Satker', false, true);

        $this->_addRelation($table2, $table4, array('iunorid'=>'kode'));   



		$table5 = 'kepeg_m_golongan';
		$this->_addTable($table5);
		$this->_addField($table5, 'id', 'kode', false, true);
		$this->_addField($table5, 'nama', 'Golongan', false, true);
		$this->_addField($table5, 'pangkat', 'Pangkat', false, true);

        $this->_addRelation($this->table, $table5, array('cgolid'=>'id'));   

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


		$this->_setAlign($this->table, 'ijabid2', 'left');
		$this->_setAlign($this->table, 'istatus', 'center');
		$this->_setAlign($this->table, 'istatus2', 'center');
		$this->_setAlign($this->table, 'status', 'center');
		
		
		//$this->_add2SearchField($this->table, 'iusulanid', false, true, true);
		//$this->_add2SearchField($this->table, 'ispelatihan', false, true, true);
		//$this->_add2SearchField($table2, 'cnousul');
		//$this->_add2SearchField($table2, 'dtglusul');

		$ar_tahun = [];
		$sql = "SELECT ctahun from app_t_usulan where ctahun IS NOT NULL group by ctahun order by ctahun asc";
		$rows = $this->db->query($sql)->result();
		foreach($rows as $r) {
			$ar_tahun[$r->ctahun] = $r->ctahun;
		}

		$this->_add2SearchField($table2, "ctahun");//, ckduker
		$this->_add2SearchField($this->table, 'cnip');
		$this->_add2SearchField($table3, 'vname');
		$this->_add2SearchField($table4, 'kode');
        $this->_add2SearchField($table4, 'nama');
		$this->_add2SearchField($this->table, 'cnosk');
        $this->_add2SearchField($this->table, 'ijabid2');
		$this->_add2SearchField($this->table, 'isnonaktif');
		
		$this->_add2ListField($table2, "ctahun");//, ckduker
		$this->_add2ListField($table4, "nama");
        $this->_add2ListField($this->table, "cnip, vname");//, ckduker
		$this->_add2ListField($table5, "nama");//, ckduker
        $this->_add2ListField($this->table, "cnosk,cnosertifikat, ijabid2, isnonaktif");//, cnipold, tupdated, cupdatedby');

        //$this->_addQuery($table2, "app_t_usulan.ctahun = '{$this->session->settahun}'", 'and', '', true);
        //$this->_addQuery($table2, "app_t_usulan.itipe = 1", 'and', '', true);

        $this->_addOrderBy($this->table, ['ckduker'=>'asc']);
		$this->_addOrderBy($table2, ['ctahun'=>'asc']);


		$this->_changeType($this->table, 'ijabid2', 'combobox', 
		$this->ar_jabatan);
		
		$this->_changeType($this->table, 'istatus', 'combobox', 
		$this->session->sysparam->status_daftar_pegawai);

		$this->_changeType($this->table, 'isnonaktif', 'combobox', 
		[0=>'Aktif', 1=>'Non Aktif']);

		$this->_changeType($table2, 'ctahun', 'combobox', 
		$ar_tahun);

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}

	function updateBox_app_t_usulan_pegawai_cnipold($name, $value, $datas) {
		$nama_pegawai = '';
		if ( !empty(trim($value))) {
			$pegawai = $this->getrow('', 'kepeg_m_pegawai', 'cnip, vname', ['cnip'=>trim($value)]);
			$nama_pegawai = $pegawai->vname;
		}
		$html = "<input type='hidden' name='{$name}' id='{$name}' value='{$value}'/>";
		$html .= "<p class='form-control-static {$name}'>".$value.' - '.$nama_pegawai."</p>";
		return $html;
	}

	function updateBox_app_t_usulan_pegawai_cnosertifikat($name, $value, $datas) {
		$html = "<input type='hidden' name='{$name}' id='{$name}' value='{$value}'/>";
		$html .= "<p class='form-control-static {$name}'>".$value."</p>";
		return $html;
	}

	function updateBox_app_t_usulan_pegawai_cnip($name, $value, $datas) {
		$html = "<input type='hidden' name='{$name}' id='{$name}' value='{$value}'/>";
		$html .= "<p class='form-control-static {$name}'>".$value."</p>";
		return $html;
	}

	function updateBox_app_t_usulan_pegawai_vname($name, $value, $datas) {
		$html = "<input type='hidden' name='{$name}' id='{$name}' value='{$value}'/>";
		$html .= "<p class='form-control-static {$name}'>".$value."</p>";
		return $html;
	}

	
	function updateBox_app_t_usulan_pegawai_ijabid2($name, $value, $datas) {
		$html = "<input type='hidden' name='{$name}' id='{$name}' value='{$value}'/>";
		$html .= "<p class='form-control-static {$name}'>".$this->ar_jabatan[$value]."</p>";
		return $html;
	}

	function updateBox_app_t_usulan_pegawai_golongan($name, $value, $datas) {
		$html = "<p class='form-control-static {$name}'>".$datas->kepeg_m_golongan_nama.', '.$datas->kepeg_m_golongan_pangkat."</p>";
		return $html;
	}

	function listBox_kepeg_m_golongan_nama($value, $datas) {
		return $value.', '.$datas->kepeg_m_golongan_pangkat;
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