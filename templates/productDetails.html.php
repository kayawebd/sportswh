<h1 class="sr-only">Sports Warehouse product details</h1>
<?php
require_once("./classes/DBAccess.php");
include "./settings/db.php";
$db = new DBAccess($dsn, $username, $password);
$pdo = $db->connect();

if (isset($_GET["id"])) {
    $sql = "SELECT itemId, itemName, photo, price, salePrice, description FROM item Where itemId = :id;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":id", $_GET["id"]);
    $rows = $db->executeSQL($stmt);
}
?>

<div class="productDetails">
    <?php foreach ($rows as $row) :
        if (file_exists("images/product-images/" . $row["photo"]) && strlen($row["photo"]) > 0) {
            $photoPath = "images/product-images/" . $row["photo"];
        } else {
            $photoPath = "images/product-images/imageUnavailable.jpg";
        }
        $itemId = $row["itemId"];
        $itemName = $row["itemName"];
        $photo = $row["photo"];
        $price = $row["price"];
        $description = $row["description"];
        $salePrice = $row["salePrice"];
    ?>
        <article class="productContainer">
            <div class="product__photo-frame">
                <img src="<?= $photoPath ?>" class="product__photo" width="500" height="500" alt="<?= $itemName ?>">
            </div>
            <div class="productDetails__side">
                <h3 class="product__heading"><?= $itemName ?></h3>
                <?php
                if ($salePrice <= 0) {
                ?><p class="product__price">$<?= $price ?></p>
                <?php
                } else {
                ?>
                    <p class="product__price"><span class="product__price-onSale">$<?= $salePrice ?></span>
                        <span class="product__priceDescription">was</span>
                        <del><?= $price ?></del>
                    </p>
                <?php
                }
                ?>
                <p class="product__description"><?= $description ?></p>
                <form action="shopping.php" method="post" class="cartContainer">
                    <!-- shoppingQuantityCounter -->
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


        </article>
    <?php endforeach; ?>
</div>