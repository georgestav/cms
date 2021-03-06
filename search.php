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
        <?php include 'includes/scripts/search_func.php' ?>

        <div class="row">
            <div class="row">
                <div class="col-lg-8">
                    <?php
                    $count = mysqli_num_rows($search_query);
                    if (!$count) {
                        echo 'No posts found, try another search';
                    } else {
                        echo $count . ' posts found with matching tags of ' . mysqli_real_escape_string($data, $_POST['search']);
                    }

                    foreach (mysqli_fetch_all($search_query, MYSQLI_ASSOC) as $post) {
                        $post_id = $post['post_id'];
                        $post_category_id = $post['post_category_id'];
                        $post_title = $post['post_title'];
                        $post_author = $post['post_author'];
                        $post_date = $post['post_date'];
                        $post_image = $post['post_image'];
                        $post_content = $post['post_content'];
                        $post_tags = $post['post_tags'];
                        $post_comments_count = $post['post_comments_count'];
                        $post_status = $post['post_status'];

                    ?>
                        <div class="card mb-2 mt-2">
                            <div class="card-body">
                                <div class="small text-muted"><?php echo $post_date; ?></div>
                                <h2 class="card-title h4"><?php echo $post_title; ?></h2>
                                <p class="card-text"><?php echo substr($post_content, 0, 150); ?></p>
                                <a class="btn btn-outline-secondary btn-sm float-end" href="post.php?p_id=<?php echo $post_id; ?>">Read more →</a>
                            </div>
                        </div>

                    <?php }

                    ?>

                </div>
                <!-- sidebar -->
                <?php include "includes/sidebar.php" ?>
            </div>
        </div>
    </div>
    </div>





    <!-- footer -->
    <?php include 'includes/footer.php' ?>