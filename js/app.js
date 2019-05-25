var eyes = ["worry", "spiral", "angry", "happy", "arrow", "empty"];
var expression = ["tears1", "tears2", "transpi1", "transpi2", "waves"];
var pose = ["wonder", "fight", "success", "victory", "defend", "hanche", "weird", "shocked", "tired"];

$(document).ready(function(){
    //** Pop-up suppression **//
    $("button[data-target='#task_popup']").click(function(){
        console.log('helle');
        $('#task_popup .modal-body').text("Etes-vous sûr.e de vouloir supprimer la tâche : "+$(this).attr('data-name')+" ?");
        $('#task_popup a').attr('href', 'delete_task.php?id_task='+$(this).attr('data-id')+'&name_task='+$(this).attr('data-name')+'');
    })
    
    //** Animation chara **//
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
})