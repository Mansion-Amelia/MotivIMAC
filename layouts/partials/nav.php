<nav class="nav">
    <a class="nav_brand" href='<?php echo $root_layouts ?>home.php'>
        <?php
            echo $title;
        ?>
    </a>
    
    <ul class="nav_menu">
        <?php
            require_once($link_app.'user.php');
            if(is_connected()){
            ?>
                <li class="nav_menu_item primary"><a class="nav_menu_item_link" href='<?php echo $root_layouts ?>profil.php'>Profil</a></li>
                <li class="nav_menu_item primary"><a class="nav_menu_item_link" href='<?php echo $root_task ?>read_task.php'>Mes tâches</a></li>
                <li class="nav_menu_item secondary"><a class="nav_menu_item_link" href='<?php echo $root_auth ?>logout.php'>Se déconnecter</a></li>
            <?php
            }else{
            ?>
                <li class="nav_menu_item primary"><a class="nav_menu_item_link" href='<?php echo $root_auth ?>form_login.php'>Se connecter</a></li>
                <li class="nav_menu_item secondary"><a class="nav_menu_item_link" href='<?php echo $root_auth ?>form_user.php'>S'inscrire</a></li>
            <?php
            }
        ?>
    </ul>
</nav>
