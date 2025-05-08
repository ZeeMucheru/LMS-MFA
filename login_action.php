<?php 
session_start();
include_once('config.php');
require_once('vendor/autoload.php');
use SimpleCaptcha\Builder;
$captcha = Builder::create();
$captcha->distortion = false;
$captcha->noiseFactor = 3;
$captcha->applyNoise = false;
$captcha->maxLinesBehind = 1;
$captcha->maxLinesFront = 1;
$captcha->maxAngle = 2;
$captcha->textColor = '#ffffff';
// if (isset($_SESSION['phrase'])){
//     echo $_SESSION['phrase'];
// }
$capt = "";
if (isset($_SESSION['phrase']) && $captcha->compare($_SESSION['phrase'], $_POST['phrase'])) {
    $capt = true;

}else{
    $capt = false;
}

if($capt){
    $email = trim($_POST["email"]);
    $password = $_POST["password"];

    $sql = "SELECT id, email, default_password, password FROM users WHERE email = ?";
    if($stmt = $con->prepare($sql)){
        $stmt->bind_param("s", $param_email);
        $param_email = $email;
        if($stmt->execute()){
            $stmt->store_result();
            if($stmt->num_rows == 1){                    
                // Bind result variables
                $stmt->bind_result($id, $email,$default, $password);
                if($stmt->fetch()){
                    $pass = $_POST['password'];
                    if($password == NULL){
                        if (password_verify($pass,$default)) {                                
                            $record = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
                            if ($record->num_rows > 0) {
                                $R = mysqli_fetch_array($record);
                                $status = $R['status'];
                                $userRole = $R['role'];
                                $l_name = $R['l_name'];
                                $length = 5;
                                $otp = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0, $length);
                                //$otp = rand(100000,999999);
                                $query = "INSERT INTO otp_expiry (username, otp, is_expired)
                                        VALUES ('$l_name', '$otp', 0)";
                                mysqli_query($con, $query);
                                $last_id = $con->insert_id;
                                include_once('otp_send.php');
                                
                                $_SESSION['message']='<p><div class="alert alert-success alert-dismissible fade show shadow" role="alert">
                                <strong>Hello!</strong> This is the first time you have logged in, please check you email for the OTP password to verify it.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div></p>';
                                
                                $_SESSION['otp_id'] = $last_id;
                                $_SESSION['username'] = $l_name;
                                $_SESSION['email'] = $email;
                                $_SESSION['reset_status'] = 1;
                                $con->close();
                                echo '<script> 
                                $("#invalid_phrase").html("");
                                $("#valid_phrase").html("");
                                $("#loginForm").trigger("reset");
                                location.replace("otp.php"); </script>';
                                unset($_SESSION['phrase']);
                                
                                
    
                            }
                        
                        } else{
                            echo '<div class="alert alert-warning"><strong>Sorry!</strong> Invalid default password.</div>
                            <script>
                                $("#invalid_password").html("Wrong password!");
                                $("#invalid_phrase").html("");
                                $("#valid_phrase").html("Looks good!");</script>';
                        }
                        

                    }else{
                        if (password_verify($pass,$password)) {                                
                            $record = mysqli_query($con, "SELECT * FROM users WHERE email='$email'");
                            if ($record->num_rows > 0) {
                                $R = mysqli_fetch_array($record);
                                $status = $R['status'];
                                $userRole = $R['role'];
                                $l_name = $R['l_name'];
                                if($status == 1 ){
                                    // Store data in session variables
                                    $_SESSION["loggedin"] = true;
                                    $_SESSION["id"] = $id;
                                    $_SESSION["email"] = $email;
                                    $_SESSION["role"] = $userRole;   
                                    date_default_timezone_set('Africa/Nairobi');
                                    $time = date('F d, Y h:i:s A');
                                    $query = "INSERT INTO logs (sid, username, login)
                                            VALUES ('$id', '$email', '$time')";
                                    if (mysqli_query($con, $query)){
                                        $last_id = mysqli_insert_id($con);
                                    }
                                    $_SESSION["logout_id"] = $last_id;
                                    $length = 5;
                                    $otp = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0, $length);
                                    //$otp = rand(100000,999999);
                                    $query = "INSERT INTO otp_expiry (username, otp, is_expired)
                                            VALUES ('$l_name', '$otp', 0)";
                                    mysqli_query($con, $query);
                                    $last_id = $con->insert_id;
                                    include_once('otp_send.php');
                                    
                                    $con->close();
                                    $_SESSION['otp_id'] = $last_id;
                                    $_SESSION['username'] = $l_name;
                                    $_SESSION['email'] = $email;
                                    $_SESSION['reset_status'] = 2;
                                    echo '<script> 
                                    $("#invalid_phrase").html("");
                                    $("#valid_phrase").html("");
                                    $("#loginForm").trigger("reset");
                                    location.replace("otp.php"); </script>';
                                    unset($_SESSION['phrase']);
    
                                
                                }else{
                                    $length = 5;
                                    $otp = substr(str_shuffle("ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890"), 0, $length);
                                    //$otp = rand(100000,999999);
                                    $query = "INSERT INTO otp_expiry (username, otp, is_expired)
                                            VALUES ('$l_name', '$otp', 0)";
                                    mysqli_query($con, $query);
                                    $last_id = $con->insert_id;
                                    include_once('otp_send.php');
                                    
                                    $_SESSION['message']='<p><div class="alert alert-danger alert-dismissible fade show shadow" role="alert">
                                    <strong>Sorry!</strong> Your email is not verified, please check you email for the OTP password to verify it.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div></p>';
                                    
                                    $_SESSION['otp_id'] = $last_id;
                                    $_SESSION['username'] = $l_name;
                                    $_SESSION['email'] = $email;
                                    $_SESSION['reset_status'] = 0;
                                    $con->close();
                                    echo '<script> 
                                    $("#invalid_phrase").html("");
                                    $("#valid_phrase").html("");
                                    $("#loginForm").trigger("reset");
                                    location.replace("otp.php"); </script>';
                                    unset($_SESSION['phrase']);
                                }
                                
                                
    
                            }
                        
                        } else{
                            echo '<div class="alert alert-warning"><strong>Sorry!</strong> 2Invalid password.</div>
                            <script>
                                $("#invalid_phrase").html("");
                                $("#valid_phrase").html("Looks good!");</script>';
                        }

                    }
                    
                }
            } else{
                echo '<div class="alert alert-warning"><strong>Sorry!</strong> Invalid Email address.</div>
                <script>
                    $("#invalid_phrase").html("");
                    $("#valid_phrase").html("Looks good!");</script>';
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        $stmt->close();
    }else{
        echo '<div class="alert alert-warning"><strong>Sorry!</strong>Email is unregistered.</div>';
    }

}else{
    echo '<div class="alert alert-warning"><strong>Sorry!</strong> Wrong CAPTCHA phrase.</div>
    <script>
    $("#invalid_phrase").html("Wrong CAPTCHA phrase!");
    $("#valid_phrase").html("");</script>';
}

?>