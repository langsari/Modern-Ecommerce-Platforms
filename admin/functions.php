<?php

// that to redirect admin when register 
function Redirect($location){
    return header("Location:index.php"  . $location);
    exit;
}


function ifItmMethod($method=null){

if($_SERVER['REQUEST_METHOD']== strtoupper($method)){
    return true;
}
 return false;

}

function isLoggedIn(){
    if(isset($_SESSION['user_role'])){

        return true;
    }
    return false;
}


function checkIfUserLoggedInAndRedirect($location=null){
        if(isLoggedIn()){
            Redirect($location);
        }
}



function escape($string){

    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}


function users_online() {

    if(isset($_GET['onlineusers'])){

        global $connection;

        if(!$connection) {
            session_start();

             include"../includes/db.php";   


             $session = session_id();
             $time = time();
             $time_out_in_seconds = 05;
             $time_out = $time - $time_out_in_seconds;
             
             $query="SELECT * FROM users_online WHERE session = '$session'";
             $send_query = mysqli_query($connection, $query);
             $count= mysqli_num_rows($send_query);
             
             /* when there is now user */
             if($count == NULL){
                 mysqli_query($connection, "INSERT INTO users_online(session,time) VALUES('$session', '$time')");
             } else{

            // when beack again
                 mysqli_query($connection, "UPDATE users_online SET time = '$time' WHERE session = '$session'");
             
             }
             
             // if the time is bigger than 05 seconds we will know that he is not active
             $user_online_qury =  mysqli_query($connection, "SELECT * FROM users_online WHERE time > '$time_out'");
            echo $count= mysqli_num_rows($user_online_qury);



            } 
            
             } //get request isset()
             
             }
            

             users_online();

   




    function confirm($result) { // to pass the paramitar

        global $connection;
        if(!$result) { 
            // var_dump($connection);
            echo ("QUERY FAILED " .   mysqli_error($connection));
            die('');
        }
    //     try{

    // $query = "SELECT * FROM users WHERE user_id = ". $id . 'LIMIT 1';
    // $result = mysqli_query($mysqli, $query); 
    // // $result
    // }
    // catch(Exception $e){
    // echo 'Message: ' .$e->getMessage();
    // exit;
    // } 

      
    }


    // is to add and delete categies
    function inser_categories() {

            global $connection;
        if(isset($_POST['submit'])){

            $cat_title = $_POST['cat_title'];
        
                if($cat_title == "" || empty($cat_title)) {
                    echo"this field should not be empty";
        
        
                    } else {
                    
        
                       $stmt =mysqli_prepare($connection, "INSERT INTO  categories(cat_title) VALUES(?) ");
                       
        
                       mysqli_stmt_bind_param($stmt, 's', $cat_title);
                       mysqli_stmt_execute($stmt);
        
                       if(!$stmt){
                           die('QUERY FAILED' . mysqli_error($connection));
                       }
                   } 

                   mysqli_stmt_close($stmt);
        
                   }    
    }     
    
    

    function find_all_categories(){
        global $connection;
/* find all categories query */
    $query = "SELECT * FROM categories";
  $select_categories = mysqli_query($connection,$query);


 while($row = mysqli_fetch_assoc($select_categories)){ // to bring back those values
    // to bring all in database
             $cat_id = $row['cat_id']; 
             $cat_title = $row['cat_title'];


             echo"<tr>";
             echo"<td>{$cat_id}</td>";
             echo"<td>{$cat_title}</td>";
            
             //links to edit or delete
             echo"<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
             echo"<td><a href='categories.php?edit={$cat_id}'>edit</a></td>";
            echo"</tr>";
}

    }




            function delete_catgories(){
        global $connection;
        //delete query
        if(isset($_GET['delete'])){
        $the_cat_id = $_GET['delete'];
        //   $query = "DELETE FROM categories WHERE cat_id = { $the_cat_id} ";
        $query = "DELETE FROM categories WHERE cat_id = {$the_cat_id} ";
        
        $delete_query = mysqli_query($connection,$query);
        
        header("Location: categories.php");
        }
            }








    function recordCount($table){


        global $connection;
        $query = "SELECT * FROM " . $table;
        $select_all_posts = mysqli_query($connection, $query);
        $result = mysqli_num_rows($select_all_posts);
        confirm($result);

        return $result;
    }



    // function checkStatus($table, $column, $status){

    //     global $connection;
    //     $query = "SELECT * FROM $table WHERE $column = '$status'";
    //     $result = mysqli_query($connection, $query);


    //     confirm($result);
    //     return mysqli_num_rows($result);
    // }




   /* to provide normal user to login*/ 
