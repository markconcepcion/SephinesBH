<?php
	class Order_model extends CI_Model
	{
		public function get_order_id()
		{
			$this->db->select("MAX(order_id) as maxid");	
			$this->db->from('orders');
			$query = $this->db->get();
			return $query->row()->maxid;
		}
		public function get_order_by_id($order_id)
		{
			$this->db->join('users', 'orders.user_id = users.user_id');
			$query = $this->db->get_where('orders', array('order_id' => $order_id));
			return $query->row_array();
		}
		
		public function get_orders($order_method = FALSE)
		{	
			if($order_method === FALSE){
				$this->db->select('orders.*,users.*,customers.*');
				$this->db->from('orders');
				$this->db->join('users', 'orders.user_id = users.user_id');
				$this->db->join('customers', 'orders.customer_id = customers.cus_id');
		
				$query = $this->db->get();
				$data_arr = $query->result();
				$data = array();

				foreach ($data_arr as $row) {
					$temp = $row;
					$temp->total_qty = $this->total_qty($row->order_id);
					$temp->total_amt = $this->total_amt($row->order_id);
					array_push($data, $temp);
				}

				return $data;
			} elseif ( $order_method === "Cash") {
				$this->db->select('orders.*,users.*');
				$this->db->from('orders');
				$this->db->join('users', 'orders.user_id = users.user_id');
				$this->db->where('orders.order_method', $order_method);

				$query = $this->db->get();
				$data_arr = $query->result();
				$data = array();

				foreach ($data_arr as $row) {
					$temp = $row;
					$temp->total_qty = $this->total_qty($row->order_id);
					$temp->total_amt = $this->total_amt($row->order_id);
					array_push($data, $temp);
				}
		
				return $data;
			} 
		}

		public function total_pd_bal($id)
		{
			$this->db->select("SUM(pay_amount) as TOTAL");
			$this->db->from('payments');
			$this->db->where('order_id', $id);

			$query = $this->db->get();
			return $query->row()->TOTAL ?? 0;
		}

		public function total_qty($id)
		{
			$this->db->select("SUM(ol_qty) as TOTAL");
			$this->db->from('orderlists');
			$this->db->where('order_id', $id);

			$query = $this->db->get();
			return $query->row()->TOTAL ?? 0;
		}

		public function total_amt($id)
		{
			$this->db->select("SUM(orderlists.ol_qty * items.price) as TOTAL");
			$this->db->from('orderlists');
			$this->db->join('items', 'orderlists.item_id = items.item_id');
			$this->db->where('orderlists.order_id', $id);

			$query = $this->db->get();
			return $query->row()->TOTAL ?? 0;
		}

		public function place_order($cus_id = FALSE)
		{
			if($cus_id > 1) {
				$data = array(  
					'user_id' => $this->input->post('user_id'),
					'customer_id' => $this->input->post('customer_id'),
					'order_method' => "Lay Away",
					'customer_id' => $cus_id,
				);
			} else {
				$data = array(  
					'user_id' => $this->input->post('user_id'),
					'customer_id' => $this->input->post('customer_id'),
					'order_method' => "Cash",
					'customer_id' => 1
				);	
			}
			return $this->db->insert('orders', $data);
		}
		public function delete($id)
		{
			$this->db->where('order_id', $id);
			$this->db->delete('orders');
			return true;
		}
	}