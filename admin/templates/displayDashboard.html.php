<div>
    <p class="adminMessage"><?= $message ?></p>
    <h1 class="adminHeading">Dashboard</h1>
    <div class="dashboard">

        <div class="totalSales">
            <h2 class="heading">Total Sales</h2>
            <?php
            $sql = "SELECT SUM(price) AS totalSales FROM orderitem;";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result !== false) {
                $totalSales = number_format($result['totalSales'], 0);
            } else {
                $totalSales = "No sales data available.";
            }
            ?>
            <p class="result">$ <?= $totalSales ?></p>
        </div>

        <div class="numberOfProducts">
            <h2 class="heading">Profits</h2>
            <?php
            $profit = number_format($totalSales * 0.3, 0);
            ?>
            <p class="result">$ <?= $profit ?></p>
        </div>

        <div class="numberOfOrders">
            <h2 class="heading">Number Of Orders</h2>
            <?php
            $sql = "SELECT * FROM orderitem";
            $stmt = $pdo->prepare($sql);
            $rows = $db->executeSQL($stmt);
            $numberOfOrders = count($rows);
            ?>
            <p class="result"><?= $numberOfOrders ?></p>
        </div>

        <div class="numberOfProducts">
            <h2 class="heading">Number Of Products</h2>
            <?php
            $sql = "SELECT * FROM item";
            $stmt = $pdo->prepare($sql);
            $rows = $db->executeSQL($stmt);
            $numberOfProducts = count($rows);
            ?>
            <p class="result"> <?= $numberOfProducts ?></p>
        </div>
    </div>