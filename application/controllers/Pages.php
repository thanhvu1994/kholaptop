<?php
require_once APPPATH . 'core/Front_Controller.php';

class Pages extends Front_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('posts');
    }

    public function detail($slug) {
        $data['template'] = 'pages/detail';

        $page = $this->posts->get_model(['slug' => $slug]);
        $data['page'] = $page;
        if (count($page) > 0) {
            $data['title'] = $page->title;
            $data['description'] = $page->description;

            $pages = $this->posts->get_model();
            $data['pages'] = $pages;

            $this->load->view('layouts/index', $data);
        } else {
            redirect('/', 'refresh');
        }
    }
}