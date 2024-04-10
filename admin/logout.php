<<<<<<< HEAD
<?php
session_start();

//to clear all session variables by replacing with an empty array
$_SESSION = array();

//Destroy the session
session_destroy();

header("location: adminLoginPage.php"); //redirecting to teh login page after logout
exit();
=======
<?php
session_start();

//to clear all session variables by replacing with an empty array
$_SESSION = array();

//Destroy the session
session_destroy();

header("location: adminLoginPage.php"); //redirecting to teh login page after logout
exit();
>>>>>>> origin/main
