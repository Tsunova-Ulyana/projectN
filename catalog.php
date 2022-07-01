<?php
 require('./database.php');

 if (isset($_GET['maxPrice'])){
    $maxPrice = $_GET['maxPrice'];
 } else{
    $query = $pdo->prepare("SELECT MAX(sale_price) as maximum FROM `products`");
    $query->execute();
    $maxPrice = $query->fetch()['maximum'];
 }

 if (isset($_GET['minPrice'])){
    $minPrice = $_GET['minPrice'];
 } else{
    $minPrice = 0;
 }

 $query = $pdo->prepare("SELECT * FROM `products` WHERE sale_price >= ? and sale_price <= ?  LIMIT 4");
 $query->execute(array($minPrice,$maxPrice));
 $products = $query->fetchAll(PDO::FETCH_ASSOC);

 $query = $pdo->prepare("SELECT * FROM `products` WHERE sale_price >= ? and sale_price <= ?   ORDER BY `Id_Product`  DESC");
 $query->execute(array($minPrice,$maxPrice));
 $productsListNext = $query->fetchAll(PDO::FETCH_ASSOC);

 if (isset($_GET['filters'])){
    $filters = json_decode($_GET['filters']);
    if (count($filters)){
     

        $STRING = '( productfilters.Id_Filter= '.implode(' OR productfilters.Id_Filter=', $filters).')';

        $SQL = "SELECT Id_Product AS ID , Name, Article, Description, Equipment, Price, Count, ImagePath, sale_price, (
            SELECT DISTINCT products.Id_Product FROM `products` 
            JOIN productfilters ON productfilters.Id_Product=products.Id_Product
            join filter ON filter.Id_Filter=productfilters.Id_Filter
            WHERE (sale_price >= ? and sale_price <= ?) and".$STRING." AND productfilters.Id_Product = ID
        ) AS TEST FROM products ";
      

   

        $query = $pdo->prepare($SQL);
        $query->execute(array($minPrice,$maxPrice));
        $products = $query->fetchAll(PDO::FETCH_ASSOC);
        $filteredProducts = [];
        
        for ($i=0; $i<count($products); $i++){
            if (!($products[$i]['TEST'] ===  null)  ){
                    array_push($filteredProducts, $products[$i]);
            }
            // var_dump( $products[$i]);
    
        }
        
        $products = [];
        $productsListNext = [];

        for ($i= 0; $i<count($filteredProducts); $i++){
            if ($i<4){
                array_push($products, $filteredProducts[$i]);
            } else{
                array_push($productsListNext , $filteredProducts[$i]);
            }
        }

        

       
        
    } 
 } 
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Каталог</title>
    <link rel="stylesheet" href="./styles/main.css">
</head>
<body>

<?php
    require('./ComponentHeader.php');
?>

