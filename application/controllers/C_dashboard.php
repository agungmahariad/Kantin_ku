<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
	}
	public function index()
	{
		$data['nama_admin'] = $this->session->userdata('nama');
		$this->load->view('v_dashboard' ,$data);
	}
	function logout()
	{
		$this->session->sess_destroy();
		echo "<script>alert('Selamat tinggal !')</script>";
		redirect('c_login','refresh');
	}
	function pemasok(){
		redirect('c_pemasok');
	}
	function kategori()
	{
		redirect('c_kategori');
	}
	function makanan()
	{
		redirect('c_makanan');
	}
	function barang()
	{
		redirect('c_barang');
	}
	function penerimaan()
	{
		redirect('c_penerimaan');
	}
	function filter_penerimaan()
	{
		redirect('c_filter_penerimaan');
	}
	function filter_pengeluaran()
	{
		redirect('c_filter_pengeluaran');
	}
	function pengeluaran()
	{
		redirect('c_pengeluaran');
	}
}

/* End of file C_dashboard.php */
/* Location: ./application/controllers/C_dashboard.php */