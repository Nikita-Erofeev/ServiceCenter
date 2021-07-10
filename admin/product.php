<?php 
require_once '../connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link));
$product = mysqli_query($link,"SELECT id, name, description, price, img_path FROM product WHERE 1");
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
			<div class="center_content">
				<p class="text_price-list">Комплектующие на продажу</p>
			</div>

			<div class="wrapper" id="wrapper">

		<?php
		if(mysqli_num_rows($product)<=0){
			echo "Нет товаров на продажу";
		}else{
			while ($prod = mysqli_fetch_array($product)){ 
				echo '<form action="../handlers/change_prod.php" method="post">
				<input type="hidden" name="id" value="'.$prod['id'].'">
				<div class="name_good">
				<p><input type="text" name="name" value="'. $prod['name'].'"></p>
				</div> <div class="border_div"> <p>Путь к картинке</p>
				<input type="text" name="img_path" value="'.$prod['img_path'].'">
				<div class="flex-text">
				<p class="description">Описание:</p>
				<p class="description_text"><textarea name="description" cols="75" rows="10">'.$prod['description'].'</textarea></p>
				<div class="price_good">
				<p><input type="text" name="price" size="10" value="'.$prod['price'].'">рублей</p>
				</div>
				<input type="submit" name="action" class="button_comment" value="Изменить">
				<input type="submit" name="action" class="button_comment" value="Удалить">
				</div>
				<div class="clear"></div>
				</div></form>';
			}     
		}

		?>
		</div>
		</div>

		<input type="submit" name="action" class="button_comment" value="Добавить" id="add"> <br>
		<a href="admin.html">Вернуться</a>
	</div>
	<script>
		function someFunc(){
			document.getElementById("wrapper").insertAdjacentHTML('beforeend', '<form action="../handlers/change_prod.php" method="post"><div class="name_good"><p><input type="text" name="name" value=""></p></div> <div class="border_div"> <p>Путь к картинке</p><input type="text" name="img_path" value=""><div class="flex-text"><p class="description">Описание:</p><p class="description_text"><textarea name="description" cols="75" rows="10"></textarea></p><div class="price_good"><p><input type="text" name="price" size="10" value="">рублей</p></div><input type="submit" name="action" class="button_comment" value="Добавить"></div><div class="clear"></div></div></form>');
		}
		document.getElementById("add").onclick = someFunc;
	</script>
</body>
</html>