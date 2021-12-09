 <!-- Responsive navbar-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
     <div class="container">
         <a class="navbar-brand" href="index.php">UContent Management System</a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                 <?php
                    include 'includes/db.php';
                    $query = "SELECT * FROM categories";
                    $select_categories = mysqli_query($data, $query);
                    while ($row = mysqli_fetch_assoc($select_categories)) {
                        $cat_title = $row['cat_title'];
                        echo "<li class='nav-item'><a class='nav-link' href='#'>{$cat_title}</a>";
                    }

                    ?>
                 <li class='nav-item'><a class='nav-link' href='admin/'>Admin</a>
             </ul>
         </div>
     </div>
 </nav>