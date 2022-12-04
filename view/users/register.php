<div class="container py-3">
    <h3>Đăng ký tài khoản</h3>
    <form method="POST">
        <div class="form-group">
            <label for="email">Username:</label>
            <input type="text" class="form-control" placeholder="Username" name="user_name" require>
        </div>
        <div class="form-group">
            <label for="pwd">Password:</label>
            <input type="password" class="form-control" placeholder="Password" name="password" require>
        </div>
        <div class="form-group">
            <label for="pwd">Confirm password:</label>
            <input type="password" class="form-control" placeholder="Confirm password" name="re_password" require>
        </div>

        <?php if (!empty($_SESSION["register_false"])) : ?>
            <p style="color: brown">Xác nhận mật khẩu không khớp.</p>
        <?php endif; ?>

        <button type="submit" class="btn btn-primary">Register</button>
        <a href="<?php echo route('user-login') ?>" class="btn btn-danger">Cancel</a>
    </form>

</div>