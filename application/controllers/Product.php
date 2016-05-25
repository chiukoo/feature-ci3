<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

    private $language;
    private $layoutData;
    private $urlData;

    /**
     * setting
     */
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->isLogin) {
            redirect('login');
        }
        $this->language = $this->session->adminLanguage;

        if (isset($this->language)) {
            //設定語系
            $this->lang->load($this->config->item('language_admin_file_name'), $this->session->adminLanguage);
        } else {
            $this->lang->load($this->config->item('language_admin_file_name'), 'chinese');
        }

        $this->load->model('product_project_model');
        $this->load->model('product_type_model');
        $this->load->model('product_inner_model');
        $this->load->model('product_details_model');

        //判斷active
        $this->urlData = $this->uri->uri_to_assoc(3);

        $active = empty($this->urlData) ? 'product' : $this->urlData['project'];

        //設定layout data
        $this->layoutData = array(
            'left_active' => $active,
            'layout'  => $this->lang->line('layout'),
            'project' => $this->product_project_model->getAllData(),
            'layoutToken' => $this->security->get_csrf_token_name(),
            'layoutHash' => $this->security->get_csrf_hash(),
        );
    }

    /**
     * 更換語系
     */
    public function changeLanguage()
    {
        $this->session->set_userdata('adminLanguage', $this->input->post('lang'));
    }

    /**
     * 產品類型類表
     */
    public function productProjectList()
    {
        //account data
        $data = array(
            'lang' => $this->lang->line('product_project_list'),
            'data' => $this->product_project_model->getAllData(),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_project_list', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 產品類型類表新增
     */
    public function productProjectAdd()
    {
        //account data
        $data = array(
            'lang' => $this->lang->line('product_project_add'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_project_add', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 帳號新增post
     */
    public function productProjectAddPost()
    {
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            )
        );

        // set validation rules
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            // set variables from the form
            $title = $this->input->post('title');

            if ($this->product_project_model->createUser($title)) {
                redirect('product/productProjectList');
            } else {
                 echo "<script>alert('Please try again')</script>";
            }
        }
    }

    /**
     * 刪除
     */
    public function productProjectDelete()
    {
        $id = $this->input->post('id');

        if ($this->product_project_model->deleteById($id)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }

    /**
     * 排序
     */
    public function productProjectOrder()
    {
        $id = $this->input->post('id');
        $order = $this->input->post('order');

        if ($this->product_project_model->updateOrderById($id, $order)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }

    /**
     * 編輯
     */
    public function productProjectEdit()
    {
        //http url get
        $urlData = $this->uri->uri_to_assoc(3);

        //data
        $data = array(
            'lang' => $this->lang->line('product_project_edit'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'userData' => $this->product_project_model->selectById($urlData['id']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_project_edit', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 編輯post
     */
    public function productProjectEditPost()
    {
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required|alpha_numeric'
            )
        );

        // set validation rules
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            // set variables from the form
            $id = $this->input->post('id');
            $title = $this->input->post('title');

            if ($this->product_project_model->updateFieldById($id, $title)) {
                redirect('product/productProjectList');
            } else {
                 echo "<script>alert('Please try again')</script>";
                 echo "<script>history.go(-1)</script>";
            }
        }
    }

    /**
     * 產品類型類表
     */
    public function productTypeList()
    {
        //data
        $data = array(
            'lang' => $this->lang->line('product_type_list'),
            'data' => $this->product_type_model->getAllDataByField($this->urlData['project']),
            'token' => $this->security->get_csrf_token_name(),
            'getUrlData' => $this->urlData['project'],
            'hash' => $this->security->get_csrf_hash(),
            'project' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_type_list', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 產品類型類表新增
     */
    public function productTypeAdd()
    {
        //account data
        $data = array(
            'lang' => $this->lang->line('product_type_add'),
            'token' => $this->security->get_csrf_token_name(),
            'getUrlData' => $this->urlData['project'],
            'hash' => $this->security->get_csrf_hash(),
            'project' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_type_add', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 帳號新增post
     */
    public function productTypeAddPost()
    {
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            )
        );

        // set validation rules
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            $title = $this->input->post('title');
            $img_url = $this->input->post('img_url');
            $getProject = $this->input->post('getProject');

            if ($this->product_type_model->createUser($title, $img_url, $getProject)) {
                redirect('product/productTypeList/project/'.$getProject);
            } else {
                 echo "<script>alert('Please try again')</script>";
            }
        }
    }

    /**
     * 編輯
     */
    public function productTypeEdit()
    {
        //data
        $data = array(
            'lang' => $this->lang->line('product_type_edit'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getUrlData' => $this->urlData['project'],
            'userData' => $this->product_type_model->selectById($this->urlData['id']),
            'project' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_type_edit', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 編輯post
     */
    public function productTypeEditPost()
    {
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            )
        );

        // set validation rules
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            // set variables from the form
            $id = $this->input->post('getId');
            $title = $this->input->post('title');
            $img_url = $this->input->post('img_url');
            $getProject = $this->input->post('getProject');

            if ($this->product_type_model->updateFieldById($id, $title, $img_url)) {
                redirect('product/productTypeList/project/'.$getProject);
            } else {
                 echo "<script>alert('Please try again')</script>";
                 echo "<script>history.go(-1)</script>";
            }
        }
    }

    /**
     * delete
     */
    public function productTypeDelete()
    {
        $id = $this->input->post('id');

        if ($this->product_type_model->deleteById($id)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }

    /**
     * order
     */
    public function productTypeOrder()
    {
        $id = $this->input->post('id');
        $order = $this->input->post('order');

        if ($this->product_type_model->updateOrderById($id, $order)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }

    /**
     * 產品內容類表
     */
    public function productInnerList()
    {
        //data
        $data = array(
            'lang' => $this->lang->line('product_inner_list'),
            'data' => $this->product_inner_model->getAllDataByField($this->urlData['project'], $this->urlData['type']),
            'token' => $this->security->get_csrf_token_name(),
            'getUrlData' => $this->urlData['project'],
            'getUrlType' => $this->urlData['type'],
            'hash' => $this->security->get_csrf_hash(),
            'project' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
            'type' => $this->product_type_model->getFieldById('title', $this->urlData['type']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_inner_list', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 產品類型類表新增
     */
    public function productInnerAdd()
    {
        //account data
        $data = array(
            'lang' => $this->lang->line('product_inner_add'),
            'token' => $this->security->get_csrf_token_name(),
            'getUrlData' => $this->urlData['project'],
            'getUrlType' => $this->urlData['type'],
            'hash' => $this->security->get_csrf_hash(),
            'project' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
            'type' => $this->product_type_model->getFieldById('title', $this->urlData['type']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_inner_add', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 帳號新增post
     */
    public function productInnerAddPost()
    {
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            )
        );

        // set validation rules
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            $title = $this->input->post('title');
            $img_url = $this->input->post('img_url');
            $getProject = $this->input->post('getProject');
            $getType = $this->input->post('getType');

            if ($this->product_inner_model->createUser($title, $img_url, $getProject, $getType)) {
                redirect('product/productInnerList/project/'.$getProject.'/type/'.$getType);
            } else {
                 echo "<script>alert('Please try again')</script>";
            }
        }
    }

    /**
     * 編輯
     */
    public function productInnerEdit()
    {
        //data
        $data = array(
            'lang' => $this->lang->line('product_inner_edit'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getUrlData' => $this->urlData['project'],
            'getUrlType' => $this->urlData['type'],
            'userData' => $this->product_inner_model->selectById($this->urlData['id']),
        );

        foreach ($this->layoutData['project'] as $project) {
            if ($project['id'] == $this->urlData['project']) {
                $data['project'] = $project['title'];
            }
        }

        foreach ($this->layoutData['type'] as $type) {
            if ($type['id'] == $this->urlData['type']) {
                $data['type'] = $type['title'];
            }
        }

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_inner_edit', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 編輯post
     */
    public function productInnerEditPost()
    {
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            )
        );

        // set validation rules
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            // set variables from the form
            $id = $this->input->post('getId');
            $title = $this->input->post('title');
            $img_url = $this->input->post('img_url');
            $getProject = $this->input->post('getProject');
            $getType = $this->input->post('getType');

            if ($this->product_inner_model->updateFieldById($id, $title, $img_url)) {
                redirect('product/productInnerList/project/'.$getProject.'/type/'.$getType);
            } else {
                 echo "<script>alert('Please try again')</script>";
                 echo "<script>history.go(-1)</script>";
            }
        }
    }

    /**
     * delete
     */
    public function productInnerDelete()
    {
        $id = $this->input->post('id');

        if ($this->product_inner_model->deleteById($id)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }

    /**
     * order
     */
    public function productInnerOrder()
    {
        $id = $this->input->post('id');
        $order = $this->input->post('order');

        if ($this->product_inner_model->updateOrderById($id, $order)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }


    /**
     * 列表
     */
    public function productDetailsList()
    {
        //data
        $data = array(
            'lang' => $this->lang->line('product_details_list'),
            'data' => $this->product_details_model->getAllDataByField($this->urlData['project'], $this->urlData['type'], $this->urlData['inner']),
            'token' => $this->security->get_csrf_token_name(),
            'getUrlData' => $this->urlData['project'],
            'getUrlType' => $this->urlData['type'],
            'getUrlInner' => $this->urlData['inner'],
            'hash' => $this->security->get_csrf_hash(),
            'project' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
            'type' => $this->product_type_model->getFieldById('title', $this->urlData['type']),
            'inner' => $this->product_inner_model->getFieldById('title', $this->urlData['inner']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_details_list', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 產品類型類表新增
     */
    public function productDetailsAdd()
    {
        //account data
        $data = array(
            'lang' => $this->lang->line('product_details_add'),
            'token' => $this->security->get_csrf_token_name(),
            'getUrlData' => $this->urlData['project'],
            'getUrlType' => $this->urlData['type'],
            'getUrlInner' => $this->urlData['inner'],
            'hash' => $this->security->get_csrf_hash(),
            'project' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
            'type' => $this->product_type_model->getFieldById('title', $this->urlData['type']),
            'inner' => $this->product_inner_model->getFieldById('title', $this->urlData['inner']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_details_add', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 帳號新增post
     */
    public function productDetailsAddPost()
    {
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            )
        );

        // set validation rules
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            $title = $this->input->post('title');
            $img_url = $this->input->post('img_url');
            $content_sample  = $this->input->post('content_sample');
            $content_details = $this->input->post('content_details');
            $getProject = $this->input->post('getProject');
            $getType = $this->input->post('getType');
            $getInner = $this->input->post('getInner');
            $getBanner = !is_null($this->input->post('index_s_banner')) ? $this->input->post('index_s_banner') : 0;

            if ($this->product_details_model->createUser($title, $content_sample, $content_details, $img_url, $getBanner, $getProject, $getType, $getInner)) {
                redirect('product/productDetailsList/project/'.$getProject.'/type/'.$getType.'/inner/'.$getInner);
            } else {
                 echo "<script>alert('Please try again')</script>";
            }
        }
    }

    /**
     * 編輯
     */
    public function productDetailsEdit()
    {
        //data
        $data = array(
            'lang' => $this->lang->line('product_details_edit'),
            'token' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash(),
            'getUrlData' => $this->urlData['project'],
            'getUrlType' => $this->urlData['type'],
            'getUrlInner' => $this->urlData['inner'],
            'userData' => $this->product_details_model->selectById($this->urlData['id']),
            'project' => $this->product_project_model->getFieldById('title', $this->urlData['project']),
            'type' => $this->product_type_model->getFieldById('title', $this->urlData['type']),
            'inner' => $this->product_inner_model->getFieldById('title', $this->urlData['inner']),
        );

        //layout data
        $this->layoutData['content'] = $this->load->view('product/product_details_edit', $data, true);
        $this->load->view('admin/layout', $this->layoutData);
    }

    /**
     * 編輯post
     */
    public function productDetailsEditPost()
    {
        $this->load->library('form_validation');

        $rules = array(
            array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'trim|required'
            )
        );

        // set validation rules
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() === false) {
            echo "<script>alert('".validation_errors()."');</script>";
            echo "<script>history.go(-1)</script>";
        } else {
            // set variables from the form
            $id = $this->input->post('getId');
            $title = $this->input->post('title');
            $img_url = $this->input->post('img_url');
            $content_sample  = $this->input->post('content_sample');
            $content_details = $this->input->post('content_details');
            $getProject = $this->input->post('getProject');
            $getType = $this->input->post('getType');
            $getInner = $this->input->post('getInner');
            $getBanner = !is_null($this->input->post('index_s_banner')) ? $this->input->post('index_s_banner') : 0;

            if ($this->product_details_model->updateFieldById($id, $title, $content_sample, $content_details, $img_url, $getBanner, $getProject, $getType, $getInner)) {
                redirect('product/productDetailsList/project/'.$getProject.'/type/'.$getType.'/inner/'.$getInner);
            } else {
                 echo "<script>alert('Please try again')</script>";
                 echo "<script>history.go(-1)</script>";
            }
        }
    }

    /**
     * delete
     */
    public function productDetailsDelete()
    {
        $id = $this->input->post('id');

        if ($this->product_details_model->deleteById($id)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }

    /**
     * order
     */
    public function productDetailsOrder()
    {
        $id = $this->input->post('id');
        $order = $this->input->post('order');

        if ($this->product_details_model->updateOrderById($id, $order)) {
            echo $this->security->get_csrf_hash();
        } else {
            echo '錯誤! 請聯絡系統管理員';
        }
    }
}
