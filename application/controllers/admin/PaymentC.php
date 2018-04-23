<?php

class PaymentC extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('payment');
    }

    public function index()
    {
        $data['title'] = 'Quản lý phương thức thanh toán';
        $data['template'] = 'admin/paymentC/index';
        $data['models'] = $this->payment->get_model();
        $this->load->view('admin/layouts/index', $data);
    }

    public function create() {
        $data['title'] = 'Tạo phương thức thanh toán';
        $data['template'] = 'admin/paymentC/form';
        $data['link_submit'] = base_url('admin/paymentC/create');

        if (isset($_POST['Payment'])) {
            $data_insert = $_POST['Payment'];
            $this->payment->set_model($data_insert);
            redirect('admin/paymentC/index', 'refresh');
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function update($id) {
        $data['title'] = 'Chỉnh sửa phương thức thanh toán';
        $data['template'] = 'admin/paymentC/form';
        $model = $this->payment->get_model(['id' => $id]);
        $data['model'] = $model;
        $data['link_submit'] = base_url('admin/paymentC/update/'.$id);

        if (isset($_POST['Payment'])) {
            $data_update = $_POST['Payment'];
            $this->payment->update_model($id, $data_update);
            redirect('admin/paymentC/index', 'refresh');
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->payment->get_model(['id' => $id]);

        if (count($model) > 0) {
            $model->delete_model();
            echo 1;
        } else {
            echo 0;
        }
    }

    public function bulkDelete() {
        $deleteItems = isset($_POST['select']) ? $_POST['select'] : [];

        if (!empty($deleteItems)) {
            $query = $this->db->query("SELECT * FROM ci_payment WHERE id in(".implode(',', $deleteItems).")");
            $models = $query->result('Payment');
            foreach ($models as $model) {
                $model->delete_model();
            }
        }
        redirect('admin/paymentC/index', 'refresh');
    }
}