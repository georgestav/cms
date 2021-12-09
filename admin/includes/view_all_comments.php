<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Response to</th>
            <th>Date</th>
            <th>Author</th>
            <th>Email</th>
            <th>Status</th>
            <th>Content</th>
            <th colspan="4">Actions</th>
        </tr>
    </thead>
    <tboby>

        <?php
        //Get all comments from DB and display them
        $query = 'SELECT * FROM comments';
        $results = mysqli_query($data, $query);
        if (!$results) {
            echo 'Could not retrieve data from the database';
        }


        foreach ($results as $row) {
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_date = $row['comment_date'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_status = $row['comment_status'];
            $comment_content = $row['comment_content'];

            //get the assosiated title to display instead of the id number of the post
            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
            $select_post_id_query = mysqli_query($data, $query);

            foreach ($select_post_id_query as $row) {
                $post_id = $row['post_id'];
                $post_title = $row['post_title'];
            }

        ?>

            <tr>
                <td><?php echo $comment_id ?></td>
                <td><?php echo $post_title ?></td>
                <td><?php echo $comment_date ?></td>
                <td><?php echo $comment_author ?></td>
                <td><?php echo $comment_email ?></td>
                <td><?php echo $comment_status ?></td>
                <td><?php echo substr($comment_content, 0, 45) ?></td>
                <td><a href="comments.php?approve=<?php echo $comment_id ?>"><i class="fas fa-check"></i></td>
                <td><a href="comments.php?reject=<?php echo $comment_id ?>"><i class="fas fa-ban"></i></td>
                <td><a href="comments.php?source=edit_post&c_id=<?php echo $comment_id ?>"><i class="fas fa-edit"></i></a></td>
                <td><a href="comments.php?delete=<?php echo $comment_id ?>"> <i class="far fa-trash-alt red" style="color:var(--bs-danger)"></i></a></td>
            </tr>

        <?php
        } ?>

    </tboby>
</table>

<?php

if (isset($_GET['reject'])) {
    $to_reject = $_GET['reject'];
    $query = "UPDATE `comments` SET `comment_status` = 'rejected' WHERE `comments`.`comment_id` = $to_reject;";

    $append = mysqli_query($data, $query);
    header("Location:comments.php");
    confirm_query($append);
}

if (isset($_GET['approve'])) {
    $to_approve = $_GET['approve'];
    $query = "UPDATE `comments` SET `comment_status` = 'approved' WHERE `comments`.`comment_id` = $to_approve;";

    $append = mysqli_query($data, $query);
    header("Location:comments.php");
    confirm_query($append);
}


if (isset($_GET['delete'])) {
    $to_delete = $_GET['delete'];
    $query = "DELETE FROM `comments` WHERE `comments`.`comment_id` = {$to_delete};";

    $append = mysqli_query($data, $query);
    header("Location:comments.php");
    confirm_query($append);
}


?>