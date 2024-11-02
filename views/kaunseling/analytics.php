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

        <div class="fs-2 fw-semibold">Analytics</div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a>
            </li>
            <li class="breadcrumb-item"><span>Kaunseling</span>
            </li>
            <li class="breadcrumb-item active"><span>Analytics</span>
            </li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-xl-4">
            <div class="row">
              <div class="col-lg-12">
                <div class="card overflow-visible mb-4">
                  <div class="card-body p-4">

                    <div class="row">
                      <div class="col">
                        <div class="card-title fs-4 fw-semibold">Kaunseling</div>
                      </div>
                      <div class="col text-end text-primary fs-4 fw-semibold"><?php
                      $query = " SELECT DAYNAME(tarikh) AS day_of_week, COUNT(*) AS total 
                                  FROM kaunselor_jadual 
                                  WHERE MONTH(tarikh) = MONTH(CURDATE())
                                  GROUP BY DAYOFWEEK(tarikh) 
                                  ORDER BY FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');  ";

                      $results = mysqli_query($db, $query);


                      while ($user = mysqli_fetch_assoc($results)) {
                        echo $user['total'];
                      }
                      ?></div>
                    </div>
                    <div class="card-subtitle text-body-secondary">Day Request in <select id="monthSelector">
                        <option value="1">January</option>
                        <option value="2">February</option>
                        <option value="3">March</option>
                        <option value="4">April</option>
                        <option value="5">May</option>
                        <option value="6">June</option>
                        <option value="7">July</option>
                        <option value="8">August</option>
                        <option value="9">September</option>
                        <option value="10">October</option>
                        <option value="11">November</option>
                        <option value="12">December</option>
                      </select>
                      <select id="yearSelector">
                        <?php 
                        
                        
                        $query = "SELECT DISTINCT YEAR(tarikh) as year FROM kaunselor_jadual ORDER BY year DESC ";

                      $results = mysqli_query($db, $query);


                      while ($row = mysqli_fetch_assoc($results)) {
                        $year = $row['year'];
                        
                        ?>

                        <option value="<?php echo $year  ?>"><?php echo $year  ?></option>
                        <?php
                      }
                        ?>
                        

                      </select>
                    </div>
                  </div>
                  <div class="chart-wrapper mt-3" style="height:150px;">
                    <canvas class="chart" id="card-chart-new1" height="75"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex flex-nowrap justify-content-between">
                      <h6 class="card-title text-body-secondary text-truncate">Jumlah Pelajar
                      </h6>
                      <div class="bg-primary bg-opacity-25 text-primary p-2 rounded ms-2">
                        <svg class="icon icon-xl">
                          <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-people">
                          </use>
                        </svg>
                      </div>
                    </div>
                    <div class="fs-4 fw-semibold pb-3">
                      <?php
                      $query = " SELECT count(id) FROM user WHERE  role='2';";

                      $results = mysqli_query($db, $query);


                      while ($user = mysqli_fetch_assoc($results)) {
                        echo $user['count(id)'];
                      }
                      ?>
                    </div>
                    <!-- <small class="text-danger">(-12.4%
                        <svg class="icon">
                          <use
                            xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom">
                          </use>
                        </svg>)</small> -->
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="card mb-4">
                  <div class="card-body">
                    <div class="d-flex flex-nowrap justify-content-between">
                      <h6 class="card-title text-body-secondary text-truncate" data-coreui-i18n="orders">Jumlah
                        Borang<br>Psikologi</h6>
                      <div
                        class="bg-primary bg-opacity-25 text-primary p-2 rounded ms-2  d-flex justify-content-center align-items-center">
                        <svg class="icon icon-xl ">
                          <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-cart">
                          </use>
                        </svg>
                      </div>
                    </div>
                    <div class="fs-4 fw-semibold pb-3">
                      <?php
                      $query = " SELECT count(id) FROM user_psikologi ;";

                      $results = mysqli_query($db, $query);


                      while ($user = mysqli_fetch_assoc($results)) {
                        echo $user['count(id)'];
                      }
                      ?>
                    </div>
                    <!-- <small class="text-success">(17.2%
                        <svg class="icon">
                          <use
                            xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-arrow-top">
                          </use>
                        </svg>)</small> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8">
            <div class="card overflow-visible mb-4">
              <div class="card-body p-4">
                <div class="card-title fs-4 fw-semibold" data-coreui-i18n="traffic">Kaunseling Request</div>
                <div class="card-subtitle text-body-secondary"><span>January ,
                    <?php echo date("Y"); ?></span>&nbsp;-&nbsp;<span>December ,
                    <?php echo date("Y"); ?></span></div>
                <div class="chart-wrapper" style="height:300px;margin-top:40px;">
                  <canvas class="chart" id="main-bar-chart" height="300"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">

          <div class="card mb-4">
            <div class="card-header fw-bold"> Kaunseling Analytics</div>
            <div class="card-body">

              <table class="table mb-0 table-hover " id="meetinganlytics">
                <thead>
                  <tr>
                    <th>Masalah</th>
                    <th>Gender</th>
                    <th>Status</th>
                    <!-- Other columns -->
                  </tr>
                  <tr id="filters" class="d-none d-md-table-row">

                    <th>
                      <select id="MasalahF">
                        <!-- <option value="">All</option> -->
                        <!-- <option value="1">Yes</option>
                        <option value="0">No</option> -->
                        <!-- Add other msalah options if needed -->
                      </select>

                    </th>

                    <th>
                      <select id="JantinaF">
                        <option value="">All</option>
                        <option value="Lelaki">Lelaki</option>
                        <option value="Perempuan">Perempuan</option>
                        <!-- Add other gender options if needed -->
                      </select>
                    </th>
                    <th>
                      <select id="StatusF">
                        <option value="">All</option>
                        <option value="2">Success</option>
                        <option value="1">Waiting</option>
                        <option value="0">Fail</option>
                        <!-- Add other msalah options if needed -->
                      </select>

                    </th>
                  </tr>
                </thead>
                <tbody>
                </tbody>
              </table>
            </div>
          </div>
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