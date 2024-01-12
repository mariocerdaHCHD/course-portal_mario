<?php
   
    include "user_back.php";
    //echo $_SESSION["id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/course_portal/app/assets/css/user_page_css.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>User Page</title>
</head>
<body>
<?php include "../../../include/nav.php"; ?>
    

    <div class="main">
        <!-- <?php include "../../../header/index.php";?> -->
        <!-- navbar -->
        <!-- employee info -->
        <table>
            <tr>
                <th>Employee Name</th> <th>Employee ID</th> <th>Tier</th>
            </tr>
            <tr>
                <td><?php echo "$first $last";?><!--employee name---></td>
                <td><!--employee id---><?php echo $employee_id; ?></td>
                <td><!--tier---><?php echo $tier; ?></td>
            </tr>
        </table>
        <div class="d-flex p-3">
            <!-- completed courses -->
            <table class="table-hover">
                <tr><th>Completed</th></tr>
                <?php 
                $sql = "SELECT course_id FROM course_taken_need
                WHERE employee_id = ? AND status LIKE 'compl%'";
                $param = array($id);
            // echo $id; used the wrong id; needed the table id
                $stmt_comp = $db->query_param($sql,$param);
                if(!$stmt_comp){
                    print_r(sqlsrv_errors(),true);
                }else{
                    while($row_comp = $db->fetch_arr($stmt_comp)){
                        $course_id = $row_comp["course_id"];
                        $sql ="SELECT course_name,course_link FROM courses_info 
                        WHERE id = ?";
                        $param = array($course_id);
                        $stmt = $db->query_param($sql,$param);
                        if(!$stmt){
                            print_r(sqlsrv_errors(),true);
                        }else{
                            $res = $db->fetch_arr($stmt);
                            $course_name = $res["course_name"];
                            $course_link = $res["course_link"];
                            echo "<tr><td><a href='$course_link'>$course_name</a></td></tr>";
                        }
                    }
                }
                // while( $row_comp = $db->fetch_arr($stmt)){
                //     $sql = "SELECT course_name,course_link FROM courses_info
                //     where id = ?";
                //     $param = array($row['course_id']);
                //     $res = $db->query_param($sql,$param);
                //     $res = $db->fetch_arr($res);
                //     $course_name = $res["course_name"];
                //     $link = $res["course_link"];
                //     echo "<tr><td><a href='$course_link'>$course_name</a></td></tr>";
                // }
                ?>
            </table>
                    <!-- pending courses -->
            <table class="table-hover">
                <tr><th>Pending</th></tr>
                <?php 
                $sql = "SELECT course_id FROM course_taken_need
                WHERE employee_id = ? AND status LIKE 'pend%'";
                $param = array($id);
            // echo $id; used the wrong id; needed the table id
                $stmt_comp = $db->query_param($sql,$param);
                if(!$stmt_comp){
                    print_r(sqlsrv_errors(),true);
                }else{
                    while($row_comp = $db->fetch_arr($stmt_comp)){
                        $course_id = $row_comp["course_id"];
                        $sql ="SELECT course_name,course_link FROM courses_info 
                        WHERE id = ?";
                        $param = array($course_id);
                        $stmt = $db->query_param($sql,$param);
                        if(!$stmt){
                            print_r(sqlsrv_errors(),true);
                        }else{
                            $res = $db->fetch_arr($stmt);
                            $course_name = $res["course_name"];
                            $course_link = $res["course_link"];
                            echo "<tr><td><a href='$course_link'>$course_name</a></td></tr>";
                        }
                    }
                }
                // while( $row_comp = $db->fetch_arr($stmt)){
                //     $sql = "SELECT course_name,course_link FROM courses_info
                //     where id = ?";
                //     $param = array($row['course_id']);
                //     $res = $db->query_param($sql,$param);
                //     $res = $db->fetch_arr($res);
                //     $course_name = $res["course_name"];
                //     $link = $res["course_link"];
                //     echo "<tr><td><a href='$course_link'>$course_name</a></td></tr>";
                // }
                ?>
            </table>
        </div>
        <form action="">
            <!-- Completed Courses -->
            <!-- Pending COurses -->
        </form>
    </div>
    <div>
        <div>
            List of Certificates
        </div>
    </div>
    
</body>
</html>