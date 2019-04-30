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
    <h1 class="title">Vos tâches</h1>
    <?php
        require_once($link_app.'task.php');
        if(is_connected()){
            read_task();
            ?>
            <a class="btn primary" href='form_task.php'>Ajouter tâche</a>
            <?php
        }else{
            echo "Vous êtes déconnecté...";
        }
    ?>
    
    </main>
    
    <script>
        $(document).ready(function(){
            $("button[data-target='#task_popup']").click(function(){
                console.log('helle');
                $('#task_popup .modal-body').text("Etes-vous sûr.e de vouloir supprimer la tâche : "+$(this).attr('data-name')+" ?");
                $('#task_popup a').attr('href', 'delete_task.php?id_task='+$(this).attr('data-id')+'&name_task='+$(this).attr('data-name')+'');
            })
        })
    </script>
</body>
</html>