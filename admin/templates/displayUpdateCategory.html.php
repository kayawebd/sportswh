<p class="adminMessage"><?= $message ?></p>
<div class="adminForm" id="editItem">
    <fieldset>
        <?php
        if (isset($_GET["id"])) {
            $categoryId = $_GET["id"];
        } elseif (isset($_POST["categoryId"])) {
            $categoryId = $_POST["categoryId"];
        } else {
            $categoryId = 0;
        }

        $sql = "SELECT categoryId, categoryName FROM category WHERE categoryId = :categoryId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":categoryId", $categoryId, PDO::PARAM_INT);
        $editRows = $db->executeSQL($stmt);
        if (count($editRows) > 0) {
            // select the first row
            $editRow = $editRows[0];
        }
        ?>
        <legend>Update Category</legend>
        <form action="processUpdateCategory.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="categoryName">Edit Category:</label>
                <input type="text" name="categoryName" id="categoryName" value="<?= $editRow["categoryName"] ?>" required>
            </p>
            <div class="formAction">
                <input type="hidden" value="<?= $editRow["categoryId"] ?>" name="categoryId">
                <input type="submit" name="submitUpdate" value="Update">
                <a href="displayCategories.php" class="formAction-back">Back</a>
            </div>
        </form>
    </fieldset>
</div>