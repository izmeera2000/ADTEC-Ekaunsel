<?php include(getcwd() . '/admin/server.php');


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
        <div class="fs-2 fw-semibold" data-coreui-i18n="dashboard">Dashboard</div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#" data-coreui-i18n="home">Home</a>
            </li>
            <li class="breadcrumb-item active"><span data-coreui-i18n="dashboard">Dashboard</span>
            </li>
          </ol>
        </nav>

        <?php
        if (($_SESSION['user_details']['role'] != 1)) {
          ?>


          <div class="row">


            <?php
            $query =
              "SELECT * FROM user_dashboard ORDER BY _order ASC";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) > 0) {

              while ($row = $results->fetch_assoc()) {
                $filepath = $row['filepath']
                  ?>
                <div class="col-md-12">
                  <div class="card mb-4">
                    <div class="card-body p-4">
                      <!-- <div class="card-title fs-4 fw-semibold">Traffic</div> -->
                      <!-- <div class="card-subtitle text-body-secondary border-bottom mb-3 pb-4" href="#"
                    data-coreui-i18n="lastWeek">Last Week</div> -->
                      <img class="img-fluid    mx-auto  d-block"
                        src="<?php echo $site_url ?>assets/img/user_dashboard/<?php echo $filepath ?>">
                      <!-- /.row-->
                    </div>
                  </div>
                </div>
              <?php }
            }
            ?>


            <!-- /.col-->
          </div>




          <?php
        } else {
          ?>
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
                      <div class="card-subtitle text-body-secondary">Day Request in <?php echo date("M"); ?>
                        <?php echo date("Y"); ?></span>
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
                          <svg class="icon icon-xl">
                            <use
                              xlink:href="<?php echo $site_url ?>assets/vendors/bootstrap-icons/bootstrap-icons.svg#file-text">
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
            <div class="col-xl-9">
              <div class="card mb-4">
                <div class="card-body p-4">
                  <div class="row">
                    <div class="col">
                      <div class="card-title fs-4 fw-semibold">Pelajar Request</div>
                      <div class="card-subtitle text-body-secondary mb-4"><?php

                      $query = "SELECT 
                              a.user_id, 
                            
                              MAX(a.tarikh) AS latest_tarikh,  
                              b.* 
                          FROM 
                              kaunselor_jadual a
                          INNER JOIN 
                              user b ON a.user_id = b.id
                          GROUP BY 
                              a.user_id
                          ORDER BY 
                              latest_tarikh DESC
                          LIMIT 6;
                      ";

                      $results = mysqli_query($db, $query);
                      $n = 0;
                      while ($user = mysqli_fetch_assoc($results)) {
                        $n++;
                      }
                      echo number_format($n, 0, '', ',') . " pelajar";

                      ?>
                      </div>
                    </div>

                  </div>
                  <div class="table-responsive">
                    <table class="table mb-0">
                      <thead class="fw-semibold text-body-secondary">
                        <tr class="align-middle">
                          <th class="text-center">
                            <svg class="icon">
                              <use
                                xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-people">
                              </use>
                            </svg>
                          </th>
                          <th data-coreui-i18n="user">User</th>
                          <th data-coreui-i18n="activity">Activity</th>
                          <th>Action</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $query = "SELECT DISTINCT a.id ,user_id, tarikh ,event_status, b.image_url,b.nama, b.ndp 
                        FROM kaunselor_jadual a 
                        INNER JOIN user b ON a.user_id = b.id 
                        GROUP BY user_id 
                        ORDER BY tarikh DESC 
                        LIMIT 6;";

                        $results = mysqli_query($db, $query);


                        while ($user = mysqli_fetch_assoc($results)) { ?>
                          <tr class="align-middle">
                            <td class="text-center">
                              <?php



                              if ($user['event_status'] == "0") {

                                $class = "danger";
                              }
                              if ($user['event_status'] == "1") {
                                $class = "warning";


                              }

                              if ($user['event_status'] == "2") {
                                $class = "success";


                              }

                              if ($user['event_status'] == "3") {
                                $class = "info";


                              }
                              if ($user['event_status'] == "4") {
                                $class = "secondary";


                              }

                              ?>
                              <div class="avatar avatar-md"><img class="avatar-img"
                                  src="assets/img/user/<?php echo $user['user_id'] ?>/<?php echo $user['image_url'] ?>"
                                  alt="user@email.com"><span class="avatar-status bg-<?php echo $class ?>"></span></div>
                            </td>
                            <td>
                              <div class="text-nowrap"><?php echo $user['nama'] ?></div>
                              <div class="small text-body-secondary text-nowrap"><?php echo $user['ndp'] ?>
                              </div>
                            </td>


                            <td>
                              <div class="small text-body-secondary" data-coreui-i18n="lastLogin">Last request</div>
                              <div class="fw-semibold text-nowrap"><?php echo date('d F Y', strtotime($user['tarikh'])) ?>
                              </div>
                            </td>
                            <td>
                              <a class="btn btn-<?php echo $class ?>"
                                href="<?php echo $site_url . 'kaunseling/temujanji/' . $user['id'] ?>">
                                <i class="icon  bi bi-calendar-x"></i>
                              </a>
                            </td>
                          </tr>
                          <?php
                        }
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3">
              <div class="row">

                <div class="col-md-4 col-xl-12">
                  <div class="card mb-4 text-white bg-success-gradient">
                    <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <?php

                        $query = "SELECT  COUNT(*) as total FROM `kaunselor_jadual` WHERE event_status = '2';";

                        $results = mysqli_query($db, $query);
                        while ($user = mysqli_fetch_assoc($results)) {
                          $total = $user['total'];
                        }
                        ?>
                        <div class="fs-4 fw-semibold"><?php echo $total ?></div>
                        <div data-coreui-i18n="conversionRate" class="mb-3">Kaunseling Berjaya</div>
                      </div>

                    </div>
                    <!-- <div class="chart-wrapper mt-3" style="height:80px;"> -->
                    <!-- <canvas class="chart" id="card-chart3" height="70"></canvas> -->
                    <!-- </div> -->
                  </div>
                </div>
                <div class="col-md-4 col-xl-12">
                  <div class="card mb-4 text-white bg-danger-gradient">
                    <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <?php

                        $query = "SELECT  COUNT(*) as total FROM `kaunselor_jadual` WHERE event_status = '0';";

                        $results = mysqli_query($db, $query);
                        while ($user = mysqli_fetch_assoc($results)) {
                          $total = $user['total'];
                        }
                        ?>
                        <div class="fs-4 fw-semibold"><?php echo $total ?></div>
                        <div data-coreui-i18n="sessions" class="mb-3">Kaunseling Reject</div>
                      </div>

                    </div>
                    <!-- <div class="chart-wrapper mt-3 mx-3" style="height:80px;"> -->
                    <!-- <canvas class="chart" id="card-chart4" height="70"></canvas> -->
                    <!-- </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>

          <?php
        }

        ?>

        <!-- /.row-->
      </div>
    </div>
    <?php include(getcwd() . '/views/footer.php'); ?>

  </div>

  <?php include(getcwd() . '/views/script.php'); ?>


</body>

</html>