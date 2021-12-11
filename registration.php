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
    <div class="container m-5">
        <div class="row">
            <!-- Page Content -->
            <div class="container">

                <section id="login">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-wrap">
                                    <h1>Register</h1>
                                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                                        <div class="form-group">
                                            <label for="username" class="sr-only">username</label>
                                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="sr-only">Email</label>
                                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                                        </div>
                                        <div class="form-group">
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