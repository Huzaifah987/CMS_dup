<?php
  if (isset($_POST['add_post'])) {
    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];
    $post_category_id  = $_POST['post_category'];
    $post_tags = $_POST['post_tags'];
    $post_image        = $_FILES['post_image']['name'];
    $post_image_temp   = $_FILES['post_image']['tmp_name'];
    $post_content = $_POST['post_content'];
    $post_status = $_POST['post_status'];
    $post_date         = date('d-m-y');

    $post_title = mysqli_real_escape_string($link,$post_title);
    $post_author =mysqli_real_escape_string($link,$post_author);
    $post_category_id =mysqli_real_escape_string($link,$post_category_id);
    $post_tags =mysqli_real_escape_string($link,$post_tags);
    $post_image =mysqli_real_escape_string($link,$post_image);
    $post_content =mysqli_real_escape_string($link,$post_content);
    $post_status =mysqli_real_escape_string($link,$post_status);
    $post_date =mysqli_real_escape_string($link,$post_date );

    move_uploaded_file($post_image_temp, "../images/$post_image" );

    $query = "INSERT INTO posts(post_category_id, post_title,post_author,post_date,post_content,post_image,post_tags,post_status) ";

    $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_content}','{$post_image}','{$post_tags}', '{$post_status}') ";

    $query_add= mysqli_query($link, $query);
  }
 ?>

<form class="col-xs-6" action="" method="post"  enctype="multipart/form-data">
  <div class="mb-3">
    <label  class="form-check-label" for="Title">Title</label>
    <input class="form-control" type="text" name="post_title" value="">
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

    <div class="mb-3">
      <select class="form-select form-select-sm" name="post_status">
        <option value="draft">Draft</option>
        <option value="published">Published</option>
      </select>
    </div>
    <br>

  <div class="mb-3">
    <label  class="form-check-label" for="post_author">Author</label>
    <input class="form-control" type="text" name="post_author" value="">
  </div>


  <div class="mb-3">
    <label  class="form-check-label" for="post_tags">Post Tags</label>
    <input class="form-control" type="text" name="post_tags" value="">
  </div>


  <div class="mb-3">
    <label  class="form-check-label" for="post_image">Images</label>
    <input type="file"  name="post_image">
  </div>


  <div class="form-group" >
     <label for="post_content">Post Content</label>
     <textarea class="form-control "name="post_content" id="editor" cols="30" rows="10">
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
    <button class="btn btn-primary" type="submit" name="add_post">Submit</button>
  </div>
</form>
