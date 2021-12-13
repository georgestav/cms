<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Author</th>
            <th>Title</th>
            <th>Categories</th>
            <th>Status</th>
            <th>Image</th>
            <th>Tags</th>
            <th>Date</th>
            <th>Content</th>
            <th>Number of comments</th>
            <th colspan="4">Actions</th>
        </tr>
    </thead>
    <tboby>

        <?php
        //Get all posts from DB and display them
        $query = 'SELECT * FROM posts';
        $results = mysqli_query($data, $query);
        if (!$results) {
            echo 'Could not retrieve data from the database';
        }


        foreach ($results as $row) {
            $post_id = $row['post_id'];
            $post_category_id = $row['post_category_id'];
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = $row['post_content'];
            $post_tags = $row['post_tags'];
            $post_comments_count = $row['post_comments_count'];
            $post_status = $row['post_status'];


            $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
            $select_categories = mysqli_query($data, $query);

            foreach ($select_categories as $row) {
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];
            }

        ?>

            <tr>
                <td><?php echo $post_id ?></td>
                <td><?php echo $post_author ?></td>
                <td><a style="text-decoration: none;" target="_blank" href="../post.php?p_id=<?php echo $post_id ?>"><?php echo $post_title ?></a></td>
                <td><?php echo $cat_title ?></td>
                <td><?php echo $post_status ?></td>
                <td><img src="../img/<?php echo $post_image ?>" width="100%" alt=""></td>
                <td><?php echo $post_tags ?></td>
                <td><?php echo $post_date ?></td>
                <td><?php echo substr($post_content, 0, 45) ?></td>
                <td><?php echo $post_comments_count ?></td>
                <td><a href="posts.php?publish=<?php echo $post_id ?>"><i class="fas fa-check text-muted"></i></td>
                <td><a href="posts.php?unpublish=<?php echo $post_id ?>"><i class="fas fa-ban text-muted"></i></td>
                <td><a href="posts.php?source=edit_post&p_id=<?php echo $post_id ?>"><i class="fas fa-edit"></i></a></td>
                <td><a onclick="javascript: return confirm('Confirm to delete')" href="posts.php?delete=<?php echo $post_id ?>"> <i class="far fa-trash-alt red" style="color:var(--bs-danger)"></i></a></td>

            </tr>
        <?php
        } ?>

    </tboby>
</table>

<?php
if (isset($_GET['delete'])) {
    $to_delete = mysqli_real_escape_string($data, $_GET['delete']);
    $query = "DELETE FROM `posts` WHERE `posts`.`post_id` = {$to_delete};";

    $append = mysqli_query($data, $query);
    header("Location:posts.php");
    confirm_query($append);
}
if (isset($_GET['unpublish'])) {
    $to_unpublish = mysqli_real_escape_string($data, $_GET['unpublish']);
    $query = "UPDATE `posts` SET `post_status` = 'unpublished' WHERE `posts`.`post_id` = $to_unpublish;";

    $append = mysqli_query($data, $query);
    header("Location:posts.php");
    confirm_query($append);
}

if (isset($_GET['publish'])) {
    $to_approve = mysqli_real_escape_string($data, $_GET['publish']);
    $query = "UPDATE `posts` SET `post_status` = 'published' WHERE `posts`.`post_id` = $to_approve;";

    $append = mysqli_query($data, $query);
    header("Location:posts.php");
    confirm_query($append);
}


?>