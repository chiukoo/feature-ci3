<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

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

        $this->load->model('news_model');

        //設定layout data
        $this->layoutData = array(
            'left_active' => 'news',
            'layout'  => $this->lang->line('layout'),
            'project' => $this->news_model->getAllData(),
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
     * 
     */
    public function newsList()
    {
        if (!$this->session->systemLevel) {
            redirect('admin/accountList');
        }

        //account data
        $data = array(
            'lang' => $this->lang->line('news_list'),
            'data' => $this->news_model->getAllData(),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('news/news_list', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 最新消息新增
     */
    public function newsAdd()
    {
        if (!$this->session->systemLevel) {
            redirect('admin/accountList');
        }

        //account data
        $data = array(
            'lang' => $this->lang->line('news_add'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('news/news_add', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 帳號新增post
     */
    public function newsAddPost()
    {
        if (!$this->session->systemLevel) {
            redirect('admin/accountList');
        }
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'title',
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
            $title = $this->input->post('title');
            $content = $this->input->post('content');

            if ($this->news_model->create($title, $content)) {
                redirect('news/newsList');
            } else {
                 echo "<script>alert('Please try again')</script>";
            }
        }
    }

    /**
     * 刪除
     */
    public function newsDelete()
    {
        if (!$this->session->systemLevel) {
            redirect('admin/accountList');
        }
        $id = $this->input->post('id');

        if ($this->news_model->deleteById($id)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }

    /**
     * 排序
     */
    public function newsOrder()
    {
        if (!$this->session->systemLevel) {
            redirect('admin/accountList');
        }
        $id = $this->input->post('id');
        $order = $this->input->post('order');

        if ($this->news_model->updateOrderById($id, $order)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }

    /**
     * 編輯
     */
    public function newsEdit()
    {
        if (!$this->session->systemLevel) {
            redirect('admin/accountList');
        }
        //http url get
        $urlData = $this->uri->uri_to_assoc(3);

        //data
        $data = array(
            'lang' => $this->lang->line('news_edit'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'userData' => $this->news_model->selectById($urlData['id']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('news/news_edit', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 編輯post
     */
    public function newsEditPost()
    {
        if (!$this->session->systemLevel) {
            redirect('admin/accountList');
        }
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'title',
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
            $title = $this->input->post('title');
            $content = $this->input->post('content');

            if ($this->news_model->updateFieldById($id, $title, $content)) {
                redirect('news/newsList');
            } else {
                 echo "<script>alert('Please try again')</script>";
                 echo "<script>history.go(-1)</script>";
            }
        }
    }
}
