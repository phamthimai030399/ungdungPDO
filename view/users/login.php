<div class="container py-3">
    <h3>Đăng nhập</h3>
    <form method="POST">
        <div class="form-group">
            <label for="email">Username:</label>
            <input type="text" class="form-control" placeholder="Username" name="user_name" require>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Password" name="password" require>
        </div>

        <?php if (!empty($_SESSION["login_message"])) : ?>
            <p style="color: brown"><?php echo $_SESSION["login_message"] ?></p>
        <?php elseif (!empty($_SESSION["logout_message"])) : ?>
            <p style="color: brown"><?php echo $_SESSION["logout_message"] ?></p>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary">Log in</button>
        <a href="<?php echo route('register') ?>">Đăng kí tài khoản mới
    </form>

</div>