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

// Truy vấn dữ liệu từ bảng admins
$sql = "SELECT * FROM admins";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin List</title>

</head>

<body>
    <div class="container">
        <h2 style="margin-bottom: 30px;">Admin List</h2>
        <a href="index.php?quanly=Admin-add" class="btn-add"> Thêm Admin</a>
        <table class="table-data">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Full Name</th>
                    <th>Date of Birth</th>
                    <th>Role</th>
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
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['username'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['password'] . "</td>";
                        echo "<td>" . $row['full_name'] . "</td>";
                        echo "<td>" . $row['date_of_birth'] . "</td>";
                        echo "<td>" . $row['role'] . "</td>";

                        echo "<td>";
                        echo "<a href='index.php?quanly=Admin-edit&id=" . $row["id"] . "' class='btn-edit'>Sửa</a>";
                        echo "<a href='index.php?quanly=Admin-delete&id=" . $row["id"] . "' class='btn-delete'>Xóa</a>";
                        echo "</td>";

                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>Không có admin trong cơ sở dữ liệu!</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>