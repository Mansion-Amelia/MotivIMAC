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