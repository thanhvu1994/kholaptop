<?php
require_once APPPATH . 'core/Front_Controller.php';

class NewsSite extends Front_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('news');
        $this->load->library('pagination');
        

    }

    public function index() {
        $data['title'] = 'Tin tức';
        $data['description'] = 'Tin tức';

        $data['template'] = 'news/index';

        $this->load->view('layouts/index', $data);
    }

    public function detail() {
        $data['title'] = 'Tin tức';
        $data['description'] = 'Tin tức';

        $data['template'] = 'news/detail';

        $this->load->view('layouts/index', $data);
    }
}