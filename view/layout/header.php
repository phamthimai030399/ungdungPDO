<div class="border-bottom py-2">
    <div class="container">
        <div class="row">
            <div class="col-10"><span>CMS</span></div>
            <?php if (User::isAuth()) : ?>
                <div class="col-2 text-right"><a href="<?php echo route('user-logout') ?>" class="btn btn-danger btn-sm">Log out</a></div>
            <?php endif; ?>
        </div>
    </div>
</div>