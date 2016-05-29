<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class IndexProduct extends CI_Controller {
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

        //取得url data
        $this->urlData = $this->uri->uri_to_assoc(3);

        //設定layout data
        $this->layoutData = array(
            'outClass' => 'products',
            'layout'  => $this->lang->line('layout'),
            'layoutToken' => $this->security->get_csrf_token_name(),
            'layoutProject' => $this->product_project_model->getAllData(),
            'layoutType' => $this->product_type_model->getAllData(),
            'layoutHash' => $this->security->get_csrf_hash(),
        );
    }

	public function index()
	{
        //account data
        $data = array(
            'lang' => $this->lang->line('index'),
            'project' => $this->urlData['project'],
            'projectName' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
            'typeData' => $this->product_type_model->getAllDataByField($this->urlData['project']),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('indexProduct/index', $data, true);
		$this->load->view('layout/layout', $this->layoutData);
	}

    public function productList()
    {

        $this->load->model('product_details_model');

        //account data
        $data = array(
            'lang' => $this->lang->line('index'),
            'project' => $this->urlData['project'],
            'projectName' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
            'type' => $this->urlData['type'],
            'typeName' => $this->product_type_model->getFieldById('title', $this->urlData['type']),
            'typeData' => $this->product_type_model->getAllDataByField($this->urlData['project']),
            'detailsData' => $this->product_details_model->getAllDataByField($this->urlData['project'], $this->urlData['type']),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('indexProduct/productList', $data, true);
        $this->load->view('layout/layout', $this->layoutData);
    }

    public function productDetails()
    {

        $this->load->model('product_details_model');

        //account data
        $data = array(
            'lang' => $this->lang->line('index'),
            'project' => $this->urlData['project'],
            'projectName' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
            'type' => $this->urlData['type'],
            'typeName' => $this->product_type_model->getFieldById('title', $this->urlData['type']),
            'typeData' => $this->product_type_model->getAllDataByField($this->urlData['project']),
            'detailsData' => $this->product_details_model->selectById($this->urlData['details']),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('indexProduct/productDetails', $data, true);
        $this->load->view('layout/layout', $this->layoutData);
    }
}
