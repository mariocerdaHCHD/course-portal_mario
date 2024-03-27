<!DOCTYPE html>
<?php
$error_msg = $_GET["q"] ?? '';
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="app/assets/css/user_page_css.css"> -->
    <link rel="stylesheet" href="app/assets/css/login_css.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <title>LogIn</title>
</head>
<body>
    <div class="main">
        <div class="jumbotron text-center">
            <?php include "header/index.php";?>
        </div>
        <div class="container">
            <form action="" method="POST">
            <div class="alert-warning "><?php echo $error_msg; ?></div>
                <h3>Training Portal</h3>
            
                <div class="form-group">
                    <label for="username_input">Username</label>
                    <input type="text" id="username_input" class="form-control form-control-lg" name="username" placeholder="Enter Username" aria-label="Username" >
                </div>
                <div class="form-group">
                    <label for="password_input">Password</label>
                    <input type="password" id="password_input" class="form-control form-control-lg" name="password" placeholder="Enter Password" aria-label="Password" >
                </div>
                <!-- <button type="submit" name="f_password btn">Forgot Password</button>
                <button type="submit" name="f_username btn">Forgot Username</button> -->
                <button type="submit" name="login" class="btn btn-primary btn-lg">Login</button>
            </form>
        </div>
    </div>
    <script src="app/assets/js/login.js"></script>
</body>
</html>