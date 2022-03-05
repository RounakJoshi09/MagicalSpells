<?php include "includes/header.php"?>
    <!-- Navigation -->
    <?php include "includes/navbar.php"?>
    
    <!-- Page Content -->
    <div class="container">

        <div class="row">
        <div class="col-md-8">
            <?php
                if(isset($_POST['submit']))  
                {
                $search=$_POST['search'];
               // echo $search;
               $query = "SELECT * FROM posts";
               $query.= " WHERE post_content LIKE '%{$search}%'";
               $query.= " OR post_title LIKE '%{$search}%'";
               $query.= " OR post_author LIKE '%{$search}%'";
               $query.= " OR post_tags LIKE '%{$search}%'";
                $search_query = mysqli_query($connection,$query);
                if(!$search_query)
                {
                        die("BAD" . mysqli_error($connection));
                }
                $count=mysqli_num_rows($search_query);
               // echo $count;
                if($count==0)
                {
                    echo "<h1> NO RESULT </h1>";
                }
                else
                {
                    $query = "SELECT * FROM posts";
                    $query.= " WHERE post_content LIKE '%{$search}%'";
                    $query.= " OR post_title LIKE '%{$search}%'";
                    $query.= " OR post_author LIKE '%{$search}%'";
                    $query.= " OR post_tags LIKE '%{$search}%'";;
                    $all_posts=mysqli_query($connection,$query);
                    while($row=mysqli_fetch_assoc($all_posts))
                    {
                        $post_title=$row['post_title'];
                        $post_author=$row['post_author'];
                        $post_date=$row['post_date'];
                        $post_content=$row['post_content'];
                        $post_image=$row['post_image'];
                    
                
                                                                          ?>
                <!-- Blog Entries Column -->
           
                
                <h1 class="page-header">
                        Page Heading
                        <small>Secondary Text</small>
                    </h1>                                                          
                                                                          


                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo "$post_image" ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>    

                <?php        
                }
                }
                }
                ?>
                

                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include "includes/footer.php"?>