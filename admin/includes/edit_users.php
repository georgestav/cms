<?php
$user_id = mysqli_real_escape_string($data, $_GET['user_id']);


$query = "SELECT * FROM `users` WHERE `user_id` = $user_id";
$get_user = mysqli_query($data, $query);
if (!$get_user) 'Post not found';
$fetched_user = mysqli_fetch_assoc($get_user);

$f_user_id = $fetched_user['user_id'];
$f_user_firstname = $fetched_user['user_firstname'];
$f_user_lastname = $fetched_user['user_lastname'];
$f_username = $fetched_user['user_name'];
$f_user_password = $fetched_user['user_password'];
$f_user_email = $fetched_user['user_email'];
$f_user_role = $fetched_user['user_role'];
$f_user_image = $fetched_user['user_image'];
?>
<?php


if (isset($_POST['update_user'])) {
    $user_id = $f_user_id;
    $user_role = mysqli_real_escape_string($data, $_POST['user_role']);
    $user_firstname = mysqli_real_escape_string($data, $_POST['user_firstname']);
    $user_lastname = mysqli_real_escape_string($data, $_POST['user_lastname']);
    $user_name = mysqli_real_escape_string($data, $_POST['user_name']);
    $user_email = mysqli_real_escape_string($data, $_POST['user_email']);


    // $user_image = $_FILES['image']['name'] ?? 0;
    // $user_image_temp = $_FILES['image']['tmp_name'];

    // move_uploaded_file($user_image_temp, "img/$user_image");

    // if (empty($post_image)) {
    //     $query = "SELECT * FROM posts WHERE post_id = $post_id";
    //     $select_image = mysqli_query($data, $query);

    //     foreach ($select_image as $row) {
    //         $post_image = $row['post_image'];
    //     }
    // }

    $query = "UPDATE `users` ";
    $query .= "SET `user_firstname` = '$user_firstname', `user_lastname` = '$user_lastname', `user_name` = '$user_name', `user_email` = '$user_email', `user_role` = '$user_role', `user_image` = '1'";
    $query .= " WHERE `user_id` = $f_user_id";


    $append = mysqli_query($data, $query);
    header("Location:users.php");
    confirm_query($append);
}
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
        <!-- <div class="row gy-2">
            <div class="input-group col col-md-6">
                <label class="input-group-text" for="user_image">User image</label>
                <input type="file" class="form-control" name="user_image" accept="image/*">
            </div>
        </div> -->
        <div class="row gy-1">
            <div class="col col-md-4">
                <label for="user_name" class="form-label">Username *</label>
                <input type="text" class="form-control" name="user_name" value="<?php echo $f_username ?>" required>
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