<?php
session_start();
require_once "config.php";
$otp_id = $_SESSION['otp_id'];
$email = $_SESSION['email'];
$reset = $_SESSION['reset_status'];

$otp = trim($_POST['otp']);
$record = mysqli_query($con, "SELECT * FROM otp_expiry WHERE id='$otp_id' AND otp='$otp'");
$row = mysqli_fetch_array($record);
if ($row !="") {
    
    $record = mysqli_query($con, "SELECT * FROM otp_expiry WHERE created_at > date_sub(now(), interval 5 minute) AND id='$otp_id'");
    $row = mysqli_fetch_array($record);
    if ($row !="") {
        mysqli_query($con, "UPDATE otp_expiry SET is_expired=1 WHERE id='$otp_id'");
        mysqli_query($con, "UPDATE users SET status=1 WHERE email='$email'");
        $_SESSION['message']='<p><div class="alert alert-success alert-dismissible fade show shadow" role="alert">
        <strong>Success!</strong> Your Account has been activated. Now you can login.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div></p>';
        if($reset == '1'){
            $_SESSION['restin'] = true;
            $link = '<script> location.replace("new-pass.php"); </script>';
        }elseif($_SESSION['reset_status'] == 2){
            $_SESSION['message']="";
            $link = '<script> location.replace("app/admin/index.php"); </script>';
        }else{
            $link = '<script> location.replace("login.php"); </script>';
        }
        
        echo $link;
    }else{
        mysqli_query($con, "UPDATE otp_expiry SET is_expired=1 WHERE id='$otp_id'");
        echo '<div class="alert alert-warning"> <strong>Sorry!</strong>OTP Verification code has expired, please <a href="#" onclick=resend(\''.$otp_id.'\',\''.$email.'\');>Request</a> again.</div>';
        
    }
}else{
    echo '<div class="alert alert-warning">Sorry!</strong>Invalid otp verification code.</div>';
    
}

?>