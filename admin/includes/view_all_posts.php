<table class="table table-bordered table-hover">
  <thead>
    <tr>
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
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody >
      <?php
        $query = "SELECT * FROM posts";
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

          echo "<tr>";
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
          echo "<td><a href='posts.php?source=edit_posts&p_id={$post_id}'>Edit</a></td>";
          echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
          echo "</tr>";
        }


       ?>
  </tbody>
</table>

<?php
  if (isset($_GET['delete'])) {
    $post_id = $_GET['delete'];

    $query = "DELETE FROM posts WHERE post_id= '$post_id'";
    $delete_query = mysqli_query($link, $query);
    header("Location: posts.php");
  }
 ?>