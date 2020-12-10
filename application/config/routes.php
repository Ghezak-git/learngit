<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'home';
$route['404_override'] = 'home/notfound';
$route['translate_uri_dashes'] = FALSE;
$route['login/admin'] = 'home/login';
$route['administrator'] = 'administrator/index';
$route['administrator/product/add'] = 'administrator/add_product';
$route['administrator/product/(:num)/edit'] = 'administrator/edit_product/$1';
$route['administrator/package/add'] = 'administrator/add_package';
$route['administrator/package/(:num)'] = 'administrator/show_package1/$1';