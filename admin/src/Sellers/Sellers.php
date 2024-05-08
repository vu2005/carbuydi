<?php
// Kết nối đến cơ sở dữ liệu
require_once("../config/config.php");
$sql = "SELECT sellers_car.id, sellers_car.name, sellers_car.company_name, sellers_car.phone,sellers_car.address, sellers_car.image_url
        FROM sellers_car
        INNER JOIN cars ON sellers_car.car_id = cars.id
        INNER JOIN cars_image ON sellers_car.car_id = cars_image.car_id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Sellers Car</title>
</head>

<body>
    <div class="container">
        <h2 style="margin-bottom: 30px;">Quản Lý đối tác của carbuydi</h2>
        <table class="table-data">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Tên</th>
                    <th>Công Ty</th>
                    <th>Số Điện Thoại</th>
                    <th>Địa chỉ</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kiểm tra xem có dữ liệu trả về không
                if ($result->num_rows > 0) {
                    // Duyệt qua từng hàng dữ liệu
                    while ($row = $result->fetch_assoc()) {
                        // Hiển thị thông tin người bán xe
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['company_name'] . "</td>";
                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>";
                        echo "<a href='index.php?quanly=Sellers-delete&id=" . $row["id"] . "' class='btn-delete'>Xóa</a>";
                        echo "<a href='index.php?quanly=Sellers-view&id=" . $row["id"] . "' class='btn-view'>Xem</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Hiển thị thông báo nếu không có dữ liệu nào
                    echo "<tr><td colspan='7'>Không có người bán xe nào được tìm thấy</td></tr>";
                }
                // Đóng kết nối 
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>