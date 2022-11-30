<?php
require_once("connect.php");
$conn = connect();
$stmt = $conn->prepare("SELECT id , product_code, product_name, price FROM products ");
$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
$arr = $stmt->fetchAll();
//?>
<html>
<body>
<button><a href="insert.php">Create</a></button>
<table>
    <tr>
        <th>ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Price</th>
        <th>Action</th>
    </tr>
    <?php foreach ($arr as $itemarr) { ?>
        <tr>
            <th> <?php echo $itemarr["id"] ?> </th>
            <th> <?php echo $itemarr["product_code"] ?> </th>
            <th> <?php echo $itemarr["product_name"] ?> </th>
            <th> <?php echo $itemarr["price"] ?> </th>
            <th>
                <button><a href="update.php?product_id=<?php echo $itemarr["id"] ?>">Update</a></button>
                <button><a href="delete.php?product_id=<?php echo $itemarr["id"] ?>">Delete</a></button>
            </th>
        </tr>

    <?php } ?>


</table>
</body>
</html>

