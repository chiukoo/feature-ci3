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
        $this->language = $this->session->language;

        if (isset($this->language)) {
            //設定語系
            $this->lang->load($this->config->item('language_file_name'), $this->session->language);
        }
    }

	/**
	 * 後台資料列表
	 */
	public function dataList()
	{
		$data = array(
            'content' => $this->load->view('admin/list', '', true),
            'layout'  => $this->lang->line('layout')
        );

		$this->load->view('admin/layout', $data);
	}
}
