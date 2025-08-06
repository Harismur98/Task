<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'auth/login';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['register'] = 'auth/register';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['project'] = 'project/index';
$route['project/create'] = 'project/create';
$route['task'] = 'task/index';
$route['task/create'] = 'task/create';
$route['task/export'] = 'task/export';
$route['task/edit'] = 'task/edit';
$route['task/delete'] = 'task/delete';
$route['seeder/task'] = 'task_seeder/task';