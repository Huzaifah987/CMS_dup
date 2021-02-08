<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Username</th>
      <th>Firsname</th>
      <th>Lastname</th>
      <th>E-mail</th>
      <th>Role</th>
    </tr>
  </thead>
  <tbody >
      <?php
        $query = "SELECT * FROM users";
        $select_users = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($select_users)) {
          $user_id  = $row['user_id'];
          $user_password = $row['user_password'];
          $username = $row['username'];
          $user_firstname = $row['user_firstname'];
          $user_lastname = $row['user_lastname'];
          $user_email = $row['user_email'];
          $user_image = $row['user_image'];
          $user_role = $row['user_role'];

          echo "<tr>";
          echo "<td>{$user_id}</td>";
          echo "<td>{$username}</td>";
          echo "<td>{$user_firstname}</td>";
          echo "<td>{$user_lastname}</td>";
          echo "<td>{$user_email}</td>";
        //
          echo "<td>{$user_role}</td>";
          echo "</tr>";
        }
       ?>
  </tbody>
</table>

<?php
  if (isset($_GET['approve'])) {
    $the_comment_id = $_GET['approve'];

    $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id= '{$the_comment_id}'";
    $approve_query = mysqli_query($link, $query);
    header("Location: comments.php");
  }

  if (isset($_GET['unapprove'])) {
    $the_comment_id = $_GET['unapprove'];

    $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id= '{$the_comment_id}' ";
    $unapprove_query = mysqli_query($link, $query);
    header("Location: comments.php");
  }


  if (isset($_GET['delete'])) {
    $the_comment_id = $_GET['delete'];

    $query = "DELETE FROM comments WHERE comment_id ={$the_comment_id}";
    $delete_query = mysqli_query($link, $query);
    header("Location: comments.php");
  }
 ?>
