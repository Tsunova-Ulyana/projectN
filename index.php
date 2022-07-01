<?php
    require('./database.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Greepus</title>
    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>
<?php
    require('./ComponentHeader.php');
?>

<main>
        <section class="welcome">
            <div class="welcome__content">
                <h3>с 1 по 31 декабря</h3>
                <h2>Скидки на 
                    Новогодние игры
                </h2>
            </div>
        </section>

        <section class="sections-blocks container">
            <div class="sections-blocks__item ad-block">
                <div class="ad-block__bg">
                    <img src="./IMAGE/ad1.png" alt="1">
                </div>
                <div class="ad-block__content-wrapper">
                    <div class="ad-block__content">
                        Больше подарков здесь
                    </div>
                </div>
                
            </div>
            <div class="sections-blocks__item ad-block">
                <div class="ad-block__bg">
                    <img src="./IMAGE/ad2.png" alt="1">
                </div>
                <div class="ad-block__content-wrapper ad-block__content-wrapper_sec">
                    <div class="ad-block__content">
                        Новое поступление книг
                    </div>
                </div>
                
            </div>
            <div class="sections-blocks__item ad-block">
                <div class="ad-block__bg">
                    <img src="./IMAGE/ad3.png" alt="1">
                </div>
                <div class="ad-block__content-wrapper ad-block__content-wrapper_third">
                    <div class="ad-block__content">
                        Лимитированные фигурки
                    </div>
                </div>

            </div>
        </section>  
        <section class="new">
            <div class="container">
                <h2 class="H2">Новинки</h2>
                <div class="flex-list">
                    <div class="product-card">
                        <div class="product-card__image">
                            <img src="./IMAGE/new1.png" alt="">
                        </div>
                        <div class="product-card__content">
                            <h2 class="product-card__title">
                                Настольная игра "Еще один день"
                            </h2>
                            <div class="product-card__rating">
                                <div class="product-card__stars">
                                    5
                                </div>
                                <div class="product-card__reviews">
                                    <span>50</span> отзывов
                                </div>
                            </div>
                            <div class="product-card__price">
                                <div class="product-card__current-price">2000 Р</div>
                                <div class="product-card__prev-price">3500 Р</div>
                            </div>
            
                        </div>
                        <form action="1" class="product-card__footer">
                            <button name="add-id" value="1">Купить</button>
                        </form>
                        
                    </div>
                    <div class="product-card">
                        <div class="product-card__image">
                            <img src="./IMAGE/new2.png" alt="">
                        </div>
                        <div class="product-card__content">
                            <h2 class="product-card__title">
                                Настольная игра "Еще один день"
                            </h2>
                            <div class="product-card__rating">
                                <div class="product-card__stars">
                                    5
                                </div>
                                <div class="product-card__reviews">
                                    <span>50</span> отзывов
                                </div>
                            </div>
                            <div class="product-card__price">
                                <div class="product-card__current-price">2000 Р</div>
                                <div class="product-card__prev-price">3500 Р</div>
                            </div>
            
                        </div>
                        <div class="product-card__footer">
                            <button>Купить</button>
                        </div>
                        
                    </div>
                    <div class="product-card">
                        <div class="product-card__image">
                            <img src="./IMAGE/new3.png" alt="">
                        </div>
                        <div class="product-card__content">
                            <h2 class="product-card__title">
                                Настольная игра "Еще один день"
                            </h2>
                            <div class="product-card__rating">
                                <div class="product-card__stars">
                                    5
                                </div>
                                <div class="product-card__reviews">
                                    <span>50</span> отзывов
                                </div>
                            </div>
                            <div class="product-card__price">
                                <div class="product-card__current-price">2000 Р</div>
                                <div class="product-card__prev-price">3500 Р</div>
                            </div>
                             
                        </div>
                        <div class="product-card__footer">
                            <button>Купить</button>
                        </div>
                        
                    </div>
                    <div class="product-card">
                        <div class="product-card__image">
                            <img src="./IMAGE/new4.png" alt="">
                        </div>
                        <div class="product-card__content">
                            <h2 class="product-card__title">
                                Настольная игра "Еще один день"
                            </h2>
                            <div class="product-card__rating">
                                <div class="product-card__stars">
                                    5
                                </div>
                                <div class="product-card__reviews">
                                    <span>50</span> отзывов
                                </div>
                            </div>
                            <div class="product-card__price">
                                <div class="product-card__current-price">2000 Р</div>
                                <div class="product-card__prev-price">3500 Р</div>
                            </div>
            
                        </div>
                        <div class="product-card__footer">
                            <button>Купить</button>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </section>

        <form class="banner registration-banner">
            <div class="container banner__container gray">
                <div class="h2">Получайте самые интересные предложения первыми!</div>
                <div class="registration-banner__input-and-sumbit">
                    <input name="email" type="email" placeholder="Адрес электронной почты">
                    <div class="">
                        <button>Подписаться</button>
                    </div>
                </div>
          
            </div>
        </form>
        
        <section class="new">
            <div class="container">
                <h2 class="H2">Акции</h2>
                <div class="flex-list">
                    <div class="product-card">
                        <div class="product-card__image">
                            <img src="./IMAGE/new1.png" alt="">
                        </div>
                        <div class="product-card__content">
                            <h2 class="product-card__title">
                                Настольная игра "Еще один день"
                            </h2>
                            <div class="product-card__rating">
                                <div class="product-card__stars">
                                    5
                                </div>
                                <div class="product-card__reviews">
                                    <span>50</span> отзывов
                                </div>
                            </div>
                            <div class="product-card__price">
                                <div class="product-card__current-price">2000 Р</div>
                                <div class="product-card__prev-price">3500 Р</div>
                            </div>
            
                        </div>
                        <form action="1" class="product-card__footer">
                            <button name="add-id" value="1">Купить</button>
                        </form>
                        
                    </div>
                    <div class="product-card">
                        <div class="product-card__image">
                            <img src="./IMAGE/new2.png" alt="">
                        </div>
                        <div class="product-card__content">
                            <h2 class="product-card__title">
                                Настольная игра "Еще один день"
                            </h2>
                            <div class="product-card__rating">
                                <div class="product-card__stars">
                                    5
                                </div>
                                <div class="product-card__reviews">
                                    <span>50</span> отзывов
                                </div>
                            </div>
                            <div class="product-card__price">
                                <div class="product-card__current-price">2000 Р</div>
                                <div class="product-card__prev-price">3500 Р</div>
                            </div>
            
                        </div>
                        <div class="product-card__footer">
                            <button>Купить</button>
                        </div>
                        
                    </div>
                    <div class="product-card">
                        <div class="product-card__image">
                            <img src="./IMAGE/new3.png" alt="">
                        </div>
                        <div class="product-card__content">
                            <h2 class="product-card__title">
                                Настольная игра "Еще один день"
                            </h2>
                            <div class="product-card__rating">
                                <div class="product-card__stars">
                                    5
                                </div>
                                <div class="product-card__reviews">
                                    <span>50</span> отзывов
                                </div>
                            </div>
                            <div class="product-card__price">
                                <div class="product-card__current-price">2000 Р</div>
                                <div class="product-card__prev-price">3500 Р</div>
                            </div>
                            
                        </div>
                        <div class="product-card__footer">
                            <button>Купить</button>
                        </div>
                        
                    </div>
                    <div class="product-card">
                        <div class="product-card__image">
                            <img src="./IMAGE/new4.png" alt="">
                        </div>
                        <div class="product-card__content">
                            <h2 class="product-card__title">
                                Настольная игра "Еще один день"
                            </h2>
                            <div class="product-card__rating">
                                <div class="product-card__stars">
                                    5
                                </div>
                                <div class="product-card__reviews">
                                    <span>50</span> отзывов
                                </div>
                            </div>
                            <div class="product-card__price">
                                <div class="product-card__current-price">2000 Р</div>
                                <div class="product-card__prev-price">3500 Р</div>
                            </div>
            
                        </div>
                        <div class="product-card__footer">
                            <button>Купить</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="banner sale-banner">
            <div class="container banner__container">
                <div class="h2">Скидка 1 000  ₽ на первый заказ новым пользователям!</div>
                <button>Промокод</button>
            </div>
        </section>
        
        <section class="news">
            <div class="container">
                <div class="news__list">
                    <div class="news__item">
                        <div class="news__image">
                            <img src="./IMAGE/News1.png" alt="">
                        </div>
                        <h3 class="news__title">Долгожданный комикс на стадии завершения!</h3>
                        <p class="news__desctiption">
                            Спустя долгое время разработчики объявили о том, что вышли на финишную прямую и в скором времени комикс выйдет. Также они сообщили новости...
                        </p>
                        <button>Читать далее</button>

                    </div>
                    <div class="news__item">
                        <div class="news__image">
                            <img src="./IMAGE/news4.png" alt="">
                        </div>
                        <h3 class="news__title">Долгожданный комикс на стадии завершения!</h3>
                        <p class="news__desctiption">
                            Спустя долгое время разработчики объявили о том, что вышли на финишную прямую и в скором времени комикс выйдет. Также они сообщили новости...
                        </p>
                        <button>Читать далее</button>

                    </div>
                    <div class="news__item">
                        <div class="news__image">
                            <img src="./IMAGE/news2.png" alt="">
                        </div>
                        <h3 class="news__title">Долгожданный комикс на стадии завершения!</h3>
                        <p class="news__desctiption">
                            Спустя долгое время разработчики объявили о том, что вышли на финишную прямую и в скором времени комикс выйдет. Также они сообщили новости...
                        </p>
                        <button>Читать далее</button>

                    </div>
                    <div class="news__item">
                        <div class="news__image">
                            <img src="./IMAGE/news3.png" alt="">
                        </div>
                        <h3 class="news__title">Долгожданный комикс на стадии завершения!</h3>
                        <p class="news__desctiption">
                            Спустя долгое время разработчики объявили о том, что вышли на финишную прямую и в скором времени комикс выйдет. Также они сообщили новости...
                        </p>
                        <a href="">Читать далее</a>

                    </div>
                </div>
            </div>
        </section>
</main>
        <footer>
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