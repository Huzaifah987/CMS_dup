<?php include 'includes/header.php'

 ?>

  <div id="wrapper">
    <!-- Navigation -->
    <?php include 'includes/navigation.php' ?>



      <div id="page-wrapper">

          <div class="container-fluid">

              <!-- Page Heading -->
              <div class="row">
                  <div class="col-lg-12">
                      <h1 class="page-header">
                          Welcome To Admin
                          <small>Author</small>
                      </h1>
                        <div class="col-xs-6">
                          <?php
                            insert_categories();
                            ?>

                            <!-- This form for add -->
                            <form class="" action="categories.php" method="post">
                              <div class="form-group">
                                <label for="cat_title">Add Category</label>
                                <input class="form-control" type="text" name="cat_title">
                              </div>
                              <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                              </div>
                            </form>


                            <!-- This form for update -->
                            <form class="" action="" method="post">
                              <div class="form-group">
                                <label for="cat_title">Update Category</label>
                                  <?php
                                    update_categories();
                                   ?>
                              </div>
                              <div class="form-group">
                                <input class="btn btn-primary" type="submit" name="update" value="Update Category">
                              </div>
                            </form>




                        </div>
                          <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                              <thead>
                                <tr>
                                  <th>
                                    Id
                                  </th>
                                  <th>
                                    Category Title
                                  </th>
                                </tr>
                              </thead>
                              <tbody>
                                <?php
                                // find all categories
                                  find_all_categories();
                                 ?>

                                 <?php
                                    delete_categories();
                                  ?>
                                <tr>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                  </div>
              </div>
              <!-- /.row -->

          </div>
          <!-- /.container-fluid -->

      </div>

      <!-- /#page-wrapper -->



  <?php include 'includes/footer.php' ?>
