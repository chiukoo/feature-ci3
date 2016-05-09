<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {

	const DB_NAME = 'account';

	/**
	 * __construct function.
	 * 
	 * @access public
	 * @return void
	 */
	public function __construct() {
		
		parent::__construct();
		$this->load->database();
		
	}
	
	/**
	 * create_user function.
	 * 
	 * @return bool true on success, false on failure
	 */
	public function createUser($username, $password) {
		
		$data = array(
			'username'   => $username,
			'password'   => $this->hash_password($password),
			'create_dt' => date('Y-m-d H:i:s'),
		);
		
		return $this->db->insert(self::DB_NAME, $data);
	}

	/**
	 * update Password By Id
	 * @return bool true on success, false on failure
	 */
	public function updatePasswordById($id, $password) {
		
		$data = array(
			'password'   => $this->hash_password($password),
		);
		return $this->db->update(self::DB_NAME, $data, array('id' => $id));
	}

	/**
	 * get_user function.
	 * 
	 * @return array
	 */
	public function getAllData() {
		return $this->db->get(self::DB_NAME)->result_array();
	}

	/**
	 * get_user by id.
	 * @return array
	 */
	public function selectById($id) {
		return $this->db->get_where(self::DB_NAME, array('id' => $id), 1)->result_array();
	}

	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
}