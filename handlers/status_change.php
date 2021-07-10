<?php 
require_once '../connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link));
$back = $_SERVER['HTTP_REFERER'];
$action = $_POST['action'];

if($action == 'Изменить'){
	$id = $_POST['id'];
	$status = $_POST['status'];
	$stmt = mysqli_prepare($link, "UPDATE statuses SET status = ? WHERE id = ?;");
	mysqli_stmt_bind_param($stmt,"si",$status,$id)or die("Ошибка " . mysqli_error($link));
	mysqli_stmt_execute($stmt)or die("Ошибка " . mysqli_error($link));
}

if($action == 'Удалить'){
	$id = $_POST['id'];
	$stmt = mysqli_prepare($link, "DELETE FROM statuses WHERE id = ?");
	mysqli_stmt_bind_param($stmt,"i",$id)or die("Ошибка " . mysqli_error($link));
	mysqli_stmt_execute($stmt)or die("Ошибка " . mysqli_error($link));
}

if($action == 'Добавить'){
	$code = $_POST['code'];
	$status = $_POST['status'];
	$stmt = mysqli_prepare($link, "INSERT INTO statuses(code, status) VALUES (?,?)");
	mysqli_stmt_bind_param($stmt,"ss",$code,$status)or die("Ошибка " . mysqli_error($link));
	mysqli_stmt_execute($stmt)or die("Ошибка " . mysqli_error($link));
}

echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=".$back."'>
  </head>
</html>";
?>