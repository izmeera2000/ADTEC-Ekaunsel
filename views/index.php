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
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-body p-4">
                  <!-- <div class="card-title fs-4 fw-semibold">Traffic</div> -->
                  <!-- <div class="card-subtitle text-body-secondary border-bottom mb-3 pb-4" href="#"
                    data-coreui-i18n="lastWeek">Last Week</div> -->
                  <img class="img-fluid    mx-auto  d-block" src="<?php echo $site_url ?>assets/img/d1.png">
                  <!-- /.row-->
                </div>
              </div>
            </div>

            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-body p-4">
                  <!-- <div class="card-title fs-4 fw-semibold">Traffic</div> -->
                  <!-- <div class="card-subtitle text-body-secondary border-bottom mb-3 pb-4" href="#"
                    data-coreui-i18n="lastWeek">Last Week</div> -->
                  <img class="img-fluid   mx-auto  d-block" src="<?php echo $site_url ?>assets/img/d2.png">
                  <!-- /.row-->
                </div>
              </div>
            </div>
            

            
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-body p-4">
                  <!-- <div class="card-title fs-4 fw-semibold">Traffic</div> -->
                  <!-- <div class="card-subtitle text-body-secondary border-bottom mb-3 pb-4" href="#"
                    data-coreui-i18n="lastWeek">Last Week</div> -->
                  <img class="img-fluid   mx-auto  d-block" src="<?php echo $site_url ?>assets/img/d4.png">
                  <!-- /.row-->
                </div>
              </div>
            </div>
            <!-- /.col-->
          </div>




          <?php
        } else {
          ?>
          <div class="row">
            <div class="col-xl-4">
              <div class="row">
                <div class="col-lg-12">
                  <div class="card overflow-hidden mb-4">
                    <div class="card-body p-4">

                      <div class="row">
                        <div class="col">
                          <div class="card-title fs-4 fw-semibold" data-coreui-i18n="sale">Sale</div>
                        </div>
                        <div class="col text-end text-primary fs-4 fw-semibold">$613.200</div>
                      </div>
                      <div class="card-subtitle text-body-secondary"><span
                          data-coreui-i18n-date="date, { 'date': '2023, 1, 1'}"
                          data-coreui-i18n-date-format="{ 'month': 'long' }">January</span>&nbsp;- <span
                          data-coreui-i18n-date="date, { 'date': '2023, 6, 1'}"
                          data-coreui-i18n-date-format="{ 'year': 'numeric', 'month': 'long' }">July 2023</span></div>
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
                        <h6 class="card-title text-body-secondary text-truncate" data-coreui-i18n="customers">Customers
                        </h6>
                        <div class="bg-primary bg-opacity-25 text-primary p-2 rounded ms-2">
                          <svg class="icon icon-xl">
                            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-people">
                            </use>
                          </svg>
                        </div>
                      </div>
                      <div class="fs-4 fw-semibold pb-3">44.725</div><small class="text-danger">(-12.4%
                        <svg class="icon">
                          <use
                            xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom">
                          </use>
                        </svg>)</small>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="card mb-4">
                    <div class="card-body">
                      <div class="d-flex flex-nowrap justify-content-between">
                        <h6 class="card-title text-body-secondary text-truncate" data-coreui-i18n="orders">Orders</h6>
                        <div class="bg-primary bg-opacity-25 text-primary p-2 rounded ms-2">
                          <svg class="icon icon-xl">
                            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-cart">
                            </use>
                          </svg>
                        </div>
                      </div>
                      <div class="fs-4 fw-semibold pb-3">385</div><small class="text-success">(17.2%
                        <svg class="icon">
                          <use
                            xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-arrow-top">
                          </use>
                        </svg>)</small>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-8">
              <div class="card mb-4">
                <div class="card-body p-4">
                  <div class="card-title fs-4 fw-semibold" data-coreui-i18n="traffic">Traffic</div>
                  <div class="card-subtitle text-body-secondary"><span
                      data-coreui-i18n-date="date, { 'date': '2022, 1, 1'}"
                      data-coreui-i18n-date-format="{ 'year': 'numeric', 'month': 'long', 'day': 'numeric' }">January 01,
                      2022</span>&nbsp;-&nbsp;<span data-coreui-i18n-date="date, { 'date': '2022, 12, 31'}"
                      data-coreui-i18n-date-format="{ 'year': 'numeric', 'month': 'long', 'day': 'numeric' }">December 31,
                      2022</span></div>
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
                      <div class="card-title fs-4 fw-semibold" data-coreui-i18n="users">Users</div>
                      <div class="card-subtitle text-body-secondary mb-4"
                        data-coreui-i18n="registeredUsersCounter, { 'counter': '1.232.150' }">1.232.150 registered users
                      </div>
                    </div>
                    <div class="col-auto ms-auto">
                      <button class="btn btn-secondary">
                        <svg class="icon me-2">
                          <use
                            xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-user-plus">
                          </use>
                        </svg><span data-coreui-i18n="addNewUser">Add new user</span>
                      </button>
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
                          <th class="text-center" data-coreui-i18n="country">Country</th>
                          <th data-coreui-i18n="usage">Usage</th>
                          <th data-coreui-i18n="activity">Activity</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="align-middle">
                          <td class="text-center">
                            <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/1.jpg"
                                alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                          </td>
                          <td>
                            <div class="text-nowrap">Yiorgos Avraamu</div>
                            <div class="small text-body-secondary text-nowrap"><span data-coreui-i18n="new">New</span> |
                              <span data-coreui-i18n="registered">Registered: </span><span
                                data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan 1, 2020</span>
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/flag.svg#cif-us">
                              </use>
                            </svg>
                          </td>
                          <td>
                            <div class="d-flex justify-content-between align-items-baseline">
                              <div class="fw-semibold">50%</div>
                              <div class="text-nowrap small text-body-secondary ms-3"><span
                                  data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 6, 11'}"></span> - <span
                                  data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 7, 10'}"> </span></div>
                            </div>
                            <div class="progress progress-thin mt-1">
                              <div class="progress-bar bg-success-gradient" role="progressbar" style="width: 50%"
                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <div class="small text-body-secondary" data-coreui-i18n="lastLogin">Last login</div>
                            <div class="fw-semibold text-nowrap"
                              data-coreui-i18n="relativeTime, { 'val': -10, 'range': 'seconds' }">10 sec ago</div>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button"
                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                  <use
                                    xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-options">
                                  </use>
                                </svg>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"
                                  data-coreui-i18n="info">Info</a><a class="dropdown-item" href="#"
                                  data-coreui-i18n="edit">Edit</a><a class="dropdown-item text-danger" href="#"
                                  data-coreui-i18n="delete">Delete</a></div>
                            </div>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td class="text-center">
                            <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/2.jpg"
                                alt="user@email.com"><span class="avatar-status bg-danger-gradient"></span></div>
                          </td>
                          <td>
                            <div class="text-nowrap">Avram Tarasios</div>
                            <div class="small text-body-secondary text-nowrap"><span
                                data-coreui-i18n="recurring">Recurring</span> | <span
                                data-coreui-i18n="registered">Registered: </span><span
                                data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan 1, 2020</span>
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/flag.svg#cif-br">
                              </use>
                            </svg>
                          </td>
                          <td>
                            <div class="d-flex justify-content-between align-items-baseline">
                              <div class="fw-semibold">50%</div>
                              <div class="text-nowrap small text-body-secondary ms-3"><span
                                  data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 6, 11'}"></span> - <span
                                  data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 7, 10'}"> </span></div>
                            </div>
                            <div class="progress progress-thin mt-1">
                              <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 10%"
                                aria-valuenow="10" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <div class="small text-body-secondary" data-coreui-i18n="lastLogin">Last login</div>
                            <div class="fw-semibold text-nowrap"
                              data-coreui-i18n="relativeTime, { 'val': -5, 'range': 'minutes' }">5 minutes ago</div>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button"
                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                  <use
                                    xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-options">
                                  </use>
                                </svg>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"
                                  data-coreui-i18n="info">Info</a><a class="dropdown-item" href="#"
                                  data-coreui-i18n="edit">Edit</a><a class="dropdown-item text-danger" href="#"
                                  data-coreui-i18n="delete">Delete</a></div>
                            </div>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td class="text-center">
                            <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/3.jpg"
                                alt="user@email.com"><span class="avatar-status bg-warning-gradient"></span></div>
                          </td>
                          <td>
                            <div class="text-nowrap">Quintin Ed</div>
                            <div class="small text-body-secondary text-nowrap"><span data-coreui-i18n="new">New</span> |
                              <span data-coreui-i18n="registered">Registered: </span><span
                                data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan 1, 2020</span>
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/flag.svg#cif-in">
                              </use>
                            </svg>
                          </td>
                          <td>
                            <div class="d-flex justify-content-between align-items-baseline">
                              <div class="fw-semibold">50%</div>
                              <div class="text-nowrap small text-body-secondary ms-3"><span
                                  data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 6, 11'}"></span> - <span
                                  data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 7, 10'}"> </span></div>
                            </div>
                            <div class="progress progress-thin mt-1">
                              <div class="progress-bar bg-warning-gradient" role="progressbar" style="width: 74%"
                                aria-valuenow="74" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <div class="small text-body-secondary" data-coreui-i18n="lastLogin">Last login</div>
                            <div class="fw-semibold text-nowrap"
                              data-coreui-i18n="relativeTime, { 'val': -1, 'range': 'hours' }">1 hour ago</div>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button"
                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                  <use
                                    xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-options">
                                  </use>
                                </svg>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"
                                  data-coreui-i18n="info">Info</a><a class="dropdown-item" href="#"
                                  data-coreui-i18n="edit">Edit</a><a class="dropdown-item text-danger" href="#"
                                  data-coreui-i18n="delete">Delete</a></div>
                            </div>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td class="text-center">
                            <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/4.jpg"
                                alt="user@email.com"><span class="avatar-status bg-secondary-gradient"></span></div>
                          </td>
                          <td>
                            <div class="text-nowrap">Enéas Kwadwo</div>
                            <div class="small text-body-secondary text-nowrap"><span data-coreui-i18n="new">New</span> |
                              <span data-coreui-i18n="registered">Registered: </span><span
                                data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan 1, 2020</span>
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/flag.svg#cif-fr">
                              </use>
                            </svg>
                          </td>
                          <td>
                            <div class="d-flex justify-content-between align-items-baseline">
                              <div class="fw-semibold">50%</div>
                              <div class="text-nowrap small text-body-secondary ms-3"><span
                                  data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 6, 11'}"></span> - <span
                                  data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 7, 10'}"> </span></div>
                            </div>
                            <div class="progress progress-thin mt-1">
                              <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 98%"
                                aria-valuenow="98" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <div class="small text-body-secondary" data-coreui-i18n="lastLogin">Last login</div>
                            <div class="fw-semibold text-nowrap"
                              data-coreui-i18n="relativeTime, { 'val': -1, 'range': 'weeks' }">Last month</div>
                          </td>
                          <td>
                            <div class="dropdown">
                              <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button"
                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                  <use
                                    xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-options">
                                  </use>
                                </svg>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"
                                  data-coreui-i18n="info">Info</a><a class="dropdown-item" href="#"
                                  data-coreui-i18n="edit">Edit</a><a class="dropdown-item text-danger" href="#"
                                  data-coreui-i18n="delete">Delete</a></div>
                            </div>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td class="text-center">
                            <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/5.jpg"
                                alt="user@email.com"><span class="avatar-status bg-success"></span></div>
                          </td>
                          <td>
                            <div class="text-nowrap">Agapetus Tadeáš</div>
                            <div class="small text-body-secondary text-nowrap"><span data-coreui-i18n="new">New</span> |
                              <span data-coreui-i18n="registered">Registered: </span><span
                                data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan 1, 2020</span>
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/flag.svg#cif-es">
                              </use>
                            </svg>
                          </td>
                          <td>
                            <div class="d-flex justify-content-between align-items-baseline">
                              <div class="fw-semibold">50%</div>
                              <div class="text-nowrap small text-body-secondary ms-3"><span
                                  data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 6, 11'}"></span> - <span
                                  data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 7, 10'}"> </span></div>
                            </div>
                            <div class="progress progress-thin mt-1">
                              <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 22%"
                                aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <div class="small text-body-secondary" data-coreui-i18n="lastLogin">Last login</div>
                            <div class="fw-semibold text-nowrap"
                              data-coreui-i18n="relativeTime, { 'val': -3, 'range': 'months' }"></div>
                          </td>
                          <td>
                            <div class="dropdown dropup">
                              <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button"
                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                  <use
                                    xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-options">
                                  </use>
                                </svg>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"
                                  data-coreui-i18n="info">Info</a><a class="dropdown-item" href="#"
                                  data-coreui-i18n="edit">Edit</a><a class="dropdown-item text-danger" href="#"
                                  data-coreui-i18n="delete">Delete</a></div>
                            </div>
                          </td>
                        </tr>
                        <tr class="align-middle">
                          <td class="text-center">
                            <div class="avatar avatar-md"><img class="avatar-img" src="assets/img/avatars/6.jpg"
                                alt="user@email.com"><span class="avatar-status bg-danger-gradient"></span></div>
                          </td>
                          <td>
                            <div class="text-nowrap">Friderik Dávid</div>
                            <div class="small text-body-secondary text-nowrap"><span data-coreui-i18n="new">New</span> |
                              <span data-coreui-i18n="registered">Registered: </span><span
                                data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 1, 10'}">Jan 1, 2020</span>
                            </div>
                          </td>
                          <td class="text-center">
                            <svg class="icon icon-xl">
                              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/flag.svg#cif-pl">
                              </use>
                            </svg>
                          </td>
                          <td>
                            <div class="d-flex justify-content-between align-items-baseline">
                              <div class="fw-semibold">50%</div>
                              <div class="text-nowrap small text-body-secondary ms-3"><span
                                  data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 6, 11'}"></span> - <span
                                  data-coreui-i18n-date="dateShortMonthName, { 'date': '2023, 7, 10'}"> </span></div>
                            </div>
                            <div class="progress progress-thin mt-1">
                              <div class="progress-bar bg-success-gradient" role="progressbar" style="width: 43%"
                                aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            <div class="small text-body-secondary" data-coreui-i18n="lastLogin">Last login</div>
                            <div class="fw-semibold text-nowrap"
                              data-coreui-i18n="relativeTime, { 'val': -1, 'range': 'years' }"></div>
                          </td>
                          <td>
                            <div class="dropdown dropup">
                              <button class="btn btn-transparent p-0 dark:text-high-emphasis" type="button"
                                data-coreui-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <svg class="icon">
                                  <use
                                    xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-options">
                                  </use>
                                </svg>
                              </button>
                              <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"
                                  data-coreui-i18n="info">Info</a><a class="dropdown-item" href="#"
                                  data-coreui-i18n="edit">Edit</a><a class="dropdown-item text-danger" href="#"
                                  data-coreui-i18n="delete">Delete</a></div>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3">
              <div class="row">
                <div class="col-md-4 col-xl-12">
                  <div class="card mb-4 text-white bg-primary-gradient">
                    <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="fs-4 fw-semibold">26K <span class="fs-6 fw-normal">(-12.4%
                            <svg class="icon">
                              <use
                                xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom">
                              </use>
                            </svg>)</span></div>
                        <div data-coreui-i18n="users">Users</div>
                      </div>
                      <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          <svg class="icon">
                            <use
                              xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-options">
                            </use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"
                            data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#"
                            data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item" href="#"
                            data-coreui-i18n="somethingElseHere">Something else here</a></div>
                      </div>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:80px;">
                      <canvas class="chart" id="card-chart1" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-xl-12">
                  <div class="card mb-4 text-white bg-warning-gradient">
                    <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="fs-4 fw-semibold">2.49% <span class="fs-6 fw-normal">(84.7%
                            <svg class="icon">
                              <use
                                xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-arrow-top">
                              </use>
                            </svg>)</span></div>
                        <div data-coreui-i18n="conversionRate">Conversion Rate</div>
                      </div>
                      <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          <svg class="icon">
                            <use
                              xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-options">
                            </use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"
                            data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#"
                            data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item" href="#"
                            data-coreui-i18n="somethingElseHere">Something else here</a></div>
                      </div>
                    </div>
                    <div class="chart-wrapper mt-3" style="height:80px;">
                      <canvas class="chart" id="card-chart3" height="70"></canvas>
                    </div>
                  </div>
                </div>
                <div class="col-md-4 col-xl-12">
                  <div class="card mb-4 text-white bg-danger-gradient">
                    <div class="card-body p-4 pb-0 d-flex justify-content-between align-items-start">
                      <div>
                        <div class="fs-4 fw-semibold">44K <span class="fs-6 fw-normal">(-23.6%
                            <svg class="icon">
                              <use
                                xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-arrow-bottom">
                              </use>
                            </svg>)</span></div>
                        <div data-coreui-i18n="sessions">Sessions</div>
                      </div>
                      <div class="dropdown">
                        <button class="btn btn-transparent text-white p-0" type="button" data-coreui-toggle="dropdown"
                          aria-haspopup="true" aria-expanded="false">
                          <svg class="icon">
                            <use
                              xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-options">
                            </use>
                          </svg>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end"><a class="dropdown-item" href="#"
                            data-coreui-i18n="action">Action</a><a class="dropdown-item" href="#"
                            data-coreui-i18n="anotherAction">Another action</a><a class="dropdown-item" href="#"
                            data-coreui-i18n="somethingElseHere">Something else here</a></div>
                      </div>
                    </div>
                    <div class="chart-wrapper mt-3 mx-3" style="height:80px;">
                      <canvas class="chart" id="card-chart4" height="70"></canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card mb-4">
                <div class="card-body p-4">
                  <div class="card-title fs-4 fw-semibold">Traffic</div>
                  <div class="card-subtitle text-body-secondary border-bottom mb-3 pb-4" href="#"
                    data-coreui-i18n="lastWeek">Last Week</div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-6">
                          <div class="border-start border-start-4 border-start-info px-3 mb-3">
                            <div class="small text-body-secondary text-truncate" data-coreui-i18n="newClients">New Clients
                            </div>
                            <div class="fs-5 fw-semibold">9.123</div>
                          </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-6">
                          <div class="border-start border-start-4 border-start-danger px-3 mb-3">
                            <div class="small text-body-secondary text-truncate" data-coreui-i18n="recurringClients">
                              Recuring Clients</div>
                            <div class="fs-5 fw-semibold">22.643</div>
                          </div>
                        </div>
                        <!-- /.col-->
                      </div>
                      <!-- /.row-->
                      <div class="progress-group mb-4 pt-4 border-top">
                        <div class="progress-group-prepend"><span class="text-body-secondary small"
                            data-coreui-i18n="monday">Monday</span></div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 34%"
                              aria-valuenow="34" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 78%"
                              aria-valuenow="78" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group mb-4">
                        <div class="progress-group-prepend"><span class="text-body-secondary small"
                            data-coreui-i18n="tuesday">Tuesday</span></div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 56%"
                              aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 94%"
                              aria-valuenow="94" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group mb-4">
                        <div class="progress-group-prepend"><span class="text-body-secondary small"
                            data-coreui-i18n="wednesday">Wednesday</span></div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 12%"
                              aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 67%"
                              aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group mb-4">
                        <div class="progress-group-prepend"><span class="text-body-secondary small"
                            data-coreui-i18n="thursday">Thursday</span></div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 43%"
                              aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 91%"
                              aria-valuenow="91" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group mb-4">
                        <div class="progress-group-prepend"><span class="text-body-secondary small"
                            data-coreui-i18n="friday">Friday</span></div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 22%"
                              aria-valuenow="22" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 73%"
                              aria-valuenow="73" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group mb-4">
                        <div class="progress-group-prepend"><span class="text-body-secondary small"
                            data-coreui-i18n="saturday">Saturday</span></div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 53%"
                              aria-valuenow="53" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 82%"
                              aria-valuenow="82" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group mb-4">
                        <div class="progress-group-prepend"><span class="text-body-secondary small"
                            data-coreui-i18n="sunday">Sunday</span></div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 9%"
                              aria-valuenow="9" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 69%"
                              aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.col-->
                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-6">
                          <div class="border-start border-start-4 border-start-warning px-3 mb-3">
                            <div class="small text-body-secondary text-truncate" data-coreui-i18n="pageviews">Pageviews
                            </div>
                            <div class="fs-5 fw-semibold">78.623</div>
                          </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-6">
                          <div class="border-start border-start-4 border-start-success px-3 mb-3">
                            <div class="small text-body-secondary text-truncate" data-coreui-i18n="organic">Organic</div>
                            <div class="fs-5 fw-semibold">49.123</div>
                          </div>
                        </div>
                        <!-- /.col-->
                      </div>
                      <!-- /.row-->
                      <div class="progress-group mb-4 pt-4 border-top">
                        <div class="progress-group-header">
                          <svg class="icon icon-lg me-2">
                            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-user">
                            </use>
                          </svg>
                          <div data-coreui-i18n="male">Male</div>
                          <div class="ms-auto fw-semibold">43%</div>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-warning-gradient" role="progressbar" style="width: 43%"
                              aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group mb-5">
                        <div class="progress-group-header">
                          <svg class="icon icon-lg me-2">
                            <use
                              xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-user-female">
                            </use>
                          </svg>
                          <div data-coreui-i18n="female">Female</div>
                          <div class="ms-auto fw-semibold">37%</div>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-warning-gradient" role="progressbar" style="width: 43%"
                              aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group">
                        <div class="progress-group-header">
                          <svg class="icon icon-lg me-2">
                            <use
                              xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/brand.svg#cib-google">
                            </use>
                          </svg>
                          <div data-coreui-i18n="organicSearch">Organic Search</div>
                          <div class="ms-auto fw-semibold me-2">191.235</div>
                          <div class="text-body-secondary small">(56%)</div>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-success-gradient" role="progressbar" style="width: 56%"
                              aria-valuenow="56" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group">
                        <div class="progress-group-header">
                          <svg class="icon icon-lg me-2">
                            <use
                              xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/brand.svg#cib-facebook-f">
                            </use>
                          </svg>
                          <div>Facebook</div>
                          <div class="ms-auto fw-semibold me-2">51.223</div>
                          <div class="text-body-secondary small">(15%)</div>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-success-gradient" role="progressbar" style="width: 15%"
                              aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group">
                        <div class="progress-group-header">
                          <svg class="icon icon-lg me-2">
                            <use
                              xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/brand.svg#cib-twitter">
                            </use>
                          </svg>
                          <div>Twitter</div>
                          <div class="ms-auto fw-semibold me-2">37.564</div>
                          <div class="text-body-secondary small">(11%)</div>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-success-gradient" role="progressbar" style="width: 11%"
                              aria-valuenow="11" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                      <div class="progress-group">
                        <div class="progress-group-header">
                          <svg class="icon icon-lg me-2">
                            <use
                              xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/brand.svg#cib-linkedin">
                            </use>
                          </svg>
                          <div>LinkedIn</div>
                          <div class="ms-auto fw-semibold me-2">27.319</div>
                          <div class="text-body-secondary small">(8%)</div>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-success-gradient" role="progressbar" style="width: 8%"
                              aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.col-->
                  </div>
                  <!-- /.row-->
                </div>
              </div>
            </div>
            <!-- /.col-->
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