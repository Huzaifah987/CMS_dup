<?php
  if (isset($_POST['create_post'])){

         $post_title        = $_POST['post_title'];
         $post_author       = $_POST['post_author'];
         $post_category_id  = $_POST['post_category'];
         $post_status       = $_POST['post_status'];

         $post_image        = $_FILES['post_image']['name'];
         $post_image_temp   = $_FILES['post_image']['tmp_name'];


         $post_tags         = $_POST['post_tags'];
         $post_content      = $_POST['post_content'];
         $post_date         = date('d-m-y');


     move_uploaded_file($post_image_temp, "../images/$post_image" );


   $query = "INSERT INTO posts(post_category_id, post_title, post_user, post_date,post_image,post_content,post_tags,post_status) ";

   $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_image}','{$post_content}','{$post_tags}', '{$post_status}') ";

   $create_post_query = mysqli_query($link, $query);


}

 ?>

 <div class="col-xs-6">
   <form class="form-group" action="" method="post" enctype="multipart/form-data">
     <div class="mb-3">
       <label  class="form-check-label" for="Title">Title</label>
       <input class="form-control" type="text" name="post_title" value="">
     </div>
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
       <input class="form-control" type="text" name="post_author" value="">
     </div>
     <div class="mb-3">
       <label  class="form-check-label" for="Title">Post Tags</label>
       <input class="form-control" type="text" name="post_tags" value="">
     </div>
     <div class="mb-3">
       <label  class="form-check-label" for="Title">Images</label>
       <input  type="file" name="post_image" value="">
     </div>
     <div class="mb-3mb-3">
       <label  class="form-check-label" for="Title">Content</label>
       <textarea id='editor' name="post_content" class="form-control" ></textarea>
     </div>
     <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
     <div class="mb-3">
       <label  class="form-check-label" for="Title">Status</label>
       <input class="form-control" type="text" name="post_status" value="">
     </div>
     <br>
       <button class="btn btn-primary" type="submit" name="create_post">Submit</button>
   </form>
