<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_penerimaan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->helper('url');
		$this->load->model('m_penerimaan');
	}
	public function index()
	{
		$data['input'] 		  = FALSE;
		$data['edit'] 		  = TRUE;
		$data['total']		  = $this->m_penerimaan->totalpenerimaan();
		$data['nama_admin']   = $this->session->userdata('nama');
		$data['datapenerima'] = $this->m_penerimaan->tampildata();
		$data['datapemasok']  = $this->m_penerimaan->tampilpemasok();
		$data['datakategori'] = $this->m_penerimaan->tampilkategori();
		$data['datamakanan']  = $this->m_penerimaan->tampilmakanan();
		$this->load->view('v_penerimaan', $data);
	}
	function logout()
	{
		$this->session->sess_destroy();
		echo "<script>alert('Selamat tinggal !')</script>";
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
	function pengeluaran(){
		redirect('c_pengeluaran');
	}
	function filter_penerimaan()
	{
		redirect('c_filter_penerimaan');
	}
	function filter_pengeluaran()
	{
		redirect('c_filter_pengeluaran');
	}
	function inputuang()
	{
		$data['edit']		  = FALSE;
		$data['input']		  = TRUE;
		$data['total']		  = $this->m_penerimaan->totalpenerimaan();
		$data['nama_admin']   = $this->session->userdata('nama');
		$data['datapenerima'] = $this->m_penerimaan->tampildata();
		$data['datapemasok']  = $this->m_penerimaan->tampilpemasok();
		$data['datakategori'] = $this->m_penerimaan->tampilkategori();
		$data['datamakanan']  = $this->m_penerimaan->tampilmakanan();
		$this->load->view('v_penerimaan', $data);
	}
	function inputdata()
	{
		$cek = $this->m_penerimaan->input();
		if ($cek) {
			echo "<script>alert('Data berhasil diinput !')</script>";
			redirect('c_penerimaan','refresh');
		}
	}
	function editdata($kd_transaksi)
	{
		$data['nama_admin']   = $this->session->userdata('nama');
		$edit 		  		  = $this->m_penerimaan->edit($kd_transaksi)->row_array();
		$kd_kategori 		  = $edit['kd_kategori'];
		$data['edit'] 		  = $edit;
		$data['total']		  = $this->m_penerimaan->totalpenerimaan();
		$data['datapenerima'] = $this->m_penerimaan->tampildata();
		$data['datakategori'] = $this->m_penerimaan->tampilkategori();
		$data['datapemasok']  = $this->m_penerimaan->tampilpemasok();
		$data['datamakanan']  = $this->m_penerimaan->makanan($kd_kategori)->result();
		$this->load->view('v_penerimaan', $data);
	}
	function deletedata($kd_barang)
	{
		$this->m_penerimaan->delete($kd_barang);
		echo "<script>alert('Data berhasil dihapus !')</script>";
		redirect('c_penerimaan','refresh');
	}
}

/* End of file C_penerimaan.php */
/* Location: ./application/controllers/C_penerimaan.php */