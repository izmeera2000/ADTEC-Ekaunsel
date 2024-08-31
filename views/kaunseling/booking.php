
<?php  include (getcwd()  .'/admin/server.php'); 
// debug_to_console2($site_url);
// showmodal("calendaradd",$modal);

?>
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
  <?php include (getcwd()  .'/views/sidebar.php'); ?>
  <?php include (getcwd()  .'/views/aside.php');  ?>
    <div class="wrapper d-flex flex-column min-vh-100">
    <?php include (getcwd()  .'/views/header.php');  ?>
      <div class="body flex-grow-1">
      <div class="container-lg px-4">
          <div class="fs-2 fw-semibold" >Booking</div>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-4">
              <li class="breadcrumb-item"><a href="#" >Home</a>
              </li>
              <li class="breadcrumb-item"><span >Kaunseling</span>
              </li>
              <li class="breadcrumb-item active"><span >Booking</span>
              </li>
            </ol>
          </nav>
          <div class="card mb-4">
            <div class="card-header fw-bold"> Calendar</div>
            <div class="card-body">
              <div class="example">
              <div class="d-none" id="calendar_user_id"><?php echo $_SESSION['user_details']['id']?></div>
                <!-- <ul class="nav nav-underline-border" role="tablist">
                  <li class="nav-item"><a class="nav-link active" data-coreui-toggle="tab" href="#preview-1000" role="tab">
                      <svg class="icon me-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-media-play"></use>
                      </svg>Preview</a></li>
                  <li class="nav-item"><a class="nav-link" href="https://fullcalendar.io/docs" target="_blank">
                      <svg class="icon me-2">
                        <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-code"></use>
                      </svg>Code</a></li>
                </ul> -->
                <div class="tab-content rounded-bottom">
                  <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                    <div class="bg-body p-3 rounded" id="calendar"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <?php include (getcwd()  .'/views/footer.php'); ?>

    </div>

    <?php include (getcwd()  .'/views/script.php'); ?>
    <script src="<?php echo $site_url ?>assets/vendors/fullcalendar/js/index.global.min.js"></script>
    <script src="<?php echo $site_url ?>assets/js/calendar.js"></script>
<script>

</script>
<?php

?>
  </body>
</html>