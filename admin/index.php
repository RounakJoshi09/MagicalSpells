<?php include "includes/admin_header.php" ?>
<?php 
if(!isset($_SESSION['user_role']) || $_SESSION['user_role']!="Admin")
{
    header("Location:../index.php");
        
}

?>

    <div id="wrapper">

        <!-- Navigation -->
       <?php include "includes/admin_navigation.php"?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            WELCOME TO ADMIN
                            <small> <?php echo $_SESSION['username']?></small>
                        </h1>
                        
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>




        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ?>
  