<?php 
       
        if(isset($_GET['edit_user_id']))
        {
            $the_user_id=$_GET['edit_user_id'];

            $query="SELECT * FROM users WHERE user_id={$the_user_id}";
            $select_query_to_edit=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($select_query_to_edit))
            {
                $username = $row['username'];
                $user_firstname = $row['user_firstname'];
                $user_lastname=$row['user_lastname'];
                $user_password=$row['user_password'];
                $user_email= $row['user_email'];
               
                $user_image = $row['user_image'];

                                                                        }
        


                if(isset($_POST['edit_user']))
                {
                $user_firstname=$_POST['user_firstname'];
                $user_lastname=$_POST['user_lastname'];
               
                $user_email=$_POST['user_email'];
                $username=$_POST['username'];
                $user_password=$_POST['user_password'];
                //To encrypt Password
                if(!empty($user_password))
                {
                    $query_password="SELECT user_password FROM users WHERE user_id=$the_user_id";
                    $get_user_query=mysqli_query($connection,$query_password);
                    confirmQuery($get_user_query);
                    $row=mysqli_fetch_array($get_user_query);
                    $db_user_password=$row['user_password']; 
                    if($db_user_password != $user_password) {

                        $user_password = password_hash($user_password, PASSWORD_BCRYPT, array('cost' => 12));
            
                      }  
                    $query_change_password="UPDATE users SET user_password='$user_password' WHERE user_id={$the_user_id}";
                    $query_change=mysqli_query($connection,$query_change_password);        
                }
                
                //Image
                $user_image=$_FILES['user_image']['name'];
                $user_image_temp=$_FILES['user_image']['tmp_name'];

                // $post_comment_count=4;
                //Resetting sessions
                $_SESSION['username']=$username;
                $_SESSION['firstname']=$user_firstname;
                $_SESSION['lastname']=$user_lastname;
                $_SESSION['user_image']=$user_image;
                $_SESSION['email']=$user_email;
         

                $query="UPDATE users SET user_firstname='{$user_firstname}',user_lastname='{$user_lastname}',user_email='{$user_email}',username='{$username}'";
                if($_FILES['user_image']['size']!=0)
                {
                    move_uploaded_file($user_image_temp,"../images/$user_image");
                    $query.=",user_image='{$user_image}'";
                }
                $query.=" WHERE user_id={$the_user_id}";
                $edit_user_query=mysqli_query($connection,$query);

                checkQuery($connection);

                }   
   
?>




<form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="user_firstname">First Name</label>
         <input type="text" class="form-control" name="user_firstname" value="<?php echo $user_firstname?>">
     </div>
    
      <div class="form-group">
         <label for="user_lastname">Last Name</label>
          <input type="text" class="form-control" name="user_lastname" value="<?php echo $user_lastname?>">
      </div>
      <div class="form-group">
         <label for="user_email">Email</label>
          <input type="text" class="form-control" name="user_email" value="<?php echo $user_email?>">
      </div> 
      <div class="form-group">
         <img width=100 src="../images/<?php echo $user_image ?>" alt="" sizes="" srcset="">
      </div>
      <div class="form-group">
         <label for="user_image">Profile Image</label>
          <input type="file"  name="user_image">
      </div>

      <div class="form-group">
         <label for="username">Username</label>
          <input type="text" class="form-control" name="username" value="<?php echo $username?>">
      </div>
      <div class="form-group">
         <label for="user_password">Password</label>
          <input autocomplete="off" type="password" class="form-control" name="user_password">
      </div>

       <div class="form-group">
           
           <a href="../admin/includes/view_all_users.php"><input class="btn btn-primary" type="submit" name="edit_user" value="Edit User"></a>
      </div>
      


</form>
    

<?php
        
        } 
       
 ?> 