<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Projects extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        $this->load->view('projects/home_page');
    }

    public function login() {
        $this->load->helper('url');
        $this->load->model('model_database');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email', 'trim|valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');
        if ($this->form_validation->run() == FALSE) {
            $data['wrong_password'] = '';
            $this->load->view('login',$data);
        } else {
            $result = $this->model_database->validate_user();
            if ($result) {
                redirect(SITEURL.'user/');
            } else {
                $data['wrong_password'] = 'Wrong Email/password';
                $this->load->view('login',$data);
            }
        }
    }

    public function about() {
        $this->load->helper('url');
        $this->load->view('projects/about');
    }
    public function policy() {
        $this->load->helper('url');
        $this->load->view('projects/policy');
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(SITEURL.'projects/login');
    }
    
    public function view($project_name = null, $upload_date = null, $project_id = null) {
        $this->load->model('model_database');
        $result['project'] = $this->model_database->project_description($project_name, $upload_date, $project_id);
        if(!$result['project']){
            redirect(SITEURL.'projects/');
        }
        $this->load->view('projects/view', $result);
    }
    public function category1() {
        $this->load->view('projects/category1');
    }
    public function category2() {
        $this->load->view('projects/category2');
    }
    public function category3() {
        $this->load->view('projects/category3');
    }
    public function free() {
        $this->load->view('projects/free');
    }
    public function paid() {
        $this->load->view('projects/paid');
    }
     public function read($date=null) {
          $this->load->model('model_database');
         $result['news'] = $this->model_database->view_news($date);
         if(!$result['news']){
        redirect(SITEURL.'projects/');
         }
         $this->load->view('projects/read',$result);
    }
}
