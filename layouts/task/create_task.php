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
    <h1 class="title">Nouvelle tâche</h1>
    
    <?php
        require_once($link_app.'task.php');
        if(create_task()){
            ?>
            <p class="text center">Votre tâche a bien été créée !</p>
            <?php
        }else{
            ?>
            <p class="text-center"><a href='".$root_task."form_task.php'>Nouvelle tâche</a></p>
            <?php
        }    
    ?>

    </main>
</body>
</html>