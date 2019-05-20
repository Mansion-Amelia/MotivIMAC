<?php

require_once('functions.php');

function is_connected(){
    // Check if user is connected
    if(isset($_SESSION['id'])){
        $id_user = $_SESSION['id'];
        return true;
    }else{
        return false;
    }
}

function read_user(){
    $id_user=$_SESSION["id"];
    $pdo = bdd_connection();
    
    $request= "SELECT * FROM user,universe,level
    WHERE user.id_user='".$id_user."'
    AND user.id_universe=universe.id_universe
    AND universe.id_universe=level.id_universe
    AND level.max_level>user.finalscore_user
    AND level.min_level<=user.finalscore_user";
    $result = $pdo->query($request) or die (print_r($pdo->errorInfo())."Erreur : la requête a échoué.");

    if($result->rowCount()<1){
        echo ("Erreur : aucun utilisateur trouvé.");
    }else{
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            $percent =($row["finalscore_user"]-$row["min_level"])/($row["max_level"]-$row["min_level"])*100;
            echo <<<HTML
            <table class="table">
                <tr>
                    <th class="table_item">Nom</th>
                    <td class="table_item">{$row["lastname_user"]}</td>
                </tr>
                <tr>
                    <th class="table_item">Prénom</th>
                    <td class="table_item">{$row["firstname_user"]}</td>
                </tr>
                <tr>
                    <th class="table_item">Pseudo</th>
                    <td class="table_item">{$row["username_user"]}</td>
                </tr>
                <tr>
                    <th class="table_item">Email</th>
                    <td class="table_item">{$row["email_user"]}</td>
                </tr>
                <tr>
                    <th class="table_item">Téléphone mobile</th>
                    <td class="table_item">{$row["mobile_user"]}</td>
                </tr>
                <tr>
                    <th class="table_item">Expérience</th>
                    <td class="table_item">{$row["finalscore_user"]}</td>
                </tr>
                <tr>
                    <th class="table_item">Univers</th>
                    <td class="table_item">{$row["name_universe"]}<hr>{$row["description_universe"]}</td>
                </tr>
            </table>
HTML;
            
        }
    }
}

function create_user(){
    
    $pdo = bdd_connection();

    if(isset($_POST["lastname_user"], $_POST["firstname_user"], $_POST["email_user"], $_POST["mobile_user"], $_POST["username_user"], $_POST["password_user"], $_POST["id_universe"], $_POST["skin_color"], $_POST["hair_color"], $_POST["top_color"], $_POST["bottom_color"])){
        
        /* Remember the inputs */
        $_SESSION["lastname_user"]=$_POST["lastname_user"];
        $_SESSION["firstname_user"]=$_POST["firstname_user"];
        $_SESSION["email_user"]=$_POST["email_user"];
        $_SESSION["mobile_user"]=$_POST["mobile_user"];
        $_SESSION["username_user"]=$_POST["username_user"];
        $_SESSION["password_user"]=$_POST["password_user"];
        $_SESSION["id_universe"]=$_POST["id_universe"];
        $_SESSION["skin_color"]=$_POST["skin_color"];
        $_SESSION["hair_color"]=$_POST["hair_color"];
        $_SESSION["top_color"]=$_POST["top_color"];
        $_SESSION["bottom_color"]=$_POST["bottom_color"];
        
        if(isset($_POST["hair_style"])){
            $_SESSION["hair_style"]=$_POST["hair_style"];
        }
        
        /* Add user */
        $request = 'SELECT * FROM user';
        $result = $pdo->query($request) or die ("Erreur : la requête a échoué.");
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            if($row["username_user"]==$_POST["username_user"]){
                redirect("form_user.php?error=name");
            }
        }
        $request = 'INSERT INTO user VALUES (NULL,"'.$_POST['lastname_user'].'","'.$_POST['firstname_user'].'","'.$_POST['email_user'].'","'.$_POST['mobile_user'].'","'.$_POST['username_user'].'","'.password_hash($_POST['password_user'], PASSWORD_BCRYPT).'",0,"'.$_POST['id_universe'].'","'.$_POST['hair_color'].'","'.$_POST['skin_color'].'","'.$_POST['top_color'].'","'.$_POST['bottom_color'].'","'.$_POST['hair_style'].'")';
        $pdo->exec($request) or die (print_r($pdo->errorInfo()).$request." fail. <a href='form_user.php'>Retry</a>");
        
        return TRUE;

    }else{

        return FALSE;
    }
}

function login_user(){
    $pdo = bdd_connection();
    
    if(isset($_POST["username_user"], $_POST["password_user"])){
        /* Remember the inputs */
        $_SESSION["login_username_user"]=$_POST["username_user"];
        $_SESSION["login_password_user"]=$_POST["password_user"];
        
        $request= "SELECT * FROM user";
        $result = $pdo->query($request);

        $id_user = NULL;
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            if($row["username_user"]==$_POST["username_user"]){
                if(password_verify($_POST["password_user"], $row["password_user"])){
                    $id_user=$row["id_user"];
                    $_SESSION["id"]=$row["id_user"];
                    $_SESSION["name"]=$row["username_user"];
                    $_SESSION["skin_color"]=$row["skin_color_user"];
                    $_SESSION["hair_color"]=$row["hair_color_user"];
                    $_SESSION["top_color"]=$row["top_color_user"];
                    $_SESSION["bottom_color"]=$row["bottom_color_user"];
                    $_SESSION["hair_style"]=$row["hair_style_user"];
                }
            }
        }

        if($id_user==NULL){
            redirect("form_login.php?error=true");
            return FALSE;
        }else{            
            return TRUE;
        }
    }else{
        return FALSE;
    }
}

function logout_user(){
    if(is_connected()){
        $_SESSION['id']=NULL;
        session_destroy();
    }
    return TRUE;
}

?>