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
    <h1 class="title">Inscription</h1>
    
    <?php
        require_once($link_app.'user.php');
        if(create_user()){
            
            /* Forget the inputs (TO ADD : if we check a checkbox "remember me", the inputs are saved anyway)*/
            /*$_SESSION["lastname_user"]=NULL;
            $_SESSION["firstname_user"]=NULL;
            $_SESSION["email_user"]=NULL;
            $_SESSION["mobile_user"]=NULL;
            $_SESSION["username_user"]=NULL;
            $_SESSION["password_user"]=NULL;
            $_SESSION["id_universe"]=NULL;*/
            ?>
            <p class="text center">Votre inscription a bien été prise en compte !</p>
            <?php
        }else{
            ?>
            <p class="text center">
                <a href='<?php echo $root_auth ?>form_user.php'>Inscription</a>
            </p>
            <?php
        }    
    ?>
    </main>
</body>
</html>