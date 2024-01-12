<?php
    namespace App\Controllers;
    use App\Routes\Route;
    class HomeController {
        public function index(){
            $router = new Route();
            $router->redirect('/course_portal/');
        }

        public function logout(){
            $router = new Route();
            $_SESSION["id"] = null;
            $router->redirect('/course_portal/include/logout.php');
        }
    }

?>