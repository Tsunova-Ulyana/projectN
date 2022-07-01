<?php
 require('./database.php');


 if (!$user){
    redirect('./index.php');
 }

//  var_dump($user);

if (fieldsIsValid($_GET) && count($_GET)){
    $query = $pdo->prepare("INSERT INTO `orders`(`Id_Deliverytype`, `Id_Shop`, `Id_User`, `Order_Number`,create_date) VALUES (2,?, ?, null, current_date())");
    $query->execute(array(
       $_GET['shopId'],
       $user['Id_user'], 
    ));
   
   
   $orderId = $pdo->lastInsertId(); 
   
   $query = $pdo->prepare("SELECT * FROM cart where Id_user=?");
   $query->execute(array(  $user['Id_user']));
   $result = $query->fetchAll(PDO::FETCH_ASSOC);
   var_dump($result[0]);
   foreach ($result as $cardItem){
       $query = $pdo->prepare("INSERT INTO `ordered_products`(`Id_Order`, `Id_Product`, `Count`) VALUES (?, ?, ?)");
       $query->execute(array(
           $orderId,
           $cardItem['Id_Product'],
           $cardItem['CountInCart']
   
       ));
       $cartItemInfo = $query->fetchAll(PDO::FETCH_ASSOC);
     
   }
    // очистка корзины
    $query = $pdo->prepare("DELETE FROM `cart` WHERE `Id_User`=?");
    $query->execute(array($user['Id_user']));
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
   // При реализации добавить ссылку на страницу заказа
    redirect('./index.php');
} else echo 'Неверные данные';


?>