<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Установка БД</title>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- 	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="jquery-3.3.1.min.js"></script>
</head>
<body>
	
	<div class="container">
	<div class="exemple-bs">
	<div class="row">

		<div class="col">
			<h1 class="card-header">Установка скрипта</h1>
			<p class="card-info">Это простой скрипт постановки задач</p>
		</div>

	</div>
	</div>

  <div class="row">
    <div class="col">
    </div>
    <div class="col" style="text-align: center;">
     <button type="button" class="btn btn-success"  name="submit" id="submit" value="submit" onClick = "startinstall()">Установить скрипт</button>
    </div>
    <div class="col">
    </div>
  </div>

<div class="row">
    <div class="col">
    </div>
    <div class="col" id='msg'>
      <script>
function startinstall(){
    var name = 'start';
    $.ajax({
        type: "POST",
        url: "db.php",
        data: {start1:name}
    }).done(function( result )
        {
            $("#msg").html( '<br>'+result );
        });
}

function adminregistred(){
    var login = $('#loginadm').val();
    var password = $('#passadm').val();
    console.log(login, password);

    $.ajax({
        type: "POST",
        url: "db.php",
        data: {logina:login, passa:password}
    }).done(function( result )
        {
        	/*$('#regadm').empty();*/
            $("#msg").html( '<br>'+result );
        });
}


</script>
    </div>
    <div class="col">
    </div>
  </div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>