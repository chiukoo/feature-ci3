<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
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
            'outClass' => 'contact',
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
        //驗證碼
        $cap = $this->createCaptcha();

        //data
        $data = array(
            'captcha' => $cap['image'],
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'layoutProject' => $this->product_project_model->getAllData(),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('contact/index', $data, true);
		$this->load->view('layout/layout', $this->layoutData);
	}

    public function changeCaptcha()
    {
        //驗證碼
        $cap = $this->createCaptcha();

        //設定session
        $this->session->set_userdata('webCaptcha', $cap['word']);

        echo $cap['filename'];
    }

    public function mailPost()
    {
        $post = $this->input->post();

        if ($post['captcha'] != $this->session->webCaptcha) {
            echo "<script>alert('驗證碼錯誤');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            $to = "aircomfy@gmail.com";
            $subject = $post['type'].' 來自'.$post['username'].$post['gender'];
            $message = "姓名：" . $post['username'] . $post['gender'] . "\n\n" . "地址：" . $post['county'] . $post['district'] . $post['zipcode'] . $post['address'] . "\n\n" . "聯絡電話：" . $post['phone'] . "\n\n" . "傳真：" . $post['fax'] . "\n\n" . "email：" . $post['email'] . "\n\n" . "內容：" . $post['content'];
            $retval = mail($to, $subject, $message, $subject);
            redirect('contact');
        }
    }

    private function createCaptcha()
    {
        $this->load->helper('captcha');
        $vals = array(
        'img_path'      => './captcha/',
        'img_url'       => base_url().'captcha/',
        'img_width'     => '80',
        'img_height'    => 30,
        'expiration'    => 3600,
        'word_length'   => 4,
        'font_size'     => 20,
        'img_id'        => 'captchaId',
        'pool'          => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ',

        // White background and border, black text and red grid
        'colors'        => array(
                'background' => array(235, 235, 235),
                'border' => array(255, 255, 255),
                'text' => array(0, 0, 0),
                'grid' => array(220, 220, 220)
        )
        );

        $cap = create_captcha($vals);

        //設定session
        $this->session->set_userdata('webCaptcha', $cap['word']);

        return $cap;
    }
}
