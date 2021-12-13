<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Username</th>
            <th>Email</th>
            <th>Role</th>
            <th>Image</th>

            <th colspan="2">Actions</th>
        </tr>
    </thead>
    <tboby>

        <?php
        //Get all comments from DB and display them
        $query = 'SELECT * FROM users';
        $results = mysqli_query($data, $query);
        if (!$results) {
            echo 'Could not retrieve data from the database';
        }


        foreach ($results as $row) {
            $user_id = $row['user_id'];
            $user_firstname = $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $username = $row['user_name'];
            $user_password = $row['user_password'];
            $user_email = $row['user_email'];
            $user_role = $row['user_role'];
            $user_image = $row['user_image'];

        ?>

            <tr>
                <td><?php echo $user_id ?></td>
                <td><?php echo $user_firstname ?></td>
                <td><?php echo $user_lastname ?></td>
                <td><?php echo $username ?></td>
                <td><?php echo $user_email ?></td>
                <td><?php echo $user_role ?></td>
                <td><?php echo $user_image ?></td>

                <td><a href="users.php?source=edit_users&user_id=<?php echo $user_id ?>"><i class="fas fa-edit text-muted"></i></a></td>
                <td><a onclick="javascript: return confirm('Confirm to delete')" href="users.php?delete=<?php echo $user_id ?>"> <i class="far fa-trash-alt red" style="color:var(--bs-danger)"></i></a></td>
            </tr>

        <?php
        } ?>

    </tboby>
</table>

<?php
if (isset($_GET['delete']) && $_SESSION['user_role'] === 'admin') {
    $to_delete = $_GET['delete'];
    $query = "DELETE FROM `users` WHERE `users`.`user_id` = {$to_delete};";

    $append = mysqli_query($data, $query);
    header("Location:users.php");
    confirm_query($append);
}


?>