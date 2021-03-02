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
      $post_image = $row['post_image'];
      $post_category = $row['post_category_id'];
      $post_tags = $row['post_tags'];
      $post_comment= $row['post_content'];
      $post_status = $row['post_status'];
    }
  }

  if (isset($_POST['update_post'])) {
    $post_title = $_POST['post_title'];
    $post_date = date('d-m-y');
    $post_author = $_POST['post_author'];
    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];
    $post_comment = $_POST['post_content'];
    $post_status = $_POST['post_status'];
    $post_category = $_POST['post_category'];
    $post_tags = $_POST['post_tags'];

    $post_comment = mysqli_real_escape_string($link, $post_comment);

    move_uploaded_file($post_image_temp, "../images/$post_image");

    if (empty($post_image)) {
      $query = "SELECT * FROM posts WHERE post_id = '{$post_id}'";
      $select_images = mysqli_query($link, $query);

      while ($row = mysqli_fetch_assoc($select_images)) {
        $post_image =$row['post_image'];
      }

    }

    $query = "UPDATE posts SET post_category_id = '{$post_category}', post_title = '{$post_title}', post_author ='{$post_author}', post_date= now(), post_Image='{$post_image}', post_content='{$post_comment}',post_tags='{$post_tags}',post_status='{$post_status}' WHERE post_id = {$post_id}" ;

    $query_update = mysqli_query($link, $query);

    confirmQuery($query_update);
    if ($query_update == false) {
      die("Query Failed". mysqli_error($link));
    }

    echo "<p class='bg-success'>Post had been edited. <a href='../post.php?p_id={$post_id}'>View Post </a> or <a href='posts.php'>Edit More Posts</a></p>";
  }
 ?>

<form class="col-xs-6" action="" method="post"  enctype="multipart/form-data">
  <div class="mb-3">
    <label  class="form-check-label" for="Title">Title</label>
    <input class="form-control" type="text" name="post_title" value="<?php echo $post_title; ?>">
  </div >
  <br>
  <div class="form-group">
    <select class="form-select" name="post_category">
      <?php
        $query = "SELECT * FROM categories";
        $cat_select = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($cat_select)) {
          $cat_id = $row['cat_id'];
          $cat_title = $row['cat_title'];

          echo "<option value='{$cat_id}'>{$cat_title}</option>";
        }
       ?>
    </select>
  </div>

  <div class="form-group">
 <select name="post_status" id="">

<option value='<?php echo $post_status ?>'><?php echo $post_status; ?></option>
     <?php
     if($post_status == 'published' ) {
       echo "<option value='draft'>Draft</option>";
     } else {
       echo "<option value='published'>Publish</option>";
     }
   ?>
 </select>
   </div>
    <br>

  <div class="mb-3">
    <label  class="form-check-label" for="post_author">Author</label>
    <input class="form-control" type="text" name="post_author" value="<?php echo $post_author; ?>">
  </div>


  <div class="mb-3">
    <label  class="form-check-label" for="post_tags">Post Tags</label>
    <input class="form-control" type="text" name="post_tags" value="<?php echo $post_tags; ?>">
  </div>

  <br>
  <div class="mb-3">
    <img class="form-group" width=100 src="../images/<?php echo $post_image; ?>" alt="">
    <input type="file"  name="post_image">
  </div>

  <br>
  <div class="form-group" >
     <label for="post_content">Post Content</label>
     <textarea class="form-control "name="post_content" id="editor" cols="30" rows="10">
       <?php echo $post_comment; ?>
     </textarea>
  </div>
  <script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
      </script>


  <br>
    <button class="btn btn-primary" type="submit" name="update_post">Update</button>
  </div>
</form>
