
<table class="table table-bordered table-hover">
      <thead>
          <tr>
              <th>Id</th>
              <th>Author</th>
              <th>Comment</th>
              <th>Email</th>
              <th>Status</th>
              <th>In Response to</th>
              <th>Date</th>
              <th>Approve</th>
              <th>Unapprove</th>
              <th>Delete</th>
          </tr>
      </thead>
      <tbody>

      <?php 


  $query = "SELECT * FROM comments";
  $select_comments = mysqli_query($connection,$query);  

  while($row = mysqli_fetch_assoc($select_comments)) {
  $comment_id = $row['comment_id'];
  $comment_author = $row['comment_author'];
  $comment_content = $row['comment_content'];
  $comment_post_id=$row['comment_post_id'];
  $comment_email = $row['comment_email'];
  $comment_status = $row['comment_status'];
  $comment_date = $row['comment_date'];
 


  echo "<tr>";
      
  echo "<td>{$comment_id}</td>";
  echo "<td>{$comment_author}</td>";
  echo "<td>{$comment_content}</td>";
  echo "<td>{$comment_email}</td>";
  echo "<td>{$comment_status}</td>";
  // Querry to display post from comment_post_id
  $query="SELECT * FROM posts WHERE post_id=$comment_post_id";
  $comment_query=mysqli_query($connection,$query);
  
  while($row=mysqli_fetch_assoc($comment_query))
  {
            $post_id=$row['post_id'];
            $post_title=$row['post_title'];
    echo "<td><a href='/cms/post.php?p_id={$post_id}'>{$post_title}</a></td>";
 
        }
  
//   $query="SELECT * FROM categories WHERE cat_id={$post_category_id}";
//   $query_categories=mysqli_query($connection,$query);
//   checkQuery($query);
//    while($row=mysqli_fetch_assoc($query_categories))
//    {
//        $post_category=$row['cat_title'];
//         echo "<td>{$post_category}</td>"; 
//    } 
  echo "<td>{$comment_date}</td>";
  echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Approve?'); \" href='comments.php?approve={$comment_id}'>Approve</a></td>";
  echo "<td><a onClick=\"javascript: return confirm('Are you sure you want to Unapprove?'); \" href='comments.php?unapprove={$comment_id}'>Unapprove</a></td>";
  ?>
    <td><a href="/cms/admin/comments.php?delete_comment=<?php echo $comment_id ?>">Delete</a></td>
  <?php
  echo "</tr>";

  }

?>
      </tbody>
  </table>

