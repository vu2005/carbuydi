<?php
// Kiểm tra xem biến `id` đã được truyền vào URL hay chưa
if (isset($_GET['id'])) {
    // Lấy giá trị của biến `id`
    $id = $_GET['id'];

    // Kết nối đến cơ sở dữ liệu
    $servername = "localhost";
    $username = "root"; // Thay username bằng username của bạn
    $password = ""; // Thay password bằng password của bạn
    $dbname = "carbuydi";

    // Tạo kết nối
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Kết nối không thành công: " . $conn->connect_error);
    }

    // Truy vấn dữ liệu sản phẩm từ bảng Xe
    $sql = "SELECT * FROM cars WHERE id='$id'";
    $result = $conn->query($sql);

    // Kiểm tra kết quả trả về
    if ($result->num_rows > 0) {
        // Duyệt qua từng hàng dữ liệu
        while ($row = $result->fetch_assoc()) {
            echo "<div class='container'>";
            echo "<div class='products'>";
            echo "<div class='header-products'>";
            echo "<img src='" . $row["images"] . "' alt=''>";
            echo "</div>";
            echo "<div class='text-products'>";
            echo "<p><i class='bx bxs-hot'></i><i id='hot' class='bx bxs-hot'></i>" . $row["make"], " " . $row["model"] . "</p>";
            echo "</div>";
            echo "<div class='icon-products'>";
            echo "<ul>";
            echo "<li><a href=''><i class='bx bx-calendar'></i>" . $row["year"] . "</a></li>";
            echo "<li><a href=''><i class='bx bx-gas-pump'></i>" . $row["fuel_type"] . "</a></li>";
            echo "</ul>";
            echo "<ul>";
            echo "<li><a href=''><i class='bx bx-line-chart'></i>" . $row["mileage"] . " Km</a></li>";
            echo "<li><a href=''><i class='bx bx-git-compare'></i>" . $row["transmission"] . "</a></li>";
            echo "</ul>";
            echo "</div>";
            echo "<div class='price-products'>";
            echo "<h2>" . $row["price"] . "</h2>";
            echo "</div>";
            echo "<div class='map-products'>";
            echo "<p><i class='bx bx-map'></i>" . $row["location"] . "</p>";
            echo "</div>";
            echo "</div>";
            echo "<div class='function-btn-0'>";
            echo "<a href='index.php?quanly=Products-edit&id=" . $row["id"] .  $row["fuel_type"] . "' class='btn-edit'>Sửa</a>";
            echo "<a href='index.php?quanly=Products-delete&id=" . $row["id"] . "' class='btn-delete'>Xóa</a>";
            echo "</div>";
            echo "</div>";
        }
    } else {
        // Hiển thị thông báo nếu không có sản phẩm nào trong cơ sở dữ liệu
        echo "Không có sản phẩm nào";
    }

    // Đóng kết nối
    $conn->close();
} else {
    // Hiển thị thông báo nếu không có ID sản phẩm được truyền vào
    echo "Không tìm thấy sản phẩm";
}
