<?php
namespace App\Controllers;
use App\Models\UserModel;
use App\Controllers\UserController;
require_once 'app/Models/UserModel.php';
require_once 'app/Controllers/UserController.php';
class AuthController extends UserControllers{
    public function index(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
           $ei = $this->default_pass();
        }else{
            include 'app/views/login.php';
        }
    }

    public function login_auth(){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $userModel = new UserModel();
        $user = $userModel->verify_user($username,$password);

        if($user && password_verify($password,$user['password'])){
            $_SESSION['user'] = $user;
            header("Location: user.php");
        }else{
            echo "Invalid username or password";
        }
    }
}
?>