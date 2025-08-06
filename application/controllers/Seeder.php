<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seeder extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function task() {
        $tasks = [];
        $statuses = ['pending', 'in_progress', 'completed'];
        $project_ids = [1, 2, 3];
        $user_ids = [1, 2, 3];    

        for ($i = 1; $i <= 20; $i++) {
            $tasks[] = [
                'title' => 'Task ' . $i,
                'description' => 'This is the description for task ' . $i,
                'project_id' => $project_ids[array_rand($project_ids)],
                'assigned_to' => $user_ids[array_rand($user_ids)],
                'status' => $statuses[array_rand($statuses)],
                'due_date' => date('Y-m-d', strtotime("+$i days"))
            ];
        }

        $this->db->insert_batch('tasks', $tasks);
        echo "Seeded 20 tasks.";
    }
}
