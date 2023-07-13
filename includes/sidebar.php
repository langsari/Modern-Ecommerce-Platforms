 <?php
    
  
        if(ifItmMethod('post')){


        // if correct send to admin.php
            if(isset($_POST['username']) && isset($_POST['password'])){

                login_user($_POST['username'], $_POST['password']);
            } 
            
            else{
                Redirect('index.php');
            }
            }
 ?>
 
 <!-- Blog Sidebar Widgets Column -->
            <div class="col-md-4">


            <?php
            
            
            // if(isset($_POST['submit'])){

            //     echo  $search =  $_POST['search'];
              
            //     $query ="SELECT * FROM posts WHERE post_tags LIKE '%$search%'";
            //     $search_query = mysqli_query($connection, $query);
              
            //           }
                      
            //     if(!$search_query ){
            //         die("QUERY FAILED".mysqli_error($connection));
            //      }
              
              
            //                // to count how many rows in website
            //                    $count = mysqli_num_rows($search_query);
            //                      if($count == 0) {
            //                       echo "<h1>  NO RESULT </h1>";
                          
            //      }else{
            
            // echo "FOUND THE RESULT";
            //      }
            
            
            
            
            ?>

        <!-- blog search well -->

<!-- to show the things that in navbar to sidebar too -->
       <?php
            $query = "SELECT * FROM categories ";
            $select_categories_sidebar= mysqli_query($connection ,$query );
        
        ?>


            <div class="well">
                    <h4>Blog Search</h4>
                    <div class="input-group">
                        <form action="search.php" method="post">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                    </form> <!-- serach form-->
                    <!-- /.input-group -->
                </div>



                <!-- login -->

                <!-- if user_role is logged in will show his name with a message in the index -->
                <!-- and to be able to logout from outside too -->
                <div class="well">
                <?php if(isset($_SESSION['user_role'])): ?>
                    
                    <h4>Logged in as <?php echo $_SESSION['username'] ?></h4>

                    <a href="includes/logout.php" class="btn btn-primary">LogOut</a>
                    <?php else: ?>


                        <h4>Login</h4>
                        <form  method="post">
                    <div class="form-group">   
                        <input name="username" type="text" class="form-control" placeholder="Enter Username">
                    </div>




                    <div class="input-group">   
                        <input name="password" type="password" class="form-control" placeholder="Enter password">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" name="login" type="submit">Submit</button>

                        </span>
                    </div>

                    <!-- to prevent hackers to come to forget.php page -->
                    <!-- uniqid for random links -->

                    <div class="form-group">

                        <a href="forget.php?forgot=<?php echo uniqid(true); ?>">Forget Password</a>
                    </div>

                    </form> <!-- serach form-->

                    <?php endif;?>

                    

                    
                  
                      
                    <!-- /.input-group -->
                </div>







                <!-- Blog Categories Well -->
                <div class="well">
                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">



<!-- to show the things that in navbar to sidebar too -->
                            <?php
                            
                  while($row = mysqli_fetch_assoc($select_categories_sidebar)){ // to bring back those values
                     $cat_title = $row['cat_title'];
                     $cat_id = $row['cat_id'];
                     echo"<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>";
                                     
                                     
                             } 

                            ?>

                             
                            </ul>
                        </div>


                   
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
               <?php
               
               include"widget.php";
               
               ?>

            </div>
