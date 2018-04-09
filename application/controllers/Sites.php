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
        $data['title'] = 'Thông tin giỏ hàng';
        $data['description'] = 'Thông tin giỏ hàng';

        $data['template'] = 'sites/shoppingCart';

        $this->load->view('layouts/index', $data);
    }

    public function shoppingCartStep2() {
        if (isset($_SESSION['shopping_cart'])) {
            $this->load->model('orders');
            $this->load->model('orderDetails');

            $data['title'] = 'Thông tin giỏ hàng';
            $data['description'] = 'Thông tin giỏ hàng';
            $data['template'] = 'sites/shoppingCartStep2';

            $data['show_card'] = false;

            if (isset($_POST['Orders'])) {
                $orders = $_POST['Orders'];
                $orders['number_invoice'] = $this->orders->generateCode();
                $orders['order_date'] = date('Y-m-d H:i:s');
                $orders['status'] = STATUS_ORDER_PENDING;
                $this->orders->set_model($orders);
                $order_id = $this->db->insert_id();
                if (!empty($order_id)) {
                    $arr_product = $_SESSION['shopping_cart'];
                    $order_detail['order_id'] = $order_id;
                    $total_price_order = 0;
                    foreach ($arr_product['data'] as $product_id => $data_cart) {
                        $order_detail['product_id'] = $product_id;
                        $order_detail['base_price'] = $data_cart['base_price'];
                        foreach ($data_cart['info'] as $infos) {
                            $order_detail['more_info'] = json_encode($infos['data']);
                            $price = 0;
                            foreach ($infos['data'] as $infos_data) {
                                foreach ($infos_data as $info) {
                                    $price += (int)$info['price'];
                                }
                            }
                            $order_detail['quantity'] = $infos['quantity'];
                            $order_detail['total_price'] = ((int)$price + (int)$data_cart['base_price']) * $infos['quantity'];
                            $total_price_order += $order_detail['total_price'];
                            $this->orderDetails->set_model($order_detail);
                        }
                    }

                    $this->db->where('id', $order_id);
                    $this->db->update('orders', ['total_payment' => $total_price_order]);
                    unset($_SESSION['shopping_cart']);
                    if ($_POST['Orders']['type_payment'] == PAYMENT_CARD) {
                        $data['show_card'] = true;
                    }
                    $data['finish'] = true;
                }
            }
            $this->load->view('layouts/index', $data);
        } else {
            redirect('/', 'refresh');
        }
    }

    public function addCart() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (isset($_POST['Product'])) {
                $this->load->model('productOptionValue');
                $arr_product = isset($_SESSION['shopping_cart']) ? $_SESSION['shopping_cart'] : [];

                $product = $this->products->get_model(['id' => $_POST['Product']['product_id']]);
                if (count($product) > 0) {
                    $added = false;
                    if (isset($arr_product['data'])) {
                        foreach ($arr_product['data'] as $data) {
                            foreach ($data['info'] as $arr_type) {
                                foreach ($arr_type['data'] as $type) {
                                    if ($data['product_id'] == $_POST['Product']['product_id']) {
                                        $temp = [];
                                        if (!isset($_POST['Product']['option_value'])) {
                                            if (isset($type[0])) {
                                                $added = true;
                                            }
                                        } else {
                                            foreach ($type as $product_option_value_id => $row) {
                                                $temp[] = $product_option_value_id;
                                            }
                                            if (empty(array_diff($temp, $_POST['Product']['option_value'])) && empty(array_diff($_POST['Product']['option_value'], $temp))) {
                                                $added = true;
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }

                    if (!$added) {
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

                        $total_price = 0;
                        foreach ($arr_product['data'] as $data) {
                            foreach ($data['info'] as $arr_type) {
                                $total_price_more = 0;
                                foreach ($arr_type['data'] as $type) {
                                    foreach ($type as $row) {
                                        $total_price_more += (int)$row['price'];
                                    }
                                }
                                $total_price += ((int)$total_price_more + (int)$data['base_price']) * $arr_type['quantity'];
                            }
                        }
                        $arr_product['total_price'] = $total_price;

                        $_SESSION['shopping_cart'] = $arr_product;
                    }
                    echo 1;
                }
            }
        }
    }

    public function updateCart() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (isset($_POST['Product']) && isset($_SESSION['shopping_cart'])) {
                $arr_product = $_SESSION['shopping_cart'];
                $product_id = $_POST['Product']['product_id'];
                $quantity = $_POST['Product']['quantity'];

                $info = [];
                if (isset($_POST['Product']['option_value'])) {
                    $temp = [];
                    foreach ($_POST['Product']['option_value'] as $product_option_value_id) {
                        $product_option_value = $this->productOptionValue->getOptionValueById($product_option_value_id);
                        if (count($product_option_value) > 0) {
                            $temp[$product_option_value->product_option_id][] = $product_option_value->id;
                        } else {
                            $temp[0][] = 0;
                        }
                    }
                }
                $is_exists = true;
                if (isset($arr_product['data'][$product_id]['info'])) {
                    foreach ($arr_product['data'][$product_id]['info'] as &$pro) {
                        if (count($pro['data']) == count($temp)) {
                            foreach ($temp as $product_option_id => $arr_option_value) {
                                foreach ($arr_option_value as $product_option_value_id) {
                                    if (!isset($pro['data'][$product_option_id][$product_option_value_id])) {
                                        $is_exists = false;
                                    }
                                }
                            }
                            if ($is_exists == true) {
                                $pro['quantity'] = $quantity;
                                break;
                            }
                        }
                    }
                }
                $total_price = 0;
                foreach ($arr_product['data'] as $data) {
                    foreach ($data['info'] as $arr_type) {
                        $total_price_more = 0;
                        foreach ($arr_type['data'] as $type) {
                            foreach ($type as $row) {
                                $total_price_more += (int)$row['price'];
                            }
                        }
                        $total_price += ((int)$total_price_more + (int)$data['base_price']) * $arr_type['quantity'];
                    }
                }

                $arr_product['total_price'] = $total_price;
                $_SESSION['shopping_cart'] = $arr_product;
                echo number_format($total_price);
            }
        }
    }

    public function subCart() {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            if (isset($_POST['Product']) && isset($_SESSION['shopping_cart'])) {
                $arr_product = $_SESSION['shopping_cart'];
                $product_id = $_POST['Product']['product_id'];
                $quantity = $_POST['Product']['quantity'];

                $info = [];
                if (isset($_POST['Product']['option_value'])) {
                    $temp = [];
                    foreach ($_POST['Product']['option_value'] as $product_option_value_id) {
                        $product_option_value = $this->productOptionValue->getOptionValueById($product_option_value_id);
                        if (count($product_option_value) > 0) {
                            $temp[$product_option_value->product_option_id][] = $product_option_value->id;
                        } else {
                            $temp[0][] = 0;
                        }
                    }
                }
                $is_exists = true;
                if (isset($arr_product['data'][$product_id]['info'])) {
                    foreach ($arr_product['data'][$product_id]['info'] as $key => $pro) {
                        if (count($pro['data']) == count($temp)) {
                            foreach ($temp as $product_option_id => $arr_option_value) {
                                foreach ($arr_option_value as $product_option_value_id) {
                                    if (!isset($pro['data'][$product_option_id][$product_option_value_id])) {
                                        $is_exists = false;
                                    }
                                }
                            }
                            if ($is_exists == true) {
                                unset($arr_product['data'][$product_id]['info'][$key]);
                                if ($arr_product['data'][$product_id]['info'] === NULL) {
                                    unset($arr_product['data'][$product_id]);
                                }
                                break;
                            }
                        }
                    }
                }
                $arr_product['data'][$product_id]['info'] = array_values($arr_product['data'][$product_id]['info']);

                $total_price = 0;
                if (isset($arr_product['data']) && !empty($arr_product['data'])) {
                    foreach ($arr_product['data'] as $data) {
                        foreach ($data['info'] as $arr_type) {
                            $total_price_more = 0;
                            foreach ($arr_type['data'] as $type) {
                                foreach ($type as $row) {
                                    $total_price_more += (int)$row['price'];
                                }
                            }
                            $total_price += ((int)$total_price_more + (int)$data['base_price']) * $arr_type['quantity'];
                        }
                    }
                }
                if ($total_price == 0) {
                    unset($_SESSION['shopping_cart']);
                } else {
                    $arr_product['total_price'] = $total_price;
                    $_SESSION['shopping_cart'] = $arr_product;
                }
            }
        }
    }
}