<div class="sidebar sidebar-fixed sidebar-light" id="sidebar">
  <div class="sidebar-header bg-primary">
    <div class="sidebar-brand">
      <svg class="sidebar-brand-full" width="110" height="32" alt="CoreUI Logo">
        <use xlink:href="<?php echo $site_url ?>assets/brand/coreui.svg#full"></use>
      </svg>
      <svg class="sidebar-brand-narrow" width="32" height="32" alt="CoreUI Logo">
        <use xlink:href="<?php echo $site_url ?>assets/brand/coreui.svg#signet"></use>
      </svg>
    </div>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    <button class="btn-close d-lg-none" type="button" data-coreui-theme="dark" aria-label="Close"
      onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
  </div>
  <ul class="sidebar-nav border-end" data-coreui="navigation" data-simplebar="">


    <?php if (($_SESSION['user_details']['role'] != 1)) { ?>

      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
          </svg><span data-coreui-i18n="dashboard">Dashboard</span></a></li>


      <li class="nav-title">Kaunseling</li>




      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-star"></use>
          </svg><span data-coreui-i18n="pages">Temu Janji</span></a>
        <ul class="nav-group-items compact">
          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/booking" target="_top">
              <svg class="nav-icon">
                <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                </use>
              </svg><span>Booking</span></a></li>

          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/booking" target="_top">
              <svg class="nav-icon">
                <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                </use>
              </svg><span>Sejarah</span></a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/kaunselor" target="_top">
              <svg class="nav-icon">
                <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                </use>
              </svg><span>Maklumat Kaunselor</span></a></li>


        </ul>
<!-- 
      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/borang" target="_top">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
            </use>
          </svg><span>Borang</span></a></li> -->

      </li>

      <li class="nav-title">User</li>
      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>user/profile" target="_top">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
            </use>
          </svg><span>Profile</span></a></li>
      <!-- <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>user/kaunseling" target="_top">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
            </use>
          </svg><span>Kaunseling</span></a></li> -->


      <li class="nav-title">Help</li>
      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>user/profile" target="_top">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
            </use>
          </svg><span>Guide</span></a></li>



    <?php } else { ?>

      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
          </svg><span data-coreui-i18n="dashboard">Dashboard</span></a></li>


      <li class="nav-title">Kaunseling</li>

      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-star"></use>
          </svg><span data-coreui-i18n="pages">Temu Janji</span></a>
        <ul class="nav-group-items compact">
          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunselor/booking" target="_top">
              <svg class="nav-icon">
                <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                </use>
              </svg><span>Urus</span></a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunselor/booking" target="_top">
              <svg class="nav-icon">
                <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                </use>
              </svg><span>Senarai</span></a></li>




        </ul>

      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/borang" target="_top">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
            </use>
          </svg><span>Borang</span></a></li>


          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>user/profile" target="_top">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
            </use>
          </svg><span>Traffic</span></a></li>

      <li class="nav-title">Student</li>


      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunselor/student/senarai" target="_top">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
            </use>
          </svg><span>Senarai</span></a></li>
      <!-- 
      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunselor/booking" target="_top">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
              </use>
            </svg><span>Jadual</span></a></li>   -->





      <li class="nav-title">User</li>
      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>user/profile" target="_top">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
            </use>
          </svg><span>Profile</span></a></li>

      <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-star"></use>
          </svg><span data-coreui-i18n="pages">Email</span></a>
        <ul class="nav-group-items compact">
          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunselor/booking" target="_top">
              <svg class="nav-icon">
                <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                </use>
              </svg><span>Inbox</span></a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunselor/booking" target="_top">
              <svg class="nav-icon">
                <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                </use>
              </svg><span>Sent</span></a></li>




        </ul>


      <li class="nav-title">Help</li>
      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>user/profile" target="_top">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
            </use>
          </svg><span>Guide</span></a></li>
    </ul>



  <?php } ?>

</div>