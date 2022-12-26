<div class="container py-3">
    <h3>Sửa sản phẩm</h3>
    <form method="POST" enctype="multipart/form-data">
        <input hidden type="text" id="product_id" name="product_id" value="<?php echo $product["id"] ?>">
        <div class="form-group">
            <label for="email">Code:</label>
            <input type="text" class="form-control" placeholder="Product code" name="product_code"
                value="<?php echo $product["product_code"] ?>" required>
        </div>
        <div class="form-group">
            <label for="pwd">Name:</label>
            <input type="text" class="form-control" placeholder="Product name" name="product_name"
                value="<?php echo $product["product_name"] ?>" required>
        </div>
        <div class="form-group">
            <label for="pwd">Price:</label>
            <input type="text" class="form-control" placeholder="Price" name="price"
                value="<?php echo $product["price"] ?>" required>
        </div>
        <div class="form-group">
            <label for="pwd">Image:</label>
            <input type="file" class="form-control-file border" placeholder="Image" name="image"
                value="">
                <!-- <span><?php echo $product['image'] ?></span> -->
            <img src="<?php echo $product['image'] ?>" alt="" srcset="" style="width: 100px">
        </div>
        <?php if (SessionFlash::hasSessionFlash('errMessage')) : ?>
            <p style="color: brown"><?php echo SessionFlash::getSessionFlash('errMessage') ?></p>
        <?php endif; ?>
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?php echo route('products list') ?>" class="btn btn-danger">Cancel</a>
    </form>

</div>