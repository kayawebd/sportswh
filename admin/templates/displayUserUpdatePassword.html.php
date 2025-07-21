<div class="cardStyle loginForm">
    <form action="processUpdatePassword.php" method="post">
        <!-- <h2 class="form__title">
        </h2> -->
        <div class="form__inputDiv">
            <label class="form__inputDiv-label" for="password">New Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form__inputDiv">
            <label class="form__inputDiv-label" for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword" required>
        </div>
        <p class="adminMessage"><?= $message ?></p>
        <div class="form__buttonWrapper">
            <button type="submit" id="submitButton" class="form__submitButton" name="submit">
                <span>Update Password</span>
            </button>
        </div>
    </form>
</div>