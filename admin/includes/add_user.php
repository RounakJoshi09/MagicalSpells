<?php
        if(isset($_POST['add_user']))
        {
            $user_firstname=$_POST['user_firstname'];
            $user_lastname=$_POST['user_lastname'];
            $user_role=$_POST['user_role'];
            $user_email=$_POST['user_email'];
            $username=$_POST['username'];
            $user_password=$_POST['user_password'];
            $user_image=$_FILES['user_image']['name'];
            $user_image_temp=$_FILES['user_image']['tmp_name'];

           // $post_comment_count=4;

              
            move_uploaded_file($user_image_temp,"../images/$user_image");

            $query="INSERT INTO users(username,user_password,user_firstname,user_lastname,user_email,user_registration_date,user_role,user_image) ";
            $query.="VALUES ('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}',now(),'{$user_role}','{$user_image}')";    
            
            $add_user_query=mysqli_query($connection,$query);

            checkQuery($connection);
            echo "<h2 class='display-2'> User Created</h2> : " . " " . "<a href='users.php' class='link-primary'>View User</a> "; 
        
        }   

?>
<form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="user_firstname">First Name</label>
         <input type="text" class="form-control" name="user_firstname">
     </div>
    
      <div class="form-group">
         <label for="user_lastname">Last Name</label>
          <input type="text" class="form-control" name="user_lastname">
      </div>
     
       <div class="form-group">
       <label for="user_role">Role</label>
       <br>
         <select name="user_role" id="">
             <option value="Admin">Admin</option>
             <option value="Subscriber">Subscriber</option>
         </select>
      </div>
      <div class="form-group">
         <label for="user_email">Email</label>
          <input type="text" class="form-control" name="user_email">
      </div> 
      
      
    <div class="form-group">
         <label for="user_image">Profile Image</label>
          <input type="file"  name="user_image">
      </div>

      <div class="form-group">
         <label for="username">Username</label>
          <input type="text" class="form-control" name="username">
      </div>
      <div class="form-group">
         <label for="user_password">Password</label>
          <input type="password" class="form-control" name="user_password">
      </div>

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="add_user" value="Add User">
      </div>


</form>
    