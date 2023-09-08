<div class="adminMessage">
    <?php
    //  upload image error message array $uploadMessages[]
    if (!empty($uploadErrMessages)) {
        echo "<p class='adminMessage'><b>Item NOT added:</b></p>";
        foreach ($uploadErrMessages as $uploadMessage) {
    ?><p class="adminMessage"><?= $uploadMessage ?></p>
        <?php
        }
    } else {
        ?> <p class="adminMessage"><?= $message ?></p>
    <?php
    } ?>
</div>

<p class="adminMessage"><?= $message ?></p>
<div class="adminForm" id="insertItem">
    <fieldset>
        <legend>Add Product</legend>
        <form action="processInsertProduct.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="itemName">Item Name:</label>
                <input type="text" name="itemName" id="itemName" required>
            </p>
            <p>
                <!--  post_max_size? -->
                <label for="photo">Photo:</label>
                <img id="newPhoto" />
                <input type="file" name="photoToUpload" id="photo" onchange="handleFileSelect(event)">
            <div id="fileSize"></div>
            </p>
            <p>
                <label for="price">Price:</label>
                <input type="number" name="price" id="price" required>
            </p>
            <p>
                <label for="salePrice">Sale Price:</label>
                <input type="number" name="salePrice" id="salePrice">
            </p>
            <p class="textarea">
                <label for="description">Description:</label>
                <textarea name="description" id="description" cols="30" rows="10" required></textarea>

            </p>
            <p class="featured">
                <label for="featured">Featured:</label>
                <input type="checkbox" id="featured" name="featured"><span>&nbsp;Feature on the main page</span>
            </p>
            <p>
                <label for="category">Category:</label>
                <select name="categoryId" id="category">
                    <?php
                    $sql = "SELECT categoryId, categoryName FROM category";
                    $stmt = $pdo->prepare($sql);
                    $categoryRows = $db->executeSQL($stmt);
                    foreach ($categoryRows as $categoryRow) :
                        $categoryId = $categoryRow["categoryId"];
                        $categoryName = $categoryRow["categoryName"];
                    ?>
                        <option value="<?= $categoryId ?>"><?= $categoryName ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <div class="formAction">
                <input type="submit" name="submitInsert" value="Add Product">
                <a href="displayProducts.php" class="formAction-back">Back</a>
            </div>
        </form>
    </fieldset>
</div>