<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('User_model');
    $this->load->helper('url');
    $this->load->library('form_validation');
    $this->load->library('session');
  }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'required|matches[password]');

            if ($this->form_validation->run() === FALSE) {
                $this->load->view('auth/register');
            } 
            else {
                $data = [
                    'name' => $this->input->post('name'),
                    'email' => $this->input->post('email'),
                    'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                ];

                if ($this->User_model->insert($data)) {
                    $this->session->set_flashdata('success', 'Registration successful!');
                    redirect('login');
                } else {
                    // $db_error = $this->db->error();
                    // $this->session->set_flashdata('error', 'Insert failed: ' . $db_error['message']);
                    $this->load->view('auth/register');
                }
            }

        } 
        else {
            // IF the request not post load the page
            $this->load->view('auth/register');
        }
    }

    public function login(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $this->form_validation->set_rules('email', 'Email', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if($this->form_validation->run() === FALSE){
                $this->load->view('auth/login');
            }
            else{
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $user = $this->User_model->check_login($email);

                if ($user && password_verify($password, $user->password)) {

                    $this->session->set_userdata([
                        'user_id' => $user->id,
                        'user_name' => $user->name,
                        'user_email' => $user->email,
                        'logged_in' => TRUE
                    ]);
                    $this->session->set_flashdata('success', 'Login successful!');
                    redirect('task'); 
                } else {
                    $this->session->set_flashdata('error', 'Invalid email or password.');
                    $this->load->view('auth/login');
                }
            }
        }
        else{
            $this->load->view('auth/login');
        }
    }

    public function logout() {

        $this->session->sess_destroy();

        redirect('login');
    }

}
