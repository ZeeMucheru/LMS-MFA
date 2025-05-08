<?php 
error_reporting (E_ALL ^ E_NOTICE);
session_start();
include_once('config.php');
//$db = new SQLite3('sqliteDB/litwebtech.db');
$f_name = $l_name = $email = $phone = $file = $password = "";
$image_err  = $login_err = "";

$f_name = trim(strtoupper($_POST['f_name']));
$l_name = trim(strtoupper($_POST['l_name']));
$email = trim($_POST['email']);
$phone = trim($_POST['phone']);
//$file = file_get_contents($_FILES['file']['tmp_name']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//'$file', image, 

$record = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
$row = mysqli_fetch_array($record);
if ($row =="") {
    $query = "INSERT INTO users (f_name, l_name, email, phone ,  password, role, status)
            VALUES ('$f_name','$l_name', '$email', '$phone', '$password',  '0','0')";
    mysqli_query($con, $query);
    $length = 5;
    $otp = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0, $length);
    //$otp = rand(100000,999999);
    $query = "INSERT INTO otp_expiry (username, otp, is_expired)
            VALUES ('$l_name', '$otp', 0)";
    mysqli_query($con, $query);
    $last_id = $con->insert_id;
    include_once('otp_send.php');
    
    $_SESSION['message']='<p><div class="alert alert-success alert-dismissible fade show shadow" role="alert">
    <strong>Success!</strong> Your Admin account has been created. Now your email account to verify.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div></p>';
    
    $_SESSION['otp_id'] = $last_id;
    $_SESSION['username'] = $l_name;
    $_SESSION['email'] = $email;
    $_SESSION['reset_status'] = 0;
    echo '<script> location.replace("otp.php"); </script>';
    
}else{
    echo '<div class="alert alert-warning"><strong>Sorry!</strong> Email address is already registered.</div>';
    
}

//echo "pOST IS success";

?>