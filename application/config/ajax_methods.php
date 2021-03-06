<?php
defined('BASEPATH') or exit('No direct script access allowed');
/*
|--------------------------------------------------------------------------
| References to all AJAX controllers' methods or the controller itself
|--------------------------------------------------------------------------
|
| Based on Jorge's solution: https://stackoverflow.com/a/43484330/6225838
| Key: controller name
| Possible values:
| - array: method name as key and boolean as value (TRUE => IS_AJAX)
| - boolean: TRUE if all the controller's methods are for AJAX requests
|
*/
$config['welcome'] = [
    'index' => FALSE, // or 0 -> this line can be removed (just for reference)
    'ajax_request_method_1' => TRUE, // or 1
    'ajax_request_method_2' => TRUE, // or 1
];
$config['ajax_troller'] = TRUE;