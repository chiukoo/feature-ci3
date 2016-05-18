<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    private $language;
    private $layoutData;

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

        //設定layout data
        $this->layoutData = array(
            'left_active' => 'product',
            'layout'  => $this->lang->line('layout'),
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
    public function productTypeList()
    {
        $this->load->model('product_type_model');

        //account data
        $data = array(
            'lang' => $this->lang->line('product_type_list'),
            'data' => $this->product_type_model->getAllData(),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_type_list', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 產品類型類表新增
     */
    public function productTypeAdd()
    {
        //account data
        $data = array(
            'lang' => $this->lang->line('product_type_add'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/account_add', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 帳號編輯
     */
    public function productTypeEdit()
    {
        $this->load->model('account_model');

        //http url get
        $urlData = $this->uri->uri_to_assoc(3);

        //account data
        $accountData = array(
            'account' => $this->lang->line('account_edit'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'userData' => $this->account_model->selectById($urlData['id']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/account_edit', $accountData, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 帳號新增post
     */
    public function productTypeAddPost()
    {
        $this->load->library('form_validation');
        $this->load->model('account_model');

        
        // set validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|is_unique[account.username]', array('is_unique' => 'This username already exists'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            // set variables from the form
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if ($this->account_model->createUser($username, $password)) {
                redirect('product/productTypeList');
            } else {
                 echo "<script>alert('Please try again')</script>";
            }
        }
    }

    /**
     * 帳號編輯post
     */
    public function productTypeEditPost()
    {
        $this->load->library('form_validation');
        $this->load->model('account_model');

        
        // set validation rules
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            // set variables from the form
            $id = $this->input->post('id');
            $password = $this->input->post('password');

            if ($this->account_model->updatePasswordById($id, $password)) {
                redirect('product/productTypeList');
            } else {
                 echo "<script>alert('Please try again')</script>";
                 echo "<script>history.go(-1)</script>";
            }
        }
    }

    /**
     * 帳號刪除
     */
    public function productTypeDelete()
    {
        $this->load->model('account_model');
        $id = $this->input->post('id');

        if ($this->account_model->deleteById($id)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }

    /**
     * 帳號刪除
     */
    public function productTypeOrder()
    {
        $this->load->model('account_model');
        $id = $this->input->post('id');
        $order = $this->input->post('order');

        if ($this->account_model->updateOrderById($id, $order)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }
}
