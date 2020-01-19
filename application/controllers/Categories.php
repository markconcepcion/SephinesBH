<?php
	class Categories extends CI_Controller
	{ 
		public function index()
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
            	redirect('carts');
			}

			$data['title'] = 'Category Lists';
			$data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));
			$data['categories'] = $this->category_model->get_categories();

			$this->load->view('templates/header', $data);
       		$this->load->view('categories/categoryLists',  $data);
        	$this->load->view('templates/footer', $data);
		}
		public function search_cat()
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
            	redirect('carts');
			}

		    $search_val = $this->input->post('inputsearch');
			$data['title'] = 'Category Lists';
			$data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));
			$data['categories'] = $this->category_model->get_categories_key($search_val);

			$this->load->view('templates/header', $data);
       		$this->load->view('categories/categoryLists',  $data);
        	$this->load->view('templates/footer', $data);
		}

		public function get_category($id)
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}
			
			$data['cats'] = $this->category_model->get_cat_by_id();

			$this->load->view('popups/categoryPopups', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('categories/view', $data);
			$this->load->view('templates/footer', $data);
		}

		public function create()
		{
			$data['title'] = 'Create Category';
			$this->form_validation->set_rules('cat_name', 'Category Name', 'required');
			if($this->form_validation->run() === FALSE){
				$this->session->set_flashdata('unfilled_categoryName', 'Category Name is REQUIRED');
				redirect('categories');
			} else {
				$this->category_model->create_category();
				redirect('categories');
			}
		}

		public function hide($cat_id)
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
	            redirect('carts');
	        }

			$this->category_model->delete_category($cat_id);
			redirect('categories');
		}


		public function rename_cat()
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
	            redirect('carts');
	        }
			
			$this->category_model->update_category();
			$this->session->set_flashdata('category_created', 'Category Successfully Updated');
			redirect('categories');
		}

		public function items($cat_id)
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
	            redirect('carts');
	        }

			$data['cat_id'] = $cat_id;
			$data['title'] = $this->category_model->get_category($cat_id)->cat_name;
			$data['items'] = $this->item_model->get_items_by_category($cat_id); 
			$data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));

			$this->load->view('templates/header', $data);
	       	$this->load->view('categories/view',  $data);
	        $this->load->view('templates/footer', $data); 
		}

		public function search_items($cat_id)
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
	            redirect('carts');
	        }

		    $search_val = $this->input->post('inputsearch');
			$data['cat_id'] = $cat_id; 
			$data['title'] = $this->category_model->get_category($cat_id)->cat_name;
			$data['items'] = $this->item_model->search_items_key($cat_id, $search_val); 
			$data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));

			$this->load->view('templates/header', $data);
	       	$this->load->view('categories/view',  $data);
	        $this->load->view('templates/footer', $data); 
		}
	}