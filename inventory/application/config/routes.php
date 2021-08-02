<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Services/add';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;



$route['Procurements'] = 'services/index';
$route['add-items'] = 'Services/add';
$route['edit-items/(:any)'] = 'services/edit/$1';