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
        <div class="fs-2 fw-semibold">Borang</div>
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="#">Home</a>
            </li>
            <li class="breadcrumb-item"><span>Kaunseling</span>
            </li>
            <li class="breadcrumb-item active"><span>Borang</span>
            </li>
          </ol>
        </nav>
        <form action="<?php $site_url ?>" method="POST">
          <input type="hidden" name="user_id" value="<?php echo 1 ?>">
          <?php
          $query =
            "SELECT * FROM borang_psikologi WHERE status='1' ORDER BY rand()";
          $results = mysqli_query($db, $query);
          if (mysqli_num_rows($results) > 0) {

            $soalan_no = 1;

            while ($soalan = mysqli_fetch_assoc($results)) {

              ?>
              <div class="card mb-4">
                <div class="card-header fw-semibold ">Soalan <?php echo $soalan_no ?></div>
                <div class="card-body">

                  <div class="example">
                    <div class="tab-content rounded-bottom">
                      <div class="tab-pane p-3 active " role="tabpanel">
                        <label class="form-label"><?php echo $soalan['soalan'] ?></label>
                        <input class="form-range" min="0" max="3" step="1" type="range" value="0"
                          name="soalan-<?php echo $soalan['id'] ?>-<?php echo $soalan['kategori'] ?>">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php
              $soalan_no++;

            }
          }

          ?>
          <button class="btn btn-primary mb-3" type="submit" name="borang_psikologi_send_a">Hantar</button>
        </form>


      </div>
    </div>
    <?php include(getcwd() . '/views/footer.php'); ?>

  </div>

  <?php include(getcwd() . '/views/script.php'); ?>

  <script>

  </script>
</body>

</html>