<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "M_kepegawaian_unor.php";
class M_tarik_pegawai extends MX_Controller {
  var $prefix = 'kepeg';
  
  var $ar_m_jabatan = array();
  var $ar_m_golongan = array();
  
  var $m_unor;
	public function __construct() {
		parent::__construct();
		$controller = "kepegawaian/m_tarik_pegawai";
		$table  = $this->prefix."_m_pegawai";
		
		$this->m_unor = new M_kepegawaian_unor;

   	    $this->_setTitle('Tarik Data Pegawai');
		$this->_setController($controller);
		$this->_init('default');

		$this->_addTable($table);
		$this->_addField($table, 'id', '', true, true);
		$this->_addField($table, 'cnip', 'NIP', true);
		$this->_addField($table, 'vname', 'Nama Lengkap', true);
		$this->_addField($table, 'cgolid', 'Pangkat/Golongan', false);
		$this->_addField($table, 'ijabid', 'Jabatan', false);
		$this->_addField($table, 'ikduker', 'Unit Kerja Baru', true);
		$this->_addField($table, 'istatus', 'Kedudukan Hukum', false, true);
		$this->_addField($table, 'tcreated', 'Waktu dibuat', false, true);
		$this->_addField($table, 'ccreatedby', 'Dibuat oleh', false, true);
		$this->_addField($table, 'tupdated', 'Waktu ubah', false, true);
		$this->_addField($table, 'cupdatedby', 'Diubah oleh', false, true);

        $this->session->unset_userdata('header_controller');
		$header_controller = array('header_controller' => 'kepegawaian/m_pegawai');
		$this->session->set_userdata($header_controller);
	}

    function insertBox_kepeg_m_pegawai_ikduker($name) {
        return $this->updateBox_kepeg_m_pegawai_ikduker($name, '');
    }

    function updateBox_kepeg_m_pegawai_ikduker($name, $value) {
        $id_unit = !empty($this->session->kodeunit) ? $this->session->kodeunit : '';
        $nm_unit = !empty($this->session->satker_name) ? $this->session->satker_name : (!empty($this->session->realname) ? $this->session->realname : '');

        // Fallback jika id_unit kosong di sesi
        if (empty($id_unit)) {
            $u = $this->getrow('', 'kepeg_m_unor', 'id, nama', ['kode_satker' => trim($this->session->username)]);
            if (empty($u)) {
                $u = $this->getrow('', 'kepeg_m_unor', 'id, nama', ['kode' => trim($this->session->username)]);
            }
            if (!empty($u)) {
                $id_unit = $u->id;
                if (empty($nm_unit)) $nm_unit = $u->nama;
            }
        }

        $input = "<input type='hidden' name='{$name}' class='{$name}' id='{$name}' value='{$id_unit}'/>";
        $input .= "<input readonly type='text' name='{$name}_txt' class='form-control {$name}_txt' id='{$name}_txt' value='{$nm_unit}'/>";

        return $input;
    }

    function insertBox_kepeg_m_pegawai_cnip($name) {
        return $this->updateBox_kepeg_m_pegawai_cnip($name, '');
    }

    function updateBox_kepeg_m_pegawai_cnip($name, $value) {
        $input = "<div class='input-group'>
                    <input type='text' name='{$name}' class='form-control {$name}' id='{$name}' value='' maxlength='18' placeholder='Masukkan 18 digit NIP pegawai lalu tekan Enter atau klik Cari' autocomplete='off'/>
                    <span class='input-group-btn'>
                        <button type='button' id='btn_search_nip' class='btn btn-info btn-flat'>
                            <i class='fa fa-search'></i> Cari
                        </button>
                    </span>
                  </div>";

        return $input;
    }

    function insertBox_kepeg_m_pegawai_vname($name) {
        return $this->updateBox_kepeg_m_pegawai_vname($name, '');
    }

    function updateBox_kepeg_m_pegawai_vname($name, $value) {
        $input = "<input type='text' name='{$name}' class='form-control {$name}' id='{$name}' readonly placeholder='Otomatis terisi setelah NIP dicari'/>";

        return $input;
    }

    function insertBox_kepeg_m_pegawai_ijabid($name) {
        return $this->updateBox_kepeg_m_pegawai_ijabid($name, '');
    }

    function updateBox_kepeg_m_pegawai_ijabid($name, $value) {
        $input = "<input type='hidden' name='{$name}' class='{$name}' id='{$name}' value=''/>";
        $input .= "<input readonly type='text' name='{$name}_txt' class='form-control {$name}_txt' id='{$name}_txt' value='' placeholder='Otomatis terisi setelah NIP dicari'/>";

        return $input;
    }

    function insertBox_kepeg_m_pegawai_cgolid($name) {
        return $this->updateBox_kepeg_m_pegawai_cgolid($name, '');
    }

