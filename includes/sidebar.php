<!-- Side widgets-->

<?php include 'scripts/search_func.php' ?>
<div class="col-lg-4">
    <!-- Search widget-->
    <div class="card mb-4">
        <div class="card-header">Search</div>
        <form action="search.php" method="post">

            <div class="card-body">
                <div class="input-group">
                    <input class="form-control" type="text" name="search" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                    <button class="btn btn-primary" id="button-search" name="submit" type="submit">Go!</button>
                </div>
            </div>
        </form>
    </div>



    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="list-unstyled mb-0">
                        <?php

                        $query = "SELECT * FROM categories";
                        $select_categories = mysqli_query($data, $query);
                        while ($row = mysqli_fetch_assoc($select_categories)) {
                            $cat_title = $row['cat_title'];
                            echo "<li><a href='#!'>$cat_title</a></li>";
                        }

                        ?>

                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Side widget-->
    <div class="card mb-4">
        <div class="card-header">Side Widget</div>
        <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
    </div>
</div>