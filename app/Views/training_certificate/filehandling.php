<?php
session_start();
include "../../Models/Database.php";
include "../../../include/conn.php";
include "../../assets/funcs/index.php";
//check if there was a request made
//if($_SERVER["REQUEST_METHOD"] === "POST"){
//$id = $_SESSION['id'];
//check if set if not back to log in
$id = user_check($_SESSION["id"]);
if(isset($_POST["submit"])){
    //print_r($_FILES["certificate"]);
    $allowedType = array("pdf");
    $course_name = $_POST["course_name"];
    $completion_date = df($_POST["completion_date"],"Y-m-d");
    $agency = $_POST["agency"];
   
    //instead of using /course_portal/app/assets/certificates
    $dir = "../../assets/certificates";
    $file = basename($_FILES["certificate"]["name"]);
    //echo $_FILES["certificate"]["tmp_name"];
   
    $fileExt = explode(".",$file);
    $fileActExt = strtolower(end($fileExt));
    $NewFileName = uniqid('phpe',true) .$id. '.' . $fileActExt;
    //echo $NewFileName . '<br>';
    $filePath = $dir . '/' . $NewFileName;
    $fileType = $_FILES["certificate"]["type"];
   
    $typeTemp = explode("/",$fileType);
    $fileType = strtolower(end($typeTemp));
    //echo $fileType;
    $fileSize = $_FILES["certificate"]["size"];
    $fileTemp = $_FILES["certificate"]["tmp_name"];
    $bool_allowed = 0;
    $bool_size = 0;
    $bool_exist = 0;
    //check file formats
    foreach ($allowedType as $key) {
        if(strtolower($fileType) == $key){
            $bool_allowed = 1;
            //echo $bool_allowed ."bool_allowed<br>";
        }
    }
    //check file size
    if($fileSize < 1000000){
        $bool_size = 1;
        //echo $bool_size ."bool_size<br>";
    }
    //check if the file exist
    if(file_exists($filePath) === FALSE){
        $bool_exist = 1;
        //echo $bool_exist ."bool_exist<br>";
    }else{
        //echo $filePath;
    }
    //if all true then processed with uploading file
    if($bool_allowed && $bool_size && $bool_exist){
        //before inserting into certificates_info table need
        //to check if the certificate being uploaded exist in table.
        //checking with course_name or course_num
        $ref = "SELECT course_name,cert_name,completion_date,id FROM certificates_info 
        WHERE course_name LIKE ? AND employee_id = ? AND completion_date = ?";
        $ref_param = array($course_name,$id,$completion_date);
        $ref_res = $db->query_param($ref,$ref_param);
        if(!$ref_res){
            echo "<div class='alert alert-warning'>ERROR: Failed to verify if file already exist</div>";
        }else{
            $ref_row = $db->fetch_arr($ref_res);
            $course_name_ref = $ref_row["course_name"] ?? "";
            $cert_name = $ref_row["cert_name"] ?? "";
            //$ref_id = $ref_row["id"];
            // echo $course_name_ref;
            // echo $course_name;
            if(empty($course_name_ref)){//file doesn't exist already
                //start saving db and to server
                $sql = "INSERT INTO certificates_info(course_name,completion_date,agency_name,
                cert_name,employee_id) values(?,?,?,?,?)";
                $param = array($course_name, $completion_date, $agency, $NewFileName,$id);
                $stmt = $db->query_param($sql,$param);
                if(!$stmt){
                    print_r(sqlsrv_errors(),true);
                }else{
                    //move_uploaded_file($fileTemp, $dir . '/' . $NewFileName);
                    //print_r($_FILES['certificate']['error']);
                    if(move_uploaded_file($fileTemp, $dir .'/' .$NewFileName) !== 'false'){
                        echo "<div class='alert alert-success'>File Has Been Uploaded</div>";
                    }else{
                        echo "<div class='alert alert-warning'>File was not uploaded: ";
                        print_r($_FILES['certificate']['error']) . "</div>";
                    }
                }
                //going to need the id of the course--also should change the certificates_info column
                //course_name to course_id reference to courses_info
                $find_id = "SELECT id FROM courses_info WHERE course_name LIKE ? OR course_link_title LIKE ?";
                $find_param = array($course_name,$course_name);
                $find_res = $db->query_param($find_id,$find_param);
                $course_id = '';
                if(!$find_res){
                    echo "<div class='alert alert-warning>Error Trying to Find Course_id
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button></div>";
                }else{
                    $find_row = $db->fetch_arr($find_res);
                    $course_id = $find_row["id"];
                }
                //update course_taken_need
                //search
                $update_ctn = "UPDATE course_taken_need SET status = ? WHERE 
                course_id LIKE ? AND employee_id = ?";
                $update_param = array('completed',$course_id,$id);
                $update_res = $db->query_param($update_ctn,$update_param);
                if(!$update_res){
                    echo "<div class='alert alert-warning alert-dismissible fade show'>
                    Failed to Update Completed/Pending Table
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button></div>";
                }else{
                    echo "<div class='alert alert-success alert-dismissible fade show'>
                    Completed/Pending Table is Updated
                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                        <span aria-hidden='true'>&times;</span>
                    </button></div>";
                }
            }else{//already exist
                echo "<div class='alert alert-warning alert-dismissible fade show'>File Already Exist 
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                    <span aria-hidden='true'>&times;</span>
                </button></div>";
                //header("Refresh: 5;");
                //alert user
              
            }
        }
    }else{//if one or more is false then error will be sent
        echo "Error Occurred While Uploading File";
    }
}
?>