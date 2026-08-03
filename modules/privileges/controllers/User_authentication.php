<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once "modules/kepegawaian/controllers/M_kepegawaian_unor.php";
require_once "modules/perbend/controllers/M_unor.php";
class User_authentication extends MX_Controller {
	var $exclude_ext;
	var $exclude_controller;
	var $theme;
	var $table;
	var $prefix;
	
	//dashboard
	var $dashboard_index;
	
	public function __construct() {
		parent::__construct();		
		$this->load->library('security');
		$this->load->library('form_validation');
		$this->load->helper('form');	
		
		$this->prefix = 'priv';
		$this->theme  = $this->config->item('theme');
		$this->table  = 't_user';	
		
		//dashboard
		$this->dashboard_index    = $this->config->item('dashboard_index');
		
		//clear session header_controller
		$this->session->unset_userdata('header_controller');	
		
		$this->exclude_ext = $this->config->item('exclude_ext');
		$this->exclude_controller = $this->config->item('exclude_controller');
	}
	
	public function index() {
		if (!isset($this->session->logged_in)) {					
			$this->formLogin();
		} else {
			if ( $this->session->redirect_page != '' ) redirect($this->session->redirect_page);
			else redirect($this->dashboard_index);
		}
	}
	
	
	public function formLogin() {
		$data = $this->set_captch();
		$this->template->display('user/form_login', $data);
	}
	
	public function doLogin()
	{
		// Proses autentikasi hanya untuk POST.
		// Jika endpoint dologin terbuka via GET/refresh setelah login, arahkan kembali
		// supaya user tidak terjebak di halaman 405 Method Not Allowed.
		if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
			if (isset($this->session->logged_in)) {
				if (!empty($this->session->redirect_page)) {
					redirect($this->session->redirect_page);
				}
				redirect($this->dashboard_index);
			}

			redirect('privileges/user_authentication');
			return;
		}

		// Validasi input
		$this->form_validation->set_rules('username', 'Username / Email', 'trim|required', array('required' => 'Username/email wajib diisi.'));
		$this->form_validation->set_rules('password', 'Kata Sandi', 'trim|required', array('required' => 'Kata sandi wajib diisi.'));
		$this->form_validation->set_rules('captcha', 'Kode Captcha', 'trim|required', array('required' => 'Kode captcha wajib diisi.'));
		if ($this->form_validation->run() === FALSE) {
			$data = $this->set_captch(); // load ulang captcha
			$validation_message = trim(strip_tags(validation_errors(' ', ' ')));
			if ($validation_message === '') {
				$validation_message = 'Mohon lengkapi data login yang wajib diisi.';
			}
			$data['error_message'] = $this->login_alert('Data login belum lengkap', $validation_message, 'warning', array('Lengkapi username/email, kata sandi, dan kode captcha.', 'Lalu tekan tombol Masuk kembali.'));
			$this->template->display('user/form_login', $data);
			return;
		}

		// ⛔ CEK RATE LIMIT DI SINI
		if (!$this->is_login_allowed()) {
			$data = $this->set_captch();
			$data['error_message'] = $this->login_alert('Akses sementara dibatasi', 'Terlalu banyak percobaan login dari perangkat ini.', 'warning', array('Silakan coba lagi dalam 15 menit.', 'Pastikan username/email, password, dan captcha sudah benar sebelum mencoba kembali.'));
			$this->template->display('user/form_login', $data);
			return;
		}

		// Ambil data input & bersihkan
		$username = $this->security->xss_clean($this->input->post('username', TRUE));
		$password = $this->security->xss_clean($this->input->post('password', TRUE));
		$captcha_input = $this->security->xss_clean($this->input->post('captcha', TRUE));

		// Validasi CAPTCHA
		$expiration = time() - 7200; // 2 jam
		$this->db->where('captcha_time <', $expiration)->delete('captcha');

$sql = "SELECT COUNT(*) AS count FROM captcha 
		WHERE word = ? AND ip_address = ? AND captcha_time > ?";
$binds = [$captcha_input, $this->input->ip_address(), $expiration];
$query = $this->db->query($sql, $binds);
$row = $query->row();

if ($row->count == 0) {
	$this->record_login_attempt();
	$data = $this->set_captch();
	$data['error_message'] = $this->login_alert('Captcha belum sesuai', 'Kode captcha yang dimasukkan tidak cocok atau sudah kedaluwarsa.', 'warning', array('Masukkan ulang kode captcha terbaru pada gambar.', 'Perhatikan huruf besar, huruf kecil, dan angka.'));
	$this->template->display('user/form_login', $data);
	return;
}


