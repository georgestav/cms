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

    <!-- Login  -->
    <div class="card mb-4">
        <div class="card-header">Login</div>
        <form action="includes/login.php" method="post" class="form-floating">
            <div class="card-body ">
                <div class="form-floating mb-2">
                    <input type="text" class="form-control" id="floatingInput" placeholder="username" name="user_name">
                    <label for="floatingInput">Username</label>
                </div>
                <div class="form-floating mb-2">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="user_password">
                    <label for="floatingPassword">Password</label>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" id="login" name="login" type="submit">Login</button>
                </div>
            </div>
        </form>


        <!-- <form action="search.php" method="post">

                <div class="card-body">
                    <div class="input-group">
                        <input class="form-control" type="text" name="search" placeholder="Enter search term..." aria-label="Enter search term..." aria-describedby="button-search" />
                        <button class="btn btn-primary" id="button-search" name="submit" type="submit">Go!</button>
                    </div>
                </div>
            </form> -->
    </div>




    </form>

    <!-- Categories widget-->
    <div class="card mb-4">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-4">
                    <ul class="list-unstyled mb-0">

                        <?php
                        $query = "SELECT * FROM categories"; //select all the categories
                        $select_categories = mysqli_query($data, $query); //do the query

                        foreach ($select_categories as $row) {
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];
                            echo "<li><a href='category.php?cat_id=$cat_id'>$cat_title</a></li>";
                        }
                        ?>

                    </ul>
                </div>
            </div>

        </div>
        <!-- Side widget-->
        <div class="card mb-4">
            <div class="card-header">Side Widget</div>
            <div class="card-body">You can put anything you want inside of these side widgets. They are easy to use, and feature the Bootstrap 5 card component!</div>
        </div>
    </div>