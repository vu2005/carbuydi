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
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý khách hàng</title>

</head>

<body>
    <div class="container">
        <h2 style="margin-bottom: 30px;">Quản lý khách hàng</h2>
        <table class="table-data">
            <thead>
                <tr>
                    <th>Mã</th>
                    <th>Tên đăng nhập</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Số điện thoại</th>
                    <th>Địa chỉ</th>
                    <th>Ngày sinh</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kiểm tra xem có dữ liệu trả về không
                if ($result->num_rows > 0) {
                    // Duyệt qua từng hàng dữ liệu
                    while ($row = $result->fetch_assoc()) {
                        // Hiển thị thông tin người dùng trong từng hàng của bảng
                        echo "<tr>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";

                        echo "<td>" . $row['phone'] . "</td>";
                        echo "<td>" . $row['address'] . "</td>";
                        echo "<td>" . $row['date_of_birth'] . "</td>";
                        echo "<td>";
                        echo "<a href='index.php?quanly=Users-delete&id=" . $row["id"] . "' class='btn-delete'>Xóa</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    // Hiển thị thông báo nếu không có người dùng nào trong cơ sở dữ liệu
                    echo "<tr><td colspan='7'>Không có người dùng nào được tìm thấy</td></tr>";
                }
                // Đóng kết nối
                $conn->close();
                ?>
            </tbody>

        </table>

    </div>

</body>

</html>