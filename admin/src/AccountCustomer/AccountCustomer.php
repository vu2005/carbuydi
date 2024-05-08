<?php
// Kết nối đến cơ sở dữ liệu
require_once("../config/config.php");

// Truy vấn dữ liệu từ cơ sở dữ liệu
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách tài khoản khách hàng</title>
    <!-- Các file CSS và JavaScript -->
</head>

<body>
    <div class="container">
        <h2 style="margin-bottom: 30px;">Danh sách tài khoản khách hàng</h2>
        <table class="table-data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Họ Tên</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Kiểm tra xem có dữ liệu trả về không
                if ($result->num_rows > 0) {
                    // Duyệt qua từng hàng dữ liệu
                    while ($row = $result->fetch_assoc()) {
                        // Hiển thị thông tin admin trong từng hàng của bảng
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";

                        echo "<td>" . $row["full_name"] . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["password"] . "</td>";

                        echo "<td>";
                        echo "<a href='index.php?quanly=AccountCustomer-delete&id=" . $row["id"] . "' class='btn-delete'>Xóa</a>";
                        echo "</td>";

                        echo "</tr>";



                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Không có admin trong cơ sở dữ liệu!</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>