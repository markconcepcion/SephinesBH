<?php
	class Users extends CI_Controller
	{
		//Login User
		public function login(){
			$data['title'] = 'User Login';
			if($this->session->userdata('logged_in')) {
				redirect('homepage');
			}

			$this->form_validation->set_rules('username', 'Username', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run() === FALSE) {
				$this->load->view('users/login', $data);
			} else {
				$encPassword = $this->input->post('password');
				$user_row = $this->user_model->confirm_account($encPassword);

				if ($user_row != null) {

					$user_data = array(
						'user_id' => $user_row['user_id'],
						'userName' => $user_row['userName'],
						'user_fname' => $user_row['user_fname'],
						'user_type' => $user_row['user_type'],
						'logged_in' => true
					);

					$this->session->set_userdata($user_data);
					$this->session->set_flashdata('user_loggedin', 'Login Successful');
					redirect('homepage'); 
				} else {
					$this->session->set_flashdata('login_failed', 'Invalid Username or Password');
					$this->load->view('users/login', $data);
				}
			}
		}
		
		public function createAcc(){
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}

			if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}

			$data['title'] = 'Create User Account';

			//Validate input
			$this->form_validation->set_rules('user_fname', 'First name', 'required');
			$this->form_validation->set_rules('user_mname', 'Middle name', 'required');
			$this->form_validation->set_rules('user_lname', 'Last name', 'required');
			$this->form_validation->set_rules('email_add', 'Email', 'required');
			$this->form_validation->set_rules('user_add', 'Address', 'required');
			$this->form_validation->set_rules('user_number', 'Contact No.', 'required');
			$this->form_validation->set_rules('username', 'Username', 'required|callback_check_userName_exists');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('password2', 'Confirm Password', 'matches[password]');

			if($this->form_validation->run() === FALSE) {
				redirect('homepage');
			} else {
				
				$encPassword = $this->input->post('password');
				$this->user_model->create_account($encPassword);

				$this->session->set_flashdata('user_registered', 'Succesfully Registered');
				redirect('carts');
			} 
		}

		public function deactivate($user_id)
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}

			$this->user_model->deac_acc($user_id);
			redirect('homepage');
		}
		public function activate($user_id)
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}

			$this->user_model->ac_acc($user_id);
			redirect('users/inactives');
		}

		public function view($user_id)
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}

			$data['title'] = 'Employee`s Information';
			$data['user_info'] = $this->user_model->get_users($user_id);

			$this->load->view('templates/header', $data);
			$this->load->view('users/viewForm', $data);
			$this->load->view('templates/footer', $data);
		}

		//Create an Account


		public function logout(){
			//Unset user data
			$this->session->unset_userdata('user_name');
			$this->session->unset_userdata('logged_in');
			$this->session->unset_userdata('user_id');
			$this->session->unset_userdata('userName');

			$this->session->set_flashdata('user_loggedout', 'You are now logged out');

			redirect('users/login');

		}

		public function check_userName_exists($userName){
			$this->form_validation->set_message('check_userName_exists', 'Username Exists');

			if($this->user_model->check_userName_exists($userName)) {	
				return true;
			} else {
				return false;
			}
		}

		public function edit($id)
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			}

			if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}
			
			$data['title'] = 'Edit Account';
			$data['old_info'] = $this->user_model->get_users($id);

			$this->load->view('templates/header', $data);
			$this->load->view('users/edit', $data);
			$this->load->view('templates/footer', $data);
		}

		public function update()
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}

			$this->form_validation->set_rules('old_password', 'Password', 'required');
			$this->form_validation->set_rules('old_password2', 'Password', 'matches[old_password2]');
			$this->form_validation->set_rules('new_password', 'Password', 'required');
			$this->form_validation->set_rules('new_password2', 'Confirm Password', 'matches[new_password2]');

			$password = md5($this->input->post('password'));
			
			$this->user_model->update_account($password);
			redirect('users/view/'. $this->input->post('user_id'));
		}

		public function details($id)
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}

			$data['title'] = 'Employee`s Information';
    	    $data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));
			$data['user_info'] = $this->user_model->get_users($id);
	        $data['users'] = $this->user_model->get_users_list();
			$this->load->view('templates/header', $data);
			$this->load->view('users/details', $data);
			$this->load->view('templates/footer', $data);
		}

		public function inactives($id)
		{
			if(!$this->session->userdata('logged_in')) {
				redirect('users/login');
			} if($this->session->userdata('user_type') === "Employee") {
				redirect('homepage');
			}

			$data['title'] = 'Employee`s Information';
    	    $data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));
			$data['user_info'] = $this->user_model->get_users($id);
	        $data['users'] = $this->user_model->get_inactives();
			$this->load->view('templates/header', $data);
			$this->load->view('users/inactives', $data);
			$this->load->view('templates/footer', $data);
		}
	}