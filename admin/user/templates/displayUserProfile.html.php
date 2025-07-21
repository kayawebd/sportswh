<p class="adminMessage"><?= $message ?></p>
<div class="myaccountInfo">
    <h2>My Account Information:</h2>
    <p>Username: <?= $_SESSION["username"] ?></p>
    <p>Mob: <?= $_SESSION["phone"] ?></p>
    <p>Email: <?= $_SESSION["email"] ?></p>
    <p>Address: <?= $_SESSION["address"] ?></p>
    <p>Permission: <?= $_SESSION["roles"] ?></p>
</div>
<a href="../admin/displayUserUpdatePassword.php"><button class="admin__button">Update password</button></a>