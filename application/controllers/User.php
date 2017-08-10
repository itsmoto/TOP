<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        if (!$this->_is_login_on()) {
            redirect(SITEURL . 'user/login');
        }
        $this->load->view('admin/index');
    }

    public function upload_project() {
        if (!$this->_is_login_on()) {
            redirect(SITEURL . 'user/login');
        }
        $this->load->helper('url');
        $this->load->model('model_database');
        $result['categories'] = $this->model_database->view_categories();

        $config['upload_path'] = './project_files';
        $config['allowed_types'] = 'zip';
        $config['max_size'] = 15000000; /* 5mb */
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        $this->load->library('form_validation');
        $this->form_validation->set_rules('project_name', 'Project Name', 'trim|alpha_numeric_spaces|required');
        $this->form_validation->set_rules('payment', 'Payment', 'trim');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data = array('error_upload' => NULL,
                'message' => NULL,
                'categories' => $this->model_database->view_categories());
            $this->load->view('admin/upload_project', $data);
        } else {
            if (!$this->upload->do_upload('project_file')) {
                $data = array('error_upload' => $this->upload->display_errors(),
                    'message' => NULL,
                    'categories' => $this->model_database->view_categories());
                $this->load->view('admin/upload_project', $data);
            } else {
                $file_name = $this->upload->data('file_name');
                $full_path = $this->upload->data('full_path');
                $file_size = $this->upload->data('file_size');
                $file_type = $this->upload->data('file_type');
                $this->model_database->insert_project($file_name, $full_path, $file_size, $file_type);

                $data = array('error_upload' => NULL,
                    'message' => '<div class="alert alert-success">Success uploaded <a href="#"> Add screenshots</a></div>',
                    'categories' => $this->model_database->view_categories());
                $this->form_validation->resetpostdata();
                $this->load->view('admin/upload_project', $data);
            }
        }
    }

    public function view_users() {
        if (!$this->_is_login_on()) {
            redirect(SITEURL . 'user/login');
        }
        $this->load->helper('url');
        $this->load->model('model_database');
        $result['users'] = $this->model_database->view_users();
        $this->load->view('admin/view_users', $result);
    }

    public function _is_login_on() {
        $bool = FALSE;
        $is_login_on = $this->session->userdata('is_logged');
        if (isset($is_login_on) AND $is_login_on === TRUE) {
            $bool = TRUE;
        }
        return $bool;
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(SITEURL . 'user/login');
    }

    public function register() {
        if (!$this->_is_login_on()) {
            redirect(SITEURL . 'user/login');
        }
        $this->load->helper('url');
        $this->load->model('model_database');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required|is_unique[users.email]', array('is_unique' => 'This %s already exists.'));
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        $this->form_validation->set_rules('username', 'Useranme', 'trim|required|is_unique[users.username]', array('is_unique' => 'This %s already exists.'));
        $this->form_validation->set_rules('confirmpassword', 'Password Confirmation', 'trim|required|matches[password]');

        if ($this->form_validation->run() == FALSE) {
            $data['error'] = '';
            $data['message'] = '';
            $this->load->view('admin/register', $data);
        } else {
            $result = $this->model_database->register_user();
            if ($result) {
                $data['error'] = '';
                $data['message'] = '<div class="alert alert-success">Successful registered</div>';
                $this->form_validation->resetpostdata();
                $this->load->view('admin/register', $data);
            } else {
                $data['message'] = '';
                $data['error'] = 'There was a problem when adding your account to the database.';
                $this->load->view('admin/register', $data);
            }
        }
    }

    public function login() {
        if ($this->_is_login_on()) {
            redirect(SITEURL . 'user/');
        }
        $this->load->helper('url');
        $this->load->model('model_database');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['wrong_password'] = '';
            $this->load->view('admin/login', $data);
        } else {
            $result = $this->model_database->validate_user();
            if ($result) {
                redirect(SITEURL . 'user/');
            } else {
                $data['wrong_password'] = 'Wrong Email/password';
                $this->load->view('admin/login', $data);
            }
        }
    }

    public function view_projects() {
        if (!$this->_is_login_on()) {
            redirect(SITEURL . 'user/login');
        }

        $this->load->model('model_database');
        $result['projects'] = $this->model_database->view_projects();
        $this->load->view('admin/view_projects', $result);
    }

    public function project_description($project_name = null, $upload_date = null, $project_id = null) {
        if (!$this->_is_login_on()) {
            redirect(SITEURL . 'user/login');
        }

        $this->load->model('model_database');
        $result['project'] = $this->model_database->project_description($project_name, $upload_date, $project_id);
        $this->load->view('admin/project_description', $result);
    }

    public function upload_image($project_name = null, $upload_date = null, $project_id = null) {
        if (!$this->_is_login_on()) {
            redirect(SITEURL . 'user/login');
        }
        $this->load->model('model_database');
        $config['upload_path'] = './images/thumbnails';
        $config['allowed_types'] = 'png|jpg|jpeg|gif';
        $config['max_size'] = 5000000; /* 5mb */
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('screenshot')) {
            $data = array('error_upload' => '<div class="alert alert-danger">' . $this->upload->display_errors() . '</div>',
                'message' => NULL);
            $this->session->set_userdata($data);
            redirect(SITEURL . 'user/project_description/' . $project_name . '/' . $upload_date . '/' . $project_id);
        } else {
            $file_name = $this->upload->data('file_name');
            $full_path = $this->upload->data('full_path');
            $file_size = $this->upload->data('file_size');
            $file_type = $this->upload->data('file_type');
            $this->model_database->insert_screenshot($project_id, $file_name, $full_path, $file_size, $file_type);
            $data = array('error_upload' => NULL,
                'message' => '<div class="alert alert-success">Image has successfully been uploaded</div>');
            $this->session->set_userdata($data);
            redirect(SITEURL . 'user/project_description/' . $project_name . '/' . $upload_date . '/' . $project_id);
        }
    }

    public function add_news() {
        if (!$this->_is_login_on()) {
            redirect(SITEURL . 'user/login');
        }
        $this->load->library('form_validation');
        $this->form_validation->set_rules('news_title', 'News Title', 'trim|alpha_numeric_spaces|required');
        $this->form_validation->set_rules('description', 'Description', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data = array('message'=>null);
             $this->load->view('admin/add_news', $data);
        }  else {
            $data = array('message'=>'<div class="alert alert-success">News has successfully been uploaded</div>');
            $this->load->model('model_database');
            $this->model_database->add_news();
            $this->form_validation->resetpostdata();
            $this->load->view('admin/add_news',$data);
            
        }
        
    }
       public function list_news() {
        if (!$this->_is_login_on()) {
            redirect(SITEURL . 'user/login');
        }

        $this->load->model('model_database');
        $result['news'] = $this->model_database->list_news();
        $this->load->view('admin/list_news', $result);
    }
 public function view_news($date = null) {
        if (!$this->_is_login_on()) {
            redirect(SITEURL . 'user/login');
        }

        $this->load->model('model_database');
        $result['news'] = $this->model_database->view_news($date);
        $this->load->view('admin/view_news', $result);
    }
}
