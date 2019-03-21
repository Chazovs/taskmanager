


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
            $("#modal-content").html( 'Задача добавлена' + result );
            
        });
}

$(function() {

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
   }else {
       $(this).parent().parent().attr('class','table-info');
   }
  });     

});