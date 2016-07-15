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
                $query = $this->db->get('sm16_news');
                return $query->result_array();
        }

        $query = $this->db->get_where('sm16_news', array('slug' => $slug));
        return $query->row_array();
    }
    
    public function set_news()
    {
        $this->load->helper('url');

        $slug = url_title($this->input->post('title'), 'dash', TRUE);

        $data = array(
            'title' => $this->input->post('title'),
            'slug' => $slug,
            'text' => $this->input->post('text')
        );
       
        if ($this->db->insert('sm16_news', $data))
        { //data entered, return slug
            return $slug; 
        } else { //data not entered
            return false;
        }
        
    }
}
