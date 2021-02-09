<?php
  if (isset($_GET['p_id'])) {
  $post_id = $_GET['p_id'];
  $query = "SELECT * FROM posts WHERE post_id = $post_id";
  $select_posts_by_id = mysqli_query($link, $query);

  while ($row = mysqli_fetch_assoc($select_posts_by_id)) {
    $post_id = $row['post_id'];
    $post_title = $row['post_title'];
    $post_author = $row['post_author'];
    $post_date = $row['post_date'];
    $post_image = $row['post_Image'];
    $post_category = $row['post_category_id'];
    $post_tags = $row['post_tags'];
    $post_comment= $row['post_content'];
    $post_status = $row['post_status'];
  }
}

if (isset($_POST['update_post'])) {
  $post_title = $_POST['title'];
  $post_date = date('d-m-y');
  $post_author = $_POST['author'];
  $post_image = $_FILES['img']['name'];
  $post_image_temp = $_FILES['img']['tmp_name'];
  $post_comment = $_POST['comment'];
  $post_status = $_POST['status'];
  $post_category = $_POST['post_category'];
  $post_tags = $_POST['tags'];

  move_uploaded_file($post_image_temp, "../images/$post_image");

  if (empty($post_image)) {
    $query = "SELECT * FROM posts WHERE post_id = '{$post_id}'";
    $select_images = mysqli_query($link, $query);

    while ($row = mysqli_fetch_assoc($select_images)) {
      $post_image =$row['post_Image'];
    }

  }

  $query = "UPDATE posts SET post_category_id = '{$post_category}', post_title = '{$post_title}', post_author ='{$post_author}', post_date= now(), post_Image='{$post_image}', post_content='{$post_comment}',post_tags='{$post_tags}',post_status='{$post_status}' WHERE post_id = {$post_id}";

  $query_update = mysqli_query($link, $query);

  post_data_confirm($query_update);

  if ($query_update == false) {
    die("Query Failed". mysqli_error($link));
  }


}
 ?>
<div class="col-xs-6">
  <form class="form-group" action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
      <label  class="form-check-label" for="Title">Title</label>
      <input value="<?php echo $post_title; ?>" class="form-control" type="text" name="title" value="">
    </div>



    <select  name="post_category" id="">
      <?php
        $query = "SELECT * FROM users";
        $select_user = mysqli_query($link, $query);

        post_data_confirm($select_user);

        while ($row = mysqli_fetch_assoc($select_user)) {
          $user_id = $row['user_id'];
          $user_role = $row['user_role'];

          echo "<option value='{$user_id}'>{$user_role}</option>";
        }
       ?>
    </select>



    
    <div class="form-select form-select-lg mb-3">
      <br>
      <select  name="post_category" id="">
        <?php
          $query = "SELECT * FROM categories";
          $select_categories = mysqli_query($link, $query);

          post_data_confirm($select_categories);

          while ($row = mysqli_fetch_assoc($select_categories)) {
            $cat_id = $row['cat_id'];
            $cat_title = $row['cat_title'];

            echo "<option value='{$cat_id}'>{$cat_title}</option>";
          }
         ?>
      </select>
    </div>
    <br>
    <div class="mb-3">
      <label  class="form-check-label" for="Title">Author</label>
      <input value="<?php echo $post_author; ?>" class="form-control" type="text" name="author" value="">
    </div>
    <div class="mb-3">
      <label  class="form-check-label" for="Title">Post Tags</label>
      <input value="<?php echo $post_tags; ?>" class="form-control" type="text" name="tags" value="">
    </div>
    <br>
    <div class="mb-3">
      <img class="form-group" width=100 src="../images/<?php echo $post_image; ?>" alt="">
      <input class="form-group" type="file" name="img" value="">
    </div>
    <div class="mb-3mb-3">
      <label  class="form-check-label" for="Title">Comment</label>
      <textarea name="comment" class="form-control" rows="3"><?php echo $post_comment; ?></textarea>
    </div>
    <div class="mb-3">
      <label  class="form-check-label" for="Title">Status</label>
      <input value="<?php echo $post_status; ?>" class="form-control" type="text" name="status" value="">
    </div>
    <br>
      <button class="btn btn-primary" type="submit" name="update_post">Submit</button>
  </form>
