<?php 
session_start();
$email = $_SESSION['email'];

include_once('config.php');
   
$password = $_POST["password"];
$password = password_hash($password, PASSWORD_DEFAULT);
mysqli_query($con, "UPDATE users SET password='$password' WHERE email='$email'");
$_SESSION['message']='<p><div class="alert alert-success alert-dismissible fade show" role="alert">
<strong>Success!</strong> Password changed.
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
</button>
</div></p>';
unset($_SESSION['restin']);
echo '<script> location.replace("login.php"); </script>';

?>