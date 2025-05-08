<?php 
session_start();
include_once('config.php');

$email = $_POST['email'];
$record = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
$row = mysqli_fetch_array($record);
if($row !=""){
    $l_name = $row['l_name'];
    $length = 5;
    
    $otp = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0, $length);
    //$otp = rand(100000,999999);
    $query = "INSERT INTO otp_expiry (username, otp, is_expired)
            VALUES ('$l_name', '$otp', 0)";
    mysqli_query($con, $query);
    $last_id = $con->insert_id;
    include_once('otp_send.php');
    $_SESSION['message']='<p><div class="alert alert-success alert-dismissible fade show shadow" role="alert">
        <strong>Success!</strong> Check your email account to verify.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div></p>';
        $_SESSION['otp_id'] = $last_id;
        $_SESSION['username'] = $l_name;
        $_SESSION['email'] = $email;
        $_SESSION['reset_status'] = 1;
        echo '<script> location.replace("otp.php"); </script>';
    
} else{
    echo '<div class="alert alert-warning"><strong>Sorry!</strong> Invalid Email address.</div>';
    
}

?>