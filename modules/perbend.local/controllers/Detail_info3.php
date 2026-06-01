<?php

defined('BASEPATH') OR exit('No direct script access allowed');

require_once("M_unor.php");
class Detail_info3 extends MX_Controller {
  var $prefix = 'app';
  var $ar_statusid = array();
  var $ar_statusperubahan = array();
  var $ar_jab2 = array();

  var $ar_unor = array();
	public function __construct() {
		parent::__construct();
		$controller = "perbend/detail_info3";
		$table2  = $this->prefix."_t_usulan_pegawai";
		

    $this->_setModal(true);
   	$this->_setTitle('Detail Pegawai Belum Memiliki Sertifikat');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table2);
		$this->_addField($table2, 'id', '', true, true);
		$this->_addField($table2, 'iusulanid', 'iusulanid', false, true);
		$this->_addField($table2, 'ispelatihan', 'ispelatihan', false, true);
		$this->_addField($table2, 'cnip', 'NIP', false);
		$this->_addField($table2, 'vname', 'Nama Pegawai', false);
		$this->_addField($table2, 'cnosertifikat', 'No. Sertifikat', false);
		$this->_addField($table2, 'cgolid', 'Pangkat/Golongan', false);
		$this->_addField($table2, 'ijabid2', 'Jabatan', false);
		$this->_addField($table2, 'istatus', 'istatus', false);
		$this->_addField($table2, 'istatus2', 'istatus2', false);
		$this->_addField($table2, 'cnosk', 'No. SK', false);
		$this->_addField($table2, 'inoskid', 'inoskid', false);
		$this->_addField($table2, 'ckduker', 'Nama Satuan Kerja', false);
		$this->_addField($table2, 'isnonaktif', 'Status Aktif', false);
		
