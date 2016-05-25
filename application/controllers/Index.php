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
    }
	public function index()
	{
        //layout data
        $this->layoutData['content'] = $this->load->view('index/index', '', true);
		$this->load->view('layout/layout', $this->layoutData);
	}
}
