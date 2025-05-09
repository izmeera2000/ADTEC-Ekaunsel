<?php if ($request == 'kaunseling/booking') { ?>

  <div class="modal fade" id="user_calendaradd" tabindex="-1" aria-labelledby="user_calendaradd_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="user_calendaradd_title">Book Kaunseling</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <input type="hidden" class="form-control" id="user_calendaradd_id"
              value="<?php echo $_SESSION['user_details']['id'] ?>">

            <div class="mb-3 row">
              <label for="user_calendaradd_date" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="user_calendaradd_date"
                  value="email@example.com">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="user_calendaradd_content" class="col-sm-2 col-form-label">Masalah</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="user_calendaradd_content">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="user_calendaradd_type" class="col-sm-2 col-form-label">Jenis</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" id="user_calendaradd_type">
                  <option selected disabled>Open this select menu</option>
                  <option value="1">Online</option>
                  <option value="0">Offline</option>
                </select>
              </div>
            </div>


          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="" id="user_calendaradd_button">Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="user_calendarevent" tabindex="-1" aria-labelledby="user_calendarevent_title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="user_calendarevent_title">Book Kaunseling</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <input type="hidden" class="form-control" id="user_calendarevent_id" value="">

            <div class="mb-3 row">
              <label for="user_calendarevent_date" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="user_calendarevent_date"
                  value="email@example.com">
              </div>
            </div>


            <div class="mb-3 row">
              <label for="user_calendarevent_type" class="col-sm-2 col-form-label">Jenis</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="user_calendarevent_type"
                  value="email@example.com">
              </div>
            </div>

            <div class="mb-3 row d-none" id="rejected_place">
              <label for="user_calendarevent_type" class="col-sm-2 col-form-label">Sebab</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="user_calendarevent_sebab"
                  value="email@example.com">
              </div>
            </div>

          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger text-white d-none" id="user_calendarevent_button"
            data-coreui-dismiss="modal">Delete</button>
          <button type="button" class="btn   d-none" id="user_calendarevent_button2"
            data-coreui-dismiss="modal">More</button>
          <!-- <button type="button" class="btn btn-primary" onclick="" >Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="calendarModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Book Kaunseling</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <button id="prevBtn" class="btn btn-primary m-2">Previous</button>
          <button id="nextBtn" class="btn btn-primary m-2">Next</button>
          <button id="todayBtn" class="btn btn-primary m-2">Today</button>
          <button id="monthViewBtn" class="btn btn-primary m-2">Month View</button>
          <button id="weekViewBtn" class="btn btn-primary m-2">Week View</button>
          <button id="dayViewBtn" class="btn btn-primary m-2">Day View</button>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-danger" data-coreui-dismiss="modal">Delete</button> -->
          <!-- <button type="button" class="btn btn-primary" onclick="" >Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <div class="modal fade" id="legend" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Petunjuk</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row d-flex justify-content-center">
            <div class="col-xl-2 col-md-3 col-sm-4 col-6 mb-4  d-flex flex-column  align-items-center">
              <div class="bg-primary theme-color w-75 rounded   " style="padding-top:75%"></div>
              <h6 class="text-center">Reject</h6>

            </div>
            <div class="col-xl-2 col-md-3 col-sm-4 col-6 mb-4  d-flex flex-column  align-items-center">
              <div class="bg-warning theme-color w-75 rounded  " style="padding-top:75%"></div>
              <h6>Menunggu Keputusan</h6>

            </div>
            <div class="col-xl-2 col-md-3 col-sm-4 col-6 mb-4  d-flex flex-column   align-items-center">
              <div class="bg-success theme-color w-75 rounded  " style="padding-top:75%"></div>
              <h6>Lulus</h6>

            </div>
            <div class="col-xl-2 col-md-3 col-sm-4 col-6 mb-4  d-flex flex-column  align-items-center">
              <div class="bg-info theme-color w-75 rounded " style="padding-top:75%"></div>
              <h6>Sedang Berjalan</h6>

            </div>
            <div class="col-xl-2 col-md-3 col-sm-4 col-6 mb-4  d-flex flex-column  align-items-center">
              <div class="bg-secondary theme-color w-75 rounded " style="padding-top:75%"></div>
              <h6>Tamat</h6>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>




<?php } ?>
<?php if ($request == 'kaunseling/manage') { ?>
  <div class="modal fade" id="kaunselor_updateevent" tabindex="-1" aria-labelledby="kaunselor_updateevent_title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  ">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <h5 class="modal-title" id="kaunselor_updateevent_title">Book Kaunseling</h5>
            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <input type="hidden" class="form-control" id="kaunselor_updateevent_id" value="">

            <div class="mb-3 row">
              <label for="kaunselor_updateevent_date" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="kaunselor_updateevent_date"
                  value="email@example.com">
              </div>
            </div>



            <div class="mb-3 row">
              <img class="img-fluid  mx-auto  d-block" data-urlsite="<?php echo $site_url ?>assets/img/user/"
                id="user_info">

            </div>

            <div class="mb-3 row">
              <label for="kaunselor_updateevent_date" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="kaunselor_updateevent_nama"
                  value="email@example.com">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="kaunselor_updateevent_date" class="col-sm-2 col-form-label">NDP</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="kaunselor_updateevent_ndp"
                  value="email@example.com">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="kaunselor_updateevent_date" class="col-sm-2 col-form-label">Jenis Modal</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="kaunselor_updateevent_type"
                  value="email@example.com">
              </div>
            </div>

            <div class="mb-3  ">
              <input type="radio" class="btn-check" name="options-outlined" id="success-outlined" autocomplete="off"
                value="1">
              <label class="btn btn-outline-success" for="success-outlined">Approve</label>

              <input type="radio" class="btn-check" name="options-outlined" id="danger-outlined" autocomplete="off"
                value="0">
              <label class="btn btn-outline-danger" for="danger-outlined">Reject</label>
            </div>


            <div class="mb-3  d-none" id="kaunselor_updateevent_reject">
              <label for="kaunselor_updateevent_sebabreject" class="col-form-label">Sebab Reject</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="kaunselor_updateevent_sebabreject">
              </div>
            </div>

            <div class="row mb-3 d-none " id="kaunselor_updateevent_approve">
              <div class="col-md-6">
                <label for="kaunselor_updateevent_content1" class="  col-form-label">Masa Mula</label>
                <input type="time" class="form-control" id="timeInput1" name="time1" min="08:00" max="17:00" step="1800">
              </div>

              <div class="col-md-6">
                <label for="kaunselor_updateevent_content2" class="  col-form-label">Masa Tamat</label>
                <input type="time" class="form-control" id="timeInput2" name="time2" min="08:00" max="17:00" step="1800">
              </div>

            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger  d-none" onclick=""
              id="kaunselor_updateevent_button1">Save</button>
            <button type="button" class="btn btn-success  d-none " onclick=""
              id="kaunselor_updateevent_button2">Save</button>
          </div>
        </form>

      </div>
    </div>
  </div>


  <div class="modal fade" id="user_calendarevent" tabindex="-1" aria-labelledby="user_calendarevent_title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="user_calendarevent_title">Book Kaunseling</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <input type="hidden" class="form-control" id="user_calendarevent_id" value="">

            <div class="mb-3 row">
              <label for="user_calendarevent_date" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="user_calendarevent_date"
                  value="email@example.com">
              </div>
            </div>


            <div class="mb-3 row">
              <label for="user_calendarevent_type" class="col-sm-2 col-form-label">Jenis</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="user_calendarevent_type"
                  value="email@example.com">
              </div>
            </div>


          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger d-none" id="user_calendarevent_button"
            data-coreui-dismiss="modal">Delete</button>
          <button type="button" class="btn   d-none" id="user_calendarevent_button2"
            data-coreui-dismiss="modal">Goto</button>
          <!-- <button type="button" class="btn btn-primary" onclick="" >Save changes</button> -->
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="calendarModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Book Kaunseling</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <button id="prevBtn" class="btn btn-primary m-2">Previous</button>
          <button id="nextBtn" class="btn btn-primary m-2">Next</button>
          <button id="todayBtn" class="btn btn-primary m-2">Today</button>
          <button id="monthViewBtn" class="btn btn-primary m-2">Month View</button>
          <button id="weekViewBtn" class="btn btn-primary m-2">Week View</button>
          <button id="dayViewBtn" class="btn btn-primary m-2">Day View</button>
          <button id="listdayViewBtn" class="btn btn-primary m-2">List View</button>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-danger" data-coreui-dismiss="modal">Delete</button> -->
          <!-- <button type="button" class="btn btn-primary" onclick="" >Save changes</button> -->
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="legend" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Petunjuk</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row d-flex justify-content-center">
            <div class="col-xl-2 col-md-3 col-sm-4 col-6 mb-4  d-flex flex-column  align-items-center">
              <div class="bg-primary theme-color w-75 rounded   " style="padding-top:75%"></div>
              <h6 class="text-center">Reject</h6>

            </div>
            <div class="col-xl-2 col-md-3 col-sm-4 col-6 mb-4  d-flex flex-column  align-items-center">
              <div class="bg-warning theme-color w-75 rounded  " style="padding-top:75%"></div>
              <h6>Menunggu Keputusan</h6>

            </div>
            <div class="col-xl-2 col-md-3 col-sm-4 col-6 mb-4  d-flex flex-column   align-items-center">
              <div class="bg-success theme-color w-75 rounded  " style="padding-top:75%"></div>
              <h6>Lulus</h6>

            </div>
            <div class="col-xl-2 col-md-3 col-sm-4 col-6 mb-4  d-flex flex-column  align-items-center">
              <div class="bg-info theme-color w-75 rounded " style="padding-top:75%"></div>
              <h6>Sedang Berjalan</h6>

            </div>
            <div class="col-xl-2 col-md-3 col-sm-4 col-6 mb-4  d-flex flex-column  align-items-center">
              <div class="bg-secondary theme-color w-75 rounded " style="padding-top:75%"></div>
              <h6>Tamat</h6>

            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
          <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

<?php } ?>

