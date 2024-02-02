<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Result extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->helper('url');
      $this->load->library('form_validation');
      $this->load->model('SignupModal');
   	}
    public function getdatabyservice() {
        $username = $this->input->post('servicename');
        $data = $this->SignupModal->getData(array($username));
        echo json_encode(array('data' => $data));
    }
}

?>