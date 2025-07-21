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
    $itemID = $_GET["id"];
} elseif (isset($_POST["itemId"])) {
    $itemID = $_POST["itemId"];
} else {
    $itemID = 0;
}

$sql = "SELECT itemId, itemName, photo, price, salePrice, description, featured, item.productCode, category.categoryId FROM item, category WHERE item.categoryId = category.categoryId  AND itemId = :itemID";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(":itemID", $itemID, PDO::PARAM_INT);
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
            <p>
                <img src="../assets/images/product-images/<?= $editRow["photo"] ?>" alt=" <?= $editRow["itemName"] ?> photo" id="currentPhoto" />
            <p for="photo">File Name: <?= $editRow["photo"] ?></p>
            <?php
            $filePath = "../assets/images/product-images/" . $editRow["photo"];
            $fileSize = filesize($filePath);
            $fileSizeFormatted = formatBytes($fileSize);
            function formatBytes($bytes, $precision = 0)
            {
                $units = ['B', 'KB', 'MB', 'GB', 'TB'];

                $bytes = max($bytes, 0);
                $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
                $pow = min($pow, count($units) - 1);

                return round($bytes / (pow(1024, $pow)), $precision) . ' ' . $units[$pow];
            }

            ?>
            <!-- <p id="sizeInfo">File Size: <?= $fileSizeFormatted ?></p> -->
            <!-- <p id="sizeInfo">File Location: <?= $filePath ?></p> -->
            <input type="hidden" name="oldPhoto" value="<?= $editRow["photo"] ?> ">
            </p>
            <label for="photoToUpload">Upload Photo:</label>
            <img id="photoToUpload" />
            <input type="file" name="photoToUpload" id="photo" onchange="handleFileSelect(event)">
            <p id="fileExistMessage" class="error"></p>
            <p id="fileSize"></p>
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
                    <input type="checkbox" name="featured">
                <?php endif; ?>
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
            <p>
                <label for="productCode">Product Code:</label>
                <input type="text" name="productCode" id="productCode" value="<?= $editRow["productCode"] ?>">
            </p>
            <div class="formAction">
                <input type="hidden" value="<?= $editRow["itemId"] ?>" name="itemId">
                <input type="submit" name="submitUpdateProduct" value="Update">
                <a href="displayProducts.php" class="formAction-back">Back</a>
            </div>
        </form>
    </fieldset>
</div>