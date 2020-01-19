 <?php
class Pages extends CI_Controller 
{
    public function view($page = 'homepage')
	{
        if(!$this->session->userdata('logged_in')) {
            redirect('users/login');
        } if($this->session->userdata('user_type') === "Employee") {
            redirect('carts');
        }

        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['users'] = $this->user_model->get_users();
        $data['userInfo'] = $this->user_model->get_users($this->session->userdata('user_id'));
        $data['users'] = $this->user_model->get_users_list();
        $data['title'] = ucfirst($page); // Capitalize the first letter
        //$data['results'] = $this->payment_model->get_list();

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
	}


}