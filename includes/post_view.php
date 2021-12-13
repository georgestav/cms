<?php
if (isset($_GET['p_id'])) {
    $p_id = mysqli_real_escape_string($data, $_GET['p_id']);
}



$query = "SELECT * FROM posts WHERE post_id = $p_id"; // query string for the db
$select_posts = mysqli_query($data, $query); //import db data for posts
//find the last published post based on current date and set it as featured
$dates = []; //initialise empty dates array

foreach ($select_posts as $post) { //for each of the db posts go through them
    array_push($dates, $post['post_date']); // get their date and push it to the array
}
function find_closest($dates, $date) //function to get the closest day to today, passing $dates = posts date array, $date = today
{

    foreach ($dates as $day) { //go through each of the day and compare them to today
        $interval[] = abs(strtotime($date) - strtotime($day)); //push the difference to an array
    }

    asort($interval); //short them
    $closest = key($interval); // define the closest key value

    return $dates[$closest]; // return the date
}

$lastPostDate = find_closest($dates, date("Y-m-d")); // run the function 

foreach ($select_posts as $posts) { //get the first matching post

    if ($posts['post_date'] === $lastPostDate) {
        $featured = $posts; //if found matching set it as featured
    }
}
// values to be passed to html
$f_id = $featured['post_id'];
$f_category_id = $featured['post_category_id'];
$f_title = $featured['post_title'];
$f_author = $featured['post_author'];
$f_date = $featured['post_date'];
$f_image = $featured['post_image'];
$f_content = $featured['post_content'];
$f_tags = $featured['post_tags'];
$f_comments_count = $featured['post_comments_count'];
$f_status = $featured['post_status'];
?>

<!-- Page content-->
<!-- Blog entries-->
<div class="col-lg-8">
    <!-- Featured blog post appended with php dynamicaly generated content-->
    <div class="card mb-4">
        <img class="card-img-top" src="img/<?php echo $f_image; ?>" alt="" />
        <?php if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'admin') {
        ?>
            <a class='btn btn-outline-secondary btn-sm rounded-0 rounded-bottom' href='admin/posts.php?source=edit_post&p_id=<?php echo $f_id ?>'>Edit post</a>
        <?php
        } ?>
        <div class="card-body">
            <div class="small text-muted"><?php echo $f_date; ?> By <?php echo $f_author; ?></div>
            <h2 class="card-title"><?php echo $f_title; ?></h2>
            <p class="card-text"><?php echo $f_content; ?></p>
        </div>
    </div>
    <?php include 'includes/comments.php' ?>