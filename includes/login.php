<?php include "db.php" ?>
<?php session_start(); ?>
<?php 

if(isset($_POST['login']))
{
   $username=$_POST['username'];
   $password=$_POST['password'];
//    mysqli_real_escape_string($connection,$variable) is used to protect data from the hackers .
//    Actually if the data remain in $_POST variable then 
//    ,it may be caught somewhere unknowlingly ,and probably they misuse the data.
    $username=mysqli_real_escape_string($connection,$username);
    $password=mysqli_real_escape_string($connection,$password);

    $user_query="SELECT * FROM users WHERE username='{$username}'";
    $select_user_query=mysqli_query($connection,$user_query);
    if(!$select_user_query)
    {
        echo "Query Failed".mysqli_error($connection);
    }
    while($row=mysqli_fetch_array($select_user_query))
    {
        $db_user_id=$row['user_id'];
        $db_username=$row['username'];
        $db_user_password=$row['user_password'];
        $db_user_role=$row['user_role'];
        $db_user_firstname=$row['user_firstname'];
        $db_user_lastname=$row['user_lastname'];
    }
    if($username==$db_username && $password===$db_user_password)
    {
        $_SESSION['username']=$db_username;
        $_SESSION['firstname']=$db_user_firstname;
        $_SESSION['lastname']=$db_user_lastname;
        $_SESSION['user_role']=$db_user_role;
        header("Location:../admin");
    }
    else
    {
        // echo $password;
        // echo "<br>";
        // echo $db_user_password;
        echo "Something Wrong";
        header("Location:../index.php");
    }

}





?>