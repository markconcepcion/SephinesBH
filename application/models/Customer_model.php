<?php
	class Customer_model extends CI_Model
	{
		public function get_customers()
		{
				$this->db->select('customers.*,orders.*');
				$this->db->from('customers');
				$this->db->join('orders', 'customers.cus_id = orders.customer_id');
				$this->db->join('users', 'orders.user_id = users.user_id');
				$this->db->where('orders.order_method', "Lay Away");
				$query = $this->db->get();

				$data_arr = $query->result();
				$data = array();

				foreach ($data_arr as $row) {
					$temp = $row;
					$temp->tprice = $this->get_tprice($row->order_id);
					$temp->tpaid = $this->get_tpaid($row->order_id);
					array_push($data, $temp);
				}
	
				return $data;
		}

		public function get_customers_usingkeyword($keyword)
		{
				$this->db->select('customers.*,orders.*');
				$this->db->from('customers');
				$this->db->join('orders', 'customers.cus_id = orders.customer_id');
				$this->db->join('users', 'orders.user_id = users.user_id');
				$this->db->where("customers.cus_name LIKE '%$keyword%'");
				$query = $this->db->get();

				$data_arr = $query->result();
				$data = array();

				foreach ($data_arr as $row) {
					$temp = $row;
					$temp->tprice = $this->get_tprice($row->order_id);
					$temp->tpaid = $this->get_tpaid($row->order_id);
					array_push($data, $temp);
				}
	
				return $data;
		}

		public function get_order_id($cus_id)
		{
			$this->db->select('order_id');
			$this->db->from('orders');
			$this->db->where('orders.customer_id', $cus_id);

			$query = $this->db->get();
			return $query->row()->order_id ?? 0;
		}

		public function get_tprice($id)
		{
			$this->db->select("SUM(orderlists.ol_qty*items.price) as TOTAL");
			$this->db->from('orderlists');
			$this->db->join('items', 'orderlists.item_id = items.item_id');
			$this->db->where('orderlists.order_id', $id);

			$query = $this->db->get();
			return $query->row()->TOTAL ?? 0;
		}

		public function get_tpaid($id)
		{
			$this->db->select("SUM(pay_amount) as TOTAL");
			$this->db->from('payments');
			$this->db->where('payments.order_id', $id);

			$query = $this->db->get();
			return $query->row()->TOTAL ?? 0;
		}

		public function record_info	()
		{
			$data = array(
				'cus_name' => $this->input->post('cus_name'),
				'cus_contactNo' => $this->input->post('cus_no'),
				'cus_address' => $this->input->post('cus_add')
			);

			$this->db->insert('customers', $data);
			$query = $this->db->get_where('customers', array('cus_name' => $this->input->post('cus_name')));
			return $query->row_array();
		}

		public function get_id()
		{
			$this->db->select("MAX(cus_id) as maxid");
			$this->db->from('customers');

			$query = $this->db->get();
			return $query->row()->maxid ?? 0;
		}
	}