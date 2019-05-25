<?php
include('../../app.php');

    require_once($link_app.'user.php');
    if(create_user()){
        header('Location: form_login.php'); 
    }else{
        header('Location: form_user.php'); 
    }    
?>