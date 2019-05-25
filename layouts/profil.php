<?php
    include('../app.php');
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
        include($link_partials.'header.php');
    ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?php
      include($link_partials."sidebar.php");
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
          

        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Votre profil</h1>
          </div>




          <!-- Content Row -->

          <div class="row">

            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-secondary">Vos informations</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <ul class="list-group list-group-flush">
                        <?php
                        require_once($link_app.'user.php');
                            read_user();
                        ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pie Chart -->
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4" style="height: 94%;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-secondary">Votre avatar</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <br><br>
                  <div class="chara worry <?php echo (isset($_SESSION['hair_style']) ? $_SESSION['hair_style'] : ''); ?>">
                      <?php
                          include($link_partials.'chara.php');
                      ?>
                  </div>
                </div>
              </div>
            </div>
          </div>

          

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <script src="../js/app.js"></script>

</body>

</html>
