<?php
	class Orderlists extends CI_Controller
	{
		public function delete($ol_id) {
			$this->orderlist_model->delete_ol($ol_id);
			redirect('carts');
		}

		public function deleteAll($order_id) {
			$this->orderlist_model->delete_All($order_id);
			redirect('carts');
		}

		public function rankings() {
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}

			$data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));
			$data['title'] = 'Item Rankings';
			$data['items'] = $this->item_model->get_items_sold();
			
			$this->load->view('templates/header', $data);
			$this->load->view('reports/items', $data);
			$this->load->view('templates/footer', $data);
		}

		public function view_cash($order_id)
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}

			$data['title'] = 'Order Details';
			$data['o_d'] = $this->order_model->get_order_by_id($order_id);
			$data['ol_d'] = $this->orderlist_model->get_orderlists($order_id);
			$data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));

			$this->load->view('templates/header', $data);
			$this->load->view('reports/view_cash', $data);
			$this->load->view('templates/footer', $data);
		}
	}