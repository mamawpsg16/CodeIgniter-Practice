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
$route['user/profile/(:num)'] = 'UserController/Show/$1';
$route['user/create'] = 'UserController/create';