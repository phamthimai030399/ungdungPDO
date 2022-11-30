<?php
// File delete xử lý logic delete
//0.0: tạo connect và gán cho biến $conn.
//1. Kiểm tra xem phương thức đang dùng là GET thì mình thực hiện:
//1.1. Lấy product_id từ biến GET['product_id']
//1.2. Dùng biến conn và viết chuỗi query để xóa bản ghi có id tương ứng
// redirect về trang danh sách

require_once("connect.php");
$conn = connect();
if ($_SERVER['REQUEST_METHOD'] == "GET"){
    $product_id = $_GET["product_id"];
    $conn = connect();
    $stmt = $conn->prepare("DELETE FROM products WHERE id = $product_id");
    $stmt->execute();
    header("Location: danhsach.php");
}

