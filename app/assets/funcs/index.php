<?php
    //checking if there table_employee_id is set
    //if empty or unset send back to login page
    //since there is no data to use to get employee information
    function checkID($id){
        if(empty($id)){
            echo "<script>window.load('/course_portal/include/logout.php/');</script>"; 
        }
    }
    
    //sanitizes user inputs and converts to date
    function df($input,$format){
        $date = '1900-01-01';
        $default = new DateTime($date);
        if(empty($input) || is_null($input) || $default == $input){
            return null;
        }else{
            if(is_object($input)){
                return date_format($input,$format);
            }else{
              $new_date = new DateTime($input);
              return date_format($new_date,$format);  
            }
        }
    }

    //sanitizing variables
    function sanitize($var){
        if(empty($var) || is_null($var)){
            return null;
        }else{
            $var = trim($var);
            $var = stripslashes($var);
            $var = htmlspecialchars($var);
            return $var;            
        }
    }

    //checking if the session id is set if not will logout users
    function user_check($id){
        $path = $_SERVER["DOCUMENT_ROOT"];
        include $path ."/course_portal/app/Routes/web.php";
        if(!empty($id) ){
            return $id;
        }else{
            $_SESSION["id"] = "";
            $router->routeRequest("/logout");
        }
    }

    //function to display files on browser using readfile()
    function file_display($filename){
        if(file_exists($filename)){
            readfile($filename);
            exit;
        }
    }
?>