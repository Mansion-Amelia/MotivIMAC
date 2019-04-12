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
        require_once($link_app.'user.php');
        if(login_user()){
                include($link_partials.'nav.php');
            
                /* Forget the inputs (TO ADD : if we check a checkbox "remember me", the inputs are saved anyway)*/
                /*$_SESSION["login_username_user"]=NULL;
                $_SESSION["login_password_user"]=NULL;*/
            ?>
            <main class="main">
            <h1 class="title">Connexion</h1>
            <p class="text center">Vous êtes désormais connecté !</p>
            <?php
        }else{
                include($link_partials.'nav.php');
            ?>
            <main class="main">
            <h1 class="title">Connexion</h1>
            <p class="text center">
                <a href='<?php echo $root_auth ?>form_login.php'>Connexion</a>
            </p>
            <?php
        }    
    ?>
    </main>
</body>
</html>