<?php
require_once APPPATH . 'core/Front_Controller.php';

class Category extends Front_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('partner');
        $this->load->model('products');
        $this->load->model('categories');
        $this->load->model('banner');
        $this->load->model('users');
        $this->load->model('posts');
        $this->load->model('projects');
        $this->load->model('news');
        $this->load->database();
        $this->load->library('pagination');
    }

    public function category($slug){
        $category = $this->categories->get_model(array('slug' => $slug));

        if($category){
            $data['title'] = '';
            $data['description'] = '';

            $data['template'] = 'category/index';

            $this->load->view('layouts/index', $data);
        }else{
            redirect('sites/index');
        }
    }
}