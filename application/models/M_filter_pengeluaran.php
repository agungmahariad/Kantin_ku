<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_filter_pengeluaran extends CI_Model {

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
	function filterdata($tgl_awal,$tgl_akhir,$kategori)
	{
		$query = "SELECT * FROM q_pengeluaran WHERE tgl_pnglrn BETWEEN '$tgl_awal' AND '$tgl_akhir' and kd_kategori = '$kategori'";
		return $this->db->query($query);
	}
	function totalpengeluaran()
	{
		$this->db->select_sum('jumlah_pnglrn', 'total');
		$view = $this->db->get('tb_pnglrn_uang')->row_array();
		return $view['total'];
	}
}

/* End of file M_filter_pengeluaran.php */
/* Location: ./application/models/M_filter_pengeluaran.php */