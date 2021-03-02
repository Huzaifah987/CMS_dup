<?php
  if (isset($_POST['add_users'])){
          $user_firstname        = $_POST['user_firstname'];
          $user_lastname       = $_POST['user_lastname'];
          $user_role  =  $_POST['user_role'];
          $username       = $_POST['username'];

          $user_email        = $_POST['user_email'];
          $user_password  = $_POST['user_password'];

          $hashFormat= "$2y$10$";
          $salt = "iusesomecrazystings222";
          $hashF_and_salt= $hashFormat . $salt;

          $user_password = mysqli_real_escape_string($link, $user_password);
          $user_email = mysqli_real_escape_string($link, $user_email);

          $user_password= crypt($user_password,  $hashF_and_salt);


  $query = "INSERT INTO users(user_firstname, user_lastname,user_role,username,user_email,user_password)";
  $query .= "VALUES('$user_firstname','$user_lastname','$user_role','$username','$user_email','$user_password')";

   $create_user_query = mysqli_query($link, $query);
   echo "User Created: ". " " . "<a class='form-label' href='users.php'>View Users</a>";

}

 ?>

 <div class="col-xs-6">
   <form class="form-group" action="" method="post" enctype="multipart/form-data">
     <div class="mb-3">
       <label  class="form-check-label" for="Title">First Name</label>
       <input class="form-control" type="text" name="user_firstname" value="">
     </div>
     <div class="mb-3">
       <label  class="form-check-label" for="Title">Last Name</label>
       <input class="form-control" type="text" name="user_lastname" value="">
     </div>


     <br>
       <select class="form-select" aria-label="Default select example" name="user_role" >
         <option value="select option">Select Option</option>
         <option value="admin">Admin</option>
         <option value="user">User</option>
       </select>
     <br>

     <br>
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
       <button class="btn btn-primary" type="submit" name="add_users">Submit</button>
   </form>
