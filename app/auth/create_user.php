<?php
include('../../app.php');

    require_once($link_app.'user.php');
    if(create_user()){
        
        /* Forget the inputs (TO ADD : if we check a checkbox "remember me", the inputs are saved anyway)*/
        /*$_SESSION["lastname_user"]=NULL;
        $_SESSION["firstname_user"]=NULL;
        $_SESSION["email_user"]=NULL;
        $_SESSION["mobile_user"]=NULL;
        $_SESSION["username_user"]=NULL;
        $_SESSION["password_user"]=NULL;
        $_SESSION["id_universe"]=NULL;*/
        header('Location: form_login.php'); 
    }else{
        header('Location: form_user.php'); 
    }    
?>