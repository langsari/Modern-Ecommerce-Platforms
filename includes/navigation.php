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
                <a class="navbar-brand" href="/cms">CMS front</a>
            </div>



            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">


<!-- to replace the default navigationbar -->
                <?php

            $query = "SELECT * FROM categories LIMIT 3 ";
            $select_all_categories_query = mysqli_query($connection,$query );

            while($row = mysqli_fetch_assoc($select_all_categories_query)){ // to bring back those values
            $cat_title = $row['cat_title'];
            $cat_id = $row['cat_id'];

            $category_class = '';
            $registration_class = '';
           $page_name = basename($_SERVER['PHP_SELF']);

           $registration = 'registration.php';

           if(isset($_GET['catgory']) && $_GET['catgory'] == $cat_id ){
            $category_class ='active';

           } elseif ($page_name ==$registration ){
            $registration_class = 'active';

           }
            echo"<li class='category_class'><a href='/cms/category/{$cat_id}'>{$cat_title}</a></li>";

            }

        ?>

                <!-- short code  -->
               
                    <!-- if the user logged in no need to see login link in the nave and an logout too-->
                    <!-- <li>
                        <a href="/cms/admin">Admin</a>
                    </li> -->


                    <li>
                        <a href="admin">Admin</a>
                    </li>



                    <li>
                        <a href="contact.php">Contact</a>
                    </li>


                    <!-- <li>
                        <a href="/cms/includes/logout.php">Admin</a>
                    </li> -->

                    <!-- if did not loggged in can see login link -->
                   
                    <!-- <li>
                        <a href="/cms/login.php">Login </a>
                    </li> -->



                     <li class='<?php echo $registration_class; ?>'>

                            <a href="registration.php">Registration</a>
                        </li>
              

               

                    


                    <!-- to show a link in the nav bar and allow me to edit posts directly
                      if i still login                  
                -->
                    <?php
            //         if(isset($_SESSION['user_role'])) {

            //             if(isset($_GET['p_id'])){

            //                 $the_post_id = $_GET['p_id'];

            // //    echo "<li><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit post</a></li>";

            //    echo "<li><a href='admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit post</a></li>";

                            
            //             }
            //         }
                    
                    
                    



            // <!-- to show a link in the nav bar and allow me to edit posts directly
            //           if i still login                  
            //     -->
            // Start the session
            session_start();
            
            // Check if the user role is set in the session
            if(isset($_SESSION['user_role'])) {
            
                // Check if the post ID is set in the GET parameters
                if(isset($_GET['p_id'])){
            
                    // Get the post ID from the GET parameters
                    $the_post_id = $_GET['p_id'];
            
                    // Generate a link to edit the post with the given ID
                    echo "<li><a href='/cms/admin/posts.php?source=edit_post&p_id={$the_post_id}'>Edit post</a></li>";
            
                }
            }
            ?>
            






                    

                    
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>