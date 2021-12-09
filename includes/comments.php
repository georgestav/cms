                <!-- Blog Comments -->
                <?php
                if (isset($_POST['submit_comment'])) {
                    $comment_post_id = $_GET['p_id'];
                    $comment_date = date('Y-m-d');
                    $comment_author = $_POST['comment_author'];
                    $comment_email = $_POST['comment_email'];
                    $comment_content = $_POST['comment_content'];

                    $query_create_comment = "INSERT INTO `comments` (`comment_post_id`, `comment_date`, `comment_author`, `comment_email`, `comment_content`) VALUES ('$comment_post_id', '$comment_date', '$comment_author', '$comment_email', '$comment_content')";

                    $create_comment = mysqli_query($data, $query_create_comment);
                    include_once "admin/functions.php";
                    confirm_query($create_comment);
                }
                ?>

                <!-- Comments Form -->
                <div class="bg-light p-3 border rounded">
                    <h4>Leave a Comment:</h4>
                    <form action="" role="form" method="post">

                        <div class="form-group">
                            <input type="text" class="form-control m-1" name="comment_author" placeholder="Your Name">
                            <input type="email" class="form-control m-1" name="comment_email" placeholder="Your email">
                        </div>


                        <div class="form-group ">
                            <textarea class="form-control m-1" rows="3" name="comment_content" placeholder="Your comment"></textarea>
                        </div>

                        <button type="submit" name="submit_comment" class="btn btn-primary m-2">Submit</button>
                    </form>
                </div>

                <hr>

                <div class="media d-flex flex-column">
                    <?php
                    $p_id = $_GET['p_id'];
                    $query = "SELECT * FROM comments WHERE comment_post_id = $p_id";
                    $results = mysqli_query($data, $query);
                    if (!$results) {
                        echo 'Could not retrieve data from the database';
                    }
                    foreach ($results as $row) {
                        $comment_id = $row['comment_id'];
                        $comment_post_id = $row['comment_post_id'];
                        $comment_date = $row['comment_date'];
                        $comment_author = $row['comment_author'];
                        $comment_email = $row['comment_email'];
                        $comment_status = $row['comment_status'];
                        $comment_content = $row['comment_content'];


                        // $query = "SELECT * FROM categories WHERE cat_id = {$comment_post_id}";
                        // $select_categories = mysqli_query($data, $query);

                        // foreach ($select_categories as $row) {
                        //     $cat_id = $row['cat_id'];
                        //     $cat_title = $row['cat_title'];
                        // }

                    ?>
                        <div class="bg-alert m-2 p-3 border rounded ">
                            <h6 class="media-heading"><?php echo $comment_author ?> said on
                                <small><?php echo $comment_date ?></small>
                            </h6>
                            <?php echo $comment_content ?>
                        </div>

                    <?php
                    } ?>
                </div>