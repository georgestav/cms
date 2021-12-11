<?php
function confirm_query($append)
{
    global $data;
    if (!$append) {
        $message = "<div class='alert alert-warning' role='alert'>
            ❌ Query was not succesful.
          </div>";
        die($message . mysqli_error($data));
    } else {
        echo "<div class='alert alert-success' role='alert'>
                        ✅ Your query was successful!
                      </div>";
    }
}

function confirm_query_posts($append, $post_id)
{
    global $data;
    if (!$append) {
        $message = "<div class='alert alert-warning' role='alert'>
            ❌ Query was not succesful.
          </div>";
        die($message . mysqli_error($data));
    } else {
?>
        <div class='alert alert-success' role='alert'>
            ✅ Your query was successful! View it live: <a href="../post.php?p_id=<?php echo $post_id ?>" target="_blank">here</a>
        </div>
    <?php }
}
// add a category
function insert_categories()
{
    global $data;
    if (isset($_POST['submit'])) {
        $cat_title = mysqli_real_escape_string($data, $_POST['cat_title_add']);
        $regex = "/\s+/";
        if (!$cat_title || preg_match($regex, $cat_title)) {
            echo "<div class='alert alert-warning' role='alert'>
            ❌ Please enter a valid category name. Cannot submit empty, no spaces allowed.
          </div>";
        } else {
            echo "<div class='alert alert-success' role='alert'>
            ✅ $cat_title - category updated
          </div>";
            $query = "INSERT INTO categories(cat_title)";
            $query .= "VALUE('{$cat_title}')";

            $create_category_query = mysqli_query($data, $query);
            if (!$create_category_query) {
                die('Query failed' . mysqli_error($data));
            }
        }
    }
}

//display categories
function display_categories()
{
    global $data;

    $query = "SELECT * FROM categories";
    $categories = mysqli_fetch_all(mysqli_query($data, $query), MYSQLI_ASSOC);

    foreach ($categories as $category) {
    ?>
        <tr>
            <td><?php echo $category['cat_id'] ?></td>
            <td><?php echo $category['cat_title'] ?></td>
            <td><a href="categories.php?delete=<?php echo $category['cat_id'] ?>"> <i class="far fa-trash-alt red" style="color:var(--bs-danger)"></i></a></td>
            <td><a href="categories.php?edit=<?php echo $category['cat_id'] ?>"><i class="fas fa-edit"></i></a></td>
        </tr>

    <?php
    }
    ?>
<?php

}
//delete a category
function delete_categories()
{
    global $data;
    if (isset($_GET['delete'])) {
        $delete_id =  $_GET['delete'];

        $query = "DELETE FROM categories WHERE cat_id = {$delete_id}";
        $delete_query = mysqli_query($data, $query);

        if (!$delete_query) {
            echo "<div class='alert alert-warning' role='alert'>
        ❌ Couldn't delete.
        </div>";
        }
        header("Location:categories.php");
    }
}
