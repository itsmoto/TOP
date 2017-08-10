<?php

class Model_database extends CI_Model {

    public function validate_user() {
        $email = $this->input->post('email');
        $password = sha1($this->input->post('password'));
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $result = $this->db->get("users");
        if ($result->num_rows() == 1) {
            foreach ($result->result_array() as $row) {
                $data = array('user_id' => $row['user_id'],
                    'username' => $row['username'],
                    'is_logged' => true,
                    'user_role' => $row['user_role']
                );
                $this->session->set_userdata($data);
            }
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function register_user() {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'password' => sha1($this->input->post('password')),
            'token' => '',
            'user_role' => '1'
        );

        if ($this->db->insert('users', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function view_users() {
        $this->db->order_by('user_id', 'DESC');
        $result = $this->db->get("users");
        return $result->result_array();
    }
    public function view_categories() {
        $result = $this->db->get("Categories");
        return $result->result_array();
    }
    public function insert_project($file_name,$full_path,$file_size,$file_type){
        $upload_date = time();
        $data = array('project_name' => $this->input->post('project_name'),
            'category_id'=>$this->input->post('category'),
            'uploader'=>$this->session->userdata('username'),
            'payment'=>$this->input->post('payment'),
            'description'=>$this->input->post('description'),
            'upload_date'=>  $upload_date);
        if ($this->db->insert('projects', $data)) {
            $this->db->where('uploader', $this->session->userdata('username'));
            $this->db->where('upload_date', $upload_date);
            $result = $this->db->get("projects")->result_array();
            $project_id = '';
            foreach ($result as $project) {
                $project_id = $project['project_id'];
            }
            
            $data_file = array(
                'file_name'=>$file_name,
                'file_path'=>$full_path,
                'file_size'=>$file_size,
                'file_type'=>$file_type,
                'project_id' =>$project_id);
            if($this->db->insert('files', $data_file)){
                return TRUE;
            }
        } else {
            return FALSE;
        }
    }
    
    public function view_projects() {
        $this->db->order_by('project_id', 'DESC');
        $result = $this->db->get("projects");
        return $result->result_array();
    }
    
    public function project_description($project_name,$upload_date,$project_id) {
        $project_name = preg_replace('#[-]+#', ' ',$project_name);
        $this->db->where('project_name', $project_name);
        $this->db->where('upload_date', $upload_date);
        $this->db->where('project_id', $project_id);
        $query = $this->db->get("projects");
        if($query->num_rows()>0){
            return  $query->result_array();
        }  else {
            return FALSE;
        }
    }


    public function insert_screenshot($project_id,$file_name,$full_path,$file_size,$file_type){          
            $data_file = array(
                'screenshot_name'=>$file_name,
                'screenshot_path'=>$full_path,
                'screenshot_size'=>$file_size,
                'screenshot_type'=>$file_type,
                'project_id' =>$project_id);
            if($this->db->insert('screenshots', $data_file)){
                return TRUE;
            }  else {
                return FALSE;
            }
        
    }
     public function add_news() {
        $data = array(
            'news_title' => $this->input->post('news_title'),
            'description' => $this->input->post('description'),
            'uploader' => $this->session->userdata('username'),
            'date' => time()
        );

        if ($this->db->insert('news', $data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
      public function list_news() {
        $this->db->order_by('news_id', 'DESC');
        $result = $this->db->get("news");
        return $result->result_array();
    }
    public function view_news($date) {
        $this->db->where('date', $date);
        $query = $this->db->get("news");
        if($query->num_rows()>0){
            return  $query->result_array();
        }  else {
            return FALSE;
        }
    }
}