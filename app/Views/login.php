<!DOCTYPE html>
<?php
$error_msg = $_GET["q"] ?? '';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="app/assets/css/user_page_css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>LogIn</title>
</head>
<body>
    <div class="main">
        <div class="jumbotron text-center">
            <?php include "header/index.php";?>
        </div>
        <form action="" method="POST">
        <div class="alert-warning "><?php echo $error_msg; ?></div>
            <h3>Training Portal</h3>
          
            <input type="text" name="username" >
            <input type="password" name="password" >
            <!-- <button type="submit" name="f_password btn">Forgot Password</button>
            <button type="submit" name="f_username btn">Forgot Username</button> -->
            <button type="submit" name="login btn">Login</button>
        </form>
    </div>
    <script src="app/assets/js/login.js"></script>
</body>
</html>