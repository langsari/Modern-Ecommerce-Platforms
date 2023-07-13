

<?php


if(isset($_GET['edit_user'])){

  // echo"welcome";
  // echo"<br>";
  $the_user_id = $_GET ['edit_user'];

  $query = "SELECT * FROM users WHERE user_id = $the_user_id ";
  $select_users_query = mysqli_query($connection,$query);
 
 
 while($row = mysqli_fetch_assoc($select_users_query)){ // to bring back those values
 // to bring all in database
              $user_id = $row['user_id']; 
              $username = $row['username'];
              $user_password = $row['password'];
              $user_firstname = $row['user_firstname'];
              $user_lastname = $row['user_lastname'];
              $user_email = $row['user_email'];
              $user_image = $row['user_image'];
              $user_role = $row['user_role'];
   
 }
 ?>


<?php

          if(isset($_POST['edit_user'])){  


            $user_firstname = $_POST['user_firstname'];
            $user_lastname = $_POST['user_lastname'];
            $user_role = $_POST['user_role'];


            $username = $_POST['username'];
            $user_email = $_POST['user_email'];
            $user_password = $_POST['user_password'];
            $post_date = date('d-m-y');



              // عشان لو ما كتبتش الاكواد دى مش هعرف اخلى الباسورد يكون متشفر فى قواعد البيانات
              // لو عدلت على الباسورد فى الايديت يوزر الباسورد هيتعمله فك تشفير تلقائى

              // $query="SELECT randsalt FROM users";
              // $select_ransalt_query = mysqli_query($connection, $query);
              // if(!$select_ransalt_query){
              //   die("Query Failed" . mysqli_error($connection));
              // }

              //   $row = mysqli_fetch_array($select_ransalt_query);
              //   $salt  = $row['randsalt'];
              //   $hashed_password = crypt($user_password, $salt);
                
          if(!empty($user_password)){

            $query_password = "SELECT user_password FROM users WHERE user_id = $the_user_id";
            $get_user_query = mysqli_query($connection,$query_password);
            confirm($get_user_query);

            // to fetch passsword
            $row = mysqli_fetch_array($get_user_query);
            $db_user_password = $row ['user_password'];


          if($db_user_password != $user_password){
            $hashed_password = password_hash($user_password , PASSWORD_BCRYPT, array('cost' => 10));
          }


            $query = "UPDATE users SET ";           
            $query.= "user_firstname = '{$user_firstname}', ";
            $query.= "user_lastname = '{$user_lastname}', ";
            $query.= "user_role = '{$user_role}', ";
            $query.= "username = '{$username}', ";
            $query.= "user_email = '{$user_email}', ";
            $query.= "user_password = '{$hashed_password}' ";
            $query.= "WHERE user_id = {$the_user_id} ";

$edit_user_query = mysqli_query($connection,$query);
confirm($edit_user_query);

echo "USER updated" . " <a href='users.php'>View USers?</a>";
          }

        



     }      


    }else{

      header("Location: ../index.php");
    }

// echo"<p class='bg-success'>post updated  . <a href='../post.php?p_id={$the_user_id}'></a> . <a href='posts.php'> 
// edit more posts   </a></p>";



?>

<form class="table table-border table-hover" action="" method="post" enctype="multipart/form-data">




<div class="form-group">
    <label for="firstname">Firstname</label>
    <input type="text" value="<?php echo $user_firstname; ?>" class="form-control" name="user_firstname">
    
    </div>

    <div class="form-group">
    <label for="user_lastname">Lastname</label>
    <input type="text" value="<?php echo $user_lastname  ?>" class="form-control" name="user_lastname">
    
    </div>




    <div class="form-group">
      
      <select name="user_role" id="">

  <!-- the previous value was subscriber nut here i will make the value as user_role -->
  <!-- and to be able to change between subsrciber and admin -->
      <option value="<?php echo $user_role; ?>"><?php echo $user_role; ?></option>

         

    <!-- //   if($user_role == 'admin'){

    //   echo "<option value='subscriber'>Subscriber</option>";
    //   } 

    //   else {

    //  echo "<option value='admin'>admin</option>";
    //   } -->
      
      
 <?php
        
        if($user_role == 'admin') {
         echo "<option value='subscriber'>subscriber</option>";
        } else {
          echo "<option value='admin'>Admin</option>";
        }
        
        
        
        
        ?>
  
      </select>
      
      </div>



    <div class="form-group">
    <label for="username">username</label>
    <input type="text" value="<?php echo $username ?>" class="form-control" name="username">
    
    </div>

    




    <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" value="<?php echo $user_email ?>" class="form-control" name="user_email">

    
    </div>


    <div class="form-group">
    <label for="password">password</label>
    <input autocomplete="off" type="password"  class="form-control" name="user_password">
    <!-- can not show the value of password becasue it suppose be encrypted -->
<!-- value="<?php // echo $user_password ?>" -->
    
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="edit_user" value="Update User">

    </div>


    </form>
  
    
