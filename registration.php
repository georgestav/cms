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
    <div class="container mb-3">
        <div class="row ">
            <!-- Page Content -->
            <div class="d-flex justify-content-center m-3  ">

                <section id="login">
                    <?php

                    if (isset($_POST['submit'])) {
                        $username = mysqli_real_escape_string($data, $_POST['username']);
                        $email = mysqli_real_escape_string($data, $_POST['email']);
                        $password = mysqli_real_escape_string($data, $_POST['password']);
                        $date = date('Y-m-d');

                        $password = password_hash($password, PASSWORD_BCRYPT, ['cost' => 12]);

                        if (empty($username) || empty($email) || empty($password)) {
                            $message = "<div class='alert alert-warning' role='alert'>❌ Query was not succesful. You need to fill out all the fields.</div>";
                            echo ($message);
                        } else {
                            $query = "INSERT INTO `users`(`user_firstname`, `user_lastname`, `user_name`, `user_password`, `user_email`, `user_role`, `user_image`, `user_date`) ";
                            $query .= "VALUES ('Empty','Empty','{$username}','{$password}','{$email}','user','0','{$date}') ";
                            $register_query = mysqli_query($data, $query);
                            if (!$register_query) {
                                die('Query failed' . mysqli_error($data) . ' ' . mysqli_errno($data));
                            }

                            echo "<div class='alert alert-success' role='alert'>✅ Your registration was successful!</div>";
                        }
                    }
                    ?>
                    <div class="container ">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-wrap">
                                    <h1>Register</h1>
                                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                                        <div class="form-group mb-2">
                                            <label for="username" class="sr-only">username</label>
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="email" class="sr-only">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="password" class="sr-only">Password</label>
                                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                                        </div>

                                        <input type="submit" name="submit" id="btn-login" class="btn btn-outline-dark" value="Register">
                                    </form>

                                </div>
                            </div> <!-- /.col-xs-12 -->
                        </div> <!-- /.row -->
                    </div> <!-- /.container -->
                </section>

            </div>
        </div>
    </div>
    </div>
    <!-- footer -->
    <?php include 'includes/footer.php' ?>