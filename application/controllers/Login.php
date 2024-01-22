<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('SignupModal');

        $this->load->library('session');
   	}
    public function index() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('type') == 'provider') {
            redirect('account');
        } else if($this->session->userdata('logged_in') &&  $this->session->userdata('type') == 'finder') {
            redirect('search');
        } else {
            $this->load->view('pages/login');
        }
    }
    public function login() {
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
		$this->form_validation->set_rules('type', 'Type', 'required');

        if ($this->form_validation->run() == FALSE) {
			$username_error = false;
   			$password_error = false;
			if (form_error('username')) {
				$username_error = true;
			}
			if (form_error('password')) {
				$password_error = true;
			}
			$this->load->view('pages/login', array('username' => $username_error, 'password' => $password_error));
		} else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $type = $this->input->post('type');

            $user = null;

            if($type == 'finder') {
                $user = $this->SignupModal->get_user_finder($username);
            } else {
                $user = $this->SignupModal->get_user_provider($username);
            }

            if ($user && password_verify($password, $user['password'])) {
                $user_data = array(
                    'user_id' => $user['username'],
                    'logged_in' => TRUE,
                    'name' => $user['name'],
                    'type' => $type
                );
                $this->session->set_userdata($user_data);
                if($type == 'finder') {
                    redirect('search');
                } else {
                    redirect('account');
                }
            } else {
                $this->session->set_flashdata('error', 'Invalid username or password');
                $this->load->view('pages/login' , array('error' => 'Username or password incorrect'));
            }
        }
    }
}