<?php 
require_once '../connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link));
$back = $_SERVER['HTTP_REFERER'];
$price = $_POST['price'];
$table = $_POST['ls'];
$id = $_POST['id'];

if($table == "phone"){
	$stmt = mysqli_prepare($link, "UPDATE phone SET price = ? WHERE id = ?;");
	mysqli_stmt_bind_param($stmt,"si",$price,$id)or die("Ошибка " . mysqli_error($link));
	mysqli_stmt_execute($stmt)or die("Ошибка " . mysqli_error($link));
}

if($table == "pc"){
	$stmt = mysqli_prepare($link, "UPDATE pc SET price = ? WHERE id = ?;");
	mysqli_stmt_bind_param($stmt,"si",$price,$id)or die("Ошибка " . mysqli_error($link));
	mysqli_stmt_execute($stmt)or die("Ошибка " . mysqli_error($link));
}

if($table == "laptop"){
	$stmt = mysqli_prepare($link, "UPDATE laptop SET price = ? WHERE id = ?;");
	mysqli_stmt_bind_param($stmt,"si",$price,$id)or die("Ошибка " . mysqli_error($link));
	mysqli_stmt_execute($stmt)or die("Ошибка " . mysqli_error($link));
}

if($table == "tablet"){
	$stmt = mysqli_prepare($link, "UPDATE tablet SET price = ? WHERE id = ?;");
	mysqli_stmt_bind_param($stmt,"si",$price,$id)or die("Ошибка " . mysqli_error($link));
	mysqli_stmt_execute($stmt)or die("Ошибка " . mysqli_error($link));
}




echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=".$back."'>
  </head>
</html>";
?>