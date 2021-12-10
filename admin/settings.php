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

                <!-- user settings form -->
                <div class="container-fluid px-4">
                    <h1 class="mt-4">User Settings</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Dashboard > User Settings</li>
                    </ol>
                    <?php
                    if (isset($_SESSION['user_id'])) {
                        $user_id = $_SESSION['user_id'];
                    }

                    $query = "SELECT * FROM users WHERE user_id = $user_id";
                    $fetched_user = mysqli_fetch_assoc(mysqli_query($data, $query));

                    $f_user_id = $fetched_user['user_id'];
                    $f_user_firstname = $fetched_user['user_firstname'];
                    $f_user_lastname = $fetched_user['user_lastname'];
                    $f_username = $fetched_user['user_name'];
                    $f_user_password = $fetched_user['user_password'];
                    $f_user_email = $fetched_user['user_email'];
                    $f_user_role = $fetched_user['user_role'];
                    $f_user_image = $fetched_user['user_image'];

                    if (isset($_POST['update_user'])) {
                        $f_user_id = $f_user_id;
                        $f_user_role = $_POST['user_role'];
                        $f_user_firstname = $_POST['user_firstname'];
                        $f_user_lastname = $_POST['user_lastname'];
                        $f_user_name = $_POST['user_name'];
                        $f_user_password = $_POST['user_password'];
                        $f_user_email = $_POST['user_email'];

                        $query = "UPDATE `users` ";
                        $query .= "SET `user_firstname` = '$f_user_firstname', `user_lastname` = '$f_user_lastname', `user_name` = '$f_user_name', `user_password` = '$f_user_password', `user_email` = '$f_user_email', `user_role` = '$f_user_role', `user_image` = '1', `user_randSalt` = '1'";
                        $query .= " WHERE `user_id` = $f_user_id";


                        $append = mysqli_query($data, $query);
                        header("Location:settings.php");
                        confirm_query($append);
                    }

                    ?>
                    <?php


                    ?>
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="row gy-1">
                                <div class="col col-md-1">
                                    <label for="user_id" class="form-label">ID</label>
                                    <input type="number" class="form-control " name="user_id" value="<?php echo $f_user_id ?>" readonly>
                                </div>
                                <div class="col col-md-2">
                                    <label for="user_role" class="form-label">User Role *</label>
                                    <select type="form-select" class="form-select" name="user_role">
                                        <option value='<?php echo $f_user_role ?>' selected><?php echo ucfirst($f_user_role) ?></option>
                                        <?php if ($f_user_role == 'admin') {
                                            echo "<option value='user'>User</option>";
                                        } else {
                                            echo "<option value='admin'>Admin</option>";
                                        } ?>


                                    </select>
                                </div>

                                <div class="col col-md-4">
                                    <label for="user_firstname" class="form-label">First Name *</label>
                                    <input type="text" class="form-control" name="user_firstname" value="<?php echo $f_user_firstname ?>" required>
                                </div>
                                <div class="col col-md-5">
                                    <label for="user_lastname" class="form-label">Last Name *</label>
                                    <input type="text" class="form-control" name="user_lastname" value="<?php echo $f_user_lastname ?>" required>
                                </div>
                            </div>
                            <div class="row gy-1">
                                <div class="col col-md-4">
                                    <label for="user_name" class="form-label">Username *</label>
                                    <input type="text" class="form-control" name="user_name" value="<?php echo $f_username ?>" required>
                                </div>
                                <div class="col col-md-4">
                                    <label for="user_password" class="form-label">Password *</label>
                                    <input type="password" class="form-control" name="user_password" value="<?php echo $f_user_password ?>" required>
                                </div>
                                <div class="col col-md-4">
                                    <label for="user_email" class="form-label">Email *</label>
                                    <input type="email" class="form-control" name="user_email" value="<?php echo $f_user_email ?>" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-3">
                            <input class="btn btn-outline-primary" type="submit" name="update_user" value="Submit">
                        </div>
                        <div class="row g-1">
                            <p>
                                The fields with * are required
                            </p>
                        </div>
                </div>


                </form>

            </main>
            <!-- footer -->
            <?php include "includes/admin_footer.php" ?>
</body>

</html>