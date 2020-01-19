<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['customers/record'] = 'customers/record';
$route['customers'] = 'customers/index';

$route['orders'] = 'orders/index';
$route['carts'] = 'carts/display_items';

$route['users/register'] = 'users/register';
$route['users/login'] = 'users/login';
$route['users/inactives'] = 'users/inactives/';
$route['users/details'] = 'users/details/$1';
$route['users/logout'] = 'users/logout';
$route['users'] = 'users/view';

$route['categories/create'] = 'categories/create';
$route['categories/update'] = 'categories/update';
$route['categories/items/(:any)'] = 'categories/items/$1'; 
$route['categories'] = 'categories/index';

$route['items/hide'] = 'items/hide';
$route['items/create'] = 'items/create';
$route['items/update'] = 'items/update';
$route['items/(:any)'] = 'items/view/$1'; 
$route['items'] = 'items/index';

$route['default_controller'] = 'pages/view';
$route['(:any)'] = 'pages/view/$1';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
