<?php
	class Carts extends CI_Controller
	{
		public function display_items()
		{
			$data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));
			
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			
			$data['cats'] = $this->category_model->get_categories();
			$data['items'] = $this->item_model->get_items();
			$data['order_id'] = $this->order_model->get_order_id() + 1;
			$data['orderLists'] = $this->orderlist_model->get_orderlists($data['order_id']);

			$this->load->view('templates/header', $data);
       		$this->load->view('carts/shoppingCart',  $data);
        	$this->load->view('templates/footer', $data);
		}

		public function addtoCart()
		{	
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}
			
			$data['title'] = 'Place Order';
			
			$item_id = $this->input->post('item_id');
			$order_id = $this->input->post('order_id');
			$ol_qty = $this->input->post('quantity');

			$query = $this->orderlist_model->item_exists($item_id);
			$item_order_id = $query->item_order_id;

			$this->form_validation->set_rules('quantity', 'Quantity', 'required');

			if($this->form_validation->run() === FALSE) {
				$data['items'] = $this->item_model->get_items();
				$data['order_id'] = $this->order_model->get_order_id() + 1;
				$data['orderLists'] = $this->orderlist_model->get_orderlists($data['order_id']);
				$this->load->view('templates/header', $data);
       			$this->load->view('carts/shoppingCart',  $data);
        		$this->load->view('templates/footer', $data);
			} else {
				if ($ol_qty < 1) {
					if($query != null) {
						if($item_order_id === $order_id) {
							if(($query->ol_qty + $ol_qty) <= 0 ) {
								$this->session->set_flashdata('item_deleted', 'Item Successfully Deleted');
								redirect('carts');
							} else {
								$newQty = $ol_qty + $query['ol_qty'];
								$this->orderlist_model->add_quantity($item_id, $newQty);
								redirect('carts');
							}
						} else {
							$this->session->set_flashdata('item_deleted', 'Item Successfully Deleted');
							redirect('carts');	
						}
					} else {
						$this->session->set_flashdata('item_deleted', 'Item Successfully Deleted');
						redirect('carts');
					} 
				} else {
					if($query != null) { 
						if($item_order_id === $order_id) {
							$newQty = $ol_qty + $query->ol_qty;
							$this->orderlist_model->add_quantity($item_id, $newQty);
							redirect('carts');
						} else {
							$this->orderlist_model->additem();
							redirect('carts');	
						}
					} else {	
						$this->orderlist_model->additem();
						redirect('carts');
					}
				}	
			}
		}

		public function recordCash()
		{
			$this->form_validation->set_rules('amount', 'Payment Amount', 'required');
			$data['payment'] = $this->input->post('amount');

			if($this->form_validation->run() === FALSE) {
				$this->session->set_flashdata('errMsg_input', 'No Input');
				redirect('carts');
			} else {
				if ($data['payment'] < $this->input->post('total_price')) {
					$this->session->set_flashdata('errMsg_lack', 'INSUFFICIENT MONEY');
					redirect('carts');
				} elseif($data['payment'] > $this->input->post('total_price')) {
					$change = $data['payment'] - $this->input->post('total_price');
					$this->session->set_flashdata('cfMsg_change', ''.$change);
					$this->order_model->place_order();
					redirect('carts');
				} else {
					$this->session->set_flashdata('cfMsg_placed', 'Success');
					$this->order_model->place_order();
					redirect('carts');
				}
			}
		}

		public function recordLayAway()
		{
			$this->form_validation->set_rules('cus_name', 'Name', 'required');
			$this->form_validation->set_rules('cus_no', 'Contact No.', 'required');
			$this->form_validation->set_rules('cus_add', 'Address', 'required');
			$this->form_validation->set_rules('amount', 'Payment Amount', 'required');
	
			$cus_id = $this->customer_model->get_id() + 1;

			if($this->form_validation->run() === FALSE) {
				$this->load->view('templates/header', $data);
				$this->load->view('carts/index', $data);
				$this->load->view('templates/footer', $data);
			} else
				if( $this->input->post('amount') > $this->input->post('total_price') || $this->input->post('amount') < 0 || 
					$this->input->post('amount') == 0 ) 	
				{
					$data['title'] = 'Lay Away Payment';
					$data['total_price'] = $this->input->post('total_price');
					$data['order_id'] = $this->input->post('id');
					$this->load->view('templates/header', $data);
					$this->load->view('customers/record', $data);
					$this->load->view('templates/footer', $data);
				} else {
					$this->customer_model->record_info();
					$this->order_model->place_order($cus_id);
					$this->payment_model->record_payment($this->input->post('id'));
					redirect('carts');
				}
		}
	}