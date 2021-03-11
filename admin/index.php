  <?php include 'includes/header.php' ?>
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
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>

                    </div>
                </div>
                <!-- /.row -->


                         <!-- /.row -->

         <div class="row">
             <div class="col-lg-3 col-md-6">
                 <div class="panel panel-primary">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-file-text fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                            <?php
                              $query = "SELECT * FROM posts ";
                              $select_all_post = mysqli_query($link, $query);
                              $post_count = mysqli_num_rows($select_all_post);

                              echo "<div class='huge'>$post_count</div>";
                             ?>
                                 <div>Posts</div>
                             </div>
                         </div>
                     </div>
                     <a href="posts.php">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6">
                 <div class="panel panel-green">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-comments fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                               <?php
                                  $query = "SELECT * FROM comments";
                                  $query_select_comment = mysqli_query($link, $query);
                                  $count_comment = mysqli_num_rows($query_select_comment);
                                  echo "<div class='huge'>$count_comment</div>";
                                ?>
                               <div>Comments</div>
                             </div>
                         </div>
                     </div>
                     <a href="comments.php">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6">
                 <div class="panel panel-yellow">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-user fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                             <?php
                                $query = "SELECT * FROM users";
                                $query_select_user = mysqli_query($link, $query);
                                $count_user = mysqli_num_rows($query_select_user);
                                echo "<div class='huge'>$count_user</div>";
                              ?>
                                 <div> Users</div>
                             </div>
                         </div>
                     </div>
                     <a href="users.php">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>
             <div class="col-lg-3 col-md-6">
                 <div class="panel panel-red">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-list fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">
                                 <?php
                                    $query = "SELECT * FROM categories";
                                    $query_select_cat = mysqli_query($link, $query);
                                    $count_cat = mysqli_num_rows($query_select_cat);
                                    echo "<div class='huge'>$count_cat</div>";
                                  ?>
                                  <div>Categories</div>
                             </div>
                         </div>
                     </div>
                     <a href="categories.php">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
             </div>
         </div>
                         <!-- /.row -->

                         <?php
                         $query = "SELECT * FROM posts WHERE post_status='draft'";
                         $select_all_draft_post = mysqli_query($link, $query);
                         $post_draft_count = mysqli_num_rows($select_all_draft_post);

                         $query = "SELECT * FROM comments WHERE comment_status='unapproved'";
                         $select_all_unapprove_comment = mysqli_query($link, $query);
                         $unapprove_comment_count = mysqli_num_rows($select_all_unapprove_comment);

                         $query = "SELECT * FROM users WHERE user_role='admin'";
                         $select_all_user = mysqli_query($link, $query);
                         $user_count = mysqli_num_rows($select_all_user);

                         $query = "SELECT * FROM posts WHERE post_status='published'";
                         $select_published_post = mysqli_query($link, $query);
                         $published_post_count = mysqli_num_rows($select_published_post);
                          ?>
                 <div class="row">
                     <script type="text/javascript">
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);

                       function drawChart() {
                          var data = google.visualization.arrayToDataTable([
                          ['Date', 'Count',],
                          <?php
                            $element_text = ['Published Posts', 'Active Post' ,'Draft Post', 'Comment','Pending Comment' , 'Users', 'User Admin', 'Categories'];
                            $element_count = [$post_count,  $published_post_count , $post_draft_count, $count_comment, $unapprove_comment_count , $count_user, $user_count, $count_cat];

                            for ($i=0; $i < 8; $i++) {
                              echo "['{$element_text[$i]}'". "," . "{$element_count[$i]}],";
                            }
                           ?>
                          //['Posts', 1000],
                          ]);

                          var options = {
                            chart: {
                            title: '',
                             subtitle: '',
                                }
                           };

                             var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                         chart.draw(data, google.charts.Bar.convertOptions(options));
                               }
                             </script>
                              <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>
                           </div>

            </div>
            <!-- /.container-fluid -->

        </div>

        <!-- /#page-wrapper -->



    <?php include 'includes/footer.php' ?>
