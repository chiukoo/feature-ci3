<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * 後台資料列表
	 */
	public function dataList()
	{
		$data = array('content' => $this->load->view('admin/list', '', true));
		$this->load->view('admin/layout', $data);
	}
}
