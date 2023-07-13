<?php  ob_start();?>
 <?php session_start();  ?> 

<?php

// to cancel all of these session when i logout
$_SESSION['username'] = null;
$_SESSION['firstname'] = null;
$_SESSION['lastname'] = null;
$_SESSION['user_role'] = null;

header("Location: ../index.php");
?>