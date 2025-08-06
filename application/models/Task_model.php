<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {

    private $table = 'tasks';

    public function get_all() {
        $this->db->select('tasks.*, projects.name AS project_name, users.name AS assigned_user');
        $this->db->from('tasks');
        $this->db->join('projects', 'projects.id = tasks.project_id', 'left');
        $this->db->join('users', 'users.id = tasks.assigned_to', 'left');
        return $this->db->get()->result();
    }

    public function get_by_id($id) {
        $this->db->select('tasks.*, projects.name AS project_name, users.name AS assigned_user');
        $this->db->from($this->table);
        $this->db->join('projects', 'projects.id = tasks.project_id', 'left');
        $this->db->join('users', 'users.id = tasks.assigned_to', 'left');
        $this->db->where('tasks.id', $id);
        return $this->db->get()->row();
    }

    public function get_by_project($project_id) {
        return $this->db->get_where($this->table, ['project_id' => $project_id])->result();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        return $this->db->where('id', $id)->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['id' => $id]);
    }

    public function get_user_tasks($user_id) {
        return $this->db->get_where($this->table, ['assigned_to' => $user_id])->result();
    }

    public function count_all() {
        return $this->db->count_all('tasks');
    }

    public function get_paginated($limit, $start) {
        $this->db->select('tasks.*, projects.name as project_name, users.name as assigned_user');
        $this->db->from('tasks');
        $this->db->join('projects', 'projects.id = tasks.project_id');
        $this->db->join('users', 'users.id = tasks.assigned_to');
        $this->db->limit($limit, $start);
        return $this->db->get()->result();
    }

    public function get_all_with_details() {
        $this->db->select('tasks.*, projects.name as project_name, users.name as assigned_user');
        $this->db->from('tasks');
        $this->db->join('projects', 'projects.id = tasks.project_id');
        $this->db->join('users', 'users.id = tasks.assigned_to');
        return $this->db->get()->result();
    }
}
