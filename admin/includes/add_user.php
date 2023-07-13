

<?php

if(isset($_POST['create_user'])){  


//  $user_id = $_POST['user_id'];
 $user_firstname = $_POST['user_firstname'];
 $user_lastname = $_POST['user_lastname'];
 $user_role = $_POST['user_role'];


$username = $_POST['username'];
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];


// that is all to hash or randsalt password in add_user page
$user_password = password_hash($user_password , PASSWORD_BCRYPT, array('cost' => 10));



$query = " INSERT INTO users(
                       user_firstname,
                       user_lastname, 
                       user_role,
                       username,
                       user_email,
                       password) ";

$query .= "VALUES( 
                      '{$user_firstname}',
                      '{$user_lastname}',
                      '{$user_role}',
                      '{$username}',
                    '{$user_email}',
                    '{$user_password}') ";


$create_user_query = mysqli_query($connection,$query);
confirm($create_user_query);

echo "User Created: " . " " . "<a href='users.php' target='_blank'>View users</a> ";



}
?>

<form class="table table-border table-hover" action="" method="post" enctype="multipart/form-data">




<div class="form-group">
    <label for="firstname">firstname</label>
    <input type="text" class="form-control" name="user_firstname">
    
    </div>







    <div class="form-group">
    <label for="user_lastname">lastname</label>
    <input type="text" class="form-control" name="user_lastname">
    
    </div>



    <div class="form-group">
      
      <select name="user_role" id="">
      <option value="subscriber">Select options</option>
        <option value="admin">Admin</option>
        <option value="subscriber">Subscriber</option>


  
      </select>
      
      </div>


  


    <div class="form-group">
    <label for="username">username</label>
    <input type="text" class="form-control" name="username">
    
    </div>

    
    <div class="form-group">
    <label for="Email">Email</label>
    <input type="email" class="form-control" name="user_email">

    
    </div>


    <div class="form-group">
    <label for="password">password</label>
    <input type="password" class="form-control" name="user_password">

    
    </div>



    <div class="form-group">
        <input class="btn btn-primary" type="submit" name="create_user" value="Add_user ">

    </div>


    </form>
  
