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
    <h1 class="title">Modification de la tâche</h1>
    
    <?php
        require_once($link_app.'task.php');
        if(isset($_POST["id_task"],$_POST["name_task"]) && is_numeric($_POST["id_task"])){
            if(update_task($_POST["id_task"])){
                ?>
                <p class="text center">Votre tâche - <?php echo $_POST["name_task"] ?> - a bien été modifiée !</p>
                <?php
            }else{
                ?>
                <p class="text center">
                    <a href='<?php echo $root_task ?>form_task.php'>Retour au formulaire</a>
                </p>
                <?php
            }  
        }else{
            ?>
            <p class="text center">
                <a href='<?php echo $root_task ?>read_task.php'>Retour aux tâches</a>
            </p>
            <?php
        }   
    ?>
    </main>
</body>
</html>