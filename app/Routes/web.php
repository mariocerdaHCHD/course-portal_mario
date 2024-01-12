<?php
use App\Controllers\UserController;
use App\Controllers\AdminController;
use App\Controllers\HomeController;
use App\Routes\Route;
require_once 'Route.php';
include 'C:/xampp/htdocs/course_portal/app/Controllers/HomeController.php';
$router = new Route();
//home route
$router->add('/login','HomeController','index');
$router->add('/logout','HomeController','logout');

//login route
//$Route->add('/Views/login.php',UserController::class,'login');

// //user profile route
// $Route->add('/Views/user.php',UserController::class,'profile');

// //Admin Page
// $Route->add('/admin_page/admin_view_user.php',
//     AdminController::class,'showAdminPage');
?>