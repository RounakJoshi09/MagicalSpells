<?php 
       
        if(isset($_GET['p_id']))
        {
            $the_post_id=$_GET['p_id'];

            $query="SELECT * FROM posts WHERE post_id={$the_post_id}";
            $select_query_to_delete=mysqli_query($connection,$query);
            while($row=mysqli_fetch_assoc($select_query_to_delete)){
            $post_title=$row['post_title'];
            $post_author=$row['post_author'];
            $post_status=$row['post_status'];
            //this is used to take files from input
            $post_image=$row['post_image'];
            $post_tags=$row['post_tags'];
            $post_content=$row['post_content'];
            $post_date=date('d-m-y');
            $post_comment_count=4;
}
        

       
            if(isset($_POST['update_post']))
            {
           
            $post_title=$_POST['post_title'];
            $post_author=$_POST['post_author'];
            $post_category_id=$_POST['post_category'];
            $post_status=$_POST['post_status'];
           //this is used to take files from input
            $post_image=$_FILES['post_image']['name'];
           //This is used to move it to temp location in server
            $post_image_temp=$_FILES['post_image']['tmp_name'];
            $post_tags=$_POST['post_tags'];
            $post_content=$_POST['post_content'];
            $post_date=date('d-m-y');
            $post_comment_count=4;
                         
            move_uploaded_file($post_image_temp,"../images/$post_image");
            if(empty($post_image))
            {
                $query="SELECT * FROM posts WHERE post_id={$the_post_id}";
                $post_image_query=mysqli_query($connection,$query);
                while($row=mysqli_fetch_assoc($post_image_query))
                {
                    $post_image=$row['post_image'];
                }

            }
            $query="UPDATE posts SET post_title='{$post_title}', post_author='{$post_author}', post_date=now(), post_image='{$post_image}', post_content='{$post_content}', post_tags='{$post_tags}', post_status='{$post_status}' WHERE post_id={$the_post_id}";

            $update_post_query=mysqli_query($connection,$query);

            checkQuery($update_post_query);
        
        }
   
?>




<form action="" method="post" enctype="multipart/form-data">    
     
     
     <div class="form-group">
        <label for="title">Post Title</label>
         <input type="text" class="form-control" name="post_title" value="<?php echo $post_title; ?>">
     </div>
     <!-- <div class="form-group">
          
          <label for="post_category">Post Category ID</label>
          <input value="<?php echo $post_category_id; ?> " type="text" class="form-control" name="post_category_id">
          
      </div> -->

        <div class="form-group">
      <label for="category">Category</label>
      <select name="post_category" id="">  

      <?php
            $query = "SELECT * FROM categories";
            $select_categories = mysqli_query($connection,$query);  
            checkQuery($select_categories);
             while($row = mysqli_fetch_assoc($select_categories)) {
             $cat_id = $row['cat_id'];
             $cat_title = $row['cat_title']; 
            echo "<option value='{$cat_id}'>{$cat_title} </option>";
       
       
             } ?>
      </select>
      
      </div>


       <div class="form-group">
       <label for="users">Users</label>
       <select name="post_user" id="">
       </select>
      
      </div>





      <div class="form-group">
         <label for="title">Post Author</label>
          <input value="<?php echo $post_author; ?> " type="text" class="form-control" name="post_author">
      </div>
      
      

       <div class="form-group">
         <select name="post_status" id="">
             <option value="published">Published</option>
             <option value="draft">Draft</option>
         </select>
      </div>
      
      
      
    <div class="form-group">
         <img width=100 src="../images/<?php echo $post_image ?>" alt="" sizes="" srcset="">
      </div>
      <div class="form-group">
         <label for="post_image">Post Image</label>
          <input type="file"  name="post_image">
      </div>

      <div class="form-group">
         <label for="post_tags">Post Tags</label>
          <input value="<?php echo $post_tags; ?>" type="text" class="form-control" name="post_tags">
      </div>
      
      <div class="form-group">
         <label for="post_content">Post Content</label>
         <!-- <?php echo $post_content; ?> -->
         <textarea  class="form-control "name="post_content" id="" cols="30" rows="10">
         <?php echo $post_content; ?> 
        </textarea>
      </div>
      
      

       <div class="form-group">
          <input class="btn btn-primary" type="submit" name="update_post" value="Update Post">
      </div>


</form>

<?php
        } 
 ?> 