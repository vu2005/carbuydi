<?php
// Kết nối đến cơ sở dữ liệu
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_car";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lấy danh sách các hãng xe
$sql = "SELECT * FROM car_brands";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<form action='filter.php' method='post'>";
    echo "<select name='brand'>";
    echo "<option value=''>Chọn hãng xe</option>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
    }
    echo "</select>";
    echo "<input type='submit' value='Lọc'>";
    echo "</form>";
} else {
    echo "0 results";
}

// Kiểm tra xem đã chọn hãng xe nào
if (isset($_POST['brand'])) {
    $brand_id = $_POST['brand'];
    $sql = "SELECT * FROM car_models WHERE brand_id = $brand_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<ul>";
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row["model_name"] . "</li>";
        }
        echo "</ul>";
    } else {
        echo "0 results";
    }
}

$conn->close();
?>
