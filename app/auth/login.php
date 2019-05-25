<?php
    include('../../app.php');
    require_once($link_app.'user.php');
    if(login_user()){
            header('Location: ../../layouts/home.php'); 
    }else{
            header('Location: form_login.php');
}
?>