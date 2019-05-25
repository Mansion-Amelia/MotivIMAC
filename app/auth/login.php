<?php
    include('../../app.php');
    require_once($link_app.'user.php');
    if(login_user()){
        
            /* Forget the inputs (TO ADD : if we check a checkbox "remember me", the inputs are saved anyway)*/
            /*$_SESSION["login_username_user"]=NULL;
            $_SESSION["login_password_user"]=NULL;*/
            header('Location: ../../layouts/home.php'); 
    }else{
            header('Location: form_login.php');
}
?>