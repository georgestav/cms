        <form action="" method="POST">
            <div class="form-group">
                <label for="">Update Category</label>
                <?php
                if (isset($_GET['edit'])) {
                    $cat_id = $_GET['edit'];

                    $query = "SELECT * FROM categories WHERE cat_id = $cat_id";
                    $select_categories_id = mysqli_query($data, $query);

                    while ($row = mysqli_fetch_assoc($select_categories_id)) {
                        $cat_id = $row['cat_id'];
                        $cat_title = $row['cat_title'];
                ?>
                        <input class="form-control" type="text" name="cat_title" value="<?php echo $cat_title; ?>">

                <?php
                    }
                }
                ?>

                <?php
                //update query

                if (isset($_POST['update_category'])) {
                    $cat_title =  mysqli_real_escape_string($data, $_POST['cat_title']);
                    $regex = "/\s+/";
                    if (!$cat_title || preg_match($regex, $cat_title)) {
                        echo "<div class='alert alert-warning' role='alert'>
                        ❌ Please enter a valid category name. Cannot submit empty, no spaces allowed
                      </div>";
                    } else {

                        $query = "UPDATE `categories` SET `cat_title` = '$cat_title' WHERE `categories`.`cat_id` = $cat_id";
                        $update_query = mysqli_query($data, $query);
                        if (!$update_query) {
                            die("Query failed: " . mysqli_error($data));
                        } else {
                            echo "<div class='alert alert-success' role='alert'>
                            ✅ $cat_title - category added
                          </div>";
                        }
                    }
                }



                ?>
            </div>
            <div class="form-group">
                <input class="btn btn-outline-primary" type="submit" name="update_category" value="Update">
            </div>
        </form>