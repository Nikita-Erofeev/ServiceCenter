<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Административная панель</title>
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
	<div class="adminlogin">
		Подтвердите права доступа <br>
		<form action="../handlers/valid_admin.php" method="post">
		Логин:	<input type="text" name="login"> <br>
		Пароль:	<input type="password" name="password"> <br>
		<input type="submit" hidden="true" value="ok">
		</form>
	</div>
</body>
</html>