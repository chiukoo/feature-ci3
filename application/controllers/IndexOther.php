<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexOther extends CI_Controller {

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

        $this->load->model('index_other_model');

        //判斷active
        $this->urlData = $this->uri->uri_to_assoc(3);

        //取出左邊項目名稱
        $this->load->model('product_project_model');        

        //設定layout data
        $this->layoutData = array(
            'left_active' => 'indexOther',
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
    public function indexOtherEdit()
    {
        //http url get
        $urlData = $this->uri->uri_to_assoc(3);

        //data
        $data = array(
            'lang' => $this->lang->line('index_other_edit'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'userData' => $this->index_other_model->selectById(1),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('indexOther/index_other_edit', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 編輯post
     */
    public function indexOtherEditPost()
    {
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'youtube',
                'label' => 'Youtube',
                'rules' => 'trim|required'
            )
        );

        // set validation rules
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>location.reload();</script>";
        } else {
            $youtube = $this->input->post('youtube');

            if ($this->index_other_model->updateFieldById(1, $youtube)) {
                redirect('indexOther/indexOtherEdit');
            } else {
                 echo "<script>alert('Please try again')</script>";
                 echo "<script>location.reload();</script>";
            }
        }
    }
}