		//header
		$table = $this->prefix.'_t_usulan';
		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'ijns', 'ijns', false, true);
		$this->_addField($table, 'iunorid', 'Satuan Kerja', true);
		$this->_addField($table, 'cnousul', 'No. Usul', true);
		$this->_addField($table, 'dtglusul', 'Tgl. Usul', true);
		$this->_addField($table, 'istatusid', 'Status Perubahan', true);
		$this->_addField($table, 'ijnsprubhnid', 'Jenis Perubahan', true);
		$this->_addField($table, 'lampiran', 'Lampiran Surat Usulan (dlm format PDF)', false, false, true);
		$this->_addField($table, 'tfile', 'Lampiran', true, true);
		$this->_addField($table, 'vtype', 'Tipe Dokumen', false, true);
		$this->_addField($table, 'nsize', 'nsize', false, true);
		$this->_addField($table, 'istatus', 'Status Usulan', false, true);
		$this->_addField($table, 'keterangan', 'Keterangan', false, true, true);
		$this->_addField($table, 'daftarnama', '', false, false, true, 0, 'left', '','', true);
		$this->_addField($table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($table, 'cupdatedby', 'Diubah oleh', false, true);
		$this->_addField($table, 'ctahun', 'Tahun', false, true);
		
		$this->_addRelation($table2, $table, array('iusulanid'=>'id'));

    $table3 = $this->prefix.'_t_usulan_sk';
		$this->_addTable($table3);
		$this->_addField($table3, 'id', '', true, true);
		$this->_addField($table3, 'cnosk', 'No. SK', false, true);
		$this->_addField($table3, 'dtglsk', 'Tgl. SK', false, true);
		//$this->_addField($table3, 'lampiran', 'Lampiran Surat Usulan (dlm format PDF)', false, false, true);
		//$this->_addField($table3, 'tfile2', 'Lampiran', true, true);
		//$this->_addField($table3, 'vtype', 'Tipe Dokumen', false, true);
		//$this->_addField($table3, 'nsize', 'nsize', false, true);
	
		
		$this->_addRelation($table2, $table3, array('inoskid'=>'id'));
		
		$table4 = 'kepeg_m_pegawai';
		$this->_addTable($table4);
		$this->_addField($table4, 'id', '', true, true);
		$this->_addField($table4, 'cnip', '', true, true);
		$this->_addField($table4, 'cnobnt', '', true, true);
		
		$this->_addRelation($table2, $table4, array('cnip'=>'cnip'));
	
		//$this->_add2SearchField($table, 'cnip');
		//$this->_add2SearchField($table, 'vname');
		//$this->_add2SearchField($table, 'ldeleted');
		
		$rows = $this->getall('', $this->prefix.'_m_unor', '*', array('deleted'=>0));
		foreach($rows as $r) {
		$this->ar_unor[$r->kode] = strtoupper($r->nama);
		}
		
		$this->_changeType($table, 'iunorid', 'combobox', 
		$this->ar_unor);
		
		$rows = $this->getall('', $this->prefix.'_m_jabatan', '*', array('ldeleted'=>0));
		foreach($rows as $r) {
		$this->ar_jab2[$r->id] = $r->vname." (".$r->ckode.")";
		} 
		
		$this->_changeType($table2, 'ijabid2', 'combobox', 
		$this->ar_jab2);
		
		$this->_changeType($table3, 'dtglsk', 'date', 'd-m-Y');
		$this->_changeType($table, 'istatus', 'combobox', 
		$this->session->sysparam->status_usulan);
		
		$this->_changeType($table2, 'isnonaktif', 'combobox', 
		$this->session->sysparam->ldeleted);
		
		//$this->_setAlign($table2, 'isnonaktif', 'center');
		
		//echo 'param '.$this->uri->segment(6);
		
		//$this->_add2SearchField($table2, 'isnonaktif');
		//$this->_add2SearchField($table2, 'cnosertifikat', false, true, false);
		$this->_add2SearchField($table2, 'ckduker', false, true, false);
		//$this->_add2SearchField($table2, 'ijabid2', false, true);
		//$this->_add2SearchField($table, 'cnousul');
		//$this->_add2SearchField($table, 'dtglusul');
		//$this->_add2SearchField($table, 'istatusid');
		//$this->_add2SearchField($table, 'ijnsprubhnid');
		//if ( $this->session->groupid == $this->session->sysparam->group_superuser[0] ) $this->_add2SearchField($table, 'iunorid', false, false, false);
		
		//$this->_add2SearchField($table2, 'isnonaktif');
    
		$this->_add2ListField($table, 'iunorid');
		$this->_add2ListField($table2, 'cnip, vname');
		$this->_add2ListField($table3, 'cnosk, dtglsk');//, tfile2');
		$this->_add2ListField($table2, 'ijabid2');//, isnonaktif');//, tupdated, cupdatedby');
		
		if ( $this->input->post('q_app_t_usulan_pegawai_ckduker') != '' ) {
		    $m_unor = new M_unor;
		    $orgs = [];
		    $m_unor->getRekursifUnit(trim($this->input->post('q_app_t_usulan_pegawai_ckduker')), $orgs);
		    $orgsx = [0=>trim($this->input->post('q_app_t_usulan_pegawai_ckduker'))];
		    foreach($orgs as $k=>$v){
		      $orgsx[] = $k;
		    }
		    //print_r($orgsx);
		    $kd_satker = "'".implode("','", $orgsx)."'";
		    $this->_addQuery($table, $table.'.iunorid in ('.$kd_satker.')', 'and', '', true);
		}
		
		//if ( $this->input->post('q_app_t_usulan_pegawai_cnosertifikat') == 1) 
		//  $this->_addQuery($table, "app_t_usulan_pegawai.cnosertifikat != ''", 'and', '', true);
		//else $this->_addQuery($table, "app_t_usulan_pegawai.cnosertifikat = ''", 'and', '', true);
    
    
		$this->_addQuery($table, 'app_t_usulan.ijns = 1', 'and', '', true);
		//$this->_addQuery($table, "app_t_usulan_pegawai.isnonaktif = 0", 'and', '', true);
		$this->_addQuery($table2, "app_t_usulan_pegawai.inoskid != 0", 'and', '', true);
		$this->_addQuery($table2, "app_t_usulan_pegawai.isnonaktif != 1", 'and', '', true);
		
		$this->_addQuery($table2, "app_t_usulan_pegawai.ijabid2 in (2,3,6)", 'and', '', true);
		$this->_addQuery($table4, "(kepeg_m_pegawai.cnobnt is null or kepeg_m_pegawai.cnobnt = '')", 'and', '', true);
		
		$this->_addOrderBy($table, array('iunorid'=>'asc'));
		$this->_addOrderBy($table2, array('ijabid2'=>'asc'));
		
		$this->_setHTMLTemplate('', 'detail_info/list');
    
    $this->session->unset_userdata('header_controller');
		$header_controller = array('header_controller' => 'perbend/laporan1');
		$this->session->set_userdata($header_controller);
	}

	/*function searchBox_app_t_usulan_iunorid($name) {
		$input = "<input type='hidden' name='{$name}' id='{$name}' class='form-control {$name}' value=''/>";
		$input .= "<input placeholder='Satuan Kerja' type='text' name='{$name}_txt' id='{$name}_txt' class='form-control {$name}_txt' value=''/>"; 

		return $input;
	}*/

	function listBox_app_t_usulan_iunorid($value) {
		$name_txt = $this->getrow('', 'app_m_unor', 'nama', array('kode'=>$value))->nama. " (".$value.")";
		if ($name_txt == '' ) $name_txt = $value;
		return $name_txt;
	}

	function ION($buttons, $datas) {
		unset($buttons);

	  return $buttons;
	}

	function app_t_usulan_pegawai_output() {
		$js = "<script type='text/javascript'>
				var btn_save_html = '';
				$(document).ready(function() {
					
				});
				
				function download(url) {
        	window.open(url, '_download_');
        }
				</script>";

		return $js;
	}

  function manipulate_list_button($buttons) {
    unset($buttons['add']);
    
    $buttons['download'] = "<button class='btn btn-primary' type='button' name='btn_download' id='btn_download' onclick='download(\"".base_url()."perbend/detail_info3/getlaporan/\"+$(\"#q_app_t_usulan_pegawai_ckduker\").val());'><i class='fas fa-download'></i> Download</button>";
    
    $buttons['close'] = "<button type='button' class='btn btn-default' 
								onclick='$(\"#myModal_browse\").modal(\"hide\");'>
					       		<i class='fas fa-times' aria-hidden='true'> </i>
								   Tutup</button>";
    return $buttons;
  }
   
  function getlaporan($kduker) {
    //echo 'test : '.$kduker;
    //exit;
    $m_unor = new M_unor;
		$orgs = [];
		$m_unor->getRekursifUnit(trim($kduker), $orgs);
		$orgsx = [0=>trim($kduker)];
		foreach($orgs as $k=>$v){
		  $orgsx[] = $k;
		}
		    //print_r($orgsx);
		$kd_satker = "'".implode("','", $orgsx)."'";
    $sql = "SELECT app_t_usulan_pegawai.cnip as app_t_usulan_pegawai_cnip,app_t_usulan_pegawai.vname as app_t_usulan_pegawai_vname,app_t_usulan_pegawai.ijabid2 as app_t_usulan_pegawai_ijabid2,app_t_usulan.iunorid as app_t_usulan_iunorid,app_t_usulan_sk.cnosk as app_t_usulan_sk_cnosk,app_t_usulan_sk.dtglsk as app_t_usulan_sk_dtglsk,kepeg_m_pegawai.cnip as kepeg_m_pegawai_cnip,kepeg_m_pegawai.cnobnt as kepeg_m_pegawai_cnobnt,app_m_unor.nama as app_m_unor_nama, app_m_jabatan.ckode as app_m_jabatan_ckode, app_m_jabatan.vname as app_m_jabatan_vname from app_t_usulan_pegawai left join app_t_usulan on app_t_usulan_pegawai.iusulanid = app_t_usulan.id left join app_t_usulan_sk on app_t_usulan_pegawai.inoskid = app_t_usulan_sk.id left join kepeg_m_pegawai on app_t_usulan_pegawai.cnip = kepeg_m_pegawai.cnip left join 
      app_m_unor on app_t_usulan.iunorid = app_m_unor.kode left join app_m_jabatan on app_t_usulan_pegawai.ijabid2 = app_m_jabatan.id where app_t_usulan_pegawai.id != 0 and app_t_usulan.ijns = 1 and app_t_usulan_pegawai.inoskid != 0 and app_t_usulan_pegawai.isnonaktif != 1 and app_t_usulan_pegawai.ijabid2 in (2,3,6) and (kepeg_m_pegawai.cnobnt is null or kepeg_m_pegawai.cnobnt = '') and app_t_usulan.iunorid in ({$kd_satker}) order by app_t_usulan.iunorid asc,app_t_usulan_pegawai.ijabid2 asc";
    
    $result = $this->db->query($sql)->result();
    $html = "<table border='1'>";
    $html .= "<tr>";
    $html .= "<th>No.</th>";
    $html .= "<th>Nama Satker</th>";
    $html .= "<th>Nama Pegawai</th>";
    $html .= "<th>No. SK</th>";
    $html .= "<th>Tgl. SK</th>";
    $html .= "<th>Jabatan</th>";
    $html .= "</tr>";
    
    $no = 1;
    foreach ($result as $r) {
      $html .= "<tr>";
      $html .= "<td>".$no."</td>";
      $html .= "<td>".$r->app_m_unor_nama."</td>";
      $html .= "<td>".$r->app_t_usulan_pegawai_vname."</td>";
      $html .= "<td>".$r->app_t_usulan_sk_cnosk."</td>";
      $html .= "<td>".$r->app_t_usulan_sk_dtglsk."</td>";
      $html .= "<td>".$r->app_t_usulan_sk_dtglsk."</td>";
      $html .= "<td>".$r->app_m_jabatan_vname." (".$r->app_m_jabatan_ckode.")</td>";
      
      $no++;
    }
    
    $filename = "bendahara_pegawai_" . date('Ymd') . ".xls";

    header("Content-Disposition: attachment; filename=\"$filename\"");
    header("Content-Type: application/vnd.ms-excel");
    echo $html;
    exit;
    
  }
  
 	function listBox_app_t_usulan_sk_tfile2($value, $datas) {
	  $input = "";
	  
	  $vtype = trim($datas->app_t_usulan_sk_vtype);
	  $tfile = trim($value);
	  
	  if ( !empty($value) ){
			$input .= "<span data-toggle='modal' data-target='#myPreview_{$datas->app_t_usulan_sk_id}' style='cursor:pointer;' class='btn btn-warning'>
						<i class='fas fa-eye'></i> <b>Lihat Surat Keputusan</b>
					  </span>";
  	  $input .= "<div class='modal fade' id='myPreview_{$datas->app_t_usulan_sk_id}' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
  				   <div class='modal-dialog' role='document' style='width:65%;'>
  					 <div class='modal-content'>
  					   <div class='modal-header'>
  						 <button type='button' class='close' aria-label='Close' 
  						 onclick=\"$('#myPreview_{$datas->app_t_usulan_sk_id}').modal('hide').appendTo('.div_app_t_usulan_sk_tfile2');$('#{$this->router->class}_form-modal').css('overflow', 'scroll');\">
  						 <span aria-hidden='true'>&times;</span></button>
  						 <h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> No. SK {$datas->app_t_usulan_sk_cnosk}</h4>
  					   </div>
  					   <div class='modal-body' id='modal-body'>
  						 <div class='form-group'>
  							 <div id='html_telusuri'>";
  
  		if ( $vtype != 'application/pdf' ) {
  			$height='100';$width='';
  		} else { $height='100%';$width='700';}
  
  		$input .= "<iframe src='data:{$vtype};base64,{$tfile}' type='{$vtype}' width='{$height}' height='{$width}' alt='{$vtype}'>PDF tidak bisa ditinjau</iframe>";
  
  
  		$input .= "			 </div>
  						 </div>
  					   </div>
  					</div>
  				</div>
  			</div>";
	  }
	  
		return $input;
	}
}
