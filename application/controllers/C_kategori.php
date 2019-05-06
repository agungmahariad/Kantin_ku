<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kategori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('m_kategori');
		$this->load->library('session');
		$this->load->helper('url');
	}
	public function index()
	{
		$data['awal'] 				= true;
		$data['edit'] 				= FALSE;
		$data['kode']				= $this->m_kategori->autokode();
		$data['nama_admin'] 		= $this->session->userdata('nama');
		$cek = $data['tampildata']  = $this->m_kategori->tampildata();
		if ($cek) {
			$this->session->set_flashdata('success', 'Input Berhasil !');
		}
		else
		{
			$data['alert'] = $this->session->set_flashdata('error', 'Input Gagal !');
		}
		$this->load->view('v_kategori', $data);
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
	function makanan()
	{
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
		$data['awal'] 				= false;
		$data['edit'] 				= FALSE;
		$cek = $data['masuk'] 		= $this->m_kategori->input();
		if ($cek) {
			$data['success'] = TRUE;
			echo "<script>alert('Data Input Berhasil')</script>";
		}
		else
		{
			$data['success'] = FALSE;
			echo "<script>alert('Data Input Gagal')</script>";
		}
		redirect('c_kategori','refresh');
	}
	function editdata($kd_kategori)
	{
		$data['edit'] 		= $this->m_kategori->edit($kd_kategori)->row_array();
		$data['kode']	    = $this->m_kategori->autokode();
		$data['tampildata'] = $this->m_kategori->tampildata();
		$data['nama_admin'] = $this->session->userdata('nama');
		$this->load->view('v_kategori', $data);
	}
	function deletedata($kd_kategori)
	{
		$this->m_kategori->delete($kd_kategori);
		echo "<script>alert('Berhasil dihapus !')</script>";
		redirect('c_kategori','refresh');
	}
	function updatedata($kd_kategori)
	{
		$this->m_kategori->update($kd_kategori);
		echo "<script>alert('Data berhasil diupdate !')</script>";
		redirect('c_kategori','refresh');
	}
}

/* End of file C_kategori.php */
/* Location: ./application/controllers/C_kategori.php */