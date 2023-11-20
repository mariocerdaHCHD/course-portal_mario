<?php
// keeps all the files needed to run index.php
// includes config.php, functions.php
require("app/app.php");

$json = get_data('filename');
$terms = json_decode($json);

// view_bag is used to make objects that can be used by layout.view.php and index.view.php
 $view_bag = [];

 $view_bag['title'] = 'This is the title';

// print_r($view_bag);

// the view function uses the require function to use layout.view.php (also adds view_bag as a global)
// inside the layout.view.php you have index.view.php
view('index', $terms);