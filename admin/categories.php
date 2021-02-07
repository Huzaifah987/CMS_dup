<?php include 'includes/header.php'; ?>

<?php if (isset($_POST['cat_submit'])) {
    $cat_title = $_POST['cat_title'];

    $query = "INSERT INTO categories(cat_title) VALUES ('$cat_title')";
    $cat_query = mysqli_query($link, $query);
  }

 ?>

  <div id="wrapper">

      <!-- Navigation -->
      <?php include 'includes/navigation.php'; ?>

      <div id="page-wrapper">

          <div class="container-fluid">

              <!-- Page Heading -->
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">
                          Welcome
                          <small>Categories</small>
                      </h1>
                  </div>
              </div>
              <!-- /.row -->
            <div class="col-xs-6">
              <form  action="" method="post">
                <div class="form-group">
                  <label class="form-label" for="cat_title">Categories Title</label>
                  <input class="form-control" type="text" name="cat_title" placeholder="Title">
                </div>
                  <button type="submit" name="cat_submit" class="btn btn-primary">Submit</button>
              </form>
              <hr>
              <!-- This form for update -->
              <form class="" action="" method="post">
                <div class="form-group">
                  <label for="cat_title">Update Category</label>
                    <?php
                    if (isset($_GET['edit'])) {
                      $cat_id = $_GET['edit'];
                      include 'includes/update.php';
                    }
                     ?>
                </div>
                <div class="form-group">
                  <input class="btn btn-primary" type="submit" name="update" value="Update Category">
                </div>
              </form>

            </div>
            <div class="col-xs-6">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Categories</th>
                    <th>Delete</th>
                    <th>Update</th>
                  </tr>
                </thead>
                  <tbody>
                    <?php
                    $query = "SELECT * FROM categories";
                    $query_select = mysqli_query($link, $query);

                    while ($row = mysqli_fetch_assoc($query_select)) {
                      $cat_id= $row['cat_id'];
                      $cat_title = $row['cat_title'];
                      echo "<tr>";
                    echo "<td>{$cat_id}</td>";
                    echo "<td>{$cat_title}</td>";
                    echo "<td><a href='categories.php?delete={$cat_id}'>delete</a></td>";
                    echo "<td><a href='categories.php?edit={$cat_id}'>update</a></td>";
                    echo "</tr>";
                  }

                  if (isset($_GET['delete'])) {
                    $cat_id = $_GET['delete'];
                    $query_delete = "DELETE FROM categories WHERE cat_id = '{$cat_id}'";
                    $delete_query = mysqli_query($link, $query_delete);
                    header("Location: categories.php");
                  }
                     ?>
                  </tbody>
              </table>
            </div>
          </div>
          <!-- /.container-fluid -->

      </div>
      <!-- /#page-wrapper -->

  </div>
  <!-- /#wrapper -->

<?php include 'includes/footer.php'; ?>
