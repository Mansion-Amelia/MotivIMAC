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
        
    <h1 class="title">Formulaire tâches</h1>
    <?php
        require_once($link_app.'task.php');
        require_once($link_app.'functions.php');
        if(is_connected()){
            $pdo = bdd_connection();
            $request = 'SELECT * FROM task WHERE id_user='.$_SESSION["id"];
            $result = $pdo->query($request) or die ("Requete fail. <a href='".$root_task."form_task.php'>Retry</a>");
    ?>
    
    <?php
        if(isset($_GET["id_task"]) && is_numeric($_GET["id_task"])){
            $is_valid = false;
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                if($row["id_task"]==$_GET["id_task"]){
                    $is_valid = true;
                }
            }
            if(!$is_valid){
                die ("Wrong user. <a href='".$root_task."read_tasks.php'>Retry</a>");
            }
            ?>
            
            <form class="form" method="POST" action="<?php echo $root_task ?>update_task.php">
                <input type="number" hidden name="id_task" value="<?php echo $_GET["id_task"] ?>">
        
            <?php
        }else{
            ?>
            <form class="form" method="POST" action="<?php echo $root_task ?>create_task.php">
            <?php
        }
    ?>
    <label class="form_label" for="name_task">Nom : </label>
        <input class="form_input" id="name_task" type="text" name="name_task" required>
        <br>
    <label class="form_label" for="description_task">Description : </label>
    <textarea class="form_input" id="description_task" name="description_task" required></textarea>
    <br>
    <label class="form_label" for="start_task">Date de début : </label>
        <input class="form_input" id="start_task" type="date" name="start_task" required>
    <br>
    <label class="form_label" for="end_task">Date de fin : </label>
        <input class="form_input" id="end_task" type="date" name="end_task" required>
        <br>
    <label class="form_label" for="id_difficulty">Difficulté : </label>
        <select class="form_input" name='id_difficulty' required>
            <?php
                $request = 'SELECT * FROM difficulty';
                $result = $pdo->query($request) or die ("Requete fail. <a href='".$root_task."form_task.php'>Retry</a>");
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value=".$row["id_difficulty"].">".$row["name_difficulty"]."</option><br>";
                }
            ?>
        </select>
        <br>
    <label class="form_label" for='id_category'>Catégorie : </label>
        <select id="id_category" class="form_input" name='id_category' required>
            <?php
                $request = 'SELECT * FROM category';
                $result = $pdo->query($request) or die ("Requete fail. <a href='".$root_task."form_task.php'>Retry</a>");
                while($row = $result->fetch(PDO::FETCH_ASSOC)){
                    echo "<option value=".$row["id_category"].">".$row["name_category"]."</option><br>";
                }
            ?>
        </select>
    <br>
    
    <button class="form_btn" type="submit">Valider</button>
    
    <?php
        }else{
            echo "Vous êtes déconnecté...";
        }
    ?>
        
    </main>
</body>
</html>