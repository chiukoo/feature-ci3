<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class indexAbout extends CI_Controller {

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

        $this->load->model('index_about_model');

        //取出左邊項目名稱
        $this->load->model('product_project_model');        

        //設定layout data
        $this->layoutData = array(
            'left_active' => 'indexAbout',
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
     * 編輯
     */
    public function indexAboutEdit()
    {
        //data
        $data = array(
            'lang' => $this->lang->line('index_about_edit'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'userData' => $this->index_about_model->selectById(1),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('indexAbout/index_about_edit', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 編輯post
     */
    public function indexAboutEditPost()
    {
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'content',
                'label' => 'Content',
                'rules' => 'required'
            )
        );

        // set validation rules
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            redirect('indexAbout/indexAboutEdit');
        } else {
            $content = $this->input->post('content');

            if ($this->index_about_model->updateFieldById(1, $content)) {
                redirect('indexAbout/indexAboutEdit');
            } else {
                 echo "<script>alert('Please try again')</script>";
                 echo "<script>location.reload();</script>";
            }
        }
    }
}
