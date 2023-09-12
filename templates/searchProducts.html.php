<?php
if (!empty($_GET["search"])) {
    $numOfResults = count($searchResultRows);
    if ($numOfResults > 1) {
        echo "<p class='article'>" . $numOfResults . " products found with keyword: " . $_GET["search"] . "</p>";
    } else {
        echo "<p class='article'>" . $numOfResults . " product found with keyword: " . $_GET["search"] . "<p>";
    }
}
?>

<div class="productsByCategory">
    <?php foreach ($searchResultRows as $row) :
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
        <article class="product__item">
            <a href="./productDetails.php?id=<?= $itemId ?>" class="product__link">
                <div class="product__photo-frame">
                    <img src="<?= $photoPath ?>" class="product__photo" width="500" height="500" alt="<?= $itemName ?>">
                </div>
                <?php
                if ($salePrice <= 0) {
                ?><p class="product__price">$<?= $price ?></p>
                <?php
                } else {
                ?>
                    <p class="product__price"><span class="product__price-onSale">$<?= $salePrice ?></span>
                        <span class="product__priceDescription">was</span>
                        <del>$<?= $price ?></del>
                    </p>
                <?php
                }
                ?>
                <h3 class="product__heading"><?= $itemName ?></h3>
            </a>
        </article>
    <?php endforeach; ?>
</div>