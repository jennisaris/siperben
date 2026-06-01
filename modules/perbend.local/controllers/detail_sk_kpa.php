<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//require_once "modules/kepegawaian/controllers/M_kepegawaian_unor.php";
//require_once "M_unor.php";
class Detail_sk_kpa extends MX_Controller {
  var $prefix = 'app';
  var $table;
  
  var $limit = 10;
  var $kriteria = [];
  var $ar_units = [];
	public function __construct() {
		parent::__construct();
		$controller = "perbend/detail_sk_kpa";
		$this->table  = $this->prefix."_t_usulan";

    $this->_setTitle('Laporan Bendahara Bersertifikat (Per Satuan Kerja) ');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);
		$this->_addField($this->table, 'iunorid', 'Unit Utama', true, true);
		
		if ( !$this->session->isadmin) {
			$this->_add2SearchField($this->table, 'iunorid', true, true, true);
		} else {
			$this->_add2SearchField($this->table, 'iunorid');

			$kodeunitutamas = $this->session->kodeunitutamas;
			//print_r($kodeunitutamas);
			$this->ar_units = [];
			foreach($kodeunitutamas as $kodes) {
				$this->ar_units[$kodes->kode_satker] = $kodes->nama;
			}
			$this->_changeType($this->table, 'iunorid', 'combobox', $this->ar_units);
		}
		
