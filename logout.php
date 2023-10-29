<?php
// Starts session
session_start();
// Destroys session
session_destroy();
// Redirects user to the login page
header("Location: login.php");
?>