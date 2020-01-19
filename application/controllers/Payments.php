<?php
	class Payments extends CI_Controller
	{

		public function record()
		{
			$data['title'] = 'Record Payment';
			$this->payment_model->record_payment();
			redirect('carts');	
		}

		public function add_payment()
		{
			if ($this->input->post('amount') < 0) {
				$this->session->set_flashdata('err_Msg', '0?? You kidding me?!');
				redirect('customers/cusLists');
			} else if ($this->input->post('re_bal') < $this->input->post('amount')) {
				$this->session->set_flashdata('scs_Msg', 'Thanks You For Shopping at Sephine`s');
				$this->payment_model->record_payment();
				redirect('customers/cusLists');
			} else {
				$this->session->set_flashdata('scs_Msg', 'Payment Added! Thanks :)');
				$this->payment_model->record_payment();
				redirect('customers/cusLists');
			}
		}
	}