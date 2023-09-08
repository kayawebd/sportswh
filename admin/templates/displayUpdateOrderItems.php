<!-- display error message -->
<div class="adminMessage">
    <?php
    //  upload image error message array $uploadMessages[]
    if (!empty($uploadErrMessages)) {
        echo "<p class='adminMessage'><b>Item NOT Updated:</b></p>";
        foreach ($uploadErrMessages as $uploadMessage) {
    ?><p class="adminMessage"><?= $uploadMessage ?></p>
        <?php
        }
    } else {
        ?> <p class="adminMessage"><?= $message ?></p>
    <?php
    } ?>
</div>
<?php
if (isset($_GET["id"])) {
    $shoppingOrderId = $_GET["id"];
} elseif (isset($_POST["shoppingOrderId"])) {
    $shoppingOrderId = $_POST["shoppingOrderId"];
} else {
    $shoppingOrderId = 0;
}

$sql = "SELECT shoppingOrderId, quantity,  orderitem.price, itemName, photo, item.itemId FROM orderitem, item WHERE orderitem.itemId = item.itemId  AND shoppingOrderId = :shoppingOrderId;";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":shoppingOrderId", $shoppingOrderId, PDO::PARAM_INT);
$editRows = $db->executeSQL($stmt);

$sql = "SELECT categoryId, categoryName FROM category";
$stmt = $pdo->prepare($sql);
$categoryRows = $db->executeSQL($stmt);

if (count($editRows) > 0) {
    // select the first row
    $editRow = $editRows[0];
}
?>
<div class="adminForm" id="editItem">
    <fieldset>
        <legend>Update Product</legend>
        <form action="processUpdateProduct.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="itemName">Item Name:</label>
                <input type="text" name="itemName" id="itemName" value="<?= $editRow["itemName"] ?>" required>
            </p>
            <?php

            $displayPhoto = $editRow["photo"];

            ?>
            <p>
                <img src="../assets/images/product-images/<?= $displayPhoto ?>" alt=" <?= $editRow["itemName"] ?> photo" onload="handleImageLoad(this)" id="currentPhoto" />
            <p for="photo">Current Photo: <?= $editRow["photo"] ?></p><span id="sizeInfo"></span>
            <a href="deletePhoto.php?id=<?= $editRow["itemId"] ?>" class="delete deleteButton">Delete Image</a>
            <input type="hidden" name="oldPhoto" value="<?= $editRow["photo"] ?> ">
            </p>
            <p>
                <label for="newPhoto">New Photo:</label>
                <img id="newPhoto" />
                <input type="file" name="photoToUpload" id="photo" onchange="handleFileSelect(event)">
            <p id="fileSize"></p>
            </p>
            <p>
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" value="<?= $editRow["price"] ?>" required>
            </p>
            <p>
                <label for="salePrice">Sale Price:</label>
                <input type="number" name="salePrice" value="<?= $editRow["salePrice"] ?>" id="salePrice">
            </p>
            <div class="textarea">
                <label for="description">Description:</label>
                <textarea name="description" id="description" cols="30" rows="10" required><?= $editRow["description"] ?> </textarea>

            </div>
            <p class="featured">
                <label for="featured">Featured:</label>
                <?php
                if ($editRow["featured"] == 1) :
                ?>
                    <input type="checkbox" name="featured" checked>
                <?php else : ?>
                    <input type="checkbox" name="featured"> <span>Yes</span>
                <?php endif; ?>
                <span>&nbsp;Feature on the main page</span>
            <p>
                <label for="category">Category:</label>
                <select name="categoryId" id="category" required>
                    <?php
                    foreach ($categoryRows as $categoryRow) :
                        $categoryId = $categoryRow["categoryId"];
                        $categoryName = $categoryRow["categoryName"];
                        if ($categoryId == $editRow["categoryId"]) :
                    ?>
                            <option value="<?= $categoryId ?>" selected><?= $categoryName ?></option>
                        <?php else : ?>
                            <option value="<?= $categoryId ?>"><?= $categoryName ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </p>
            <div class="formAction">
                <input type="hidden" value="<?= $editRow["itemId"] ?>" name="itemId">
                <input type="submit" name="submitUpdate" value="Update">
                <a href="displayProducts.php" class="formAction-back">Back</a>
            </div>
        </form>
    </fieldset>
</div>