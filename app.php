<?php

    // Roots
    $server="http://localhost/";
    $link="C:/wamp64/www/MotivIMAC/";
    $root = $server."MotivIMAC/";

    $root_app = $root."app/";
    $root_auth = $root."app/auth/";
    $root_layouts = $root."layouts/";
    $root_partials = $root."layouts/partials/";
    $root_task = $root."layouts/task/";

    $link_app = $link."app/";
    $link_auth = $link."app/auth/";
    $link_layouts = $link."layouts/";
    $link_partials = $link."layouts/partials/";
    $link_css = $root."css/";

    //Params
    $title = "MotivIMAC";
    $links = <<<LINKS
<!-- FONTS -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<!-- Icons -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!-- BOOTSTRAP -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="{$link_css}app.css">
<link rel="stylesheet" href="{$link_css}chara.css">
LINKS;

    session_start();

?>