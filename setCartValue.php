<?php
    require('./database.php');

    if (!$user){
        redirect('./index.php');
    }

    if ($_GET['count'] >= 1){
        $query = $pdo->prepare("UPDATE `cart` SET `CountInCart`=? WHERE `Id_Cart`=?");
        $query->execute(
            array(
                $_GET['count'],
                $_GET['cartId'],
              
            )
        );
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        redirect('./cart.php');
    } else   redirect('./index.php');

   