<?php

include "scripts/findfeatured.php"; //exported final featured sorting script
?>

<!-- Page content-->
<!-- Blog entries-->
<div class="col-lg-8">
    <!-- Featured blog post appended with php dynamicaly generated content-->
    <div class="card mb-4">
        <a href="post.php?p_id=<?php echo $f_id; ?>"><img class="card-img-top" src="img/<?php echo $f_image; ?>" alt="" /></a>
        <div class="card-body">
            <div class="small text-muted"><?php echo $f_date; ?> By <?php echo $f_author; ?></div>
            <h2 class="card-title"><?php echo $f_title; ?></h2>
            <p class="card-text"><?php echo substr($f_content, 0, 150) . '...'; ?></p>
            <a class="btn btn-primary" href="post.php?p_id=<?php echo $f_id; ?>">Read more →</a>
        </div>
    </div>


    <!-- Nested row for non-featured blog posts-->
    <!-- <div class="d-flex flex-wrap"> -->
    <div class="container">
        <div class="row g-2">
            <!-- Blog post-->
            <?php

            $query = "SELECT * FROM posts WHERE post_status = 'published'";
            $result = mysqli_query($data, $query);


            foreach ($result as $card) {
                $card_id = $card['post_id'];
                $card_category_id = $card['post_category_id'];
                $card_title = $card['post_title'];
                $card_author = $card['post_author'];
                $card_date = $card['post_date'];
                $card_image = $card['post_image'];
                $card_content = $card['post_content'];
                $card_tags = $card['post_tags'];
                $card_comments_count = $card['post_comments_count'];
                $card_status = $card['post_status'];
            ?>
                <div class="col-md-6">
                    <div class="card ">
                        <a href="post.php?p_id=<?php echo $card_id ?>"><img class="card-img-top" style="height: 35%;" src="img/<?php echo $card_image ?>" alt="..." /></a>
                        <div class="card-body">
                            <div class="small text-muted"><?php echo $card_date ?></div>
                            <h2 class="card-title h4"><?php echo $card_title ?></h2>
                            <p class="card-text"><?php echo substr($card_content, 0, 150) . "..." ?></p>
                            <a class="btn btn-primary" href="post.php?p_id=<?php echo $card_id ?>">Read more →</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
    <!-- </div> -->
</div>