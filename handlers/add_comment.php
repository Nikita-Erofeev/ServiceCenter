<?php 
require_once '../connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link));
$back = $_SERVER['HTTP_REFERER'];
$mail = $_POST['mail'];
$text = $_POST['comment'];
// Регулярное выражение для почты
$result = preg_match("/^(?:[a-z0-9]+(?:[-_.]?[a-z0-9]+)?@[a-z0-9_.-]+(?:\.?[a-z0-9]+)?\.[a-z]{2,5})$/i", $mail);
if(strlen($mail)<71 && strlen($text)<701 && $result){
	$stmt = mysqli_prepare($link, "INSERT INTO reviews(mail, review) VALUES (?,?)");
	mysqli_stmt_bind_param($stmt,"ss",$mail,$text)or die("Ошибка " . mysqli_error($link));
	mysqli_stmt_execute($stmt)or die("Ошибка " . mysqli_error($link));
}


echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=".$back."'>
  </head>
</html>";
?>