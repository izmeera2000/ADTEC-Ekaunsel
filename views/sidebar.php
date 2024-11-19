<div class="sidebar sidebar-fixed sidebar-light" id="sidebar">
  <div class="sidebar-header bg-primary">
    <div class="sidebar-brand">

      <img src="<?php echo $site_url ?>assets/img/logo2.png" class="sidebar-brand-full" width="110" height="32">

      <img src="<?php echo $site_url ?>assets/img/logo1.png" class="sidebar-brand-narrow" width="32" height="32">

    </div>
    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
    <button class="btn-close d-lg-none" type="button" aria-label="Close"
      onclick="coreui.Sidebar.getInstance(document.querySelector(&quot;#sidebar&quot;)).toggle()"></button>
  </div>
  <ul class="sidebar-nav border-end" data-coreui="navigation" data-simplebar="">


    <?php if (($_SESSION['user_details']['role'] != 1)) { ?>

      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>dashboard">
          <i class="nav-icon bi bi-house"></i><span data-coreui-i18n="dashboard">Dashboard</span></a></li>


      <li class="nav-title">Kaunseling</li>




      <li class="nav-group"><a class="nav-link nav-group-toggle">
          <i class="nav-icon bi bi-calendar"></i><span data-coreui-i18n="pages">Temu Janji</span></a>
        <ul class="nav-group-items compact">
          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/booking" target="_top">
              <i class="nav-icon bi bi-calendar-week"></i><span>Booking</span></a></li>

          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/senarai" target="_top">
              <i class="nav-icon bi bi-list-ul"></i><span>Senarai</span></a></li>

          <!-- <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/kaunselor" target="_top">
              <svg class="nav-icon">
                <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                </use>
              </svg><span>Maklumat Kaunselor</span></a></li> -->


        </ul>
      </li>
      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/borang" target="_top">
          <i class="nav-icon bi bi-file-earmark"></i><span>Borang</span></a></li>

      </li>

      <li class="nav-title">User</li>
      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>user/profile" target="_top">
          <i class="nav-icon bi bi-person"></i><span>Profile</span></a></li>
      <!-- <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>user/kaunseling" target="_top">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
            </use>
          </svg><span>Kaunseling</span></a></li> -->


      <li class="nav-title">Help</li>
      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>user/profile" target="_top">
          <i class="nav-icon bi bi-question-circle"></i><span>Guide</span></a></li>



    <?php } else { ?>

      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>dashboard">
          <i class="nav-icon bi bi-house"></i><span data-coreui-i18n="dashboard">Dashboard</span></a></li>


      <li class="nav-title">Kaunseling</li>

      <li class="nav-group"><a class="nav-link nav-group-toggle">
          <i class="nav-icon bi bi-calendar"></i><span>Temu Janji</span></a>
        <ul class="nav-group-items compact">
          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/manage" target="_top">
              <i class="nav-icon bi bi-calendar-check"></i><span>Urus</span></a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/senarai" target="_top">
              <i class="nav-icon bi bi-list-ul"></i><span>Senarai</span></a></li>




        </ul>
      </li>

      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/editborang" target="_top">
          <i class="nav-icon bi bi-file-text"></i><span>Borang</span></a></li>


      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/analytics" target="_top">
          <i class="nav-icon bi bi-clipboard-data"></i><span>Analytic</span></a></li>

      <li class="nav-title">Student</li>


      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>student/senarai" target="_top">
          <i class="nav-icon bi bi-person-lines-fill"></i><span>Senarai</span></a></li>


      <li class="nav-title">Email</li>



      <li class="nav-group"><a class="nav-link nav-group-toggle">
          <span>Temu Janji</span></a>
        <ul class="nav-group-items compact">

          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>email/meeting_link" target="_top">
              <span>Link</span></a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>email/meeting_approve" target="_top">
              <span>Approve</span></a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>email/meeting_reject" target="_top">
              <span>Reject</span></a></li>



        </ul>
      </li>


      <li class="nav-title">User</li>
      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>user/profile" target="_top">
          <i class="nav-icon bi bi-person"></i><span>Profile</span></a></li>

      <!-- <li class="nav-group"><a class="nav-link nav-group-toggle">
          <svg class="nav-icon">
            <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-star"></use>
          </svg><span data-coreui-i18n="pages">Email</span></a>
        <ul class="nav-group-items compact">
          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/booking" target="_top">
              <svg class="nav-icon">
                <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                </use>
              </svg><span>Inbox</span></a></li>
          <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/booking" target="_top">
              <svg class="nav-icon">
                <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
                </use>
              </svg><span>Sent</span></a></li>




        </ul>
        </li> -->

      <!-- <li class="nav-title">Help</li>
      <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>user/profile" target="_top">
          <i class="nav-icon bi bi-question-circle"></i><span>Guide</span></a></li> -->
    </ul>



  <?php } ?>

</div>