
<?php  include (getcwd()  .'/admin/server.php'); ?>
<!DOCTYPE html><!--
* CoreUI PRO Bootstrap Admin Template
* @version v5.0.0
* @link https://coreui.io/product/bootstrap-dashboard-template/
* Copyright (c) 2023 creativeLabs Łukasz Holeczek
* License (https://coreui.io/pro/license/)
-->
<html lang="en">
<?php include (getcwd()  .'/views/head.php'); ?>
  <body>
  <div class="min-vh-100 d-flex flex-row align-items-center">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <div class="clearfix">
              <h1 class="float-start display-3 me-4">404</h1>
              <h4 class="pt-3">Oops! You're lost.</h4>
              <p class="text-body-secondary">The page you are looking for was not found.</p>
            </div>
            <div class="input-group"><span class="input-group-text">
                <svg class="icon">
                  <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                </svg></span>
              <input class="form-control" id="prependedInput" size="16" type="text" placeholder="What are you looking for?">
              <button class="btn btn-info" type="button">Search</button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include (getcwd()  .'/views/script.php'); ?>


  </body>
</html>