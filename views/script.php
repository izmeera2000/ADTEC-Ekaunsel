<!-- CoreUI and necessary plugins-->
<script src="<?php echo $site_url ?>assets/vendors/@coreui/coreui-pro/js/coreui.bundle.min.js"></script>
<script src="<?php echo $site_url ?>assets/vendors/simplebar/js/simplebar.min.js"></script>
<script src="<?php echo $site_url ?>assets/vendors/i18next/js/i18next.min.js"></script>
<script src="<?php echo $site_url ?>assets/vendors/jquery/js/jquery.min.js"></script>
<!-- <script src="<?php echo $site_url ?>assets/vendors/i18next-http-backend/js/i18nextHttpBackend.js"></script> -->
<!-- <script src="<?php echo $site_url ?>assets/vendors/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.js"></script> -->
<!-- <script src="<?php echo $site_url ?>assets/js/i18next.js"></script> -->
<script src="<?php echo $site_url ?>assets/vendors/datatables.net/js/dataTables.min.js"></script>
<script src="<?php echo $site_url ?>assets/vendors/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
<script>
  const header = document.querySelector('header.header');

  document.addEventListener('scroll', () => {
    if (header) {
      header.classList.toggle('shadow-sm', document.documentElement.scrollTop > 0);
    }
  });
</script>
<!-- Plugins and scripts required by this view-->
<script src="<?php echo $site_url ?>assets/vendors/chart.js/js/chart.umd.js"></script>
<script src="<?php echo $site_url ?>assets/vendors/@coreui/chartjs/js/coreui-chartjs.js"></script>
<script src="<?php echo $site_url ?>assets/vendors/@coreui/utils/js/index.js"></script>
<script src="<?php echo $site_url ?>assets/js/main.js"></script>
<script src="https://cdn.jsdelivr.net/npm/pusher@7.0.0/dist/web/pusher.min.js"></script>
<script>
  // Initialize Pusher
  var pusher = new Pusher('4eb1aed9a19557432a94', {
    cluster: 'ap1'
  });

  // Subscribe to a channel
  var channel = pusher.subscribe('my-channel');

  // Bind to an event
  channel.bind('my-event', function (data) {
    alert('Received data: ' + JSON.stringify(data));
  });
</script>