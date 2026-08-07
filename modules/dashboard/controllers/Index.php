<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require_once('Ews.php');
require_once "modules/perbend/controllers/M_unor.php";
class Index extends MX_Controller {
	
	var $limit=10;
	//var $cews; 
	public function __construct() {
		parent::__construct();
		$controller = "dashboard/index";
		
		$this->_addTable('app_m_informasi');
	}
	
	public function index() {
		$data = array();
		
		if ($this->session->superuser) {
		  $data = $this->get_total_perbendaharaan();
		} else {
		  $orgs =[];
		  foreach($this->session->orgs as $k=>$v) {
		    $orgs[] = $k;
		  }
		  $data = $this->get_total_perbendaharaan('', $orgs);
		}
		
		$results['result'] = $this->getdatacharts();
		$data['charts'] = $this->load->view('d/chart', $results, true);
		$data['summary_info'] = $this->get_dashboard_summary();
		$data['unit_cert_breakdown'] = $this->get_unit_cert_breakdown();
		$data['rekening_info'] = $this->_get_rekening_summary();
		
		$this->template->display('d/index', $data, TRUE);
	}

	private function _get_rekening_summary() {
		$res = $this->db->query("SELECT 
			COUNT(*) as total_rekening,
			SUM(CASE WHEN istatus = 0 THEN 1 ELSE 0 END) as total_aktif,
			SUM(CASE WHEN istatus = 1 THEN 1 ELSE 0 END) as total_nonaktif
		FROM app_m_unor_rekening")->row();

		$kpi = array(
			'total'    => (int)($res ? $res->total_rekening : 0),
			'aktif'    => (int)($res ? $res->total_aktif : 0),
			'nonaktif' => (int)($res ? $res->total_nonaktif : 0)
		);

		$sql_jenis = "SELECT 
			j.nama as jenis_nama, 
			COUNT(*) as total,
			SUM(CASE WHEN r.istatus = 0 THEN 1 ELSE 0 END) as aktif,
			SUM(CASE WHEN r.istatus = 1 THEN 1 ELSE 0 END) as nonaktif
		FROM app_m_unor_rekening r
		LEFT JOIN app_m_jenis_rekening j ON r.jenis_rekening = j.id
		GROUP BY r.jenis_rekening, j.nama
		ORDER BY total DESC";
		
		$res_jenis = $this->db->query($sql_jenis)->result();

		$j_labels   = array();
		$j_total    = array();
		$j_aktif    = array();
		$j_nonaktif = array();

		if (!empty($res_jenis)) {
			foreach ($res_jenis as $rj) {
				$j_labels[]   = !empty($rj->jenis_nama) ? $rj->jenis_nama : 'Lainnya';
				$j_total[]    = (int)$rj->total;
				$j_aktif[]    = (int)$rj->aktif;
				$j_nonaktif[] = (int)$rj->nonaktif;
			}
		}

		return array(
			'kpi' => $kpi,
			'chart_jenis' => array(
				'labels'   => $j_labels,
				'total'    => $j_total,
				'aktif'    => $j_aktif,
				'nonaktif' => $j_nonaktif
			)
		);
	}

	private function get_unit_cert_breakdown() {
		$kodeunitutamas = $this->session->kodeunitutamas;
		if (empty($kodeunitutamas)) return array();

		$results = array();

		foreach ($kodeunitutamas as $unit) {
			$unit_id = trim($unit->id);
			$unit_kode = trim($unit->kode);
			$unit_ksat = !empty($unit->kode_satker) ? trim($unit->kode_satker) : '';
			$abbrv = !empty($unit->abbrv) ? trim($unit->abbrv) : trim($unit->nama);

			// Cek apakah $unit ini merupakan Unit Utama Eselon I (13801..13812 atau nama Eselon I)
			$excel_satkers = get_excel_satkers_by_eselon($abbrv);
			if (empty($excel_satkers) && !empty($unit_ksat)) {
				$excel_satkers = get_excel_satkers_by_eselon($unit_ksat);
			}

			$active_satkers = get_active_excel_satker_codes();
			if (!empty($active_satkers) && !empty($excel_satkers)) {
				$active_lookup = array_flip(array_map('trim', $active_satkers));
				$excel_satkers = array_values(array_unique(array_filter($excel_satkers, function($code) use ($active_lookup) {
					return isset($active_lookup[trim($code)]);
				})));
			}

			$ids = array();
			$kodes = array();

			if (!empty($excel_satkers)) {
				// CASE A: Top-level Unit Utama Eselon I (Tampilan Superuser)
				$str_satkers = implode(',', array_map(array($this->db, 'escape'), $excel_satkers));
				$unor_rows = $this->db->query("SELECT id, kode, kode_satker FROM kepeg_m_unor WHERE kode_satker IN ({$str_satkers}) OR kode IN ({$str_satkers})")->result_array();

				foreach ($unor_rows as $u) {
					if (!empty($u['id'])) $ids[trim($u['id'])] = $this->db->escape(trim($u['id']));
					if (!empty($u['kode'])) $kodes[trim($u['kode'])] = $this->db->escape(trim($u['kode']));
					if (!empty($u['kode_satker'])) $kodes[trim($u['kode_satker'])] = $this->db->escape(trim($u['kode_satker']));
				}
				foreach ($excel_satkers as $code) {
					$kodes[trim($code)] = $this->db->escape(trim($code));
				}
			} else {
				// CASE B: Satuan Kerja Perorangan (Tampilan User Eselon I)
				if (!empty($unit_id)) $ids[$unit_id] = $this->db->escape($unit_id);
				if (!empty($unit_kode)) $kodes[$unit_kode] = $this->db->escape($unit_kode);
				if (!empty($unit_ksat)) $kodes[$unit_ksat] = $this->db->escape($unit_ksat);

				$esc_id = $this->db->escape($unit_id);
				$child_unors = $this->db->query("SELECT id, kode, kode_satker FROM kepeg_m_unor WHERE id_atasan = {$esc_id}")->result_array();
				foreach ($child_unors as $cu) {
					if (!empty($cu['id'])) $ids[trim($cu['id'])] = $this->db->escape(trim($cu['id']));
					if (!empty($cu['kode'])) $kodes[trim($cu['kode'])] = $this->db->escape(trim($cu['kode']));
					if (!empty($cu['kode_satker'])) $kodes[trim($cu['kode_satker'])] = $this->db->escape(trim($cu['kode_satker']));
				}
			}

			$str_ids = !empty($ids) ? implode(',', array_values($ids)) : "'0'";
			$str_kodes = !empty($kodes) ? implode(',', array_values($kodes)) : "''";

			$sql = "SELECT 
						-- Bendahara (BP:2, BPn:3, BPP:6)
						SUM(CASE WHEN p.cjabid2 IN (2,3,6) AND (p.cnobnt IS NOT NULL AND p.cnobnt != '') THEN 1 ELSE 0 END) AS bnd_cert,
						SUM(CASE WHEN p.cjabid2 IN (2,3,6) AND (p.cnobnt IS NULL OR p.cnobnt = '') THEN 1 ELSE 0 END) AS bnd_uncert,
						-- PPK (cjabid2 = 5)
						SUM(CASE WHEN p.cjabid2 = 5 AND (p.cnopnt IS NOT NULL AND p.cnopnt != '') THEN 1 ELSE 0 END) AS ppk_cert,
						SUM(CASE WHEN p.cjabid2 = 5 AND (p.cnopnt IS NULL OR p.cnopnt = '') THEN 1 ELSE 0 END) AS ppk_uncert,
						-- PPSPM (cjabid2 = 4)
						SUM(CASE WHEN p.cjabid2 = 4 AND (p.cnosnt IS NOT NULL AND p.cnosnt != '') THEN 1 ELSE 0 END) AS ppspm_cert,
						SUM(CASE WHEN p.cjabid2 = 4 AND (p.cnosnt IS NULL OR p.cnosnt = '') THEN 1 ELSE 0 END) AS ppspm_uncert
					FROM kepeg_m_pegawai p
					WHERE p.cjabid2 IN (2,3,4,5,6)
					  AND (p.ikduker IN ({$str_ids}) OR p.ckduker IN ({$str_kodes}))";

			$row = $this->db->query($sql)->row();

			$results[] = array(
				'unit'         => $abbrv,
				'bnd_cert'     => (int)($row ? $row->bnd_cert : 0),
				'bnd_uncert'   => (int)($row ? $row->bnd_uncert : 0),
				'ppk_cert'     => (int)($row ? $row->ppk_cert : 0),
				'ppk_uncert'   => (int)($row ? $row->ppk_uncert : 0),
				'ppspm_cert'   => (int)($row ? $row->ppspm_cert : 0),
				'ppspm_uncert' => (int)($row ? $row->ppspm_uncert : 0)
			);
		}

		$order_map = array(
			'13801' => 1, 'SETJEN' => 1, 'SEKRETARIAT JENDERAL' => 1,
			'13802' => 2, 'ITJEN' => 2, 'INSPEKTORAT JENDERAL' => 2,
			'13803' => 3, 'GTK' => 3, 'DIREKTORAT JENDERAL GURU DAN TENAGA KEPENDIDIKAN' => 3, 'DIREKTORAT JENDERAL GURU, TENAGA KEPENDIDIKAN, DAN PENDIDIKAN GURU' => 3,
			'13804' => 4, 'PAUD, DIKDASMEN' => 4, 'PAUD' => 4, 'DIREKTORAT JENDERAL PAUD, DIKDAS DAN DIKMEN' => 4, 'DIREKTORAT JENDERAL PENDIDIKAN ANAK USIA DINI, PENDIDIKAN DASAR, DAN PENDIDIKAN MENENGAH' => 4,
			'13805' => 5, 'VOKASI' => 5, 'DIREKTORAT JENDERAL PENDIDIKAN VOKASI' => 5, 'DIREKTORAT JENDERAL PENDIDIKAN VOKASI, PENDIDIKAN KHUSUS, DAN PENDIDIKAN LAYANAN KHUSUS' => 5,
			'13811' => 6, 'BSKAP' => 6, 'BADAN STANDAR, KURIKULUM, DAN ASESMEN PENDIDIKAN' => 6, 'BADAN STANDAR KURIKULUM DAN ASESMEN PENDIDIKAN' => 6,
			'13812' => 7, 'BAHASA' => 7, 'BADAN PENGEMBANGAN DAN PEMBINAAN BAHASA' => 7
		);

		usort($results, function($a, $b) use ($order_map) {
			$valA = isset($order_map[strtoupper(trim($a['unit']))]) ? $order_map[strtoupper(trim($a['unit']))] : 99;
			$valB = isset($order_map[strtoupper(trim($b['unit']))]) ? $order_map[strtoupper(trim($b['unit']))] : 99;
			return $valA - $valB;
		});

		return $results;
	}

	private function get_dashboard_summary() {
		$tahun = !empty($this->session->settahun) ? $this->session->settahun : date('Y');
		
		$q_satker = "";
		if (!$this->session->superuser) {
			$user_orgs = !empty($this->session->orgs) ? array_keys($this->session->orgs) : array();
			if (!empty($user_orgs)) {
				$str_orgs = implode(',', array_map(array($this->db, 'escape'), $user_orgs));
				$q_satker = " AND iunorid IN ({$str_orgs})";
			}
		} else {
			$active_codes = get_active_excel_satker_codes();
			if (!empty($active_codes)) {
				$str_active = implode(',', array_map(array($this->db, 'escape'), $active_codes));
				$q_satker = " AND iunorid IN ({$str_active})";
			}
		}

		$tot_usulan = (int)$this->db->query("SELECT COUNT(*) AS total FROM app_t_usulan WHERE ctahun=? AND ijns=1 AND istatus != 0 {$q_satker}", array($tahun))->row()->total;
		$tot_proses = (int)$this->db->query("SELECT COUNT(*) AS total FROM app_t_usulan WHERE ctahun=? AND ijns=1 AND istatus != 0 AND istatus != 7 {$q_satker}", array($tahun))->row()->total;
		$tot_sk_pending = (int)$this->db->query("SELECT COUNT(DISTINCT iunorid) AS total FROM app_t_usulan WHERE ctahun=? AND istatus=6 {$q_satker}", array($tahun))->row()->total;
		$tot_selesai = (int)$this->db->query("SELECT COUNT(*) AS total FROM app_t_usulan WHERE ctahun=? AND ijns=1 AND istatus=7 {$q_satker}", array($tahun))->row()->total;

		$status_map = array(
			0 => 'Draft',
			1 => 'Menunggu Verifikasi',
			2 => 'Verifikasi I',
			3 => 'Verifikasi II',
			4 => 'Disetujui',
			5 => 'Ditolak',
			6 => 'Proses TTD SK',
			7 => 'Selesai'
		);
		$res = $this->db->query("SELECT istatus, COUNT(*) as cnt FROM app_t_usulan WHERE ctahun=? AND ijns=1 {$q_satker} GROUP BY istatus", array($tahun))->result();
		
		$labels = array();
		$values = array();
		$colors = array('#94a3b8', '#3b82f6', '#0284c7', '#6366f1', '#8b5cf6', '#ef4444', '#f59e0b', '#10b981');
		$bg_colors = array();

		foreach ($res as $r) {
			$st = (int)$r->istatus;
			$labels[] = isset($status_map[$st]) ? $status_map[$st] : 'Status '.$st;
			$values[] = (int)$r->cnt;
			$bg_colors[] = isset($colors[$st]) ? $colors[$st] : '#64748b';
		}

		return array(
			'kpi' => array(
				'total_usulan' => $tot_usulan,
				'total_proses' => $tot_proses,
				'sk_pending'   => $tot_sk_pending,
				'total_selesai'=> $tot_selesai,
				'tahun'        => $tahun
			),
			'chart_status' => array(
				'labels' => $labels,
				'values' => $values,
				'colors' => $bg_colors
			)
		);
	}
	
	function getdatacharts() {
	  	$kodeunitutamas = $this->session->kodeunitutamas;
  		$m_unor = new M_unor;
  		
  		$datas[0] = ['Unit Utama'];
  		$jabs = $this->db->query("SELECT id, ckode from app_m_jabatan where id in (1,2,3,6) order by iurut asc")->result();
  		foreach($jabs as $j) {
  		  array_push($datas[0], $j->ckode);
  		}
  		
  		$i=1;
  		foreach($kodeunitutamas as $kode) {
				$orgs =[trim($kode->kode_satker)];
				$m_unor->getRekursifUnit(trim($kode->kode_satker), $orgs);
				
				$orgsx =[];
        foreach($orgs as $k=>$v) {
        	$orgsx[] = $k;
        }
        $orgs = $orgsx;
        
        //print_r($orgs);
        //exit;
				$totals = $this->get_total_perbendaharaan('', $orgs);
				
				//print_r($totals['data']);
				foreach($totals['data'] as $key=>$val) {
					if ($val['kode'] == 'KPA') $totalkpa = $val['total'];
					if ($val['kode'] == 'BP') $totalbp = $val['total'];
				  	if ($val['kode'] == 'BPn') $totalbpn = $val['total'];
				  	if ($val['kode'] == 'BPP') $totalbpp = $val['total'];
				}
			
				//exit;
				//foreach
				
				$datas[] = [trim($kode->abbrv), (int)$totalkpa, (int)$totalbp, (int)$totalbpn,(int)$totalbpp];
				
				$i++;
  		}
  		
  		return json_encode($datas);
	}
	
	private function get_total_perbendaharaan($ijabid2='', $kd_satker='') {
	  /*$data = [
	     'total_2' => 0, 
	     'total_3' => 0,
	     'total_6' => 0 
	   ];*/

	    $groupids = explode(',', $this->session->groupid);
		$ada = 0;
		if (sizeOf($groupids) > 0 ) {
			foreach($groupids as $g) {
				if ( in_array($g, explode(",", $this->session->sysparam->group_superuser[0])) ) $ada++;
				if ( in_array($g, explode(",", $this->session->sysparam->all_group[0])) ) $ada++;
			}
		} else {
			if ( in_array($this->session->groupid, explode(",", $this->session->sysparam->all_group[0])) ) $ada++;
		}
	   
	   $bgcolor = [
	     'bg-green',
	     'bg-blue',
	     'bg-yellow',
	     'bg-orange',
	     'bg-red',
	     'bg-navy',
	     'bg-purple'
	   ];
	   $cs = [
	     '',
	     ($ada > 0 ? 'laporan1' : ''),
	     ($ada > 0 ? 'laporan1' : ''),
	     ($ada > 0 ? 'laporan2' : ''),
	     ($ada > 0 ? 'laporan3' : ''),
	     ($ada > 0 ? 'laporan1' : ''),
	     ($ada > 0 ? 'laporan4' : ''),
	   ];
	   
	   $jabs = $this->getall('', 'app_m_jabatan', 'id, ckode as kode, vname as name', array('ldeleted'=>0), '', array('iurut'=>'asc'));
	   
	   $jabid2 = [];
	   foreach($jabs as $j) {
	     $data[$j->id] = [
	         'kode' => $j->kode,
	         'nama' => $j->nama,
	         'total' => 0
	     ];
	     
	     $jabid2[] = $j->id;
	   }
	   
	   $jabid2 = implode(",", $jabid2);
	  
	  if ($ijabid2 != '') {
	    $ijabid2_ = "'".implode("','", $ijabid2)."'";
	    $q_ijabid2 = " ijabid2 in (".$ijabid2_.")";
	  } else $q_ijabid2 = "  ijabid2 in ({$jabid2}) ";
	  
	  if ($kd_satker !='') {
	    $kd_satker_ = "'".implode("','", $kd_satker)."'";
	    $q_kd_satker = " and p.ckduker in (".$kd_satker_.")";
	  } else {
	    if (!$this->session->superuser && !empty($this->session->orgs)) {
			$user_orgs = array_keys($this->session->orgs);
			$str_user_orgs = implode(',', array_map(array($this->db, 'escape'), $user_orgs));
			$q_kd_satker = " and p.ckduker in (".$str_user_orgs.")";
	    } else {
	        $active_codes = get_active_excel_satker_codes();
	        if (!empty($active_codes)) {
	            $str_active = implode(',', array_map(array($this->db, 'escape'), $active_codes));
	            $q_kd_satker = " and p.ckduker in (".$str_active.")";
	        } else {
	            $q_kd_satker = "";
	        }
	    }
	  }
	  
	  // OPTIMIZED: JOIN menggantikan correlated subquery
	  $tahun = !empty($this->session->settahun) ? $this->session->settahun : date('Y');
  $sql = "Select p.ijabid2, count(p.cnip) as total 
              From app_t_usulan_pegawai p
              INNER JOIN app_m_unor u ON u.kode = p.ckduker AND u.deleted = 0
              LEFT JOIN app_t_usulan us ON us.id = p.iusulanid
              where {$q_ijabid2} ";
    if ($q_kd_satker !='') $sql.= $q_kd_satker;
	/*$sql .= " and case 
		when p.ijabid2 not in (4,5,6,7) then p.inoskid IS NOT NULL and p.inoskid !=0 and p.isnonaktif = 0
		else p.isnonaktif = 0 and p.istatus != 0 and p.istatus2 != 0 and us.ctahun = '{$tahun}'
		end ";*/
		
	if ( empty($kd_satker_) ) {
		$sql .= " and case 
			when p.ijabid2 not in (4,5,6,7) then p.inoskid IS NOT NULL and p.inoskid !=0 and p.isnonaktif = 0
			else p.isnonaktif = 0 and p.istatus != 0 and p.istatus2 != 0 and us.ctahun = '{$tahun}'
			end ";
	} else {
		$sql .= " and case 
			when p.ijabid2 not in (4,5,6,7) then p.inoskid IS NOT NULL and p.inoskid !=0 and p.isnonaktif = 0
			else p.isnonaktif = 0 and p.istatus != 0 and p.istatus2 != 0 and us.ctahun = '{$tahun}'
			end ";
	}
    //$sql .= " and p.inoskid IS NOT NULL and p.inoskid != 0 and p.isnonaktif = 0";
    $sql .= " Group by p.ijabid2 ";
    //echo $sql;exit;
              
    $rows = $this->db->query($sql)->result();
    foreach($rows as $r) {
      //$data['total_'.$r->ijabid2] = $r->total;
      $data[$r->ijabid2]['total'] = $r->total;
    }
    
    $datas['data'] = $data;
    $datas['bgcolor'] = $bgcolor;
    $datas['cs'] = $cs;
    
    return $datas;
  }

  function lists($page_ke = 0) {
    $html = '';
    $table = 'app_m_informasi';

    // Set halaman
    if ($page_ke == 0) {
        $this->session->{$table . '_page'} = 1;
    } else {
        if (empty($this->session->{$table . '_page'})) {
            $this->session->{$table . '_page'} = 1;
        } else {
            if ($page_ke != 0) $this->session->{$table . '_page'} = $page_ke;
        }
    }

    $page = $this->session->{$table . '_page'};
    $offset = ($page - 1) * $this->limit;

    foreach ($_POST as $k => $v) {            
        $krit = str_replace("q_", "", $k);
        $this->kriteria[$krit] = $this->input->post($k);
    }
    $this->kriteria = (object) $this->kriteria;

    $today = date('Y-m-d');
    $sql = "SELECT id, title, deskripsi, isi, lampiran, type 
            FROM app_m_informasi 
            WHERE deleted = 0 
            AND '{$today}' BETWEEN mulai AND selesai
            LIMIT {$this->limit} OFFSET {$offset}";

    $query = $this->db->query($sql);
    $data = $query->result();

    $html .= "<div class='container mt-4'>";
    
    if (!empty($data)) {
        foreach ($data as $r) {
            $html .= "<div class='card mb-3 shadow-sm'>";
            $html .= "<div class='card-body'>";
            $html .= "<h5 class='card-title'><b>{$r->title}</b></h5>";
            $html .= "<p class='card-text'>{$r->deskripsi}</p>";
            
            if (!empty($r->isi)) {
                $html .= "<button class='btn btn-primary btn-sm' data-bs-toggle='modal' data-bs-target='#modal{$r->id}'>Baca Selengkapnya</button>";

                // Modal untuk isi pengumuman
                $html .= "<div class='modal fade' id='modal{$r->id}' tabindex='-1'>
                            <div class='modal-dialog modal-lg'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title'>{$r->title}</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal'></button>
                                    </div>
                                    <div class='modal-body'>
                                        {$r->isi}
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Tutup</button>
                                    </div>
                                </div>
                            </div>
                        </div>";
            }

            if (!empty($r->lampiran)) {
                $html .= " <a href='" . base_url("uploads/{$r->lampiran}") . "' target='_blank' class='btn btn-success btn-sm'>
                                <i class='fas fa-file-download'></i> Download Lampiran
                           </a>";
            }

            $html .= "</div></div>";
        }
    } else {
        $html .= "<p class='text-center'>Tidak ada pengumuman tersedia.</p>";
    }

    $html .= "</div>";

    $pagination = $this->_ajaxPagination(base_url() . "dashboard/index/lists", $this->kriteria, 'index');
    $hasil['html'] = array('html' => $html);
    $hasil['pagination'] = $pagination;

    echo json_encode($hasil);
}

  
//   function lists($page_ke=0) {
// 		//$tfile = "";
// 		$html = '';
// 		$table = 'app_m_informasi';

// 		//print_r($_POST);
// 		//exit;
		
// 		if ( $page_ke == 0 ) {
// 			 $this->session->{$table.'_page'} = 1;
// 		} else {
// 			if ( $this->session->{$table.'_page'} == '' ) {
// 				$this->session->{$table.'_page'} = 1;
// 			} else {
// 			  if ( $page_ke != 0 ) $this->session->{$table.'_page'} = $page_ke;
// 			}
// 		}
		
// 		$page = $this->session->{$table.'_page'};

// 		$offset = ($page - 1) * $this->limit;

// 		foreach ($_POST as $k=>$v) {			
// 			$krit = str_replace("q_", "", $k);
// 			$this->kriteria[$krit] = $this->input->post($k);
// 		}
// 		$this->kriteria = (object)$this->kriteria;
// 		//print_r($this->kriteria);
// 		//exit;

// 		//echo $offset;
// 		//exit;

// 		$html  = "<form id='t_terbit_sk_form-edit'>";
// 		$html .= "<table class='table table-responsive table-condensed table-bordered' width='100%'>
// 					<thead>
// 						<tr class='active'>
// 							<th width='5%'>No.</th>
// 							<th width='30%'>Judul</th>
// 							<th width='55%'>Deskripsi</th>
// 							<th width='10%'>Lampiran</th>
// 						</tr>
// 					</thead>";

//     $today = date('Y-m-d');
// 		$sql = "SELECT app_m_informasi.id, app_m_informasi.title, 
// 				app_m_informasi.deskripsi, app_m_informasi.isi, app_m_informasi.lampiran,
// 		  		app_m_informasi.type
// 				from app_m_informasi where 
// 				deleted=0 and 
// 				'{$today}' between mulai and selesai";
				
// 		//echo $sql;exit;
// 		$query = $this->db->query($sql);

// 		$this->session->jum_rec  = $query->num_rows();
// 		$this->session->jum_page = ceil($this->session->jum_rec/$this->limit);

// 		$sql .= " limit {$this->limit} offset {$offset}";
// 		//echo $sql;
// 		//exit;
		
// 		$query = $this->db->query($sql);

// 		$html .= "<tbody>";

// 		$fg_color = "#000000";
// 		if ( $query ) {
// 			$rows = $query->result();

// 			if ( sizeOf($rows) > 0 ) {
// 				$i=1;
// 				foreach ($rows as $r) {

// 					//if ( $i%2 ) $class = '';
// 					//else 
// 					if ( $offset == 0 ) $norut = $i;
// 				  else $norut = ($i+$offset);
				
// 					$class = '';

// 					$html .= "<tr class='{$class}'>";
// 					$html .= "<td style='text-align:center;'>".$norut."</td>";
// 					$html .= "<td style='text-align:justify;'><b>".$r->title."</b></td>";
					
// 					$input = "";
// 				  if ($r->isi !=NULL) {
// 					      	$isi = $r->isi;
// 							$input = "<div class='modal fade' id='myPreview2_{$r->id}' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
// 										<div class='modal-dialog' role='document' style='width:65%;'>
// 											<div class='modal-content'>
// 											<div class='modal-header'>
// 												<button type='button' class='close' aria-label='Close' 
// 												onclick=\"$('#myPreview2_{$r->id}').modal('hide').appendTo('.div_app_t_usulan_sk_tfile2');$('#{$this->router->class}_form-modal').css('overflow', 'scroll');\">
// 												<span aria-hidden='true'>&times;</span></button>
// 												<h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> {$r->title}</h4>
// 											</div>
// 											<div class='modal-body' id='modal-body'>
// 												<div class='form-group'>
// 													<div id='html_telusuri'>";
						
// 							$input .= $isi;
					
					
// 							$input .= "			 	</div>
// 												</div>
// 												<center>
// 													<button class='btn btn-warning' type='button'
// 														onclick=\"$('#myPreview2_{$r->id}').modal('hide').appendTo('#div_app_t_usulan_sk_tfile2');$('#{$this->router->class}_form-modal').css('overflow', 'scroll');\">
// 													Tutup</button>
// 												</center>
// 											</div>
// 										</div>
// 									</div>
// 								</div>";

// 							$input .= $r->isi;
// 							//$input .= $r->deskripsi."<span data-toggle='modal' data-target='#myPreview2_{$r->id}' style='cursor:pointer;'><b> Read more... </b></span>";
							
// 					}

// 					$html .= "<td>".$input."</td>";
					
// 					if ($r->lampiran !=NULL) {
// 					      $bfile = $r->lampiran;
// 						  $tfile = $bfile;
// 					      $vtype = $r->type;
// 					  		$input = "<span data-toggle='modal' data-target='#myPreview_{$r->id}' style='cursor:pointer;' class='btn btn-warning' onclick='get_html_file({$r->id});'>
// 												<i class='fas fa-file-pdf'></i>
// 											</span>";
// 							$input .= "<div class='modal fade' id='myPreview_{$r->id}' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
// 										<div class='modal-dialog' role='document' style='width:65%;'>
// 											<div class='modal-content'>
// 											<div class='modal-header'>
// 												<button type='button' class='close' aria-label='Close' 
// 												onclick=\"$('#myPreview_{$r->id}').modal('hide').appendTo('.div_app_t_usulan_sk_tfile2');$('#{$this->router->class}_form-modal').css('overflow', 'scroll');\">
// 												<span aria-hidden='true'>&times;</span></button>
// 												<h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> {$r->title}</h4>
// 											</div>
// 											<div class='modal-body' id='modal-body'>
// 												<div class='form-group'>
// 													<div id='html_telusuri'>";
  
// 							if ( $vtype != 'application/pdf' ) {
// 								$height='100';$width='';
// 							} else { $height='100%';$width='700';}
					
// 							//$input .= "<iframe src='data:{$vtype};base64,{$tfile}' type='{$vtype}' width='{$height}' height='{$width}' alt='{$vtype}'>PDF tidak bisa ditinjau</iframe>";
					
					
// 							$input .= "			 </div>
// 											</div>
// 										</div>
// 										</div>
// 									</div>
// 								</div>";
										
// 							$html .= "<td>".$input."</td>";
// 					}

// 					$html .= "</tr>";

// 					$i++;
// 				}
// 			} else {
// 				$html .= "<tr><td colspan='12'>Data tidak ditemukan</td></tr>";
// 			}
// 		}

// 		$html .= "</tbody>
// 				</table>";

// 		$html .= "</form>";

// 		$html .= "<script type='text/javascript'>
// 					function get_html_file(id) {
// 						$.post('".base_url()."dashboard/index/get_html_file/'+id, {}, function(data) {
// 							var o = jQuery.parseJSON(data);
// 							$('#myPreview_'+id+' #html_telusuri').html(o.preview);
// 						});
// 					}
// 				 </script>";

// 		$pagination = $this->_ajaxPagination(base_url()."dashboard/index/lists", $this->kriteria, 'index');
// 		$hasil['html'] = array('html'=>$html);
// 		$hasil['pagination'] = $pagination;

// 		echo json_encode($hasil);
// 	}

	function get_html_file($id)
    {
        $sql = "SELECT type, lampiran from app_m_informasi where id = '{$id}'";
		$files = $this->db->query($sql)->row();

        $type = $files->type;
		$escaped = $files->lampiran;
        $datas = [
            'preview' => "<iframe id='iframe_app_m_informas_lampiran' src='data:" . trim($type) . ";base64,{$escaped}' type='" . trim($type) . "' width='100%' height='800' alt='{$type}'>PDF tidak bisa di tinjau</iframe>"
        ];

        echo json_encode($datas);
    }

	public function get_unit_cert_detail() {
		$unit_abbrv = $this->input->post('unit');
		$jab_type   = $this->input->post('jab');   // 'bnd', 'ppk', 'ppspm'
		$status_type= $this->input->post('status');// 'cert', 'uncert'

		// 1. Dapatkan daftar 6-digit kode satker jika $unit_abbrv adalah Unit Utama Eselon I
		$excel_satkers = get_excel_satkers_by_eselon($unit_abbrv);
		if (empty($excel_satkers)) {
			$uu_row = $this->db->query("SELECT kode_satker FROM kepeg_m_unor WHERE (abbrv = " . $this->db->escape($unit_abbrv) . " OR nama = " . $this->db->escape($unit_abbrv) . ") AND id_atasan = '14124'")->row();
			if ($uu_row && !empty($uu_row->kode_satker)) {
				$excel_satkers = get_excel_satkers_by_eselon($uu_row->kode_satker);
			}
		}

		// 2. Jika masih kosong, berarti $unit_abbrv adalah nama Satker individu atau kode satker individu!
		if (empty($excel_satkers)) {
			$name_map = get_excel_satker_name_map();
			foreach ($name_map as $code => $name) {
				if (trim($name) === trim($unit_abbrv) || trim($code) === trim($unit_abbrv)) {
					$excel_satkers = array($code);
					break;
				}
			}
		}

		if (empty($excel_satkers)) {
			$u_row = $this->db->query("SELECT kode_satker, kode FROM kepeg_m_unor WHERE nama = " . $this->db->escape($unit_abbrv) . " OR abbrv = " . $this->db->escape($unit_abbrv) . " OR kode_satker = " . $this->db->escape($unit_abbrv) . " OR kode = " . $this->db->escape($unit_abbrv))->row();
			if ($u_row) {
				$ks = !empty($u_row->kode_satker) ? trim($u_row->kode_satker) : trim($u_row->kode);
				$excel_satkers = array($ks);
			}
		}

		// Batasi detail hanya pada kode satker aktif dari master Excel aktif.
		$active_satkers = get_active_excel_satker_codes();
		$active_lookup = array();
		if (!empty($active_satkers)) {
			$active_lookup = array_flip(array_map('trim', $active_satkers));
			$excel_satkers = array_values(array_unique(array_filter($excel_satkers, function($code) use ($active_lookup) {
				return isset($active_lookup[trim($code)]);
			})));
		}

		$details = array();
		$seen_pegs = array();
		if (!empty($excel_satkers)) {
			// Map jab_type ke cjabid2 & nama kolom sertifikat
			$jab_ids = array();
			$cert_col = '';
			$tgl_sert_col = '';
			$tgl_kad_col = '';
			if ($jab_type === 'bnd') {
				$jab_ids = array(2, 3, 6);
				$cert_col = 'cnobnt';
				$tgl_sert_col = 'dtgltbnt';
				$tgl_kad_col = 'dtglkbnt';
			} elseif ($jab_type === 'ppk') {
				$jab_ids = array(5);
				$cert_col = 'cnopnt';
				$tgl_sert_col = 'dtgltpnt';
				$tgl_kad_col = 'dtglkpnt';
			} elseif ($jab_type === 'ppspm') {
				$jab_ids = array(4);
				$cert_col = 'cnosnt';
				$tgl_sert_col = 'dtgltsnt';
				$tgl_kad_col = 'dtglksnt';
			}

			$str_jab = implode(',', $jab_ids);

			// Preload top unors matching these satker codes
			$str_satkers = implode(',', array_map(array($this->db, 'escape'), $excel_satkers));
			$top_unors = $this->db->query("SELECT id, kode, kode_satker, nama FROM kepeg_m_unor WHERE kode_satker IN ({$str_satkers}) OR kode IN ({$str_satkers})")->result_array();

			// Preload seluruh hirarki kepeg_m_unor untuk traversal anak unor
			$all_unors = $this->db->query("SELECT id, kode, kode_satker, id_atasan FROM kepeg_m_unor WHERE date_expired IS NULL")->result_array();
			$tree = array();
			$unor_by_id = array();
			$unor_by_kode = array();
			foreach ($all_unors as $u) {
				$parent_id = trim($u['id_atasan']);
				$tree[$parent_id][] = $u;
				$unor_by_id[trim($u['id'])] = $u;
				if (!empty($u['kode'])) {
					$unor_by_kode[trim($u['kode'])] = $u;
				}
			}

			foreach ($top_unors as $top) {
				$top_id   = trim($top['id']);
				$top_ksat = !empty($top['kode_satker']) ? trim($top['kode_satker']) : trim($top['kode']);

				$ids = array($top_id => $this->db->escape($top_id));
				$kodes = array();
				if (!empty($top['kode'])) $kodes[trim($top['kode'])] = $this->db->escape(trim($top['kode']));
				if (!empty($top_ksat)) $kodes[$top_ksat] = $this->db->escape($top_ksat);

				$str_ids = !empty($ids) ? implode(',', array_values($ids)) : "'0'";
				$str_kodes = !empty($kodes) ? implode(',', array_values($kodes)) : "''";

				$sql_peg = "SELECT p.cnip, p.vname, p.{$cert_col} as cert_no,
							p.{$tgl_sert_col} as tgl_sert, p.{$tgl_kad_col} as tgl_kad, p.dtglsertifikat, p.dtglkadaluarsa,
							p.ikduker, p.ckduker,
							u.id AS peg_unor_id,
							u.kode_satker AS peg_kode_satker,
							u.kode AS peg_kode_unor,
							u.nama AS peg_nama_unor,
							uck.id AS ckduker_unor_id,
							uck.kode_satker AS ckduker_kode_satker,
							uck.nama AS ckduker_nama_unor
							FROM kepeg_m_pegawai p
							LEFT JOIN kepeg_m_unor u ON u.id = p.ikduker
							LEFT JOIN kepeg_m_unor uck ON uck.kode = p.ckduker
							WHERE p.cjabid2 IN ({$str_jab})
							AND (p.ikduker IN ({$str_ids}) OR p.ckduker IN ({$str_kodes}))";

				if ($status_type === 'cert') {
					$sql_peg .= " AND ({$cert_col} IS NOT NULL AND {$cert_col} != '')";
				} else {
					$sql_peg .= " AND ({$cert_col} IS NULL OR {$cert_col} = '')";
				}

				$pegs = $this->db->query($sql_peg)->result_array();
				if (!empty($pegs)) {
					foreach ($pegs as $p) {
						$peg_key = !empty($p['cnip']) ? trim($p['cnip']) : trim($p['vname']);
						if (isset($seen_pegs[$peg_key])) {
							continue;
						}

						$pegawai_satker_code = '';
						if (!empty($p['peg_kode_satker']) && preg_match('/^[0-9]+$/', trim($p['peg_kode_satker']))) {
							$pegawai_satker_code = trim($p['peg_kode_satker']);
						} elseif (!empty($p['ckduker_kode_satker']) && preg_match('/^[0-9]+$/', trim($p['ckduker_kode_satker']))) {
							$pegawai_satker_code = trim($p['ckduker_kode_satker']);
						} else {
							$pegawai_satker_code = $this->_resolve_numeric_satker_code(
								!empty($p['peg_unor_id']) ? $p['peg_unor_id'] : (!empty($p['ckduker_unor_id']) ? $p['ckduker_unor_id'] : ''),
								!empty($p['peg_kode_unor']) ? $p['peg_kode_unor'] : (!empty($p['ckduker']) ? $p['ckduker'] : ''),
								$unor_by_id,
								$unor_by_kode
							);
						}
						if ($pegawai_satker_code === '' && !empty($p['ckduker']) && preg_match('/^[0-9]+$/', trim($p['ckduker']))) {
							$pegawai_satker_code = trim($p['ckduker']);
						} elseif ($pegawai_satker_code === '' && preg_match('/^[0-9]+$/', $top_ksat)) {
							$pegawai_satker_code = $top_ksat;
						}
						if ($pegawai_satker_code === '') {
							continue;
						}
						if (!empty($active_lookup) && !isset($active_lookup[$pegawai_satker_code])) {
							continue;
						}

						$seen_pegs[$peg_key] = true;
						$fallback_satker_name = !empty($p['ckduker_nama_unor']) ? $p['ckduker_nama_unor'] : (!empty($p['peg_nama_unor']) ? $p['peg_nama_unor'] : $top['nama']);
						$pegawai_satker_name = get_excel_satker_name($pegawai_satker_code, $fallback_satker_name);
						$cert_no = !empty($p['cert_no']) ? trim($p['cert_no']) : '';
						
						$raw_tgl_sert = (!empty($cert_no) && !empty($p['tgl_sert'])) ? $p['tgl_sert'] : (!empty($cert_no) ? $p['dtglsertifikat'] : '');
						$raw_tgl_kad  = (!empty($cert_no) && !empty($p['tgl_kad']))  ? $p['tgl_kad']  : (!empty($cert_no) ? $p['dtglkadaluarsa']  : '');
						
						$tgl_sert_val = (!empty($raw_tgl_sert) && $raw_tgl_sert !== '0000-00-00') ? date('d/m/Y', strtotime($raw_tgl_sert)) : '-';
						$tgl_kad_val  = (!empty($raw_tgl_kad)  && $raw_tgl_kad  !== '0000-00-00') ? date('d/m/Y', strtotime($raw_tgl_kad))  : '-';
						
						$cert_status = $this->_get_cert_status_by_date($raw_tgl_kad, $raw_tgl_sert, $cert_no);

						$details[] = array(
							'kode_satker'  => $pegawai_satker_code,
							'nama_satker'  => $pegawai_satker_name,
							'nip'          => !empty($p['cnip']) ? $p['cnip'] : '-',
							'nama_pegawai' => !empty($p['vname']) ? $p['vname'] : '-',
							'no_sertifikat'=> $cert_no !== '' ? $cert_no : 'Belum Bersertifikat',
							'tgl_sertifikat'=> $tgl_sert_val,
							'tgl_kadaluarsa'=> $tgl_kad_val,
							'cert_status'  => $cert_status
						);
					}
				}
			}
		}

		echo json_encode($details);
	}

	private function _get_cert_status_by_date($tgl_kad, $tgl_sert, $cert_no) {
		$cert_no = trim($cert_no);
		if ($cert_no === '') {
			return 'missing';
		}
		if (!empty($tgl_kad) && $tgl_kad !== '0000-00-00') {
			$today = date('Y-m-d');
			if ($tgl_kad < $today) {
				return 'warning'; // KUNING (Kadaluarsa)
			} else {
				return 'active'; // HIJAU (Aktif)
			}
		}
		if (!empty($tgl_sert) && $tgl_sert !== '0000-00-00') {
			$sert_time = strtotime($tgl_sert);
			$five_years_ago = strtotime('-5 years');
			if ($sert_time < $five_years_ago) {
				return 'warning'; // KUNING (> 5 tahun)
			} else {
				return 'active'; // HIJAU (Aktif)
			}
		}
		return $this->_get_cert_status($cert_no);
	}

	private function _get_cert_status($cert_no) {
		$cert_no = trim($cert_no);
		if ($cert_no === '') {
			return 'missing';
		}
		if (preg_match('/(19|20)\d{2}(?!.*(19|20)\d{2})/', $cert_no, $m)) {
			$year = (int)$m[0];
			$current_year = (int)date('Y');
			return (($current_year - $year) > 5) ? 'warning' : 'active';
		}
		return 'active';
	}

	private function _resolve_numeric_satker_code($unor_id, $unor_kode, &$unor_by_id, &$unor_by_kode) {
		$node = null;
		$unor_id = trim($unor_id);
		$unor_kode = trim($unor_kode);
		if ($unor_id !== '' && isset($unor_by_id[$unor_id])) {
			$node = $unor_by_id[$unor_id];
		} elseif ($unor_kode !== '' && isset($unor_by_kode[$unor_kode])) {
			$node = $unor_by_kode[$unor_kode];
		}

		$guard = 0;
		while (!empty($node) && $guard < 50) {
			if (!empty($node['kode_satker']) && preg_match('/^[0-9]+$/', trim($node['kode_satker']))) {
				return trim($node['kode_satker']);
			}
			if (!empty($node['kode']) && preg_match('/^[0-9]+$/', trim($node['kode']))) {
				return trim($node['kode']);
			}
			$parent_id = !empty($node['id_atasan']) ? trim($node['id_atasan']) : '';
			if ($parent_id === '' || !isset($unor_by_id[$parent_id])) {
				break;
			}
			$node = $unor_by_id[$parent_id];
			$guard++;
		}
		return '';
	}

	private function _collect_satker_child_keys($parent_id, &$tree, &$ids, &$kodes) {
		if (!isset($tree[$parent_id])) return;
		foreach ($tree[$parent_id] as $child) {
			$cid   = trim($child['id']);
			$ckode = trim($child['kode']);
			$cksat = trim($child['kode_satker']);
			if (!empty($cid)) $ids[$cid] = $this->db->escape($cid);
			if (!empty($ckode)) $kodes[$ckode] = $this->db->escape($ckode);
			if (!empty($cksat)) $kodes[$cksat] = $this->db->escape($cksat);
			$this->_collect_satker_child_keys($cid, $tree, $ids, $kodes);
		}
	}
}

