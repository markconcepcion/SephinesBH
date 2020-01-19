<?php
	class User_model extends CI_Model
	{
		public function confirm_account()
		{
			$this->db->where('password', $this->input->post('username'));
			$this->db->where('password', $this->input->post('password'));
			$this->db->where('accountStatus', "Active");			

			$query = $this->db->get('users');
			return $query->row_array();
		}

		public function login($userName, $password)
		{
			$this->db->where('userName', $userName);
			$this->db->where('password', $password);

			$result = $this->db->get('users');

			if($result->num_rows() == 1){
				return $result->row(0)->user_id;
			} else {
				return false;
			}
		}

		public function get_users($user_id = FALSE)
		{
			$query = $this->db->get_where('users', array('user_id' => $user_id));
			return $query->row_array();
		}

		//Display Active Employees
		public function get_users_list()
		{
			$query = $this->db->get_where('users', array('accountStatus' => "Active"));
			return $query->result_array();
		}

		public function get_inactives()
		{
			$query = $this->db->get_where('users', array('accountStatus' => "Inactive"));
			return $query->result_array();
		}
		//Deactivate Account
		public function deac_acc($user_id)
		{
			$data = array('accountStatus' => "Inactive");
			$this->db->where('user_id', $user_id);
			return $this->db->update('users', $data);
		}
		public function ac_acc($user_id)
		{
			$data = array('accountStatus' => "Active");
			$this->db->where('user_id', $user_id);
			return $this->db->update('users', $data);
		}

		//Update Account
		public function update_account($password)
		{
			$data = array(
				'user_email' => $this->input->post('user_email'),
				'userName' => $this->input->post('userName'),
				'password' => $password,
				'user_name' => $this->input->post('user_name'),
				'user_contactNo' => $this->input->post('user_contactNo'),
				'user_address' => $this->input->post('user_address'),
			);

			$this->db->where('user_id', $this->input->post('user_id'));
			return $this->db->update('users', $data);	
		}

		
		//Create an Account
		public function create_account($encPassword)
		{
			$data = array(
				'user_type' => "Employee",
				'user_email' => $this->input->post('email_add'),
				'userName' => $this->input->post('username'),
				'password' => $encPassword,
				'user_fname' => $this->input->post('user_fname'),
				'user_mname' => $this->input->post('user_mname'),
				'user_lname' => $this->input->post('user_lname'),
				'user_gender' => $this->input->post('user_gender'),
				'user_contactNo' => $this->input->post('user_number'),
				'user_address' => $this->input->post('user_add'),
				'accountStatus' => "Active"
			);
			return $this->db->insert('users', $data);
		}

		//check Name Existence
		public function check_userName_exists($userName)
		{
			$query = $this->db->get_where('users', array('userName'=> $userName));

			if (empty($query->row_array())) {
				return true;
			} else {
				return false;
			}
		}
	}