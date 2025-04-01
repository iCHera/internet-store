<?php

$db = new PDO("mysql:host=MySQL-8.2; dbname=rizo-store", "root", "");

$info = [];

if ($query = $db->query("SELECT * FROM `goods`")) {
    $info = $query->fetchALL(PDO::FETCH_ASSOC);
} else {
    printf($query->errorInfo());
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="image/header/icon-site.png" type="image/x-icon">
    <link rel="stylesheet" href="style/main-pages.css">
    <link rel="stylesheet" href="style/style.css">
    <title>Rizo Store</title>
</head>

<body>
    <header class="header">
        <div class="header-div">
            <a href="/index.php" class="header-left">
                <img src="image/header/icon-site.png" alt="icon" class="site-icon">
                <h1 class="header-logo">Rizo</h1>
            </a>
            <form class="sertch">
                <input type="text" class="sertch-input" placeholder="Поиск">
                <button class="sertch-button"><img src="image/header/icon-search.png" alt="sertch"
                        class="sertch-button-icon"></button>
            </form>
            <ul class="header-list">
                <li class="header-list-li">
                    <button class="header-list-li-shop"><img src="image/header/icon-black.png" alt=""
                            class="header-list-li-shop-icon"></button>
                </li>
                <li class="header-list-li">
                    <button class="header-list-li-user"><img src="image/header/icon-user.png" alt=""
                            class="header-list-li-user-icon"></button>
                </li>
            </ul>
        </div>
    </header>

    <main>
        <section class="section-catalog">
            <div class="section-catalog-div">
                <ul class="catalog-ul">
                    <li class="catalog-li"><a href="../pages/shampoo.php" class="catalog-li-a">
                            <img src="image/catalog/shampoo.png" alt="shampoo" class="catalog-li-photo">
                            <span class="catalog-li-text">Шампуни</span>
                        </a></li>
                    <li class="catalog-li"><a href="../pages/conditioners.php" class="catalog-li-a">
                            <img src="image/catalog/conditioner.png" alt="conditioner" class="catalog-li-photo">
                            <span class="catalog-li-text">Кондиционеры</span>
                        </a></li>
                    <li class="catalog-li"><a href="../pages/balm.php" class="catalog-li-a">
                            <img src="image/catalog/balm.png" alt="conditioner" class="catalog-li-photo">
                            <span class="catalog-li-text">Бальзамы</span>
                        </a></li>
                    <!-- <li class="catalog-li"><a href="#" class="catalog-li-a">
                            <img src="image/catalog/gel.png" alt="gel" class="catalog-li-photo">
                            <span class="catalog-li-text">Гели</span>
                        </a></li> -->
                    <li class="catalog-li"><a href="../pages/varnishes.php" class="catalog-li-a">
                            <img src="image/catalog/varnish.png" alt="varnish" class="catalog-li-photo">
                            <span class="catalog-li-text">Лаки</span>
                        </a></li>
                    <li class="catalog-li"><a href="../pages/mousse.php" class="catalog-li-a">
                            <img src="image/catalog/mousse.png" alt="varnish" class="catalog-li-photo">
                            <span class="catalog-li-text">Муссы</span>
                        </a></li>
                    <li class="catalog-li"><a href="../pages/elixirs.php" class="catalog-li-a">
                            <img src="image/catalog/elixirs.png" alt="varnish" class="catalog-li-photo">
                            <span class="catalog-li-text">Элексиры</span>
                        </a></li>
                    <li class="catalog-li"><a href="../pages/masks.php" class="catalog-li-a">
                            <img src="image/catalog/cream.png" alt="cream" class="catalog-li-photo">
                            <span class="catalog-li-text">Маски</span>
                        </a></li>
                    <li class="catalog-li"><a href="../pages/oils.php" class="catalog-li-a">
                            <img src="image/catalog/oils.png" alt="cream" class="catalog-li-photo">
                            <span class="catalog-li-text">Масла</span>
                        </a></li>
                    <li class="catalog-li"><a href="#" class="catalog-li-a">
                            <img src="image/catalog/serum.png" alt="serum" class="catalog-li-photo">
                            <span class="catalog-li-text">Сыворотки</span>
                        </a></li>
                </ul>
            </div>
        </section>
        <section class="section-goods">
            <div class="goods-div">
                <ul class="goods-items">
                    <?php foreach ($info as $data): ?>
                        <li class="goods-list">
                            <a href="" class="goods-items-text">
                                <img src="<?php echo $data['image']; ?>" alt="photo" class="goods-photo">
                                <img src="/image/header/icon-white.png" alt="icon" class="li-icon-shop">
                                <h1 class="goods-name"><?php echo $data['name']; ?></h1>
                                <p class="goods-description"><?php echo $data['shortDescription']; ?></p>
                                <p class="goods-price"><?= $data['price'] ?> <span class="goods-price-span">BYN</span> фывфвфыв</p>
                            </a>
                        </li>  
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>
    </main>
    <script src="js/main.js"></script>
</body>

</html>