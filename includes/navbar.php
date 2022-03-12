<?php include "db.php" ?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Magical Spells</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                <?php 
                
                    $query="SELECT * FROM categories";
                    $all_categories=mysqli_query($connection,$query);
                    
                    while($row=mysqli_fetch_assoc($all_categories))
                    {
                        $the_cat_id=$row['cat_id'];
                        $cat_title=$row['cat_title'];
                        ?>
                         <li> <a href='category_post.php?c_id=<?php echo $the_cat_id?>'><?php echo $cat_title ?></a> </li>
                        <?php
                        
                    }
              
                ?>    
         <li>
<?php
if($_SESSION['user_role']==='Admin')
{
    ?>

<a href="admin/index.php">Admin</a>
<?php 
}
?>
</li>
                   
<li>                   
<?php 
if(isset($_GET['p_id']) && $_SESSION['user_role']==='Admin')
{
?>
<a href="admin/posts.php?source=edit_post&p_id=<?php echo $_GET['p_id'];?>">Edit Post</a>

<?php
}
?>
 </li>
<li class="dropdown">






<?php 
if($_SESSION['username']===null)
{
    ?>
    <a href="/cms/registration.php" >Register Now</a>
<?php
}
else
{
?>

<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo ' Welcome ' . ucfirst($_SESSION['firstname']) . ' ' . ucfirst($_SESSION['lastname']) . '!'; ?><b class="caret"></b></a>
<?php
}
?>





?>
<ul class="dropdown-menu">

<a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>

</li>

</ul>

</li>
                    <!-- <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
