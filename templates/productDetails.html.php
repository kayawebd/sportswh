<h1 class="sr-only">Sports Warehouse product details</h1>
<?php
require_once("./classes/DBAccess.php");
include "./settings/db.php";
$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();

if (isset($_GET["id"])) {
    $sql = "SELECT itemId, itemName, photo, price, salePrice, description, productCode, item.categoryId, category.categoryName FROM item JOIN category ON item.categoryId = category.categoryId Where itemId = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $_GET["id"]);
    $rows = $db->executeSQL($stmt);
}
?>

<div class="productDetails siteWrapper">
    <?php foreach ($rows as $row) :
        if (file_exists("./assets/images/product-images/" . $row["photo"]) && strlen($row["photo"]) > 0) {
            $photoPath = "./assets/images/product-images/" . $row["photo"];
        } else {
            $photoPath = "./assets/images/product-images/imageUnavailable.webp";
        }
        $itemId = $row["itemId"];
        $itemName = $row["itemName"];
        $photo = $row["photo"];
        $price = $row["price"];
        $description = $row["description"];
        $salePrice = $row["salePrice"];
        $productCode = $row["productCode"];
        $categoryId = $row["categoryId"];
        $categoryName = $row["categoryName"];
    ?>
        <div class="breadcrumb">
            <a class="breadcrumb-element" href="./index.php">Home</a>
            <a class="breadcrumb-element" href="./products.php">Products</a>
            <a class="breadcrumb-element" href="./productsByCategory.php?id=<?= $categoryId ?>"><?= $categoryName ?></a>
            <span><?= $itemName ?></span>
        </div>
        <div class="productDetailsContainer">
            <div class="product">
                <div class="item">
                    <!-- photo -->
                    <div class="photo-frame">
                        <img src="<?= $photoPath ?>" class="photo" width="500" height="500" alt="<?= $itemName ?>">
                    </div>
                    <div class="content">
                        <h3 class="heading"><?= $itemName ?></h3>

                        <p class="productCode">SKU:<?= $productCode ?></p>

                        <p class="price">
                            <?php if ($salePrice <= 0) : ?>
                                $<?= $price ?>
                            <?php else : ?>
                                <span class="price-onSale">$<?= $salePrice ?></span>
                                <span class="priceDescription">was</span>
                                <del>$ <?= $price ?></del>
                            <?php endif; ?>
                        </p>
                        <!-- rating -->
                        <div id="product-star-rating">
                            <div class="rating-group">
                                <label aria-label="1 star" class="rating__label" for="rating-1"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating-1" value="1" type="radio">
                                <label aria-label="2 stars" class="rating__label" for="rating-2"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating-2" value="2" type="radio">
                                <label aria-label="3 stars" class="rating__label" for="rating-3"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating-3" value="3" type="radio">
                                <label aria-label="4 stars" class="rating__label" for="rating-4"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating-4" value="4" type="radio">
                                <label aria-label="5 stars" class="rating__label" for="rating-5"><i class="rating__icon rating__icon--star fa fa-star"></i></label>
                                <input class="rating__input" name="rating" id="rating-5" value="5" type="radio" checked>
                                <span class="desc">4</span>
                            </div>
                        </div>

                        <!-- colour options -->
                        <div class="colour-options">
                            Colour
                            <label for="colorPicker">Select a color:</label>
                            <input type="color" id="colorPicker" name="colorPicker">
                        </div>

                        <!-- size options -->
                        <div class="sizeContainer">
                            <div class="sizeChart">
                                <h3>Size</h3>
                                <a href="./sizeChart.php">
                                    <p>Size Chart</p>
                                </a>
                            </div>
                            <div class="size-selector">
                                <select class="sizes">
                                    <option class="selected-size"> 6</option>
                                    <option> 7</option>
                                    <option> 8</option>
                                    <option> 9</option>
                                    <option> 10</option>
                                    <option> 11</option>
                                    <option> 12</option>
                                </select>
                            </div>
                        </div>

                        <!-- shoppingQuantityCounter -->
                        <div class="addToCartContainer">
                            <form action="shopping.php" method="post" class="cartContainer">
                                <div class="counter">
                                    <span class="down" onClick='decreaseNumber(event, this)'>
                                        <i class="fa-solid fa-minus"></i>
                                    </span>
                                    <input type="number" value="1" name="qty">
                                    <span class="up" onClick='increaseNumber(event, this)'>
                                        <i class="fa-solid fa-plus"></i>
                                    </span>
                                </div>

                                <button class="cartContainer__btn" type="submit" name="buy">add to cart</button>
                                <input type="hidden" value="<?= $itemId ?>" name="itemId">
                            </form>
                        </div>
                        <!-- delivery options -->
                        <div class="delivery">
                            <span class="text">
                            </span>
                            <span class="shipping">
                                Free Delivery over $100
                            </span>
                        </div>

                        <!-- product descriptioin -->
                        <div class="description-content">
                            <h3 class="heading">Product Info</h3>
                            <p class=" description"><?= $description ?></p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="recommendedProductContainer">
        <div class="siteWrapper">
            <?php
            require_once "./classes/DBAccess.php";
            include "./settings/db.php";
            $db = new DBAccess($dsn, $username, $password);
            $pdo = $db->connect();

            $sql = "SELECT itemId, itemName, photo, price, salePrice, description FROM item Where featured = 1";
            $stmt = $pdo->prepare($sql);
            $rows = $db->executeSQL($stmt);
            ?>
            <div class="blockHeading">
                <h2>recommended for you</h2>
            </div>
            <div class="products">
                <?php foreach ($rows as $row) :
                    if (file_exists("./assets/images/product-images/" . $row["photo"]) && strlen($row["photo"]) > 0) {
                        $photoPath = "./assets/images/product-images/" . $row["photo"];
                    } else {
                        $photoPath = "./assets/images/product-images/imageUnavailable.webp";
                    }
                    $itemId = $row["itemId"];
                    $itemName = $row["itemName"];
                    $photo = $row["photo"];
                    $price = $row["price"];
                    $description = $row["description"];
                    $salePrice = $row["salePrice"];
                ?>
                    <article class="item">
                        <a href="./productDetails.php?id=<?= $itemId ?>" class="link">
                            <div class="photo-frame">
                                <img src="<?= $photoPath ?>" class="photo" width="500" height="500" alt="<?= $itemName ?>">
                            </div>
                            <?php
                            if ($salePrice <= 0) {
                            ?><p class="price">$<?= $price ?></p>
                            <?php
                            } else {
                            ?>
                                <p class="price"><span class="price-onSale">$<?= $salePrice ?></span>
                                    <span class="priceDescription
                            ">was</span>
                                    <del>$<?= $price ?></del>
                                </p>
                            <?php
                            }
                            ?>
                            <h3 class="heading"><?= $itemName ?></h3>
                        </a>
                    </article>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <div class="shopByCategory">
        <div class="siteWrapper">
            <div class="blockHeading">
                <h2>shop by category</h2>
            </div>
            <div class="row">
                <a href="./productsByCategory.php?id=1" class="column4">
                    <div class="imgWrapper">
                        <img src="./assets/images/product-by-category/shoes.webp" alt="category shoes">
                    </div>
                    <div class="content">
                        <span class="title">Shoes</span>
                    </div>
                </a>
                <a href="./productsByCategory.php?id=2" class="column4">
                    <div class="imgWrapper">
                        <img src="./assets/images/product-by-category/helmet.webp" alt="category helmet">
                    </div>
                    <div class="content">
                        <span class="title">Helmet</span>
                    </div>
                </a>
                <a href="./productsByCategory.php?id=33" class="column4">
                    <div class="imgWrapper">
                        <img src="./assets/images/product-by-category/pants.webp" alt="category pants">
                    </div>
                    <div class="content">
                        <span class="title">Pants</span>
                    </div>
                </a>
                <a href="./productsByCategory.php?id=4" class="column4">
                    <div class="imgWrapper">
                        <img src="./assets/images/product-by-category/tops.webp" alt="category tops">
                    </div>
                    <div class="content">
                        <span class="title">Tops</span>
                    </div>
                </a>
                <a href="./productsByCategory.php?id=5" class="column4">
                    <div class="imgWrapper">
                        <img src="./assets/images/product-by-category/balls3.webp" alt="category balls">
                    </div>
                    <div class="content">
                        <span class="title">Balls</span>
                    </div>
                </a>
                <a href="./productsByCategory.php?id=6" class="column4">
                    <div class="imgWrapper">
                        <img src="./assets/images/product-by-category/equipment.webp" alt="category equipment">
                    </div>
                    <div class="content">
                        <span class="title">Equipment</span>
                    </div>
                </a>
                <a href="./productsByCategory.php?id=7" class="column4">
                    <div class="imgWrapper">
                        <img src="./assets/images/product-by-category/trainingGear.webp" alt="">
                    </div>
                    <div class="content">
                        <span class="title">Training Gear</span>
                    </div>
                </a>
                <a href="./productsByCategory.php?id=171" class="column4">
                    <div class="imgWrapper">
                        <img src="./assets/images/product-by-category/tech.webp" alt="category tech">
                    </div>
                    <div class="content">
                        <span class="title">Tech</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>