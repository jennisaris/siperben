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
		$this->template->display('user/form_login');
	}
	
	public function doLogin() {
		
		$this->form_validation->set_rules('username', 'NIP', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->form_validation->set_error_delimiters('<div style="text-align:left;margin-top:5px;" class="alert alert-danger" role="alert">', '</div>');
			$this->template->display('user/form_login');						
		} else {
			$username = $this->security->xss_clean($this->input->post('username'));
			$password = $this->security->xss_clean($this->input->post('password'));
			$sess_data = $this->_getUserInfo($username, $password);		
			//print_r($sess_data);
			//exit;
			
			if ( $sess_data['success'] == 1 ) { //berhasil				
				$this->session->set_userdata($sess_data);
				
				if (empty($this->session->email)) {
				  redirect(base_url().'privileges/change_password/edit/'.$this->session->userid);
				}
	            if ( !empty($this->session->last_url) ) {
                    $exclude_ext = $this->config->item('exclude_ext');
                    $ext = end(explode(".", $this->session->last_url));
                    if (!in_array($ext, $exclude_ext) && 
                    !in_array($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3), $this->exclude_controller) ) {
                            redirect($this->session->last_url);
                    } else redirect($this->url_index); 
	            } else {
                    //redirect($this->dashboard_index);
					if ( $this->session->redirect_page != '' ) redirect($this->session->redirect_page);
					else redirect($this->dashboard_index);
	            }
			} else if ( $sess_data['success'] == 0 ) {
				$data['error_message'] = '<div style="text-align:left;margin-top:5px;" class="alert alert-danger" role="alert">Invalid Username / Password</div>';
				$this->template->display('user/form_login', $data);
			} else {
				if ( empty($sess_data['error_message']) )
					$data['error_message'] = '<div style="text-align:left;margin-top:5px;" class="alert alert-danger" role="alert">Data user '.$username.' belum memiliki informasi jabatan terakhir. Mohon untuk dilengkapi. Terima Kasih.</div>';
				else $data['error_message'] = '<div style="text-align:left;margin-top:5px;" class="alert alert-danger" role="alert">'.$sess_data['error_message'].'</div>';
				
				$this->template->display('user/form_login', $data);
			}
			
		}
	}
	
	public function doLogout() {			
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('last_url');	
		$this->session->unset_userdata($this->config->item('session').'ar_menu');
		$this->session->unset_userdata('sysparam');
		$this->session->unset_userdata('superuser');
			
		redirect("/index.php");
	}	
	
	private function _getUserInfo($username, $password) {
		$sess_data = array();
		
		$sql = "SELECT * FROM {$this->prefix}_{$this->table} where username = '{$username}'"; 		
		//echo $sql;exit;
		$query = $this->db->query($sql);
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
						//tambahan
						$sess_data['kode_lama']    = $r->kode_lama;
						$sess_data['username2'] = [$r->username,$r->kode_lama];

						//cek apakah dr groupny ada yg isadmin
						//echo "select count(isadmin) as isadmin from priv_t_group where id in ({$r->igroupid})";
						//exit;
						$sess_data['isadmin'] = $this->db->query("select count(isadmin) as isadmin from priv_t_group 
						where id in ({$r->igroupid}) and isadmin = 1")->row()->isadmin;
						

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
						//unors
						
						$orgs = array();
						$orgs2 = array();
						if (trim($username) != trim($sess_data['sysparam']->superuser[0])) {
							$kodeunits = $this->getall('', 'kepeg_m_unor', 'id', 
								array('kode_satker'=>trim($username))
							);

							$kodeunits[] = (object)array('id'=>trim($username));

							$kodeunit_ = $this->getrow('', 'kepeg_m_unor', 'id, id_atasan', 
								array('kode_satker'=>trim($username))
							);
							
							$kodeunit = $kodeunit_->id;
							$kodeatasan = $kodeunit_->id_atasan;

							array_push($orgs2, trim($kodeunit));
							array_push($orgs2, trim($username));
							array_push($orgs2, trim($r->kode_lama));

							$orgs[trim($username)] = trim($username);
							$orgs[trim($r->kode_lama)] = trim($r->kode_lama);
							$m_unor = new M_unor;
							$m_unor->getRekursifUnit(trim($username), $orgs);
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
						//echo $sql;exit;
						$kodeunitutamas = $this->db->query($sql)->result();
						//print_r($kodeunitutamas);exit;
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
