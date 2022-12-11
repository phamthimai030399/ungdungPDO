<div class="container py-3">
    <h3>Thêm sản phẩm</h3>
    <form method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="email">Code:</label>
            <input type="text" class="form-control" placeholder="Product code" name="product_code" require>
        </div>
        <div class="form-group">
            <label for="pwd">Name:</label>
            <input type="text" class="form-control" placeholder="Product name" name="product_name" require>
        </div>
        <div class="form-group">
            <label for="pwd">Price:</label>
            <input type="text" class="form-control" placeholder="Price" name="price" require>
        </div>
        <div class="form-group">
            <label for="pwd">Image:</label>
            <input type="file" class="form-control-file border" placeholder="Image" name="image" require>
        </div>
        <?php if (SessionFlash::hasSessionFlash('errMessage')) : ?>
            <p style="color: brown"><?php echo SessionFlash::getSessionFlash('errMessage') ?></p>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?php echo route('products list')?>" class="btn btn-danger">Cancel</a>
    </form>

</div>