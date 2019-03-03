<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Установка БД</title>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- 	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<script src="myjs.js"></script>
<script src="jquery-3.3.1.min.js"></script>
</head>
<body>
	
	<div class="container">
	<div class="exemple-bs">
	<div class="row">

		<div class="col">
			<h1 class="card-header">Установка MyTask</h1>
			<p class="card-info">Версия  скрипта: 0.01 beta</p>
		</div>

	</div>
	</div>

  <div class="row">
    <div class="col">
    </div>
    <div class="col" style="text-align: center;">

<!-- форма для установки доступов к базе -->
<form>
	<div class="list-group">
  <p class="list-group-item list-group-item-action list-group-item-info">Введите данные доступа к базе данных</p><br>
</div>
  <div class="form-group row">
    <label for="dbhost" class="col-sm-4 col-form-label">Host</label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="dbhost" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="dbname" class="col-sm-4 col-form-label">DB name</label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="dbname" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="dbuser" class="col-sm-4 col-form-label">User</label>
    <div class="col-sm-8">
      <input type="input" class="form-control" id="dbuser" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="dbpassword" class="col-sm-4 col-form-label">Password</label>
    <div class="col-sm-8">
      <input type="password" class="form-control" id="dbpassword" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10 offset-sm-2">
     <button type="button" class="btn btn-success"  name="submit2" id="submit" value="submit" onClick = "startinstall()">Установить скрипт</button>
    </div>
  </div>
</form>
<!-- конец формы установки базы -->

     
    </div>
    <div class="col">
    </div>
  </div>

<div class="row">
    <div class="col">
    </div>
    <div class="col" id='msg'>
    </div>
    <div class="col">
    </div>
  </div>

<div class="row">
  	<div class="col-2"></div>
  	<div class="col-8" id="msg2" style="text-align: center;">22</div>
  	<div class="col-2"></div>

</div>

<div class="row">
  	<div class="col-3"></div>
  	<div class="col-6" id="msg2" style="text-align: center;">
  		
  		<div class="list-group">
  <a href="#!" class="list-group-item list-group-item-action list-group-item-danger">Удалите скрипт install.php после завершения установки</a>
</div>
  	</div>
  	<div class="col-3"></div>

</div>

</div>





<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>