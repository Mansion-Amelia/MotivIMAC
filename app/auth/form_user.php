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
                <input id="lastname_user" class="form_input" type="text" name="lastname_user" value="<?php echo (isset($_SESSION['lastname_user']) ? $_SESSION['lastname_user'] : ''); ?>" required>
            <label class="form_label" for="firstname_user">Prénom : </label>
                <input id="firstname_user" class="form_input" type="text" name="firstname_user" value="<?php echo (isset($_SESSION['firstname_user']) ? $_SESSION['firstname_user'] : ''); ?>" required>
            <label class="form_label" for="username_user">Pseudo : </label>
                <input id="username_user" class="form_input" type="text" name="username_user" value="<?php echo (isset($_SESSION['username_user']) ? $_SESSION['username_user'] : ''); ?>" required>
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
            <!-- Ajouter description au survol -->
        </fieldset>
        
        <fieldset>
            <legend class="form_legend">Contact</legend>
            <label class="form_label" for="email_user">Email : </label>
                <input id="email_user" class="form_input" type="email" name="email_user" value="<?php echo (isset($_SESSION['email_user']) ? $_SESSION['email_user'] : ''); ?>" required>
            <label class="form_label" for="mobile_user">Téléphone mobile : </label>
                <input id="mobile_user" class="form_input" type="tel" name="mobile_user" value="<?php echo (isset($_SESSION['mobile_user']) ? $_SESSION['mobile_user'] : ''); ?>" required>
            <!-- Ajouter vérification mobile -->
            <label class="form_label" for="name_city">Ville : </label>
                <input id="name_city" class="form_input" type="text" name="name_city" value="<?php echo (isset($_SESSION['name_city']) ? $_SESSION['name_city'] : ''); ?>" required>
            <label class="form_label" for="postcode_city">Code postal : </label>
                <input id="postcode_city" class="form_input" type="text" name="postcode_city" value="<?php echo (isset($_SESSION['postcode_city']) ? $_SESSION['postcode_city'] : ''); ?>" required>
            <!-- Le code postal n'est pas en chiffres ? -->
            <label class="form_label" for="country_city">Pays : </label>
                <input id="country_city" class="form_input" type="text" name="country_city" value="<?php echo (isset($_SESSION['country_city']) ? $_SESSION['country_city'] : ''); ?>" required>
        </fieldset>
        <button class="form_btn" type="submit">Valider</button>
    </form>
    </main>
</body>
</html>