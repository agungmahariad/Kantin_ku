<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_barang extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('m_barang');
	}
	public function index()
	{
		$data['edit'] 		  = FALSE;
		$data['kode'] 		  = $this->m_barang->autokode();
		$data['nama_admin']   = $this->session->userdata('nama');
		$data['databarang']   = $this->m_barang->tampildata();
		$data['datapemasok']  = $this->m_barang->tampilpemasok();
		$data['datakategori'] = $this->m_barang->tampilkategori();
		$data['datamakanan']  = $this->m_barang->tampilmakanan();
		$this->load->view('v_barang',$data);
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
	function makanan()
	{
		redirect('c_makanan');
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
		$cek = $this->m_barang->input('tb_barang');
		if($cek) {
			echo "<script>alert('Data berhasil di input')</script>";
			redirect('c_barang','refresh');
		}
	}
	function getMakanan($kd_kategori) 
	{
		$data = $this->m_barang->makanan($kd_kategori);
		foreach ($data->result() as $key => $value) {
			echo "<option value='$value->kd_makanan'>$value->nama_makanan</option>";
		}
	}
	function editdata($kd_barang)
	{
		$edit  		   		  = $this->m_barang->edit($kd_barang)->row_array();
		$data['edit']  		  = $edit;
		$data['nama_admin']   = $this->session->userdata('nama');
		$data['databarang']   = $this->m_barang->tampildata();
		$data['datapemasok']  = $this->m_barang->tampilpemasok();
		$data['datakategori'] = $this->m_barang->tampilkategori();
		$data['datamakanan']  = $this->m_barang->tampilmakanan();
		$this->load->view('v_barang',$data);
	}
	function updatedata($kd_barang)
	{
		$this->m_barang->update($kd_barang);
		echo "<script>alert('Data berhasil di update!')</script>";
		redirect('c_barang','refresh');
	}
	function deletedata($kd_barang)
	{
		$this->m_barang->delete($kd_barang);
		echo "<script>alert('Data berhasl di hapus')</script>";
		redirect('c_barang','refresh');
	}

}

/* End of file C_barang.php */
/* Location: ./application/controllers/C_barang.php */