<?php if ($request == 'kaunseling/editborang') { ?>

  <div class="modal fade" id="add_soalan" tabindex="-1" aria-labelledby="add_soalan_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add_soalan_title">Tambah Soalan</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>




            <div class="mb-3 row">
              <label for="add_soalan_soalan" class="col-sm-2 col-form-label">Soalan</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="add_soalan_soalan" rows="3"></textarea>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="add_soalan_content" class="col-sm-2 col-form-label">Kategori</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" id="add_soalan_content" required>
                  <option selected disabled>Open this select menu</option>

                  <?php
                  $query =
                    "SELECT * FROM borang_psikologi_kategori ";
                  $results = mysqli_query($db, $query);
                  if (mysqli_num_rows($results) > 0) {


                    while ($kategori = mysqli_fetch_assoc($results)) { ?>
                      <option value="<?php echo $kategori['id'] ?>"><?php echo ucfirst($kategori['nama_kategori']) ?></option>

                    <?php }
                  } ?>

                </select>

              </div>

            </div>



          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" onclick="" id="add_soalan_button">Save changes</button>
        </div>
      </div>
    </div>
  </div>


  <div class="modal fade" id="edit_soalan" tabindex="-1" aria-labelledby="add_edit_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add_edit_title">Edit Soalan</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>



            <input type="hidden" id="soalan_id">
            <div class="mb-3 row">
              <label for="add_edit_soalan" class="col-sm-2 col-form-label">Soalan</label>
              <div class="col-sm-10">
                <textarea class="form-control" id="add_edit_soalan" rows="3"></textarea>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="add_edit_content" class="col-sm-2 col-form-label">Kategori</label>
              <div class="col-sm-10">
                <select class="form-select" aria-label="Default select example" id="add_edit_content" required>
                  <option disabled>Open this select menu</option>

                  <?php
                  $query =
                    "SELECT * FROM borang_psikologi_kategori ";
                  $results = mysqli_query($db, $query);
                  if (mysqli_num_rows($results) > 0) {


                    while ($kategori = mysqli_fetch_assoc($results)) { ?>
                      <option value="<?php echo $kategori['id'] ?>"><?php echo ucfirst($kategori['nama_kategori']) ?></option>

                    <?php }
                  } ?>

                </select>

              </div>

            </div>



          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id="deletesoalan">Delete</button>
          <button type="button" class="btn btn-primary" onclick="" id="editsoalan">Save changes</button>
        </div>
      </div>
    </div>
  </div>

<?php } ?>




