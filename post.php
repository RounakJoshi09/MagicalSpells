<?php include "includes/header.php"?>
    <!-- Navigation -->
    <?php include "includes/navbar.php"?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
                
            <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

            <?php  

                if(isset($_GET['p_id']))
                {
                    $post_id=$_GET['p_id'];
                }
                $query= "SELECT * FROM posts WHERE post_id={$post_id}";
                $all_posts=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($all_posts))
                {
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_content=$row['post_content'];
                    $post_image=$row['post_image'];
                                                                          ?>
                                                                          
                                                                          


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
                ?>



                        <!-- Blog Comments -->
                 <?php 
                 if(isset($_POST['create_comment']))
                 {
                       $the_post_comment_id=$_GET['p_id'];
                       $comment_author=$_POST['comment_author'];
                       $comment_email=$_POST['comment_email'];
                       $comment_content=$_POST['comment_content'];
                       $query="INSERT INTO comments(comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";
                       $query.="VALUES ($the_post_comment_id,'{$comment_author}','{$comment_email}','{$comment_content}','Unapprove',now())";
                        $create_comment_query=mysqli_query($connection,$query);
                      
                        if(!$create_comment_query)
                        {
                            echo die("BAD".mysqli_error($connection));
                        }


                       
                 }
                 ?>       




                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form method="post" action="" role="form">
                        <div class="form-group">
                            <label for="comment_author" class="label label-success">Comment Author</label>
                            <input type="text" class="form-control" name="comment_author"></input>
                        </div>
                        <div class="form-group">
                        <label for="comment_email" class="label label-success">Comment Email</label>
                            <input type="text" class="form-control" name="comment_email"></input>
                        </div>
                        <div class="form-group">
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                 <?php
                        if(isset($_GET['p_id']))
                        {
                            $comment_post_id=$_GET['p_id'];
                        }
                 
                        $query="SELECT * FROM comments WHERE comment_post_id=$comment_post_id && comment_status='Approved' ORDER BY comment_id DESC";
                        $all_comments=mysqli_query($connection,$query);
                        while($row=mysqli_fetch_assoc($all_comments))
                        {
                            $comment_author=$row['comment_author'];
                            $comment_date=$row['comment_date'];
                            $comment_content=$row['comment_content'];
                            ?>
                            <div class="media">
                            <a class="pull-left" href="#">
                            <img src="C:\Users\ronak\OneDrive\Pictures\download.png" style="width: 64px; height: 64px">
                            </a>
                            <div class="media-body">
                            <h4 class="media-heading"> <?php echo $comment_author?>
                            <small><?php echo $comment_date?></small>
                            </h4>
                            <?php echo $comment_content?>
                            </div>
                            </div>
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