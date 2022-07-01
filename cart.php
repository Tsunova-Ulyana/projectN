<?php
 require('./database.php');

 if (!$user){
    redirect('./login.php');
 }

 $query = $pdo->prepare("SELECT * FROM cart
 JOIN products ON cart.Id_Product=products.Id_Product
 WHERE cart.Id_User=?");
 $query->execute(array($user['Id_user']));
 $result = $query->fetchAll(PDO::FETCH_ASSOC);  

 $priceToPay = 0;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>
<?= require_once('./ComponentHeader.php') ;?>

        <section class="cart">
            <div class="container">
                <h2 class="H2 cart-title">Корзина покупок</h2>

                <?php if(count($result)) :?>
                    <div class="cart__titles">
                        <ul>
                            <li>Товар</li>
                            <li>Описание</li>
                            <li>Количество</li>
                            <li>Цена</li>
                            <li>Сумма</li>
                        </ul>
                     </div>
                <?php else :?>
                    <div class=""
                        style="max-width: 500px; margin: 0 auto;"
                    >
                        <h3 class="H2 cart-title">В корзине пока пусто :(</h3>
                        <svg style="position: relative; transform: translateX(-50%); left: 50%" 
                             width="211" height="289" viewBox="0 0 211 289" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M193 96.0002H205V144H193L176 116L193 96.0002Z" fill="#FAFBFB"/>
                            <path d="M16 96.0002H6V144H14L33 116L16 96.0002Z" fill="#FAFBFB"/>
                            <path d="M33 116.5L15.5 96.5002H192.5L176 116.5L194.5 144H15.5L33 116.5Z" fill="#A5B0B8"/>
                            <path d="M208 145H3.5V263C3.5 275.703 13.7975 286 26.5 286H185C197.703 286 208 275.703 208 263V145Z" fill="#FAFBFB"/>
                            <path d="M208 145H15V263C15 275.703 25.2974 286 38 286H185C197.703 286 208 275.703 208 263V145Z" fill="#A5B0B8"/>
                            <path d="M195 145H15V263C15 275.703 25.2974 286 38 286H172C184.703 286 195 275.703 195 263V145Z" fill="#EEF1F2"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.5 96.0002C3.5 94.3434 4.84315 93.0002 6.5 93.0002H205C206.657 93.0002 208 94.3434 208 96.0002V141.5C209.657 141.5 211 142.843 211 144.5V230.5C211 232.157 209.657 233.5 208 233.5C206.343 233.5 205 232.157 205 230.5V147.5H6V166.5C6 168.157 4.65685 169.5 3 169.5C1.34315 169.5 0 168.157 0 166.5V144.5C0 142.843 1.34315 141.5 3 141.5H3.5V96.0002ZM9.5 141.5H11.9403L29.6531 116.259L13.6884 99.0002H9.5V141.5ZM21.8616 99.0002L35.7023 113.963C36.2151 114.518 36.5 115.245 36.5 116V141.5H173V116C173 115.259 173.274 114.544 173.77 113.993L187.264 99.0002H21.8616ZM195.336 99.0002L179.749 116.319L195.654 141.5H202V99.0002H195.336ZM188.557 141.5L179 126.368V141.5H188.557ZM30.5 141.5V125.498L19.2703 141.5H30.5ZM57.0428 167.905C55.9164 169.704 55.5 171.987 55.5 173.5C55.5 175.157 54.1569 176.5 52.5 176.5C50.8431 176.5 49.5 175.157 49.5 173.5C49.5 171.181 50.0836 167.713 51.9572 164.721C53.9316 161.567 57.3342 159 62.5 159C67.6499 159 71.1076 161.548 73.1803 164.644C75.1616 167.603 75.8962 171.047 75.9972 173.37C76.0691 175.025 74.7856 176.425 73.1303 176.497C71.475 176.569 70.0748 175.286 70.0028 173.631C69.9371 172.12 69.4217 169.814 68.1947 167.982C67.0591 166.286 65.3501 165 62.5 165C59.6658 165 58.0684 166.267 57.0428 167.905ZM142.632 168.104C141.248 169.963 140.618 172.274 140.489 173.76C140.345 175.411 138.891 176.632 137.24 176.489C135.589 176.345 134.368 174.891 134.511 173.24C134.715 170.893 135.635 167.454 137.818 164.521C140.089 161.47 143.728 159 149 159C154.298 159 157.827 161.501 159.907 164.665C161.88 167.667 162.5 171.155 162.5 173.5C162.5 175.157 161.157 176.5 159.5 176.5C157.843 176.5 156.5 175.157 156.5 173.5C156.5 172.012 156.07 169.75 154.893 167.961C153.823 166.333 152.102 165 149 165C145.872 165 143.927 166.363 142.632 168.104ZM62.5 170.5C64.1569 170.5 65.5 171.843 65.5 173.5V192.75C65.5 214.98 83.5205 233 105.75 233C127.979 233 146 214.98 146 192.75V173.5C146 171.843 147.343 170.5 149 170.5C150.657 170.5 152 171.843 152 173.5V192.75C152 218.293 131.293 239 105.75 239C80.2068 239 59.5 218.293 59.5 192.75V173.5C59.5 171.843 60.8431 170.5 62.5 170.5ZM3 189.5C4.65685 189.5 6 190.843 6 192.5V262C6 273.598 15.402 283 27 283H184C195.598 283 205 273.598 205 262V259.5C205 257.843 206.343 256.5 208 256.5C209.657 256.5 211 257.843 211 259.5V262C211 276.912 198.912 289 184 289H27C12.0883 289 0 276.912 0 262V192.5C0 190.843 1.34315 189.5 3 189.5Z" fill="#677884"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M74.619 17.8052C75.4153 17.0487 76.6741 17.081 77.4306 17.8773L90.0261 31.1357C90.7826 31.932 90.7503 33.1908 89.954 33.9473C89.1577 34.7038 87.8989 34.6716 87.1424 33.8752L74.5469 20.6168C73.7904 19.8205 73.8227 18.5617 74.619 17.8052Z" fill="#677884"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M132.342 17.7688C131.525 17.0341 130.268 17.1003 129.533 17.9167L117.6 31.1751C116.866 31.9915 116.932 33.249 117.748 33.9837C118.565 34.7185 119.822 34.6523 120.557 33.8359L132.489 20.5775C133.224 19.7611 133.158 18.5036 132.342 17.7688Z" fill="#677884"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M103.833 0C104.931 0 105.821 0.890399 105.821 1.98876V28.5056C105.821 29.604 104.931 30.4944 103.833 30.4944C102.734 30.4944 101.844 29.604 101.844 28.5056V1.98876C101.844 0.890399 102.734 0 103.833 0Z" fill="#677884"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M90.3237 45.953C89.7781 46.0507 89.2406 46.2191 88.7246 46.4595L86.092 47.686L84.825 44.9667L87.4576 43.7402C88.211 43.3891 88.9969 43.1429 89.795 43L90.3237 45.953ZM95.1363 46.9831C94.666 46.6622 94.1628 46.4089 93.6402 46.2239L94.6409 43.3958C95.4052 43.6662 96.1407 44.0366 96.8271 44.505C97.7035 45.1029 98.6068 45.719 99.533 46.3505L97.8429 48.8291C96.9165 48.1975 96.0129 47.5812 95.1363 46.9831ZM80.8268 50.139L75.5616 52.592L74.2947 49.8727L79.5599 47.4197L80.8268 50.139ZM108.713 56.2315C106.869 54.9772 105.051 53.7399 103.281 52.5348L104.97 50.0552C106.739 51.26 108.556 52.4969 110.4 53.7509L108.713 56.2315ZM70.2964 55.045L65.0312 57.498L63.7643 54.7787L69.0295 52.3257L70.2964 55.045ZM58 61.7214V62.3298H55V59.8179C55 59.2347 55.338 58.7044 55.8665 58.4582L58.4991 57.2317L59.2989 58.9482L59.7883 59.0659L59.6403 59.6811L59.7661 59.951L59.5513 60.0511L59.0867 61.9828L58 61.7214ZM119.592 63.6206C117.788 62.3971 115.967 61.1617 114.151 59.9282L115.837 57.4465C117.652 58.6796 119.472 59.9146 121.276 61.1376L119.592 63.6206ZM70.8367 64.8087L64.9617 63.3957L65.6633 60.4789L71.5383 61.8919L70.8367 64.8087ZM82.5867 67.6346L76.7117 66.2217L77.4133 63.3048L83.2883 64.7178L82.5867 67.6346ZM130.485 70.9918C128.726 69.8044 126.9 68.5705 125.033 67.3069L126.715 64.8223C128.581 66.0854 130.405 67.3186 132.163 68.5051L130.485 70.9918ZM94.3367 70.4606L88.4617 69.0476L89.1633 66.1308L95.0383 67.5437L94.3367 70.4606ZM55 67.3537H58V69.1319C58.5821 69.5813 59.167 70.0235 59.7546 70.458L57.9709 72.8701C57.7852 72.7328 57.5998 72.5948 57.4147 72.4561H55V67.3537ZM106.087 73.2865L100.212 71.8735L100.913 68.9567L106.788 70.3697L106.087 73.2865ZM117.837 76.1124L111.962 74.6995L112.663 71.7827L118.538 73.1956L117.837 76.1124ZM141.408 78.3296C139.762 77.2316 137.923 75.9992 135.939 74.6656L137.612 72.1758C139.594 73.508 141.43 74.7384 143.073 75.8339L141.408 78.3296ZM68.078 79.4363C66.333 78.4571 64.6131 77.4132 62.9177 76.3092L64.5548 73.7953C66.1973 74.8649 67.8609 75.8745 69.5461 76.8201L68.078 79.4363ZM129.587 78.9384L123.712 77.5254L124.413 74.6086L130.288 76.0216L129.587 78.9384ZM141.337 81.7643L135.462 80.3514L136.163 77.4345L142.038 78.8475L141.337 81.7643ZM55 82.8179V77.637H58V82.8179H55ZM147.423 82.3001C147.255 82.1919 147.08 82.0782 146.898 81.9592L147.86 80.4804L147.913 80.2605L147.991 80.2792L148.534 79.4451C149.352 79.9776 150 80.3923 150.458 80.6761C150.688 80.819 150.859 80.9219 150.975 80.9882C151.008 81.007 151.033 81.0205 151.05 81.0297C151.617 81.2527 152 81.8026 152 82.4254V85.5653H149V83.6074L147.212 83.1773L147.423 82.3001ZM151.072 81.0412C151.095 81.0519 151.099 81.0552 151.077 81.0442C151.076 81.0434 151.074 81.0424 151.072 81.0412ZM79.0248 84.5635C77.1397 83.8523 75.282 83.0643 73.4509 82.2044L74.7262 79.4889C76.4888 80.3167 78.2744 81.074 80.0837 81.7566L79.0248 84.5635ZM90.6787 87.8724C88.6842 87.4886 86.7175 87.0183 84.7782 86.4663L85.5994 83.5809C87.4566 84.1095 89.3384 84.5594 91.2456 84.9265L90.6787 87.8724ZM115.004 88.4116C113.907 88.4372 112.843 88.5069 111.819 88.6253C110.806 88.7424 109.8 88.8376 108.799 88.9113L108.579 85.9194C109.538 85.8487 110.503 85.7575 111.474 85.6452C112.6 85.5151 113.756 85.4399 114.934 85.4124L115.004 88.4116ZM127.935 89.6747C125.776 89.2607 123.604 88.9261 121.47 88.7038L121.781 85.72C124.013 85.9525 126.271 86.3009 128.5 86.7284L127.935 89.6747ZM102.739 89.0976C100.694 89.0718 98.6747 88.9557 96.6818 88.7534L96.9848 85.7687C98.8898 85.9621 100.82 86.0732 102.777 86.0978L102.739 89.0976ZM55 87.9987H58V90.0365C58.4906 90.5883 59.1453 91.238 59.9614 91.941L58.0035 94.2141C57.5939 93.8613 57.2146 93.5151 56.8669 93.1796H55V87.9987ZM140.667 92.9605C138.684 92.3274 136.554 91.7024 134.342 91.1277L135.096 88.2241C137.367 88.8139 139.55 89.4544 141.58 90.1028L140.667 92.9605ZM149 92.7427V91.8452H152V97.497H149V95.9797C148.354 95.7123 147.645 95.429 146.878 95.135L147.953 92.334C148.314 92.4724 148.663 92.6088 149 92.7427ZM70.7386 101.327C68.2462 100.49 66.0089 99.4689 64.0479 98.383L65.5011 95.7585C67.314 96.7623 69.3851 97.7075 71.694 98.4832L70.7386 101.327ZM55 103.541V98.3605H58V103.541H55ZM81.4817 103.391C80.2326 103.32 79.0198 103.195 77.845 103.023L78.278 100.055C79.3671 100.214 80.492 100.33 81.6516 100.395C82.5817 100.448 83.512 100.488 84.4421 100.518L84.3465 103.516C83.3947 103.486 82.4394 103.445 81.4817 103.391ZM106.936 103.74C105.124 103.626 103.263 103.572 101.358 103.552L101.39 100.552C103.329 100.573 105.245 100.628 107.124 100.746L106.936 103.74ZM94.6893 103.568C93.1618 103.581 91.6129 103.595 90.0547 103.595L90.0538 100.595C91.598 100.595 93.1314 100.581 94.658 100.568C95.0063 100.565 95.3542 100.562 95.7019 100.559L95.7268 103.559C95.3822 103.562 95.0363 103.565 94.6893 103.568ZM117.716 105.545C116.031 105.013 114.264 104.616 112.422 104.324L112.892 101.361C114.854 101.673 116.769 102.1 118.62 102.684L117.716 105.545ZM149 107.545V102.521H152V107.545H149ZM124.867 109.074C124.144 108.55 123.397 108.076 122.629 107.645L124.095 105.028C124.961 105.513 125.806 106.05 126.626 106.644C127.482 107.263 128.359 107.831 129.251 108.352L127.739 110.942C126.767 110.375 125.806 109.754 124.867 109.074ZM55 111.313V108.722H58V110.146L59.8066 110.605L59.0684 113.512L56.1309 112.767C55.4657 112.598 55 111.999 55 111.313ZM140.421 115.702C138.353 115.273 136.144 114.67 133.903 113.84L134.946 111.027C137.03 111.799 139.092 112.363 141.03 112.764L140.421 115.702ZM70.8184 116.495L64.9434 115.004L65.6816 112.096L71.5566 113.588L70.8184 116.495ZM149 113.631V112.569H152V117.593H149V116.631C148.429 116.633 147.809 116.618 147.147 116.584L147.302 113.588C147.918 113.619 148.487 113.633 149 113.631ZM82.5684 119.478L76.6934 117.987L77.4316 115.079L83.3066 116.57L82.5684 119.478ZM94.3184 122.461L88.4434 120.97L89.1816 118.062L95.0566 119.553L94.3184 122.461ZM106.068 125.444L100.193 123.953L100.932 121.045L106.807 122.536L106.068 125.444ZM152 122.616V127.64H149V122.616H152ZM117.818 128.427L111.943 126.936L112.682 124.028L118.557 125.519L117.818 128.427ZM129.568 131.41L123.693 129.919L124.432 127.011L130.307 128.502L129.568 131.41ZM141.318 134.393L135.443 132.901L136.182 129.994L142.057 131.485L141.318 134.393ZM152 132.664V135.176C152 135.639 151.786 136.076 151.421 136.36C151.056 136.644 150.58 136.744 150.131 136.63L147.193 135.884L147.932 132.977L149 133.248V132.664H152Z" fill="#677884"/>
                        </svg>
                    </div>
                   


                <?php endif; ?>
               
              

                <?php foreach($result as $cardItem) :?>

                    <?php
                        $priceToPay +=  (int)$cardItem['sale_price']*$cardItem['CountInCart'];
                    ?>
                    <div class="cart__wrapper">
                        <div class="cart__product">
                            <div class="cart__image">
                                <img src="./productsimages/<?= $cardItem['ImagePath'] ;?>" width="148" alt="">
                            </div>
                            <div class="cart__description">
                                <h3>
                                    Коллекционная фигурка Funko Pop "Грут"
                                    <?= $cardItem['Name'] ;?>
                                </h3>
                            
                            </div>
                            <form action="./setCartValue.php"  class="cart__count-input">
                                <input name="count" type="number" value="<?= $cardItem['CountInCart'] ;?>">
                                <input type="hidden"  name="cartId" value="<?= $cardItem['Id_Cart'] ;?>">
                            </form>
                            <div class="cart__price">
                                <?= $cardItem['sale_price'] ;?>
                            </div>
                            <div class="cart__sum">
                                <?= (int)$cardItem['sale_price']*$cardItem['CountInCart'] ;?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
              

                <div class="cart__buy">
                <a href="./catalog.html">Вернуться к каталогу</a>
                    <?php if(count($result)) :?>
                
                    <div class="cart__col-2">
                        Итого: <span class="cart__main-price">  <?= $priceToPay ;?>р</span>
                        <form action="./ordering.php">
                            <button>Оформить заказ</button>
                        </form>
                    </div>
                    <?php endif; ?>
                    
                </div>
            </div>
          
        </section>

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

<script src="./scripts/index.js"></script>    
</body>
</html>