<?php ob_start();

/*array */
 $db['db_host'] = "localhost";
 $db['db_user'] = "osama";
 $db['db_pass'] = "anewpassword";
 $db['db_name'] = "cms";

// $db_host = "localhost";
// $db_user = "root";
// $db_password = "";
// $db_name = "cms";



foreach($db as $key => $value){

     define(strtoupper($key),$value);

 }

 $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// $connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);



$query="SET NAMES utf8";
mysqli_query($connection,$query);
// $remote_file = "/remote/path/test.csv";

 if($connection){
     echo" welcome";
 }
 
 else{
    echo "we can not find db";
 }
 
//
?>