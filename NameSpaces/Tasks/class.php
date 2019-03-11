
<?php 

/**
 * Это класс для подключения к БД
 */

echo "файл классов подключен <br>";

class DBConnect
{
	public static $mConnect;	// Хранит результат соединения с базой данных
    public static $mSelectDB;	// Хранит результат выбора базы данных

	/*function __construct(argument)
	{
		# code...
	}*/

public static function Connect($host, $user, $pass, $name)
	{
		// Пробуем создать соединение с базой данных
		self::$mConnect = mysqli_connect($host, $user, $pass, $name);

		// Если подключение не прошло, вывести сообщение об ошибке..
		if(!self::$mConnect)
		{
			echo "<p>Не удалось подключиться к базе</p>";
			exit();
			return false;
		}

		// Пробуем выбрать базу данных
	
		// Возвращаем результат
		return self::$mConnect;
	}

// Метод закрывает соединение с базой данных
public static function Close()
	{
		// Возвращает результат
		return mysqli_close(self::$mConnect);
	}
}
?>