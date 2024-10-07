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
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />  
  </head>
  <body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->
    
    <!-- sidebar -->
    <?= $this->include('admin/layouts/sidebar') ?>

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- header -->
      <?= $this->include('admin/layouts/header') ?>
      
      <!-- ========== section start ========== -->
      <section class="section">
        <div class="container-fluid">
          
          <!-- title wrapper -->
          <?= $this->include('admin/layouts/title_wrapper') ?>
          
           <!-- content -->
          <?= $this->renderSection('content') ?>
        </div>
        <!-- end container -->
      </section>
      <!-- ========== section end ========== -->

      <!-- footer -->
      <?= $this->include('admin/layouts/footer') ?>
      
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
      $(document).ready( function () {
        $('#datatables').DataTable();
      });

      $(function(){
        <?php if(session()->has('success')) { ?>
          const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
            didOpen: (toast) => {
              toast.onmouseenter = Swal.stopTimer;
              toast.onmouseleave = Swal.resumeTimer;
            }
          });
          Toast.fire({
            icon: "success",
            title: "<?= $_SESSION['success'] ?>"
          });
        <?php } ?>
        
      });
      
      $('.delete-button').on("click", function(e){
        e.preventDefault();
        var getLink = $(this).attr('href');

        Swal.fire({
          title: "Are you sure delete this data?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.href = getLink
          }
        });
        return false;
      });
    </script>
  </body>
</html>
