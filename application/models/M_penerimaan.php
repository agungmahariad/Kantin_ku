<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_penerimaan extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
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
	function tampildata()
	{
		$query = $this->db->select("*")
						  ->from("tb_pnrm_uang p")
						  ->join("tb_barang b", "p.kd_barang = b.kd_barang", "inner")
						  ->join("tb_pemasok e", "p.kd_pemasok = e.kd_pemasok", "inner")
						  ->join("tb_kategori k", "p.kd_kategori = k.kd_kategori", "inner")
						  ->join("tb_makanan m", "p.kd_makanan = m.kd_makanan", "inner")
						  ->get()
						  ->result();
		return $query;
	}
	function totalpenerimaan()
	{
		$this->db->select_sum('jumlah_pnrm','total');
		$view = $this->db->get('tb_pnrm_uang')->row_array();
		return $view['total'];
	}
	function input()
	{	
		$num = $this->db->select("*")->get('tb_pnrm_uang')->num_rows();
		for ($i=0; $i <=$num+1 ; $i++) { 
			$this->db->set("jumlah_pnrm",$this->input->post('uang'.$i));
			$this->db->where("kd_barang",$this->input->post('kd_barang'.$i));
			$cek = $this->db->update("tb_pnrm_uang");
			if ($cek) {
				echo $this->input->post('uang'.$i);
				echo $this->input->post('kd_barang'.$i);
			}else{
				$this->db->error_message();
			}
		}
		return true;
	}
	function delete($kd_barang)
	{
		$this->db->where('kd_barang', $kd_barang);
		return $this->db->delete('tb_pnrm_uang');
	}
}

/* End of file M_penerimaan.php */
/* Location: ./application/models/M_penerimaan.php */