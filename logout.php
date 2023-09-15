<?php require_once "inc/dbconn.inc.php"; ?>

<?php
//Logout by destroying the session
session_start();
session_destroy();

// Redirect to the login page
header("Location: login.php");
exit; // Ensure that no code after this is executed
?>