<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_filter_pengeluaran extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('m_filter_pengeluaran');
	}
	public function index()
	{
		$data['awal']			= true;
		$data['tgl_awal']       = NULL;
		$data['tgl_akhir']      = NULL;
		$data['kategori'] 		= NULL;

		$data['total'] 			= $this->m_filter_pengeluaran->totalpengeluaran();
		$data['tampildata']  	= $this->m_filter_pengeluaran->tampildata();
		$data['datakategori']   = $this->m_filter_pengeluaran->tampilkategori();
		$data['nama_admin'] 	= $this->session->userdata('nama');
		$this->load->view('v_filter_pengeluaran',$data);
	}
	function filter()
	{
		$tgl_awal  		= $this->input->post('tgl_awal');
		$tgl_akhir 		= $this->input->post('tgl_akhir');
		$kategori  		= $this->input->post('kd_kategori');
		$data['awal'] 	= false;

		$data['tgl_awal']			= $tgl_awal;
		$data['tgl_akhir']			= $tgl_akhir;
		$data['kategori']			= $kategori;
		$data['nama_admin'] 		= $this->session->userdata('nama');
		$data['datakategori']   	= $this->m_filter_pengeluaran->tampilkategori();
		$data['total'] 				= $this->m_filter_pengeluaran->totalpengeluaran();
		$cek = $data['tampildata']  = $this->m_filter_pengeluaran->filterdata($tgl_awal,$tgl_akhir,$kategori)->result();
		if ($cek) {
			$data['alert'] = $this->session->set_flashdata('success', 'Filter Berhasil !');
		}
		else
		{
			$data['alert'] = $this->session->set_flashdata('error', 'Filter Gagal !');
		}
		$this->load->view('v_filter_pengeluaran',$data);	
	}
	function excel()
	{
		$tgl_awal  			= $this->input->post('tgl_awal');
		$tgl_akhir			= $this->input->post('tgl_akhir');
		$kategori 			= $this->input->post('kd_kategori');

		$data['tampildata'] = $this->m_filter_pengeluaran->filterdata($tgl_awal,$tgl_akhir,$kategori)->result();
		$data['total']		= $this->m_filter_pengeluaran->totalpengeluaran();
		if ($tgl_awal == "" || $tgl_akhir == "") {
			$data['tampildata'] = $this->m_filter_pengeluaran->tampildata();
		}
		header("Content-type:application/vnd-ms-excel");
		header("Content-Disposition: attachment; filename = $tanggal-datasiswa.xls");
		$this->load->view('data_pengeluaran', $data);
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
	function pengeluaran()
	{
		redirect('c_pengeluaran');
	}

}

/* End of file C_filter_pengeluaran.php */
/* Location: ./application/controllers/C_filter_pengeluaran.php */