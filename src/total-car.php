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

// Truy vấn để lấy tổng số xe
$sql = "SELECT COUNT(*) as total FROM cars";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Trả về số xe
echo $row['total'];

// Đóng kết nối
$conn->close();
?>