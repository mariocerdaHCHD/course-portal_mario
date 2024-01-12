<?php
    namespace App\Controllers;
    use App\Models\UserModel;
    use App\Routes\Route;
    require_once("app/Models/UserModel.php");
    require_once("app/Routes/Route.php");
    class UserControllers extends Route{

        public function profile($userId){
            //Controller logic to fetch and display user profile
            $userModel = new UserModel();
            $user = $userModel->getUserById($userId);
            require_once("../app/Views/user_page/");
        }
        
        public function testing(){
            echo "testing";
        }
        
        private function validateLogin($username,$password){
            //Validate logic
            $userModel = new UserModel();
            return $userModel->verify_user($username,$password);
            //exit();
        }

        public function login($username, $password){
            //Controller logic for handling login form submission
            // if($_SERVER['REQUEST_METHOD']==="POST"){
            //     $username = $_POST["username"];
            //     $password = $_POST["password"];

                //validate login credentials
                if(!empty($username) && !empty($password)){
                    //redirect to user profile or dashboard
                    // header("location: ../Views/user.php");
                    return $this->validateLogin($username,$password);
                    //exit();
                }else{
                    //Display login error
                    $error = "Invalid username or password";
                }
                //Display login form
                //include ("../app/Views/login.php");
           // }
        }

        //checking for default password
        public function default_pass(){
            //check if password is the default
            //can be anything--up to the developer
           // if($_SERVER['REQUEST_METHOD']==="POST"){
                 $username = $_POST["username"] ?? '';
                $password = $_POST["password"] ?? '';
                //first check if there is a string in the
                //password and username variables
                if(!empty($username) && !empty($password)){
                    //check if password matches default
                    if(strpos($password,"portal123") !== False){
                    //if true 
                    //will get redirected to change password
                        //return 1;
                        $this->redirect('app/Views/user_new_pass.php');
                    }else{
                    //if false
                    //use the validationlogin to continue 
                    //the login process
                        $ei = $this->login($username,$password);
                        if($ei === FALSE){
                            $this->redirect("/course_portal/?q=Username or Password Is Incorrect");
                        }
                        $this->redirect('app/Views/user/index.php/?id='.$ei);
                        //exit();
                        //$this
                    }
                }else{
                    //return back to login
                    $this->redirect('/course_portal/');
                }
            //}
                // if($_SERVER['REQUEST_METHOD']==="POST"){
                //     $username = $_POST["username"];
                //     $password = $_POST["password"];
    
                //     //validate login credentials
                //     if($this->validateLogin($username,$password)){
                //         //redirect to user profile or dashboard
                //         // header("location: ../Views/user.php");
                //         // exit();
                //     }else{
                //         //Display login error
                //         $error = "Invalid username or password";
                //     }
                //     //Display login form
                //     require_once("../app/Views/login.php");
                // }
        }

        public function logout(){
            session_start();
            session_unset();
            session_destroy();
            header('Location: /course_portal');//redirects to home page
            exit();
        }
    }
?>