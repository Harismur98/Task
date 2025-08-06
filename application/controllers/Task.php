<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Task extends CI_Controller {
    
    public function __construct() {
        parent::__construct();
        $this->load->model('Task_model');
        $this->load->model('Project_model');
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        if (!$this->session->userdata('user_id')) {
            redirect('login');
        }
    }

    public function index() {
        $config = [
        'base_url' => base_url('task/index'),
        'total_rows' => $this->Task_model->count_all(),
        'per_page' => 5,
        'uri_segment' => 3,

         'full_tag_open' => '<ul class="pagination">',
        'full_tag_close' => '</ul>',
        'first_tag_open' => '<li class="page-item"><span class="page-link">',
        'first_tag_close' => '</span></li>',
        'last_tag_open' => '<li class="page-item"><span class="page-link">',
        'last_tag_close' => '</span></li>',
        'next_tag_open' => '<li class="page-item"><span class="page-link">',
        'next_tag_close' => '</span></li>',
        'prev_tag_open' => '<li class="page-item"><span class="page-link">',
        'prev_tag_close' => '</span></li>',
        'cur_tag_open' => '<li class="page-item active"><span class="page-link">',
        'cur_tag_close' => '</span></li>',
        'num_tag_open' => '<li class="page-item"><span class="page-link">',
        'num_tag_close' => '</span></li>',
        ];   
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $data['tasks'] = $this->Task_model->get_paginated($config['per_page'], $page);
        $data['pagination_links'] = $this->pagination->create_links();

        $this->load->view('task/list', $data);
    }

    public function create() {
        $this->form_validation->set_rules('title', 'Task Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('project_id', 'Project', 'required');
        $this->form_validation->set_rules('assigned_to', 'Assigned User', 'required');
        $this->form_validation->set_rules('due_date', 'Due Date', 'required');

        $data['projects'] = $this->Project_model->get_all();
        $data['users'] = $this->User_model->get_all();

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('task/create', $data);
        } else {
            $task = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'project_id' => $this->input->post('project_id'),
                'assigned_to' => $this->input->post('assigned_to'),
                'status' => 'pending',
                'due_date' => $this->input->post('due_date')
            ];
            $this->Task_model->insert($task);
            redirect('task');
        }
    }

    public function export() {
        if (!class_exists('PhpOffice\PhpSpreadsheet\Spreadsheet')) {
            show_error("PhpSpreadsheet not found. Check composer_autoload path.");
        }
        $tasks = $this->Task_model->get_all_with_details();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // headers
        $sheet->setCellValue('A1', 'Title');
        $sheet->setCellValue('B1', 'Project');
        $sheet->setCellValue('C1', 'Assigned To');
        $sheet->setCellValue('D1', 'Status');
        $sheet->setCellValue('E1', 'Due Date');

        $row = 2;
        foreach ($tasks as $task) {
            $sheet->setCellValue('A' . $row, $task->title);
            $sheet->setCellValue('B' . $row, $task->project_name);
            $sheet->setCellValue('C' . $row, $task->assigned_user);
            $sheet->setCellValue('D' . $row, $task->status);
            $sheet->setCellValue('E' . $row, $task->due_date);
            $row++;
        }

        // Send Excel file to browser
        $filename = 'task_list_' . date('Ymd_His') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }

    public function edit($id) {
        $data['task'] = $this->Task_model->get_by_id($id);
        $data['projects'] = $this->Project_model->get_all();
        $data['users'] = $this->User_model->get_all();

        if (!$data['task']) {
            show_404();
        }

        $this->form_validation->set_rules('title', 'Task Title', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        $this->form_validation->set_rules('project_id', 'Project', 'required');
        $this->form_validation->set_rules('assigned_to', 'Assigned User', 'required');
        $this->form_validation->set_rules('due_date', 'Due Date', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('task/edit', $data);
        } else {
            $update_data = [
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'project_id' => $this->input->post('project_id'),
                'assigned_to' => $this->input->post('assigned_to'),
                'status' => $this->input->post('status'),
                'due_date' => $this->input->post('due_date')
            ];
            $this->Task_model->update($id, $update_data);
            redirect('task');
        }
    }

    public function delete($id) {
        $this->Task_model->delete($id);
        redirect('task');
    }

}
