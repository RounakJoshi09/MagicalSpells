<?php include "includes/header.php"?>
    <!-- Navigation -->
    <?php include "includes/navbar.php"?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">
            <h1 class="page-header">

                     <table>
    <tr>
         <td>
         <img src="images/logo.png" alt="logo"  style="height: 100px; border-radius:50px;">
         <td>      
     <h1 style=" font-family:cursive; font-weight:1000; font-size:50px; color : white; text-shadow:2px 2px 8px #337ab7;"> Magical Spells</h1></td>
         </td>
    </tr>
    <!-- 2px 2px 8px DodgerBlue; -->
</table>     
                </h1>
               

            <?php  
                //For Pagination
                $query_count_post="SELECT * FROM posts";
                $query_count=mysqli_query($connection,$query_count_post);
                $count=mysqli_num_rows($query_count);

                $count=($count);

                $no_of_pages=ceil($count/5);
                
                if(isset($_GET['page']))
                {
                    $page_no=$_GET['page'];
                }    
                else
                {
                    $page_no="";
                }
                 if($page_no=="" || $page_no==1)
                 {
                     $page=0;
                 }
                 else
                 {
                     $page=($page_no*5)-5;
                 }   

                 //pagination_done   
                $query= "SELECT * FROM posts LIMIT $page,5";
                $all_posts=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($all_posts))
                {
                    $post_id=$row['post_id'];
                    $post_title=$row['post_title'];
                    $post_author=$row['post_author'];
                    $post_date=$row['post_date'];
                    $post_status=$row['post_status'];
                    $post_content=substr($row['post_content'],0,70);
                    $post_content.="...";
                    $post_image=$row['post_image'];

                    if($post_status=="published")
                    {
                                                                          ?>
                                                                          
                                                                          


                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id ?>" ><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_post.php?author=<?php echo $post_author ?>"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id ?>">
                <img class="img-responsive" src="images/<?php echo "$post_image" ?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>    

                <?php        
                } }
                ?>
                
            <ul class="pager">

             <?php 
             
             for($i=1;$i<=$no_of_pages;$i++)
             {
                 if($page_no==$i)
                 {
                    echo "<li><a class='active_link' href='index1.php?page={$i}'>$i</a></li>";  
               
                 }
                 else
{                  echo "<li><a href='index1.php?page={$i}'>$i</a></li>";  
 
                }
}
             
             
             ?>       



            </ul>        
                
            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php include "includes/sidebar.php"?>

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
<?php include "includes/footer.php"?>