<?php	   
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link));
$address = mysqli_query($link,"SELECT id, address FROM addresses");
$numbers = mysqli_query($link,"SELECT id, number FROM numbers");
$statuses = mysqli_query($link,"SELECT code, status FROM statuses"); 

?>
<div class="social">
		<div>
		<span>Группы в соцсетях</span>
		<a href=""><img src="img/vk.png" alt=""></a>
		<a href=""><img src="img/f.png" alt=""></a>
		<a href=""><img src="img/ok.png" alt=""></a>
		<a href=""><img src="img/a.png" alt=""></a>
		</div>
	</div>
	<header class="move">
		<div class="header">
			<div class="logo">
				<a href="index.php">Сервис<br>центр</a>
			</div>
		<div class="address">
			<div class="img">
				<img src="img/ico.png" alt="">
			</div>
			<div>
				<a href="index.php#place" class="small-text">Сервисный центр в г. Энгельс</a> <br>
				<a href="index.php#place" class="link">
				<?php 
				// Вывод адресов
				if(mysqli_num_rows($numbers)<=0){
					echo "адрес не указан";
				}else{
					$add = mysqli_fetch_array($address);
					echo $add['address'];
				}
				?>
			</a>
			</div>
		</div>
			<div>
				<span class="small-text">Номера телефонов:</span><br>
				<?php 
				// Вывод номеров телефонов из бд
					if(mysqli_num_rows($numbers)<=0){
						echo "Номер телефона не указан";
					}else{
						$t=1;
						while ($number = mysqli_fetch_array($numbers)) { 
							echo $number['number'];
							if($t==1){
								echo " | "; //если несколько номеров, то разделяем знаком |
							}
							$t++;
						}  
					}
				?>
			</div>
			<div>
				ПН-ВС 10:00 - 22:00 <br>
				Без выходных
			</div>
		</div>
		<div class="line"></div>
	</header>
	<div class="for_fixed"></div>

	<nav class="header">
		<div><a href="problems.php">ПРОБЛЕМЫ, РЕШАЕМЫЕ ДОМА</a></div>
		<div><a href="price-list.php">ПРАЙС-ЛИСТ</a></div>
		<div><a href="buy.php">КУПИТЬ КОМПЛЕКТУЮЩИЕ</a></div>
		<div><a href="comment.php">ОТЗЫВЫ</a></div>
		<div><a href="#openModal">СТАТУС РЕМОНТА</a></div>
	</nav>
	
	<div id="openModal" class="modalDialog">
		<div>
      <a href="#close" title="Закрыть" class="close">X</a>
      <h2>Статус ремонта</h2>
      <p>Введите номер для отслеживания (указан в чеке)</p>
      <form action="" name="code">
      	 <input type="text" class="modal_number" name="special_number" id="special_number">
      	 <input type="button" id="send" class="modal_button" value="➞">
      </form>
      <p class="result_modal" id="result_status"> </p>
      	<script>
      		function someFunc(){
						var UserCode = document.getElementById("special_number").value;
						let init = new Map();
						<?php 
						if(mysqli_num_rows($statuses)>=0){
							// Формирование map код - статус
							while ($status = mysqli_fetch_array($statuses)) { 
								echo "init.set('".$status['code']."', '".$status['status']."');";
							} 
						} 
						?>
						if(init.has(UserCode)){ // Если код есть в map, то выводим статус
							document.getElementById("result_status").textContent = init.get(UserCode);
						} else {
							document.getElementById("result_status").textContent = "Код не найден";
						}
					}
      		document.getElementById("send").onclick = someFunc;
      	</script>
    </div>
	</div>