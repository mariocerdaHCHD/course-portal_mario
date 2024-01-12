<?php
session_start();
include "../../Models/Database.php";
include "../../../include/conn.php";
//check if there was a request made
//if($_SERVER["REQUEST_METHOD"] === "POST"){
if(isset($_POST["submit"])){
    $allowedType = array("pdf");
    $course_name = $_POST["course_name"];
    $date = $_POST["date"];
    $agency = $_POST["agency"];
    $certificate = $_POST["certificate"];
    $dir = "/course_portal/app/assets/certificates/";
    $file = basename($_FILES["file"]["name"]);
    $filePath = $dir . $file;
    $fileType = $_FILES["file"]["type"];
    $fileSize = $_FILES["file"]["size"];
    $bool_allowed = 0;
    $bool_size = 0;
    $bool_exist = 0;
    //check file formats
    foreach ($allowedType as $key) {
        if($fileType === strtolower($key)){
            $bool_allowed = 1;
        }
    }
    //check file size
    if($fileSize < 500000){
        $bool_size = 1;
    }
    //check if the file exist
    if(file_exists($filePath)){
        $bool_exist = 1;
    }

    //if all true then processed with uploading file
    if($bool_allowed && $bool_size && $bool_exist){
        //start saving db and to server
        $sql = "INSERT INTO certificates_info(course_name,completion_date,agency_name,
        cert_name,employee_id) values(?,?,?,?,?)";
      
        
        
    }else{//if one or more is false then error will be sent
        echo "Error Occurred While Uploading File";
    }
}

?>