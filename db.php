
<?php 
$startstatus = $_POST['start1'];

if ($startstatus == 'start') {

require_once 'config.php';
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

echo '<br><form>
  <div class="form-group row">
    <label for="inputEmail3" class="col-sm-2 col-form-label">Логин</label>
    <div class="col-sm-10">
      <input type="input" class="form-control" id="inputEmail3" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <label for="PassAdmin" class="col-sm-2 col-form-label">Пароль</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputEmail3" placeholder="">
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-10 offset-sm-2">
      <button type="submit" class="btn btn-primary">Создать Администратора</button>
    </div>
  </div>
</form>
';

}
else {
	echo 'вы не начали установку';
}

 ?>
 