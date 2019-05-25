<?php
    include('../../app.php');

        require_once($link_app.'task.php');
        if(isset($_POST["id_task"],$_POST["name_task"]) && is_numeric($_POST["id_task"])){
            if(update_task($_POST["id_task"])){
                header('Location: read_task.php');
            }else{
                header('Location: read_task.php');
            }  
        }else{
            header('Location: read_task.php');
        }   
    ?>
