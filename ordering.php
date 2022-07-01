<?php
 require('./database.php');
 $query = $pdo->prepare("SELECT * FROM `shops` WHERE 1");
 $query->execute();
 $result = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>
  
        <header class="header">
                <div class="container">
                    <div class="header__first-col">
                        <a href="./index.html" class="header__logo"> <img src="./IMAGE/Greepus.png" alt=""></a>
                        <form action="">
                            <input name="result" type="text" placeholder="Поиск по сайту">    
                        </form>
                    </div>
                    <div class="header__second-col">
                        <a href="tel:+788888888888"> 
                            <img src="./IMAGE/call.png" alt="">
                        </a>
                        <a href="./cart.html"><img src="./IMAGE/cart.png" alt=""></a>
                        <a href=""><img src="./IMAGE/user.png" alt=""></a>
                    </div>
                </div> 

                <div class="header__product-panel">
                    <div class="container">
                        <ul class="header__nav">
                            <li class="catalog-to-open">
                                <button href="">Каталог продукции</button>
                                <div class="catalog-content hide">  
                                    <div class="">
                                        <a href="">123123</a>
                                    </div>
                                    <div class="">
                                        <a href="">123123</a>
                                    </div>
                                  
                                </div>
                            </li>
                            <li><a href="">Новинки</a></li>
                            <li><a href="">Акции</a></li>
                            <li><a href="">Предварительные заказы</a></li>
                            <li><a href="">Новости</a></li>
                            <li><a href="">О компании</a></li>
                    
                        </ul>
                    </div>
                </div>
        </header>

        <main>
            <div class="container">
                <h2 
                    class="H2 cart-title">Оформление заказа
                </h2>
                <h3>
                    <span class="type-order type-order_active" id="type-1">Пункт Выдачи</span>
                    или
                    <span class="type-order" id="type-2">Доставка</span>
                </h3>
                <div class="main-block" id="type-1">
                    <div class="main-block__item-first">
                        <h3 class="fsa">Пункт выдачи</h3>

                        <h4>Заполните форму получения</h4>
                        <form action="./ShopAddOrder.php" class="form-1">
                            <label for="form-1-a">Выберите магазин</label>
                            <select name="shopId" id="form-1-a" style="padding-left: 20px; margin-left: 30px; display: inline-block; margin-top: 30px;">
                                <option selected >Магазин</option>

                                <?php foreach($result as $shop) :?>
                                    <option value="<?= $shop['Id_Shop'] ;?>" ><?= $shop['City'].', '.$shop['Adress'] ;?></option>
                                <?php endforeach; ?>

                            </select>
                            <div class="login" style="margin-top: 30px;">
                                 <label for="form-1-b">Введите имя получателя</label>
                                 <input  id="form-1-b" type="text" name="fio" placeholder="ФИО" style="padding-left: 20px; margin-left: 30px; display: inline-block">
                            </div>
                            <div class="login" style="margin-top: 30px;">
                                 <label for="form-1-с">Номер телефона</label>
                                 <input id="form-1-с" type="text" name="phone" placeholder="Номер" style="padding-left: 20px; margin-left: 30px; display: inline-block">
                            </div>
                            <button>Отправить</button>
                        </form>

                        <div class="main-block__list" id="type-1" >
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/icon.png" alt="">
                                <span id="value-a">   Выберите магазин</span>
                             
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/gru.png" alt="">
                                1 июня - 5 июня
                            </p>
                            <p class="main-block__item-icon main-block__item-icon_active">
                                <img src="./IMAGE/icons8-логистика-доставки-пакетов-50.png" alt="">
                                Бесплатная доставка
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/find.png" alt="">
                                Маршрут до пункта выдачи
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/check.png" alt="">
                                Скачать чек об оплате
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/gar.png" alt="">
                                Гарантийный талон
                            </p>
                            
                     
                        </div>
                        <div class="main-block__list hide" id="type-2">
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/icon.png" alt="">
                                г. Москва, м. Митино, ул. Митинская, 15 
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/gru.png" alt="">
                                1 июня - 5 июня
                            </p>
                            <p class="main-block__item-icon main-block__item-icon_active">
                                <img src="./IMAGE/icons8-логистика-доставки-пакетов-50.png" alt="">
                                Бесплатная доставка
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/find.png" alt="">
                                Доставка до адреса
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/check.png" alt="">
                                Скачать чек об оплате
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/gar.png" alt="">
                                Гарантийный талон
                            </p>
                            <!-- <p class="main-block__item-icon">
                                1 июня - 5 июня 
                            </p>
                            <p class="main-block__item-icon">
                                Бесплатная доставка
                            </p>
                            <p class="main-block__item-icon">
                                Маршрут до пункта выдачи
                            </p>
                            <p class="main-block__item-icon">
                                Скачать чек об оплате 
                            </p>
                            <p class="main-block__item-icon">
                                Гарантийный талон
                            </p> -->
                     
                        </div>

                    </div>
                    <div class="main-block__item-second">
                        <h2>Итого</h2>
                        <div class="main-block__price">
                            <p class="main-block__description-price">3 товара на сумму</p>
                            <p class="main-block__res-price"> 1000р</p>
                        </div>
                        <div class="main-block__price">
                            <p class="main-block__description-price">Скидка</p>
                            <p class="main-block__res-price"> 1000р</p>
                        </div>
                        <!-- <div class="itog">
                            <p class="main-block__description-price">Итог</p>
                            <p class="main-block__res-price"> 1000р</p>
                        </div> -->
                       
                    </div>
                </div>
                <div class="main-block hide" id="type-2">
                    <div class="main-block__item-first">
                        <h3 class="fsa">Доставка</h3>
                        <h4>Заполните форму доставки</h4>
                        <form action="./DeliveryOrderAdd.php" class="form-1">
                      
                           
                            <div class="login" style="margin-top: 30px;">
                                 <label for="form-2-b">Введите имя получателя</label>
                                 <input  id="form-2-b" type="text" name="fio" placeholder="ФИО" style="padding-left: 20px; margin-left: 30px; display: inline-block">
                            </div>
                            <div class="login" style="margin-top: 30px;">
                                 <label for="form-5-b">Город доставки</label>
                                 <input  id="form-5-b" type="text" name="city" placeholder="Город" style="padding-left: 20px; margin-left: 30px; display: inline-block">
                            </div>
                            <div class="login" style="margin-top: 30px;">
                                 <label for="form-6-b">Адрес</label>
                                 <input id="form-6-b" type="text" name="adress" placeholder="Адрес" style="padding-left: 20px; margin-left: 30px; display: inline-block">
                            </div>
                            <div class="login" style="margin-top: 30px;">
                                 <label for="form-2-с">Номер телефона</label>
                                 <input id="form-2-с" type="text" name="phone" placeholder="Номер" style="padding-left: 20px; margin-left: 30px; display: inline-block">
                            </div>
                            <button>Отправить</button>
                        </form>

                        <div class="main-block__list" id="type-1" >
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/icon.png" alt="">
                                <span id="form-2-f">Введите ваш адрес</span>
                                
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/gru.png" alt="">
                                1 июня - 5 июня
                            </p>
                            <p class="main-block__item-icon main-block__item-icon_active">
                                <img src="./IMAGE/icons8-логистика-доставки-пакетов-50.png" alt="">
                                Бесплатная доставка
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/find.png" alt="">
                                Маршрут до пункта выдачи
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/check.png" alt="">
                                Скачать чек об оплате
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/gar.png" alt="">
                                Гарантийный талон
                            </p>
                            
                     
                        </div>
                        <div class="main-block__list hide" id="type-2">
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/icon.png" alt="">
                                г. Москва, м. Митино, ул. Митинская, 15 
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/gru.png" alt="">
                                1 июня - 5 июня
                            </p>
                            <p class="main-block__item-icon main-block__item-icon_active">
                                <img src="./IMAGE/icons8-логистика-доставки-пакетов-50.png" alt="">
                                Бесплатная доставка
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/find.png" alt="">
                                Доставка до адреса
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/check.png" alt="">
                                Скачать чек об оплате
                            </p>
                            <p class="main-block__item-icon">
                                <img src="./IMAGE/gar.png" alt="">
                                Гарантийный талон
                            </p>
                            <!-- <p class="main-block__item-icon">
                                1 июня - 5 июня 
                            </p>
                            <p class="main-block__item-icon">
                                Бесплатная доставка
                            </p>
                            <p class="main-block__item-icon">
                                Маршрут до пункта выдачи
                            </p>
                            <p class="main-block__item-icon">
                                Скачать чек об оплате 
                            </p>
                            <p class="main-block__item-icon">
                                Гарантийный талон
                            </p> -->
                     
                        </div>

                    </div>
                    <div class="main-block__item-second">
                        <h2>Итого</h2>
                        <div class="main-block__price">
                            <p class="main-block__description-price">3 товара на сумму</p>
                            <p class="main-block__res-price"> 1000р</p>
                        </div>
                        <div class="main-block__price">
                            <p class="main-block__description-price">Скидка</p>
                            <p class="main-block__res-price"> 1000р</p>
                        </div>
                        <!-- <div class="itog">
                            <p class="main-block__description-price">Итог</p>
                            <p class="main-block__res-price"> 1000р</p>
                        </div> -->
                       
                    </div>
                </div>
                
                

                
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
<style>
    .type-order_active{
        color: red;
    }

    .type-order{
        cursor: pointer;
    }

    .hide{
        display: none;
    }
