<div>
    <p class="adminMessage"><?= $message ?></p>
    <h1>Dashboard</h1>
    <div class="dashboard">
        <div class="numberOfCategories">
            <h2>Categories</h2>
            <?php
            $sql = "SELECT * FROM category";
            $stmt = $pdo->prepare($sql);
            $rows = $db->executeSQL($stmt);
            $numberOfCategories = count($rows);
            ?>
            <p><?= $numberOfCategories ?></p>
        </div>
        <div class="numberOfUser">
            <h2>Users</h2>
            <?php
            $sql = "SELECT * FROM user";
            $stmt = $pdo->prepare($sql);
            $rows = $db->executeSQL($stmt);
            $numberOfUser = count($rows);
            ?>
            <p><?= $numberOfUser ?></p>
        </div>
        <div class="numberOfProducts">
            <h2>Products</h2>
            <?php
            $sql = "SELECT * FROM item";
            $stmt = $pdo->prepare($sql);
            $rows = $db->executeSQL($stmt);
            $numberOfProducts = count($rows);
            ?>
            <p><?= $numberOfProducts ?></p>
        </div>
        <div class="numberOfOrders">
            <h2>Orders</h2>
            <?php
            $sql = "SELECT * FROM orderitem";
            $stmt = $pdo->prepare($sql);
            $rows = $db->executeSQL($stmt);
            $numberOfOrders = count($rows);
            ?>
            <p> <?= $numberOfOrders ?></p>
        </div>
    </div>