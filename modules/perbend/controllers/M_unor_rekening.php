<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class M_unor_rekening extends MX_Controller {
    var $prefix = 'app';
	public function __construct() {
		parent::__construct();
		$controller = "perbend/m_unor_rekening";
		$table  = $this->prefix."_m_unor_rekening";

   		$this->_setTitle('Rekening Satker');
		$this->_setController($controller);
		$this->_init('default');
        //$this->_setModal(true);

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
        $this->_addField($table, 'kode_satker', 'Satuan Kerja', true);
        $this->_addField($table, 'no_rekening', 'No. Rekening', true);
        $this->_addField($table, 'nama_rekening', 'Nama Rekening', true);
        $this->_addField($table, 'nama_bank', 'Nama Bank', true);
        $this->_addField($table, 'jenis_rekening', 'Jenis Rekening', true);
        $this->_addField($table, 'tipe', 'Tipe', true);
        $this->_addField($table, 'cluster', 'Kluster', false);
        $this->_addField($table, 'no_surat1', 'No. Surat (Pembukaan Rekening)', false);
        $this->_addField($table, 'tgl_surat1', 'Tgl. Surat (Pembukaan Rekening)', false);
        $this->_addField($table, 'no_surat2', 'No. Surat (Penutupan Rekening)', false);
        $this->_addField($table, 'tgl_surat2', 'Tgl. Surat (Penutupan Rekening)', false);
        $this->_addField($table, 'ket', 'Keterangan', false);
        $this->_addField($table, 'istatus', 'Status', true);
        $this->_addField($table, 'issync', 'Sync Sprint', false, true);

        $table2 = "app_m_unor";
        $this->_addTable($table2);
        $this->_addField($table2, 'id', '', false, true);
        $this->_addField($table2, 'kode', '', false, true);
        $this->_addField($table2, 'nama', 'Nama Satker', false, true);

        $this->_addRelation($table, $table2, ['kode_satker'=>'kode']);

        //$this->_add2ListField($table, 'kode_satker');
        $this->_add2ListField($table2, 'nama');
        $this->_add2ListField($table, 'no_rekening, nama_rekening, nama_bank, jenis_rekening, tipe, cluster, istatus, issync');
        
        $this->_add2SearchField($table, 'kode_satker');
        //$this->_add2SearchField($table2, 'nama');
        $this->_add2SearchField($table, 'no_rekening');
        $this->_add2SearchField($table, 'nama_rekening');
        $this->_add2SearchField($table, 'nama_bank');
        $this->_add2SearchField($table, 'jenis_rekening');
        $this->_add2SearchField($table, 'istatus');

        $this->_changeType($table, 'tgl_surat1', 'date', 'd-m-Y');
        $this->_changeType($table, 'tgl_surat2', 'date', 'd-m-Y');

        $this->_changeType($table, 'istatus', 'combobox', ['Aktif', 'Non Aktif']);
        $this->_changeType($table, 'issync', 'combobox', ['Tidak', 'Ya']);

        foreach($this->getall('', 'app_m_jenis_rekening', 'id, nama') as $r) {
            $jenis_rekening[$r->id] = $r->nama;
        }
        $this->_changeType($table, 'jenis_rekening', 'combobox', $jenis_rekening);

        $tipe_rekening = [0=>'Pilih Tipe'];
        $this->_changeType($table, 'tipe', 'combobox', $tipe_rekening);

        $cluster_rekening = [0=>'Pilih Cluster'];
        $this->_changeType($table, 'cluster', 'combobox', $cluster_rekening);

        $this->_setAlign($table, 'istatus', 'center');
        $this->_setAlign($table, 'issync', 'center');

        $ar_satker = [];

        if ( $this->session->isadmin == 0 ) {
			if ( sizeOf($this->session->orgs2) > 0 ) {
				$orgs = $this->session->orgs2;
                foreach( $this->getall('', 'app_m_unor', 'kode, nama', array('kode'=>['value'=>$orgs, 'mode'=>'where_in', 'deleted'=>0]), '', array('kode'=>'asc')) as $r) {
                    $ar_satker[$r->kode] = $r->nama;     
                }
			}
		} else {
            if ($this->session->superuser) {
                foreach($this->getall('', 'app_m_unor', 'kode, nama', ['deleted'=>0]) as $r) {
                    $ar_satker[$r->kode] = $r->nama;
                }
            } else {
                foreach($this->getall('', 'app_m_unor', 'kode, nama', ['kode'=>trim($this->session->username)]) as $r) {
                    $ar_satker[$r->kode] = $r->nama;
                }
            }
        }

        $this->_changeType($table, 'kode_satker', 'combobox2', $ar_satker);

        if ( isset($this->session->isadmin) && $this->session->isadmin == 0 ) {
			if ( !empty($this->session->orgs2) && is_array($this->session->orgs2) && count($this->session->orgs2) > 0 ) {
				$orgs = "'".implode("','", array_map(array($this->db, 'escape_str'), $this->session->orgs2))."'";
				$this->_addQuery($table, "kode_satker in (".$orgs.")", 'and', '', true);
			}
		} else {
			if (empty($this->session->superuser)) {
				$uname = $this->db->escape_str(trim($this->session->username));
				$this->_addQuery($table, " (kode_satker = '{$uname}' OR {$table2}.kode_atasan = '{$uname}') ", 'and', '', true); 
			}
        }

        // HANYA TAMPILKAN REKENING AKTIF (istatus = 0) DI TABEL LIST (Data non-aktif tetap aman tersimpan di DB)
        $this->_addQuery($table, "istatus = 0", 'and', '', true);


        //clear session header_controller
		$this->session->unset_userdata('header_controller');/* 
		$header_controller = array('header_controller' => 'perbend/m_unor');
		$this->session->set_userdata($header_controller); */
    }

    function updateBox_app_m_unor_rekening_jenis_rekening($name, $value, $datas) {
        $input = "<select name='{$name}' id='{$name}' class='form-control {$name}'>";
        $input .= "<option value=''>Pilih Jenis</option>";
        foreach($this->getall('', 'app_m_jenis_rekening', 'id, nama') as $r) {
            if ( $value == $r->id ) $selected = ' selected ';
            else $selected = ' ';
            $input .= "<option {$selected} value='{$r->id}'>{$r->nama}</option>";
        }
        $input .= "</select>";

        return $input;
    }

    function updateBox_app_m_unor_rekening_tipe($name, $value, $datas) {
        $input = "<select name='{$name}' id='{$name}' class='form-control {$name}'>";
        $input .= "<option value=''>Pilih Tipe</option>";
        foreach($this->getall('', 'app_m_tipe_rekening', 'id, nama', ['jenis'=>$datas->app_m_unor_rekening_jenis_rekening]) as $r) {
            if ( $value == $r->id ) $selected = ' selected ';
            else $selected = ' ';
            $input .= "<option {$selected} value='{$r->id}'>{$r->nama}</option>";
        }
        $input .= "</select>";

        return $input;
    }

    function updateBox_app_m_unor_rekening_cluster($name, $value, $datas) {
        $input = "<select name='{$name}' id='{$name}' class='form-control {$name}'>";
        $input .= "<option value=''>Pilih Cluster</option>";
        foreach($this->getall('', 'app_m_cluster_rekening', 'id, nama', ['tipe_id'=>$datas->app_m_unor_rekening_tipe]) as $r) {
            if ( $value == $r->id ) $selected = ' selected ';
            else $selected = ' ';
            $input .= "<option {$selected} value='{$r->id}'>{$r->nama}</option>";
        }
        $input .= "</select>";

        return $input;
    }

    function listBox_app_m_unor_rekening_tipe($value, $datas) {
        if (empty($value)) return '-';
        $r = $this->getrow('', 'app_m_tipe_rekening', 'nama', ['id'=>$value]);
        return ($r && isset($r->nama)) ? $r->nama : '-';
    }

    function listBox_app_m_unor_rekening_cluster($value, $datas) {
        if (empty($value)) return '-';
        $r = $this->getrow('', 'app_m_cluster_rekening', 'nama', ['id'=>$value]);
        return ($r && isset($r->nama)) ? $r->nama : '-';
    }

    function app_m_unor_rekening_output() {
        $js = "<script type='text/javascript'>
                    $(document).ready(function() {
						$.fn.modal.Constructor.prototype.enforceFocus = function() {};

                        if ( $('#app_m_unor_rekening_id').val() == '' ) get_tipe_rekening($('#app_m_unor_rekening_jenis_rekening').val());

                        $('#app_m_unor_rekening_jenis_rekening').change(function() {
                            get_tipe_rekening($(this).val());
                        });

                        $('#app_m_unor_rekening_tipe').change(function() {
                            get_cluster_rekening($(this).val());
                        });

                        $('#app_m_unor_rekening_no_rekening').keypress(function(e) {
                            if ( e.which == 13 ) {
                                e.preventDefault();
                                e.stopPropagation();
                            }
                        });

                        $('#app_m_unor_rekening_no_rekening').keyup(function(e) {
                            if ( e.which == 13 ) {
                                check_sprint($('#app_m_unor_rekening_kode_satker').val(), $(this).val());
                            }
                        });
                    }); 

                    function get_tipe_rekening(jenis_rekening) {
                        $.post('".base_url()."perbend/m_unor_rekening/get_tipe_rekening/'+jenis_rekening, {}, function(data) {
                            $('#app_m_unor_rekening_tipe').html(data);
                        });
                    }

                    function get_cluster_rekening(tipe_rekening) {
                        $.post('".base_url()."perbend/m_unor_rekening/get_cluster_rekening/'+tipe_rekening, {}, function(data) {
                            $('#app_m_unor_rekening_cluster').html(data);
                        });
                    }

                    function check_sprint(kode_satker, no_rekening) {
                        $.post('".base_url()."perbend/m_unor_rekening/check_sprint/'+kode_satker+'/'+no_rekening, {}, function(data) {
                            var o = jQuery.parseJSON(data);
                            $('#app_m_unor_rekening_issync').val(o.issync);
                            $('#app_m_unor_rekening_nama_rekening').val(o.nama_rekening);
                            $('#app_m_unor_rekening_nama_bank').select();
                        });
                    }

                    function download(url) {
                        var isadmin = {$this->session->isadmin};
                        var kode_satker = '{$this->session->username}';

                        if ( isadmin != 1 ) { 
                            kode_satker = $('#q_app_m_unor_rekening_kode_satker').val(); 
                            if ( kode_satker == '' ) var kode_satker = 'all'; //{$this->session->username}
                            window.open(url+kode_satker+'/0', '_download_');
                        } else {
                            kode_satker = $('#q_app_m_unor_rekening_kode_satker').val();
                            if ( kode_satker == '' ) kode_satker = '{$this->session->username}';
                            window.open(url+kode_satker+'/1', '_download_');
                        }
					}

                    function do_import_rekening(target, controller_name='m_upload_rekening') {
						edit('".base_url()."perbend/'+controller_name+'/edit/0', target, false, 'form-modal', true);
					}
                </script>
            ";

        return $js;
    }

    function before_insert_processor($post) {
        if ( $post->app_m_unor_rekening_tgl_surat1 == '' ) $post->app_m_unor_rekening_tgl_surat1 = NULL;
        if ( $post->app_m_unor_rekening_tgl_surat2 == '' ) $post->app_m_unor_rekening_tgl_surat2 = NULL;

        return $post;
    }

    function before_update_processor($id, $post) {
        if ( $post->app_m_unor_rekening_tgl_surat1 == '' ) $post->app_m_unor_rekening_tgl_surat1 = NULL;
        if ( $post->app_m_unor_rekening_tgl_surat2 == '' ) $post->app_m_unor_rekening_tgl_surat2 = NULL;

        return $post;
    }

    function get_tipe_rekening($jenis_rekening) {
        $selected = ' ';
        $html = "<option value=''>Pilih Tipe</option>";
        $sql = "SELECT id, nama from app_m_tipe_rekening where jenis = '{$jenis_rekening}'";
        $result = $this->db->query($sql)->result();
        foreach( $result as $r) {
            $html .= "<option {$selected} value='{$r->id}'>{$r->nama}</option>";
        }

        echo $html;
    }

    function get_cluster_rekening($tipe_rekening) {
        $selected = ' ';
        $html = "<option value=''>Pilih Cluster</option>";
        $sql = "SELECT id, nama from app_m_cluster_rekening where tipe_id = '{$tipe_rekening}'";
        $result = $this->db->query($sql)->result();
        foreach( $result as $r) {
            $html .= "<option {$selected} value='{$r->id}'>{$r->nama}</option>";
        }

        echo $html;
    }

    /*function check_sprint($kodesatker, $norek) {
        $sql = "SELECT * from app_t_rekening_sprint 
                where kode_satker='{$kodesatker}' and no_rekening = '{$norek}'";
        $row = $this->db->query($sql)->row();

        if ( sizeOf($row) != 0 )
            $data = ['status'=>true, 'nama_rekening'=>$row->nama_rekening, 'issync'=>1];
        else
            $data = ['status'=>false, 'nama_rekening'=>'', 'issync'=>0];

        echo json_encode($data);
    }*/
	
	function check_sprint($kodesatker, $norek, $isajax=true) {
        $sql = "SELECT * from app_t_rekening_sprint 
                where kode_satker='{$kodesatker}' and no_rekening = '{$norek}'";
        $row = $this->db->query($sql)->row();

        if ( !empty($row) )
            $data = ['status'=>true, 'nama_rekening'=>$row->nama_rekening, 'issync'=>1];
        else
            $data = ['status'=>false, 'nama_rekening'=>'', 'issync'=>0];

        if ( $isajax )
            echo json_encode($data);
        else return $data;
    }

    function listBox_app_m_unor_rekening_issync($value, $datas) {
        $issync = [0=>'Tidak', 1=>'Ya'];
        $syncs = $this->check_sprint($datas->app_m_unor_rekening_kode_satker, $datas->app_m_unor_rekening_no_rekening, false);
        return $issync[$syncs['issync']];
    }

    function manipulate_list_button($buttons) {

        $input = "<div class='modal fade' id='myModal_browse' role='dialog' aria-labelledby='myModalLabel' data-backdrop='static' data-keyboard='false'>
					<div class='modal-dialog' role='document' style='width:85%;'>
					<div class='modal-content'>
						<div class='modal-header'>
						<h4 class='modal-title' id='myModalLabel'><i class='glyphicon glyphicon-tasks'></i> Impor Rekening </h4>
						</div>
						<div class='modal-body' id='modal-body' style='overflow-x: auto;'>
						<div class='form-group'>
							<div id='html_telusuri'></div>
						</div>
						</div>
					</div>
					</div>
				</div>";

		//if ( $this->session->isadmin != 0 && trim($this->session->username) == trim($this->session->sysparam->satker_biro_keuangan[0]) ) {
		if ( $this->session->superuser ) {
			$btn_import_rekening = "
				<button type='button' name='btn_import' id='btn_import' class='btn btn-warning btn_import'
					onclick='do_import_rekening(\"m_unor_rekening\", \"m_upload_rekening\");' 
					data-toggle='modal' data-target='#m_upload_rekening_form-modal' data-backdrop='static' data-keyboard='false'>
					<i class='fas fa-file-upload'> </i> Import Rekening
				</button>";
		} else $btn_import_rekening = "";

		$buttons['cetak'] = $btn_import_rekening.$input." 
			<button type='button' name='btn_cetak' id='btn_cetak' class='btn btn-success btn_cetak'
				onclick='download(\"".base_url()."perbend/m_unor_rekening/cetak_rekening/\");'>
				<i class='fas fa-file-excel'> </i> Export Rekening
			</button>";

        return $buttons;
    }

    // function cetak_rekening($kode_satker='', $isadmin=0) {
    //     //if ( $this->session->isadmin == 0 ) $kode_satker = trim($this->session->username);

	// 	$sqlp  = "";
    //     if ( $this->session->superuser ) {
	// 		//do nothing
	// 		//dibebasin...
	// 		if ( $kode_satker == 'all' ) $sqlp = " ";
    //         else $sqlp = "and a.kode = '{$kode_satker}'";
    //     } else {
    //         //if ( $isadmin == 1 ) {
    //             if ( $kode_satker == 'all' ) $sqlp = "and a.kode_atasan = '".trim($this->session->username)."'";
    //             else $sqlp = "and a.kode = '{$kode_satker}'";
    //         //} else {
    //         //    if ( $kode_satker != '' ) $sqlp = "and a.kode = '{$kode_satker}'";
    //         //}
    //     }

	// 	$sql = "SELECT *, 
	// 			(select nama from app_m_unor where kode = a.kode_atasan) as unit_utama 
	// 			FROM app_m_unor a, app_m_unor_rekening b 
	// 			where a.kode = b.kode_satker {$sqlp}";
	//	// 	$nama_bulan = strtoupper(NAMA_BULAN[date('m')]);
	// 	$tahun = date('Y');
	// 	$html = "<table width='100%' border='1'>
	// 				<tr>
	// 					<th colspan='16'>
	// 						<h2>REKAP REKENING SATKER DI LINGKUNGAN KEMENDIKBUDRISTEK {$nama_bulan} {$tahun}</h2>
	// 					</th>
	// 				</tr>
	// 				<tr>
	// 					<th rowspan='2' valign='middle'>No.</th>
	// 					<th rowspan='2' valign='middle'>Unit Utama</th>
	// 					<th rowspan='2' valign='middle'>Kode Satker</th>
	// 					<th rowspan='2' valign='middle'>Nama Satker</th>
	// 					<th rowspan='2' valign='middle'>No. Rekening</th>
	// 					<th rowspan='2' valign='middle'>Nama Rekening</th>
	// 					<th rowspan='2' valign='middle'>Nama Bank</th>
	// 					<th rowspan='2' valign='middle'>Jenis Rekening</th>
	// 					<th rowspan='2' valign='middle'>Tipe</th>
	// 					<th rowspan='2' valign='middle'>Kluster</th>
	// 					<th rowspan='2' valign='middle'>Status</th>
	// 					<th colspan='2' valign='middle'>Surat Pembukaan Rekening</th>
	// 					<th colspan='2' valign='middle'>Surat Penutupan Rekening</th>
    //                     <th rowspan='2' valign='middle'>Keterangan</th>
	// 					<th rowspan='2' valign='middle'>Sync Sprint</th>
	// 				</tr>
	// 				<tr>
	// 					<th valign='middle'>No. Surat</th>
	// 					<th valign='middle'>Tgl. Surat</th>
	// 					<th valign='middle'>No. Surat</th>
	// 					<th valign='middle'>Tgl. Surat</th>
	// 				</tr>";
	// 	$no=1;
	// 	$status = ['Aktif', 'Non Aktif'];
	// 	$sync = ['Tidak', 'Ya'];
	// 	foreach ($this->db->query($sql)->result() as $r) {

	// 		$tgl_surat1 = $r->tgl_surat1 == NULL ? '' : date('d-m-Y', strtotime($r->tgl_surat1));
	// 		$tgl_surat2 = $r->tgl_surat2 == NULL ? '' : date('d-m-Y', strtotime($r->tgl_surat2));

	// 		$issync = $this->check_sprint($r->kode,$r->no_rekening, false);

	// 		$html .= "<tr>";
	// 		$html .= "<td valign='top'>".$no."</td>";
	// 		$html .= "<td valign='top'>".$r->unit_utama."</td>";
	// 		$html .= "<td valign='top'>".$r->kode."</td>";
	// 		$html .= "<td valign='top'>".$r->nama."</td>";
	// 		$html .= "<td valign='top'>'".$r->no_rekening."</td>";
	// 		$html .= "<td valign='top'>".$r->nama_rekening."</td>";
	// 		$html .= "<td valign='top'>".$r->nama_bank."</td>";
	// 		$html .= "<td valign='top'>".$this->getrow('', 'app_m_jenis_rekening', 'nama', ['id'=>$r->jenis_rekening])->nama."</td>";
	// 		$html .= "<td valign='top'>".$this->getrow('', 'app_m_tipe_rekening', 'nama', ['id'=>$r->tipe])->nama."</td>";
	// 		$html .= "<td valign='top'>".$this->getrow('', 'app_m_cluster_rekening', 'nama', ['id'=>$r->cluster])->nama."</td>";
	// 		$html .= "<td valign='top'align='center'>".$status[$r->istatus]."</td>";
	// 		$html .= "<td valign='top'>".$r->no_surat1."</td>";
	// 		$html .= "<td valign='top'align='center'>".$tgl_surat1."</td>";
	// 		$html .= "<td valign='top'>".$r->no_surat2."</td>";
	// 		$html .= "<td valign='top'align='center'>".$tgl_surat2."</td>";
    //         $html .= "<td valign='top'>".$r->ket."</td>";
	// 		//$html .= "<td valign='top'align='center'>".$sync[$r->issync]."</td>";
	// 		$html .= "<td valign='top'align='center'>".$sync[$issync['issync']]."</td>";
	// 		//
	// 		$html .= "</tr>";

	// 		$no++;
	// 	}

	// 	//echo $html;exit;

	// 	$filename = "rekening_satker_" . date('Ymd') . ".xls";

	// 	header("Content-Disposition: attachment; filename=\"$filename\"");
	// 	header("Content-Type: application/vnd.ms-excel");
	// 	echo $html;
	// 	exit;
	// }


    function cetak_rekening($kode_satker = '', $isadmin = 0) {
        // Prepare SQL condition
        $sqlp  = "";
        if ($this->session->superuser) {
            if ($kode_satker == 'all') $sqlp = " ";
            else $sqlp = "and a.kode = '{$kode_satker}'";
        } else {
            if ($kode_satker == '023113' || $kode_satker == '023117') 
            $sqlp = "and a.kode_atasan = '" . trim($this->session->username) . "'";
            else $sqlp = "and a.kode = '{$kode_satker}'";
        }

       // var_dump($kode_satker); // Debug query
       // return;


    
        // SQL Query
        $sql = "SELECT *, 
                (select nama from app_m_unor where kode = a.kode_atasan) as unit_utama 
                FROM app_m_unor a, app_m_unor_rekening b 
                where a.kode = b.kode_satker {$sqlp}";
        
        $query = $this->db->query($sql);
        
        // Check if query has results
        // if ($query->num_rows() == 0) {
        //     // Show message if no data found
        //     echo "Tidak ada data yang dapat diekspor.";
        //     return;
        // }
        
        // Generate Excel File
        $nama_bulan = strtoupper(NAMA_BULAN[date('m')]);
        $tahun = date('Y');
        $html = "<table width='100%' border='1'>
                    <tr>
                        <th colspan='16'>
                            <h2>REKAP REKENING SATKER DI LINGKUNGAN KEMENDIKBUDRISTEK {$nama_bulan} {$tahun}</h2>
                        </th>
                    </tr>
                    <tr>
                        <th rowspan='2' valign='middle'>No.</th>
                        <th rowspan='2' valign='middle'>Unit Utama</th>
                        <th rowspan='2' valign='middle'>Kode Satker</th>
                        <th rowspan='2' valign='middle'>Nama Satker</th>
                        <th rowspan='2' valign='middle'>No. Rekening</th>
                        <th rowspan='2' valign='middle'>Nama Rekening</th>
                        <th rowspan='2' valign='middle'>Nama Bank</th>
                        <th rowspan='2' valign='middle'>Jenis Rekening</th>
                        <th rowspan='2' valign='middle'>Tipe</th>
                        <th rowspan='2' valign='middle'>Kluster</th>
                        <th rowspan='2' valign='middle'>Status</th>
                        <th colspan='2' valign='middle'>Surat Pembukaan Rekening</th>
                        <th colspan='2' valign='middle'>Surat Penutupan Rekening</th>
                        <th rowspan='2' valign='middle'>Keterangan</th>
                        <th rowspan='2' valign='middle'>Sync Sprint</th>
                    </tr>
                    <tr>
                        <th valign='middle'>No. Surat</th>
                        <th valign='middle'>Tgl. Surat</th>
                        <th valign='middle'>No. Surat</th>
                        <th valign='middle'>Tgl. Surat</th>
                    </tr>";
        $no = 1;
        $status = ['Aktif', 'Non Aktif'];
        $sync = ['Tidak', 'Ya'];
        foreach ($query->result() as $r) {
            $tgl_surat1 = $r->tgl_surat1 == NULL ? '' : date('d-m-Y', strtotime($r->tgl_surat1));
            $tgl_surat2 = $r->tgl_surat2 == NULL ? '' : date('d-m-Y', strtotime($r->tgl_surat2));
            $issync = $this->check_sprint($r->kode, $r->no_rekening, false);
    
            $html .= "<tr>";
            $html .= "<td valign='top'>" . $no . "</td>";
            $html .= "<td valign='top'>" . $r->unit_utama . "</td>";
            $html .= "<td valign='top'>" . $r->kode . "</td>";
            $html .= "<td valign='top'>" . $r->nama . "</td>";
            $html .= "<td valign='top'>'" . $r->no_rekening . "</td>";
            $html .= "<td valign='top'>" . $r->nama_rekening . "</td>";
            $html .= "<td valign='top'>" . $r->nama_bank . "</td>";
            $html .= "<td valign='top'>" . $this->getrow('', 'app_m_jenis_rekening', 'nama', ['id' => $r->jenis_rekening])->nama . "</td>";
            $html .= "<td valign='top'>" . $this->getrow('', 'app_m_tipe_rekening', 'nama', ['id' => $r->tipe])->nama . "</td>";
            $html .= "<td valign='top'>" . $this->getrow('', 'app_m_cluster_rekening', 'nama', ['id' => $r->cluster])->nama . "</td>";
            $html .= "<td valign='top' align='center'>" . $status[$r->istatus] . "</td>";
            $html .= "<td valign='top'>" . $r->no_surat1 . "</td>";
            $html .= "<td valign='top' align='center'>" . $tgl_surat1 . "</td>";
            $html .= "<td valign='top'>" . $r->no_surat2 . "</td>";
            $html .= "<td valign='top' align='center'>" . $tgl_surat2 . "</td>";
            $html .= "<td valign='top'>" . $r->ket . "</td>";
            $html .= "<td valign='top' align='center'>" . $sync[$issync['issync']] . "</td>";
            $html .= "</tr>";
    
            $no++;
        }
    
        $html .= "</table>";
    
        $filename = "rekening_satker_" . date('Ymd') . ".xls";
    
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header("Content-Type: application/vnd.ms-excel");
        echo $html;
        exit;
    }
    


}
