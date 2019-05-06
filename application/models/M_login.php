<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_login extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	function login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		
		$cek = $this->db->get('tb_user');
		if ($cek->num_rows() > 0) {
			$cek = $cek->row_array();
			$ses = array(
				'nama' => $cek['nama'],
				'username' => $cek['username'],
				'password' => $cek['password']
				);
			$this->session->set_userdata($ses);
			return true;
		}else{
			return false;
		}
	}
}

/* End of file M_login.php */
/* Location: ./application/models/M_login.php */