<?php include "includes/admin_header.php" ?>
    
    <div id="wrapper">
        <!-- Navigation -->
 
        <?php include "includes/admin_navigation.php" ?>


    <!-- DELETE QUERY -->
    
        
<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">


            <h1 class="page-header">
                Welcome to admin
                <small>Author</small>
            </h1>

            <div class="col-xs-6">
            <?php             
               if(isset($_GET['source']))
               {
                    $source=$_GET['source'];
               }   
               else
               {
                   $source="";
               }  
               switch($source)
               {
                   case 'add_post';
                   include "includes/add_post.php";
                   break;
                   case 'edit_post';
                   include "includes/edit_post.php";
                   break;
                   case 120;
                   echo "NICE 120";
                   break;
                   default:
                   include "includes/view_all_comments.php";
                   break;
               }
                ?>        
                </div>        


            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>


<?php 
    
       if(isset($_GET['delete_comment']))
       {
           $comment_id=$_GET['delete_comment'];
           $query="DELETE FROM comments WHERE comment_id={$comment_id}";
           $delete_query=mysqli_query($connection,$query);
           header("Location:comments.php");
           checkQuery($delete_query);
       }
       if(isset($_GET['approve']))
       {
           $comment_id=$_GET['approve'];
           $query="UPDATE comments SET comment_status='Approved' WHERE comment_id={$comment_id}";
           $approve_query=mysqli_query($connection,$query);
           header("Location:comments.php");
           checkQuery($approve_query);
       }
       if(isset($_GET['unapprove']))
       {
           $comment_id=$_GET['unapprove'];
           $query="UPDATE comments SET comment_status='Unapproved' WHERE comment_id={$comment_id}";
           $unapprove_query=mysqli_query($connection,$query);
           header("Location:comments.php");
           checkQuery($unapprove_query);
       }

    ?>
    
  
     
        
        <!-- /#page-wrapper -->
        
    <?php include "includes/admin_footer.php" ?>
