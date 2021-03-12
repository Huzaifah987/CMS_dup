<?php
 include 'includes/header.php';
 include 'includes/db.php'
 ?>

    <!-- Navigation -->
    <?php include 'includes/navigation.php'; ?>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                  <?php

                if (isset($_GET['p_id'])) {
                  $post_id = $_GET['p_id'];

                    $view_query = "UPDATE posts SET post_views_count = post_views_count + 1 WHERE post_id = '$post_id'";
                    $result = mysqli_query($link, $view_query);

                    if (!$result) {
                      die("Query Failed".mysqli_error($link));
                    }

                    $query = "SELECT * FROM posts WHERE post_id = '$post_id'";
                    $select_all_posts = mysqli_query($link, $query);

                    while ($row = mysqli_fetch_assoc($select_all_posts)) {
                      $post_title = $row['post_title'];
                      $post_author = $row['post_author'];
                      $post_date = $row['post_date'];
                      $post_image = $row['post_image'];
                      $post_content = $row['post_content'];
                      ?>
                      <!-- First Blog Post -->
                      <h2>
                          <a href="#"><?php echo $post_title; ?></a>
                      </h2>
                      <p class="lead">
                          by <a href="index.php"><?php echo $post_author; ?></a>
                      </p>
                      <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date; ?></p>
                      <hr>
                      <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="">
                      <hr>
                      <p><?php echo $post_content; ?></p>
                      <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                      <hr>
                     <?php
                      }
                    }else {
                      header("Location: index.php");
                    }
                    ?>

                    <!-- Blog Comments -->

                    <!-- Comments Form -->

                    <?php
                      if (isset($_POST['submit_comment'])) {
                        $post_id = $_GET['p_id'];
                        $email = $_POST['email_comment'];
                        $author = $_POST['author_comment'];
                        $comment = $_POST['create_comment'];
                        $comment = mysqli_real_escape_string($link, $comment);

                        if (!empty($comment) && !empty($email) && !empty($author)) {
                          $query = "INSERT INTO comments (comment_post_id,comment_email,comment_author,comment_content,comment_status,comment_date)";
                          $query .= "VALUES ($post_id,'{$email}','{$author}','{$comment}','unapproved',now())";

                          $comment_query = mysqli_query($link, $query);

                           if ($comment_query == false) {
                             die("Query Failed". mysqli_error($link));
                           }

                           $query = "UPDATE posts SET post_comment_count = post_comment_count + 1 WHERE post_id= '{$post_id}'";
                           $update_comment_count = mysqli_query($link , $query);

                           echo "<p class='bg-success'>Your comment has been send and need to be approve.";
                         }else {
                           echo "<script>alert('Field cannot be empty')</script>";
                         }
                        }

                     ?>
                    <div class="well">
                        <h4>Leave a Comment:</h4>
                        <form action="" method="post" role="form">
                          <div class="form-group">
                            <label for="email">E-mail</label>
                              <input class="form-control" type="email" name="email_comment" value="">
                          </div>
                          <div class="form-group">
                            <label for="author">Author</label>
                            <input class="form-control" type="text" name="author_comment" value="">
                          </div>
                            <div class="form-group">
                                <label for="comment">Comments</label>
                                <textarea name="create_comment" class="form-control" rows="3"></textarea>
                            </div>
                            <button name="submit_comment" type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>

                    <hr>

                    <!-- Posted Comments -->
                    <?php
                      $query = "SELECT * FROM comments WHERE 	comment_post_id='{$post_id}' AND comment_status = 'approved'";
                      $query .= "ORDER BY comment_id DESC";
                      $select_comment_query = mysqli_query($link, $query);

                      if ($select_comment_query == false) {
                        die("Query Failed". mysqli_error($link));
                      }

                      while ($row = mysqli_fetch_assoc($select_comment_query)) {
                        $comment_date = $row['comment_date'];
                        $comment_author = $row['comment_author'];
                        $comment_content = $row['comment_content'];
                        ?>
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading"><?php echo $comment_author; ?>
                                    <small><?php echo $comment_date; ?></small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                          </div>
                      <?php
                      }
                     ?>
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include 'includes/sidebar.php' ?>
        </div>
        <!-- /.row -->

        <hr>
        <?php
          include "includes/footer.php";
         ?>