<main>
        <section>
            <div class="catalog-filters">
                <form class="catalog-filters__list" method="POST">
                    <h2 class="H2 cart-title">Каталог продукции</h2>
                    <div class="catalog-filters__filter-item">
                        <a class="catalog-filters__title">Категория</a>
                        <div class="catalog-filters__filter-values hide" >
                            <ul>
                                <li class="category-element">
                                    <a href="#" class="category-element__title">Семейные игры </a>
                                    <p class="category-element__count">30</p>
                                </li>
                                <li class="category-element">
                                    <a class="category-element__title">Приключенческие игры</a>
                                    <p class="category-element__count">45</p>
                                </li>
                                <li class="category-element">
                                    <a class="category-element__title">Логические игры </a>
                                    <p class="category-element__count">30</p>
                                </li>
                                <li class="category-element">
                                    <a class="category-element__title">Кооперативные игры</a>
                                    <p class="category-element__count">30</p>
                                </li>
                                <li class="category-element">
                                    <a class="category-element__title">Наборы игр </a>
                                    <p class="category-element__count">100</p>
                                </li>
                                <li class="category-element">
                                    <a class="category-element__title">Детские игры </a>
                                    <p class="category-element__count">40</p>
                                </li>
                                <li class="category-element">
                                    <a class="category-element__title">Классические игры </a>
                                    <p class="category-element__count">55</p>
                                </li>
                                <li class="category-element">
                                    <a class="category-element__title">Детективные игры </a>
                                    <p class="category-element__count">30</p>
                                </li>
                                <li class="category-element">
                                    <a class="category-element__title">Игры для вечеринок </a>
                                    <p class="category-element__count">70</p>
                                </li>
                                <li class="category-element">
                                    <a class="category-element__title">Книги </a>
                                    <p class="category-element__count">35</p>
                                </li>
                                <li class="category-element">
                                    <a class="category-element__title">Комиксы </a>
                                    <p class="category-element__count">45</p>
                                </li>
                                <li class="category-element">
                                    <a class="category-element__title">Аксессуары </a>
                                    <p class="category-element__count">55</p>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                    <div class="catalog-filters__filter-item">
                        <a class="catalog-filters__title">Цена</a>
                        <div class="catalog-filters__filter-values hide price-filter" >
                           <div class="price-filter__input price-filter__input_from">
                               <input class="price-from" name="price-from" type="number">
                           </div>
                           <div class="price-filter__input price-filter__input_to">
                                <input class="price-to" name="price-to" type="number">
                            </div>
                        </div>
                    </div>
                    <div class="catalog-filters__filter-item">
                        <a class="catalog-filters__title">Фильтры</a>

                        <?php
                            $query = $pdo->prepare("SELECT * FROM `filter` WHERE 1");
                            $query->execute();
                            $existsFilters = $query->fetchAll(PDO::FETCH_ASSOC);
                        ?>
                        <div class="catalog-filters__filter-values hide" >
                           <ul class="catalog-filters__checkboxes">
                           <?php foreach($existsFilters as $currentFilter) :?>
                                <li>
                                   <label>
                                        <input class="radio-value" name="radio-value" value="<?=$currentFilter['Id_Filter'] ;?>" type="checkbox">
                                        <p><?= $currentFilter['Name'] ;?></p>
                                    </label>
                                </li>
                               <?php endforeach; ?>
                           </ul>
                        </div>
                    </div>
                    <div class="catalog-filters__filter-item">
                        <a class="catalog-filters__title">Возраст</a>
                        <div class="catalog-filters__filter-values hide" >
                            <ul class="catalog-filters__checkboxes">
                                <li>
                                    <label>
                                         <input name="radio-value" value="123" type="checkbox">
                                         <p>От 0 до 3</p>
                                     </label>
                                 </li>
                                 <li>
                                     <label>
                                          <input name="radio-value" value="123" type="checkbox">
                                          <p>От 3 до 6</p>
                                      </label>
                                  </li>
                                  <li>
                                     <label>
                                          <input name="radio-value" value="123" type="checkbox">
                                          <p>От 6 до 9</p>
                                      </label>
                                  </li>
                            </ul>
                        </div>
                       
                    </div>
                    <button>Применить фильтры</button>

                </form>
                <div class="catalog-filters__col2 flex-list test">
                <?php foreach($products as $product) :?>
                    <div class="product-card">
                        <div class="product-card__image">
                            <img src="./productsimages/<?= $product['ImagePath'] ;?>" alt="">
                        </div>
                        <div class="product-card__content">
                            <h2 class="product-card__title">
                            <?= $product['Name'] ;?>
                            </h2>
                            <div class="product-card__rating">
                                <div class="product-card__stars">
                                    <?php
                                        $query = $pdo->prepare("SELECT AVG(rating) as rating , COUNT(rating) as count FROM review WHERE Id_Product=?");
                                        $query->execute(array($product['Id_Product']));
                                        $result = $query->fetch();
                                        echo $result['rating'] ? (int)$result['rating']  : 'Отзывов нет';
                                    ?>
                                    
                                </div>
                                <div class="product-card__reviews">
                                    <span><?= $result['count'] ;?> </span> отзывов
                                </div>
                            </div>
                            <div class="product-card__price">
                                <div class="product-card__current-price"> <?= $product['sale_price'] ;?> Р</div>
                                <div class="product-card__prev-price"> <?= $product['Price'] ;?> Р</div>
                            </div>
 
                        </div>
                        <form action="./cartAddProduct.php" class="product-card__footer">
                            <button name="add-id" value="<?= $product['Id_Product'] ;?>">Купить</button>
                        </form>
                    </div>  
                    
                <?php endforeach; ?>
                    
                  
                </div>
                
</div>
            <div class="flex-list">
            <?php foreach($productsListNext as $product) :?>
                    <div class="product-card">
                        <div class="product-card__image">
                            <img src="./productsimages/<?= $product['ImagePath'] ;?>" alt="">
                        </div>
                        <div class="product-card__content">
                            <h2 class="product-card__title">
                            <?= $product['Name'] ;?>
                            </h2>
                            <div class="product-card__rating">
                                <div class="product-card__stars">
                                    <?php
                                        $query = $pdo->prepare("SELECT AVG(rating) as rating , COUNT(rating) as count FROM review WHERE Id_Product=?");
                                        $query->execute(array($product['Id_Product']));
                                        $result = $query->fetch();
                                        echo $result['rating'] ? (int)$result['rating']  : 'Отзывов нет';
                                    ?>
                                    
                                </div>
                                <div class="product-card__reviews">
                                    <span><?= $result['count'] ;?> </span> отзывов
                                </div>
                            </div>
                            <div class="product-card__price">
                                <div class="product-card__current-price"> <?= $product['sale_price'] ;?> Р</div>
                                <div class="product-card__prev-price"> <?= $product['Price'] ;?> Р</div>
                            </div>
 
                        </div>
                        <form action="./cartAddProduct.php" class="product-card__footer">
                            <button name="add-id" value="<?= $product['Id_Product'] ;?>">Купить</button>
                        </form>
                    </div>  
                    
                <?php endforeach; ?>
             
            </div>
        </section>
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

<script src="./scripts/catalog.js"></script>
<script src="./scripts/index.js"></script>    
<script src="./scripts/filter.js"></script>

<style>
    .product-card__image {
        height: 200px;
    }
    .product-card__image img{
        width: 100%;
        height: 100%;
        object-fit: contain;
    }
</style>
</body>
</html>