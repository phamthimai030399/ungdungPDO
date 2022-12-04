<div class="container py-3">
    <h3>Danh sách sản phẩm</h3>
    <div class="row">
        <div class="col-6">
            <form method="GET">
                <input hidden type="text" name="source" value="<?php echo $_GET['source'] ?>">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search" name="searchName" value="<?php echo $searchName ?>">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6 text-right">
            <a href="<?php echo route('product-insert') ?>" class="btn btn-success">Create</a>
        </div>
    </div>
    <?php if (count($arr) == 0) : ?>
        <span style="color: brown">Không tìm thấy sản phẩm</span>
    <?php endif; ?>
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Code</th>
            <th>Name</th>
            <th>Price</th>
            <th>Action</th>
        </tr>

        <?php foreach ($arr as $itemarr) : ?>
            <tr>
                <td> <?php echo $itemarr["id"] ?> </td>
                <td> <?php echo $itemarr["product_code"] ?> </td>
                <td> <?php echo $itemarr["product_name"] ?> </td>
                <td> <?php echo $itemarr["price"] ?> </td>
                <td>
                    <a class="btn btn-sm btn-primary" href="<?php echo route('product-update') ?>&product_id=<?php echo $itemarr["id"] ?>">Update</a>
                    <a class="btn btn-sm btn-danger" href="<?php echo route('product-delete') ?>&product_id=<?php echo $itemarr["id"] ?>" onclick="return confirm('Bạn có muốn xóa sản phẩm?')">Delete</a>
                </td>
            </tr>

        <?php endforeach; ?>

    </table>
</div>