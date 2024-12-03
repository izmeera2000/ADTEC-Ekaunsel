<?php include(getcwd() . '/admin/server.php');
// debug_to_console2($site_url);

// $toasted = "asd";
// array_push($toast,"$toasted");
// var_dump($toast);


$query = "SELECT a.* , b.nama,  b.ndp, b.image_url,b.email,b.phone,b.kp,b.agama,b.jantina,b.bangsa,b.status_kahwin  FROM kaunselor_jadual a INNER JOIN  user b ON a.user_id = b.id   WHERE a.id='$product_id'";
$results = mysqli_query($db, $query);

if (mysqli_num_rows($results) == 1) {
  // $_SESSION['success'] = "You are now logged in";
  $kaunselor_jadual = mysqli_fetch_assoc($results);

  if ($kaunselor_jadual['masa_mula'] != "") {

    $start = date('Y/m/d H:i:s', strtotime($kaunselor_jadual['masa_mula']));
  }
  if ($kaunselor_jadual['masa_tamat'] != "") {

    $end = date('Y/m/d H:i:s', strtotime($kaunselor_jadual['masa_tamat']));
  }
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

        <div class="fs-2 fw-semibold">Temu Janji</div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a>
            </li>
            <li class="breadcrumb-item"><span>Kaunseling</span>
            </li>
            <li class="breadcrumb-item "><span>Temu Janji</span>
            </li>
            <li class="breadcrumb-item active" id="p_id" data-id="<?php echo $product_id ?>">
              <span><?php echo $product_id ?></span>
            </li>
          </ol>
        </nav>
        <div class="row mb-4">
          <div class="col-xl-6">
            <div class="card mb-4  ">
              <div class="card-body p-4 ">
                <div class="card-title fs-4 fw-semibold">Maklumat Temu Janji</div>
                <p class="text-body-secondary"> Temu Janji</p>
                <div class="mb-3 row">
                  <label for="1" class="col-sm-2 col-form-label fw-semibold">Status</label>
                  <div class="col-sm-10">

                    <p class="form-control-plaintext">
                      <?php
                      if ($kaunselor_jadual['event_status'] == "0") {
                        echo '<button type="button" class="btn btn-danger">Rejected</button>';
                      } else if ($kaunselor_jadual['event_status'] == "1") {
                        echo '<button type="button" class="btn btn-warning" id="book_temujanji"> Menunggu Kelulusan</button>';

                      } else if ($kaunselor_jadual['event_status'] == "2") {

                        if (!$kaunselor_jadual['meeting_link']) {

                          if ($kaunselor_jadual['jenis'] == "0") {
                            echo '<button type="button" class="btn btn-success" id="mulaoffline">Bersedia Untuk Mula</button>';

                          } else {
                            echo '<button type="button" class="btn btn-success" id="mulaonline">Bersedia Untuk Mula</button>';

                          }
                        } else {
                          echo '<button type="button" class="btn btn-success" id="mula2">Bersedia Untuk Mula</button>';

                        }
                        // echo '<button type="button" class="btn btn-success">Bersedia Untuk Mula</button>';
                      } else if ($kaunselor_jadual['event_status'] == "3") {
                        echo '<button type="button" class="btn btn-info" id="event_status_3">Sedang Berjalan</button>';
                      } else {
                        echo '<button type="button" class="btn btn-secondary">Tamat</button>';

                      }
                      ?>

                    </p>
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="2" class="col-sm-2 col-form-label fw-semibold">Masalah</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="2"
                      value="<?php echo $kaunselor_jadual['masalah'] ?>">
                  </div>
                </div>
                <div class="mb-3 row">
                  <label for="3" class="col-sm-2 col-form-label fw-semibold">Jenis</label>
                  <div class="col-sm-10 ">
                    <?php
                    if ($kaunselor_jadual['jenis'] == "0") {
                      echo '<input type="text" readonly class="form-control-plaintext"  
                      value="Offline" >';
                    } else {
                      echo '<input type="text" readonly class="form-control-plaintext"  
                      value="Online" >';

                    }
                    ?>
                  </div>
                </div>
                <?php
                if ($kaunselor_jadual['event_status'] > "1") {
                  ?>
                  <div class="mb-3 row">
                    <div class="col">
                      <div class=" row">

                        <label for="2" class="col-4 col-form-label fw-semibold">Mula</label>
                        <div class="col-8">
                          <input type="text" readonly class="form-control-plaintext" value="<?php echo $start ?>"
                            id="mulamasa">
                        </div>
                      </div>
                    </div>
                    <div class="col">
                      <div class=" row">
                        <label for="2" class="col-4 col-form-label fw-semibold">Tamat</label>
                        <div class="col-8">
                          <input type="text" readonly class="form-control-plaintext" value="<?php echo $end ?>"
                            id="tamatmasa">
                        </div>
                      </div>
                    </div>
                  </div>
                  <?php

                }
                if ($kaunselor_jadual['event_status'] == "0") { ?>

                  <div class="mb-3 row">
                    <label for="2" class="col-sm-2 col-form-label fw-semibold">Sebab</label>
                    <div class="col-sm-10">
                      <input type="text" readonly class="form-control-plaintext" id="2"
                        value="<?php echo $kaunselor_jadual['sebab'] ?>">
                    </div>
                  </div>
                <?php }
                if ($kaunselor_jadual['event_status'] == "3") {
                  ?>

                  <div class="mb-3 row">
                    <label for="4" class="col-sm-2 col-form-label fw-semibold">Progress</label>
                    <div class="col-sm-10">
                      <div class="progress-group">
                        <div class="progress-group-header align-items-end">
                          <div id="starttime" data-value="<?php echo $kaunselor_jadual['masa_mula2'] ?>">
                            <?php echo date("H:i", strtotime($kaunselor_jadual['masa_mula2'])) ?>
                          </div>
                          <div id="endtime" class="ms-auto font-weight-bold me-2"
                            data-value="<?php echo $kaunselor_jadual['masa_tamat'] ?>">
                            <?php echo date("H:i", strtotime($kaunselor_jadual['masa_tamat'])) ?>
                          </div>
                        </div>
                        <div class="progress-group-bars ">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 56%" aria-valuenow="56"
                              aria-valuemin="0" aria-valuemax="100" id="timeprogress"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php

                }
                if ($kaunselor_jadual['event_status'] == "4") {
                  ?>

                  <div class="mb-3 row">
                    <label for="4" class="col-sm-2 col-form-label fw-semibold">Progress</label>
                    <div class="col-sm-10">
                      <div class="progress-group">
                        <div class="progress-group-header align-items-end">
                          <div id="starttime"><?php echo date("H:i", strtotime($kaunselor_jadual['masa_mula2'])) ?></div>
                          <div id="endtime" class="ms-auto font-weight-bold me-2"
                            data-time2="<?php echo date("Y-m-d H:i:s", strtotime($kaunselor_jadual['masa_tamat2'])) ?>">
                            <?php echo date("H:i", strtotime($kaunselor_jadual['masa_tamat2'])) ?>
                          </div>
                        </div>
                        <div class="progress-group-bars">
                          <div class="progress progress-thin">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%"
                              aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

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

          <div class="col-xl-6">


            <div class="card">
              <img
                src="<?php echo $site_url ?>assets/img/user/<?php echo $kaunselor_jadual['user_id'] ?>/<?php echo $kaunselor_jadual['image_url'] ?>"
                class="card-img-top" alt="...">

              <div class="card-body">
                <h5 class="card-title"><?php echo $kaunselor_jadual['nama'] ?></h5>
                <p class="card-text">

                <div class="  row">
                  <label for="2" class="col-sm-2 col-form-label fw-semibold">NDP</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext" id="3"
                      value="<?php echo $kaunselor_jadual['ndp'] ?>">
                  </div>
                </div>
                <div class="  row">
                  <label for="2" class="col-sm-2 col-form-label fw-semibold">Email</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext"
                      value="<?php echo $kaunselor_jadual['email'] ?>" id="user_mail">
                  </div>
                </div>
                <div class=" row">
                  <label for="2" class="col-sm-2 col-form-label fw-semibold">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" readonly class="form-control-plaintext"
                      value="<?php echo $kaunselor_jadual['phone'] ?>">
                  </div>
                </div>
                <input type="hidden" readonly class="form-control-plaintext" id="user_id"
                  value="<?php echo $kaunselor_jadual['user_id'] ?>">
                </p>
                <!-- <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p> -->
              </div>
            </div>
          </div>


        </div>
        <div class="row">
          <div class="col-xl-6">


            <div class="card overflow-hidden mb-4">
              <div class="card-body p-4">
                <div class="row">
                  <div class="col">
                    <div class="card-title fs-4 fw-semibold">Keputusan Ujian DASS</div>
                  </div>
                  <!-- <div class="col text-end text-primary fs-4 fw-semibold">$613.200</div> -->
                </div>
                <div class="card-subtitle text-body-secondary">DEPRESSION ANXIETY STRESS SCALE</div>
              </div>
              <div class="chart-wrapper mt-3 p-4">
                <canvas id="radarChart"></canvas>
              </div>
            </div>

          </div>

          <div class="col-xl-6">
            <div class="card mb-4">
              <div class="card-body p-4">
                <div class="row">
                  <div class="col">
                    <div class="card-title fs-4 fw-semibold">Sejarah Kaunseling</div>
                    <div class="card-subtitle text-body-secondary mb-4">

                      <?php
                      $user_id = $kaunselor_jadual['user_id'];
                      // echo $user_id . "asas";
                      $query =
                        "SELECT a.*, b.ndp, COUNT(a.id) FROM `kaunselor_jadual` a INNER JOIN user b ON a.user_id = b.id WHERE event_status ='4'  AND b.id ='$user_id' AND a.id !='$product_id' ORDER BY a.id DESC ";
                      $results = mysqli_query($db, $query);
                      if (mysqli_num_rows($results) > 0) {


                        while ($users = mysqli_fetch_assoc($results)) {

                          if ($users['COUNT(a.id)'] == 1) {
                            echo $users['COUNT(a.id)'] . " appointment";

                          } else {
                            echo $users['COUNT(a.id)'] . " appointments";

                          }
                        }
                      } ?>
                    </div>
                  </div>

                </div>
                <div class="table-responsive">
                  <table class="table mb-0 " id="sejarahkaunseling">
                    <thead class="fw-semibold text-body-secondary">
                      <tr class="align-middle">

                        <th>Tarikh</th>
                        <th class="text-center">Masalah</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      // $results = mysqli_query($db, $query);
                      $user_id = $kaunselor_jadual['user_id'];


                      $query2 =
                        "SELECT a.*, b.ndp  FROM `kaunselor_jadual` a INNER JOIN user b ON a.user_id = b.id WHERE event_status ='4'  AND b.id ='$user_id' AND a.id !='$product_id' ORDER BY a.id DESC ";
                      $results = mysqli_query($db, $query2);


                      while ($past = mysqli_fetch_assoc($results)) {
                        ?>

                        <tr class="align-middle">

                          <td><?php echo $past['tarikh'] ?></td>
                          <td class="text-center"><?php echo mb_strimwidth($past['masalah'], 0, 10, "...") ?></td>
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


        </div>


      </div>

    </div>

    <?php include(getcwd() . '/views/footer.php'); ?>

  </div>

  <?php include(getcwd() . '/views/script.php');

  ?>
  <!-- <script src="<?php echo $site_url ?>assets/vendors/fullcalendar/js/index.global.min.js"></script>
  <script src="<?php echo $site_url ?>assets/js/calendar.js"></script> -->
  <script>
    $("#book_temujanji").click(function () {
      showmodal("kaunselor_updateevent2");
    });
    $("#kaunselor_updateevent_button1").click(function () {
      // calendar_add("user_calendaradd");
      console.log("reject");

      var event_id = document.getElementById("kaunselor_updateevent_id").value;
      var sebab = document.getElementById(
        "kaunselor_updateevent_sebabreject"
      ).value;

      if (sebab != "") {
        hidemodal();

        //  coreui.Modal("#kaunselor_updateevent");
        $.ajax({
          type: "POST",
          url: "kaunselor_reject",
          data: {
            kaunselor_reject: {
              id: event_id,
              sebab: sebab,
            },
          },
          success: function (response) {
            console.log(response);
            // calendar.refetchEvents();
            document.getElementById("success-outlined").checked = false;
            document.getElementById("danger-outlined").checked = false;
            if (!$("#kaunselor_updateevent_reject").hasClass("d-none")) {
              $("#kaunselor_updateevent_reject").addClass("d-none");
            }
            if (!$("#kaunselor_updateevent_approve").hasClass("d-none")) {
              $("#kaunselor_updateevent_approve").addClass("d-none");
            }
            location.reload();
          },
        });
      } else {
        showtoast("Sila Masukkan Sebab");
      }

      // calendar.render();
    });

    $("#kaunselor_updateevent_button2").click(function () {
      console.log("approve");

      var event_id = document.getElementById("kaunselor_updateevent_id").value;
      var mula = document.getElementById("timeInput1").value;
      var tamat = document.getElementById("timeInput2").value;
      // console.log(mula);

      if (mula != "" && tamat != "") {
        hidemodal();

        $.ajax({
          type: "POST",
          url: "kaunselor_approve",
          data: {
            kaunselor_approve: {
              id: event_id,
              mula: mula,
              tamat: tamat,
            },
          },
          success: function (response) {
            console.log(response);
            // calendar.refetchEvents();
            // $('input[name=options-outlined2]').prop('checked',false);
            document.getElementById("success-outlined2").checked = false;
            document.getElementById("danger-outlined2").checked = false;
            if (!$("#kaunselor_updateevent_reject").hasClass("d-none")) {
              $("#kaunselor_updateevent_reject").addClass("d-none");
            }
            if (!$("#kaunselor_updateevent_approve").hasClass("d-none")) {
              $("#kaunselor_updateevent_approve").addClass("d-none");
            }
            location.reload();

          },
        });
      } else {
        showtoast("Sila Masukkan Masa Mula Dan Tamat");
      }
      // calendar.render();

      // calendar_delete("user_calendarevent");
    });

    $('input[name="options-outlined2"]').click(function () {
      // alert('You selected: ' + $(this).val());
      if ($(this).val() == 1) {
        if (!$("#kaunselor_updateevent_reject").hasClass("d-none")) {
          $("#kaunselor_updateevent_reject").addClass("d-none");
        }
        if ($("#kaunselor_updateevent_approve").hasClass("d-none")) {
          $("#kaunselor_updateevent_approve").removeClass("d-none");
        }
        if (!$("#kaunselor_updateevent_button1").hasClass("d-none")) {
          $("#kaunselor_updateevent_button1").addClass("d-none");
        }
        if ($("#kaunselor_updateevent_button2").hasClass("d-none")) {
          $("#kaunselor_updateevent_button2").removeClass("d-none");
        }
      } else {
        if (!$("#kaunselor_updateevent_approve").hasClass("d-none")) {
          $("#kaunselor_updateevent_approve").addClass("d-none");
        }
        if ($("#kaunselor_updateevent_reject").hasClass("d-none")) {
          $("#kaunselor_updateevent_reject").removeClass("d-none");
        }

        if (!$("#kaunselor_updateevent_button2").hasClass("d-none")) {
          $("#kaunselor_updateevent_button2").addClass("d-none");
        }
        if ($("#kaunselor_updateevent_button1").hasClass("d-none")) {
          $("#kaunselor_updateevent_button1").removeClass("d-none");
        }
      }
    });
  </script>
</body>

</html>