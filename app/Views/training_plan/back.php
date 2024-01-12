<?php
    session_start();
    include "../../Models/Database.php";
    include "../../../include/conn.php";
    //select statement for employee tier
    $sql = "SELECT ci.course_name,ci.tier,ci.course_num FROM courses_info ci
    WHERE CHARINDEX((SELECT empl_tier FROM employees_info WHERE id = ?),ci.tier)>0";
    // ci.tier LIKE '%(empl_tier = (SELECT empl_tier FROM employees_info WHERE 
    // id = ?))%' ";
    //select statement for courses according to employee tier
    $id = $_SESSION["id"];
    $param = array($id);
    $stmt = $db->query_param($sql,$param);
?>