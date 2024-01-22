<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Search extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
   	}
    public function index() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('type') == 'finder') {
            $this->load->view('pages/search' , array('name' => $this->session->userdata('name')));
        } else {
            redirect('login');
        }
    }
}