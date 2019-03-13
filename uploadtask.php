<?php 
session_start();
require_once 'config.php';
if (!empty($_POST['dateNewTaskPost']) && !empty($_POST['FullTasktextPost']) && !empty($_POST['postdbuser']) && !empty($_POST['headerTaskPost'])){

$dateNewTaskPost=$_POST['dateNewTaskPost'];
$FullTasktextPost=$_POST['FullTasktextPost'];
$headerTaskPost=$_POST['headerTaskPost'];
$userTask=$_SESSION['userid'];
$stausTask=false;
$mysql = mysqli_connect($db_server, $db_user, $db_password, $db_name);
if (!$mysql) { die; }
else{

	/*сюда пишем запросы*/
	mysqli_query($mysql, "SET NAMES 'utf8'");
	mysqli_query($mysql, "SET CHARACTER SET 'utf8'");

	$AddTaskQuery = 'INSERT INTO `Tasks` (`dead_line`, `task_title`, `task_body`, `task_user`, `task_status`) VALUES ($dateNewTaskPost, $headerTaskPost, $FullTasktextPost, $userTask, $stausTask);';
	if (mysqli_query($mysql, $AddTaskQuery)){
		echo "Добавление задачи завершено<br>";
	}
	mysqli_close($mysql);

}


}

 ?>