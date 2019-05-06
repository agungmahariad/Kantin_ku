<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function input()
	{
		$kd_kategori = $this->input->post('kd_kategori');
		$nama_kategori = $this->input->post('nama_kategori');
		$this->load->helper('url');
		$data = array(
			'kd_kategori' => $kd_kategori,
			'nama_kategori' => $nama_kategori
		);
		return $this->db->insert('tb_kategori', $data);
	}
	function tampildata()
	{
		return $this->db->get('tb_kategori')->result();
	}
	function edit($kd_kategori)
	{
		$this->db->where('kd_kategori', $kd_kategori);
		return $this->db->get('tb_kategori');
	}
	function delete($kd_kategori)
	{
		$this->db->where('kd_kategori', $kd_kategori);
		return $this->db->delete('tb_kategori');
	}
	function update($kd_kategori)
	{	
		$nama_kategori = $this->input->post('nama_kategori');
		$data = array(
			'nama_kategori' => $nama_kategori
		);
		$this->db->where('kd_kategori', $kd_kategori);
		$this->db->update('tb_kategori', $data);
	}
	function autokode()
	{
		$query  = "SELECT MAX(kd_kategori) id FROM tb_kategori";
		$row    = $this->db->query($query)->row_array();
		$count  = $row['id'];
		$count  = substr($count, 2,4);
		$count  = $count + 1;
		$codekt = "KK".str_pad($count, 4, "0",STR_PAD_LEFT);
		return $codekt;
	}
}

/* End of file M_kategori.php */
/* Location: ./application/models/M_kategori.php */