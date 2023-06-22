
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
    echo __DIR__;
        
 $per_page =  5;
                if(isset($_GET['page'])){

                    $page = $_GET['page'];
                } 
                
                else{
                    $page = "";
                    // 1 means home page
                } 
                
                if($page == "" || $page ==1){
                    $page_1 = 0;
                } 
                
                else{
                    // it means in each page there is will be only five posts
                    $page_1 = ($page * $per_page) - $per_page;
                }



 // to make admin only able to see even if they are draft but if i did log out i will not see any posts
                if(isset($_SESSION['user_role']) && $_SESSION['user_role'] == 'admin' ){

                    $post_quer_count = "SELECT * FROM posts";
                   } 
        
                   
                else {
                     $post_quer_count = "SELECT * FROM posts WHERE post_status = 'published'";
                   }


            /* WHERE post_status = 'published' this to stope pagination if all posts are draft */
            // $post_quer_count = "SELECT * FROM posts WHERE post_status = 'published'";
            
            $find_count_query = mysqli_query($connection,$post_quer_count);
            $count = mysqli_num_rows($find_count_query);

            //عشان تمنع تكرار الرساله مع عدد البوست

            if($count<1){
                echo "<h1 class='text-center'>No Posts</h1>";
            } else{



            $count =  ceil($count / $per_page); 





// LIMIT 3 
            $query = "SELECT * FROM posts LIMIT $page_1, $per_page";
            $select_all_posts_query = mysqli_query($connection,$query );

            while($row = mysqli_fetch_assoc($select_all_posts_query)){ // to bring back those values
            $post_id = $row['post_id']; // to get the id from the posts
            $post_title = $row['post_title'];
            $post_author = $row['post_author'];
            $post_user = $row['post_user'];
            $post_date = $row['post_date'];
            $post_image = $row['post_image'];
            $post_content = substr($row['post_content'],0,100) ; // to make the content look smaller
            $post_status = $row['post_status'];

            // if($post_status !== 'published'){
            //     echo "<h1 class='text-center'>NO POSTS HERE<h1>";
            // } 






            ?>






<!-- to repeat itself -->
<h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1> 

                <!-- First Blog Post -->

                 <!-- <h1><?php  //echo $count;?></h1> 
                 <h2>
                    <a href="post/<?php //echo $post_id; ?>"><?php //echo $post_title ?></a>
                </h2>
                <p class="lead">
                    by <a href="author_posts.php?author=<?php //echo $post_author ?>&p_id=<?php //echo $post_id ?>"><?php //echo $post_author ?></a>
                </p>


                <p class="lead">
                  by <a href="author_posts.php?author=<?php //echo $post_user ?>&p_id=<?php //echo $post_id ?>">
                <?php //echo $post_user ?></a>
                </p> 



                <p><span class="glyphicon glyphicon-time"></span><?php //echo $post_date ?></p>
                <hr>

                
                <a href="post.php?p_id=<?php //echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php //echo $post_image;?>" alt="">
                </a>


                <hr>
                <p><?php //echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php //echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr> -->





                <!-- comes from an old index  -->
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title ?></a>
                </h2>

                
                <p class="lead">
                    by <a href="author_posts.php?author=<?php echo $post_author ?>&p_id=<?php echo $post_id ?>"><?php //echo $post_author ?></a>
                </p>




                <p class="lead">
                  by <a href="author_posts.php?author=<?php //echo $post_user ?>&p_id=<?php echo $post_id ?>">
                <?php echo $post_user ?></a>
                </p>







                <p><span class="glyphicon glyphicon-time"></span><?php echo $post_date ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>">
                <img class="img-responsive" src="images/<?php echo $post_image;?>" alt="">
                </a>
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>

<?php } }?>

            

</div>

            

                <!-- Blog Search Well -->

                <?php include"includes/sidebar.php";?>
               
        <!-- </div>
        <!-- /.row -->

        <hr>


            <!-- pagination -->
            <ul class="pager">

            <?php
            for($i = 1; $i <= $count; $i++){

                // to put colors on pages numbers links
                if($i == $page){
                    echo "<li><a class='active_link' href='index.php?page={$i}'>{$i}</a></li>";



                } 
                
                else{
                     echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                }

                 
            }
            
            
            
            ?>
           <!-- pagination -->
            <!-- <li><a href="">2</a></li> --> 
            <!-- <li><a href="">3</a></li> --> 
            </ul> 


        <?php include"includes/footer.php"; ?>
