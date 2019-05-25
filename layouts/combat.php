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
        
    <h1 class="title">Combattez !</h1>
        
        <div class="combat_container">
            
            <div class="combat_progress">
                <div>Niveau : 1</div>
                <div class="progress" style="width: 25%;">
                  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">PV : 25</div>
                </div>
            </div>
            <div class="chara worry" style="transform: rotateY(180deg);">
                <?php
                    include($link_partials.'chara.php');
                ?>
            </div>
            
            <div class="combat_pattern">
                <ul>
                    <ol class="combat_pattern-ennemy">
                        <i class="fas fa-question"></i>
                    </ol>
                    <ol class="combat_pattern-ennemy">
                        <i class="fas fa-question"></i>
                    </ol>
                    <ol class="combat_pattern-ennemy">
                        <i class="fas fa-question"></i>
                    </ol>
                </ul>
                <ul>
                    <ol class="combat_pattern-chara">
                        <button class="combat_pattern-btn" type="button" data-id=1>X</button>
                    </ol>
                    <ol class="combat_pattern-chara">
                        <button class="combat_pattern-btn" type="button" data-id=2>X</button>
                    </ol>
                    <ol class="combat_pattern-chara">
                        <button class="combat_pattern-btn" type="button" data-id=3>X</button>
                    </ol>
                </ul>
                <button type="button" class="combat_submit">Go !</button>
            </div>
            
            <div class="combat_progress">
                <div>Niveau : 1</div>
                <div class="progress" style="width: 25%;">
                  <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">PV : 25</div>
                </div>
            </div>            
            <div class="chara worry <?php echo (isset($_SESSION['hair_style']) ? $_SESSION['hair_style'] : ''); ?>">
                <?php
                    include($link_partials.'chara.php');
                ?>
            </div>
            
            <div class="alert alert-primary combat_pattern-alert hidden" role="alert">
              <button class="action-btn" type="button">Attaque</button>
              <button class="action-btn" type="button">Défense</button>
              <button class="action-btn" type="button">Feinte</button>
              <button class="action-btn" type="button">Objet</button>
            </div>
            
            <div class="alert alert-primary combat_pattern-secondary-alert hidden" role="alert">
              <button class="action-secondary-btn" type="button">Action 1</button>
              <button class="action-secondary-btn" type="button">Action 2</button>
            </div>
        </div>
        
    </main>
    
    <script>
        var eyes = ["worry", "spiral", "angry", "happy", "arrow", "empty"];
        var expression = ["tears1", "tears2", "transpi1", "transpi2", "waves"];
        var pose = ["wonder", "fight", "success", "victory", "defend", "hanche", "weird", "shocked", "tired"];
        $(".chara").on("mouseenter", function(){
                myEyes = eyes[Math.floor(Math.random()*eyes.length)];
                myExpression = expression[Math.floor(Math.random()*expression.length)];
                myPose = "pose_"+pose[Math.floor(Math.random()*pose.length)];
                
                $(this).removeClass("worry")
                    .addClass(myEyes)
                    .addClass(myExpression)
                    .addClass(myPose);

            }).on("mouseleave", function(){
                $(this).removeClass(myEyes)
                    .removeClass(myExpression)
                    .removeClass(myPose)
                    .addClass("worry");

            })
        
        var active_btn = 0;
        $(".combat_pattern-btn").on("click", function(){
            if($(this).attr("data-id") != active_btn){
                active_btn = $(this).attr("data-id");
                if($(".combat_pattern-alert").hasClass("hidden")){
                    $(".combat_pattern-alert").removeClass("hidden");
                }
                $(".combat_pattern-secondary-alert").addClass("hidden");
            }else{
                $(".combat_pattern-alert").toggleClass("hidden");
                $(".combat_pattern-secondary-alert").addClass("hidden");
            }
            
            $(".combat_pattern-alert").css("top", $(this).offset().top);
        })
        $(".action-btn").on("click", function(){
            /*if($(this).attr("data-id") != active_btn){
                active_btn = $(this).attr("data-id");
                if($(".combat_pattern-alert").hasClass("hidden")){
                    $(".combat_pattern-alert").removeClass("hidden");
                }
            }else{
                $(".combat_pattern-alert").toggleClass("hidden");
            }*/
            $(".combat_pattern-secondary-alert").toggleClass("hidden");
            $(".combat_pattern-secondary-alert").css("top", $(this).offset().top);
        })
    </script>
</body>
</html>