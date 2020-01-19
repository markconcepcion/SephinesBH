<?php
	class Orderlist_model extends CI_Model
	{
		public function additem()
		{
			$data = array(
				'ol_qty' => $this->input->post('quantity'),
				'item_id' => $this->input->post('item_id'),
				'order_id' => $this->input->post('order_id')
			);

			return $this->db->insert('orderlists', $data);
		}
		public function get_orderlists($order_id = FALSE)
		{
			if($order_id === FALSE) {
				$query = $this->db->get('orderlists');
				return $query->result_array();
			}

			$this->db->join('items', 'orderlists.item_id = items.item_id');
			$query = $this->db->get_where('orderlists', array('order_id' => $order_id));
			return $query->result_array(); 
		}

		public function item_exists($item_id)
		{
			$this->db->select("MAX(order_id) as item_order_id");
			$this->db->from('orderlists');
			$this->db->where('item_id', $item_id);
			$query = $this->db->get();
			$query->item_order_id ?? 0;
			return $query->row();
		}

		public function add_quantity($item_id, $newQty)
		{
			$ol = array(
				'ol_qty' => $newQty,
				'order_id' => $this->input->post('order_id')
			);

			$this->db->where('item_id', $item_id);
			return $this->db->update('orderlists', $ol);
		}
		
		public function delete_ol($ol_id)
		{
			$this->db->where('ol_id', $ol_id);
			$this->db->delete('orderlists');
			return true;
		}

		public function delete_All($order_id)
		{
			$this->db->where('order_id', $order_id);
			$this->db->delete('orderlists');
			return true;
		}


		public function get_current_id() 
		{
			$current_id = 0;
			
			$row = $this->db->query('SELECT MAX(order_id) AS `current_id` FROM `orderlists`')->row();
			
			if ($row) {
			    $current_id = $row->current_id; 
			}

		   return $current_id;
		}

	}