function is_admin($username){
        global $connection;
        $query = "SELECT user_role FROM users WHERE username = '$username'";
        $result = mysqli_query($connection, $query);
        confirm($result);

        $row = mysqli_fetch_array($result);

        if($row['user_role'] == 'admin'){
            return true;
        }
        
        else{
            return false;
        }
}


// to avoid duplicate one username in DB


    function username_exist($username) {
      
        global $connection;
        $query = "SELECT user_id FROM users WHERE username = '$username'";
        $result = mysqli_query($connection, $query);
        if(mysqli_num_rows($result) > 0) {
            return true;
        } else {
            return false;
        }
    }
    





function email_exists($email){
    global $connection;

    $query = "SELECT user_email FROM users WHERE user_email = '$email'";
    $result = mysqli_query($connection, $query);
    confirm($result);

    if(mysqli_num_rows($result) > 0) {
        return true;

    } else{
        
        return false;
    }
}



    function register_user($username,$email,$password){
        
                global $connection;
          // echo "the field can not be empty ";
          $username =       mysqli_real_escape_string($connection,$username);
          $email    =       mysqli_real_escape_string($connection,$email);
         $password  =       mysqli_real_escape_string($connection,$password);
      
      
          // that is all to hash or randsalt password in DB
         $password = password_hash($password , PASSWORD_BCRYPT, array('cost' => 12));
      
           $query ="INSERT INTO users (username, user_email, user_password, user_role) ";
           $query .= "VAlUES('{$username}', '{$email}','{$password}', 'subscriber')";
           $registration_query = mysqli_query($connection,$query);
          confirm($registration_query);
      
    
    }



    function login_user($username, $password){
        global $connection;
        $username = trim($username);
        $password = trim($password);
        

           // to prevent hackers from editing in my website or this field
        //    $username =   mysqli_real_escape_string($connection, $username );
        //    $password =   mysqli_real_escape_string($connection, $password );
           
         // to chechk if user and password that in db are correct 
        //  
        //  $password = password_hash($password , PASSWORD_BCRYPT, array('cost' => 12));
           $query= "SELECT * FROM users WHERE username = '{$username}' ";
        //    $query= "SELECT * FROM users WHERE username = '{$username}' AND user_password = '{$password}' ";
           $select_user_query = mysqli_query($connection,$query);

           if(!$select_user_query){
             die("QUERY FAILED" . mysqli_error($connection));
   
   
           }

       //to fetch the data    
    while($row = mysqli_fetch_array($select_user_query)){
       
        // if fetch array is not working the verify will not work too 
         $db_user_id = $row['user_id'];
        $db_username = $row['username'];
        $db_user_password = $row['password'];
        $db_user_firstname = $row['user_firstname'];
        $db_user_lastname = $row['user_lastname'];
        $db_user_role = $row['user_role'];

        


        if(password_verify($password, $db_user_password))
        // if ($db_user_id)
        {
     
            $_SESSION['username'] =  $db_username;
            $_SESSION['firstname'] = $db_user_firstname;
            $_SESSION['lastname'] =  $db_user_lastname;
            $_SESSION['user_role'] = $db_user_role;
      
        //   header("Location: ../admin");
        header("Location: ../cms/admin");
    //    Redirect("/cms/admin");
      
          }
           else {
            //  header("Location: google.com");
            //  die('');
              return false;
              
       }
   
       }

       return true;
     }
 
       /* without that code i will not be able to login because the password is encrypted */
     // $password = crypt($password, $db_user_password); 
 
 
     // this function will return true or false


          ?>
