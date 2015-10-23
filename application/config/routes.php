<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$route['default_controller'] = "notes";
$route['notes/update/(:any)'] = "notes/update/$1";
$route['notes/delete/(:any)'] = "notes/delete/$1";
$route['404_override'] = '';


/* End of file routes.php */
/* Location: ./application/config/routes.php */