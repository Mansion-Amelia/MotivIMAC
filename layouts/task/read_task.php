<?php
    include('../../app.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
    include($link_partials."header.php");
    ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
      include ($link_partials."sidebar.php");
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tâches</h1>
          </div>

          <!-- Content Row -->
          <div class="row">


            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Ajouter une tâche</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><a href="form_task.php">Créer</a></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-plus"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>




          <!-- Content Row -->
          <div class="row">
            <div class="col-xl">
                  <?php
                  require_once($link_app.'task.php');
                  read_task();
                  ?>
            </div>
          </div>




      </div>
      <!-- End of Main Content -->
        </div>
    <!-- End of Content Page -->

      <!-- Footer -->
      <?php
          include($link_partials."footer.php");
          ?>
      <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../../js/demo/chart-area-demo.js"></script>
  <script src="../../js/demo/chart-pie-demo.js"></script>

  <script src="../../js/app.js"></script>
    

</body>

</html>