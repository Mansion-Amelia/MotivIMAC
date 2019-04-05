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
    <h1 class="title">Déconnexion</h1>
    
    <?php
        require_once($link_app.'user.php');
        if(logout_user()){
            ?>
            <p class="text center">Vous êtes désormais déconnecté !</p>
            <?php
        }else{
            ?>
            <p class="text center">
                <a href='<?php echo $root_auth ?>logout.php'>Déconnexion</a>
            </p>
            <?php
        }    
    ?>
    </main>
</body>
</html>