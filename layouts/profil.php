<?php
    include('../app.php');
?>

<!DOCTYPE html>
<html>
<head>
    <?php
        include($link_partials.'header.php');
    ?>
</head>
    
<body>
    <?php
        include($link_partials.'nav.php');
    ?>
    
    <main class="main">
        
    <h1 class="title">Votre profil</h1>
        
        <br>
        <br>
        <br>
        <div class="chara worry <?php echo (isset($_SESSION['hair_style']) ? $_SESSION['hair_style'] : ''); ?>">
            <?php
                include($link_partials.'chara.php');
            ?>
        </div>
    <?php
        require_once($link_app.'user.php');
        require_once($link_app.'task.php');
        if(is_connected()){
            read_user();
        }else{
            echo "Vous êtes déconnecté...";
        }
    ?>
        
    </main>
    
    <script>
        var eyes = ["worry", "spiral", "angry", "happy", "arrow", "empty"];
        var expression = ["tears1", "tears2", "transpi1", "transpi2", "waves"];
        var pose = ["wonder", "fight", "success", "victory", "defend", "hanche", "weird", "shocked", "tired"];
        $(".chara").on("mouseenter", function(){
                myEyes = eyes[Math.floor(Math.random()*eyes.length)];
                myExpression = expression[Math.floor(Math.random()*expression.length)];
                myPose = "pose_"+pose[Math.floor(Math.random()*pose.length)];
                
                $('.chara').removeClass("worry")
                    .addClass(myEyes)
                    .addClass(myExpression)
                    .addClass(myPose);

            }).on("mouseleave", function(){
                $('.chara').removeClass(myEyes)
                    .removeClass(myExpression)
                    .removeClass(myPose)
                    .addClass("worry");

            })
    </script>
</body>
</html>