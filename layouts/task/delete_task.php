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
    <h1 class="title">Supprimer la tâche</h1>
    
    <?php
        require_once($link_app.'task.php');
        if(isset($_GET["id_task"],$_GET["name_task"]) && is_numeric($_GET["id_task"]) && is_connected()){
            $pdo=bdd_connection();
            $request = 'SELECT * FROM task WHERE id_task='.$_GET["id_task"];
            $result = $pdo->query($request) or die ("Requete fail. <a href='form_task.php'>Retry</a>");
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                if($row["id_user"]!=$_SESSION["id"]){
                    die ("Wrong user. <a href='read_task.php'>Retry</a>");
                }
                if(delete_task($_GET["id_task"])){
                    ?>
                    <p class="text center">Votre tâche - <?php echo $_GET["name_task"] ?> - a bien été supprimée !</p>
                    <?php
                }else{
                    ?>
                    <p class="text center">
                        <a href='<?php echo $root_task ?>read_task.php'>Retour aux tâches</a>
                    </p>
                    <?php
                }
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