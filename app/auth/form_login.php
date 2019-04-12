<?php
    include('../../app.php');
?>

<!DOCTYPE html>
<html>
<head>
    <?php
        include($link_partials.'header.php');
    ?>
</head>
    
<body>
    <?php
        include($link_partials.'nav.php');
    ?>
    <main class="main">
    <h1 class="title">Connexion</h1>
    
    <?php
        require_once($link_app.'user.php');
        if(is_connected()){
            session_destroy();
            echo "<div class='alert alert-success'>Session détruite.</div>";
        }
    ?>
        
    <form class="form" method="POST" action="<?php echo $root_auth ?>login.php">
        <label class="form_label" for="username_user">Pseudo :</label>
            <input id="username_user" class="form_input" type="text" name="username_user" value="<?php echo (isset($_SESSION['login_username_user']) ? $_SESSION['login_username_user'] : ''); ?>" placeholder="Pseudo">
            <br>
        <label class="form_label" for="password_user">Mot de passe :</label>
            <input id="password_user" class="form_input" type="password" name="password_user" value="<?php echo (isset($_SESSION['login_password_user']) ? $_SESSION['login_password_user'] : ''); ?>" placeholder="mot de passe">
            <br>
        <?php
            if(isset($_GET["error"])){
                if($_GET["error"]==true){
                    echo "<div class='alert alert-danger'>Mot de passe ou login incorrect.</div><br>";
                }
            }
        ?>
        <button class="form_btn" type="submit" class="btn btn-primary">Envoyer</button>
    </form>
    </main>
</body>
</html>