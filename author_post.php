<?php include "includes/header.php"?>
    <!-- Navigation -->
    <?php include "includes/navbar.php"?>
    <!-- Page Content -->
    <?php
    
    if(isset($_GET['author']))
    {
        $post_author=$_GET['author'];
    }
    ?>

    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
            <h1 class="page-header">
                    All Post From <?php echo $post_author;?>
                    <small>Secondary Text</small>
                </h1>

            <?php  

                
                $query= "SELECT * FROM posts WHERE post_author='{$post_author}'";
                $author_posts=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($author_posts))
                {
                    $post_id=$row['post_id'];
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_content=$row['post_content'];
                    $post_image=$row['post_image'];
                                                                          ?>
                                                                          
                                                                          


                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo "$post_image" ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content ?></p>

                <hr>    

                <?php        
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