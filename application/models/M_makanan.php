<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_makanan extends CI_Model {

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
						  ->from("tb_makanan m")
						  ->join("tb_kategori k", "m.kd_kategori = k.kd_kategori", "inner")
						  ->get()
						  ->result();
		return $query;
	}
	function input()
	{
		$kd_makanan  = $this->input->post('kd_makanan');
		$kategori    = $this->input->post('kd_kategori');
		$makanan     = $this->input->post('makanan');
		$this->load->helper('url');
		$data = array(
			'kd_makanan' => $kd_makanan,
			'kd_kategori' => $kategori,
			'nama_makanan' => $makanan
		);
		return $this->db->insert('tb_makanan',$data);
	}
	function edit($kd_makanan)
	{
		$this->db->where('kd_makanan', $kd_makanan);
		return $this->db->get('tb_makanan');
	}
	function delete($kd_makanan)
	{
		$this->db->where('kd_makanan',$kd_makanan);
		return $this->db->delete('tb_makanan');
	}
	function update($kd_makanan)
	{
		$kategori  = $this->input->post('kd_kategori');
		$makanan   = $this->input->post('makanan');
		$data = array(
			'kd_kategori' => $kategori,
			'nama_makanan' => $makanan
			);
		$this->db->where('kd_makanan', $kd_makanan);
		$this->db->update('tb_makanan',$data);
	}
	function autokode()
	{
		$query  = "SELECT MAX(kd_makanan) id FROM tb_makanan";
		$row    = $this->db->query($query)->row_array();
		$count  = $row['id'];
		$count  = substr($count, 2,4);
		$count  = $count + 1;
		$codemk = "KM".str_pad($count,4,"0", STR_PAD_LEFT);
		return $codemk;
	}
}

/* End of file M_makanan.php */
/* Location: ./application/models/M_makanan.php */