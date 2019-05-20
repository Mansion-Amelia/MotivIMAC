<?php
    include('../../app.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MotivIMAC</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<?php
echo <<<HTML
{$links}
HTML;
?>


  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">
  <link href="../../css/custom.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

  <?php
        require_once($link_app.'user.php');
        if(is_connected()){
            session_destroy();
            echo "<div class='alert alert-success'>Session détruite.</div>";
        }
    ?>

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row loginrow">
              <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
              <div class="col-lg-6">
                <div class="p-5">
                  <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Motivez-vous pour atteindre vos objectifs !</h1>
                  </div>
                  <form class="form" method="POST" action="<?php echo $root_auth ?>login.php">
                    <div class="form-group">
                      <input id="username_user" class="form-control form-control-user" type="text" name="username_user" value="<?php echo (isset($_SESSION['login_username_user']) ? $_SESSION['login_username_user'] : ''); ?>" placeholder="Pseudo">
                    </div>
                    <div class="form-group">
                      <input id="password_user" class="form-control form-control-user" type="password" name="password_user" value="<?php echo (isset($_SESSION['login_password_user']) ? $_SESSION['login_password_user'] : ''); ?>" placeholder="Mot de passe">
                    </div>
                    <?php
                        if(isset($_GET["error"])){
                            if($_GET["error"]==true){
                                echo "<div class='alert alert-danger'>Mot de passe ou login incorrect.</div><br>";
                            }
                        }
                    ?>
                    <button type="submit" class="btn btn-primary btn-user btn-block">Connexion</button>
                  </form>
                  <hr>
                  <div class="text-center">
                    <a class="small" href="form_user.php">Créer un compte</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
