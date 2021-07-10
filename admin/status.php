<?php 
require_once '../connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link));
$statuses = mysqli_query($link,"SELECT id, code, status FROM statuses");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Управление данными о статусах ремонта</title>
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
	<div class="quest-price-container">
		<div class="center_content text_price-list">
			<p>Отслеживание статуса ремонта</p>  
		</div>

		<?php
		if(mysqli_num_rows($statuses)<=0){
			echo "Нет активных заказов";
		}else{
			echo '<table class="price_table" id="table_status">
			<tr>
			<td>Код</td>
			<td>Статус</td>
			</tr>';
			while ($code = mysqli_fetch_array($statuses)){ 
				echo '<tr>
				<td>'.$code['code'].'</td>
				<td><form action="../handlers/status_change.php" method="post">
				<input type="hidden" name="id" value="'.$code['id'].'">
				<input type="text" name="status" class="input_status" value="'.$code['status'].'">
				<input type="submit" name="action" class="button_comment" value="Изменить">
				<input type="submit" name="action" class="button_comment" value="Удалить">
				</form></td>
				</tr>';
			} 
			echo '</table>';    
		}
		?>

		<input type="submit" name="action" class="button_comment" value="Добавить" id="add"> <br>
		<a href="admin.html">Вернуться</a>
	</div>
	<script>
		function someFunc(){
			document.getElementById("table_status").insertAdjacentHTML('beforeend', '<tr> <td colspan="2"><form action="../handlers/status_change.php" method="post" name="add_status"><input type="text" name="code">           <input type="text" for="add_status" name="status"> <input type="submit" name="action" class="button_comment" value="Добавить"></form></td></tr>');
		}
		document.getElementById("add").onclick = someFunc;
	</script>
</body>
</html>