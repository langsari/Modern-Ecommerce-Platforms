
<?php include"includes/db.php"; ?>
<?php include"includes/header.php";?>
    <!-- Navigation -->
    
    <?php include"includes/navigation.php";?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">







<!-- to repeat itself -->
<?php
    $comment_author = "";
    $comment_date = "";
    $comment_content = "";
    

    #maybe
        if(isset($_GET['p_id'])){
           $the_post_id = $_GET['p_id'];

            // to increment viewers  
        //    $view_counts = "UPDATE posts SET post_view_counts = post_view_counts + 1 WHERE post_id = $the_post_id LIMIT 1 ";
        //    $send_query = mysqli_query($connection , $view_counts);


        //    if(!$send_query){
        //     die("QUERY FAILED");
        //    }




/* عشان الادمن فقط هو اللى يقدر يشوف لو لسه لوج ان لو عمل لوج اوت مش هيقدر يشوف 
حتى لو حطيت اللينك بتاع البوست برضوا مش هتظهر غير لما يعمل لوج ان تانى لكن البوست لازم يكون درافت */
           if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ){
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id  LIMIT 1 ";
           } else{
            $query = "SELECT * FROM posts WHERE post_id = $the_post_id AND post_status = 'Published' LIMIT 1  ";
           }
    

        // $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";

            $select_all_posts_query = mysqli_query($connection,$query );


        if(mysqli_num_rows($select_all_posts_query)<1 ){
            echo"<h1 class='text-center'> We don not have Posts</h1>";
        } else{


       
        

        while($row = mysqli_fetch_assoc($select_all_posts_query)){ // to bring back those values
            
        $post_title = $row['post_title'];
        $post_author = $row['post_author'];
        $post_date = $row['post_date'];
        $post_image = $row['post_image'];
        $post_content = $row['post_content'];

        ?>






<!-- to repeat itself -->
<h1 class="page-header">
                    Posts
                    <!-- <small>Secondary Text</small> -->
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <!-- <a class="btn btn-primary" href="">Read More <span class="glyphicon glyphicon-chevron-right"></span></a> -->

                

   
                <hr>

<?php } 


// do not want to recieve a person who  does not have post_id



?>



    <!-- to print comment that i write on post to show in db under the post -->
            <?php
            if(isset($_POST['create_comment'])){
                echo "yes sir";
               
                $the_post_id = $_GET['p_id'];

               $comment_author = $_POST['comment_author'];
               $comment_email = $_POST['comment_email'];
               $comment_content = $_POST['comment_content'];

               if(!empty($comment_author)&& !empty($comment_email) && !empty($comment_content)){

              
               

               $query = "INSERT INTO comments (comment_post_id,
                                     comment_author,
                                     comment_email,
                                     comment_content,
                                     comment_status,
                                     comment_date)";


                $query .= "VALUES ($the_post_id, '{$comment_author}','{$comment_email}',
                '{$comment_content}', 'approved',now())";

            
         $create_comment_query = mysqli_query($connection,$query);

                                     if(!$create_comment_query){
                                        die('QUERY FAILED' . mysqli_error($connection));
                                     }

                    //auto increament for posts
                    // $query ="UPDATE posts SET post_comment_count  = post_comment_count + 1 ";                  
                    // $query .="WHERE post_id  =  $the_post_id ";   
                    // $update_comment_query =  mysqli_query($connection,$query);              

                                    
                                    
            } else{

                echo"<script>alert('fields can not be empty')</script>";
            }
            
        }
            
            ?>





                 <!-- Blog Comments -->

                <!-- comments form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="post.php" method="post" role="form">



                    <div class="form-group">
                        <label for="Author">Author</label>
                           <input type="text" class="form-control" name="comment_author">
                        </div>


                        
                    <div class="form-group" >
                    <label for="Email">Email</label>  
                           <input type="email" class="form-control" name="comment_email">
                        </div>


                        <div class="form-group">
                        <label for="comment">Your Comment</label>
                            <textarea name="comment_content" class="form-control" rows="3"></textarea>
                        </div>

                        <button type="submit"  name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>



                <!-- Posted Comments -->


                <?php
                #maybe
                $query = "SELECT * FROM comments WHERE comment_post_id = {$the_post_id}  ";
                $query .="AND comment_status = 'approved' ";
                $query .= "ORDER BY comment_id DESC "; //give new id on top
                $select_comment_query = mysqli_query($connection, $query);


                if(!$select_comment_query) {
                    die('Qery Failed'. mysqli_error($connection));
                }

                while($row = mysqli_fetch_array($select_comment_query)) { // to bring back those values
                $comment_date = $row['comment_date'];
                $comment_content = $row['comment_content'];
                $comment_author = $row['comment_author'];
                
                ?>

                    
         <!-- Comment -->
            <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        
                        <h4 class="media-heading"><?php echo $comment_author ; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>

                        <?php echo $comment_content; ?>
                    </div>
                </div>

                <?php }
                 } 
                  }

        else{

        header("Location: index.php");
        } 
        ?>

             </div>
                
                
        

                <!-- Blog Search Well -->

                <?php include"includes/sidebar.php";?>
               
        </div>
        <!-- /.row -->

        <hr>

        <?php include"includes/footer.php"; ?>
