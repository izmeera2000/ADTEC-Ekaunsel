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
    <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>">
        <svg class="nav-icon">
          <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-speedometer"></use>
        </svg><span data-coreui-i18n="dashboard">Dashboard</span></a></li>
    <li class="nav-title">Kaunseling</li>
    <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/booking" target="_top">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
              </use>
            </svg><span>Booking</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunseling/borang" target="_top">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
              </use>
            </svg><span>Borang</span></a></li>
    <!-- <li class="nav-item"><a class="nav-link" href="colors.html">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-drop"></use>
            </svg><span data-coreui-i18n="colors">Colors</span></a></li>
        <li class="nav-item"><a class="nav-link" href="typography.html">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-pencil"></use>
            </svg><span data-coreui-i18n="typography"> Typography</span></a></li>
        <li class="nav-title" data-coreui-i18n="components">Components</li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
            </svg><span data-coreui-i18n="base">Base</span></a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="base/accordion.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span><span data-coreui-i18n="accordion">Accordion</span></a></li>
            <li class="nav-item"><a class="nav-link" href="base/breadcrumb.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Breadcrumb</a></li>
            <li class="nav-item"><a class="nav-link" href="base/cards.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Cards</a></li>
            <li class="nav-item"><a class="nav-link" href="base/carousel.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Carousel</a></li>
            <li class="nav-item"><a class="nav-link" href="base/collapse.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Collapse</a></li>
            <li class="nav-item"><a class="nav-link" href="base/list-group.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> List group</a></li>
            <li class="nav-item"><a class="nav-link" href="base/navs-tabs.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Navs &amp; Tabs</a></li>
            <li class="nav-item"><a class="nav-link" href="base/pagination.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Pagination</a></li>
            <li class="nav-item"><a class="nav-link" href="base/placeholders.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Placeholders</a></li>
            <li class="nav-item"><a class="nav-link" href="base/popovers.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Popovers</a></li>
            <li class="nav-item"><a class="nav-link" href="base/progress.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Progress</a></li>
            <li class="nav-item"><a class="nav-link" href="base/spinners.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Spinners</a></li>
            <li class="nav-item"><a class="nav-link" href="base/tables.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Tables</a></li>
            <li class="nav-item"><a class="nav-link" href="base/tooltips.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Tooltips</a></li>
          </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-cursor"></use>
            </svg><span data-coreui-i18n="buttons">Buttons</span></a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="buttons/buttons.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Buttons</a></li>
            <li class="nav-item"><a class="nav-link" href="buttons/button-group.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Buttons Group</a></li>
            <li class="nav-item"><a class="nav-link" href="buttons/loading-buttons.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Loading Buttons<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="buttons/dropdowns.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Dropdowns</a></li>
          </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-notes"></use>
            </svg><span data-coreui-i18n="forms">Forms</span></a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="forms/form-control.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Form Control</a></li>
            <li class="nav-item"><a class="nav-link" href="forms/select.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Select</a></li>
            <li class="nav-item"><a class="nav-link" href="forms/multi-select.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Multi Select<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="forms/checks-radios.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Checks &amp; radios</a></li>
            <li class="nav-item"><a class="nav-link" href="forms/range.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Range</a></li>
            <li class="nav-item"><a class="nav-link" href="forms/input-group.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Input group</a></li>
            <li class="nav-item"><a class="nav-link" href="forms/floating-labels.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Floating labels</a></li>
            <li class="nav-item"><a class="nav-link" href="forms/date-picker.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Date Picker<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="forms/date-range-picker.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Date Range Picker<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="forms/time-picker.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Time Picker<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="forms/layout.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span><span data-coreui-i18n="layout">Layout</span></a></li>
            <li class="nav-item"><a class="nav-link" href="forms/validation.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span><span data-coreui-i18n="validation">Validation</span></a></li>
          </ul>
        </li> -->
    <!-- <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-star"></use>
            </svg><span data-coreui-i18n="icons">Icons</span></a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-free.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> CoreUI Icons<span class="badge bg-success ms-auto" data-coreui-i18n="free">Free</span></a></li>
            <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-brand.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> CoreUI Icons - Brand</a></li>
            <li class="nav-item"><a class="nav-link" href="icons/coreui-icons-flag.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> CoreUI Icons - Flag</a></li>
          </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
            </svg><span data-coreui-i18n="notifications">Notifications</span></a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="notifications/alerts.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Alerts</a></li>
            <li class="nav-item"><a class="nav-link" href="notifications/badge.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Badge</a></li>
            <li class="nav-item"><a class="nav-link" href="notifications/modals.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Modals</a></li>
            <li class="nav-item"><a class="nav-link" href="notifications/toasts.html"><span class="nav-icon"><span class="nav-icon-bullet"></span></span> Toasts</a></li>
          </ul>
        </li>
        <li class="nav-item"><a class="nav-link" href="widgets.html">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-calculator"></use>
            </svg><span data-coreui-i18n="widgets">Widgets</span><span class="badge bg-info-gradient text-uppercase ms-auto" data-coreui-i18n="new">New</span></a></li>
        <li class="nav-divider"></li>
        <li class="nav-title" data-coreui-i18n="plugins">
          Plugins</li>
        <li class="nav-item"><a class="nav-link" href="calendar.html">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-calendar"></use>
            </svg><span data-coreui-i18n="calendar">Calendar</span><span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
        <li class="nav-item"><a class="nav-link" href="charts.html">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-chart-pie"></use>
            </svg><span data-coreui-i18n="charts">Charts</span></a></li>
        <li class="nav-item"><a class="nav-link" href="datatables.html">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-spreadsheet"></use>
            </svg> DataTables<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
        <li class="nav-item"><a class="nav-link" href="google-maps.html">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-map"></use>
            </svg> Google Maps<span class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
        <li class="nav-title" data-coreui-i18n="extras">
          Extras</li> -->
    <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-star"></use>
        </svg><span data-coreui-i18n="pages">Test</span></a>
      <ul class="nav-group-items compact">
        <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>login" target="_top">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
              </use>
            </svg><span>Login</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>register" target="_top">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
              </use>
            </svg><span>Register</span></a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>404" target="_top">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
            </svg><span data-coreui-i18n="error404">Error 404</span></a></li>
        <li class="nav-item"><a class="nav-link" href="500.html" target="_top">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-bug"></use>
            </svg><span data-coreui-i18n="error500">Error 500</span></a></li>
      </ul>
    </li>

    <li class="nav-title">User</li>
    <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>user/profile" target="_top">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
              </use>
            </svg><span>Profile</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>user/kaunseling" target="_top">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
              </use>
            </svg><span>Kaunseling</span></a></li>

            <li class="nav-title">Kaunselor</li>
    <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>user/profile" target="_top">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
              </use>
            </svg><span>Profile</span></a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo $site_url ?>kaunselor/booking" target="_top">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-account-logout">
              </use>
            </svg><span>Kaunseling</span></a></li>  
    <!-- <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
        <svg class="nav-icon">
          <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-layers"></use>
        </svg><span data-coreui-i18n="apps">Apps</span></a>
      <ul class="nav-group-items compact">
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-description"></use>
            </svg> Invoicing</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="apps/invoicing/invoice.html"><span class="nav-icon"><span
                    class="nav-icon-bullet"></span></span> Invoice<span
                  class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
          </ul>
        </li>
        <li class="nav-group"><a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
              <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-envelope-open">
              </use>
            </svg> Email</a>
          <ul class="nav-group-items compact">
            <li class="nav-item"><a class="nav-link" href="apps/email/inbox.html"><span class="nav-icon"><span
                    class="nav-icon-bullet"></span></span> Inbox<span
                  class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="apps/email/message.html"><span class="nav-icon"><span
                    class="nav-icon-bullet"></span></span> Message<span
                  class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
            <li class="nav-item"><a class="nav-link" href="apps/email/compose.html"><span class="nav-icon"><span
                    class="nav-icon-bullet"></span></span> Compose<span
                  class="badge bg-danger-gradient ms-auto">PRO</span></a></li>
          </ul>
        </li>
      </ul>
    </li> -->
    <!-- <li class="nav-item mt-auto"><a class="nav-link" href="https://coreui.io/docs/templates/installation/"
        target="_blank">
        <svg class="nav-icon">
          <use xlink:href="<?php echo $site_url ?>assets/vendors/@coreui/icons/svg/free.svg#cil-description"></use>
        </svg><span data-coreui-i18n="docs">Docs</span></a></li> -->
    <!-- <li class="nav-title"><span data-coreui-i18n="systemUtilization">System Utilization</span></li>
    <li class="nav-item px-3 pb-2 d-narrow-none">
      <div class="text-uppercase small fw-bold mb-1" data-coreui-i18n="cpuUsage">CPU Usage</div>
      <div class="progress progress-thin">
        <div class="progress-bar bg-info-gradient" role="progressbar" style="width: 25%" aria-valuenow="25"
          aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="small text-body-secondary"
        data-coreui-i18n="cpuUsageDescription, { 'number_of_processes': 358, 'number_of_cores': '1/4' }">348 Processes.
        1/4 Cores.</div>
    </li>
    <li class="nav-item px-3 pb-2 d-narrow-none">
      <div class="text-uppercase small fw-bold mb-1" data-coreui-i18n="memoryUsage">Memory Usage</div>
      <div class="progress progress-thin">
        <div class="progress-bar bg-warning-gradient" role="progressbar" style="width: 70%" aria-valuenow="70"
          aria-valuemin="0" aria-valuemax="100"></div>
      </div>
      <div class="small text-body-secondary">11444MB/16384MB</div>
    </li>
    <li class="nav-item px-3 pb-2 mb-3 d-narrow-none">
      <div class="text-uppercase small fw-bold mb-1" data-coreui-i18n="ssdUsage">SSD Usage</div>
      <div class="progress progress-thin">
        <div class="progress-bar bg-danger-gradient" role="progressbar" style="width: 95%" aria-valuenow="95"
          aria-valuemin="0" aria-valuemax="100"></div>
      </div><small class="text-body-secondary-inverse">243GB/256GB</small>
    </li> -->
  </ul>
</div>