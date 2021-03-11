<?php include 'db.php';

  session_start();

  if (isset($_POST['login'])) {
    $username = $_POST['uid'];
    $password = $_POST['pwd'];

    // sql protection
    $username = stripslashes($username);
    $password = stripslashes($password);
    $username = mysqli_real_escape_string($link, $username);
    $password = mysqli_real_escape_string($link, $password);
    $query = "SELECT * FROM users WHERE username= '$username'";
    $query_select_user = mysqli_query($link, $query);
    if ($query_select_user == false) {
      die("Query Failed". mysqli_error($link));
    }

    while ($row = mysqli_fetch_assoc($query_select_user)) {
      $db_user_id = $row['user_id'];
      $db_user_firstname = $row['user_firstname'];
      $db_username = $row['username'];
      $db_user_lastname = $row['user_lastname'];
      $db_user_password = $row['user_password'];
      $db_user_role = $row['user_role'];
    }

    $password = crypt($password, $db_user_password);

    $count = mysqli_num_rows($query_select_user);


    if ($username === $db_username && $password ===  $db_user_password) {
      $_SESSION['username'] = $db_username;
      $_SESSION['firstname'] = $db_user_firstname;
      $_SESSION['lastname'] = $db_user_lastname;
      $_SESSION['user_role'] = $db_user_role;
      header("Location: ../admin");
    }else {
      header("Location: ../index.php");
    }
  }
 ?>
