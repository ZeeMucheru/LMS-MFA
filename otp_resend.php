<?php 
error_reporting (E_ALL ^ E_NOTICE);
require_once "config.php";
$otp_id = $_POST['otp_id'];
$email = $_POST['email'];

$record = mysqli_query($con, "SELECT * FROM otp_expiry WHERE id='$otp_id'");
$row = mysqli_fetch_array($record);
mysqli_query($con, "UPDATE otp_expiry SET is_expired=0, created_at=now() WHERE id='$otp_id'");

$otp = $row['otp'];

include_once('otp_send.php');
echo '<div class="alert alert-success">Success!</strong>Check your email, otp has been resent.</div>';


?>