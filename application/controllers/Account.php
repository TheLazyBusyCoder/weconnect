<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Account extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
   	}
    public function index() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('type') == 'provider') {
            $this->load->view('pages/account' , array('name' => $this->session->userdata('name')));
        } else {
            echo 'User is not logged in';
        }
    }
}