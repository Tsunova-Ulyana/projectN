<?php
    require('./database.php');

    if (!$user){
        redirect('./index.php');
    }

  
    
    if (fieldsIsValid($_GET) && count($_GET)){
        $query = $pdo->prepare("SELECT * FROM `cart` WHERE `Id_User`=? AND `Id_Product`=?");
        $query->execute(
            array(
                $user['Id_user'],
                $_GET['add-id'],
               
            )
        );
        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        
      
        if (!$result){
            
        
            $query = $pdo->prepare("INSERT INTO `cart`(`Id_Product`, `Id_User`, `CountInCart`) VALUES (?,?,1)");
            $query->execute(array(
                $_GET['add-id'],
                $user['Id_user'],
             
            ));
        } else{
         
            $query = $pdo->prepare("UPDATE cart SET CountInCart=CountInCart+1 WHERE Id_User=? AND Id_Product=?");
            $query->execute(
                array(
                    $user['Id_user'],
                    $_GET['add-id'],
                   
                )
            );
    
           
    
        }
    redirect('./catalog.php');
    } else echo 'данные пустые';

   
   