<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('m_login');
		$this->load->helper('url');
		$this->load->library('session');
	}
	public function index()
	{
		$this->load->view('v_login');
	}
	function login(){
		$cek = $this->m_login->login();
		if ($cek == true) {
			echo "<script>alert('Berhasil Login !')</script>";
			redirect('c_dashboard','refresh');
		}else{
			echo "<script>alert('Username atau Password anda salah !')</script>";
			redirect('c_login','refresh');
		}
		$this->session->sess_destroy();
	}
}

/* End of file C_login.php */
/* Location: ./application/controllers/C_login.php */