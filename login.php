<?php 

/*в этом скрипте мы авторизуем пользователя, записывая данные в сессию*/


include($_SERVER['DOCUMENT_ROOT']."/NameSpaces/tasks/class.php");


session_start();
echo 'Физический путь к папке с классом: '.$_SERVER['DOCUMENT_ROOT']."/NameSpaces/tasks/class.php <br>";
var_dump(file_exists($_SERVER['DOCUMENT_ROOT']."/NameSpaces/tasks/class.php"));

include "config.php";
if (!isset($_SESSION['userid'])) {
if (!empty($_POST['userLogin']) && !empty($_POST['userPass'])) {

$formLogin=$_POST['userLogin'];
$formPass=$_POST['userPass'];
$formPassmd5=md5($formPass);
$connectClass=DBConnect::Connect($db_server, $db_user, $db_password, $db_name);
$loginGet=mysqli_query($connectClass, "SELECT * FROM users WHERE login='$formLogin'");	
$passworGet=mysqli_query($connectClass, "SELECT password FROM users WHERE login='$formLogin'");
$rowlogin=mysqli_fetch_array($loginGet);
$rowPass=mysqli_fetch_array($passworGet);

if (empty($rowlogin['login']) or empty($rowPass['password']))
    {
    //если пользователя с введенным логином не существует
    exit ("<body><div align='center'><br/><br/><br/>
	<h3>Извините, введённый вами login или пароль неверный." . "<a href='index.php'> <b>Назад</b> </a></h3></div></body>");
    }
    elseif ($formLogin==$rowlogin['login'] && $formPassmd5==$rowlogin['password']) {
/*и здесь мы проводим проверку - соотвутствуют ли логины и пароли*/
$_SESSION['login']=$formLogin; 
$_SESSION['userid']=$rowlogin['id'];
   header("Location:index.php"); 
    }

} else {
/*если данные авторизации не переданы, то выводим пользователю соответствующее сообщение и предлагаем попробовать еще раз*/
echo "<a href='index.php'>данные об авторизации не получены - попробуйте еще раз</a>";

}

} else {
	/*если в сессию записан id пользователя то возвращаем его на главную страницу автоматически*/
 header("Location:index.php"); 
 exit;
}

 ?>