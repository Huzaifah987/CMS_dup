<?php
if (isset($_GET['edit'])) {
  $cat_id = $_GET['edit'];
  $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
  $select_categories_id = mysqli_query($link, $query);

    while ($row = mysqli_fetch_assoc($select_categories_id)) {
      $cat_id= $row['cat_id'];
      $cat_title = $row['cat_title'];

      ?>
      <input value="<?php if (isset($cat_title)) {
        echo $cat_title;
      } ?>" class="form-control" type="text" name="cat_title">
      <?php
    }
  }
 ?>

 <?php
 if (isset($_POST['update'])) {
   $the_cat_title = ($_POST['cat_title']);
   $query_update = "UPDATE categories SET cat_title = '{$the_cat_title}' WHERE cat_id = '{$cat_id}'";
   $update_query = mysqli_query($link, $query_update);

  if ($update_query == false) {
   die("Query Failed". mysqli_error($link));
  }

 }
  ?>
