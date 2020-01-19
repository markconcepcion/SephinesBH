<?php
class Categorys_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    public function get_news($slug = FALSE)
    {
        if ($slug === FALSE)
        {
                $query = $this->db->get('category');
                return $query->result_array();
        }

        $query = $this->db->get_where('category', array('slug' => $slug));
        return $query->row_array();
    }
}
   
