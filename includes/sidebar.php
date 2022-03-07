<div class="col-md-4">

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        
                        <input type="text" class="form-control" name="search">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="submit" name="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                        
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                <!-- Login Form -->
                <div class="well">
                    <h4>Login Form</h4>
                    <form action="includes/login.php" method="post">
                    <div class="form-group">
                        
                        <input type="text" class="form-control" name="username" placeholder="Enter Username">
                        
                    </div>
                    <div class="input-group">
                        
                        <input type="password" class="form-control" name="password" placeholder="Enter Password">
                        <span class="input-group-btn">
                        <button class="btn btn-primary" name="login" type="submit">Submit</button>
                        </span>
                    </div>
                    </form>
                    <!-- /.input-group -->
                </div>
                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-6">
                        <?php 
                
                            $query="SELECT * FROM categories";
                            $all_categories_sidebar=mysqli_query($connection,$query);
                
                            while($row=mysqli_fetch_assoc($all_categories_sidebar))
                            {
                                $cat_title=$row['cat_title'];
                                $the_cat_id=$row['cat_id'];
                                ?>
                                <li> <a href='category_post.php?c_id=<?php echo $the_cat_id?>'><?php echo $cat_title ?></a> </li>
                                <?php
                            }
                        ?>    
                        </div>
                        <!-- /.col-lg-6 -->
                        <div class="col-lg-12">
                        </div>
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div>

            </div>