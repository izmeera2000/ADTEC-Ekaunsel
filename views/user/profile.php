<?php include(getcwd() . '/admin/server.php');
// debug_to_console2($site_url);

// $toasted = "asd";
// array_push($toast,"$toasted");
// var_dump($toast);
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
  <?php include(getcwd() . '/views/sidebar.php'); ?>
  <?php include(getcwd() . '/views/aside.php'); ?>

  <div class="wrapper d-flex flex-column min-vh-100">
    <?php include(getcwd() . '/views/header.php'); ?>
    <div class="body flex-grow-1">
      <div class="container-lg px-4">

        <div class="fs-2 fw-semibold">Profile</div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a>
            </li>
            <li class="breadcrumb-item"><span>User</span>
            </li>
            <li class="breadcrumb-item active"><span>Profile</span>
            </li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-xl-4">
            <div class="card  mb-4  h-100">

              <!-- <div class="row"> -->
              <!-- <div class="col">
                          <div class="card-title fs-4 fw-semibold" data-coreui-i18n="sale">Sale</div>
                        </div> -->
              <!-- <div class="col text-end text-primary fs-4 fw-semibold">$613.200</div> -->
              <!-- </div> -->
              <!-- <div class="card-subtitle text-body-secondary"><span data-coreui-i18n-date="date, { 'date': '2023, 1, 1'}" data-coreui-i18n-date-format="{ 'month': 'long' }">January</span>&nbsp;- <span data-coreui-i18n-date="date, { 'date': '2023, 6, 1'}" data-coreui-i18n-date-format="{ 'year': 'numeric', 'month': 'long' }">July 2023</span></div> -->

              <div class="card-body p-4 d-flex align-items-center">
                <!-- <canvas class="chart" id="card-chart-new1" height="75"></canvas> -->
                <img
                  src="<?php echo $site_url ?>assets/img/user/<?php echo $_SESSION['user_details']['id'] ?>/<?php echo $_SESSION['user_details']['image_url'] ?>"
                  class="img-fluid" alt="...">


                <!-- <button type="button" class="btn btn-primary" id="liveToastBtn">Show live toast</button> -->

              </div>
              <div class="chart-wrapper mt-3 mb-3 mx-3" style="">
                <form method="POST"  enctype="multipart/form-data">


                  <p class="mt-3 text-center">Change picture</p>

                  <div class="input-group my-3">

                    <input class="form-control <?php formvalidatelabel("gambar", $errors) ?>" type="file" id="test"
                      name="gambar" required>
                      <button class="btn btn-primary" type="submit" name="change_pic">Change</button>
                      <div class="valid-feedback">Looks good!</div>
                      <div class="invalid-feedback"><?php formvalidateerr("gambar", $errors) ?></div>

                  </div>
                  <div class="text-body-secondary small">Only JPG, JPEG & PNG files are allowed. And Under 5MB</div>

                </form>
              </div>
            </div>


          </div>
          <div class="col-xl-8">

            <div class="card mb-4 h-100">
              <div class="card-body p-4">
                <div class="card-title fs-4 fw-semibold" data-coreui-i18n="traffic">User Details</div>
                <p class="text-body-secondary">Details of user</p>


                <div class="mb-3 row">
                  <label for="1" class="col-sm-2 col-form-label">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="1"
                      value="<?php echo $_SESSION['user_details']['nama'] ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="2" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="2"
                      value="<?php echo $_SESSION['user_details']['email'] ?>">
                  </div>
                </div>
                <?php if (($_SESSION['user_details']['role'] != 1)) { ?>

                  <div class="mb-3 row">
                    <label for="3" class="col-sm-2 col-form-label">ndp</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="3"
                        value="<?php echo $_SESSION['user_details']['ndp'] ?>">
                    </div>
                  </div>
                <?php } ?>
                <div class="mb-3 row">
                  <label for="4" class="col-sm-2 col-form-label">kp</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="4"
                      value="<?php echo $_SESSION['user_details']['kp'] ?>">
                  </div>
                </div>

                <div class="row">
                  <div class="text-end">
                    <!-- <button class="btn btn-primary px-4" type="button">Save Changes</button> -->
                  </div>

                </div>
              </div>
            </div>
          </div>

          <?php if (($_SESSION['user_details']['role'] == 1)) { ?>
            <div class="col-xl-6">

              <div class="card my-4  ">
                <div class="card-body p-4">
                  <div class="card-title fs-4 fw-semibold" data-coreui-i18n="traffic">Google Auth</div>
                  <p class="text-body-secondary">Link with Google</p>


                  <?php



                  // $accessToken = getAccessTokenFromDatabase($_SESSION['user_details']['id'], $db);


                  if (isset($_SESSION['user_details']['access_token'])) {


                    // $client = new Google_Client();




                    // $client = new Google_Client();
                    // $client->setAuthConfig('../client_secret.json');
                    // $client->addScope(Google_Service_Calendar::CALENDAR);
                    // $client->setAccessToken($_SESSION['user_details']['access_token']);
                
                    // $calendarService = new Google_Service_Calendar($client);
                
                    // // Create a Google Meet event
                    // $event = new Google_Service_Calendar_Event(array(
                    //   'summary' => 'Google Meet Meeting',
                    //   'start' => array(
                    //     'dateTime' => '2024-09-19T10:00:00-07:00', // Specify your date and time here
                    //     'timeZone' => 'America/Los_Angeles',
                    //   ),
                    //   'end' => array(
                    //     'dateTime' => '2024-09-19T11:00:00-07:00',
                    //     'timeZone' => 'America/Los_Angeles',
                    //   ),
                    //   'conferenceData' => array(
                    //     'createRequest' => array(
                    //       'requestId' => 'random-string',
                    //       'conferenceSolutionKey' => array(
                    //         'type' => 'hangoutsMeet'
                    //       ),
                    //     ),
                    //   ),
                    // ));
                
                    // $event = $calendarService->events->insert('primary', $event, array('conferenceDataVersion' => 1));
                
                    // // Get the Google Meet link
                    // $googleMeetLink = $event->getHangoutLink();
                    // echo 'Meet Link: ' . $googleMeetLink;
                    ?>
                    <button type="button" class="btn btn-primary">Connected</button>

                    <?php


                  } else {


                    ?>

                    <a href="<?php echo $site_url ?>goauth" class="btn btn-secondary">Not Connected</a>

                    <?php
                  }
                  ?>

                  <div class="row">
                    <div class="text-end">
                      <!-- <button class="btn btn-primary px-4" type="button">Save Changes</button> -->
                    </div>

                  </div>
                </div>
              </div>
            </div>

          <?php } ?>
        </div>

      </div>

    </div>

    <?php include(getcwd() . '/views/footer.php'); ?>

  </div>

  <?php include(getcwd() . '/views/script.php');

  ?>
  <!-- <script src="<?php echo $site_url ?>assets/vendors/fullcalendar/js/index.global.min.js"></script> -->
  <!-- <script src="<?php echo $site_url ?>assets/js/calendar.js"></script> -->
  <script>

  </script>
</body>

</html>