<!DOCTYPE html>
<?php
    include "back.php";
    include "combine_pdf.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/user_page_css.css">
    <link rel="stylesheet" href="/course_portal/app/assets/css/navbar_css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>Transcript</title>
</head>
<body>
<?php include "../../../include/nav.php"; ?>
<div>
        <div>
            <form action="" method='post'>
                <table>
                    <tr>
                        <th>Download All Certificates</th>
                        <td>
                            <input type='submit' class='btn btn-primary' id='allpdf' name='all_pdf' value='Download'>
                        </td>
                    </tr>
                </table>
            </form>
        <table class='table table-bordered'>
            <thead><tr><th scope='row'>#</th><th scope="col">Certificates</th><th scope="col">Completion Date</th></tr></thead>
                <tbody>
                <?php 
                    $sql = "SELECT id,course_name,completion_date,cert_name FROM certificates_info
                        WHERE employee_id LIKE ? ";
                    $param = array($id);
                    $stmt = $db->query_param($sql,$param);
                    if(!$stmt){
                        echo "<div class='alert alert-warning'> Error Occurred When Retrieving Certificate Information</div>";
                    }else{
                        $i = 1;
                        while($row = $db->fetch_arr($stmt)){
                            $cert_name = $row["cert_name"];
                            $course_name = $row["course_name"];
                            $completion_date = df($row["completion_date"],"m-d-Y");
                            // $id_cert = $row["id"];<td>$course_name</td> 
                            $dir = "../../assets/certificates/" . $cert_name;
                            /**
                             * <a href='../../assets/certificates/$cert_name' 
                             *  onclick='window.open($cert_name,_blank,fullscreen=yes);' return false;>$course_name</a>
                             */
                            if(file_exists($dir) && !empty($cert_name)){
                                echo "<tr onclick='findFile(".json_encode($dir).")'><th scope='row'>$i</th>";
                                echo "<td>$course_name</td>
                                <td>$completion_date</td></tr>";
                                $i++;
                            }
                        }
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="/course_portal/app/assets/js/user.js"></script>
</body>
</html>
