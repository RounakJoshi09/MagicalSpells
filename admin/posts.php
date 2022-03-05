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
                   include "includes/view_all_posts.php";
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
    
        deletePost();

?>
    
  
     
        
        <!-- /#page-wrapper -->
        
    <?php include "includes/admin_footer.php" ?>
