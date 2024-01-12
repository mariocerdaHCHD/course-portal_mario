<?php
namespace App\Controllers;
session_start();
use App\Controllers\Controller;
use App\Models\Database;
use App\Routes\Route;
include "../Routes/Route.php";
include "../Models/Database.php";
//getting the db
include "../../include/conn.php";

$router = new Route();
//testing if the db connection
//$db->test();
//get information from post
if($_SERVER["REQUEST_METHOD"] === "POST"){ 
      //true
        //call controller class function to 
        //pass the information to a module
    $employee_id = $_POST["employee_id"] ?? '';
    $old_pass = $_POST["old_pass"] ?? '';
    $new_pass = $_POST["new_pass"] ?? '';
    $re_pass = $_POST["re_pass"] ?? '';
    //need to hash password
    $newhash = password_hash($new_pass,PASSWORD_DEFAULT);
    //using a join to get the correct row
    //to update
    $sql = "UPDATE user_credentials  
    SET password_uc = ? FROM user_credentials uc
    LEFT JOIN employees_info ei ON ei.id = uc.ei_id 
    WHERE ei.employee_id = ?";
    $param = array($newhash,$employee_id);
    $stmt = $db->query_param($sql,$param);
    $result = $db->fetch_arr($stmt);
   // echo ($result);
    if($stmt){
        //redirect to login or to user page
        $router->redirect("/course_portal");
    }else{
        echo "error";
    }   
//check if valid
}
// else{
    //false
//     //will take user back to login if there was an error
//     $router->redirect("/course_portal/");
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
    <!--  -->
    <div class="jumbotron jumbotron-fluid">
        <h1>One Moment...</h1>
    </div>
</body>
</html>