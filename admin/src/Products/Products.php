<?php
require_once('../config/config.php');
$sql = "SELECT cars.*,
 cars_details.transmission,
 cars_details.title AS car_title,
 cars_image.products_image,
 cars_image.front_image,
 cars_image.rear_image, 
 cars_image.left_image, 
 cars_image.right_image, 
 cars_image.dashboard_image, 
 cars_image.inspection_image, 
 cars_image.other_image, 
 sellers_car.address 
        FROM cars 
        LEFT JOIN cars_details ON cars.id = cars_details.car_id 
        LEFT JOIN cars_image ON cars.id = cars_image.car_id 
        LEFT JOIN sellers_car ON cars.id = sellers_car.id";
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
                        $images = explode(",", $row['front_image']); // Chia chuỗi các đường dẫn thành mảng
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