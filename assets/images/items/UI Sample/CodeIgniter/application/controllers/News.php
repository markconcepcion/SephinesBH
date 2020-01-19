<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url');
        }

        public function index()
        {
                $data['news'] = $this->news_model->get_news();
                $data['title'] = 'Item Entries';

                $this->load->view('templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer');
        }

        public function view($slug = NULL)
        {
            $data['news_item'] = $this->news_model->get_news($slug);

            if (empty($data['news_item']))
            {
                show_404();
            }

            $data['title'] = $data['news_item']['slug'];

            $this->load->view('templates/header', $data);
            $this->load->view('news/view', $data);
            $this->load->view('templates/footer');

        }

        public function create()
        {
            $this->load->helper('form');
            $this->load->library('form_validation');

             $data['title'] = 'ADD NEW ITEM';

            
            $this->form_validation->set_rules('News_ID', 'ID Number', 'required');
            $this->form_validation->set_rules('News_Quantity', 'Quantity', 'required');
            $this->form_validation->set_rules('News_PurchasePrice','Purchase Price', 'required');
            $this->form_validation->set_rules('News_Description', 'Description', 'required');
            $this->form_validation->set_rules('News_RetailPrice', 'Retail Price','required');
            $this->form_validation->set_rules('Category_ID', 'Category','required');

            if ($this->form_validation->run() === FALSE)
             {
                $this->load->view('templates/header', $data);
                $this->load->view('news/create');
                $this->load->view('templates/footer');

             }
            else
            {
                $this->news_model->create_news();
                 redirect('news');
            }

        }
                     
}