		// Proses login user
		$sess_data = $this->_getUserInfo($username, $password);

		if (!isset($sess_data['success']) || $sess_data['success'] !== 1) {
			$this->record_login_attempt();
			$data = $this->set_captch();
			$data['error_message'] = $this->login_alert('Login belum berhasil', 'Username/email atau kata sandi yang dimasukkan belum sesuai.', 'danger', array('Periksa kembali penulisan username/email.', 'Pastikan tombol Caps Lock tidak aktif saat mengetik kata sandi.', 'Jika lupa kata sandi, gunakan tautan Lupa Kata Sandi di bawah form.'));
			$this->template->display('user/form_login', $data);
			return;
		}

		// Login berhasil
		$this->session->set_userdata($sess_data);

		// Cek email kosong → redirect ke ubah password
		if (empty($this->session->email)) {
			redirect(base_url().'privileges/change_password/edit/'.$this->session->userid);
		}

		// Cek apakah ada last_url
		if (!empty($this->session->last_url)) {
			$exclude_ext = $this->config->item('exclude_ext');
			$url_parts = explode('.', $this->session->last_url);
			$ext = end($url_parts);

			$controller_path = $this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3);
			if (!in_array($ext, $exclude_ext) && !in_array($controller_path, $this->exclude_controller)) {
				redirect($this->session->last_url);
			} else {
				redirect($this->url_index);
			}
		}

		// Redirect default dashboard
		if (!empty($this->session->redirect_page)) {
			redirect($this->session->redirect_page);
		} else {
			redirect($this->dashboard_index);
		}
	}

	// public function doLogin() {
		
	// 	$this->form_validation->set_rules('username', 'NIP', 'trim|required');
	// 	$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
	// 	if ($this->form_validation->run() == FALSE) {
	// 		$data = $this->set_captch();
	// 		$this->form_validation->set_error_delimiters('<div style="text-align:left;margin-top:5px;" class="alert alert-danger" role="alert">', '</div>');
	// 		$this->template->display('user/form_login', $data);						
	// 	} else {
	// 		$username = $this->security->xss_clean($this->input->post('username'));
	// 		$password = $this->security->xss_clean($this->input->post('password'));
	// 		$captcha = $this->security->xss_clean($this->input->post('captcha'));
	// 		$sess_data = $this->_getUserInfo($username, $password);		
	// 		//print_r($sess_data);
	// 		//exit;
			
	// 		if ( $sess_data['success'] == 1 ) { //berhasil
				
	// 			$expiration = time() - 7200; // Two hour limit
	// 			$this->db->where('captcha_time < ', $expiration)->delete('captcha');
				
	// 			// Then see if a captcha exists:
	// 			$captcha = $captcha;
	// 			$sql = 'SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?';
	// 			$binds = array($captcha, $this->input->ip_address(), $expiration);
	// 			$query = $this->db->query($sql, $binds);
	// 			$row = $query->row();

	// 			if ($row->count == 0){
	// 				$success = 0;
	// 				$cap = $this->set_captch();
	// 				$data['cap'] = $cap['cap'];
	// 				$data['error_message'] = '<div style="text-align:left;margin-top:5px;" class="alert alert-danger" role="alert">Kode Captcha tidak sesuai. Silahkan ulangi</div>';
	// 				$return = $this->template->display('user/form_login', $data);
	// 			} else {
	// 				$this->session->set_userdata($sess_data);
					
	// 				if (empty($this->session->email)) {
	// 					redirect(base_url().'privileges/change_password/edit/'.$this->session->userid);
	// 				}

	// 				if ( !empty($this->session->last_url) ) {
	// 					$exclude_ext = $this->config->item('exclude_ext');
	// 					$ext = end(explode(".", $this->session->last_url));
	// 					if (!in_array($ext, $exclude_ext) && 
	// 					!in_array($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3), $this->exclude_controller) ) {
	// 							redirect($this->session->last_url);
	// 					} else redirect($this->url_index); 
	// 				} else {
	// 					//redirect($this->dashboard_index);
	// 					if ( $this->session->redirect_page != '' ) redirect($this->session->redirect_page);
	// 					else redirect($this->dashboard_index);
	// 				}
	// 			}
	// 		} else if ( $sess_data['success'] == 0 ) {
	// 			$cap = $this->set_captch();
	// 			$data['cap'] = $cap['cap'];
	// 			$data['error_message'] = $this->login_alert('Login belum berhasil', 'Username/email atau kata sandi yang dimasukkan belum sesuai.', 'danger', array('Periksa kembali penulisan username/email.', 'Pastikan tombol Caps Lock tidak aktif saat mengetik kata sandi.', 'Jika lupa kata sandi, gunakan tautan Lupa Kata Sandi di bawah form.'));
	// 			$return = $this->template->display('user/form_login', $data);
	// 		} else {
	// 			if ( empty($sess_data['error_message']) )
	// 				$data['error_message'] = '<div style="text-align:left;margin-top:5px;" class="alert alert-danger" role="alert">Data user '.$username.' belum memiliki informasi jabatan terakhir. Mohon untuk dilengkapi. Terima Kasih.</div>';
	// 			else $data['error_message'] = '<div style="text-align:left;margin-top:5px;" class="alert alert-danger" role="alert">'.$sess_data['error_message'].'</div>';
				
	// 			$return = $this->template->display('user/form_login', $data);
			
	// 		}
			
	// 	}

	// 	return $return;
	// }
	
	public function doLogout() {			
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('last_url');	
		$this->session->unset_userdata($this->config->item('session').'ar_menu');
		$this->session->unset_userdata('sysparam');
		$this->session->unset_userdata('superuser');
			
		$this->formLogin();
	}	

	function set_captch() {
		//
		/* $files = glob('uploads/captcha/*.jpg');
		foreach($files as $f) {
			unlink($f);
		} */
		// $vals = array(
		// 	'word'          => '',
		// 	'img_path'      => FCPATH . 'uploads/captcha/',
		// 	'img_url'       => base_url().'uploads/captcha/',
		// 	'font_path'     => '',//./path/to/fonts/texb.ttf;./fonts/Open_Sans/OpenSans-VariableFont_wdth,wght.ttf
		// 	'img_width'     => '260',
		// 	'img_height'    => '80',
		// 	'expiration'    => '7200',
		// 	'word_length'   => '5',
		// 	'font_size'     => '200px',
		// 	'img_id'        => 'Imageid',
		// 	'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
		
		// 	// White background and border, black text and red grid
		// 	'colors'        => array(
		// 			'background' => array(255, 255, 255),
		// 			'border' => array(255, 255, 255),
		// 			'text' => array(0, 0, 0),
		// 			'grid' => array(255, 40, 40)
		// 	)
		// );

		 $vals = array(
        'word'          => '',
        'img_path'      => 'uploads/captcha/',
        'img_url'       => base_url().'uploads/captcha/',
        'font_path'     => FCPATH . 'fonts/Arial/arial.ttf', // Pastikan jalur font valid
        'img_width'     => '200',
        'img_height'    => 60,
        'expiration'    => 7200,
        'word_length'   => 5,
        'font_size'     => 20, // Ukuran font captcha
        'img_id'        => 'Imageid',
        'pool'          => '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ',
    
        // Pengaturan warna (background, border, text, grid)
        'colors'        => array(
            'background' => array(255, 255, 255),
            'border' => array(255, 255, 255),
            'text' => array(0, 0, 0),
            'grid' => array(255, 40, 40)
        	)
    	);

		$cap = create_captcha($vals);
		if ($cap === FALSE) {
			log_message('error', 'Gagal membuat captcha. Periksa img_path/uploads/captcha, GD extension, dan font_path.');
			$cap = array(
				'time' => time(),
				'word' => '',
				'image' => '<div class="alert alert-warning">Captcha belum dapat dibuat. Silakan hubungi administrator.</div>'
			);
		}
		$data = array(
				'captcha_time'  => $cap['time'],
				'ip_address'    => $this->input->ip_address(),
				'word'          => $cap['word']
		);
		
		$query = $this->db->insert_string('captcha', $data);
		$this->db->query($query);

		$data['cap'] = $cap['image'];
		return $data;
	}
	
	private function is_login_allowed()
	{
		$ip = $this->input->ip_address();
		$limit_time = time() - (15 * 60); // 15 menit ke belakang

		$this->db->where('ip_address', $ip);
		$this->db->where('attempt_time >', date("Y-m-d H:i:s", $limit_time));
		$attempts = $this->db->count_all_results('login_attempts');

		return $attempts < 5; // Maksimal 5 kali percobaan dalam 15 menit
	}

	private function record_login_attempt()
	{
		$data = [
			'ip_address' => $this->input->ip_address()
		];
		$this->db->insert('login_attempts', $data);
	}



	private function login_alert($title, $message, $tone = 'danger', $tips = array())
	{
		$allowed_tones = array('danger', 'warning', 'info', 'success');
		if (!in_array($tone, $allowed_tones)) {
			$tone = 'danger';
		}

		$icons = array(
			'danger' => 'fa-exclamation-triangle',
			'warning' => 'fa-shield-alt',
			'info' => 'fa-info-circle',
			'success' => 'fa-check-circle'
		);

		$html  = '<div class="login-alert login-alert-'.$tone.'" role="alert" aria-live="polite">';
		$html .= '<div class="login-alert-icon"><i class="fa '.$icons[$tone].'"></i></div>';
		$html .= '<div class="login-alert-content">';
		$html .= '<strong>'.html_escape($title).'</strong>';
		$html .= '<p>'.html_escape($message).'</p>';

		if (!empty($tips)) {
			$html .= '<ul>';
			foreach ($tips as $tip) {
				$html .= '<li>'.html_escape($tip).'</li>';
			}
			$html .= '</ul>';
		}

		$html .= '</div></div>';
		return $html;
	}

	private function _getUserInfo($username, $password) {
		$sess_data = array();
		
		$sql = "SELECT * FROM {$this->prefix}_{$this->table} where username = ?"; 		
		//echo $sql;exit;
		$query = $this->db->query($sql, array($username));
		if ( $query ) {
			if ( $query->num_rows() > 0 ) {
				$r = $query->row();
				$hash = $r->password;
				if ( password_verify($password, $hash) ) {

					if ($r->ldeleted == 0 ) {
				
						$sess_data['groupid']      = $r->igroupid;
						$sess_data['userid']       = $r->id;
						$sess_data['success']      = 1;
						$sess_data['username']     = $r->username;
						$sess_data['realname']     = $r->realname;
						$sess_data['tlastvisited'] = $r->tlastvisited;
						$sess_data['superuser']    = $r->isuperuser;
						$sess_data['logged_in']    = TRUE;
						$sess_data['page']         = 0;
						$sess_data['jum_page']     = 0;
						$sess_data['jum_rec']      = 0;
						$sess_data['page']         = 0;
						$sess_data['allowview']    = 0;
						$sess_data['allowadd']     = 0;
						$sess_data['allowedit']    = 0;
						$sess_data['allowdelete']  = 0;
						$sess_data['login_sso']    = 0;//$login_sso;
						$sess_data['offset']       = 0;
						$sess_data['tlastvisited'] = $r->tlastvisited;
						$sess_data['redirect_page'] = $r->credirect_page;
						$sess_data['settahun']		= trim($r->ctahun);
						$sess_data['email'] = trim($r->email);
						$sess_data['satker_name'] = trim($r->realname);
						
						//tambahan
						$kode_lama = explode(",", $r->kode_lama);
						array_push($kode_lama, $r->username);
						$sess_data['username2'] = $kode_lama;

						//cek apakah dr groupny ada yg isadmin
						$igroupids = array_filter(array_map('intval', explode(',', $r->igroupid)));
						$this->db->select('count(isadmin) as isadmin');
						$this->db->from('priv_t_group');
						$this->db->where_in('id', $igroupids);
						$this->db->where('isadmin', 1);
						$sess_data['isadmin'] = $this->db->get()->row()->isadmin;

						// Cek kelengkapan data registrasi operator
						$reg = $this->db
							->from('app_t_registrasi')
							->group_start()
								->where('approved_user_id', $r->id)
								->or_where('satker_kode', $r->username)
								->or_where('nip', $r->username)
							->group_end()
							->where('status', 'disetujui')
							->order_by('id', 'DESC')
							->get()
							->row();

						$sess_data['registration_completed'] = ($reg && !empty($reg->nip) && !empty($reg->nama_lengkap) && !empty($reg->satuan_kerja) && !empty($reg->pangkat_golongan) && !empty($reg->no_hp) && !empty($reg->email));

						//get menu
						if ( $this->theme == 'sb-admin-2' ) {
							$sess_data[$this->config->item('session').'_ar_menu'] = $this->rekursifSBAdmin2(0, $sess_data['groupid'], 1);
						} else if ( $this->theme =='AdminLTE-2.3.11' ) {
							$sess_data[$this->config->item('session').'_ar_menu'] = $this->rekursifAdminLTE(0, $sess_data['groupid'], 1);	
						} else if ( $this->theme == 'gentela-gh-pages' ) {
							$sess_data[$this->config->item('session').'_ar_menu'] = $this->rekursifGentelaGH(0, $sess_data['groupid'], 1);
						} else {
							$sess_data[$this->config->item('session').'_ar_menu'] = $this->rekursifMenu(0, $sess_data['groupid'], 1);
						}

						$sess_data['sysparam'] = $this->getSysparam('*');
						if (trim($username) != trim($sess_data['sysparam']->superuser[0])) {
							$satker_info = $this->getrow('', 'app_m_unor', 'nama', array('kode'=>trim($username)));
							if (empty($satker_info) || empty($satker_info->nama)) {
								$satker_info = $this->getrow('', 'kepeg_m_unor', 'nama', array('kode_satker'=>trim($username)));
							}
							if (!empty($satker_info) && !empty($satker_info->nama)) {
								$sess_data['satker_name'] = trim($satker_info->nama);
								$sess_data['realname'] = $sess_data['satker_name'];
							}
						}
						//unors
						
						$orgs = array();
						$orgs2 = array();
						$kodeunits = array();
						$kodeunit = '';
						$kodeatasan = '';
						if (trim($username) != trim($sess_data['sysparam']->superuser[0])) {
							$kodeunits = $this->getall('', 'kepeg_m_unor', 'id', 
								array('kode_satker'=>trim($username))
							);

							$kodeunits[] = (object)array('id'=>trim($username));

							$kodeunit_ = $this->getrow('', 'kepeg_m_unor', 'id, id_atasan', 
								array('kode_satker'=>trim($username))
							);
							
							$kodeunit = isset($kodeunit_->id) ? $kodeunit_->id : '';
							$kodeatasan = isset($kodeunit_->id_atasan) ? $kodeunit_->id_atasan : '';

							array_push($orgs2, trim($kodeunit));
							array_push($orgs2, trim($username));
							foreach($kode_lama as $k) {
								$orgs2[trim($k)] = trim($k);
							}

							$orgs[trim($username)] = trim($username);
							foreach($kode_lama as $k) {
								$orgs[trim($k)] = trim($k);
							}
							//$orgs[trim($r->kode_lama)] = trim($r->kode_lama);

							
							$m_unor = new M_unor;
							$m_unor->getRekursifUnit(trim($username), $orgs);
						}

						// Jika bukan superuser, tambahkan/pastikan satker dari DAFTAR SATKER.xlsx sesuai unit eselon 1
						if (!$sess_data['superuser']) {
							$excel_satkers = get_excel_satkers_by_eselon(trim($username));
							if (empty($excel_satkers) && !empty($kodeunit)) {
								$excel_satkers = get_excel_satkers_by_eselon(trim($kodeunit));
							}
							if (!empty($excel_satkers)) {
								foreach ($excel_satkers as $esat) {
									$orgs[trim($esat)] = trim($esat);
								}
							}
						}

						$sess_data['orgs'] = $orgs;
						$sess_data['kodeunits'] = $kodeunits;
						$sess_data['kodeunit'] = $kodeunit;
						
						//print_r($kodeunits);
						//print_r($orgs);
						//exit;
						$m_unor2 = new M_kepegawaian_unor;					
						//$m_unor2->getRekursifUnit2(trim($kodeunit), $orgs2);
						foreach($kodeunits as $k) {
							array_push($orgs2, trim($k->id));
							$m_unor2->getRekursifUnit2(trim($k->id), $orgs2);
						}
						
						//echo $username;
						$sess_data['orgs2'] = $orgs2;
						
						//print_r($orgs);
						//print_r($orgs2);
						//exit;

						//echo $username.' => '.trim($sess_data['sysparam']->kode_kemendikbud[0]);
						$qwhere = "";
						if (!$sess_data['superuser']) {
						if (!$sess_data['isadmin']) {
							$qwhere = " and id = '".trim($kodeatasan)."'";
						} else {
							if ( trim($username) != trim($sess_data['sysparam']->kode_kemendikbud[0]))
								$qwhere = " and ( id = '".trim($kodeunit)."' or id_atasan = '".trim($kodeunit)."') ";
							else $qwhere = " and id = '".trim($kodeunit)."' and id_atasan = '".trim($kodeatasan)."' ";
						}
						} else {
						$qwhere = " and id_atasan = '".trim($sess_data['sysparam']->kode_kemendikbud[0])."' ";
						}
						
						//unit utama
						/* $unor_not_in = [
						'9CB6A40F8C883E8AE050640A2A0313C3',
						'8ae483a66d00679b016d145f0d2705ec',
						'8ae483c67f791fb9017f8ba3fad54ea2',
						'8ae483a675cebb760175d9c952531976'
						];*/

						$unor_not_in = [
							'1628',
							'12886',
							'14988',
							'15006'
						];
						$unor_not_in_ = "'".implode("','", $unor_not_in)."'";
						$sql="SELECT id, kode,nama,kode_satker,abbrv FROM kepeg_m_unor WHERE 
								date_expired IS NULL 
								AND id NOT IN (".$unor_not_in_.") 
								{$qwhere} 
								order by id asc";
						$kodeunitutamas = $this->db->query($sql)->result();

						if (!$sess_data['superuser']) {
							$excel_eselon_satkers = get_excel_satkers_by_eselon(trim($username));
							if (empty($excel_eselon_satkers) && !empty($kodeunit)) {
								$excel_eselon_satkers = get_excel_satkers_by_eselon(trim($kodeunit));
							}
							if (!empty($excel_eselon_satkers)) {
								$str_satkers = implode(',', array_map(array($this->db, 'escape'), $excel_eselon_satkers));
								$db_satkers = $this->db->query("SELECT id, kode, nama, kode_satker, abbrv FROM kepeg_m_unor WHERE (kode_satker IN ({$str_satkers}) OR kode IN ({$str_satkers})) ORDER BY nama ASC")->result();

								$unique_utamas = array();
								$seen_codes = array();
								if (!empty($db_satkers)) {
									foreach ($db_satkers as $u) {
										$ksat = !empty($u->kode_satker) ? trim($u->kode_satker) : trim($u->kode);
										if (!isset($seen_codes[$ksat])) {
											$seen_codes[$ksat] = true;
											$full_name = get_excel_satker_name($ksat, $u->nama);
											$u->nama = $full_name;
											$u->abbrv = $full_name;
											$unique_utamas[] = $u;
										}
									}
								}
								if (!empty($unique_utamas)) {
									$kodeunitutamas = $unique_utamas;
								}
							}
						}

						$sess_data['kodeunitutamas'] = $kodeunitutamas;
					} else { 
						$sess_data['success'] = 2;
						$sess_data['error_message'] = "Status username {$username} non aktif. Silahkan hubungi administrator anda.";
					}
				} else $sess_data['success'] = 0;
			} else $sess_data['success'] = 0;
		} else {
			$sess_data['success'] = 0;
		}

		return $sess_data;
	}
}
?>
