<?php include 'includes/admin_head.php' ?>


<body class="sb-nav-fixed">
    <?php include 'includes/admin_navbar.php' ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include "includes/admin_sidenav.php" ?>
        </div>
        <div id="layoutSidenav_content">
            <!-- main page content -->
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Categories</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard > Categories</li>
                    </ol>
                    <!-- Category interface -->
                    <div class="container">
                        <div class="row gx-5">
                            <div class="col-md-6">
                                <!-- // add a category -->
                                <?php insert_categories(); ?>

                                <form action="categories.php" method="post">
                                    <div class="form-group">
                                        <label for="cat_title">Add Category</label>
                                        <input class="form-control mt-1" type="text" name="cat_title_add">
                                    </div>
                                    <div class="form-group mt-2">
                                        <input class="btn btn-outline-primary" type="submit" name="submit" value="Add Category">
                                    </div>
                                </form>
                                <!-- call cat_edit form to update the selected category -->
                                <?php
                                if (isset($_GET['edit'])) {
                                    $cat_id = mysqli_real_escape_string($data, $_GET['edit']);
                                    include "includes/cat_edit.php";
                                }
                                ?>
                            </div>
                            <div class="col-md-6">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Category Title</th>
                                            <th colspan="2">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- list all categories  -->
                                        <?php display_categories(); ?>
                                        <!-- delete a selected category -->
                                        <?php delete_categories(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
            <!-- footer -->
            <?php include "includes/admin_footer.php" ?>
</body>

</html>