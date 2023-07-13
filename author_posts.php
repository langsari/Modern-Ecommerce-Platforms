
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
        /* to get all posts related to the author */
        if(isset($_GET['p_id'])){
           $the_post_id     = $_GET['p_id'];
           $the_post_author = $_GET['author'];
        }

        /** if post author and click i will see everything about author if user i will see every thing abot user
         * such as how many posts he wrote */ 

$query = "SELECT * FROM posts WHERE post_user = '{$the_post_author}' ";
$select_all_posts_query = mysqli_query($connection,$query );

while($row = mysqli_fetch_assoc($select_all_posts_query)){ // to bring back those values
    
$post_title = $row['post_title'];
$post_author = $row['post_user'];
$post_date = $row['post_date'];
$post_image = $row['post_image'];
$post_content = $row['post_content'];

?>






<!-- to repeat itself -->
<h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    All posts by <?php echo $post_author ?>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                

   
                <hr>

<?php } ?>



    <!-- to print comment that i write on post to show in db under the post -->
            <?php
            if(isset($_POST['create_comment'])){
                echo"yes sir";
               
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
                    $query ="UPDATE posts SET post_comment_count  = post_comment_count + 1 ";                  
                    $query .="WHERE post_id  =  $the_post_id ";   
                    $update_comment_query =  mysqli_query($connection,$query);              

                                    
                                    
            } else{

                echo"<script>alert('fields can not be empty')</script>";
            }
            
        }
            
            ?>





               


         <!-- Comment -->
         
                

             </div>
                
                
        

                <!-- Blog Search Well -->

                <?php include"includes/sidebar.php";?>
               
        </div>
        <!-- /.row -->

        <hr>

        <?php include"includes/footer.php"; ?>
