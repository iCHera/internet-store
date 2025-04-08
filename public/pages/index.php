<?php

$db = new PDO("mysql:host=MySQL-8.2; dbname=rizo-store", "root", "");

$info = [];

if ($query = $db->query("SELECT * FROM `goods`")) {
    $info = $query->fetchALL(PDO::FETCH_ASSOC);
} else {
    printf($query->errorInfo());
}

$new = [];

if ($new = $db->query("SELECT * FROM `goods` WHERE new = 'yes'")) {
    $new = $new->fetchALL(PDO::FETCH_ASSOC);
} else {
    printf($db->errorInfo());
}

$xite = [];

if ($xite = $db->query("SELECT * FROM `goods` WHERE xite = 'yes'")) {
    $xite = $xite->fetchALL(PDO::FETCH_ASSOC);
}

$seri = [];

if ($seri = $db->query("SELECT * FROM `goods` WHERE brand = 'Seri'")) {
    $seri = $seri->fetchALL(PDO::FETCH_ASSOC);
}

$tefia = [];
if ($tefia = $db->query("SELECT * FROM `goods` WHERE brand = 'Tefia'")) {
    $tefia = $tefia->fetchALL(PDO::FETCH_ASSOC);
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image/header/icon-site.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/main-pages.css">
    <link rel="stylesheet" href="../style/catalog.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>Rizo Store</title>
</head>

<body>

    <!-- ШАПКА -->

    <header class="header">
        <div class="header-div">
            <a href="../pages/index.php" class="header-left">
                <img src="../image/header/icon-site.png" alt="icon" class="site-icon">
                <h1 class="header-logo">Rizo</h1>
            </a>
            <form class="sertch">
                <input type="text" class="sertch-input" placeholder="Поиск">
                <button class="sertch-button"><img src="../image/header/icon-search.png" alt="sertch"
                        class="sertch-button-icon"></button>
            </form>
            <ul class="header-list">
                <li class="header-list-li">
                    <button class="header-list-li-shop"><img src="../image/header/icon-black.png" alt=""
                            class="header-list-li-shop-icon"></button>
                </li>
                <li class="header-list-li">
                    <button class="header-list-li-user"><img src="../image/header/icon-user.png" alt=""
                            class="header-list-li-user-icon"></button>
                </li>
            </ul>
        </div>
    </header>

    <main>

        <!-- ТЕКСТ С КАРИТНКОЙ HEADER -->

        <section class="header-photo">
            <div class="header-photo-div">
                <div class="header-photo-div-text">
                    <h1 class="header-photo-lozung">Ваша красота – наша профессия. Инновационные средства для
                        безупречного
                        ухода.</h1>
                    <p class="header-photo-discription">
                        Rizo предлагает эксклюзивную линейку профессиональной косметики для ухода за телом, волосами и
                        кожей. Наши продукты созданы с использованием передовых технологий и натуральных компонентов,
                        чтобы
                        подарить вам ощущение свежести, здоровья и уверенности в себе.
                    </p>
                    <button class="header-photo-button"><a href="#" class="header-photo-a">КАТАЛОГ</a></button>
                </div>
            </div>
        </section>

        <!-- КАТАЛОГ -->

        <section class="section-catalog">
            <div class="section-catalog-div">
                <ul class="catalog-ul">
                    <li class="catalog-li"><a href="../pages/shampoo.php" class="catalog-li-a">
                            <img src="../image/catalog/shampoo.png" alt="shampoo" class="catalog-li-photo">
                            <span class="catalog-li-text">Шампуни</span>
                        </a></li>
                    <li class="catalog-li"><a href="../pages/conditioners.php" class="catalog-li-a">
                            <img src="../image/catalog/conditioner.png" alt="conditioner" class="catalog-li-photo">
                            <span class="catalog-li-text">Кондиционеры</span>
                        </a></li>
                    <li class="catalog-li"><a href="../pages/balm.php" class="catalog-li-a">
                            <img src="../image/catalog/balm.png" alt="conditioner" class="catalog-li-photo">
                            <span class="catalog-li-text">Бальзамы</span>
                        </a></li>
                    <!-- <li class="catalog-li"><a href="#" class="catalog-li-a">
                            <img src="image/catalog/gel.png" alt="gel" class="catalog-li-photo">
                            <span class="catalog-li-text">Гели</span>
                        </a></li> -->
                    <li class="catalog-li"><a href="../pages/varnishes.php" class="catalog-li-a">
                            <img src="../image/catalog/varnish.png" alt="varnish" class="catalog-li-photo">
                            <span class="catalog-li-text">Лаки</span>
                        </a></li>
                    <li class="catalog-li"><a href="../pages/mousse.php" class="catalog-li-a">
                            <img src="../image/catalog/mousse.png" alt="varnish" class="catalog-li-photo">
                            <span class="catalog-li-text">Муссы</span>
                        </a></li>
                    <li class="catalog-li"><a href="../pages/elixirs.php" class="catalog-li-a">
                            <img src="../image/catalog/elixirs.png" alt="varnish" class="catalog-li-photo">
                            <span class="catalog-li-text">Элексиры</span>
                        </a></li>
                    <li class="catalog-li"><a href="../pages/masks.php" class="catalog-li-a">
                            <img src="../image/catalog/cream.png" alt="cream" class="catalog-li-photo">
                            <span class="catalog-li-text">Маски</span>
                        </a></li>
                    <li class="catalog-li"><a href="../pages/oils.php" class="catalog-li-a">
                            <img src="../image/catalog/oils.png" alt="cream" class="catalog-li-photo">
                            <span class="catalog-li-text">Масла</span>
                        </a></li>
                    <li class="catalog-li"><a href="../pages/fluid.php" class="catalog-li-a">
                            <img src="../image/catalog/serum.png" alt="serum" class="catalog-li-photo">
                            <span class="catalog-li-text">Флюиды</span>
                        </a></li>
                </ul>
            </div>
        </section>

        <!-- НОВЫЕ ТОВАРЫ -->

        <section class="section-new">

            <!-- СЛАЙДРЕ -->

            <div class="header-new">
                <a href="#" class="new-text">
                    <h1>НОВИНКИ</h1>
                </a>
                <div class="div-slider-new">
                    <button class="slider-button-back-new button-slider-all"><img src="../image/slider/back.png"
                            alt="back" class="back-slider slider"></button>
                    <button class="slider-button-next-new button-slider-all"><img src="../image/slider/next.png"
                            alt="back" class="next-slider slider"></button>
                </div>
            </div>

            <!-- ТОВАРЫ -->

            <div class="new-div">
                <ul class="new-items">
                    <?php foreach ($new as $data): ?>
                        <li class="new-list">
                            <a href="" class="new-items-text">
                                <img src="<?php echo $data['image']; ?>" alt="photo" class="new-photo">
                                <img src="/image/header/icon-white.png" alt="icon" class="li-icon-shop">
                                <h1 class="new-name"><?php echo $data['name']; ?></h1>
                                <p class="new-description"><?php echo $data['shortDescription']; ?></p>
                                <p class="new-price"><?= $data['price'] ?> <span class="new-price-span">BYN</span></p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

        <!-- ХИТЫ ТОВАРОВ -->

        <section class="section-xite">

            <!-- СЛАЙДЕР -->

            <div class="header-xite">
                <a href="#" class="xite-text">
                    <h1>ХИТЫ</h1>
                </a>
                <div class="div-slider-xite">
                    <button class="slider-button-back-xite button-slider-all"><img src="../image/slider/back.png"
                            alt="back" class="back-slider slider"></button>
                    <button class="slider-button-next-xite button-slider-all"><img src="../image/slider/next.png"
                            alt="back" class="next-slider slider"></button>
                </div>
            </div>

            <!-- ТОВАРЫ -->

            <div class="xite-div">
                <ul class="xite-items">
                    <?php foreach ($xite as $data): ?>
                        <li class="xite-list">
                            <a href="" class="xite-items-text">
                                <img src="<?php echo $data['image']; ?>" alt="photo" class="xite-photo">
                                <img src="/image/header/icon-white.png" alt="icon" class="li-icon-shop">
                                <h1 class="xite-name"><?php echo $data['name']; ?></h1>
                                <p class="xite-description"><?php echo $data['shortDescription']; ?></p>
                                <p class="xite-price"><?= $data['price'] ?> <span class="xite-price-span">BYN</span></p>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </section>

        <!-- ТОВАРЫ ОТ SERI -->

        <section class="section-seri">

            <!-- БАННЕР SERI -->

            <div class="seri-text-div">
                <a href="#" class="seri-link">
                    <h1 class="seri-text">SERI</h1>
                </a>
                <h1 class="seri-baner"></h1>
            </div>

            <!-- ТОВАРЫ SERI -->

            <div class="seri-product">
                <button class="seri-button-back seri-button"><img src="../image/slider/back.png" alt=""
                        class="seri-button-back-image seri-image"></button>
                <div class="seri-product-list">
                    <ul class="seri-product-ul">
                        <?php foreach ($seri as $data): ?>
                            <li class="seri-pdocuct-li">
                                <a href="" class="seri-items-text">
                                    <img src="<?php echo $data['image']; ?>" alt="photo" class="seri-photo">
                                    <img src="/image/header/icon-white.png" alt="icon" class="li-icon-shop">
                                    <h1 class="seri-name"><?php echo $data['name']; ?></h1>
                                    <p class="seri-description"><?php echo $data['shortDescription']; ?></p>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <button class="seri-button-next seri-button"><img src="../image/slider/next.png" alt=""
                        class="seri-button-next-image seri-image"></button>
            </div>

        </section>

        <!-- ТОВАРЫ ОТ TEFIA -->

        <section class="section-tefia">

            <!-- БАННЕР TEFIA -->

            <div class="tefia-text-div">
                <a href="#" class="tefia-link">
                    <h1 class="tefia-text">TEFIA</h1>
                </a>
                <h1 class="tefia-baner"></h1>
            </div>

            <!-- ТОВАРЫ TEFIA -->

            <div class="tefia-product">
                <button class="tefia-button-back tefia-button"><img src="../image/slider/back.png" alt=""
                        class="tefia-button-back-image tefia-image"></button>
                <div class="tefia-product-list">
                    <ul class="tefia-product-ul">
                        <?php foreach ($tefia as $data): ?>
                            <li class="tefia-pdocuct-li">
                                <a href="" class="tefia-items-text">
                                    <img src="<?php echo $data['image']; ?>" alt="photo" class="tefia-photo">
                                    <img src="/image/header/icon-white.png" alt="icon" class="li-icon-shop">
                                    <h1 class="tefia-name"><?php echo $data['name']; ?></h1>
                                    <p class="tefia-description"><?php echo $data['shortDescription']; ?></p>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <button class="tefia-button-next tefia-button"><img src="../image/slider/next.png" alt=""
                        class="tefia-button-next-image tefia-image"></button>
            </div>

        </section>
    </main>
    <script src="../js/main.js"></script>
</body>

</html>