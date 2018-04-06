<?php
require_once APPPATH . 'core/Front_Controller.php';

class NewsSite extends Front_Controller {

    public function __construct()
    {
        parent::__construct();

        $this->load->model('news');
        $this->load->library('pagination');
        

    }

    public function index($slug = "") {
        $data['title'] = 'Tin tức';
        $data['description'] = 'Tin tức';

        $data['template'] = 'news/index';
        
        $categories = $this->categories->getCategoryNewFE();
        $data['categories'] = $categories;
        $data['category_name'] = 'TIN MỚI CẬP NHẬT';
        $category = $this->categories->get_model(['slug' => $slug]);
        $condition = '';
        $arr_condition = [];
        $data['link_1'] = anchor('tin-tuc.html', 'Tin Tức', ['title' => 'Tin Tức']);
        $url = 'tin-tuc.html';
        $num = 2;
        if (count($category) > 0) {
            $condition = 'WHERE category_id = '.$category->id;
            $arr_condition = ['category_id' => $category->id];
            $data['category_name'] = $category->category_name;
            $data['link_2'] = $this->categories->getUrlCustom(['slug' => $category->slug, 'name' => $category->category_name]);
            $url = $category->slug.'n.html';
        }
        $query = $this->db->query("SELECT * FROM ci_news ".$condition." ORDER BY created_date desc");
        $this->pagination($data, $query, $arr_condition, $url, $num);
        $this->load->view('layouts/index', $data);
    }

    public function detail($slug) {
        $data['template'] = 'news/detail';

        $new = $this->news->get_model(['slug' => $slug]);
        $data['new'] = $new;
        if (count($new) > 0) {
            $data['title'] = $new->title;
            $data['description'] = $new->description;

            $data['link_1'] = anchor('tin-tuc.html', 'Tin Tức', ['title' => 'Tin Tức']);
            $category = $this->categories->get_model(['id' => $new->category_id]);
            if (count($category) > 0) {
                $data['link_2'] = $this->categories->getUrlCustom(['slug' => $category->slug, 'name' => $category->category_name]);
            }

            $categories = $this->categories->getCategoryNewFE();
            $data['categories'] = $categories;

            $query = $this->db->query("SELECT * FROM ci_news WHERE category_id = '{$new->category_id}' AND id != '{$new->id}' ORDER BY created_date desc LIMIT 6");
            $news = $query->result('News');
            $data['news'] = $news;
            $this->load->view('layouts/index', $data);
        } else {
            redirect('tin-tuc.html', 'refresh');
        }
    }

    private function pagination(&$data, $query, $arr_condition, $url, $num) {
        $config['base_url'] = base_url($url);
        $config['total_rows'] = $this->news->countNews($query);
        $config['per_page'] = PAGINATION_FE;
        $config['uri_segment'] = 2;
        $config['use_page_numbers'] = TRUE;

        $config["prev_tag_open"] = "<li id='pagination_previous_bottom' class='pagination_previous'>";
        $config["prev_tag_close"] = "<li>";

        $config["next_tag_open"] = "<li id='pagination_next_bottom' class='pagination_next'>";
        $config["next_tag_open"] = "<li>";

        $config["num_tag_open"] = "<li>";
        $config["num_tag_close"] = "</li>";

        $config["cur_tag_open"] = "<li class='current'>";
        $config["cur_tag_close"] = "</li>";

        $this->pagination->initialize($config);

        $page = ($this->uri->segment($num)) ? $this->uri->segment($num) : 1;
        $page = $config['per_page'] * ($page-1);
        $data['news'] = $this->news->getNews($config["per_page"], $page, $arr_condition);
        $data["links"] = $this->pagination->create_links();
    }
}