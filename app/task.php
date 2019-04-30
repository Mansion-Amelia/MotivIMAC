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
                <button type='button' class='btn btn-primary' data-toggle='modal' data-target='#task_popup' data-id='".$row["id_task"]."' data-name='".$row["name_task"]."'>
                  Supprimer
                </button>                
                </div>";
        }
        echo "</ul>";
        echo "<!-- Modal -->
            <div class='modal fade' id='task_popup' tabindex='-1' role='dialog' aria-labelledby='task_popup_label' aria-hidden='true'>
              <div class='modal-dialog' role='document'>
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5 class='modal-title' id='task_popup_label'>Supprimer une tâche</h5>
                    <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                      <span aria-hidden='true'>&times;</span>
                    </button>
                  </div>
                  <div class='modal-body'>
                    Traitement en cours...
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-secondary' data-dismiss='modal'>Annuler</button>
                    <a class='board_btn danger' href=''>Supprimer</a>
                  </div>
                </div>
              </div>
            </div>";
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
        
        if($_POST["start_task"]<$_POST["end_task"]){
            $requete = 'INSERT INTO task VALUES (NULL,"'.$_POST['name_task'].'","'.$_POST['description_task'].'","'.$_POST['start_task'].'","'.$_POST['end_task'].'","'.$_POST['id_category'].'","'.$_POST['id_difficulty'].'","'.$id.'")';
            $pdo->exec($requete) or die ($requete." fail. <a href='form_task.php'>Retry</a>");
            return TRUE;
        }
        else
            echo "<p>La tâche n'a pas pu être créée : la date de début ne peut pas être ultérieure à la date de fin</p>";
            return FALSE;
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
        $finalscore = $actualscore+$points;
        $request = 'UPDATE user SET finalscore_user='.$finalscore.'
        WHERE id_user='.$id;
        $pdo->exec($request);
    }else{
        $finalscore = $actualscore-$points;
        if($finalscore<0){
            $finalscore = 0;
        }
        $request = 'UPDATE user SET finalscore_user='.$finalscore.'
        WHERE id_user='.$id;
        $pdo->exec($request);
    }//strtotime
    
    // Delete task
    $requete = 'DELETE FROM task WHERE id_task='.$id_task;
    $pdo->exec($requete) or die ($requete." fail. <a href='read_task.php'>Retour aux tâches</a>");
        
    return TRUE;
}

?>