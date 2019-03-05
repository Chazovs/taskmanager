<?php 
namespace MyTasks;
include($_SERVER['DOCUMENT_ROOT']."/NameSpaces/tasks/class.php");
session_start();
include "config.php";
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Мой задачник</title>
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<?php 
if(isset($_SESSION['userid']))
{
MyTasks\DBConnect::Connect($db_server, $db_user, $db_password, $db_name);
  $idUser = $_SESSION['userid'];
$sqluser="SELECT login FROM users WHERE id='$idUser'";
$getname = mysql_fetch_assoc($sqluser);
$userlogin = $getname['login'];
echo '<div class="container">
  <div class="exemple-bs">
  <div class="row">
    <div class="col">
      <h1 class="card-header">Мои задачи</h1>
      <p class="card-info"> Привет ' . $userlogin . '! </p>
      <p>
      <a href="delog.php">Выход</a>
      </p>
    </div>
  </div>
  </div>
</div>
<div class="row">
  <div class="col-1"></div>
  <div class="col-10">
<table class="table table-hover">
  <thead>
    <tr>
      <th>#</th>
      <th>Крайний срок</th>
      <th class="col-8">Текст задачи</th>
      <th class="col-1">Статус</th>
    </tr>
  </thead>
  <tbody>';


$sql="SELECT * FROM Tasks WHERE task_user=" . $_SESSION['userid'];
while (  $row  =  mysqli_fetch_row($sql)  )
{
if ($row[5]==true) {
  $TaskStatusClass='table-success';
} elseif ($row[5]==false) {
  $TaskStatusClass='table-info';
}

/*начало вывода таблицы*/
    echo '
  <tr class="' . $TaskStatusClass . '" >
      <th scope="row">' . $row[0] . '</th>
      <td>' . $row[1] . '</td>
      <td>
        <h5 class="mt-0">' . $row[2] . '
        </h5>
        <p class="card-text">
        ' . $row[3] . '
        </p>
      </td>
      <td class="MyCenterText">
    <input class="form-check-input" type="checkbox" value="" id="' . $row[0] . '">
      </td>
    </tr>';
}


/*конец вывода таблицы*/

MyTasks\DBConnect::Close();
/*закрываем соединение с БД*/
echo '
</tbody>
</table>
  </div>
  <div class="col-1"></div>
</div>
<!-- контейнер с кнопкой -->
<div class="container">
  <div class="row">
    <div class="col">
    </div>
    <div class="col">
   Button trigger modal
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCentered">
  Поставить новую задачу
</button>
    </div>
    <div class="col">
    </div>
  </div>
</div>
<!-- конец контейнера с кнопкой -->';

echo '<!-- Modal -->
<div class="modal" id="exampleModalCentered" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenteredLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
       <form>
  <div class="form-group">
    <label for="formGroupExampleInput">Заголовок задачи</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Example input">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Текст задачи</label>
    <input type="text" class="form-control" id="FullTasktext" placeholder="">
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput2">Крайний срок</label>
    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="дата">
  </div>
  <button type="button" class="btn btn-success">Success</button>
</form>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div> ';


} elseif (!isset($_SESSION['userid'])) {
  /*если в сессии нет айди пользователя, то пользователь не авторизован - выводим форму авторизации*/

Echo '<div class="container" id="main_area">
  <div class="row" >
  <div class="list-group">
  <p class="list-group-item list-group-item-action list-group-item-info">Введите ваш логин и пароль для авторизации</p><br>
</div>
</div>
<div class="row">&nbsp;</div>
<div class="row">

<form action="login.php">
  <div class="form-group row">
    <label for="logimain" class="col-sm-2 col-form-label">Логин</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="userLogin" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="passadmain" class="col-sm-2 col-form-label">Пароль</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="userPass" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10 offset-sm-2">
      <button type="submit" class="btn btn-primary">Авторизоваться</button>
    </div>
  </div>
</form>
</div>
</div>';

}
 ?>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
