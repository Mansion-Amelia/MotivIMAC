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
        
    <h1 class="title">Votre profil</h1>
    <?php
        require_once($link_app.'user.php');
        require_once($link_app.'task.php');
        if(is_connected()){
            read_user();
        }else{
            echo "Vous êtes déconnecté...";
        }
    ?>
        
    </main>
    
</body>
</html>