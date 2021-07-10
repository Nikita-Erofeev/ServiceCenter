<?php 
require_once '../connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link));
$back = $_SERVER['HTTP_REFERER'];
$action = $_POST['action'];

if($action == 'Изменить'){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$img_path = $_POST['img_path'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	
	$stmt = mysqli_prepare($link, "UPDATE product SET name= ?,description= ?,price=?,img_path=? WHERE id = ?");
	mysqli_stmt_bind_param($stmt,"ssisi",$name,$description,$price,$img_path,$id)or die("Ошибка " . mysqli_error($link));
	mysqli_stmt_execute($stmt)or die("Ошибка " . mysqli_error($link));
}

if($action == 'Удалить'){
	$id = $_POST['id'];
	$stmt = mysqli_prepare($link, "DELETE FROM product WHERE id = ?");
	mysqli_stmt_bind_param($stmt,"i",$id)or die("Ошибка " . mysqli_error($link));
	mysqli_stmt_execute($stmt)or die("Ошибка " . mysqli_error($link));
}

if($action == 'Добавить'){
	$name = $_POST['name'];
	$img_path = $_POST['img_path'];
	$description = $_POST['description'];
	$price = $_POST['price'];

	$stmt = mysqli_prepare($link, "INSERT INTO product(name, description, price, img_path) VALUES (?,?,?,?)");
	mysqli_stmt_bind_param($stmt,"ssis",$name,$description,$price,$img_path)or die("Ошибка " . mysqli_error($link));
	mysqli_stmt_execute($stmt)or die("Ошибка " . mysqli_error($link));
}

echo "
<html>
  <head>
   <meta http-equiv='Refresh' content='0; URL=".$back."'>
  </head>
</html>";

?>