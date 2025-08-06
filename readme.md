# Task Management System – CodeIgniter 3

This is a basic Task Management System built using **CodeIgniter 3** and **Bootstrap 5**. It allows users to register, log in, create tasks and projects, assign users, update task statuses, and export tasks to Excel. It also includes task pagination and modal-based task detail view.

## 🛠️ Installation

### 1. Clone the Repository

Download or clone this project into your XAMPP `htdocs` or `www` directory:


```bash
git clone https://github.com/your-username/task-management-system.git```


### 2. Set Up the Database

    Create a new MySQL database (e.g., work_tracker)

    Import the provided work_tracker.sql file using phpMyAdmin or MySQL CLI

### 3. Enable GD Extension (for Excel export)

    Open your php.ini file

    Find the line:

    ;extension=gd

    Remove the semicolon (;) to enable it:

    extension=gd


### 4. Install Composer Dependency

    Make sure Composer is installed, then run:

    composer require phpoffice/phpspreadsheet:^1.28

###5. Run the Application

    Open your browser and go to:

    http://localhost/task/
