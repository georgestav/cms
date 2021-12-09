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
            <a class="btn btn-primary" href="#!">Read more →</a>
        </div>
    </div>


    <!-- Nested row for non-featured blog posts-->
    <div class="row">
        <div class="col-lg-6">
            <!-- Blog post-->
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2021</div>
                    <h2 class="card-title h4">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Reiciendis aliquid atque, nulla.</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>
            <!-- Blog post-->
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2021</div>
                    <h2 class="card-title h4">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Reiciendis aliquid atque, nulla.</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <!-- Blog post-->
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2021</div>
                    <h2 class="card-title h4">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Reiciendis aliquid atque, nulla.</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>
            <!-- Blog post-->
            <div class="card mb-4">
                <a href="#!"><img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." /></a>
                <div class="card-body">
                    <div class="small text-muted">January 1, 2021</div>
                    <h2 class="card-title h4">Post Title</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                        Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam.</p>
                    <a class="btn btn-primary" href="#!">Read more →</a>
                </div>
            </div>
        </div>
    </div>
</div>