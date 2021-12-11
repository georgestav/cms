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
    $post_content = mysqli_real_escape_string($data, $_POST['post_content']);
    $post_comment_count = 0;
    $post_status = $_POST['post_status'];

    move_uploaded_file($post_image_temp, "../img/$post_image");

    $query = "INSERT INTO `posts` (`post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_status`) ";
    $query .= "VALUES ('$post_category_id', '$post_title', '$post_author', '$post_date', '$post_image', '$post_content', '$post_tags', '$post_status')";

    $append = mysqli_query($data, $query);
    $post_id = mysqli_insert_id($data);
    confirm_query_posts($append, $post_id);
}
?>


<script>
    $('#summernote').summernote({
        placeholder: 'Hello stand alone ui',
        tabsize: 2,
        height: 120,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ]
    });
</script>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="row">
        <div class="row gy-1">
            <div class="col col-md-1">
                <label for="post_id" class="form-label">ID</label>
                <input type="number" class="form-control " name="post_id" placeholder="PID" disabled>
            </div>
            <div class="col col-md-3">
                <label for="post_category_id" class="form-label">Post Category *</label>
                <select type="form-select" class="form-select" name="post_category_id" placeholder="Post category ID" required>
                    <option selected>Select one</option>
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
                <input type="date" class="form-control" name="post_date" required>
            </div>
            <div class="col col-md-5">
                <label for="post_author" class="form-label">Author *</label>
                <input type="text" class="form-control" name="post_author" placeholder="Author" required>
            </div>
        </div>
        <div class="row gy-2">
            <div class="input-group col col-md-6">
                <label class="input-group-text" for="post_image">Post image</label>
                <input type="file" class="form-control" name="image" required>
            </div>
        </div>
        <div class="row gy-1">
            <div class="col col-md-3">
                <label for="post_tags" class="form-label">Tags related to the post *</label>
                <input type="text" class="form-control" name="post_tags" placeholder="comma separated" required>
            </div>
            <div class="col col-md-6">
                <label for="post_title" class="form-label">Title *</label>
                <input type="text" class="form-control" name="post_title" placeholder="Post Title" required>
            </div>
            <div class="col col-md-3">
                <label for="post_status" class="form-label">Post Status *</label>
                <select type="form-select" class="form-select" name="post_status" placeholder="post_status">
                    <option value="pending" selected>Pending</option>
                    <option value="unpublished">Unpublished</option>
                    <option value="published">Published</option>
                </select>
            </div>
        </div>

        <div class="row gy-1">
            <div class="col col-md-12">
                <label for="post_content" class="form-label">Content text area *</label>
                <textarea id="summernote" class="form-control" name="post_content" rows="8" required></textarea>
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
<script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
</script>