<?php
	class Item_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function delete_item($id)
		{
			$data = array( 'item_stat' => "Not Active" );
			$this->db->where('item_id', $id);
			$this->db->update('items', $data);
			return true;	
		}

		public function get_items($item_id = FALSE)
		{
			if ($item_id === FALSE) {
				$query = $this->db->get_where('items', array('item_stat' => "Active"));
				return $query->result_array();
			}

			$query = $this->db->get_where('items', array('item_id' => $item_id, 'item_stat' => "Active"));
			return $query->row_array();
		}

		public function get_items_sold($item_name = FALSE)
		{	

			if($item_name === FALSE){
				$this->db->select('item_id,category_id,item_name,item_description,item_image,price');
				$query = $this->db->get('items');

				$data_arr = $query->result();
				$data = array();

				foreach ($data_arr as $row) {
					$temp = $row;
					$item_id = $row->item_id;
					$qty = $this->total_sold_items($item_id);
					$temp->sold_qty = $qty;
					array_push($data, $temp);
				}

				return $data;
			}

			$this->db->select('item_id,category_id,item_name,item_description,item_image,price');
			$query = $this->db->get_where('items', array('item_name' => $item_name ));
			$data_arr = $query->result();
			$data = array();

			foreach ($data_arr as $row) {
				$temp = $row;
				$item_id = $row->item_id;
				$qty = $this->total_sold_items($item_id);
				$temp->sold_qty = $qty;
				array_push($data, $temp);
			}
			$this->db->order_by($data->sold_qty, "asc");
			return $data;
		}

		public function total_sold_items($id)
		{
			$this->db->select("SUM(ol_qty) as TOTAL");
			$this->db->from('orderlists');
			$this->db->where('item_id', $id);

			$query = $this->db->get();
			return $query->row()->TOTAL ?? 0;
		}

		public function create_item($item_image, $cat_id)
		{

			$item_name = url_title($this->input->post('item_name'));

			$data = array(

				'item_name' => $item_name,
				'item_description' => $this->input->post('item_description'),
				'price' => $this->input->post('price'),
				'category_id' => $cat_id,
				'item_image' => $item_image
			);

			return $this->db->insert('items', $data);
		}

		

		public function update_item()
		{

			$item_name = url_title($this->input->post('item_name'));

			$data = array(
				'item_name' => $item_name,
				'item_description' => $this->input->post('item_description'),
				'price' => $this->input->post('price'),
			);

			$this->db->where('item_id', $this->input->post('item_id'));
			return $this->db->update('items', $data);	
		}

		public function get_items_by_category($category_id)
		{
			$this->db->order_by('items.item_id', 'DESC');

			$this->db->join('categories', 'categories.cat_id = items.category_id');
			$query = $this->db->get_where('items', array('category_id' => $category_id, 'item_stat' => "Active"));
			return $query->result_array(); 
		}

		public function search_items_key($category_id, $keyword)
		{
			$this->db->order_by('items.item_id', 'DESC');
			$this->db->join('categories', 'categories.cat_id = items.category_id');
			$this->db->where("items.item_name LIKE '%$keyword%'");
			$query = $this->db->get_where('items', array('category_id' => $category_id, 'item_stat' => "Active"));
			return $query->result_array(); 
		}
	}