		$this->_setHTMLTemplate('', 'laporan/list');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
		$header_controller = array('header_controller' => 'perbend/rekap_pejabat');
		$this->session->set_userdata($header_controller);
	}
	
	function lists($page_ke=0, $reports=false, $kodeatasan='') {
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
  
      //print_r($_POST);
  		foreach ($_POST as $k=>$v) {			
  			$krit = str_replace("q_", "", $k);
  			$this->kriteria[$krit] = $this->input->post($k);
  		}
  		$this->kriteria = (object)$this->kriteria;
  		//print_r($this->kriteria);
  		
  		if ($reports) $style='border=1';
  		else $style='';
  		
  		$html .= "<table {$style} class='table bordered'>";
		if ( $reports ) {
			$html .= "<tr>";
			$html .= "<td colspan='9'><b><u>Unit Utama : ".(empty(trim($kodeatasan)) ? 'ALL' : $this->ar_units[trim($kodeatasan)])."</u></b></td>";
			$html .= "</tr>";
		}
  		$html .= "<tr>";
  		$html .= "<th>No.</th>";
  		$html .= "<th>Unit Utama</th>";
		$html .= "<th>Nama Satker</th>";
		$html .= "<th>Nomor SK KPA</th>";
		$html .= "<th>Tanggal SK KPA</th>";
		$html .= "<th>BPP</th>";
		$html .= "<th>PPSPM</th>";
		$html .= "<th>PPK</th>";
		$html .= "<th>PPABP</th>";
  		$html .= "</tr>";
  		
  		
  		//$kodeunitutamas = $this->session->kodeunitutamas;
  		//if (!$reports) $kodeatasan = $this->kriteria->{$this->table.'_iunorid'};
		

  		$sql = "select a.id, a.cnousul as no_sk, a.dtglusul as tgl_sk,
				(select nama from app_m_unor 
				where kode = (select kode_atasan 
				from app_m_unor where kode = a.iunorid)) as nama_unitutama,
				a.iunorid, (select nama from app_m_unor 
				where kode = a.iunorid) as nama_satker,
				a.cnousul, a.dtglusul 
				from app_t_usulan a
				where a.istatus = '7' 
				and a.ijns = 2"; //a.ctahun = '{$this->session->settahun}' and 
				
		if ( !$this->session->isadmin ) {			
			$sql .= " AND a.iunorid = '".trim($this->session->username)."'";
		} else {
			if (empty($kodeatasan)) {
				if ( empty(trim($this->kriteria->app_t_usulan_iunorid)) ) {
					$groupids = explode(',', $this->session->groupid);
						if ( in_array($this->session->sysparam->group_superuser[0], $groupids) ) {
							$ar_unor = array();
							foreach($this->getall('', 'app_m_unor', 'kode, nama') as $r) {
								$ar_unor[$r->kode] = $r->nama; 
							}
						} else {
							$ar_unor = $this->session->orgs;
						}

						foreach($ar_unor as $k=>$v) {
							$ar_unor_[] = $k; 
						}

						$ar_unor_ = "'".implode("','", $ar_unor_)."'";
						$sql .= " AND a.iunorid in ({$ar_unor_})";
				} else {
					$ar_unor = array();
					foreach($this->getall('', 'app_m_unor', 'kode, nama', ['kode_atasan'=>trim($this->kriteria->app_t_usulan_iunorid)]) as $r) {
						$ar_unor[$r->kode] = $r->nama; 
					}
					foreach($ar_unor as $k=>$v) {
						$ar_unor_[] = $k; 
					}
					$ar_unor_ = "'".implode("','", $ar_unor_)."'";
					$sql .= " AND a.iunorid in ({$ar_unor_})";
				}
			} else {
				$ar_unor = array();
				foreach($this->getall('', 'app_m_unor', 'kode, nama', ['kode_atasan'=>trim($kodeatasan)]) as $r) {
					$ar_unor[$r->kode] = $r->nama; 
				}
				foreach($ar_unor as $k=>$v) {
					$ar_unor_[] = $k; 
				}
				$ar_unor_ = "'".implode("','", $ar_unor_)."'";
				$sql .= " AND a.iunorid in ({$ar_unor_})";
			}
		}
  		
		//echo $sql;exit;
		$query = $this->db->query($sql);

		$this->session->jum_rec  = $query->num_rows();
		$this->session->jum_page = ceil($this->session->jum_rec/$this->limit);
    
        if (!$reports) {
          $sql .= " limit {$this->limit} offset {$offset}";
    		  $query = $this->db->query($sql);
        } //else { echo $sql;exit; }
		//echo $sql;exit;
  		//exit;
  		
  		//$m_unor = new M_unor;
  		
  		$no = 1;
  		if ($query) {
  		  $rows = $query->result();
  		  if (sizeOf($rows) > 0) {
  		//foreach($kodeunitutamas as $kode) {
  		foreach($rows as $kode) {
        //print_r($orgs);
		
			if ( $offset == 0 ) $norut = $no;
			else $norut = ($no+$offset);
			
			/*
			,
				(select vname from app_t_usulan_pegawai 
				where ckduker = a.iunorid and isnonaktif = 0 
				and ijabid2 = 6 and iusulanid=a.id and cnip is not null and istatus2=1 order by id desc limit 1) as bpp,
				(select vname from app_t_usulan_pegawai 
				where ckduker = a.iunorid and isnonaktif = 0 
				and ijabid2 = 4 and iusulanid=a.id and cnip is not null and istatus2=1 order by id desc limit 1) as ppspm,
				(select vname from app_t_usulan_pegawai 
				where ckduker = a.iunorid and isnonaktif = 0 
				and ijabid2 = 5 and iusulanid=a.id and cnip is not null and istatus2 = 1 order by id desc limit 1) as ppk,
				(select vname from app_t_usulan_pegawai 
				where ckduker = a.iunorid and isnonaktif = 0 
				and ijabid2 = 7 and iusulanid=a.id and cnip is not null 
				and istatus2 = 1 order by id desc limit 1) as ppabp
			*/
				  
			  $html .= "<tr>";
			  $html .= "<td valign='top'>".$norut."</td>";
			  $html .= "<td valign='top'>".$kode->nama_unitutama."</td>";
			  $html .= "<td valign='top'>".$kode->nama_satker."</td>";
			  $html .= "<td valign='top'>".$kode->no_sk."</td>";
			  $html .= "<td valign='top' align='center'>".($kode->tgl_sk != null ? date('d-m-Y', strtotime($kode->tgl_sk)) : '')."</td>";
			  $html .= "<td valign='top'>".$this->get_list_nama_pemangku($kode->id, 6, $reports)."</td>";
			  $html .= "<td valign='top'>".$this->get_list_nama_pemangku($kode->id, 4, $reports)."</td>";
			  $html .= "<td valign='top'>".$this->get_list_nama_pemangku($kode->id, 5, $reports)."</td>";
			  $html .= "<td valign='top'>".$this->get_list_nama_pemangku($kode->id, 7, $reports)."</td>";
			  
			  $html .= "</tr>";
			  
			  $no++;
  		}
  		
  		} else {
  		  $html .= "<tr><td colspan='6'><b>Data tidak ditemukan</b></td></tr>";
  		}
	}
  		
  		$html .= "</table>";
  		$pagination = $this->_ajaxPagination(base_url()."perbend/detail_sk_kpa/lists", $this->kriteria, 'detail_sk_kpa');
  		if ($reports) {
  		  $filename = "bendahara_" . date('Ymd') . ".xls";

        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");
        echo $html;
        exit;
  		}
  		$hasil['html'] = array('html'=>$html);
  		$hasil['pagination'] = $pagination;
  
  		echo json_encode($hasil);
	}
	
	function get_list_nama_pemangku($usulan_id=0, $jabid2, $reports=false) {
		$sql = "select concat(cnip, ' - ', vname) as vname from app_t_usulan_pegawai 
				where isnonaktif = 0 and ijabid2 = {$jabid2} 
				and iusulanid={$usulan_id} and cnip is not null 
				and istatus2=1";
		$rows = $this->db->query($sql)->result();
		
		$namas = "";
		foreach($rows as $r) {
			if (!$reports)
				$namas .= "<div>".$r->vname."</div>";
			else $namas .= $r->vname."<br/>";
		}
		
		return $namas;
			
	}
	
	function _detail($kode, $orgs, $reports=false) {
	  $unor_id = "'".implode("','", $orgs)."'";
	  $detail = "<table class='table bordered'>";
	  $detail .= "<tr>";
	  $detail .= "<th>No.</th>";
    $detail .= "<th>Jenis Jabatan</th>";
    $detail .= "<th>Sudah Memiliki BNT</th>";
    $detail .= "<th>Belum Memiliki BNT</th>";
    $detail .= "</tr>";
	  $sql = "Select x.id, x.ckode, x.vname, (select count(*) as total 
              From app_t_usulan_pegawai a, 
              app_t_usulan b
              Where a.iusulanid = b.id 
              And a.ijabid2 = x.id and isnonaktif = 0 
              And a.cnosertifikat != ''
              and (a.inoskid != 0 or a.inoskid IS NOT NULL) 
              and b.iunorid in ({$unor_id})) as tot_ada, 
              (select count(*) as total 
              From app_t_usulan_pegawai a, 
              app_t_usulan b
              Where a.iusulanid = b.id 
              And a.ijabid2 = x.id and isnonaktif = 0 
              And a.cnosertifikat = ''
              and (a.inoskid != 0 or a.inoskid IS NOT NULL)
              and b.iunorid in ({$unor_id})) as tot_tdk_ada
              From app_m_jabatan x ";
      $cols = $this->db->query($sql)->result();
      
      $no2=1;
      $tot_all_ada = 0;
      $tot_all_tada = 0;
      foreach($cols as $c) { 
        $detail .= "<tr>";
        $detail .= "<td>".$no2."</td>";
        $detail .= "<td>".$c->vname." (".$c->ckode.")</td>";
        $detail .= "<td style='cursor:pointer;text-align:center;' data-toggle='modal' data-target='#myModal_browse' onclick='_browse(\"".base_url()."perbend/detail_info/index/0\");
        $(\"#detail_info #q_app_t_usulan_pegawai_cnosertifikat\").val(1);
        $(\"#detail_info #q_app_t_usulan_pegawai_ckduker\").val(\"{$kode}\");
        $(\"#detail_info #q_app_t_usulan_pegawai_ijabid2\").val(\"{$c->id}\");
        '>".$c->tot_ada."</td>"; 
        $detail .= "<td style='cursor:pointer;text-align:center;' data-toggle='modal' data-target='#myModal_browse' onclick='_browse(\"".base_url()."perbend/detail_info/index/0\");
        $(\"#detail_info #q_app_t_usulan_pegawai_cnosertifikat\").val(0);
        $(\"#detail_info #q_app_t_usulan_pegawai_ckduker\").val(\"{$kode}\");
        $(\"#detail_info #q_app_t_usulan_pegawai_ijabid2\").val(\"{$c->id}\");
        '>".$c->tot_tdk_ada."</td>"; 
        $detail .= "</tr>";
        
        $tot_all_ada += $c->tot_ada;
        $tot_all_tada += $c->tot_tdk_ada;
        $no2++;
      }
      
        $detail .= "<tr>";
        $detail .= "<td colspan='2' style='text-align:right'>Jumlah</td>"; 
        $detail .= "<td style='text-align:center;'>".$tot_all_ada."</td>"; 
        $detail .= "<td style='text-align:center;'>".$tot_all_tada."</td>"; 
        $detail .= "</tr>";
	  /*if (!$reports) {
  	  $btn_download = "<button class='btn btn-primary' type='button' name='btn_download_detail[]' id='btn_download_detail_{$unor_id}' onclick='download(\"".base_url()."perbend/detail_sk_kpa/_detail/{$kode}/{$orgs}/1\");'><i class='fas fa-download'></i> Download</button>";
  	  $detail .= "<tr>";
  	  $detail .= "<td colspan='4' style='text-align:right;'>";
  	  $detail .= $btn_download;
  	  $detail .= "</td>";
  	  $detail .= "</tr>";
	  }*/
	  
	  $detail .="</table>";
	  
	  return $detail;
	}
	
	function get_total_pegawai_bersertifikat($kodeuker, $ijabid, $nosert="!=''") {
		$unor_id = "'".implode("','", $kodeuker)."'";
				
	  $sql = "Select count(*) as total 
              From app_t_usulan_pegawai a, 
              app_t_usulan b 
              Where a.iusulanid = b.id 
              And a.ijabid2 = '{$ijabid}' and isnonaktif = 0 
              And 
              (a.inoskid != 0 or a.inoskid IS NOT NULL) 
              and b.iunorid in ({$unor_id})
              and a.cnosertifikat {$nosert}";
              
    $total = $this->db->query($sql)->row()->total;
    return $total; 
	}
	
  function app_t_usulan_output() {
        $js = "<script type='text/javascript'>
                    $(document).ready(function() {
            
                    });
                    
                    function download(url) {
        	            window.open(url, '_download_');
					}
                </script>
            ";

        return $js;
  }
  
  private function get_total_perbendaharaan($ijabid2='', $kd_satker='') {
    //print_r($kd_satker);exit;
	  $sql = "SELECT id FROM app_m_jabatan order by id";
    $cols = $this->db->query($sql)->result();
    foreach($cols as $c) {
      $data['total_'.$c->id] = 0;
    }
	  
	  if ($ijabid2 != '') {
	    $ijabid2_ = "'".implode("','", $ijabid2)."'";
	    $q_ijabid2 = " ijabid2 in (".$ijabid2_.")";
	  }// else $q_ijabid2 = "  ijabid2 in (2,3,6) ";
	  
	  if ($kd_satker !='') {
	    $kd_satker_ = "'".implode("','", $kd_satker)."'";
	    $q_kd_satker = " ckduker in (".$kd_satker_.")";
	  } else $q_kd_satker = "";
	  
	  $sql = "Select ijabid2, count(distinct cnip) as total 
              From app_t_usulan_pegawai 
              where {$q_ijabid2} ";
    if ($q_kd_satker !='') $sql.= $q_kd_satker;
	$sql .= "and case 
				 when ijabid2 not in (4,5,6,7) then inoskid != 0 and inoskid IS NOT NULL and isnonaktif =0
				 else isnonaktif=0
				end ";
    //$sql .= " and inoskid IS NOT NULL";
    $sql .= " Group by ijabid2";
    //echo $sql;exit;
              
    $rows = $this->db->query($sql)->result();
    foreach($rows as $r) {
      $data['total_'.$r->ijabid2] = $r->total;//.' => '.$kd_satker_;
    }
    
    return $data;
  }
  
  function manipulate_list_button($buttons) {
    unset($buttons);
    $input = "<div class='modal fade' id='myModal_browse' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
							<div class='modal-dialog' role='document' style='width:75%;'>
							<div class='modal-content'>
								<div class='modal-header'>
								<h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Detail Info </h4>
								</div>
								<div class='modal-body' id='modal-body' style='overflow-x: auto;'>
								<div class='form-group'>
									<div id='html_telusuri'></div>
								</div>
								</div>
							</div>
							</div>
						</div>";
						
		$buttons['modal'] = $input;
		
		$buttons['download'] = "<button class='btn btn-primary' type='button' name='btn_download' id='btn_download' onclick='download(\"".base_url()."perbend/detail_sk_kpa/lists/0/1/\"+$(\"#q_app_t_usulan_iunorid\").val());'><i class='fas fa-download'></i> Download</button>";
		
		
		$buttons['kembali']  = "<button type='button' class='btn btn-default' data-dismiss='modal'
												onclick='$(\"myModal_browse\").hide();
														$(\".modal-backdrop\").remove();
														$(\"body\").removeClass(\"modal-open\");
														setTimeout(function(){ $(\"body\").css(\"padding-right\", 0); }, 1000);'>
													<i class='fas fa-window-close' aria-hidden='true'> </i>
												Tutup</button>";
		
		return $buttons;
  }
}