<?php
require_once APPPATH . 'core/Front_Controller.php';

class product extends Front_Controller {

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

    public function detail($slug){
        $data['product'] = $this->products->getProductBySlug($slug);

        if(isset($data['product'])){
            $data['category'] = $data['product']->getCategoryObject();
            $data['recentProducts'] = $data['category']->getProducts(10,0);
            $data['title'] = $data['product']->title;
            $data['description'] = $data['product']->meta_description;
            $data['template'] = 'product/detail';
        }else{
            $data['template'] = 'sites/index';
        }

        $this->load->view('layouts/index', $data);
    }
}