<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css -->
 
    <link rel="stylesheet" href="../css_pages/admin_css.css">
    <title>Admin Page</title>
</head>
<body>
    <div class="main">
        <?php include "../header/index.php";?>
        <!-- navbar -->
        <!-- employee info -->

        <table id="welcome_user">
            <tr>
                <td>Welcome<!--employee name---></td> 
            </tr>
        </table>
            <!-- search Form -->
        <form action="" method="POST">
            <table>
                <tr>
                    <td>
                        <label for="last_name">Employee Last Name</label>
                        <input type="text" name="last_name">
                    </td>
                    <td>
                        <label for="county_id">Employee ID</label>
                        <input type="text" name="county_id">
                    </td>
                </tr> 
            </table>
        </form>
        <!-- employee info -->
        <table id="emp_info"></table>
    </div>
</body>
</html>