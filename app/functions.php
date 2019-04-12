<?php

function bdd_connection(){
    $username='root';
    $password='';
    $database='MotivIMAC';

    $pdo =new PDO('mysql:host=localhost;dbname='.$database,$username,$password);
    return $pdo;
}

function params(){
    $title = "Habitica";
    $links = <<<LINKS
<link rel="stylesheet" href="styles.css">
<!-- FONTS -->
<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
<!-- Icons -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
LINKS;
    
}

function generate_html_page($title, $content, $links){
    $html;
    
    $html = <<<HTML
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{$title}</title>
        <meta name="description" content="IMAC1 - ProgWeb (PHP) - TD01 - FilRouge">
        {$links}
        
    </head>
    <body>
    {$content}
    </body>
    </html>
HTML;
    
    echo $html;
}

function redirect($url) {
    header("location: " . $url);
}

?>