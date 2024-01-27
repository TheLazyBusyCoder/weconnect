<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup_Provider extends CI_Controller {
	public function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->library('form_validation');
      $this->load->model('SignupModal');
   	}

	public function check_username_existence() {
        $username = $this->input->post('username');
        $type = $this->input->post('type');
        $is_exist = $this->SignupModal->is_username_exist(array($username , $type));
        echo json_encode(array('is_exist' => $is_exist));
    }

	public function index()
	{
		$this->load->view('pages/signup_provider', array('username' => false , 'password' => false));
	}

	public function add_user_provider() {
		$this->form_validation->set_rules('username', 'Username', 'required|alpha_numeric');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[8]');
      	$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('service_name', 'Service_name', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('area', 'Area', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('phonenumber', 'Phonenumber', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$username_error = false;
   			$password_error = false;
			if (form_error('username')) {
				$username_error = true;
			}
			if (form_error('password')) {
				$password_error = true;
			}
			$this->load->view('pages/signup_provider', array('username' => $username_error, 'password' => $password_error));
		} else {
			$data = array(
				'type' => "provider",
				'username' => $this->input->post('username'),
				'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
				'name' => $this->input->post('name'),
				'service_name' => $this->input->post('service_name'),
				'state' => $this->input->post('state'),
				'city' => $this->input->post('city'),
				'area' => $this->input->post('area'),
				'description' => $this->input->post('description'),
				'phonenumber' => $this->input->post('phonenumber')
			);
			$this->SignupModal->insert_user($data);
			$this->load->view('pages/success');
		}
   }
}
