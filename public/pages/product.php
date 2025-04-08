<?php
$db = new PDO("mysql:host=MySQL-8.2; dbname=rizo-store", "root", "");

$id = $_GET['id'] ?? null;

if ($id) {
    $stmt = $db->prepare("SELECT * FROM goods WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo "Товар не найден.";
    exit;
}

?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Rizo Store</title>
    <link rel="stylesheet" href="../style/product.css">
    <link rel="shortcut icon" href="../image/header/icon-site.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/main-pages.css">
    <link rel="stylesheet" href="../style/style.css">
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

    <h1><?php echo $product['name']; ?></h1>
    <img src="<?php echo $product['image']; ?>" alt="Фото товара" style="width:300px">
    <p><?php echo $product['description']; ?></p>
    <p>Цена: <?php echo $product['price']; ?> BYN</p>

</body>
</html>
