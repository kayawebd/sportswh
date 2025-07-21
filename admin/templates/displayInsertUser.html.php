<!-- display error message -->
<div class="adminMessage">
    <?php
    //  upload image error message array $uploadMessages[]
    if (!empty($createUserErrMessages)) {
        echo "<p class='adminMessage'><b>Item NOT added:</b></p>";
        foreach ($createUserErrMessages as $createUserErrMessage) {
    ?><p class="adminMessage"><?= $createUserErrMessage ?></p>
        <?php
        }
    } else {
        ?> <p class="adminMessage"><?= $message ?></p>
    <?php
    } ?>
</div>

<div class="adminForm" id="editUser">
    <p>Password should be at least 8 characters long <br>and contain at least one uppercase letter, one lowercase letter, and one special character. </p>
    <fieldset>
        <legend>Add User</legend>
        <form action="processInsertUser.php" method="post" enctype="multipart/form-data">
            <p>
                <label for="userName">User Name:<span class="required"> *</span></label>
                <input type="text" name="userName" id="userName" required>
            </p>
            <p>
                <label for="email">Email:<span class="required"> *</span></label>
                <input type="email" name="email" id="email" required>
            </p>
            <p>
                <label for="phone">Phone:</label>
                <input type="text" name="phone" id="phone">
            </p>
            <p>
                <label for="address">Address:</label>
                <input type="text" name="address" id="address">
            </p>
            <p>
                <label for="password">Password<span class="required"> *</span></label>
                <input type="password" id="password" name="password">
            </p>
            <p>
                <label for="confirmPassword">Confirm Password<span class="required"> *</span></label>
                <input type="password" id="confirmPassword" name="confirmPassword">
            </p>

            <div class="formAction">
                <input type="submit" name="submitInsert" value="Add User">
                <a href="displayUsers.php" class="formAction-back">Back</a>
            </div>
        </form>
    </fieldset>
</div>