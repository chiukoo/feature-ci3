<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account_model extends CI_Model {
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
	 * @access public
	 * @param mixed $username
	 * @param mixed $password
	 * @return bool true on success, false on failure
	 */
	public function create_user($username, $password) {
		
		$data = array(
			'username'   => $username,
			'password'   => $this->hash_password($password),
			'create_dt' => date('Y-m-d H:i:s'),
		);
		
		return $this->db->insert('account', $data);
		
	}
	
	/**
	 * get_user function.
	 * 
	 * @access public
	 * @param mixed $user_id
	 * @return array
	 */
	public function get_all_data() {
		return $this->db->get('account')->result_array();
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