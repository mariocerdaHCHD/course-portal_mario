<?php
    session_start();
    include "../../../vendor/autoload.php";
    include "../../Models/Database.php";
    include "../../../include/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../../assets/css/user_page_css.css" >
    <link rel="stylesheet" href="/course_portal/app/assets/css/navbar_css.css">
    <link rel="stylesheet" href="/course_portal/app/assets/css/course_css.css">
    <style>
        body{
            height:100%;
        }
        table{
            border: 1px solid black;
            height:100%;
        }
        tr, td{
            max-width: 300px;
            border: 1px solid black;
            padding: 8px;
            text-align: left;
            max-height:200px;
            overflow-y: auto;
        }
        .scrollable-row {
          /* Set the desired max height for the row */
          height:20%;
            overflow-y: auto;
        }
        .row-change{
            display:flex;
            height:200px;
            overflow:auto;
        }
        #column-change{
            width:20px;
        }
    </style>
    <title>Course Catalog</title>
</head>
<body>
    <div><?php include "../../../include/nav.php"; ?></div>
    <div id="course_list_id" class="container-fluid pt-4 overflow-auto">
        <div class="table-responsive">
        <form action="" method="post">
            <table class="table table-bordered">
                <tr>
                    <th class="col-sm-1">Course Number</th>
                    <th>Course Name</th>
                    <th  class="col-sm-1">Course Description</th>
                    <th>Course Link</th>
                    <th class="col-sm-2">Agency</th>
                    <th class="col-sm-1">Prerequisites</th>
                    <th>Course Length</th>
                    <th>Course Type</th>
                    <th>Tier</th>
                </tr>
            <?php
            //allows for special characters to be displayed
            //such as apostrophe 
              header('Content-Type: text/html; charset=ISO-8859-1');
              $sql = "SELECT * FROM courses_info";
              $stmt = $db->query($sql);
                 while($row = $db->fetch_arr($stmt)){
                    $course_id = $row["id"];
                    $description = $row["course_description"] ?? '';
                    if(strpos($row['course_num'],"ICS") !== FALSE){
                        $sub_col = $db->fetch_arr($stmt);
                       
                        echo "<tr>";
                        echo "<td>" . $row['course_num'] . "</td>";
                        echo "<td >" . $row['course_name'] . "</td>";
                        echo "<td><button type='button' onclick='showDesc($course_id)' 
                        class='btn btn-primary'>Description </button></td>";
                        
                        echo "<td><a href='" . $row['course_link'] . "' target='_blank'>
                        ".$row['course_link_title'] . "</a><br><br>";
    
                        echo "<a href='" . $sub_col['course_link'] . "' target='_blank'>
                        ".$sub_col['course_link_title'] . "</a></td>";
    
                        echo "<td>" . $row['agency'] . "</td>";
                        echo "<td>" . $row['prerequisites'] . "<br><br>";
                        //commenting this line since the prerequisites are the same
                       // echo "" . $sub_col['prerequisites'] . "</td>";
                        echo "<td>" . $row['course_type'] . "</td>";
                        echo "<td>" . $row['course_length'] . "</td>";
                        echo "<td>" . $row['tier'] . "</td>";
                        echo "</tr>";
                    }else{
                        echo "<tr>";
                        echo "<td>" . $row['course_num'] . "</td>";
                        echo "<td>" . $row['course_name'] . "</td>";
                        echo "<td><button type='button' onclick='showDesc($course_id)' 
                        class='btn btn-primary'>Description</button></td>";
                        echo "<td><a href='" . $row['course_link'] . "' target='_blank'>
                        ".$row['course_link_title'] . "</a></td>";
                        echo "<td>" . $row['agency'] . "</td>";
                        echo "<td>" . $row['prerequisites'] . "</td>";
                        echo "<td>" . $row['course_type'] . "</td>";
                        echo "<td>" . $row['course_length'] . "</td>";
                        echo "<td>" . $row['tier'] . "</td>";
                        echo "</tr>";
                    }
                 }
            ?>
            </table>
        </form>
        </div>
    </div>
    <script src="../../assets/js/course.js"></script>
</body>
</html>



