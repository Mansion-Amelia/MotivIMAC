<?php
    include('../../app.php');

        require_once($link_app.'task.php');
        if(create_task()){
            redirect('read_task.php'); 
        }else{
            redirect('form_task.php'); 
        }    
    ?>