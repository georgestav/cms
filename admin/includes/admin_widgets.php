       <!-- /.row -->

       <div class="row m-auto">
           <div class="col-lg-3 col-sm-6 mt-2">
               <div class="text-center">
                   <div class="row">
                       <div class="col-xs-3">
                           <i class="fas fa-newspaper fa-3x"></i>
                       </div>
                       <div class="col-xs-9">
                           <?php
                            $query = "SELECT * FROM posts";
                            $select_all_posts = mysqli_query($data, $query);
                            $number_of_posts = mysqli_num_rows($select_all_posts);
                            ?>

                           <div class='huge'><?php echo $number_of_posts ?></div>
                           <div>Posts</div>
                       </div>
                   </div>
                   <a href="posts.php">
                       <div class="btn btn-sm btn-outline-success position-relative">
                           <?php
                            $query = "SELECT * FROM posts WHERE post_status = 'pending'";
                            $select_all_new = mysqli_query($data, $query);
                            $number_of_new = mysqli_num_rows($select_all_new);
                            if ($number_of_new > 0) {
                            ?>
                               <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                   + <?php echo $number_of_new ?>
                                   <span class="visually-hidden">pending posts</span>
                               </span>
                           <?php
                            }
                            ?>
                           <span class="">View Details</span>
                           <span class=""><i class="fa fa-arrow-circle-right"></i></span>
                       </div>
                   </a>
               </div>
           </div>
           <div class="col-lg-3 col-sm-6 mt-2">
               <div class="text-center">
                   <div class="row">
                       <div class="col-xs-3">
                           <i class="fa fa-comments fa-3x"></i>
                       </div>
                       <div class="col-xs-9">
                           <?php
                            $query = "SELECT * FROM comments";
                            $select_all_comments = mysqli_query($data, $query);
                            $number_of_comments = mysqli_num_rows($select_all_comments);
                            ?>

                           <div class='huge'><?php echo $number_of_comments ?></div>
                           <div>Comments</div>
                       </div>

                   </div>
                   <a href="comments.php">
                       <div class="btn btn-sm btn-outline-success position-relative">
                           <?php
                            $query = "SELECT * FROM comments WHERE comment_status = 'pending'";
                            $select_all_new = mysqli_query($data, $query);
                            $number_of_new = mysqli_num_rows($select_all_new);
                            if ($number_of_new > 0) {
                            ?>
                               <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                   + <?php echo $number_of_new ?>
                                   <span class="visually-hidden">unread messages</span>
                               </span>
                           <?php
                            }
                            ?>
                           <span class="">View Details</span>
                           <span class=""><i class="fa fa-arrow-circle-right"></i></span>
                       </div>
                   </a>
               </div>
           </div>
           <div class="col-lg-3 col-sm-6 mt-2">
               <div class="text-center">
                   <div class="row">
                       <div class="col-xs-3">
                           <i class="fa fa-user fa-3x"></i>
                       </div>
                       <div class="col-xs-9">
                           <?php
                            $query = "SELECT * FROM users";
                            $select_all_users = mysqli_query($data, $query);
                            $number_of_users = mysqli_num_rows($select_all_users);
                            ?>

                           <div class='huge'><?php echo $number_of_users ?></div>
                           <div> Users</div>
                       </div>
                   </div>
                   <a href="users.php">
                       <div class="btn btn-sm btn-outline-danger">
                           <span class="">View Details</span>
                           <span class=""><i class="fa fa-arrow-circle-right"></i></span>
                       </div>
                   </a>
               </div>
           </div>
           <div class="col-lg-3 col-sm-6 mt-2">
               <div class="text-center">
                   <div class="row">
                       <div class="col-xs-3">
                           <i class="fa fa-list fa-3x"></i>
                       </div>
                       <div class="col-xs-9">
                           <?php
                            $query = "SELECT * FROM categories";
                            $select_all_categories = mysqli_query($data, $query);
                            $number_of_categories = mysqli_num_rows($select_all_categories);
                            ?>

                           <div class='huge'><?php echo $number_of_categories ?></div>
                           <div>Categories</div>
                       </div>
                   </div>
                   <a href="categories.php">
                       <div class="btn btn-sm btn-outline-info">
                           <span class="">View Details</span>
                           <span class=""><i class="fa fa-arrow-circle-right"></i></span>
                       </div>
                   </a>
               </div>
           </div>
       </div>
       <!-- /.row -->
       <?php
        $query = "SELECT * FROM comments WHERE comment_status = 'pending'";
        $select_pending_comments = mysqli_query($data, $query);
        $number_pending_comments = mysqli_num_rows($select_pending_comments);

        $query = "SELECT * FROM posts WHERE post_status <> 'published'";
        $select_unpub_posts = mysqli_query($data, $query);
        $number_unpub_posts = mysqli_num_rows($select_unpub_posts);

        $query = "SELECT * FROM users WHERE user_role = 'pending'";
        $select_pending_users = mysqli_query($data, $query);
        $number_pending_users = mysqli_num_rows($select_pending_users);

        $query = "SELECT * FROM categories WHERE cat_id = 0";
        $select_pending_categories = mysqli_query($data, $query);
        $number_pending_categories = mysqli_num_rows($select_pending_categories);
        ?>




       <script type="text/javascript">
           google.charts.load('current', {
               'packages': ['bar']
           });
           google.charts.setOnLoadCallback(drawChart);

           function drawChart() {
               let data = google.visualization.arrayToDataTable([
                   ['Data', 'Count', 'Pending'],
                   <?php
                    $element_text = ['Posts', 'Comments', 'Users', 'Categories',];
                    $element_count = [$number_of_posts - $number_unpub_posts, $number_of_comments - $number_pending_comments, $number_of_users, $number_of_categories];
                    $pending_count = [$number_unpub_posts, $number_pending_comments, $number_pending_users, $number_pending_categories];

                    for ($i = 0; $i < 4; $i++) {
                        echo "['{$element_text[$i]}', {$element_count[$i]},{$pending_count[$i]}],";
                    }

                    ?>
               ]);

               let options = {
                   chart: {
                       title: '',
                       subtitle: '',
                   }
               };

               let chart = new google.charts.Bar(document.getElementById('columnchart_material'));

               chart.draw(data, google.charts.Bar.convertOptions(options));
           }
       </script>


       <div class="m-5">
           <div class="m-auto" id="columnchart_material" style="width: 50%; height: 100%;"></div>
       </div>