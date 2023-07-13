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
<!-- ده عشان لما ادوس على اللينك اللى فى السايد بار يودينى على البوستات الموجود المتحدده -->
<?php
 include_once "../cms/admin/functions.php";

    if(isset($_GET['category'])){

        $post_category_id = $_GET['category'];

        // to make admin only able to see even if they are draft but if i did log out i will not see any posts

        // if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ){

        //     $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id";
        //    } 


            // to chak if i can be able to edit or no
        if(is_admin($_SESSION['username'])){
            //select all tables that i want to out from my DB  
            // start by two parameters 1 is connection ,  2 is query and placeholders ?  
            $stmt1 = mysqli_prepare($connection ,"SELECT post_id,
                                                        post_title,
                                                        post_author,
                                                        post_date,
                                                        post_image,
                                                        post_content FROM posts WHERE post_category_id = ?"); 
        }

           
        else {
            // $query = "SELECT * FROM posts WHERE post_id = $the_post_id AND post_status = 'Published' ";
            $stmt2 = mysqli_prepare($connection, "SELECT post_id,
            post_title,
            post_author,
            post_date,
            post_image,
             post_content FROM posts WHERE post_id = ? AND post_status = ? ");
             $published = 'Published';
        }

            // for sql test
        //    $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id AND post_status = 'published' ";
            // $select_all_posts_query = mysqli_query($connection,$query );

        // if stmt1 is ready 
            if(isset($stmt1)){
                mysqli_stmt_bind_param($stmt1,"i",$post_category_id);
                // if integer = i if string = s and post_category_id for the placeholder

             // execute = ينفذ 
                mysqli_stmt_execute($stmt1);
                // to fetch data
                mysqli_stmt_bind_result($stmt1 ,$post_id,
                                        $post_title,
                                        $post_author,
                                        $post_date,
                                        $post_image,
                                        $post_content );
                $stmt = $stmt1;                     

            } else{

                    // integer and string = is .. $post_category_id = integer .. = $published = string  
                 mysqli_stmt_bind_param($stmt2,"is",$post_category_id ,$published );
                // if integer = i if string = s and post_category_id for the placeholder

             // execute = ينفذ 
                mysqli_stmt_execute($stmt2);
                // to fetch data
                mysqli_stmt_bind_result($stmt2 ,$post_id,
                                        $post_title,
                                        $post_author,
                                        $post_date,
                                        $post_image,
                                        $post_content );
             $stmt = $stmt2;   

            }


        // if(mysqli_stmt_num_rows($stmt)<1 ){
        //     echo"<h1 class='text-center'> We don not have Posts</h1>";
        // } 


        
    

// $query = "SELECT * FROM posts WHERE post_category_id = $post_category_id AND post_status = 'published' ";
// $select_all_posts_query = mysqli_query($connection,$query );






            // commented
      // if there is no posts i can not access to  categories from the navbar
        // if(mysqli_stmt_num_rows($select_all_posts_query) === 0 ){
        //     echo"<h1 class='text-center'> We don not have any category</h1>";
        // } 




  while(mysqli_stmt_fetch($stmt)): // to bring back those values
        
        ?>

<!-- to repeat itself -->
<h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

<?php  endwhile; mysqli_stmt_close($stmt);} else{

    header("Location: index.php");
   
} ?>

            

</div>

            

                <!-- Blog Search Well -->

                <?php include"includes/sidebar.php";?>
               
        </div>
        <!-- /.row -->

        <hr>

        <?php include"includes/footer.php"; ?>
