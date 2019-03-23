<?php 
session_start();
echo "<br>Запрос отправлен обработчику<br>";
require_once 'config.php';

/*добавляем новую задачу*/
if (!empty($_POST['dateNewTaskPost']) && !empty($_POST['FullTasktextPost']) && !empty($_SESSION['userid']) && !empty($_POST['headerTaskPost'])){
echo "Данные доставлены<br>";
$dateNewTaskPost=$_POST['dateNewTaskPost'];
$FullTasktextPost=nl2br($_POST['FullTasktextPost']);
$headerTaskPost=$_POST['headerTaskPost'];
$userTask=$_SESSION['userid'];
$stausTask=false;
$mysql = mysqli_connect($db_server, $db_user, $db_password, $db_name);
if (!$mysql) { die; echo "Соединение не состоялось<br>";}
else{
echo "Подключение к базе завершено<br>";
	/*сюда пишем запросы*/
	mysqli_query($mysql, "SET NAMES 'utf8'");
	mysqli_query($mysql, "SET CHARACTER SET 'utf8'");

	$AddTaskQuery = "INSERT INTO Tasks (dead_line, task_title, task_body, task_user, task_status) VALUES ('$dateNewTaskPost', '$headerTaskPost', '$FullTasktextPost', '$userTask', '$stausTask');";
	if (mysqli_query($mysql, $AddTaskQuery)){
		echo "Добавление задачи завершено<br>";
	}
	mysqli_close($mysql);

}
}

/*удаляем задачу, если пользователь нажал на крестик*/
if (!empty($_POST['delTasksPost']) && !empty($_SESSION['userid'])
){

$idTaskForDel = $_POST['delTasksPost'];
$TaskUserID = $_SESSION['userid'];
echo "ID удаляемой задачи " . $idTaskForDel;
$mysql = mysqli_connect($db_server, $db_user, $db_password, $db_name);
if (!$mysql) { die; echo "Соединение не состоялось<br>";}
else{
echo "Подключение к базе завершено<br>";
mysqli_query($mysql, "SET NAMES 'utf8'");
mysqli_query($mysql, "SET CHARACTER SET 'utf8'");

$delTaskQuery = "DELETE FROM Tasks WHERE id = $idTaskForDel AND task_user = $TaskUserID";
if (mysqli_query($mysql, $delTaskQuery)){
		echo "Задача удалена";
	}else{
		echo "Что-то пошло не так<br>";
	}
	mysqli_close($mysql);

}
}

/*обновляем статус задачи*/
if (!empty($_POST['chStatTasksIDPost']) && !empty($_POST['taskStatPost']) && !empty($_SESSION['userid'])
){

$idTaskChStat = $_POST['chStatTasksIDPost'];
$TaskSt = $_POST['taskStatPost'];
$TaskUserID = $_SESSION['userid'];
echo "ID задачи, у которой меняем статус" . $idTaskChStat;
echo "Устанавливаемый статус" . $TaskSt;
$mysql = mysqli_connect($db_server, $db_user, $db_password, $db_name);
if (!$mysql) { die; echo "Соединение не состоялось<br>";}
else{
echo "Подключение к базе завершено<br>";
mysqli_query($mysql, "SET NAMES 'utf8'");
mysqli_query($mysql, "SET CHARACTER SET 'utf8'");

$ChStatTaskQuery = "UPDATE Tasks SET task_status=$TaskSt WHERE id = $idTaskChStat AND task_user = $TaskUserID";
if (mysqli_query($mysql, $ChStatTaskQuery)){
		echo "Статус изменен";
	}else{
		echo "Статус не изменен<br>";
	}
	mysqli_close($mysql);

}
}
 ?>