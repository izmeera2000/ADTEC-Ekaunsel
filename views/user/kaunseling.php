<?php include(getcwd() . '/admin/server.php');
// debug_to_console2($site_url);

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
        <div class="fs-2 fw-semibold">Kaunseling</div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a>
            </li>
            <li class="breadcrumb-item"><span>User</span>
            </li>
            <li class="breadcrumb-item active"><span>Kaunseling</span>
            </li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-xl-4 col-md-6">
          <div class="card mb-4">
              <div class="card-header"><strong>Chart</strong><span class="small ms-1">Radar</span></div>
              <div class="card-body">
                <div class="example">

                  <div class="tab-content rounded-bottom">
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1003">
                      <div class="c-chart-wrapper">
                        <canvas id="canvas-4"
                          style="display: block; box-sizing: border-box; height: 517px; width: 517px;" width="517"
                          height="517"></canvas>
                      </div>
                    </div>
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
          <div class="col-4">

          </div>
        </div>
        <div class="card mb-4">
          <div class="card-header fw-bold"> Sejarah Kaunseling</div>
          <div class="card-body">
            <div class="example">
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
                <table class="table table-striped border datatable" id="sejarahk">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Date registered</th>
                          <th>Role</th>
                          <th>Status</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr class="align-middle">
                          <td>Anton Phunihel</td>
                          <td>2012/01/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-success-gradient">Active</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Alphonse Ivo</td>
                          <td>2012/01/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-success-gradient">Active</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Thancmar Theophanes</td>
                          <td>2012/01/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-success-gradient">Active</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Walerian Khwaja</td>
                          <td>2012/01/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-success-gradient">Active</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Clemens Janko</td>
                          <td>2012/02/01</td>
                          <td>Staff</td>
                          <td><span class="badge bg-danger-gradient">Banned</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Chidubem Gottlob</td>
                          <td>2012/02/01</td>
                          <td>Staff</td>
                          <td><span class="badge bg-danger-gradient">Banned</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Hristofor Sergio</td>
                          <td>2012/03/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-warning-gradient">Pending</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Tadhg Griogair</td>
                          <td>2012/03/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-warning-gradient">Pending</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Pollux Beaumont</td>
                          <td>2012/01/21</td>
                          <td>Staff</td>
                          <td><span class="badge bg-success-gradient">Active</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Adam Alister</td>
                          <td>2012/01/21</td>
                          <td>Staff</td>
                          <td><span class="badge bg-success-gradient">Active</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Carlito Roffe</td>
                          <td>2012/08/23</td>
                          <td>Staff</td>
                          <td><span class="badge bg-danger-gradient">Banned</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Sana Amrin</td>
                          <td>2012/08/23</td>
                          <td>Staff</td>
                          <td><span class="badge bg-danger-gradient">Banned</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Adinah Ralph</td>
                          <td>2012/06/01</td>
                          <td>Admin</td>
                          <td><span class="badge bg-dark-gradient">Inactive</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Dederick Mihail</td>
                          <td>2012/06/01</td>
                          <td>Admin</td>
                          <td><span class="badge bg-dark-gradient">Inactive</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Hipólito András</td>
                          <td>2012/03/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-warning-gradient">Pending</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Fricis Arieh</td>
                          <td>2012/03/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-warning-gradient">Pending</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Scottie Maximilian</td>
                          <td>2012/03/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-warning-gradient">Pending</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Bao Gaspar</td>
                          <td>2012/01/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-success-gradient">Active</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Tullio Luka</td>
                          <td>2012/02/01</td>
                          <td>Staff</td>
                          <td><span class="badge bg-danger-gradient">Banned</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Felice Arseniy</td>
                          <td>2012/02/01</td>
                          <td>Admin</td>
                          <td><span class="badge bg-dark-gradient">Inactive</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Finlay Alf</td>
                          <td>2012/02/01</td>
                          <td>Admin</td>
                          <td><span class="badge bg-dark-gradient">Inactive</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Theophilus Nala</td>
                          <td>2012/03/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-warning-gradient">Pending</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Sullivan Robert</td>
                          <td>2012/03/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-warning-gradient">Pending</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Kristóf Filiberto</td>
                          <td>2012/01/21</td>
                          <td>Staff</td>
                          <td><span class="badge bg-success-gradient">Active</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Kuzma Edvard</td>
                          <td>2012/01/21</td>
                          <td>Staff</td>
                          <td><span class="badge bg-success-gradient">Active</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Bünyamin Kasper</td>
                          <td>2012/08/23</td>
                          <td>Staff</td>
                          <td><span class="badge bg-danger-gradient">Banned</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Crofton Arran</td>
                          <td>2012/08/23</td>
                          <td>Staff</td>
                          <td><span class="badge bg-danger-gradient">Banned</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Bernhard Shelah</td>
                          <td>2012/06/01</td>
                          <td>Admin</td>
                          <td><span class="badge bg-dark-gradient">Inactive</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Grahame Miodrag</td>
                          <td>2012/03/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-warning-gradient">Pending</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Innokentiy Celio</td>
                          <td>2012/03/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-warning-gradient">Pending</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Kostandin Warinhari</td>
                          <td>2012/03/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-warning-gradient">Pending</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                        <tr class="align-middle">
                          <td>Ajith Hristijan</td>
                          <td>2012/03/01</td>
                          <td>Member</td>
                          <td><span class="badge bg-warning-gradient">Pending</span></td>
                          <td><a class="btn btn-success me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-magnifying-glass"></use>
                              </svg></a><a class="btn btn-info me-2" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-description"></use>
                              </svg></a><a class="btn btn-danger" href="#">
                              <svg class="icon">
                                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-trash"></use>
                              </svg></a></td>
                        </tr>
                      </tbody>
                    </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include(getcwd() . '/views/footer.php'); ?>

  </div>

  <?php include(getcwd() . '/views/script.php'); ?>
  <!-- <script src="<?php echo $site_url ?>assets/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script> -->
  <script src="<?php echo $site_url ?>assets/js/charts.js"></script>
  <!-- <script>
      const radarChart = new Chart(document.getElementById('canvas-4'), {
  type: 'radar',
  data: {
    labels: ['Eating', 'Drinking', 'Sleeping', 'Designing', 'Coding', 'Cycling', 'Running'],
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgba(220, 220, 220, 0.2)',
      borderColor: 'rgba(220, 220, 220, 1)',
      pointBackgroundColor: 'rgba(220, 220, 220, 1)',
      pointBorderColor: '#fff',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(220, 220, 220, 1)',
      data: [65, 59, 90, 81, 56, 55, 40]
    }, {
      label: 'My Second dataset',
      backgroundColor: 'rgba(151, 187, 205, 0.2)',
      borderColor: 'rgba(151, 187, 205, 1)',
      pointBackgroundColor: 'rgba(151, 187, 205, 1)',
      pointBorderColor: '#fff',
      pointHighlightFill: '#fff',
      pointHighlightStroke: 'rgba(151, 187, 205, 1)',
      data: [28, 48, 40, 19, 96, 27, 100]
    }]
  },
  options: {
    responsive: true
  }
});
    </script> -->

</body>

</html>