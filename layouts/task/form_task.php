<?php
    include('../../app.php');
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
      include ("../partials/sidebar.php");
    ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php
        require_once($link_app.'task.php');
        require_once($link_app.'functions.php');
       $pdo = bdd_connection();
            $request = 'SELECT * FROM task WHERE id_user='.$_SESSION["id"];
            $result = $pdo->query($request) or die ("Requete fail. <a href='".$root_task."form_task.php'>Retry</a>");
      ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Formulaire</h1>
          </div>



          <!-- Content Row -->
          <div class="row">
            <div class="col-xl">
              <!-- Approach -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tâches</h6>
                </div>
                <div class="card-body">
                  


                  <?php
        if(isset($_GET["id_task"]) && is_numeric($_GET["id_task"])){
            $is_valid = false;
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                if($row["id_task"]==$_GET["id_task"]){
                    $is_valid = true;
                    $_SESSION["name_task"]=$row["name_task"];
                    $_SESSION["description_task"]=$row["description_task"];
                    $_SESSION["start_task"]=$row["start_task"];
                    $_SESSION["end_task"]=$row["end_task"];
                    $_SESSION["id_category"]=$row["id_category"];
                    $_SESSION["id_difficulty"]=$row["id_difficulty"];
                }
            }
            if(!$is_valid){
                die ("Wrong user. <a href='".$root_task."read_tasks.php'>Retry</a>");
            }
            ?>
            
            <form class="form" method="POST" action="<?php echo $root_task ?>update_task.php">
                <input type="number" hidden name="id_task" value="<?php echo $_GET["id_task"] ?>">
        
            <?php
        }else{
            ?>
            <form class="form" method="POST" action="<?php echo $root_task ?>create_task.php">
            <?php
        }
    ?>





                <div class="form-group">
                  <p>Nom :</p>
                  <input class="form-control form-control-user" id="name_task" type="text" name="name_task" value="<?php echo (isset($_SESSION['name_task']) ? $_SESSION['name_task'] : '') ?>" required>
                </div>
                <div class="form-group">
                  <p>Description :</p>
                  <textarea class="form-control form-control-user" id="description_task" name="description_task" required><?php echo (isset($_SESSION['description_task']) ? $_SESSION['description_task'] : ''); ?></textarea>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <p>Date de début :</p>
                    <input class="form-control form-control-user" id="start_task" type="date" name="start_task" value="<?php echo (isset($_SESSION['start_task']) ? $_SESSION['start_task'] : ''); ?>" required>
                  </div>
                  <div class="col-sm-6">
                    <p>Date de fin :</p>
                    <input class="form-control form-control-user" id="end_task" type="date" name="end_task" value="<?php echo (isset($_SESSION['end_task']) ? $_SESSION['end_task'] : ''); ?>" required>
                  </div>
                </div>
                
                <?php
                    if(isset($_SESSION["error_task"]) && !empty($_SESSION["error_task"])){
                        echo "<div class='alert alert-danger'>".$_SESSION["error_task"]."</div";
                        $_SESSION["error_task"] = "";
                    }
                
                ?>


                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <p>Difficulté :</p>
                    <select class="form-control" name='id_difficulty' required>
                        <?php
                            $request = 'SELECT * FROM difficulty';
                            $result = $pdo->query($request) or die ("Requete fail. <a href='".$root_task."form_task.php'>Retry</a>");
                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                if($row['id_difficulty']==$_SESSION["id_difficulty"]){
                                    echo "<option value=".$row["id_difficulty"]." selected='selected'>".$row["name_difficulty"]."</option><br>";
                                }else{
                                    echo "<option value=".$row["id_difficulty"].">".$row["name_difficulty"]."</option><br>";
                                }
                            }
                        ?>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <p>Catégorie :</p>
                    <select id="id_category" class="form-control" name='id_category' required>
                        <?php
                            $request = 'SELECT * FROM category';
                            $result = $pdo->query($request) or die ("Requete fail. <a href='".$root_task."form_task.php'>Retry</a>");
                            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                                if($row['id_category']==$_SESSION["id_category"]){
                                    echo "<option value=".$row["id_category"]." selected='selected'>".$row["name_category"]."</option><br>";
                                }else{
                                    echo "<option value=".$row["id_category"].">".$row["name_category"]."</option><br>";
                                }
                            }
                        ?>
                    </select>
                  </div>
                </div>
                <button class="btn btn-primary btn-user btn-block" type="submit">Valider</button>

                </form>
                </div>
              </div>
            </div>
          </div>




      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <b>Motiv' IMAC</b> 2019</span>
          </div>
        </div>
      </footer>
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

  <script>
        $(document).ready(function(){
            $("button[data-target='#task_popup']").click(function(){
                console.log('helle');
                $('#task_popup .modal-body').text("Etes-vous sûr.e de vouloir supprimer la tâche : "+$(this).attr('data-name')+" ?");
                $('#task_popup a').attr('href', 'delete_task.php?id_task='+$(this).attr('data-id')+'&name_task='+$(this).attr('data-name')+'');
            })
        })
    </script>

</body>

</html>