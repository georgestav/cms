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
                    <h1 class="mt-4">Users</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard > View all users</li>
                    </ol>
                    <?php
                    if (isset($_GET['source'])) {
                        $source = mysqli_real_escape_string($data, $_GET['source']);
                    }
                    switch ($source ?? 0) {
                        case 'add_users':
                            include "includes/add_users.php";
                            break;
                        case 'edit_users':
                            include "includes/edit_users.php";
                            break;
                        default:
                            include "includes/view_all_users.php";
                            break;
                    }

                    ?>


            </main>
            <!-- footer -->
            <?php include "includes/admin_footer.php" ?>
</body>

</html>