<p class="adminMessage"><?= $message ?></p>
<div>
    <h2>Categories</h2>
    <a href="../admin/displayInsertCategory.php"><button class="admin__button">Add Category</button></a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>CategoryID</th>
                    <th>Category Name</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="categoryTable">
                <?php
                $sql = "SELECT categoryId, categoryName FROM category";
                $stmt = $pdo->prepare($sql);
                $categoryRows = $db->executeSQL($stmt);

                foreach ($categoryRows as $row) :
                    $categoryId = $row["categoryId"];
                    $categoryName = $row["categoryName"];
                ?>
                    <tr>
                        <td><?= $categoryId ?></td>
                        <td><?= $categoryName ?></td>
                        <td><a href="displayUpdateCategory.php?id=<?= $categoryId ?>" class="updateButton">Edit</a></td>
                        <td><a class="delete deleteButton" href="processDeleteCategory.php?id=<?= $categoryId ?>" onclick="return confirmDelete(event)">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>