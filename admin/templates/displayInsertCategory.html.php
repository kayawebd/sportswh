<p class="adminMessage"><?= $message ?></p>
<div class="adminForm" id="insertItem">
    <fieldset>
        <legend>Add Category</legend>
        <form action="processInsertCategory.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="categoryName">Category Name:</label>
                <input type="text" name="categoryName" id="categoryName" required>
            </p>
            <div class="formAction">
                <input type="submit" name="submitInsert" value="Add Category">
                <a href="displayCategories.php" class="formAction-back">Back</a>
            </div>
        </form>
    </fieldset>
</div>