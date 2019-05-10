<?php
    include('../../app.php');
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
    <h1 class="title">Inscription</h1>
    
    <?php
        require_once($link_app.'user.php');
        if(is_connected()){
            session_destroy();
        }else{ 
    
            $pdo = bdd_connection();
            
            $requete = 'SELECT * FROM universe';
            $result = $pdo->query($requete) or die ("Requete fail. <a href='".$root_auth."form_user.php'>Retry</a>");
        }
    ?>

    <form class="form" method="POST" action="<?php echo $root_auth ?>create_user.php">
        <fieldset>
            <legend class="form_legend">Identité</legend>
            <label class="form_label" for="lastname_user">Nom : </label>

                <input id="lastname_user" class="form_input" type="text" name="lastname_user" value="<?php echo (isset($_SESSION['lastname_user']) ? $_SESSION['lastname_user'] : ''); ?>" required pattern="[A-Za-z' -]+">
            <label class="form_label" for="firstname_user">Prénom : </label>
                <input id="firstname_user" class="form_input" type="text" name="firstname_user" value="<?php echo (isset($_SESSION['firstname_user']) ? $_SESSION['firstname_user'] : ''); ?>" required pattern="[A-Za-z' -]+">
            <label class="form_label" for="username_user">Pseudo : </label>
                <input id="username_user" class="form_input" type="text" name="username_user" value="<?php echo (isset($_SESSION['username_user']) ? $_SESSION['username_user'] : ''); ?>" required pattern="[0-9A-Za-z' -]+">

                <?php
                    if(isset($_GET["error"]) && $_GET["error"]=="name"){
                        echo "<div class='alert alert-danger'>Ce nom est déjà utilisé. Veuillez en utiliser un autre.</div>";
                    }
                ?>
            <label class="form_label" for="password_user">Mot de passe : </label>
                <input id="password_user" class="form_input" type="password" name="password_user" value="<?php echo (isset($_SESSION['password_user']) ? $_SESSION['password_user'] : ''); ?>" required>
        </fieldset>
        
        <fieldset>
            <legend class="form_legend">Univers</legend>
            <label class="form_label" for='id_universe'>Univers : </label>
                <select id="id_universe" class="form_input" name='id_universe' required>";
                        <?php
                        while($row = $result->fetch(PDO::FETCH_ASSOC)){
                            if($row['id_universe']==$_SESSION["id_universe"]){
                                echo "<option value=".$row["id_universe"]." selected='selected'>".$row["name_universe"]."</option><br>";
                            }else{
                                echo "<option value=".$row["id_universe"].">".$row["name_universe"]."</option><br>";
                            }
                        }
                        ?>

                </select>
                <?php
                    $result = $pdo->query($requete) or die ("Requete fail. <a href='".$root_auth."form_user.php'>Retry</a>");
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        echo "<div data-id_universe='".$row["id_universe"]."' class='alert alert-primary'>".$row["description_universe"]."</div>";
                      
                    }
                ?> 
                
        </fieldset>
        
        <fieldset>
            <legend class="form_legend">Contact</legend>
            <label class="form_label" for="email_user">Email : </label>
                <input id="email_user" class="form_input" type="email" name="email_user" value="<?php echo (isset($_SESSION['email_user']) ? $_SESSION['email_user'] : ''); ?>" required>
            <label class="form_label" for="mobile_user">Téléphone mobile : </label>
                <input id="mobile_user" class="form_input" type="tel" name="mobile_user" value="<?php echo (isset($_SESSION['mobile_user']) ? $_SESSION['mobile_user'] : ''); ?>" required pattern=0[0-9]{9}>

        </fieldset>
        
        <fieldset>
            <legend class="form_legend">Avatar</legend>
            <div class="chara worry <?php echo (isset($_SESSION['hair_style']) ? $_SESSION['hair_style'] : ''); ?>">
                    <?php
                        include($link_partials.'chara.php');
                    ?>
                </div>
            <div id="form_chara" class="row">
                <div class="col-5">
                    
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active" id="v-pills-skin_color-tab" data-toggle="pill" href="#v-pills-skin_color" role="tab" aria-controls="v-pills-skin_color" aria-selected="true">Couleur peau</a>
                <a class="nav-link" id="v-pills-hair_color-tab" data-toggle="pill" href="#v-pills-hair_color" role="tab" aria-controls="v-pills-hair_color" aria-selected="false">Couleur cheveux</a>
                <a class="nav-link" id="v-pills-top_color-tab" data-toggle="pill" href="#v-pills-top_color" role="tab" aria-controls="v-pills-top_color" aria-selected="false">Couleur haut</a>
                <a class="nav-link" id="v-pills-bottom_color-tab" data-toggle="pill" href="#v-pills-bottom_color" role="tab" aria-controls="v-pills-bottom_color" aria-selected="false">Couleur bas</a>
                <a class="nav-link" id="v-pills-hairShort-tab" data-toggle="pill" href="#v-pills-hairShort" role="tab" aria-controls="v-pills-hairShort" aria-selected="false">Cheveux courts</a>
                <a class="nav-link" id="v-pills-hairLong-tab" data-toggle="pill" href="#v-pills-hairLong" role="tab" aria-controls="v-pills-hairLong" aria-selected="false">Cheveux longs</a>
                <a class="nav-link" id="v-pills-frange-tab" data-toggle="pill" href="#v-pills-frange" role="tab" aria-controls="v-pills-frange" aria-selected="false">Frange</a>
                <a class="nav-link" id="v-pills-hairAdd-tab" data-toggle="pill" href="#v-pills-hairAdd" role="tab" aria-controls="v-pills-hairAdd" aria-selected="false">Coiffure</a>
                <a class="nav-link" id="v-pills-hairFace-tab" data-toggle="pill" href="#v-pills-hairFace" role="tab" aria-controls="v-pills-hairFace" aria-selected="false">Poils</a>
            </div>
            </div>
                
            <div class="col-5">
            <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-skin_color" role="tabpanel" aria-labelledby="v-pills-skin_color-tab">
                    <div class="form_column">
                    <label for="skin_color" class="form_label">Couleur peau :</label>
                    <input type="color" id="skin_color" name="skin_color" data-change="chara_body--armL1 chara_body--armL2 chara_body--armR1 chara_body--armR2 chara_head" value="<?php if(isset($_SESSION['skin_color'])){
                        echo $_SESSION['skin_color'];
                    }else{
                        echo '#dcdcdc';
                    } ?>" required>
                    </div>
              </div>
              <div class="tab-pane fade" id="v-pills-hair_color" role="tabpanel" aria-labelledby="v-pills-hair_color-tab">
                    <div class="form_column">
                    <label for="hair_color" class="form_label">Couleur cheveux :</label>
                    <input type="color" id="hair_color" name="hair_color" data-change="chara_head--hairShort1 chara_head--hairShort2 chara_head--hairShort3 chara_head--hairShort4 chara_head--hairShort5 chara_head--hairLong1 chara_head--hairLong2 chara_head--hairLong3 chara_head--chignon chara_head--macaronR chara_head--macaronL chara_head--poneyTail chara_head--couetteL chara_head--couetteR chara_head--mustache chara_head--barbe1 chara_head--barbe2 chara_head--frange chara_head--frange2" value="<?php if(isset($_SESSION['hair_color'])){
                        echo $_SESSION['hair_color'];
                    }else{
                        echo '#1a2a3a';
                    } ?>" required>
                    </div>                  
                </div>
                
              <div class="tab-pane fade" id="v-pills-top_color" role="tabpanel" aria-labelledby="v-pills-top_color-tab">
                <div class="form_column">
                    <label for="top_color" class="form_label">Couleur haut :</label>
                    <input type="color" id="top_color" name="top_color" data-change="chara_body--top chara_body--bottom" value="<?php if(isset($_SESSION['top_color'])){
                        echo $_SESSION['top_color'];
                    }else{
                        echo '#aaaaaa';
                    } ?>" required>
                </div>  
              </div>
                
              <div class="tab-pane fade" id="v-pills-bottom_color" role="tabpanel" aria-labelledby="v-pills-bottom_color-tab">
                    <div class="form_column">
                    <label for="bottom_color" class="form_label">Couleur bas :</label>
                    <input type="color" id="bottom_color" name="bottom_color" data-change="chara_body--legL chara_body--legR" value="<?php if(isset($_SESSION['bottom_color'])){
                        echo $_SESSION['bottom_color'];
                    }else{
                        echo '#777e85';
                    } ?>" required>
                    </div>
                </div>
                
              <div class="tab-pane fade" id="v-pills-hairShort" role="tabpanel" aria-labelledby="v-pills-hairShort-tab">
                    <div class="form_column">
                    <p class="form_label">Cheveux courts :</p>
                        <div>
                            <input type="checkbox" id="hairShort1" name="hairShort1"
                             <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'hairShort1') !== false){
                        echo 'checked';
                    } ?>>
                            <label for="hairShort1" class="form_label">Court 1</label>
                        </div>
                        <div>
                            <input type="checkbox" id="hairShort2" name="hairShort2" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'hairShort2') !== false){
                        echo 'checked';
                    } ?>>
                            <label for="hairShort2" class="form_label">Court 2</label>
                        </div>
                        <div>
                            <input type="checkbox" id="hairShort3" name="hairShort3" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'hairShort3') !== false){
                        echo 'checked';
                    } ?>>
                            <label for="hairShort3" class="form_label">Court 3</label>
                        </div>
                        <div>
                            <input type="checkbox" id="hairShort4" name="hairShort4" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'hairShort4') !== false){
                        echo 'checked';
                    } ?>>
                            <label for="hairShort4" class="form_label">Court 4</label>
                        </div>
                        <div>
                            <input type="checkbox" id="hairShort5" name="hairShort5" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'hairShort5') !== false){
                        echo 'checked';
                    } ?>>
                            <label for="hairShort5" class="form_label">Court 5</label>
                        </div>
                    </div>
                </div>
                
              <div class="tab-pane fade" id="v-pills-hairLong" role="tabpanel" aria-labelledby="v-pills-hairLong-tab">
                  <div class="form_column">
                    <p class="form_label">Cheveux longs :</p>
                        <div>
                            <input type="checkbox" id="hairLong1" name="hairLong1" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'hairLong1') !== false){
                        echo 'checked';
                    } ?>>
                            <label for="hairLong1" class="form_label">Long 1</label>
                        </div>
                        <div>
                            <input type="checkbox" id="hairLong2" name="hairLong2" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'hairLong2') !== false){
                        echo 'checked';
                    } ?>>
                            <label for="hairLong2" class="form_label">Long 2</label>
                        </div>
                        <div>
                            <input type="checkbox" id="hairLong3" name="hairLong3" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'hairLong3') !== false){
                        echo 'checked';
                    } ?>>
                            <label for="hairLong3" class="form_label">Long 3</label>
                        </div>
                    </div>  
              </div>
                
              <div class="tab-pane fade" id="v-pills-frange" role="tabpanel" aria-labelledby="v-pills-frange-tab">
                  <div class="form_column">
                    <p class="form_label">Frange :</p>
                        <div>
                            <input type="checkbox" id="frange" name="frange" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'frange') !== false){
                        echo 'checked';
                    } ?>>
                            <label for="frange" class="form_label">Frange 1</label>
                        </div>
                        <div>
                            <input type="checkbox" id="frange2" name="frange2" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'frange2') !== false){
                        echo 'checked';
                    } ?>>
                            <label for="frange2" class="form_label">Frange 2</label>
                        </div>
                    </div>  
              </div>
                
              <div class="tab-pane fade" id="v-pills-hairAdd" role="tabpanel" aria-labelledby="v-pills-hairAdd-tab">
                <div class="form_column">
                <p class="form_label">Coiffure :</p>
                    <div>
                        <input type="checkbox" id="chignon" name="chignon" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'chignon') !== false){
                        echo 'checked';
                    } ?>>
                        <label for="chignon" class="form_label">Macaron centre</label>
                    </div>
                    <div>
                        <input type="checkbox" id="macaronL" name="macaronL" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'macaronL') !== false){
                        echo 'checked';
                    } ?>>
                        <label for="macaronL" class="form_label">Macaron gauche</label>
                    </div>
                    <div>
                        <input type="checkbox" id="macaronR" name="macaronR" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'macaronR') !== false){
                        echo 'checked';
                    } ?>>
                        <label for="macaronR" class="form_label">Macaron droite</label>
                    </div>
                    <div>
                        <input type="checkbox" id="poneyTail" name="poneyTail" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'poneyTail') !== false){
                        echo 'checked';
                    } ?>>
                        <label for="poneyTail" class="form_label">Queue de cheval</label>
                    </div>
                    <div>
                        <input type="checkbox" id="couetteL" name="couetteL" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'couetteL') !== false){
                        echo 'checked';
                    } ?>>
                        <label for="couetteL" class="form_label">Couette gauche</label>
                    </div>
                    <div>
                        <input type="checkbox" id="couetteR" name="couetteR" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'couetteR') !== false){
                        echo 'checked';
                    } ?>>
                        <label for="couetteR" class="form_label">Couette droite</label>
                    </div>
                </div>
              </div>
                
              <div class="tab-pane fade" id="v-pills-hairFace" role="tabpanel" aria-labelledby="v-pills-hairFace-tab">
                  <div class="form_column">
                    <p class="form_label">Poils :</p>
                        <div>
                            <input type="checkbox" id="mustache" name="mustache" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'mustache') !== false){
                        echo 'checked';
                    } ?>>
                            <label for="mustache" class="form_label">Moustache</label>
                        </div>
                        <div>
                            <input type="checkbox" id="barbe1" name="barbe1" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'barbe1') !== false){
                        echo 'checked';
                    } ?>>
                            <label for="barbe1" class="form_label">Barbe 1</label>
                        </div>
                        <div>
                            <input type="checkbox" id="barbe2" name="barbe2" <?php if(isset($_SESSION['hair_style']) && strpos($_SESSION['hair_style'], 'barbe2') !== false){
                        echo 'checked';
                    } ?>>
                            <label for="barbe2" class="form_label">Barbe 2</label>
                        </div>
                    </div>  
              </div>
                
            </div>
            </div> 
            </div>
            <textarea id="hair_style" name="hair_style" hidden>
                <?php echo (isset($_SESSION['hair_style']) ? $_SESSION['hair_style'] : ''); ?>
            </textarea>
        </fieldset>
        <button class="form_btn" type="submit">Valider</button>
    </form>
    </main>
    
    <script>
        function checkChara(input){
            if(input.attr("type") == "color"){
                color = input.val();
                el = input.attr("data-change");
                el = el.split(" ");

                el.forEach(function(item){
                    item = "."+item;
                    $(item).children("svg").children("path").attr("fill", color);
                    $(item).children("svg").children("ellipse").attr("fill", color);
                    
                })
            }else if(input.attr("type") == "checkbox"){
                el = input.attr("id");
                if(input.prop("checked")){
                    $('.chara').addClass(el);
                }else{
                    $('.chara').removeClass(el);
                }
            }
        }
        function writeClasses(inputs){
            $("#hair_style").val("");
            classes = "";
                inputs.each(function(key, input){
                    //console.log(input);
                    el = input.id;
                    classes += " "+el;
                    classes = classes.substring(1,classes.length);
                }) ;
                $("#hair_style").val(classes);
        }
        
        var eyes = ["worry", "spiral", "angry", "happy", "arrow", "empty"];
        var expression = ["tears1", "tears2", "transpi1", "transpi2", "waves"];
        var pose = ["wonder", "fight", "success", "victory", "defend", "hanche", "weird", "shocked", "tired"];
        $(document).ready(function(){
            //writeClasses($("#form_chara input:checked"));
            $("#form_chara input").each(function(){
                checkChara($(this));
            });
            writeClasses($("#form_chara input:checked"));
            $("#form_chara input").on("change", function(){
                checkChara($(this));
                writeClasses($("#form_chara input:checked"));
            })
            
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


            id = $("#id_universe").children("option:selected").attr("value");
            $("div[data-id_universe]").each(function(){
                $(this).addClass("d-none");
            })
            $("div[data-id_universe="+id+"]").removeClass("d-none");

            $("#id_universe").on("change", function(){
                id = $(this).children("option:selected").attr("value");
                $("div[data-id_universe]").each(function(){
                    $(this).addClass("d-none");
                })   
                $("div[data-id_universe="+id+"]").removeClass("d-none");
            })
        })
    </script>
</body>
</html>