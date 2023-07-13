// to send the query
        // $update_post = mysqli_query($connection,$query);
  

        // confirm($update_post);

// if(! $update_post){
//   die("QUERY FAILED". mysqli_error($connection));
// }
  
    <!-- <div class="form-group">
    <label for="post_comment_count">post_comment_count</label>
    <input type="text" value="<?php echo $post_comment_count; ?>" class="form-control" name="post_comment_count">
    
    </div> -->
   
  
  
   
    // echo "<td><a href='posts.php?source=edit_post&p_id{$post_id}'>Edit</a></td>";
    
    
    <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                        <!-- Nested Comment -->
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        <!-- End Nested Comment -->
                    </div>
                </div> -->
 
  
  
   
  

                //دى عشان الكتيجورى تنضاف الى البوست واقدر اغيرها عادى
    //     $query = "SELECT * FROM categories WHERE cat_id = $post_category_id " ;
    //     $select_categories_id = mysqli_query($connection,$query);


    //   while($row = mysqli_fetch_assoc($select_categories_id)) { // to bring back those values
    //    // to bring all in database
    //             $cat_id = $row['cat_id']; 
    //             $cat_title = $row['cat_title'];
    
    //     echo "<td>{$cat_title}</td>";
    // }





    // to give me a link of comment post
        // $query = "SELECT * FROM users WHERE user_id =  $comment_post_id";
        // $select_post_id = mysqli_query($connection,$query);
        // while($row = mysqli_fetch_assoc($select_post_id)){
        //     $post_id = $row['post_id'];
        //     $post_title = $row['post_title'];

        //          echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
        // }  
  
  
  
  
  
  
  <!--
charts ,table, form
     <li>
                        <a href="charts.html"><i class="fa fa-fw fa-bar-chart-o"></i> Charts</a>
                    </li>
                    <li>
                        <a href="tables.html"><i class="fa fa-fw fa-table"></i> Tables</a>
                    </li>
                    <li>
                        <a href="forms.html"><i class="fa fa-fw fa-edit"></i> Forms</a>
                    </li>
     -->





     <?php
            // need two arrays
            // to pint all of these values 
            // $element_text= ['All posts','Active posts', 'users','subscribers','Draft', 'categories','comments','pending comments'];
            // $element_count= [ $posts_count,$post_published,$post_draft,$subscriber_count, $users_count, $categories_count,$comments_count,$comments_count];
            

            // // displaying dynamic 
            // for($i =0; $i<8; $i++){


            //     echo"['{ $element_text[$i]}'" ."," ."$element_count[$i]],";
            // }
            
            ?>




 <!-- <a class="btn btn-primary" href="read.php">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->









 // $post_title = $_POST['title'];
// $post_author = $_POST['author'];
// $post_category_id = $_POST['post_catgeory'];
// $post_status = $_POST['post_status'];


// $post_image = $_FILES['image']['name'];
// $post_image_temp = $_FILES['image']['tmp_name'];


// $post_tags = $_POST['post_tags'];
// $post_content = $_POST['post_content'];
// $post_date = date('d-m-y'); // this is a function
// // $post_comment_count = 4; // to be not empty
// move_uploaded_file($post_image_temp, "../images/$post_image");




// $query = " INSERT INTO posts(post_category_id,
//                        post_title,
//                        post_author, 
//                        post_date,
//                        post_image,
//                        post_content,
//                        post_tags,
//                        post_comment_count,
//                        post_status) ";

// $query .= "VALUES( '{$post_category_id}',
//                       '{$post_title}',
//                       '{$post_author}',
//                        now(),
//                       '{$post_image}',
//                       '{$post_content}',
//                     '{$post_tags}',
//                     '{$post_status}' ) ";










// if(isset($_POST['checkBoxArray'])){
//     // 
//     // to show the post id when i apply
//     foreach($_POST['checkBoxArray'] as $postValueId ){
//         // echo $checkBoxValue;
//         // echo"<br>";
//       $bulk_options = $_POST['bulk_options'];
//       switch($bulk_options){
//         case 'published';

//         $query = "UPDATE posts SET posts_status = '{$bulk_options}' WHERE post_id = {postValueId} ";
//         $update_publish = mysqli_query($connection,$query);
//         break;
//       }
//     }
//     // echo "Receiving data";
// }







  <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->
    
    <!-- <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script> -->



    // that is all to encrypt password in DB
      //    $query = "SELECT randsalt FROM users";
      //    $select_randsalt_query = mysqli_query($connection,$query);
      //    if(!$select_randsalt_query){
      //     die("Query Failed" .mysqli_error($connection));
      
      
      //     } 
      
          // if i write echo will print all the randsalt encryption 
      // $row = mysqli_fetch_array($select_randsalt_query); 
      //          $salt  = $row['randsalt'];
      //          // to  encrypt password in the database   
      //          $password = crypt($password,$salt); 
      


      // عشان لما اعمل تسجيل خروج اقدر اسجل تانى 
        
        //     $password = "secret";
        //     $hash = "$2y$10&";
        //     $salt= "iusesomecrazystrings22";
        //     echo strlen($salt); 
  
        // crypt($password,"iusesomecrazystrings22" );



        while(mysqli_fetch_assoc($stmt1)){ // to bring back those values
        
        $post_id = $row['post_id']; // to get the id from the posts
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = substr($row['post_content'],0,100) ; // to make the content look smaller




            <!-- drop down menu for emails  -->
            
            <!-- <li class="dropdown">
                
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                    <ul class="dropdown-menu message-dropdown">
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-preview">
                            <a href="#">
                                <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                    <div class="media-body">
                                        <h5 class="media-heading">
                                            <strong>John Smith</strong>
                                        </h5>
                                        <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                        <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li class="message-footer">
                            <a href="#">Read All New Messages</a>
                        </li>
                    </ul>
                </li> -->