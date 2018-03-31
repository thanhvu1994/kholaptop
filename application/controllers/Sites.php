<?php
require_once APPPATH . 'core/Front_Controller.php';

class Sites extends Front_Controller {

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

    public function index()
    {
        $data['title'] = 'Trang Chủ';
        $data['description'] = 'Trang Chủ';

        $data['template'] = 'sites/index';
        $data['newProducts'] = $this->products->getNewProducts(10,0);
        $data['featureProducts'] = $this->products->getFeatureProducts(10,0);

		$this->load->view('layouts/index', $data);
    }

    public function newProducts(){
        $data['newProducts'] = $this->products->getNewProducts(10,0);
        $data['template'] = 'sites/newProducts';

        $this->load->view('layouts/index', $data);
    }
}