<?php if (str_starts_with($request, 'kaunseling/temujanji')) { ?>
  <div class="modal fade" id="temujanji_mula" tabindex="-1" aria-labelledby="temujanji_mula_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  ">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <h5 class="modal-title" id="temujanji_mula_title">Mula Temu Janji</h5>
            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <input type="hidden" class="form-control" id="temujanji_mula_id" value="<?php echo $product_id ?>">


            <div class="mb-3  ">
              <input type="radio" class="btn-check" name="options-outlined2" id="success-outlined" autocomplete="off"
                value="1" checked>
              <label class="btn btn-primary" for="success-outlined">Manual</label>


              <?php

              ?>
              <input type="radio" class="btn-check" name="options-outlined2" id="danger-outlined" autocomplete="off"
                value="0" <?php echo (isset($_SESSION['user_details']['access_token'])) ? "" : "disabled" ?>>
              <label class="btn btn-primary" for="danger-outlined">Auto</label>
            </div>


            <div class="mb-3" id="temujanji_manual">
              <label for="temujanji_manual_input" class="col-form-label">Meeting Link</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="temujanji_manual_input">
              </div>
            </div>


          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger  d-none" onclick=""
              id="kaunselor_updateevent_button1">Save</button> -->
            <!-- <button type="button" class="btn btn-success  d-none " onclick=""
              id="kaunselor_updateevent_button2">Save</button> -->
            <button type="button" class="btn btn-secondary" id="temujanji_mula_submit">Submit</button>
          </div>
        </form>

      </div>
    </div>
  </div>



  <div class="modal fade" id="kaunselor_updateevent2" tabindex="-1" aria-labelledby="kaunselor_updateevent_title"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  ">
      <div class="modal-content">
        <form>
          <div class="modal-header">
            <h5 class="modal-title" id="kaunselor_updateevent_title">Book Kaunseling</h5>
            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <input type="hidden" class="form-control" id="kaunselor_updateevent_id"
              value="<?php echo $kaunselor_jadual['id'] ?>">

            <div class="mb-3 row">
              <label for="kaunselor_updateevent_date" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="kaunselor_updateevent_date"
                  value="<?php echo $kaunselor_jadual['tarikh'] ?>">
              </div>
            </div>



            <div class="mb-3 row">
              <img class="img-fluid  mx-auto  d-block"
                src="<?php echo $site_url ?>assets/img/user/<?php echo $kaunselor_jadual['user_id'] ?>/<?php echo $kaunselor_jadual['image_url'] ?>"
                id="user_info">

            </div>

            <div class="mb-3 row">
              <label for="kaunselor_updateevent_date" class="col-sm-2 col-form-label">Nama</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="kaunselor_updateevent_nama"
                  value="<?php echo $kaunselor_jadual['nama'] ?>">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="kaunselor_updateevent_date" class="col-sm-2 col-form-label">NDP</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="kaunselor_updateevent_ndp"
                  value="<?php echo $kaunselor_jadual['ndp'] ?>">
              </div>
            </div>

            <div class="mb-3 row">
              <label for="kaunselor_updateevent_date" class="col-sm-2 col-form-label">Jenis Modal</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="kaunselor_updateevent_type"
                  value="<?php echo $kaunselor_jadual['jenis'] ?>">
              </div>
            </div>

            <div class="mb-3  ">
              <input type="radio" class="btn-check" name="options-outlined2" id="success-outlined2" autocomplete="off"
                value="1">
              <label class="btn btn-outline-success" for="success-outlined2">Approve</label>

              <input type="radio" class="btn-check" name="options-outlined2" id="danger-outlined2" autocomplete="off"
                value="0">
              <label class="btn btn-outline-danger" for="danger-outlined2">Reject</label>
            </div>


            <div class="mb-3  d-none" id="kaunselor_updateevent_reject">
              <label for="kaunselor_updateevent_sebabreject" class="col-form-label">Sebab Reject</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="kaunselor_updateevent_sebabreject">
              </div>
            </div>

            <div class="row mb-3 d-none " id="kaunselor_updateevent_approve">
              <div class="col-md-6">
                <label for="kaunselor_updateevent_content1" class="  col-form-label">Masa Mula</label>
                <input type="time" class="form-control" id="timeInput1" name="time1" min="08:00" max="17:00" step="1800">
              </div>

              <div class="col-md-6">
                <label for="kaunselor_updateevent_content2" class="  col-form-label">Masa Tamat</label>
                <input type="time" class="form-control" id="timeInput2" name="time2" min="08:00" max="17:00" step="1800">
              </div>

            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger  d-none" onclick=""
              id="kaunselor_updateevent_button1">Save</button>
            <button type="button" class="btn btn-success  d-none " onclick=""
              id="kaunselor_updateevent_button2">Save</button>
          </div>
        </form>

      </div>
    </div>
  </div>


  <div class="modal fade" id="temujanji_final" tabindex="-1" aria-labelledby="temujanji_final_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  ">
      <div class="modal-content">
        <form method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="temujanji_final_title">Ulang Temu Janji ?</h5>
            <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

            <input type="hidden" class="form-control" name="meeting_id" value="<?php echo $product_id ?>">
            <input type="hidden" class="form-control" name="user_id" value="<?php echo $kaunselor_jadual['user_id'] ?>">
            <input type="hidden" class="form-control" name="user_mail" value="<?php echo $kaunselor_jadual['email'] ?>">


            <div class="mb-3  ">
              <input type="radio" class="btn-check" name="options-outlined2_final" id="success-outlined_final"
                autocomplete="off" value="0" checked>
              <label class="btn btn-primary" for="success-outlined_final">Tidak</label>

              <input type="radio" class="btn-check" name="options-outlined2_final" id="danger-outlined_final"
                autocomplete="off" value="1">
              <label class="btn btn-primary" for="danger-outlined_final">Ya</label>
            </div>

            <div class="row mb-3 d-none " id="temujanji_final_approve">

              <div class="col-md-12">
                <label for="temujanji_final_content4" class="  col-form-label">Masalah</label>
                <input type="text" class="form-control" id="masalah1" name="masalah1"
                  value="<?php echo $kaunselor_jadual['masalah'] ?>">
              </div>

              <div class="col-md-12">
                <label for="temujanji_final_content3" class="  col-form-label">Tarikh</label>
                <input type="date" class="form-control" id="dateInput1" name="tarikh1">
              </div>

              <div class="col-md-6">
                <label for="temujanji_final_content1" class="  col-form-label">Masa Mula</label>
                <input type="time" class="form-control" id="timeInput1" name="time1" min="08:00" max="17:00" step="1800">
              </div>

              <div class="col-md-6">
                <label for="temujanji_final_content2" class="  col-form-label">Masa Tamat</label>
                <input type="time" class="form-control" id="timeInput2" name="time2" min="08:00" max="17:00" step="1800">
              </div>

              <label class="col-form-label  mt-2">Jenis</label>
              <div class="col-md-12">

                <input type="radio" class="btn-check" name="options_outlined2_final2" id="off_outlined_final2"
                  autocomplete="off" value="0" checked>
                <label class="btn btn-primary" for="off_outlined_final2">Offline</label>



                <input type="radio" class="btn-check" name="options_outlined2_final2" id="danger-outlined_final2"
                  autocomplete="off" value="1">
                <label class="btn btn-primary" for="danger-outlined_final2">Online</label>

              </div>

            </div>

            <!-- <div class="mb-3" id="temujanji_manual_final">
              <label for="temujanji_manual_input" class="col-form-label">Meeting Link</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="temujanji_manual_final_input">
              </div>
            </div> -->


          </div>
          <div class="modal-footer">
            <!-- <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger  d-none" onclick=""
              id="temujanji_updateevent_button1">Save</button> -->
            <!-- <button type="button" class="btn btn-success  d-none " onclick=""
              id="temujanji_updateevent_button2">Save</button> -->


            <button type="submit" class="btn btn-secondary  " id="temujanji_final_button2"
              name="temujanji_final">Submit</button>
          </div>
        </form>

      </div>
    </div>
  </div>


<?php } ?>



<?php if (str_starts_with($request, 'settings/user_dashboard')) { ?>
  <div class="modal fade" id="add_gambar" tabindex="-1" aria-labelledby="add_gambar_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered  ">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="add_gambar_title">Tambah Gambar</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="POST" action="" enctype="multipart/form-data">
          <div class="modal-body">





            <div class="mb-3 row">
              <label for="add_gambar_file" class="col-sm-2 col-form-label">Gambar</label>
              <div class="col-sm-10">
                <input class="form-control"  type="file" name="gambar2"></input>
              </div>
            </div>





          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="add_gambar_submit">Save changes</button>
          </div>
        </form>

      </div>
    </div>
  </div>

<?php } ?>