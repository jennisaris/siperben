<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ews extends MX_Controller {
	
	var $limit = 10;
	
	public function __construct() {
		parent::__construct();
		$controller = "perbend/ews";
		
		$this->_setTitle('Sertifikasi Pegawai');
		$this->_addTable('kepeg_m_pegawai');
		
		$this->_setHTMLTemplate('', 'ews/list');
	}
	
	function lists($page_ke=0, $reports=false) {
		$html = '';
		$table = 'kepeg_m_pegawai';

		// Handle active tab (bendahara | ppk | ppspm)
		$tab = strtolower(trim((string)$this->input->post('tab', TRUE)));
		if (!in_array($tab, array('bendahara', 'ppk', 'ppspm'), true)) {
			$tab = $this->session->userdata('ews_tab') ?: 'bendahara';
		}
		$this->session->set_userdata('ews_tab', $tab);
		
		if ($page_ke == 0) {
			$this->session->{$table.'_page'} = 1;
		} else {
			if ($this->session->{$table.'_page'} == '') {
				$this->session->{$table.'_page'} = 1;
			} else {
				if ($page_ke != 0) $this->session->{$table.'_page'} = $page_ke;
			}
		}
		
		$page = $this->session->{$table.'_page'};
		$offset = ($page - 1) * $this->limit;

		foreach ($_POST as $k=>$v) {			
			$krit = str_replace("q_", "", $k);
			$this->kriteria[$krit] = $this->input->post($k);
		}
		$this->kriteria = (object)$this->kriteria;

		if ($reports) $style = 'border=1';
		else $style = '';

		$html  = "<form id='t_terbit_sk_form-edit'>";
		$html .= "<table {$style} class='table table-responsive table-condensed table-bordered'>
					<thead>
						<tr class='active'>
							<th style='text-align:center; width:50px;'>No.</th>
							<th>Nama, NIP</th>
							<th>Jabatan</th>
							<th>Satuan Kerja</th>
							<th>No. Sertifikat</th>
							<th style='text-align:center;'>Status</th>
						</tr>
					</thead>";

		// Membangun Kueri Berdasarkan Tab Sertifikasi
		$where_tab = "";
		$nosert_field = "";
		$status_field = "";

		if ($tab === 'ppk') {
			$where_tab = "((kepeg_m_pegawai.cjabid2 = 5) OR (kepeg_m_pegawai.cnopnt IS NOT NULL AND kepeg_m_pegawai.cnopnt != ''))";
			$nosert_field = "kepeg_m_pegawai.cnopnt";
			$status_field = "Case 
				When (cnopnt IS NOT NULL AND cnopnt != '' AND Right(cnopnt, 4) + 4 < year(curdate())) then 'Expired'
				When (cnopnt IS NOT NULL AND cnopnt != '' AND Right(cnopnt, 4) + 4 = year(curdate())) then 'PPL'
				When (cnopnt IS NOT NULL AND cnopnt != '') then 'Aktif'
				Else '-'
			End";
		} else if ($tab === 'ppspm') {
			$where_tab = "((kepeg_m_pegawai.cjabid2 = 4) OR (kepeg_m_pegawai.cnosnt IS NOT NULL AND kepeg_m_pegawai.cnosnt != ''))";
			$nosert_field = "kepeg_m_pegawai.cnosnt";
			$status_field = "Case 
				When (cnosnt IS NOT NULL AND cnosnt != '' AND Right(cnosnt, 4) + 4 < year(curdate())) then 'Expired'
				When (cnosnt IS NOT NULL AND cnosnt != '' AND Right(cnosnt, 4) + 4 = year(curdate())) then 'PPL'
				When (cnosnt IS NOT NULL AND cnosnt != '') then 'Aktif'
				Else '-'
			End";
		} else {
			// Default Tab: Bendahara (BP, BPn, BPP)
			$where_tab = "((kepeg_m_pegawai.cjabid2 IN (2,3,6)) OR (kepeg_m_pegawai.cnobnt IS NOT NULL AND kepeg_m_pegawai.cnobnt != ''))";
			$nosert_field = "kepeg_m_pegawai.cnobnt";
			$status_field = "Case 
				When (cnobnt IS NOT NULL AND cnobnt != '' AND Right(cnobnt, 4) + 4 < year(curdate())) then 'Expired'
				When (cnobnt IS NOT NULL AND cnobnt != '' AND Right(cnobnt, 4) + 4 = year(curdate())) then 'PPL'
				When (cnobnt IS NOT NULL AND cnobnt != '') then 'Aktif'
				Else '-'
			End";
		}

		$sql = "SELECT kepeg_m_pegawai.id, kepeg_m_pegawai.cnip, kepeg_m_pegawai.vname, kepeg_m_pegawai.cjabid2,
				case
					when kepeg_m_pegawai.cjabid2 IS NULL THEN (Select nama from kepeg_m_jabatan where id = ijabid) 
					else (Select vname from app_m_jabatan where id = cjabid2) 
				end as nama_jabatan,
				kepeg_m_pegawai.ckduker2,
				(select nama from app_m_unor where kode = (select kode_satker from kepeg_m_unor where id = kepeg_m_pegawai.ikduker)) as nama_satker,
				{$nosert_field} as nosert,
				{$status_field} as status
				from kepeg_m_pegawai 
				where {$where_tab}
				and (select kode_satker from kepeg_m_unor where id = kepeg_m_pegawai.ikduker) in (select kode from app_m_unor where kode like '138%' or kode_atasan like '138%')";

		// Filter pencarian jika ada input kata kunci
		if (!empty($this->kriteria->key)) {
			$key = $this->db->escape_like_str($this->kriteria->key);
			$sql .= " and (kepeg_m_pegawai.vname LIKE '%{$key}%' OR kepeg_m_pegawai.cnip LIKE '%{$key}%' OR {$nosert_field} LIKE '%{$key}%')";
		}

		// Filter Satker jika bukan Superuser
		if ($this->session->superuser != 1) {
			$orgs = [trim($this->session->username)];
			if (!empty($this->session->orgs) && is_array($this->session->orgs)) {
				foreach ($this->session->orgs as $k=>$v) {
					$orgs[] = $k;
				}
			}
			$kd_satker = "'".implode("','", array_unique($orgs))."'";
			$sql .= " and (select kode_satker from kepeg_m_unor where id = kepeg_m_pegawai.ikduker) in ({$kd_satker})";
		}

		$sql .= " ORDER BY kepeg_m_pegawai.vname ASC";

		$query = $this->db->query($sql);
		
		if (!$reports) {
			$this->session->jum_rec  = $query ? $query->num_rows() : 0;
			$this->session->jum_page = ceil($this->session->jum_rec / $this->limit);

			$sql .= " limit {$this->limit} offset {$offset}";
		}
		
		$query = $this->db->query($sql); 

		$html .= "<tbody>";

		if ($query && $query->num_rows() > 0) {
			$rows = $query->result();
			$i = 1;
			foreach ($rows as $r) {
				$norut = ($offset == 0) ? $i : ($i + $offset);
				$nosert_val = !empty($r->nosert) ? $r->nosert : '-';
				
				$status_badge = "<span class='label label-default'>-</span>";
				if ($r->status === 'Aktif') {
					$status_badge = "<span class='label label-success'>Aktif</span>";
				} else if ($r->status === 'PPL') {
					$status_badge = "<span class='label label-warning'>PPL</span>";
				} else if ($r->status === 'Expired') {
					$status_badge = "<span class='label label-danger'>Expired</span>";
				}

				$html .= "<tr>";
				$html .= "<td style='text-align:center;'>".$norut."</td>";
				$html .= "<td>".ucwords(strtolower($r->vname))."<br/><small class='text-muted'>NIP. ".$r->cnip."</small></td>";
				$html .= "<td>".html_escape($r->nama_jabatan)."</td>";
				$html .= "<td>".html_escape($r->nama_satker)."</td>";
				$html .= "<td>".html_escape($nosert_val)."</td>";
				$html .= "<td style='text-align:center;'>".$status_badge."</td>";
				$html .= "</tr>";

				$i++;
			}
		} else {
			$html .= "<tr><td colspan='6' style='text-align:center;'>Data pegawai bersertifikasi untuk Kementerian Kode 138 tidak ditemukan</td></tr>";
		}

		$html .= "</tbody>
				</table>";
				
		if ($reports) {
			$filename = "sertifikasi_138_" . $tab . "_" . date('Ymd') . ".xls";
			header("Content-Disposition: attachment; filename=\"$filename\"");
			header("Content-Type: application/vnd.ms-excel");
			echo $html;
			exit;
		}

		$html .= "</form>";

		$pagination = $this->_ajaxPagination(base_url()."perbend/ews/lists", $this->kriteria, 'ews', $offset);
		$hasil['html'] = array('html'=>$html);
		$hasil['pagination'] = $pagination;

		echo json_encode($hasil);
	}
	
	function manipulate_list_button($buttons) {
		$buttons['download'] = "<button class='btn btn-primary' type='button' name='btn_download' id='btn_download' onclick='download(\"".base_url()."perbend/ews/lists/0/1\");'><i class='fas fa-download'></i> Download Excel</button>";
		return $buttons;
	}
	
	function kepeg_m_pegawai_output() {
		$js = "<script type='text/javascript'>
				function download(url) {
					window.open(url, '_download_');
				}
		</script>";
		return $js;
	}
}
