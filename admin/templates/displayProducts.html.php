<!-- display error message -->
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

<div>
    <h2>Products</h2>
    <a href="../admin/displayInsertProduct.php"><button class="admin__button">Add Product</button></a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Product Code</th>
                    <th>Item Name</th>
                    <th>Photo</th>
                    <th>Price</th>
                    <th>Sale Price</th>
                    <th>Featured</th>
                    <th>Category</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // ---1-----select all items to display in the table 
                $sql = "SELECT itemId, itemName, photo, price, salePrice, productCode, description, featured, category.categoryName FROM item, category WHERE item.categoryId = category.categoryId Order by itemId";
                $stmt = $pdo->prepare($sql);
                $itemRows = $db->executeSQL($stmt);

                foreach ($itemRows as $itemrow) :
                    $itemId = $itemrow["itemId"];
                    $itemName = $itemrow["itemName"];
                    $photo = $itemrow["photo"];
                    $price = $itemrow["price"];
                    $salePrice = $itemrow["salePrice"];
                    $featured = $itemrow["featured"];
                    $categoryName = $itemrow["categoryName"];
                    $productCode = $itemrow["productCode"];
                ?>
                    <tr>
                        <td><?= $itemId ?></td>
                        <td class="nowrap"><?= $productCode ?></td>
                        <td><?= $itemName ?></td>
                        <td><img src="../assets/images/product-images/<?= $photo ?>" alt="<?= $photo ?> image" class="itemImage"></td>
                        <td><?= $price ?></td>
                        <td><?= $salePrice ?></td>
                        <td><?php
                            if ($featured != 0) {
                                echo "Yes";
                            } else {
                                echo "";
                            }
                            ?></td>
                        <td><?= $categoryName ?></td>
                        <td>
                            <a class="updateButton" href="displayUpdateProduct.php?id=<?= $itemId ?>">Edit</a>
                        </td>
                        <td>
                            <a href="processDeleteProduct.php?id=<?= $itemId ?>" class="delete deleteButton" onclick="return confirmDelete(event)">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>