<div class="container py-3">
    <h3>Thêm sản phẩm</h3>
    <form method="POST">
        <div class="form-group">
            <label for="email">Code:</label>
            <input type="text" class="form-control" placeholder="Product code" name="productCode" require>
        </div>
        <div class="form-group">
            <label for="pwd">Name:</label>
            <input type="text" class="form-control" placeholder="Product name" name="productName" require>
        </div>
        <div class="form-group">
            <label for="pwd">Price:</label>
            <input type="text" class="form-control" placeholder="Price" name="price" require>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
        <a href="<?php echo route('product-list')?>" class="btn btn-danger">Cancel</a>
    </form>

</div>