<?php
	class Cart_model extends CI_Model
	{
		public function place_order($item_id)
		{
			$data = array(
				'orderList_qty' => $this->insert->post('quantity'),
				'item_id' => $item_id
			);

			return $this->db->insert('orderlists', $data);
		}
	}