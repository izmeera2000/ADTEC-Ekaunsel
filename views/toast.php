<div class="toast-container position-absolute bottom-0 end-0 p-3">




    <?php
    foreach ($toast as $key => $value) {

        ?>
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <img src="<?php echo $site_url ?>assets/favicon/favicon-16x16.png" class="rounded me-2" alt="...">

                <strong class="me-auto"><?php echo $_ENV['site1name'] ?></strong>
                <!-- <small class="text-muted">2 seconds ago</small> -->
                <button type="button" class="btn-close" data-coreui-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <?php echo $toast[$key] ?>
            </div>
        </div>
        <?php
    }
    ?>
        <div class="toast" role="alert" aria-live="assertive" aria-atomic="true" id="jstoast">
            <div class="toast-header">
                <img src="<?php echo $site_url ?>assets/favicon/favicon-16x16.png" class="rounded me-2" alt="...">

                <strong class="me-auto"><?php echo $_ENV['site1name'] ?></strong>
                <!-- <small class="text-muted">2 seconds ago</small> -->
                <button type="button" class="btn-close" data-coreui-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="jstoastmessage">
            </div>
        </div>
</div>