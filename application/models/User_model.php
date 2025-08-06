<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function get_all(){
        return $this->db->get('users')->result();
    }

    public function get_by_id($id){
        return $this->db->get_where('users', ['id' => $id])->row();
    }

    public function insert($data){
        return $this->db->insert('users', $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update('users', $data);
    }

    public function delete($id) {
        return $this->db->delete('users', ['id' => $id]);
    }

    public function check_login($email) {
        return $this->db->get_where('users', ['email' => $email])->row();
    }
}
?>