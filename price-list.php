<?php      
require_once 'connection.php';
$link = mysqli_connect($host, $user, $password, $database) 
or die("Ошибка " . mysqli_error($link));
$laptop = mysqli_query($link,"SELECT id, work_name, price FROM laptop WHERE 1");
$pc = mysqli_query($link,"SELECT id, work_name, price FROM pc WHERE 1");
$phone = mysqli_query($link,"SELECT id, work_name, price FROM phone WHERE 1");
$tablet = mysqli_query($link,"SELECT id, work_name, price FROM tablet WHERE 1");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Цены на ремонт</title>
	<script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body>
	<?php require_once("templates/header.html.php"); ?>

	<div class="quest-price-container">
		<div class="center_content text_quest_price">
			<p>Что нужно починить?</p>  
		</div>
       <!--  <form class="buttons">  
            <input id="pc" type="button" value="Компьютер" class="button">   
            <input id="laptop" type="button" value="Ноутбук" class="button">
            <input id="phone" type="button" value="Телефон" class="button">
            <input id="tablet" type="button" value="Планшет" class="button">  
        </form>   -->
        <!-- <div id="content"></div>   -->
    </div>
    
    <?php
    // Вывод прайс-листа для телефонов
    if(mysqli_num_rows($phone)<=0){
        echo "Цены пока не установлены";
    }else{
        echo '<div class="quest-price-container">
                  <div class="center_content text_price-list">
                   <p>Смартфон</p>  
               </div>

               <table class="price_table">
                 <tr>
                    <td>Вид работ</td>
                    <td>Cтоимость</td>
                </tr>';
        while ($p = mysqli_fetch_array($phone)){ 
            echo '<tr>
                    <td>'.$p['work_name'].'</td>
                    <td>'.$p['price'].'</td>
                </tr>';
        }
        echo '</table>';        
    }
    ?>

    <?php
    // Вывод прайс-листа для компьютеров
    if(mysqli_num_rows($pc)<=0){
        echo "Цены пока не установлены";
    }else{
        echo '<div class="quest-price-container">
                  <div class="center_content text_price-list">
                   <p>Компьютер</p>  
               </div>

               <table class="price_table">
                 <tr>
                    <td>Вид работ</td>
                    <td>Cтоимость</td>
                </tr>';
        while ($p = mysqli_fetch_array($pc)){ 
            echo '<tr>
                    <td>'.$p['work_name'].'</td>
                    <td>'.$p['price'].'</td>
                </tr>';
        }
        echo '</table>';        
    }
    ?>
    
    <?php
    // Вывод прайс-листа для ноутбуков
    if(mysqli_num_rows($laptop)<=0){
        echo "Цены пока не установлены";
    }else{
        echo '<div class="quest-price-container">
                  <div class="center_content text_price-list">
                   <p>Ноутбук</p>  
               </div>

               <table class="price_table">
                 <tr>
                    <td>Вид работ</td>
                    <td>Cтоимость</td>
                </tr>';
        while ($lap = mysqli_fetch_array($laptop)){ 
            echo '<tr>
                    <td>'.$lap['work_name'].'</td>
                    <td>'.$lap['price'].'</td>
                </tr>';
        }
        echo '</table>';        
    }
    ?>

    <?php
    // Вывод прайс-листа для планшетов
    if(mysqli_num_rows($tablet)<=0){
        echo "Цены пока не установлены";
    }else{
        echo '<div class="quest-price-container">
                  <div class="center_content text_price-list">
                   <p>Планшет</p>  
               </div>

               <table class="price_table">
                 <tr>
                    <td>Вид работ</td>
                    <td>Cтоимость</td>
                </tr>';
        while ($p = mysqli_fetch_array($tablet)){ 
            echo '<tr>
                    <td>'.$p['work_name'].'</td>
                    <td>'.$p['price'].'</td>
                </tr>';
        }
        echo '</table>';        
    }
    ?>
</div>
<script src="js/script.js"></script>
</body>
</html>