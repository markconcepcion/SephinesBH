<?php
	/**
	* 
	*/
	class Database_model extends CI_Model
	{
		public function get_id($id, $tname)
		{
			$this->db->select('id');
			$this->db->from($tname);
			$this->db->where('id', $id);

			$query = $this->db->get();
			return $query->row()->TOTAL ?? 0;	
		}		
	}
