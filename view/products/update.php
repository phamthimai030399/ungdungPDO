<div class="container py-3">
    <h3>Sửa sản phẩm</h3>
    <form method="POST">
        <input hidden type="text" id="product_id" name="product_id" value="<?php echo $product["id"] ?>">
        <div class="form-group">
            <label for="email">Code:</label>
            <input type="text" class="form-control" placeholder="Product code" name="product_code" value="<?php echo $product["product_code"] ?>" required>
        </div>
        <div class="form-group">
            <label for="pwd">Name:</label>
            <input type="text" class="form-control" placeholder="Product name" name="product_name" value="<?php echo $product["product_name"] ?>" required>
        </div>
        <div class="form-group">
            <label for="pwd">Price:</label>
            <input type="text" class="form-control" placeholder="Price" name="price" value="<?php echo $product["price"] ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?php echo route('product-list') ?>" class="btn btn-danger">Cancel</a>
    </form>

</div>