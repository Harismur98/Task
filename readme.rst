# Task Management System – CodeIgniter 3

This is a basic Task Management System built using **CodeIgniter 3** and **Bootstrap 5**. It allows users to register, log in, create tasks and projects, assign users, update task statuses, and export tasks to Excel. It also includes task pagination and modal-based task detail view.

## Installation

1. **Clone or download** the project to your `htdocs` or `www` directory:

2. **Set up your database** using the backup 

3. **Configure the database** in application/config/database.php :

$db['default'] = array(
    'hostname' => 'localhost',
    'username' => 'root',
    'password' => '',
    'database' => 'task_manager',
    'dbdriver' => 'mysqli',
    ...
);

4. **Set base url** in application/config/config.ph:
$config['base_url'] = 'http://localhost/task/';

5. **Install composer dependecy**: composer require phpoffice/phpspreadsheet:^1.29

6. **Run app**: http://localhost/task/
