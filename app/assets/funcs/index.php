<?php
    //checking if there table_employee_id is set
    //if empty or unset send back to login page
    //since there is no data to use to get employee information
    function checkID($id){
        if(empty($id)){
            echo "<script>window.load('/course_portal/include/logout.php/');</script>"; 
        }
    }


?>