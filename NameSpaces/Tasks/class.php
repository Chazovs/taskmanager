
<?php 
namespace MyTasks;

/**
 * это класс для авторизации
 */
class AuthUser
{
		
}

/**
 * Это класс для подключения к БД
 */
class DBConnect
{
	public static $mConnect;	// Хранит результат соединения с базой данных
    public static $mSelectDB;	// Хранит результат выбора базы данных

	function __construct(argument)
	{
		# code...
	}

public static function Connect($host, $user, $pass, $name)
	{
		// Пробуем создать соединение с базой данных
		self::$mConnect = mysql_connect($host, $user, $pass);

		// Если подключение не прошло, вывести сообщение об ошибке..
		if(!self::$mConnect)
		{
			echo "<p>Не удалось подключиться к базе</p>";
			exit();
			return false;
		}

		// Пробуем выбрать базу данных
		self::$mSelectDB = mysql_select_db($name, self::$mConnect);

		// Если база данных не выбрана, вывести сообщение об ошибке..
		if(!self::$mSelectDB)
		{
			echo "<p><b>".mysql_error()."</b></p>";
			exit();
			return false;
		}

		// Возвращаем результат
		return self::$mConnect;
	}

// Метод закрывает соединение с базой данных
	public static function Close()
	{
		// Возвращает результат
		return mysql_close(self::$mConnect);
	}
https://www.pvsm.ru/mysql/27068
}
?>