<?php
session_start();

$_SESSION = array();

session_destroy();

setcookie('remember_me', '', time() - 3153600000); // Set the expiration time to a past time (50 years in seconds)

header('Location: index.php');
exit;
?>
