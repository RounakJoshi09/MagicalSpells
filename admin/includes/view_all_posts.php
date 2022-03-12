<?php 

if(isset($_POST['select_submit']) && isset($_POST['checkBoxArray']))
{
    if($_POST['select_option']=='select_publish')
    {
            foreach($_POST['checkBoxArray'] as $checkBoxValue)
            {
                $query_to_publish="UPDATE posts SET post_status='published' WHERE post_id={$checkBoxValue}";
                $publish_query=mysqli_query($connection,$query_to_publish);
            }
    }
    else if($_POST['select_option']=='select_draft')
    {
            foreach($_POST['checkBoxArray'] as $checkBoxValue)
            {
                $query_to_publish="UPDATE posts SET post_status='draft' WHERE post_id={$checkBoxValue}";
                $publish_query=mysqli_query($connection,$query_to_publish);
            }
    }
    else if($_POST['select_option']=='select_delete')
    {
            foreach($_POST['checkBoxArray'] as $checkBoxValue)
            {
                $query_to_publish="DELETE FROM posts WHERE post_id={$checkBoxValue}";
                $publish_query=mysqli_query($connection,$query_to_publish);
            }
    }
}


?>


<form action="" method="post">
<div style="width: 200%;">
<div style="width: 100%; "> 
<div class="row" id="bulkOptionContainer" style="padding: 0px;">
          <div class="col-sm-4">
           <select class="form-control" name="option" id="" style="padding: 0px;">
               <option value="">Show Only</option>
               <option value="publish">Published</option>
               <option value="draft">Draft</option>
               <option value="all_post">All Post</option>
               <!-- <option value="">Delete</option> -->
           </select>
           </div>         
 <div class="form-group col-xs-4">
           <input type="submit" class="btn btn-success" name="submit" value="Apply">
       </div>
        </div>
</div>
<!-- Select Post to Publish and Delete           -->
<div style="width: 100%; "> 
        <h4 class="bg-success">Publish ,Draft and Delete Post</h4>
        <div class="row" id="bulkOptionContainer" style="padding: 0px;">
          <div class="col-sm-4">
           <select class="form-control" name="select_option" style="padding: 0px;" id="">
           <option value="">Select Option</option>
               <option value="select_publish">Published</option>
               <option value="select_draft">Draft</option>
               <option value="select_delete">Delete</option>
           </select>
           </div>       
       <div class="form-group col-xs-4">
           <input type="submit" class="btn btn-success" name="select_submit" value="Apply">
       </div>
        </div>
        </div>
        <a class="btn btn-primary" href="posts.php?source=add_post">Add New Post</a>
        </div>
<table class="table table-bordered table-hover">
      <thead>
          <tr>
              <th><input type="checkbox" name="" id="selectAllBoxes"></th>
              <th>Id</th>
              <th>Author</th>
              <th>Title</th>
              <th>Category</th>
              <th>Status</th>
              <th>Images</th>
              <th>Tags</th>
              <th>Comments</th>
              <th>Date</th>
              <th>Edit</th>
              <th>Delete</th>
              <th>View</th>
          </tr>
      </thead>
      <tbody>

      <?php 
    $query;
    if(isset($_POST['submit']) )
    {
        if($_POST['option']=='publish')
        {
            $query="SELECT * FROM posts where post_status='published' ";
        }
        else if($_POST['option']=='draft')
        {
            $query="SELECT * FROM posts where post_status='draft' ";
        }
        else if($_POST['option']=='all_post')
        {
            $query = "SELECT * FROM posts";    
        }
    }
    else
  $query = "SELECT * FROM posts";
  $select_posts = mysqli_query($connection,$query);  

  while($row = mysqli_fetch_assoc($select_posts)) {
  $post_id = $row['post_id'];
  $post_author = $row['post_author'];
  $post_title = $row['post_title'];


  $post_category_id=$row['post_category_id'];
//   $query_for_category_name="SELECT * FROM categories WHERE cat_id=$post_category_id";
//   $post_category_query=mysqli_query($connection,$query_for_category_name);
//   $row2=mysqli_fetch_assoc($post_category_query);
 // $post_category=$row2['cat_title']; 
  $post_status = $row['post_status'];
  $post_image = $row['post_image'];
  $post_tags = $row['post_tags'];
  $post_comments=$row['post_comment_count'];
  $post_date = $row['post_date'];


  echo "<tr>";
      ?>

        <td>
        <input type="checkbox" class="checkBoxes" name="checkBoxArray[]" id="" value="<?php echo $post_id?>">
        </td>
      <?php
  echo "<td>{$post_id}</td>";
  echo "<td>{$post_author}</td>";
  echo "<td>{$post_title}</td>";
  $query="SELECT * FROM categories WHERE cat_id={$post_category_id}";
  $query_categories=mysqli_query($connection,$query);
  checkQuery($query);
   while($row=mysqli_fetch_assoc($query_categories))
   {
       $post_category=$row['cat_title'];
        echo "<td>{$post_category}</td>"; 
   } 
  
  echo "<td>{$post_status}</td>";
  echo "<td><img width='100' src='../images/{$post_image}' alt=image></img></td>";
  echo "<td>{$post_tags}</td>";
  echo "<td>{$post_comments}</td>";
  echo "<td>{$post_date}</td>";
  echo "<td><a href='posts.php?source=edit_post&p_id={$post_id}'>Edit</a></td>";
  echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to delete?'); \"href='posts.php?delete={$post_id}'>Delete</a></td>";
  echo "<td><a href='../post.php?p_id={$post_id}'>View</a></td>";
  echo "</tr>";

  }

?>
      </tbody>
  </table>
  </form>
