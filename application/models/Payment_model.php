<?php
	class Payment_model extends CI_Model
	{
		
		public function record_payment($id = FALSE)
		{
			if($id == FALSE) {
				$data = array(
					'order_id' => $this->input->post('order_id'),
					'pay_amount' => $this->input->post('amount')
				);
				
				return $this->db->insert('payments', $data);
			}

			$data = array(
				'order_id' => $id,
				'pay_amount' => $this->input->post('amount')
			);
			
			return $this->db->insert('payments', $data);
		}

		public function get_payments($order_id)
		{
			$this->db->join('payments', 'orders.order_id = payments.order_id');
			$query = $this->db->get_where('orders', array('orders.order_id' => $order_id));
			return $query->result_array();
		}
	}