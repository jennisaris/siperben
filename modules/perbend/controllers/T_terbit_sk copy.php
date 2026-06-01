<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class T_terbit_sk extends MX_Controller {
	var $prefix = 'app';
	var $ar_statusid = array();
	var $ar_statusperubahan = array();
	var $ar_jabatan = array();
  
	var $table;

	var $kriteria;
	var $limit = 10;
	public function __construct() {
		parent::__construct();
		$controller = "perbend/t_terbit_sk";
		$this->table  = $this->prefix."_t_usulan";

   		$this->_setTitle('Usulan Penerbitan SK');
		$this->_setController($controller);

		$this->_addTable($this->table);
		$this->_addField($this->table, 'id', '', true, true);
		$this->_addField($this->table, 'ijns', 'ijns', false, true);
		$this->_addField($this->table, 'iunorid', 'Satuan Kerja', true);
		$this->_addField($this->table, 'cnousul', 'No. Usul', true);
		$this->_addField($this->table, 'dtglusul', 'Tgl. Usul', true);
		$this->_addField($this->table, 'istatusid', 'Status Perubahan', true);
		$this->_addField($this->table, 'ijnsprubhnid', 'Jenis Perubahan', true);
		$this->_addField($this->table, 'lampiran', 'Lampiran Surat Usulan (dlm format PDF)', false, false, true);
		$this->_addField($this->table, 'tfile', 'Lampiran', true, true);
		$this->_addField($this->table, 'vtype', 'Tipe Dokumen', false, true);
		$this->_addField($this->table, 'nsize', 'nsize', false, true);
		$this->_addField($this->table, 'istatus', 'Status Usulan', false, true);
		$this->_addField($this->table, 'daftarnama', '', false, false, true, 0, 'left', '','', true);
		$this->_addField($this->table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($this->table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($this->table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($this->table, 'cupdatedby', 'Diubah oleh', false, true);

		//$this->_add2SearchField($this->table, 'cnip');
		//$this->_add2SearchField($this->table, 'vname');
		//$this->_add2SearchField($this->table, 'ldeleted');
		
		$rows = $this->getall('', $this->prefix.'_m_status', '*', array('ldeleted'=>0));
		foreach($rows as $r) {
		$this->ar_statusid[$r->id] = $r->vdesc;
		}
		
		$this->_changeType($this->table, 'istatusid', 'combobox', 
		$this->ar_statusid);
		
		$rows = $this->getall('', $this->prefix.'_m_perubahan', '*', array('ldeleted'=>0));
		foreach($rows as $r) {
		$this->ar_statusperubahan[$r->id] = $r->vdesc;
		}
		
		$this->_changeType($this->table, 'ijnsprubhnid', 'combobox', 
		$this->ar_statusperubahan);
		
		$this->_changeType($this->table, 'istatus', 'combobox', 
		$this->session->sysparam->status_usulan);
		
		$this->_changeType($this->table, 'dtglusul', 'date', 'd-m-Y');

		$ar_unor = array();
		foreach($this->getall('', 'kepeg_m_unor', 'id, nama') as $r) {
			$ar_unor[$r->id] = $r->nama;
		}

		$this->_changeType($this->table, 'iunorid', 'combobox2', $ar_unor);

		foreach($this->session->sysparam->status_usulan as $k=>$v) {
			if (!in_array($k, array(4,6,7))) {
				unset($this->session->sysparam->status_usulan[$k]);
			}
		}
		$this->_changeType($this->table, 'istatus', 'combobox2', $this->session->sysparam->status_usulan);

		foreach ( $this->getall('', 'app_m_jabatan', 'id, vname') as $r ) {
			$this->ar_jabatan[$r->id] = $r->vname;
		}
		
		$this->_add2SearchField($this->table, 'iunorid');
		$this->_add2SearchField($this->table, 'cnousul');
		$this->_add2SearchField($this->table, 'dtglusul');
		$this->_add2SearchField($this->table, 'istatusid');
		$this->_add2SearchField($this->table, 'ijnsprubhnid');
		$this->_add2SearchField($this->table, 'istatus');
		
		$this->_setAlign($this->table, 'check', 'center', 'top');
		$this->_setAlign($this->table, 'dtglusul', 'center');
		//$this->_setAlign($this->table, 'istatus', 'center');
		$this->_setAlign($this->table, 'istatusid', 'center');
		$this->_setAlign($this->table, 'ijnsprubhnid', 'center');
		
		$this->_addQuery($this->table, 'app_t_usulan.istatus = 4', 'and', '', 'true');
    
		$this->_add2ListField($this->table, 'cnousul, dtglusul, istatusid, ijnsprubhnid, tfile, tupdated, cupdatedby');

		$this->_setHTMLTemplate('','terbit_sk/list');

		//clear session header_controller
		$this->session->unset_userdata('header_controller');
	}
	
	function gettotaldaftarpegawai($iusulanid) {
		return $this->getrow('', 'app_t_usulan_pegawai', 'count(*) as total', array('iusulanid'=>$iusulanid))->total;
	}

	

    function save() {
		/*
		Array ( 
		[check_all] => Array ( [0] => on ) 
		[usulan] => Array ( [0] => 2 [1] => 2 [2] => 2 ) 
		[check_pegawai] => Array ( [0] => on [1] => on [2] => on ) 
		[check_pegawai_status] => Array ( [0] => 1 [1] => 1 [2] => 1 ) 
		[check_pegawai_cnosk] => Array ( [0] => [1] => [2] => ) 
		[pegawai_id] => Array ( [0] => 4 [1] => 5 [2] => 6 ) ) 
		*/

		$pegawai_status = array();
		$pegawai_id = array();
		$pegawai_nosk = array();

		foreach($_POST as $key=>$value) {
            if ( $key == 'check_pegawai_status') {
                foreach($value as $k=>$v) {
                    $pegawai_status[$k] = $v;
                }
            }

            if ( $key == 'pegawai_id') {
                foreach($value as $k=>$v) {
                    $pegawai_id[$k] = $v;
                }
            }

			if ( $key == 'check_pegawai_cnosk') {
                foreach($value as $k=>$v) {
                    $pegawai_nosk[$k] = $v;
                }
            }
        }

		print_r($pegawai_status);
		print_r($pegawai_id);
		print_r($pegawai_nosk);
		//print_r($_POST);
		//foreach ($pegawai_id)
		exit;
	}

	function lists($page_ke=0) {
		$html = '';

		//print_r($_POST);
		//exit;

		foreach ($_POST as $k=>$v) {			
			$krit = str_replace("q_", "", $k);
			$this->kriteria[$krit] = $this->input->post($k);
		}
		$this->kriteria = (object)$this->kriteria;
		//print_r($this->kriteria);
		//exit;

		if ( $this->session->page == '' ) { 
			$this->session->page = 1;
		} else {
			if ( $page_ke != 0 ) $this->session->page = $page_ke;			
			else $this->session->page = 1;			
		}
			
		$page = $this->session->page;

		$offset = ($page - 1) * $this->limit;

		$html  = "<form id='t_terbit_sk_form-edit'>";
		$html .= "<table class='table table-responsive table-condensed' width='100%'>
					<thead>
						<tr class='active'>
							<th>Action</th>
							<th>No.</th>
							<th>Satuan Kerja</th>
							<th>No. Usul</th>
							<th>Tgl. Usul</th>
							<th>Status Perubahan</th>
							<th>Jenis Perubahan</th>
							<th>Lampiran</th>
							<th>Waktu Ubah</th>
							<th>Diubah Oleh</th>
						</tr>
					</thead>";


		$sql = "SELECT app_t_usulan.id as app_t_usulan_id,app_t_usulan.ijns as app_t_usulan_ijns,app_t_usulan.iunorid as app_t_usulan_iunorid,
				app_t_usulan.cnousul as app_t_usulan_cnousul,app_t_usulan.dtglusul as app_t_usulan_dtglusul,
				app_t_usulan.istatusid as app_t_usulan_istatusid,app_t_usulan.ijnsprubhnid as app_t_usulan_ijnsprubhnid,'' as app_t_usulan_lampiran,
				app_t_usulan.tfile as app_t_usulan_tfile,app_t_usulan.vtype as app_t_usulan_vtype,app_t_usulan.nsize as app_t_usulan_nsize,
				app_t_usulan.istatus as app_t_usulan_istatus,'' as app_t_usulan_keterangan,'' as app_t_usulan_daftarnama,
				app_t_usulan.tcreated as app_t_usulan_tcreated,app_t_usulan.ccreatedby as app_t_usulan_ccreatedby,
				app_t_usulan.tupdated as app_t_usulan_tupdated,app_t_usulan.cupdatedby as app_t_usulan_cupdatedby 
				from app_t_usulan where app_t_usulan.id != 0 ";

		//Array ( [app_t_usulan_cnousul] => [app_t_usulan_dtglusul] => [app_t_usulan_istatusid] => [app_t_usulan_ijnsprubhnid] => 1 [order_by] => ) 

		//$this->session->{$this->list_table[0].'_page'} = 1;
		if ( !empty($this->kriteria->{$this->table.'_cnousul'}) ) {
			$sql .= " and app_t_usulan.cnousul ilike '%".$this->kriteria->{$this->table.'_cnousul'}."%'";
		} else if ( !empty($this->kriteria->{$this->table.'_dtglusul'}) ) {
			$sql .= " and app_t_usulan.dtglusul = '".$this->kriteria->{$this->table.'_dtglusul'}."'";
		} else if ( !empty($this->kriteria->{$this->table.'_istatusid'}) ) {
			$sql .= " and app_t_usulan.istatusid = ".$this->kriteria->{$this->table.'_istatusid'}."";
		} else if ( !empty($this->kriteria->{$this->table.'_ijnsprubhnid'}) ) {
			$sql .= " and app_t_usulan.ijnsprubhnid = ".$this->kriteria->{$this->table.'_ijnsprubhnid'}."";
		} else if ( !empty($this->kriteria->{$this->table.'_iunorid'}) ) {
			$sql .= " and app_t_usulan.iunorid = ".$this->kriteria->{$this->table.'_iunorid'}."";
		} else if ( !empty($this->kriteria->{$this->table.'_istatus'}) ) {
			$sql .= " and app_t_usulan.istatus = ".$this->kriteria->{$this->table.'_istatus'}."";
		}
				
		$query = $this->db->query($sql);

		$this->session->jum_rec  = $query->num_rows();
		$this->session->jum_page = ceil($this->session->jum_rec/$this->limit);

		$sql .= " limit {$this->limit} offset {$offset}";
		//echo $sql;
		//exit;
		
		$query = $this->db->query($sql);


		$rows_ = $this->getall('', $this->prefix.'_m_status', '*', array('ldeleted'=>0));
		$ar_statusid = array();
		foreach($rows_ as $r) {
			$ar_statusid[$r->id] = $r->vdesc;
		}
		
		$rows_ = $this->getall('', $this->prefix.'_m_perubahan', '*', array('ldeleted'=>0));
		$ar_statusperubahan = array();
		foreach($rows_ as $r) {
			$ar_statusperubahan[$r->id] = $r->vdesc;
		}

		$html .= "<tbody>";

		$fg_color = "#000000";
		if ( $query ) {
			$rows = $query->result();

			if ( sizeOf($rows) > 0 ) {
				$i=1;
				foreach ($rows as $r) {

					//if ( $i%2 ) $class = '';
					//else 
					$class = 'warning';

					//function save(url, table_id, default_txt_confirm='', _ismodal=false, _modals='form-modal', _islochref=false, _isneedrefresh=true, _isneededit=false, _isOldFashion=false, _msg='Simpan berhasil.') {
					$buttons = "<button onclick='_prompt({$r->app_t_usulan_id});return false;' type='button' 
								class='btn btn-default btn-xs btn_save_{$r->app_t_usulan_id}' id='btn_save_{$r->app_t_usulan_id}'>
									<i class='fas fa-print'></i> Cetak SK
								</button>";

					$lampiran = "";

					$vtype = trim($r->app_t_usulan_vtype);
					$tfile = $r->app_t_usulan_tfile;
					
					if ( !empty($tfile) ){
						$lampiran .= "<span data-toggle='modal' data-target='#myPreview_{$r->app_t_usulan_id}' style='cursor:pointer;' class='label label-primary'>
									<b>Surat Usulan</b>
								</span>";
						$lampiran .= "<div class='modal fade' id='myPreview_{$r->app_t_usulan_id}' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
								<div class='modal-dialog' role='document' style='width:65%;'>
									<div class='modal-content'>
									<div class='modal-header'>
										<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
										<h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Surat Usulan {$r->app_t_usulan_cnousul}</h4>
									</div>
									<div class='modal-body' id='modal-body'>
										<div class='form-group'>
											<div id='html_telusuri'>";
				
						if ( $vtype != 'application/pdf' ) {
							$height='100';$width='';
						} else { $height='100%';$width='700';}
				
						$lampiran .= "<embed src='data:{$vtype};base64,{$tfile}' type='{$vtype}' width='{$height}' height='{$width}' alt='{$vtype}'>";
				
				
						$lampiran .= "			 </div>
											</div>
										</div>
									</div>
								</div>
							</div>";
					}

					$nama_unor = $this->getrow('', 'kepeg_m_unor', 'nama', array('id'=>$r->app_t_usulan_iunorid))->nama;

					$html .= "<tr class='{$class}'>";
					$html .= "<td style='text-align:center;'>{$buttons}</td>";
					$html .= "<td style='text-align:center;'>".$i."</td>";
					$html .= "<td>".$nama_unor."</td>";
					$html .= "<td>".$r->app_t_usulan_cnousul."</td>";
					$html .= "<td style='text-align:center;'>".date('d-m-Y', strtotime($r->app_t_usulan_dtglusul))."</td>";
					$html .= "<td style='text-align:center;'>".$ar_statusid[$r->app_t_usulan_istatusid]."</td>";
					$html .= "<td style='text-align:center;'>".$ar_statusperubahan[$r->app_t_usulan_ijnsprubhnid]."</td>";
					$html .= "<td style='text-align:center;'>{$lampiran}</td>";
					$html .= "<td style='text-align:center;'>".date('d-m-Y H:i:s', strtotime($r->app_t_usulan_tupdated))."</td>";
					$html .= "<td>".$r->app_t_usulan_cupdatedby."</td>";
					$html .= "</tr>";

					//detail
					$html .= $this->detail($r->app_t_usulan_id);


					$i++;
				}
			} else {
				$html .= "<tr><td colspan='12'>Data tidak ditemukan</td></tr>";
			}
		}

		$html .= "</tbody>
				</table>";

		$html .= "</form>";

		$pagination = $this->_ajaxPagination(base_url()."perbend/t_terbit_sk/lists", $this->kriteria, 't_terbit_sk');
		$hasil['html'] = array('html'=>$html);
		$hasil['pagination'] = $pagination;

		echo json_encode($hasil);
	}

	private function detail($iusulanid) {
		$sql = "SELECT * from app_t_usulan_pegawai a where a.iusulanid = {$iusulanid}";
		$rs_detail = $this->db->query($sql)->result();

		$detail = "<tr>";
		$detail .= "<td>&nbsp;</td>";
		$detail .= "<td colspan='9'>";

		$detail .= "<table class='table table-responsive table-bordered' width='100%'>";
		$detail .= "<tr class='active'>";
		$detail .= "<td colspan='4'><b>Daftar Pegawai</b></td>";
		$detail .= "</tr>";

		$detail .= "<tr class='info'>";

		$checkbox_label = "<input type='checkbox' name='check_all[]' id='check_all_{$iusulanid}' class='check_all' onclick='klik_all(this);'/>";
		$checkbox_label .= "<input type='text' name='txt_check_all[]' id='txt_check_all_{$iusulanid}' class='txt_check_all' value='{$iusulanid}'/>";
		$detail .= "<th>{$checkbox_label}</th>";
		$detail .= "<th>Nama Pegawai</th>";
		$detail .= "<th>Pangkat/Golongan</th>";
		$detail .= "<th>Jabatan</th>";
		$detail .= "</tr>";
		foreach($rs_detail as $r) {
			$detail .= "<tr>";

			$checkbox_r = "<input type='text' name='usulan[]' id='usulan_{$iusulanid}_{$r->id}' class='usulan_{$iusulanid}' value='0'/>";
			$checkbox_r .= "<input type='checkbox' name='check_pegawai[]' id='check_pegawai_{$iusulanid}_{$r->id}' class='check_pegawai_{$iusulanid}' onclick='klik(this);'/>";
			$checkbox_r .= "<input type='text' name='check_pegawai_status[]' id='check_pegawai_status_{$iusulanid}_{$r->id}' class='check_pegawai_status_{$iusulanid}' value='0'/>";
			$checkbox_r .= "<input type='text' name='check_pegawai_cnosk[]' id='check_pegawai_cnosk_{$iusulanid}_{$r->id}' class='check_pegawai_cnosk_{$iusulanid}'/>";
			$checkbox_r .= "<input type='text' name='pegawai_id[]' id='pegawai_id_{$iusulanid}_{$r->id}' class='pegawai_id_{$iusulanid}' value='{$r->id}'/>";

			$detail .= "<td style='text-align:center;'>{$checkbox_r}</td>";
			$detail .= "<td>".$r->vname."<br/>NIP. ".$r->cnip."</td>";
			$detail .= "<td>".$r->cgolid."</td>";
			$detail .= "<td>".$this->ar_jabatan[$r->ijabid2]."</td>";
			$detail .= "</tr>";
		}	

		$detail .= "</table>";

		$detail .= "</td>";
		$detail .= "</tr>";

		return $detail;
	}

	function app_t_usulan_output() {
		$js = "<script type='text/javascript'>
		
					function klik_all(a) {
						var id = $(a).attr('id');
						var id_ = (id.split('_')).pop();

						if ( $(a).is(':checked') ) {
							$('.check_pegawai_'+id_).prop('checked', true);
							$('.check_pegawai_status_'+id_).val(1);
							$('.usulan_'+id_).val(id_);
						} else { 
							$('.check_pegawai_'+id_).prop('checked', false);
							$('.check_pegawai_status_'+id_).val(0);
							$('.usulan_'+id_).val(0);
						}
					}

					function klik(a) {
						/*var id = $(a).attr('id');
						var id_ = id.split('_');
						var pjg = id_.length; 
						var id__ = id_[pjg-2]+'_'+id_[pjg-1];

						alert(id);

						if ( $(a).is(':checked') ) {
							$('.check_pegawai_'+id__).prop('checked', true);
							$('.check_pegawai_status_'+id__).val(1);
						} else { 
							$('.check_pegawai_'+id__).prop('checked', false);
							$('.check_pegawai_status_'+id__).val(0);
						}*/

						var cls = $(a).attr('class');
						var id_ = (cls.split('_')).pop();
						var i = $('.'+cls).index(a);

						if ( $(a).is(':checked') ) {
							$('.check_pegawai_status_'+id_).eq(i).val(1);
							$('.usulan_'+id_).eq(i).val(id_);
						} else { 
							$('.check_pegawai_status_'+id_).eq(i).val(0);
							$('.usulan_'+id_).eq(i).val(0);
							$('.check_pegawai_cnosk_'+id_).eq(i).val('');
						}
					}

					function _disabled(id_) {
						_disabled_all();
						_disabled_all(id_);
					}

					function _check_uncheck(id_, yesno=0) {
						if ( yesno == 0 ) {
							$('.check_pegawai_'+id_).prop('checked', true);
							$('.check_pegawai_status_'+id_).val(1);
							$('.usulan_'+id_).val(id_);
							$('#check_all_'+id_).prop('checked', true);
						} else { 
							$('.check_pegawai_'+id_).prop('checked', false);
							$('.check_pegawai_status_'+id_).val(0);
							$('.usulan_'+id_).val(0);
							$('#check_all_'+id_).prop('checked', false);
						}
					}

					function _check_uncheck_all(yesno=0) {
						if ( yesno != 0 ) {
							$('input[name=\"check_pegawai[]\"]').prop('checked', true);
							$('input[name=\"check_pegawai_status[]\"]').val(1);
							$('input[name=\"check_all[]\"]').prop('checked', true);
							$('input[name=\"usulan[]\"]').val(id_);
							$('input[name=\"txt_check_all[]\"]').prop('checked', true);
						} else { 
							$('input[name=\"check_pegawai[]\"]').prop('checked', false);
							$('input[name=\"check_pegawai_status[]\"]').val(0);
							$('input[name=\"check_all[]\"]').prop('checked', false);
							$('input[name=\"usulan[]\"]').val(0);
							$('input[name=\"txt_check_all[]\"]').prop('checked', false);
						}
					}

					function _disabled_all(id_='') {
						if ( id_ == '' ) {
							$('input[name=\"check_pegawai[]\"]').prop('disabled', true);
							$('input[name=\"check_all[]\"]').prop('disabled', true);
							$('input[name=\"usulan[]\"]').prop('disabled', true);
							$('input[name=\"check_pegawai_status[]\"]').prop('disabled', true);
							$('input[name=\"pegawai_id[]\"]').prop('disabled', true);
							$('input[name=\"check_pegawai_cnosk[]\"]').prop('disabled', true);
							$('input[name=\"txt_check_all[]\"]').prop('disabled', true);
							$('#check_all_'+id_).prop('disabled', true);
						} else {
							$('.check_pegawai_'+id_).prop('disabled', false);
							$('.usulan_'+id_).prop('disabled', false);
							$('.check_pegawai_status_'+id_).prop('disabled', false);
							$('.pegawai_id_'+id_).prop('disabled', false);
							$('.check_pegawai_cnosk_'+id_).prop('disabled', false);
							$('.txt_check_all_'+id_).prop('disabled', false);
							$('#check_all_'+id_).prop('disabled', false);
						}
					}

					function _enabled_all(id_='') {
						if ( id_ == '' ) {
							$('input[name=\"check_pegawai[]\"]').prop('disabled', false);
							$('input[name=\"check_all[]\"]').prop('disabled', false);
							$('input[name=\"usulan[]\"]').prop('disabled', false);
							$('input[name=\"check_pegawai_status[]\"]').prop('disabled', false);
							$('input[name=\"pegawai_id[]\"]').prop('disabled', false);
							$('input[name=\"check_pegawai_cnosk[]\"]').prop('disabled', false);
							$('input[name=\"txt_check_all[]\"]').prop('disabled', false);
							$('#check_all_'+id_).prop('disabled', false);
						} else {
							$('.check_pegawai_'+id_).prop('disabled', true);
							$('.usulan_'+id_).prop('disabled', true);
							$('.check_pegawai_status_'+id_).prop('disabled', true);
							$('.pegawai_id_'+id_).prop('disabled', true);
							$('.check_pegawai_cnosk_'+id_).prop('disabled', true);
							$('.txt_check_all_'+id_).prop('disabled', true);
							$('#check_all_'+id_).prop('disabled', true);
						}
					}

					function _prompt(id_) {
						_disabled(id_, 0);
						var nilai = prompt('Masukkan No. SK', $('.check_pegawai_cnosk_'+id_).val());
						if ( nilai == null ) {
							//do nothing
							_enabled_all();
							_disabled(id_, 1);
							_check_uncheck_all();
						} else if ( nilai == ''  ) {
							bootbox_alert('', '', 'No. SK wajib diisi', true, false);
							return false;
						} else {
							//$('.check_pegawai_cnosk_'+id_).val(nilai);
							//check_pegawai_status_3
							$('.check_pegawai_cnosk_'+id_).each(function() {
								var idx	 = $(this).attr('id');	
								var idx_ = (idx.split('_')).pop();
								if ( $('#usulan_'+id_+'_'+idx_).val() != 0 ) $('#check_pegawai_cnosk_'+id_+'_'+idx_).val(nilai);
							});
							save(\"".base_url()."perbend/t_terbit_sk/save\", \"t_terbit_sk\", 
								\"Cetak SK. Anda Yakin ?\", false, \"\", false, false, false, false, \"Cetak SK Berhasil\");
							_enabled_all();
						}
					}
			   </script>";

		return $js;
	}
}