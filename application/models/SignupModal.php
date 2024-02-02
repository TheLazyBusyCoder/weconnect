<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SignupModal extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    public function insert_user($data) {
        if($data['type'] == 'finder') {
            unset($data['type']);
            $this->db->insert('user_finder', $data);
        } else {
            unset($data['type']);
            $this->db->insert('user_provider', $data);
        }
    }
    public function update_user($data) {
        if ($type == 'finder') {
            $this->db->where('username', $data['username']);
            $this->db->update('user_finder', $data);
        } else {
            $this->db->where('username', $data['username']);
            $this->db->update('user_provider', $data);
        }
    }
    public function is_username_exist($data) {
        $this->db->where('username', $data[0]);
        if($data[1] == 'finder') {
            $query = $this->db->get('user_finder');
        } else {
            $query = $this->db->get('user_provider');
        }
        return $query->num_rows() > 0;
    }

    public function getData($data) {
        $this->db->select('username, description, name, phonenumber, city, state, service_name');
        $this->db->where('service_name', $data[0]);
        $query = $this->db->get('user_provider');
        return $query->result_array();
    }

    public function get_user_provider($username) {
        $query = $this->db->get_where('user_provider', array('username' => $username));
        return $query->row_array();
    }
    public function get_user_finder($username) {
        $query = $this->db->get_where('user_finder', array('username' => $username));
        return $query->row_array();
    }
}

?>