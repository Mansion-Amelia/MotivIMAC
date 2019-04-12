<?php

require_once('functions.php');

function read_task(){
    $id_user=$_SESSION["id"];
    $pdo = bdd_connection();
    
    $request= "SELECT * FROM task, category, difficulty
    WHERE task.id_user='".$id_user."'
    AND task.id_category=category.id_category
    AND task.id_difficulty=difficulty.id_difficulty";
    $result = $pdo->query($request) or die ("Erreur : la connexion a échoué.");
    
    if($result->rowCount()<1){
        echo "<p>Aucune tâche</p>";
    }else{
        echo "<ul class='board'>";
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
                echo "<li class='board_item'>Tâche: " . $row["name_task"]. "
                <br>
                Description: " . $row["description_task"]. "<br>
                Date de début: " . $row["start_task"]. "
                <br>
                Date de fin: " . $row["end_task"]. "
                <br>
                Catégorie: " . $row["name_category"]. "
                <br>
                Difficulté: " . $row["name_difficulty"]. "</li>
                <div class='board_btns'>
                <a class='board_btn info' href='form_task.php?id_task=".$row["id_task"]."'>Modifier</a>
                <a class='board_btn danger' href='delete_task.php?id_task=".$row["id_task"]."&name_task=".$row["name_task"]."'>Supprimer</a>
                </div>";
        }
        echo "</ul>";
    }
}

function create_task(){
    $pdo=bdd_connection();
    
    if(is_connected()){
        $id = $_SESSION["id"];
    }else{
        return FALSE;
    }

    if(isset($_POST["name_task"], $_POST["description_task"], $_POST["start_task"], $_POST["end_task"], $_POST["id_category"], $_POST["id_difficulty"])){
        /* Remember the inputs */
        $_SESSION["name_task"]=$_POST["name_task"];
        $_SESSION["description_task"]=$_POST["description_task"];
        $_SESSION["start_task"]=$_POST["start_task"];
        $_SESSION["end_task"]=$_POST["end_task"];
        $_SESSION["id_category"]=$_POST["id_category"];
        $_SESSION["id_difficulty"]=$_POST["id_difficulty"];
        
        $requete = 'INSERT INTO task VALUES (NULL,"'.$_POST['name_task'].'","'.$_POST['description_task'].'","'.$_POST['start_task'].'","'.$_POST['end_task'].'","'.$_POST['id_category'].'","'.$_POST['id_difficulty'].'","'.$id.'")';
        $pdo->exec($requete) or die ($requete." fail. <a href='form_task.php'>Retry</a>");
        
        return TRUE;

    }else{
        return FALSE;
    }
}


function update_task($id_task){
    $pdo=bdd_connection();
    if(is_connected()){
        $id = $_SESSION["id"];
    }
    
    if(isset($_POST["name_task"], $_POST["description_task"], $_POST["start_task"], $_POST["end_task"], $_POST["id_category"], $_POST["id_difficulty"])){
        
        $request = 'UPDATE task SET name_task="'.$_POST['name_task'].'",description_task="'.$_POST['description_task'].'",start_task="'.$_POST['start_task'].'",end_task="'.$_POST['end_task'].'",id_category="'.$_POST['id_category'].'",id_difficulty="'.$_POST['id_difficulty'].'",id_user="'.$id.'"
        WHERE id_task='.$id_task;
        $pdo->exec($request) or die (print_r($pdo->errorInfo()).$request." fail. <a href='form_task.php?id_task=".$id_task."'>Retry</a>");
        
        return TRUE;
    }else{
        return FALSE;
    }
}


function delete_task($id_task){
    $pdo=bdd_connection();
    if(is_connected()){
        $id = $_SESSION["id"];
    }
    
    // Get points linked to the task, deadline of the task, actual user score
    $points = 0;
    $deadline;
    $actualscore;
    $request= "SELECT *
    FROM difficulty,task,user
    WHERE task.id_task='".$id_task."'
    AND user.id_user='".$id."'
    AND task.id_user='".$id."'
    AND task.id_difficulty=difficulty.id_difficulty";
    $result = $pdo->query($request) or die (print_r($pdo->errorInfo())."Erreur : la connexion a échoué.");
    foreach ($result as $row) {
        $points = $row["score_difficulty"];
        $deadline = $row["end_task"];
        $actualscore = $row["finalscore_user"];
    }
    
    // Update user XP (if deadline>today or not)
    $today = date("Y-m-d H:i:s");
    if($today < $deadline){
        $request = 'UPDATE user SET finalscore_user="'.($actualscore+$points).'"
        WHERE id_user='.$id;
        $pdo->exec($request) or die ($request." fail. <a href='read_task.php'>Retour aux tâches</a>");
    }else{
        $request = 'UPDATE user SET finalscore_user="'.($actualscore-$points).'"
        WHERE id_user='.$id;
        $pdo->exec($request) or die ($request." fail. <a href='read_task.php'>Retour aux tâches</a>");
    }//strtotime
    
    // Delete task
    $requete = 'DELETE FROM task WHERE id_task='.$id_task;
    $pdo->exec($requete) or die ($requete." fail. <a href='read_task.php'>Retour aux tâches</a>");
        
    return TRUE;
}

?>