
<table class="table table-bordered table-hover">
      <thead>
          <tr>
              <th>Id</th>
              <th>Username</th>
              <th>Firstname</th>
              <th>Lastname</th>
              <th>Email</th>
              <th>Date</th>
              <th>Image</th>
              <th>Role</th>
          </tr>
      </thead>
      <tbody>

      <?php 


  $query = "SELECT * FROM users";
  $select_users = mysqli_query($connection,$query);  

  while($row = mysqli_fetch_assoc($select_users)) {
  $user_id = $row['user_id'];
  $username = $row['username'];
  $user_firstname = $row['user_firstname'];
  $user_lastname=$row['user_lastname'];
  $user_email= $row['user_email'];
  $user_role = $row['user_role'];
  $user_registration_date=$row['user_registration_date'];
  $user_image=$row['user_image'];


  echo "<tr>";
      
  echo "<td>{$user_id}</td>";
  echo "<td>{$username}</td>";
  echo "<td>{$user_firstname}</td>";
  echo "<td>{$user_lastname}</td>";
  echo "<td>{$user_email}</td>";
  echo "<td>{$user_registration_date}</td>";
  echo "<td><img width='100' src='../user_images/{$user_image}' alt=image></img></td>";
  echo "<td>{$user_role}</td>";
//   // Querry to display post from comment_post_id
//   $query="SELECT * FROM posts WHERE post_id=$comment_post_id";
//   $comment_query=mysqli_query($connection,$query);
//   while($row=mysqli_fetch_assoc($comment_query))
//   {
//             $post_id=$row['post_id'];
//             $post_title=$row['post_title'];
//   }
//   echo "<td><a href='/cms/post.php?p_id={$post_id}'>{$post_title}</a></td>";
 
//   $query="SELECT * FROM categories WHERE cat_id={$post_category_id}";
//   $query_categories=mysqli_query($connection,$query);
//   checkQuery($query);
//    while($row=mysqli_fetch_assoc($query_categories))
//    {
//        $post_category=$row['cat_title'];
//         echo "<td>{$post_category}</td>"; 
//    } 
 
  echo "<td><a href='users.php?admin={$user_id}'>Admin</a></td>";
   echo "<td><a href='users.php?subscriber={$user_id}'>Subscriber</a></td>";
  ?>
    <td><a href="/cms/admin/users.php?delete_user=<?php echo $user_id ?>">Delete</a></td>
    <td><a href="/cms/admin/users.php?source=edit_user&edit_user_id=<?php echo $user_id ?>">Edit</a></td>
  <?php
  echo "</tr>";

  }

?>
      </tbody>
  </table>

