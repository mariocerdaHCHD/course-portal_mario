<?php
    session_start();

    $path = $_SERVER["DOCUMENT_ROOT"];
    include $path . "/course_portal/app/Models/Database.php";
    include $path . "/course_portal/include/conn.php";
    INCLUDE $path . "/course_portal/app/assets/funcs/index.php";
    //checking is session id is set if not logs current user out
    //id is needed to display correct information
    $id = user_check($_SESSION["id"]);
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