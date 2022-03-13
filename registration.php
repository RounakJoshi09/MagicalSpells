 <?php  include "includes/header.php"; ?>



    <!-- Navigation -->
    
    <?php  include "includes/navbar.php"; ?>

   <?php 
   
   if(isset($_POST['submit']))
   {
       
       $user_firstname=$_POST['user_firstname'];
       $user_lastname=$_POST['user_lastname'];
      
       $username=$_POST['username'];
       $password=$_POST['password'];
       $email=$_POST['email'];
         //this is used to take files from input
         $user_image=$_FILES['image']['name'];
         //This is used to move it to temp location in server
         $user_image_temp=$_FILES['image']['tmp_name'];

  
        if(!empty($username) && !empty($password) && !empty($email))
        {
    
         $username=mysqli_real_escape_string($connection,$username);
         $password=mysqli_real_escape_string($connection,$password);
         $email=mysqli_real_escape_string($connection,$email);
         
        $password=password_hash($password,PASSWORD_BCRYPT,array('cost'=>12));
        
         //For moving uploaded image       
         move_uploaded_file($user_image_temp,"user_images/$user_image");  

         $query_user="INSERT INTO users(user_firstname,user_lastname,username,user_email,user_password,user_role,user_image,user_registration_date) VALUES ('{$user_firstname}','{$user_lastname}','{$username}','{$email}','{$password}','Subscriber','{$user_image}',now())";
         $user_add_query=mysqli_query($connection,$query_user);
         if(!$user_add_query)
         {
             echo "Query Failed" . mysqli_error($connection);
         }           
         $message="Thankyou For Registering";
    }
    else
    {
        $message="Please Fill the Below Field";
    }
}
else
{
    $message="";
}


?>
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off" enctype="multipart/form-data">
                    <h4 class="text-align center"><?php echo $message; ?></h4>
                    <div class="form-group">
                    <label for="user_firstname">First Name</label>
                    <input type="text" class="form-control" name="user_firstname">
                    </div>

                    <div class="form-group">
                    <label for="user_lastname">Last Name</label>
                    <input type="text" class="form-control" name="user_lastname">
                    </div>
                    <div class="form-group">
                            <label for="username" class="sr-only">Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                        <label for="user_image">User Image</label>
                        <input type="file"  name="image">
                        </div>
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
