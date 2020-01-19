<?php
	class Category_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function update_category()
		{
			$data = array(
				'cat_name' => $this->input->post('cat_name')
			);

			$this->db->where('cat_id', $this->input->post('cat_id'));
			return $this->db->update('categories', $data);	
		}

		public function get_categories($cat_id = FALSE)
		{
			if ($cat_id === FALSE) {
				$query = $this->db->get_where('categories', array('cat_stat' => "Active"));
				return $query->result_array();
			}

			$this->db->where('cat_id', $cat_id);
			$this->db->where('cat_stat', "Active");
			$result = $this->db->get('users');
			return $result->row_array();
		}
		public function get_categories_key($keyword)
		{
			$this->db->select('categories.*');
			$this->db->from('categories');
			$this->db->where("categories.cat_name LIKE '%$keyword%'");
			$query = $this->db->get();
			return $query->result_array();
		}

		

		public function create_category()
		{

			$data = array(
				 'cat_name' => $this->input->post('cat_name')
			);

			return $this->db->insert('categories', $data);
		}

		public function delete_category($cat_id)
		{
			$data = array( 'cat_stat' => "Inactive" );

			$this->db->where('cat_id', $cat_id);
			$this->db->update('categories', $data);
			return true;	
		}

		public function category_item()
		{

			$cat_name = url_title($this->input->post('cat_name'));

			$data = array(
				'cat_name' => $cat_name
			);

			$this->db->where('cat_id', $this->input->post('cat_id'));
			return $this->db->update('categories', $data);	
		}

		public function get_category($cat_id)
		{
			$query = $this->db->get_where('categories', array('cat_id' => $cat_id));
			return $query->row();
		}

	}