<?php      
require_once '../connection.php';
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
	<title>Прайс-листы</title>
	<link rel="stylesheet" href="../css/styles.css">
</head>
<body>
	<?php
    if(mysqli_num_rows($phone)<=0){
        echo "Нет товаров на продажу";
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
                    <td><form action="../handlers/price_change.php" method="post">
                    <input type="text" name="price" class="input_status" value="'.$p['price'].'"><input type="hidden" name="ls" value="phone"><input type="hidden" name="id" value="'.$p['id'].'"><input type="submit" name="action" class="button_comment" value="Изменить"></form></td>
                </tr>';
        }
        echo '</table>';        
    }
    ?>
		<a href="admin.html">Вернуться</a>
    <?php
    if(mysqli_num_rows($pc)<=0){
        echo "Нет товаров на продажу";
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
                    <td><form action="../handlers/price_change.php" method="post"><input type="hidden" name="ls" value="pc">
                    <input type="text" name="price" class="input_status" value="'.$p['price'].'"><input type="hidden" name="id" value="'.$p['id'].'"><input type="submit" name="action" class="button_comment" value="Изменить"></form></td>
                </tr>';
        }
        echo '</table>';        
    }
    ?>
    
    <?php
    if(mysqli_num_rows($laptop)<=0){
        echo "Нет товаров на продажу";
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
                    <td><form action="../handlers/price_change.php" method="post"><input type="hidden" name="ls" value="laptop">
                    <input type="text" name="price" class="input_status" value="'.$lap['price'].'"><input type="hidden" name="id" value="'.$lap['id'].'"><input type="submit" name="action" class="button_comment" value="Изменить"></form></td>
                </tr>';
        }
        echo '</table>';        
    }
    ?>

    <?php
    if(mysqli_num_rows($tablet)<=0){
        echo "Нет товаров на продажу";
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
                    <td><form action="../handlers/price_change.php" method="post"><input type="hidden" name="ls" value="tablet">
                    <input type="text" name="price" class="input_status" value="'.$p['price'].'"><input type="hidden" name="id" value="'.$p['id'].'"><input type="submit" name="action" class="button_comment" value="Изменить"></form></td>
                </tr>';
        }
        echo '</table>';        
    }
    ?>
</div>
</body>
</html>