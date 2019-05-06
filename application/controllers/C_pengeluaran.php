<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pengeluaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('m_pengeluaran');
	}
	public function index()
	{
		$data['edit'] 				= FALSE;
		$data['kode'] 				= $this->m_pengeluaran->autokode();
		$data['nama_admin'] 		= $this->session->userdata('nama');
		$data['total']      		= $this->m_pengeluaran->totalpengeluaran();
		$data['datakategori'] 		= $this->m_pengeluaran->tampilkategori();
		$data['datapengeluaran'] 	= $this->m_pengeluaran->tampildata();
		$this->load->view('v_pengeluaran', $data);
	}
	function logout()
	{
		$this->session->sess_destroy();
		echo "<script>alert('Selamat tinggal !!')</script>";
		redirect('c_login','refresh');
	}
	function dashboard(){
		redirect('c_dashboard');
	}
	function kategori(){
		redirect('c_kategori');
	}
	function makanan(){
		redirect('c_makanan');
	}
	function pemasok()
	{
		redirect('c_pemasok');
	}
	function barang()
	{
		redirect('c_barang');
	}
	function penerimaan(){
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
	function inputdata()
	{
		$cek = $this->m_pengeluaran->input();
		if ($cek) {
			echo "<script>alert('Data berhasil diinput !')</script>";
			redirect('c_pengeluaran','refresh');
		}
	}
	function editdata($kd_pengeluaran)
	{
		$data['nama_admin'] 		= $this->session->userdata('nama');
		$data['edit']				= $this->m_pengeluaran->edit($kd_pengeluaran)->row_array();
		$data['total']      		= $this->m_pengeluaran->totalpengeluaran();
		$data['datakategori'] 		= $this->m_pengeluaran->tampilkategori();
		$data['datapengeluaran']	= $this->m_pengeluaran->tampildata();
		$this->load->view('v_pengeluaran', $data);	
	}
	function updatedata($kd_pengeluaran)
	{
		$this->m_pengeluaran->update($kd_pengeluaran);
		echo "<script>alert('Data berhasil diupdate !')</script>";
		redirect('c_pengeluaran','refresh');
	}
	function deletedata($kd_pengeluaran)
	{
		$this->m_pengeluaran->delete($kd_pengeluaran);
		echo "<script>alert('Data berhasil didelete !')</script>";
		redirect('c_pengeluaran','refresh');
	}
}

/* End of file C_pengeluaran.php */
/* Location: ./application/controllers/C_pengeluaran.php */