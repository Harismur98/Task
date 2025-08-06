<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Project_model');
        $this->load->library('form_validation');
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function index() {
        $data['projects'] = $this->Project_model->get_all();
        $this->load->view('project/index', $data);
    }

    public function create() {
        $this->form_validation->set_rules('name', 'Project Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('project/create');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'description' => $this->input->post('description')
            ];
            $this->Project_model->insert($data);
            redirect('project');
        }
    }
}
