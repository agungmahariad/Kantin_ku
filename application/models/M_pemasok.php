<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pemasok extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	
	function input()
	{
		$kd_pemasok  = $this->input->post('kd_pemasok');
		$pemasok     = $this->input->post('pemasok');
		$telepon     = $this->input->post('telepon');
		$alamat      = $this->input->post('alamat');
		$data = array(
			'kd_pemasok' => $kd_pemasok,
			'nama_pemasok' => $pemasok,
			'no_telepon'   => $telepon,
			'alamat' 	   => $alamat
		);
		return $this->db->insert('tb_pemasok', $data);
	}
	function update($kd_pemasok)
	{
		$pemasok  = $this->input->post('pemasok');
		$telepon  = $this->input->post('telepon');
		$alamat   = $this->input->post('alamat');
		$data = array(
			'nama_pemasok' => $pemasok,
			'no_telepon'   => $telepon,
			'alamat' 	   => $alamat
		);
		$this->db->where('kd_pemasok', $kd_pemasok);
		$this->db->update('tb_pemasok', $data);
	}
	function tampildata()
	{
		return $this->db->get('tb_pemasok')->result();
	}
	function edit($kd_pemasok)
	{
		$this->db->where('kd_pemasok', $kd_pemasok);
		return $this->db->get('tb_pemasok');
	}
	function makanan($kd_kategori)
	{
		$this->db->where('kd_kategori', $kd_kategori);
		return $this->db->get('tb_makanan');
	}
	function delete($kd_pemasok)
	{
		$this->db->where('kd_pemasok', $kd_pemasok);
		return $this->db->delete('tb_pemasok');
	}
	function autokode()
	{
		$query  = "SELECT MAX(kd_pemasok) id FROM tb_pemasok";
		$row    = $this->db->query($query)->row_array();
		$count  = $row['id'];
		$count  = substr($count, 2,4);
		$count  = $count + 1;
		$codepm = "KP".str_pad($count,4,"0",STR_PAD_LEFT);
		return $codepm;
	}
}

/* End of file M_pemasok.php */
/* Location: ./application/models/M_pemasok.php */