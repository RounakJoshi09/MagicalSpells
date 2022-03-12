 <?php  include "includes/header.php"; ?>



    <!-- Navigation -->
    
    <?php  include "includes/navbar.php"; ?>

   <?php 
   
   if(isset($_POST['submit']))
   {
       
       
       $username=$_POST['username'];
       $password=$_POST['password'];
       $email=$_POST['email'];
  
        if(!empty($username) && !empty($password) && !empty($email))
        {
    
         $username=mysqli_real_escape_string($connection,$username);
         $password=mysqli_real_escape_string($connection,$password);
         $email=mysqli_real_escape_string($connection,$email);

         $query="SELECT randSalt FROM users";
         $randSalt_query=mysqli_query($connection,$query);
        if(!$randSalt_query)
        {
            echo ("Query Failed" . mysqli_error($connection));
        }
         $row=mysqli_fetch_array($randSalt_query);
          $Salt=$row['randSalt'];
         $password=crypt($password,$Salt);
        
         $query_user="INSERT INTO users(username,user_email,user_password,user_role) VALUES ('{$username}','{$email}','{$password}','subscriber')";
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
                
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                    <h4 class="text-align center"><?php echo $message; ?></h4>
                    <div class="form-group">
                            <label for="username" class="sr-only">username</label>
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
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
