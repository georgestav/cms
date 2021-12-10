<?php


if (isset($_POST['submit_user'])) {

    $user_role = $_POST['user_role'];
    $user_firstname = $_POST['user_firstname'];
    $user_lastname = $_POST['user_lastname'];
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];
    $user_email = $_POST['user_email'];
    $user_date = date('Y-m-d');


    // $user_image = $_FILES['image']['name'] ?? 0;
    // $user_image_temp = $_FILES['image']['tmp_name'];

    // move_uploaded_file($user_image_temp, "img/$user_image");

    $query = "INSERT INTO `users` (`user_role`, `user_firstname`, `user_lastname`, `user_name`, `user_password`, `user_email`, `user_image`, `user_randSalt`, `user_date`) ";
    $query .= "VALUES ('$user_role', '$user_firstname', '$user_lastname', '$user_name', '$user_password', '$user_email', '0', '0', '$user_date')";

    $append = mysqli_query($data, $query);
    confirm_query($append);
}
?>





<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="row gy-1">
            <div class="col col-md-1">
                <label for="user_id" class="form-label">ID</label>
                <input type="number" class="form-control " name="user_id" placeholder="UID" readonly>
            </div>
            <div class="col col-md-2">
                <label for="user_role" class="form-label">User Role *</label>
                <select type="form-select" class="form-select" name="user_role" required>
                    <option value='' selected disabled hidden>Select a role</option>
                    <option value="admin">Admin</option>
                    <option value="user">User</option>
                </select>
            </div>

            <div class="col col-md-4">
                <label for="user_firstname" class="form-label">First Name *</label>
                <input type="text" class="form-control" name="user_firstname" required>
            </div>
            <div class="col col-md-5">
                <label for="user_lastname" class="form-label">Last Name *</label>
                <input type="text" class="form-control" name="user_lastname" required>
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
                <input type="text" class="form-control" name="user_name" required>
            </div>
            <div class="col col-md-4">
                <label for="user_password" class="form-label">Password *</label>
                <input type="password" class="form-control" name="user_password" required>
            </div>
            <div class="col col-md-4">
                <label for="user_email" class="form-label">Email *</label>
                <input type="email" class="form-control" name="user_email" required>
            </div>
        </div>
    </div>
    <div class="form-group m-3">
        <input class="btn btn-outline-primary" type="submit" name="submit_user" value="Submit">
    </div>
    <div class="row g-1">
        <p>
            The fields with * are required
        </p>
    </div>
    </div>


</form>