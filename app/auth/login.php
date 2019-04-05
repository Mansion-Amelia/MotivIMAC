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
        if(login_user()){
            ?>
            <p class="text center">Vous êtes désormais connecté !</p>
            <?php
        }else{
            ?>
            <p class="text center">
                <a href='<?php echo $root_auth ?>form_login.php'>Connexion</a>
            </p>
            <?php
        }    
    ?>
    </main>
</body>
</html>