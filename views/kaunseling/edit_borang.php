<?php include(getcwd() . '/admin/server.php'); ?>
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
                <div class="fs-2 fw-semibold">Borang</div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="<?php $site_url ?>">Home</a>
                        </li>
                        <li class="breadcrumb-item "><span>Kaunseling</span>
                        </li>
                        <li class="breadcrumb-item active"><span>Borang</span>
                        </li>
                    </ol>
                </nav>

                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-title fs-4 fw-semibold">Users</div>
                                    <div class="card-subtitle text-body-secondary mb-4">

                                        <?php

                                        $query =
                                            "SELECT COUNT(id) FROM borang_psikologi ";
                                        $results = mysqli_query($db, $query);
                                        if (mysqli_num_rows($results) > 0) {


                                            while ($users = mysqli_fetch_assoc($results)) {

                                                if ($users['COUNT(id)'] == 1) {
                                                    echo $users['COUNT(id)'] . " registered user";

                                                } else {
                                                    echo $users['COUNT(id)'] . " registered users";

                                                }
                                            }
                                        } ?>
                                    </div>
                                </div>
                                <div class="col-auto ms-auto">
                                    <button class="btn btn-secondary" onclick="showmodal('add_soalan')">
                                        <svg class="icon me-2">
                                            <use
                                                xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-user-plus">
                                            </use>
                                        </svg>
                                        <span>Tambah Soalan</span>
                                    </button>
                                </div>
                            </div>
                            <div class=" ">
                                <table class="table mb-0 table-hover " id="editborang">
                                    <thead class="fw-semibold text-body-secondary">
                                        <tr class="align-middle">
                                            <th class="text-center">
                                                <svg class="icon">
                                                    <use
                                                        xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-people">
                                                    </use>
                                                </svg>
                                            </th>

                                            <th>Soalan</th>
                                            <th class="text-center">Kategori</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- /.row-->
            </div>
        </div>
        <?php include(getcwd() . '/views/footer.php'); ?>

    </div>

    <!-- <?php include(getcwd() . '/views/script.php'); ?> -->


</body>

</html>