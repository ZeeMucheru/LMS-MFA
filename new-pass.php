<?php 
session_start();
?>
<?php if(isset($_SESSION['restin'])):?>
<?php include_once('includes/header.php')?>
<section class="vh-100 ">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-sm-6 col-lg-6 col-xl-5">
        <div class="card bg-light text-dark" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-2 mt-md-4 pb-5">

            <h2 class="fw-bold mb-2"><a href="index.php"><img src="./img/logo.png" width=200 alt="Logo "></a></h2>
            <h2 class="text-dark-50 mb-3 font-weight-bold">Reset Password</h2>
                  <span id="reset_message"></span>
                  <form action="" method="POST" role="form" id="resetForm" enctype="multipart/form-data">
                    <div class="text-left ">
                      <label class="form-label font-weight-bold" for="password">New Password</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                        <input name="password" type="password" id="password" class="form-control form-control-lg" placeholder="Enter your new password" required/>
                        <div class="input-group-append">
                            <span class="input-group-text"><i id="pass" class="fa fa-eye-slash" onclick="toggleVisibility()"></i></span>
                        </div>
                      </div>
                      <div class="valid_message" id="valid_password">
                      </div>
                      <div class="invalid_message" id="invalid_password">
                      </div>
                    </div>
                    <div class="text-left ">
                      <label class="form-label font-weight-bold" for="confirm_password">Confirm Password</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock" aria-hidden="true"></i></span>
                        </div>
                        <input name="confirm_password" type="password" id="confirm_password" class="form-control form-control-lg" placeholder="Retype your new password" required/>
                        <div class="input-group-append">
                            <span class="input-group-text"><i id="pass1" class="fa fa-eye-slash" onclick="toggleVisibility2()"></i></span>
                        </div>
                        <div class="valid_message" id="valid_confirm_password">
                      </div>
                      <div class="invalid_message" id="invalid_confirm_password">
                      </div>
                      </div>
                    </div>
                    <button class="btn btn-outline-light btn-lg px-5 btn-block rounded-pill lbtn" type="button" id="resetBtn" ><i class="fa fa-save"></i> Reset</button>
                  </form>
            </div>

            
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="new-pass.js"></script>
<?php include_once('includes/footer.php')?>
<?php else: ?>
        <?php
         echo '<script> location.replace("login.php"); </script>';
         //header("Location: login.php");
         exit();
        ?>

<?php endif ?>
