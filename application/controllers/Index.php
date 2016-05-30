<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller {
    private $layoutData;
    /**
     * setting
     */
    public function __construct()
    {
    	parent::__construct();

        //設定語系(此網站只有中文版)
        $this->lang->load($this->config->item('language_front_file_name'), 'chinese');

        //get db
        $this->load->model('product_project_model');
        $this->load->model('product_type_model');

        //設定預設中文版
        if (!isset($this->session->dataLang)) {
            $this->session->set_userdata('dataLang', 'ch');
        }

        //設定layout data
        $this->layoutData = array(
            'outClass' => 'index',
            'layout'  => $this->lang->line('layout'),
            'layoutToken' => $this->security->get_csrf_token_name(),
            'layoutProject' => $this->product_project_model->getAllData(),
            'layoutType' => $this->product_type_model->getAllData(),
            'layoutHash' => $this->security->get_csrf_hash(),
        );
    }
	public function index()
	{
        $this->load->model('index_data_model');
        $this->load->model('index_other_model');
        $this->load->model('product_details_model');
        //account data
        $data = array(
            'indexData' => $this->index_data_model->getAllData(),
            'youtube' => $this->index_other_model->selectById(1),
            's_banner' => $this->product_details_model->getIndexSbanner(),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('index/index', $data, true);
		$this->load->view('layout/layout', $this->layoutData);
	}
}
