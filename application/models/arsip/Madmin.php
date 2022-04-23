<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Madmin extends CI_Model{

		public function get_count(){
			$sql = "SELECT count(id_log) AS pengaduan FROM tbjrp_log";
			$result = $this->db->query($sql);
    		return $result->row()->pengaduan;
		}

		public function get_count_selesai(){
			$sql = "SELECT count(status) AS count_selesai FROM tbjrp_log where status='selesai'";
			$result = $this->db->query($sql);
    		return $result->row()->count_selesai;
		}

		public function get_count_proses(){
			$sql = "SELECT count(status) AS count_proses FROM tbjrp_log where status='Dalam Proses'";
			$result = $this->db->query($sql);
    		return $result->row()->count_proses;
		}

		function tampil_kategori(){
			return $query = $this->db->get('tbjrp_kategori');
		}

		public function tampil_log(){
			return $query = $this->db->get('tbjrp_log');
		}

		public function tampil_subkategori(){
			return $query = $this->db->get('tbjrp_subkategori');
		}

		public function chart_data(){
			// $sql	= "SELECT count(id_log) AS ch_id_sub, id_subkategori, kategori, sub_kategori from tblog, tbkategori, tbsubkategori GROUP BY id_subkategori";
			// $result = $this->db->query($sql);
			// return $result->row()->ch_id_sub;
			
			$this->db->select('*');
        	$this->db->from('tbjrp_log');
        	$this->db->join('tbjrp_subkategori','tbjrp_subkategori.id_sub=tbjrp_log.id_subkategori');
        	$this->db->join('tbjrp_kategori','tbjrp_kategori.id_kategori=tbjrp_subkategori.id_kategori');

	        return $query = $this->db->get();

			return $query = $this->db->get('tbjrp_kategori','tbjrp_log','tbjrp_subkategori');
		}

		// Fungsi Master User
		function tampil_data_user(){
			return $this->db->get('tb_user');
		}
	
		function input_data_user($data1,$table){
			$this->db->insert($table,$data1);
		}
	
		function edit_data_user($where,$table){      
			return $this->db->get_where($table,$where);
		}
	
		function update_data_user($where,$data,$table){
			$this->db->where($where);
			$this->db->update($table,$data);
		}
	
		function hapus_data_user($where,$table){
			$this->db->where($where);
			$this->db->delete($table);
		}
	}
?>