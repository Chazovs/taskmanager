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
            $("#msg2").html( '<br>123'+result );
        });
}