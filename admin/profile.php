<?php include 'includes/header.php'?>

<?php

 if (isset($_SESSION['username'])) {
    echo $_SESSION['username'];

    $username = $_SESSION['username'];

    $query = "SELECT * FROM users WHERE username='$username'";

    $select_user_profile = mysqli_query($link, $query);
     while ($row = mysqli_fetch_assoc($select_user_profile)) {
       $user_id  = $row['user_id'];
       $user_password = $row['user_password'];
       $username = $row['username'];
       $user_firstname = $row['user_firstname'];
       $user_lastname = $row['user_lastname'];
       $user_email = $row['user_email'];
       $user_image = $row['user_image'];
       $user_role = $row['user_role'];
     }
  }

   ?>

   <?php
   if (isset($_POST['edit_users'])){
           $user_firstname        = $_POST['user_firstname'];
           $user_lastname       = $_POST['user_lastname'];
           $user_role  = $_POST['user_role'];
           $username       = $_POST['username'];

           $user_email        = $_POST['user_email'];
           $user_password   = $_POST['user_password'];

           $query = "UPDATE users SET user_firstname = '{$user_firstname}', user_lastname = '{$user_lastname}', user_role ='{$user_role}',username='{$username}', user_email='{$user_email}',user_password='{$user_password}' WHERE username = '$username'";
           $update_user_query = mysqli_query($link, $query);
         }

    ?>

  <div id="wrapper">
    <!-- Navigation -->
    <?php include 'includes/navigation.php' ?>



      <div id="page-wrapper">

          <div class="container-fluid">

              <!-- Page Heading -->
              <div class="row">
                  <div class="col-lg-12">
                    <h1 class="page-header">
                        Welcome To Admin
                        <small>Author</small>
                    </h1>

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
                          <select class="form-select" size="3" aria-label="Default select example" name="user_role" >
                            <option value="select option"><?php echo $user_role; ?></option>
                             <?php
                               if ($user_role == 'admin') {
                                 echo "<option value='user'>user</option>";
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

                  </div>
              </div>
              <!-- /.row -->

          </div>
          <!-- /.container-fluid -->

      </div>

      <!-- /#page-wrapper -->



  <?php include 'includes/footer.php' ?>
