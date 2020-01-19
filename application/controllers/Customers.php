<?php
	class Customers extends CI_Controller
	{

		public function cusLists()
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			$data['title'] = 'Customer Lists';
			$data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));
			$data['cus_array'] = $this->customer_model->get_customers();
			$this->load->view('templates/header', $data);
			$this->load->view('customers/customer_lists', $data);
			$this->load->view('templates/footer', $data);
		}

		public function searchLists()
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

		    $search_val = $this->input->post('inputsearch');
			$data['title'] = 'Customer Lists';
			$data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));
			$data['cus_array'] = $this->customer_model->get_customers_usingkeyword($search_val);
			$this->load->view('templates/header', $data);
			$this->load->view('customers/customer_lists', $data);
			$this->load->view('templates/footer', $data);
		}		

		public function view_record($cus_id)
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}

			$data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));
			$data['name'] = $this->input->post('cus_name');
			$data['title'] = $data['name'];
			$data['number'] = $this->input->post('cus_number');
			$data['address'] = $this->input->post('cus_address');
			$data['amount'] = $this->input->post('cus_amount');

			$order_id = $this->customer_model->get_order_id($cus_id);

			$data['users'] = $this->order_model->get_order_by_id($order_id);
			$data['payments'] = $this->payment_model->get_payments($order_id);
			$data['orderlists'] = $this->orderlist_model->get_orderlists($order_id);

			$this->load->view('templates/header', $data);
			$this->load->view('customers/viewCustomer', $data);
			$this->load->view('templates/footer', $data);
		}
	}