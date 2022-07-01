<?php
 require('./database.php');
 
 $query = $pdo->prepare("SELECT * FROM `orders`
 WHERE Id_User=? AND orderStatus != ''");
 $query->execute(array($user['Id_user'],));
 $result = $query->fetchAll(PDO::FETCH_ASSOC);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход</title>
    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>
    <?= require_once('./ComponentHeader.php') ;?>
<main>
    <div class="profile_info">
        <img src="./IMAGE/avatar.jpg" alt="">
     <div class="text_profile">
        <p>ФИО:</p>
        <h1>Иванов Иван Иванович</h1>
        <p>Номер телефона:</p>
        <h1>8(945)771-28-39</h1>
        <p>Клубная карта:</p>
        <h1>1111 2222 3333 4444</h1>
        <button class="edit">Изменить</button>
     </div>
    </div>
    <div class="current_orders">
        <h1 style="margin-bottom: 30px">Текущие заказы:</h1>
        
        <?php foreach($result as $order) :?>
            <div class="">
            <a href="./order.php?order=<?= $order['Id_Order'] ;?>" style="font-size: 24px; margin-bottom: 30px">
                Заказ <span style="color: red">#<?= $order['Id_Order'] ;?></span> 
            </a>
        </div>
        <?php endforeach; ?>
      
    </div>

</main>

<footer >
    <div class="footer">
        <div class="footer__column">
            <h3 class="footer__column-title">
                Покупателям
            </h3>
            <ul class="footer__column-list">
                <li><a href="">Каталог продукции</a></li>
                <li><a href="">Акции и скидки</a></li>
                <li><a href="">Предварительные заказы</a></li>
                <li><a href="">Оформление заказа в один клик</a></li>
            </ul>
        </div>
        <div class="footer__column">
            <h3 class="footer__column-title">
                О компании
            </h3>
            <ul class="footer__column-list">
                <li><a href="">Отзывы</a></li>
                <li><a href="">Вакансии</a></li>
                <li><a href="">Документы</a></li>
                <li><a href="">Интерактивная карта магазинов и филиалов</a></li>
            </ul>
        </div>
        <div class="footer__column">
            <div class="footer__phones">
                <a href="tel:+788888888888"> 
                    8 (945) 445 - 55 - 55
                </a>
                <a class="lst-phone" href="tel:+788888888888"> 
                    8 (945) 445 - 35 - 78
                </a>
            </div>
        
            <div class="footer__social-media">
                <h4>Greepus в социальных сетях</h4>
                <div class="footer__social-media-list">
                    <div class="footer__social-media">
                        <a href="">
                            <img src="./IMAGE/iconmonstr-facebook-6.png" alt="">
                        </a>
                    </div>
                    <div class="footer__social-media">
                        <a href="">
                            <img src="./IMAGE/iconmonstr-instagram-11.png" alt="">
                        </a>
                    </div>
                    <div class="footer__social-media">
                        <a href="">
                            <img src="./IMAGE/iconmonstr-twitter-1.png" alt="">
                        </a>
                       
                    </div>
                    <div class="footer__social-media">
                        <a href="">
                            <img src="./IMAGE/iconmonstr-vk-1.png" alt="">
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
    </div> 

    <div class="footer__trade-mark">
        <a href="">
            ® 2022 Магазин настольных игр "Greepus"
        </a>
    </div>
</footer>
</body>
</html>
