
<?php

if(isset($_POST['create_post'])){  

// $create_post_query = mysqli_query($connection, $query);
// confirm($create_post_query);
$post_title = escape($_POST['title']);
$post_user = $_POST['post_user'];
$post_category_id = $_POST['post_catgeory'];
$post_status = $_POST['post_status'];


$post_image = $_FILES['image']['name'];
$post_image_temp = $_FILES['image']['tmp_name'];


$post_tags = $_POST['post_tags'];
$post_content = $_POST['post_content'];
$post_date = date('d-m-y'); // this is a function
// $post_comment_count = 0;

if (move_uploaded_file($post_image_temp, "../images/$post_image")) {
  $query = " INSERT INTO posts(post_category_id,
                         post_title,
                         post_user, 
                         post_date,
                         post_image,
                         post_content,
                         post_tags,
                         post_status) ";



  $query .= "VALUES( '{$post_category_id}',
                        '{$post_title}',
                        '{$post_user}',
                         now(),
                        '{$post_image}',
                        '{$post_content}',
                        '{$post_tags}',
                        '{$post_status}' ) ";

  $create_post_query = mysqli_query($connection, $query);
  confirm($create_post_query);
 $the_post_id = mysqli_insert_id($connection); // to bring a var the post id that in the other page and avoid errors



  echo"<p class='bg-success'>post Created. <a href='../post.php?p_id=$the_post_id' target='_blank'>View Posts  </a>or
  <a href='posts.php' target='_blank'>Edit More Posts</a>
  <p>";



} else {
  // Error handling for file upload
}
/**'{$post_comment_count}',
 */
    
}
?>


        <script src="index.js">

              
        </script>
          

        <form class="table table-border table-hover" action="" method="post" enctype="multipart/form-data">


            


            <div class="form-group">
            <label for="post_title">post_title</label>
            <input type="text" class="form-control" name="title">
            
            </div>




            <div class="form-group">
            <label for="Category">Category</label>
              <select name="post_catgeory" id="">
          
              <?php
                            $query = "SELECT * FROM categories" ;
                            $select_categories = mysqli_query($connection,$query);

                            confirm($select_categories);


                          while($row = mysqli_fetch_assoc($select_categories )){ // to bring back those values
                          // to bring all in database
                          
                                    $cat_id = $row['cat_id']; 
                                    $cat_title = $row['cat_title'];
                                  echo  "<option value='$cat_id'>{$cat_title}</option>"; 
                              
                          }
                        

        ?>

              </select>
              
              </div>







        <!-- عشان تظهر اسماء المستخدمين اللى عندى و اقدر اخلى البوست خاص بواحد منهم -->
              <div class="form-group">
            <label for="users">Users</label>
              <select name="post_user" id="">
          
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




    <!-- <div class="form-group">
    <label for="post_author">post_author</label>
    <input type="text" class="form-control" name="author">
    
    </div> -->







    <div class="form-group">
    <select name="post_status" id=""> 
      <option value="draft">post status</option>
      <option value="published">published</option>
      <option value="draft">draft</option>
    </select> 

    <!-- <input type="text" class="form-control" name="post_status"> -->
    
    </div>



    <div class="form-group">
    <label for="post_image">Post Image</label>
    <input type="file"  name="image">
    
    </div>



    <div class="form-group">
    <label for="post_tags">post_tags</label>
    <input type="text" class="form-control" name="post_tags">
    
    </div>




      
    <div class="form-group" id="box">
    <label for="post_content">post content</label>
    <textarea  class="form-control" name="post_content" id="body" cols="30" rows="10"></textarea>
      

    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_post" value="puplish ">

    </div>


    </form>



    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>CKEditor 5 – Classic editor</title>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
</head>
<!-- <body>
    <h1>Classic editor</h1>
    <div id="editor">
         <p>This is some sample content.</p> -->
    <!-- </div>
    <script>
      $(document).ready(function(){
        ClassicEditor
            .create( document.querySelector( '#body' ) )
            .catch( error => {
                console.error( error );
            } );
          });
    </script>
</body> -->
<!-- </html> --> 




  
