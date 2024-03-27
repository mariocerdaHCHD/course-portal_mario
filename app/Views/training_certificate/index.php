<!DOCTYPE html>
<?php include "filehandling.php";?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/user_page_css.css">
    <link rel="stylesheet" href="../../assets/css/upload_cert.css">
    <link rel="stylesheet" href="/course_portal/app/assets/css/navbar_css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Add Certificate</title>
</head>
<body>
    <?php include "../../../include/nav.php";?>
    <div class="container-fluid">
        <div class="jumbotron">
            <span class="h1">Training Certificate</span>
        </div>
        <div class="main container">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="selectInputForm">Select Course</label>
                    <select name="course_name" id="selectInputForm" class="form-control" required>
                        <option value="">Select</option>
                        <?php 
                            $sql = "SELECT course_link_title,course_name,course_num FROM courses_info
                            ORDER BY course_name";
                            $stmt = $db->query($sql);
                            if(!$stmt){
                                echo "Error has occurred retrieving course information";
                            }
                            else{
                                while($res = $db->fetch_arr($stmt)){
                                    $num = $res["course_num"] ?? '';
                                    $link_name = $res["course_link_title"] ?? '';
                                    $course_name = $res["course_name"] ?? '';
                                    $name = (empty($course_name) ? $link_name : $course_name);
                                    echo "<option value='$name'>$name</option>";
                                }
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="completionDateInput">Completion Date</label> 
                    <input type="date" name="completion_date" id="completionDateInput" class="form-control"  required>
                </div>
                <div class="form-group">
                    <label for="agencyInput">Agency Providing Training</label>
                    <input type="text" name="agency" id="agencyInput" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="certificateInputFile">Upload Certificate</label> 
                    <input type="file" name="certificate" id="certificateInputFile" class="form-control-file" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="form-group">
                    <button type="reset" class="btn btn-primary">Clear Form</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>