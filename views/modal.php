<?php if ($request == 'kaunseling/booking') { ?>

  <div class="modal fade" id="user_calendaradd" tabindex="-1" aria-labelledby="user_calendaradd_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="user_calendaradd_title">Book Kaunseling</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
          <input type="hidden" class="form-control" id="user_calendaradd_id" value="<?php echo $_SESSION['user_details']['id']?>">

            <div class="mb-3 row">
              <label for="user_calendaradd_date" class="col-sm-2 col-form-label">Date</label>
              <div class="col-sm-10">
                <input type="text" readonly class="form-control-plaintext" id="user_calendaradd_date" value="email@example.com">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="user_calendaradd_content" class="col-sm-2 col-form-label">Masalah</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="user_calendaradd_content">
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

  <div class="modal fade" id="user_calendarevent" tabindex="-1" aria-labelledby="user_calendarevent_title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
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
                <input type="text" readonly class="form-control-plaintext" id="user_calendarevent_date" value="email@example.com">
              </div>
            </div>


          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary"  data-coreui-dismiss="modal">Close</button>
          <button type="button" class="btn btn-danger" id="user_calendarevent_button" data-coreui-dismiss="modal">Delete</button>
          <!-- <button type="button" class="btn btn-primary" onclick="" >Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

<?php } ?>