    function updateBox_kepeg_m_pegawai_cgolid($name, $value) {
        $input = "<input type='hidden' name='{$name}' class='{$name}' id='{$name}' value=''/>";
        $input .= "<input readonly type='text' name='{$name}_txt' class='form-control {$name}_txt' id='{$name}_txt' value='' placeholder='Otomatis terisi setelah NIP dicari'/>";

        return $input;
    }

    function manipulate_insert_button($buttons) {
        $buttons['simpan'] = "<button type='button' class='btn btn-primary btn_save' style='display:none;'>
							       		<i class='fa fa-save' aria-hidden='true'> </i>
									   Simpan {$this->title}</button>";
        $buttons['kembali'] = "<button type='button' class='btn btn-default' onclick='$(\"#m_pegawai-panel-default-form\").hide();'>
                                        <i class='fas fa-window-close' aria-hidden='true'> </i>
                                       Tutup</button>";

        return $buttons;
    }

    function manipulate_url_save($save_method) {
        $save_method['method'] = "proses_tarik_pegawai();";
        return $save_method;
    }

    function kepeg_m_pegawai_output() {
        $js = "<script type='text/javascript'>
                function cari_pegawai_nip() {
                    var nip = $.trim($('#kepeg_m_pegawai_cnip').val());
                    if ( nip.length < 18 ) {
                        bootbox_alert('', '', 'NIP minimal 18 digit.', false, false);
                        return false;
                    }

                    $.post('".base_url()."kepegawaian/m_tarik_pegawai/get_pegawai_by_nip/'+nip+'/true', {}, function(data) {
                        var o = (typeof data === 'object') ? data : jQuery.parseJSON(data);
                        
                        if ( o && o.total > 0 ) {
                            $('#kepeg_m_pegawai_vname').val(o.data.nama || '');
                            $('#kepeg_m_pegawai_cgolid').val(o.data.golid || '');
                            $('#kepeg_m_pegawai_cgolid_txt').val(o.data.golnama || '-');
                            $('#kepeg_m_pegawai_ijabid').val(o.data.jabid || '');
                            $('#kepeg_m_pegawai_ijabid_txt').val(o.data.jabnama || '-');

                            $('#m_tarik_pegawai_form-edit .btn_save').show();
                        } else {
                            bootbox_alert('', '', 'Data pegawai tidak ditemukan! Cek kembali NIP Anda.', false, false);

                            $('#kepeg_m_pegawai_vname').val('');
                            $('#kepeg_m_pegawai_cgolid').val('');
                            $('#kepeg_m_pegawai_cgolid_txt').val('');
                            $('#kepeg_m_pegawai_ijabid').val('');
                            $('#kepeg_m_pegawai_ijabid_txt').val('');
                            
                            $('#m_tarik_pegawai_form-edit .btn_save').hide();
                        }
                    }).fail(function() {
                        bootbox_alert('', '', 'Gagal menghubungi server untuk pencarian NIP.', false, false);
                    });
                }

                function proses_tarik_pegawai() {
                    var form_name = 'm_tarik_pegawai_form-edit';
                    var form_elem = document.getElementById(form_name);
                    if (!form_elem) return false;
                    
                    var formData = new FormData(form_elem);
                    var nip = $.trim($('#kepeg_m_pegawai_cnip').val());
                    var nama = $.trim($('#kepeg_m_pegawai_vname').val());
                    var unit = $.trim($('#kepeg_m_pegawai_ikduker_txt').val());

                    if (nip.length < 18 || nama == '') {
                        bootbox_alert('', '', 'Silakan cari dan pastikan data pegawai valid sebelum menyimpan.', false, false);
                        return false;
                    }

                    bootbox.confirm({
                        title: 'Konfirmasi Tarik Data Pegawai',
                        message: 'Apakah Anda yakin ingin menarik data pegawai berikut ke unit <b>' + unit + '</b>?<br/><br/>' +
                                 '<b>NIP:</b> ' + nip + '<br/>' +
                                 '<b>Nama:</b> ' + nama,
                        buttons: {
                            confirm: { label: '<i class=\"fa fa-check\"></i> Ya, Tarik', className: 'btn-success' },
                            cancel: { label: '<i class=\"fa fa-times\"></i> Batal', className: 'btn-default' }
                        },
                        callback: function(result) {
                            if (result) {
                                $.ajax({
                                    url: '".base_url()."kepegawaian/m_tarik_pegawai/save',
                                    type: 'POST',
                                    data: formData,
                                    processData: false,
                                    contentType: false,
                                    success: function(output) {
                                        var o = (typeof output === 'object') ? output : safe_parse_json(output);
                                        if ( o && o.status ) {
                                            bootbox_alert('', '', o.msg || 'Data pegawai berhasil ditarik.', true, true);
                                            $('#m_pegawai-panel-default-form').hide();
                                            reload_grid('".base_url()."kepegawaian/m_pegawai/lists', 'm_pegawai');
                                        } else {
                                            bootbox_alert('', '', (o && o.msg) ? o.msg : 'Gagal menarik data pegawai.', false, false);
                                        }
                                    },
                                    error: function() {
                                        bootbox_alert('', '', 'Terjadi kesalahan pada server saat memproses penarikan data.', false, false);
                                    }
                                });
                            }
                        }
                    });
                }

                $(document).ready(function() {
                    $('#btn_search_nip').off('click').on('click', function(e) {
                        e.preventDefault();
                        cari_pegawai_nip();
                    });

                    $('#kepeg_m_pegawai_cnip').off('keydown').on('keydown', function(e) {
                        if ( e.which == 13 || e.keyCode == 13 ) {
                            e.preventDefault();
                            cari_pegawai_nip();
                            return false;
                        }
                    });

                    $('#m_tarik_pegawai_form-edit .btn_save').off('click').on('click', function(e) {
                        e.preventDefault();
                        proses_tarik_pegawai();
                    });
                });
                </script>";
        return $js;
    }

