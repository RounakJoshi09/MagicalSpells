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
                   case 'add_user';
                   include "includes/add_user.php";
                   break;
                   case 'edit_user';
                   include "includes/edit_user.php";
                   break;
                   case 120;
                   echo "NICE 120";
                   break;
                   default:
                   include "includes/view_all_users.php";
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
    
       if(isset($_GET['delete_user']))
       {
           $user_id=$_GET['delete_user'];
           $query="DELETE FROM users WHERE user_id={$user_id}";
           $delete_user_query=mysqli_query($connection,$query);
           header("Location:users.php");
           checkQuery($delete_user_query);
       }
       if(isset($_GET['admin']))
       {
           $user_id=$_GET['admin'];
           $query="UPDATE users SET user_role='Admin' WHERE user_id={$user_id}";
           $admin_query=mysqli_query($connection,$query);
           header("Location:users.php");
           checkQuery($admin_query);
       }
       if(isset($_GET['subscriber']))
       {
           $user_id=$_GET['subscriber'];
           $query="UPDATE users SET user_role='Subscriber' WHERE user_id={$user_id}";
           $subscriber_query=mysqli_query($connection,$query);
           header("Location:users.php");
           checkQuery($subscriber_query);
       }

    ?>
    
  
     
        
        <!-- /#page-wrapper -->
        
    <?php include "includes/admin_footer.php" ?>
