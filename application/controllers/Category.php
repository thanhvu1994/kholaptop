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
            $data['title'] = $category->title;
            $data['description'] = $category->title;

            $data['treeCategory'] = $this->categories->getChildCategoriesFE($category->id);

            if(empty($data['treeCategory'])){
                $data['treeCategory'] = $this->categories->getChildCategoriesFE($category->parent_id);
            }

            $config['base_url'] = $category->getUrl();
            $config['total_rows'] = $category->countProducts();
            $config['per_page'] = 40;
            $config['uri_segment'] = 2;
            $config['use_page_numbers'] = TRUE;

            $config["prev_link"] = "Back";
            $config["prev_tag_open"] = "<li>";
            $config["prev_tag_close"] = "<li>";

            $config["next_link"] = 'Next';
            $config["next_tag_open"] = "<li>";
            $config["next_tag_open"] = "<li>";

            $config["num_tag_open"] = "<li>";
            $config["num_tag_close"] = "</li>";

            $config["cur_tag_open"] = "<li class='current'>";
            $config["cur_tag_close"] = "</li>";

            if (count($_GET) > 0) $config['suffix'] = '?' . http_build_query($_GET, '', "&");
            if (count($_GET) > 0) $config['first_url'] = $config['base_url'].'?'.http_build_query($_GET);

            $this->pagination->initialize($config);

            $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 1;
            $data['curCategory'] = $category;
            $data['products'] = $category->getProducts($config["per_page"], ($page-1)*$config["per_page"]);
            $data['countProducts'] = $config['total_rows'];
            $data["links"] = $this->pagination->create_links();

            $data['template'] = 'category/index';

            $this->load->view('layouts/index', $data);
        }else{
            redirect('/');
        }
    }
}