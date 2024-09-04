<?php include(getcwd() . '/admin/server.php');
// debug_to_console2($site_url);

// $toasted = "asd";
// array_push($toast,"$toasted");
// var_dump($toast);


$query = "SELECT * FROM user WHERE ndp='$product_id'";
$results = mysqli_query($db, $query);

if (mysqli_num_rows($results) == 1) {
  // $_SESSION['success'] = "You are now logged in";
  $user = mysqli_fetch_assoc($results);
  // debug_to_console("test2");
  // $user['password'] = "";
  // $_SESSION['user_details'] = $user;
  // $_SESSION['username'] = $user["username"];
  // $user_id = $user['id'];
  // var_dump($_SESSION['username2']);

} 
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
              <div class="card-body p-4 d-flex align-items-center">
              <img
                  src="<?php echo $site_url ?>assets/img/user/<?php echo $user['id'] ?>/<?php echo $user['image_url'] ?>"
                  class="img-fluid " alt="...">
                <!-- <div class="row"> -->
                <!-- <div class="col">
                          <div class="card-title fs-4 fw-semibold" data-coreui-i18n="sale">Sale</div>
                        </div> -->
                <!-- <div class="col text-end text-primary fs-4 fw-semibold">$613.200</div> -->
                <!-- </div> -->
                <!-- <div class="card-subtitle text-body-secondary"><span data-coreui-i18n-date="date, { 'date': '2023, 1, 1'}" data-coreui-i18n-date-format="{ 'month': 'long' }">January</span>&nbsp;- <span data-coreui-i18n-date="date, { 'date': '2023, 6, 1'}" data-coreui-i18n-date-format="{ 'year': 'numeric', 'month': 'long' }">July 2023</span></div> -->
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
                      value="<?php echo $user['nama'] ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="2" class="col-sm-2 col-form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="2"
                      value="<?php echo $user['email'] ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="3" class="col-sm-2 col-form-label">ndp</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="3"
                      value="<?php echo $user['ndp'] ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="4" class="col-sm-2 col-form-label">kp</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="4"
                      value="<?php echo $user['kp'] ?>">
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
        </div>

      </div>

    </div>

    <?php include(getcwd() . '/views/footer.php'); ?>

  </div>

  <?php include(getcwd() . '/views/script.php');

  ?>
  <script src="<?php echo $site_url ?>assets/vendors/fullcalendar/js/index.global.min.js"></script>
  <script src="<?php echo $site_url ?>assets/js/calendar.js"></script>
  <script>

  </script>
</body>

</html>