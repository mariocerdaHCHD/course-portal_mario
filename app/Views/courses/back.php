<?php
    session_start();
    include "../../../vendor/autoload.php";
    include "../../Models/Database.php";
    include "../../../include/conn.php";
    $course_id = $_GET['q'] ?? '';
    $sql = "SELECT course_description FROM courses_info WHERE id = ?";
    $param = array($course_id);
    $res = $db->query_param($sql,$param);
    if(!$res){
        echo "<div class='alert alert-warning'>Error Retrieving Course Description</div>";
    }else{
        $row = $db->fetch_arr($res);
        $cd = $row["course_description"];
    }
?>