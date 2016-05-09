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
	 * check user for login
	 *
	 * @return bool true on success, false on failure
	 */
	public function checkUser($username, $password) {
		$this->db->select('password');
		$this->db->from(self::DB_NAME);
		$this->db->where('username', $username);
		$hash = $this->db->get()->row('password');

		return $this->verify_password_hash($password, $hash);
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
	 * delete By Id
	 * @return bool true on success, false on failure
	 */
	public function deleteById($id) {
		
		$data = array(
			'password'   => $this->hash_password($password),
		);
		return $this->db->delete(self::DB_NAME, array('id' => $id));
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
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		return password_verify($password, $hash);
	}
}