<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "M_kepegawaian_unor.php";
class M_pegawai extends MX_Controller {
  var $prefix = 'kepeg';
  
  var $ar_m_jabatan = array();
  var $ar_m_golongan = array();
  var $ar_m_unor = array();
  var $ar_m_kedudukan_hukum = array();
  
  var $m_unor;
	public function __construct() {
		parent::__construct();
		$controller = "kepegawaian/m_pegawai";
		$table  = $this->prefix."_m_pegawai";
		
		$this->m_unor = new M_kepegawaian_unor;

   	$this->_setTitle('Pegawai');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'ifrom', 'Asal Instansi', true);
		$this->_addField($table, 'cnip', 'NIP', true);
		$this->_addField($table, 'vname', 'Nama Lengkap', true);
		$this->_addField($table, 'cgolid', 'Pangkat/Golongan', true);
		//$this->_addField($table, 'vgolnm', 'Nama Golongan', true);
		//$this->_addField($table, 'vpktnm', 'Nama Pangkat', true);
		$this->_addField($table, 'ijabid', 'Jabatan', true);
		//$this->_addField($table, 'vjabnm', 'Nama Jabatan', true);
		$this->_addField($table, 'ikduker', 'Unit Kerja', true);
		$this->_addField($table, 'ikduker3', 'Unit Kerja (Sharing)', false);
		//$this->_addField($table, 'vnmuker', 'Nama Unit Kerja', true);
		$this->_addField($table, 'cnobnt', 'No. BNT', false);
		$this->_addField($table, 'cnosnt', 'No. SNT', false);
		$this->_addField($table, 'cnopnt', 'No. PNT', false);
		$this->_addField($table, 'istatus', 'Kedudukan Hukum', true);
		$this->_addField($table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($table, 'cupdatedby', 'Diubah oleh', false, true);

		//$this->_add2ListField($table, 'ifrom, cnip, vname, vgolnm, vjabnm, vnmuker, tupdated, cupdatedby');
		$this->_add2ListField($table, 'ifrom, cnip, vname, cgolid, ijabid, ikduker, ikduker3, cnobnt,cnosnt,cnopnt, istatus,tupdated, cupdatedby');
		
		$this->_changeType($table, 'ifrom', 'combobox', 
		$this->session->sysparam->ifrom);
		
		$rows = $this->getall('', $this->prefix.'_m_jabatan', 'id, nama');
		foreach($rows as $r) {
			$this->ar_m_jabatan[$r->id] = $r->id.' - '.$r->nama;
		}
		
		$this->_changeType($table, 'ijabid', 'combobox2', 
		$this->ar_m_jabatan);
		
		$rows = $this->getall('', $this->prefix.'_m_golongan', 'id, concat(pangkat, \', \', nama) as pangkat');
		foreach($rows as $r) {
		$this->ar_m_golongan[$r->id] = $r->pangkat;
		}
		
		$this->_changeType($table, 'cgolid', 'combobox2', 
		$this->ar_m_golongan);
		
		$rows = $this->getall('', $this->prefix.'_m_unor', 'id, kode, nama', array('date_expired'=>NULL));//, array('kode'=>'8ae483a67355ebc601736a3c0cf35654'));
		foreach($rows as $r) {
		$this->ar_m_unor[$r->id] = $r->id.' - '.$r->nama;
		}

		$rows = $this->getall('', $this->prefix.'_m_kedudukan_hukum', 'id, keterangan');
		foreach($rows as $r) {
			$this->ar_m_kedudukan_hukum[$r->id] = $r->id.' - '.$r->keterangan;
		}
		
		$this->_changeType($table, 'istatus', 'combobox2', 
		$this->ar_m_kedudukan_hukum);
		
		//$this->_changeType($table, 'ikduker', 'combobox2', 
		//$this->ar_m_unor);

		$this->_add2SearchField($table, 'cnip');
		$this->_add2SearchField($table, 'vname');
		$this->_add2SearchField($table, 'istatus');
		
		/* if ($this->session->superuser) {
			if ($this->input->post('q_kepeg_m_pegawai_ikduker') != '' ) {
				//$orgs = array($this->input->post('q_kepeg_m_pegawai_ikduker'));
				$this->m_unor->getRekursifUnit2($this->input->post('q_kepeg_m_pegawai_ikduker'), $orgs);
				array_push($orgs, trim($this->input->post('q_kepeg_m_pegawai_ikduker')));
				$orgs = "'".implode("','", $orgs)."'";
				$this->_addQuery($table, "ikduker in (".$orgs.")", 'and', '', true);
			}
		} else {
		  $orgs2 = "'".implode("','", $this->session->orgs2)."'";
		  $this->_addQuery($table, "ikduker in (".$orgs2.")", 'and', '', true);
		} */

		//if ( !in_array($this->session->groupid, explode(",", $this->session->sysparam->all_group[0])) ) {
		//print_r($this->session->kodeunits);
		//exit;
		$orgs = array();
		if ( !$this->session->isadmin ) {
			//print_r($this->session->kodeunits);exit;
			/* foreach($this->session->orgs2 as $k=>$v) {
				$ar_unor_[] = $v; 
			}
			$ar_unor_ = "'".implode("','", $ar_unor_)."'"; */
			/* foreach($this->session->kodeunits as $k=>$v) {
				$ar_unor_[] = $v->id;
			} */
			if ( sizeOf($this->session->orgs2) > 0 ) {
				$orgs = "'".implode("','", $this->session->orgs2)."'";
				$this->_addQuery($table, "ikduker in (".$orgs.")", 'and', '', true);
			}

			//$ar_unor_ = "'".implode("','", $ar_unor_)."'";
			//echo $ar_unor_;
			//exit;
			//$this->_addQuery($table, $table.".ikduker in ({$ar_unor_})", "and", "", true);
		} else {
			$this->_add2SearchField($table, 'ikduker', true, false, false);
			//print_r($_POST);exit;
			if ($this->input->post('q_kepeg_m_pegawai_ikduker') != '' ) {
				//$orgs = array($this->input->post('q_kepeg_m_pegawai_ikduker'));
				$this->m_unor->getRekursifUnit2($this->input->post('q_kepeg_m_pegawai_ikduker'), $orgs);
				//print_r($orgs);
				//echo trim($this->input->post('q_kepeg_m_pegawai_ikduker'));
				//exit;
				array_push($orgs, trim($this->input->post('q_kepeg_m_pegawai_ikduker')));
				//print_r($orgs);exit;
				$orgs = "'".implode("','", $orgs)."'";
				$this->_addQuery($table, "ikduker in (".$orgs.")", 'and', '', true); 
			} else {	
				if ( sizeOf($this->session->orgs2) > 0 ) {
					$orgs = "'".implode("','", $this->session->orgs2)."'";
					$this->_addQuery($table, "ikduker in (".$orgs.")", 'and', '', true);
				}
			}	
		}
		
		$this->_setHTMLTemplate('', 'pegawai/list');
		$this->_addOrderBy($table, array('cgolid'=>'desc', 'cnip'=>'asc'));

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}
	
