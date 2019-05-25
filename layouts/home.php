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
      include ("partials/sidebar.php");
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
            <h1 class="h3 mb-0 text-gray-800">Tableau de bord</h1>
          </div>

          
            <?php
            require_once($link_app.'user.php');
            $test = progress_user();
            echo $test;
            ?>
            <br>


          <!-- Content Row -->

          <div class="row">

            <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-secondary">Vos tâches</h6>
                </div>
                <div class="card-body">
                  <div class="chart-area">
                    <ul class="list-group list-group-flush">
                        <?php
                        require_once($link_app.'task.php');
                            read_task_brief();
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

          <!-- Content Row -->
          <div class="row">
            <div class="col-xl">
              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-secondary">Motiv' yourself</h6>
                </div>
                <div class="card-body">
                    <blockquote class="blockquote text-left">
                      <p>La vraie réussite, c'est quand tu gère les partiels tel Link défonçant Ganon !</p>
                      <footer class="blockquote-footer">L'équipe de <cite title="Auteurs de la citation">MotivIMAC</cite></footer>
                    </blockquote>
                </div>
              </div>
          </div>
            </div>
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
        
      <?php
        include($link_partials.'footer.php');
      ?>

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
    
  <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="../vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="../js/demo/chart-area-demo.js"></script>
    <script src="../js/demo/chart-pie-demo.js"></script>

    <script src="../js/app.js"></script>

</body>

</html>