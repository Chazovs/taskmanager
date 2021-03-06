<?php 
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
 <script src="jquery-3.3.1.min.js"></script>
 <!-- <script src="jquery-3.3.1.min.js"></script> -->
<!-- <script src="js/jquery-3.1.1.min.js"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script> -->

 
<script src="myjs.js"></script>
  
</head>
<body>

<?php 
if(isset($_SESSION['userid']))
{
$connectClass=DBConnect::Connect($db_server, $db_user, $db_password, $db_name);
  $idUser = $_SESSION['userid'];
$sqluser=mysqli_query($connectClass, "SELECT login FROM users WHERE id='$idUser'");
$getname = mysqli_fetch_assoc($sqluser);
$userlogin = $getname['login'];
echo '<div class="container">
  <div class="exemple-bs">
  <div class="row">
    <div class="col">
      <h1 class="card-header">Мои задачи</h1>
      <p class="card-info"> Привет ' . $userlogin . '! (<a href="delog.php">Выход</a>) <br><br>
       <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTaskModal">
  Поставить новую задачу
</button>
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

/*дальше непонятки и ошибки - исправлены:))*/

$sqlQuery= new mysqli($db_server, $db_user, $db_password, $db_name);
$nowID=$_SESSION["userid"];
$query5 = "SELECT * FROM Tasks WHERE task_user=$nowID ORDER BY id DESC";
$result = $sqlQuery->query($query5);
$localTaskIndex=1;
while ($row = $result->fetch_row())
{
if ($row[5]==true) {
  $TaskStatusClass='table-success';
  $ChekUnchek='checked';
} elseif ($row[5]==false) {

  /*если задача просрочена и не отмечена как выполненная*/
  $nowDate=date("Y-m-d");
  if ($row[1]<$nowDate) {
    $TaskStatusClass='table-danger';
  } else {
    $TaskStatusClass='table-info';
  }
  
  
  $ChekUnchek='';
}

/*начало вывода таблицы*/
    echo '
  <tr class="' . $TaskStatusClass . '" >
      <th scope="row">' . $localTaskIndex . '</th>
      <td id="dateTask' . $row[0] . '" name="' . date("Y-m-d", strtotime($row[1]) ) . '">' . date("d.m.Y", strtotime($row[1]) ) . '</td>
      <td>
        <h5 class="mt-0" id="titleTask' . $row[0] . '">' . $row[2] . '
        </h5>
        <p class="card-text" id="bodyTask' . $row[0] . '">
        ' . $row[3] . '
        </p>
      </td>
      <td class="MyCenterText">
    <input class="Myform-check-input" type="checkbox" value="' . $row[0] . '" id="chektaskid' . $row[0] . '" ' . $ChekUnchek . '>
      </td>
       <td class="MyCenterText">
    <button type="button" class="close" id="task-close' . $row[0] . '" value="' . $row[0] . '">
          <span aria-hidden="true">×</span>
        </button>
        <button type="button" class="btn btn-link" value="' . $row[0] . '" id="task-edit' . $row[0] . '" onClick="editTask(' . $row[0] . ')">
<img src="img/edit.png" width="16px" height="16px" alt="редактировать" data-toggle="modal" data-target="#newTaskModal">
        </button>
      </td>
    </tr>';
    $localTaskIndex++;
}


/*конец вывода таблицы*/

DBConnect::Close();
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
  
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newTaskModal">
  Поставить новую задачу
</button>
    </div>
    <div class="col">
    </div>
  </div>
</div>
<!-- конец контейнера с кнопкой -->';

echo '<!-- Modal -->
<div class="modal" id="newTaskModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenteredLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editTaskModalTitle">Новая задача</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="modal-close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body" id="modalAddTaskBody">
       <form>
  <div class="form-group" id="formGroup">
    <label for="formGroupExampleInput">Заголовок задачи</label>
    <input type="text" class="form-control" id="headerTask" placeholder="Заголовок задачи" value="">
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput2">Текст задачи</label>
   
    <textarea name="comments" cols="50" rows="5" class="form-control" id="FullTasktext"></textarea>

    <!-- <input type="text" class="form-control" id="FullTasktext" placeholder=""> -->
  </div>
   <div class="form-group">
    <label for="formGroupExampleInput2">Крайний срок</label>
    <input type="date" class="form-control" id="dateNewTask" placeholder="дата">
  </div>
  <button type="button" class="btn btn-success" onClick="newTask()" id="maodalMainButton">Добавить задачу</button>
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

<form action="login.php" method="post">
  <div class="form-group row">
    <label for="userLogin" class="col-sm-2 col-form-label">Логин</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="userLogin" name="userLogin" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="userPass" class="col-sm-2 col-form-label">Пароль</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="userPass" name="userPass" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10 offset-sm-2">
      <button type="submit" class="btn btn-primary">Авторизоваться</button><br>
    </div>
  </div>
</form>

</div>
<button class="btn btn-success" id="regPage" onclick="window.location="/registration.php"">Зарегистрроваться</button>
</div>';

}
 ?>


<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
 --><script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
