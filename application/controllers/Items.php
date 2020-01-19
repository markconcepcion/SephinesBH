<?php
	class Items extends CI_Controller
	{
		public function create($cat_id)
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}	

			$data['title'] = 'Add Item';

			$data['categories'] = $this->category_model->get_category($cat_id);

			$this->form_validation->set_rules('item_name', 'Name', 'required');
			$this->form_validation->set_rules('item_description', 'Item Description', 'required');
			$this->form_validation->set_rules('price', 'Price', 'required');

			if ($this->input->post('price') < 1) {
				$this->session->set_flashdata('err_Msg', 'Invalid Price');
				redirect('categories/items/'.$cat_id);
			}
			if ($this->form_validation->run() === FALSE) {
				
				$this->load->view('templates/header', $data);
	       		$this->load->view('items/create',  $data);
	        	$this->load->view('templates/footer', $data);
			} else {

				//..Upload Image
				$config['upload_path'] = '.<?php echo base_url(); ?>/assets/images/items';
				$config['allowed_types'] = 'gif|jpg|png|jpeg|pdf';
				$config['max_size'] = '2048000000';
				$config['max_width'] = '500';
				$config['max_height'] = '500';

				$this->load->library('upload', $config);

				if(!$this->upload->do_upload()) {
					$errors = array('error' => $this->upload->display_errors());
					$item_image = 'noimage.jpg';
				}else{
					$data = array('upload_data' => $this->upload->data());
					$item_image = $_FILES['userfile']['name'];
				}

				$this->item_model->create_item($item_image, $cat_id);
				$this->session->set_flashdata('item_added', 'Item Successfully Added');
				redirect('categories');
			}
		}

		public function delete($item_id)
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}

			$this->item_model->delete_item($item_id);
			$this->session->set_flashdata('item_deleted', 'Item Successfully Deleted');
			redirect('items');
		}

		public function update()
		{	
			$cat_id = $this->input->post('cat_id');

			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}

			$this->item_model->update_item();
			$this->session->set_flashdata('item_updated', 'Item Successfully Updated');
			redirect('categories');
			
		}
	} 