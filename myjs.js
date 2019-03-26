// редактирует задачу
function editTask(id){
    $("#editTaskModalTitle").html("Редактирование");
    $("#maodalMainButton").html("Редактировать задачу");
    $("#maodalMainButton").attr("onClick", "addEdition()");
   /* $("#maodalMainButton").attr("onClick", "addEdition()");*/
    var oldDate  = $('#dateTask'+id).attr("name");
    var oldTitle = $('#titleTask'+id).html();
    var oldBody = $('#bodyTask'+id).html();
    $("#headerTask").attr("value", oldTitle);
    $("#FullTasktext").html(oldBody);
    $("#dateNewTask").attr("value", oldDate);
    $("#formGroup").append("<input type='hidden' value='"+ id + "' id='IDTaskEditModal'>")
}

// Отправляем отредактированную задачу
function addEdition(){
    var NewEditTaskTitle = $('#headerTask').val();
    var NewEditTaskBody = $('#FullTasktext').val();
    var NewEditTaskDate = $('#dateNewTask').val();
    var NewEditTaskID = $('#IDTaskEditModal').val();

     $.ajax({
        type: "POST",
        url: "db.php",
        data: {NewEditTaskTitlePost:NewEditTaskTitle, NewEditTaskBodyPost:NewEditTaskBody, NewEditTaskDatePost:NewEditTaskDate, NewEditTaskIDPost:NewEditTaskID, tokenEditTaskPost:'sfcvsdf353312cvDD'}
    }).done(function( result )
        {
            $("#modalAddTaskBody").html( 'Задача отредактирована<br>'+result );
        });

}

function startinstall(){
    var name = 'start';
    var dbhost = $('#dbhost').val();
    var dbname = $('#dbname').val();
    var dbuser = $('#dbuser').val();
    var dbpassword = $('#dbpassword').val();
    $.ajax({
        type: "POST",
        url: "db.php",
        data: {start1:name, posthost:dbhost, postdbname:dbname, postdbuser:dbuser, postdbpass:dbpassword}
    }).done(function( result )
        {
            $("#msg").html( '<p class="list-group-item list-group-item-action list-group-item-warning">Лог работы скрипта установки:</p><br>'+result );
        });
}

function adminregistred(){
    var login = $('#loginadm').val();
    var password = $('#passadm').val();
    $.ajax({
        type: "POST",
        url: "db.php",
        data: {logina:login, passa:password}
    }).done(function( result )
        {
        	/*$('#regadm').empty();*/
            $("#msg2").html( '<br>'+result );
        });
}

function newTask(){
    var dateNewTask = $('#dateNewTask').val();
    var FullTasktext = $('#FullTasktext').val();
    var headerTask = $('#headerTask').val();
    $.ajax({
        type: "POST",
        url: "tasksmanager.php",
        data: {dateNewTaskPost:dateNewTask, FullTasktextPost:FullTasktext, headerTaskPost:headerTask}
    }).done(function( result )
        {
            $("#modalAddTaskBody").html( 'Задача добавлена' + result );
            
        });
}


function newUser(){
    var newLogin = $('#loginReg').val();
    var newPass = $('#passReg').val();
    var newEmail = $('#emailReg').val();
    var newAnsw = $('#answReg').val();

if (newAnsw == 'Пушкин') {

$.ajax({
        type: "POST",
        url: "db.php",
        data: {newLoginPost:newLogin, newPassPost:newPass, newEmailPost:newEmail}
    }).done(function( result )
        {
            $("#mainContain").html(result + '<br><a href="index.php">На страницу авторизации</a>');
            
        });
} else {

$("#mainContain").html('Вы неправильно ответили на контрольный вопрос<br>');
}
    
}


$(function() {

/*перебрасвает с главной на страницу регистрации*/
$('#regPage').on('click', function() { window.location = '/registration.php'; });


/*закрывает окно постановки задачи*/
$('#modal-close').click(function() {
       location.reload();
    });

/*закрывает задачу*/
$("button[id^='task-close']").click(function(){
         
       $(this).parent().parent().hide(100);
       var delTasks = $(this).val();
       console.log('Закрыта задача ', delTasks);

 $.ajax({
        type: "POST",
        url: "tasksmanager.php",
        data: {delTasksPost:delTasks}
    }).done(function( result )
        {
           console.log(result );
            
        });
  });   

/*меняет статус задачи*/
$('.Myform-check-input').click(function(){
    if ($(this).is(':checked')){
       $(this).parent().parent().attr('class','table-success');

var chStatTasksID = $(this).val();
var taskStat = true;
$.ajax({
        type: "POST",
        url: "tasksmanager.php",
        data: {chStatTasksIDPost:chStatTasksID, taskStatPost:taskStat}
    }).done(function( result )
        {
           console.log(result );
            
        });

   }else {
       $(this).parent().parent().attr('class','table-info');


var chStatTasksID = $(this).val();
var taskStat = false;
$.ajax({
        type: "POST",
        url: "tasksmanager.php",
        data: {chStatTasksIDPost:chStatTasksID, taskStatPost:taskStat}
    }).done(function( result )
        {
           console.log(result );
            
        });

   }
  });     

});