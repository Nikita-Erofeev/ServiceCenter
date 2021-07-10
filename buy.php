<?php	   
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link));
$product = mysqli_query($link,"SELECT id, name, description, price, img_path FROM product WHERE 1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Комплектующие</title>
	<script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<?php require_once("templates/header.html.php"); ?>
	
	<div class="quest-price-container">
		<div class="center_content">
			<p class="text_price-list">Комплектующие на продажу</p>
		</div>
		<!-- Вывод товаров из бд -->
		<div class="wrapper">
			<?php
			if(mysqli_num_rows($product)<=0){
				echo "Нет товаров на продажу";
			}else{
				while ($prod = mysqli_fetch_array($product)){ 
					echo "<div class='name_good'>
					<p>". $prod['name']."</p>
					</div>";
					echo '<div class="border_div">
					<img src="'.$prod['img_path'].'" alt="Фотография" class="buy_img">
					<div class="flex-text">
					<p class="description">Описание:</p>
					<p class="description_text">'.$prod['description'].'</p>
					<div class="price_good">
					<p>'.$prod['price'].'рублей</p>
					</div>
					</div>
					<div class="clear"></div>
					</div>';
				}     
			}
			?>
		</div>
	</div>
	<footer>
		
	</footer>
	<script src="js/script.js"></script>
</body>
</html>