<?php

$db = new PDO("mysql:host=MySQL-8.2; dbname=rizo-store", "root", "");

$info = [];

if ($query = $db->query("SELECT * FROM `goods` WHERE catalog = 'fluid'")) {
    $info = $query->fetchALL(PDO::FETCH_ASSOC);
} else {
    print_r($db->errorInfo());
}

?>

<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../image/header/icon-site.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/main-pages.css">
    <link rel="stylesheet" href="../style/style.css">
    <link rel="stylesheet" href="../style/catalog.css">
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

    <section class="section-goods catalog">
        <div class="goods-div">
            <ul class="goods-items">
                <?php foreach ($info as $data): ?>
                    <li class="goods-list">
                        <a href="product.php?id=<?= $data['id'] ?>" class="goods-items-text">
                            <img src="<?php echo $data['image']; ?>" alt="photo" class="goods-photo">
                            <img src="/image/header/icon-white.png" alt="icon" class="li-icon-shop">
                            <h1 class="goods-name"><?php echo $data['name']; ?></h1>
                            <p class="goods-description"><?php echo $data['shortDescription']; ?></p>
                            <p class="goods-price"><?= $data['price'] ?> BYN</p>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>
    <script src="../js/main.js"></script>
</body>

</html>