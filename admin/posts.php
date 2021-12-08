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
                    <h1 class="mt-4">View Posts</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard > Posts</li>
                    </ol>
                    <?php
                    if (isset($_GET['source'])) {
                        $source = $_GET['source'];
                    }

                    switch ($source ?? 0) {
                        case 'add_post';
                            include "includes/add_post.php";
                            break;
                        case 200;
                            echo '200';
                            break;

                        default;

                            include "includes/view_all_posts.php";
                            break;
                    }

                    ?>


            </main>
            <!-- footer -->
            <?php include "includes/admin_footer.php" ?>
</body>

</html>