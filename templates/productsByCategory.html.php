<div class="mainContents">
    <div class="productsContainer">
        <div class="products siteWrapper">
            <?php foreach ($productRows as $productRow) :
                if (file_exists("images/product-images/" . $productRow["photo"]) && strlen($productRow["photo"]) > 0) {
                    $photoPath = "images/product-images/" . $productRow["photo"];
                } else {
                    $photoPath = "images/product-images/imageUnavailable.jpg";
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
</div>