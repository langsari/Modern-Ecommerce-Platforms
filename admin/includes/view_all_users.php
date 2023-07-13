<table class="table table-bordered table table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Username</th>
                                <th>Firstname</th>
                                <th>Lastname</th>
                                <th>Email</th>
                                <th>Role</th>
                                <!-- <th>Date</th> -->
                                
                               
                            </tr>
                        </thead>
<tbody>

<?php


$query = "SELECT * FROM users";
$select_users = mysqli_query($connection,$query);


while($row = mysqli_fetch_assoc($select_users)){
    $user_id = $row['user_id']; 
    $username  = $row['username'];
    $user_password   = $row['password'];
    $user_firstname  = $row['user_firstname'];
    $user_lastname  = $row['user_lastname'];
    $user_email  = $row['user_email'];
    $user_image  = $row['user_image'];
    $user_role   = $row['user_role'];
    //commented
    // $comment_date   = $row['randsalt'];

   

    //to display
    echo "<tr>";
    echo "<td>$user_id </td>";
    echo "<td>$username</td>";
    echo "<td>$user_firstname</td>";
     
   





    echo"<td>$user_lastname</td>";
    echo"<td>$user_email</td>";
    echo"<td>$user_role</td>";


       


    
    echo "<td><a href='users.php?change_to_admin=$user_id'>Admin</a></td>";
    echo "<td><a href='users.php?change_to_sub=$user_id'>Subscriber</a></td>";
    echo "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
    // echo "<td><a href='users.php?source=edit_user&edit_user={$user_id}'>Edit</a></td>";
    echo "<td><a onClick=\"javascript: return confirm('Are you sure');  \" href='users.php?delete=$user_id'>Delete</a></td>";
    echo "</tr>";
}




?>

                    </tbody>
                    </table>

<?php



if(isset($_GET['change_to_admin'])){
    $the_user_id = $_GET['change_to_admin'];
    // WHERE comment_id = {$the_approve_id}
    // 

    $query = "UPDATE users SET user_role = 'admin' WHERE user_id = $the_user_id ";
    $change_to_admin_query = mysqli_query($connection, $query);
    header("Location: users.php");
    // echo "approved already"; 
}


if(isset($_GET['change_to_sub'])){
     
    $the_user_id= $_GET['change_to_sub'];

    // $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = {$the_admin_id} ";
    $query = "UPDATE users SET user_role = 'subscriber' WHERE user_id = $the_user_id ";

    $change_to_sub_query = mysqli_query($connection, $query);
    header("Location: users.php");
   
}







//commented
// if(isset($_GET['edit_user'])){
//     $the_user_id = $_GET['edit_user'];

//     $query = "UPDATE FROM users WHERE user_id = {$the_user_id} ";
//     $users_user_query = mysqli_query($connection, $query);
//     header("Location: users.php");



//     echo "hello"; //to check if delete show this message just to make sure

//   }











          if(isset($_GET['delete'])){


//without writing user_role and 'admin ' anybody can delete users from outside
/**  */
            if(isset($_SESSION['user_role'])){
/**  */
                if($_SESSION['user_role'] == 'admin'){

                

            /**  */
            $the_user_id = mysqli_real_escape_string($connection, $_GET['delete']) ;

            $query = "DELETE FROM users WHERE user_id = {$the_user_id} ";
            $delete_user_query = mysqli_query($connection, $query);
            header("Location: users.php");



            echo "hello"; //to check if delete show this message just to make sure
            }//thord isset session

          } //second isset session
        }

        
                    ?>













