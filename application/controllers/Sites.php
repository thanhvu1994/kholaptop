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

        $query = $this->db->query("SELECT * FROM ci_banners WHERE publish = 1 AND type = 'advertisement' ORDER BY display_order asc, name asc");
        $advertisements = $query->result('Banner');
        $data['advertisements'] = $advertisements;

        $data['newProducts'] = $this->products->getNewProducts(10,0);
        $data['featureProducts'] = $this->products->getFeatureProducts(10,0);
        
        $data['categories'] = $this->categories->getFeatureCategories();

		$this->load->view('layouts/index', $data);
    }

    public function newProducts(){
        $data['title'] = 'Sản Phẩm Mới';
        $data['description'] = 'Sản Phẩm Mới';

        $data['treeCategory'] = $this->categories->getCategoryFE();

        $config['base_url'] = base_url('san-pham-moi.html');
        $config['total_rows'] = $this->products->countNewProducts();
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
        $data['products'] = $this->products->getNewProducts($config["per_page"], ($page-1)*$config["per_page"]);
        $data['countProducts'] = $config['total_rows'];
        $data["links"] = $this->pagination->create_links();

        $data['template'] = 'sites/newProducts';

        $this->load->view('layouts/index', $data);
    }

    public function featureProducts(){
        $data['title'] = 'Sản Phẩm Tiêu Biểu';
        $data['description'] = 'Sản Phẩm Tiêu Biểu';

        $data['treeCategory'] = $this->categories->getCategoryFE();

        $config['base_url'] = base_url('san-pham-hot.html');
        $config['total_rows'] = $this->products->countFeatureProducts();
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
        $data['products'] = $this->products->getFeatureProducts($config["per_page"], ($page-1)*$config["per_page"]);
        $data['countProducts'] = $config['total_rows'];
        $data["links"] = $this->pagination->create_links();

        $data['template'] = 'sites/featureProducts';

        $this->load->view('layouts/index', $data);
    }

    public function shoppingCart() {
        $data['title'] = 'Giỏ hàng';
        $data['description'] = 'Giỏ hàng';

        $data['template'] = 'sites/shoppingCart';
        // unset($_SESSION['shopping_cart']);
        // var_dump($_SESSION['shopping_cart']);die;
        $this->load->view('layouts/index', $data);
    }

    public function addCart() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (isset($_POST['Product'])) {
                $this->load->model('productOptionValue');
                $arr_product = isset($_SESSION['shopping_cart']) ? $_SESSION['shopping_cart'] : [];

                $product = $this->products->get_model(['id' => $_POST['Product']['product_id']]);
                if (count($product) > 0) {
                    $info = [];
                    if (isset($_POST['Product']['option_value'])) {
                        foreach ($_POST['Product']['option_value'] as $product_option_value_id) {
                            $product_option_value = $this->productOptionValue->getOptionValueById($product_option_value_id);
                            if (count($product_option_value) > 0) {
                                $info[$product_option_value->product_option_id][$product_option_value->id] = [
                                    'name_option' => $product_option_value->getAttributeName($product_option_value->product_option_id),
                                    'name_option_value' => $product_option_value->name,
                                    'price' => (int)$product_option_value->price,
                                ];
                            }
                        }
                    } else {
                        $info[0][0] = [
                            'name_option' => '',
                            'name_option_value' => '',
                            'price' => 0,
                        ];
                    }
                    if (!isset($arr_product['data'][$product->id])) {
                        $arr_product['data'][$product->id] = [
                            'product_id' => $product->id,
                            'image' => $product->getFirstImage(),
                            'url' => $product->getUrl(),
                            'product_name' => $product->product_name,
                            'base_price' => (int)$_POST['Product']['base_price'],
                        ];
                    }
                    
                    $arr_product['data'][$product->id]['info'][] = [
                        'data' => $info,
                        'quantity' => $_POST['Product']['quantity'],
                    ];

                    foreach ($arr_product['data'] as $data) {
                        $total_price = 0;
                        foreach ($data['info'] as $arr_type) {
                            $total_price_more = 0;
                            foreach ($arr_type['data'] as $type) {
                                foreach ($type as $row) {
                                    $total_price_more += (int)$row['price'];
                                }
                            }
                            $total_price += ((int)$total_price_more + (int)$_POST['Product']['base_price']) * $arr_type['quantity'];
                        }
                    }
                    $arr_product['total_price'] = $total_price;

                    $_SESSION['shopping_cart'] = $arr_product;
                    echo 1;
                }
            }
        }
    }

    public function subCart() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $arr_product = isset($_SESSION['shopping_cart']) ? $_SESSION['shopping_cart'] : [];

            $key = isset($_POST['key']) ? $_POST['key'] : -1;
            if (isset($arr_product['data'][$key])) {
                unset($arr_product['data'][$key]);

                $total_price = 0;
                foreach ($arr_product as $row) {
                    $total_price += (int)$row['price'];
                }
                $arr_product['total_price'] = $total_price;

                $_SESSION['shopping_cart'] = $arr_product;
            }
        }
    }
}