<<<<<<< HEAD
<?php
session_start();

// to clear all session variable by replacing with empty array //
$_SESSION = array();

// Destroy session
session_destroy();

header("Location: ../HTML/index.php");
exit();
=======
<?php
session_start();

// to clear all session variable by replacing with empty array //
$_SESSION = array();

// Destroy session
session_destroy();

header("Location: ../HTML/index.php");
exit();
>>>>>>> origin/main
