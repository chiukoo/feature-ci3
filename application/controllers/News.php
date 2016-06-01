<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {
    private $layoutData;
    private $urlData;
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
            'outClass' => 'news',
            'layoutProjectId' => $this->urlData['project'],
            'layout'  => $this->lang->line('layout'),
            'layoutToken' => $this->security->get_csrf_token_name(),
            'layoutProject' => $this->product_project_model->getAllData(),
            'layoutType' => $this->product_type_model->getAllData(),
            'layoutHash' => $this->security->get_csrf_hash(),
        );
    }
	public function index()
	{
        $this->load->model('config_model');
        //data
        $data = array(
            'project' => config_model::PRODUCT_ID,
            'projectName' => $this->product_project_model->getFieldById('title', config_model::PRODUCT_ID),
            'typeData' => $this->product_type_model->getAllDataByField(config_model::PRODUCT_ID),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('news/index', $data, true);
		$this->load->view('layout/layout', $this->layoutData);
	}
}
