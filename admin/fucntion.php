<?php

//post data confirm
function post_data_confirm(){
  global $link;
  if (isset($_POST['create_post'])) {
      $post_title = $_POST['post_title'];
      $post_category = $_POST['post_category'];
      $post_author = $_POST['post_author'];
      $post_tag = $_POST['post_tags'];
      $post_image = $_FILES['post_image']['name'];
      $post_image_temp = $_FILES['post_image']['tmp_name'];
      $post_date = date('d-m-y');
      $post_content = $_POST['post_comment'];
      //$post_status = $_POST['post_status'];

      $query = "INSERT INTO posts(post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_comment_count, post_status)";
      $query .= "VALUES('$post_category','$post_title','$post_author',now(),'$post_image',  '$post_content')";

      $add_post_query = mysqli_query($link, $query);
    }
  }

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
