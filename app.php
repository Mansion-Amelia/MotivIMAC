<?php

    // Roots
    $server="http://localhost/";
    $link="C:\wamp64\www\MotivIMAC/";
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
<link rel="stylesheet" href="{$link_css}app.css">
<!-- FONTS -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<!-- Icons -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
LINKS;

    session_start();

?>