<?php

require_once('functions.php');




function read_task_brief(){
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
                echo "<li class='list-group-item'><h5 class='font-weight-bold'>" . $row["name_task"]. "</h5>
                <h6>" . $row["start_task"]. " - " . $row["end_task"]. "</h6>
                <p>" . $row["description_task"]. "</p></li>";
        }
        echo "</ul>";
    }
}



function read_task(){
    $id_user=$_SESSION["id"];
    $pdo = bdd_connection();
    
    $request= "SELECT * FROM task, category, difficulty
    WHERE task.id_user='".$id_user."'
    AND task.id_category=category.id_category
    AND task.id_difficulty=difficulty.id_difficulty
    ORDER BY task.end_task";
    $result = $pdo->query($request) or die ("Erreur : la connexion a échoué.");
    echo '<div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-secondary">Vos tâches ('.$result->rowCount().')</h6>
                </div>
                <div class="card-body">';
    if($result->rowCount()<1){
        echo "<p>Aucune tâche</p>";
    }else{
        echo "<ul class='board'>";
        while($row = $result->fetch(PDO::FETCH_ASSOC)){

                echo "<li class='card card-body border-left-default'><h5><b>Nom : </b>" . $row["name_task"]. "</h5>
                <h6><b>Dates : </b>" . date("d/m/o", strtotime($row["start_task"])). " - " . date("d/m/o", strtotime($row["end_task"])). "</h6>
                <h6><b>Catégorie : </b>" . $row["name_category"]. "</h6>
                <h6><b>Difficulté : </b>" . $row["name_difficulty"]. "</h6>
                <p><b>Description : </b>" . $row["description_task"]. "</p>
                <div class='board_btns'>
                <a class='btn btn-primary' href='form_task.php?id_task=".$row["id_task"]."'>Modifier</a>
                <button type='button' class='btn btn-danger' data-toggle='modal' data-target='#task_popup' data-id='".$row["id_task"]."' data-name='".$row["name_task"]."'>
                  Supprimer
                </button>                
                </div></li>";
        }
        echo "</ul>";
        echo "</div></div>";
        echo "<!-- Modal -->
            <div class='modal fade' id='task_popup' tabindex='-1' role='dialog' aria-labelledby='task_popup_label' aria-hidden='true'>
              <div class='modal-dialog modal-dialog-centered' role='document'>
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
                    <a class='btn btn-danger' href=''>Supprimer</a>
                  </div>
                </div>
              </div>
            </div>";
    }
}

function create_task(){
    $pdo=bdd_connection();
    
    //if(is_connected()){
        $id = $_SESSION["id"];
    //}else{
        //return FALSE;
   // }

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
            $_SESSION["error_task"] = "La tâche n'a pas pu être créée : la date de début ne peut pas être ultérieure à la date de fin";
            return FALSE;
    }else{
        return FALSE;
    }
}


function update_task($id_task){
    $pdo=bdd_connection();
    //if(is_connected()){
        $id = $_SESSION["id"];
    //}
    
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
    //if(is_connected()){
        $id = $_SESSION["id"];
    //}
    
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