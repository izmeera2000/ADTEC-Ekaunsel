<?php include(getcwd() . '/admin/server.php'); ?>
<!DOCTYPE html>
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
                        <li class="breadcrumb-item active"><span>Senarai</span>
                        </li>
                    </ol>
                </nav>

                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-body p-4">
                            <div class="row">
                                <div class="col">
                                    <div class="card-title fs-4 fw-semibold">Temu Janji</div>

                                    <?php
                                    $id = $_SESSION['user_details']['id'];
                                    ?>
                                </div>

                            </div>
                            <div id="student_id_senarai" class="d-none" data-id="<?php echo $id ?>"></div>
                            <ul class="nav nav-underline-border" id="nav-tab" role="tablist">
                                <li class="nav-item" role="presentation"><button class="nav-link" id="nav-old-tab"
                                        data-coreui-toggle="tab" data-coreui-target="#nav-old" type="button" role="tab"
                                        aria-controls="nav-old" aria-selected="true">
                                        <svg class="icon me-2">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-media-play"></use>
                                        </svg>Past</button></li>
                                <li class="nav-item" role="presentation"><button class="nav-link active"
                                        id="nav-home-tab" data-coreui-toggle="tab" data-coreui-target="#nav-home"
                                        type="button" role="tab" aria-controls="nav-home" aria-selected="true">
                                        <svg class="icon me-2">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-media-play"></use>
                                        </svg>Now</button></li>
                                <li class="nav-item" role="presentation"><button class="nav-link  " id="nav-profile-tab"
                                        data-coreui-toggle="tab" data-coreui-target="#nav-profile" type="button"
                                        role="tab" aria-controls="nav-profile" aria-selected="false">
                                        <svg class="icon me-2">
                                            <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-media-play"></use>
                                        </svg>Upcoming</button></li>
                            </ul>
                            <div class="tab-content mt-2" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel"
                                    aria-labelledby="nav-home-tab" tabindex="0">
                                    <?php



                                    ?>
                                    <table class="table mb-0 table-hover " id="senaraitemujanjib">
                                        <thead class="fw-semibold text-body-secondary">
                                            <tr class="align-middle">
                                                <th class="text-center">
                                                    <svg class="icon">
                                                        <use
                                                            xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-people">
                                                        </use>
                                                    </svg>
                                                </th>
                                                <th>
                                                    Student
                                                </th>
                                                <th>Sebab</th>
                                                <th class="text-center">Tarikh & Masa</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="nav-old" role="tabpanel" aria-labelledby="nav-old-tab"
                                    tabindex="1">
                                    <?php



                                    ?>
                                    <table class="table mb-0 table-hover " id="senaraitemujanji2b">
                                        <thead class="fw-semibold text-body-secondary">
                                            <tr class="align-middle">
                                                <th class="text-center">
                                                    <svg class="icon">
                                                        <use
                                                            xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-people">
                                                        </use>
                                                    </svg>
                                                </th>
                                                <th>
                                                    Student
                                                </th>
                                                <th>Sebab</th>
                                                <th class="text-center">Tarikh & Masa</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel"
                                    aria-labelledby="nav-profile-tab" tabindex="2">

                                    <?php



                                    ?>
                                    <table class="table mb-0 table-hover " id="senaraitemujanji3b">
                                        <thead class="fw-semibold text-body-secondary">
                                            <tr class="align-middle">
                                                <th class="text-center">
                                                    <svg class="icon">
                                                        <use
                                                            xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-people">
                                                        </use>
                                                    </svg>
                                                </th>
                                                <th>
                                                    Student
                                                </th>
                                                <th>Sebab</th>
                                                <th class="text-center">Tarikh & Masa</th>
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
                </div>


                <!-- /.row-->
            </div>
        </div>
        <?php include(getcwd() . '/views/footer.php'); ?>

    </div>

    <?php include(getcwd() . '/views/script.php'); ?>


</body>

</html>