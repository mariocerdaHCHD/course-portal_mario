
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
</head>
<body>
    <div class="main">
        <?php include "header/index.php";?>
        <form action="" method="POST">
            <h3>Training Portal</h3>
            <input type="text" name="username">
            <input type="text" name="password" type="password">
            <button type="submit" name="f_password btn">Forgot Password</button>
            <button type="submit" name="f_username btn">Forgot Username</button>
            <button type="submit" name="login btn">Login</button>
        </form>
    </div>
</body>
</html>