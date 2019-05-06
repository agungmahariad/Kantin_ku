<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pemasok extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('m_pemasok');
	}
	public function index()
	{
		$data['edit'] 		  = FALSE;
		$data['kode'] 		  = $this->m_pemasok->autokode();
		$data['nama_admin']   = $this->session->userdata('nama');
		$data['datapemasok']  = $this->m_pemasok->tampildata();
		$this->load->view('v_pemasok',$data);
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
		$cek = $this->m_pemasok->input();
		if($cek) {
			echo "<script>alert('Data berhasil di input')</script>";
			redirect('c_pemasok','refresh');
		}
	}
	function updatedata($id_pemasok)
	{
		$this->m_pemasok->update($id_pemasok);
		echo "<script>alert('Data Berhasil Di Update!')</script>";
		redirect('c_pemasok','refresh');
	}
	function editdata($id_pemasok)
	{
		$edit  		   = $this->m_pemasok->edit($id_pemasok)->row_array();
		$data['edit']  = $edit;
		$data['nama_admin']   = $this->session->userdata('nama');
		$data['datapemasok']  = $this->m_pemasok->tampildata();
		$this->load->view('v_pemasok',$data);
	}
	function deletedata($id_pemasok)
	{
		$this->m_pemasok->delete($id_pemasok);
		echo "<script>alert('Data berhasl di hapus')</script>";
		redirect('c_pemasok','refresh');
	}
}

/* End of file C_pemasok.php */
/* Location: ./application/controllers/C_pemasok.php */