<?php include(getcwd() . '/admin/server.php');

// echo $errors['ndp']
?>
<!DOCTYPE html><!--
* CoreUI PRO Bootstrap Admin Template
* @version v5.0.0
* @link https://coreui.io/product/bootstrap-dashboard-template/
* Copyright (c) 2023 creativeLabs Łukasz Holeczek
* License (https://coreui.io/pro/license/)
-->
<html lang="en">
<?php include(getcwd() . '/views/head.php');

// checkarray("ndp",$errors );
// var_dump($_SESSION['user_details']);
// echo basename($_FILES["fileToUpload"]["name"]);

?>

<body>
  <div class="min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-6">
          <div class="card mb-4 mx-4">
            <form method="POST" action="register" enctype="multipart/form-data"  >
              <div class="card-body p-4">
                <h1>Register</h1>
                <p class="text-body-secondary">Create your account</p>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>

                    </svg></span>
                  <input class="form-control  <?php formvalidatelabel("ndp",$errors) ?>" type="number"
                    placeholder="NDP" name="ndp" required>


                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">
                  <?php formvalidateerr("ndp",$errors) ?>
                  </div>




                </div>
                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>

                    </svg></span>
                  <input class="form-control <?php formvalidatelabel("fullname",$errors) ?>" type="text"
                    placeholder="Nama Penuh" name="fullname" required>


                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">
                  <?php formvalidateerr("fullname",$errors) ?>

                  </div>

                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use
                        xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-envelope-open">
                      </use>
                    </svg></span>
                  <input class="form-control  <?php formvalidatelabel("email",$errors) ?>" type="text"
                    placeholder="Email" name="email" required>

                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback"><?php formvalidateerr("email",$errors) ?>
                  </div>
                </div>


                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>

                    </svg></span>
                  <input class="form-control   <?php formvalidatelabel("phone",$errors) ?>" type="number"
                    placeholder="Nombor Telefon" name="phone" required>

                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">
                  <?php formvalidateerr("phone",$errors) ?>
                  </div>
                </div>


                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>

                    </svg></span>
                  <input class="form-control <?php formvalidatelabel("kp",$errors) ?>" type="number"
                    placeholder="Nombor Kad Pengenalan" name="kp" required>

                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">
                  <?php formvalidateerr("phone",$errors) ?>
                  </div>
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>

                    </svg></span>

                  <div class="form-floating <?php formvalidatelabel("jantina",$errors) ?>">
                    <select class="form-select  <?php formvalidatelabel("jantina",$errors) ?>"
                      id="FS_Jantina" aria-label="Floating label select example" name="jantina" required>

                      <option selected disabled> Pilih Jantina</option>
                      <option value="Lelaki">Lelaki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>

                    <label for="FS_Jantina">Jantina</label>

                  </div>
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">
                  <?php formvalidateerr("jantina",$errors) ?>
                  </div>
                </div>

                <div class="input-group mb-3 "><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>

                    </svg></span>
                  <div class="form-floating <?php formvalidatelabel("agama",$errors) ?>">
                    <select class="form-select <?php formvalidatelabel("agama",$errors) ?>" id="FS_Agama"
                      aria-label="Floating label select example" name="agama" required>

                      <option selected disabled> Pilih Agama</option>
                      <option value="Islam">Islam</option>
                      <option value="Hindu">Hindu</option>
                      <option value="Budha">Budha</option>
                      <option value="Kristian">Kristian</option>
                      <option value="Lain-lain">Lain-lain</option>
                    </select>

                    <label for="FS_Agama">Agama</label>
                  </div>
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">
                  <?php formvalidateerr("agama",$errors) ?>

                  </div>
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>

                    </svg></span>

                  <div class="form-floating <?php formvalidatelabel("statuskahwin",$errors) ?>">
                    <select class="form-select  <?php formvalidatelabel("statuskahwin",$errors) ?>"
                      id="FS_Status_Perkahwinan" aria-label="Floating label select example" name="statuskahwin"
                      required>

                      <option selected disabled> Pilih Status Perkahwinan</option>
                      <option value="Tidak Berkahwin">Tidak Berkahwin</option>
                      <option value="Berkahwin">Berkahwin</option>
                    </select>

                    <label for="FS_Status_Perkahwinan">Status Perkahwinan</label>
                  </div>
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">
                  <?php formvalidateerr("statuskahwin",$errors) ?>

                  </div>
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-user"></use>

                    </svg></span>
                  <input class="form-control <?php formvalidatelabel("bangsa",$errors) ?>" type="text"
                    placeholder="Bangsa" name="bangsa" required>

                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">
                  <?php formvalidateerr("bangsa",$errors) ?>

                  </div>
                </div>

                <div class="mb-3">
                  <label for="test" class="form-label">Gambar</label>
                  <input class="form-control <?php formvalidatelabel("gambar",$errors)  ?>" type="file" id="test" name="gambar"  required>
                  <div class="text-body-secondary small">Only JPG, JPEG & PNG  files are allowed.</div>
                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback"><?php formvalidateerr("gambar",$errors) ?></div>
                </div>

                <div class="input-group mb-3"><span class="input-group-text">
                    <svg class="icon">
                      <use
                        xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked">
                      </use>
                    </svg></span>
                  <input class="form-control  <?php formvalidatelabel("password1",$errors) ?>"
                    type="password" placeholder="Password" name="password1" required>

                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">
                  <?php formvalidateerr("password1",$errors) ?>

                  </div>
                </div>

                <div class="input-group mb-4"><span class="input-group-text">
                    <svg class="icon">
                      <use
                        xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-lock-locked">
                      </use>
                    </svg></span>
                  <input class="form-control  <?php formvalidatelabel("password2",$errors) ?>"
                    type="password" placeholder="Repeat password" name="password2" required>


                  <div class="valid-feedback">Looks good!</div>
                  <div class="invalid-feedback">
                  <?php formvalidateerr("password2",$errors) ?>
                  </div>
                </div>
                <button class="btn btn-block btn-success" type="submit" name="user_register"  >Create
                  Account</button>
                <a class="btn btn-block btn-success" type="button" href="<?php echo $site_url ?>login">Login</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include(getcwd() . '/views/script.php'); ?>


</body>

</html>