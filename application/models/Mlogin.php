<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Mlogin extends CI_Model 
	{
		public function cek_user_arsip($data) 
		{
			$this->db->select('*');
			$this->db->from('tb_user');
			$this->db->where($data);
			$this->db->where('status','Aktif');
			$query=$this->db->get();
			return $query;
		}
	}

?>