<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller']   = 'monitoring';
$route['404_override']         = 'blocked/error';
$route['translate_uri_dashes'] = FALSE;

$route['profile/(:any)']  = 'users/profile/$1';
// Route for Product Category
// $route['product/category']             = 'pro_category';
// $route['product/category/add']         = 'pro_category/addcategory';
// $route['product/category/edit/(:any)'] = 'pro_category/update/$1';
// $route['product/category/del/(:any)']  = 'pro_category/delete/$1';

// // Route for product units
// $route['product/units']             = 'pro_units';
// $route['product/units/add']         = 'pro_units/addunit';
// $route['product/units/edit/(:any)'] = 'pro_units/update/$1';
// $route['product/units/del/(:any)']  = 'pro_units/delete/$1';

// // Route for product items
// $route['product/items']                       = 'pro_items';
// $route['product/items/add']                   = 'pro_items/additem';
// $route['product/items/edit/(:any)']           = 'pro_items/update/$1';
// $route['product/items/del/(:any)']            = 'pro_items/delete/$1';
// $route['product/items/barcode_qrcode/(:num)'] = 'pro_items/barcode_qrcode/$1';
// $route['product/items/barcode_print/(:num)']  = 'pro_items/barcode_print/$1';
// $route['product/items/qrcode_print/(:num)']   = 'pro_items/qrcode_print/$1';

// // Route for Transaction Stock in
// $route['stock/in']                    = 'stock/stock_in_data';
// $route['stock/in/add']                = 'stock/stock_in_add';
// $route['stock/in/detail/(:any)']      = 'stock/stock_in_detail/$1';
// $route['stock/in/del/(:any)/(:any)']  = 'stock/stock_in_delete';
// // Route for Transaction Stock out
// $route['stock/out']                   = 'stock/stock_out_data';
// $route['stock/out/add']               = 'stock/stock_out_add';
// $route['stock/out/detail/(:any)']     = 'stock/stock_out_detail/$1';
// $route['stock/out/del/(:any)/(:any)'] = 'stock/stock_out_delete';
