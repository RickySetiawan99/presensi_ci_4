<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?= base_url('assets') ?>/images/favicon.svg" type="image/x-icon" />
    <title>Presensi CI | <?= $title ?></title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/lineicons.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/fullcalendar.css" />
    <link rel="stylesheet" href="<?= base_url('assets') ?>/css/main.css" />
  </head>
  <body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->
    
    <!-- sidebar -->
    <?= $this->include('pegawai/layouts/sidebar') ?>

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- header -->
      <?= $this->include('pegawai/layouts/header') ?>
      
      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          
          <!-- title wrapper -->
          <?= $this->include('pegawai/layouts/title_wrapper') ?>
          
           <!-- content -->
          <?= $this->renderSection('content') ?>
        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->

      <!-- footer -->
      <?= $this->include('pegawai/layouts/footer') ?>
      
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="<?= base_url('assets') ?>/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/Chart.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/dynamic-pie-chart.js"></script>
    <script src="<?= base_url('assets') ?>/js/moment.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/fullcalendar.js"></script>
    <script src="<?= base_url('assets') ?>/js/jvectormap.min.js"></script>
    <script src="<?= base_url('assets') ?>/js/world-merc.js"></script>
    <script src="<?= base_url('assets') ?>/js/polyfill.js"></script>
    <script src="<?= base_url('assets') ?>/js/main.js"></script>
  </body>
</html>
