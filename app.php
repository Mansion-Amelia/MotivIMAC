<?php

    // Roots
    $server="http://localhost/";

    $link="C:\wamp64\www\IMAC/IMAC_1/Prog_web2/MotivIMAC/MotivIMAC/";
    $root = $server."IMAC/IMAC_1/Prog_web2/MotivIMAC/MotivIMAC/";


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
<!--<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">-->
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- ICONS -->
<link href="{$link_css}vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">

<!-- BOOTSTRAP -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="{$link_css}app.css">
<link rel="stylesheet" href="{$link_css}custom.css">
<link rel="stylesheet" href="{$link_css}sb-admin-2.min.css">
<link rel="stylesheet" href="{$link_css}chara.css">
LINKS;

    $scripts = <<<SCRIPTS
<!-- Bootstrap core JavaScript-->
<script src="{$server}vendor/jquery/jquery.min.js"></script>
<script src="{$server}vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="{$server}vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="{$server}js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="{$server}vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="{$server}js/demo/chart-area-demo.js"></script>
<script src="{$server}js/demo/chart-pie-demo.js"></script>
<script src="{$server}js/app.js"></script>
SCRIPTS;

    session_start();

?>
