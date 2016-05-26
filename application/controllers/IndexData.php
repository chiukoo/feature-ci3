<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexData extends CI_Controller {

    private $language;
    private $layoutData;
    private $urlData;

    /**
     * setting
     */
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->isLogin) {
            redirect('login');
        }
        $this->language = $this->session->adminLanguage;

        if (isset($this->language)) {
            //設定語系
            $this->lang->load($this->config->item('language_admin_file_name'), $this->session->adminLanguage);
        } else {
            $this->lang->load($this->config->item('language_admin_file_name'), 'chinese');
        }

        $this->load->model('index_data_model');

        //判斷active
        $this->urlData = $this->uri->uri_to_assoc(3);

        //取出左邊項目名稱
        $this->load->model('product_project_model');        

        //設定layout data
        $this->layoutData = array(
            'left_active' => 'indexData',
            'layout'  => $this->lang->line('layout'),
            'project' => $this->product_project_model->getAllData(),
            'layoutToken' => $this->security->get_csrf_token_name(),
            'layoutHash' => $this->security->get_csrf_hash(),
        );
    }

    /**
     * 更換語系
     */
    public function changeLanguage()
    {
        $this->session->set_userdata('adminLanguage', $this->input->post('lang'));
    }

    /**
     * 產品類型類表
     */
    public function indexDataList()
    {
        //account data
        $data = array(
            'lang' => $this->lang->line('index_data_list'),
            'data' => $this->index_data_model->getAllData(),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('indexData/index_data_list', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 產品類型類表新增
     */
    public function indexDataAdd()
    {
        //account data
        $data = array(
            'lang' => $this->lang->line('index_data_add'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('indexData/index_data_add', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 帳號新增post
     */
    public function indexDataAddPost()
    {
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'img_url',
                'label' => 'Title',
                'rules' => 'trim|required'
            )
        );

        // set validation rules
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            // set variables from the form
            $imgUrl = $this->input->post('img_url');

            if ($this->index_data_model->createUser($imgUrl)) {
                redirect('indexData/indexDataList');
            } else {
                 echo "<script>alert('Please try again')</script>";
            }
        }
    }

    /**
     * 刪除
     */
    public function indexDataDelete()
    {
        $id = $this->input->post('id');

        if ($this->index_data_model->deleteById($id)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }

    /**
     * 排序
     */
    public function indexDataOrder()
    {
        $id = $this->input->post('id');
        $order = $this->input->post('order');

        if ($this->index_data_model->updateOrderById($id, $order)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }

    /**
     * 編輯
     */
    public function indexDataEdit()
    {
        //http url get
        $urlData = $this->uri->uri_to_assoc(3);

        //data
        $data = array(
            'lang' => $this->lang->line('index_data_edit'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'userData' => $this->index_data_model->selectById($urlData['id']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('indexData/index_data_edit', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 編輯post
     */
    public function indexDataEditPost()
    {
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'img_url',
                'label' => 'Title',
                'rules' => 'trim|required'
            )
        );

        // set validation rules
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            // set variables from the form
            $id = $this->input->post('id');
            $imgUrl = $this->input->post('img_url');

            if ($this->index_data_model->updateFieldById($id, $imgUrl)) {
                redirect('indexData/indexDataList');
            } else {
                 echo "<script>alert('Please try again')</script>";
                 echo "<script>history.go(-1)</script>";
            }
        }
    }
}
