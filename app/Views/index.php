<?php
    use App\Routes\Route;
    use App\Controllers\UserControllers;
    require_once("../Routes/Route.php");
    require_once("../Controllers/UserController.php");
    require_once("../../include/conn.php");
    include '../Routes/web.php';
    $uc = new UserControllers();
    //checking if user has default password and 
    //username matches in db
    $en = $uc->default_pass();
    // if($en){
    //     echo "True";
    //    // $router->redirect('/user/index.php/?id=' . $en);
    // }else{
    //     echo "checking password and username";
    //     //$router->redirect('/course_portal/');
    // }
    // $uc->testing();
    // $router->testing();
    //$router = new Route();
    //should return an id for employees_info
    //or false
    //$user_id = $uc->login();

?>