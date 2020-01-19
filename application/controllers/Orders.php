<?php
	class Orders extends CI_Controller
	{
		public function cash_transaction()
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('carts');	}

			$data['title'] = 'Cash Transactions';
			$data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));
			$data['orders'] = $this->order_model->get_orders("Cash");
			
			$this->load->view('templates/header', $data);
			$this->load->view('reports/index', $data);
			$this->load->view('templates/footer', $data);
		}

		public function layaway_transaction()
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}

			$data['title'] = 'Lay Away Transactions';
			$data['layaways'] = $this->customer_model->get_customers();
			//$data['layaways'] = $this->order_model->get_orders("Lay Away");
			$data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));

			
			$this->load->view('templates/header', $data);
			$this->load->view('reports/layaway', $data);
			$this->load->view('templates/footer', $data);
		}

		public function all_transaction()
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}
			
			$data['title'] = 'Sales Reports';
			$data['orders'] = $this->order_model->get_orders();
			$data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));
			
			$this->load->view('templates/header', $data);
			$this->load->view('reports/sales', $data);
			$this->load->view('templates/footer', $data);
		}

		public function void_order($order_id)
		{
			$this->order_model->delete($order_id);
			$this->orderlist_model->delete_All($order_id);

			$this->session->set_flashdata('success_msg', 'Success');
			redirect('orders/cash_transaction');

		}
	}