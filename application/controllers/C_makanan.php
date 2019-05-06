<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_makanan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('m_makanan');
	}

	public function index()
	{
		$data['edit'] 			= FALSE;
		$data['kode'] 			= $this->m_makanan->autokode();
		$data['datakategori'] 	= $this->m_makanan->tampilkategori();
		$data['datamakanan'] 	= $this->m_makanan->tampildata();
		$data['nama_admin'] 	= $this->session->userdata('nama');
		$this->load->view('v_makanan' ,$data);
	}
	function logout()
	{
		$this->session->sess_destroy();
		echo "<script>alert('Selamat tinggal !')</script>";
		redirect('c_login','refresh');
	}
	function dashboard()
	{
		redirect('c_dashboard');
	}
	function kategori()
	{
		redirect('c_kategori');
	}
	function pemasok()
	{
		redirect('c_pemasok');
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
	function inputdata()
	{
		$cek = $this->m_makanan->input();	
		if ($cek) {
			echo "<script>alert('Data berhasil diinput !')</script>";
			redirect('c_makanan','refresh');
		}
	}
	function editdata($kd_makanan)
	{
		$data['edit'] 			= $this->m_makanan->edit($kd_makanan)->row_array();
		$data['datakategori'] 	= $this->m_makanan->tampilkategori();
		$data['datamakanan'] 	= $this->m_makanan->tampildata();
		$data['nama_admin'] 	= $this->session->userdata('nama');
		$this->load->view('v_makanan',$data);
	}
	function deletedata($kd_makanan)
	{
		$this->m_makanan->delete($kd_makanan);
		echo "<script>alert('Data berhasil didelete !')</script>";
		redirect('c_makanan','refresh');
	}
	function updatedata($kd_makanan)
	{
		$this->m_makanan->update($kd_makanan);
		echo "<script>alert('Data berhasil diupdate !')</script>";
		redirect('c_makanan','refresh');
	}

}

/* End of file c_makanan.php */
/* Location: ./application/controllers/c_makanan.php */