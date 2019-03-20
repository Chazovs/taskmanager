<?php 
session_start();
echo "<br>Запрос отправлен обработчику<br>";
require_once 'config.php';
if (!empty($_POST['dateNewTaskPost']) && !empty($_POST['FullTasktextPost']) && !empty($_SESSION['userid']) && !empty($_POST['headerTaskPost'])){
echo "Данные доставлены<br>";
$dateNewTaskPost=$_POST['dateNewTaskPost'];
$FullTasktextPost=$_POST['FullTasktextPost'];
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

 ?>