	function listBox_kepeg_m_pegawai_ikduker($value, $datas) {
	  /*$sql = "Select a.kode, a.kode_atasan, 
        	  a.nama, (select nama from kepeg_m_unor 
        	  where kode = a.kode_atasan) as nama_atasan 
        	  from kepeg_m_unor a where a.kode = '{$value}'";*/
    /*$kodeunitutamas = $this->session->kodeunitutamas;
    $kodeunitutamas_ = array();
    foreach($kodeunitutamas as $kode) {
      $kodeunitutamas_[] = $kode->kode;
    }*/
    /* $unor_not_in = [
					    '9CB6A40F8C883E8AE050640A2A0313C3',
					    '8ae483a66d00679b016d145f0d2705ec'
		]; */
	$unor_not_in = [1628,12886];
    //print_r($kodeunitutamas_);exit;
    $sql = "with recursive cte (id, nama, id_atasan) as (
		select     id,
				   nama,
				   id_atasan
		from  kepeg_m_unor      
		where      id ='{$value}'
		union all
		select     p.id,
				   p.nama,
				   p.id_atasan
		from       kepeg_m_unor p
		inner join cte
				on p.id_atasan = cte.id
	  )
	  select id, id_atasan, nama, (select nama from 
	  kepeg_m_unor where id=cte.id_atasan) as nama_atasan from cte 
	  where cte.id = '{$value}' order by id asc";
	  //echo $sql;exit;
	  $row = $this->db->query($sql)->row();
	  if (!in_array($row->id_atasan, $unor_not_in)) {
	    $nama = $row->nama.' - '.$row->nama_atasan;
	  } else {
	    //if ($row->kode == $row->kode_atasan) {
	      $nama = $row->nama;
	    //} else $nama = $row->nama.' - '.$row->nama_atasan;
	  }
	  return $nama;
	}

	function listBox_kepeg_m_pegawai_ikduker3($value, $datas) {
		/*$sql = "Select a.kode, a.kode_atasan, 
				a.nama, (select nama from kepeg_m_unor 
				where kode = a.kode_atasan) as nama_atasan 
				from kepeg_m_unor a where a.kode = '{$value}'";*/
	  /*$kodeunitutamas = $this->session->kodeunitutamas;
	  $kodeunitutamas_ = array();
	  foreach($kodeunitutamas as $kode) {
		$kodeunitutamas_[] = $kode->kode;
	  }*/
	  /* $unor_not_in = [
						  '9CB6A40F8C883E8AE050640A2A0313C3',
						  '8ae483a66d00679b016d145f0d2705ec'
		  ]; */
	  $unor_not_in = [1628,12886];
	  //print_r($kodeunitutamas_);exit;
	  $sql = "with recursive cte (id, nama, id_atasan) as (
		  select     id,
					 nama,
					 id_atasan
		  from  kepeg_m_unor      
		  where      id ='{$value}'
		  union all
		  select     p.id,
					 p.nama,
					 p.id_atasan
		  from       kepeg_m_unor p
		  inner join cte
				  on p.id_atasan = cte.id
		)
		select id, id_atasan, nama, (select nama from 
		kepeg_m_unor where id=cte.id_atasan) as nama_atasan from cte 
		where cte.id = '{$value}' order by id asc";
		//echo $sql;exit;
		$row = $this->db->query($sql)->row();
		if (!in_array($row->id_atasan, $unor_not_in)) {
		  $nama = $row->nama.' - '.$row->nama_atasan;
		} else {
		  //if ($row->kode == $row->kode_atasan) {
			$nama = $row->nama;
		  //} else $nama = $row->nama.' - '.$row->nama_atasan;
		}
		return $nama;
	  }

	function insertBox_kepeg_m_pegawai_ikduker($name) {
		$input = "<div class='modal fade' id='myModal_browse' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
							<div class='modal-dialog' role='document' style='width:80%;'>
							<div class='modal-content'>
								<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Browse Data Pegawai </h4>
								</div>
								<div class='modal-body' id='modal-body' style='overflow-x: auto;'>
								<div class='form-group'>
									<div id='html_telusuri'></div>
								</div>
								</div>
							</div>
							</div>
						</div>";

		$input .= "<div style='margin-top:0px;margin-left:0px;'>
					<button id='m_pegawai_btn_browse' type='button' class='btn btn-primary' onclick=\"_browse('".base_url()."kepegawaian/lookup_unor/index');$('#lookup_unor_form_search #q_kepeg_m_unor_opener').val('kepeg_m_pegawai_ikduker');\" data-toggle='modal' data-target='#myModal_browse' data-backdrop='static' data-keyboard='false'> ...</button>
					</div>";
		
		$input .= "<div style='margin-top:-32px;margin-left:40px;'>
				<input readonly value='' class='form-control {$name}' type='hidden' name='{$name}' id='{$name}' placeholder='Ketikkan Nama unit kerja'/>
				<input type='text' value='{$nama}' readonly class='form-control {$name}_txt' name='{$name}_txt' id='{$name}_txt'/>
				</div>";

		return $input;
	}

	function updateBox_kepeg_m_pegawai_ikduker($name, $value, $datas) {
		$unor_not_in = [1628,12886];
		//print_r($kodeunitutamas_);exit;
		$sql = "with recursive cte (id, nama, id_atasan) as (
			select     id,
					nama,
					id_atasan
			from  kepeg_m_unor      
			where      id ='{$value}'
			union all
			select     p.id,
					p.nama,
					p.id_atasan
			from       kepeg_m_unor p
			inner join cte
					on p.id_atasan = cte.id
		)
		select id, id_atasan, nama, (select nama from 
		kepeg_m_unor where id=cte.id_atasan) as nama_atasan from cte 
		where cte.id = '{$value}' order by id asc";
			//echo $sql;exit;
		$row = $this->db->query($sql)->row();
		if (!in_array($row->id_atasan, $unor_not_in)) {
			$nama = $row->nama.' - '.$row->nama_atasan;
		} else {
			//if ($row->kode == $row->kode_atasan) {
			$nama = $row->nama;
			//} else $nama = $row->nama.' - '.$row->nama_atasan;
		}
		
		$input = "<div class='modal fade' id='myModal_browse' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
							<div class='modal-dialog' role='document' style='width:80%;'>
							<div class='modal-content'>
								<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Browse Data Pegawai </h4>
								</div>
								<div class='modal-body' id='modal-body' style='overflow-x: auto;'>
								<div class='form-group'>
									<div id='html_telusuri'></div>
								</div>
								</div>
							</div>
							</div>
						</div>";

		$input .= "<div style='margin-top:0px;margin-left:0px;'>
					<button id='m_pegawai_btn_browse' type='button' class='btn btn-primary' onclick=\"_browse('".base_url()."kepegawaian/lookup_unor/index');$('#lookup_unor_form_search #q_kepeg_m_unor_opener').val('kepeg_m_pegawai_ikduker');\" data-toggle='modal' data-target='#myModal_browse' data-backdrop='static' data-keyboard='false'> ...</button>
					</div>";
		
		$input .= "<div style='margin-top:-32px;margin-left:40px;'>
				<input readonly value='{$value}' class='form-control {$name}' type='hidden' name='{$name}' id='{$name}' placeholder='Ketikkan Nama unit kerja'/>
				<input type='text' value='{$nama}' readonly class='form-control {$name}_txt' name='{$name}_txt' id='{$name}_txt'/>
				</div>";
					
		

		return $input;
	}
	
	function searchBox_kepeg_m_pegawai_ikduker($name) {
		$input = "<input readonly value='' class='form-control {$name}' type='hidden' name='{$name}' id='{$name}' placeholder='Ketikkan Nama unit kerja'/>
					<input class='form-control {$name}_txt' type='text' name='{$name}_txt' id='{$name}_txt'
					placeholder='Ketikkan nama unit kerja dan pilih data yang sesuai dengan kriteria anda.'/>";

		return $input;
	}

	function insertBox_kepeg_m_pegawai_ikduker3($name) {
		$input = "<div class='modal fade' id='myModal_browse' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
							<div class='modal-dialog' role='document' style='width:80%;'>
							<div class='modal-content'>
								<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Browse Data Pegawai </h4>
								</div>
								<div class='modal-body' id='modal-body' style='overflow-x: auto;'>
								<div class='form-group'>
									<div id='html_telusuri'></div>
								</div>
								</div>
							</div>
							</div>
						</div>";

		$input .= "<div style='margin-top:0px;margin-left:0px;'>
					<button id='m_pegawai_btn_browse' type='button' class='btn btn-primary' onclick=\"_browse('".base_url()."kepegawaian/lookup_unor/index');$('#lookup_unor_form_search #q_kepeg_m_unor_opener').val('kepeg_m_pegawai_ikduker3');\" data-toggle='modal' data-target='#myModal_browse' data-backdrop='static' data-keyboard='false'> ...</button>
					</div>";
		
		$input .= "<div style='margin-top:-32px;margin-left:40px;'>
				<input readonly value='' class='form-control {$name}' type='hidden' name='{$name}' id='{$name}' placeholder='Ketikkan Nama unit kerja'/>
				<input type='text' value='{$nama}' readonly class='form-control {$name}_txt' name='{$name}_txt' id='{$name}_txt'/>
				</div>";

		$input .= "<div style='margin-top:0px;margin-left:0px;'>
				<input type='checkbox' id='m_pegawai_chkbox'/>
				</div>";

		return $input;
	}

	function updateBox_kepeg_m_pegawai_ikduker3($name, $value, $datas) {
		$unor_not_in = [1628,12886];
		//print_r($kodeunitutamas_);exit;
		$sql = "with recursive cte (id, nama, id_atasan) as (
			select     id,
					nama,
					id_atasan
			from  kepeg_m_unor      
			where      id ='{$value}'
			union all
			select     p.id,
					p.nama,
					p.id_atasan
			from       kepeg_m_unor p
			inner join cte
					on p.id_atasan = cte.id
		)
		select id, id_atasan, nama, (select nama from 
		kepeg_m_unor where id=cte.id_atasan) as nama_atasan from cte 
		where cte.id = '{$value}' order by id asc";
			//echo $sql;exit;
		$row = $this->db->query($sql)->row();
		if (!in_array($row->id_atasan, $unor_not_in)) {
			$nama = $row->nama.' - '.$row->nama_atasan;
		} else {
			//if ($row->kode == $row->kode_atasan) {
			$nama = $row->nama;
			//} else $nama = $row->nama.' - '.$row->nama_atasan;
		}
		
		$input = "<div class='modal fade' id='myModal_browse' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
							<div class='modal-dialog' role='document' style='width:80%;'>
							<div class='modal-content'>
								<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Browse Data Pegawai </h4>
								</div>
								<div class='modal-body' id='modal-body' style='overflow-x: auto;'>
								<div class='form-group'>
									<div id='html_telusuri'></div>
								</div>
								</div>
							</div>
							</div>
						</div>";

		$input .= "<div style='margin-top:0px;margin-left:15px;'>
					<button id='m_pegawai_btn_browse' type='button' class='btn btn-primary' onclick=\"_browse('".base_url()."kepegawaian/lookup_unor/index');$('#lookup_unor_form_search #q_kepeg_m_unor_opener').val('kepeg_m_pegawai_ikduker3');\" data-toggle='modal' data-target='#myModal_browse' data-backdrop='static' data-keyboard='false'> ...</button>
					</div>";
		
		$input .= "<div style='margin-top:-32px;margin-left:55px;'>
				<input readonly value='{$value}' class='form-control {$name}' type='hidden' name='{$name}' id='{$name}' placeholder='Ketikkan Nama unit kerja'/>
				<input type='text' value='{$nama}' readonly class='form-control {$name}_txt' name='{$name}_txt' id='{$name}_txt'/>
				</div>";
					
		$input .= "<div style='margin-top:-32px;margin-left:0px;'>
			<input type='checkbox' id='m_pegawai_chkbox' onchange=\"klik_change()\"/>
			</div>";

		return $input;
	}
	
	function listBox_kepeg_m_pegawai_tupdated($value, $datas) {
	  if ( $value != null ) {
	    return date('d-m-Y H:i:s', strtotime($value));
	  } else return date('d-m-Y H:i:s', strtotime($datas->kepeg_m_pegawai_tcreated));
	}
	
	function listBox_kepeg_m_pegawai_cupdatedby($value, $datas) {
	  if ( $value != null ) {
	    $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($value)))->realname;
	   } else {
	     $nama = $this->getrow($this->db, 'priv_t_user', 'realname', array('username'=>trim($datas->kepeg_m_pegawai_ccreatedby)))->realname;
	   }
	  
	  return $nama;
	}

	public function after_insert_processor($id, $post) {
		$new_post = array();
		$new_post['tcreated']   = date('Y-m-d H:i:s');
		$new_post['ccreatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_m_pegawai', $new_post);
	}

	public function after_update_processor($id, $post, $oldpost) {
		$new_post = array();
		$new_post['tupdated']   = date('Y-m-d H:i:s');
		$new_post['cupdatedby'] = $this->session->userdata['username'];

		$this->db->where('id', $id);
		$this->db->update($this->prefix.'_m_pegawai', $new_post);
	}
	
	function insertCheck_kepeg_m_pegawai_cnip($value, $post) {
	  $data['status'] = true;

	  if ( $this->getrow('', 'kepeg_m_pegawai', 'count(*) as total', 
	  array('cnip'=>trim($value)))->total > 0 )
	 {
	     $data['status']  = false;
    	 $data['msg'] = 'NIP sudah terdaftar. Periksa kembali isian anda';
    	 $data['obj'] = 'kepeg_m_pegawai_cnip';
	 } 
	   return $data;
  }
	
	function getemployee() {
		//print_r($_POST);exit;
		$data = array();
		$row_array = array();

		$kriteria = $this->input->post('query');
		$filter   = $this->input->post('filter');
		$ijabid2  = $this->input->post('ijabid2');

		
		//echo 'filter : '.$filter;
		
		$add_filter = "";
		/*if ( $filter != '' ) $add_filter = " and b.kode_satker = '{$filter}' ";*/
		if ( $filter != '' ) {
		  if ($this->session->superuser) {
			$orgs = [];
		    $kode_units = $this->getall($this->db, 'kepeg_m_unor', 'id', array('kode_satker'=>$filter));
			foreach($kode_units as $k) {
				$orgs = $this->m_unor->getRekursifUnit2($k->id, $orgs);
				array_push($orgs, $k->id);
				//echo '1';
				//print_r($kode_unit);
				//echo '2';
				//print_r($orgs);
				//exit;
			}
			$filter = "'".implode("','", $orgs)."'";
		  } else {
		    $filter = "'".implode("','", $this->session->orgs2)."'";
		  }
		  $add_filter = " and ( a.ikduker in ({$filter}) OR a.ikduker3 in ({$filter}) )";
		}

		/*$sql = "SELECT a.id, a.ifrom as ifrom, a.cnip as nip, a.vname as nama,
		    a.cgolid as golid, (select concat(pangkat, ', ',nama) from kepeg_m_golongan where id = a.cgolid) as nama_pangkat, 
		    a.ijabid as jabid, (select nama from kepeg_m_jabatan where kode = a.ijabid) as nama_jabatan, 
		    c.kode as kduker, c.nama as nama_unor, a.cnobnt, a.cnosnt, a.cnopnt
		    from kepeg_m_pegawai a, kepeg_m_unor b, app_m_unor c 
			where a.ikduker = b.kode and 
			b.kode_satker = c.kode and (a.vname like '%".$kriteria."%'
			OR a.cnip like '%".$kriteria."%') {$add_filter} 
			ORDER BY a.vname ASC";// and b.\"EXPIRED_DATE\" IS NULL*/

		if ( $this->input->post('iscekboleh') !== null ) {
			//cek apakah boleh ?
			$add_boleh = "";
			if ( $this->getrow('', 'app_m_unor', 'isboleh', ['kode'=>$this->input->post('filter')])->isboleh != 1 && $ijabid2 != 1 ) { //!=KPA
				$add_boleh = " and a.cnobnt IS NOT NULL and a.cnobnt != '' ";
			}
			$sql = "SELECT a.id, a.ifrom as ifrom, a.cnip as nip, a.vname as nama,
				a.cgolid as golid, (select concat(pangkat, ', ',nama) from kepeg_m_golongan where id = a.cgolid) as nama_pangkat, 
				a.ijabid as jabid, (select nama from kepeg_m_jabatan where id = a.ijabid) as nama_jabatan, 
				b.kode_satker as kduker, 
				(select nama from app_m_unor where kode = b.kode_satker) as nama_unor, a.cnobnt, a.cnosnt, a.cnopnt
				from kepeg_m_pegawai a, kepeg_m_unor b
				where a.ikduker = b.id and (a.vname like '%".$kriteria."%'
				OR a.cnip like '%".$kriteria."%') {$add_filter} {$add_boleh} 
				ORDER BY a.vname ASC";// and b.\"EXPIRED_DATE\" IS NULL
		} else {
			$sql = "SELECT a.id, a.ifrom as ifrom, a.cnip as nip, a.vname as nama,
				a.cgolid as golid, (select concat(pangkat, ', ',nama) from kepeg_m_golongan where id = a.cgolid) as nama_pangkat, 
				a.ijabid as jabid, (select nama from kepeg_m_jabatan where id = a.ijabid) as nama_jabatan, 
				b.kode_satker as kduker, 
				(select nama from app_m_unor where kode = b.kode_satker) as nama_unor, a.cnobnt, a.cnosnt, a.cnopnt
				from kepeg_m_pegawai a, kepeg_m_unor b
				where a.ikduker = b.id and (a.vname like '%".$kriteria."%'
				OR a.cnip like '%".$kriteria."%') {$add_filter}    
				ORDER BY a.vname ASC";// and b.\"EXPIRED_DATE\" IS NULL
		}
		
		//echo $sql;exit;
		$query = $this->db->query($sql);
		if ( $query ) {
		  //print_r($query->result_array());
				foreach($query->result_array() as $line) {

					$row_array['name']  = trim($line['nip'])." - ".ucwords(trim(strtolower($line['nama'])))." - ".trim($line['nama_pangkat'])." - ".ucwords(trim(strtolower($line['nama_jabatan'])));
					$row_array['value'] = ucwords(trim(strtolower($line['nama'])));
					$row_array['nip']   = trim($line['nip']);
					$row_array['jabid']   = trim($line['jabid']);
					$row_array['jabnm']   = trim($line['nama_jabatan']);
					$row_array['golid']   = trim($line['golid']);
					$row_array['pktnm']   = trim($line['nama_pangkat']);
					$row_array['kduker']   = trim($line['kduker']);
					$row_array['nmuker']   = trim($line['nama_unor']);
					$row_array['ifrom']   = trim($line['ifrom']);
					$row_array['cnobnt']   = trim($line['cnobnt']);
					$row_array['cnosnt']   = trim($line['cnosnt']);
					$row_array['cnopnt']   = trim($line['cnopnt']);
					
					array_push($data, $row_array);
			}
		}
		echo json_encode($data);
	}
	
	function manipulate_search_button($buttons) {
		//unset($buttons);
		//button pencarian
		$buttons['search'] = "<button type='button' id='m_pegawai_btn_search' class='btn btn-primary btn-sm btn-flat' onclick='reload_grid(\"".base_url()."kepegawaian/m_pegawai/lists\", \"m_pegawai\");$(\"#m_pegawai-panel-default-form\").hide();'>
											<i class='glyphicon glyphicon-search'></i>&nbsp;&nbsp;Cari
									</button>";

		$buttons['reset']  = "<button type='button' class='btn btn-primary btn-sm btn-flat' 
									onclick='$(\"#".strtolower($this->router->class)."_form_search\").trigger(\"reset\");
									$(\"#".strtolower($this->router->class)."_form_search input[type=hidden]\").val(\"\");
									$(\"#".strtolower($this->router->class)."_form_search select\").val(\"\");
									$(\"#".strtolower($this->router->class)."_form_search select\").select2().select2(\"val\", null);
									reload_grid(\"".base_url()."kepegawaian/".strtolower($this->router->class)."/lists\", \"".strtolower($this->router->class)."\");$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();'>
										<i class='glyphicon glyphicon-refresh'></i>&nbsp;&nbsp;Bersihkan Pencarian
									</button>";
				        	
		return $buttons;
		
	}

	function manipulate_list_button($buttons) {

		if (!$this->session->superuser) {
			$buttons['pindah_unit_kerja'] = "<button type='button' class='btn_tarik_pegawai btn btn-warning' 
			onclick='edit(\"".base_url()."kepegawaian/m_tarik_pegawai/edit/0\", \"m_pegawai\");'>
				<i class='fas fa-users'></i> Tarik Data Pegawai
			</button>";
		}

		$start = 0;
		$end = 200000;
		$penambah = 1000;
		$chkbox = "<select id='start' 
			name='start' 
			class='form-control start' style='width:120px;'>";
		while($start<=$end) {
			$chkbox .= "<option value='{$start}'>{$start}</option>";
			$start +=$penambah;
		}
		$chkbox .= "</select>";
		$buttons['impor'] = $chkbox."<button type='button' class='btn_save_sinkronisasi btn btn-primary' 
					onclick='save_sinkronisasi(\"".base_url()."kepegawaian/m_pegawai\", \"m_pegawai\", \"Sinkronisasi Master Pegawai. Anda yakin ?\", false, \"\", false, true, false, false, \"Sinkronisasi berhasil\");'>
							<i class='fas fa-users'></i> Sinkronisasi ke SIMPEG-DIKBUHR
						</button>";

		return $buttons;
	}
	
	function save_sinkronisasi() {
	   //ini_set('display_errors', 1);
	   //error_reporting(E_ALL);
	  //print_r($_POST);exit;
	      if ($this->session->superuser)
	        $iduker = trim($this->input->post('q_kepeg_m_pegawai_ikduker'));
	      else $iduker = $this->session->kodeunit;

		  $kodeuker = $this->getrow($this->db, 'kepeg_m_unor', 'kode', ['id'=>$iduker])->kode;
	      
	      $start = trim($this->input->post('start'));
	      //echo $kodeuker;
        $this->load->library('rest');
        $config = array(
            'server' => trim($this->config->item('dikbudhr_url')),
            'http_user' => trim($this->config->item('dikbudhr_user')),
            'http_pass' => trim($this->config->item('dikbudhr_pass')),
            'http_auth' => "basic", // or 'digest'
            'api_key'	=> "HCDP-api",
            'api_name'	=> "x-api-key"
        );
        $this->rest->initialize($config);
		//print_r($this->rest);
		//echo $kodeuker;
		//echo $start;
		//echo $limit;
		//exit;
        
        //$orgs = array($kodeuker);
        //$m_unor = new M_unor;
        //$m_unor->getRekursifUnit2($kodeuker, $orgs);
        //print_r($orgs);
        //$success = 0;
        //foreach($orgs as $or) {
          //echo $or.',';
            //$result = $this->rest->get('api/pegawai/list', array('unor_id'=>$or, 'limit'=>1000));
            $result = $this->rest->get('api/pegawai/list', 
						array('unor_id'=>$kodeuker, 
						'start'=>$start, 
						'limit'=>1000));
			//print_r($this->rest);
			//echo 'test';exit;
            //print_r($result);exit;
            
            /*
                "NIP_BARU": "196803031989031006" cnip
                "NAMA": "ERDIYANSYAH ALIM", vname
                "GELAR_DEPAN": null, cgelardepan
                "GELAR_BELAKANG": null,cgelarbelakang
                "GOL_ID": "32", cgolid
                "UNOR_ID": "19B76FA3DA379CEEE050640A1502269F", ikduker
                "JABATAN_INSTANSI_ID": "360", ijabid
                "JENIS_KELAMIN": "M",csex
                "TEMPAT_LAHIR_ID": "A5EB03E220AFF6A0E040640A040252AD", ctmplahir
                "TGL_LAHIR": "1968-03-03",dtgllahir
				"KEDUDUKAN_HUKUM_ID"
            */
            $table = $this->prefix.'_m_pegawai';
            if ($result->success) {
                foreach($result->data as $data) {
					/*if ( trim($data->NIP_BARU) == '196806222002121001' ) {
						//print_r($result->data);
						//exit;
						echo $data->NIP_BARU.', '.$data->NAMA;
						echo 'Unor ID : '.$data->UNOR_ID;
						echo 'Jabatan ID : '.$data->JABATAN_INSTANSI_ID;
						exit;
					}*/
                    if ( $this->getrow('', $table, 'count(*) as total', array('cnip'=>$data->NIP_BARU))->total == 0 ) {
                        try {
                          //insert
                          $new_data = [
                              'cnip'=>$data->NIP_BARU,
                              'vname'=>$data->NAMA,
                              'cgelardepan'=>$data->GELAR_DEPAN,
                              'cgelarbelakang'=>$data->GELAR_BELAKANG,
                              'cgolid'=>$data->GOL_ID,
                              'ckduker'=>$data->UNOR_ID,
							  'ikduker'=>$this->getrow('', 'kepeg_m_unor', 'id', ['kode'=>$data->UNOR_ID])->id,
                              'cjabid'=>$data->JABATAN_INSTANSI_ID,
							  'ijabid'=>$this->getrow('', 'kepeg_m_jabatan', 'id', ['kode'=>$data->JABATAN_INSTANSI_ID])->id,
                              'csex'=>$data->JENIS_KELAMIN,
                              'ctmplahir'=>$data->TEMPAT_LAHIR_ID,
                              'dtgllahir'=>$data->TGL_LAHIR,
                              'tcreated'=>date('Y-m-d H:i:s'),
							  'istatus'=>$this->getrow('','kepeg_m_kedudukan_hukum', 'id', ['kode'=>trim($data->KEDUDUKAN_HUKUM_ID)])->id,
                              'ccreatedby'=>'web-service'
                          ];
      
                          $this->db->insert($table, $new_data);
                          $success++;
                        } catch (Exception $e) {
                          $success=0;
                          die($e);
                        }
                    } else {
                      try {
                        //update
                        $new_data = [
                            'vname'=>$data->NAMA,
                            'cgelardepan'=>$data->GELAR_DEPAN,
                            'cgelarbelakang'=>$data->GELAR_BELAKANG,
                            'cgolid'=>$data->GOL_ID,
                            'ckduker'=>$data->UNOR_ID,
							'ikduker'=>$this->getrow('', 'kepeg_m_unor', 'id', ['kode'=>$data->UNOR_ID])->id,
                            'cjabid'=>$data->JABATAN_INSTANSI_ID,
							'ijabid'=>$this->getrow('', 'kepeg_m_jabatan', 'id', ['kode'=>$data->JABATAN_INSTANSI_ID])->id,
                            'csex'=>$data->JENIS_KELAMIN,
                            'ctmplahir'=>$data->TEMPAT_LAHIR_ID,
                            'dtgllahir'=>$data->TGL_LAHIR,
							'istatus'=>$this->getrow('','kepeg_m_kedudukan_hukum', 'id', ['kode'=>trim($data->KEDUDUKAN_HUKUM_ID)])->id,
                            'tupdated'=>date('Y-m-d H:i:s'),
                            'cupdatedby'=>'web-service'
                        ];
    
                        $where = ['cnip'=>$data->NIP_BARU];
    
                        $this->db->where($where);
                        $this->db->update($table, $new_data);
						/*if (trim($data->NIP_BARU) == '196806222002121001') {
							echo 'query : '.$this->db->last_query();
							exit;
						}*/
						
                        $success++;
                      } catch (Exception $e) {
                        $success=0;
                        die($e);
                      }
                    }
                }
              }
          //}
        echo json_encode(['status'=>$result->success, 'msg'=>$result->error]);
        /*if ($success > 0 ) {
          $success = true;
          $success_msg = 'Sinkronisasi berhasil';
        } else {
          $success = false;
          $success_msg = 'Sinkronisasi gagal';
        }
        
        echo json_encode(['status'=>$success, 'msg'=>$success_msg]);
        */
    }
	
	function sinkron_detail_pegawai() {
	   //ini_set('display_errors', 1);
	   //error_reporting(E_ALL);
	    //print_r($_POST);
		$success = 0;
		$id = $this->input->post('kepeg_m_pegawai_id');
	    $nip_baru = trim($this->input->post('kepeg_m_pegawai_cnip'));
        $this->load->library('rest');
        $config = array(
            'server' => trim($this->config->item('dikbudhr_url')),
            'http_user' => trim($this->config->item('dikbudhr_user')),
            'http_pass' => trim($this->config->item('dikbudhr_pass')),
            'http_auth' => "basic", // or 'digest'
            'api_key'	=> "HCDP-api",
            'api_name'	=> "x-api-key"
        );
        $this->rest->initialize($config);
		//print_r($this->rest);
		//echo $kodeuker;
		//echo $start;
		//echo $limit;
		//exit;
        
        //$orgs = array($kodeuker);
        //$m_unor = new M_unor;
        //$m_unor->getRekursifUnit2($kodeuker, $orgs);
        //print_r($orgs);
        //$success =;
        //foreach($orgs as $or) {
          //echo $or.',';
            //$result = $this->rest->get('api/pegawai/list', array('unor_id'=>$or, 'limit'=>1000));
            $result = $this->rest->get('api/pegawai/detail', 
						array('pegawai_nip'=>$nip_baru));
			//print_r($this->rest);
			//echo 'test';exit;
            //print_r($result);
			//print_r($result->data);
			//exit;
            
            /*
                "NIP_BARU": "196803031989031006" cnip
                "NAMA": "ERDIYANSYAH ALIM", vname
                "GELAR_DEPAN": null, cgelardepan
                "GELAR_BELAKANG": null,cgelarbelakang
                "GOL_ID": "32", cgolid
                "UNOR_ID": "19B76FA3DA379CEEE050640A1502269F", ikduker
                "JABATAN_ID": "360", cjabid
                "JENIS_KELAMIN": "M",csex
                "TEMPAT_LAHIR_ID": "A5EB03E220AFF6A0E040640A040252AD", ctmplahir
                "TGL_LAHIR": "1968-03-03",dtgllahir
            */
            $table = $this->prefix.'_m_pegawai';
            if ($result->success) {
               // foreach($result->data as $data) {
				  $data = $result->data;
				  //print_r($data);exit;
				  try {
					//update
					
				//echo $data->NIP_BARU.' '.$data->NAMA.' '.$data->UNOR_ID;
				
					$new_data = [
						'vname'=>$data->NAMA,
						'cgelardepan'=>$data->GELAR_DEPAN,
						'cgelarbelakang'=>$data->GELAR_BELAKANG,
						'cgolid'=>$data->GOL_ID,
						'ckduker'=>$data->UNOR_ID,
						'ikduker'=>$this->getrow('', 'kepeg_m_unor', 'id', ['kode'=>$data->UNOR_ID])->id,
						'cjabid'=>$data->JABATAN_INSTANSI_ID,
						'ijabid'=>$this->getrow('', 'kepeg_m_jabatan', 'id', ['kode'=>trim($data->JABATAN_INSTANSI_ID)])->id,
						'csex'=>$data->JENIS_KELAMIN,
						'ctmplahir'=>$data->TEMPAT_LAHIR_ID,
						'dtgllahir'=>$data->TGL_LAHIR,
						'tupdated'=>date('Y-m-d H:i:s'),
						'istatus'=>$this->getrow('','kepeg_m_kedudukan_hukum', 'id', ['kode'=>trim($data->KEDUDUKAN_HUKUM_ID)])->id,
						'cupdatedby'=>'web-service'
					];

					$where = ['cnip'=>$data->NIP_BARU];

					$this->db->where($where);
					$this->db->update($table, $new_data);
					//if (trim($data->NIP_BARU) == '198210032015041001') {
					//	echo 'query : '.$this->db->last_query();
					//	exit;
					//}
					
					$success++;
				  } catch (Exception $e) {
					$success=0;
					die($e);
				  }
               // }
              }
          //}
        echo json_encode(['status'=>$result->success, 'id'=>$id, 'msg'=>$result->error]);
        /*if ($success > 0 ) {
          $success = true;
          $success_msg = 'Sinkronisasi berhasil';
        } else {
          $success = false;
          $success_msg = 'Sinkronisasi gagal';
        }
        
        echo json_encode(['status'=>$success, 'msg'=>$success_msg]);
        */
    }
    
    function kepeg_m_pegawai_output() {
      $js = "<script type='text/javascript'>

				var iduker3 = '';
				var iduker3_txt = '';
      
                $(document).ready(function() {
                  			$('#q_kepeg_m_pegawai_ikduker_txt').keyup(function() {
								  	//console.log($(this).val().length);
              						if ( $(this).val().length == 0 )  {
              						  	$('#q_kepeg_m_pegawai_ikduker').val('');
              						  	$('#start').val(0);
              						}
              					});
              
              					$('#q_kepeg_m_pegawai_ikduker_txt').typeahead({
              						source: function (query, result) {
              							$.ajax({
              								url: '".base_url()."kepegawaian/m_kepegawaian_unor/getunor',
              								data: 'query='+query,
              								dataType: 'json',
              								type: 'POST',
              								success: function (data) {
              										result($.map(data, function (item) {
              										return item;
              									}));
              								}
              							});
              						},
              						items: 50,
              						updater: function (item) {
										$('#q_kepeg_m_pegawai_ikduker').val(item.id);
              							reload_grid(\"".base_url().$this->router->fetch_module()."/".$this->router->class."/lists\", \"".strtolower($this->router->class)."\");
              							$(\"#".strtolower($this->router->class)."-panel-default-form\").hide();
              							return item.name;
              						},
              					});

								/*$('#kepeg_m_pegawai_ikduker_txt').typeahead({
									source: function (query, result) {
										$.ajax({
											url: '".base_url()."kepegawaian/m_kepegawaian_unor/getunor',
											data: 'query='+query,
											dataType: 'json',
											type: 'POST',
											success: function (data) {
													result($.map(data, function (item) {
													return item;
												}));
											}
										});
									},
									items: 50,
									updater: function (item) {
									  	$('#kepeg_m_pegawai_ikduker').val(item.id);
										return item.name;
									},
								});
								*/
                });
      
                function save_sinkronisasi(url, table_id, default_txt_confirm='Sinkronisasi Data Pegawai dari SIMPEG-DIKBUDHR. Anda yakin?', _ismodal=false, _modals='form-modal', _islochref=false, _isneedrefresh=true, _isneededit=false, _isOldFashion=false, _msg='Berhasil.', table_id2='') {
                    //alert('save_sinkronisasi');
                    var kduker = $('#q_kepeg_m_pegawai_ikduker').val();
                    var start = $('#start').val();
                    //alert(kduker);
                    //alert(start);
                    //return false;
                    if ( kduker == '' ) {
                      bootbox_alert('', '', 'Silahkan pilih Unit Kerja', false, false);
                      return false;
                    }
                    
                    if ( default_txt_confirm == '' ) default_txt_confirm='Sinkronisasi Data Pegawai dari SIMPEG-DIKBUDHR. Anda yakin?';
                    //var form_name = table_id+'_form-edit';
					var form_name = table_id+'_list';
                    var formData = new FormData(jQuery('#'+form_name)[0]);
                    formData.append('q_kepeg_m_pegawai_ikduker', kduker);
                    formData.append('start', start);
                    save_confirm(url+'/save_sinkronisasi', formData, default_txt_confirm, table_id, _ismodal, function(output) {
                        //alert(output);
                        var o = jQuery.parseJSON(output);
                        //alert(o.status);
                        //alert(o.id);
                        $('div').removeClass('has-error');
                        if ( o.status == true ) {
							              bootbox_alert('', '', _msg, true);
                            reload_grid('".base_url()."kepegawaian/m_pegawai/lists', 'm_pegawai');
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
                
                function save(url, table_id, default_txt_confirm='Simpan Data Pegawai. Anda yakin?', _ismodal=false, _modals='form-modal', _islochref=false, _isneedrefresh=true, _isneededit=false, _isOldFashion=false, _msg='Berhasil.') {
                    //alert('save');
                    if ( default_txt_confirm == '' ) default_txt_confirm='Simpan Data Pegawai. Anda yakin?';
                    var form_name = table_id+'_form-edit';
                    var formData = new FormData(jQuery('#'+form_name)[0]);
      
                    save_confirm(url+'/save', formData, default_txt_confirm, table_id, _ismodal, function(output) {
                        //alert(output);
                        var o = jQuery.parseJSON(output);
                        //alert(o.status);
                        //alert(o.id);
                        $('div').removeClass('has-error');
                        if ( o.status == true ) {
							bootbox_alert('', '', _msg, true);
                            reload_grid('".base_url()."kepegawaian/m_pegawai/lists', 'm_pegawai');
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
				
				function sinkron_detail_pegawai(url, table_id, default_txt_confirm='Simpan Data Pegawai. Anda yakin?', _ismodal=false, _modals='form-modal', _islochref=false, _isneedrefresh=true, _isneededit=false, _isOldFashion=false, _msg='Berhasil.') {
                    //alert('save');
                    if ( default_txt_confirm == '' ) default_txt_confirm='Simpan Data Pegawai. Anda yakin?';
                    var form_name = table_id+'_form-edit';
                    var formData = new FormData(jQuery('#'+form_name)[0]);
      
                    save_confirm(url+'/sinkron_detail_pegawai', formData, default_txt_confirm, table_id, _ismodal, function(output) {
                        //alert(output);
                        var o = jQuery.parseJSON(output);
                        //alert(o.status);
                        //alert(o.id);
                        $('div').removeClass('has-error');
                        if ( o.status == true ) {
							bootbox_alert('', '', _msg, true);
							edit('".base_url()."kepegawaian/m_pegawai/edit/'+o.id, 'm_pegawai');
                            reload_grid('".base_url()."kepegawaian/m_pegawai/lists', 'm_pegawai');
                        } else {
                            if ( o.msg != undefined) bootbox_alert('', '', o.msg, true);
                            $('.'+o.obj).focus();
                            $('div .div_'+o.obj).addClass('has-error');
                            $('div .'+o.obj).addClass('has-error');
                            if ( _ismodal ) $('#'+_modals).css('overflow', 'scroll');
                            return false;
                        }
                    });
                    $('body').css('padding-right', 0);
                }

				function klik_change() {
					$('#kepeg_m_pegawai_ikduker3').val('');
					$('#kepeg_m_pegawai_ikduker3_txt').val('');
				}
                
              </script>";
      
      return $js;
    }
    
	function manipulate_update_button($buttons, $datas) {
		$buttons['xsinkron'] = "<button type='button' class='btn btn-success btn_save2' id='btn_save2' name='btn_save2' 
        onclick='sinkron_detail_pegawai(\"".base_url()."kepegawaian/m_pegawai\", \"m_pegawai\", \"Sinkronisasi Detail Pegawai {$datas->kepeg_m_pegawai_vname} - {$datas->kepeg_m_pegawai_cnip}. Anda yakin ?\", false, \"\", false, true, false, false, \"Sinkronisasi berhasil\");'>
											       		<i class='fa fa-save' aria-hidden='true'> </i> Sinkronisasi Pegawai dari SIMPEG-DIKBUDHR</button>";
		
		//asort($buttons);
		//array_unshift($buttons, $btn_sinkron);
		//print_r($buttons); 
		return $buttons;
	}
    /*function manipulate_view_button($buttons, $datas) {
      $btn_simpan = "<button type='button' class='btn btn-primary btn_save' 
        onclick='save(\"".base_url()."kepegawaian/m_pegawai\", \"m_pegawai\", \"Simpan Master Pegawai. Anda yakin ?\", false, \"\", false, true, false, false, \"Simpan berhasil\");'>
											       		<i class='fa fa-save' aria-hidden='true'> </i>
													   Simpan {$this->title}</button>";
			
			array_unshift($buttons, $btn_simpan);										   
      return $buttons;
    }*/
    
    /*function viewBox_kepeg_m_pegawai_cnobnt($name, $value) {
      $input = "<input type='text' name='{$name}' 
      id='{$name}' class='form-control {$name}' 
      value='{$value}' />";
      
      return $input;
    }
    
    function viewBox_kepeg_m_pegawai_cnosnt($name, $value) {
      $input = "<input type='text' name='{$name}' 
      id='{$name}' class='form-control {$name}' 
      value='{$value}' />";
      
      return $input;
    }
    
    function viewBox_kepeg_m_pegawai_cnopnt($name, $value) {
      $input = "<input type='text' name='{$name}' 
      id='{$name}' class='form-control {$name}' 
      value='{$value}' />";
      
      return $input;
    }
    
    function viewBox_kepeg_m_pegawai_id($name, $value, $datas) {
      $input = "<input type='text' name='{$name}' 
      id='{$name}' class='form-control {$name}' 
      value='{$datas->kepeg_m_pegawai_id}' />";
      
      return $input;
    }*/
    
    /*function save() {
      print_r($_POST);
      exit;
      $id = $this->input->post('kepeg_m_pegawai_id');
      $cnobnt = $this->input->post('kepeg_m_pegawai_cnobnt');
      $cnosnt = $this->input->post('kepeg_m_pegawai_cnosnt');
      $cnopnt = $this->input->post('kepeg_m_pegawai_cnopnt');
      
      try {
          $where = ['id'=>$id];
          $datas = [
            'cnobnt' => $cnobnt,  
            'cnosnt' => $cnosnt,  
            'cnopnt' => $cnopnt,
            'cupdatedby' => trim($this->session->username),
            'tupdated' => date('Y-m-d H:i:s')
          ];
          $this->db->where($where);
          $this->db->update($this->prefix.'_m_pegawai', $datas);
          
          $data['status'] = true;
          $data['msg'] = 'Simpan berhasil';
      } catch (Exception $e) {
        $data['status'] = false;
        $data['msg'] = $e->getMessage();
      }
      
      echo json_encode($data); 
      
    }*/
    
    /*function listBox_action($buttons, $datas) {
      if (!$this->session->superuser) unset($buttons['ubah']);
      
      return $buttons;
    }*/
	
	
}
