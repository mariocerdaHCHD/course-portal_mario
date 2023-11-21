<?php
    session_start();
    $title = 'POST Input';
    

    require_once('./inc/config.php');
    require_once('./inc/functions.php');

    if(is_user_authenticated()){
      redirect('admin.php');
      die();
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
      $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
      $password = $_POST['password']; // Validate this

      // compare with data store
      if(authenticate_user($email, $password)){
        $_SESSION['email'] = $email;
        redirect('admin.php');
        die();
      } else {
        $status = 'The provided credentials did not work.';
      }
      
      if ($email == false) {
        $status = 'Please enter a valid email address';
      }
    }

    include('./inc/header.php');

    // if (isset($_POST['login'])) {
    //   output($_POST);
    // }

    
?>

    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">POST Input</h1>
        </div>
      </div>
      <div class="row">
        <form action="" method="POST">
          <div class="form-group">
            <label for="email">Email:</label>
            <input class="form-control" type="text" name="email" id="email" />
          </div>
          <div class="form-group">
            <label for="password">Password:</label>
            <input class="form-control" type="password" name="password" id="password" />
          </div>
          <div class="from-group">
            <input type="submit" name="login" value="Login" />
          </div>
        </form>
      </div>
      <div class="row">
        <?php 
          if (isset($status)) {
            echo $status;
          } else {
            echo $email;
          }
        ?>
      </div>
    </div>

<?php include('./inc/footer.php'); ?>