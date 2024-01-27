<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        $this->load->model('SignupModal');
   	}
    public function index() {
        if ($this->session->userdata('logged_in') &&    $this->session->userdata('type') == 'provider') {
            $user = $this->SignupModal->get_user_provider($this->session->userdata('user_id'));
            $this->load->view('pages/account' , $user);
        } else {
            echo 'User is not logged in';
        }
    }
}