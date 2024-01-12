<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>Document</title>
</head>
<body>

    <div class="container d-flex justify-content-center" >
        <form action="pass_change.php" method="post" class="">
            <div class="form-group">
                <h1>Password Change</h1>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <div class="col">
                        <label class="label">Employee ID</label>
                    </div>
                    <input type="text" autofocus class="form-control input-medium" type="password" name="employee_id">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <div class="col">
                        <label class="form-label">Old Password</label>
                    </div>
                    <input type="password" class="form-control" name="old_pass">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <div class="col">
                    <label for="" class="form-label">New Password</label>
                    </div>
                    <input type="password" class="form-control" name="new_pass">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group">
                    <div class="col">
                    <label for="" class="form-label">Re-Enter Password</label> 
                    </div>
                    <input type="password" class="form-control" name="re_pass">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <div class="col">
                        <button type="submit" class="form-control btn-primary">Submit</button>
                    </div>
                </div>
            </div>
            <!-- <table class=''>
                <tr>
                    <td><h1>Password Change</h1></td>
                </tr>
                <tr>
                    <th scoop="col"><label class="form-label"for="">Employee ID</label></td>
                    <td scoop="row"><input type="password" ></td>
                </tr>
                <tr>
                    <th scoop="col"><label for="old_pass">Old Password</label></td>
                    <td scoop="row"><input type="password" name='old_pass'
                    id='old_pass'></td>
                </tr>
                <tr>
                    <th scoop="col"><label for="new_pass">New Password</label></td>
                    <td scoop="row"><input type="password" name="new_pass" id="new_pass"></td>
                </tr>
                <tr>
                    <th scoop="col"><label for="re_new_pass">Re-Enter New Password</label></td>
                    <td scoop="row"><input type="password" name='re_new_pass'
                    id='re_new_pass'></td>
                </tr>
                <tr>
                    <td><input type="submit" value="Submit"></td>
                </tr>
            </table> -->
        </form>
    </div>
</body>
</html>