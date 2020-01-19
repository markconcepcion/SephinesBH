<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

        public function get_news($slug = FALSE)
        {
            if ($slug === FALSE)
            {
                 $this->db->order_by('News_ID', 'DESC');
                $query = $this->db->get('news');
                return $query->result_array();
            }

            $query = $this->db->get_where('news', array('slug' => $slug));
            return $query->row_array();
        }       

       
       public function create_news()
        {
            $this->load->helper('url');

            $slug = url_title($this->input->post('title'), 'dash', TRUE);

            $data = array(
            'News_ID' => $this->input->post('News_ID'),
            'News_Quantity' => $this->input->post('News_Quantity'),
            'slug' => $slug,
            'News_PurchasePrice' => $this->input->post('News_PurchasePrice'),
            'News_Description' => $this->input->post('News_Description'),
            'News_RetailPrice' => $this->input->post('News_RetailPrice'),
            'Category_ID' => $this->input->post('Category_ID'));
            
            return $this->db->insert('news', $data);
        }
   
}