<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    private $language;

    /**
     * setting
     */
    public function __construct()
    {
        parent::__construct();
        $this->language = $this->session->adminLanguage;

        if (isset($this->language)) {
            //設定語系
            $this->lang->load($this->config->item('language_admin_file_name'), $this->session->adminLanguage);
        } else {
            $this->lang->load($this->config->item('language_admin_file_name'), 'chinese');
        }
    }

	/**
	 * 帳號設定列表
	 */
	public function accountList()
	{
        $this->load->model('account_model');

        //account data
        $accountData = array(
            'account' => $this->lang->line('account_list'),
            'account_data' => $this->account_model->get_all_data(),
        );

        //layout data
		$layoutData = array(
            'left_active' => 'account',
            'content' => $this->load->view('admin/account_list', $accountData, true),
            'layout'  => $this->lang->line('layout'),
        );

		$this->load->view('admin/layout', $layoutData);
	}

    /**
     * 帳號新增
     */
    public function accountAdd()
    {
        //account data
        $accountData = array(
            'account' => $this->lang->line('account_add'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()

        );

        //layout data
        $layoutData = array(
            'left_active' => 'account',
            'content' => $this->load->view('admin/account_add', $accountData, true),
            'layout'  => $this->lang->line('layout'),
        );

        $this->load->view('admin/layout', $layoutData);
    }

    /**
     * 帳號新增post
     */
    public function accountAddPost()
    {
        $this->load->library('form_validation');
        $this->load->model('account_model');

        
        // set validation rules
        $this->form_validation->set_rules('username', 'Username', 'trim|required|alpha_numeric|is_unique[account.username]', array('is_unique' => 'This username already exists. Please choose another one.'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|matches[password]');

        if ($this->form_validation->run() === false) {
            echo "<script>alert(validation_errors())</script>";
        } else {
            // set variables from the form
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            if ($this->account_model->create_user($username, $password)) {
                redirect('admin/accountList');
            } else {
                 echo "<script>alert('Please try again')</script>";
            }
        }
        
    }
}
