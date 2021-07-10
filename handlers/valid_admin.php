<?php 
require_once '../connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link));
$data = mysqli_query($link,"SELECT login, pass FROM admin");
$admin = mysqli_fetch_array($data);

$back = $_SERVER['HTTP_REFERER'];
$user_login = $_POST['login'];
$user_password = $_POST['password'];

if($user_login == $admin['login'] && $user_password == $admin['pass']){
	echo "<html>
				  <head>
				   <meta http-equiv='Refresh' content='0; URL=../admin/admin.html'>
				  </head>
				</html>";
} else {
	echo "<html>
				  <head>
				   <meta http-equiv='Refresh' content='0; URL=".$back."'>
				  </head>
				</html>";
}
?>