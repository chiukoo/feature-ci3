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
		$data = array(
            'left_active' => 'account',
            'content' => $this->load->view('admin/account_list', '', true),
            'layout'  => $this->lang->line('layout')
        );

		$this->load->view('admin/layout', $data);
	}
}
