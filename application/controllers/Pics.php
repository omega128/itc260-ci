<?php
//application/controllers/Pics.php
class Pics extends CI_Controller {

    public function __construct()
    {
            parent::__construct();
            $this->load->model('pics_model');
            $this->load->helper('url_helper');
    }
    
    public function view($tags = '') {
        $this->load->helper('form');
        $this->load->library('form_validation');
                
        $data['title'] = "Pictures!";
        $data['tags'] = $tags;
        $data['pics'] = $this->pics_model->get_pics($tags);
        
        $this->load->view('pics', $data);
    }

}
