<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_barang extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}	
	function input($table)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal  = $this->input->post('tanggal');
		$kd_barang  = $this->input->post('kd_barang');
		$pemasok  = $this->input->post('kd_pemasok');
		$kategori =	$this->input->post('kd_kategori');
		$makanan  = $this->input->post('kd_makanan');
		$jumlah   = $this->input->post('jumlah');
		$satuan	  = $this->input->post('harga_satuan');
		$jual     = $this->input->post('harga_jual');
		$data = array(
			'kd_barang' => $kd_barang,
			'kd_pemasok' => $pemasok,
			'kd_kategori' => $kategori,
			'kd_makanan' => $makanan,
			'harga_satuan' => $satuan,
			'harga_jual' => $jual,
			'jumlah_makanan' => $jumlah,
			'tanggal' => $tanggal
		);
		$this->db->insert($table, $data);
		$data_barang = $this->db->select_max('kd_barang')->get('tb_barang');
		foreach ($data_barang->result() as $key ) {
			$kd_barangg = $key->kd_barang;
		}
		$data2 = array(
			'kd_barang' => $kd_barangg,
			'kd_pemasok' => $pemasok,
			'kd_kategori' => $kategori,
			'kd_makanan' => $makanan,
			'harga_satuan' => $satuan,
			'harga_jual' => $jual,
			'jumlah_makanan' => $jumlah,
			'jumlah_pnrm' => 0,
			'tgl_pnrm' => $tanggal
		);
		return $this->db->insert('tb_pnrm_uang',$data2); 
	}
	function tampildata()
	{
		$query = $this->db->select("*")
						  ->from("tb_barang b")
						  ->join("tb_pemasok p", "b.kd_pemasok = p.kd_pemasok", "inner")
						  ->join("tb_kategori k", "b.kd_kategori = k.kd_kategori", "inner")
						  ->join("tb_makanan m", "b.kd_makanan = m.kd_makanan", "inner")
						  ->get()
						  ->result();
		return $query;
	}
	function edit($kd_barang)
	{
		$this->db->where('kd_barang', $kd_barang);
		return $this->db->get('tb_barang');
	}
	function tampilpemasok()
	{
		return $this->db->get('tb_pemasok')->result();
	}
	function tampilkategori()
	{
		return $this->db->get('tb_kategori')->result();
	}
	function tampilmakanan()
	{
		return $this->db->get('tb_makanan')->result();
	}
	function makanan($kd_kategori)
	{
		$this->db->where('kd_kategori', $kd_kategori);
		return $this->db->get('tb_makanan');
	}
	function update($kd_barang)
	{
		date_default_timezone_set('Asia/Jakarta');
		$tanggal  = $this->input->post('tanggal');
		$pemasok  = $this->input->post('kd_pemasok');
		$kategori =	$this->input->post('kd_kategori');
		$makanan  = $this->input->post('kd_makanan');
		$jumlah   = $this->input->post('jumlah');
		$satuan	  = $this->input->post('harga_satuan');
		$jual     = $this->input->post('harga_jual');
		$data = array(
			'kd_pemasok' => $pemasok,
			'kd_kategori' => $kategori,
			'kd_makanan' => $makanan,
			'harga_satuan' => $satuan,
			'harga_jual' => $jual,
			'jumlah_makanan' => $jumlah,
			'tanggal' => $tanggal
		);
		$this->db->where('kd_barang', $kd_barang);
		$this->db->update('tb_barang', $data);
	}
	function delete($kd_barang)
	{
		$this->db->where('kd_barang', $kd_barang);
		return $this->db->delete('tb_barang');
	}
	function autokode()
	{
		$query  = "SELECT MAX(kd_barang) id FROM tb_barang";
		$row    = $this->db->query($query)->row_array();
		$count  = $row['id'];
		$count  = substr($count, 2,4);
		$count  = $count + 1;
		$codebr = "KB".str_pad($count,4,"0", STR_PAD_LEFT);
		return $codebr;
	}
}

/* End of file M_barang.php */
/* Location: ./application/models/M_barang.php */