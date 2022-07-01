<?php
 require('./database.php');


if (!$user){
    redirect('./index.php');
 }

 $query = $pdo->prepare("INSERT INTO `orders`(`Id_Deliverytype`, `Id_Shop`, `Id_User`, `Order_Number`,create_date) VALUES (1,?, ?, null, current_date())");
 $query->execute(array(
    null,
    $user['Id_user'], 
 ));

 $orderId = $pdo->lastInsertId(); 
 $query = $pdo->prepare("SELECT * FROM cart where Id_user=?");
 $query->execute(array(  $user['Id_user']));
 $result = $query->fetchAll(PDO::FETCH_ASSOC);

 if ($result){
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
 }
 
redirect('./index.php');