    function get_pegawai_by_nip($nip, $is_ajax=false) {
        $nip = trim($nip);
        $sql = "SELECT p.id, p.cnip, p.vname, p.cgolid, p.ijabid, 
                (SELECT CONCAT(nama, ', ', pangkat) FROM kepeg_m_golongan WHERE id = p.cgolid LIMIT 1) AS nama_pangkat, 
                (SELECT nama FROM kepeg_m_jabatan WHERE id = p.ijabid LIMIT 1) AS nama_jabatan 
                FROM kepeg_m_pegawai p WHERE p.cnip = ? LIMIT 1";
        $row = $this->db->query($sql, array($nip))->row();

        if ($row) {
            $datas = [
                'total' => 1,
                'data' => [
                    'nip' => $row->cnip,
                    'nama' => $row->vname,
                    'jabid' => $row->ijabid,
                    'jabnama' => !empty($row->nama_jabatan) ? $row->nama_jabatan : '-',
                    'golid' => $row->cgolid,
                    'golnama' => !empty($row->nama_pangkat) ? $row->nama_pangkat : '-'
                ]
            ];
        } else {
            $datas = ['total' => 0, 'data' => []];
        }

        if ( $is_ajax ) {
            echo json_encode($datas);
        } else {
            return $datas;
        }
    }

    function save() {
        $post = (object)$this->input->post();
        $nip = isset($post->kepeg_m_pegawai_cnip) ? trim($post->kepeg_m_pegawai_cnip) : '';
        $ikduker = isset($post->kepeg_m_pegawai_ikduker) ? trim($post->kepeg_m_pegawai_ikduker) : '';

        // Fallback jika ikduker kosong
        if (empty($ikduker)) {
            $ikduker = !empty($this->session->kodeunit) ? $this->session->kodeunit : '';
            if (empty($ikduker)) {
                $u = $this->getrow('', 'kepeg_m_unor', 'id', ['kode_satker' => trim($this->session->username)]);
                if (empty($u)) {
                    $u = $this->getrow('', 'kepeg_m_unor', 'id', ['kode' => trim($this->session->username)]);
                }
                if (!empty($u)) $ikduker = $u->id;
            }
        }

        $datas = ['status' => true];
        if ( strlen($nip) < 18 ) {
            $datas['status'] = false;
            $datas['msg'] = 'Lengkapi kolom NIP (minimal 18 digit)';
            $datas['obj'] = 'kepeg_m_pegawai_cnip';
        } elseif ( empty($ikduker) ) {
            $datas['status'] = false;
            $datas['msg'] = 'Unit kerja tujuan tidak valid atau belum terdaftar.';
            $datas['obj'] = 'kepeg_m_pegawai_ikduker';
        } else {
            $get_pegawai = $this->get_pegawai_by_nip($nip);
            
            if ( $get_pegawai['total'] == 0 ) {
                $datas['status'] = false;
                $datas['msg'] = 'Data pegawai tidak ditemukan.';
            } else {
                $data = [
                    'ikduker' => $ikduker,
                    'tupdated' => date('Y-m-d H:i:s'),
                    'cupdatedby' => trim($this->session->username)
                ];
                $where = ['cnip' => $nip];

                try {
                    $this->db->where($where);
                    $this->db->update($this->prefix."_m_pegawai", $data);

                    $datas['status'] = true;
                    $datas['msg'] = 'Data pegawai ' . $get_pegawai['data']['nama'] . ' (' . $nip . ') berhasil ditarik ke unit kerja Anda.';
                } catch (Exception $e) {
                    $datas['status'] = false;
                    $datas['msg'] = 'Data gagal diupdate: ' . $e->getMessage();
                }
            }
        }

        echo json_encode($datas);
    }
}