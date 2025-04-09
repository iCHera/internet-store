<?php
$db = new PDO("mysql:host=MySQL-8.2; dbname=rizo-store", "root", "");

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $db->prepare("SELECT * FROM goods WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($product) {
        $brand = $product['brand'];
        $stmtOther = $db->prepare("SELECT * FROM goods WHERE brand = ? AND id != ?");
        $stmtOther->execute([$brand, $id]);
        $otherProducts = $stmtOther->fetchAll(PDO::FETCH_ASSOC);
    } else {
        echo "Товар не найден.";
        exit;
    }
} else {
    echo "Товар не найден.";
    exit;
}
?>


<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image/header/icon-site.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/product.css">
    <link rel="stylesheet" href="../style/main-pages.css">
    <link rel="stylesheet" href="../style/style.css">
    <title>Rizo Store</title>
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
        <div class="basket">
            <div class="basket-div">
                <div class="span-point">
                    <span ></span>
                    <span></span>
                </div>
                <h1 class="basket-text-underfind">пока ничего нету</h1>
                <h1 class="basket-text">asdad</h1>
                <ul class="basket-list">
                    <? foreach ($data as $product): ?>
                        <li class="basket-item">
                            <div class="basket-item">
                                <img src="<?= $data['image'] ?>" alt="photo">
                            </div>
                            <div class="basket-product">
                                <h1 class="basket-name"><?= $data['name'] ?></h1>
                                <h1 class="basket-price"><?= $data['price'] ?></h1>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <button class="buy-basket">ОФОРМНИТЬ ЗАКАЗ</button>
            </div>
        </div>
    </header>


    <section class="product">
        <!-- <div class="put">
            <p class="product-put">
                <a href="../index.php">главная</a>
                <a href=""></a>
            </p>
        </div> -->
        <div class="product-div">
            <div class="product-photo-div">
                <img src="<?php echo $product['image']; ?>" alt="photo product" class="product-photo">
            </div>
            <div class="product-text-div">
                <h1 class="product-name"><?php echo $product['name']; ?></h1>
                <div class="btend-div">
                    <p class="brend">БРЕНД:</p>
                    <a href="../pages/index.php" class="brend-db"><?= $product['brand'] ?></a>
                </div>
                <div class="product-volume-div">
                    <p class="volume-text">ОБЪЁМ:</p>
                    <p class="volume-db"><?= $product['volume'] ?> МЛ</p>
                </div>
                <div class="description-div">
                    <p class="description">ОПИСАНИЕ:</p>
                    <p class="product-description"><?php echo $product['description']; ?></p>
                </div>
                <div class="product-price-button">
                    <p class="product-price"><?php echo $product['price']; ?> BYN</p>
                    <button class="product-add-basket">ДОБАВИТЬ В КОРЗИНУ</button>
                </div>
            </div>
        </div>
    </section>

    <section class="section-other">

        <!-- СЛАЙДРЕ -->

        <div class="header-other">
            <h1 href="#" class="other-text">
                ДРУГИЕ ТОВАРЫ ОТ <a href="#" class="other-product-link"><?= $product['brand']?></a>
            </h1>
            <div class="div-slider-other">
                <button class="slider-button-back-other button-slider-all-other"><img src="../image/slider/back.png" alt="back"
                        class="back-slider slider"></button>
                <button class="slider-button-next-other button-slider-all-other"><img src="../image/slider/next.png" alt="back"
                        class="next-slider slider"></button>
            </div>
        </div>

        <!-- ТОВАРЫ -->

        <div class="other-div">
            <ul class="other-items">
                <?php foreach ($otherProducts as $data): ?>
                    <li class="other-list">
                        <a href="product.php?id=<?= $data['id'] ?>" class="other-items-text">
                            <img src="<?php echo $data['image']; ?>" alt="photo" class="other-photo">
                            <img src="/image/header/icon-white.png" alt="icon" class="li-icon-shop-other">
                            <h1 class="other-name"><?php echo $data['name']; ?></h1>
                            <p class="other-description"><?php echo $data['shortDescription']; ?></p>
                            <p class="other-price"><?= $data['price'] ?> <span class="other-price-span">BYN</span></p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <script src="../js/product.js"></script>
</body>

</html>