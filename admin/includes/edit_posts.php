

<?php
if(isset($_GET['p_id'])){

   $the_post_id = $_GET['p_id'];

   
    
}
else {
    echo " we can not get it";
}



// to pull the information from the database
$query = "SELECT * FROM posts WHERE post_id = $the_post_id";
$select_by_id = mysqli_query($connection, $query);


// Check if query failed
if(!$select_by_id) {
  die("Query Failed: " . mysqli_error($connection));
  
}


while($row = mysqli_fetch_assoc($select_by_id)){

    $post_id = $row['post_id']; 
    $post_user  = $row['post_user'];
    $post_title   = $row['post_title'];
    $post_category_id  = $row['post_category_id'];
    $post_status  = $row['post_status'];
    $post_image  = $row['post_image'];
    $post_content  = $row['post_content'];
    $post_tags   = $row['post_tags'];
    $post_comment_count  = $row['post_comment_count'];
    $post_date   = $row['post_date'];


}


if(isset($_POST['update_post'])){

    // echo "the post already updated";

      // ده عشان لما اعدل على بقيت البينات تتبعت كمان الى قواغد البيانات
              $post_user = $_POST['post_user'];
               $post_title = $_POST['post_title'];
                $post_category_id = $_POST ['post_category'];
                $post_status = $_POST['post_status'];
                $post_image = $_FILES['image']['name'];
                $post_image_temp = $_FILES['image']['tmp_name'];
                $post_content = $_POST ['post_content'];
                $post_tags = $_POST['post_tags'];
               

              move_uploaded_file($post_image_temp, "../images/$post_image"); //move from temp location to permnant location


              if(empty($post_image)){
                $query = "SELECT * FROM posts WHERE post_id = $the_post_id";
                $select_image = mysqli_query($connection,$query);

                while($row = mysqli_fetch_array($select_image)){

                  $post_image = $row['post_image'];
                }
              }




              // the post title in my table must equal the same in my form
        $query = "UPDATE posts SET ";
        $query.= "post_title = '{$post_title}', " ;
        $query.= "post_category_id = '{$post_category_id}', " ;
        $query.= "post_date = now(), " ;
        $query.= "post_user = '{$post_user}', " ;
        $query.= "post_status = '{$post_status}', " ;
        $query.= "post_tags = '{$post_tags}', " ;
        $query.= "post_content = '{$post_content}', " ;
        $query.= "post_image = '{$post_image}' " ;
        $query.= "WHERE post_id = {$the_post_id} " ;


       
        $update_query =mysqli_query($connection,$query);
          confirm($update_query);
          // if( ! $update_query){
          //   die("QUERY FAILED " . mysqli_error($connection));
          // }
     
      
      echo"<p class='bg-success'>post updated sir. <a href='../post.php?p_id=$the_post_id'>View Posts  </a>or
      <a href='posts.php'>Edit More Posts</a>
      <p>";
        
       
}



?>



<form class="table table-border table-hover" action="" method="post" enctype="multipart/form-data">


    


    <div class="form-group">
    <label for="post_title">post_title</label>
    <input type="text"  value="<?php echo $post_title; ?>"  class="form-control" name="post_title">
    
    </div>








    <div class="form-group">
    <label for="Category">Category</label>
    <select name="post_category" id="">
     <!-- to select items that in the nave bar -->
     <?php
                     $query = "SELECT * FROM categories" ;
                    $select_categories = mysqli_query($connection,$query);

                    confirm($select_categories);


                  while($row = mysqli_fetch_assoc($select_categories )){ // to bring back those values
                   // to bring all in database
                  
                            $cat_id = $row['cat_id']; 
                            $cat_title = $row['cat_title'];
                          // echo  "<option value='$cat_id'>{$cat_title}</option>"; 

                          // to show the defult value 
                          if($cat_id == $post_category_id){

                            echo " <option selected value='{$cat_id}'>{$cat_title}</option>";

                          }else{
                            echo  "<option value='$cat_id'>{$cat_title}</option>"; 
                          }
                       
                  }
                 

?>

</select>
</div>
    


 



    


<!-- عشان تظهر اسماء المستخدمين اللى عندى و اقدر اخلى البوست خاص بواحد منهم -->
<div class="form-group">
            <label for="users">Users</label>
              <select name="post_user" id="">

              <!-- to select the username directly who wrote the post and when i change the author i can do easly -->
                <?php   echo  "<option value='{$post_user}'>{$post_user}</option>";  ?>
          
              <?php
                            $users_query = "SELECT * FROM users" ;
                            $select_users = mysqli_query($connection,$users_query);

                            confirm($select_users);


                          while($row = mysqli_fetch_assoc($select_users )){ // to bring back those values
                          // to bring all in database
                          
                                    $user_id = $row['user_id']; 
                                    $username = $row['username'];
                                  echo  "<option value='{$username}'>{$username}</option>"; 

                                  // must write the username var to be able to see author name instead of id 
                              
                          }
                        

        ?>

              </select>
              
              </div>




<!-- for space only -->
    <div class="form-group">  
                <select name="post_status" id="">
                  <option value="<?php echo $post_status; ?>"><?php echo $post_status; ?></option>

                  <?php
                  
                  if($post_status == 'published' ){
                    echo  "<option value='draft'>Draft</option>"; 
                  }else{
                    echo  "<option value='published'>Publish</option>"; 
                  }
                  
                  
                  ?>
                </select>


    </div>
  


    


    <div class="form-group">
    <img width="100"  src="../images/<?php echo $post_image;  ?>" alt="">
    <input type="file" name="image">
    
    </div>
    



    <div class="form-group">
    <label for="post_tags">post_tags</label>
    <input type="text" value="<?php echo $post_tags; ?>"  class="form-control" name="post_tags">
    
    </div>




  
   


    <div class="form-group">
    <label for="post_content">post content</label>
    <textarea  class="form-control" name="post_content" id="body" cols="30"
     rows="10"><?php echo $post_content; ?>
   
</textarea>
    
    </div>

    
  



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="update_post" value="publish post" >

    </div>


    </form>
  

<div class="row" >


    <!-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> -->


    <script src="../js/form_content.js"></script>

</div>