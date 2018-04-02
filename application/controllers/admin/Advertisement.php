<?php

class Advertisement extends MY_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('banner');

        $config['upload_path']          = './uploads/advertisement';
        $config['allowed_types']        = 'jpg|png|gif';
        $config['overwrite']            = FALSE;
        $config['encrypt_name']         = TRUE;
        $this->load->library('upload', $config);

        if (!file_exists('./uploads/advertisement')) {
            mkdir('./uploads/advertisement', 0777, true);
        }
    }

    public function index()
    {
        $data['title'] = 'Quản lý quảng cáo';
        $data['template'] = 'admin/advertisement/index';
        $query = $this->db->query("SELECT * FROM ci_banners WHERE type='advertisement' ORDER BY created_date desc");
        $models = $query->result('Banner');
        $data['models'] = $models;
		$this->load->view('admin/layouts/index', $data);
    }

    public function create() {
        $data['title'] = 'Tạo quảng cáo';
    	$data['template'] = 'admin/advertisement/form';
        $data['link_submit'] = base_url('admin/advertisement/create');

        $rules = $this->banner->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }

        if (isset($_POST['Banner'])) {
            $data_insert = $_POST['Banner'];
            $image = '';
            if (isset($_FILES['Banner']['name']) && !empty($_FILES['Banner']['name'])) {
                $files = $_FILES;
                $_FILES['image']['name'] = $files['Banner']['name']['image'];
                $_FILES['image']['type'] = $files['Banner']['type']['image'];
                $_FILES['image']['tmp_name'] = $files['Banner']['tmp_name']['image'];
                $_FILES['image']['error'] = $files['Banner']['error']['image'];
                $_FILES['image']['size'] = $files['Banner']['size']['image'];
                if (!$this->upload->do_upload('image')) {
                    $data['error'] = $this->upload->display_errors();
                } else {
                    $uploadData = $this->upload->data();
                    $image = '/uploads/advertisement/'. $uploadData['file_name'];
                }
            }
            $data_insert['image'] = $image;
            $data_insert['type'] = 'advertisement';
            $this->banner->set_model($data_insert);
            redirect('admin/advertisement/index', 'refresh');
        }

		$this->load->view('admin/layouts/index', $data);
    }

    public function update($id) {
        $data['title'] = 'Chỉnh sửa quảng cáo';
        $data['template'] = 'admin/advertisement/form';
        $model = $this->banner->get_model(['id' => $id]);
        $data['model'] = $model;
        $data['link_submit'] = base_url('admin/advertisement/update/'.$id);
        $rules = $this->banner->getRule();
        foreach ($rules as $rule) {
            if (count($rule) >= 3) {
                $this->form_validation->set_rules($rule[0], $rule[1], $rule[2]);
            }
        }
        $image = $model->image;

        if (isset($_POST['Banner'])) {
            $data_insert = $_POST['Banner'];

            if (isset($_POST['remove_img']) && $_POST['remove_img'] == true) {
                if (is_file('.'.$image)) {
                    unlink('.'.$image);
                }
                $data_insert['image'] = '';
            } else {
                if (isset($_FILES['Banner']['name']) && !empty($_FILES['Banner']['name'])) {
                    $files = $_FILES;
                    $_FILES['image']['name'] = $files['Banner']['name']['image'];
                    $_FILES['image']['type'] = $files['Banner']['type']['image'];
                    $_FILES['image']['tmp_name'] = $files['Banner']['tmp_name']['image'];
                    $_FILES['image']['error'] = $files['Banner']['error']['image'];
                    $_FILES['image']['size'] = $files['Banner']['size']['image'];
                    if (!$this->upload->do_upload('image')) {
                        $data['error'] = $this->upload->display_errors();
                    } else {
                        $uploadData = $this->upload->data();
                        $image = '/uploads/advertisement/'. $uploadData['file_name'];
                        $data_insert['image'] = $image;
                    }
                }
            }
            $data_insert['type'] = 'advertisement';
            $this->banner->update_model($id, $data_insert);
            redirect('admin/advertisement/index', 'refresh');
        }

        $this->load->view('admin/layouts/index', $data);
    }

    public function delete($id) {
        $model = $this->banner->get_model(['id' => $id]);

        if (count($model) > 0) {
            if (is_file('.'.$model->image)) {
                unlink('.'.$model->image);
            }
            $this->banner->delete_model($id);
            echo 1;
        } else {
            echo 0;
        }
    }

    public function ajaxPublish() {
        if (!$this->input->is_ajax_request()) {
            exit('No direct script access allowed');
        }

        $id = $this->input->post('id');
        $publish = $this->input->post('publish');
        $model = $this->banner->get_model(['id' => $id]);

        if (count($model) > 0) {
            $data_update['publish'] = $publish;
            $this->db->where('id', $id);
            $this->db->update('banners', $data_update);
        }
    }

    public function bulkDelete() {
        $deleteItems = isset($_POST['select']) ? $_POST['select'] : [];

        if (!empty($deleteItems)) {
            $query = $this->db->query("SELECT * FROM ci_banners WHERE id in(".implode(',', $deleteItems).")");
            $models = $query->result('Banner');
            foreach ($models as $model) {
                if (is_file('.'.$model->image)) {
                    unlink('.'.$model->image);
                }
                $this->banner->delete_model($model->id);
            }
        }
        redirect('admin/advertisement/index', 'refresh');
    }

}