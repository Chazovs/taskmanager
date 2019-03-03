
<?php 
require_once 'config.php';
$startstatus = $_POST['start1'];

if ($startstatus == 'start') {
// Подключаемся к серверу БД
$mysql = mysql_connect($db_server, $db_user, $db_password);
if (!$mysql) { die ('Connection error: ' . mysql_error()); }
else{echo "1. подключение прошло корректно<br>";}

// Выбираем БД
$db = mysql_select_db($db_name, $mysql);
if (!$db) { die ('Error select db : ' . mysql_error()); }
else{
	echo "2. база подключена<br>";

// Устанавливаем кодировку подключения
	mysql_query("SET NAMES 'utf8'");
	mysql_query("SET CHARACTER SET 'utf8'");

// Запросы ...

	$query1 = 'CREATE Table Tasks
	(
    	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    	deadline VARCHAR(200) NOT NULL,
    	tasktitle VARCHAR(200) NOT NULL,
    	taskbody VARCHAR(200) NOT NULL,
    	taskstatus BOOLEAN NOT NULL
	)';
	
	if (mysql_query($query1)){
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

if (mysql_query($query2)){
        echo "4. Создание таблицы Users завершено<br>";
	}
    else{
        echo "4. Таблицу USERS создать не удалось<br>";
	}
	}	

// Отключаемся от базы
mysql_close($mysql);

echo '<br><div id="regadm"><form>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Логин</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="loginadm" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="PassAdmin" class="col-sm-2 col-form-label">Пароль</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="passadm" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10 offset-sm-2">
      <button type="submit" class="btn btn-primary" onClick = "adminregistred()">Создать Администратора</button>
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
echo $adminlog . '<br>';
echo $adminpass . '<br>';
$mysql = mysql_connect($db_server, $db_user, $db_password);
if (!$mysql) {die ('Connection error: ' . mysql_error()); }
else{echo "1. подключение для создания нового админа прошло корректно<br>";}

// Выбираем БД
$db = mysql_select_db($db_name, $mysql);
if (!$db) { die ('Error select db : ' . mysql_error()); }
else{
	echo "2. база подключена<br>";
	/*если все ок, то начинаем записывать данные*/
	/*$query3="SELECT 1 FROM Users WHERE login = '$adminlog';";
	$query_post=mysql_query($query3);*/
	$query_post = mysql_query("SELECT true FROM users WHERE login = '$adminlog'");
	$query3 = mysql_num_rows($query_post);
	echo "3." . $query3 . "<br>";

	


/*если такого пользователя нет, то регистрируем его*/
	if($query3==0)
    {
    	$sql = "INSERT into Users (login, password, permission) values ('$adminlog', '$adminpass', 'admin')";
        $result = mysql_query($sql);
echo "4.Такого пользователя нет в базе, будем его создавать";
} elseif ($query3>0){
	/*Если же такой пользователь уже есть, то обновляем информацию*/
$sql = "UPDATE USERS SET password = '$adminpass', permission = 'admin' WHERE login = '$adminlog'";
        $result = mysql_query($sql);
        echo "5.Такой пользователь есть - данные обновлены";
}
mysql_close($mysql);

	}
}
else {
	echo 'Внимание! Установка не выполнена! Произошел сбой.';
}
 ?>
 