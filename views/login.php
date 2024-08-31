<?php include(getcwd() . '/admin/server.php');

// var_dump($errors);
// var_dump($_POST);
?>
<!DOCTYPE html><!--
* CoreUI PRO Bootstrap Admin Template
* @version v5.0.0
* @link https://coreui.io/product/bootstrap-dashboard-template/
* Copyright (c) 2023 creativeLabs Łukasz Holeczek
* License (https://coreui.io/pro/license/)
-->
<html lang="en">
<?php include(getcwd() . '/views/head.php'); ?>

<body>
  <div class="min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card-group d-block d-md-flex row">
            <div class="card col-md-7 p-4 mb-0">
              <form method="POST" action="login" enctype="multipart/form-data">

                <div class="card-body ">
                  <h1>Login</h1>
                  <p class="text-body-secondary">Sign In to your account</p>
                  <div class="input-group mb-3"><span class="input-group-text">
                      <svg class="icon">
                        <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-user">
                        </use>
                      </svg></span>
                    <input class="form-control <?php formvalidatelabel("login", $errors) ?>" type="text"
                      placeholder="NDP or Email" name="login" required>
                  </div>
                  <div class="input-group mb-4 <?php formvalidatelabel("login", $errors) ?>"><span class="input-group-text">
                      <svg class="icon">
                        <use
                          xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked">
                        </use>
                      </svg></span>
                    <input class="form-control <?php formvalidatelabel("login", $errors) ?>" type="password"
                      placeholder="Password" name="password" required>
                      <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback"><?php formvalidateerr("login", $errors) ?> </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <button class="btn btn-primary px-4" type="submit" name="user_login"  >Login</button>
                    </div>
                    <div class="col-6 text-end">
                      <button class="btn btn-link px-0" type="button">Forgot password?</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
            <div class="card col-md-5 text-white bg-primary py-5">
              <div class="card-body text-center">
                <div>
                  <h2>Sign up</h2>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut
                    labore et dolore magna aliqua.</p>
                  <a class="btn btn-lg btn-outline-light mt-3" href="<?php echo $site_url ?>register">Register Now!</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include(getcwd() . '/views/script.php'); ?>


</body>

</html>