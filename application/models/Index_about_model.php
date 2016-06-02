<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index_about_model extends CI_Model {

	const DB_NAME = 'about';

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		
		parent::__construct();
		$this->load->database();
		
	}

	/**
	 * update Password By Id
	 * @return bool true on success, false on failure
	 */
	public function updateFieldById($id, $content)
	{
		$data = array(
			'content'   => $content,
		);

		return $this->db->update(self::DB_NAME, $data, array('id' => $id));
	}

	/**
	 * @return array
	 */
	public function selectById($id)
	{
		return $this->db->get_where(self::DB_NAME, array('id' => $id), 1)->result_array();
	}
}