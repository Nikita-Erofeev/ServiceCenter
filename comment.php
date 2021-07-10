<?php	   
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link));
$comments = mysqli_query($link,"SELECT id, mail, review, date_review FROM reviews WHERE display = 1;");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Отзывы</title>
	<script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<?php require_once("templates/header.html.php"); ?>
	

	<div class="comment_container">
		<p class="text_price-list center_content">Отзывы</p>
		<!-- Вывод комментариев на странице -->
		<?php
		if(mysqli_num_rows($comments)<=0){
			echo "Нет товаров на продажу";
		}else{
			while ($comment = mysqli_fetch_array($comments)){ 
				echo '<img src="img/avatar.png" alt="Аватарка">
				<div class="input_comment">
				<span class="mail_for_comment">'.$comment['mail'].'</span>
				<span class="comment">'.$comment['review'].'</span>
				<span class="date_comment">'.$comment['date_review'].'</span>
				</div>
				<div class="clear"></div>';
			}        
		}
		?>

		<!-- Форма для добавления комментариев -->
		<div class="napolnitel"></div>
		<div class="fixed_comment">
			<img src="img/avatar.png" alt="Аватарка">
			<div class="output_comment">
				<form action="handlers/add_comment.php" name="add_comment" method="post">
					<input type="text" class="mail_output" name ="mail" placeholder="Введите вашу почту">
					<input type="submit" value="Отправить" class="button_comment">
					<textarea name="comment" id="" class="text_comment" cols="30" rows="10" placeholder="Отзыв"></textarea>
				</form>
			</div>
			<div class="clear"></div>
		</div>
	</div>

	<script src="js/script.js"></script>
</body>
</html>