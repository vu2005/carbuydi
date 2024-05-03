<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "carbuydi";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}
// Truy vấn để lấy tất cả các sản phẩm
$sql = "SELECT cars.*, cars_image.*
FROM cars
JOIN cars_image ON cars.id = cars_image.car_id;
";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>

</head>

<body>
    <div class="container">
        <h2 style="margin-bottom: 30px;">Quản lý sản phẩm</h2>
        <a href="index.php?quanly=Products-add" class="btn-add"> Thêm Xe</a>
        <table class="table-data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Hãng xe</th>
                    <th>Dòng xe</th>
                    <th>Phiên bản</th>
                    <th>Năm sản xuất</th>
                    <th>Tình trạng</th>
                    <th>Số KM</th>
                    <th>Giá</th>
                    <th>Hình ảnh</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kiểm tra xem có dữ liệu trả về không
                if ($result->num_rows > 0) {
                    // Duyệt qua từng hàng dữ liệu
                    while ($row = $result->fetch_assoc()) {
                        // Hiển thị thông tin sản phẩm trong từng hàng của bảng
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['make'] . "</td>";
                        echo "<td>" . $row['model'] . "</td>";
                        echo "<td>" . $row['version'] . "</td>";
                        echo "<td>" . $row['year'] . "</td>";
                        echo "<td>" . $row['condition'] . "</td>";
                        echo "<td>" . $row['mileage'] . "</td>";
                        echo "<td>" . $row['price'] . "</td>";
                        echo "<td>"; // Bắt đầu của cột hình ảnh
                        $images = explode(",", $row['image_url']); // Chia chuỗi các đường dẫn thành mảng
                        foreach ($images as $image) {
                            echo "<img src='" . $image . "' width='100' height='100' style='margin-right: 5px;'>"; // Hiển thị mỗi hình ảnh
                        }
                        echo "</td>"; // Kết thúc cột hình ảnh

                        echo "<td>";
                        echo "<a href='index.php?quanly=Products-view&id=" . $row["id"] . "' class='btn-view'>Xem</a>";
                        echo "<a href='index.php?quanly=Products-edit&id=" . $row["id"] . "' class='btn-edit'>Sửa</a>";
                        echo "<a href='index.php?quanly=Products-delete&id=" . $row["id"] . "' class='btn-delete'>Xóa</a>";
                        echo "</td>";

                        echo "</tr>";
                    }
                } else {
                    // Hiển thị thông báo nếu khôang có sản phẩm nào trong cơ sở dữ liệu
                    echo "<tr><td colspan='10'>Không có sản phẩm nào được tìm thấy</td></tr>";
                }
                // Đóng kết nối
                $conn->close();
                ?>
            </tbody>

        </table>

    </div>

</body>

</html>