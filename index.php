<?php
session_start();
use App\Controllers\AuthController;
include 'app/Controllers/AuthController.php';

$authController = new AuthController();
$authController->index();
?>