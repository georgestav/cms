<?php


if (isset($_POST['submit_post'])) {
    $post_id = $_POST['post_id'] ?? 0;
    $post_category_id = $_POST['post_category_id'];
    $post_date = $_POST['post_date'];
    $post_author = $_POST['post_author'];

    $post_image = $_FILES['image']['name'] ?? 'img_01.jpeg';
    $post_image_temp = $_FILES['image']['tmp_name'];

    $post_tags = $_POST['post_tags'];
    $post_title = $_POST['post_title'];
    $post_content = $_POST['post_content'];
    $post_comment_count = 4;
    $post_status = 'pending';

    move_uploaded_file($post_image_temp, "../img/$post_image");

    $query = "INSERT INTO `posts` (`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comments_count`, `post_status`) ";
    $query .= "VALUES ('$post_category_id', '$post_title', '$post_author', '$post_date', '$post_image', '$post_content', '$post_tags', '$post_comment_count', '$post_status')";

    $append = mysqli_query($data, $query);
    confirm_query($append);
}
?>





<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="row gy-1">
            <div class="col col-md-1">
                <label for="post_id" class="form-label">ID</label>
                <input type="number" class="form-control " name="post_id" placeholder="PID" disabled>
            </div>
            <div class="col col-md-3">
                <label for="post_category_id" class="form-label">Post Category ID *</label>
                <select type="form-select" class="form-select" name="post_category_id" placeholder="Post category ID">
                    <option selected>Select one</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                </select>
            </div>
            <div class="col col-md-3">
                <label for="post_id" class="form-label">Date *</label>
                <input type="date" class="form-control" name="post_date">
            </div>
            <div class="col col-md-5">
                <label for="post_author" class="form-label">Author *</label>
                <input type="text" class="form-control" name="post_author" placeholder="Author">
            </div>
        </div>
        <div class="row gy-2">
            <div class="input-group col col-md-6">
                <label class="input-group-text" for="post_image">Post image</label>
                <input type="file" class="form-control" name="image">
            </div>
        </div>
        <div class="row gy-1">
            <div class="col col-md-4">
                <label for="post_tags" class="form-label">Tags related to the post *</label>
                <input type="text" class="form-control" name="post_tags" placeholder="comma separated">
            </div>
            <div class="col col-md-8">
                <label for="post_title" class="form-label">Title *</label>
                <input type="text" class="form-control" name="post_title" placeholder="Post Title">
            </div>
        </div>
        <div class="row gy-1">
            <div class="col col-md-12">
                <label for="post_content" class="form-label">Content textarea *</label>
                <textarea class="form-control" name="post_content" rows="5"></textarea>
            </div>
        </div>
        <div class="form-group gy-4">
            <input class="btn btn-outline-primary" type="submit" name="submit_post" value="Submit">
        </div>
        <div class="row gy-1">
            <p>
                The fields with * are required
            </p>
        </div>
    </div>


</form>