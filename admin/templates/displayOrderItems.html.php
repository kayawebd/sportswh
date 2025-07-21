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
    <h2>Orders</h2>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Order ID</th>
                    <th>quantity</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // ---1-----select all items to display in the table 
                $sql = "SELECT itemId, shoppingOrderId, quantity, price FROM orderitem";
                $stmt = $pdo->prepare($sql);
                $itemRows = $db->executeSQL($stmt);

                foreach ($itemRows as $itemrow) :
                    $itemId = $itemrow["itemId"];
                    $shoppingOrderId = $itemrow["shoppingOrderId"];
                    $quantity = $itemrow["quantity"];
                    $price = $itemrow["price"];
                ?>
                    <tr>
                        <td><?= $itemId ?></td>
                        <td><?= $shoppingOrderId ?></td>
                        <td><?= $quantity ?></td>
                        <td><?= $price ?></td>
                        <td>
                            <a class="updateButton" href="displayUpdateOrderItems.php?id=<?= $shoppingOrderId ?>">Edit</a>
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