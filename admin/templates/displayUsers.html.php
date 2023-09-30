<p class="adminMessage"><?= $message ?></p>
<div id="systemUser">
    <h2>Users</h2>
    <a href="../admin/displayInsertUser.php"><button class="admin__button">Add User</button></a>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody class="categoryTable">
                <?php
                $sql = "SELECT userId, userName, email, phone, `address` FROM user";
                $stmt = $pdo->prepare($sql);
                $userRows = $db->executeSQL($stmt);

                foreach ($userRows as $row) :
                    $userId = $row["userId"];
                    $userName = $row["userName"];
                    $userEmail = $row["email"];
                    $userAddress = $row["address"];
                    $userPhone = $row["phone"];
                ?>
                    <tr>
                        <td><?= $userId ?></td>
                        <td><?= $userName ?></td>
                        <td><?= $userEmail ?></td>
                        <td><?= $userPhone ?></td>
                        <td><?= $userAddress ?></td>
                        <td><a href="displayUpdateUser.php?id=<?= $userId ?>" class="updateButton">Edit</a></td>
                        <td><a class="delete deleteButton" href="processDeleteUser.php?id=<?= $userId ?>" onclick="return confirmDelete(event)">Delete</a></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>


<div class="myaccountInfo">
    <h2>My Account Information:</h2>
    <p>Username: <?= $_SESSION["username"] ?></p>
    <p>Mob: <?= $_SESSION["phone"] ?></p>
    <p>Email: <?= $_SESSION["email"] ?></p>
    <p>Address: <?= $_SESSION["address"] ?></p>
    <p>Permission: <?= $_SESSION["roles"] ?></p>
</div>
<a href="../admin/displayUpdatePassword.php"><button class="admin__button">Update password</button></a>