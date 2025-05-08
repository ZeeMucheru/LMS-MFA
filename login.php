<?php 
session_start();
require_once('vendor/autoload.php');
use SimpleCaptcha\Builder;

include_once('config.php');
$systemCheck = mysqli_query($con, "SELECT * FROM users");
$row = mysqli_fetch_array($systemCheck);
if ($row!=""){
  $newSystem=false;
}else{
  $newSystem=true;
}
?>
<?php if($newSystem == false): ?>
<?php include_once('includes/header.php')?>
<section class="vh-100 ">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-6 col-sm-12 col-lg-6 col-xl-6 mb-5">
        <div class="card bg-light text-dark" style="border-radius: 1rem;">
            
          <div class="card-body p-5 text-center">
            <?php if (isset($_SESSION['message'])): ?>
                <div style="text-align:center; font-size:16px;">
                <?php
                    echo $_SESSION['message'];
                    unset($_SESSION['message']);
                ?>
                </div>
            <?php endif ?>
            <div class="mb-md-2 mt-md-4 pb-5">

            <h2 class="fw-bold mb-2"><a href="index.php"><img src="./img/logo.png" style="width:60%;" alt="Logo "></a></h2>
              <h2 class="text-dark-50 mb-3 font-weight-bold">Login</h2>
              <span id="login_message"></span>
              <form action="" method="POST" role="form" id="loginForm" enctype="multipart/form-data">
                <div class="text-left ">
                  <label class="form-label font-weight-bold " for="email">Email Address</label>
                  <div class="input-group mb-3">
                    
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    </div>
                    <input name="email" type="text" id="email" class="form-control form-control-lg" placeholder="Enter your email" required/>
                    <div class="valid_message" id="valid_email">
                    </div>
                    <div class="invalid_message" id="invalid_email">
                    </div>
                  </div>
                </div>

                <div class="text-left ">
                  <label class="form-label font-weight-bold" for="password">Password</label>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                    </div>
                    <input name="password" type="password" id="password" class="form-control form-control-lg" placeholder="Enter your password" required/></br>
                    <div class="input-group-append">
                        <span class="input-group-text"><i id="pass" class="fa fa-eye-slash" onclick="toggleVisibility()"></i></span>
                    </div>
                    <div class="valid_message" id="valid_password">
                    </div>
                    <div class="invalid_message" id="invalid_password">
                    </div>
                    
                  </div>
                </div>
                <img src="captcha.php" style="width:100%;">
                <div class="text-left ">
                    <label class="form-label font-weight-bold" for="phrase">Enter CAPTCHA</label>
                      <input name="phrase" type="text" id="phrase" class="form-control form-control-lg" placeholder="Enter your phrase" required/>
                      <div class="valid_message" id="valid_phrase">
                      </div>
                      <div class="invalid_message" id="invalid_phrase">
                      </div>
                      
                    </div>
                </div>
                <p class="small mb-3 pb-lg-2 text-right"><a class="text-dark font-weight-bold" href="forgot.php">Forgot password?</a></p>

                <button class="btn btn-outline-light btn-lg px-5 btn-block rounded-pill lbtn" type="button" id="loginBtn" ><i class="fa fa-save"></i> Login</button>
              </form>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="login.js"></script>
<?php include_once('includes/footer.php')?>
<?php else: ?>
    <?php 
         $_SESSION['message']='<p><div class="alert alert-success alert-dismissible fade show shadow" role="alert">
          <strong>Welcome to Uza Moti Content Management System!</strong> Please register an admin account to get started.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
          </div></p>';
        $_SESSION['log'] == true;
        echo '<script> location.replace("register.php"); </script>';
        //header("Location: login.php");
        exit();
    ?>
<?php endif ?>
