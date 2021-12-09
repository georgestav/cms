<!-- header -->
<?php
include 'includes/header.php';
?>

<body>
    <!-- Responsive navbar-->
    <?php include 'includes/navbar.php' ?>
    <!-- Page title -->
    <?php include 'includes/title.php' ?>
    <!-- Page content-->
    <div class="container">
        <div class="row">
            <!-- Page content-->
            <!-- Blog entries-->
            <div class="col-lg-8">
                <?php
                if (isset($_GET['cat_id'])) {
                    $cat_id = $_GET['cat_id'];
                }

                $query = "SELECT * FROM posts WHERE post_category_id = $cat_id"; // query string for the db
                $select_posts = mysqli_query($data, $query); //import db data for posts


                foreach ($select_posts as $post) { //for each of the db posts go through them

                    // values to be passed to html
                    $p_id = $post['post_id'];
                    $p_category_id = $post['post_category_id'];
                    $p_title = $post['post_title'];
                    $p_author = $post['post_author'];
                    $p_date = $post['post_date'];
                    $p_image = $post['post_image'];
                    $p_content = $post['post_content'];
                    $p_tags = $post['post_tags'];
                    $p_comments_count = $post['post_comments_count'];
                    $p_status = $post['post_status'];
                ?>

                    <!-- Featured blog post appended with php dynamicaly generated content-->
                    <div class="card mb-4">
                        <a href="post.php?p_id=<?php echo $p_id; ?>"><img class="card-img-top" src="img/<?php echo $p_image; ?>" alt="" /></a>
                        <div class="card-body">
                            <div class="small text-muted"><?php echo $p_date; ?> By <?php echo $p_author; ?></div>
                            <h2 class="card-title"><?php echo $p_title; ?></h2>
                            <p class="card-text"><?php echo substr($p_content, 0, 150) . '...'; ?></p>
                            <a class="btn btn-primary" href="post.php?p_id=<?php echo $p_id; ?>">Read more →</a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
            <!-- sidebar -->
            <?php include 'includes/sidebar.php' ?>
        </div>
    </div>
    </div>
    <!-- footer -->
    <?php include 'includes/footer.php' ?>