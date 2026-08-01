<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History_pejabat_perbend extends MX_Controller {
  var $prefix = 'app';
  var $table;
  
  var $limit = 5;
  var $kriteria = [];
	public function __construct() {
		parent::__construct();
		$controller = "perbend/history_pejabat_perbend";
		$this->table  = $this->prefix."_t_usulan_pegawai";

    	$this->_setTitle('Pejabat Perbendaharaan (Saat ini)');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);
		
		$this->_setHTMLTemplate('', 'laporan/list');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
		$header_controller = array('header_controller' => 'perbend/t_usulan_satker');
		$this->session->set_userdata($header_controller);
	}
	
	function index($satker_code = '') {
		if (!empty($satker_code)) {
			$this->session->set_userdata('history_satker_code', $satker_code);
		} else {
			$this->session->set_userdata('history_satker_code', $this->session->username);
		}
		parent::index();
	}
	
	function lists($page_ke=0) {
  		$html = '';
  		
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
  		$style='';
  		
		$html .= "<table class='table table-bordered' width='100%'>";
		$html .= "<tr class='active'>";
		$html .= "<th width='2%'>No.</th>";
		$html .= "<th width='10%'>NIP</th>";
		$html .= "<th width='35%'>Nama Pegawai</th>";
		$html .= "<th width='35%'>Jabatan</th>";
		$html .= "</tr>";

		$satker = $this->session->userdata('history_satker_code');
		if (empty($satker)) {
			$satker = $this->session->username;
		}

		$satkers = array(trim($satker));
		$user_row = $this->getrow('', 'priv_t_user', 'kode_lama', ['username' => trim($satker)]);
		if ($user_row && !empty($user_row->kode_lama)) {
			$kode_lama = explode(',', $user_row->kode_lama);
			foreach($kode_lama as $k) {
				if (!empty(trim($k))) {
					$satkers[] = trim($k);
				}
			}
		}
		$satkers_str = "'" . implode("','", $satkers) . "'";

		$sql = "SELECT id, cnip, vname, vjabnm, 
				(select vname from app_m_jabatan where id = ijabid2) as jabatan_perbendaharan
				FROM `app_t_usulan_pegawai`
				WHERE `ckduker` IN ({$satkers_str})  
				AND `isnonaktif` = '0' AND `ijabid2` IN (1, 2, 3)";

		$query = $this->db->query($sql);

		$this->session->jum_rec  = $query->num_rows();
  		$this->session->jum_page = ceil($this->session->jum_rec/$this->limit);
  
  		$sql .= " limit {$this->limit} offset {$offset}";

		$query = $this->db->query($sql); 
  		
  		if ($query) {
			$rows = $query->result();
			if ( sizeOf($rows) > 0 ) {
				$i=1;
				foreach ($rows as $r) {

					if ( $offset == 0 ) $norut = $i;
					else $norut = ($i+$offset);
					
						$class = '';

					$html .= "<tr class='{$class}'>";
					$html .= "<td style='text-align:center;'>".$norut."</td>";
					$html .= "<td>{$r->cnip}</td>";
					$html .= "<td>{$r->vname}</td>";
					$html .= "<td>{$r->jabatan_perbendaharan}</td";
					$html .= "</td>";
					$html .= "</tr>";
					$i++;
				}
			} 
  		} else {
  		  $html .= "<tr><td colspan='6'><b>Data tidak ditemukan</b></td></tr>";
  		}
  		
  		$html .= "</table>";
  		$pagination = $this->_ajaxPagination(base_url()."perbend/history_pejabat_perbend/lists", $this->kriteria, 'history_pejabat_perbend', $offset, $this->limit);

  		$hasil['html'] = array('html'=>$html);
  		$hasil['pagination'] = $pagination;
  
  		echo json_encode($hasil);
	}

	function manipulate_list_button($buttons) {
		unset($buttons);

		return $buttons;
	}
}