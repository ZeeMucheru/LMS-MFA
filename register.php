<?php session_start();?>
<?php if(!isset($_SESSION['log'])): ?>
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
                  <h2 class="text-dark-50 mb-3 font-weight-bold">Register New User</h2>
                  <span id="register_message"></span>
                  <form action="" method="POST" role="form" id="registerForm" enctype="multipart/form-data">
                    <div class="text-left ">
                      <label class="form-label font-weight-bold " for="f_name">First Name</label>
                      <div class="input-group mb-3">
                        
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input name="f_name" type="text" id="f_name" class="form-control form-control-lg" placeholder="Enter your first name." required/>
                      </div>
                      <div class="valid_message" id="valid_f_name">
                      </div>
                      <div class="invalid_message" id="invalid_f_name">
                      </div>

                    </div>
                    <div class="text-left ">
                      <label class="form-label font-weight-bold " for="l_name">Last Name</label>
                      <div class="input-group mb-3">
                        
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                        </div>
                        <input name="l_name" type="text" id="l_name" class="form-control form-control-lg" placeholder="Enter your username" required/>
                      </div>
                      <div class="valid_message" id="valid_l_name">
                      </div>
                      <div class="invalid_message" id="invalid_l_name">
                      </div>
                    </div>
    
                    <div class="text-left ">
                      <label class="form-label font-weight-bold" for="email">Email</label>
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        </div>
                        <input name="email" type="email" id="email" class="form-control form-control-lg" placeholder="Enter your email address" required/>
                      </div>
                      <div class="valid_message" id="valid_email">
                      </div>
                      <div class="invalid_message" id="invalid_email">
                      </div>
                    </div>

                    <div class="text-left ">
                      <label class="form-label font-weight-bold " for="phone">Phone</label>
                      <div class="input-group mb-3">
                        
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                        </div>
                        <input name="phone" type="text" id="phone" class="form-control form-control-lg" placeholder="Enter your phone number." required/>
                      </div>
                      <div class="valid_message" id="valid_phone">
                      </div>
                      <div class="invalid_message" id="invalid_phone">
                      </div>
                    </div>
                    <div class="text-left ">
                      <label class="form-label font-weight-bold " for="image">User Image</label>
                      <div class="input-group mb-3">
                        
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1"><i class="fa fa-image" aria-hidden="true"></i></span>
                        </div>
                        <input name="file" accept="image/*" type="file" id="file" class="form-control form-control-lg" placeholder="Enter your phone number." required/>
                      </div>
                      <div class="valid_message" id="valid_file">
                      </div>
                      <div class="invalid_message" id="invalid_file">
                      </div>
                    </div>

    
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
                    <button class="btn btn-outline-light btn-lg px-5 btn-block rounded-pill lbtn" type="button" id="registerBtn" ><i class="fa fa-save"></i> Register</button>
                  </form>
                </div>
    
                
    
              </div>
            </div>
          </div>
        </div> 
      </div>
    </section>
    <script src="register.js"></script>
    
    <?php include_once('includes/footer.php')?>
<?php else: ?>
        <?php
         echo '<script> location.replace("login.php"); </script>';
         //header("Location: login.php");
         exit();
        ?>

<?php endif ?>