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

    if (isset($_POST["name_task"], $_POST["description_task"], $_POST["start_task"], $_POST["end_task"], $_POST["id_category"], $_POST["id_difficulty"])){
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
    
    $requete = 'DELETE FROM task WHERE id_task='.$id_task;
    $pdo->exec($requete) or die ($requete." fail. <a href='form_task.php?id=".$id_task."'>Retry</a>");
        
    return TRUE;
}

?>