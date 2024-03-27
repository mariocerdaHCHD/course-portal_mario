<!DOCTYPE html>
<?php include "back.php"; ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/user_page_css.css">
    <link rel="stylesheet" href="/course_portal/app/assets/css/navbar_css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Training Plan</title>
</head>
<body>
    <?php include $path . "/course_portal/include/nav.php"; ?>
    <div class="container">
        <table class="table ">
            <!-- <th>Tier Type</th>  echo "<td>";
                    echo $res['tier'];
                    echo "</td>";-->
        <tr><th>Course Number</th><th>Course Name</th></tr>
            <?php 
            //guessing this is the courses listed by tier a employee would need to take.
            // could organize by course order 
                //going to use a session to assign tier of employee
                while($res = $db->fetch_arr($stmt)){
                    $link = $res["course_link"];
                    echo "<tr>";
                   
                    echo "<td>";
                    echo $res['course_num']; 
                    echo "</td>";
                    echo "<td>"; 
                    echo "<a href='$link' target='_blank'>" .
                    $res['course_name'] . "</a>";
                    echo "</td></tr>";
                }
            ?>
        </table>
    </div>
</body>
</html>