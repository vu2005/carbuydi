<?php
// Kết nối tới cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_car";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy giá trị lọc từ form
    $sorting = $_POST["sorting"];
    $sliding_price = $_POST["sliding_price"];

    // Truy vấn cơ sở dữ liệu với điều kiện lọc theo giá và/hoặc tùy chọn sorting
    $sql = "SELECT * FROM cars WHERE price <= $sliding_price";

    if (!empty($sorting)) {
        if ($sorting == "under_500") {
            $sql .= " AND price < 500000000";
        } elseif ($sorting == "500_to_700") {
            $sql .= " AND price >= 500000000 AND price < 700000000";
        } elseif ($sorting == "700_to_1000") {
            $sql .= " AND price >= 700000000 AND price < 1000000000";
        } elseif ($sorting == "above_1b") {
            $sql .= " AND price >= 1000000000";
        }
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Hiển thị dữ liệu
        while ($row = $result->fetch_assoc()) {
            echo "Mã xe: " . $row["id"] . " - Tên: " . $row["make"] . " - Giá: " . $row["price"] . "<br>";
        }
    } else {
        echo "Không có kết quả nào";
    }
}

$conn->close();
?>