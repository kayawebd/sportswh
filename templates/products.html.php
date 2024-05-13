<div class="mainContents">
    <div class="breadcrumb siteWrapper">
        <a class="breadcrumb-element" href="./index.php">Home</a>
        <a class="breadcrumb-element" href="./products.php">Products</a>
    </div>
    <div class="productsContainer">
        <div class="products siteWrapper">
            <?php
            require_once("./classes/DBAccess.php");
            include "./settings/db.php";
            $db = new DBAccess($dsn, $username, $password);
            $pdo = $db->connect();

            $title = "Products by category";

            // retrieve products
            $sql = "SELECT itemId, itemName, photo, price, salePrice, description FROM item";
            $stmt = $pdo->prepare($sql);
            $productRows = $db->executeSQL($stmt);
            ?>
            <?php foreach ($productRows as $productRow) :
                if (file_exists("./assets/images/product-images/" . $productRow["photo"]) && strlen($productRow["photo"]) > 0) {
                    $photoPath = "./assets/images/product-images/" . $productRow["photo"];
                } else {
                    $photoPath = "./assets/images/product-images/imageUnavailable.webp";
                }
                $itemId = $productRow["itemId"];
                $itemName = $productRow["itemName"];
                $photo = $productRow["photo"];
                $price = $productRow["price"];
                $description = $productRow["description"];
                $salePrice = $productRow["salePrice"];
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
                                <span class="priceDescription">was</span>
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