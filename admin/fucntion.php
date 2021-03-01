<?php
// insert categories in admin
  function insert_categories(){
    global $link;
      if (isset($_POST['submit'])) {
        $cat_title = $_POST['cat_title'];

        if ($cat_title == "" || empty($cat_title) ) {
          echo "<h4>This field cannot be empty</h4>";
        }else {
          $query = "INSERT INTO categories (cat_title) VALUES ('{$cat_title}')";

          $create_cat = mysqli_query($link, $query);

          if (!$create_cat) {
            die("Query Failed" . mysqli_error($link));
          }
        }
      }
  }

  //update categories
  function update_categories(){
    global $link;
    if (isset($_GET['edit'])) {
      $cat_id = $_GET['edit'];
      include 'includes/update.php';
    }
  }

  function find_all_categories(){
    global $link;
    $query = "SELECT * FROM categories";
    $select_categories = mysqli_query($link, $query);

      while ($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id= $row['cat_id'];
        $cat_title = $row['cat_title'];
        echo "<tr>";
      echo "<td>{$cat_id}</td>";
      echo "<td>{$cat_title}</td>";
      echo "<td><a href='categories.php?delete={$cat_id}'>delete</a></td>";
      echo "<td><a href='categories.php?edit={$cat_id}'>update</a></td>";
      echo "</tr>";
    }
  }



  function delete_categories(){
    global $link;
    if (isset($_GET['delete'])) {
      $the_cat_id = $_GET['delete'];
      $query_delete = "DELETE FROM categories WHERE cat_id = '{$the_cat_id}'";
      $delete_query = mysqli_query($link, $query_delete);
      header("Location: categories.php");
    }
  }


 ?>
