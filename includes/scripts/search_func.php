<?php
if (isset($_POST['submit'])) {
    $search = mysqli_real_escape_string($data, $_POST['search']);
    $query = "SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
    $search_query = mysqli_query($data, $query);
    if (!$search_query) {
        die("Query failed" . msqli_error($data));
    }
}
