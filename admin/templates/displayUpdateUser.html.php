<p class="adminMessage"><?= $message ?></p>
<div class="adminForm" id="editUser">
    <fieldset>
        <?php
        if (isset($_GET["id"])) {
            $userId = $_GET["id"];
        } elseif (isset($_POST["userId"])) {
            $userId = $_POST["userId"];
        } else {
            $userId = 0;
        }

        $sql = "SELECT userId, userName, email, phone, `address` FROM user WHERE userId = :userId";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(":userId", $userId, PDO::PARAM_INT);
        $editRows = $db->executeSQL($stmt);
        if (count($editRows) > 0) {
            // select the first row
            $editRow = $editRows[0];
        }
        ?>
        <legend>Update User</legend>
        <form action="processUpdateUser.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="userName">Name:</label>
                <input type="text" name="userName" id="userName" value="<?= $editRow["userName"] ?>" required>
            </p>
            <p>
                <label for="email">Email:</label>
                <input type="text" name="email" id="email" value="<?= $editRow["email"] ?>" required>
            </p>
            <p>
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone" value="<?= $editRow["phone"] ?>" required>
            </p>
            <p>
                <label for="address">Address:</label>
                <input type="text" name="address" id="address" value="<?= $editRow["address"] ?>" required>
            </p>

            <div class="formAction">
                <input type="hidden" value="<?= $editRow["userId"] ?>" name="userId">
                <input type="submit" name="submitUpdate" value="Update">
                <a href="displayUsers.php" class="formAction-back">Back</a>
            </div>
        </form>
    </fieldset>
</div>