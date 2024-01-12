<!DOCTYPE html>
<?php include "filehandling.php";?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/user_page_css.css">
    <link rel="stylesheet" href="../../assets/css/upload_cert.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Training Certificate</title>
</head>
<body>
    <?php include "../../../include/nav.php";?>
    <div class="container-fluid">
        <div class="jumbotron">
            <span class="h1">Training Certificate</span>
        </div>
        <div class="main">
            <form action="" method="POST">
                <div class="form-group">
                    Select Course
                    <select name="course_name" id="">
                        <option value="">Select</option>
                        <?php 
                            $sql = "SELECT course_name,course_num FROM courses_info
                            ORDER BY course_num";
                            $stmt = $db->query($sql);
                            if(!$stmt){
                                echo "Error has occurred retrieving course information";
                            }
                            else{
                                while($res = $db->fetch_arr($stmt)){
                                    $num = $res["course_num"] ?? '';
                                    $name = $res["course_name"] ?? '';
                                    echo "<option value='$num'>$name</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    Completion Date
                    <input type="date" name="completion_date" id="">
                </div>
                <div class="form-group">
                    Agency Providing Training
                    <input type="text" name="agency" id="">
                </div>
                <div class="form-group">
                    Upload Certificate
                    <input type="file" name="certificate" id="">
                </div>
                <div class="form-group">
                    <button type="submit">Submit</button>
                </div>
                <div class="form-group">
                    <button>Clear Form</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>