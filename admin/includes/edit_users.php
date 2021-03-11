<?php
  if (isset($_GET['edit_users'])) {
      $user_id = $_GET['edit_users'];

      $query = "SELECT * FROM users WHERE user_id = '$user_id'";
      $query_update_user = mysqli_query($link, $query);
  }

    while ($row = mysqli_fetch_array($query_update_user)) {
      $user_firstname        = $row['user_firstname'];
      $user_lastname       = $row['user_lastname'];
      $user_role  = $row['user_role'];
      $username       = $row['username'];

      $user_email        = $row['user_email'];
      $user_password   = $row['user_password'];
      $salt = $row['randSalt'];
    }

  if (isset($_POST['edit_users'])){
          $user_firstname        = $_POST['user_firstname'];
          $user_lastname       = $_POST['user_lastname'];
          $user_role  =  $_POST['user_role'];
          $username       = $_POST['username'];

          $user_email        = $_POST['user_email'];
          $user_password   = $_POST['user_password'];

          $query = "SELECT randSalt FROM users";
          $select_randSalt = mysqli_query($link, $query);
          while ($row = mysqli_fetch_assoc($select_randSalt))
            $salt = $row['randSalt'];
            $user_password = crypt($user_password, $salt);

          $username  = mysqli_real_escape_string($link, $username);
         $user_email = mysqli_real_escape_string($link, $user_email);
         $user_password = mysqli_real_escape_string($link, $user_password);

          $query = "UPDATE users SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', user_role ='{$user_role}',username='{$username}', user_email='{$user_email}',user_password='{$user_password}' WHERE user_id = {$user_id}";
          $update_user_query = mysqli_query($link, $query);

        }

 ?>

 <div class="col-xs-6">
   <form class="form-group" action="" method="post" enctype="multipart/form-data">
     <div class="mb-3">
       <label  class="form-check-label" for="Title">First Name</label>
       <input class="form-control" type="text" name="user_firstname" value="<?php echo  $user_firstname; ?>">
     </div>
     <div class="mb-3">
       <label  class="form-check-label" for="Title">Last Name</label>
       <input class="form-control" type="text" name="user_lastname" value="<?php echo $user_lastname; ?>">
     </div>
     <br>
       <select class="form-select" name="user_role" >
         <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>
          <?php
            if ($user_role == 'admin') {
              echo "<option value='user'>User</option>";
            }else {
              echo "<option value='admin'>Admin</option>";
            }
          ?>
       </select>
     <br>
     <div class="mb-3mb-3">
       <label  class="form-check-label" for="Title">Username</label>
       <input  class="form-control" type="text" name="username" value="<?php echo $username; ?>">
     </div>
     <div class="mb-3">
       <label  class="form-check-label" for="Title">E-mail</label>
       <input class="form-control" type="text" name="user_email" value="<?php echo $user_email; ?>">
     </div>
     <div class="mb-3">
       <label  class="form-check-label" for="Title">Password</label>
       <input class="form-control" type="password" name="user_password" value="<?php echo $user_password; ?>">
     </div>
     <br>
       <button class="btn btn-primary" type="submit" name="edit_users">Submit</button>
   </form>
