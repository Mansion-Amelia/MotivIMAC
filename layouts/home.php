<?php
    include('../app.php');
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
    
    <h1 class="title">Accueil</h1>
    <p>Notre jeu est trop cool !</p>
    <?php
        require_once($link_app.'user.php');
        if(is_connected()){ 
            ?>
            <p>Courrez rejoindre <a class="link" href='<?php echo $root_layouts ?>profil.php'>votre page perso</a> !</p>
            <?php
        }else{
            ?>
        <p><a class="link" href='<?php echo $root_auth ?>form_login.php'>Connectez-vous</a> ou <a class="link" href='<?php echo $root_auth ?>form_user.php'>Inscrivez-vous</a> pour commencer !</p>
            <?php
        }
    ?>
    
    </main>
</body>
</html>