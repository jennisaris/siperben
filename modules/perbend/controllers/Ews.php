<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ews extends MX_Controller {
	
	var $limit=10;
	
	public function __construct() {
		parent::__construct();
		$controller = "perbend/ews";
		
		$this->_addTable('kepeg_m_pegawai');
		
		$this->_setHTMLTemplate('','ews/list');
	}
	
  function lists($page_ke=0, $reports=false) {
		$html = '';
		$table = 'kepeg_m_pegawai';

		//print_r($_POST);
		//exit;
		
		if ( $page_ke == 0 ) {
			 $this->session->{$table.'_page'} = 1;
		} else {
			if ( $this->session->{$table.'_page'} == '' ) {
				$this->session->{$table.'_page'} = 1;
			} else {
			  if ( $page_ke != 0 ) $this->session->{$table.'_page'} = $page_ke;
			}
		}
		
		$page = $this->session->{$table.'_page'};

		$offset = ($page - 1) * $this->limit;

		foreach ($_POST as $k=>$v) {			
			$krit = str_replace("q_", "", $k);
			$this->kriteria[$krit] = $this->input->post($k);
		}
		$this->kriteria = (object)$this->kriteria;
		//print_r($this->kriteria);
		//exit;

		//echo $offset;
		//exit;
		if ($reports) $style='border=1';
  	else $style='';

		$html  = "<form id='t_terbit_sk_form-edit'>";
		$html .= "<table {$style} class='table table-responsive table-condensed table-bordered'>
					<thead>
						<tr class='active'>
							<th>No.</th>
							<th>Nama, NIP</th>
							<th>Jabatan</th>
							<th>Satuan Kerja</th>
							<th>No. Sertifikat</th>
							<th>Status</th>
						</tr>
					</thead>";

    $today = date('Y-m-d');
    /* $sql = "SELECT kepeg_m_pegawai.id, kepeg_m_pegawai.cnip,kepeg_m_pegawai.vname, 
          	  	kepeg_m_pegawai.cjabid2,
          (Select vname from app_m_jabatan where id = cjabid2) as nama_jabatan,
          	  	kepeg_m_pegawai.ckduker2,
          (Select nama from app_m_unor where kode = ckduker2) as nama_satker,
          Case 
           When cjabid2 in (2,3,6) then kepeg_m_pegawai.cnobnt
           When cjabid2 in (4) then kepeg_m_pegawai.cnosnt
           When cjabid2 in (5) then kepeg_m_pegawai.cnopnt
          End as nosert,
          Case 
           When cjabid2 in (2,3,6) then 
            Case 
           When (Right(cnobnt, 4) + 4 < year(curdate())) then 'Expired'
           when (Right(cnobnt, 4) + 4 = year(curdate())) then 'PPL'
           Else 'Aktif'
          End
           When cjabid2 in (4) then 
          Case 
           When (Right(cnosnt, 4) + 4 < year(curdate())) then 'Expired'
           when (Right(cnosnt, 4) + 4 = year(curdate())) then 'PPL'
           Else 'Aktif'
          End
           When cjabid2 in (5) then 
          Case 
           When (Right(cnosnt, 4) + 4 < year(curdate())) then 'Expired'
           when (Right(cnosnt, 4) + 4 = year(curdate())) then 'PPL'
           Else 'Aktif'
          End
          End as status
          from kepeg_m_pegawai where 
          				((cnobnt IS NOT NULL AND 
          (Right(cnobnt, 4) + 4 <= year(curdate())) and length(Right(cnobnt, 4)) = 4) OR 
          				(cnopnt IS NOT NULL AND 
          (Right(cnopnt, 4) + 4 <= year(curdate())) and length(Right(cnopnt, 4)) = 4) OR
          				(cnosnt IS NOT NULL AND 
          (Right(cnosnt, 4) + 4 <= year(curdate())) and length(Right(cnosnt, 4)) = 4)) 
          And cjabid2 in (2,3,4,6)"; *///,5

		  /* $sql = "SELECT kepeg_m_pegawai.id, kepeg_m_pegawai.cnip,kepeg_m_pegawai.vname, 
          	  	kepeg_m_pegawai.cjabid2,
          case
		   when kepeg_m_pegawai.cjabid2 IS NULL THEN (Select nama from kepeg_m_jabatan where id = ijabid) 
		   else  (Select vname from app_m_jabatan where id = cjabid2) 
		  end as nama_jabatan,
          kepeg_m_pegawai.ckduker2,
		  (select nama from app_m_unor where kode = (select kode_satker from kepeg_m_unor where id = kepeg_m_pegawai.ikduker)) as nama_satker,
          Case 
           When (kepeg_m_pegawai.cnobnt IS NOT NULL AND kepeg_m_pegawai.cnobnt != '' ) then kepeg_m_pegawai.cnobnt
           When (kepeg_m_pegawai.cnosnt IS NOT NULL AND kepeg_m_pegawai.cnosnt != '' ) then kepeg_m_pegawai.cnosnt
           When (kepeg_m_pegawai.cnopnt IS NOT NULL AND kepeg_m_pegawai.cnopnt != '' ) then kepeg_m_pegawai.cnopnt
          End as nosert,
          Case 
           When (kepeg_m_pegawai.cnobnt IS NOT NULL AND kepeg_m_pegawai.cnobnt != '' )  then 
            Case 
           When (Right(cnobnt, 4) + 4 < year(curdate())) then 'Expired'
           when (Right(cnobnt, 4) + 4 = year(curdate())) then 'PPL'
           Else 'Aktif'
          End
           When (kepeg_m_pegawai.cnosnt IS NOT NULL AND kepeg_m_pegawai.cnosnt != '' ) then 
          Case 
           When (Right(cnosnt, 4) + 4 < year(curdate())) then 'Expired'
           when (Right(cnosnt, 4) + 4 = year(curdate())) then 'PPL'
           Else 'Aktif'
          End
           When (kepeg_m_pegawai.cnopnt IS NOT NULL AND kepeg_m_pegawai.cnopnt != '' ) then 
          Case 
           When (Right(cnosnt, 4) + 4 < year(curdate())) then 'Expired'
           when (Right(cnosnt, 4) + 4 = year(curdate())) then 'PPL'
           Else 'Aktif'
          End
          End as status
          from kepeg_m_pegawai where 
          				((cnobnt IS NOT NULL AND 
          (Right(cnobnt, 4) + 4 <= year(curdate())) and length(Right(cnobnt, 4)) = 4) OR 
          				(cnopnt IS NOT NULL AND 
          (Right(cnopnt, 4) + 4 <= year(curdate())) and length(Right(cnopnt, 4)) = 4) OR
          				(cnosnt IS NOT NULL AND 
          (Right(cnosnt, 4) + 4 <= year(curdate())) and length(Right(cnosnt, 4)) = 4)) 
          And 
		  (
			  (kepeg_m_pegawai.cnobnt IS NOT NULL AND kepeg_m_pegawai.cnobnt != '') 
			  OR 
			  (kepeg_m_pegawai.cnosnt IS NOT NULL AND kepeg_m_pegawai.cnosnt != '')
			  OR
			  (kepeg_m_pegawai.cnopnt IS NOT NULL AND kepeg_m_pegawai.cnopnt != '')
		  )"; //and date_expired IS NULL  */

		  $sql = "SELECT kepeg_m_pegawai.id, kepeg_m_pegawai.cnip,kepeg_m_pegawai.vname, 
				kepeg_m_pegawai.cjabid2,
				case
				when kepeg_m_pegawai.cjabid2 IS NULL THEN (Select nama from kepeg_m_jabatan where id = ijabid) 
				else  (Select vname from app_m_jabatan where id = cjabid2) 
				end as nama_jabatan,
				kepeg_m_pegawai.ckduker2,
				(select nama from app_m_unor where kode = (select kode_satker from kepeg_m_unor where id = kepeg_m_pegawai.ikduker)) as nama_satker,
				Case 
				When (kepeg_m_pegawai.cnobnt IS NOT NULL AND kepeg_m_pegawai.cnobnt != '' ) then kepeg_m_pegawai.cnobnt
				When (kepeg_m_pegawai.cnosnt IS NOT NULL AND kepeg_m_pegawai.cnosnt != '' ) then kepeg_m_pegawai.cnosnt
				When (kepeg_m_pegawai.cnopnt IS NOT NULL AND kepeg_m_pegawai.cnopnt != '' ) then kepeg_m_pegawai.cnopnt
				End as nosert,
				Case 
				When (kepeg_m_pegawai.cnobnt IS NOT NULL AND kepeg_m_pegawai.cnobnt != '' )  then 
				Case 
				When (Right(cnobnt, 4) + 4 < year(curdate())) then 'Expired'
				when (Right(cnobnt, 4) + 4 = year(curdate())) then 'PPL'
				Else 'Aktif'
				End
				When (kepeg_m_pegawai.cnosnt IS NOT NULL AND kepeg_m_pegawai.cnosnt != '' ) then 
				Case 
				When (Right(cnosnt, 4) + 4 < year(curdate())) then 'Expired'
				when (Right(cnosnt, 4) + 4 = year(curdate())) then 'PPL'
				Else 'Aktif'
				End
				When (kepeg_m_pegawai.cnopnt IS NOT NULL AND kepeg_m_pegawai.cnopnt != '' ) then 
				Case 
				When (Right(cnopnt, 4) + 4 < year(curdate())) then 'Expired'
				when (Right(cnopnt, 4) + 4 = year(curdate())) then 'PPL'
				Else 'Aktif'
				End
				End as status
				from kepeg_m_pegawai where 
								((cnobnt IS NOT NULL AND length(Right(cnobnt, 4)) = 4) OR 
								(cnopnt IS NOT NULL AND length(Right(cnopnt, 4)) = 4) OR
								(cnosnt IS NOT NULL AND length(Right(cnosnt, 4)) = 4)) 
				And 
				(
					(kepeg_m_pegawai.cnobnt IS NOT NULL AND kepeg_m_pegawai.cnobnt != '') 
					OR 
					(kepeg_m_pegawai.cnosnt IS NOT NULL AND kepeg_m_pegawai.cnosnt != '')
					OR
					(kepeg_m_pegawai.cnopnt IS NOT NULL AND kepeg_m_pegawai.cnopnt != '')
				)"; //and date_expired IS NULL 

    	if ( $this->session->superuser != 1 ) {
      		$orgs = [trim($this->session->username)];
			foreach ($this->session->orgs as $k=>$v) {
				$orgs[] = $k;
			}
			
			$kd_satker = "'".implode("','", $orgs)."'";
			//$sql .=" and kepeg_m_pegawai.ckduker2 in ({$kd_satker})";
			$sql .=" and (select kode_satker from kepeg_m_unor where id = kepeg_m_pegawai.ikduker) in ({$kd_satker})";
		}
				
		//echo $sql;exit;
		$query = $this->db->query($sql);
		
		if (!$reports) {

  		$this->session->jum_rec  = $query->num_rows();
  		$this->session->jum_page = ceil($this->session->jum_rec/$this->limit);
  
  		$sql .= " limit {$this->limit} offset {$offset}";
  		//echo $sql;
  		//exit;
		}
		
		$query = $this->db->query($sql); 

		$html .= "<tbody>";

		$fg_color = "#000000";
		if ( $query ) {
			$rows = $query->result();

			if ( sizeOf($rows) > 0 ) {
				$i=1;
				foreach ($rows as $r) {

					//if ( $i%2 ) $class = '';
					//else 
					if ( $offset == 0 ) $norut = $i;
				  else $norut = ($i+$offset);
				
					$class = '';

					$html .= "<tr class='{$class}'>";
					$html .= "<td style='text-align:center;'>".$norut."</td>";
				  $html .= "<td>".ucwords(strtolower($r->vname))."<br/>NIP. ".$r->cnip."</td>";
				  
				  
				  $html .= "<td>".$r->nama_jabatan."</td>";
				  $html .= "<td>".$r->nama_satker."</td>";
				  $html .= "<td>".$r->nosert."</td>";
				  $html .= "<td style='text-align:center;'>".$r->status."</td>";

					$html .= "</tr>";

					$i++;
				}
			} else {
				$html .= "<tr><td colspan='12'>Data tidak ditemukan</td></tr>";
			}
		}

		$html .= "</tbody>
				</table>";
				
		if ($reports) {
		  // filename for download
      $filename = "ppl_bendahara_" . date('Ymd') . ".xls";

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
	  $buttons['download'] = "<button class='btn btn-primary' type='button' name='btn_download' id='btn_download' onclick='download(\"".base_url()."perbend/ews/lists/0/1\");'><i class='fas fa-download'></i> Download</button>";
	  
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
