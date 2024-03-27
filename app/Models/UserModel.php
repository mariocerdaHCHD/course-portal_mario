<?php 
    namespace App\Models;
    require_once("Database.php");
    use App\Models\Database;
    

    class UserModel{
    
        public function verify_user($username,$password){
            include "include/conn.php";
           // $db->test();
            //model logic to retrieve user details from the database
            //would need to call the db outside of the class
            //we can set up the sql statement
            // $db = new Database($serverName,
            // $connectionDBinfo["UID"],$connectionDBinfo["PWD"],
            // $connectionDBinfo["Database"]);
            //perform database query to get user details
            //create an sql

            $find_pass = "SELECT uc.password_uc,ei.employee_id,ei.id FROM user_credentials uc 
            LEFT JOIN employees_info ei ON uc.ei_id = ei.id
            where uc.username = ? ";
            $param = array($username);
            $find_stmt = $db->query_param($find_pass,$param);
            if(!$find_stmt){
                print_r(sqlsrv_errors(),true);
                exit();
            }else{
                $res = $db->fetch_arr($find_stmt);
                $db_pass = $res["password_uc"] ?? '';
                $employee_id = $res["employee_id"] ?? '';
                $id = $res["id"] ?? '';
                $bool_pass = password_verify($password,$db_pass);
                $md5_modify = md5($password);
                if($bool_pass || $md5_modify === $db_pass){
                    echo "password match";
                    $_SESSION["id"] = $id;
                    return $id;
                }else{
                    return FALSE;
                    //$router->redirect('/course_portal/');
                }
            }
            //hash password
           // $hash_p = password_hash($password, PASSWORD_DEFAULT); 
            //include in parameters
          
            // $param = array($username, $hash_p);
           
            // //execute sql
            // $stmt = $db->query_param($sql,$param);
            // if(!$stmt){
            //     print_r(sqlsrv_errors(),true);
            //     exit();
            // }
            // else{
            //     //send back the results
            //     $row = $db->fetch_arr($stmt);
            //     $ei = $row["employee_id"];
            //     //should do some logic
            //     if(!empty($ei)){
            //     //if it does not exist send false
            //         return $ei ?? '';
            //     }else{
            //         //id for employees_info table
            //         echo "does not exist";
            //         return False;
            //         exit();
            //     }
            // }
            
        }
    }
?>