<?php include_once('includes/header.php')?>
<section class="vh-100 ">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-sm-6 col-lg-6 col-xl-5">
        <div class="card bg-light text-dark" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-2 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2"><a href="index.php"><img src="./img/logo.png" width=200 alt="Logo "></a></h2>
              <h2 class="text-dark-50 mb-3 font-weight-bold">Contact Support</h2>
              <form action="#" method="post">
                <div class="text-left ">
                    <label class="form-label font-weight-bold " for="username">Username</label>
                    <div class="input-group mb-3">
                    
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                    </div>
                    <input type="text" id="username" class="form-control form-control-lg" placeholder="Enter your username"/>
                    </div>
                </div>

                <div class="text-left ">
                    <label class="form-label font-weight-bold" for="email">Email</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    </div>
                    <input type="email" id="email" class="form-control form-control-lg" placeholder="Enter your email address" />
                    </div>
                </div>

                <div class="text-left ">
                    <label class="form-label font-weight-bold" for="phone">Phone</label>
                    <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone-square" aria-hidden="true"></i></span>
                    </div>
                    <input type="number" id="phone" class="form-control form-control-lg" placeholder="Enter your phone number" />
                    </div>
                </div>
                <div class="text-left mb-2">
                    <label class="form-label font-weight-bold" for="description">Description</label>
                    <textarea id="description" class="form-control form-rounded" rows="3"></textarea>
                </div>

                <button class="btn btn-outline-light btn-lg px-5 btn-block rounded-pill lbtn" type="submit">Submit</button>
               </form>
            </div>

            

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include_once('includes/footer.php')?>