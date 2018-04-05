<?php
require_once APPPATH . 'core/Front_Controller.php';

class NewsSite extends Front_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('news');
        $this->load->library('pagination');
        

    }

    public function index($id = "") {
        $data['title'] = 'Tin tức';
        $data['description'] = 'Tin tức';

        $data['template'] = 'news/index';
        
        $categories = $this->categories->getCategoryNewFE();
        $data['categories'] = $categories;
        $data['category_name'] = 'TIN MỚI CẬP NHẬT';
        $category = $this->categories->get_model(['id' => $id]);
        $condition = '';
        $arr_condition = [];
        $data['link_1'] = anchor('tin-tuc', 'Tin Tức', ['title' => 'Tin Tức']);
        if (count($category) > 0) {
            $condition = 'WHERE category_id = '.$category->id;
            $arr_condition = ['category_id' => $category->id];
            $data['category_name'] = $category->category_name;
            $data['link_2'] = $this->categories->getUrlCustom(['slug' => $category->slug, 'name' => $category->category_name]);
        }
        $query = $this->db->query("SELECT * FROM ci_news ".$condition." ORDER BY created_date desc");
        $this->pagination($data, $query, $arr_condition);
        $this->load->view('layouts/index', $data);
    }

    public function detail() {
        $data['title'] = 'Tin tức';
        $data['description'] = 'Tin tức';

        $data['template'] = 'news/detail';

        $this->load->view('layouts/index', $data);
    }

    private function pagination(&$data, $query, $arr_condition) {
        $config['base_url'] = base_url('new.html');
        $config['total_rows'] = $this->news->countNews($query);
        $config['per_page'] = 5;
        $config['uri_segment'] = 2;
        $config['use_page_numbers'] = TRUE;

        $config["prev_tag_open"] = "<li id='pagination_previous_bottom' class='pagination_previous'>";
        $config["prev_tag_close"] = "<li>";

        $config["next_tag_open"] = "<li id='pagination_next_bottom' class='pagination_next'>";
        $config["next_tag_open"] = "<li>";

        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";

        $config["cur_tag_open"] = "<li><span>";
        $config["cur_tag_close"] = "</span></li>";

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data['news'] = $this->news->getNews($config["per_page"], $page, $arr_condition);
        $data["links"] = $this->pagination->create_links();
    }
}