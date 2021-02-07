<table class="table table-bordered table-hover">
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Author</th>
      <th>Image</th>
      <th>Category</th>
      <th>Tags</th>
      <th>Comments</th>
      <th>Status</th>
      <th>Date</th>
      <th>Edit</th>
      <th>Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $query = "SELECT * FROM posts";
      $query_select_all_post = mysqli_query($link, $query);

      while ($row = mysqli_fetch_assoc($query_select_all_post)) {
        $post_id = $row['post_id'];
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_image = $row['post_Image'];
        $post_comment = $row['post_content'];
        $post_status = $row['post_status'];
        $post_tags = $row['post_tags'];
        $post_date = $row['post_date'];

        echo "<tr>";
        echo "<td>{$post_id}</td>";
        echo "<td>{$post_title}</td>";
        echo "<td>{$post_author}</td>";
        echo "<td><img width='100'  src='../images/{$post_image}'</td>";
        echo "<td> </td>";
        echo "<td>{$post_tags}</td>";
        echo "<td>{$post_comment}</td>";
        echo "<td>{$post_status}</td>";
        echo "<td>{$post_date}</td>";
        echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
        echo "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
        echo "</tr>";
      }
     ?>
  </tbody>
</table>
