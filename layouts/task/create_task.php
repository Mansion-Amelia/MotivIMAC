<?php
    include('../../app.php');

        require_once($link_app.'task.php');
        if(create_task()){
            header('Location: read_task.php'); 
        }else{
            header('Location: form_task.php'); 
        }    
    ?>