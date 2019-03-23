
<?php 

/*Записываем конфигурацию подключения к БД в файл*/
if (!empty($_POST['posthost']) && !empty($_POST['postdbname']) && !empty($_POST['postdbuser']) && !empty($_POST['postdbpass'])){

$filename = "config.php";
$file_handle = fopen($filename, "w+") or die("не удалось открыть файл");
$posthost = $_POST['posthost'];
$postdbname = $_POST['postdbname'];
$postdbuser = $_POST['postdbuser'];
$postdbpass = $_POST['postdbpass'];

$cout="<?php\r\n\$db_server = '" . $posthost . "';\r\n\$db_name = '" . $postdbname . "';\r\n\$db_user = '" . $postdbuser . "';\r\n\$db_password = '" . $postdbpass . "';\r\n?>";
fwrite($file_handle, $cout); 
fclose($file_handle);
} elseif (!empty($_POST['start1'])) {
	echo "Вы не ввели данные доступа к базе";
	die();
	
}
require_once 'config.php';
$startstatus = $_POST['start1'];
if ($startstatus == 'start') {
echo "0. Скрипт начал свою работу<br>";
// Подключаемся к серверу БД
$mysql = mysqli_connect($db_server, $db_user, $db_password, $db_name);
if (!$mysql) { die ('Ошибка соединения с базой: ' . mysqli_error()); }
else{echo "1. подключение прошло корректно<br>";

	echo "2. база подключена<br>";

// Устанавливаем кодировку подключения
	mysqli_query($mysql, "SET NAMES 'utf8'");
	mysqli_query($mysql, "SET CHARACTER SET 'utf8'");

// Запросы ...

	$query1 = 'CREATE Table Tasks
	(
    	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    	dead_line VARCHAR(200) NOT NULL,
    	task_title VARCHAR(200) NOT NULL,
    	task_body VARCHAR(2000) NOT NULL,
    	task_user VARCHAR(200) NOT NULL,
    	task_status BOOLEAN NOT NULL
	)';
	
	if (mysqli_query($mysql, $query1)){
        echo "3. Создание таблицы Tasks завершено<br>";
	}
    else{
        echo "3. Таблицу Tasks создать не удалось<br>";
	}


	$query2 ='CREATE Table Users
	(
    	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    	login VARCHAR(200) NOT NULL,
    	password VARCHAR(200) NOT NULL,
    	permission VARCHAR(200) NOT NULL
	)';

if (mysqli_query($mysql, $query2)){
        echo "4. Создание таблицы Users завершено<br>";
	}
    else{
        echo "4. Таблицу USERS создать не удалось<br>";
	}
	}	

// Отключаемся от базы
mysqli_close($mysql);

echo '<br><div id="regadm">

<div class="list-group">
  <p class="list-group-item list-group-item-action list-group-item-info">Введите логин и пароль администратора </p><br>
</div>

<form>
  <div class="form-group row">
    <label for="loginadm" class="col-sm-2 col-form-label">Логин</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="loginadm" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="passadm" class="col-sm-2 col-form-label">Пароль</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="passadm" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10 offset-sm-2">
      <button type="button" class="btn btn-primary" onClick = "adminregistred()">Создать Администратора</button>
    </div>
  </div>
</form>
</div>
';

}
 elseif (isset($_POST['logina']) && isset($_POST['passa']))
{

$adminlog = $_POST['logina'];
$adminpass = $_POST['passa'];
echo '<br> Введеный логин: ' . $adminlog . '<br>';
echo 'Введенный пароль: ' . $adminpass . '<br>';
$mysql = mysqli_connect($db_server, $db_user, $db_password, $db_name);
if (!$mysql) {die ('Connection error: ' . mysqli_error()); }
else{echo "1. подключение для создания нового админа прошло корректно<br>";
	echo "2. база подключена<br>";
	/*если все ок, то начинаем записывать данные*/
	$query_post = mysqli_query($mysql, "SELECT true FROM users WHERE login = '$adminlog'");
	$query3 = mysqli_num_rows($query_post);
	echo "3. Количество пользователей с таким же логином" . $query3 . "<br>";

	

$adminpass=md5($adminpass);
/*если такого пользователя нет, то регистрируем его*/
	if($query3==0)
    {
    	$sql = "INSERT into Users (login, password, permission) values ('$adminlog', '$adminpass', 'admin')";
        $result = mysqli_query($mysql, $sql);
echo "4.Такого пользователя нет в базе, будем его создавать<br>";
} elseif ($query3>0){
	/*Если же такой пользователь уже есть, то обновляем информацию*/
$sql = "UPDATE USERS SET password = '$adminpass', permission = 'admin' WHERE login = '$adminlog'";
        $result = mysqli_query($mysql, $sql);
        echo "5.Такой пользователь есть - данные обновлены<br>";
}
mysqli_close($mysql);

	}
	echo "6.Мы успешно отключились от базы";
}
else {
	echo 'Внимание! Установка не выполнена! Произошел сбой.';
}
 ?>
 