<?php
  include 'db.php';
  if (isset($_POST['sign-up'])) {
    $firstname = $_POST['user_firstname'];
    $lastname       = $_POST['user_lastname'];
    $username       = $_POST['username'];

    $email        = $_POST['user_email'];
    $password  = $_POST['user_password'];


    $query = "INSERT INTO users(user_firstname, user_lastname,username,user_email,user_password)";
    $query .= "VALUES('$firstname','$lastname','$username','$email','$password')";

    $create_user_query = mysqli_query($link, $query);
  }
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; }
        .wrapper{ width: 350px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up</h2>
        <p>Please fill this form to create an account.</p>
        <form action="" method="post">
          <div class="mb-3">
            <label  class="form-check-label" for="Title">First Name</label>
            <input class="form-control" type="text" name="user_firstname" value="">
          </div>
          <div class="mb-3">
            <label  class="form-check-label" for="Title">Last Name</label>
            <input class="form-control" type="text" name="user_lastname" value="">
          </div>
          <div class="mb-3mb-3">
            <label  class="form-check-label" for="Title">Username</label>
            <input  class="form-control" type="text" name="username" value="">
          </div>
          <div class="mb-3">
            <label  class="form-check-label" for="Title">E-mail</label>
            <input class="form-control" type="text" name="user_email" value="">
          </div>
          <div class="mb-3">
            <label  class="form-check-label" for="Title">Password</label>
            <input class="form-control" type="password" name="user_password" value="">
          </div>
          <br>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" name="sign-up" value="Submit">
                <input type="reset" class="btn btn-default" value="Reset">
            </div>
            <p>Already have an account? <a href="../index.php">Login here</a>.</p>
        </form>
    </div>
</body>
</html>
