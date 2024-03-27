<?php
namespace App\Controller;
session_start();
use App\Models\Database;
$path = $_SERVER["DOCUMENT_ROOT"];
include "../../Models/Database.php";
include "../../../include/conn.php";
include $path . "/course_portal/app/assets/funcs/index.php";
//employee ID update:instead of employee ID use table id of row
if( !empty($_GET["id"]) ){
    $id = htmlspecialchars($_GET["id"]);
}else{
    $id = user_check($_SESSION["id"]);
}
//$_SESSION["id"] = htmlspecialchars($_GET["id"]) ?? '';
if(!empty($id)){
    //sql to get employee info--using table id instead of employee id
    $sql = "SELECT * FROM employees_info ei
    WHERE id = ?";
    $param = array(intVal($id));
    $stmt = $db->query_param($sql,$param);
    if(!$stmt){
        print_r(sqlsrv_errors(),true);
    }else{
        $row = $db->fetch_arr($stmt);
        $first = $row["first_name"] ?? '';
        $last = $row["last_name"] ?? '';
        $tier = $row["empl_tier"] ?? '';
        $position = $row["empl_position"] ?? '';
        $employee_id = $row["employee_id"] ?? '';
        // $sql = "SELECT * FROM course_taken_need
        // WHERE employee_id = ? AND status LIKE 'pend%'";
        // $stmt_pend = $db->query_param($sql,$param);
        //$row_pend = $db->fetch_arr($stmt);
    }
}
?>