<?php
// Mục đích: vẫn giống insert dùng 1 file để vừa xử lý logic updaste và hiển thị form
// 0.0: tạo connect và gán cho biến $conn.
// 1. Kiểm tra xem phương thức đang dùng là GET thì mình thực hiện:
//  1.1. Lấy product_id từ biến GET['product_id']
//  1.2. Dùng biến conn và viết chuỗi query để lấy ra bản ghi có id tương ứng
//  1.3 Viết form và đổ dữ liệu của bản ghi đó ra từng ô input tương ứng
// 2. Nếu là POST thì mình thực hiện:
//  2.1 Lấy dữ liệu của product vừa sửa bằng POST
//  2.2 Viết câu lệnh sql update tương ứng với dữ liệu vừa lấy
//  2.3 Dùng biến conn thực thi câu lệnh update
//  2.4 redirect về trang danh sách
require_once("connect.php");
$conn = connect();
if ($_SERVER['REQUEST_METHOD'] == "GET"): ?>
    <?php $product_id = $_GET["product_id"];
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = $product_id");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $arr = $stmt->fetchAll();
    if (count($arr) != 1) {
        die("Không tồn tại product này");
    }
    $product = $arr[0];
    ?>
    <html>
    <body>
    <form action="update.php" method="post">
        <table>
            <tr>
                <th>Code</th>
                <th>Name</th>
                <th>Price</th>
            </tr>
            <tr>
                <input hidden type="text" id="product_id" name="product_id" value="<?php echo $product["id"] ?>">
                <th><input type="text" id="product_code" name="product_code"
                           value="<?php echo $product["product_code"] ?>"></th>
                <th><input type="text" id="product_name" name="product_name"
                           value="<?php echo $product["product_name"] ?>"">
                </th>
                <th><input type="text" id="price" name="price" value="<?php echo $product["price"] ?>""></th>
            </tr>
        </table>
        <button>Insert</button>
    </form>
    </body>
    </html>
<?php elseif ($_SERVER['REQUEST_METHOD'] == "POST"): ?>
    <?php
    $id = $_POST["product_id"];
    $inputCode = $_POST["product_code"];
    $inputName = $_POST["product_name"];
    $inputPrice = $_POST["price"];

    $sql = "UPDATE products SET product_code = '$inputCode' , product_name = '$inputName' , price = $inputPrice WHERE id=$id";;
//    die($sql);
    $conn->exec($sql);
    header("Location: danhsach.php"); //đường dẫn tương đối
//    header("Location: /tda/ungdungPDO/danhsach.php"); //đường dẫn tuyệt đối
    exit;
    ?>

<?php endif; ?>


</body>
</html>
