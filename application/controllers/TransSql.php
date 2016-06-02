<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransSql extends CI_Controller {
	public function index()
	{
        $this->load->database();

        $data = array(
           'content' => 'test' ,
        );

        if ($this->db->insert('about', $data)) {
            echo 'done';
        } else {
            echo 'fucking error!!!!!!!!!!';
        };
	}
}
