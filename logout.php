<?php 
session_start();

// $_SESSION['username'] = null;
// $_SESSION['fullname'] = null;
// $_SESSION['username'] = null;
// $_SESSION['role'] = null;
session_destroy();

header('Location: login.php')

?>