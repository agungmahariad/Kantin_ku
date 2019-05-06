<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengeluaran extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function tampilkategori()
	{
		return $this->db->get('tb_kategori')->result();
	}
	function tampildata()
	{
		$query = $this->db->select("*")
		                  ->from("tb_pnglrn_uang p")
		                  ->join("tb_kategori k" ,"p.kd_kategori = k.kd_kategori", "inner")
		                  ->get()
		                  ->result();
   		return $query;
	}
	function totalpengeluaran()
	{
		$this->db->select_sum('jumlah_pnglrn', 'total');
		$view = $this->db->get('tb_pnglrn_uang')->row_array();
		return $view['total'];
	}
	function input()
	{
		date_default_timezone_set('Asia/Jakarta');
		$pengeluaran  	= $this->input->post('kd_pengeluaran');
		$tanggal  		= $this->input->post('tanggal');
		$kategori 		= $this->input->post('kategori');
		$keterangan 	= $this->input->post('keterangan');
		$jumlah 		= $this->input->post('jumlah');
		$data = array(
			'kd_pengeluaran' => $pengeluaran,
			'kd_kategori' => $kategori,
			'keterangan' => $keterangan,
			'jumlah_pnglrn' => $jumlah,
			'tgl_pnglrn' => $tanggal
		);
		return $this->db->insert('tb_pnglrn_uang', $data);
	}
	function edit($kd_pengeluaran)
	{
		$this->db->where('kd_pengeluaran',$kd_pengeluaran);
		return $this->db->get('tb_pnglrn_uang');
	}
	function update($kd_pengeluaran)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal 		= $this->input->post('tanggal');
		$kategori 		= $this->input->post('kategori');
		$keterangan 	= $this->input->post('keterangan');
		$jumlah 		= $this->input->post('jumlah');
		$data = array(
			'kd_kategori' => $kategori,
			'keterangan' => $keterangan,
			'jumlah_pnglrn' => $jumlah,
			'tgl_pnglrn' => $tanggal
		);
		$this->db->where('kd_pengeluaran', $kd_pengeluaran);
		$this->db->update('tb_pnglrn_uang', $data);
	}
	function delete($kd_pengeluaran)
	{
		$this->db->where('kd_pengeluaran', $kd_pengeluaran);
		return $this->db->delete('tb_pnglrn_uang');
	}
	function autokode()
	{
		$query  = "SELECT MAX(kd_pengeluaran) id FROM tb_pnglrn_uang";
		$row    = $this->db->query($query)->row_array();
		$count  = $row['id'];
		$count  = substr($count, 2,4);
		$count  = $count + 1;
		$codepe = "KP".str_pad($count,4,"0",STR_PAD_LEFT);
		return $codepe;

	}
}

/* End of file M_pengeluaran.php */
/* Location: ./application/models/M_pengeluaran.php */