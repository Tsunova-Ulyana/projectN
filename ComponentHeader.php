<header class="header">
                <div class="container">
                    <div class="header__first-col">
                        <a href="./index.php" class="header__logo"> <img src="./IMAGE/Greepus.png" alt=""></a>
                        <form action="">
                            <input name="result" type="text" placeholder="Поиск по сайту">    
                        </form>
                    </div>
                    <div class="header__second-col">
                        <a href="tel:+788888888888"> 
                            <img src="./IMAGE/call.png" alt="">
                        </a>
                        <a href="./cart.php"><img src="./IMAGE/cart.png" alt=""></a>


                        <a href="./<?= $user ? 'profile.php' : 'login.php';?>"><img src="./IMAGE/user.png" alt=""></a>
                        
                        <?php if($user) :?>
                            <a href="./Serverexit.php">Выйти из аккаунта</a>
                        <?php endif; ?>
                        
                    </div>
                </div> 

                <div class="header__product-panel">
                    <div class="container">
                        <ul class="header__nav">
                            <li class="catalog-to-open">
                                <a href="./catalog.php">Каталог продукции</a>
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