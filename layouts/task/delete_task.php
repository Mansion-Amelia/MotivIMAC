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
    <main class="main">
    
    <?php
        require_once($link_app.'task.php');
        if(isset($_GET["id_task"],$_GET["name_task"]) && is_numeric($_GET["id_task"])){
            $pdo=bdd_connection();
            $request = 'SELECT * FROM task WHERE id_task='.$_GET["id_task"];
            $result = $pdo->query($request) or die ("Requete fail. <a href='form_task.php'>Retry</a>");
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                if($row["id_user"]!=$_SESSION["id"]){
                    die ("Wrong user. <a href='read_task.php'>Retry</a>");
                }
                if(delete_task($_GET["id_task"])){
                    redirect('read_task.php'); 
                }else{
                    ?>
                    redirect('read_task.php'); 
                    <?php
                }
            }  
        }else{
            redirect('read_task.php'); 
        } 
    
    ?>
    </main>
</body>
</html>