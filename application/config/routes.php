<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/** WELCOME ROUTES */
$route['about'] = 'Welcome/about';
$route['contact'] = 'Welcome/contact';

/** USER ROUTES */
$route['users'] = 'UserController/Index';
// ANY DATA TYPE IN SEGMENT EXCEPT /
// $route['user-profile/(:any)'] = 'UserController/Show/$1';

// ONLY NUMBERS 
$route['user/exportPDF'] = 'UserController/exportPDF';
$route['user/(:num)'] = 'UserController/show/$1';
$route['user/edit/(:num)'] = 'UserController/edit/$1';
$route['user/delete/(:num)'] = 'UserController/destroy/$1';
$route['user/create'] = 'UserController/create';
$route['user/store'] = 'UserController/store';
$route['user/update/(:num)'] = 'UserController/update/$1';