<?php
$post_id = $_GET['p_id'];


$query = "SELECT * FROM posts WHERE post_id = '$post_id'";
$get_post = mysqli_query($data, $query);
if (!$get_post) 'Post not found';
$fetched_post = mysqli_fetch_assoc($get_post);


$fetched_post_id = $fetched_post['post_id'];
$fetched_post_category_id = $fetched_post['post_category_id'];
$fetched_post_title = $fetched_post['post_title'];
$fetched_post_author = $fetched_post['post_author'];
$fetched_post_date = $fetched_post['post_date'];
$fetched_post_image = $fetched_post['post_image'];
$fetched_post_content = $fetched_post['post_content'];
$fetched_post_tags = $fetched_post['post_tags'];
$fetched_post_comment_count = $fetched_post['post_comments_count'];
$fetched_post_status = $fetched_post['post_status'];
?>
<?php


if (isset($_POST['update_post'])) {
    $post_id = $fetched_post_id;
    $post_category_id = $_POST['post_category_id'];
    $post_date = $_POST['post_date'];
    $post_author = $_POST['post_author'];

    $post_image = $_FILES['image']['name'];
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_title = $_POST['post_title'];
    $post_content = $_POST['post_content'];
    $post_comment_count = 4;
    $post_status = 'pending';

    move_uploaded_file($post_image_temp, "../images/$post_image");
    if (empty($post_image)) {
        $query = "SELECT * FROM posts WHERE post_id = $post_id";
        $select_image = mysqli_query($data, $query);

        foreach ($select_image as $row) {
            $post_image = $row['post_image'];
        }
    }

    $query = "UPDATE `posts` SET `post_category_id` = '$post_category_id', `post_title` = '$post_title', `post_author` = '$post_author', `post_image` = '$post_image', `post_content` = '$post_content', `post_tags` = '$post_tags' WHERE `posts`.`post_id` = $post_id";


    $append = mysqli_query($data, $query);

    confirm_query($append);
}
?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
        <div class="row gy-1">
            <div class="col col-md-1">
                <label for="post_id" class="form-label">Post ID</label>
                <input type="number" class="form-control " name="post_id" placeholder="<?php echo $fetched_post_id ?>" disabled>
            </div>
            <div class="col col-md-3">
                <label for="post_category_id" class="form-label">Post Category ID *</label>
                <select type="form-select" class="form-select" name="post_category_id" placeholder="Post category ID">
                    <option selected value="<?php echo $fetched_post_category_id ?>">Select one</option>
                    <!-- generate categories -->
                    <?php
                    $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($data, $query);
                    confirm_query($select_categories);


                    foreach ($select_categories as $row) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];

                        echo "<option value='$cat_id'>$cat_title</option>";
                    }

                    ?>

                </select>
            </div>
            <div class="col col-md-3">
                <label for="post_id" class="form-label">Date *</label>
                <input type="date" class="form-control" name="post_date" value="<?php echo $fetched_post_date ?>">
            </div>
            <div class="col col-md-5">
                <label for="post_author" class="form-label">Author *</label>
                <input type="text" class="form-control" name="post_author" value="<?php echo $fetched_post_author ?>">
            </div>
        </div>
        <div class="row gy-2">
            <img style="width:100px;height:100px;" src="../img/<?php echo $fetched_post_image ?>" alt="">
            <div class="input-group col col-md-6">
                <label class="input-group-text" for="post_image">Post image</label>
                <input type="file" class="form-control" name="image" value="<?php echo $fetched_post_image ?>">
            </div>
        </div>
        <div class="row gy-1">
            <div class="col col-md-4">
                <label for="post_tags" class="form-label">Tags related to the post *</label>
                <input type="text" class="form-control" name="post_tags" value="<?php echo $fetched_post_tags ?>">
            </div>
            <div class="col col-md-8">
                <label for="post_title" class="form-label">Title *</label>
                <input type="text" class="form-control" name="post_title" value="<?php echo $fetched_post_title ?>">
            </div>
        </div>
        <div class="row gy-1">
            <div class="col col-md-12">
                <label for="post_content" class="form-label">Content text area *</label>
                <textarea class="form-control" name="post_content" rows="5"><?php echo $fetched_post_content ?></textarea>
            </div>
        </div>
        <div class="form-group gy-4">
            <input class="btn btn-outline-primary" type="submit" name="update_post" value="Submit">
        </div>
        <div class="row gy-1">
            <p>
                The fields with * are required
            </p>
        </div>
    </div>


</form>