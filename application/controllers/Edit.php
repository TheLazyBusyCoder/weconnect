<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('SignupModal');
        $this->load->library('session');
   	}
    public function logout() {
        $this->session->sess_destroy();
        redirect('home');
    }
    public function edit() {
      	$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('service_name', 'Service_name', 'required');
		$this->form_validation->set_rules('description', 'Description', 'required');
		$this->form_validation->set_rules('phonenumber', 'Phonenumber', 'required');

        if ($this->form_validation->run() == FALSE) {
            echo $this->input->post('name');
            echo "<br>";
            echo $this->input->post('username');
            echo "<br>";
            echo $this->input->post('service_name');
            echo "<br>";
            echo $this->input->post('description');
            echo "<br>";
            echo $this->input->post('phonenumber');
			echo "error";
		} else {
			$data = array(
				'name' => $this->input->post('name'),
				'username' => $this->input->post('username'),
				'service_name' => $this->input->post('service_name'),
				'description' => $this->input->post('description'),
				'phonenumber' => $this->input->post('phonenumber')
			);
			$this->SignupModal->update_user($data);
			redirect('login');
		}
    }
}

?>