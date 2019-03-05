<?php 

/*в этом скрипте мы авторизуем пользователя, записывая данные в сессию*/
namespace MyTasks;
session_start();
include "config.php";
if (!isset($_SESSION['userid'])) {
if (!empty($_POST['userLogin']) && !empty($_POST['userPass'])) {

$formLogin=$_POST['userLogin'];
$formPass=$_POST['userPass'];
$formPassmd5=md5($formPass);
MyTasks\DBConnect::Connect($db_server, $db_user, $db_password, $db_name);
$loginGet=mysql_query("SELECT * FROM users WHERE login='$formLogin'");	
$passworGet=mysql_query("SELECT * FROM users WHERE password='$formPassmd5'");
$rowlogin=mysql_fetch_array($loginGet);
$rowPass=mysql_fetch_array($passworGet);

if (empty($rowlogin['login']) or empty($rowPass['password']))
    {
    //если пользователя с введенным логином не существует
    exit ("<body><div align='center'><br/><br/><br/>
	<h3>Извините, введённый вами login или пароль неверный." . "<a href='index.php'> <b>Назад</b> </a></h3></div></body>");
    }
    else {
/*и здесь мы проводим проверку - соотвутствуют ли логины и пароли*/

$_SESSION['login']=$myrow["login"]; 
    $_SESSION['id']=$myrow["id"];
   header("Location:index.php"); 
    }


  

} else {
/*если данные авторизации не переданы, то выводим пользователю соответствующее сообщение и предлагаем попробовать еще раз*/
echo "<a href="index.php">данные об авторизации не получены - попробуйте еще раз</a>";

}




} else {
	/*если в сессию записан id пользователя то возвращаем его на главную страницу автоматически*/
 header("Location:index.php"); 
 exit;
}

 ?>