</style>
<script src="./scripts/index.js"></script>   
<script src="https://unpkg.com/imask"></script>

<script>
    document.addEventListener('click', event =>{
        if (event.target.classList.contains('type-order')){
            // получаем id таргета
            const id = event.target.getAttribute('id')  
            console.log(id)  

            document.querySelectorAll('.type-order').forEach(elem =>{
                elem.classList.remove('type-order_active')
            })
            event.target.classList.add('type-order_active')

            document.querySelectorAll('.main-block').forEach(element =>{
                
                if (element.getAttribute('id') == id){
                   document.querySelectorAll('.main-block').forEach(e => e.classList.add('hide')) 
                   element.classList.remove('hide')
                  
                   
                }
               
            })
            
            

        }
    })

    console.log(document.querySelector('#form-1-a').value)
    document.querySelector('#form-1-a').onchange = (e) =>{
        document.querySelector('#value-a').textContent = e.currentTarget.options[ e.currentTarget.selectedIndex].text
        

       
    }
   
        document.querySelector('#form-6-b').oninput = (e) =>{
           document.querySelector('#form-2-f').textContent = e.currentTarget.value
           
        }
        

    

    var phoneMask = IMask(
        document.getElementById('form-1-с'), {
            mask: '+{7}(000)000-00-00'
        });
</script>
</body>
</html>