<?php
// Mục đích muốn dùng 1 file insert này vừa hiển thị form và vừa xử lý khi submit-->
//1. Kiểm tra phương thức đang dùng, nếu là GET thì hiển thị html để insert-->
// 2. Nếu phương thức là POST thì lấy data POST, tạo connect và thực hiện insert, sau đó redirect về tran danh sách
require_once('connect.php');
?>

<html>
<body>
<?php if ($_SERVER['REQUEST_METHOD'] == "GET"): ?>
    <form action="insert.php" method="post">
        <table>
            <tr>
                <th>ID</th>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
            <tr>
                <th><input type="text" id="product_code" name="product_code" value=""></th>
                <th><input type="text" id="product_name" name="product_name" value=""></th>
                <th><input type="text" id="price" name="price" value=""></th>
            </tr>
        </table>
        <button>Insert</button>
    </form>
<?php elseif ($_SERVER['REQUEST_METHOD'] == "POST"): ?>
    <?php
    $inputCode = $_POST["product_code"];
    $inputName = $_POST["product_name"];
    $inputPrice = $_POST["price"];

    $conn = connect();
    $sql = "INSERT INTO products (`product_code`, `product_name` , `price`)
  VALUES ('$inputCode' , '$inputName ', $inputPrice)";
//    die($sql);
    $conn->exec($sql);
    header("Location: danhsach.php"); //đường dẫn tương đối
//    header("Location: /tda/ungdungPDO/danhsach.php"); //đường dẫn tuyệt đối
    exit;
    ?>

<?php endif; ?>


</body>
</html>
