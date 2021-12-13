<?php include "db.php"; ?>
<?php session_start(); ?>
<?php
if (isset($_POST['login'])) {
    $username = $_POST['user_name'];
    $password = $_POST['user_password'];

    $username = mysqli_real_escape_string($data, $username);
    $password = mysqli_real_escape_string($data, $password);

    $query = "SELECT * FROM users WHERE user_name = '$username'";
    $select_user_query = mysqli_query($data, $query);
    if (!$select_user_query) {
        die("Query failed" . mysqli_error($data));
    }

    foreach ($select_user_query as $db_user) {

        $user_id = $db_user['user_id'];
        $user_firstname = $db_user['user_firstname'];
        $user_lastname = $db_user['user_lastname'];
        $user_name = $db_user['user_name'];
        $user_password = $db_user['user_password'];
        $user_email = $db_user['user_email'];
        $user_role = $db_user['user_role'];
        $user_image = $db_user['user_image'];
        $user_randSalt = $db_user['user_randSalt'];
        $user_date = $db_user['user_date'];
    }




    if (password_verify($password, $user_password) && $user_role === "admin") {
        $_SESSION['user_id'] = $db_user['user_id'];
        $_SESSION['username'] = $db_user['user_name'];
        $_SESSION['user_firstname'] = $db_user['user_firstname'];
        $_SESSION['user_lastname'] = $db_user['user_lastname'];
        $_SESSION['user_email'] = $db_user['user_email'];
        $_SESSION['user_role'] = $db_user['user_role'];
        header("Location:../admin");
    } else if (password_verify($password, $user_password)) {
        $_SESSION['user_id'] = $db_user['user_id'];
        $_SESSION['username'] = $db_user['user_name'];
        $_SESSION['user_firstname'] = $db_user['user_firstname'];
        $_SESSION['user_lastname'] = $db_user['user_lastname'];
        $_SESSION['user_email'] = $db_user['user_email'];
        $_SESSION['user_role'] = $db_user['user_role'];
        header("Location:../");
    } else {
        header("Location:../");
    }
}
