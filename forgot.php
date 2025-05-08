<?php 
session_start();
?>
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
 
            <h2 class="fw-bold mb-2"><a href="index.php"><img src="./img/logo.png" width=200 alt="Logo "></a></h2>
              <h2 class="text-dark-50 mb-3 font-weight-bold">Forgot Password</h2>
              <span id="forgot_message"></span>
              <form action="" method="POST" role="form" id="forgotForm" enctype="multipart/form-data">
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

                <button class="btn btn-outline-light btn-lg px-5 btn-block rounded-pill lbtn" type="button" id="forgotBtn" ><i class="fa fa-save"></i> Submit</button>
              </form>
            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script src="forgot.js"></script>
<?php include_once('includes/footer.php')?>
