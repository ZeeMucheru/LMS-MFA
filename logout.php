<?php
require_once "config.php";
session_start();
$id = $_SESSION["id"];
$logout_id = $_SESSION["logout_id"];
date_default_timezone_set('Africa/Nairobi');
$time = date('F d, Y h:i:s A');
$query = "UPDATE logs SET logout = '$time' WHERE sid='$id' && id='$logout_id'";
mysqli_query($con, $query);

session_destroy();

// Redirect to the login page:
echo '<script> location.replace("index.php"); </script>';
//header('Location: index.php');
exit();
?>