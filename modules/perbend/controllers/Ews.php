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
		$html  = "<form id='t_terbit_sk_form-edit'>";
		$html .= "<table {$style} class='table table-responsive table-condensed table-bordered'>
					<thead>
						<tr class='active'>
							<th style='text-align:center; width:40px;'>No.</th>
							<th>Nama, NIP</th>
							<th>Jabatan</th>
							<th>Satuan Kerja</th>
							<th>No. Sertifikat</th>
							<th style='text-align:center;'>Tgl Sertifikat</th>
							<th style='text-align:center;'>Tgl Kadaluarsa</th>
							<th style='text-align:center;'>Status</th>
						</tr>
					</thead>";

		// Membangun Kueri Berdasarkan Tab Sertifikasi
		$where_tab = "";
		$nosert_field = "";
		$tglsert_field = "";
		$tglkad_field = "";

		if ($tab === 'ppk') {
			$where_tab = "((kepeg_m_pegawai.cjabid2 = 5) OR (kepeg_m_pegawai.cnopnt IS NOT NULL AND kepeg_m_pegawai.cnopnt != ''))";
			$nosert_field = "kepeg_m_pegawai.cnopnt";
			$tglsert_field = "COALESCE(kepeg_m_pegawai.dtgltpnt, kepeg_m_pegawai.dtglsertifikat)";
			$tglkad_field = "COALESCE(kepeg_m_pegawai.dtglkpnt, kepeg_m_pegawai.dtglkadaluarsa)";
		} else if ($tab === 'ppspm') {
			$where_tab = "((kepeg_m_pegawai.cjabid2 = 4) OR (kepeg_m_pegawai.cnosnt IS NOT NULL AND kepeg_m_pegawai.cnosnt != ''))";
			$nosert_field = "kepeg_m_pegawai.cnosnt";
			$tglsert_field = "COALESCE(kepeg_m_pegawai.dtgltsnt, kepeg_m_pegawai.dtglsertifikat)";
			$tglkad_field = "COALESCE(kepeg_m_pegawai.dtglksnt, kepeg_m_pegawai.dtglkadaluarsa)";
		} else {
			// Default Tab: Bendahara (BP, BPn, BPP)
			$where_tab = "((kepeg_m_pegawai.cjabid2 IN (2,3,6)) OR (kepeg_m_pegawai.cnobnt IS NOT NULL AND kepeg_m_pegawai.cnobnt != ''))";
			$nosert_field = "kepeg_m_pegawai.cnobnt";
			$tglsert_field = "COALESCE(kepeg_m_pegawai.dtgltbnt, kepeg_m_pegawai.dtglsertifikat)";
			$tglkad_field = "COALESCE(kepeg_m_pegawai.dtglkbnt, kepeg_m_pegawai.dtglkadaluarsa)";
		}

		$status_field = "Case 
			When ({$tglkad_field} IS NOT NULL AND {$tglkad_field} != '0000-00-00' AND {$tglkad_field} < CURDATE()) then 'Expired'
			When ({$tglkad_field} IS NOT NULL AND {$tglkad_field} != '0000-00-00' AND YEAR({$tglkad_field}) = YEAR(CURDATE())) then 'PPL'
			When ({$nosert_field} IS NOT NULL AND {$nosert_field} != '') then 'Aktif'
			Else '-'
		End";

		// Query count terpisah yang sangat efisien untuk kalkulasi pagination
		$count_sql = "SELECT COUNT(*) as total
				FROM kepeg_m_pegawai
				LEFT JOIN kepeg_m_unor kep_u ON kepeg_m_pegawai.ikduker = kep_u.id
				LEFT JOIN app_m_unor app_u ON kep_u.kode_satker = app_u.kode
				WHERE {$where_tab}
				  AND (app_u.kode LIKE '138%' OR app_u.kode_atasan LIKE '138%')";

		$where_extra = "";
		if (!empty($this->kriteria->key)) {
			$key = $this->db->escape_like_str($this->kriteria->key);
			$where_extra .= " AND (kepeg_m_pegawai.vname LIKE '%{$key}%' OR kepeg_m_pegawai.cnip LIKE '%{$key}%' OR {$nosert_field} LIKE '%{$key}%')";
		}

		if ($this->session->superuser != 1) {
			$orgs = [trim($this->session->username)];
			if (!empty($this->session->orgs) && is_array($this->session->orgs)) {
				foreach ($this->session->orgs as $k=>$v) {
					$orgs[] = $k;
				}
			}
			$kd_satker = "'".implode("','", array_unique($orgs))."'";
			$where_extra .= " AND kep_u.kode_satker IN ({$kd_satker})";
		}

		$count_sql .= $where_extra;
		
		if (!$reports) {
			$count_row = $this->db->query($count_sql)->row();
			$this->session->jum_rec  = $count_row ? (int)$count_row->total : 0;
			$this->session->jum_page = ceil($this->session->jum_rec / $this->limit);
		}

		// Query data utama menggunakan JOIN (Bebas dari N+1 subquery)
		$sql = "SELECT kepeg_m_pegawai.id, kepeg_m_pegawai.cnip, kepeg_m_pegawai.vname, kepeg_m_pegawai.cjabid2,
				COALESCE(app_j.vname, kep_j.nama) as nama_jabatan,
				kepeg_m_pegawai.ckduker2,
				app_u.nama as nama_satker,
				{$nosert_field} as nosert,
				{$tglsert_field} as tgl_sert,
				{$tglkad_field} as tgl_kad,
				{$status_field} as status
				FROM kepeg_m_pegawai 
				LEFT JOIN kepeg_m_jabatan kep_j ON kepeg_m_pegawai.ijabid = kep_j.id
				LEFT JOIN app_m_jabatan app_j ON kepeg_m_pegawai.cjabid2 = app_j.id
				LEFT JOIN kepeg_m_unor kep_u ON kepeg_m_pegawai.ikduker = kep_u.id
				LEFT JOIN app_m_unor app_u ON kep_u.kode_satker = app_u.kode
				WHERE {$where_tab}
				  AND (app_u.kode LIKE '138%' OR app_u.kode_atasan LIKE '138%')
				  {$where_extra}
				ORDER BY kepeg_m_pegawai.vname ASC";

		if (!$reports) {
			$sql .= " LIMIT {$this->limit} OFFSET {$offset}";
		}
		
		$query = $this->db->query($sql); 

		$html .= "<tbody>";

		if ($query && $query->num_rows() > 0) {
			$rows = $query->result();
			$i = 1;
			foreach ($rows as $r) {
				$norut = ($offset == 0) ? $i : ($i + $offset);
				$nosert_val = !empty($r->nosert) ? $r->nosert : '-';
				$tgl_sert_val = (!empty($r->tgl_sert) && $r->tgl_sert !== '0000-00-00') ? date('d/m/Y', strtotime($r->tgl_sert)) : '-';
				$tgl_kad_val  = (!empty($r->tgl_kad)  && $r->tgl_kad  !== '0000-00-00') ? date('d/m/Y', strtotime($r->tgl_kad))  : '-';
				
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
				$html .= "<td style='text-align:center;'>".$tgl_sert_val."</td>";
				$html .= "<td style='text-align:center;'>".$tgl_kad_val."</td>";
				$html .= "<td style='text-align:center;'>".$status_badge."</td>";
				$html .= "</tr>";

				$i++;
			}
		} else {
			$html .= "<tr><td colspan='8' style='text-align:center;'>Data pegawai bersertifikasi untuk Kementerian Kode 138 tidak ditemukan</td></tr>";
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
