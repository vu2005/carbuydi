<?php
require_once("../config/config.php");
$sql = "SELECT 
    users.id AS user_id,
    users.full_name,
    CONCAT(users.address, ', ', users.district, ', ', users.province) AS address,
    users.phone_number,
    users_sell_cars.make,
    users_sell_cars.model,
    users_sell_cars.version,
    users_sell_cars.year,
    users_sell_cars.mileage,
    users_sell_cars.posted_date
FROM 
    users
INNER JOIN 
    users_sell_cars ON users.id = users_sell_cars.user_id";
$result = $conn->query($sql); // Thực hiện truy vấn SQL và gán kết quả cho biến $result

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Khách Hàng Bán Xe</title>
</head>

<body>
    <div class="container">
        <h2 style="margin-bottom: 30px;">Danh Sách Khách Hàng Bán Xe</h2>
        <table class="table-data">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Họ Tên</th>
                    <th>Địa Chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Hãng xe</th>
                    <th>Dòng xe</th>
                    <th>Phiên bản</th>
                    <th>Năm sản xuất</th>
                    <th>Số KM</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kiểm tra xem có dữ liệu trả về không
                if ($result && $result->num_rows > 0) { // Kiểm tra $result trước khi truy cập thuộc tính num_rows
                    // Duyệt qua từng hàng dữ liệu
                    while ($row = $result->fetch_assoc()) {
                        // Hiển thị thông tin người bán xe
                        echo "<tr>";
                        echo "<td>" . $row['user_id'] . "</td>"; // Đổi 'id' thành 'user_id' để lấy mã xe
                        echo "<td>" . $row['full_name'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['phone_number'] . "</td>"; // Sử dụng 'phone_number' thay vì 'phone' để lấy số điện thoại của người dùng
                        echo "<td>" . $row['make'] . "</td>";
                        echo "<td>" . $row['model'] . "</td>";
                        echo "<td>" . $row['version'] . "</td>";
                        echo "<td>" . $row['year'] . "</td>";
                        echo "<td>" . $row['mileage'] . "</td>";

                        echo "<td>";
                        echo "<a href='index.php?quanly=Sellers-delete&id=" . $row["user_id"] . "' class='btn-delete'>Xóa</a>"; // Sửa 'id' thành 'user_id'
                        echo "<a href='index.php?quanly=Sellers-view&id=" . $row["user_id"] . "' class='btn-view'>Xem</a>"; // Sửa 'id' thành 'user_id'
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Hiển thị thông báo nếu không có dữ liệu nào
                    echo "<tr><td colspan='10'>Không có người bán xe nào được tìm thấy</td></tr>";
                }
                // Đóng kết nối
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>