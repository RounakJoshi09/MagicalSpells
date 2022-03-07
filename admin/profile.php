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
        <link rel="stylesheet" href="includes/profile_styles.css">
<div class="container mt-4 mb-4 p-3 d-flex justify-content-center">
    <div class="card p-4">
        <div class=" image d-flex flex-column justify-content-center align-items-center"> <button class="btn btn-secondary"> <img src="../images/<?php echo $_SESSION['user_image']; ?>" height="100" width="100" /></button> <span class="name mt-3"><span><?php echo $_SESSION['firstname']." ".$_SESSION['lastname']; ?></span> <span class="idd">@<span><?php echo $_SESSION['username']; ?></span>
            <!-- <div class="d-flex flex-row justify-content-center align-items-center gap-2"> <span class="idd1">Oxc4c16a645_b21a</span> <span><i class="fa fa-copy"></i></span> </div>
            <div class="d-flex flex-row justify-content-center align-items-center mt-3"> <span class="number">1069 <span class="follow">Followers</span></span> </div> -->
            <div class=" d-flex mt-2"> <button  onclick="location.href='users.php?source=edit_user&edit_user_id=<?php echo $_SESSION['id']; ?>';" class="btn1 btn-dark">Edit Profile</button> </div>
            <div class="text mt-3">  </span> </div>
            <div class="gap-3 mt-3 icons d-flex flex-row justify-content-center align-items-center">Email at :<a href="mailto:'<?php echo $_SESSION['email']; ?>'"> <?php echo $_SESSION['email']; ?> </a></div>
            <div class=" px-2 rounded mt-4 date "> <span class="join"><?php echo "Join at ".$_SESSION['date']; ?></span> </div>
        </div>
    </div>
</div>



        <!-- /#page-wrapper -->
<?php include "includes/admin_footer.php" ?>
  