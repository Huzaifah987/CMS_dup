<?php if (isset($_POST['checkBoxArray'])){
  foreach ($_POST['checkBoxArray'] as $checkBoxValue) {
     $bulk_option = $_POST['bulk_options'];

     switch ($bulk_option) {
       case 'published':
         $query = "UPDATE posts SET post_status = '$bulk_option' WHERE post_id = '$checkBoxValue' ";
         $bulk_published_query = mysqli_query($link, $query);
         confirmQuery($bulk_published_query);
         break;

         case 'draft':
           $query = "UPDATE posts SET post_status = '$bulk_option' WHERE post_id = '$checkBoxValue' ";
           $bulk_draft_query = mysqli_query($link, $query);
           confirmQuery($bulk_draft_query);
           break;

           case 'delete':
             $query = "DELETE FROM posts WHERE post_id = '$checkBoxValue' ";
             $bulk_delete_query = mysqli_query($link, $query);
             confirmQuery($bulk_delete_query);
             break;

            case 'clone':
                  $query = "SELECT * FROM posts WHERE post_id = '$checkBoxValue'";
                  $clone_query = mysqli_query($link, $query);

                  while ($row = mysqli_fetch_assoc($clone_query)) {
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_category_id  = $row['post_category_id'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_tags = $row['post_tags'];
                    $post_comment= $row['post_content'];
                    $post_status = $row['post_status'];
                  }

                  $query = "INSERT INTO posts(post_category_id, post_title,post_author,post_date,post_content,post_image,post_tags,post_status) ";
                  $query .= "VALUES({$post_category_id},'{$post_title}','{$post_author}',now(),'{$post_comment}','{$post_image}','{$post_tags}', 'draft') ";

                  $result = mysqli_query($link, $query);

                  if (!$result) {
                    die("Query Failed". mysqli_error($link));
                  }
               break;

       default:
         // code...
         break;
     }

  }
}
  ?>


<form class="" action="" method="post">
          <div id="bulkOptionContainer" class="col-xs-4">
          <select class="form-control" name="bulk_options" id="">
          <option value="">Select Options</option>
          <option value="published">Publish</option>
          <option value="draft">Draft</option>
          <option value="delete">Delete</option>
          <option value="clone">Clone</option>

          </select>
          </div>


      <div class="col-xs-4">
      <input type="submit" name="submit" class="btn btn-success" value="Apply">
      <a class="btn btn-primary" href="posts.php?source=add_posts">Add New</a>
       </div>


  <table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th><input id="selectAllBoxes" type="checkbox"></th>
      <th>Id</th>
      <th>Title</th>
      <th>Author</th>
      <th>Date</th>
      <th>Image</th>
      <th>Category</th>
      <th>Tags</th>
      <th>Comments</th>
      <th>Status</th>
      <th>Comment Counts</th>
      <th>View Post</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody >
      <?php
        $query = "SELECT * FROM posts ORDER BY post_id DESC";
        $select_all_posts = mysqli_query($link, $query);

        while ($row = mysqli_fetch_assoc($select_all_posts)) {
          $post_id = $row['post_id'];
          $post_title = $row['post_title'];
          $post_author = $row['post_author'];
          $post_date = $row['post_date'];
          $post_image = $row['post_image'];
          $post_category = $row['post_category_id'];
          $post_tags = $row['post_tags'];
          $post_comment= $row['post_content'];
          $post_status = $row['post_status'];
          $post_comment_count = $row['post_comment_count'];
          $post_views_count = $row['post_views_count'];

          echo "<tr>";
          ?>

          <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="<?php echo $post_id; ?>"></td>

          <?php
          echo "<td>$post_id</td>";
          echo "<td>$post_title</td>";
          echo "<td>$post_author</td>";
          echo "<td>$post_date</td>";
          echo "<td><img width='100'  src='../images/{$post_image}'</td>";


          $query = "SELECT * FROM categories WHERE cat_id= '$post_category'";
          $query_select_category = mysqli_query($link, $query);

          while ($row = mysqli_fetch_assoc($query_select_category)) {
            $cat_id = $row['cat_id'];
            $cat_title =$row['cat_title'];

              echo "<td><a href=''>$cat_title</a></td>";
          }



          echo "<td>$post_tags</td>";
          echo "<td>$post_comment</td>";
          echo "<td>$post_status</td>";
          echo "<td>$post_comment_count</td>";
          echo "<td>$post_views_count</td>";
          echo "<td><a href='../post.php?p_id={$post_id}'>View Post</a></td>";
          echo "<td><a href='posts.php?source=edit_posts&p_id={$post_id}'>Edit</a></td>";
          echo "<td><a onClick=\"javascript: return confirm('Delete confirmation') \" href='posts.php?delete={$post_id}'>Delete</a></td>";
          echo "</tr>";
        }


       ?>
  </tbody>
</table>
</form>

<?php
  if (isset($_GET['delete'])) {
    $post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id= '$post_id'";
    $delete_query = mysqli_query($link, $query);
    header("Location: posts.php");
  }
 ?>
