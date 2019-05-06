<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_filter_penerimaan extends CI_Model {

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
						  ->from("tb_pnrm_uang p")
						  ->join("tb_kategori k", "p.kd_kategori = k.kd_kategori", "inner")
						  ->join("tb_makanan m", "p.kd_makanan = m.kd_makanan", "inner")
						  ->join("tb_pemasok e", "p.kd_pemasok = e.kd_pemasok", "inner")
						  ->get()
						  ->result();
		return $query;
	}
	function filterdata($tgl_awal, $tgl_akhir,$kategori)
	{	
		$query = "SELECT * FROM q_penerimaan WHERE tgl_pnrm BETWEEN '$tgl_awal' AND '$tgl_akhir' and kd_kategori = '$kategori'";
		return $this->db->query($query);
	}
}

/* End of file M_filter_penerimaan.php */
/* Location: ./application/models/M_filter_penerimaan.php */